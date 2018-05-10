<?php
/** @property CActiveRecord $model
 */
class MetaController extends Controller{
    
    // Этот класс будет лежать в основе всех контроллеров FrontEnd
    
    public $meta = array(
        'title' => '',
        'keywords' => '',
        'description' => '',
    );
    
    public $layoutContent    = '//layouts/stdindex';
    public $layoutItem       = '_item';
    public $formatDate; // Используется в /layouts/stditem  '%e %b %G'
    public $comment          = false; // Подключать ли на странице DISQUS
    
    public $noindex  = false;
    public $nofollow = false;
    public $withMeta = true;
    public  $menu;      // список меню из кеша
    public $dataProvider;
    public $model;
    public $modelClass;
    public $pluralField = 'plural';
    private static $_modelObject;
    public $lastItems   = array();
    public $other       = array();
    public $tagids;   //= array();
    public $param       = array();
    public $initBC      = array(); // начальный breadcrumbs
    public $openGraph   = array();
    
    public $viewClass   = '';
    protected $_actionName;
    
    public $adminPanelAddTitle;
    public $adminPanelAddUrl;
    public $adminPanelEditUrl;
    
    public  static $lang;
    private static $_siteURL; // multilang см. getSiteURL();

    public function getModelObject() {
        if (self::$_modelObject===null) {
            self::$_modelObject = Object::byAlias(
                $this->modelClass ? $this->modelClass : 'site');
        }
        return self::$_modelObject;
    }
    
    public function getPlural() {
        return $this->modelObject->{$this->pluralField};
    }
    
    public function initBC() {
        if ($this->modelClass && empty($this->initBC)) {
            $this->initBC[$this->plural]='/'.$this->modelObject->o_sef;
            // multilang
            //$this->initBC[Yii::t('app',$this->plural)]
            //    = self::getSiteURL('/'.$this->modelObject->o_sef);
        }
    }
    
    public function initAdminPanel($create=TRUE, $addTitle=FALSE) {
        if ( $this->model !== NULL) {
            $alias = $this->model->owner->objectSef;
            if ( $create ) {
                if ( $addTitle )
                    $this->adminPanelAddTitle = $addTitle===TRUE
                                              ? mb_strtolower(Object::get($this->model->owner->objectType, 'singular'), 'UTF-8')
                                              : $addTitle;
                $this->adminPanelAddUrl = '/admin/'.$alias.'/create';
            }
            $this->adminPanelEditUrl = '/admin/'.$alias.'/update?id='.$this->model->primaryKey;
        }
    }
    
    public function initIndexTitle($title='') {
        $this->pushMeta(array('title' => $title ? $title : $this->plural));
    }
    
    public function __construct($id, $module = null) {
        parent::__construct($id, $module);        
        //$this->pageTitle = Yii::app()->name;
        $this->pageTitle = isset(Yii::app()->params['title']) 
            ? Yii::app()->params['title'] : Yii::app()->name;
        // multilang
        //self::$lang = Yii::app()->language;
        $this->initBC();
    }
    
    public function beforeAction($action) {
        if (!parent::beforeAction($action)) return false;
        $this->addInitBreadcrumbs();
        if ($this->modelClass && is_object($action) && $action->id=='index') {
            unset($this->breadcrumbs[$this->plural]);
            $this->breadcrumbs[] = $this->plural;
            $this->initIndexTitle();
        }
        return true;
    }

    public function getLang() {
        return self::$lang;
    }
    
    public static function getSiteURL($suffix='/',$lang=null,$full=true) {
        // Пропускаем JS и Полные ссылки
        if (strpos($suffix, '/')!==0 && $suffix) return $suffix;
        if (self::$_siteURL===null && $full) {
            self::$_siteURL = Yii::app()->getRequest()->getHostInfo();
        }
        $lang = is_null($lang)?self::$lang:$lang;
        return ($full?self::$_siteURL:'').($lang?'/'.$lang:'').($suffix=='/'?'':$suffix);
    }
    
    public function addInitBreadcrumbs(){
        foreach($this->initBC as $name=>$url)
            $this->breadcrumbs[$name]=$url;
    }
    
    public function renderContent($data=null) {
        parent::render($this->layoutContent,$data);
    }

    public function stdItem($data) {
    }

    public function beforeReclame() {
    }

    public function afterReclame() {
    }

    public function getParam($name,$default='',$params=array()) {
        if ( ! isset($this->param[$name]))
            $this->param[$name] = Setting::getParam($name,$default,$params);
        return $this->param[$name];
    }
    
    public function setParam($name,$value) {
        $this->param[$name] = $value;
    }
    
    public function checkMenu($mid=1) {
        if (is_null($this->menu)) {
//            $lang = self::$lang;
//            $this->menu = Yii::app()->cache->get("MENU:{$lang}:");
            if (empty($this->menu)) {
                list($firstpath) = explode('/',Yii::app()->request->pathInfo);
                $Menu = Menu::model()->with('page')->findAll(array(
//                    "condition"=>"(m_sef!='' OR m_page_id IS NOT NULL)",
                    'order'=>'m_pid, m_sort, mid DESC'));
                $list  = array();
                foreach ($Menu as $item) {
                    $sid = intval($item->mid);
                    $pid = intval($item->m_pid);
                    if (!isset($list[$sid]))
                        $list[$sid] = array();
                    $path = explode('/',$item->url);
                    $secondpath = count($path)>1 ? $path[1] : $path[0];
                    $list[$sid] = array(
                            'label'  => $item->m_name,
                            'url'    => MetaController::getSiteURL($item->url),
                            'active' => $firstpath==$secondpath || ($firstpath=='news' && $secondpath==''),
                        );
                    if (!isset($list[$pid]))
                        $list[$pid] = array();
                    if (!isset($list[$pid]['items']))
                        $list[$pid]['items'] = array();
                    $list[$pid]['items'][] = &$list[$sid];
                }
                $this->menu = $list;
//                Yii::app()->cache->set("MENU:{$lang}:",$this->menu = $list);
            }
        }
        return isset($this->menu[$mid]) ? $this->menu[$mid] : false;
    }
    
    public function getMenu($mid=1) {
        if ($item = $this->checkMenu($mid)) 
            return isset($item['items']) ? $item['items'] : array();
        return array();
    }
            
    // Перед вызовом getMenuLabel нужно вызвать getMenu либо не указывать значение $default
    // getMenuLabel(Menu::MENUTOP, Yii::t('app','front.footer.menu.'.Menu::MENUTOP));
    // Возвращает название конкретного пункта меню.
    public function getMenuLabel($mid,$default='') {
        if (empty($default) && is_null($this->menu))
            return (($item = $this->checkMenu($mid)) && isset($item['label']))
                ? $item['label'] : /* '' */ $default;
        return isset($this->menu[$mid]['label'])
            ? $this->menu[$mid]['label'] : $default;
    }
    
    public function missingAction($actionID) {
        //parent::missingAction($actionID);
        $this->_actionName = $actionID;
    }
    
    public function incrementViewCount($delta = +1) {
        // Новый код обновляет счётчик если необходимо (см. PrefixedModel::updateViewCount())
        //return $this->model->updateViewCount();
        // Код отрабатывает в 
        
        // Старый код увеличивал счётчик
//        $this->model->updateCounters(
//            array('view_count'=>$delta),
//            $this->model->ownerPrefix.'id='.$this->model->primaryKey);
    }
    
    public function getActionName() {
        if ($this->_actionName===null) {
            $this->_actionName = $this->action->id;
        }
        return $this->_actionName;
    }
    
    protected function setPageProvider($sModel, $oCriteria, $sRoute, $iOnPageCount = 20, $aParams = array()){
        
        $this->dataProvider=new CActiveDataProvider(
            $sModel
            ,array(
                'criteria'=>$oCriteria,
                'pagination'=>array(
                                'pageSize'=>$iOnPageCount,
                                'pageVar'=>'page',
                                'params'=>$aParams,
                                'route'=>$sRoute,
                            ),
            )
        );
        Yii::app()->urlManager->appendParams=false;
    }
 
    public function pushMeta($meta=array(),$toHead=true)
    {
        foreach($this->meta as $key=>$value)
            if (isset($meta[$key]) && ! empty($meta[$key])) 
                if (empty($this->meta[$key]))
                    $this->meta[$key] = $meta[$key];
                else {
                    $separator = 
                        $key=='title'      ? ' — ' :(
                        $key=='keywords'   ? ', '  : 
                        /*     description*/ ' '   );   
                    $this->meta[$key] = $toHead
                                      ? $meta[$key].$separator.$this->meta[$key]
                                      : $this->meta[$key].$separator.$meta[$key]; 
                }
    }

    public function pushModelMeta($toHead=true)
    {
        if (isset($this->model) && $meta=$this->model->metaStuff)
            $this->pushMeta(array(
                'title' => $meta['e_title'] 
                    ? $meta['e_title'] 
                    : $this->model->ownerName,
                'keywords' => $meta['e_keywords'],
                'description' => $meta['e_description'],
                ),$toHead);
        else
            $this->pushMeta(array('title' => $this->model->ownerName),$toHead);
    }
    
    public function pushFakeMeta($typeKeywords='',$meta=array(),$toHead=true)
    {
        foreach(array('title','keywords','description') as $field) {
            if (!isset($meta[$field])) {
                switch ($field) {
                case 'title'      : $meta[$field] = $this->model->ownerName; break;
                case 'description': $meta[$field] = $this->model->contentShort; break;
                case 'keywords'   : 
                    $keywords = null;
//                    switch ($typeKeywords) {
//                    case 'tag':
//                        $keywords = '';
//                        if ( $tags = $this->model->tags )
//                            foreach ($tags as $t)
//                                $keywords .= ($keywords==''?'':', ').$t->t_name;
//                        break;
//                    case 'mention':
//                        $keywords = '';
//                        foreach($this->mentionList as $class=>$items)
//                            foreach($items as $item)
//                                $keywords .= ($keywords==''?'':', ').$item->ownerName;
//                        break;
//                    }
                    if (!is_null($keywords)) 
                        $meta[$field] = $keywords;
                    break;
                }
            } else
                if ($meta[$field]===false)
                    unset($meta[$field]);
        }
        $this->pushMeta($meta,$toHead);
    }
    
    public function initPageUpdater($prefixUrl,$time=300) {
        // Автообновление страниц
        if ($this->model->is_autoload) {
            $this->jsVars['autoloadIntervalUpdate'] = $time*1000;
            $this->jsVars['autoloadUrlUpdate']  = "'/$prefixUrl/checkUpdate'";
            $this->jsVars['autoloadTimeUpdate'] = "'{$this->model->dt_update}'";
            $this->includePackages[] = 'page-autoload';
        }
    }
    
    public function getDataProviderWithCounters($dataProvider=null) {
        if (is_null($dataProvider))
            $dataProvider = $this->dataProvider;
        $data = is_array($dataProvider) ? $dataProvider : $dataProvider->getData();
        /* @var $item CActiveRecord */
        if(count($data)>0) {
            $first = true;
            $dtUpdate = array();

            foreach($data as $i=>$item) {
                if ($first)
                    if ($item->hasAttribute('dt_count')) {
                        $first = false;
                        // Выбираем только те записи, которые пора обновить
                        $lastUpdate = PrefixedModel::getDtCount(); 
                    } else
                        break;
                $dt = $item->getAttribute('dt_count');
                if ($dt < $lastUpdate)
                    $dtUpdate[$i] = $dt;
            }
            if (!$first && count($dtUpdate)) {
                asort($dtUpdate);
                reset($dtUpdate);
                while (list($i,$dt) = each($dtUpdate)) {
                    $item = $data[$i];
                    if ( ! $item->updateViewCount()) break;
                }
            }
        }
        PrefixedModel::canViewCountUpdate(false);
        return $dataProvider;
    }
 
    public static function flash($flash,$template='{flash}') {
        if (Yii::app()->user->hasFlash($flash)) {
            return str_replace('{flash}',Yii::app()->user->getFlash($flash),$template);
        } else
            return '';
    }
	
	public function lastProjects(){
		$pjs = Projects::model()->with('media')->findAll();
		
		if ($pjs)
			foreach ($pjs as $pj)
		{
			echo '<article class="recent-projects-item">';
			echo '<div class="recent-projects-picture">';
            if ($pj->media){
			foreach ($pj->media as $mediaItem){
			    echo '<img src="'.$mediaItem->getMediaUrl('original').'" alt="">';
				break;
				}
			
            } else
                    $image = '';
			echo '';
		echo '
      </div>
      <div class="recent-projects-content">
        <div class="recent-projects-content-inner">';
          echo '<h3 class="recent-projects-title">'.$pj->pr_name.'</h3>';
echo '<p><a class="button transparent" href="/works/'.$pj->pr_sef.'">подробнее</a></p>';
        echo '</div>
      </div>
    </article>';
		}
	}
	
	public function showClients(){
		$pjs = Client::model()->with('media')->findAll();
		
		if ($pjs)
			foreach ($pjs as $pj)
		{
			echo '          <div class="item">
            <div class="clients-item">
              <div class="clients-picture">';

            if ($pj->media){
				$media = $pj->media;
				$image = CHtml::image($media->getMediaUrl()
                                    ,$media->i_alt
                                    ,array('title'=>$media->i_name,
                                           'alt' => $media->i_alt,
                        //                   'width'=>'150',
                        //                   'height'=>'100')
                                        ));

			} else { $image = ''; }
			echo $image;
		echo '
      </div>
        </div>
      </div>';
		}
	}
	
	public function showPjs_old($prid){
		$pjs = Plist::model()->with('media')->FindAllByAttributes(array('pl_project_id'=>$prid));
		$i = 0;
		$count = count($pjs);
		
		//one
		if ($count == 1)
		{
		foreach ($pjs as $pj)
		{
			if ($i == 0)
				echo '<div class="col-md-6">';
			
			if ($pj->pl_title){
				echo '<h3 data-number="02" class="example-title">';
				echo $pj->pl_title;
				echo '</h3>';
			}
			if ($pj->content_long){
				echo '<p class="example-text">';
				echo $pj->content_long;
				echo '</p>';
			}
			
			echo '<div class="example-picture project-six example-2">';
			echo '';
            if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    $image = '';
			echo $image;

			echo '<div class="picture-popup project-six i2">';
			echo '<div class="picture-popup-inner">';
			echo '<p class="picture-popup-text">';
			echo $pj->pl_big_text;
			echo '<span class="picture-popup-note">';
			echo $pj->pl_small_text;
			echo '</span>';
			echo '</p>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';

			
		}			
		}
		//two
		if ($count == 2) {
		if ($pjs)
		foreach ($pjs as $pj)
		{
			if ($i == 0) {
			echo '<div class="col-md-6">
        <h3 data-number="02" class="example-title" style="margin-top: 14px;">';
          echo $pj->pl_title;
        echo '</h3>
        <p class="example-text">';
          echo $pj->content_long;
        echo '</p>
		</div>';
		}
		if ($i == 1){
		echo '<div class="col-md-6">
        <div class="example-picture project-two example-1">';
            if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    $image = '';
			echo $image;
          echo '<div class="picture-popup project-two i1">
            <div class="picture-popup-inner">
              <p class="picture-popup-text">';
                echo $pj->pl_big_text;
              echo '</p>
            </div>
          </div>
          <div class="picture-popup project-two i2">
            <div class="picture-popup-inner">
              <p class="picture-popup-text">';
                echo $pj->pl_small_text;
              echo '</p>
            </div>
          </div>
        </div>
      </div>';
		}
		$i++;
			
		}
		}
		////////////////////////////////three
		if ($count == 3)
		{
		foreach ($pjs as $pj)
		{
		//	if ($i == 0){
		//		$num = 2;
		//	} elseif ($i == 1) {
		//		$num = 1;
		//	}
			
		if ($i == 0) {
			
			echo '<div class="col-md-6">';
			echo '<h3 data-number="02" class="example-title">';
			echo $pj->pl_title;
			echo '</h3>';
			echo '<p class="example-text">';
            echo $pj->content_long;
			echo '</p>
        <div class="example-picture project-three example-2">';

		    if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    echo '';
			

          echo '<div class="picture-popup project-three i1">
            <div class="picture-popup-inner">
              <p class="picture-popup-text">';
                echo $pj->pl_big_text;
              echo '</p>
            </div>
          </div>
        </div>
      </div>';
		}
		
      
	  	if ($i == 1){
		echo '<div class="col-md-6">';
        echo '<div class="example-picture project-three example-1">';
			if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
			echo '';
        echo '</div>';
		}
		
		if ($i == 2){
        echo '<div class="example-picture project-three example-3">';
          	if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    echo '';
            
          echo '<div class="picture-popup project-three i2">
            <div class="picture-popup-inner">
              <p class="picture-popup-text">';
                echo $pj->pl_big_text;
              echo '</p>
            </div>
          </div>
        </div>
      </div>';

		}
		
		
		$i++;
			
		}
		}
		
		/////////////count 5
		if ($count == 4)
		{
			foreach ($pjs as $pj)
			{
		echo '<div class="col-md-6">';
		
		if ($i = 0) {
		
        echo '<h3 data-number="02" class="example-title">';
        echo $pj->pl_title;
        echo '</h3>
        <p class="example-text">';
           echo $pj->content_long;
        echo '</p>
        <div class="example-picture project-six example-2">';
            if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    echo '';
        echo '  <div class="picture-popup project-six i2">
            <div class="picture-popup-inner">
              <p class="picture-popup-text">';
                echo $pj->pl_big_text;
                echo '<span class="picture-popup-note">';
                  echo $pj->pl_small_text;
                echo '</span>
              </p>
            </div>
          </div>
        </div>';
		}
		if ($i = 1) {
        echo '<div class="example-picture project-six example-4">';
            if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    echo '';
          echo '<div class="picture-popup project-six i4">
            <div class="picture-popup-inner">
              <p class="picture-popup-text">';
                echo $pj->pl_big_text;
                echo '<span class="picture-popup-note">';
                  echo $pj->pl_small_text;
                echo '</span>
              </p>
            </div>
          </div>
        </div>
      </div>';
		}
		
      echo '<div class="col-md-6">';
	  if ($i = 2) {
        echo '<div class="example-picture project-six example-1">';
            if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    echo '';
        echo '</div>';
	  }
	  if ($i = 3) {
        echo '<div class="example-picture project-six example-3">';
            if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    echo '';
            
          echo '<div class="picture-popup project-six i3">
            <div class="picture-popup-inner">
              <p class="picture-popup-text">';
                echo $pj->pl_big_text;
              echo '</p>
            </div>
          </div>
        </div>';
	  }
	  
	  if ($i = 4) {
        echo '<div class="example-picture project-six example-5">';
            if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    echo '';
            
          echo '<div class="picture-popup project-six i5">
            <div class="picture-popup-inner">
              <p class="picture-popup-text">';
                echo $pj->pl_big_text;
              echo '</p>
            </div>
          </div>
        </div>
      </div>';
	  }
		$i++;
		}
		
		}
		
		
		/////////////count 4
		/*
		if ($count == 4)
		{
		foreach ($pjs as $pj)
		{
			if ($i == 0){
				$num = 2;
			} elseif ($i == 1) {
				$num = 1;
			}
			
		if ($i == 0) {
			
			echo '<div class="col-md-6">';
			echo '<h3 data-number="02" class="example-title">';
			echo $pj->pl_title;
			echo '</h3>';
			echo '<p class="example-text">';
            echo $pj->content_long;
			echo '</p>
        <div class="example-picture project-three example-2">';

		    if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    $image = '';
			echo $image;

          echo '<div class="picture-popup project-three i1">
            <div class="picture-popup-inner">
              <p class="picture-popup-text">';
                echo $pj->pl_big_text;
              echo '</p>
            </div>
          </div>
        </div>
      </div>';
		}
		
      echo '<div class="col-md-6">';
	  	if ($i == 1){
        echo '<div class="example-picture project-three example-1">';
			if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    $image = '';
			echo $image;
        echo '</div>';
		}
		
		if ($i == 2){
        echo '<div class="example-picture project-three example-3">';
          	if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    $image = '';
			echo $image;
          echo '<div class="picture-popup project-three i2">
            <div class="picture-popup-inner">
              <p class="picture-popup-text">';
                echo $pj->pl_big_text;
              echo '</p>
            </div>
          </div>
        </div>
      </div>';

		}
		
		
		$i++;
			
		}
		}
		*/
	}
	
	public function showSingleProject($prid){
		$pjs = Plist::model()->with('media')->FindAllByAttributes(array('pl_project_id'=>$prid));
		$i = 0;
		
		if ($pjs)
			foreach ($pjs as $pj)
		{
			if ($i == 0)
				echo '<div class="col-md-6">';
			
			if ($pj->pl_title){
				echo '<h3 data-number="02" class="example-title">';
				echo $pj->pl_title;
				echo '</h3>';
			}
			if ($pj->content_long){
				echo '<p class="example-text">';
				echo $pj->content_long;
				echo '</p>';
			}
			
			echo '<div class="example-picture project-six example-2">';
			echo '';
            if ($pj->media){
				$media = $pj->media;
			    echo '<img src="'.$media->getMediaUrl('original').'" alt="">';
            } else
                    echo '';

			echo '<div class="picture-popup project-six i2">';
			echo '<div class="picture-popup-inner">';
			echo '<p class="picture-popup-text">';
			echo $pj->pl_big_text;
			echo '<span class="picture-popup-note">';
			echo $pj->pl_small_text;
			echo '</span>';
			echo '</p>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';

			
		}
	}
	
	public function showTopCategoriesMain(){
		$categories = Category::model()->with('children','parent')->findAll(array('condition'=>'t.c_pid IS NULL', 'order'=>'t.c_name ASC'));
		//print_r($categories,true);
		
		foreach ($categories as $cat){
			
			echo '<div class="b-index-categories__block">
                                <div class="b-block">
                                    <svg class="b-index-categories__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#static--svg--sweater"/>
                                    </svg>
                                    <h3 class="b-index-categories__title">'.$cat->c_name.'</h3>
                                </div>';
                                //$this->getMainChildsC($cat->cid);
								//echo print_r($child_cat,true);
								
					foreach ($cat->children as $child_cat){
						//get products
						$product = Product::model()->find('t.pd_category='.$child_cat->cid);
						if ($product)
						{
						//
						echo '<ul class="b-index-categories__list">
							<li class="b-index-categories__list_item">
                            <a href="category/'.$child_cat->parent->c_sef.'/'.$child_cat->c_sef.'" class="js-ga-onclick" data-event-category="Catalog" data-event-action="Open from home" data-event-label="category/'.$child_cat->c_sef.'">
                                '.$child_cat->c_name.'
                            </a>
							</li>
						</ul>';
					}
					}
                echo '</div>';
		}
	}
	
	public function getMainChildsC($cid){
		$cats = Category::model()->FindAllByAttributes(array('c_pid'=>$cid));
		
		foreach ($cats as $cat){
			echo '<ul class="b-index-categories__list">
                        <li class="b-index-categories__list_item">
                            <a href="/'.$cat->c_sef.'" class="js-ga-onclick" data-event-category="Catalog" data-event-action="Open from home" data-event-label="/'.$cat->c_sef.'">
                                '.$cat->c_name.'
                            </a>
                        </li>
                </ul>';
		}
	}
	
	public function mainBrands(){
		$brand = Client::model()->with('media')->findAll(array('condition'=>'t.cl_media_id IS NOT NULL','limit'=>18));
		foreach ($brand as $br){
			echo '<li class="b-brands__item">
                            <a href="brands/'.$br->cl_sef.'" class="b-brands__link">';
            //                    <img class="b-brands__img" src="uploads/brands/brand_0028_only.png" alt="ONLY"/>
$media = $br->media;
		if ($media){
                $image = CHtml::image($media->getMediaUrl()
                    ,$media->i_alt
                    ,array('title'=>$media->i_name,
                           'class'=>'b-brands__img',
							'style' => 'min-height:129px;min-width:180px;max-height: 129px;',

//                           'position'=>'absolute',
//                           'top' => '0px',
//                           'left' => '-498px',
//                           'slidedirection' => 'fade',
//                           'slideoutdirection' => 'fade',
//                           'durationin' => 1500,
//                           'durationout' => 1500,
//                           'easingin' => 'easeInBack',
//                           'easingout' => 'easeInOutQuint',
//                           'delayin' => 3000,
//                           'delayout' => 0,
//                           'showuntil' => 0,
        //                   'width'=>'150',
        //                   'height'=>'100')220x151
                ));
            } else{
                $image = '';
            }
			echo $image;
            echo '</a>
                        </li>';
		}
	}
	
	//get vip records on main page
	public function mainVips(){
		$vips = Product::model()->with('media','brand','category')->vip()->findAll(array('limit'=>15));
		foreach ($vips as $v){
			echo '<li class="b-catalog__item" id="b-catalog__item-5609173" >
            <a class="b-catalog__link js-ga-onclick2 "
       href="product/'.$v->category->parent->c_sef.'/'.$v->pd_sef.'"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5609173"
       title="'.$v->pd_name.'">';
	   $media = $v->media;
		if ($media){
                $image = CHtml::image($media->getMediaUrl()
                    ,$media->i_alt
                    ,array('title'=>$media->i_name,
                           'class'=>'b-catalog__img js-lazy-img',
							'style' => '',
                ));
            } else{
                $image = '';
            }
	   echo $image;
	   echo '<noscript>';
       echo $image;
       echo '</noscript>

        

        <span class="b-catalog__details">'.
            $v->content_long
            .'<span class="b-catalog__details_city"></span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">'.$v->size->name.'</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">'.$v->brand->cl_name.'</span>

            

            <span class="b-catalog__price" style="color: #bfff00;">
                    '.$v->pd_price.'
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li>';
		}
	}
        
        
        ///////get colors list
        public function getColors(){
            return $data = [
               0 => array('cpid'=>0, 'cp_name'=> 'Белый', 'cp_rgb' => 'rgb(255, 255, 255)'),
               1 => array('cpid'=>1, 'cp_name'=> 'Серебристый', 'cp_rgb' => 'rgb(237, 238, 240)'),
               2 => array('cpid'=>2, 'cp_name'=> 'Бежевый', 'cp_rgb' => 'rgb(246, 230, 209)'),
               3 => array('cpid'=>3, 'cp_name'=> 'Серый', 'cp_rgb' => 'rgb(167, 167, 167)'),
               4 => array('cpid'=>4, 'cp_name'=> 'Жёлтый', 'cp_rgb' => 'rgb(255, 246, 51)'),
               5 => array('cpid'=>5, 'cp_name'=> 'Золотистый', 'cp_rgb' => 'rgb(255, 225, 51)'),
               6 => array('cpid'=>6, 'cp_name'=> 'Оранжевый', 'cp_rgb' => 'rgb(255, 184, 51)'),
               7 => array('cpid'=>7, 'cp_name'=> 'Розовый', 'cp_rgb' => 'rgb(255, 51, 153)'),
               8 => array('cpid'=>8, 'cp_name'=> 'Красный', 'cp_rgb' => 'rgb(217, 91, 51)'),
               9 => array('cpid'=>9, 'cp_name'=> 'Бирюзовый', 'cp_rgb' => 'rgb(197, 229, 237)'),
               10 => array('cpid'=>10, 'cp_name'=> 'Синий', 'cp_rgb' => 'rgb(51, 149, 210)'),
               11 => array('cpid'=>11, 'cp_name'=> 'Хаки', 'cp_rgb' => 'rgb(158, 155, 107)'),
               12 => array('cpid'=>12, 'cp_name'=> 'Зелёный', 'cp_rgb' => 'rgb(89, 175, 95)'),
               13 => array('cpid'=>13, 'cp_name'=> 'Фиолетовый', 'cp_rgb' => 'rgb(154, 51, 155)'),
               14 => array('cpid'=>14, 'cp_name'=> 'Коричневый', 'cp_rgb' => 'rgb(133, 93, 51)'),
               15 => array('cpid'=>15, 'cp_name'=> 'Чёрный', 'cp_rgb' => 'rgb(0, 0, 0)'),
               16 => array('cpid'=>16, 'cp_name'=> 'Разноцветный', 'cp_rgb' => 'linear-gradient(rgb(255, 237, 36), rgb(66, 255, 110), rgb(121, 149, 255));'),
            ];
        }
        
        
        ///////get colors list
        public function getStates(){
            return $data = [
               0 => array('stid'=>0, 'st_name'=> 'Новое'),
               1 => array('stid'=>1, 'st_name'=> 'Идеальное'),
               2 => array('stid'=>2, 'st_name'=> 'Хорошее'),
            ];
        }

        
        //set messages is readed in dialogs
        public function setReadedMessages($user_id,$dialog_id)
        {
            $message_list = Messages::model()->findAllByAttributes(array('ms_dlg'=>$dialog_id,'ms_recipient'=>$user_id));
            if (!empty($message_list))
            {
                foreach ($message_list as $messages => $message) {
                    $message->ms_readed = 1;
                    $message->save();
                }
            }
        }
}