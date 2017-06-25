<?php

/**
 * This is the model class for table "crontab".
 *
 * The followings are the available columns in table 'crontab':
 * @property integer $tsid
 * @property string $dt_start
 * @property integer $ts_sort
 * @property integer $ts_other
 * @property string $ts_text
 * @property string $ts_command
 * @property string $ts_task
 * @property string $ts_min
 * @property string $ts_hour
 * @property string $ts_day
 * @property string $ts_month
 * @property string $ts_dayofweek
 * @property integer $is_published
 */
class Task extends CActiveRecord
{
    public  $maxSort = 0;
    private $_command;
    private $_task;
    static private $_commands;
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Crontab the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{task}}';
    }

    public function getTs_name() {
        return $this->commandDescription.'/'.$this->taskDescription;
    }
    
    public function getCommandDescription()
    {
        $command = $this->command;
        return isset($command['description']) ? $command['description'] : '';
    }

    public function getTaskDescription()
    {
        $task = $this->task;
        return isset($task['description']) ? $task['description'] : '';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ts_sort, ts_other, is_published', 'numerical', 'integerOnly'=>true),
            array('ts_command, ts_task, ts_min, ts_hour, ts_day, ts_month, ts_dayofweek', 'length', 'max'=>60),
            array('dt_start, ts_text', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('tsid, dt_start, ts_sort, ts_other, ts_text, ts_command, ts_task, ts_min, ts_hour, ts_day, ts_month, ts_dayofweek, is_published', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'LogBehavior',
            // asa работает только с именованными поведениями. Используется в CRUDController.getPrefix
            'PrefixedModel'  => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        return //$this->getDefaultScopeDisabled() ?
            array('order' => 'ts_sort ASC');
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'tsid'         => 'ID',
            'ts_name'      => 'Задача',
            'dt_start'     => 'Начало работы',
            'ts_sort'      => 'Порядок в файле',
            'ts_other'     => 'Внешняя команда',
            'ts_text'      => 'Полтый текст команды',
            'ts_command'   => 'Команда',
            'ts_task'      => 'Задача',
            'ts_min'       => 'Минуты',
            'ts_hour'      => 'Часы',
            'ts_day'       => 'Дни',
            'ts_month'     => 'Месяцы',
            'ts_dayofweek' => 'День недели',
            'is_published' => 'Включено',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('tsid',$this->tsid);
        $criteria->compare('dt_start',$this->dt_start,true);
        $criteria->compare('ts_sort',$this->ts_sort);
        $criteria->compare('ts_other',$this->ts_other);
        $criteria->compare('ts_text',$this->ts_text,true);
        $criteria->compare('ts_command',$this->ts_command,true);
        $criteria->compare('ts_task',$this->ts_task,true);
        $criteria->compare('ts_min',$this->ts_min,true);
        $criteria->compare('ts_hour',$this->ts_hour,true);
        $criteria->compare('ts_day',$this->ts_day,true);
        $criteria->compare('ts_month',$this->ts_month,true);
        $criteria->compare('ts_dayofweek',$this->ts_dayofweek,true);
        $criteria->compare('is_published',$this->is_published);

        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }
    
    static public function getCommands() {
        if (self::$_commands === null) {
            self::$_commands = Yii::app()->cache->get('elevatorist.crontab');
            if (self::$_commands === false) {
                self::$_commands = array();
                $dir = Yii::getPathOfAlias('application.commands');
                foreach(scandir($dir) as $filename) {
                    if (substr(strtoupper($filename),-11)=='COMMAND.PHP' && is_file($dir.DIRECTORY_SEPARATOR.$filename)) {
                        $class = pathinfo($filename, PATHINFO_FILENAME);
                        include($dir.DIRECTORY_SEPARATOR.$filename);
                        if (class_exists($class)) {
                            $obj = new $class(null,null);
                            if (method_exists($obj, 'getTasks')) {
                                $tasks = array();
                                foreach($obj->getTasks() as $task=>$description) {
                                    if (is_int($task))
                                        $task = $description;
                                    $tasks[$task] = array(
                                        'name'=>$task,
                                        'description'=>$description
                                        );
                                }
                                $command = lcfirst(substr($filename, 0,  strlen($filename)-11));
                                $description = property_exists($obj, 'description') ? $obj->description : $command;
                                self::$_commands[$command] = array(
                                    'name'=>$command,
                                    'description'=>$description,
                                    'tasks'=>$tasks
                                    );
                            }
                        }
                    }
                }
                Yii::app()->cache->set('elevatorist.crontab',self::$_commands);
            } else {
                Yii::log('get elevatorist.crontab from cache');
            }
        }
        return self::$_commands;
    }
    
    public function getCommand() {
        // Поправляем если нужно $this->ts_command
        if ($this->_command === null) {
            $command = $this->ts_command;
            $commands = self::getCommands();
            if (!isset($commands[$command]) && count($commands)>0) {
                // если команда не существует, выбираем первую
                reset($commands);
                list($command) = each($commands);
                $this->ts_command = $command;
            }
            $this->_command =  isset($commands[$command]) ? $commands[$command] : array();
        }
        return $this->_command;
    }
    
    public function getTasks($command=null) {
        $command = $this->getCommand();
        return isset($command['tasks']) ? $command['tasks'] : array();
    }
    
    public function getTask() {
        // Поправляем если нужно $this->ts_task
        if ($this->_task === null) {
            $task  = $this->ts_task;
            $tasks = $this->getTasks();
            if (!isset($tasks[$task]) && count($tasks)>0) {
                // если задача не существует, выбираем первую
                reset($tasks);
                list($task) = each($tasks);
                $this->ts_task = $task;
            }
            $this->_task = isset($tasks[$task]) ? $tasks[$task] : array();
        }
        return $this->_task;
    }
    
    static public function updateCrontab() {
        // Обновляем  информацию о задачах
        $cron = Yii::createComponent(array('class'=>'ext.crontab.Crontab'));
        $cron->init();
        
        //Yii::import('ext.crontab.Crontab');
        //$cron = new Crontab(); // my_crontab file will store all added jobs
        $cron->eraseJobs();
        foreach(Task::model()->findAll('is_published > 0') as $task) {
            $cron->addApplicationJob(
                'protected/cron', $task->ts_command, array($task->ts_task),
                $task->ts_min, $task->ts_hour, $task->ts_day, $task->ts_month, $task->ts_dayofweek);
        }
        $cron->saveCronFile(); // save to my_crontab cronfile
        $cron->saveToCrontab(); // adds all my_crontab jobs to system (replacing previous my_crontab jobs)
   }
   
}