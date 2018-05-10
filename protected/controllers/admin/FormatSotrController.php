<?php

class FormatSotrController extends CRUDController
{
    public    $modelClass     = 'FormatSotr';
    protected $_pageTitle     = 'Формат сотрудничества';
    public    $labelAddButton = 'Добавить блок';
	public $content_type = 2;
    protected $actionTitles   = array('create'=>'Добавить','update'=>'Редактировать');

    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавление блока';
    }
    
    public function withModel() {
        return array();
    }
    
    protected function beforeValidation() {
    //    if ( !$this->model->n_sef )
    //        $this->model->n_sef = TranslitFilter::translitUrl($this->model->n_name);
    }
}