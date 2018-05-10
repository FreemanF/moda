<?php

class Messages extends CActiveRecord 
{
    public $ms_name = 'Messages';
    public $image;
    public $attachments;
    public $is_published = 1;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{messages}}';
    }

    public function rules() {
        return array(
            array('ms_sender, ms_recipient, content_long', 'required'),
            array('ms_sender, ms_dlg, ms_recipient, ms_readed', 'numerical', 'integerOnly' => true),
            array('attachments', 'file', 
'types'=>'jpg,jpeg,gif,png,doc,docx,pdf,txt',
'maxSize'=>1024 * 1024 * 2, // 2MB
'tooLarge'=>'The file was larger than 1MB. Please upload a smaller file.',
'allowEmpty'=>1,
),
//            array('icon', 'file',
//			'types'=>'jpg, jpeg, gif, png',
//			'maxSize'=>1024 * 1024 * 5, // 5 MB
//			'allowEmpty'=>'true',
//			'tooLarge'=>'Файл занимает больше 5 MB. Пожалуйста, загрузите файл меньшего размера.',
//			),
            //array('n_name, n_sef', 'length', 'max' => 255),
            array('ms_dlg, ms_sender, ms_recipient, ms_readed, dt_start, content_long', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('msid, ms_dlg, ms_sender, ms_recipient, ms_readed, dt_start, content_long', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        //    'user'  => array(self::BELONGS_TO, 'Meta' , 'n_meta'),
        //    'sender'     => array(self::HAS_ONE   , 'Users'    , '', 'on' => 'dl_user=usid'),
            'sender'     => array(self::BELONGS_TO   , 'Users', 'ms_sender'),
            'recipient'  => array(self::BELONGS_TO   , 'Users', 'ms_recipient'),
            'dialog'  => array(self::HAS_ONE   , 'Dialogs'    , '', 'on' => 'ms_dlg=dlid'),
            'attachment' => array(self::HAS_MANY  , 'Attachment', 'at_message'),
//            'replye' => array(self::HAS_MANY  , 'Replyes', 'rp_message'),
//            'repCount' => array(self::STAT,'Replyes','rpid'),
            
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
//            'ContentBehavior',
//            'MetaBehavior',
//            'MediaBehavior' => array(
//                'class'=>'MediaBehavior',
//                'withSort'=>true,
//                'cropAspect'=>array(100,100)),
            'DateBehavior',
            'LogBehavior',
            'PrefixedModel'  => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
//        $now = date('Y-m-d H:i:s');
//        return $this->getDefaultScopeDisabled() ?
//            array('order' => 'dt_start DESC') :
//            array(
//                'condition'=>'dt_start <="'.$now.'"',
//                'order' => 'dt_start DESC'
//            );
        array();
    }
    
    protected function afterDelete()
    {
        Attachment::model()->deleteAllByAttributes(array('at_message'=> $this->msid));
        return parent::beforeDelete();
    }

    public function scopes() {
        return array(
            'sef'       => array(),
            'published' => array(),
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
            'msid' => 'Msid',
            'ms_sender' => 'Отправитель',
            'ms_recipient' => 'Получатель',
            'ms_readed' => 'Прочитаннoe',
            'dt_start' => 'начало публикации',
            'content_long' => 'HTML-текст',
            'ms_dlg' => 'Диалог',
            'attachments'=>'Вложения',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;
//        $criteria->with = array("replye");
//        $criteria->compare('rpid', $this->replye->rpid, true);
        $criteria->together = true;

        $criteria->compare('msid',$this->msid);
        $criteria->compare('ms_dlg',$this->ms_dlg);
        $criteria->compare('ms_sender',$this->ms_sender);
        $criteria->compare('ms_recipient',$this->ms_recipient);
        $criteria->compare('ms_readed',$this->ms_readed);
        $criteria->compare('dt_start',$this->dt_start,true);
        $criteria->compare('content_long',$this->content_long,true);
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function getOwnerUrl() {
        return '/news/'.$this->n_sef;
    }
}