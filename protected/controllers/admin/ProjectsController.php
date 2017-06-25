<?php

class ProjectsController extends CRUDController
{
    public    $modelClass     = 'Projects';
    protected $_pageTitle     = 'Проекты';
    public    $labelAddButton = 'Добавить проект';
    protected $actionTitles   = array('create'=>'Добавить','update'=>'Редактировать');

    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавление';
    }
    
    public function withModel() {
        return array('media');
    }
    
    protected function beforeValidation() {
        if ( !$this->model->pr_sef )
            $this->model->pr_sef = TranslitFilter::translitUrl($this->model->pr_name);
    }
}