<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $nid
 * @property integer $n_obj
 * @property integer $n_meta
 * @property string $n_name
 * @property string $n_sef
 * @property string $dt_start
 * @property string $content_long
 * @property integer $content_type
 * @property string $content_orig
 *
 * The followings are the available model relations:
 * @property LinkAC[] $linkACs
 * @property LinkAI[] $linkAIs
 */
class Users extends CActiveRecord 
{
    public $content_type = 1;
    public $content_long = '';
    public $content_orig = '';
    public $pr_password;
    public $us_gender = '';
    public $gender = 'default';
    public $isAdmin = false;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Article the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('facebook_id', 'required'),
            array('us_login, us_sef', 'unique', 'message'=>'Логин с таким Названием уже существует.'),
//            array('n_meta', 'numerical', 'integerOnly' => true),
            array('us_name, us_login, us_password, us_family, us_otchestvo,
                   us_city, us_phone, us_email, us_site, us_organization, us_profession, us_sef', 'length', 'max' => 255),
            array('us_name, us_login, us_password, us_family, us_otchestvo,
                   us_city, us_phone, is_published, us_email, us_site, us_organization, us_profession, status, facebook_id, us_sef', 'safe'),
//            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('usid, us_login, us_name, us_password, us_family, us_otchestvo,'
                . 'us_city, us_phone, us_email, is_published, us_site, us_profession, status, facebook_id, us_sef', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
//            'meta'  => array(self::HAS_ONE   , 'Meta' , '', 'on' => 'n_meta=eid'),
//            'media' => array(self::BELONGS_TO, 'Media', 'n_media_id'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
//            'MetaBehavior',
//            'MediaBehavior' => array(
//                'class'=>'MediaBehavior',
//                'withSort'=>true,
//                'cropAspect'=>array(200,145)),
//            'DateBehavior',
            
            'LogBehavior',
            'PrefixedModel'  => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        $now = date('Y-m-d H:i:s');
        return $this->getDefaultScopeDisabled() ?
            array('order' => $this->getTableAlias(false,false).'.us_name DESC') :
            array('order' => $this->getTableAlias(false,false).'.us_name ASC');
    }

    public function scopes() {
        return array(
            'sef' => array(),    
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'us_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'usid'          => 'ID-пользователя',
            'us_family'     => 'Фамилия',
            'us_name'       => 'Имя',
            'us_otchestvo'  => 'Отчество',
            'us_login'     => 'Логин',
            'us_password'  => 'Пароль',
            'us_city'      => 'Город',
            'us_phone'     => 'Телефон',
            'us_email'     => 'E-mail',
            'us_site'      => 'Сайт',
            'us_organization' => 'Предприятие',
            'us_profession' => 'Должность',
            'is_published' => 'Активен',
            'status' => 'Статус',
            'facebook_id' => 'Идентификатор FB',
            'us_sef' => 'URL',
         );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('usid', $this->usid);
        $criteria->compare('us_name', $this->us_name, true);
        $criteria->compare('us_login', $this->us_login, true);
        $criteria->compare('us_password', $this->us_password, true);
        $criteria->compare('us_family', $this->us_family, true);
        $criteria->compare('us_otchestvo', $this->us_otchestvo, true);
        $criteria->compare('us_city', $this->us_city, true);
        $criteria->compare('us_phone', $this->us_phone, true);
        $criteria->compare('us_site', $this->us_site, true);
        $criteria->compare('us_profession', $this->us_profession, true);
        $criteria->compare('us_email', $this->us_email, true);
        $criteria->compare('us_organization', $this->us_organization, true);
        $criteria->compare('is_published', $this->is_published, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('facebook_id', $this->facebook_id, true);
        $criteria->compare('us_sef', $this->us_sef, true);
//        $this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
//    public function content_cut($length=100)
//    {
//        return Comportable::html_mb_substr($this->content_long, 0, $length);
//    }
    
    public static function getName()
    {
        return $this->us_name;
    }
    
    public static function getUserLog(){
        return isset(Yii::app()->request->cookies['KrontifKPD']) ? json_decode(Yii::app()->request->cookies['KrontifKPD']->value) : NULL;
    }
    
    public static function isLoggedIn(){
        $user = self::getUserLog();
        $unset  = false;
        $result = NULL;
        
        if ($user) {
            $result = array();
            foreach ($user as $userID=>$num){
                $usr = Users::model()->findByAttributes(array('us_password'=>$num));
                if ($usr){
//                    $result[$productID] = array(
//                        'count'   => $num,
//                        'product' => $product
//                    );
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
    
    public static function logName(){
        $user = self::getUserLog();
        $unset  = false;
        
        if ($user) {
            foreach ($user as $userID=>$num){
                $usr = Users::model()->findByAttributes(array('us_password'=>$num));
                if ($usr){
                    return $usr->us_login;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
    
}