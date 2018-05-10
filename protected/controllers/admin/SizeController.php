<?php

class SizeController extends CRUDController
{
    public    $modelClass     = 'Size';
    protected $_pageTitle     = 'Размеры';
    public    $labelAddButton = 'Добавить';
    public $is_published = true;
    protected $actionTitles   = array('create'=>'Добавить','update'=>'Редактирование');

    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавление';
    }
    
    public function withModel() {
        return array();
    }
    
//    protected function beforeValidation() {
        //if(!$this->model->dc_sef)
        //    $this->model->dc_sef = TranslitFilter::translitUrl($this->model->dc_name);
//    }
}