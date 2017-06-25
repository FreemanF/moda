<?php

class AttributeSelectedBehavior extends CActiveRecordBehavior
{
    public $postID = 'Attribute';
    protected $_attribute;
    private $localizedRelation = 'attribute';
    private $nameRelation = 'Attribute';

    public function getAttributesStuff() {
        if ($this->_attribute===null) {
            $this->_attribute = $this->owner->attribute;
        }
        return $this->_attribute;
    }
    
    public function attach($owner) {
        parent::attach($owner);
        $class = CActiveRecord::MANY_MANY;
        $owner->getMetaData()->relations[$this->localizedRelation] = 
            new $class(
                $this->localizedRelation,
                $this->nameRelation,
                'linkSOA(object_id,attribute_id)', 
                array(
                    'select' => $this->nameRelation.'.*, '.
                                $this->localizedRelation.'_'.$this->localizedRelation.'.soaid as soaid,'.
                                $this->localizedRelation.'_'.$this->localizedRelation.'.inFilter as inFilter',
                    'on'    => "object_type=".Object::byAlias(get_class($owner))->oid,
                    'order' => 'sort ASC',
                )
            );
    }

    public function getOptionAttributes() 
    {
        $result = '';
        $keys = array();
        $selectedAttributes = $this->selectionAttributes(0);
        if ($selectedAttributes)
            foreach ($selectedAttributes as $selectedAttribute){
                $keys[] = $selectedAttribute->atid;
                $result .= '
                    <option selected="selected" value="'.$selectedAttribute->atid.'">'.
                        $selectedAttribute->at_name.'
                    </option>';
            }
        
        $criteria = empty($keys) ? '' : 'atid NOT IN ('.implode(",", $keys).')';
        $attributes = Attribute::model()->findAll($criteria);
        if ($attributes)
            foreach ($attributes as $attribute)
                $result .= '
                    <option value="'.$attribute->atid.'">'.
                        $attribute->at_name.'
                    </option>';
        return $result;
    }
    
    public function getFlagAttributes() 
    {
        $result = '';
        $result = '';
        $keys = array();
        $selectedAttributes = $this->selectionAttributes(0);
        if ($selectedAttributes)
            foreach ($selectedAttributes as $selectedAttribute){
                $keys[] = $selectedAttribute->atid;
                $result .= '
                    <p id="AttributeFilter'.$selectedAttribute->atid.'" class="AttributeFilters AttributeFilterSelected">
                        <input id="AttributeFilterInput'.$selectedAttribute->atid.'" name="AttributeFilter['.$selectedAttribute->atid.']" type="checkbox" value="1" class="uniformPublished" '.($selectedAttribute->inFilter ? 'checked="checked"' : '').' /> 
                        <label for="AttributeFilterInput'.$selectedAttribute->atid.'">'.$selectedAttribute->at_name.'</label>
                    </p>';
            }
        
        $criteria = empty($keys) ? '' : 'atid NOT IN ('.implode(",", $keys).')';
        $attributes = Attribute::model()->findAll($criteria);
        if ($attributes)
            foreach ($attributes as $attribute)
                $result .= '
                    <p id="AttributeFilter'.$attribute->atid.'" class="AttributeFilters">
                        <input id="AttributeFilterInput'.$attribute->atid.'" name="AttributeFilter['.$attribute->atid.']" type="checkbox" value="1" class="uniformPublished" /> 
                        <label for="AttributeFilterInput'.$attribute->atid.'">'.$attribute->at_name.'</label>
                    </p>';
        return $result;
    }
    
    public function selectionAttributes($item = 1)
    {
        $result = array();
        if ($attributes = $this->AttributesStuff)
            foreach($attributes as $attribute)
                $result[$attribute->atid] = $item ? $item : $attribute;
        return $result;
    }
    
    public function afterSave($event) {
        $trAttributes = Yii::app()->db->beginTransaction();
        try 
        {
            $object_type = $this->owner->objectType;
            $object_id   = $this->owner->primaryKey;

            $old = $this->owner->isNewRecord ? array() : $this->selectionAttributes();

            $new = Attribute::makeIds(isset($_POST[$this->postID]) ? $_POST[$this->postID] : array());

            $insert = array();
            foreach($new as $attribute_id)
                if (isset($old[$attribute_id])) {
                    $old[$attribute_id] = 0;
                    LinkSOA::model()->updateAll(
                        array('inFilter' => isset($_POST['AttributeFilter'][$attribute_id]) ? 1 : 0),
                        'object_type='.$object_type.' AND object_id='.$object_id.' AND attribute_id='.$attribute_id
                    );
                }else
                    $insert[] = $attribute_id;

            $delete = array();
            foreach($old as $attribute_id => $del)
                if ($del)
                    $delete[] = $attribute_id;

            if ($insert || $delete)
            {
                if ($insert) {
                    $sql = "INSERT INTO `linkSOA` (`object_type`,`object_id`,`sort`,`attribute_id`)
                            VALUES ($object_type,$object_id,0,".implode("),($object_type,$object_id,0,",$insert).')';
                    Yii::log('SQL ATTRIBUTES: '.print_r($sql,true));
                    Yii::app()->db->createCommand($sql)->execute();
                    foreach ($insert as $insertID){
                        LinkSOA::model()->updateAll(
                            array('inFilter' => isset($_POST['AttributeFilter'][$insertID]) ? 1 : 0),
                            'object_type='.$object_type.' AND object_id='.$object_id.' AND attribute_id='.$insertID
                        );
                    }
                }

                if ($delete) {
                    $sql = "DELETE FROM `linkSOA` WHERE `object_id`=$object_id 
                            AND `object_type`=$object_type
                            AND `attribute_id` IN (".implode(',',$delete).')';
                    Yii::app()->db->createCommand($sql)->execute();
                }

            }
            
            foreach($new as $key=>$attribute_id){
                $sql = "UPDATE `linkSOA` SET `sort`=$key WHERE `object_id`=$object_id 
                        AND `object_type`=$object_type
                        AND `attribute_id`=$attribute_id";
                Yii::app()->db->createCommand($sql)->execute();
            }
            
            $trAttributes->commit();
            $this->_attribute = null;
            $this->owner->getRelated('attribute',true);
        }
        catch(Exception $e) {
            Yii::log('EXCEPTION:'.$e->getMessage());
            $trAttributes->rollback();
        }
    }
    
    public function beforeDelete($event) {
        $sql = "DELETE FROM `linkSOA` WHERE `object_id`=".$this->owner->primaryKey." 
                AND `object_type`=".$this->owner->objectType;
        Yii::app()->db->createCommand($sql)->execute();
        return true;
    }
}