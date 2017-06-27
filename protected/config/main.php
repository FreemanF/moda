<?php

// рядом с index.php создайте .env в котором разместите название конфига: develop

$configPath  = dirname(__FILE__).DIRECTORY_SEPARATOR;
$packageFile = $configPath.'packages.php'; // Здесь описаны скрипты общие для всего сайта (включая админку)
$packages    = is_file($packageFile) ? require($packageFile) : array();

$themesPath = $configPath.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'themes'.DIRECTORY_SEPARATOR;

function includePackages($themeName,$themesPath,&$packages) {
    $packageFile = $themesPath.$themeName.DIRECTORY_SEPARATOR.'packages.php';
    if (is_file($packageFile))
        $packages = array_replace_recursive($packages,require($packageFile));
}

// Единственное место, где указано название внешней темы сайта
includePackages($themeFrontEnd = 'main',$themesPath,$packages);
// Единственное место, где указано название темы админки
includePackages($themeBackEnd  = 'admin',$themesPath,$packages);

$kpdIPs = array(
    '127.0.0.1',
    '::1',
    '159.224.220.191', //
    '192.168.1.0/24', //
);

return array(
    'defaultController' => 'site',
//    'onBeginRequest'    => array('Maintanance','allowAdmin'),
    //'onBeginRequest'    => array('Maintanance','denyAll'),
    'params'=>array(
        'feedbackHref'=>'',
        'defaultPhoto' => 'themes/admin/assets/images/photon/default_img.jpeg',
        'minSizePhoto' => 10,
        'maxSizePhoto' => 3072,
        'themeFrontEnd'=>$themeFrontEnd,
        'themeBackEnd'=>$themeBackEnd,
        'error404' => 'К сожалению, такой страницы не существует. Пожалуйста, попробуйте ещё раз...',
        //'theme'=>$themeFrontEnd,
        'crontab' => array(
            'debug' => true,
	),
        'translatedLanguages'=>array(
            'ru'=>'Рус',
            'en'=>'Англ',
            //'de'=>'Deutsch',
        ),
        'defaultLanguage'=>'ru',
    ),
    'preload'=>array('log','debug'),
    'components'=>array(
        'user' => array(
	    'class'=>'CachedWebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('admin/user/login'),
        ),
	'debug' => array(
            'class' => 'ext.yii2-debug.Yii2Debug',
            'allowedIPs' => $kpdIPs,
        ),
        'email'=>array(
            'class'=>'application.extensions.email.Email',
            'delivery'=>'php', //Will use the php mailing function.  
            //May also be set to 'debug' to instead dump the contents of the email into the view
        ),      
        'errorHandler'=>array(
            //'errorAction'=>'site/error',
            'errorAction'=>'pages',
        ),
//      Для мультиязычности
//        'request'=>array(
//            'class'=>'DLanguageHttpRequest',
//        ),
        'urlManager'=>array(
            //'class'=>'DLanguageUrlManager', // Для мультиязычности
            'urlFormat'=>'path',
            'rules'=>array(
                array('sitemap/index', 'pattern'=>'sitemap.xml', 'urlSuffix'=>''),
                /*-----------------------Кряк для фильтра----------------------------*/
                'admin/<controller:\w+>/<action:\w+>'=>'admin/<controller>/<action>',
                /*-------------------------------------------------------------------*/
                'admin' => 'admin/admin',
                //очистка всего кэша
                'clearCachePhoto/*' => 'admin/media/clearCachePhoto',
                //очистка кэша, у которого истек срок действия params["monthsAgoCachePhoto"]
                'media/*' => 'admin/media/index',
		'login' => 'site/login',
                'works/<sef:[^\/]*>'=>'works/view',
                'news/<sef:[^\/]*>'=>'news/view',
            ),
            //'appendParams'=>false,
            'showScriptName' => false,
            'caseSensitive' => true,
        ),
        //'clientScript'=>array(
            //'scriptMap'=>array(
            //    'register.js'=>'site.min.js',
            //    'login.js'=>'site.min.js',
            //),
        //),
        'clientScript' => array(
            //'class' => 'ext.NLSClientScript',
            //'mergeIfXhr' => true, //def:false, if true->attempts to merge the js files even if the request was xhr (if all other merging conditions are satisfied)
            //'mergeAbove' => 1, //def:1, only "more than this value" files will be merged,
            'packages'=>$packages,
        ),
        'log'=>array(
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'translation, trace, error, warning',
                    'logFile'=>'translations.log',
                ),
            ),
        ),        
       'messages' => array(
            //'class' => 'CDbMessageSource',
            'onMissingTranslation' => array('Translation', 'missing'),
            //'sourceMessageTable' => 'source_message',
            //'translatedMessageTable' => 'message'
       ),
    ),
    'modules'=>array(
	    'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'12345',
            'ipFilters'=>array(),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
        ),
        'webshell' => array(
            'class' => 'ext.yiiext.modules.webshell.WebShellModule',
            // when typing 'exit', user will be redirected to this URL
            'exitUrl' => '/',
            // custom wterm options
            'wtermOptions' => array(
                // linux-like command prompt
                'PS1' => '%',
            ),
            // additional commands (see below)
            'commands' => array(
                'test' => array('js:function(params){console.log(params);return "Hello, world!";}', 'Just a test.'),
            ),
            // uncomment to disable yiic
            // 'useYiic' => false,
            // adding custom yiic commands not from protected/commands dir
            'yiicCommandMap' => array(
                'migrate' => array(
                    'class' => 'system.cli.commands.MigrateCommand',
                    'interactive'=>false,
                    'migrationPath'=>'application.migrations',
                    'migrationTable'=>'{{tbl_migration}}',
                    'connectionID'=>'db',
                    'templateFile'=>'application.migrations.template', // <- здесь путь к файлу шаблона
                ),
                //'message' => array('class' => 'system.cli.commands.MessageCommand'),
                //'webapp' => array('class' => 'system.cli.commands.WebAppCommand'),
                
                'shell' => array('class' => 'system.cli.commands.ShellCommand'),
                //'email' => array(
                //    'class' => 'ext.mailer.MailerCommand',
                //    'from' => 'sam@rmcreative.ru',
                //),
            ),
            'ipFilters' => $kpdIPs,
            // Открыть проверку на продакшине после базовых миграций
//            'checkAccessCallback' => function($controller, $action){
//                return Yii::app()->user->isDBManager;
//            }
        ),
    ),
);
