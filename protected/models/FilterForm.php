<?php
class FilterForm extends CFormModel
{
    public $user_id;
    public $prod_id;
//    public $name;
//    public $phone;
//    public $message;
//    public $current_url;
    public $verifyCode; 
  
    public function rules()
    {
        return array(
            array('user_id, prod_id', 'required'),
            array('user_id, prod_id', 'safe'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd') /*'captchaAction' => 'site/captcha'*/),
        );
    }
  

    public function attributeLabels()
    {
        return array(
//            'name'=>'Имя покупателя',
            'user_id'=>'Покупатель',
            'prod_id'=>'Товар',
//            'message'=>'Опишите задачу',
            'verifyCode'=>'Код проверки',
        );
    }
}