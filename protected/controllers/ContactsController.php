<?php

class ContactsController extends MetaController
{
    public $layout         = '//layouts/main';
    public $class          = ''; // См. /layouts/news
    public $listNews  = array();
    public $models = null;
    public $params = null;
//    public $model = null;
//    public $initBC = array('Новости'=>'/novosti');
    
    public function actionIndex()
    {
        $Result = array('status'=>'Success');
        $Fail = array('status'=>'Не POST запрос');
        if (Yii::app()->request->isPostRequest){
            $Fail  = FALSE;
            $type  = filter_var(trim(Yii::app()->getRequest()->getParam('name' )), FILTER_SANITIZE_STRING);
            $phone = filter_var(trim(Yii::app()->getRequest()->getParam('phone')), FILTER_SANITIZE_STRING);
			$msg = '';
		//	$msg = filter_var(trim(Yii::app()->getRequest()->getParam('msg')), FILTER_SANITIZE_STRING);
            if (!$phone){
                if (!$Fail){
                    $Fail = array('status'=>'Error', 'error'=>array());
                }
                $Fail["error"][] = 'phone';
            }
            if (!$type){
                if (!$Fail){
                    $Fail = array('status'=>'Error', 'error'=>array());
                }
                $Fail["error"][] = 'name';
            }
            if ($Fail) {
                echo json_encode($Fail);
            } else{
				//
				$cnts = new Contacts();
				$cnts->cn_name = $type;
				$cnts->cn_phone = $phone;
				$cnts->content_long = $msg;
				$cnts->save();
				//
                $subject = 'Заказ звонка';
                $message = "
                    Заказ звонка от: ".($type ? $type : '-')."<br/>
                    Телефон: ".$phone."<br/>";
                Mail::SendMail(
                    Setting::getParam('admin-email' ),
                    Setting::getParam('sender-email'),
                    Setting::getParam('sender-name' ),
                    $subject,
                    $message.' '.$msg
                );
                echo json_encode($Result);
				$this->redirect($this->createUrl('site/index'));
				Yii::app()->end();
            }
            Yii::app()->end();
	//		$this->redirect($this->createUrl('site/index'));
        } else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }
    
    public function missingAction($actionID)
    {
        $this->cSef = 'contacts';
        $sef = $actionID;
        $this->redirect($this->createUrl('/error'));
    }
    
    public function actionRequestCall(){
        $Result = array('status'=>'Success');
        $Fail = array('status'=>'Не POST запрос');
        if (Yii::app()->request->isPostRequest){
            $Fail  = FALSE;
            $type  = filter_var(trim(Yii::app()->getRequest()->getParam('name' )), FILTER_SANITIZE_STRING);
            $phone = filter_var(trim(Yii::app()->getRequest()->getParam('phone')), FILTER_SANITIZE_STRING);
			$msg = '';
			$msg = filter_var(trim(Yii::app()->getRequest()->getParam('msg')), FILTER_SANITIZE_STRING);
            if (!$phone){
                if (!$Fail){
                    $Fail = array('status'=>'Error', 'error'=>array());
                }
                $Fail["error"][] = 'phone';
            }
            if (!$type){
                if (!$Fail){
                    $Fail = array('status'=>'Error', 'error'=>array());
                }
                $Fail["error"][] = 'name';
            }
            if ($Fail) {
                echo json_encode($Fail);
            } else{
				//
				$cnts = new Contacts();
				$cnts->cn_name = $type;
				$cnts->cn_phone = $phone;
				$cnts->content_long = $msg;
				$cnts->save();
				//
                $subject = 'Заказ звонка';
                $message = "
                    Заказ звонка от: ".($type ? $type : '-')."<br/>
                    Телефон: ".$phone."<br/>";
                Mail::SendMail(
                    Setting::getParam('admin-email' ),
                    Setting::getParam('sender-email'),
                    Setting::getParam('sender-name' ),
                    $subject,
                    $message.' '.$msg
                );
                echo json_encode($Result);

            }
            Yii::app()->end();
        } else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }
    
    public function actionZakaz(){
        $Result = array('status'=>'Success');
        $Fail = array('status'=>'Не POST запрос');
        if (Yii::app()->request->isPostRequest){
            $Fail  = FALSE;
            $type  = filter_var(trim(Yii::app()->getRequest()->getParam('name' )), FILTER_SANITIZE_STRING);
            $phone = filter_var(trim(Yii::app()->getRequest()->getParam('phone')), FILTER_SANITIZE_STRING);
            $email = filter_var(trim(Yii::app()->getRequest()->getParam('email')), FILTER_SANITIZE_STRING);
            if (!$phone){
                if (!$Fail){
                    $Fail = array('status'=>'Error', 'error'=>array());
                }
                $Fail["error"][] = 'phone';
            }
            if (!$type){
                if (!$Fail){
                    $Fail = array('status'=>'Error', 'error'=>array());
                }
                $Fail["error"][] = 'name';
            }
            if ($Fail) {
                echo json_encode($Fail);
            } else {
                $subject = 'Заказ консультации';
                $message = "
                    Заказ консультации от: ".($type ? $type : '-')."<br/>
                    Телефон: ".$phone."<br/>".
                    "E-mail: ".$email;
                Mail::SendMail(
                    Setting::getParam('admin-email' ),
                    Setting::getParam('sender-email'),
                    Setting::getParam('sender-name' ),
                    $subject,
                    $message
                );
                echo json_encode($Result);
            }
            Yii::app()->end();
        } else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }
    
    public function showMenu() {
        $menus = Group::model()->findAll('t.is_published = 1');
        $sef = $this->cSef;
        echo '<nav class="menu">';
        echo '<a href="/" class="menu__link ';
            if ($this->cSef == 'index') {
                echo 'menu__link_active ">Главная</a>';
            } else {
                echo '">Главная</a>';
            }
            foreach ($menus as $menu) {
                if ( ($menu->gr_mname != null) && ($menu->gr_mname != ''))
                {
                    $name = $menu->gr_mname;
                } else {
                    $name = $menu->gr_name;
                }
                echo '<a href="/products/'.$menu->gr_sef.'" class="menu__link ';
                    if ($menu->gr_sef == $sef) {
                        echo 'menu__link_active">'.$name.'</a>';
                    } else {
                        echo '">'.$name.'</a>';
                    }
            }
        echo '<a href="/contacts" class="menu__link ';
            if ($sef == 'contacts') {
                echo 'menu__link_active">Контакты</a>';
            } else {
                echo '">Контакты</a>';
            }
        echo '<div class="cl"></div>';
        echo '</nav>';
    }

}