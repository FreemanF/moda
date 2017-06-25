<?php

class DictionaryController extends CRUDController
{
    public    $modelClass     = 'Dictionary';
    protected $_pageTitle     = 'Словарь';
    public    $labelAddButton = 'Добавить';
    public $is_published = true;
    protected $actionTitles   = array('create'=>'Добавить','update'=>'Редактирование');

    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавление';
    }
    
    public function withModel() {
        return array("meta");
    }
    
    protected function beforeValidation() {
        if(!$this->model->dc_sef)
            $this->model->dc_sef = TranslitFilter::translitUrl($this->model->dc_name);
    }
}