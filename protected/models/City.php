<?php

/**
 * This is the model class for table "city".
 *
 * The followings are the available columns in table 'brand':
 * @property integer $ctid
 * @property string $ct_name
 * @property string $ct_sef
 * @property string $dt_start
 * @property string $content_long
 */
class City extends CActiveRecord
{
    public $content_long = '';
	public $content_type = 1;
	public $is_published = TRUE;
	
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
		return '{{city}}';
	}
        
        public function getId() {
        // Ф-я используется в yii в CArrayDataProvider
            return $this->primaryKey;
        }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ct_name', 'required'),
//			array('br_media_id', 'numerical', 'integerOnly'=>true),
			array('ct_name, ct_sef', 'length', 'max'=>255),
			array('ct_name, ct_sef, dt_start', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ctid, ct_name, ct_sef, dt_start', 'safe', 'on'=>'search'),
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
			'SefBehavior',
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
            array('order' => $alias.'ct_name ASC') :
            array(
//                'condition'=>$alias.'dt_start <="'.$now.'"',
                'order' => $alias.'ct_name ASC'
            );
    }

    public function scopes() {
        return array(
            'sef'       => array(),     
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'ct_sef=:sef',
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
			'ctid' => 'ID',
			'ct_name' => 'Название города',
			'ct_sef' => 'УРЛ',
			'dt_start' => 'Дата публикации',
			'content_long' => 'Контент',
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

		$criteria->compare('ctid',$this->ctid);
		$criteria->compare('ct_name',$this->ct_name,true);
		$criteria->compare('ct_sef',$this->ct_sef,true);
		$criteria->compare('dt_start',$this->dt_start,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}