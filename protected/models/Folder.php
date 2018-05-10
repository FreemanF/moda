<?php

class Folder extends CActiveRecord{

    public $maxSort = 0;
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function getDir($prefix='',$makeRoot=false) {
        return ($makeRoot?$prefix:'').$this->f_pid;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{folder}}';
    }

    public function rules() {
            return array(
                array('f_name', 'required'),
            );
    }
    
    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'parent'   => array(self::BELONGS_TO, 'Folder', 'f_pid'),
            'children' => array(self::HAS_MANY  , 'Folder', 'f_pid'),
            'pages'    => array(self::HAS_MANY  , 'Page'  , 'p_dir'),
        );
    }

    public function behaviors()
    {
        return array(
            'LogBehavior',
            'PrefixedModel'  => array('class'=>'PrefixedModel','ownerPrefix'=>'f'),
        );
    }
    
    public function disableDefaultScope()
    {
        // заглушка для индексной страницы
        return $this;
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels(){
        return array(
            'f_name' => 'Название директории:',
        );
    }
    
    public function beforeDelete() {
        if (!parent::beforeDelete())
            return FALSE;

        if (!Yii::app()->db->currentTransaction) {
            Yii::app()->db->beginTransaction();
            $mustCommit = true;
        } else {
            $mustCommit = false;
        }

        try {
            if ($this->children)
                foreach ($this->children as $child)
                    if (!$child->delete())
                        throw new Exception('Не удалось удалить дочерние папки');
            if ($this->pages)
                foreach ($this->pages as $pages)
                    if (!$pages->delete())
                        throw new Exception('Не удалось удалить дочерние страницы');
        
            if ($mustCommit)
                Yii::app()->db->currentTransaction->commit();

        } catch (Exception $e) {
            if ($mustCommit) Yii::app()->db->currentTransaction->rollback();
            throw $e;
        }

        return true;
    }
    
    function getCanDelete() {
        //return true;
        $can_delete = $this->can_delete;
        if (empty($can_delete)) return false;
        if ($can_delete=='*') return true;
        return Yii::app()->user->checkAccess($can_delete);
    }
}