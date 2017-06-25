<?php

class m140715_185456_reclame_module extends KpdMigration
{
    public static $moduleObject = Object::idReclame;
    public static $moduleAlias  = 'Reclame';
    
    const  reclameTable = '{{reclame}}';
    const  prefix1  = 'rc';
    const  prefix1_ = 'rc_';
    
    const  placeTable = '{{place}}';
    const  prefix2  = 'pl';
    const  prefix2_ = 'pl_';
    
    public static $dependences = array(self::objectTable);
    public $dropped = array(self::placeTable,self::reclameTable);
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Реклама');
        
        $columns = array(
            self::prefix1.'id'=> self::PK,
            self::prefix1_.'name' => self::STR('Наименование'),
            self::prefix1_.'head' => self::STR('JS в заголовке'),
            self::prefix1_.'body' => self::STR('JS в теле страницы'),
            'is_published' => self::BOOLEAN('Публиковать'),
        );
        $this->createTable(self::reclameTable, $columns, $this->getOptions('Рекламные блоки'));
        $this->createIndex('IX_RECLAME', self::reclameTable, self::prefix1_.'name');

        $columns = array(
            self::prefix2.'id'=> self::PK,
            'reclame_id'      => self::INT('ID-рекламы'),
            self::prefix2_.'sort'    => self::INT('Порядок параметра'),
            self::prefix2_.'priority'=> self::INT('Приоритет показа',4),
            'dt_start' => self::DATETIME('Начало показа',null),
            'dt_final' => self::DATETIME('Окончание показа',null),
            
            self::prefix2_.'pattern'    => self::STR('Шаблон'),
            self::prefix2_.'controller' => self::INT('ID-контроллера',null),
            self::prefix2_.'action'     => self::STR('Экшн'),
            self::prefix2_.'model'      => self::INT('ID-модели',null),
            
            self::prefix2_.'group' => self::STR('Группа мест',60),
            
            self::prefix2_.'ptype' => self::BOOLEAN('Проверять шаблон'),
            self::prefix2_.'ctype' => self::BOOLEAN('Проверять контроллер'),
            self::prefix2_.'atype' => self::BOOLEAN('Проверять экшн'),
            self::prefix2_.'mtype' => self::BOOLEAN('Проверять модель'),
            
            'pl_exclusive' => self::INT('Показывать эксклюзивно',0),
            'is_published' => self::BOOLEAN('Публиковать'),
        );
        $this->createTable(self::placeTable, $columns, $this->getOptions('Место для рекламы'));
        $this->createIndex('IX_PLACE', self::placeTable, 'reclame_id, '.self::prefix2_.'sort');
        $this->addForeignKey('FK_PLACE_RECLAME', self::placeTable, 'reclame_id', self::reclameTable, self::prefix1.'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_PLACE_OBJ', self::placeTable, self::prefix2_.'controller', self::objectTable, 'oid', 'CASCADE', 'CASCADE');
    }
}
