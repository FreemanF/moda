<?php

/**
 * This is the model class for table "linkNG".
 *
 * The followings are the available columns in table 'linkNG':
 * @property integer $article_id
 * @property integer $object_id
 * @property integer $tag_id
 *
 * The followings are the available model relations:
 * @property Tags $tag
 */
class LinkOI extends CActiveRecord
{
    public  $max = 0;
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return LinkNG the static model class
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
        return '{{linkOI}}';
    }

    public function primaryKey() {
        return array('object_type','object_id','type','media_id');
    }
    
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('object_type, object_id, media_id', 'required'),
            array('object_type, object_id, type, media_id, sort', 'numerical', 'integerOnly'=>true),
        );
    }
}