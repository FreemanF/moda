<?php

class m140904_000000_object_init extends KpdMigration
{
    public $fileUpdate = array(
        'models/Object.php'=>array(
            'OBJECT-LIST'=>array(
                Object::idIndex        =>array( // 'oid' => 100,
                    'chars'=>array('index', '', '', 'index'),
                    'label'=>array('Главная', 'Главная', 'Главная', ''),
                    'have' => array('module', 'sitemap'=>-1),
                ),
                Object::idFile         =>array( // 'oid' => 37,
                    'chars'=>array('file', '', 'filemanager', ':file'),
                    'label'=>array('Управление файлами', 'Файл', 'Файлы', 'файла'),
                    'have' => array('module','log'),
                ),
            ),
        ),
    );
    
}
