<?php

class Review extends CActiveRecord 
{

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{review}}';
    }

    public function rules() {
        return array(
            array('rwid, dt_start, dt_end, rw_sef, content_long', 'required'),
            array('rwid, is_published, is_positive', 'numerical', 'integerOnly'=>true),
            array('rw_name', 'length', 'max'=>254),
            array('rw_sef', 'length', 'max'=>255),
            array('is_published, dt_start, dt_end, rw_name, rw_sef, content_long, is_positive', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('rwid, is_published, dt_start, dt_end, rw_name, rw_sef, content_long, is_positive', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
//            'meta'  => array(self::BELONGS_TO, 'Meta' , 'n_meta'),
//            'media' => array(self::BELONGS_TO, 'Media', 'n_media_id'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'ContentBehavior',
//            'MetaBehavior',
//            'MediaBehavior' => array(
//                'class'=>'MediaBehavior',
//                'withSort'=>true,
//                'cropAspect'=>array(100,100)),
            'SefBehavior',
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
                'condition'=>'dt_start <= dt_end',
                'order' => 'dt_start DESC'
            );
    }

    public function scopes() {
        return array(
            'sef'       => array(),
            'published' => array(),
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'rw_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
    
    public function published() {
        return $this;
    }
    
    public function attributeLabels() {
        return array(
            'rwid'          => 'ID-отзыва',
            'dt_end'       => 'Конечная дата',
            'rw_name'       => 'Заголовок',
            'rw_sef'        => 'URL',
            'dt_start'     => 'Начало публикации',
            'content_orig' => 'Текст',
            'is_published' => 'Опубликован',
            'content_long' => 'Текст',
            'humanDate'    => 'Начало публикации',
            'is_positive'  => 'Позитивный',
            'rw_product'  => 'Товар',
         );
    }

    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('rwid',$this->rwid);
        $criteria->compare('is_published',$this->is_published);
        $criteria->compare('dt_start',$this->dt_start,true);
        $criteria->compare('dt_end',$this->dt_end,true);
        $criteria->compare('rw_name',$this->rw_name,true);
        $criteria->compare('rw_sef',$this->rw_sef,true);
        $criteria->compare('content_long',$this->content_long,true);
        $criteria->compare('is_positive',$this->is_positive);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    
    public function getOwnerUrl() {
        return '/review/'.$this->rw_sef;
    }
}