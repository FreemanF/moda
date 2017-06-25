<?php

class m140904_000004_user_base extends KpdMigration
{
    public $fileUpdate = array('models/Object.php'=>array('OBJECT-LIST'=>array(
        Object::idUser         =>array( // 'oid' => 3,
            'chars'=>array('user', 'u', 'phonebook', 'user'),
            'label'=>array('Пользователи', 'Пользователь', 'Пользователи', 'пользователя'),
            'have' => array('module','log'),
        ))));
    
    const  logTable = '{{log}}';

    public static $dependences = array();
    
    public $dropped = array(self::userTable);
    
    public function safeUp()
    {
        parent::safeUp();
        /////////////////////////////// USER
        $columns = array(
            'uid'=> self::PK,
            'email'     =>self::STR('E-mail',100,false),
            'username'  =>self::STR('Логин',100,false),
            'password'  =>self::STR('Пароль',32,false),
            'fullname'  =>self::STR('ФИО'),
            'u_sef'     =>self::STR('URL(ФИО)'),
            'updatetime'=>self::TIMESTAMP,
            'status'    =>self::BOOLEAN('Статус'),
            'activationKey'=>self::STR('',32),
        );
        
        $this->createTable(self::userTable, $columns, $this->getOptions('Пользователи'));
 
        $this->insert(self::userTable, array(
            'uid'        => 1,
            'username'   => 'admin',
            'password'   => md5(md5('admin')),
            'u_sef'      => '',
            'email'      => 'noreply@gmail.com',
            'fullname'   => '',
            'status'     => true,
        ));
        
        // Если таблица протокола создаётся позже пользователей, то код ниже переносим в ту миграцию
        //if ($this->tableExists(self::logTable))
        //    $this->addForeignKey('FK_LOG_USER', self::logTable, 'z_user', self::userTable, 'uid', 'NO ACTION', 'CASCADE');
        
        //  UNIQUE 'email' ('email'),
        //  'createtime' timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        
    }

    public function safeDown()
    {
        if ($this->tableExists(self::logTable))
            $this->dropForeignKey ('FK_LOG_USER', self::logTable);
        
        parent::safeDown();
    }
    
}
