<?php
/**
 * Client script packages.
 */
$themeName = basename(dirname(__FILE__));
$themeBase = 'theme_'.$themeName;
return array(
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
/*KPDMFU-START-APPEND-PACKAGE*/
/*KPDMFU-FINAL-APPEND-PACKAGE*/
);
