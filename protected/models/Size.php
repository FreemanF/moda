<?php

class Size extends CActiveRecord 
{
	public $content_type = 1;
	public $is_published = 1;
	public $content_long = '';

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{size}}';
    }

    public function rules() {
        return array(
            array('sz_name', 'required'),
//            array('is_published', 'numerical', 'integerOnly'=>true),
            array('sz_name, sz_american, sz_universal', 'length', 'max'=>10),
            array('dt_start, sz_type, content_long, sz_name, sz_american, sz_universal', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('szid, sz_type, sz_name, dt_start, sz_american, sz_universal', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        //    'meta'  => array(self::BELONGS_TO, 'Meta' , 'n_meta'),
        //    'media' => array(self::MANY_MANY , 'Media'   , 'linkOI(object_id,media_id)'
        //          , 'on'     => 'object_type='.Object::idHow
        //          , 'select' => array('media.*'
        //              ,'media_media.type as i_main'
        //              ,'media_media.sort as i_sort')
        //          , 'order'  => 'sort ASC'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
        //    'ContentBehavior',
        //    'MediaBehavior' => array(
        //        'class'=>'MediaBehavior',
		//		'simple'=>false,
        //        'withSort'=>true
            //    'cropAspect'=>array(100,100)
		//		),
            'DateBehavior',
            'LogBehavior',
            'PrefixedModel'  => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        return array();
    }

    public function scopes() {
        return array(
//            'sef'       => array(),
 //           'published' => array(),
        );
    }

    public function sef($sef) {
    //    $this->getDbCriteria()->mergeWith(array(
    //        'condition' => 'n_sef=:sef',
    //        'params' => array('sef' => $sef),
    //    ));
        return $this;
    }
    
    public function published() {
        return $this;
    }
    
    public function attributeLabels() {
        return array(
            'szid'          => 'ID-новости',
            'sz_name'       => 'Украинский',
            'sz_american'       => 'Американский',
            'sz_universal'       => 'Универсальный',
            'dt_start'     => 'Дата',
            'sz_type' => 'Type',
    //        'content_type' => 'Тип редактора',
            'content_long' => 'Текст на картинке результата',
            'humanDate'    => 'Дата',
			'is_published' => 'Опубликовано',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('szid',$this->szid);
        $criteria->compare('sz_name',$this->sz_name,true);
	$criteria->compare('sz_american',$this->sz_american,true);
	$criteria->compare('sz_universal',$this->sz_universal,true);
    //    $criteria->compare('is_published',$this->is_published);
        //$this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function getOwnerUrl() {
        return '/size/';
    }
	
    public function listNames() {
        $g_all = Size::model()->findAll();
        return CHtml::listData($g_all, 'szid', 'sz_name');
        //Yii::log('LIST: '.var_export($list,true));
    }
	
	public function getName(){
		$name = $this->sz_name.'/'.$this->sz_american.'/'.$this->sz_universal;
		return $name;
	}
        
	public function getSizeName(){
            if ($this->sz_name == 'OneSize'){
                $name = 'OneSize';
                return $name;
            
            } else
            {
		$name = $this->sz_name.'/'.$this->sz_american.'/'.$this->sz_universal;
		return $name;
            }
	}      
	
}