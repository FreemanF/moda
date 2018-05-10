<?php

class m140904_000007_setting_module extends KpdMigration
{
    // Создаём первый модуль KPD
    public static $moduleObject = Object::idSetting;
    public static $moduleAlias  = 'Setting';
    
    const settingTable = '{{setting}}';
    const prefix  = 's';
    const prefix_ = 's_';
    
    public $dropped = array(self::settingTable);
    public $dropLists = array('ST','SC');
    
    public $fileUpdate = array('models/Object.php'=>array('OBJECT-LIST'=>array(
        Object::idSetting      =>array( // 'oid' => 7,
            'chars'=>array('setting', self::prefix, 'settings4', 'setting'),
            'label'=>array('Настройки', 'Параметр', 'Параметры', 'параметра'),
            'have' => array('module','log'),
        ))));
    
    public function safeUp()
    {
        
        parent::safeUp();
        
        $this->createKpdModule('Настройки');
        
        $this->addAuthItem('SettingAccess1', self::AUTH_TASK, 'Доступ к настройкам 1-го уровня');
        $this->addAuthItem('SettingAccessEMAIL', self::AUTH_TASK, 'Доступ к настройкам EMail');

        /////////////////////////////// SETTING
        $this->createTable(self::settingTable, array(
            self::prefix.'id'           => self::PK,
            self::prefix_.'type'        => self::TINY('Тип поля',Setting::TYPE_STRING),
            self::prefix_.'category'    => self::TINY('Категория',Setting::CATEGORY_OTHER),
            self::prefix_.'sort'        => self::INT('Порядок'),
            self::prefix_.'access'      => self::INT('Уровень доступа',0), // По умолчанию: для всех
            self::prefix_.'cache'       => self::BOOLEAN('Кешировать'),
            self::prefix_.'name'        => self::STR('Название',80),
            self::prefix_.'value'       => self::TEXT('Значение'),
            self::prefix_.'description' => self::STR('Описание',255,false),
        ), $this->getOptions('Настройки'));
        
        $this->createIndex('UQ_SETTING', self::settingTable, self::prefix_.'name', true);
        
        // Setting Type (s_type)
        $this->createList('ST',array(
            Setting::TYPE_STRING=>'Строка',
            Setting::TYPE_TEXT  =>'Текст',
            Setting::TYPE_LIST  =>'Список',
            Setting::TYPE_IMAGE =>'Картинка',
            Setting::TYPE_PASW  =>'Пароль',
        ));
        
        // Setting Category (s_category)
        $this->createList('SC',array(
            Setting::CATEGORY_CONTACT => 'Контакты',
            Setting::CATEGORY_CODE    => 'Коды и счётчики',
            Setting::CATEGORY_OTHER   => 'Другие',
        ));
    }
    
    public function safeDown()
    {
        $this->delete(self::itemTable,'name like "SettingAccess%"');
        parent::safeDown();
    }
}
