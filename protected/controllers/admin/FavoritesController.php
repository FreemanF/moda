<?php

class FavoritesController extends CRUDController
{
    public    $modelClass     = 'Favorites';
    protected $_pageTitle     = 'Избранные товары';
    public    $labelAddButton = 'Добавить';
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