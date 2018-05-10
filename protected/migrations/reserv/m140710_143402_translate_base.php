<?php

class m140710_143402_translate_base extends KpdMigration
{
    public static $dependences = array(self::objectTable);
    
    public $dropped = array(self::translateTable);
    
    public function safeUp()
    {
        if (!self::translateTable) return ;
        parent::safeUp();
        
        $columns = array(
            'id'=> self::PK,
            //'object_type' => self::INT('Тип объекта'),
            //'object_id'   => self::INT('ID-объекта', null),
            'lang' => self::STR('Язык',6,false),
            'name' => self::STR('Название атрибута',255,false),
            'value'=> self::TEXT('Значение атрибута'),
        );
        $this->addColumnObject($columns);
        
        $this->createTable(self::translateTable, $columns, $this->getOptions('Перевод'));
        $this->createIndex('UQ_TRANSLATE', self::translateTable, 'object_type, object_id, lang, name', true);
        $this->addForeignObject(self::translateTable);
    }
}
