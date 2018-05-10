<?php

class TaskController extends CRUDController
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $modelClass = 'Task';
    public $date_column  = ''; // Используется в getIndexColumns()
    public $defaultContentType = false;
    public $is_published =  true;  // добавляем CheckBox для атрибута published на индексной странице админки
    public $enableSearch = false;  // Запрещаем сортировку и фильтрацию на индексной странице
    protected $actionTitles = array();
    
    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('index','delete','create','update'),
                    'roles'=>array('TaskManager'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function withModel() {
        return array();
    }
    
    public function setDefaultAttributes() {
        $this->model->dt_start = date('Y-m-d H:i:s');
        $this->model->is_published  = 1;
        $command = $this->model->ts_command;
        $commands = $this->model->getCommands();
        if (!isset($commands[$command]) && count($commands)>0) {
            // если команда не существует, выбираем первую
            reset($commands);
            list($command) = each($commands);
            $this->model->ts_command = $command;
            
            $tasks = $this->model->getTasks();
            $task = $this->model->ts_task;
            if (!isset($tasks[$task]) && count($tasks)>0) {
                // если задача не существует, выбираем первую
                reset($tasks);
                list($task) = each($tasks);
                $this->model->ts_task = $task;
            }
        }
        if ($this->model->isNewRecord && isset($_POST[$this->modelClass])) {
            $criteria=new CDbCriteria;
            $criteria->select    = 'max(ts_sort) AS maxSort';
            $result = Task::model()->find($criteria);
            $this->model->ts_sort = intval($result?$result->maxSort:-1)+1;
        }
    }
    
    protected function scopeModel() {
        // должна использоваться только в actionIndex, см. PageController.actionIndex
    }
    
    // Добавление/удаление столбцов в actionIndex
    public function getIndexColumns() { // используется в //layouts/stdindex
        $columns = parent::getIndexColumns();
        $columns = array(
            array( //0
                'header'=>'Группа',
                'value'=>'$data->commandDescription',
            ),
            array( //0
                'header'=>'Задача',
                'value'=>'$data->taskDescription',
            ),
            'ts_min',
            'ts_hour',
            'ts_day',
            'ts_month',
            'ts_dayofweek',
            $columns[2], // is_published
            $columns[3], // Buttons
        );
        return $columns;
    }
    
    public function afterSave() { // Используется в actionCreate & actionUpdate
        Task::updateCrontab();
    }
    
    public function afterDelete() {
        Task::updateCrontab();
    }
    
}