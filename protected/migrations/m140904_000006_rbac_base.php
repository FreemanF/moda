<?php

class m140904_000006_rbac_base extends KpdMigration
{
    public static $dependences = array(self::userTable); // устанавливаем связь FOREIGN KEY
    public $dropped = array(
        self::assignmentTable,
        self::itemChildTable,
        self::itemTable,
        );
    public $dropLists = array('AI');
    public $checkConstraints = false; // чтобы не возникло сложностей при удалении 
    
    public function safeUp()
    {
        parent::safeUp();
        $this->restoreConstraints(); // Включаем проверки
        
        /////////////////////////////// AUTHITEM
        $columns = array(
           'name'        => self::STR('Наименование', 64),//.' PRIMARY KEY',
           'type'        => self::INT('Вид объекта'),
           'description' => self::TEXT('Описание',false,true),
           'bizrule'     => self::TEXT('Бизнес-правило',false,true),
           'data'        => self::TEXT('Дополнительные данные',false,true),
        );
        $this->createTable(self::itemTable, $columns, $this->getOptions('Объекты авторизации'));
        $this->addPrimaryKey('PK_AUTHITEM', self::itemTable, 'name');

        /////////////////////////////// AUTHITEMCHILD
        $columns = array(
           'parent' => self::STR('Родительский объект',64,false), // NOT NULL
           'child'  => self::STR('Дочерний объект',64,false),     // NOT NULL
        );
        $this->createTable(self::itemChildTable, $columns, $this->getOptions('Иерархия объектов авторизации'));
        $this->addPrimaryKey('PK_AUTHITEMCHILD', self::itemChildTable, 'parent,child');
        $this->addForeignKey('FK_AUTH_PARENT', self::itemChildTable, 'parent', self::itemTable, 'name', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_AUTH_CHILD' , self::itemChildTable, 'child' , self::itemTable, 'name', 'CASCADE', 'CASCADE');

        /////////////////////////////// AUTHASSIGNMENT
        $columns = array(
           'itemname' => self::STR('Роль',64,false),
           'userid'   => self::STR('Пользователь',64,false),
           'bizrule'  => self::TEXT('Бизнес-правило',false,true),
           'data'     => self::TEXT('Дополнительные данные',false,true),
        );
        $this->refreshTableSchemas();
        if ($linkToUser = $this->checkDependence(self::userTable))
            $columns['userid'] = self::INT('Пользователь');
        
        $this->createTable(self::assignmentTable, $columns, $this->getOptions('Предоставленные роли'));
        $this->addPrimaryKey('PK_AUTHASSIGNMENT', self::assignmentTable, 'itemname,userid');
        $this->addForeignKey('FK_AUTH_ROLE', self::assignmentTable, 'itemname', self::itemTable, 'name', 'CASCADE', 'CASCADE');
        if ($linkToUser)
            $this->addForeignKey('FK_AUTH_USER', self::assignmentTable, 'userid'  , self::userTable, 'uid', 'CASCADE', 'CASCADE');

        // AuthItem
        $this->createList('AI',array(
            self::AUTH_OPER => 'Операция',
            self::AUTH_TASK => 'Задача',
            self::AUTH_ROLE => 'Роль',
        ));
        
        $this->addAuthItem('Modules', self::AUTH_TASK, 'Все модули');
    }
    
    public function safeDown()
    {
        $this->delete(self::itemTable,'name="Modules"');
        parent::safeDown();
    }
}
