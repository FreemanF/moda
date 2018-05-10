<?php
$cs=Yii::app()->clientScript;
$cs->scriptMap=array(
    'jquery.js'=>false,
    'jquery.ui.js' => false,
    'jquery' => false,
//    'jquery.min.js'=>false,
);?>

<?php // Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php // Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php // Yii::app()->clientscript->scriptMap['jquery'] = $jquery; ?>
<?php $jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery'] = $jquery; ?>
<?php
    Yii::app()->clientscript->coreScriptPosition = CClientScript::POS_HEAD;
?>
<html lang="ru">
    <head>
    <meta charset="utf-8">
    <title>Ваш товар успешно добавлен - Модне кубло</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/assets/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/assets/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/assets/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/assets/favicon-16x16.png" sizes="16x16">
    <meta name="msapplication-TileColor" content="#000000" />
    <meta name="msapplication-TileImage" content="/assets/mstile-144x144.png" />
    <meta name="theme-color" content="#ffffff" />

    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>/css/bootstrap-theme.min.css">	
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>assets/build/main.css">
    <link href="<?php echo $this->themeCss; ?>bxslider/jquery.bxslider.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>/css/custom.css">
    <link rel="dns-prefetch" href="/assets/">
    <link rel="dns-prefetch" href="/avatars/">
    <link rel="dns-prefetch" href="/image-thumbnails/">

</head>
<body>
<!--[if lt IE 9]>
<div class="b-section b-section_bg_white">
    <div class="b-section__container">
        <div class="b-browser-update">
            <div class="b-browser-update__warning">
                <h4 class="b-browser-update__title">ВНИМАНИЕ!</h4>
                <b>Вы используете устаревшую версию браузера Internet Explorer</b>
                <p class="b-browser-update__text">
                    При использовании Internet Explorer 6, 7, 8 возможна некорректная и медленная работа сайта, часть функционала может быть недоступна.
                    Настоятельно Вам рекомендуем выбрать и установить любой из современных браузеров. Это бесплатно и займет всего несколько минут.
                </p>
            </div>
            <ul>
                <li class="b-browser-update__item">
                    <a class="b-browser-update__link" href="http://www.mozilla.com/firefox/" target="_blank">
                        <img alt="" height="53" itemprop="image" src="https://assets.shafastatic.net/img/update_browser/firefox_middle.png" width="53">
                        <span class="b-browser-update__title">Mozilla Firefox</span>
                    </a>
                </li><li class="b-browser-update__item b-browser-update__item_type_even">
                    <a class="b-browser-update__link" href="http://www.google.com/chrome" target="_blank">
                        <img alt="" height="53" itemprop="image" src="https://assets.shafastatic.net/img/update_browser/chrome_middle.png" width="53">
                        <span class="b-browser-update__title">Google Chrome</span>
                    </a>
                </li><li class="b-browser-update__item">
                    <a class="b-browser-update__link" href="http://www.opera.com/download/" target="_blank">
                        <img alt="" height="53" itemprop="image" src="https://assets.shafastatic.net/img/update_browser/opera_middle.png" width="53">
                        <span class="b-browser-update__title">Opera</span>
                    </a>
                </li><li class="b-browser-update__item b-browser-update__item_type_even">
                    <a class="b-browser-update__link" href="http://www.microsoft.com/windows/Internet-explorer/default.aspx" target="_blank">
                        <img alt="" height="53" itemprop="image" src="https://assets.shafastatic.net/img/update_browser/ie_middle.png" width="53">
                        <span class="b-browser-update__title">Internet Explorer</span>
                    </a>
                </li>
            </ul>
            <p class="b-browser-update__text">
                Если по каким либо причинам Вы не имеете доступа к возможности установки программ, то рекомендуем воспользоваться "portable" версиями браузеров. Они не требуют инсталляции на компьютер и работают с любого диска или вашей флешки: <a class="b-browser-update__ref" href="http://portableapps.com/apps/internet/firefox_portable" target="_blank">Mozilla Firefox</a> или <a class="b-browser-update__ref" href="http://portableapps.com/apps/internet/google_chrome_portable" target="_blank">Google Chrome</a>
            </p>
        </div>
    </div>
</div>
<![endif]-->

<script>
//    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
//    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
//    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
//    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
//
//    
//
//    ga('create', 'UA-45115692-1', {
//      'siteSpeedSampleRate': 50,
//      'cookieDomain': 'shafa.ua'
//    });
//    ga('set','&uid','438599');
//    ga('require', 'ecommerce', 'ecommerce.js');
//    ga('send', 'pageview');
</script>


    <div class="b-section">
        <div class="b-section__container">

            <header class="b-header">
                <div class="b-header__logo b-logo">
                    <a href="/" class="b-logo__link">
                        <svg class="b-logo__img">
                            <title>Modnekublo - Брендовые вещи доступно</title>
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shafa-logo"></use>
                        </svg>
                    </a>
                    <span class="b-logo__slogan">
                            Брендовые вещи Доступно
                        </span>
                </div>
            </header>

            
        </div>
    </div>
    


    
    <div class="b-section">
        <div class="b-section__container">
            <div class="b-main" style="text-align: center">
                <h1 class="b-block">Ваше объявление было добавлено</h1>

                <p class="b-block">
                    После прохождения модерации объявление появится в каталоге
                    <br>
                    <br>
                    <a href="/new" class="b-button">
                        Добавить еще объявление
                    </a>
                </p>

                <ul class="b-block">
                    <li><a href="<?php echo 'product/'.$this->prod->category->parent->c_sef.'/'.$this->prod->category->c_sef.'/'.$this->prod->pd_sef;?>">Перейти на страницу товара</a></li>
                    <li><a href="/">Перейти на главную страницу</a></li>
                </ul>

            </div>
        </div>
    </div>


<script>
    window.staticUrl = '<?php echo $this->themeCss; ?>/assets/';
    window.spriteUrl = '<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4';
</script>


<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>





<script>
    //ga('send', 'event', 'Product', 'Added new item', 'Added new item', '1');
</script>




</body>
</html>
