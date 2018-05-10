<?php

class ResultsController extends CRUDController
{
    public    $modelClass     = 'Results';
    protected $_pageTitle     = 'Результаты работы';
    public    $labelAddButton = 'Добавить новость';
    protected $actionTitles   = array('create'=>'Добавить','update'=>'Редактировать');

    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавление';
    }
    
    public function withModel() {
        return array();
    }
    
    protected function beforeValidation() {
    //    if ( !$this->model->n_sef )
    //        $this->model->n_sef = TranslitFilter::translitUrl($this->model->n_name);
    }
}