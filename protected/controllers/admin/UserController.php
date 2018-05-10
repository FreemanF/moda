<?php

class UserController extends CRUDController
{
    
    public    $modelClass      = 'User';
    public    $labelAddButton  = 'Добавить нового пользователя';
    protected $_pageTitle      = 'Список пользователей';
    private   $_pr_password; // Pure/Previous Password Чистый или предыдущий хешированный
    public    $infoAlertOnDefaultPanel = 'Данный модуль позволит добавить\удалить пользователей админ панели, распределить права доступа';
    public    $date_column     = ''; // В модели нет даты 
    protected $actionTitles = array(
        'create'=>'Добавить пользователя',
        'update'=>'Редактирование пользователя');
    
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('login','forgotpass','replace','forgot'),
                    'users'=>array('*'),
            ),
            array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('logout'),
                    'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('index','delete','captcha','activation','create','update','logout'),
                    'roles'=>array('ModuleUser'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    function actions() {
        return array('captcha'=>array(
            'class'     =>'CCaptchaAction',
//            'maxLength' => 6,
//            'minLength' => 3,
//            'foreColor' => 0x667e9a,
//            'testLimit' => 2,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                    'class'=>'CViewAction',
                // http://habrahabr.ru/post/155927/
                // Работа со статическими страницами в Yii
            ),
        );
    }
    
//    public function actionInstall()	{
//        $auth=Yii::app()->authManager;
//        $auth->createRole('Administrator', 'Администратор пользователь');
//        $auth->assign('Administrator','adminkpd');
//        $auth->createRole('Guest', 'Администратор пользователь', 'return Yii::app()->user->isGuest;');
//        //$this->redirect('site/error');
//
//    }
    
    public function withModel() {
        return array();
    }

    public function scopeModel() // Используется в actionIndex
    {
        $this->enableAddButton = Yii::app()->user->checkAccess("Administrator");
        $this->model->userId($this->model->isAdmin ? NULL : Yii::app()->user->id);
    }

    private function accessDenied(){
        throw new CHttpException(403, Yii::t('yii','You are not authorized to perform this action.'));
    }

    public function setDefaultAttributes() {  // Create
        if ( ! $this->model->isAdmin) $this->accessDenied ();
        $this->model->status = 1;
        $this->model->scenario = 'edit';
        $this->_pageTitle = 'Добавление нового пользователя';
    }

    public function beforeUpdate() { // Update
        if ( ! $this->model->canView) $this->accessDenied ();
        $this->_pr_password = $this->model->password; // hash
        $this->model->scenario = 'edit';
//        $this->model->old_sef  = $this->model->u_sef;
//        $this->model->old_name = $this->model->fullname;
    }
    
    
    protected function beforeValidation() {
        if ($this->model->isNewRecord) {
            $this->_pr_password = $this->model->password; // pure
            $this->model->password = md5(md5($this->model->password));
        } else
            if($this->_pr_password != $this->model->password) // hash
                $this->model->password = md5(md5($this->model->password));
    }
    
    public function afterSave() 
    { // Используется в actionCreate & actionUpdate
        if ($this->model->canEditAccess ) {
            User::saveAccessModules($this->model->primaryKey);
            
            // Если изменили доступ администратору
            $admin = Yii::app()->authManager->getAuthItem('Administrator');
            if ($this->model->userisadmin != $admin->isAssigned($this->model->primaryKey))
                if ($this->model->userisadmin) // Оцениваем новый доступ
                    $admin->assign($this->model->primaryKey);
                else
                    $admin->revoke($this->model->primaryKey);
        }
    }

    public function errorSave() { // Используется в actionCreate & actionUpdate
        $this->model->password = $this->_pure_password; // pure or hash
    }

    public function beforeDelete($model) {
        return !$model->isAdmin || $model->primaryKey==Yii::app()->user->id
            ? 'Операция запрещена.'
            : '';
    }
    
    // Добавление/удаление столбцов в actionIndex
    public function getIndexColumns() { // используется в //layouts/stdindex
        $columns = array(
            array(
            'name'=>'uid',
            'htmlOptions'=>array('width'=>'60px'),
            ),
            array( //1
            'name'=>'username',
            'type'=>'html',
            'value'=> 'CHtml::link(CHtml::encode($data->ownerName), "/admin/'.$this->crudalias.'/update?id=".$data->primaryKey)',
            'cssClassExpression'=>'"isnamefield"',
            ),
            array( //1
            'name'=> 'fullname',
            'type'=>'html',
            'value'=> 'CHtml::link(CHtml::encode($data->fullname), "/admin/'.$this->crudalias.'/update?id=".$data->primaryKey)',
            'cssClassExpression'=>'"isnamefield"',
            ),
            'email',
            array(
                'header'=>'Действия',
                'class'=>'CButtonColumn',
                'template'=> ($this->model->isAdmin) ? '{update} {delete}' : '{update}',
                'buttons'=>array(
                    'delete' => array(
                        'label'=>'Удалить',
                        'imageUrl'=>$this->themeImages.'photon/icons/default/delete-item.png',
                        'options' => array(
                            'onclick'=>'deleteObject(event,this)',
                            'class'=>'delete'),
                        'url'=>'',
                        'visible' =>'Yii::app()->user->id!=$data->primaryKey',
                    ),
                    'update' => array(
                        'label'=>'Редактировать',
                        'imageUrl'=>$this->themeImages.'photon/icons/default/edit.png',
                    ),
                ),
            ),
        );
        return $columns;
    }
    
    /**
     * Performs the AJAX validation.
     * @param User $user the model to be validated
     */
    protected function performUserAjaxValidation($user)
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

    public function actionLogin()
    {
        $model=new LoginForm;

        $this->performUserAjaxValidation($model);
        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()) {
                //$auth=Yii::app()->authManager;
                //$auth->assign('admin',Yii::app()->user->name);
                Yii::app()->user->setFlash('greeting',  Setting::getCachedParam('greeting-login'));
                $this->redirect(
                    Yii::app()->user->returnUrl=='/'
                    ? '/admin' : Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
            Yii::app()->user->logout();
            
            $session=new CHttpSession;
            $session->open(); // Иначе после логаута setFlash не работает
            //Yii::app()->user->setFlash('greeting',  Setting::getCachedParam('greeting-logout'));
            Yii::app()->session['greeting'] = Setting::getCachedParam('greeting-logout');
            $this->redirect('/admin/user/login'); //Yii::app()->homeUrl);
    }

    public function disableLogging() {
        foreach (Yii::app()->log->routes as $route) {
            if ($route instanceof CWebLogRoute) {
                $route->enabled = false;
            }
        }            
    }

//    public function actionRegistration() {
//        if (Yii::app()->user->isGuest) {
//            $user = new User;
//            $user->scenario = 'reg';
//            /*
//            * Ajax валидация
//            */
//            $this->performUserAjaxValidation($user);
//            if(empty($_POST['User'])) {
//                /*
//                * Если форма не отправленна, то выводим форму
//                */
//                $this->render('registration', array('model' => $user));
//            } else {
//                /*
//                * Форма получена
//                */
//                $user->attributes = $_POST['User'];
//                /*
//                * Валидация данных
//                */
//                if($user->validate('reg')) {
//                    /*
//                    * Если проверка пройдена, проверяем на уникальность имя
//                    * пользователя и e-mail
//                    */
//                    if($user->model()->count("email = :email",
//                        array(':email' => $user->email))) {
//
//                        $user->addError('email', 'E-mail уже занят');
//                        $this->render("registration", array('model' => $user));
//
//                    } else if($user->model()->count("username = :username",
//                        array(':username' => $user->username))) {
//
//                        $user->addError('username', 'Имя пользователя уже занято');
//                        $this->render("registration", array('model' => $user));
//
//                    } else {
//                        /*
//                        * Если проверки пройдены шифруем пароль, генерируем код
//                        * активации аккаунта, а также устанавливаем время регистрации
//                        * и роль по умолчанию для пользователя
//                        */
//                        $user->password      = md5(md5($user->password));
//                        $user->activationKey = substr(md5(uniqid(rand(), true)), 0, rand(10, 15));
//                        $user->status        = '0';
//
//                        /*
//                        * Проверяем если добавление пользователя прошло успешно
//                        * устанавливаем ему права.
//                        */
//                        //Yii::log($user->getIsNewRecord()? 'new':'old') ;
//                        if($user->save(false)) {
//                            $role = new AuthAssignment();
//                            $role->itemname = 'User';
//                            $role->userid   = $user->uid;
//
//                            if($role->save()) {
//                                /*
//                                * Если роль успешно добавилась, выводим сообщение
//                                * об успешной регистрации и отправляем код активации аккаунта
//                                */
//                                $this->render("registrationOk");
//
//                                $this->activationKey($user);
//
//                            } else {
//                                throw new CHttpException(403, 'Ошибка добавления в базу данных.');
//                            }
//                        } else {
//                            throw new CHttpException(403, 'Ошибка добавления в базу данных.');
//                        }
//                    }
//                } else {
//                    /*
//                    * Не прошел валидацию
//                    */
//                    $this->render('registration', array('model' => $user));
//                }
//            }
//        } else {
//            /*
//            * Если пользователь залогинен редиректим обратно
//            */
//            $this->redirect(Yii::app()->user->returnUrl);
//        }
//    }

//        protected function performUserAjaxValidation($model) {
//            if(isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
//                echo CActiveForm::validate($model);
//                Yii::app()->end();
//            }
//        }


    /*
    * Отправление кода активации
    *
    * @param model $model
    * @return bolean
    */
    protected function activationKey($model) {
        $email = Yii::app()->email;
        $email->to = $model->email;
        $email->subject = 'Код активации аккаунта для сайта '.Yii::app()->name;
        $email->message = 'Код активации аккаунта: <a href="'.Yii::app()->homeUrl.'/user/default/activation/key/'.$model->activationKey.'">'.$model->activationKey.'</a>';
        $email->send();
    }

    /*
    * Активация аккаунта
    *
    * @param
    * @return
    */
    function actionActivation() {
        if(!empty($_GET['key'])) {
            $user = User::model()->find('activationKey = :activationKey',
                    array(':activationKey' => $_GET['key']));

            //  Проверяем существует ли пользователь с данным кодом активации
            if(!empty($user)) {
                if($user->status == '1') {
                    $this->render('message', array('breadcrumb'       => 'Активация аккаунта',
                                                       'messageTitle'  => 'Активация аккаунта',
                                                       'messageText'  => 'Аккаунт уже активирован!'));
                } else {
                    $user->status = '1';
                    $user->save();

                    $this->render('message', array('breadcrumb'       => 'Активация аккаунта',
                                                       'messageTitle' => 'Активация аккаунта',
                                                       'messageText'  => 'Аккаунт успешно активирован!'));
                }
            } else {

                // Если нет такого ключа то выводим сообщение об ошибке
                throw new CHttpException(403, 'Такого пользователя не существует.');
            }
        } else {

            // Если не передан ключ активации, редиректим обратно
            $this->redirect(Yii::app()->user->returnUrl);
        }
    }      
    
    public function actionForgotpass(){
        $Fail = false;
        if(Yii::app()->request->isPostRequest){
            $email = Yii::app()->request->getPost('email');
            $user = User::model()->find("email LIKE('".$email."')");
            if( $user ){
                if( ($user->activationKey=="") || 
                    ((strtotime($user->updatetime)+360) < time()) ){
                    $hash = User::makeActivationKey($user);
                    if( $hash ){
                        $feedback = Yii::app()->params["feedbackHref"] ? '<a href="'.Yii::app()->params["feedbackHref"].'">'.Yii::app()->params["feedbackHref"].'</a>'
                                                                       : "";
                        $message = 'Здравствуйте, '. $user->username .'. (See English version below)<br/>'.
                                   '<br/>'.
                                   'Произведен запрос смены пароля для логина '. $user->username .'.<br/>'.
                                   'Если вы не запрашивали смену пароля, удалите это письмо.<br/>'.
                                   '<br/>'.
                                   'Для того, чтобы подтвердить смену пароля откройте приведенную ниже ссылку:<br/>'.
                                   '<a href="'.Yii::app()->request->hostInfo.'/admin/user/replace/hash/'.$hash.'">'.Yii::app()->request->hostInfo.'/admin/user/replace/hash/'.$hash.'</a><br/>'.
                                   '<br/>'.
                                   'Вы получили это письмо так как ваш e-mail указан при регистрации на сайте '.Yii::app()->request->serverName.'<br/>'.
                                   '<br/>'.
                                   'Внимание! Ссылка действительна в течение 24 часов. После смены пароля повторное использование ссылки невозможно.<br/>'.
                                   '--<br/>'.
                                   'С уважением,<br/>'.
                                   'Система оповещений YiiKPD<br/>'.
                                   '<br/>'.
                                   'Обратная связь: '. $feedback .'<br/>'.
                                   '<br/>'.
                                   '- ~ - ~ - ~ - ~ - ~ - ~ - ~ - ~ - ~ - ~ - ~ - ~ -<br/>'.
                                   '<br/>'.
                                   'Hello, '. $user->username .'.<br/>'.
                                   '<br/>'.
                                   'Someone made a request to change the password for login '. $user->username .'.<br/>'.
                                   'If you did not request password change, please delete this letter.<br/>'.
                                   '<br/>'.
                                   'In order to confirm the password change click on the link below:<br/>'.
                                   '<a href="'.Yii::app()->request->hostInfo.'/admin/user/replace/hash/'.$hash.'">'.Yii::app()->request->hostInfo.'/admin/user/replace/hash/'.$hash.'</a><br/>'.
                                   '<br/>'.
                                   'You received this letter because your e-mail was listed at registration on '.Yii::app()->request->serverName.'<br/>'.
                                   '<br/>'.
                                   '--<br/>'.
                                   'Sincerely,<br/>'.
                                   'Notification service of YiiKPD<br/>'.
                                   '<br/>'.
                                   'Feedback: '. $feedback .'<br/>'.
                                   '<br/>';
                        $statusSend = Message::SendMail($message,"Восстановление пароля",$user->email);
                        if( $statusSend ){
                            echo json_encode(array('status'=>'Success'));
                        }else{
                            $Fail = 'Сообщение не отправленно!';
                        }
                    }else{
                        $Fail = 'Не корректная операция';
                    }
                }else{
                    $Fail = 'Мы Вам уже отправляли письмо, попробуйте позже!';
                }
            }else{
                $Fail = 'Пользователя с таким e-mail - не существует!';
            }
        } else 
            $Fail = 'Не корректная операция';
        if ($Fail)
            echo json_encode(array('status'=>$Fail));
        Yii::app()->end();
    }
    
    public function actionReplace( $hash = false ){
        if( $hash ){
            $user = User::model()->find("activationKey LIKE('".$hash."')");
            if( $user ){
                $newpass = $this->generate_password(10);
                $user->password = md5(md5($newpass));
                $user->activationKey = "";
                $user->updatetime = date("Y-m-d H:i:s");
                if( $user->save() ){
                    $message = 'Ваш новый пароль на '.Yii::app()->name.':  <b>'.$newpass.'</b>';
                    $statusSend = Message::SendMail($message,"Новый пароль",$user->email);
                    if( $statusSend ){
                        $this->redirect("/admin/user/forgot");
                    }else{
                        throw new CHttpException(404,'The requested page does not exist.');
                    }
                }else{
                    throw new CHttpException(404,'The requested page does not exist.');
                }
            }else{
                throw new CHttpException(404,'The requested page does not exist.');
            }
        }else{
            throw new CHttpException(404,'The requested page does not exist.');
        }
    }
    
    private function generate_password($number){
        $arr = array('a','b','c','d','e','f',
                     'g','h','i','j','k','l',
                     'm','n','o','p','r','s',
                     't','u','v','x','y','z',
                     'A','B','C','D','E','F',
                     'G','H','I','J','K','L',
                     'M','N','O','P','R','S',
                     'T','U','V','X','Y','Z',
                     '1','2','3','4','5','6',
                     '7','8','9','0','.',',',
                     '(',')','[',']','!','?',
                     '&','^','%','@','*','$',
                     '<','>','/','|','+','-',
                     '{','}','`','~');
        // Генерируем пароль
        $pass = "";
        for($i = 0; $i < $number; $i++)
        {
          // Вычисляем случайный индекс массива
          $index = rand(0, count($arr) - 1);
          $pass .= $arr[$index];
        }
        return $pass;
    }
    
    public function actionForgot(){
        $this->layout = '';
        $this->render('forgot');
    }
}
