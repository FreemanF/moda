<?php

class m140904_000010_page_module extends KpdMigration
{
    public static $moduleObject = Object::idPage;
    public static $moduleAlias  = 'Page';
    
    const  folderTable = '{{folder}}';
    const  prefix1  = 'f';
    const  prefix1_ = 'f_';
    
    const  pageTable = '{{page}}';
    const  prefix2  = 'p';
    const  prefix2_ = 'p_';
    
    public $dropped = array(
               self::pageTable,
               self::folderTable
           );
    
    public $fileUpdate = array('models/Object.php'=>array('OBJECT-LIST'=>array(
        Object::idFolder       =>array( // 'oid' => 26,
            'chars'=>array('folder', self::prefix1, '', 'folder'),
            'label'=>array('', 'Папка', 'Папки', 'папки'),
            'have' => array('module'),
        ),
        Object::idPage         =>array( // 'oid' => 5,
            'chars'=>array('page', self::prefix2, 'foldertree', 'page'),
            'label'=>array('Редактор страниц', 'Страница', 'Страницы', 'страницы'),
            'have' => array('module','log','sitemap'),
        ))));
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Управление страницами');
        
        $this->addAuthItem('PageDeleter', self::AUTH_TASK, 'Удаление страниц');
        
        $columns = array(
            self::prefix1.'id'=> self::PK,
            self::prefix1_.'pid'  => self::INT('Родительский каталог',null),
            self::prefix1_.'sort' => self::INT('Сортировка',0),
            self::prefix1_.'name' => self::STR('Каталог'),
            'can_delete'   => self::STR('Кто может удалять',64,null),
            'is_delete'    => self::TINY('Удалённая запись',0),
        );
        $this->insert(self::objectTable, array('oid'=>Object::idFolder));
        $this->createTable(self::folderTable, $columns, $this->getOptions('Структура страниц'));
        $this->addForeignKey('FK_PARENT_FOLDER', self::folderTable, self::prefix1_.'pid', self::folderTable, self::prefix1.'id', 'CASCADE', 'CASCADE');
        
        $columns = array(
            self::prefix2.'id'=> self::PK,
            self::prefix2_.'dir'  => self::INT('Положение в структуре страниц',null),
            self::prefix2_.'sort' => self::INT('Сортировка',0),
            self::prefix2_.'meta' => self::INT('Мета-теги',null),
            self::prefix2_.'lang' => self::STR('Язык страницы',2,'RU'),
            self::prefix2_.'name' => self::STR('Наименование'),
            self::prefix2_.'sef'  => self::STR('URL'),
            'dt_start' => self::DATETIME('Начало публикации'),
            'is_published' => self::BOOLEAN('Опубликована ли запись'),
            'can_delete'   => self::STR('Кто может удалять',64,null),
            'is_delete'    => self::TINY('Удалённая запись',0),
            'noindex'      => self::TINY('Не индексировать',0),
            'nofollow'     => self::TINY('Не учитывать ссылки',0),
        );
        $this->addColumnContent($columns);
        $this->createTable(self::pageTable, $columns, $this->getOptions('Страницы'));
        $this->createIndex('IX_PAGE_SORT', self::pageTable, self::prefix2_.'dir, '.self::prefix2_.'sort');
        $this->addForeignKey('FK_PAGE_FOLDER', self::pageTable, self::prefix2_.'dir', self::folderTable, self::prefix1.'id', 'SET NULL' /*CASCADE*/, 'CASCADE');
    }
    
    public function safeDown()
    {
        $this->delete(self::itemTable,'name="PageDeleter"');
        parent::safeDown();
        $this->delete(self::objectTable, 'oid='.Object::idFolder);
    }
}
