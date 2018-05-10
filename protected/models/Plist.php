<?php

class Plist extends CActiveRecord 
{
	public $content_type = 1;
	public $is_published = 1;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{plist}}';
    }

    public function rules() {
        return array(
            array('pl_name', 'required'),
            array('content_type', 'numerical', 'integerOnly' => true),
            array('pl_name, pl_title, pl_big_text, pl_small_text', 'length', 'max' => 255),
            array('dt_start, pl_name, pl_title, pl_project_id, pl_big_text, pl_small_text, content_long', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('plid, pl_name, pl_title, pl_big_text, pl_small_text, dt_start', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'project'  => array(self::BELONGS_TO, 'Projects' , 'pl_project_id'),
            'media' => array(self::BELONGS_TO, 'Media', 'pl_media_id'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'ContentBehavior',
    //        'MetaBehavior',
            'MediaBehavior' => array(
                'class'=>'MediaBehavior',
                'withSort'=>true
        //        'cropAspect'=>array(100,100)
		),
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
    //        'sef'       => array(),
            'published' => array(),
        );
    }

    //public function sef($sef) {
    //    $this->getDbCriteria()->mergeWith(array(
    //        'condition' => 'n_sef=:sef',
    //        'params' => array('sef' => $sef),
    //    ));
    //    return $this;
    //}
    
    public function published() {
        return $this;
    }
    
    public function attributeLabels() {
        return array(
            'plid'          => 'ID-новости',
            'pl_title'       => 'Заголовок',
			'content_long' => 'Описание',
            'pl_name'       => 'Название',
            'pl_big_text'   => 'Крупный текст',
			'pl_small_text'   => 'Мелкий текст',
            'dt_start'     => 'Начало публикации',
            'pl_project_id' => 'Проект',
    //        'content_type' => 'Тип редактора',
            'humanDate'    => 'Начало публикации',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('plid', $this->plid);
        $criteria->compare('pl_name', $this->pl_name, true);
		$criteria->compare('pl_small_text', $this->pl_small_text, true);
		$criteria->compare('pl_title', $this->pl_title, true);
		$criteria->compare('pl_big_text', $this->pl_big_text, true);
		$criteria->compare('pl_project_id', $this->pl_project_id, true);
        $this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function getOwnerUrl() {
        return '/works/';
    }
	
	public static function getListPgs() {
        return CHtml::listData(Projects::model()->findAll(
                't.is_published = 1'),'prid','pr_name');
    }

}