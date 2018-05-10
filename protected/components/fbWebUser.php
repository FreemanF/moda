<?php

class fbWebUser extends CWebUser {
    private $_model = null;
	private $gender = 'def';
 
    function getRole() {
        
        if($user = $this->getModel()){
            // в таблице User есть поле role
            //if ($user->checkAccess('admin')) return 'admin';
            return 'users';
        }
    }
 
    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = Users::model()->findByPk($this->id, array('select' => 'us_name'));
        }
        return $this->_model;
    }
	
	function getGender()
	{
		if($this->model !== null){
			return $user->gender;
		}
		else
			return "undefined";
	}
}