<?php

$_root = dirname(__FILE__);

$env = null;
$_env = $_root. '/.env';
if (is_file($_env))
    $env = trim(file_get_contents($_env));
if (empty($env)) 
    $env = 'production';
else {
    define('YII_DEBUG', true);
    //define('YII_TRACE_LEVEL', 3);
    define('YII_ENABLE_ERROR_HANDLER', true);
    define('YII_ENABLE_EXCEPTION_HANDLER', true);    
}

//function profiling() {
//    $aParam = func_get_args();
//    $time = array_shift($aParam);
//    $aMsg = '';
//    foreach ($aParam as $param) {
//        if (is_string($param)) {$aMsg .=$param;} else {$aMsg .= var_export($param, true);};
//    }
//    file_put_contents('server.log', date('D, d M Y H:i:s',time()).($time ? ' ['.$time.']':'')." - $aMsg \r\n", FILE_APPEND);
//}

define('YII_BASE',DIRECTORY_SEPARATOR.'framework'.DIRECTORY_SEPARATOR.'yiilite.php');
define('YII_CFG', DIRECTORY_SEPARATOR.'protected'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.$env.'.php');
$yii=$_root.YII_BASE;
$config=$_root.YII_CFG;
if (!file_exists($config))
    die("Config file is not found.");

// remove the following line when in production mode
// defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();
