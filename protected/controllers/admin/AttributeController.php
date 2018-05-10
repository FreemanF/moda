<?php

class AttributeController extends CRUDController
{
    
    public $modelClass      = 'Attribute';
    public $labelAddButton  = 'Добавить новый атрибут';
    public $infoAlertOnDefaultPanel = 'Данный модуль позволит добавить\удалить атрибуты товаров';
    public $date_column     = false;
    
    public function withModel() {
        return array();
    }
    
    protected function beforeValidation() {
        if(!$this->model->at_sef) {
            $this->model->at_sef = TranslitFilter::translitUrl($this->model->at_name);
            $_POST['Attribute']['at_sef'] = $this->model->at_sef;
        }
    }
}