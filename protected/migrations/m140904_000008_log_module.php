<?php

class m140904_000008_log_module extends KpdMigration
{
    public static $moduleObject = Object::idLog;
    public static $moduleAlias  = 'Log';
    
    const  prefix  = 'z';
    const  prefix_ = 'z_';
    
    public static $dependences = array(self::objectTable,self::userTable);
    public $dropped = array(self::logTable);
    public $dropLists = array('LE');
    
    public $fileUpdate = array('models/Object.php'=>array('OBJECT-LIST'=>array(
        Object::idLog          =>array( // 'oid' => 38,
            'chars'=>array('log', self::prefix, 'darthvader', ':log'),
            'label'=>array('Протокол изменений', 'Протокол', 'Изменения', 'изменения'),
            'have' => array('module'),
        ))));
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Протокол');
        
        /////////////////////////////// LOG
        $columns = array(
            self::prefix.'id'    => self::PK,
            self::prefix_.'type' => self::INT('Тип события list.LE'),
            'dt_event'           => self::DATETIME('Время события',false),
            self::prefix_.'name' => self::STR('Заголовок',255,false),
        );
        if (Log::USEIP)
            $columns[self::prefix_.'rawip'] = self::INT('IP-адрес',null);
        if ($withUser = $this->checkDependence(self::userTable))
            $columns[self::prefix_.'user'] = self::INT('Редактор',null);
        else
            echo "Подозрительно выглядит отсутствие таблицы Пользователей. Из-за этого в протокол не добавляем 'редактора записи'\n";
        $this->addColumnObject($columns,self::prefix_.'object_type',self::prefix_.'object_id');//,null);
        
        $this->createTable(self::logTable, $columns, $this->getOptions('Протокол'));
        $this->createIndex('IX_LOG_EVENT', self::logTable, 'dt_event');
        $this->addForeignObject(self::logTable);
        if ($withUser)
            $this->addForeignKey('FK_LOG_USER', self::logTable, self::prefix_.'user', self::userTable, 'uid', 'NO ACTION', 'CASCADE');

        // Log Event (z_type)
        $this->createList('LE',array(
            Log::LOG_INSERT => 'Добавлено',
            Log::LOG_UPADTE => 'Отредактировано',
            Log::LOG_DELETE => 'Удалено',
            Log::LOG_SHOW   => 'Показано',
            Log::LOG_HIDE   => 'Скрыто',
        ));
    }
}
