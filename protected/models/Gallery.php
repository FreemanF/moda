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
class Gallery extends CActiveRecord
{
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
        return 'gallery';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('g_name', 'required'),
            array('g_name', 'length', 'max'=>255),
            array('dt_start, short_content', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('gid, g_name, dt_start', 'safe', 'on'=>'search'),
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
            'meta'  => array(self::HAS_ONE   , 'Meta'    , '', 'on' => 'g_meta=eid'),
            'media' => array(self::MANY_MANY , 'Media'   , 'linkOI(object_id,media_id)'
                  , 'on'     => 'object_type='.Object::idGallery
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
            'MetaBehavior',
            'MediaBehavior' => array('class'=>'MediaBehavior',
                'mediaField'=>'', 
                'simple'=>false,
                'withSort'=>true,
                'cropAspect'=>array(200,150)),
            'DateBehavior',
            'LogBehavior',
            'SefBehavior',
            'PrefixedModel' => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        $now = date('Y-m-d H:i:s');
        $alias = $this->getTableAlias(false,false).'.';
        return $this->getDefaultScopeDisabled() ?
            array('order' => $alias.'dt_start DESC') :
            array(
                'condition'=> $alias.'dt_start <="'.$now.'"',
                'order' => $alias.'dt_start DESC'
            );
    }

    public function scopes() {
        return array(
            'sef' => array(),
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
            'gid'           => 'ID-фотогалереи',
            'g_meta'        => 'Мета-тэг',
            'g_name'        => 'Заголовок',
            'short_content' => 'Краткое описание',
            'g_sef'         => 'URL',
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

        $criteria->compare('gid',$this->gid);
        $criteria->compare('g_meta',$this->g_meta);
        $criteria->compare('g_name',$this->g_name,true);
        $criteria->compare('g_sef',$this->g_sef,true);
        $this->humanDateSearch($criteria,$this->dt_start);

        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }
    
}