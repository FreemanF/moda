<?php

/**
 * This is the model class for table "clients".
 *
 * The followings are the available columns in table 'clients':
 * @property integer $clid
 * @property string $cl_name
 * @property string $cl_link
 * @property string $dt_start
 * @property string $content_orig
 * @property integer $content_type
 * @property string $content_long
 * @property integer $is_published
 * @property integer $cl_media_id
 */
class Client extends CActiveRecord
{
    public $is_published = 1;
    public $max;
    public $content_long, $content_orig = '';
    public $content_type = 0;
    private $_classSort;
    public $dt_start = '';

    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Partner the static model class
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
		return 'clients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cl_name', 'required'),
			array('is_published, cl_category', 'numerical', 'integerOnly'=>true),
			array('cl_name, cl_sef', 'length', 'max'=>255),
			array('content_long, cl_sef', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('clid, cl_name, cl_sef, cl_category, content_long, is_published, cl_media_id', 'safe', 'on'=>'search'),
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
                    'media' => array(self::BELONGS_TO, 'Media', 'cl_media_id'),
					'category'   => array(self::BELONGS_TO, 'Category', 'cl_category'), //, 'on'=>'c_obj='.Object::idNews),
		);
	}
        
        public function behaviors()
        {
            return array(
                'DisableDefaultScopeBehavior',
                'MediaBehavior' => array(
                'class'=>'MediaBehavior',
                'withSort'=>false),
//                'DateBehavior',
//                'LogBehavior',
				'SefBehavior',
                'PrefixedModel' => array('class'=>'PrefixedModel'),
            );
        }

        public function disableDefaultScope()
        {
            // заглушка для индексной страницы
            return $this;
        }
		
    public function scopes() {
        return array(
            'sef'       => array(),
            'category'  => array(),
        );
    }		

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'cl_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
    
    public function category($cid) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'cl_category=:cid',
            'params' => array('cid' => $cid),
        ));
        return $this;
    }
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'clid' => 'id',
			'cl_name' => 'Заголовок',
			'cl_sef' => 'Ссылка',
			
			//'dt_start' => 'Дата',
			'cl_category' => 'Категория',
			//'content_type' => 'Редактор',
			//'content_long' => 'HTML текст',
			'is_published' => 'Опубликовано',
//			'cl_media_id' => 'Изображение',
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

		$criteria->compare('clid',$this->clid);
		$criteria->compare('cl_name',$this->cl_name,true);
		$criteria->compare('cl_sef',$this->cl_sef,true);
		//$criteria->compare('dt_start',$this->dt_start,true);
		//$criteria->compare('content_orig',$this->content_orig,true);
		//$criteria->compare('content_type',$this->content_type);
		//$criteria->compare('content_long',$this->content_long,true);
		$criteria->compare('is_published',$this->is_published);
		$criteria->compare('cl_media_id',$this->cl_media_id);
		if ($this->cl_category)
                    $criteria->compare('cl_category',$this->cl_category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
    public function beforeSave() {
        //if (!parent::beforeSave()) return false;
        //        $this->content_long = Comportable::ClearPHPTags($this->content_long);      
        return true;
    }
    
    //public function getClassSort() {
    //    if ($this->_classSort===null)
    //        $this->_classSort = 'item_sort';
    //    return $this->_classSort;
    //}
    
    public function defaultScope() {
        return array(
            "order" => "clid ASC"
        );
    }
	
    public function listNames() {
        $cl_all = Client::model()->findAll();
        return CHtml::listData($cl_all, 'clid', 'cl_name');
        //Yii::log('LIST: '.var_export($list,true));
    }
	
}