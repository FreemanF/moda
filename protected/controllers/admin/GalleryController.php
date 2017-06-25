<?php

class GalleryController extends CRUDController
{
    public $modelClass    = 'Gallery';
    protected $_pageTitle = 'Список галерей';
    
    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавление записи';
        return;
    }
    
    public function beforeUpdate() {
    $this->_pageTitle = 'Редактирование записи';
    return true;
    }
    
    public function withModel() {
        return array("meta");
    }
}
