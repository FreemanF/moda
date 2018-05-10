<?php

class m140715_192717_field_module extends KpdMigration
{
    public static $moduleObject = Object::idField;
    public static $moduleAlias  = 'Field';
    
    const  fieldTable = '{{field}}';
    const  prefix  = 'fl';
    const  prefix_ = 'fl_';
    
    const  linkTable = '{{linkOF}}';
    const  valueTable = '{{value}}';
    
    public static $dependences = array(self::objectTable);
    public $dropped = array(self::valueTable,self::linkTable,self::fieldTable,);
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Атрибуты');
        
        /////////////////////////////// FIELD
        $columns = array(
            self::prefix.'id'=> self::PK,
            self::prefix_.'sort' => self::INT('Порядок'),
            self::prefix_.'name' => self::STR('Атрибут'),
            self::prefix_.'type' => self::INT('Тип атрибута',1),
            self::prefix_.'view' => self::INT('Способ отображения',1),
            self::prefix_.'description' => self::STR('Описание'),
        );
        $this->addColumnObject($columns,'object_type','object_id',null);
        $this->createTable(self::fieldTable, $columns, $this->getOptions('Атрибуты'));
        $this->createIndex('UQ_FIELD', self::fieldTable, self::prefix_.'name');
        $this->createIndex('IX_FIELD', self::fieldTable, 'object_type, object_id, '.self::prefix_.'sort');
        $this->addForeignObject(self::fieldTable);

        /////////////////////////////// LINKOI
        $columns = array(
            //'object_type'   => self::INT('Тип-объекта'),
            //'object_id'     => self::INT('ID-объекта'),
            'sort'          => self::INT('Порядок'),
            'field_id'      => self::INT('Ссылка на атрибут'),
        );
        $this->addColumnObject($columns);
        $this->createTable(self::linkTable, $columns, $this->getOptions('Привязка атрибутов к категориям'));
        $this->createIndex('IX_LINKOF', self::linkTable, 'object_type, object_id, sort');
        $this->addForeignObject(self::linkTable);
        $this->addForeignKey('FK_LINKOF_FIELD',self::linkTable, 'field_id', self::fieldTable, self::prefix.'id', 'CASCADE', 'CASCADE');
        
        /////////////////////////////// VALUE

        $columns = array(
            //'object_type'   => self::INT('Тип-объекта'),
            //'object_id'     => self::INT('ID-объекта'),
            'field_id'      => self::INT('ID-атрибута'),
            'field_value'   => self::INT('Значение'),
        );
        $this->addColumnObject($columns);
        $this->createTable(self::valueTable, $columns, $this->getOptions('Значения атрибутов'));
        $this->addPrimaryKey('PK_VALUE', self::valueTable, 'object_type, object_id, field_id, field_value');
        $this->addForeignObject(self::valueTable);
        $this->addForeignKey('FK_VALUE_FIELD',self::valueTable, 'field_id', self::fieldTable, self::prefix.'id', 'CASCADE', 'CASCADE');
        
    }
}
