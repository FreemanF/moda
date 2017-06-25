<?php

class Results extends CActiveRecord 
{
	public $content_type = 1;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{results}}';
    }

    public function rules() {
        return array(
            array('rz_name', 'required'),
            array('rz_name', 'length', 'max' => 255),
            array('dt_start, rz_title_text, content_long', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('rzid, rz_name, dt_start', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
    //        'projects' => array(self::HAS_MANY, 'LastProjects', 'lpid'),
            'media' => array(self::MANY_MANY , 'Media'   , 'linkOI(object_id,media_id)'
                  , 'on'     => 'object_type='.Object::idResults
                  , 'select' => array('media.*'
                      ,'media_media.type as i_main'
                      ,'media_media.sort as i_sort')
                  , 'order'  => 'sort ASC'),
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
				'mediaField' => '',
				'simple' => false,
                'withSort'=>true //,
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
    //        'sef'       => array(),
            'published' => array(),
        );
    }

    //public function sef($sef) {
        //$this->getDbCriteria()->mergeWith(array(
        //    'condition' => 'n_sef=:sef',
        //    'params' => array('sef' => $sef),
    //    ));
    //    return $this;
    //}
    
    public function published() {
        return $this;
    }
    
    public function attributeLabels() {
        return array(
            'rzid'          => 'ID-новости',
            //'n_meta'       => 'Мета-тэг',
            'rz_name'       => 'Заголовок',
            'rz_title_text'        => 'Slider Title text',
            'dt_start'     => 'Начало публикации',
            'rz_proj_id' => 'Last projects',
            'content_type' => 'Тип редактора',
            'content_long' => 'HTML-Текст',
            'humanDate'    => 'Начало публикации',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('rzid', $this->rzid);
        $criteria->compare('rz_name', $this->rz_name, true);
        $this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function getOwnerUrl() {
        return '/results/';
    }
}