<?php

class m140904_000012_miniGallery_module extends KpdMigration
{
    public static $moduleObject = Object::idMiniGallery;
    public static $moduleAlias  = 'MiniGallery';
    
    const  minigalleryTable = '{{miniGallery}}';
    const  prefix  = 'mg';
    const  prefix_ = 'mg_';
    public static $dependences = array(self::objectTable, self::mediaTable);
    public $dropped = array(self::minigalleryTable);
    
    public $fileUpdate = array('models/Object.php'=>array('OBJECT-LIST'=>array(
        Object::idMiniGallery  =>array( // 'oid' => 50,
            'chars'=>array('miniGallery', self::prefix, 'images', 'minigallery'),
            'label'=>array('Мини галереи', 'Мини галерея', 'Мини галереи', 'мини галереи'),
            'have' => array('module','log'),
        ))));
    
    public function safeUp()
    {
        parent::safeUp();
        
        $this->createKpdModule('Мини галереи');
        
        $this->createTable(self::minigalleryTable, array(
            self::prefix.'id'=> self::PK,
            self::prefix_.'name' => self::STR('Наименование'),
            'is_published' => self::BOOLEAN('Публиковать',false),
        ), $this->getOptions('Мини галереи'));
    }
    
    public function safeDown()
    {
        $this->delete(self::mediaTable, 'i_path='.Object::idMiniGallery);
        parent::safeDown();
    }
}
