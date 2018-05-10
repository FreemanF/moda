<?php

class Replyes extends CActiveRecord 
{
    public $rp_name = 'Replyes';

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{replyes}}';
    }

    public function rules() {
        return array(
            array('rp_sender, content_long', 'required'),
            array('rp_sender, rp_dlg', 'numerical', 'integerOnly' => true),
            //array('n_name, n_sef', 'length', 'max' => 255),
            array('rp_dlg, rp_sender, rp_message, rp_readed, dt_start, content_long', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('rpid, rp_dlg, rp_sender, rp_message, rp_readed, dt_start, content_long', 'safe', 'on'=>'search'),
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
            'send_owner'     => array(self::HAS_ONE   , 'Users'    , '', 'on' => 'rp_sender=send_owner.usid'),
//            'messages'  => array(self::HAS_ONE   , 'Messages'    , '', 'on' => 'rp_message=messages.msid'),
            'messages'  => array(self::BELONGS_TO   , 'Messages'    , 'ms_rep'),
            'dialog'  => array(self::HAS_ONE   , 'Dialogs'    , '', 'on' => 'rp_dlg=dialog.dlid'),
        //    'replye' => array(self::HAS_MANY  , 'Replyes', 'rpid'),
            
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
        return array();
//        $now = date('Y-m-d H:i:s');
//        return $this->getDefaultScopeDisabled() ?
//            array('order' => 't.dt_start DESC') :
//            array(
//                'condition'=>'t.dt_start <="'.$now.'"',
//                'order' => 't.dt_start DESC'
//            );
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
            'rpid' => 'Rpid',
            'rp_sender' => 'Отправитель',
            'rp_message' => 'Сообщение на которое отвечаем',
            'rp_readed' => 'Прочитанное',
            'dt_start' => 'дата публикации',
            'content_long' => 'HTML-текст',
            'humanDate'    => 'Начало публикации',
            'rp_dlg' => 'Диалог',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('rpid',$this->rpid);
        $criteria->compare('rp_dlg',$this->rp_dlg);
        $criteria->compare('rp_sender',$this->rp_sender);
        $criteria->compare('rp_message',$this->rp_message);
        $criteria->compare('rp_readed',$this->rp_readed);
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