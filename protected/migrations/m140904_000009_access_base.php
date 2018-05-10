<?php

class m140904_000009_access_base extends KpdMigration
{
    public static $moduleObject = Object::idUser;
    public static $moduleAlias  = 'User';

    // Начинаем создавать доступы к уже созданным модулям только после RBAC-миграции
    // Доступы к модулям созданным после RBAC-миграции должны создаваться в самих модулях
    
    public function safeUp()
    {
        $this->createKpdModule('Пользователи');
        $this->createKpdModule('Файлы','File',Object::idFile);

        $this->addAuthItem('Administrator', self::AUTH_ROLE);
        $this->addAuthItem('DBManager', self::AUTH_ROLE); // Доступ к миграциям (webshell)
        $this->addAuthItem('Authority', self::AUTH_ROLE);
        $this->addAuthItem('Editor', self::AUTH_ROLE);
        $this->addAuthItem('User', self::AUTH_ROLE);
        
        $this->insert(self::itemChildTable, array('parent'=>'Administrator','child'=>'Editor'));
        $this->insert(self::itemChildTable, array('parent'=>'Administrator','child'=>'ModuleLog'));
        $this->insert(self::itemChildTable, array('parent'=>'Administrator','child'=>'ModuleUser'));
        
        if (self::$moduleUsers)
        foreach(self::$moduleUsers as $user) {
            $this->insert (self::assignmentTable, array('itemname'  => 'DBManager', 'userid'    => $user));
            $this->insert (self::assignmentTable, array('itemname'  => 'Administrator', 'userid'    => $user));
	}
        
    }
    
    public function safeDown()
    {
        $this->delete(self::assignmentTable,'itemname="Administrator"');
        $this->delete(self::assignmentTable,'itemname="DBManager"');
        
        $this->delete(self::itemChildTable, 'parent="Administrator" and child="Editor"');
        $this->delete(self::itemChildTable, 'parent="Administrator" and child="ModuleLog"');
        $this->delete(self::itemChildTable, 'parent="Administrator" and child="ModuleUser"');
        
        $this->delete(self::itemTable,'name="Administrator"');
        $this->delete(self::itemTable,'name="DBManager"');
        $this->delete(self::itemTable,'name="Authority"');
        $this->delete(self::itemTable,'name="Editor"');
        $this->delete(self::itemTable,'name="User"');
        
        parent::safeDown();
        
        $this->deleteKpdModule('File',Object::idFile);
    }
}
