<?php

class Attribute extends CActiveRecord
{
    public $content_type = 1;
    public $soaid;
    public $inFilter;
    
    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return 'attribute';
    }
    
    public function rules()
    {
        return array(
            array('at_name', 'required'),
            array('at_name', 'unique', 'message'=>'Атрибут с таким Названием уже существует.'),
            array('at_sef', 'unique', 'message'=>'Атрибут с таким URL уже существует.'),
            array('at_name, at_sef', 'length', 'max'=>255),
        );
    }
    
    public function relations() {
        return array();
    }
    
    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'LogBehavior',
            'PrefixedModel' => array('class'=>'PrefixedModel'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'atid'     => 'ID',
            'at_name'  => 'Название',
            'at_sef'   => 'URL',
            'shortSef' => 'URL',
        );
    }
    
    public function defaultScope()
    {
        return $this->getDefaultScopeDisabled() ? array('order' => 'at_name ASC')
                                                : array();
    }
    
    public function scopes() {
        return array(
            'setDisableDefaultScope' => array(),
        );
    }
    
    public function setDisableDefaultScope($sef) {
        $this->disableDefaultScope();
        return $this;
    }
    
    public function search()
    {
        $criteria=new CDbCriteria;
        $criteria->compare('atid'    , $this->atid          );
        $criteria->compare('at_name' , $this->at_name , true);

        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }
    
    static public function makeIds($arrayID) {
        $ids = array();
        if (is_array($arrayID))
            foreach ($arrayID as $id)
                if (Attribute::model()->findByPk($id))
                    $ids[] = $id;
        return $ids;
    }
}