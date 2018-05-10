<?php

class {ClassName} extends KpdMigration
{
    public static $moduleObject = Object::idUser;
    public static $moduleAlias  = 'User';
    
    const  nameTable = '{{table}}';
    const  prefix  = 'tb';
    const  prefix_ = 'tb_';
    //public static $dependences = array(self::objectTable,self::mediaTable);
    public $dropped = array(self::nameTable);
    //public $dropLists = array('AI');
//    public $fileUpdate = array('models/Object.php'=>array('OBJECT-LIST'=>array(
//        Object::idUser         =>array( // 'oid' => 3,
//            'chars'=>array('user', self::prefix, 'phonebook', 'user'),
//            'label'=>array('Пользователи', 'Пользователь', 'Пользователи', 'пользователя'),
//            'have' => array('module','log','category'),
//        ))));
//        
//    public $fileUpdate = array(
//        '../themes/main/packages.php'=>array(
//            'APPEND-PACKAGE'=><<<FANCYBOX
//    'miniGallery2' => array(
//        'basePath' => 'webroot.themes.main.assets',
//        'css' => array('css/minigallery.css'),
//        'js'  => array('js/miniGallery.js'),
//        'depends'=>array('fancyBox'),
//    ),
//
//FANCYBOX
//        'models/Object.php'=>array(
//            'OBJECT-LIST'=>array(
//                Object::idMenu => array(
//                    'chars'=>array('alias', self::prefix, 'icon', 'o_sef==alias'),
//                    'label'=>array('Module','Singular','Plural','genitive'),
//                    'have' => array('log','module'),
//                ),
//            ),
//        ),
//    );
    
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
