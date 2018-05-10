<?php

class SiteController extends MetaController
{
    public $prod = null;


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
    
    public function actionPage()
    {
        $sef = isset($_GET['sef']) ? $_GET['sef'] : '';

        if ($sef == 'index'){
            $this->redirect('/');
        }

        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'=>$sef,
            'is_published'=>1,
            'is_delete'=>0));
        if ( $this->model===null )
            throw new CHttpException(404,Yii::app()->params['error404']);

        if ( isset($this->model->meta) )
            $this->pushMeta(array(
                'title'       => $this->model->meta['e_title'],
                'keywords'    => $this->model->meta['e_keywords'],
                'description' => $this->model->meta['e_description']
            ));
        $this->layout = false;
        $this->render('pages/page');
    }
    
    
    public function actionDetail()
    {
        $input = '';
        $cat = isset($_GET['cat']) ? $_GET['cat'] : '';
        $sub = isset($_GET['sub']) ? $_GET['sub'] : '';
        $sef = isset($_GET['sef']) ? $_GET['sef'] : '';
        
        if (Yii::app()->request->isAjaxRequest)
        {
            $input = Yii::app()->request->getPost('input');
            // для примера будем приводить строку к верхнему регистру
            $output = mb_strtoupper($input, 'utf-8');

            // если запрос асинхронный, то нам нужно отдать только данные

                    echo CHtml::encode('Cool');
                    // Завершаем приложение
                    Yii::app()->end();
            
        }
        $this->model = Product::model()->with(array('media','media2','media3','category','size','user','brand'))->findByAttributes(array(
            'pd_sef'=>$sef,
            ));
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
        
        $this->breadcrumbs['Товар'] = '/product';
        $this->breadcrumbs[] = Comportable::html_mb_substr($this->model->pd_name, 0, 80);

        //$this->initAdminPanel();
        //$this->pushModelMeta();
        $this->layout = false;
        if (Yii::app()->user->isGuest)
        {
            $this->render('product/detail_view',array('input'=>$input));
            Yii::app()->end();
        } elseif (Yii::app()->user->id == $this->model->pd_user) {
            $this->render('product/detail_view_auth');
            Yii::app()->end();
        } else {
            $this->render('product/detail_view',array('input'=>$input));
            Yii::app()->end();
        }
    }
    
        public function actionQuick() { 
         $model=new FilterForm();
        if(isset($_POST['FilterForm']))
        {
        $model->attributes=$_POST['FilterForm'];
                   if($model->validate()) {
//                       $headers="From: $model->email\r\nReply-To: $model->email";
//                       $body = "\n\nОтправитель: ".$model->name."\t Телефон: ".$model->phone."\t Email: ".$model->email."\t Задача: ".$model->message;
//                       mail(Yii::app()->params['adminEmail'],'Письмо с сайта loco.ru от '.$model->name, $body, $headers, '-f email@yoursite.ru');
//        Dialog::message('flash-success', 'Отправлено!', 'Спасибо, '.$model->name.'! Ваше письмо отправлено!');
//        Yii::app()->user->setFlash('messageSent', 'Спасибо, '.$model->name.'! Ваше письмо отправлено!');
        $product = Product::model()->findByPk($model->prod_id);
        if ($product){
            $product->pd_status = 4; // set status to selled
            $product->pd_selled_user = $model->user_id;
            if ($product->save()){
                $this->redirect(Yii::app()->homeUrl);
                Yii::app()->end();
            }
        }

        }
        }
        $this->redirect(isset(Yii::app()->request->urlReferrer) ? Yii::app()->request->urlReferrer : Yii::app()->baseUrl); // нужно когда форма отправлена, чтобы не оставался белый экран без представления, т.к. не создавали специально /site/quick
        }
    
    
    public function actionSendFirst() {
        $input = Yii::app()->request->getPost('input');
        $prod = Yii::app()->request->getPost('prod');
        $usr = Yii::app()->request->getPost('recipient');
	// для примера будем приводить строку к верхнему регистру
	//$output = mb_strtoupper($input, 'utf-8');

        // если запрос асинхронный, то нам нужно отдать только данные
	if( $input !== ''){
            $dialog = Dialogs::model()->find('dl_user='.Yii::app()->user->id.' AND dl_product='.$prod);
            
            if ($dialog)
            {
                $msg = new Messages();
                $msg->ms_readed = 0;
                $msg->content_long = $input;
                $msg->ms_sender = Yii::app()->user->id;
                $msg->ms_recipient = $usr;
                $msg->ms_dlg = $dialog->dlid;
                if ($msg->save())
                {
//                    $this->redirect('msg/'.$dialog->dlid);
                    echo '<script type="text/javascript">window.location.href="msg/'.$dialog->dlid.'";</script>';
//                    Yii::app()->end();
                }
            } else {
                $dialog = new Dialogs();
                $dialog->dl_user = Yii::app()->user->id;
                $dialog->dl_product = $prod;
                $dialog->dl_to = $usr;
                
                if ($dialog->save())
                {
                    $msg = new Messages();
                    $msg->ms_readed = 0;
                    $msg->content_long = $input;
                    $msg->ms_sender = Yii::app()->user->id;
                    $msg->ms_recipient = $usr;
                    $msg->ms_dlg = $dialog->dlid;
                    if ($msg->save())
                    {
//                        $this->redirect('msg/'.$dialog->dlid);
                        echo '<script type="text/javascript">window.location.href="'.Yii::app()->homeUrl.'msg/'.$dialog->dlid.'";</script>';
//                        Yii::app()->end();
                    }
                }
            }
            
	}
	else {
            // если запрос не асинхронный, отдаём форму полностью
//            $this->render('form', array(
//		'input'=>$input,
//		'output'=>$output,
//			));
            echo CHtml::encode($output);
            Yii::app()->end();
        }
    }
    
    // start test action
    public function actionUploadPost() {
            $model = new Messages();
        $gallery = new Media();
        if(isset($_POST['ForumPost'], $_FILES['UserGallery'])) {
            // populate input data to $model and $gallery
            $model->attributes=$_POST['ForumPost'];
            $gallery->attributes=$_POST['UserGallery'];
            $rnd = rand(0123456789, 9876543210);    // generate random number between 0123456789-9876543210
            $timeStamp = time();    // generate current timestamp
            $uploadedFile = CUploadedFile::getInstance($gallery, 'forum_image');
            if ($uploadedFile != null) {
                $fileName = "{$rnd}-{$timeStamp}-{$uploadedFile}";  // random number + Timestamp + file name
                $gallery -> forum_image = $fileName;
            }
            $valid_format = "jpg,png,jpeg,gif";     // Allow the above extensions only.
            if ($gallery -> save() && $valid_format) {
                if (!empty($uploadedFile)) {
                    $uploadedFile -> saveAs(Yii::app() -> basePath . '/../images/post/' . $fileName); // save images in given destination folder
                }
            }
            $model -> save(FALSE);
    }
    }
    // end
	
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
//						echo var_dump($identity->id, $identity->name, Yii::app()->user->id);exit;

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
        $this->layout = '//layouts/login';
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
		$brand = Client::model()->with('media')->findAll(array('condition'=>'cl_media_id IS NOT NULL','limit'=>18,'order'=>'cl_name'));
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
            $is_logged_in = false;
	//	$data = json_decode($_POST['userData']);
	//	echo print_r($data->name,true);
	//	Yii::app()->end();
    if(isset($_POST['userData']))
    {
	$data = json_decode($_POST['userData']);
	//echo print_r($_POST,true);
        $fbid=$data->id;
        if(isset($data->email))
            $email=$data->email;
	//$fbuser=User::model()->find('LOWER(email)=?',array(strtolower($email)));
        $fbuser=Users::model()->find('facebook_id='.$fbid);
        //$fbuser=$this->getuserbyattribute(array('email'=>$email));
        if($fbuser)
        {
//            if(!$fbuser->facebook_id)
//            {
//                $fbuser->facebook_id=$fbid;
//                $fbuser->save();
//            }
            $identity=new fbUserIdentity($fbuser->facebook_id,'','');
            $identity->authenticate2('facebook');
            $duration = 3600 * 24 * 30;
            if($login=Yii::app()->user->login($identity,$duration))
            {
		echo json_encode(array('status'=>'login','redirect'=>Yii::app()->createAbsoluteUrl(Yii::app()->homeUrl)));
//                $h_URL = Yii::app()->homeUrl;
//                $is_logged_in = TRUE;
//                $this->redirect(Yii::app()->homeUrl);
                Yii::app()->end();
            }
            else
		echo json_encode(array('status'=>'error'));
                Yii::app()->end();
//            if($login=Yii::app()->user->login($identity,$duration))
//		echo json_encode(array('status'=>'login','redirect'=>$this->createUrl('/')));
//            else
//		echo json_encode(array('status'=>'error'));
        }else
        {
            $fbuser = new Users();
            $fistname=$data->first_name;   $lastname=$data->last_name; 
            $gender=$data->gender;
            $fbuser->facebook_id=$fbid;
            $fbuser->us_name = $fistname;
            $fbuser->us_family = $lastname;
            if(isset($data->email))
                $email=$data->email;
            else
                $fbuser->us_email = '';
            
            $fbuser->save(false);
            $fbuser->us_sef = $fbuser->usid;
            $fbuser->save(false);
            $identity=new fbUserIdentity($fbuser->us_email,$fbuser->facebook_id,$fbuser->us_gender);
            $identity->authenticate2('facebook');
            $duration = 3600 * 24 * 30;
            if($login=Yii::app()->user->login($identity,$duration))
            {
		echo json_encode(array('status'=>'login','redirect'=>$this->createUrl('site/index')));
                return $this->redirect(['site/index'], true, 200);
                //$this->redirect(Yii::app()->homeUrl);
                $is_logged_in = TRUE;
//                $this->refresh();
//                return;
                Yii::app()->end();
            }
            else
		echo json_encode(array('status'=>'error'));
            Yii::app()->end();
//            $model=array('email'=>$email,'gender'=>$gender,'facebook_id'=>$fbid);
//            $profile=array('firstname'=>$fistname,'lastname'=>$lastname);
//            Yii::app()->user->setState("fbregister",array('profile'=>$profile,'user'=>$model));
//            echo json_encode(array('status'=>'register','redirect'=>$this->createurl('user/registeration')));
        }
    }

        $this->redirect($this->createurl('users/registration'));
	}
	
	
	public function actionRegistration() {
            $this->redirect('site/index');
	}
        
        public function actionReserve($pdid=0)
        {
            if (Yii::app()->user->isGuest){
                return;
            }
            if (Yii::app()->request->isAjaxRequest)
            {
                if (isset($_POST['item_id']))
                {
//                echo print_r($_POST['item_id'],true);
//                Yii::app()->end();
//            }
            $pdid = $_POST['item_id'];
            $product = Product::model()->findByPk($pdid);
            if ( ($product->pd_user == Yii::app()->user->id) && ($product) )
            {
//                if ($product)
//                {
                    if ($product->pd_status == 3){
                        $product->pd_status = 1;
                        $product->save();
                    //    echo 0;
                        echo json_encode('Зарезервировать');
                        Yii::app()->end();
                    }
                    if ($product->pd_status == 1){
                        $product->pd_status = 3;
                        $product->save();
                    //    echo 1;
                        echo json_encode('Снять с резерва');
                        Yii::app()->end();
                    }
//                }
            }
            else {
                throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
            }
            } else {
                throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//                Yii::app()->end();
            }
            } else
                throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }

                public function actionNew()
        {
        if (Yii::app()->user->isGuest)
            $this->redirect (Yii::app()->homeUrl);
        
	$this->layout         = '//layouts/new';

        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'        => 'new',
            'is_published' => 1,
            'is_delete'    => 0));
        
        if ( $this->model===NULL )
            throw new CHttpException(404,Yii::app()->params['error404']);
        
        $this->initAdminPanel(false);
        //$this->pushModelMeta();
        if(Yii::app()->request->isPostRequest){
//            echo print_r($_FILES,true);
//            echo print_r($_POST,true);
//            Yii::app()->end();
            
            $prod = new Product('insert');
            //$prod->media->attributes = $_POST['upload-img2'];
//            $this->prod = $prod;
            
            $prod->pd_name = $_POST['title'];
            $prod->pd_brand = $_POST['brand'];
            $prod->pd_category = $_POST['second_cat'];
            $prod->pd_color = $_POST['pr_color1'];
            $prod->pd_source = $_POST['composition'];
            $prod->pd_main_media = $_POST['image-main'];
            $prod->pd_transport = $_POST['delivery'];
            $prod->pd_user = Yii::app()->user->id;
            $prod->content_long = $_POST['description'];
            $prod->pd_price = $_POST['price'];
            $prod->dt_start = date('Y-m-d H:i:s',strtotime('now'));
            $prod->pd_status = 0; //On moderation
            $prod->pd_city = $_POST['city'];
            $prod->pd_size = $_POST['size'];
           // echo print_r($prod->media,true);
            //echo $_POST['title'];
//            echo $_POST['description'];
//            echo $_POST['composition'];
//            echo $_POST['delivery'];
//            echo $_POST['first_cat'];
//            echo $_POST['price'];
            //echo $_POST['sale-type'];
            //echo $_POST['promotion-type'];
            if ($prod->save() ) {
            ///////////SAVE IMAGE 1 ////////////////////////
            if ($_FILES['upload-img2']['error'] == UPLOAD_ERR_OK)
            {

                $prod->attachBehavior('MediaBehavior', array(
                'class'=>'MediaBehavior',
                'simple'=>true,
                'media_label' => 'Фото 1',
                'media_type' => 0,
                'mediaField' => 'pd_media_id',
                'mediaRelation' => 'media')
                    );
                $mid = Media::LoadImg($_FILES['upload-img2'], Object::idProduct, $prod->pdid, 'product', 'product', '','');
                if ( $mid !== false )
                {
                    //echo print_r($mid,true);
                    //echo $mid->iid;
                    //Yii::app()->end();
                    Media::makeLink(Object::idProduct, $prod->pdid, $mid->iid, 0,0);
                    $prod->pd_media_id = $mid->iid;
                    $prod->detachBehavior('MediaBehavior');
                    echo "Media macked";
                }
                $prod->pd_media_id = $mid->iid;
            }
                ///////////MAKE IMAGE 2///////////////////
            if ($_FILES['upload-img1']['error'] == UPLOAD_ERR_OK)
            {
                $prod->attachBehavior('MediaBehavior', array(
                'class'=>'MediaBehavior',
                'simple'=>true,
                'media_label' => 'Фото 2',
                'media_type' => 1,
                'mediaField' => 'pd_media_id2',
                'mediaRelation' => 'media2')
                    );
                $mid = Media::LoadImg($_FILES['upload-img1'], Object::idProduct, $prod->pdid, 'product', 'product', '','');
                if ( $mid !== false )
                {
                    Media::makeLink(Object::idProduct, $prod->pdid, $mid->iid, 0,0);
                    $prod->pd_media_id2 = $mid->iid;
                    $prod->detachBehavior('MediaBehavior');
                    echo "Media2 macked";
                }
                $prod->pd_media_id2 = $mid->iid;
            }
                //////////////////////////////////////////
                //////////////MAKE IMAGE 3////////////////
            if ($_FILES['upload-img3']['error'] == UPLOAD_ERR_OK)
            {
                $prod->attachBehavior('MediaBehavior', array(
                'class'=>'MediaBehavior',
                'simple'=>true,
                'media_label' => 'Фото 3',
                'media_type' => 1,
                'mediaField' => 'pd_media_id3',
                'mediaRelation' => 'media3')
                    );
                $mid = Media::LoadImg($_FILES['upload-img3'], Object::idProduct, $prod->pdid, 'product', 'product', '','');
                if ( $mid !== false )
                {
                    Media::makeLink(Object::idProduct, $prod->pdid, $mid->iid, 0,0);
                    $prod->pd_media_id3 = $mid->iid;
                    $prod->detachBehavior('MediaBehavior');
                    echo "Media3 macked";
                }
                $prod->pd_media_id3 = $mid->iid;
            }
                //////////////////////////////////////////
                $prod->save();
                $this->prod = $prod;
                $this->layout = '//layouts/add_success';
                $this->render('index',array('prod'=>$prod));
            }
        //    *///auction007
            unset($_POST);
            unset($_FILES);
            Yii::app()->end();
            $this->refresh();
        }
        
        $this->render('index');
	}
        
        
        //////////////ajax bath on new form
        public function actionBatch()
        {
        $data=Category::model()->findAll('c_pid=:parent_id', 
                  array(':parent_id'=>(int) $_POST['cid']));
 
        $data=CHtml::listData($data,'cid','c_name');
        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option',
                   array('value'=>$value),CHtml::encode($name),true);
        }
        }
        ///////////////////////////////////
        
        
        //////////////ajax update size in new form
        public function actionSize()
        {
//        $data=Category::model()->findAll('c_pid=:parent_id', 
//                  array(':parent_id'=>(int) $_POST['cid']));
// 
//        $data=CHtml::listData($data,'cid','c_name');
//        foreach($data as $value=>$name)
//        {
//            echo CHtml::tag('option',
//                   array('value'=>$value),CHtml::encode($name),true);
//        }
            if (isset($_POST['cid'])){
                switch ($_POST['cid']) {
                    case 1:
                        $sizes = Size::model()->findAllByPk(array(1,2,3,4,5,6,7,8,9,10));
                        foreach ($sizes as $sizes_list => $size){
                            echo '<label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="'.$size->szid.'" name="size" value="'.$size->szid.'">
                                <div>'.$size->sz_universal.'</div>
                                <strong>'.$size->sz_name.'</strong>
                                <div>'.$size->sz_american.'</div>
                            </label>';
                        }
                        echo '<label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="11" name="size" value="11">
                                <div>One size</div>
                            </label>';
                        echo '<script>'
                        . "$('.b-choose-size__label').click(function() {
    $(this).toggleClass('b-choose-size__label_state_active');
    $('.b-choose-size__notification').toggleClass('b-hidden');
});
$('.b-choose-size__item').click(function() {
    $('.b-choose-size__item').removeClass('b-choose-size__item_state_active');
    $(this).toggleClass('b-choose-size__item_state_active');
});"
                        . '</script>';
                    break;
                    case 6:
                        $sizes = Size::model()->findAllByPk(array(12,13,14,15,16,17,18,19,20,21));
                        foreach ($sizes as $sizes_list => $size){
                            echo '<label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="'.$size->szid.'" name="size" value="'.$size->szid.'">
                                <div>'.$size->sz_universal.'</div>
                                <strong>'.$size->sz_name.'</strong>
                                <div>'.$size->sz_american.'</div>
                            </label>';
                        }
                        echo '<label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="11" name="size" value="11">
                                <div>One size</div>
                            </label>';
                        echo '<script>'
                        . "$('.b-choose-size__label').click(function() {
    $(this).toggleClass('b-choose-size__label_state_active');
    $('.b-choose-size__notification').toggleClass('b-hidden');
});
$('.b-choose-size__item').click(function() {
    $('.b-choose-size__item').removeClass('b-choose-size__item_state_active');
    $(this).toggleClass('b-choose-size__item_state_active');
});"
                        . '</script>';
                      break;
                    //aksesuary
                    case 5:
                        echo '<label class="b-choose-size__item b-choose-size__item_state_active">
                                <input type="radio" class="b-hidden" id="11" name="size" value="11">
                                <div>One size</div>
                            </label>';
                        echo '<script>'
                        . "$('.b-choose-size__label').click(function() {
    $(this).toggleClass('b-choose-size__label_state_active');
    $('.b-choose-size__notification').toggleClass('b-hidden');
});
$('.b-choose-size__item').click(function() {
    $('.b-choose-size__item').removeClass('b-choose-size__item_state_active');
    $(this).toggleClass('b-choose-size__item_state_active');
});"
                        . '</script>';
                      break;
                  //baby rum
                    case 7:
                        echo '<label class="b-choose-size__item b-choose-size__item_state_active">
                                <input type="radio" class="b-hidden" id="11" name="size" value="11">
                                <div>One size</div>
                            </label>';
                        echo '<script>'
                        . "$('.b-choose-size__label').click(function() {
    $(this).toggleClass('b-choose-size__label_state_active');
    $('.b-choose-size__notification').toggleClass('b-hidden');
});
$('.b-choose-size__item').click(function() {
    $('.b-choose-size__item').removeClass('b-choose-size__item_state_active');
    $(this).toggleClass('b-choose-size__item_state_active');
});"
                        . '</script>';
                      break;
                    case 28:
                        $sizes = Size::model()->findAllByPk(array(22,23,24,25,26,27,28,29,30,31));
                        foreach ($sizes as $sizes_list => $size){
                            echo '<label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="'.$size->szid.'" name="size" value="'.$size->szid.'">
                                <div>'.$size->sz_universal.'</div>
                            </label>';
                        }
//                        echo '<label class="b-choose-size__item">
//                                <input type="radio" class="b-hidden" id="11" name="size" value="11">
//                                <div>One size</div>
//                            </label>';
                        echo '<script>'
                        . "$('.b-choose-size__label').click(function() {
    $(this).toggleClass('b-choose-size__label_state_active');
    $('.b-choose-size__notification').toggleClass('b-hidden');
});
$('.b-choose-size__item').click(function() {
    $('.b-choose-size__item').removeClass('b-choose-size__item_state_active');
    $(this).toggleClass('b-choose-size__item_state_active');
});"
                        . '</script>';
                      break;
                    //mujskaya ubuv
                    case 87:
                        $sizes = Size::model()->findAllByPk(array(32,33,34,35,36,37,38,39,40,41,42,43,44,45));
                        foreach ($sizes as $sizes_list => $size){
                            echo '<label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="'.$size->szid.'" name="size" value="'.$size->szid.'">
                                <div>'.$size->sz_universal.'</div>
                            </label>';
                        }
//                        echo '<label class="b-choose-size__item">
//                                <input type="radio" class="b-hidden" id="11" name="size" value="11">
//                                <div>One size</div>
//                            </label>';
                        echo '<script>'
                        . "$('.b-choose-size__label').click(function() {
    $(this).toggleClass('b-choose-size__label_state_active');
    $('.b-choose-size__notification').toggleClass('b-hidden');
});
$('.b-choose-size__item').click(function() {
    $('.b-choose-size__item').removeClass('b-choose-size__item_state_active');
    $(this).toggleClass('b-choose-size__item_state_active');
});"
                        . '</script>';
                      break;
                  //kosmetika
                    case 89:
                        echo '<label class="b-choose-size__item b-choose-size__item_state_active">
                                <input type="radio" class="b-hidden" id="11" name="size" value="11">
                                <div>One size</div>
                            </label>';
                        echo '<script>'
                        . "$('.b-choose-size__label').click(function() {
    $(this).toggleClass('b-choose-size__label_state_active');
    $('.b-choose-size__notification').toggleClass('b-hidden');
});
$('.b-choose-size__item').click(function() {
    $('.b-choose-size__item').removeClass('b-choose-size__item_state_active');
    $(this).toggleClass('b-choose-size__item_state_active');
});"
                        . '</script>';
                      break;
                    //etnobutik
                    case 8:
                        echo '<label class="b-choose-size__item b-choose-size__item_state_active">
                                <input type="radio" class="b-hidden" id="11" name="size" value="11">
                                <div>One size</div>
                            </label>';
                        echo '<script>'
                        . "$('.b-choose-size__label').click(function() {
    $(this).toggleClass('b-choose-size__label_state_active');
    $('.b-choose-size__notification').toggleClass('b-hidden');
});
$('.b-choose-size__item').click(function() {
    $('.b-choose-size__item').removeClass('b-choose-size__item_state_active');
    $(this).toggleClass('b-choose-size__item_state_active');
});"
                        . '</script>';
                      break;
                  }
            }
        }
        ///////////////////////////////////
	
	
	public function mainVips(){
	$vips = Product::model()->with('media','brand')->vip()->findAll(array('limit'=>15));
	foreach ($vips as $v){
	echo '<li class="b-catalog__item" id="b-catalog__item-5609173" >
            <a class="b-catalog__link js-ga-onclick "
       href="product/'.$v->category->parent->c_sef.'/'.$v->category->c_sef.'/'.$v->pd_sef.'"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="'.$v->pdid.'"
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
                    <span class="b-size__item">'.$v->size->name.'</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">'.$v->brand->cl_name.'</span>

            

            <span class="b-catalog__price" style="color: #bfff00;">
                    '.$v->pd_price.'
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li>';
		}
	}
        
        
}