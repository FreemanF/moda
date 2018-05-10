<?php

class ArticleController extends CRUDController
{
    public    $modelClass     = 'Article';
    protected $_pageTitle     = 'Статьи';
	public $content_type = 1;
    public    $labelAddButton = 'Добавить статью';
    protected $actionTitles   = array('create'=>'Добавить статью','update'=>'Редактирование статьи');

    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавление статьи';
    }
    
    public function withModel() {
        return array("meta");
    }
    
    protected function beforeValidation() {
        if(!$this->model->ar_sef)
            $this->model->ar_sef = TranslitFilter::translitUrl($this->model->ar_name);
    }
}