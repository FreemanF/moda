<?php
//defined('CONSOLECOMMANDS') or define('CONSOLECOMMANDS', true);

$main  = dirname(__FILE__);
$local = $main.'/local.php';
$config = array_merge_recursive(
    is_file($local) ? require $local : array(),
    array(
        'basePath'=>dirname(dirname(__FILE__)),//.DIRECTORY_SEPARATOR.'..',
        'preload'=>array('log'),
        'components' => array(
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'CFileLogRoute',
                        'logFile'=>'cron.log',
                        'levels'=>'error,warning,info',
                        'except'=>'system.caching.*',
                    ),
                ),
            ),
            'db'=>array(
                'enableProfiling' => false,
                'enableParamLogging' => false,
//                'enableProfiling' => true,
//                'enableParamLogging' => true,
            ),
        ),
        'commandMap'=>array(
            'migrate'=>array(
                'class'=>'system.cli.commands.MigrateCommand',
                'migrationPath'=>'application.migrations',
                'migrationTable'=>'{{tbl_migration}}',
                'connectionID'=>'db',
                'templateFile'=>'application.migrations.template', // <- здесь путь к файлу шаблона
            ),
        ),        
    )
);
$config['name'] = 'Empty.kpd Console Application';

//file_put_contents(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config-console.txt', print_r($config,true));
return $config;