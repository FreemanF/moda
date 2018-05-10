<?php

class PlistController extends CRUDController
{
    public    $modelClass     = 'Plist';
    protected $_pageTitle     = 'Контент проекта (блоки)';
    public    $labelAddButton = 'Добавить';
    protected $actionTitles   = array('create'=>'Добавить','update'=>'Редактировать');

    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавить';
    }
    
    public function withModel() {
        return array('media');
    }
    
    protected function beforeValidation() {
    //    if ( !$this->model->n_sef )
    //        $this->model->n_sef = TranslitFilter::translitUrl($this->model->n_name);
    }
}