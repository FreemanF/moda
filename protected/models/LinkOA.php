<?php

class LinkOA extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'linkOA';
    }

    public function primaryKey() {
        return array('linksoa', 'object_type', 'object_id');
    }

    public function rules()
    {
        return array(
            array('linksoa, object_type, object_id', 'required'),
            array('linksoa, object_type, object_id', 'numerical', 'integerOnly'=>true),
            array('text', 'safe'),
        );
    }
}