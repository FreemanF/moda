<?php

class ReplyesController extends CRUDController
{
    
    public $modelClass      = 'Replyes';
    public $labelAddButton  = 'Добавить';
    public $infoAlertOnDefaultPanel = 'Данный модуль позволит добавить\удалить изображения Наши клиенты';
    public $date_column     = false; // В модели нет даты 
    public $is_published    = true;
    //public $layout_index    = '//layouts/stdindexSort';
    
    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавить';
    }

    public function withModel() {
        return array();
    }
    
}