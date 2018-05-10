<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $pdid
 * @property integer $pd_meta
 * @property string $pd_name
 * @property string $pd_sef
 * @property integer $pd_brand
 * @property string $pd_source
 * @property string $pd_transport
 * @property string $pd_color
 * @property string $pd_selling
 * @property integer $pd_category
 * @property integer $pd_media_id
 * @property integer $pd_media_id2
 * @property integer $pd_media_id3
 * @property integer $pd_media_id4
 * @property integer $pd_media_id5
 * @property string $dt_start
 * @property string $content_long
 */
class Product extends CActiveRecord
{
	public $content_type = 2;
	public $is_published = 1;
	public $pd_sort;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
    public function tableName() {
        return '{{product}}';
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
			array('pd_meta, pd_brand, pd_category, pd_media_id, pd_media_id2, pd_media_id3, pd_media_id4, pd_media_id5', 'numerical', 'integerOnly'=>true),
			array('pd_name, pd_sef, pd_source, pd_transport, pd_color, pd_selling', 'length', 'max'=>255),
			array('dt_start,pd_sef, pd_price', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pdid, pd_meta, pd_name, pd_price, pd_sef, pd_brand, pd_source, pd_transport, pd_color, pd_selling, pd_category, pd_media_id, pd_media_id2, pd_media_id3, pd_media_id4, pd_media_id5, dt_start, content_long', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'category' => array(self::BELONGS_TO, 'Category', 'pd_category'),
        //    'meta'     => array(self::HAS_ONE   , 'Meta'    , '', 'on' => 'tv_meta=eid'),
        //    'media'    => array(self::MANY_MANY , 'Media'   , 'linkOI(object_id,media_id)'
        //                                        , 'on' => 'type = 0 and object_type='.Object::idProduct
        //                                                          , 'scopes' => array('withWatermark')
        //                                                          , 'select' => array('media.*'
        //                                                              ,'media_media.type as i_main'
        //                                                              ,'media_media.sort as i_sort')
        //                                                          , 'order'  => 'sort ASC'),
        //    'media2'    => array(self::MANY_MANY , 'Media'   , 'linkOI(object_id,media_id)'
        //                            , 'on' => 'type = 1 and object_type='.Object::idProduct
        //                                              , 'scopes' => array('withWatermark')
        //                                              , 'select' => array('media2.*'
        //                                                  ,'media2_media2.type as i_main2'
        //                                                  ,'media2_media2.sort as i_sort2')
        //                                              , 'order'  => 'i_sort2 ASC'),
        //    'gallery' => array(self::HAS_ONE, 'Gallery', '', 'on' => 'tv_gal_id=gid'),
        );
    }

	
    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
        //    'MetaBehavior',
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
            array('order' => $alias.'pd_name ASC') :
            array(
//                'condition'=>$alias.'dt_start <="'.$now.'"',
                'order' => $alias.'pd_name ASC'
            );
    }

    public function scopes() {
        return array(
            'sef'       => array(),
            'category'  => array(),     
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'pd_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
    
    public function category($cid) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'pd_category=:cid',
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
			'pdid' => 'Pdid',
			'pd_meta' => 'Мета тэги',
			'pd_name' => 'Название',
			'pd_sef' => 'URL',
			'pd_brand' => 'Бренд',
			'pd_source' => 'Состав',
			'pd_transport' => 'Условия доставки',
			'pd_color' => 'Цвет',
			'pd_selling' => 'Условия продажи',
			'pd_category' => 'Рубрика',
			'pd_media_id' => 'Pd Media',
			'pd_media_id2' => 'Pd Media Id2',
			'pd_media_id3' => 'Pd Media Id3',
			'pd_media_id4' => 'Pd Media Id4',
			'pd_media_id5' => 'Pd Media Id5',
			'dt_start' => 'Dt Start',
			'content_long' => 'Content Long',
			'pd_price' => 'Цена',
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

		$criteria->compare('pdid',$this->pdid);
		$criteria->compare('pd_meta',$this->pd_meta);
		$criteria->compare('pd_name',$this->pd_name,true);
		$criteria->compare('pd_sef',$this->pd_sef,true);
		$criteria->compare('pd_brand',$this->pd_brand);
		$criteria->compare('pd_source',$this->pd_source,true);
		$criteria->compare('pd_transport',$this->pd_transport,true);
		$criteria->compare('pd_color',$this->pd_color,true);
		$criteria->compare('pd_selling',$this->pd_selling,true);
		$criteria->compare('pd_category',$this->pd_category);
		$criteria->compare('pd_media_id',$this->pd_media_id);
		$criteria->compare('pd_media_id2',$this->pd_media_id2);
		$criteria->compare('pd_media_id3',$this->pd_media_id3);
		$criteria->compare('pd_media_id4',$this->pd_media_id4);
		$criteria->compare('pd_media_id5',$this->pd_media_id5);
		$criteria->compare('dt_start',$this->dt_start,true);
		$criteria->compare('content_long',$this->content_long,true);
		$criteria->compare('pd_price',$this->pd_price,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getOwnerUrl() {
        return '/product/';
    }
	
}