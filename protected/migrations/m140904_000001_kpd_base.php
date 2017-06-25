<?php

class m140904_000001_kpd_base extends KpdMigration {

    public $dropped = array(
        self::objectTable,
        self::listTable,
        );
    public $dropLists = array('ED');
    
    public function safeUp() {
        
        /////////////////////////////// OBJECT
        $this->createTable(self::objectTable, array(
            'oid'=> self::PK,
        ), $this->getOptions('Типы объектов'));
        
        // Editor
        $this->createList('ED',array(
            1=>'TinyMCE',
            2=>'Markdown',
            //3=>'elRTE',
        ));

    }
}
