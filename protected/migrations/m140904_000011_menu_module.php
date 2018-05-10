<?php

class m140904_000011_menu_module extends KpdMigration
{
    public static $moduleObject = Object::idMenu;
    public static $moduleAlias  = 'Menu';
    
    const  pageTable = '{{page}}';
    const  menuTable = '{{menu}}';
    const  prefix  = 'm';
    const  prefix_ = 'm_';
    public static $dependences = array(self::pageTable);
    public $dropped = array(self::menuTable);
    
    public $fileUpdate = array('models/Object.php'=>array('OBJECT-LIST'=>array(
        Object::idMenu         =>array( // 'oid' => 4,
            'chars'=>array('menu', self::prefix, 'list', 'menu'),
            'label'=>array('Меню', 'Меню', 'Меню', 'меню'),
            'have' => array('module','log'),
        ))));
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Меню');
        
        $columns = array(
            self::prefix.'id'    => self::PK,
            self::prefix_.'pid'  => self::INT('Родительский пункт',null),
            self::prefix_.'sort' => self::INT('Сортировка',0),
            self::prefix_.'level'=> self::INT('Глубина вложенности',0),
            self::prefix_.'name' => self::STR('Наименование'),
            self::prefix_.'sef'  => self::STR('URL'),
            'dt_start' => self::DATETIME('Дата публикации'),
        );
        if ($withPage = $this->checkDependence(self::pageTable))
            $columns['m_page_id'] = self::INT('Страница', null);
                
        $this->createTable(self::menuTable, $columns, $this->getOptions('Меню'));
        
        $this->createIndex('IX_MENU_SORT', self::menuTable, 'm_pid,m_sort');
        $this->createIndex('IX_MENU_SEF' , self::menuTable, 'm_pid,m_sef' );
        $this->addForeignKey('FK_PARENT_MENU', self::menuTable, 'm_pid', self::menuTable, 'mid', 'CASCADE', 'CASCADE');
        if ($withPage)
            $this->addForeignKey('FK_MENU_PAGE', self::menuTable, 'm_page_id', self::pageTable, 'pid', 'SET NULL', 'CASCADE');
    }
}
