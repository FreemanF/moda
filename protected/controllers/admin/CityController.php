<?php

class CityController extends CRUDController
{
    
    public $modelClass      = 'City';
    public $labelAddButton  = 'Добавить город';
    public $infoAlertOnDefaultPanel = 'Данный модуль позволит добавить\удалить город';

    public $is_published    = true;
    public $content_long = '';
//    public $layout_index    = '//layouts/stdindexSort';
    
	public function withModel() {
        return array();
    }
	
	
    protected function beforeValidation() {
        if(!$this->model->ct_sef) {
            $this->model->ct_sef = TranslitFilter::translitUrl($this->model->ct_name);
            //$_POST['Page']['ct_sef'] = $this->model->c_sef;
        }
    }	
	
    public function setDefaultAttributes() {
//        $this->model->is_published  = 0;
        //$maxSort = Slider::model()->find(array(
        //    "select"    => "MAX(sl_sort) max"
        //));
        //$this->model->sl_sort = is_null($maxSort->max) ? 0 : ($maxSort->max+1);
    }

//    public function getIndexColumns() {
////        echo '
////            <style>
////                .item_sort img{
////                    max-width: 86px;
////                }
////            </style>';
//        $columns = parent::getIndexColumns();
////        $this->replaceColumn($columns, 2, array(
////            'header'=>'Фото',
////            'name'=>'sl_media_id',
////            'type'=>'html',
////            'filter'=>false,
////            'sortable'=>false,
////            'value'=>'$data->asa("MediaBehavior")->mediaForm("86-s-crop")',
////        ));
//        $this->insertColumn($columns, 3, // 3
//            $this->columnPublished($this->model->objectType)
//        );
//        return $columns;
//    }
	
}