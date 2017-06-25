<?php

class AttributeBehavior extends CActiveRecordBehavior
{
    public $postID = 'Attribute';
    public $LinkObjectType;
    public $LinkField;

    public function textAttribute($linksoa){
        $linkOA = LinkOA::model()->find(array(
            'condition' => 'linksoa='.$linksoa.' AND 
                            object_type='.$this->owner->objectType.' AND 
                            object_id='.$this->owner->primaryKey,
            'limit'     => 1,
        ));
        return $linkOA ? $linkOA->text : '';
    }
    
    public function attributeInCatalog($linksoa){
        $linkOA = LinkOA::model()->find(array(
            'condition' => 'linksoa='.$linksoa.' AND 
                            object_type='.$this->owner->objectType.' AND 
                            object_id='.$this->owner->primaryKey,
            'limit'     => 1,
        ));
        return $linkOA ? $linkOA->inCatalog : 0;
    }
    
    public function thisAttribute(){
        return $this->owner->category->c_level ? $this->owner->category->attribute
                                               : $this->owner->category->attribute;
    }
    
    public function beforeSave($event) {
        if (!$this->owner->isNewRecord){
            $model = new $this->owner->ownerClass;
            $oldFieldID = $model::model()->findByPk($this->owner->primaryKey)->{$this->LinkField};
            if ($oldFieldID){
                $fieldID = (isset($_POST[$this->owner->ownerClass][$this->LinkField])) ? $_POST[$this->owner->ownerClass][$this->LinkField] : NULL;
                if ($fieldID!=$oldFieldID){
                    $sql = "DELETE FROM `linkOA` WHERE `object_id`=".$this->owner->primaryKey." 
                            AND `object_type`=".$this->owner->objectType;
                    Yii::app()->db->createCommand($sql)->execute();
                }
            }
        }
        return true;
    }
    
    public function afterSave($event){
        if(isset($_POST[$this->postID]) && !empty($_POST[$this->postID]) && is_array($_POST[$this->postID])){
            $object_id = $this->owner->category->c_level
                       ? $this->owner->category->cid
                       : $this->owner->category->cid;
            foreach ($_POST[$this->postID] as $atid=>$atText) {
                $linkSOA = LinkSOA::model()->find(array(
                    'condition' => 'object_type='.$this->LinkObjectType.' AND 
                                    object_id='.$object_id.' AND 
                                    attribute_id='.$atid,
                    'limit'     => 1,
                ));
                if ($linkSOA){
                    $linkOA = LinkOA::model()->find(array(
                        'condition' => 'linksoa='.$linkSOA->soaid.' AND 
                                        object_type='.$this->owner->objectType.' AND 
                                        object_id='.$this->owner->primaryKey,
                        'limit'     => 1,
                    ));
                    $text = filter_var(trim($atText),FILTER_SANITIZE_STRING);
                    $inCatalog = (isset($_POST['AttributeInCatalog']) && isset($_POST['AttributeInCatalog'][$linkSOA->attribute_id])) ? 1 : 0;
                    if ($linkOA){
                        if ($text!=''){
                            $linkOA->text      = $text;
                            $linkOA->inCatalog = $inCatalog;
                            $linkOA->save();
                        } else {
                            $linkOA->delete();
                        }
                    } elseif($text!=''){
                        $linkOA = new LinkOA();
                        $linkOA->linksoa      = $linkSOA->soaid;
                        $linkOA->object_type  = $this->owner->objectType;
                        $linkOA->object_id    = $this->owner->primaryKey;
                        $linkOA->text         = $text;
                        $linkOA->inCatalog    = $inCatalog;
                        $linkOA->save();
                    }
                }
            }
        }
    }
    
    public function beforeDelete($event) {
        $sql = "DELETE FROM `linkOA` WHERE `object_id`=".$this->owner->primaryKey." 
                AND `object_type`=".$this->owner->objectType;
        Yii::app()->db->createCommand($sql)->execute();
        return true;
    }
}