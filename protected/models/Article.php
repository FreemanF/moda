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
class Article extends CActiveRecord 
{
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
        return 'article';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ar_name', 'required'),
            array('ar_meta', 'numerical', 'integerOnly' => true),
            array('ar_name, ar_sef', 'length', 'max' => 255),
            array('ar_name, dt_start, content_long', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('arid, ar_meta, ar_name, ar_sef, dt_start', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'meta' => array(self::HAS_ONE, 'Meta', '', 'on' => 'ar_meta=eid'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'MetaBehavior',
            'DateBehavior',
            'LogBehavior',
            'PrefixedModel'  => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        $now = date('Y-m-d H:i:s');
        return $this->getDefaultScopeDisabled() ?
            array('order' => 'dt_start DESC') :
            array(
                'condition'=>'dt_start <="'.$now.'"',
                'order' => 'dt_start DESC'
            );
    }

    public function scopes() {
        return array(
            'sef' => array(),    
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'ar_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'arid'          => 'ID-новости',
            'ar_meta'       => 'Мета-тэг',
            'ar_name'       => 'Заголовок',
            'ar_sef'        => 'URL',
            'dt_start'     => 'Начало публикации',
//            'short_content'=> 'Краткое описание',
            'content_long' => 'Текст',
            'humanDate'    => 'Начало публикации',
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

        $criteria->compare('arid', $this->arid);
        $criteria->compare('ar_name', $this->ar_name, true);
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
        return $this->ar_name;
    }
}