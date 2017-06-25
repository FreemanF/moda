<?php

class Menu extends CActiveRecord{

    public  $maxSort = 0;
    private $_classSort;
    
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
        return $this->m_pid;
    }

    public function getUrl($default='javascript:void(0);') {
        return $this->page ? '/'.$this->page->p_sef : (
               $this->m_sef ? $this->m_sef : $default);
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{menu}}';
    }

    public function rules() {
        return array(
            array('m_name', 'required'),
        );
    }
    
    public function relations() {
        return array(
            'parent'   => array(self::BELONGS_TO, 'Menu', 'm_pid'),
            'children' => array(self::HAS_MANY  , 'Menu', 'm_pid'), //, 'order' => 'children.m_sort ASC'),
            'page'     => array(self::BELONGS_TO, 'Page', 'm_page_id'),
        );
    }
        
    public function behaviors()
    {
        return array(
            'LogBehavior',
            'PrefixedModel' => array('class'=>'PrefixedModel'),
        );
    }
    
    public function disableDefaultScope()
    {
        // заглушка для индексной страницы
        return $this;
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels(){
        return array(
            'mid' => 'ID:',
            'm_name' => 'Название пункта меню:',
        );
    }
    
    public function getlist() {
        
        $dir = intval(Yii::app()->request->getParam('dir'));
        $checkdir = Yii::app()->request->isPostRequest && $dir
            ? '='.$dir : ' IS NULL';
        $current = $dir ? Menu::model()->find(array('select'=>'m_pid','condition'=>'mid='.$dir)) : null;

        $data = array();
        if ($dir && $current) { // родительская папка
            $menu = new Menu();
            // Ссылаться на корзину могут только верхние удалённые узлы
            $menu->mid      = $current->parent ? intval($current->m_pid) : 0;
            $menu->m_pid    = 0;
            $menu->m_name   = '<..>';
            $menu->m_sef    = 'Родительское меню';
            $menu->classSort = 'folder_previous';
            $data[] = $menu;
        }
        
        // Список меню
        $pModel = Menu::model()->with('children');
        $data = array_merge($data,$pModel->findAll(array(
            'condition'=> 't.m_pid'.$checkdir,
            'order' => 't.m_sort, t.mid'
        )));
        return new CArrayDataProvider($data,array('pagination'=>false));
    }
    
    function getImage() {
        return $this->dir && empty($this->children)
            ? '<ins class="jstree-page"></ins>'
            : '<ins class="jstree-folder"></ins>';
    }
    
    function getClassSort() {
        if ($this->_classSort===null)
            $this->_classSort = $this->primaryKey 
                ? ($this->dir ? 'item_sort' : 'folder_sort')
                : 'folder_previous';
        return $this->_classSort;
    }
    
    function setClassSort($classSort) {
        $this->_classSort = $classSort;
    }
    
    function getCanDelete() {
        return !empty($this->dir);
    }
 
    function getLinkUpdateButton() {
        //if ($this->primaryKey > 0)
        //    return '/admin/page/update?id='.$this->primaryKey;
        //else
            return '#';
    }
}