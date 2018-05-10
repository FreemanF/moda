<?php

/**
 * This is the model class for table "brand".
 *
 * The followings are the available columns in table 'brand':
 * @property integer $brid
 * @property string $br_name
 * @property string $br_sef
 * @property integer $br_media_id
 * @property string $dt_start
 * @property string $content_long
 */
class Brand extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Brand the static model class
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
		return 'brand';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content_long', 'required'),
			array('br_media_id', 'numerical', 'integerOnly'=>true),
			array('br_name, br_sef', 'length', 'max'=>255),
			array('dt_start', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('brid, br_name, br_sef, br_media_id, dt_start, content_long', 'safe', 'on'=>'search'),
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
		//'category' => array(self::BELONGS_TO, 'Category', 'pd_category'),
		);
	}

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
			/*
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
			*/
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
            array('order' => $alias.'br_name ASC') :
            array(
//                'condition'=>$alias.'dt_start <="'.$now.'"',
                'order' => $alias.'br_name ASC'
            );
    }

    public function scopes() {
        return array(
            'sef'       => array(),     
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'br_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'brid' => 'Brid',
			'br_name' => 'Br Name',
			'br_sef' => 'Br Sef',
			'br_media_id' => 'Br Media',
			'dt_start' => 'Dt Start',
			'content_long' => 'Content Long',
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

		$criteria->compare('brid',$this->brid);
		$criteria->compare('br_name',$this->br_name,true);
		$criteria->compare('br_sef',$this->br_sef,true);
		$criteria->compare('br_media_id',$this->br_media_id);
		$criteria->compare('dt_start',$this->dt_start,true);
		$criteria->compare('content_long',$this->content_long,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}