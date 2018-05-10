<?php

/**
 * This is the model class for table "favorites".
 *
 * The followings are the available columns in table 'favorites':
 * @property integer $frid
 * @property integer $fr_product_id
 * @property integer $fr_user_id
 */
class Favorites extends CActiveRecord
{
    public $is_published = 1;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'favorites';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fr_product_id, fr_user_id', 'numerical', 'integerOnly'=>true),
            array('fr_product_id, fr_user_id', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('frid, fr_product_id, fr_user_id', 'safe', 'on'=>'search'),
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
            'product' => array(self::BELONGS_TO, 'Product', 'fr_product_id'),
            'user'    => array(self::BELONGS_TO, 'Users',    'fr_user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'frid' => 'Frid',
            'fr_product_id' => 'Товар',
            'fr_user_id' => 'Кто добавил в избранное',
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

        $criteria->compare('frid',$this->frid);
        $criteria->compare('fr_product_id',$this->fr_product_id);
        $criteria->compare('fr_user_id',$this->fr_user_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Favorites the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}