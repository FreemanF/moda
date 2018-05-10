<?php

class Maintanance
{
    public static $route = array('/site/maintanance');
    public static $active = false; // Запрещаем ошибки например из webshell (см.Pages::actionIndex)
    
    public static function checkUrl($urls=array()) {
        $request = Yii::app()->getRequest();
        list($module) = explode('/', ltrim($request->getRequestUri(), '/'));
        return in_array($module, $urls, true);
    }
    public static function allowAdmin($event) {
        self::$active = true;
        if (!self::checkUrl(array('admin','assets','media','debug','storage','webshell'))) {
            Yii::app()->catchAllRequest = self::$route;
        }
    }
    public static function allowAll($event) {
    }
    public static function denyAll($event) {
        self::$active = true;
        if (!self::checkUrl(array('assets','media','debug','storage','webshell'))) {
            Yii::app()->catchAllRequest = self::$route;
        }
    }
}