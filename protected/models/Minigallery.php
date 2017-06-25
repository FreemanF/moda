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
 * @property string $content_orig
 * @property integer $content_type
 * @property string $content_long
 * @property integer $g_cat_main
 * @property integer $view_count
 * @property integer $like_count
 * @property integer $photo_count
 *
 * The followings are the available model relations:
 * @property Category $gCatMain
 * @property Meta $gMeta
 */
class MiniGallery extends CActiveRecord
{
    public $code;
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
        return '{{miniGallery}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('mg_name', 'required'),
            array('mg_name', 'length', 'max'=>255),
            array('mg_name', 'unique', 'message'=>'Мини галерея с таким Названием уже существует.'),
            array('is_published', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('mgid, mg_name', 'safe', 'on'=>'search'),
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
            'media'      => array(self::MANY_MANY , 'Media'   , '{{linkOI}}(object_id,media_id)'
                  , 'on'     => 'object_type='.Object::idMiniGallery
                  , 'scopes' => array('withWatermark')
                  , 'select' => array('media.*'
                      ,'media_media.type as i_main'
                      ,'media_media.sort as i_sort')
                  , 'order'  => 'sort ASC'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'MediaBehavior' => array('class'=>'MediaBehavior',
                'mediaField'=>'', 
                'simple'=>false,
                'withWatermark'=>true, 
                'withSort'=>true,
                //'minSize'=>array(400,290),
                //'cropEditable'=>false,
                'cropAspect'=>array(200,145)),
            'LogBehavior',
            //'FilterBehavior' => array('class'=>'FilterBehavior'),
            'PrefixedModel'  => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        return $this->getDefaultScopeDisabled() ?
            array() :
            array('condition'=>'is_published=1');
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'mgid'         => 'ID-мини галереи',
            'mg_name'      => 'Заголовок',
            'code'         => 'Код для вставки',
            'is_published' => 'Публиковать',
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

        $criteria->compare('mgid',$this->mgid);
        $criteria->compare('mg_name',$this->mg_name,true);

        //$this->setFilterObject(array('mgid','mg_name'));
        
        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }
    
}