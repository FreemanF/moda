<?php

/**
 * This is the model class for table "types".
 *
 * The followings are the available columns in table 'types':
 * @property string $tid
 * @property integer $t_link
 * @property string $t_name
 */
class Lists extends CActiveRecord
{
    private static $_lists=array();
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Types the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{list}}';
    }

    public function primaryKey(){
        return array('ltype', 'lid');
    }        
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ltype, lid, l_name', 'required'),
            array('lid', 'numerical', 'integerOnly'=>true),
            array('ltype', 'length', 'max'=>2),
            array('l_name', 'length', 'max'=>255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ltype, lid, l_name', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    public function defaultScope()
    {
        $alias = $this->getTableAlias(FALSE, FALSE);
        return array('order' => $alias.'.ltype ASC, '.$alias.'.l_sort ASC');
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ltype'  => 'Список',
            'lid'    => 'ID',
            'l_name' => 'Наименование',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('ltype' ,$this->ltype,true);
        $criteria->compare('lid'   ,$this->lid);
        $criteria->compare('l_name',$this->l_name,true);

        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }
    
    public static function getList($listName, $key=NULL) {
        if (!isset(self::$_lists[$listName])) {
            self::$_lists[$listName] = 
                CHtml::listData(Lists::model()->findAll('ltype="'.$listName.'"'),'lid','l_name');
        }
        return is_null($key) ? self::$_lists[$listName] : self::$_lists[$listName][$key];
    }
}