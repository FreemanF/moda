<?php

/**
 * This is the model class for table "brand".
 *
 * The followings are the available columns in table 'brand':
 * @property integer $brid
 * @property string $br_name
 * @property string $br_sef
 * @property integer $br_media_id
 * @property string $dt_start
 * @property string $content_long
 */
class Color extends CFormModel
{
public $pcid;
public $pc_name;
public $pc_rgb;
public $data = array(
    array(0, 'Белый', 'rgb(255, 255, 255)'),
    array(1, 'Серебристый', 'rgb(237, 238, 240)'),
    array(2, 'Бежевый', 'rgb(246, 230, 209)'),
    array(3, 'Серебристый', 'rgb(237, 238, 240)'),
    array(4, 'Серый', 'rgb(167, 167, 167)'),
    array(5, 'Жёлтый', 'rgb(255, 246, 51)'),
    array(6, 'Золотистый', 'rgb(255, 225, 51)'),
    array(7, 'Оранжевый', 'rgb(255, 184, 51)'),
    array(8, 'Розовый', 'rgb(255, 51, 153)'),
    array(9, 'Красный', 'rgb(217, 91, 51)'),
    
);

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pc_name, pcid', 'required'),
			array('pcid', 'numerical', 'integerOnly'=>true),
			array('pc_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pcid, pc_name, pc_rgb', 'safe', 'on'=>'search'),
		);
	}



    public function behaviors()
    {
        return array(
        );
    }

	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pcid' => 'ID',
			'pc_name' => 'Название цвета',
			'pc_rgb' => 'Значение',
		);
	}

        public function attributeNames()
        {
          return array( 'pcid', 'pc_name', 'pc_rgb' );
        }
        
        public function __get( $name )
        {
                if( property_exists( $this, $name ) )
                {
                        return $this->$name;
                }
                else
                {
                        return parent::__get( $name );
                }
        }
        
        public function __set( $name, $value )
        {
                if( property_exists( $this, $name ) )
                {
                        $this->$name = $value;
                }
                else
                {
                        parent::__set( $name, $value );
                }
        }
        
        
        public function getData(){
            return $this->data;
        }

}