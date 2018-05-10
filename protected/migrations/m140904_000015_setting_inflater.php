<?php

class m140904_000015_setting_inflater extends KpdMigration
{
    const  prefix  = 's';
    const  prefix_ = 's_';
    
    public function insertSetting($type, $category, $sort, $access, $cache, $name, $value, $description) {
        $this->insert(self::settingTable, array(
            self::prefix_.'type'    => $type,
            self::prefix_.'category'=> $category,
            self::prefix_.'sort'    => $sort,
            self::prefix_.'access'  => $access,
            self::prefix_.'cache'   => $cache,
            self::prefix_.'name'    => $name,
            self::prefix_.'value'   => $value,
            self::prefix_.'description'=> $description,
        ));
    }
    
    public function safeUp()
    {
        //////////////////////////////////////////// SETTING
                                                                                                        // CACHE
        $this->insertSetting( Setting::TYPE_STRING, Setting::CATEGORY_CONTACT, 1,Setting::SettingAccessAll, 1, 'admin-email'    , '' , 'Email администратора (для системных сообщений)');
        $this->insertSetting( Setting::TYPE_STRING, Setting::CATEGORY_CONTACT, 2,Setting::SettingAccessAll, 1, 'sender-email'   , '' , 'Email отправителя');
        $this->insertSetting( Setting::TYPE_STRING, Setting::CATEGORY_CONTACT, 3,Setting::SettingAccessAll, 1, 'sender-name'    , '' , 'Имя отправителя');
        $this->insertSetting( Setting::TYPE_STRING, Setting::CATEGORY_CONTACT, 4,Setting::SettingAccessAll, 1, 'subject-default', '<subject>' , 'Шаблон темы по-умолчанию');
        $this->insertSetting( Setting::TYPE_STRING, Setting::CATEGORY_CONTACT, 5,Setting::Administrator   , 1, 'mail-smtp'    , ''   , 'SMTP-Server'  );
        $this->insertSetting( Setting::TYPE_STRING, Setting::CATEGORY_CONTACT, 8,Setting::Administrator   , 1, 'mail-port'    , '465', 'SMTP-Port'    );
        $this->insertSetting( Setting::TYPE_STRING, Setting::CATEGORY_CONTACT, 6,Setting::Administrator   , 1, 'mail-username', ''   , 'SMTP-Username');
        $this->insertSetting( Setting::TYPE_STRING, Setting::CATEGORY_CONTACT, 7,Setting::Administrator   , 1, 'mail-password', ''   , 'SMTP-Password');

        $this->insertSetting( Setting::TYPE_TEXT  , Setting::CATEGORY_CODE, 1,Setting::SettingAccessAll, 0, 'robots_txt', 'User-agent: * Disallow: /', 'Поле для управления файлом robots.txt');
        $this->insertSetting( Setting::TYPE_TEXT  , Setting::CATEGORY_CODE, 2,Setting::SettingAccessAll, 0, 'google_analytics', '', 'Поле для вставки кода Google Analitics');
        $this->insertSetting( Setting::TYPE_TEXT  , Setting::CATEGORY_CODE, 3,Setting::SettingAccessAll, 0, 'Yandex_Metrics', '', 'Поле для вставки кода Яндекс.Метрики');
        $this->insertSetting( Setting::TYPE_TEXT  , Setting::CATEGORY_CODE, 4,Setting::SettingAccessAll, 0, 'Метатег', '', ' Для подтверждения прав на сайт в Яндексе и Гугле');
    }

    public function safeDown()
    {
        $this->delete(self::settingTable);
    }
}
