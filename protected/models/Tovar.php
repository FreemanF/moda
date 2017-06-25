<?php

/**
 * This is the model class for table "tovar".
 *
 */
class Tovar extends CActiveRecord 
{
    public $i_main;
    public $i_sort;
    public $i_main2;
    public $i_sort2;
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
        return 'tovar';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tv_name, tv_cat_main', 'required'),
            array('tv_meta, tv_cat_main, tv_gal_id, tv_gallery_id', 'numerical', 'integerOnly' => true),
            array('tv_name, tv_sef, tv_cena', 'length', 'max' => 255),
            array('tv_name, dt_start, tv_sort, tv_cena, tv_gal_id, tv_gallery_id, content_long, is_published', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('tvid, tv_meta, tv_name, tv_sef, tv_sort, dt_start, tv_cat_main', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'category' => array(self::BELONGS_TO, 'Category', 'tv_cat_main'),
            'meta'     => array(self::HAS_ONE   , 'Meta'    , '', 'on' => 'tv_meta=eid'),
            'media'    => array(self::MANY_MANY , 'Media'   , 'linkOI(object_id,media_id)'
                                                , 'on' => 'type = 0 and object_type='.Object::idTovar
                                                                  , 'scopes' => array('withWatermark')
                                                                  , 'select' => array('media.*'
                                                                      ,'media_media.type as i_main'
                                                                      ,'media_media.sort as i_sort')
                                                                  , 'order'  => 'sort ASC'),
            'media2'    => array(self::MANY_MANY , 'Media'   , 'linkOI(object_id,media_id)'
                                    , 'on' => 'type = 1 and object_type='.Object::idTovar
                                                      , 'scopes' => array('withWatermark')
                                                      , 'select' => array('media2.*'
                                                          ,'media2_media2.type as i_main2'
                                                          ,'media2_media2.sort as i_sort2')
                                                      , 'order'  => 'i_sort2 ASC'),
            'gallery' => array(self::HAS_ONE, 'Gallery', '', 'on' => 'tv_gal_id=gid'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'AttributeBehavior' => array(
                'class'      => 'AttributeBehavior',
                'LinkObjectType' => Object::idCategory,
//                'LinkObjectID'   => 'category->cid',
//                'LinkObject'     => 'category',
                'LinkField'      => 'tv_cat_main',
            ),
            'MetaBehavior',
            'MediaBehavior' => array(
                'class'=>'MediaBehavior',
                'simple'=>false,
                'withSort'=>true,
                'media_type' => 0,
                'media_label' => 'Фасад',
//                'cropAspect'=>array(200,145)
                ),
            'MediaBehaviorz' => array(
              'class' => 'MediaBehavior',
                'simple'=>false,
                'media_label' => 'План',
                'media_type' => 1,
                'mediaRelation' => 'media2'
            ),
            'DateBehavior',
            'LogBehavior',
            'PrefixedModel'  => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        $now = date('Y-m-d H:i:s');
        $alias = $this->getTableAlias(false,false).'.';
//        return $this->getDefaultScopeDisabled() ?
//            array('order' => $alias.'dt_start DESC') :
//            array(
//                'condition'=>$alias.'dt_start <="'.$now.'"',
//                'order' => $alias.'dt_start DESC'
//            );
        return $this->getDefaultScopeDisabled() ?
            array('order' => $alias.'tv_sort ASC') :
            array(
//                'condition'=>$alias.'dt_start <="'.$now.'"',
                'order' => $alias.'tv_sort ASC'
            );
    }

    public function scopes() {
        return array(
            'sef'       => array(),
            'category'  => array(),     
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'tv_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
    
    public function category($cid) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'tv_cat_main=:cid',
            'params' => array('cid' => $cid),
        ));
        return $this;
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'tvid'          => 'ID-новости',
            'tv_meta'       => 'Мета-тэг',
            'tv_name'       => 'Заголовок',
            'tv_sef'        => 'URL',
            'tv_cat_main'   => 'Рубрика',
            'dt_start'     => 'Начало публикации',
            'content_long' => 'Текст',
            'humanDate'    => 'Начало публикации',
            'tv_gallery_id'  => 'Галерея',
            'tv_gal_id' => 'Галерея',
            'tv_cena' => 'Цена под ключ',
            'tv_sort' => 'Приоритет сортировки (0-100)',
            'is_published' => 'Хиты продаж'
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

        $criteria->compare('tvid', $this->tvid);
        $criteria->compare('tv_name', $this->tv_name, true);
        $criteria->compare('tv_cena', $this->tv_cena, true);
        $criteria->compare('tv_sort', $this->tv_sort, true);
        $criteria->compare('is_published', $this->is_published);
        $this->humanDateSearch($criteria,$this->dt_start);
        if ($this->tv_cat_main)
            $criteria->compare('tv_cat_main',$this->tv_cat_main);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function beforeSave() {
    if (!parent::beforeSave()) return false;

    //Yii::log('beforeSaveOnNewsModel');
    $this->tv_gal_id = $this->tv_gal_id;
    $this->tv_cena = $this->tv_cena;
    $this->tv_sort = $this->tv_sort;
    $this->is_published = $this->is_published;
//    $this->content_short = Comportable::ClearPHPTags($this->content_short);
    // Добавить проверку существования Category->c_sef
    //$this->a_sef = TranslitFilter::translitUrl($this->a_name);
    return true;
    }
    
    public function content_cut($length=200)
    {
        return Comportable::html_mb_substr($this->content_long, 0, $length);
    }
    
    static public function makeIds($str) {
        // В строке через запятую перечислены id тэгов
        $ids = explode(',', $str);
        foreach ($ids as $ix=>$str_id) {
            $id = intval($str_id);
            if ( $id )
                $ids[$ix] = $id;
            else
                unset($ids[$ix]);
        }
        return $ids;
    }
    
    public function getName()
    {
        return $this->tv_name;
    }
}