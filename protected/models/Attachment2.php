<?php

/**
 * This is the model class for table "attachment".
 *
 * The followings are the available columns in table 'attachment':
 * @property integer $atid
 * @property string $at_name
 * @property string $at_patch
 * @property integer $at_message
 */
class Attachment extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'attachment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('at_name, at_patch, at_message', 'required'),
            array('at_message', 'numerical', 'integerOnly'=>true),
            array('at_name, at_patch', 'length', 'max'=>255),
            array('at_name, at_patch, at_message', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('atid, at_name, at_patch, at_message', 'safe', 'on'=>'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'atid' => 'Atid',
            'at_name' => 'At Name',
            'at_patch' => 'At Patch',
            'at_message' => 'Сообщение',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('atid',$this->atid);
        $criteria->compare('at_name',$this->at_name,true);
        $criteria->compare('at_patch',$this->at_patch,true);
        $criteria->compare('at_message',$this->at_message);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Attachment the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}