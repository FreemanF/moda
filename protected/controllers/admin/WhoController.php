<?php

class WhoController extends CRUDController
{
    public    $modelClass     = 'Who';
    protected $_pageTitle     = 'Кто мы такие';
    public    $labelAddButton = 'Добавить';
    protected $actionTitles   = array('create'=>'Добавить','update'=>'Редактировать');

    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавить';
    }
    
    public function withModel() {
        return array();
    }
    
    protected function beforeValidation() {
    //    if ( !$this->model->n_sef )
    //        $this->model->n_sef = TranslitFilter::translitUrl($this->model->n_name);
    }
}