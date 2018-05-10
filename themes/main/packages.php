<?php
/**
 * Client script packages.
 */
$themeName = basename(dirname(__FILE__));
$themeBase = 'theme_'.$themeName;
return array(
	'jquery.js' => array(
		'basePath' => '',
        'js'=>array('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'),
	),
	'jquery' => array(
		'basePath' => 'https://ajax.googleapis.com/ajax/libs/jquery/',
		'baseUrl' => 'https://ajax.googleapis.com/ajax/libs/jquery/',
		'js'=>array('1.9.1/jquery.min.js'),
	),
    'adminPanel' => array(
        'basePath' => 'webroot.themes.'.$themeName.'.assets',
        'css' => array('css/adminPanel.css'),
    ),
    $themeBase => array(
        'basePath' => 'webroot.themes.'.$themeName.'.assets',
        'css' => array('css/style.css'),
        'depends'=>array('jquery'),
    ),
    'fancyBox'  => array(
        'basePath' => 'webroot.themes.'.$themeName.'.assets',
        'css' => array('js/fancybox/jquery.fancybox-1.3.4.css'),
        'js'  => array('js/fancybox/jquery.fancybox-1.3.4.pack.js'),
        'depends'=>array('jquery'),
    ),
    'miniGallery' => array(
        'basePath' => 'webroot.themes.'.$themeName.'.assets',
        'css' => array('css/miniGallery.css'),
        'js'  => array('js/miniGallery.js'),
        'depends'=>array('fancyBox'),
    ),
    'customScripts' => array(
        'basePath' => 'webroot.themes.'.$themeName.'.assets',
        'js'  => array('css/assets/build/global.js','css/assets/build/shared.js','css/assets/build/messages.js'),
        'depends'=>array('jquery'),
    ),
/*KPDMFU-START-APPEND-PACKAGE*/
/*KPDMFU-FINAL-APPEND-PACKAGE*/
);
