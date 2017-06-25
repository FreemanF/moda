<?php

/**
 * @property string $humanDate
 */
class DateBehavior extends CActiveRecordBehavior {
    
//    public function rules() {
//        return array(
//            
//            ....OR..
//            array('humanDate', 'date', 'message' => 'Не верный формат даты (dd-mm-yyyy hh:mm)', 
//                    'format' => 'dd-MM-yyyy hh:mm'),
//    ---------------------------------------------------
//            
//    public function behaviors()
//    {
//        return array(
//            ......
//            'DateBehavior',
//    ---------------------------------------------------
//    public function attributeLabels(){
//        return array(
//            ......
//            'humanDate'    => 'Начало публикации',
//    ---------------------------------------------------
//    В модели в search() добавить
//        $this->humanDateSearch($criteria,$this->dt_start);
//              OR
//        $date = Comportable::emptyDate($this->dt_start) ? '' :
//            date('Y-m-d',CDateTimeParser::parse($this->dt_start,'dd-MM-yyyy'));
//        $criteria->compare('dt_start', $date, true);
//    ---------------------------------------------------
//    echo $form->datetimeFieldBS('=humanDate'); 
//    ---------------------------------------------------
//    Фильтрация по дате
//    см. CRUDController.getFilterAjaxUpdate
//    см. CRUDController.getIndexColumns
//    Если поле не dt_start см. LogController.getIndexColumns() там dt_event
//    ---------------------------------------------------
//    ---------------------------------------------------
//    ---------------------------------------------------
    private $_humanDate;
    
    public  $humanDateField = 'dt_start';
    
    public function getHumanDate($format='d-m-Y H:i') {
        if ($this->_humanDate===null)
            $this->_humanDate = Comportable::humanDate($this->owner->{$this->humanDateField},$format);
        return $this->_humanDate;
    }

    public static function parseHumanDate($humanDate,$format='dd-MM-yyyy hh:mm',$errorDefault='error') {
        if (Comportable::emptyDate($humanDate))
            return '0000-00-00 00:00:00';
        else
        if ($time = CDateTimeParser::parse($humanDate,$format))
            // Секунды видимо берутся текущие
            return date('Y-m-d H:i:s',$time);
        else 
            return $errorDefault;
    }
    
    public function setHumanDate($humanDate) {
        $this->_humanDate = $humanDate; // используется в момент ajax-validation
        $this->owner->{$this->humanDateField} = self::parseHumanDate($humanDate);
        //if 'error';
        //$this->owner->addError ('humanDate', 'Не верный формат даты (dd-mm-yyyy hh:mm)');
    }
    
    public function humanDateRule() {
        return array('humanDate', 'date', 'message' => 'Не верный формат даты (dd-mm-yyyy hh:mm)', 
                    'format' => 'dd-MM-yyyy hh:mm');
    }
    
    public function humanDateSearch($criteria,$date,$attribute='dt_start') {
        $date = $this->owner->{$this->humanDateField};
        $resdate = Comportable::emptyDate($date) ? '' :
            date('Y-m-d',CDateTimeParser::parse($date,'dd-MM-yyyy'));
        $criteria->compare($this->humanDateField, $resdate, true);
    }

}
