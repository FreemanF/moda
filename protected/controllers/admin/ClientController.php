<?php

class ClientController extends CRUDController
{
    
    public $modelClass      = 'Client';
    public $labelAddButton  = 'Добавить';
    public $infoAlertOnDefaultPanel = 'Данный модуль позволит добавить\удалить изображения Наши клиенты';
    public $date_column     = false; // В модели нет даты 
    public $is_published    = true;
	protected $actionTitles   = array('create'=>'Добавить бренд','update'=>'Редактирование бренда');
    //public $layout_index    = '//layouts/stdindexSort';
    
    public function setDefaultAttributes() {
		parent::setDefaultAttributes();
        $this->model->is_published  = 0;
        //$maxSort = Slider::model()->find(array(
        //    "select"    => "MAX(sl_sort) max"
        //));
        //$this->model->sl_sort = is_null($maxSort->max) ? 0 : ($maxSort->max+1);
    }
/*
    public function getIndexColumns() {
        echo '
            <style>
                .item_sort img{
                    max-width: 86px;
                }
            </style>';
        $columns = parent::getIndexColumns();
        $this->replaceColumn($columns, 2, array(
            'header'=>'Фото',
            'name'=>'sl_media_id',
            'type'=>'html',
            'filter'=>false,
            'sortable'=>false,
            'value'=>'$data->asa("MediaBehavior")->mediaForm("86-s-crop")',
        ));
        $this->insertColumn($columns, 3, // 3
            $this->columnPublished($this->model->objectType)
        );
        return $columns;
    }
	*/
	
	protected function beforeValidation() {
        if ( !$this->model->cl_sef )
            $this->model->cl_sef = TranslitFilter::translitUrl($this->model->cl_name);
    }
}