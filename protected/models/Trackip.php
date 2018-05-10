<?php

/**
 * This is the model class for table "trackip".
 *
 * The followings are the available columns in table 'trackip':
 * @property integer $task
 * @property integer $tid
 * @property integer $vid
 * @property string $tm
 */
class Trackip extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Trackip the static model class
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
		return '{{trackip}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('task, tid, vid, tm', 'required'),
			array('task, tid, vid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('task, tid, vid, tm', 'safe', 'on'=>'search'),
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
            return array('order' => 'tm DESC');
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'task' => 'Task',
			'tid' => 'Tid',
			'vid' => 'Vid',
			'tm' => 'Tm',
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

		$criteria->compare('task',$this->task);
		$criteria->compare('tid',$this->tid);
		$criteria->compare('vid',$this->vid);
		$criteria->compare('tm',$this->tm,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}