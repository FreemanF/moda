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
class Dictionary extends CActiveRecord 
{
    public $is_published;
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
        return 'dictionary';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('dc_name', 'required'),
            array('dc_meta', 'numerical', 'integerOnly' => true),
            array('dc_name, dc_sef', 'length', 'max' => 255),
            array('dc_name, dt_start, content_long, is_published', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('dcid, dc_meta, dc_name, dc_sef, dt_start', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'meta'  => array(self::HAS_ONE   , 'Meta' , '', 'on' => 'dc_meta=eid'),
            'media' => array(self::BELONGS_TO, 'Media', 'dc_media_id'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'MetaBehavior',
            'MediaBehavior' => array(
                'class'=>'MediaBehavior',
                'withSort'=>true,
                'media_label' => 'Фото на главной',
                'cropAspect'=>array(800,600)),
            'DateBehavior',
            'LogBehavior',
            'PrefixedModel'  => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        $now = date('Y-m-d H:i:s');
        return $this->getDefaultScopeDisabled() ?
            array('order' => 'dc_name, dt_start ASC') :
            array(
//                'condition'=>'dt_start <="'.$now.'"',
                'order' => 'dc_name ASC'
            );
    }

    public function scopes() {
        return array(
            'sef' => array(),
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'dc_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'dcid'          => 'ID',
            'dc_meta'       => 'Мета-тэг',
            'dc_name'       => 'Заголовок',
            'dc_sef'        => 'URL',
            'dt_start'     => 'Начало публикации',
            'content_long' => 'Текст',
            'humanDate'    => 'Начало публикации',
            'is_published' => 'Публиковать на главной'
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

        $criteria->compare('dcid', $this->dcid);
        $criteria->compare('dc_name', $this->dc_name, true);
        $criteria->compare('is_published', $this->is_published);
        $this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function content_cut($length=200)
    {
        return Comportable::html_mb_substr($this->content_long, 0, $length);
    }
    
    public function getName()
    {
        return $this->dc_name;
    }
    
    public function beforeSave() {
        if (!parent::beforeSave()) return false;

        //Yii::log('beforeSaveOnNewsModel');
        $this->is_published = $this->is_published;

        return true;
    }
    
}