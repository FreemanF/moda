<?php

class Dialogs extends CActiveRecord 
{
    public $dl_name = 'Dialog';
    public $is_published = 1;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return '{{dialogs}}';
    }

    public function rules() {
        return array(
            array('dl_user, dl_product', 'required'),
            array('dl_user, dl_product, dl_to', 'numerical', 'integerOnly' => true),
            //array('n_name, n_sef', 'length', 'max' => 255),
            array('dt_start, dl_user, dl_product, dl_to', 'safe'),
            $this->humanDateRule(),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('dlid, dt_start, dl_user, dl_product, dl_to', 'safe', 'on' => 'search'),
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
            'user'     => array(self::HAS_ONE   , 'Users'    , '', 'on' => 'dl_user=user.usid'),
            'to'     => array(self::HAS_ONE   , 'Users'    , '', 'on' => 'dl_to=to.usid'),
            'product'  => array(self::HAS_ONE   , 'Product'    , '', 'on' => 'dl_product=pdid'),
            'messages' => array(self::HAS_MANY  , 'Messages', 'ms_dlg'),
//            $this->getTableAlias(false,false).
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
        $now = date('Y-m-d H:i:s');
        return $this->getDefaultScopeDisabled() ?
            array('order' => 't.dt_start DESC') :
            array(
//                'condition'=>'t.dt_start <="'.$now.'"',
                'order' => 't.dt_start DESC'
            );
        //return $this->getDefaultScopeDisabled();
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
    
    protected function beforeDelete()
    {
        Messages::model()->deleteAllByAttributes(array('ms_dlg'=> $this->dlid));
        return parent::beforeDelete();
    }
    
    public function attributeLabels() {
        return array(
            'dlid'          => 'ID-новости',
            'dt_start'     => 'Начало публикации',
            'dl_user' => 'Отправитель',
            'dl_product' => 'Товар',
            'dl_to' => 'Получатель',
        //    'content_long' => 'HTML-Текст',
            'humanDate'    => 'Начало публикации',
         );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('dlid', $this->dlid);
        $criteria->compare('dl_user', $this->dl_user, true);
        $criteria->compare('dl_to', $this->dl_to, true);
        $criteria->compare('dl_product', $this->dl_product, true);
        $this->humanDateSearch($criteria,$this->dt_start);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,          
        ));
    }
    
    public function getOwnerUrl() {
        return '/news/'.$this->n_sef;
    }
}