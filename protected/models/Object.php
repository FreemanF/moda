<?php

/**
 * This is the model class for table "object".
 *
 * The followings are the available columns in table 'object':
 * @property integer $oid
 * @property string $o_sef
 * @property string $alias
 * @property string $singular
 * @property string $plural
 */
class Object {
    const idIndex         = 100;
    const idNews          = 1;
    const idBlog          = 2;
    const idUser          = 3;
    const idMenu          = 4;
    const idPage          = 5;
    const idCategory      = 6;
    const idSetting       = 7;
    const idGallery       = 8;
    const idVideo         = 9;
    const idRegion        =10; // Рубрики
    const idBranch        =11; // Рубрики
    const idCompany       =12;
    const idBrand         =13;
    const idFormatSotr    =14; // format sotr
    const idEvent         =15;
    const idInterview     =16;
    const idHistory       =17;
    const idContacts      =18;  // contacts
    const idRating        =19;
    const idMember        =20;
    const idField         =21;
    const idValue         =22;
    const idBanner        =23;
    const idReclame       =24;
    const idPlace         =25;
    const idFolder        =26;
    const idShortcutBar   =27;
    const idTask          =28;
    const idProduct       =29; // Looks
    const idLook          =30;
    const idXml           =31;
    const idSeason        =32; // Рубрики
    const idStyle         =33; // Рубрики
    const idAttribute     =34; // LMag
    const idLookitem      =35;
	const idClient		  =36;
    //const idTag           =36;
    const idFile          =37;
    const idLog           =38;
    const idHead          =39;
    const idClientlogo    =40; //Fruit
    const idReviews       =41; //Fruit
    const idStat          =42;
    const idProjects      =43;
    const idHow		      =44;
    const idProfile       =45;
    const idReceiver      =46;
    const idWho           =47;
    const idPlist		  =48;
    const idTop100value   =49;
    const idMiniGallery   =50;
    const idSlider        =51;
    const idArticles      =52;
    const idResults       =53; //results
    const idLprojects  =54; //Last projects
    const idTheme         =55;
    const idDebate        =56;
    const idComment       =57;
    const idVote          =58;
    const idSash          =59;
    const idDynamicMenu   =60;
    const idKind          =61;
    const idUses          =62;
    const idMatter        =63;
    const idAdvert        =64; //Agr2
    const idOrganization  =65; //Intermelt
    const idOpinion       =66;
    const idAnswer        =67;
    const idDigit         =68;
    const idOrders        =69; //LMag,Fruit
    const idGroup         =70;
    const idPaper         =71; // bayk2
    const idFaq           =72; // joriside.ru
    const idDocs          =73; // joriside.ru
    const idAgency        =74; // joriside.ru
 //   const idClient        =75; // joriside.ru
    const idQuality       =76; // joriside.ru
    const idSite          =77; //kpdmedia.com
    const idPlugin        =78; //kpdmedia.com 20140716
    const idCustomer      =79; //kpdmedia.com 20140717
    const idLicense       =80; //kpdmedia.com 20140716
   
    const idSbReceiver    =81; // LAT subscribtion
    const idSbInterest    =82;
    const idSbLetter      =83;
    const idSbForm        =84;
    const idSbTheme       =85;
    const idSbTag         =86;
    const idSbObject      =87;
    
    const idTracking      =88;
    const idPost          =89;
    
    const idMarka         =90; // selmash.com
    const idModele        =91; // selmash.com
    const idCity          =92; // selmash.com
    const idSpecifications=93; // selmash.com

    static private $_values = array(//ALIAS     //ct mn  tg lg rc sc  sr ix tm   md st sm   ICON             Ед.число                  SEF               ед.ч. род.падеж           Мн.число                  Меню в админке
/*KPDMFU-START-OBJECT-LIST*/
Object::idIndex       =>array(100, 'index'      , ''  , 0, 0, 0, 0, 0, 0, 0, 0, 0,  30, 0, -1, ''           , 'Главная'               , 'index'       , ''                      , 'Главная'               , 'Главная'           ),
Object::idFile        =>array( 37, 'file'       , ''  , 0, 0, 0, 7, 0, 0, 0, 0, 0, 110, 0,  0, 'filemanager', 'Файл'                  , ':file'       , 'файла'                 , 'Файлы'                 , 'Управление файлами'),
Object::idUser        =>array(  3, 'user'       , 'u' , 0, 0, 0, 5, 0, 0, 0, 0, 0,  80, 0,  0, 'phonebook'  , 'Пользователь'          , 'user'        , 'пользователя'          , 'Пользователи'          , 'Пользователи'      ),
Object::idShortcutBar =>array( 27, 'shortcutBar', 'sb', 0, 0, 0, 0, 0, 0, 0, 0, 0,  10, 0,  0, ''           , 'Панель быстрого старта', 'shortcut-bar', 'панели быстрого старта', 'Панели быстрого старта', ''                  ),
Object::idSetting     =>array(  7, 'setting'    , 's' , 0, 0, 0, 4, 0, 0, 0, 0, 0,  60, 0,  0, 'settings4'  , 'Параметр'              , 'setting'     , 'параметра'             , 'Параметры'             , 'Настройки'         ),
Object::idLog         =>array( 38, 'log'        , 'z' , 0, 0, 0, 0, 0, 0, 0, 0, 0,  90, 0,  0, 'darthvader' , 'Протокол'              , ':log'        , 'изменения'             , 'Изменения'             , 'Протокол изменений'),
Object::idFolder      =>array( 26, 'folder'     , 'f' , 0, 0, 0, 0, 0, 0, 0, 0, 0,  20, 0,  0, ''           , 'Папка'                 , 'folder'      , 'папки'                 , 'Папки'                 , ''                  ),
Object::idPage        =>array(  5, 'page'       , 'p' , 0, 0, 0, 6, 0, 0, 0, 0, 0, 100, 0,  1, 'foldertree' , 'Страница'              , 'page'        , 'страницы'              , 'Страницы'              , 'Редактор страниц'  ),
Object::idMenu        =>array(  4, 'menu'       , 'm' , 0, 0, 0, 1, 0, 0, 0, 0, 0,  40, 0,  0, 'list'       , 'Меню'                  , 'menu'        , 'меню'                  , 'Меню'                  , 'Меню'              ),
Object::idCategory    =>array( 6, 'category'    , 'c',  1, 0, 0, 3, 0, 0, 0, 0, 0,  55, 0,  3, 'images'     , 'Категории'          , 'category' , 'категории'          , 'Категории'          , 'Категории'      ),
Object::idMiniGallery =>array( 50, 'miniGallery', 'mg', 0, 0, 0, 2, 0, 0, 0, 0, 0,  50, 0,  0, 'images'     , 'Мини галерея'          , 'minigallery' , 'мини галереи'          , 'Мини галереи'          , 'Мини галереи'      ),
Object::idClient      =>array( 36, 'client'   ,   'cl', 0, 0, 0, 3, 0, 0, 0, 0, 0,  55, 0,  3, 'images'     , 'Наши клиенты'          , 'client' , 'нашего клиента'          , 'Наши клиенты'          , 'Наши клиенты'      ),
Object::idNews      =>array(  1, 'news'       , 'n' , 0, 0, 0, 3, 0, 0, 0, 0, 0,  70, 0,  2, 'news'       , 'Новость'               , 'news'        , 'новости'               , 'Новости'               , 'Новости'           ),
Object::idFormatSotr  =>array( 14, 'formatSotr'     , 'fs' , 0, 0, 0, 3, 0, 0, 0, 0, 0,  70, 0,  2, 'news'  , 'Формат сотрудничества' , 'format'      , 'формат сотрудничества' , 'Форматы сотрудничества' , 'Блок формат сотрудн-ва' ),
Object::idPlist  =>array( 48, 'plist'     , 'pl' , 0, 0, 0, 3, 0, 0, 0, 0, 0,  70, 0,  2, 'news'  , 'Контент проекта' , 'plist'      , 'контент проекта' , 'контент проекта' , 'Контент проекта (блоки)' ),
Object::idContacts  =>array( 18, 'contacts'     , 'cn' , 0, 0, 0, 3, 0, 0, 0, 0, 0,  90, 0,  2, 'news'       , 'Сообщения'               , 'contacts'        , 'сообщение'               , 'Сообщения'    , 'Сообщения'           ),
Object::idResults  =>array( 53, 'results'     , 'rz' , 0, 0, 0, 3, 0, 0, 0, 0, 0,  70, 0,  2, 'news'       , 'Результаты работ'               , 'results'        , 'результаты работ'               , 'Результаты работ'               , 'Результаты работ'           ),
Object::idLprojects  =>array( 54, 'lprojects'  , 'lp' , 0, 0, 0, 0, 0, 0, 0, 0, 0,  00, 0,  0, 'news'       , 'Последние проекты'               , 'lprojects'        , 'последние проекты'               , 'Последние проекты'               , 'Последние проекты'           ),
Object::idProjects  =>array( 43, 'projects'  , 'pr' , 0, 0, 0, 3, 0, 0, 0, 0, 0,  70, 0,  2, 'news'       , 'Проекты'               , 'projects'        , 'проекты'               , 'Проекты'               , 'Проекты'           ),
Object::idHow  =>array( 44, 'how'  , 'hw' , 0, 0, 0, 3, 0, 0, 0, 0, 0,  70, 0,  2, 'list'       , 'Как это работает'               , 'how'        , 'как это работает'               , 'Как это работает'               , 'Как это работает'           ),
Object::idWho  =>array( 47, 'who'  , 'w' , 0, 0, 0, 3, 0, 0, 0, 0, 0,  70, 0,  2, 'list'       , 'Кто мы такие'               , 'who'        , 'кто мы такие'               , 'Кто мы такие'               , 'Кто мы такие'           ),
/*KPDMFU-FINAL-OBJECT-LIST*/        //ALIAS            //ct mn  tg lg rc sc  sr ix tm   md st sm   ICON             Ед.число                  SEF               ед.ч. род.падеж           Мн.число                  Меню в админке
        );

    static private $_fields = array(
        'oid'=>0, 'alias'=>1, 'prefix'=>2, 
        'have_category' =>3,  
        'have_mention'  =>4, 
        'have_tag'      =>5, 
        'have_log'      =>6, 
        'have_reclame'  =>7, 
        'have_social'   =>8, 
        'have_search'   =>9, 
        'have_stripe'   =>10,
        'have_theme'    =>11,
        'have_module'   =>12,
        'have_stat'     =>13,
        'have_sitemap'  =>14,
        'icon'    =>15, 'singular'=>16, 'o_sef' =>17, 
        'genitive'=>18, 'plural'  =>19, 'module'=>20,
        );

    static private $_labels;
    
    private $type;
            
    private static function checkType($type,$raise=true) {
        if (isset(self::$_values[$type]))
            return $type;
        if ($raise)
            throw new CException('ObjectType='.$type.' не существует');
        else
            return 0;
    }
    
    public function __construct($type) {
        $this->type = self::checkType($type);
    }
    
    private static function indexField($name) {
        if (isset(self::$_fields[$name]))
            return self::$_fields[$name];
        throw new CException(Yii::t('yii','Property "{class}.{property}" is not defined.',
            array('{class}'=>'Object', '{property}'=>$name)));
    }
    
    public function __get($name) {
        return self::$_values[$this->type][self::indexField($name)];
    }    
    
    static public function getObject($type) {
        return new Object($type);
    }
    
    static public function byAlias($alias,$error='') {
        $class = lcfirst($alias);
        $index = self::indexField('alias');
        foreach(self::$_values as $type=>$values)
            if ($values[$index]==$class)
                return new Object($type);
        // Если вывод ошибок подавлен возвращаем null
        if (is_null($error)) return null;
        throw new CException($error?$error:'Object "'.$alias.'" не существует');
        
    }
    
    static public function bySef($sef) {
        $class = lcfirst($sef);
        $index = self::indexField('o_sef');
        foreach(self::$_values as $type=>$values)
            if ($values[$index]==$class)
                return new Object($type);
        throw new CException('Object "'.$sef.'" не существует');
        
    }
    
    static public function get($type,$field,$raise=true) {
        if (self::checkType($type,$raise))
            return self::$_values[$type][self::indexField($field)];
        else return '';
    }
    
    static public function getPrefix($type) {
        return self::get($type,'prefix');
    }
    
    static public function getAlias($type,$raise=true) {
        return self::get($type,'alias',$raise);
    }
    
    static public function getClass($type,$raise=true) {
        return ucfirst(self::get($type,'alias',$raise));
    }
    
    static public function getSef($type,$raise=true) {
        return self::get($type,'o_sef',$raise);
    }
    
    static public function getPlural($type) {
        return self::get($type,'plural');
    }
    
    static public function getGenitive($type) {
        return self::get($type,'genitive');
    }
    
    static public function getLabels($type,$valuefield='plural',$keyfield='oid') {
        $have = self::indexField($find='have_'.$type);
        $value= self::indexField($valuefield);
        $index = $find.':'.$keyfield.':'.$valuefield;
        $list = array();
        if (!isset(self::$_labels[$index])) {
            $key  = self::indexField($keyfield);
            foreach(self::$_values as $oid=>$values) {
                if ($values[$have]) //>0)
                    $list[]=$values;
            }
            usort($list,function($item1,$item2) use ($have) {
                if ($cmp=$item1[$have]-$item2[$have])
                    return $cmp;
                return $item1[0]-$item2[0];
            });
            $result = array();
            foreach($list as $values)
                $result[$values[$key]] = CHtml::encode($values[$value]);
            self::$_labels[$index] = $result;
        }
        return self::$_labels[$index];
    }


//  RULES-ITEM    
//    Object::idMenu => array(
//        'chars'=>array('alias', 'prefix', 'icon', 'o_sef==alias'),
//        'label'=>array('Module','Singular','Plural','genitive'),
//        'have' => array(
//            //'category', 'mention', 'tag',
//            'log',
//            //'reclame', 'social', 'search', 'stripe', 'theme', 
//            'module',
//            //'stat', 'sitemap',
//        ),
//    ),        
    
    static private $_sorted = array(
        'module' =>'module',
        'log'    =>'plural',
        );
    
    public static function appendObject($rules,$interactive=false) {
        $fields = array_flip(self::$_fields);
        $values_template = array_pad(array(), $fcount=count(self::$_fields), 0);
        foreach ($fields as $index=>$name)
            $values_template[$index] = (substr($fields[$index],0,5)=='have_' || $index==0) ? 0 : '';
        $result = true; // Удалось добавить все объекты
        $have = array();
        foreach($rules as $oid=>$rule) {
            $values = $values_template;
            $values[0] = $oid;
            foreach($rule as $name=>$value)
                if (is_array($value))
                switch ($name) {
                    case 'chars': 
                        $value = array_values($value);
                        $count = count($value);
                        if ($count==0) $value[0] = '';
                        if (count($value)<3) $value[] = '';
                        if (count($value)<4) $value[] = $value[0];
                        foreach(array('alias', 'prefix', 'icon', 'o_sef') as $index=>$field)
                            $values[self::indexField($field)] = $value[$index];
                        break;
                    case 'label': 
                        $value = array_values($value);
                        $last = count($value) ? array_pop($value) : '';
                        while(count($value)<4) array_push($value, $last);
                        $value[3] = lcfirst($value[3]);
                        foreach(array('module','singular','plural','genitive') as $index=>$field)
                            $values[self::indexField($field)] = $value[$index];
                        break;
                    case 'have':
                        foreach($value as $index=>$name)
                            if (is_numeric($index)) {
                                $have[] = $name;
                                $values[self::indexField('have_'.$name)] = 1;
                            } else
                                $values[self::indexField('have_'.$index)] = $name;
                        break;
                    default: throw new Exception('Unknown object-attribute "'.$name.'"');
                } else
                if (isset(self::$_fields[$name]))
                    $values[self::$_fields[$name]] = $value;
                else
                    if ($name=='id') $values[$fcount] = $value;
                    else throw new Exception('Unknown object-attribute "'.$name.'"');
            if (isset(self::$_values[$oid]))
                $result = false;
            
            // Записываем новый модуль или перезаписываем старый
            self::$_values[$oid] = $values;
            $alias = self::$_values[$oid][self::indexField('alias')];
            if ($interactive)
                echo "    KPDMFU: Добавили Объект [$oid] '$alias';\n";
            
            // Пересортировка Модулей
            if ($have) {
                self::$_labels = array();
                foreach($have as $type) 
                    if (isset(self::$_sorted[$type]))
                {
                    $list = self::getLabels($type, self::$_sorted[$type]);
                    asort($list);
                    $k = $type=='module' ? 10 : 1;
                    $index = self::indexField('have_'.$type);
                    $row = 1;
                    foreach ($list as $oid => $name) {
                        self::$_values[$oid][$index] = $k*$row++;
                    }
                }
            }
        }
        return $result;
    }
    
    public static function removeObject($rules,$interactive=false) {
        $result = true; // Удалось удалить все объекты
        foreach($rules as $oid=>$rule) {
            if (isset(self::$_values[$oid])) {
                $alias = self::$_values[$oid][self::indexField('alias')];
                if ($interactive)
                    echo "    KPDMFU: Удалили Объект [$oid] '$alias';\n";
                unset(self::$_values[$oid]);
            } else {
                if ($interactive)
                    echo "    KPDMFU: Объект [$oid] и так не существовал;\n";
                $result = false;
            }
        }
        return $result;
    }
    
    public static function buildList($mode='') {
        $fcount = count(self::$_fields);
        $length = array_pad(array(), $fcount = count(self::$_fields), 0);
        $fields = array_flip(self::$_fields);
        foreach(self::$_values as $oid=>$values)
            foreach($values as $index=>$value) if (isset($length[$index]))
                $length[$index] = max(
                    $length[$index],
                    ((substr($fields[$index],0,5)=='have_' || $index==0)?0:2)+mb_strlen(''.$value,'UTF-8'));
        //var_export($length);
        $indexAlias = self::indexField('alias');
        $result = array();
        foreach(self::$_values as $oid=>$values) {
            $objectConst = 'Object::id'.str_pad(ucfirst(
                    isset($values[$fcount]) ? $values[$fcount] :
                    ltrim($values[$indexAlias],':')),$length[$indexAlias]-1).'=>array(';
            foreach($values as $index=>$value) 
                if (!isset($length[$index])) unset($values[$index]); else {
                if (substr($fields[$index],0,5)=='have_' || $index==0)
                    $values[$index] = str_pad(''.$value,$length[$index],' ',STR_PAD_LEFT);
                else {
                    $value = "'$value'";
                    $values[$index] = $value.str_pad('',$length[$index]-mb_strlen($value,'UTF-8'));
                }
            }
            if ($mode=='migrate') {
                $chars = $label = $have = array();
                foreach(array('alias', 'prefix', 'icon', 'o_sef') as $field)
                    $chars[] = trim($values[self::indexField($field)]);
                foreach(array('module','singular','plural','genitive') as $field)
                    $label[] = trim($values[self::indexField($field)]);
                if ('0'!==trim($values[self::indexField('have_module')])) $have[] = "'module'";
                if ('0'!==trim($values[self::indexField('have_log')]))    $have[] = "'log'";
                    
                foreach(array('category', 'mention', 'tag', 'reclame', 'social', 'search', 'stripe', 'theme', 'stat', 'sitemap') as $field) {
                    $index = self::indexField('have_'.$field);
                    if ('0'!==($value = trim($values[$index])))
                        $have[] = $value==1 ? "'$field'" : "'$field'=>".trim($value);
                }
                $result[] = '                '.$objectConst." // 'oid' => $oid,
                    'chars'=>array(".implode(', ',$chars)."),
                    'label'=>array(".implode(', ',$label)."),
                    'have' => array(".implode(',',$have)."),
                ),";
            } else
                $result[] = $objectConst.  implode(', ', $values)."),";
        }
        return "\n".implode("\n", $result)."\n";
    }
    
}


//Object::getObject(Object::idBlog)->alias;
//Object::getPrefix(Object::idBlog);
//$o->alias;
