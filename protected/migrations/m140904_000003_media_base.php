<?php

class m140904_000003_media_base extends KpdMigration
{
    const  prefix = 'i';
    const  prefix_ = 'i_';
    const  linkTable = '{{linkOI}}';
    public static $dependences = array(self::objectTable);
    public $dropped = array(self::linkTable,self::mediaTable);
    public $dropLists = array('MT');
    
    public function safeUp()
    {
        parent::safeUp();
        
        /////////////////////////////// MEDIA
        $columns = array(
            self::prefix.'id'         => self::PK,
            self::prefix_.'type'      => self::INT('Тип media информации',Media::typeIMAGE),
            self::prefix_.'name'      => self::STR('TAG - title'),
            self::prefix_.'alt'       => self::STR('TAG - alt'),
            self::prefix_.'original'  => self::STR('Имя файла'),
            self::prefix_.'source'    => self::STR('Источник картинки'),
            self::prefix_.'info'      => self::STR('Дополнительная информация'),
            self::prefix_.'crop'      => self::STR('Параметры'),
            self::prefix_.'watermark' => self::BOOLEAN('Watermark',false),
        );
        $this->addColumnObject($columns,self::prefix_.'path',self::prefix_.'oid');
        $this->createTable(self::mediaTable, $columns, $this->getOptions('Картинки'));
        $this->addForeignObject(self::mediaTable);
        
        // Media Type (i_type)
        $this->createList('MT',array(
            Media::typeIMAGE   => 'Фото',
            Media::typeVIDEO   => 'Видео',
            Media::typeLINK    => 'Ссылка',
            Media::typeYOUTUBE => 'YouTube',
            Media::typeFILE    => 'Файл',
        ));
        
        /////////////////////////////// LINKOI
        $columns = array(
            'media_id' => self::INT('Ссылка на медиа-ресурс'),
            'type'     => self::INT('1- Главная'),
            'sort'     => self::INT('Порядок'),
        );
        $this->addColumnObject($columns);
        $this->createTable(self::linkTable, $columns, $this->getOptions('Связь объекта с медиа-информацией'));
        $this->createIndex('IX_LINKOI', self::linkTable, 'object_type, object_id, type, media_id');
        $this->addForeignObject(self::linkTable);
        $this->addForeignKey('FK_LINKOI_MEDIA',self::linkTable, 'media_id', self::mediaTable, self::prefix.'id', 'CASCADE', 'CASCADE');
    }
}

    
