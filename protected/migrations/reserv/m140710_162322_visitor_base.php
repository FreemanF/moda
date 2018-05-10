<?php

class m140710_162322_visitor_base extends KpdMigration
{
    const  visitorTable = '{{visitor}}';
    const  trackTable = '{{trackip}}';
    public $dropped = array(self::trackTable,self::visitorTable);
    
    public function safeUp()
    {
        parent::safeUp();

        $columns = array(
            'id' => self::PK,
            'ip' => self::STR('IP-адрес',40), // IPv6
        );
        $this->createTable(self::visitorTable, $columns, $this->getOptions('Посетители сайта'));
        $this->createIndex('IX_IP', self::visitorTable, 'ip');
        
        $columns = array(
            'task' => self::INT('Тип задачи'),
            'tid'  => self::INT('Id-задачи' ),
            'vid'  => self::INT('Посетитель'),
            'tm'   => self::DATETIME('Время последнего решения',false),
        );
        $this->createTable(self::trackTable, $columns, $this->getOptions('Действия посетителей'));
        $this->createIndex('IX_TRACK', self::trackTable, 'task, tid, vid');
    }
}
