<?php

class SiteController extends MetaController
{
	public function filters23()
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
	
	public function mainBrands(){
		$brand = Client::model()->with('media')->findAll();
		foreach ($brand as $br){
			echo '<li class="b-brands__item">
                            <a href="brands/'.$br->cl_sef.'" class="b-brands__link">';
            //                    <img class="b-brands__img" src="uploads/brands/brand_0028_only.png" alt="ONLY"/>
$media = $br->media;
		if ($media){
                $image = CHtml::image($media->getMediaUrl()
                    ,$media->i_alt
                    ,array('title'=>$media->i_name,
                           'class'=>'b-brands__img',
							'style' => 'min-height:129px;min-width:180px;max-height: 129px;',

//                           'position'=>'absolute',
//                           'top' => '0px',
//                           'left' => '-498px',
//                           'slidedirection' => 'fade',
//                           'slideoutdirection' => 'fade',
//                           'durationin' => 1500,
//                           'durationout' => 1500,
//                           'easingin' => 'easeInBack',
//                           'easingout' => 'easeInOutQuint',
//                           'delayin' => 3000,
//                           'delayout' => 0,
//                           'showuntil' => 0,
        //                   'width'=>'150',
        //                   'height'=>'100')220x151
                ));
            } else{
                $image = '';
            }
			echo $image;
            echo '</a>
                        </li>';
		}
	}
	
	public function actionFblogin()
	{
		$data = json_decode($_POST['userData']);
		echo print_r($data->name,true);
		Yii::app()->end();
    if(isset($_POST['userData']))
    {
		$data = json_decode($_POST['userData']);
		//echo print_r($_POST,true);
        $fbid=$data->id;
        $email=$data->email;
		$fbuser=User::model()->find('LOWER(email)=?',array(strtolower($email)));
        //$fbuser=$this->getuserbyattribute(array('email'=>$email));
        if($fbuser)
        {
            if(!$fbuser->facebook_id)
            {
                $fbuser->facebook_id=$fbid;
                $fbuser->save();
            }
            $identity=new UserIdentity($fbuser->email,$fbuser->facebook_id,$fbuser->gender);
            $identity->authenticate2('facebook');
			$duration = 3600 * 24 * 30;
            if($login=Yii::app()->user->login($identity,$duration))
				echo json_encode(array('status'=>'login','redirect'=>$this->createUrl('/')));
            else
				echo json_encode(array('status'=>'error'));
        }else
        {
            $fistname=$data->first_name;   $lastname=$data->last_name; 
            $gender=$data->gender;
            $model=array('email'=>$email,'gender'=>$gender,'facebook_id'=>$fbid);
            $profile=array('firstname'=>$fistname,'lastname'=>$lastname);
            Yii::app()->user->setState("fbregister",array('profile'=>$profile,'user'=>$model));
            echo json_encode(array('status'=>'register','redirect'=>$this->createurl('user/registeration')));
        }
    }
	}
	
	
	public function actionRegistration() {
	//	$model = new RegistrationForm;
	//	$profile=new Profile;
	//	$profile->regMode = true;
		// check if session set
		if(Yii::app()->user->hasState("fbregister"))
		{
			$fbdata=Yii::app()->user->getState("fbregister");
			$profile->attributes=$fbdata['user'];
			$model->attributes=$fbdata['user'];
		}
    // other code
     
    // other code
	}
	
	//get VIP on main page
	public function mainVips(){
		$vips = Product::model()->with('media')->vip()->findAll(array('limit'=>15));
		foreach ($vips as $v){
			echo '<li class="b-catalog__item" id="b-catalog__item-5609173" >
            <a class="b-catalog__link js-ga-onclick "
       href="'.$v->pd_sef.'"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5609173"
       title="'.$v->pd_name.'">';
	   $media = $v->media;
		if ($media){
                $image = CHtml::image($media->getMediaUrl()
                    ,$media->i_alt
                    ,array('title'=>$media->i_name,
                           'class'=>'b-catalog__img js-lazy-img',
							'style' => '',
                ));
            } else{
                $image = '';
            }
	   echo $image;
	   echo '<noscript>';
       echo $image;
       echo '</noscript>

        

        <span class="b-catalog__details">'.
            $v->content_long
            .'<span class="b-catalog__details_city"></span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">'.$v->pd_size.'</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">'.$v->pd_brand.'</span>

            

            <span class="b-catalog__price">
                    '.$v->pd_price.'
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li>';
		}
	}
	
}