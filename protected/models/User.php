<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property integer $uid
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $createtime
 * @property string $activationKey
 * @property string $status
 * @property boolean $canView
 * @property boolean $isAdmin
 */
class User extends CActiveRecord
{
    private $_modules;
    public  $captcha;
    public  $password2;
    private $_canView;
    private $_canEditAccess;
    private $_isAdmin;
    private $_userisadmin;
    public  $nickname;
    public  $user_sef;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__)
    {
            return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
            return '{{User}}';
    }

    public function primaryKey()
    {
        return array('uid');
    }
    /*
    * Правила валидации
    *
    * @param
    * @return
    */
    public function rules() {
        return array(
            array('email, username, password, password2, captcha', 'required', 'on'=>'reg'),
            array('password2', 'compare', 'compareAttribute' => 'password', 'on'=>'reg'),
            array('captcha',  'captcha', 'allowEmpty' => !extension_loaded('gd'), 'on'=>'reg', 'skipOnError'=>true),
            //array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'message' => Yii::t("", "Captchani kiriting.")),
            //array('verifyCode', 'safe'),

            array('email, username', 'required', 'on'=>'login'),
            array('email, username', 'unique'),
            array('email',    'match',   'pattern'    => '/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/', 'message' => 'Неверный формат e-mail адреса.'),
            array('username', 'match',   'pattern'    => '/^[A-Za-z0-9_]+$/u','message'  => 'Можно использовать только латинские буквы и цифры'),

            array('username, email',     'length',  'max' => '100', 'min' => '3',),
            array('password, password2', 'length',  'max' => '40',  'min' => '5',),

            array('username, password, email', 'required', 'on'=>'edit'),
            array('fullname,status,userisadmin,u_dosye', 'safe', 'on'=>'edit'),
            array('uid,username,fullname,email', 'safe', 'on'=>'search'),
            array("nickname", "unsafe"),
        );
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    public function behaviors()
    {
        return array(
            'LogBehavior',
            'PrefixedModel' => array('class'=>'PrefixedModel', 'ownerNameField'=>'username'), // В протокол выводим логин
        );
    }
    
    public function disableDefaultScope()
    {
        // заглушка для индексной страницы
        return $this;
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'uid'       => 'ID',
            'email'     => 'Эл.почта:',
            'username'  => 'Имя пользователя:',
            'password'  => 'Пароль:',
            'password2' => 'Пароль еще раз:',
            'captcha'   => 'Введите код с картинки:',
            'updatetime'=> 'Последние изменения:',
            'activationKey' => 'Код активации:',
            'status'    => 'Активирован',
            'userisadmin'=>'Администратор',
            'avatar.i_original' => 'Аватарка',
            'fullname'  => 'ФИО',
            'u_sef'     => 'URL',
            'u_dosye'   => 'Ссылка на досье',
            'fullname_r'=> 'ФИО в родительном падеже',
            'profile'   => 'Род деятельности на сайте',
            'nickname'  => 'Блоггер',
        );
    }
    
    public function defaultScope(){
        return array(
                'select' => array(
                    '*',
                    'CASE WHEN fullname="" OR fullname IS NULL THEN username ELSE fullname END AS nickname',
                    'CONCAT(uid,"-",u_sef) AS user_sef',
                ),
            );
    }
    
    public function scopes() {
        return array(
            'userId' => array(),
            'alphaSort' => array('order' => 'nickname'),
            'blogger' => array(
                'join'=>'INNER JOIN AuthAssignment aa ON t.uid=aa.userid AND aa.itemname="Blogger"',
            ),
        );
    }

    public function userId($userId=null) {
        if ( is_null($userId)) return $this;
        $this->getDbCriteria()->mergeWith(array(
                'condition' => 'uid='.intval($userId),
            ));
        return $this;
    }
    
    public function beforeSave() {
        if (!parent::beforeSave()) return false;
            $this->u_sef  = TranslitFilter::translitUrl($this->fullname);
        return true;
    }
    
    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
            // Warning: Please modify the following code to remove attributes that
            // should not be searched.

            $criteria=new CDbCriteria;

            $criteria->compare('uid',$this->uid);
            $criteria->compare('email',$this->email,true);
            $criteria->compare('username',$this->username,true);
            $criteria->compare('password',$this->password,true);
            $criteria->compare('updatetime',$this->updatetime,true);
            $criteria->compare('fullname',$this->fullname,true);
            $criteria->compare('status',$this->status,true);

            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
            ));
    }
    
    public function validatePassword($password)
    {
        return md5(md5($password))===$this->password;
    }
        
    public function getModules() {
        if ($this->_modules===null && !$this->isNewRecord && !isset($_POST['User'])) {
            $this->_modules = array_keys(ModuleController::grantedModules($this->primaryKey));
        }
        return $this->_modules;
    }
    
    public function grantedModules($item = array('selected'=>true))
    {
        if ($this->modules===null || ! is_array($this->modules)) {
            $modules = ModuleController::getModules();
            $post = isset($_POST['Modules'])&&is_array($_POST['Modules']) ? $_POST['Modules'] : array();
            $this->_modules = array();
            foreach($post as $moduleName)
                if (isset($modules[$moduleName]))
                    $this->_modules[] = $moduleName;
        }
        $result = array();
        foreach($this->modules as $moduleName)
            $result[$moduleName] = $item;
        return $result;
    }
    
    public function getIsAdmin(){ //  (!!!!!!!)
        // Проверяется не модель а текущий пользователь
        if($this->_isAdmin === NULL){
            $this->_isAdmin = Yii::app()->user->checkAccess("Administrator");
        }
        return $this->_isAdmin;
    }
    
    public function setIsAdmin($isAdmin){
        // Проверяется не модель а текущий пользователь
        if($this->canEditAccess){
            $admin = Yii::app()->authManager->getAuthItem('Administrator');
            if ($isAdmin)
                $admin->assign($this->primaryKey);
            else
                $admin->revoke($this->primaryKey);
        }
    }
    
    public function getUserisadmin(){
        // Проверяется модель
        if($this->_userisadmin === NULL){
            if ($this->isNewRecord)
                $this->_userisadmin = 0;
            else {
                $admin = Yii::app()->authManager->getAuthItem('Administrator');
                $this->_userisadmin = $admin ? $admin->isAssigned($this->primaryKey) : false;
            }
        }
        return $this->_userisadmin;
    }
    
    public function setUserisadmin($isAdmin){
        $this->_userisadmin = $isAdmin;
    }
    
    public function getCanView(){
        if($this->_canView === NULL){
            $this->_canView = $this->isAdmin ? TRUE : Yii::app()->user->id==$this->uid;
        }
        return $this->_canView;
    }
    
    public function getCanEditAccess() {
        if($this->_canEditAccess === NULL){
            $this->_canEditAccess = 
                $this->isAdmin 
                && ( $this->isNewRecord 
                     || (    $this->primaryKey!=Yii::app()->user->id
                          && $this->username!=Yii::app()->params["adminName"]
                        )
                   );
        }
        return $this->_canEditAccess;
    }
    
    static public function saveAccessModules($userId, $old=null,$new=null)
    {
        if (empty($userId)) return;
        if (!is_array($old))
            $old = ModuleController::grantedModules($userId);
        if (!is_array($new))
            $new = isset($_POST['Modules'])&&is_array($_POST['Modules']) ? $_POST['Modules'] : array();
        $modules = ModuleController::getModules();

        $insert = array();
        foreach($new as $moduleName)
            if (isset($old[$moduleName]))
                $old[$moduleName] = 0;
            else
                if (isset($modules[$moduleName]) && $modules[$moduleName]['name']==$moduleName)
                    $insert[] = $moduleName;
            
        $delete = array();
        foreach($old as $moduleName => $del)
            if ($del)
                if (isset($modules[$moduleName]) && $modules[$moduleName]['name']==$moduleName)
                    $delete[] = $moduleName;
            
        if ($insert || $delete)
        {
            $authManager = Yii::app()->authManager;
            $trCategories = Yii::app()->db->beginTransaction();
            try 
            {
                if ($insert)
                    foreach($insert as $moduleName) {
                        $authManager->assign($modules[$moduleName]['name'],$userId);
                    }
                
                if ($delete)
                    foreach($delete as $moduleName) {
                        $authManager->revoke($modules[$moduleName]['name'],$userId);
                        //$authManager->getAuthItem($modules[$moduleName]['name'])->revoke($userId);
                    }

                $trCategories->commit();
                // Сбрасываем кеш
                unset(Yii::app()->session['grantedmodules::'.$userId]);
                Yii::app()->cache->delete('user::modules::'.$userId);
            }
            catch(Exception $e) {
                $trCategories->rollback();
            }
        }
    }
        
    static public function makeActivationKey($user){
        $date = date("Y-m-d H:i:s");
        
        $hash = md5(uniqid(rand(),1));
        $hash .= $user->email;
        $hash = md5($hash);
        
        $user->updatetime = $date;
        $user->activationKey = $hash;
        if( $user->save() ){
            return $hash;
        }else{
            return false;
        }
    }
}
