<?php

class ProfileController extends MetaController
{
	/*
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
	*/

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
    
    public function actionLogout()
    {
            Yii::app()->user->logout();
            
            $session=new CHttpSession;
            $session->open(); // Иначе после логаута setFlash не работает
            //Yii::app()->user->setFlash('greeting',  Setting::getCachedParam('greeting-logout'));
            //Yii::app()->session['greeting'] = Setting::getCachedParam('greeting-logout');
            $this->redirect(Yii::app()->homeUrl); //Yii::app()->homeUrl);
    }
	
	
    public function actionLogin()
    {
	$this->layout = false;
        $model=new FbLoginForm;

        //$this->performUserAjaxValidation($model);
        // collect user input data
        if(isset($_POST['FbLoginForm']))
        {
            $model->attributes=$_POST['FbLoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()) {
                //$auth=Yii::app()->authManager;
                //$auth->assign('admin',Yii::app()->user->name);
                //Yii::app()->user->setFlash('greeting',  Setting::getCachedParam('greeting-login'));
                $this->redirect(
                    Yii::app()->user->returnUrl=='/'
                    ? '/' : Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }
	
	protected function performUserAjaxValidation2($user)
    {
        if( ! isset($_POST['ajax'])) return;
        switch ($_POST['ajax']) {
        case 'login-form' : 
            echo CActiveForm::validate($user);
            $this->redirect(Yii::app()->user->returnUrl);
            //Yii::app()->end();
            break;
        case 'user-reg-form' : 
            echo CActiveForm::validate($user);
            Yii::app()->end();
            break;
        }
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
	//	$data = json_decode($_POST['userData']);
	//	echo print_r($data->name,true);
	//	Yii::app()->end();
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
	
    public function actionView($sef)
    {
		$layout = '//layouts/profile';
	if (Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->homeUrl);
	} else {
            $this->model = Users::model()->find('usid = '.Yii::app()->user->id);
            $this->layout         = '//layouts/profile';
            $this->render('index');
	}
        
	}
	
	
	public function myProducts($usid,$cat_id){
            if ($cat_id == 'all')
            {
                $vips = Product::model()->with('media','brand','size',array('category'=>array('with'=>'parent')))->user($usid)->findAll();
            } else {
                $vips = Product::model()->with('media','brand','size',array('category'=>array('with'=>'parent')))->user($usid)->cat($cat_id)->findAll();
            }
	
        if (!empty($vips))
        {
	foreach ($vips as $v){
//            echo Yii::app()->request->getBaseUrl(true);
//            Yii::app()->end();
        if ($v->pd_main_media == 0)
        {
            $media = $v->media;
        }
        if ($v->pd_main_media == 1)
        {
            $media = $v->media2;
        }
        if ($v->pd_main_media == 2)
        {
            $media = $v->media3;
        }
	echo '<li class="b-catalog__item" id="b-catalog__item-'.$v->pdid.'" >
            <a class="b-catalog__link js-ga-onclic2 "
       href="'.Yii::app()->request->getBaseUrl(true).'/'.'product'.'/'.$v->category->parent->c_sef.'/'.$v->category->c_sef.'/'.$v->pd_sef.'"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="'.$v->pdid.'"
       title="'.$v->pd_name.'">';
//	   $media = $v->media;
		if ($media){
                $image = CHtml::image($media->getMediaUrl()
                    ,$media->i_alt
                    ,array('title'=>$media->i_name,
                           'class'=>'b-catalog__img js-lazy-img lazy-loaded',
							'style' => 'min-height:240px;',
                ));
                }
                else 
                {
                    $image = "<img class='b-catalog__img js-lazy-img lazy-loaded' src='#' />";
                }
	    echo $image;
	    echo '<noscript>';
            echo $image;
            echo '</noscript>';

    echo '    <span class="b-catalog__details">'.
            $v->content_long
            .'<span class="b-catalog__details_city"></span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">';
            if ($v->size)
                echo $v->size->getSizeName();
            else
                echo 'Размер не задан';
            echo '</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">'.$v->brand->cl_name.'</span>

            

            <span class="b-catalog__price" style="color: #ffffff;">
                    '.$v->pd_price.'
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li>';
		}
	}
        }
}