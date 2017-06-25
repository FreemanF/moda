<?php

/**
 * @property TranslateBehavior $ml
 */

class Menu extends CActiveRecord{

    const TYPEMENU   =  Object::idMenu;
    const TYPEKIND   =  Object::idKind;
    //const TYPEUSES   =  Object::idUses;
//    const TYPEUSER   =  4;
//    
    const MENUTOP    =  1;
    const KINDTOP    =  2; // Верхний иерархический уровень типов продукта
    const USESTOP    =  3;
//    const MENUINFO   =  6;
//    const MENUSRV    = 10;
//    
//    const HEADSEASON = 14;
//    const HEADSTYLE  = 19;
//    
//    const BLOGMAIN   = 23;
//    
//    const USERMAIN   = 28;
    
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
        //Yii::log('MENU:'.$this->mid.' SEF:'.$this->m_sef);
        return $this->page ? '/'.$this->page->p_sef : (
               $this->m_sef ? $this->m_sef : $default);
    }
    
    public function getOwnerSef($default=null)
    {
        return $this->getUrl( !is_null($default) ? $default :
            ($this->m_type==Menu::TYPEMENU
            ? 'javascript:void(0);' : '#'));
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
            array('m_descr', 'safe'),
            array('m_image', 'length', 'max'=>255),
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
            'DisableDefaultScopeBehavior',
            'ml'=>array(
                'class'=>'TranslateBehavior', 
                'localizedAttributes'=>array('m_name','m_descr',), 
                ),
            'LogBehavior',
            'PrefixedModel' => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope() {
        // чтобы нормально подключались parent & children
        $this->ml->nextAliases();
        
        $alias = $this->getTableAlias(false,false);
        $scope = array('order'=>"$alias.m_pid,$alias.m_sort,$alias.mid");
        if ($this->defaultScopeDisabled)
            return $this->ml->multilangCriteria($scope);
        //Yii::log('notDefaultScopeDisabled:'.get_class($this));
        return $this->ml->localizedCriteria($scope);
        //return $scope;
    }

    public function scopes() {
        return array(
            'setType' => array(),
            'setParent' => array()
        );
    }

//    public function Descend() {
//        $alias = $this->getTableAlias(false, false);
//        $this->getDbCriteria()->mergeWith(array(
//            'order' => "$alias.m_pid DESC,$alias.m_sort,$alias.mid"
//        ));
//        return $this;
//    }
    
    public function setType($type) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => $this->getTableAlias(false, false).'.m_type='.$type,
        ));
        return $this;
    }

    public function setParent($pid) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => $this->getTableAlias(false, false).'.m_pid='.$pid,
        ));
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
    
    public function getlist($type) {
        
        $dir = intval(Yii::app()->request->getParam('dir'));
        $checkdir = Yii::app()->request->isPostRequest && $dir
            ? '='.$dir : ' IS NULL';
        $current = $dir ? Menu::model()->setType($type)->find(array('select'=>'m_pid','condition'=>'mid='.$dir)) : null;

        $data = array();
        if ($dir && $current) { // родительская папка
            //Yii::log('01');
            $menu = new Menu();
            //Yii::log('02');
            // Ссылаться на корзину могут только верхние удалённые узлы
            $menu->mid      = $current->parent ? intval($current->m_pid) : 0;
            $menu->m_pid    = 0;
            $menu->m_name_ru = '<..>';
            $menu->m_name_en = '<..>';
            $menu->m_sef    = 'Родительское меню';
            $menu->classSort = 'folder_previous';
            $data[] = $menu;
        }
        
        // Список меню
        //Yii::log(1);
        $pModel = Menu::model()->multilang()->setType($type)->with('children');
        $data = array_merge($data,$pModel->findAll(array(
            'condition'=> 't.m_pid'.$checkdir,
            'order' => 't.m_sort, t.mid'
        )));
//        foreach($data as $item) {
//            Yii::log('m_name_ru'.$item->m_name_ru);
//            Yii::log('m_name_en'.$item->m_name_en);
//        }
//        Yii::log(2);
        return new CArrayDataProvider($data,array('pagination'=>false));
    }
    
    function getImage() {
        return $this->dir && empty($this->m_level) // empty($this->children)
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
        if (empty($this->dir))
            return false;
        $can_delete = $this->can_delete;
        if (empty($can_delete)) return false;
        if ($can_delete=='*') return true;
        return Yii::app()->user->checkAccess($can_delete);
    }
 
    function getLinkUpdateButton() {
        //if ($this->primaryKey > 0)
        //    return '/admin/page/update?id='.$this->primaryKey;
        //else
            return '#';
    }
    
    static public function getCachedMenuId($parent,$sef) {
        $menus = Yii::app()->cache->get('menu:'.$parent);
        if ($menus===false || !is_array($menus))
            $menus=array();
        if (!isset($menus[$sef])) {
            $menu = Menu::model()->find(array(
                'condition'=>'m_pid=:pid AND m_sef=:sef',
                'params'=>array('pid'=>$parent,'sef'=>$sef),
                'select'=>'mid'));
            if (is_null($menu))
                throw new Exception('Неизвестная рубрика '.$sef);
            $menus[$sef] = $menu->mid;
            Yii::app()->cache->set('menu:'.$parent, $menus);
        }
        return $menus[$sef];
    }
    
    static public function getMenu($parent,$category=false) {
        $list = Menu::model()->findAll('m_pid='.$parent.($category?' and m_type='.$category:''));
        if ($category)
            return CHtml::listData ($list, 'mid', 'm_name');
        else
            return $list;
    }
    
//    static public function makeLink($look, $menu, $parent){
//         $link = new LinkLM();
//         $link->look_id = $look;
//         $link->menu_id = $menu;
//         $link->menu_parent = $parent;
//         $link->save();
//    }
//    
//    static public function dropLink($look, $menu, $parent){
//        if ($link = LinkLM::model()->find(
//                 'look_id=:l AND menu_id=:m AND menu_parent=:p', 
//                 array('l'=>$look,'m'=>$menu,'p'=>$parent)))
//            $link->delete();
//    }
    
}