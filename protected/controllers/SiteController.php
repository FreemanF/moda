<?php

class SiteController extends MetaController
{
	public function filters()
	{
		return array(
			array(
				'COutputCache',
				'duration'=>3600,
				'varyBySession'=>true,
				),
			);
	}

    public function actionIndex()
    {
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'        => 'index',
            'is_published' => 1,
            'is_delete'    => 0));
        
        if ( $this->model===NULL )
            throw new CHttpException(404,Yii::app()->params['error404']);
        
        $this->initAdminPanel(false);
        $this->pushModelMeta();
        
        $this->render('index');
    }
	
	public function actionLogin2() {
		$serviceName = Yii::app()->request->getQuery('service');
		if (isset($serviceName)) {
			/** @var $eauth EAuthServiceBase */
			$eauth = Yii::app()->eauth->getIdentity($serviceName);
			$eauth->redirectUrl = Yii::app()->user->returnUrl;
			$eauth->cancelUrl = $this->createAbsoluteUrl('site/login');

			try {
				if ($eauth->authenticate()) {
					//var_dump($eauth->getIsAuthenticated(), $eauth->getAttributes());
					$identity = new EAuthUserIdentity($eauth);

					// successful authentication
					if ($identity->authenticate()) {
						Yii::app()->user->login($identity);
						echo var_dump($identity->id, $identity->name, Yii::app()->user->id);exit;

						// special redirect with closing popup window
						$eauth->redirect();
					}
					else {
						// close popup window and redirect to cancelUrl
						$eauth->cancel();
					}
				}

				// Something went wrong, redirect to login page
				$this->redirect(array('site/login'));
			}
			catch (EAuthException $e) {
				// save authentication error to session
				Yii::app()->user->setFlash('error', 'EAuthException: '.$e->getMessage());

				// close popup window and redirect to cancelUrl
				$eauth->redirect(Yii::app()->user->returnUrl);
			}
		}

		// default authorization code through login/password ..
	}
	
    // В случае ремонта сайта используется этот экшн
    // см. application.components.Maintanance
    // в конфигурации возможны такие варианты
    // 'onBeginRequest' => array('Maintanance','allowAdmin'), // можно только в админку
    // 'onBeginRequest' => array('Maintanance','allowAll'), // всем можно (лучше закомментировать)
    // 'onBeginRequest' => array('Maintanance','denyAll'), // нельзя даже в админку
    
    public function actionMaintanance()
    {
        Yii::app()->clientScript->reset();
        $this->includePackages = array();
        $this->layout = '//layouts/empty';
        $this->render('maintanance');
    }
    
    public function actionLogin(){
        $this->layout = '//layouts/login';
        $this->render('login');
    }

        public function actionSendt(){
    $Fail = false;
        if(Yii::app()->request->isPostRequest){
//            if ( ! Users::isLoggedIn()){
//                $Result = array('status'=>'Error');
//                echo json_encode($Result);
//                Yii::app()->end();
//            }
//            $settings = Setting::model()->find('sid=:sid', array(':sid'=>1));
//            $settings = Contacts::model()->find('ctid=:ctid', array(':ctid'=>1));
//            $city = $_POST['city'];
            $name = $_POST['f_name'];
//            $company = $_POST['org'];
            $phone = $_POST['f_phone'];
//            $email = $_POST['mail'];
//            $tender = $_POST['tender'];
            $message =  $_POST['f_msg'];
            
//            if (isset($_FILES['fname'])){
//                $file = $_FILES['fname'];
//            //    $file = array($file['name']=>$file['tmp_name']);
//           //}
//            else
//                $file = array();
            
            $subject = 'Сообщение от '.$name;
            $s_message = $message."<br/><br/>Заявка на тендер от ".$name."<br/><br/>"
                    . "Название тендера: "."<br/>"
                    . "Связаться со мной можно по телефону: ".$phone
                    . "<br/>"."Я представляю организацию "."<br/>"
                    ."Дополнительная информация: ".$message."<br/>\n";
            
            ///
            
            if( ($phone != '') && ($name != '') ){
                if (Message::SendMail($s_message,'Заявка на тендер', Setting::getParam('admin-email', 'freemanf@bk.ru'), 'krontif@noreply.ru',Setting::getParam('sender-email', 'freemanf@bk.ru'),array())) {
                    $Result = array('status'=>'success');
                    echo json_encode($Result);
                    Yii::app()->end();
//                    $this->redirect('/');
//                    $this->refresh();
                }
            }else{
//                $settings->unsetAttributes();
                $Result = array('status'=>'error');
                echo json_encode($Result);
                Yii::app()->end();
//                $Fail = 'Не корректная операция';
//                $this->redirect('/');
//                $this->refresh();
            }
            
        }
    }
}