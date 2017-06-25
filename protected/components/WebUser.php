<?php

class WebUser extends CWebUser {
    private $_model = null;
 
    function getRole() {
        
        if($user = $this->getModel()){
            // в таблице User есть поле role
            if ($user->checkAccess('admin')) return 'admin';
            return 'guest';
        }
    }
 
    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = User::model()->findByPk($this->id, array('select' => 'username'));
        }
        return $this->_model;
    }
}