<?php
class SellerForm extends CFormModel
{
    public $name;
    public $id;
    public $phone;
    public $message;
    public $current_url;
    public $verifyCode; 
  
    public function rules()
    {
        return array(
            array('name, email, message', 'required'),
            array('phone, current_url', 'safe'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd') /*'captchaAction' => 'site/captcha'*/),
        );
    }
  

    public function attributeLabels()
    {
        return array(
            'name'=>'Ваше имя',
            'phone'=>'Телефон',
            'email'=>'Email',
            'message'=>'Опишите задачу',
            'verifyCode'=>'Код проверки',
        );
    }
}