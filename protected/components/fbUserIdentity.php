<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class FbUserIdentity extends CUserIdentity
{
	private $_uid;
	private $_gender;
        public $facebook_id;
	public $username;
	public $password;
        public $email;

        
        
	public function __construct($facebook_id, $username, $password, $gender = '')
	{
		$this->username=$username;
                $this->password=$password;
		$this->facebook_id=$facebook_id;
	}
        
        
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate($type = null)
	{
		$user=Users::model()->find('LOWER(us_login)=?',array(strtolower($this->username)));
		
		//echo print_r($user,true);
		//Yii::app()->end;

		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		//else if(!$user->validatePassword($this->password))
		//	$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_uid=$user->usid;
			$this->username=$user->us_name;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}
	
public function authenticate2($type=null)
{
    //~ if (strpos($this->username,"@")) {
    //$user=User::model()->findByAttributes(array('email'=>$this->username));
    //$user=Users::model()->findByAttributes(array('facebook_id'=>$this->facebook_id));
    $user=Users::model()->find('facebook_id=?',array($this->facebook_id));
    //echo var_dump($user);
    //echo print_r($user,true);
    //Yii::log($user, CLogger::LEVEL_ERROR);
    //Yii::app()->end();
    //~ } else {
        //~ $user=User::model()->notsafe()->findByAttributes(array('username'=>$this->username));
    //~ }
    if($type)
    {
        if($user===null)
            $this->errorCode= self::ERROR_USERNAME_INVALID;
        //~ if (strpos($this->username,"@")) {
        //$this->errorCode=self::ERROR_EMAIL_INVALID;
        //else
        //    if($this->facebook_id!==$user->facebook_id)
        //$this->errorCode=self::ERROR_PASSWORD_INVALID;
        else {
            $this->_uid=$user->usid;
            $this->username=$user->us_name;
		//	$this->_gender=$user->gender;
			$this->setState('name', $user->us_name);
			$this->setState('gender', $user->gender);
            $this->errorCode=self::ERROR_NONE;
        }
    }else
    {
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password) || !$user->status)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_uid=$user->usid;
			$this->username=$user->us_name;
		//	$this->_gender=$user->gender;
			$this->setState('name', $user->us_name);
			$this->setState('gender', $user->gender);
			$this->errorCode=self::ERROR_NONE;
		}
	}
		return $this->errorCode==self::ERROR_NONE;
		
}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_uid;
	}
	
	public function getGender()
	{
		return $this->_gender;
	}
}