<?php

class ContactsController extends CRUDController
{
    public    $modelClass     = 'Contacts';
    protected $_pageTitle     = 'Как это работает';
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