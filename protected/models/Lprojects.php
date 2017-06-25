<?php

class Lprojects extends CActiveRecord 
{
	public $content_type = 1;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{lprojects}}';
    }

    public function rules() {
        return array(
            array('lp_name', 'required'),
            array('content_type', 'numerical', 'integerOnly' => true),
            array('lp_name, lp_link', 'length', 'max' => 255),
            array('dt_start, is_published, content_long', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('lpid, lp_name, is_published, dt_start', 'safe', 'on' => 'search'),
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
            'media' => array(self::BELONGS_TO, 'Media', 'lp_media_id'),
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
            'lpid'          => 'ID-новости',
    //        'n_meta'       => 'Мета-тэг',
            'lp_name'       => 'Заголовок',
            'lp_link'        => 'URL',
            'dt_start'     => 'Начало публикации',
            'is_published' => 'Опубликовано',
    //        'content_type' => 'Тип редактора',
            'content_long' => 'HTML-Текст',
            'humanDate'    => 'Начало публикации',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('lpid', $this->lpid);
        $criteria->compare('lp_name', $this->lp_name, true);
		$criteria->compare('is_published', $this->is_published, true);
        $this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function getOwnerUrl() {
        return '/lprojects/'.$this->lp_link;
    }
}