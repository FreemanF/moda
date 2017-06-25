<?php

class m140904_000013_page_inflater extends KpdMigration
{
    const  folderTable = '{{folder}}';
    const  prefix1  = 'f';
    const  prefix1_ = 'f_';
    
    const  pageTable = '{{page}}';
    const  prefix2_ = 'p_';
    
    public function safeUp()
    {
        //////////////////////////////////////////// FOLDER
        $this->insert(self::folderTable, array(
            self::prefix1.'id'    => 1,
            self::prefix1_.'sort' => 1,
            self::prefix1_.'name' => 'system',
            'can_delete' => 'PageDeleter',
        ));
        
        //////////////////////////////////////////// PAGE
        $this->insert(self::pageTable, array(
            self::prefix2_.'dir'  => 1,
            self::prefix2_.'sort' => 1,
            self::prefix2_.'name' => 'Главная',
            self::prefix2_.'sef'  => 'index',
            'content_long' => '',
            'is_published' => true,
            'can_delete'   => 'PageDeleter',
        ));
    }

    public function safeDown()
    {
        $this->delete(self::pageTable  , self::prefix2_.'sef="index"');
        $this->delete(self::folderTable, self::prefix1.'id in (1)'   );
    }
    
}
