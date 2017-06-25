<?php

$main  = dirname(__FILE__);
$local = $main.'/local.php';
$main  = $main.'/main.php';
$config = array_merge_recursive(
    is_file($main) ? require $main : array(), 
    is_file($local) ? require $local : array(),
    array(
        'components' => array(
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array('class'=>'CFileLogRoute'),
                ),
            ),        
            'db'=>array(
                'enableProfiling' => false,
                'enableParamLogging' => false,
            ),
        )
    ));
////file_put_contents($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'config-site.log', print_r($config,true));
//file_put_contents(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config-site.txt', print_r($config,true));
return $config;

