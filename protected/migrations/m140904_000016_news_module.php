<?php

class m140904_000016_news_module extends KpdMigration
{
    public static $moduleObject = Object::idNews;
    public static $moduleAlias  = 'News';
    
    const  newsTable = '{{news}}';
    const  prefix  = 'n';
    const  prefix_ = 'n_';
    
    const  pageTable = '{{page}}';
    const  prefix2  = 'p';
    const  prefix2_ = 'p_';
    public static $dependences = array(self::metaTable,self::mediaTable);
    public $dropped = array(self::newsTable);
 
    public $fileUpdate = array('models/Object.php'=>array('OBJECT-LIST'=>array(
        Object::idNews  =>array( // 'oid' => 1,
            'chars'=>array('news', self::prefix, 'news', 'news'),
            'label'=>array('Новости', 'Новость', 'Новости', 'новости'),
            'have' => array('module','log','sitemap'=>2),
        ))));
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Новости');
        
        $columns = array(
            self::prefix.'id'        => self::PK,
            self::prefix_.'meta'     => self::INT('meta-тэги', NULL),
            self::prefix_.'name'     => self::STR('Заголовок'),
            self::prefix_.'sef'      => self::STR('URL'),
            self::prefix_.'media_id' => self::INT('Картинка', NULL),
            'dt_start'               => self::DATETIME('Дата публикации'),
        );
        
        $this->addColumnContent($columns);
        $this->createTable(self::newsTable, $columns, $this->getOptions('Новости'));
        $this->createIndex('IX_NEWS_PUB', self::newsTable, 'dt_start');
        $this->createIndex('IX_NEWS_SEF', self::newsTable, self::prefix_.'sef', true);
        $this->addForeignKey('FK_NEWS_META' , self::newsTable, self::prefix_.'meta'    , self::metaTable , 'eid', 'SET NULL' , 'CASCADE'); 
        $this->addForeignKey('FK_NEWS_MEDIA', self::newsTable, self::prefix_.'media_id', self::mediaTable, 'iid', 'SET NULL' , 'CASCADE');
        
        $this->insert(self::pageTable, array(
            self::prefix2_.'dir'  => 1,
            self::prefix2_.'sort' => 1,
            self::prefix2_.'name' => 'Новости',
            self::prefix2_.'sef'  => 'news',
            'content_long' => '',
            'is_published' => true,
            'can_delete'   => 'PageDeleter',
        ));
    }
    
    public function safeDown()
    {
        $this->delete(self::pageTable , self::prefix2_.'sef="news"');
        $this->delete(self::mediaTable, 'i_path='.Object::idNews);
        parent::safeDown();
    }
}
