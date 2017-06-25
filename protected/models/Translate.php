<?php

/**
 * This is the model class for table "translate".
 *
 * The followings are the available columns in table 'translate':
 * @property integer $id
 * @property integer $object_type
 * @property integer $object_id
 * @property string $lang
 * @property string $name
 * @property string $value
 *
 * The followings are the available model relations:
 * @property Object $objectType
 */
class Translate extends CActiveRecord
{
    const ru = ' (Рус)';
    const en = ' (Англ)';
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Translate the static model class
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
        return '{{translate}}';
    }

    public function primaryKey() {
        return array('object_type','object_id','lang','name');
    }
    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('object_type, object_id, lang, name, value', 'required'),
            array('object_type, object_id', 'numerical', 'integerOnly'=>true),
            array('lang', 'length', 'max'=>6),
            array('name', 'length', 'max'=>255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, object_type, object_id, lang, name, value', 'safe', 'on'=>'search'),
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
            'objectType' => array(self::BELONGS_TO, 'Object', 'object_type'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'object_type' => 'Object Type',
            'object_id' => 'Object',
            'lang' => 'Lang',
            'name' => 'Name',
            'value' => 'Value',
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

        $criteria->compare('id',$this->id);
        $criteria->compare('object_type',$this->object_type);
        $criteria->compare('object_id',$this->object_id);
        $criteria->compare('lang',$this->lang,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('value',$this->value,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}