<?php

/**
 * This is the model class for table "log".
 *
 * The followings are the available columns in table 'log':
 * @property integer $zid
 * @property integer $z_type
 * @property string $dt_event
 * @property integer $z_user
 * @property integer $z_object_type
 * @property integer $z_object_id
 * @property string $z_name
 * @property string $z_sef
 *
 * The followings are the available model relations:
 * @property Object $zObjectType
 * @property User $zUser
 */
class Log extends CActiveRecord
{
    const LOG_INSERT = 1;
    const LOG_UPADTE = 2;
    const LOG_DELETE = 3;
    const LOG_SHOW   = 4;
    const LOG_HIDE   = 5;

    const USEIP = false; // Устанавливать значение в true только до базовых миграций
    
    public $object_name;
    public $editor_search;
    public $ip_address;
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Log the static model class
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
        return '{{log}}';
    }

    public function getOwnerName() {
        // используется при логировании? см.LogBehavior
        return $this->z_name;
    }
    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('z_type, z_object_type', 'required'),
            array('z_type, z_object_type, z_object_id', 'numerical', 'integerOnly'=>true),
            array('z_name', 'length', 'max'=>255),
            array('z_user, dt_event', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('dt_event, z_name, editor_search, z_type, z_object_type'.(self::USEIP?', ip_address':''), 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //'object' => array(self::BELONGS_TO, 'Object', 'z_object_type'),
            'editor' => array(self::BELONGS_TO, 'User', 'z_user'),
            'event'  => array(self::BELONGS_TO, 'Lists'   , array('z_type'=>'lid'),'on'=>'ltype="LE"','order'=>'l_sort ASC'),
        );
    }

    public function disableDefaultScope() { // Требуется для CRUDController::actionIndex
        return $this;
    }
    
    public function defaultScope()
    {
        $scope = array('order' => 'dt_event DESC');
        if (self::USEIP)
            $scope['select'] = array('*',
                'INET_NTOA(z_rawip) AS ip_address');
        return $scope;
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'zid'      => 'ID',
            'z_type'   => 'Тип действия',
            'dt_event' => 'Дата действия',
            'z_user'   => 'Редактор',
            'z_object_type' => 'Раздел',
            'z_object_id'   => 'OID',
            'z_name'   => 'Название',
            'editor_search'   => 'Редактор',
            'ip_address'      => 'IP-адрес',
            'object_name'     => 'Раздел',
        );
    }

//    public function defaultScope()
//    {
//        return array('order' => 'zid DESC');
//    }
    
    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        $criteria->with = array('editor','event');

        //$criteria->compare('zid',$this->zid);
        if ($this->z_type)
            $criteria->compare('z_type',$this->z_type);

        $date = Comportable::emptyDate($this->dt_event) ? '' :
            date('Y-m-d',CDateTimeParser::parse($this->dt_event,'dd-MM-yyyy'));
        $criteria->compare('dt_event',$date,true);
        //$criteria->compare('z_user',$this->z_user);
        if ($this->z_object_type)
            $criteria->compare('z_object_type',$this->z_object_type);
        //$criteria->compare('z_object_id',$this->z_object_id);
        $criteria->compare('z_name',$this->z_name,true);

        $criteria->compare('editor.username', $this->editor_search, true );
        
        if (self::USEIP)
            if ($this->ip_address && ($ip=CachedWebUser::ip2long($this->ip_address)))
                $criteria->compare('z_rawip', $ip);
        
        // Column not found: 1054 Unknown column 'ip_address' in 'where clause'.
        // SELECT COUNT(DISTINCT `t`.`zid`) FROM `log` `t`
        //$criteria->compare('ip_address', $this->ip_address, true );
        $sort = array('attributes'=>array(
            'editor_search'=>array(
                'asc'=>'editor.username',
                'desc'=>'editor.username DESC',
            )));
        if (Log::USEIP)
            $sort['attributes']['ip_address'] = array(
                'asc'=>'z_rawip',
                'desc'=>'z_rawip DESC',
            );
        $sort['attributes'][] = '*';
        
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>$sort,
        ));
    }
    
    static private function makeLog($type,$otype,$oid,$name) {
        // Yii::log("LOG:$type,$otype,$oid,$name");
        // Для crontab протокол не ведём т.к.: Не определено свойство "CConsoleApplication.user"

        $log = new Log();
        $log->z_type   = $type;
        $log->dt_event = date('Y-m-d H:i:s');
        $log->z_user   = isset(Yii::app()->user) 
            ? Yii::app()->user->id
            : new CDbExpression('null');
        if (Log::USEIP)
            $log->z_rawip  = isset(Yii::app()->user)
                ? Yii::app()->user->rawip
                : CachedWebUser::ip2long($_SERVER['REMOTE_ADDR']);
        $log->z_object_type = $otype;
        $log->z_object_id   = $oid;
        $log->z_name        = $name;
        $log->save();
        
//        $Jeapie = Yii::app()->Jeapie;
//        $op = array('Добавление','Изменение','Удаление');
//        $Jeapie->setTitle($op[$type-1]);  // optional
//        $Jeapie->setMessage("[".Object::getObject($otype)->singular.":$oid] http://elevatorist.com $name");   // required
////            ->setDevice('htcsensation')     // optional
////            ->setPriority(0)      // optional. can be -1, 0, 1
//        if (!$Jeapie->send()) // return true or false
//            Yii::log('JEAPIE:'.var_export(PushMessage::init()->getErrors(),true));
//        else
//            Yii::log('JEAPIE:send');
    }
    
    static public function makeInsert($otype,$oid,$name) {
        self::makeLog(self::LOG_INSERT,$otype,$oid,$name);
    }
    
    static public function makeUpdate($otype,$oid,$name) {
        self::makeLog(self::LOG_UPADTE,$otype,$oid,$name);
    }
    
    static public function makeDelete($otype,$oid,$name) {
        self::makeLog(self::LOG_DELETE,$otype,$oid,$name);
    }
    
    static public function makeShow($otype,$oid,$name) {
        self::makeLog(self::LOG_SHOW,$otype,$oid,$name);
    }
    
    static public function makeHide($otype,$oid,$name) {
        self::makeLog(self::LOG_HIDE,$otype,$oid,$name);
    }
    
}