<?php

class LprojectsController extends CRUDController
{
    public    $modelClass     = 'Lprojects';
    protected $_pageTitle     = 'Последние проекты';
    public    $labelAddButton = 'Добавить проект';
    protected $actionTitles   = array('create'=>'Добавить','update'=>'Редактировать');

    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавление проекта';
    }
    
    public function withModel() {
        return array();
    }
    
    protected function beforeValidation() {
    //    if ( !$this->model->n_sef )
    //        $this->model->n_sef = TranslitFilter::translitUrl($this->model->n_name);
    }
}