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
			array('content_long, pd_user, pd_name', 'required'),
			array('pd_selled_user, pd_city, pd_main_media, pd_state, pd_meta, pd_brand, pd_user, pd_vip, pd_category, pd_size, pd_media_id, pd_media_id2, pd_media_id3, pd_media_id4, pd_status', 'numerical', 'integerOnly'=>true),
			array('pd_name, pd_sef, pd_user, pd_source, pd_transport, pd_color, pd_selling', 'length', 'max'=>255),
			array('pd_selled_user, pd_city, pd_main_media, pd_state, dt_start,pd_sef, pd_user, pd_selling, pd_vip,pd_source, pt_transport, pd_color, pd_price, pd_size, pd_meta, pd_brand, pd_category, pd_media_id, pd_media_id2, pd_status', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pdid, pd_selled_user, pd_city, pd_main_media, pd_state, pd_size, pd_meta, pd_name, pd_price, pd_sef, pd_user, pd_brand, pd_source, pd_transport, pd_color, pd_selling, pd_category, pd_media_id, pd_media_id2, pd_media_id3, pd_media_id4, dt_start, content_long, pd_status', 'safe', 'on'=>'search'),
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
            'media' => array(self::BELONGS_TO, 'Media', 'pd_media_id'),
            'media2' => array(self::BELONGS_TO, 'Media', 'pd_media_id2'),
            'media3' => array(self::BELONGS_TO, 'Media', 'pd_media_id3'),
      //      'media4' => array(self::BELONGS_TO, 'Media', 'pd_media_id4'),
      //      'media5' => array(self::BELONGS_TO, 'Media', 'pd_media_id5'),
            'size' => array(self::BELONGS_TO, 'Size', 'pd_size'),
            'user' => array(self::BELONGS_TO, 'Users', 'pd_user'),
            'brand' => array(self::BELONGS_TO, 'Client', 'pd_brand'),
            'dialogs' => array(self::HAS_MANY  , 'Dialogs', 'dlid'),
            'city' => array(self::BELONGS_TO, 'City', 'pd_city'),
		//	'size' => array(self::HAS_ONE, 'Size', '', 'on' => 'pd_size=szid'),
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
            'MediaBehavior',
            'MediaBehavior2'  => array('class' => 'MediaBehavior2',
                'simple'=>true,
                'media_label' => 'Фото 2',
                'media_type' => 1,
                'mediaField' => 'pd_media_id2',
                'mediaRelation' => 'media2'),
            'MediaBehavior3'  => array('class' => 'MediaBehavior3',
                'simple'=>true,
                'media_label' => 'Фото 3',
                'media_type' => 2,
                'mediaField' => 'pd_media_id3',
                'mediaRelation' => 'media3'),
//            'MediaBehavior4'  => array('class' => 'MediaBehavior',
//                'simple'=>true,
//                'media_label' => 'Фото 4',
//                'media_type' => 3,
//                'mediaField' => 'pd_media_id4',
//                'mediaRelation' => 'media4'),
//            'MediaBehavior5'  => array('class' => 'MediaBehavior',
//                'simple'=>true,
//                'media_label' => 'Фото 5',
//                'media_type' => 4,
//                'mediaField' => 'pd_media_id5',
//                'mediaRelation' => 'media5'),
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
            'vip' => array(),
            'brand' => array(),
            'size' => array(),
            'user' => array(),
            'status' => array(),
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'pd_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
	
    public function vip() {
        $this->getDbCriteria()->mergeWith(array('condition' => $this->getTableAlias(false,false).'.pd_vip=1'));
        return $this;
    }
    
    public function category($cid) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => $this->getTableAlias(false,false).'.pd_category=:cid',
            'params' => array('cid' => $cid),
        ));
        return $this;
    }
	
    public function brand($brid) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'pd_brand=:brid',
            'params' => array('brid' => $brid),
        ));
        return $this;
    }
	
    public function size($szid) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'pd_size=:szid',
            'params' => array('szid' => $szid),
        ));
        return $this;
    }
    
    public function user($usid) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => $this->getTableAlias(false,false).'.pd_user=:usid',
            'params' => array('usid' => $usid),
        ));
        return $this;
    }
    
    
    public function status($usid) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'pd_status=:stid',
            'params' => array('stid' => $usid),
        ));
        return $this;
    }
    
    public function cat($cid) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'pd_category=:catid',
            'params' => array('catid' => $cid),
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
                        'pd_status' => 'Статус',
			'pd_selling' => 'Условия продажи',
			'pd_size' => 'Размер',
			'pd_category' => 'Рубрика',
			'pd_media_id' => 'Изображение 1',
			'pd_media_id2' => 'Изображение 2',
			'pd_media_id3' => 'Изображение 3',
		//	'pd_media_id4' => 'Pd Media Id4',
			'pd_main_media' => 'Главная картинка',
			'dt_start' => 'Дата публикации',
			'content_long' => 'Описание',
			'pd_price' => 'Цена',
                        'pd_state' => 'Состояние',
			'pd_vip' => 'VIP объявление',
			'pd_user' => 'Хозяин объявления',
                        'pd_city' => 'Город',
                        'pd_selled_user' => 'Кому продан',
                        'humanDate'    => 'Дата публикации',
		);
	}
        
        protected function beforeDelete()
        {
//            'category' => array(self::BELONGS_TO, 'Category', 'pd_category'),
//            'media' => array(self::BELONGS_TO, 'Media', 'pd_media_id'),
//            'media2' => array(self::BELONGS_TO, 'Media', 'pd_media_id2'),
//            'media3' => array(self::BELONGS_TO, 'Media', 'pd_media_id3'),
//            'size' => array(self::BELONGS_TO, 'Size', 'pd_size'),
//            'user' => array(self::BELONGS_TO, 'Users', 'pd_user'),
//            'brand' => array(self::BELONGS_TO, 'Client', 'pd_brand'),
//            'dialogs' => array(self::HAS_MANY  , 'Dialogs', 'dlid'),
//            WorkShiftTimes::model()->deleteAll('work_shift_id = '.$this->id);
            Dialogs::model()->deleteAllByAttributes(array('dl_product'=> $this->pdid));
            
            
            return parent::beforeDelete();
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
                
//                $criteria->with('user');

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
		//$criteria->compare('pd_media_id4',$this->pd_media_id4);
		//$criteria->compare('pd_media_id5',$this->pd_media_id5);
		$criteria->compare('dt_start',$this->dt_start,true);
		$criteria->compare('content_long',$this->content_long,true);
		$criteria->compare('pd_price',$this->pd_price,true);
		$criteria->compare('pd_size',$this->pd_size,true);
		$criteria->compare('pd_vip',$this->pd_vip,true);
                $criteria->compare('pd_status',$this->pd_status,true);
                $criteria->compare('pd_state',$this->pd_state,true);
                $criteria->compare('pd_main_media',$this->pd_main_media,true);
                $criteria->compare('pd_city',$this->pd_city,true);
                $criteria->compare('pd_selled_user',$this->pd_selled_user,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getOwnerUrl() {
        return '/product/';
    }
	
	public function listNames() {
        $u_all = Users::model()->findAll();
        return CHtml::listData($u_all, 'usid', 'us_email');
        //Yii::log('LIST: '.var_export($list,true));
    }
    
    public static function listStatusNames()
    {
        $status = array(0=>'На модерации', 1=>'Активно',2=>'Рекламируемое',3=>'Зарезервировано',4=>'Продано');
        return $status;
    }
    
    public function getStatusName($stid)
    {
        $status = array(0=>'На модерации', 1=>'Активно',2=>'Рекламируемое',3=>'Зарезервировано',4=>'Продано');
        return $status[$stid];
    }
    
    public function getColorName($id)
    {
        if (!isset($id)){
            return 'Без цвета';
        }
        $data = [
               0 => array('cpid'=>0, 'cp_name'=> 'Белый', 'cp_rgb' => 'rgb(255, 255, 255)'),
               1 => array('cpid'=>1, 'cp_name'=> 'Серебристый', 'cp_rgb' => 'rgb(237, 238, 240)'),
               2 => array('cpid'=>2, 'cp_name'=> 'Бежевый', 'cp_rgb' => 'rgb(246, 230, 209)'),
               3 => array('cpid'=>3, 'cp_name'=> 'Серый', 'cp_rgb' => 'rgb(167, 167, 167)'),
               4 => array('cpid'=>4, 'cp_name'=> 'Жёлтый', 'cp_rgb' => 'rgb(255, 246, 51)'),
               5 => array('cpid'=>5, 'cp_name'=> 'Золотистый', 'cp_rgb' => 'rgb(255, 225, 51)'),
               6 => array('cpid'=>6, 'cp_name'=> 'Оранжевый', 'cp_rgb' => 'rgb(255, 184, 51)'),
               7 => array('cpid'=>7, 'cp_name'=> 'Розовый', 'cp_rgb' => 'rgb(255, 51, 153)'),
               8 => array('cpid'=>8, 'cp_name'=> 'Красный', 'cp_rgb' => 'rgb(217, 91, 51)'),
               9 => array('cpid'=>9, 'cp_name'=> 'Бирюзовый', 'cp_rgb' => 'rgb(197, 229, 237)'),
               10 => array('cpid'=>10, 'cp_name'=> 'Синий', 'cp_rgb' => 'rgb(51, 149, 210)'),
               11 => array('cpid'=>11, 'cp_name'=> 'Хаки', 'cp_rgb' => 'rgb(158, 155, 107)'),
               12 => array('cpid'=>12, 'cp_name'=> 'Зелёный', 'cp_rgb' => 'rgb(89, 175, 95)'),
               13 => array('cpid'=>13, 'cp_name'=> 'Фиолетовый', 'cp_rgb' => 'rgb(154, 51, 155)'),
               14 => array('cpid'=>14, 'cp_name'=> 'Коричневый', 'cp_rgb' => 'rgb(133, 93, 51)'),
               15 => array('cpid'=>15, 'cp_name'=> 'Чёрный', 'cp_rgb' => 'rgb(0, 0, 0)'),
               16 => array('cpid'=>16, 'cp_name'=> 'Разноцветный', 'cp_rgb' => 'linear-gradient(rgb(255, 237, 36), rgb(66, 255, 110), rgb(121, 149, 255))'),
            ];
        
            return $data[$id]['cp_name'];
    }
    
    
    public function getStateName($id)
    {
        $data = [
               0 => array('stid'=>0, 'st_name'=> 'Новое'),
               1 => array('stid'=>1, 'st_name'=> 'Идеальное'),
               2 => array('stid'=>2, 'st_name'=> 'Хорошее'),
            ];
        
            return $data[$id]['st_name'];
    }
    
}
