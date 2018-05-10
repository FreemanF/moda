<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to 'column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='main';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();

    private $routeCurrent;
    
    public  $jsVars=array(); // Список js-переменных для инициализации
    public  $includePackages=array(); // Список пакетов подключаемых в layouts/main
    
    public  $themeBase;
    private $_themeUrl;
    private $_themeJs;
    private $_themeCss;
    private $_themeImages;
        
    public function __construct($id, $module = null, $themeName='') {
        parent::__construct($id, $module);
        if (empty($themeName))
            $themeName = 
                isset(Yii::app()->params['themeFrontEnd']) 
                ? Yii::app()->params['themeFrontEnd'] : '';
        $this->initTheme($themeName);
        
        if (!Yii::app()->name){
            Yii::app()->name = ucfirst(Yii::app()->request->serverName);
        }
    }
    
    protected function initTheme($themeName) {
        Yii::app()->theme = $themeName;
        
        $this->themeBase = 'theme_'.Yii::app()->theme->name;
        $cs = Yii::app()->clientScript;
        $this->includePackages = array(
            'studio', // скрипты и css общие и для FrontEnd и для BackEnd
            $this->themeBase);
        $this->themeBase .= '_';
        
        $this->_themeUrl = CHtml::asset(Yii::getPathOfAlias('webroot.themes.'.Yii::app()->theme->name.'.assets')).'/';
        $this->_themeJs     = $this->_themeUrl.'js/';
        $this->_themeCss    = $this->_themeUrl.'css/';
        $this->_themeImages = $this->_themeUrl.'images/';
        $cs->registerScript('themeurl',"themeUrl = '".$this->_themeUrl."';", CClientScript::POS_END);
    }
    
    public function getThemeUrl() {
        return $this->_themeUrl;
    }
    
    public function getThemeJs() {
        return $this->_themeJs;
    }
    
    public function getThemeCss() {
        return $this->_themeCss;
    }
    
    public function getThemeImages() {
        return $this->_themeImages;
    }
    
    public function makeMenuItem($label,$url,$role='')
    {
        if (is_null($this->routeCurrent)) {
            $this->routeCurrent = '';
            if ($this->module !== null) {
                $this->routeCurrent .= sprintf('%s/', $this->module->id);
            }
            $this->routeCurrent .= sprintf('%s/%s', $this->id, $this->action->id);
        }
        $active = false;
        settype($url,'array');
        foreach ($url as $route) {
            if ($route==$this->routeCurrent) {
                $active = true;
                break;
            }
        }
        if (! $active && (empty($role) || Yii::app()->user->checkAccess($role)))
            $this->menu[] = array('label'=>$label, 'url'=>array($url[0]), 'visible' => ! $active);
    }

    public function makeMenu() {
        $isGuest = Yii::app()->user->isGuest;
        $menuitem = array(
            'label' =>     $isGuest ? 'Вход' : '<i class="icon-photon key_stroke"></i>
                                  <span class="nav-selection">Выход [ '.Yii::app()->user->name.' ]</span>',
            'url' => array('admin/user/'.($isGuest ? 'login' : 'logout')),
        );
        if (!empty($this->menu)){
            $menuitem['template'] = '{menu}';
            //$menuitem['itemOptions'] = array('class'=>'nav-logout');
        }
        $this->menu[] = $menuitem;
        if ( $isGuest )
            $this->menu[] = array('label'=>'Регистрация','url'=>array('admin/user/registration'));
    }
    
    public function checkReferrer($request=null,$redirect=true) {
        if (is_null($request))
            $request = Yii::app()->request;
        $len = strlen($host=$request->hostInfo);
        if ($ref=$request->urlReferrer) {
            if (substr($ref,0,$len)!=$host)
                if ($redirect)
                    $request->redirect($host);
                else return $redirect;
        } else
            if ($redirect)
                $request->redirect($host);
            else return $redirect;
        return $ref;
    }
	
//	protected function afterRender($view, &$output) {
//		parent::afterRender($view,$output);
		//Yii::app()->facebook->addJsCallback($js); // use this if you are registering any additional $js code you want to run on init()
//		Yii::app()->facebook->initJs($output); // this initializes the Facebook JS SDK on all pages
		//Yii::app()->facebook->renderOGMetaTags(); // this renders the OG tags
//    return true;
//	}

}
