<?php

/**
 * This is the model class for table "gallery".
 *
 * The followings are the available columns in table 'gallery':
 * @property integer $gid
 * @property integer $g_meta
 * @property string $g_name
 * @property string $g_sef
 * @property string $dt_start
 * @property integer $g_cat_main
 * @property integer $photo_count
 *
 * The followings are the available model relations:
 * @property Category $gCatMain
 * @property Meta $gMeta
 */
class Attachment extends CActiveRecord
{
    public $is_published = 1;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Gallery the static model class
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
        return 'attachment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('at_name', 'required'),
            array('at_name', 'length', 'max'=>255),
            array('at_name, at_patch, at_message', 'safe'),
//            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('atid, at_name, at_patch, at_message', 'safe', 'on'=>'search'),
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
            'messages'   => array(self::BELONGS_TO, 'Messages'  , 'at_message'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'PrefixedModel' => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        return array();
    }

    public function scopes() {
        return array(
//            'sef' => array(),
        );
    }
    
    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'g_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
    
    public function listNames() {
        $g_all = Gallery::model()->findAll();
        return CHtml::listData($g_all, 'gid', 'g_name');
        //Yii::log('LIST: '.var_export($list,true));
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'atid' => 'id',
            'at_name' => 'Name',
            'at_patch' => 'Patch',
            'at_message' => 'Сообщение',
            'dt_start'      => 'Дата публикации',
            'humanDate'     => 'Дата публикации',
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

        $criteria->compare('atid',$this->atid);
        $criteria->compare('at_name',$this->at_name,true);
        $criteria->compare('at_patch',$this->at_patch,true);
        $criteria->compare('at_message',$this->at_message,true);

        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }
    
    protected function afterDelete()
    {
        Attachment::model()->deleteAllByAttributes(array('at_message'=> $this->msid));
        unlink($this->at_patch);
//        dirname(dirname(__DIR__)).'/uploads/'.$new_msg->msid.'-'.$pic->name
        return parent::beforeDelete();
    }
    
}