<?php

class FormatSotr extends CActiveRecord 
{
	public $content_type = 2;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{FormatSotr}}';
    }

    public function rules() {
        return array(
            array('fs_name', 'required'),
//            array('content_type', 'numerical', 'integerOnly' => true),
            array('fs_name', 'length', 'max' => 200),
			array('fs_link', 'length', 'max' => 250),
            array('dt_start, fs_name, fs_link, content_long', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('fsid, fs_name, dt_start', 'safe', 'on' => 'search'),
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
    //        'MetaBehavior',
    //        'MediaBehavior' => array(
    //            'class'=>'MediaBehavior',
    //            'withSort'=>true,
    //            'cropAspect'=>array(100,100)),
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
        //    'sef'       => array(),
            'published' => array(),
        );
    }

//    public function sef($sef) {
//        $this->getDbCriteria()->mergeWith(array(
//            'condition' => 'n_sef=:sef',
//            'params' => array('sef' => $sef),
//        ));
 //       return $this;
 //   }
    
    public function published() {
        return $this;
    }
    
    public function attributeLabels() {
        return array(
            'fsid'          => 'ID-новости',
            'fs_link'       => 'Ссылка',
            'fs_name'       => 'Заголовок',
    //        'n_sef'        => 'URL',
            'dt_start'     => 'Начало публикации',
    //        'content_orig' => 'Текст',
            'fs_type' => 'Тип блока',
            'content_long' => 'HTML-Текст',
            'humanDate'    => 'Начало публикации',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('fsid', $this->fsid);
        $criteria->compare('fs_name', $this->fs_name, true);
        $this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function getOwnerUrl() {
        return ''; //'/sotrudnichestvo/'.$this->fs_sef;
    }
}