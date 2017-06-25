<?php

class m140715_195603_category_module extends KpdMigration
{
    public static $moduleObject = Object::idCategory;
    public static $moduleAlias  = 'Category';
    
    const  categoryTable = '{{category}}';
    const  prefix  = 'c';
    const  prefix_ = 'c_';
    
    public static $dependences = array(self::objectTable,self::metaTable);
    public $dropped = array(self::categoryTable);
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Каталог');
        
        $columns = array(
            self::prefix.'id'=> self::PK,
            self::prefix_.'pid'  => self::INT('Родительский',null),
            self::prefix_.'obj'  => self::INT('Тип объектов'),
            self::prefix_.'type' => self::INT('Тип категории',0),
            self::prefix_.'sort' => self::INT('Порядок отображения'),
            self::prefix_.'name' => self::STR('Наименование'),
            self::prefix_.'sef'  => self::STR('URL'),
            //self::prefix_.'meta' => self::INT('Мета-теги',null),
        );
        if ($withMeta = $this->checkDependence(self::metaTable))
            $columns[self::prefix_.'meta'] = self::INT('Мета-теги',null);
        else
            echo "Подозрительно выглядит отсутствие таблицы Мета-тегов. Из-за этого в Категориях не добавляем 'мета-теги'\n";
        
        $this->createTable(self::categoryTable, $columns, $this->getOptions('Рубрикатор объектов'));
        
        $this->createIndex('UQ_CATEGORY', self::categoryTable, /* self::prefix_.'obj, '. */ self::prefix_.'sef');
        $this->addForeignKey('FK_CATEGORY_PARENT', self::categoryTable, self::prefix_.'pid', 
                self::categoryTable, self::prefix.'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_CATEGORY_OBJ', self::categoryTable, self::prefix_.'obj', 
                self::objectTable, 'oid', 'NO ACTION', 'CASCADE');
        if ($withMeta)
            $this->addForeignKey('FK_CATEGORY_META', self::categoryTable, self::prefix_.'meta', 
                self::metaTable, 'eid', 'SET NULL', 'CASCADE');
    }
}
