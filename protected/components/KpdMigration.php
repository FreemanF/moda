<?php

class KpdMigration extends CDbMigration
{
    const PK = 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY';
    const TIMESTAMP = 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP';
    
    //public static $collate = 'utf8_general_ci'; // по байткоду (быстро)
    public static $collate = 'utf8_unicode_ci'; // по алфавиту (правильно)
    
    public static $moduleObject;
    public static $moduleAlias;
    public static $moduleUsers = array(1); // Пользователи получающие доступ к модулям по-умолчанию

    const listTable        = '{{list}}';
    const objectTable      = '{{object}}';
    const logTable         = '{{log}}';
    const mediaTable       = '{{media}}';
    const metaTable        = '{{meta}}';
    const settingTable     = '{{setting}}';
    const translateTable   = '{{translate}}'; // or false
    
    const userTable        = '{{User}}';
    const itemTable        = '{{AuthItem}}';
    const itemChildTable   = '{{AuthItemChild}}';
    const assignmentTable  = '{{AuthAssignment}}';

    const AUTH_ROLE = 2;
    const AUTH_TASK = 1;
    const AUTH_OPER = 0;

    const DEFAULT_CONTENT_TYPE = 1;
    
    // таблицы к удалению, можно использовать '{{table}}'
    public $dropped = array();
    public $checkConstraints = true;
    public static $dependences = array();
    public $dropLists = array();
    public $dropSettings = array();
    
    public $fileUpdate = array(
//        'models/Object.php'=>array(
//            'OBJECT-LIST'=>array(
//                Object::idMenu => array(
//                    'chars'=>array('alias', 'prefix', 'icon', 'o_sef==alias'),
//                    'label'=>array('Module','Singular','Plural','genitive'),
//                    'have' => array('log','module',
//                        //'category', 'mention', 'tag', 'reclame', 'social', 
//                        //'search', 'stripe', 'theme', 'stat', 'sitemap',
//                    ),
//                ),
//            ),
//        ),
    );
    
    /**
     * get options for schema
     * 
     * @return string options
     */
    public function getOptions($comment='')
    {
        if ($comment)
            echo "      Создаём таблицу \"$comment\"\n";
        return Yii::app()->db->schema instanceof CMysqlSchema
            ? 'ENGINE=InnoDB DEFAULT CHARSET=utf8'
             .( self::$collate ? ' COLLATE='.self::$collate : '' )   
             .( $comment ? " COMMENT='$comment'" : '' )
            : '';
    }

    private static function CommentDefaultNull($comment='',$default=false,$null=false) {
        //$default      $null
        //false         true
        //false         false   NOT NULL
        //null          ?       DEFAULT NULL
        //1             false   NOT NULL DEFAULT 1
        //1             true    DEFAULT 1
        return 
            ($null===false && !is_null($default) ? ' NOT NULL' : '').
            ($default!==false 
                ? ' DEFAULT '.(
                    is_null($default)
                    ? 'NULL' : (
                            is_int($default)
                            ? $default
                            : '"'.$default.'"')) 
                : '').
            ($comment ? " COMMENT '$comment'" : '');
    }
    
    public static function INT($comment='',$default=false,$null=false) {
        return 'int(11)'.self::CommentDefaultNull($comment,$default,$null);
    }
    
    public static function TINY($comment='',$default=false,$null=false) {
        return 'tinyint(1)'.self::CommentDefaultNull($comment,$default,$null);
    }
    
    public static function STR($comment='',$length=255,$default='',$null=false) {
        return "varchar($length)".self::CommentDefaultNull($comment,$default,$null);
    }
    
    public static function TEXT($comment='',$default='',$null=false) {
        return "text".self::CommentDefaultNull($comment,$default,$null);
    }
    
    public static function BOOLEAN($comment='',$default=false,$null=false) {
        return "tinyint(1)".self::CommentDefaultNull($comment,is_null($default)?null:(int)$default,$null);
    }
    
    public static function DATETIME($comment='',$default='0000-00-00 00:00:00',$null=false) {
        return "datetime".self::CommentDefaultNull($comment,$default,$null);
    }
    
//    public static function TIMESTAMP($comment='',$default='CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',$null=false) {
//        return "timestamp".self::CommentDefaultNull($comment,$default,$null);
//    }
    
    public function addAuthItem($name,$type,$description='',$bizrule=null,$data=null) {
        $this->insert(self::itemTable, array(
            'name'        => $name,
            'type'        => $type,
            'description' => $description, 
            'bizrule'     => $bizrule, 
            'data'        => $data,
        ));
    }
    
    public function createKpdModule($name,$alias=null,$object=null,$listUser=null) {
        
        // Создаём роли и доступа к модулю
        echo "      Создаём KPD-модуль \"$name\"\n";
        $object = is_null($object) ? static::$moduleObject : $object;
        if ($object)
            $this->insert (self::objectTable, array('oid'=>$object));
        
        $alias = is_null($alias) ? static::$moduleAlias : $alias;
        if (empty($alias)) return;
        $module = (strpos($alias,'=')===0) 
            ?  substr($alias,1)
            : 'Module'.ucfirst($alias);
        
        $this->addAuthItem($module,self::AUTH_TASK,$name);
        
        $this->insert(self::itemChildTable, array(
            'parent'=> 'Modules', 
            'child' => $module, 
        ));
        
        if (is_null($listUser))
            $listUser = self::$moduleUsers;
        
        if ($listUser)
        foreach($listUser as $user)
            $this->insert (self::assignmentTable, array(
                'itemname'  => $module, 
                'userid'    => $user, 
                'bizrule'   => null, 
                'data'      => null,
            ));
        
    }
    
    public function deleteKpdModule($alias=null,$object=null) {
        
        // Удаляем роли и доступа к модулю
        
        $object = is_null($object) ? static::$moduleObject : $object;
        if (!is_null($object)) {
            if ($this->tableExists(self::logTable))
                $this->delete(self::logTable, "z_object_type=$object");
            $this->delete(self::objectTable, "oid=$object");
        }
        
        $alias = is_null($alias) ? static::$moduleAlias : $alias;
        if (is_null($alias)) return;
        $module = (strpos($alias,'=')===0) 
            ?  substr($alias,1)
            : 'Module'.ucfirst($alias);
        
        $this->delete(self::assignmentTable, "itemname = '$module'");
        
        //if ($this->checkConstraints) $this->backupConstraints();
        $this->delete(self::itemChildTable, "child = '$module' or parent='$module'");
        //if ($this->checkConstraints) $this->restoreConstraints();
        
        $this->delete(self::itemTable, "name = '$module'");
    }
    
    public function refreshTableSchemas() {
        Yii::app()->cache->flush();
        $schema = $this->getDbConnection()->getSchema();
        $schema->getTables();
        $schema->refresh();
        $this->_tableNames = null;
    }
    
    public function appendListItem($listID,$id,$sort,$name) {
        $this->insert(self::listTable, array(
            'ltype' => $listID,
            'lid'   => $id,
            'l_sort'=> $sort,
            'l_name'=> $name,
        ));
    }
    
    public function createList($listID,$list) {
        //$this->refreshTableSchema($table);
        if (strlen($listID)!=2)
            throw new CException('До сих пор на атрибут '.self::listTable.'.ltype было ограничение в два символа');
        $oldEnum = '';
        $scheme = $this->getDbConnection()->getSchema()->getTable(self::listTable,true);
        if ($scheme) {
            if ($type = $scheme->getColumn('ltype')->dbType) {
                if (preg_match('/enum\((.+)\)/', $type, $matches))
                    $oldEnum = $matches[1];
                else
                    throw new CException('Некорректный тип атрибута {{list}}.ltype: '.$type);
            }
        }
        $sort = 1;
        $listIDquoted = "'$listID'";
        $enum = $oldEnum ? "$oldEnum,$listIDquoted" : $listIDquoted;
        if ($oldEnum) {
            if (strpos($oldEnum,$listIDquoted)===false)
                $this->alterColumn(self::listTable, 'ltype', "enum($enum) NOT NULL COMMENT 'ID списка'");
            else {
                echo "    Список $listIDquoted уже существует, добавляем новые элементы.\n";
                $sort = Lists::model()->count("ltype=$listIDquoted")+1;
            }
        } else {
            $this->createTable(self::listTable, array(
                'ltype' => "enum($enum) NOT NULL COMMENT 'ID списка'",
                'lid'   => self::INT('ID элемента списка'),
                'l_sort'=> self::INT('Порядок отображения'),
                'l_name'=> self::STR('Название типа'),
                'PRIMARY KEY (ltype,lid)',
            ), $this->getOptions('Список'));
        }
        foreach ($list as $id=>$name) 
            $this->appendListItem ($listID, $id, $sort++, $name);
    }

    // Добавлено отсюда http://www.high-jump.ru/post/5/universal%CA%B9nyj_sablon_migracii_dla_yii

    private $_tableNames;


    protected function backupConstraints() {
        $this->execute('SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;');
        $this->execute('SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;');
        $this->execute('SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE="NO_AUTO_VALUE_ON_ZERO";');
        $this->checkConstraints = false;
    }
    
    protected function restoreConstraints() {
        $this->execute('SET SQL_MODE=@OLD_SQL_MODE;');
        $this->execute('SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;');
        $this->execute('SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;');
        $this->checkConstraints = true;
    }
    
    public function __construct()
    {
        if (!$this->checkConstraints) $this->backupConstraints();
    }
 
    public function __destruct()
    {
        if (!$this->checkConstraints) $this->restoreConstraints();
    }
 
    public function safeUp()
    {
        $this->_checkTables();
        $this->inflateFiles(true);
    }
 
    public function safeDown()
    {
        $this->inflateFiles(false);
        $this->deleteKpdModule();
        foreach($this->dropLists as $id)
            $this->delete(self::listTable,"ltype='$id'");
        foreach($this->dropSettings as $name)
            $this->delete(self::settingTable,"s_name='$name'");
        $this->_checkTables();
    }
 
    private function getTableNames() {
        if ($this->_tableNames===null)
            $this->_tableNames = $this->getDbConnection()->getSchema()->getTableNames();
        return $this->_tableNames;
    }
    
    public function tableExists($table,$refresh=true) {
        if ($refresh) $this->refreshTableSchemas();
        return in_array($this->tableName($table), $this->getTableNames());
    }
    
    /**
     * Удаляет таблицы, указанные в $this->dropped из базы.
     * Наименование таблиц могут сожержать двойные фигурные скобки для указания
     * необходимости добавления префикса, например, если указано имя {{table}}
     * в действительности будет удалена таблица 'prefix_table'.
     * Префикс таблиц задается в файле конфигурации (для консоли).
     */
    private function _checkTables ()
    {
        if (empty($this->dropped)) return;
 
        foreach ($this->dropped as $table)
            if ($this->tableExists($table))
                $this->dropTable($table);
    }
 
    /**
     * Добавляет префикс таблицы при необходимости
     * @param $name - имя таблицы, заключенное в скобки, например {{имя}}
     * @return string
     */
    protected function tableName($name,$prefix=null)
    {
        if($this->getDbConnection()->tablePrefix!==null && strpos($name,'{{')!==false)
            $realName=preg_replace(
                '/{{(.*?)}}/',
                (is_null($prefix)?$this->getDbConnection()->tablePrefix:$prefix).'$1',
                $name);
        else
            $realName=$name;
        return $realName;
    }
 
    /**
     * Получение установленного префикса таблиц базы данных
     * @return mixed
     */
    protected function getPrefix(){
        return $this->getDbConnection()->tablePrefix;
    }    
    
    public function checkDependence($table) {
        //$this->refreshTableSchemas();
        return in_array($table, static::$dependences)
            && $this->tableExists($table);
    }
    
    private $_last_object_type = '';
    
    public function addColumnObject(
            &$columns,
            $object_type='object_type',
            $object_id  ='object_id',
            $id_default = false,
            $otype_title='Тип объекта',
            $oid_title  ='ID-объекта'
    ) {
        if ($this->checkDependence(self::objectTable)) {
            
            $this->_last_object_type = $object_type;
            $columns[$object_type] = self::INT($otype_title);
            $columns[$object_id]   = self::INT($oid_title,$id_default);
        } else
            throw new CDbException('Требуется таблица '.self::objectTable);
    }
    
    public function addForeignObject($table,$root=null) {
        
        if (empty($this->_last_object_type))
            throw new CDbException('Перед вызовом addForeignObject() обязательно нужно вызвать addColumnObject()');
        
        $name = is_null($root) ? strtoupper($this->tableName($table,'')) : $root;
        $this->addForeignKey('FK_'.$name.'_OBJ', $table, $this->_last_object_type, self::objectTable, 'oid', 'NO ACTION', 'CASCADE');
    }
    
    public function addColumnContent(&$columns,$double=false) {
        $columns['content_type'] = self::TINY('Тип редактора',1);
        if ($double) {
            $columns['content_s_orig'] = self::TEXT('Оригинал краткого описания');
            $columns['content_l_orig'] = self::TEXT('Оригинал содержания');
            $columns['content_short' ] = self::TEXT('HTML-краткое описание',false);
            $columns['content_long'  ] = self::TEXT('HTML-содержание',false);
        } else {
            $columns['content_orig'] = self::TEXT('Оригинал текста',false);
            $columns['content_long'] = self::TEXT('HTML-текст',false);
        }
    }
 
    public function translate($object_type, $object_id, $lang, $name, $value) {
        if (self::translateTable)
            $this->insert(self::translateTable,array(
                'object_type' => $object_type, 
                'object_id'   => $object_id, 
                'lang'        => $lang, 
                'name'        => $name, 
                'value'       => $value, 
            ));
    }
    
    public function setting($type, $category, $sort, $access, $cache, $name, $value, $description) {
        $prefix = 's';
        $prefix_ = 's_';
        if (!Setting::model()->disableDefaultScope()->find('s_name="'.$name.'"'))
            $this->insert(self::settingTable, array(
                $prefix_.'type'    => $type,
                $prefix_.'category'=> $category,
                $prefix_.'sort'    => is_null($sort)
                    ? Setting::model()->count('s_category='.$category) + 1
                    : $sort,
                $prefix_.'access'  => $access,
                $prefix_.'cache'   => $cache,
                $prefix_.'name'    => $name,
                $prefix_.'value'   => $value,
                $prefix_.'description'=> $description,
            ));
        else
            echo '    В БД уже есть параметр '.$name.
                '. Его значение: "'.Setting::getParam($name)."\"\n";
        
    }

    // На гите и продакшине надо запрещать KPD Migration File Updater (migrate/local-git.php)
    //private static $_kpdmfu_file_prefix = '../protected/'; // console
    
    // Добавляем в/Убираем из файла подстановки
    private function inflateFiles($up) {
        if (defined('KPDMFU_DISABLE') && KPDMFU_DISABLE) return;
        // Сначала проверяем все файлы на возможность перезаписать
        $appDir = dirname(__DIR__);
        foreach($this->fileUpdate as $filename=>$params) {
            $filename = $appDir.'/'.$filename;
            //echo "    KPDMFU:PATH:".getcwd()."\n";
            //echo "    KPDMFU:FILE:$filename\n";
            if (!is_writeable($filename))
                throw new Exception('KPDMFU file "'.$filename.'" is not writeable.');
        }
        foreach($this->fileUpdate as $filename=>$replacements) {
            $filename = $appDir.'/'.$filename;
            $content  = file_get_contents($filename);
            $modified = false;
            foreach($replacements as $search=>$rules) {
                $searchStart = '/*KPDMFU-START-'.$search.'*/';
                $searchFinal = '/*KPDMFU-FINAL-'.$search.'*/';
                if (false!==strpos($content,$searchStart)
                &&  false!==strpos($content,$searchFinal))
                {
                    $content = preg_replace_callback(
                        '~'.str_replace('*','\\*',$searchStart).'(.*?)'.
                            str_replace('*','\\*',$searchFinal).'~sm', 
                        function ($match) use (&$modified,$searchStart,$searchFinal,$search,$rules,$up) {
                            $result = $match[1];
                            if (is_string($rules)) {
                                if ($up)
                                    $result.=$rules;
                                else {
                                    if (substr($result, -($length=strlen($rules)))===$rules) {
                                        // Отрезаем хвост
                                        $result = substr($result, 0, -$length);
                                    } else
                                        echo 'WARNING [KPDMFU]: Can not deflate "'.$search.'", replacement="'.$search."\".\n";
                                }
                            } elseif ($search=='OBJECT-LIST') {
                                if ($up)
                                    Object::appendObject($rules,true);
                                else 
                                    Object::removeObject($rules,true);
                                $result = Object::buildList();
                            } elseif ($search=='MIGRATE-OBJECT') {
                                $result = Object::buildList('migrate');
                            } else
                                echo 'WARNING [KPDMFU]: Unknown type replacement "'.$search."\".\n";
                            $modified = true;
                            return $searchStart.$result.$searchFinal;
                        },$content);
                } else
                    echo 'WARNING [KPDMFU]: Replacement "'.$search.'" is not found.'."\n";
            }
            if ($modified) {
                $newname = $filename;
//                $newname = dirname($filename).'/'.preg_replace('/(.*)\./','\1-m.', basename($filename));
//                //echo "NEW $newname\n";
//                if ($newname!=$filename) {
                    file_put_contents($newname,$content);
//                } else
//                    echo 'WARNING [KPDMFU]: file "'.$filename.'" cannot be renamed.'."\n";
            } else
                echo 'WARNING [KPDMFU]: file "'.$filename.'" is not modified.'."\n";
        }
    }
    
}