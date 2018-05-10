<?php

class Contacts extends CActiveRecord 
{
	public $content_type = 2;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{contacts}}';
    }

    public function rules() {
        return array(
            array('cn_name', 'required'),
    //        array('content_type', 'numerical', 'integerOnly' => true),
            array('cn_name, cn_phone', 'length', 'max' => 255),
            array('dt_start, cn_name, cn_phone, content_long', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('cnid, cn_name, dt_start, cn_phone, content_long', 'safe', 'on' => 'search'),
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
        //    'media' => array(self::BELONGS_TO, 'Media', 'n_media_id'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'ContentBehavior',
        //    'MetaBehavior',
        //    'MediaBehavior' => array(
        //        'class'=>'MediaBehavior',
        //        'withSort'=>true,
        //        'cropAspect'=>array(100,100)),
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
    //        'sef'       => array(),
    //        'published' => array(),
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'n_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
    
    public function published() {
        return $this;
    }
    
    public function attributeLabels() {
        return array(
            'cnid'          => 'ID-новости',
			'cn_name'       => 'Имя',
            'cn_phone'       => 'Телефон',
            'dt_start'     => 'Дата публикации',
            'content_long' => 'Сообщение',
            'humanDate'    => 'Дата публикации',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('cnid', $this->cnid);
        $criteria->compare('cn_name', $this->cn_name, true);
		$criteria->compare('cn_phone', $this->cn_phone, true);
		$criteria->compare('content_long', $this->content_long, true);
        $this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function getOwnerUrl() {
        return '/contacts/';
    }
}