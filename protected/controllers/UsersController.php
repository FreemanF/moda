<?php

class UsersController extends MetaController
{
    public $layout         = '//layouts/login_password';
    public $side_content = '';
    const onPage = 4;
    
    public function actionIndex(){
        $this->redirect('/');
    }
    
    public function actionLogin(){
        $uLogn = filter_var(trim(Yii::app()->getRequest()->getParam('username')),FILTER_SANITIZE_STRING);
        $uPassword = filter_var(trim(Yii::app()->getRequest()->getParam('password')),FILTER_SANITIZE_STRING);
        $Result = array('status'=>'Error');
//        if(Yii::app()->request->isPostRequest && ($uLogn != '') && ($uPassword != ''))
        $fbuser=Users::model()->find('LOWER(us_login)=?',array(strtolower($uLogn)));
        if ($fbuser)
        {
        if(Yii::app()->request->isPostRequest && ($uLogn != '') )
        {
            $identity=new fbUserIdentity('',$fbuser->us_login,$uPassword);
            $identity->authenticate('facebook');
            $duration = 3600 * 24 * 30;
            if($login=Yii::app()->user->login($identity,$duration))
            {
//		echo json_encode(array('status'=>'login','redirect'=>Yii::app()->createAbsoluteUrl(Yii::app()->homeUrl)));
//                $h_URL = Yii::app()->homeUrl;
//                $is_logged_in = TRUE;
                $this->redirect(Yii::app()->homeUrl);
//                Yii::app()->end();
            }
            else{
//		echo json_encode(array('status'=>'error'));
//                Yii::app()->end();
            
                }
            }
//            echo json_encode($Result);
//            Yii::app()->end();
        }
        //else
            //throw new CHttpException(404,Yii::app()->params['error404']);
	$this->render('index');
    }

                
    public function actionLogout(){
        unset(Yii::app()->request->cookies['mkublo']);
        unset(Yii::app()->request->cookies['InoxisKPD']);
        Yii::app()->request->redirect('/');
    }
    
    public function actionRegister(){
        if (Yii::app()->user->isGuest)
        {
            $this->layout = 'login';
            $this->render('register');
        } else {
            $this->redirect(Yii::app()->homeUrl);
        }
    }

    public function actionError(){
        throw new CHttpException(404,Yii::app()->params['error404']);
    }
    
    private static function setUserLogin($value){
        $options = array('expire' => time()+60*60*24*360);
        Yii::app()->request->cookies['mkublo'] = new CHttpCookie(
            'mkublo',
            json_encode( (array) $value ),
            $options
        );
    }
    
    public function actionUpdate(){
        $name = filter_var(trim(Yii::app()->getRequest()->getParam('name')),FILTER_SANITIZE_STRING);
        $fam = filter_var(trim(Yii::app()->getRequest()->getParam('family')),FILTER_SANITIZE_STRING);
        $otc = filter_var(trim(Yii::app()->getRequest()->getParam('otc')),FILTER_SANITIZE_STRING);
//        $city = filter_var(trim(Yii::app()->getRequest()->getParam('city')),FILTER_SANITIZE_STRING);
        $phone = filter_var(trim(Yii::app()->getRequest()->getParam('phone')),FILTER_SANITIZE_STRING);
        $email = filter_var(trim(Yii::app()->getRequest()->getParam('email')),FILTER_SANITIZE_STRING);
        $site = filter_var(trim(Yii::app()->getRequest()->getParam('site')),FILTER_SANITIZE_STRING);
        $org = filter_var(trim(Yii::app()->getRequest()->getParam('org')),FILTER_SANITIZE_STRING);
        $prof = filter_var(trim(Yii::app()->getRequest()->getParam('prof')),FILTER_SANITIZE_STRING);
        $Result = array('status'=>'Error');
        if(Yii::app()->request->isPostRequest)
        {
            $us = Users::logName();
            if ($us !== FALSE) {
                $u_ser = Users::model()->find('t.us_login = "'.$us.'"');
                $u_ser->us_name = $name;
                $u_ser->us_family = $fam;
                if ($otc !== '')
                    $u_ser->us_otchestvo = $otc;
                $u_ser->us_city = '';
                $u_ser->us_phone = $phone;
                $u_ser->us_email = $email;
                if ($site !== '')
                    $u_ser->us_site = $site;
                $u_ser->us_organization = $org;
                if ($prof !== '')
                    $u_ser->us_profession = $prof;
                $u_ser->save(false);
                $Result = array('status' => 'Success');
                }
            }
            echo json_encode($Result);
            Yii::app()->end();
    }
    
}