<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_uid;
	private $_gender;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate($type = null)
	{
		$user=User::model()->find('LOWER(username)=?',array(strtolower($this->username)));
		
		

		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password) || !$user->status)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_uid=$user->uid;
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}
	
public function authenticate2($type=null)
{
    //~ if (strpos($this->username,"@")) {
    $user=User::model()->findByAttributes(array('email'=>$this->username));
    //~ } else {
        //~ $user=User::model()->notsafe()->findByAttributes(array('username'=>$this->username));
    //~ }
    if($type)
    {
        if($user===null)
        //~ if (strpos($this->username,"@")) {
        $this->errorCode=self::ERROR_EMAIL_INVALID;
        else if($this->password!==$user->facebook_id)
        $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else {
            $this->_uid=$user->uid;
            $this->username=$user->username;
		//	$this->_gender=$user->gender;
			$this->setState('name', $user->username);
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
			$this->_uid=$user->uid;
			$this->username=$user->username;
		//	$this->_gender=$user->gender;
			$this->setState('name', $user->username);
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