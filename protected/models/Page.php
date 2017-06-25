<?php

class Page extends CActiveRecord{

    public  $maxSort = 0;
    private $_classSort;
    public  $inTrash;
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__){
            return parent::model($className);
    }

    public function getId() {
        return $this->primaryKey;
    }

    public function getDir($prefix='',$makeRoot=false) {
        return $prefix.$this->p_dir;
    }

    public function getOwnerUrl($lang=null) { // sitemap-page-1
        //return '/'.(is_null($lang) ? Yii::app()->language:$lang).'/'.$this->p_sef;
        return '/'.($this->p_sef=='index' ? '' : $this->p_sef);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{page}}';
    }

    public function rules() {
        return array(
            array('p_name', 'required'),
            array('p_name', 'unique', 'message'=>'Страница с таким Названием уже существует.'),
            array('p_sef', 'match', 'pattern'=>'/^[\w\d\_\-]*$/', 'message'=>'URL содержит недопустимые символы'),
            array('p_sef', 'unique', 'message'=>'Страница с таким URL уже существует.'),
            array('is_published, noindex, nofollow', 'boolean'),
            $this->humanDateRule(),
            array('p_dir,content_type', 'numerical', 'integerOnly'=>true),
            array('content_orig,content_long', 'length', 'max' => 65534),
        );
    }
    
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'parent'   => array(self::BELONGS_TO, 'Folder', 'p_dir'),
            'meta' => array(self::BELONGS_TO, 'Meta', 'p_meta'),
        );
    }
        
    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'MetaBehavior',
            'ContentBehavior',
            'DateBehavior',
            'LogBehavior',
            'PrefixedModel' => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        $level = $this->getDefaultScopeDisabled();
        $scope = array();
        // По умолчанию (frontend) должны разрешать все условия
        if ($level===DisableDefaultScopeBehavior::SCOPE_FRONTEND) 
            $scope['condition']='is_published>0';
        // В админке (backend) показываем всё
        return $scope;
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels(){
        return array(
            'pid'          => 'ID',
            'p_name'       => 'Заголовок страницы',
            'p_sef'        => 'URL',
            'content_orig' => 'Текст',
            'content_type' => 'Редактор',
            'content_long' => 'Текст',
            'is_published' => 'Опубликована',
            'noindex'      => 'Индексировать страницу поисковыми роботами?', // 'Robots Meta NOINDEX',
            'nofollow'     => 'Учитывать ссылки на странице поисковыми роботами?', // 'Robots Meta NOFOLLOW',
            'dt_start'     => 'Начало публикации',
            'humanDate'    => 'Начало публикации',
            'p_meta'       => 'id meta-тэгов',
        );
    }
    
    public function search() {
        
        $criteria = new CDbCriteria;
        $criteria->compare('p_dir', 
              Yii::app()->request->isPostRequest
            ? intval(Yii::app()->request->getParam('dir'))
            : 0);
        
        $criteria->order = 'p_sort, pid';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function getlist() {
        
        $dir = Yii::app()->request->getParam('dir');
        $trash = $dir==='trash';
        $dir = intval($dir);
        $checkdir = Yii::app()->request->isPostRequest && $dir
            ? ' = '.$dir : ' IS NULL';
        $data = array();
        $current = $dir ? Folder::model()->with('parent')->find(array(
                'select'=>'t.f_pid,t.is_delete,parent.is_delete','condition'=>'t.fid='.$dir
            )) : null;
        
        $this->inTrash = $trash || ($dir && $current && $current->is_delete);
        
        if ($trash || ($dir && $current)) { // родительская папка
            $page = new Page();
            // Ссылаться на корзину могут только верхние удалённые узлы
            $page->pid = $trash ? 0 : ( // Дальше суперусловие :)
                    $current->is_delete==0 || ($current->parent && $current->parent->is_delete) 
                    ? - intval($current->f_pid)
                    : 'trash' );
                
                //$current ? ($current->parent && $current->parent->is_delete ? 'trash' : -intval($current->f_pid)) : 0;
            $page->p_dir    = 0;
            $page->p_name   = '<..>';
            $page->p_sef    = 'Папка';
            $page->dt_start = null;
            $page->is_published = true;
            $page->classSort = 'folder_previous';
            $data[] = $page;
        }
        
        // Список папок
        $fModel = Folder::model();
        if ($trash) $fModel->with('parent');
        foreach($fModel->findAll(array(
                'condition'=> 't.is_delete'.($this->inTrash ? '>0' : '=0').' AND (t.f_pid'.$checkdir.($trash ? ' OR parent.is_delete=0' : '').')',
                'order' => 't.f_sort, t.fid'
        )) as $folder) {
            $page = new Page();
            $page->pid      = - $folder->primaryKey;
            $page->p_dir    = $folder->f_pid;
            $page->p_name   = $folder->f_name;
            $page->p_sef    = 'Папка';
            $page->dt_start = null;
            $page->is_published = true;
            $page->can_delete   = $folder->can_delete;
            $page->is_delete    = $folder->is_delete;
            $page->classSort    = 'folder_sort';
            $data[] = $page;
        };
        
        // Список страниц
        $pModel = Page::model();
        if ($trash) $pModel->with('parent');
        $data = array_merge($data,$pModel->findAll(array(
            'condition'=> 't.is_delete'.($this->inTrash ? '>0' : '=0').' AND (t.p_dir'.$checkdir.($trash ? ' OR parent.is_delete=0' : '').')',
            'order' => 'p_sort, pid'
        )));
        //Yii::log('COUNT: '.count($data));
        return new CArrayDataProvider($data,array('pagination'=>false));
    }
    
    function getImage() {
        return $this->primaryKey>0 
                ? '<ins class="jstree-page"></ins>'
                : '<ins class="jstree-folder"></ins>';
    }
    
    function getClassSort() {
        if ($this->_classSort===null)
            $this->_classSort = $this->primaryKey>0 ? 'item_sort':
                ($this->primaryKey<0 ? 'folder_sort' : 'folder_previous');
        return $this->_classSort;
    }
    
    function setClassSort($classSort) {
        $this->_classSort = $classSort;
    }
    
    function getCanDelete() {
        //return true;
        $can_delete = $this->can_delete;
        if (empty($can_delete)) return false;
        if ($can_delete=='*') return true;
        return Yii::app()->user->checkAccess($can_delete);
    }
    
    function getLinkUpdateButton() {
        if ($this->is_delete && $this->primaryKey)
            return '';
            //return '/admin/page/restore?id='.$this->primaryKey;
        else
            if ($this->primaryKey > 0)
                return '/admin/page/update?id='.$this->primaryKey;
            else
                return '#';
    }

    public function scopes() {
        return array(
            'published' => array(),
        );
    }
    
    public function published() {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 't.is_published=1 AND t.is_delete=0',
        ));
        return $this;
    }
}