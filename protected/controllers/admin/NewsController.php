<?php

class NewsController extends CRUDController
{
    public    $modelClass     = 'News';
    protected $_pageTitle     = 'Новости';
    public    $labelAddButton = 'Добавить новость';
    protected $actionTitles   = array('create'=>'Добавить новость','update'=>'Редактирование новости');

    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавление новости';
    }
    
    public function withModel() {
        return array('meta');
    }
    
    protected function beforeValidation() {
        if ( !$this->model->n_sef )
            $this->model->n_sef = TranslitFilter::translitUrl($this->model->n_name);
    }
}