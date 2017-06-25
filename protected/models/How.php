<?php

class How extends CActiveRecord 
{
	public $content_type = 1;
	public $is_published = 1;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{how}}';
    }

    public function rules() {
        return array(
            array('hw_name', 'required'),
            array('is_published', 'numerical', 'integerOnly'=>true),
            array('hw_name', 'length', 'max'=>255),
            array('dt_start, hw_title_text, content_long, hw_name, hw_works_block, hw_format_sotr, hw_fitout, hw_four_steps, hw_sdacha_block', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('hwid, hw_name, hw_title_text, hw_works_block, hw_media_id, dt_start, hw_format_sotr, hw_fitout, hw_four_steps, hw_sdacha_block, content_long, is_published', 'safe', 'on'=>'search'),
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
            'media' => array(self::MANY_MANY , 'Media'   , 'linkOI(object_id,media_id)'
                  , 'on'     => 'object_type='.Object::idHow
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
            'MediaBehavior' => array(
                'class'=>'MediaBehavior',
				'simple'=>false,
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
            'hwid'          => 'ID-новости',
            'hw_works_block' => 'Блок под заголовком',
            'hw_name'       => 'Заголовок',
            'hw_format_sotr' => 'Блок формат сотрудничества',
            'dt_start'     => 'Дата',
            'hw_title_text' => 'Текст под заголовком',
    //        'content_type' => 'Тип редактора',
			'hw_fitout' => 'Fitout блок',
            'content_long' => 'Текст на картинке результата',
            'humanDate'    => 'Дата',
			'is_published' => 'Опубликовано',
			'hw_four_steps' => 'Блок 4 шага',
			'hw_sdacha_block' => 'Блок сдача работ',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('hwid',$this->hwid);
        $criteria->compare('hw_name',$this->hw_name,true);
        $criteria->compare('hw_works_block',$this->hw_works_block,true);
		$criteria->compare('hw_title_text',$this->hw_title_text,true);
		$criteria->compare('hw_format_sotr',$this->hw_format_sotr,true);
        $criteria->compare('hw_fitout',$this->hw_fitout,true);
		$criteria->compare('hw_four_steps',$this->hw_four_steps,true);
		$criteria->compare('hw_sdacha_block',$this->hw_sdacha_block,true);
        $criteria->compare('content_long',$this->content_long,true);
    //    $criteria->compare('is_published',$this->is_published);
        $this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function getOwnerUrl() {
        return '/how/';
    }
}