<?php

class m140904_000005_shortcutBar_base extends KpdMigration
{
    const  shortcutsTable = '{{shortcutBar}}';
    const  prefix  = 'sb';
    const  prefix_ = 'sb_';
    public static $dependences = array(self::userTable);
    public $dropped = array(self::shortcutsTable);
    
    public $fileUpdate = array('models/Object.php'=>array('OBJECT-LIST'=>array(
        Object::idShortcutBar  =>array( // 'oid' => 27,
            'chars'=>array('shortcutBar', self::prefix, '', 'shortcut-bar'),
            'label'=>array('', 'Панель быстрого старта', 'Панели быстрого старта', 'панели быстрого старта'),
            'have' => array('module'),
        ))));
    
    public function safeUp()
    {
        parent::safeUp();
        
        $columns = array(
            self::prefix.'id'=> self::PK,
            self::prefix_.'name' => self::STR('Наименование'),
            self::prefix_.'sef'  => self::STR('URL'),
            self::prefix_.'icon' => self::TEXT('Иконка',null),
            self::prefix_.'sort' => self::INT('Порядок елемента'),
        );
        if ($withUser = $this->checkDependence(self::userTable))
            $columns[self::prefix_.'user'] = self::INT('Владелец');
        else
            echo "Подозрительно выглядит отсутствие таблицы Пользователей. Из-за этого в shortcutBar не добавляем 'владельца'\n";
        
        $this->createTable(self::shortcutsTable, $columns, $this->getOptions('Панель быстрого старта'));
        if ($withUser)
            $this->addForeignKey('FK_SHORTCUT_USER', self::shortcutsTable, self::prefix_.'user', self::userTable, 'uid', 'CASCADE', 'CASCADE');
    }
}
