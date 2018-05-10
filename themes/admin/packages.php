<?php
/**
 * Client script packages.
 */

$themeName = basename(dirname(__FILE__));
$themeBase = 'theme_'.$themeName;
$themeAssets = 'webroot.themes.'.$themeName.'.assets';
$themeUpdate = $themeBase.'_update';
return array(
	'jquery' => array(
		'basePath' => 'https://ajax.googleapis.com/ajax/libs/jquery/',
		'baseUrl' => 'https://ajax.googleapis.com/ajax/libs/jquery/',
		'js'=>array('1.8.1/jquery.min.js'),
	),
    $themeBase => array(
        'basePath' => $themeAssets,
        'css' => array(
            'css/css_compiled/photon-min.css',
            'css/css_compiled/photon-min-part2.css?20131202',
            'css/css_compiled/photon-responsive-min.css',
            'css/admin.css?20131223',
            //'css/whhglyphs.css',
            'css/kpdcms2.css',
            ),
        'js' => array(
            'js/tabs-base-hack.js',
            "js/plugins/jquery.pnotify.min.js",
            "js/plugins/xbreadcrumbs.js",
            "js/plugins/jquery.mousewheel.min.js",
            "js/plugins/jquery.mCustomScrollbar.js",
            "js/plugins/jquery.cookie.js",
            "js/plugins/jquery.jstree.js",
            "js/common.js", // боковое меню
            "studio/clear.js", // clear
            //'js/whhglyphs-ie7.js',
            
            //'js/bootstrap/bootstrap.min.js', // поведение 
            //'js/bootstrap/bootstrap.min.js', // закоментировать для elfinder
            
            //'js/jquery.ba-bbq.min.js',
            
//            "js/plugins/modernizr.custom.js",
//            "js/plugins/less-1.3.1.min.js",
//            "js/plugins/jquery.maskedinput-1.3.min.js",
//            "js/plugins/jquery.autotab-1.1b.js",
//            "js/plugins/charCount.js",
//            "js/plugins/jquery.textareaCounter.js",
            
//            'js/plugins/elrte.min.js',
//            'js/plugins/elrte.ru.js',
            
//            "js/plugins/jquery-picklist.min.js",
//            "js/plugins/jquery.validate.min.js",
//            "js/plugins/additional-methods.min.js",
//            "js/plugins/jquery.form.js",
//            "js/plugins/jquery.metadata.js",
//            "js/plugins/jquery.mockjax.js",
//            "js/plugins/jquery.uniform.min.js",
//            "js/plugins/jquery.tagsinput.min.js",
            
//            "js/plugins/jquery.rating.pack.js",
//            "js/plugins/farbtastic.js",
//            "js/plugins/jquery.timeentry.min.js",
//            "js/plugins/jquery.dataTables.min.js",
//            "js/plugins/dataTables.bootstrap.js",
//            "js/plugins/jquery.mousewheel.min.js",
            
//            "js/plugins/jquery.flot.js",
//            "js/plugins/jquery.flot.stack.js",
//            "js/plugins/jquery.flot.pie.js",
//            "js/plugins/jquery.flot.resize.js",
//            "js/plugins/raphael.2.1.0.min.js",
//            "js/plugins/justgage.1.0.1.min.js",
//            "js/plugins/jquery.qrcode.min.js",
            
//            "js/plugins/jquery.clock.js",
//            "js/plugins/jquery.countdown.js",
//            "js/plugins/jquery.jqtweet.js",
//            "js/plugins/prettify/prettify.js",
//            "js/plugins/mfupload.js",

        ),
        'depends' => array('bootstrap-modal', 'jquery','jquery.ui'),
    ),
    'widgets' => array(
        'basePath' => $themeAssets,
        'js' => array(
            "js/plugins/jquery.clock.js",
            "js/plugins/jquery.qrcode.min.js",
            "studio/initWidgets.js",
        ),
        'depends' => array('jquery','jquery.ui'),
    ),
    'welcome' => array(
        'basePath' => $themeAssets,
        'js' => array('js/welcome.js'),
        'depends' => array('jquery'),
    ),
    $themeUpdate => array( // Используется при редактировании объектов в админке
        'basePath' => $themeAssets,
        'js' => array(
            'js/plugins/select2.js',
            'js/plugins/bootstrapSwitch.js', // переключатели
            'js/plugins/bootstrap-fileupload.min.js',
            'js/bootstrap/bootstrap-tooltip.js',
            'js/plugins/jquery.uniform.min.js', // checkboxes см.company._form
            'studio/update.js', // select2 и Удаление фотографий
            ),
        'depends' => array($themeBase),
    ),
    'switchEditor' => array(
        'basePath' => $themeAssets,
        'js' => array(
            'studio/editors.js',
        ),
        'depends' => array($themeBase),
    ),
    'elfinder' => array(
        'basePath' => $themeAssets,
        'js' => array(
            'js/plugins/elfinder.min.js',
            'js/plugins/elfinder.ru.js',
        ),
        'css' => array(
            'css/plugins/elfinder.css',
        ),
        'depends' => array($themeBase),
    ),
    'elrte' => array(
        'basePath' => $themeAssets,
        'js' => array(
            'js/plugins/elrte.min.js',
            'js/plugins/elrte.ru.js',
            'studio/elrte.js',
        ),
        'depends' => array($themeBase, 'elfinder'),
    ),

    // bootstrap нужен для работы модальных окон и прочего, конфликтует с elFinder
    'bootstrap' => array(
        'basePath' => $themeAssets,
        'js' => array(
            'js/bootstrap/bootstrap.min.js',
        ),
        'depends' => array($themeBase),
    ),
    'bootstrap-transition' => array( // плавные переходы, например в аккордионе
        'basePath' => $themeAssets,
        'js' => array(
            'js/bootstrap/bootstrap-transition.js',
        ),
        'depends' => array($themeBase),
    ),
    'bootstrap-collapse' => array( // аккордеон
        'basePath' => $themeAssets,
        'js' => array(
            'js/bootstrap/bootstrap-collapse.js',
        ),
        'depends' => array($themeBase,'bootstrap-transition'),
    ),
    'bootstrap-tooltip' => array( 
        'basePath' => $themeAssets,
        'js' => array(
            'js/bootstrap/bootstrap-tooltip.js',
        ),
    ),
    'googleMap' => array(
        'baseUrl'=>'http://maps.googleapis.com/maps/api',        
        'js'=>array('js?libraries=places&sensor=false&language=ru')
        // jquery.ui.map.min.js Конфликтует с jquery.yiiactiveform.js Перестаёт работать как положено submit
    ),
    'admin-index' => array(
        'basePath' => $themeAssets,
        'js'=>array('studio/index.js'), // select2
        'depends' => array($themeUpdate),
    ),
    'admin-sort' => array(
        'basePath' => $themeAssets,
        'js'=>array('studio/sort.js'),
        'depends' => array('admin-index'),
    ),
    'panel-page' => array(
        'basePath' => $themeAssets,
        'css' => array('css/jstree.css'),
        'js'=>array('studio/jstree.js?20131213','studio/page.js'),
        'depends' => array('admin-sort'),
    ),
    'panel-menu' => array(
        'basePath' => $themeAssets,
        'css' => array('css/jstree.css'),
        'js'=>array('studio/jstree.js?20131213'
            ,'studio/menu.js'
            //,'studio/menulangs.js'
            ),
        'depends' => array('admin-sort'),
    ),
    'panel-category' => array(
        'basePath' => $themeAssets,
        'css' => array('css/jstree.css'),
        'js'=>array('studio/jstree.js?20131213','studio/category.js'),
        'depends' => array('admin-sort'),
    ),
    'panel-setting' => array(
        'basePath' => $themeAssets,
        'css' => array('css/jstree.css'),
        'js'=>array('studio/jstree.js?20131213','studio/setting.js?20131115'),
        'depends' => array('admin-index'),
    ),
    'jcrop' => array(
        'basePath' => $themeAssets,
        'css'=>array('js/Jcrop/jquery.Jcrop.css','js/Jcrop/jcropHelper.css'),
        'js'=>array('js/Jcrop/jquery.Jcrop.js','js/Jcrop/jcropHelper.js'),
        'depends' => array($themeUpdate,'bootstrap-modal'),
    ),
    'shortcutBar' => array(
        'basePath' => $themeAssets,
        'js'=>array('studio/shortcutBar.js'),
        'depends' => array('jquery'),
    ),
    'forgotPass' => array(
        'basePath' => $themeAssets,
        'js'=>array('studio/forgotPass.js'),
        'depends' => array('jquery','bootstrap'),
    ),
    'bootstrap-modal' => array( // плавные переходы, например в аккордионе
        'basePath' => $themeAssets,
        'js' => array(
            'js/bootstrap/bootstrap-modal.js',
        ),
    ),
    'only-jcrop' => array(
        'basePath' => $themeAssets,
        'css'=>array('js/Jcrop/jquery.Jcrop.css'),
        'js'=>array('js/Jcrop/jquery.Jcrop.js'),
        'depends' => array($themeUpdate),
    ),
    'many_crop' => array(
        'basePath' => $themeAssets,
        'css'=>array('js/Jcrop/manyJcrop.css'),
        'js'=>array('js/Jcrop/manyJcrop.js'),
        'depends' => array('only-jcrop','bootstrap-modal'),
    ),
    'photo_sort' => array(
        'basePath' => $themeAssets,
        'js'=>array('studio/photoSort.js'),
        'depends' => array('jquery',$themeUpdate),
    ),
    'colorpicker' => array(
        'basePath' => $themeAssets,
        'js'=>array('js/plugins/farbtastic.js'),
    ),
);