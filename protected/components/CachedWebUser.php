<?php

class CachedWebUser extends CWebUser {
    
    private $_isAdmin;
    private $_isBlogEditor;
    private $_isDBManager;
	public $gender;
    
    public static function ip2long($str_ip) {
        return sprintf("%u", ip2long(trim($str_ip)));
    }
    
    public function checkAccess($operation,$params=array(),$allowCaching=true) {
        if($allowCaching && !$this->getIsGuest() && isset(Yii::app()->session['accessrbac'][$operation])) {
            return Yii::app()->session['accessrbac'][$operation];
        }
        $checkAccess = Yii::app()->getAuthManager()->checkAccess($operation,$this->getId(),$params);
        if($allowCaching && !$this->getIsGuest()) {
            $access = isset(Yii::app()->session['accessrbac']) ? Yii::app()->session['accessrbac'] : array();
            $access[$operation] = $checkAccess;
            Yii::app()->session['accessrbac'] = $access;
        }
        return $checkAccess;
    }
    
    public function afterLogin($fromCookie) {
        if (!$fromCookie || !$this->hasState('rawip'))
            $this->setState('rawip', self::ip2long($_SERVER['REMOTE_ADDR']));
        
    }
    
//    public function getRawip() {
//        if (!$this->hasState('rawip'))
//            $this->setState('rawip', self::ip2long($_SERVER['REMOTE_ADDR']));
//        return $this->getState('rawip');
//    }
    
    public function getIsAdmin(){ //  (!!!!!!!)
        // Проверяется не модель а текущий пользователь
        if($this->_isAdmin === NULL){
            $this->_isAdmin = $this->checkAccess("Administrator");
        }
        return $this->_isAdmin;
    }
    
    public function getIsBlogEditor($checkAdmin=true){
        // Проверяется не модель а текущий пользователь
        if($this->_isBlogEditor === NULL){
            $this->_isBlogEditor = $this->checkAccess("BlogEditor");
        }
        return $this->_isBlogEditor || ($checkAdmin && $this->getIsAdmin());
    }
    
    public function getIsDBManager(){
        // Может ли пользователь делать миграции
        if($this->_isDBManager === NULL){
            $this->_isDBManager = $this->checkAccess("DBManager");
        }
        return $this->_isDBManager;
    }
    
}