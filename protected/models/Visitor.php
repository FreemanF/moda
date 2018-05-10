<?php

/**
 * This is the model class for table "visitor".
 *
 * The followings are the available columns in table 'visitor':
 * @property integer $id
 * @property string $ip
 */
class Visitor extends CActiveRecord
{
    static public $visitorID = null;
    
    const TASK_MAILTOFRIEND = 1;
    
    const SUBTASK_NULL = 0;
    
    const FIVE_MINUTES = 300;
    const NOW          = 0;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Visitor the static model class
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
        return '{{visitor}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ip', 'required'),
            array('ip', 'length', 'max'=>40),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, ip', 'safe', 'on'=>'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'ip' => 'Ip',
        );
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

        $criteria->compare('id',$this->id);
        $criteria->compare('ip',$this->ip,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    //-----------Ограничение количества отправленных писем------------------

    static public function getVisitor() {
        // Visitor - уникальный id по IP
        if (self::$visitorID===null) {
            $ip = $_SERVER['REMOTE_ADDR'];
            $visitor = Visitor::model()->findByAttributes(array('ip'=>$ip));
            if ($visitor)
                self::$visitorID = $visitor->id;
            else {
                $visitor = new Visitor();
                $visitor->ip = $ip;
                if ($visitor->save())
                    self::$visitorID = $visitor->primaryKey;
                else {
                    self::$visitorID = 0;
                    Yii::log('Не удалось записать в таблицу visitor');
                }
            }
        }
        return self::$visitorID;
    }

    static private function getTrackIP($task,$tid,$vid,$enabletimesec=0) {
        $filter = '';
        if ($enabletimesec) {
          $time = self::PlaceTime('Y-m-d H:i:s',$enabletimesec); // $sec>0
          $filter = '`tm` >="'.$time.'"';
        }
        return Trackip::model()->findByAttributes(array(
            'task'=>$task,
            'tid'=>$tid,
            'vid'=>$vid,
        ),$filter);
    }

    /*  task  tid
     *    1   tender_id   Отправка писем ("Посмотри что я нашел на сайте")
     */

    static public function taskEnabled($task,$tid,$enabletimesec) {
        $vid = self::getVisitor();
        return !(boolean)self::getTrackIP($task,$tid,$vid,$enabletimesec);
    }
    
    static public function taskExecute($task,$tid,$beforesec=self::NOW) {
        $vid = self::getVisitor();
        $trackip = new Trackip();
        $trackip->setAttributes(array(
             'task' => $task  ,'tid'  => $tid
            ,'vid'  => $vid   ,'tm'   => self::PlaceTime('Y-m-d H:i:s',$beforesec)
        ));
        if ($trackip->save())
            return true; // Операция разрешена, выполнялась давно
        else {
            Yii::log('checkTrackIP: error insertion into trackip');
            return false; // Запрещаем, чтобы быстрее обнаружить ошибку
        }
    }
    
    static private function PlaceTime($format='',$beforesec=0) {
        $tm = time()-$beforesec;
        if ($format) return date($format,$tm);
        else return $tm;
    }
    
}