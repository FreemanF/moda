<?php

class Setting extends CActiveRecord{

    const TYPE_STRING     = 1;  //Строка
    const TYPE_TEXT       = 2;  //Текст
    const TYPE_LIST       = 3;  //Список
    const TYPE_IMAGE      = 4;  //Картинка
    const TYPE_PASW       = 5;  //Пароль

    const CATEGORY_CONTACT = 1; //Контакты
    const CATEGORY_CODE    = 2; //Коды и счётчики
    const CATEGORY_SYSTEM  = 2; //Системные
    const CATEGORY_OTHER   = 3; //Остальные

    const SettingHidden   =-1;
    const SettingAccessAll= 0;
    const SettingAccess1  = 1;
    const SettingAccessFB = 2;
    const SettingAccessTW = 3;
    const SettingAccessVK = 4;
    const SettingAccessEMAIL = 5;
    const Administrator   = 1000;
    
    public $old_value;
    static public $lock;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__){
            return parent::model($className);
    }

    public function getId() {
        // Ф-я используется в yii в CArrayDataProvider
        return $this->primaryKey;
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{setting}}';
    }

//    public function rules() {
//            return array(
//                array('s_value', 'required'),
//            );
//    }
        
    public function relations()
    {
        return array(
            'type' => array(self::BELONGS_TO, 'Lists' , array('i_type'=>'lid'),'on'=>'ltype="ST"','order'=>'l_sort ASC'),
        );
    }
    
    public function behaviors()
    {
        return array(
            'DisableDefaultScopeBehavior',
            'LogBehavior'   => array('class'=>'LogBehavior'),
            'PrefixedModel' => array('class'=>'PrefixedModel'),
        );
    }
    
    public function defaultScope()
    {
        if ($this->getDefaultScopeDisabled()) {
            return array('order' => 's_category,s_sort,sid');
        } else {
            $access = Yii::app()->session['SettingAccess'];
            if (!is_array($access)) {
                $access = array(0);
                $user = Yii::app()->user;
                if (!$user->isGuest) {
                    if ($user->checkAccess('SettingAccess1')) $access[] = self::SettingAccess1;
                    
                    // Чтобы не выдавать сообщение о запрете публикаций
                    //if ($user->checkAccess('SettingAccessFB')) $access[] = self::SettingAccessFB;
                    
                    if ($user->checkAccess('SettingAccessTW')) $access[] = self::SettingAccessTW;
                    if ($user->checkAccess('SettingAccessVK')) $access[] = self::SettingAccessVK;
                    if ($user->checkAccess('SettingAccessEMAIL')) $access[] = self::SettingAccessEMAIL;
                    if ($user->checkAccess('Administrator' )) $access[] = self::Administrator;
                }
                Yii::app()->session['SettingAccess'] = $access;
            }
            return array(
                'condition'=>'s_access in ('.implode(',',$access).')',
                'order'    =>'s_category,s_sort,sid',
            );
        }
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels(){
            return array(
                    'sid' => 'ID:',
                    's_name' => 'Название:',
                    's_value' => 'Значение:',
                    's_description' => 'Описание:',
            );
    }
    
    public function getlist() {
        
        $obj = Yii::app()->request->getParam('dir');
        $dir = intval($obj);
        if ($dir==0 && is_string($obj) && strpos($obj, 'o')===0)
            $dir = intval(substr($obj,1));
        $checkdir = Yii::app()->request->isPostRequest && $dir
            ? ' = '.$dir : ' IS NULL';
        
        // Список параметров
        $data = Setting::model()->findAll(array(
            'condition'=> 's_category'.$checkdir,
            'order' => 's_sort,sid'
        ));
        return new CArrayDataProvider($data,array('pagination'=>false));
    }
    
    
    public static function getCachedParam($name,$default='',$params=array()){
        $value = Yii::app()->cache->get('setting:'.$name);
        if ($value===false) { // Обновляем кэш
            $setting = Setting::model()->disableDefaultScope()->findByAttributes(array('s_name'=>$name));
            $value = ($setting===null || empty($setting->s_value)) ? $default : $setting->s_value;
            if ($setting && $setting->s_cache)
                Yii::app()->cache->set('setting:'.$name, $value);
        }
        foreach($params as $old=>$new)
            $value = str_replace ($old, $new, $value);
        
        $value = htmlspecialchars_decode($value,ENT_QUOTES);
        return $value;
    }
    
    public static function getParam($name,$default='',$params=array()){
        $setting = Setting::model()->disableDefaultScope()->findByAttributes(array('s_name'=>$name));
        $value = $setting===null ? $default : $setting->s_value;
        foreach($params as $old=>$new)
            $value = str_replace ($old, $new, $value);
        
        $value = htmlspecialchars_decode($value,ENT_QUOTES);
        return $value;
    }
    
    public static function setParam($name,$value='',$cache=false,$nosave=false){
        $setting = Setting::model()->disableDefaultScope()->findByAttributes(array('s_name'=>$name));
        if($setting===null) {
            $setting = new Setting();
            $setting->s_type     =  2;
            $setting->s_category =  0;
            $setting->s_access   = -1;
            $setting->s_cache    = $cache ? 1 : 0;
            $setting->s_name = $name;
            $setting->s_description = 'created automatically '.date('Y-m-d H:i:s');
        }
        $setting->s_value = $value;
        $cache = $setting->s_cache;
        // То что кешируется необязательно записывать вплоть до завершения скрипта,
        // если перед завершением вы это всё равно сделаете (только в однопользовательском режиме)
        if (($cache && $nosave) || ($setting->save() && $cache)) {
            Yii::app()->cache->set('setting:'.$name, $value);
            if (Yii::app()->cache->get('setting:'.$name)!==$value)
                throw new Exception('Кэш не работает при сохранении настроек.'.
                    ' Сейчас это жизненно необходимо, при проверке токенов');
        };
    }
    
    public function beforeUpdate($rawtext=null) {
        $Fail = '';
        if ($rawtext===null)
            $rawtext = $this->s_value;
        switch ($name=$this->s_name) {
        case 'robots_txt':
            if ($fp = @fopen('robots.txt', 'w+')) {
                if (!fwrite($fp, $rawtext)) 
                    $Fail = 'Не удалось сохранить файл robots.txt';
                fclose($fp);
            } else
                 $Fail = 'Не удалось открыть robots.txt для записи';
            break;
            
        case 'social-fb-enabled': 
        case 'social-fb-appid': 
        case 'social-fb-secret': 
        case 'social-fb-pageid': 
        case 'social-fb-token': 
            if ($this->old_value != $this->s_value) {
                self::$lock = $this->s_name;
                // записываем в кеш без записи в DB
                self::setParam($this->s_name, $this->s_value,true,true);
                // Готовим указания браузеру
                $Fail = Social::fbCheck() 
                    ? array()
                    : array('refresh'=>true);
                // считываем кэш                
                $value = self::getCachedParam($this->s_name);
                if ($this->s_value != $value) {
                    $Fail['value'] = $value;
                    $this->s_value = $value;
                }
            }
            break;
        
        case 'google_analytics':
        case 'Yandex_Metrics':
            if ($rawtext && strpos($rawtext, '<script')===false)
                $this->s_value  = htmlspecialchars('<script type="text/javascript">'.$rawtext
                    .(strpos($rawtext, '</script>')===false?'</script>':''),ENT_QUOTES,'utf-8');
            break;
        case 'email-us':
        case 'admin-email':
        case 'sender-email':
        case 'sales-manager-email':
        case 'contact-footer-email':
            $to = array_filter(preg_split('/[;, ]+/', $this->s_value));
            $validator = new CEmailValidator();
            $count = 0;
            foreach($to as $email) {
                if (! $validator->validateValue($email)) {
                    $Fail = 'Не корректный электронный адрес';
                    break;
                }
                $count++;
            }
            if (empty($Fail))
                if ($name=='contact-footer-email' && $count!=1)
                    $Fail = 'Не корректный электронный адрес';
            break;
        case 'link-to-facebook' :
        case 'link-to-twitter'  :
        case 'link-to-vkontakte':
        case 'link-to-rss'      :
        case 'link-to-youtube'  :
        case 'link-sequence'    :
            Yii::app()->cache->delete('footer-links');
            break;
        case 'background-image'    :
            if (empty($rawtext)) break;
            $param = Setting::getCachedParam('background-image-hash');
            $today = date('Ymd');
            // В параметре хранится hash - чтобы изменённая картинка не кешировалась
            if (preg_match('/^(\?((\d{8,8})(\d\d?)?)?)?$/', $param, $matches)
            &&  isset($matches[3]) && $matches[3]==$today)
                    $next = isset($matches[4]) ? $matches[4]+1 : 1;
            else
                    $next = '';
            Setting::setParam('background-image-hash','?'.$today.$next,true);
            break;
        }
        if ($this->s_cache && (is_array($Fail) || empty($Fail)))
            Yii::app()->cache->set('setting:'.$this->s_name, $this->s_value);
        return $Fail;
    }
    
}