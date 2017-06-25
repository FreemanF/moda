<?php

class Meta extends CActiveRecord 
{
    
    public static function model($className=__CLASS__){
        return parent::model($className);
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{meta}}';
    }

    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('e_title, e_keywords, e_description', 'safe'),
            //array('m_title, m_keywords, m_description', 'checkEmpty', 'on'=>'notempty'),
            //array('m_title', 'default', 'setOnEmpty' => true, 'value' => 'Пример заголовка'),

        );
    }
    
    public function attributeLabels()
    {
        return array(
            'eid'    => 'ID',
            'e_title'       => 'Заголовок окна браузера',
            'e_keywords'    => 'Ключевые слова',
            'e_description' => 'Описание',
        );
    }
    
    public function isEmpty() {
        return  empty($this->e_title) &&
                empty($this->e_keywords) &&
                empty($this->e_description);
        
    }
    
    public function canSave() {
        return ! $this->isEmpty();
    }

    public function isEqual($attributes) {
        return  $this->e_title       == $attributes['e_title'] &&
                $this->e_keywords    == $attributes['e_keywords'] &&
                $this->e_description == $attributes['e_description'] ;
    }
    
}