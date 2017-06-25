<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $cid
 * @property integer $c_pid
 * @property integer $c_obj
 * @property integer $с_meta
 * @property integer $c_sort
 * @property string $c_name
 * @property string $c_sef
 *
 * The followings are the available model relations:
 * @property LinkAC[] $linkACs
 */
class Category extends CActiveRecord {
    
    public $ct = 1;
    public $maxSort = -1;
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getDir($prefix='o',$makeRoot=false) {
        return $this->c_pid?$this->c_pid:$prefix.$this->c_obj;
    }

    public function tableName() {
        return '{{category}}';
    }

    public function rules() {
        return array(
            array('c_obj, c_name', 'required'),
            array('c_sef', 'required', 'on' => 'thirdMenu'),
            array('c_obj, c_sort', 'numerical', 'integerOnly' => true),
            array('c_name, c_sef', 'length', 'max' => 255),
            array('cid, c_name, c_sef, c_sort', 'safe', 'on' => 'search'),
            array('c_sort, c_name, c_sef', 'safe'),
        );
    }

    public function relations() {
        return array(
            'object'   => array(self::BELONGS_TO, 'Object'  , 'c_obj'),
            'meta'     => array(self::HAS_ONE   , 'Meta'    , '', 'on' => 'c_meta=eid'),
            'parent'   => array(self::BELONGS_TO, 'Category', 'c_pid'),
            'children' => array(self::HAS_MANY  , 'Category', 'c_pid'),
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'MetaBehavior',
            'LogBehavior',
            'PrefixedModel' => array('class'=>'PrefixedModel','ownerPrefix'=>'c'),
        );
    }
    
    public function defaultScope()
    {
        return array('order' =>  $this->getTableAlias(FALSE, FALSE).'.c_sort ASC');
    }
    
    public function scopes() {
        return array(
            'sef' => array(),
            'obj' => array(),
            'pid' => array(),
        );
    }

    public function sef($sef) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'c_sef=:sef',
            'params' => array('sef' => $sef),
        ));
        return $this;
    }

    public function obj($obj) {
        if (!empty($obj))
            $this->getDbCriteria()->mergeWith(array(
                'condition' => 'c_obj='.$obj
            ));
        return $this;
    }

    public function pid($pid) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'c_pid'.(empty($pid)?' IS NULL':'='.$pid)
        ));
        return $this;
    }

    public function attributeLabels() {
        return array(
            'cid'    => 'ID',
            'c_pid'  => 'Родительская категория',
            'c_obj'  => 'Тип статей',
            'с_meta' => 'Meta-тэги',
            'c_sort' => 'Порядок',
            'c_name' => 'Наименование категории',
            'c_sef'  => 'URL',
        );
    }
    
    public function categories() {
        $obj = Yii::app()->request->getParam('dir');
        $dir = intval($obj);
        if ($dir==0 && is_string($obj) && strpos($obj, 'o')===0)
            $obj = intval(substr($obj,1));
        else 
            $obj = 0;
        $checkdir = Yii::app()->request->isPostRequest && $dir
                  ? ' = '.$dir 
                  : ' IS NULL';
        $criteria = new CDbCriteria;
        $criteria->condition = 'c_pid'.$checkdir.($obj?' AND c_obj='.$obj:'');
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination'=>false,
        ));
    }
    
    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('cid'   , $this->cid);
        $criteria->compare('c_name', $this->c_name, true);
        $criteria->compare('c_sef' , $this->c_sef, true);
        return new CActiveDataProvider($this->with('children'), array(
            'criteria' => $criteria,
        ));
    }

    private $_aChildren = array();
    private $_aHierarchy = array();
    private $_aCat;
    
    public function getCildrenList($id = NULL) {
        if (!$id)
            $id = $this->cid;
        $aAR = $this->findAll(array(
            'select' => 'cid',
            'condition' => 'c_pid=:id',
            'params' => array(':id' => $id),
                )
        );
        foreach ($aAR as $oAR) {
            $this->_aChildren[] = $oAR->cid;
            $this->getCildrenList($oAR->cid);
        }
        return $this->_aChildren;
    }
    
    public function getHierarchy($oId, $recursive=true) {
        $oDbCrit            = new CDbCriteria();
        $oDbCrit->select    = 'cid, c_pid, c_name, c_sort, c_sef';
        $oDbCrit->condition = 'c_obj=' . $oId.(!$recursive ? " AND c_pid IS NULL" : "");
        $oDbCrit->order     = 'c_pid, c_sort';
        $this->_aCat        = $this->findAll($oDbCrit);
        $this->_aHierarchy  = array();
        return $recursive ? $this->getHierarchyRecursive() : $this->_aCat;
    }

    private function getHierarchyRecursive($pid = 0, $level = 0) {
        foreach ($this->_aCat as $m)
            if ($m->c_pid == $pid) {
                $sSeparator = '';
                for ($i = 0; $i < $level; ++$i)
                    $sSeparator .='--';
                $m->c_name = $sSeparator . $m->c_name;
                array_push($this->_aHierarchy, $m->attributes);
                if ($this->hasChildren($m->cid))
                    $this->getHierarchyRecursive($m->cid, $level + 1);
            }
        return $this->_aHierarchy;
    }

    private function hasChildren($iId) {
        foreach ($this->_aCat as $v)
            if ($v->c_pid == $iId)
                return TRUE;
        return FALSE;
    }

    public function getListOption() {
        $options = array($this->c_pid => array('selected' => true),
            $this->cid => array('disabled' => true));
        $childrenIds = $this->getCildrenList();
        foreach ($childrenIds as $v)
            $options[$v] = array('disabled' => true);
        return $options;
    }
    
    public function beforeDelete() {
        if (!parent::beforeDelete())
            return FALSE;

        if (!Yii::app()->db->currentTransaction) {
            Yii::app()->db->beginTransaction();
            $mustCommit = true;
        } else
            $mustCommit = false;

        try {
            foreach ($this->children as $child)
                if (!$child->delete())
                    throw new Exception('Не удалось удалить дочерние рубрики');

            switch ($this->c_obj) {
                case Object::idNews://удаление разрешено
                    break;
                default:
                    $obj = Object::getObject($this->c_obj);
                    if ($obj)
                        throw new Exception('Удаление рубрик для объекта "'.$obj->singular.'" не реализовано');
                    else
                        throw new Exception('У категории неизвестный IdObject='.$this->c_obj);
                    break;
            }
        
            if ($mustCommit)
                Yii::app()->db->currentTransaction->commit();

        } catch (Exception $e) {
            if ($mustCommit) Yii::app()->db->currentTransaction->rollback();
            throw $e;
        }

        return true;
    }

    public static function getList($object_type,$parent_id=NULL,$withChildren=false) {
        return CHtml::listData(Category::Model()->findAll(
                't.c_pid'.(is_numeric($parent_id)? '='.$parent_id : ' IS NULL').' AND t.c_obj='.$object_type
                ),'cid','c_name');
    }
    
    public static function getListCategory($object_type){
        $result = array();
        $category = Category::Model()->findAll('t.c_pid IS NULL AND t.c_obj='.$object_type);
        foreach ($category as $ct)
            if ($ct->children){
                $child = array();
                foreach ($ct->children as $ch)
                    $child[$ch->cid] = $ch->c_name;
                $result[$ct->c_name] = $child;
            } else
                $result[$ct->c_name] = array();
        return $result;
    }
            
    function getImage() {
        return $this->dir && empty($this->children)
            ? '<ins class="jstree-page"></ins>'
            : '<ins class="jstree-folder"></ins>';
    }
    
    function getLinkUpdateButton() {
        if (empty($this->children))
            return '/admin/category/update?id='.$this->primaryKey;
        else
            return '#node_'.$this->primaryKey;
    }
}

