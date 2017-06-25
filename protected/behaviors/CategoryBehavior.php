<?php

/**
 * @property string $metaField
 * @property string $postID
 */
class CategoryBehavior extends CActiveRecordBehavior {

    protected $_categories;
    public    $postID = 'Categories';
    
    public function getCategoriesStuff() {
        if ($this->_categories===null) {
            $this->_categories = $this->owner->categories;
        }
        return $this->_categories;
    }

    public function selectionCategories($item = array('selected'=>true))
    {
        $result = array();
        if ($categories = $this->categoriesStuff)
            foreach($categories as $category)
                $result[$category->cid] = $item;
        return $result;
    }
    
    public function afterSave($event) {
        $trCategories = Yii::app()->db->beginTransaction();
        try 
        {
            $object_type = $this->owner->objectType;
            $object_id   = $this->owner->primaryKey;
            $old = $this->owner->isNewRecord ? array() : $this->selectionCategories(1);
            $new = isset($_POST[$this->postID]) ? $_POST[$this->postID] : array();

            $insert = array();
            foreach($new as $category_id)
                if (isset($old[$category_id]) && $old[$category_id])
                    $old[$category_id] = 0;
                else
                    $insert[] = $category_id;

            $delete = array();
            foreach($old as $category_id => $del)
                if ($del)
                    $delete[] = $category_id;

            if ($insert || $delete)
            {
                if ($insert) {
                    $sql = "INSERT INTO {{linkOC}} (`object_type`,`object_id`,`category_id`)
                            VALUES ($object_type,$object_id,".implode("),($object_type,$object_id,",$insert).')';
                    Yii::app()->db->createCommand($sql)->execute();
                }

                if ($delete) {
                    $sql = "DELETE FROM {{linkOC}} WHERE `object_id`=$object_id 
                            AND `object_type`=$object_type
                            AND `category_id` IN (".implode(',',$delete).')';
                    Yii::app()->db->createCommand($sql)->execute();
                }
            }
            $trCategories->commit();
            $this->_categories = null;
            $this->owner->getRelated('categories',true);
        }
        catch(Exception $e) {
            if ($trCategories->active)
                $trCategories->rollback();
        }
    }
    
    public function beforeDelete($event) {
        LinkOC::model()->deleteAll("object_id={$this->owner->primaryKey} AND object_type={$this->owner->objectType}");
        return true;
    }
    
}
