<?php

/**
 * @author ElisDN <mail@elisdn.ru>
 * @link http://www.elisdn.ru
 */
class DMultilangHelper
{
    private static $_enabled;
    
    public static function enabled($newvalue = null)
    {
        if (is_null(self::$_enabled))
            self::$_enabled = count(Yii::app()->params['translatedLanguages']) > 1;
        if (is_null($newvalue))
            return self::$_enabled;
        $oldvalue = self::$_enabled;
        self::$_enabled = $newvalue;
        return $oldvalue;
    }
 
    public static function suffixList($full=false,$prefix='_')
    {
        $list = array();
        $enabled = self::enabled();
 
        foreach (Yii::app()->params['translatedLanguages'] as $lang => $name)
        {
            if (!$full && $lang === Yii::app()->params['defaultLanguage']) {
                $suffix = '';
                $list[$suffix] = $enabled ? $name : '';
            } else {
                $suffix = $prefix . $lang;
                $list[$suffix] = $name;
            }
        }
 
        return $list;
    }
 
    public static function nameList($name='')
    {
        $list = array();
        foreach (Yii::app()->params['translatedLanguages'] as $lang => $langname)
            $list[$lang] = $name.'_'.$lang;
        return $list;
    }
 
    public static function processLangInUrl($url)
    {
        if (self::enabled())
        {
            $domains = explode('/', ltrim($url, '/'));
 
            $isLangExists = in_array($domains[0], array_keys(Yii::app()->params['translatedLanguages']));
            //$isDefaultLang = $domains[0] == Yii::app()->params['defaultLanguage'];
 
            if ($isLangExists)// && !$isDefaultLang)
            {
                $lang = array_shift($domains);
                Yii::app()->setLanguage($lang);
            } elseif (!$isLangExists && !in_array ($domains[0],array('admin','media','debug','assets'),true))
                // Принудительно перенаправляем на язык по умолчанию
                Yii::app()->request->redirect(
                    '/'.Yii::app()->params['defaultLanguage'].($url=='/'?'':$url));
              //  Yii::app()->setLanguage(Yii::app()->params['defaultLanguage']);
                
 
            $url = '/' . implode('/', $domains);
        }
        //Yii::log("URL:$url");
        return $url;
    }
 
    public static function addLangToUrl($url)
    {
        if (self::enabled())
        {
            $domains = explode('/', ltrim($url, '/'));
            $isHasLang = in_array($domains[0], array_keys(Yii::app()->params['translatedLanguages']));
            $isDefaultLang = Yii::app()->getLanguage() == Yii::app()->params['defaultLanguage'];

            if ($isHasLang && $isDefaultLang)
                array_shift($domains);

            if (!$isHasLang && !$isDefaultLang)
                array_unshift($domains, Yii::app()->getLanguage());

            $url = '/' . implode('/', $domains);
        }
        return $url;
    }
}
