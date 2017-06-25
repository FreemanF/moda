<?php

class Who extends CActiveRecord 
{
	public $content_type = 1;
	public $is_published = 1;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{who}}';
    }

    public function rules() {
        return array(
            array('w_name', 'required'),
            array('is_published', 'numerical', 'integerOnly'=>true),
            array('w_name', 'length', 'max'=>255),
            array('dt_start, content_long, hw_name, w_modern_block, w_works_block, w_contacts_block', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('wid, dt_start, hw_name, w_modern_block, w_works_block, w_contacts_block content_long, is_published', 'safe', 'on'=>'search'),
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
         //         , 'order'  => 'sort ASC'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'ContentBehavior',
    //        'MediaBehavior' => array(
    //            'class'=>'MediaBehavior',
	//			'simple'=>false,
    //            'withSort'=>true
            //    'cropAspect'=>array(100,100)
	//			),
            'DateBehavior',
            'LogBehavior',
            'PrefixedModel'  => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        $now = date('Y-m-d H:i:s');
        return $this->getDefaultScopeDisabled() ?
            array('order' => 'dt_start DESC') :
            array(
                'condition'=>'dt_start <="'.$now.'"',
                'order' => 'dt_start DESC'
            );
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
            'wid'          => 'ID-новости',
            'w_name'       => 'Заголовок',
            'w_modern_block' => 'Модернизаторы блок',
            'dt_start'     => 'Начало публикации',
    //        'content_orig' => 'Текст',
    //        'content_type' => 'Тип редактора',
			'w_works_block' => 'Над чем работаем',
            'content_long' => 'Текст в заголовке',
            'humanDate'    => 'Начало публикации',
			'is_published' => 'Опубликовано',
			'w_contacts_block' => 'Блок контакты',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('wid',$this->wid);
        $criteria->compare('w_name',$this->w_name,true);
        $criteria->compare('w_modern_block',$this->w_modern_block,true);
		$criteria->compare('w_works_block',$this->w_works_block,true);
        $criteria->compare('w_contacts_block',$this->w_contacts_block,true);
        $criteria->compare('content_long',$this->content_long,true);
    //    $criteria->compare('is_published',$this->is_published);
        $this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function getOwnerUrl() {
        return '/who/';
    }
}