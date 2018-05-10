<?php

/**
 * @property string $metaField
 * @property string $postID
 */
class LogBehavior extends CActiveRecordBehavior {

    public function afterSave($event) {
        if ($this->owner->isNewRecord) {
            Log::makeInsert(
                    $this->owner->objectType,
                    $this->owner->primaryKey,
                    $this->owner->ownerName);
        } else {
            Log::makeUpdate(
                    $this->owner->objectType,
                    $this->owner->primaryKey,
                    $this->owner->ownerName);
        }
    }
    
    public function afterDelete($event) {
        Log::makeDelete(
                $this->owner->objectType,
                $this->owner->primaryKey,
                $this->owner->ownerName);
    }
}
