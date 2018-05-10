<?php

class SefBehavior extends CActiveRecordBehavior {
    
    public    $saveSef = true;
    protected $_ownerSefField;
    
    public function getSefField() {
        if ($this->_ownerSefField === null) {
            $this->_ownerSefField = $this->owner->ownerPrefix.'_sef';
        }
        return $this->_ownerSefField;
    }
    
    public function setSefField($sefField) {
        $this->_ownerSefField = $sefField;
    }
    
    public function getOwnerSef() {
        return  $this->owner->{$this->sefField};
    }
    
    public function setOwnerSef($value) {
        $this->owner->{$this->sefField} = $value;
    }
    
    public function beforeSave($event) {
        if ($this->saveSef)
            $this->ownerSef = 
                ($this->owner->isNewRecord ? '' : $this->owner->primaryKey .'-') .
                TranslitFilter::translitUrl($this->owner->ownerName);
        return true;
    }
    
    public function afterSave($event) {
        if($this->saveSef && $this->owner->isNewRecord)
            $this->owner->addLateUpdate($this->sefField,
                    $this->owner->primaryKey.'-'.$this->ownerSef);
        parent::afterSave($event);
    }
}