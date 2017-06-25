<?php

class LogController extends CRUDController
{
    public $modelClass    = 'Log';
    public $enableNotice  = false;
    protected $_pageTitle = 'Протокол изменений';

    // фиктивная запись, т.к. протоколы не удаляются
    // но необходима, т.к. в object нет объекта 'log' см.CRUDController.actionIndex;
    public $deleteGenitive = 'протокола';
    public $infoAlertOnDefaultPanel = 'Данный модуль позволит вам отслеживать последние изменения сделанные в административной панели';
    public $date_column = 'dt_event'; // ajax-фильтрация столбца на индексной странице админки Log
    protected $actionTitles = array();
    
    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('index'),
                'roles'=>array('ModuleLog'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    protected function scopeModel() {
        $this->enableAddButton = false;
    }
    
    public function getIndexColumns() { //
        // 0 - dt_event
        // 1 - title 
        // 2 - object
        // 3 - editor
        // 4 - action
        $columns = parent::getIndexColumns();
        $this->deleteColumn($columns, 1); // name
        $this->deleteColumn($columns, 0); // id
        
        $columns[0]['header']='Время изменения';
        $this->insertColumn($columns, 1, 'z_name');
        $this->insertColumn($columns, 2, array(
           'header' => 'Раздел',
           'name' => 'z_object_type',
           'value' => 'Object::getPlural($data->z_object_type)',
           'filter' => CHtml::dropDownList('Log[z_object_type]',$this->model->z_object_type,
                Object::getLabels('log'),
                array(
                    'empty'=>array(0=>'Все разделы'),
                    'class'=>'filterSelectBox')
                ),
            ));
        $this->insertColumn($columns, 3, array(
           'name' => 'editor_search',
           'value' => '$data->editor->username',
           //'filter' => CHtml::listData( User::model()->findAll(), 'uid', 'fullname' )
            ));
        if (Log::USEIP)
            $this->insertColumn($columns, 4, 'ip_address');
        $this->replaceColumn($columns, Log::USEIP?5:4, array(
               'header' => 'Действие',
               'name'   => 'event.l_name',
               'filter' => CHtml::dropDownList('Log[z_type]',$this->model->z_type,
                       Lists::getList('LE'),
                       array(
                            'empty'=>array(0=>'Любое действие'),
                            'class'=>'filterSelectBox',
//                            'ajax' => array(
//                                'success'=>'js:$(".filterSelectBox").select2({dropdownCssClass: "noSearch"});',
//                                ),
                           )
                       ),
            ));
        return $columns;
    }
    
}