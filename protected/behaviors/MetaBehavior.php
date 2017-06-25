<?php

/**
 * @property string $metaField
 * @property string $postID
 */
class MetaBehavior extends CActiveRecordBehavior {

    protected $_ownerMetaField;
    protected $_meta;
    protected $_oldmeta;
    public    $postID = 'Meta';
    
    public function getMetaField() {
        if ($this->_ownerMetaField === null) {
            $this->_ownerMetaField = $this->owner->ownerPrefix.'_meta';
        }
        return $this->_ownerMetaField;
    }
    
    public function setMetaField($metaField) {
        $this->_ownerMetaField = $metaField;
    }
    
    /**
     * @return Meta
     */
    public function getMetaStuff() {
        if ($this->_meta===null) {
            if (isset($this->owner->meta))
                $this->_meta = $this->owner->meta;
            else {
                $this->_meta = new Meta();
                $this->owner->meta = $this->_meta;
            }
            
            // Сразу же считываем POST атрибуты
            if (isset($_POST[$this->postID])) {
                $this->_oldmeta = $this->_meta->attributes;
                $this->_meta->attributes = $_POST[$this->postID];
            }
        }
        return $this->_meta;
    }

    public function beforeSave($event) {
        $meta = $this->getMetaStuff();
        // без валидации сюда не попадём
        //if ($this->owner->validate()) {
        if ($meta->isEmpty()) {
            if (!$meta->isNewRecord) {
                $meta->delete();
                $this->owner->{$this->metaField} = NULL;
            }
        } else {
            if (!$meta->isEqual($this->_oldmeta)) {
                if ($meta->save()) {
                    $this->owner->{$this->metaField} = $meta->primaryKey;
                } else 
                    throw new CHttpException(500,"Can't save model '$postID'.");
            }
        }
        //}
        return true;
    }
    public function beforeDelete($event) {
        if (isset($this->owner->{$this->metaField}))
            Meta::model()->deleteByPk($this->owner->{$this->metaField});
        return true;
    }
    
}
