<?php

class ShortcutBar extends CActiveRecord{
    
    public static function model($className=__CLASS__){
            return parent::model($className);
    }
    
    public function behaviors()
    {
        return array(
            'LogBehavior',
            'PrefixedModel'  => array('class'=>'PrefixedModel'),
        );
    }
    
    public function tableName() {
        return '{{shortcutBar}}';
    }
}