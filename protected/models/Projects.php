<?php

class Projects extends CActiveRecord 
{
	public $content_type = 1;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{projects}}';
    }

    public function rules() {
        return array(
            array('pr_name', 'required'),
            array('is_published', 'numerical', 'integerOnly'=>true),
            array('pr_name, pr_sef', 'length', 'max'=>255),
            array('pr_name, pr_suhie, pr_sef, pr_title_text, pr_media_id, dt_start, pr_numbers_block, pr_project_block, content_long, is_published', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('prid, pr_name, pr_suhie, pr_sef, pr_title_text, pr_media_id, dt_start, pr_numbers_block, pr_project_block, content_long, is_published', 'safe', 'on'=>'search'),
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
		'media'    => array(self::MANY_MANY , 'Media'   , 'linkOI(object_id,media_id)'
                                                , 'on' => 'object_type='.Object::idProjects
                                                , 'order'  => 'sort ASC'),
		//'media' => array(self::HAS_MANY  , 'Media' , 'pr_media_id'),
		//'hints' => array(self::HAS_MANY  , 'Hint', 'h_object_id','on'=>'h_object_type='.Object::idCompany,'order'=>'h_sort ASC'),
		//    'media'  => array(self::HAS_MANY, 'Media' , 'pr_media_id'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'ContentBehavior',
            'MediaBehavior' => array(
                'class'=>'MediaBehavior',
				'simple'=>false,
				'mediaField'=>'',
                'withSort'=>true
            //    'cropAspect'=>array(100,100)
				),
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
            'sef'       => array(),
            'published' => array(),
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'pr_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }
    
    public function published() {
        return $this;
    }
    
    public function attributeLabels() {
        return array(
            'prid'          => 'ID-новости',
            'pr_title_text' => 'Текст под заголовком',
            'pr_name'       => 'Заголовок',
            'pr_numbers_block' => 'Блок с числами',
            'dt_start'     => 'Начало публикации',
			'pr_sef'       => 'URL',
    //        'content_orig' => 'Текст',
    //        'content_type' => 'Тип редактора',
			'pr_project_block' => 'Блок проекты',
            'content_long' => 'Рекомендательные письма',
            'humanDate'    => 'Начало публикации',
			'is_published' => 'Опубликовано',
			'pr_suhie' => 'Сухие данные',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('prid',$this->prid);
        $criteria->compare('pr_name',$this->pr_name,true);
        $criteria->compare('pr_title_text',$this->pr_title_text,true);
		$criteria->compare('pr_numbers_block',$this->pr_numbers_block,true);
        $criteria->compare('pr_project_block',$this->pr_project_block,true);
        $criteria->compare('content_long',$this->content_long,true);
        $criteria->compare('is_published',$this->is_published);
		$criteria->compare('pr_suhie',$this->pr_suhie);
		$criteria->compare('pr_sef',$this->pr_sef);
        $this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function getOwnerUrl() {
        return '/works/'.$this->pr_sef;
    }
}