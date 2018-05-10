<?php

class m140715_155042_yandex_mail_setting extends CDbMigration
{
    const settingName = 'yandex-mail-domain';
	// Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $category = Setting::CATEGORY_CONTACT;
        if (!Setting::model()->disableDefaultScope()->find('s_name="'.self::settingName.'"'))
            $this->insert ('{{setting}}', array(
                's_type'        => Setting::TYPE_STRING,
                's_category'    => $category,
                's_sort'        => Setting::model()->count('s_category='.$category) + 1,
                's_access'      => Setting::Administrator,
                's_cache'       => false,
                's_name'        => self::settingName,
                's_value'       => 'yrest.net',
                's_description' => 'Домен указанный в Яндекс.Почте',
            ));
        else
            echo '    В БД уже есть параметр '.self::settingName.
                '. Его значение: "'.Setting::getParam(self::settingName)."\"\n";
    }

    public function safeDown() {
        
    }

}