<?php

class m140715_201849_news_module extends KpdMigration
{
    public static $moduleObject = Object::idNews;
    public static $moduleAlias  = 'News';
    
    const  newsTable = '{{news}}';
    const  prefix  = 'n';
    const  prefix_ = 'n_';
    
    const  categoryTable = '{{category}}';
    
    public static $dependences = array(self::mediaTable,self::metaTable);//,self::categoryTable);
    public $dropped = array(self::newsTable);
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Новости');
        
        $columns = array(
            self::prefix.'id'=> self::PK,
            self::prefix_.'name' => self::STR('Заголовок'),
            self::prefix_.'sef'  => self::STR('URL'),
            'dt_start' => self::DATETIME('Дата публикации'),
            self::prefix_.'kind' => self::INT('Рубрика'),
            'is_published' => self::BOOLEAN('Публиковать',false),
        );
        $this->addColumnContent($columns,true);
        
        if ($withCategory = $this->checkDependence(self::categoryTable))
            $columns[self::prefix_.'category'] = self::INT('Рубрика');
        
        if ($withMedia = $this->checkDependence(self::mediaTable))
            $columns[self::prefix_.'media_id'] = self::INT('Аватарка',null);
        else echo "Подозрительно выглядит отсутствие таблицы Media. Из-за этого в Новостях не будет картинки.\n";
        
        if ($withMeta = $this->checkDependence(self::metaTable))
            $columns[self::prefix_.'meta'] = self::INT('Мета-теги',null);
        else echo "Подозрительно выглядит отсутствие таблицы Мета-тегов. Из-за этого в Новости не добавляем 'мета-теги'\n";
        
        $this->createTable(self::newsTable, $columns, $this->getOptions('Новости'));
        $this->createIndex('UQ_NEWS', self::newsTable, self::prefix_.'sef');
        
        if ($withCategory)
            $this->addForeignKey('FK_NEWS_CATEGORY',self::newsTable, self::prefix_.'category', 
                self::categoryTable, 'cid', 'NO ACTION', 'CASCADE');
        
        if ($withMedia)
            $this->addForeignKey('FK_NEWS_MEDIA',self::newsTable, self::prefix_.'media_id', 
                self::mediaTable, 'iid', 'SET NULL', 'CASCADE');
        
        if ($withMeta)
            $this->addForeignKey('FK_NEWS_META', self::newsTable, self::prefix_.'meta', 
                self::metaTable, 'eid', 'SET NULL', 'CASCADE');
    }
}
