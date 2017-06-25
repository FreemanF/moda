<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ModuleController extends Controller
{
    static private $_modules;
    protected $_pageTitle = 'KPD панель администратора';
    protected $_actionTitle;
    protected $actionTitles = array();
        //'index' =>'Список записей',
        //'create'=>'Добавить запись',
        //'update'=>'Редактирование записи');
    private   $_currModule; // текущий модуль (Контроллер)
    private   $_cookieRetracted; // retracted - панель свёрнута
    protected $_menuItem;
    static private $_currentUser;
    protected $_h3; // Используется в редакторе страниц
    
    public function __construct($id, $module = null) {
        parent::__construct($id, $module, 
            isset(Yii::app()->params['themeBackEnd']) 
            ? Yii::app()->params['themeBackEnd'] : '');
    }

    static public function getModules() {
        if (self::$_modules===null) {
            self::$_modules = Yii::app()->cache->get('app::modules');
            if (self::$_modules===false) {
                // Строим список всех допустимых в админке модулей 
                // на основании ролей и Object[id]->have_module
                self::$_modules = array();
                foreach(Yii::app()->authManager->getItemChildren('Modules') as $moduleName=>$authItem)
                self::$_modules[$moduleName]=array('name'=>$moduleName,'description'=>$authItem->description);
                // Добавляем модули требующие персональный доступ посредством спец-ролей
                self::$_modules['ModuleTask'] = array('name'=>'TaskManager','description'=>'Расписание');
                // убираем из списка модули, у которых Object[id]->have_module == 0
                foreach(self::$_modules as $moduleName=>$role) {
                    $alias  = lcfirst(str_replace('Module', '', $moduleName));
                    //Если нет объекта под роль, Выводим ошибку в протокол //генерируется исключение
                    //это позволит на ранней стадии исправить ошибку
                    $object = Object::byAlias($alias,null);
                    if (is_null($object))
                        Yii::log("В классе Object нет объекта для роли $moduleName", CLogger::LEVEL_ERROR);
                }
                
                // Кешируем
                Yii::app()->cache->set('app::modules',self::$_modules);
            }
            
            
        }
        return self::$_modules;
    }
    
    static private function getCurrentUser(){
        if(!Yii::app()->user->id)
            Yii::app()->getRequest()->redirect('/admin/user/logout');
        if(self::$_currentUser === NULL){
            self::$_currentUser = User::model()->findByPk(Yii::app()->user->id);
            if(!self::$_currentUser->status)
                Yii::app()->getRequest()->redirect('/admin/user/logout');
        }
        return self::$_currentUser;
    }
    
    static public function grantedModules($userId=NULL,$item = array('selected'=>true))
    { 
        // Пытаемся получить доступа к модулям из кеша
        if (is_null($userId)) {
            $isOtherUser = false;
            $userId = self::getCurrentUser()->uid;
        } else
            $isOtherUser = true;
        if (!isset(Yii::app()->session['grantedmodules::'.$userId])) {
            $authManager = Yii::app()->authManager;
            $assignments = $isOtherUser 
                ? $authManager->getAuthAssignments($userId) : array();
            
            $result = array();
            $modules = self::getModules();
            foreach($modules as $name=>$role)
                if ($isOtherUser) {
                    if (isset($assignments[$role['name']]))
                        $result[$name] = $item;
                } else {
                    if ($authManager->checkAccess($role['name'],$userId))
                        $result[$name] = $item;
                }
                
            Yii::app()->session['grantedmodules::'.$userId] = $result;
        } else
            $result = Yii::app()->session['grantedmodules::'.$userId];
        return $result;
    }
    
    public function getCookieRetracted() {
        // Должна ли левая панель быть закрыта?
        if ($this->_cookieRetracted===null) 
            $this->_cookieRetracted = 
                isset($_COOKIE["jsTreeMenu"]) 
                    ? ($_COOKIE["jsTreeMenu"] == 'retracted' ? ' retracted' : '')
                    : ' retracted';
        return $this->_cookieRetracted;
    }
    
    public function getCurrModule() {
        if ($this->_currModule===null) {
            $parts = explode('/', $this->id);
            if (count($parts)>1)
                $this->_currModule = $parts[1];
            else
                $this->_currModule = 'admin';
            if ($this->_currModule == 'admin')
                $this->pageTitle = 'Главная';
        }
        return $this->_currModule;
    }
    
    public function getMenuItem() {
        if ($this->_menuItem===null) {
            // URL модулей админки совпадает с алиасами Object
            // Подавляем вывод ошибки
            $object = Object::byAlias($this->currModule,null);
            if ($object)
            $this->_menuItem = $object ? array(
                    'text'=>$object->module,
                    'icon'=>'icon-'.$object->icon,
                    )
                :   array(
                    'text'=>'Главная', 
                    'icon'=>'icon-photon home',
                    );
        }
        return $this->_menuItem;
    }
    
    // Используется в layouts/menus/breadcrumbs.php(8)
    public function getHasParent() {
        return $this->action->id != 'index';
    }
    
    // Различается для дочерних контроллеров, например для
    // place, который подчинён reclame
    public function getUrlParent() {
        return $this->currModule;
    }
    
    public function getPageTitle() {
        if ($title=$this->getActionTitle()) {
            $this->_pageTitle = $title;
            return $title;
        }
        return $this->_pageTitle;
    }
    
    public function setPageTitle($prefix='') {
        if (!empty($prefix))
            $this->_pageTitle = $prefix.' - '.$this->_pageTitle;
    }
    
    public function getActionTitle() {
        if ($this->_actionTitle===null) {
            if (isset($this->actionTitles[$this->action->id]))
                $this->_actionTitle = $this->actionTitles[$this->action->id];
            else {
                $object = Object::byAlias($this->currModule,null);
                $this->_actionTitle = '';
                switch ($this->action->id) {
                case 'index': 
                    if ($object) $this->_actionTitle = $object->module;
                    else $this->_actionTitle = $this->menuItem['text'];
                    break;
                case 'update': if ($object) 
                    $this->_actionTitle = 'Редактирование '.$object->genitive;
                    break;
                case 'create': if ($object)
                    $this->_actionTitle = 'Добавление '.$object->genitive;
                    break;
                }
            }
        }
        return $this->_actionTitle;
    }
    
    public function setActionTitle($atctionTitle) {
        $this->_actionTitle = $atctionTitle;
    }
    
    public function getH3() {
        return is_null($this->_h3) ? $this->actionTitle : $this->_h3;
    }
    
    public function makeMenu() {
        
        $this->menu = array(array(
            'label'=>"<i class='icon-photon home'></i><span class='nav-selection'>Главная</span>",
            'url'  =>'/admin'
        ));
        $access = self::grantedModules();
        foreach(Object::getLabels('module', 'alias') as $oid=>$alias)
            if (isset($access['Module'.ucfirst($alias)])) {
                $text = Object::get($oid,'module');
                $icon = 'icon-'.Object::get($oid,'icon');
                $this->menu[] = array(
                    'label'=>"<i class='$icon'></i><span class='nav-selection'>$text</span>",
                    'url'  =>'/admin/'.$alias
                );
            } //else Yii::log('User have not access to Module'.ucfirst($alias));
        // Проверяем регистрацию пользователя
        parent::makeMenu();
    }

}
