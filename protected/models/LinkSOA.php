<?php

class LinkSOA extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'linkSOA';
    }

    public function rules()
    {
        return array(
            array('object_id, object_type, attribute_id, sort', 'required'),
            array('object_id, object_type, attribute_id, sort, inFilter', 'numerical', 'integerOnly'=>true),
            array('object_id, object_type, attribute_id', 'safe', 'on'=>'search'),
        );
    }
    
    public function relations() {
        return array(
            'attribute' => array(self::BELONGS_TO, 'Attribute', 'attribute_id'),
        );
    }
    
}