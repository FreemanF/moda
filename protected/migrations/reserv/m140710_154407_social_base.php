<?php

class m140710_154407_social_base extends KpdMigration
{
    const  socialTable = '{{social}}';
    public static $dependences = array(self::objectTable);
    public $dropped = array(self::socialTable);
    public $social  = array('fb','tw','vk');
    public $trigger = true; // MYSQL v.
    
    protected function makeSendTypeCondition($type,$result=null) {
        return 
            "IF $type=NEW."
            .implode("_need OR $type=NEW.", $this->social)
            .'_need THEN SET NEW.send_type='.(is_null($result)?$type:$result).";";
    }
    
    public function safeUp()
    {
        parent::safeUp();
        
        $columns = array(
            'send_type' => self::INT('Способ отправки: 0-не проверять в cron, 1-проверять, 2-сначала исправить ошибки',0),
            'object_date' => self::DATETIME('Начало публикации'),
        );
        foreach($this->social as $soc) {
            $columns[$soc.'_need'] = self::TINY("Флажок $soc",0,true);
            $columns[$soc.'_send'] = self::DATETIME("Время публикации $soc",null);
        }
        $this->addColumnObject($columns);
        $this->createTable(self::socialTable, $columns, $this->getOptions('Публикация в социальные сети'));
        
        $this->addPrimaryKey('PK_SOCIAL', self::socialTable, 'object_type, object_id');
        $this->createIndex('IX_SOCIAL_CRON', self::socialTable, 'send_type, object_date');
        $this->addForeignObject(self::socialTable);
        
        if ( ! $this->trigger) return;
        
        $this->execute('DROP TRIGGER IF EXISTS social_correction_type_before_insert;');
        $this->execute('DROP TRIGGER IF EXISTS social_correction_type_before_update;');
        $sql = 
'CREATE TRIGGER {NAME & ACTION} ON '.self::socialTable.'
FOR EACH ROW BEGIN
        '.$this->makeSendTypeCondition(3).'
    ELSE'.$this->makeSendTypeCondition(1).'
    ELSE'.$this->makeSendTypeCondition(5,2).'
    ELSE                                                        SET NEW.send_type=0;
    END IF;
END';
        $this->execute(str_replace('{NAME & ACTION}', 
            'social_correction_type_before_insert BEFORE INSERT', $sql));
        $this->execute(str_replace('{NAME & ACTION}', 
            'social_correction_type_before_update BEFORE UPDATE', $sql));
    }
}
