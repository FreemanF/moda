<?php

class m140904_000014_menu_inflater extends KpdMigration
{
    const  menuTable = '{{menu}}';
    const  prefix  = 'm';
    const  prefix_ = 'm_';
    
    public function insertMenu($id, $pid, $sort, $level, $name, $sef='', $page_id=null) {
        $this->insert(self::menuTable, array(
            self::prefix.'id'       => $id,
            self::prefix_.'pid'     => $pid,
            self::prefix_.'sort'    => $sort,
            self::prefix_.'level'   => $level,
            self::prefix_.'name'    => $name,
            self::prefix_.'sef'     => $sef,
            self::prefix_.'page_id' => $page_id,
        ));
    }
    
    public function safeUp()
    {
        //////////////////////////////////////////// MENU
        
        $this->insertMenu(1,NULL, 0, 1, 'Главное меню');
//        $this->insertMenu(2,  1 , 0, 0, 'Меню1' , '', 1);
//        $this->insertMenu(3,  1 , 1, 0, 'Меню2');
//        $this->insertMenu(4,  1 , 2, 0, 'Меню3' , '/anylink');
//        $this->insertMenu(5,NULL, 0, 2, 'Двухуровневое меню');
//        $this->insertMenu(6,NULL, 0,-1, 'Многоуровневое меню');
        
    }

    public function safeDown()
    {
        $this->delete(self::menuTable,self::prefix.'id between 1 and 1');
    }
    
}
