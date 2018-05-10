<?php

class m140715_093646_crontabTask_module extends KpdMigration
{
    public static $moduleObject = Object::idTask;
    public static $moduleAlias  = '=TaskManager';
    
    const  taskTable = '{{task}}';
    const  prefix  = 'ts';
    const  prefix_ = 'ts_';
    public $dropped = array(self::taskTable);
    
    public $fileUpdate = array('models/Object.php'=>array('OBJECT-LIST'=>array(
        Object::idTask         =>array( // 'oid' => 28,
            'chars'=>array('task', self::prefix, 'settings5', ':task'),
            'label'=>array('Расписание', 'Расписание', 'Расписание', 'задачи'),
            'have' => array('module','log'),
        ))));
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Управление расписанием');
        
        $columns = array(
            self::prefix.'id'=> self::PK,
            'dt_start' => self::DATETIME('Начало работы'),
            self::prefix_.'sort' => self::INT('Порядок в файле',0),
            self::prefix_.'other'=> self::BOOLEAN('Внешняя команда',false),
            
            self::prefix_.'text' => self::TEXT('Полтый текст команды',null),
            self::prefix_.'command' => self::STR('Команда: app.commands.<cmd>Command.php',60,null),
            self::prefix_.'task'    => self::STR('Задача: getActions()',60,null),
            
            self::prefix_.'min'      => self::STR('Минуты: 0..59'               ,60,'*'),
            self::prefix_.'hour'     => self::STR('Часы: 0..23'                 ,60,'*'),
            self::prefix_.'day'      => self::STR('Дни: 1..31'                  ,60,'*'),
            self::prefix_.'month'    => self::STR('Месяцы: 1..12 or short name' ,60,'*'),
            self::prefix_.'dayofweek'=> self::STR('День недели: 0 и 7 = ВС'     ,60,'*'),
            
            'is_published' => self::BOOLEAN('Публиковать',false),
        );
        $this->createTable(self::taskTable, $columns, $this->getOptions('Расписание crontab'));
    }
}
