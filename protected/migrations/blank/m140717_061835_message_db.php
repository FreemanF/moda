<?php

class m140717_061835_message_db extends KpdMigration
{
    public static $moduleObject = Object::idUser;
    public static $moduleAlias  = 'User';
    
    const  nameTable = '{{table}}';
    const  prefix  = 'tb';
    const  prefix_ = 'tb_';
    //public static $dependences = array(self::objectTable,self::mediaTable);
    public $dropped = array(self::nameTable);
    //public $dropLists = array('AI');
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Пользователи');
        
        $columns = array(
            self::prefix.'id'=> self::PK,
            self::prefix_.'sort' => self::INT('Порядок'),
            self::prefix_.'name' => self::STR('Наименование'),
            self::prefix_.'sef'  => self::STR('URL'),
            'dt_start' => self::DATETIME('Дата публикации'),
            'is_published' => self::BOOLEAN('Публиковать',false),
        );
        
// http://stackoverflow.com/questions/2497118/yii-multi-language-website-best-practices?rq=1
        
//TABLE Message            // stores source language, updated by script
// id INT UNSIGNED
// category VARCHAR(20)         // first argument to Yii::t()
// key TEXT                     // second argument to Yii::t()
// occurences TINYINT UNSIGNED  // number of times found in sources
//
//TABLE MessageTranslation // stores target language, translated by human  
// id INT UNSIGNED
// language VARCHAR(3)          // ISO 639-1 or 639-3, as used by Yii
// messageId INT UNSIGNED       // foreign key on Message table
// value TEXT
// version VARCHAR(15)
// creationTime TIMESTAMP DEFAULT NOW()
// lastModifiedTime TIMESTAMP DEFAULT NULL
// lastModifiedUserId INT UNSIGNED
        //if ($withUser = $this->checkDependence(self::userTable))
        //    $columns[self::prefix_.'user'] = self::INT('Владелец');
        //else
        //    echo "Подозрительно выглядит отсутствие таблицы Пользователей. Из-за этого в shortcutBar не добавляем 'владельца'\n";
        //$this->addColumnObject($columns);
        //$this->addColumnContent($columns,true);
        
        $this->createTable(self::nameTable, $columns, $this->getOptions('Название таблицы'));
        
        //$this->createIndex('IXSELECT', self::nameTable, 'object_type, object_id, type, media_id');
        //$this->addForeignObject(self::nameTable);
        if ($withUser)
            $this->addForeignKey('FK_SHORTCUT_USER', self::nameTable, self::prefix_.'user', self::userTable, 'uid', 'CASCADE', 'CASCADE');
        //$this->addForeignKey('FK_name_OBJ',  self::nameTable, 'object_type', self::objectTable, 'oid', 'NO ACTION', 'CASCADE');
        //$this->addForeignKey('FK_name_MEDIA',self::nameTable, 'u_media_id', self::mediaTable, 'iid', 'SET NULL', 'CASCADE');

        // AuthItem
        //$this->createList('AI',array(
        //    0 => 'Операция',
        //    1 => 'Задача',
        //    2 => 'Роль',
        //));
        
    }

//    public function safeDown()
//    {
//        // $this->deleteKpdModule('User', Object::idUser);
//        // $this->delete(self::listTable,'ltype="AI"');
//        // $this->dropTable(self::nameTable);
//        parent::safeDown();
//    }
    
}
