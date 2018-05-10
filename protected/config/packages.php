<?php
/**
 * Client script packages.
 */

return array(
    'studio' => array(
        'basePath' => 'application.views.assets',
        'css' => array(), //'css/main.css','css/form.css'),
    ),
    'jcarousel' => array(
        'basePath' => 'application.views.assets',
        'js' => array('js/jquery.jcarousel.js'),
        'depends' => array('jquery'),
    ),
    'slides' => array(
        'basePath' => 'application.views.assets',
        'js' => array('js/slides.min.jquery.js'),
        'depends' => array('jquery'),
    ),
    'fancybox' => array(
        'basePath' => 'application.views.assets',
        'css' => array('js/fancybox/jquery.fancybox.css'),
        'js' => array('js/fancybox/jquery.fancybox.js'),
        'depends' => array('jquery'),
    ),
    'autocomplete' => array(
        'basePath' => 'application.views.assets',
        'css' => array('js/autocomplete/jquery.autocomplete.css'),
        'js' => array('js/autocomplete/jquery.autocomplete.pack.js','js/autocomplete/search.js'),
        'depends' => array('jquery'),
    ),
    'adminAutocomplete' => array(
        'basePath' => 'application.views.assets',
        'css' => array('js/autocomplete/jquery.autocomplete.css'),
        'js' => array('js/autocomplete/jquery.autocomplete.pack.js','js/autocomplete/adminSearch.js?20140423'),
        'depends' => array('jquery'),
    ),
    'masonry' => array(
        'basePath' => 'application.views.assets',
        'js' => array('js/jquery.masonry.min.js'),
        'depends' => array('jquery'),
    ),
    'chartjs' => array(
        'basePath' => 'application.views.assets',
        'js' => array(
            'js/chartjs/globalize.min.js',
            'js/chartjs/dx.chartjs.debug.js'),
        'depends' => array('jquery'),
    ),
);
