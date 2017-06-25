<?php

class m140904_000002_meta_base extends KpdMigration
{
    const  metaTable = '{{meta}}';
    const  prefix  = 'e';
    const  prefix_ = 'e_';
    public $dropped = array(self::metaTable);
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createTable(self::metaTable, array(
            self::prefix.'id'=> self::PK,
            self::prefix_.'title' => self::STR('Заголовок'),
            self::prefix_.'keywords' => self::STR('Ключевые слова'),
            self::prefix_.'description' => self::TEXT('Описание'),
        ), $this->getOptions('META & OG'));
    }
}
