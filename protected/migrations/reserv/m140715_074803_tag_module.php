<?php

class m140715_074803_tag_module extends KpdMigration
{
    public static $moduleObject = Object::idTag;
    public static $moduleAlias  = 'Tag';
    
    const  tagTable = '{{tag}}';
    const  prefix = 't';
    const  prefix_ = 't_';
    const  linkTable = '{{linkOT}}';
    public static $dependences = array(self::objectTable);
    public $dropped = array(self::linkTable,self::tagTable);
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Теги');
        
        /////////////////////////////// TAG
        $columns = array(
            self::prefix.'id'=> self::PK,
            self::prefix_.'name'    =>self::STR('Тег'),
            self::prefix_.'sef'     =>self::STR('URL'),
        );
        $this->createTable(self::tagTable, $columns, $this->getOptions('Теги'));
        $this->createIndex('IX_TAG_NAME',self::tagTable,'t_name',true);
        $this->createIndex('IX_TAG_SEF' ,self::tagTable,'t_sef',true);
        
        /////////////////////////////// LINKOT
        $columns = array(
            //'object_type'   => self::INT('Тип-объекта'),
            //'object_id'     => self::INT('ID-объекта'),
            'tag_id' => self::INT('Ссылка на тег'),
        );
        $this->addColumnObject($columns);
        $this->createTable(self::linkTable, $columns, $this->getOptions('Связь объектов с тегами'));
        $this->createIndex('IX_LINKOT', self::linkTable, 'object_type, object_id');
        $this->addForeignObject(self::linkTable);
        $this->addForeignKey('FK_LINKOI_TAG',self::linkTable, 'tag_id', self::tagTable, self::prefix.'id', 'CASCADE', 'CASCADE');
    }
}
