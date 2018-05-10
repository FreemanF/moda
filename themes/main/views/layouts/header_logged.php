<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Модне кубло</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
<?php // Yii::app()->clientScript->registerCoreScript('jquery',CClientScript::POS_END); ?>
<?php // Yii::app()->clientScript->registerCoreScript('jquery.ui',CClientScript::POS_END); ?>
    <?php
            if ($this->noindex)  echo '        <meta name="robots" content="noindex">'."\n";
            if ($this->nofollow) echo '        <meta name="robots" content="nofollow">'."\n";
            if (!empty($this->meta['keywords'])) echo '        <meta name="keywords" content="'.CHtml::encode($this->meta['keywords']).'" />'."\n";
            if (!empty($this->meta['description'])) echo '        <meta name="description" content="'.CHtml::encode($this->meta['description']).'" />'."\n"; 
    ?>        <title><?php echo CHtml::encode($this->meta['title']); ?></title>
    <meta name="description" content="Модне кубло - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <meta property="og:title" content="Модне кубло"/>
    <meta property="og:type" content="website"/>

    <meta property="og:url" content="https://modnekublo.com.ua/my/clothes"/>
    <meta property="og:image" content="<?php echo $this->themeCss; ?>/assets/img/shafa-og-image.png"/>
    <meta property="og:description" content="Модне кубло - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <link rel="image_src" href="<?php echo $this->themeCss; ?>/assets/img/shafa-og-image.png"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Модне кубло"/>
    <meta name="twitter:description" content="Модне кубло - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <meta name="twitter:image" content="<?php echo $this->themeCss; ?>/assets/img/shafa-og-image.png"/>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="Modnekublo">

    <link rel="shortcut icon" href="/assets/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->themeCss; ?>/assets/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->themeCss; ?>/assets/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->themeCss; ?>/assets/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->themeCss; ?>/assets/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->themeCss; ?>/assets/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->themeCss; ?>/assets/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->themeCss; ?>/assets/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->themeCss; ?>/assets/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->themeCss; ?>/assets/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?php echo $this->themeCss; ?>/assets/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo $this->themeCss; ?>/assets/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo $this->themeCss; ?>/assets/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo $this->themeCss; ?>/assets/favicon-16x16.png" sizes="16x16">
    <meta name="msapplication-TileColor" content="#000000"/>
    <meta name="msapplication-TileImage" content="<?php echo $this->themeCss; ?>/assets/mstile-144x144.png"/>
    <meta name="theme-color" content="#ffffff"/>
    <meta name="google-site-verification" content="" />
    <meta name="p:domain_verify" content=""/>
    <meta name="mailru-verification" content=""/>
    <meta name="yandex-verification" content=""/>
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>/css/bootstrap-theme.min.css">	
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>assets/build/main.css">
    <link href="<?php echo $this->themeCss; ?>bxslider/jquery.bxslider.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>/css/custom.css">
    <link rel="dns-prefetch" href="<?php echo $this->themeCss; ?>assets/">
    <link rel="dns-prefetch" href="/avatars/">
    <link rel="dns-prefetch" href="/image-thumbnails/">
    <?php
    // Пордключаем пакеты
//    $cs = Yii::app()->clientScript;
//    foreach ($this->includePackages as $package)
//        $cs->registerPackage($package);
//    // Инициируем переменные JS
//    if ($this->jsVars) {
//        echo "<script type=\"text/javascript\">\n";
//        foreach ($this->jsVars as $name => $value)
//            echo (strpos($name, '[') === false ? 'var ' : '    ') . "$name = $value;\n";
//        echo "</script>\n";
//    }
//
//    echo Setting::getParam("google_analytics");
    ?>
</head>
<body>

<div id="fb-root"></div>
<script type="text/javascript" src="//connect.facebook.net/uk_UA/all.js"></script>
<!--<a href="https://www.facebook.com/v2.9/dialog/oauth?client_id=741607065872333&redirect_uri=http://test-pro.adr.com.ua">Login</a>-->
<div class="b-section">
        <div class="b-section__container">
            

<header class="b-header">
    <div class="b-header__logo b-logo">
        <a href="/" class="b-logo__link">
            <img class="b-logo__img" src="<?php echo $this->themeCss; ?>/assets/logo.png">
        </a>
        <span class="b-logo__slogan">
                Брендовые вещи Доступно
            </span>
    </div>
    <div class="b-header__links b-header-links"><a href="/msg/" class="b-header-links__icon">
                <svg viewBox="0 0 25.001 25.001">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--messages"/>
                </svg>
                <?php
//                $message_list = Messages::model()->findAllByAttributes(array('ms_recipient'=>Yii::app()->user->id,'ms_readed'=>0));
//                if (!empty($message_list))
//                {
//                    $count_new_messages = count($message_list);
//                    echo "<span class='b-header-links__counter'>$count_new_messages</span>";
//                }
                $this->renderPartial("//layouts/count_msgs");
                ?>
                
            </a>
            <a href="/my/favourites" class="b-header-links__icon">
                <svg viewBox="0 0 24 22.004">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--heart"/>
                </svg>
            </a>
            <div class="b-header-links__profile js-profile-menu js-dropdown">
                <svg viewBox="0 0 6.8 11" class="b-header-links__profile-arrow">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"/>
                </svg>
                <div class="b-header-links__profile-image-wrapper">
                    <img class="b-header-links__profile-image" alt="<?php echo Yii::app()->user->name; ?>" src="https://image.flaticon.com/icons/png/128/145/145845.png" title="<?php echo Yii::app()->user->name; ?>">
                </div>
                <ul class="b-header-links__profile-list b-profile-menu">
    <li class="b-profile-menu__item">
        <a class="b-profile-menu__link" href="/my/clothes">Мои вещи</a>
    </li>

    <li class="b-profile-menu__item">
        <a class="b-profile-menu__link" href="/my/settings">Мои настройки</a>
    </li>

    <li class="b-profile-menu__item">
        <a class="b-profile-menu__link" href="/my/reviews">Мои отзывы</a>
    </li>

    <li class="b-profile-menu__item">
        <a class="b-profile-menu__link" href="/profile/<?php echo Yii::app()->user->id; ?>">Профиль</a>
    </li>
    

    <li class="b-profile-menu__item b-profile-menu__item_type_logout js-logout-link">
        <a href="#" class="b-profile-menu__link js-logout-link" data-form-id="logout-form">Выйти</a>
        <form accept-charset="UTF-8" action="site/logout" id="logout-form" method="post">
            <input name="csrfmiddlewaretoken" value="DN4enDuCfu4kUxrX6sNu0ytPkOPxS35tGoUSim5ekSJc7VrfRsviMxxLyh75guiF" type="hidden">
        </form>
    </li>
</ul>
            </div></div>
</header>
<nav class="b-nav">
    <div class="b-nav__cell">
        <form action="/women" class="b-search" style="display: none;">
            <input placeholder="Поиск" class="b-search__input" name="search_text" autocomplete="off" type="text">
            <svg viewBox="0 0 612 617.5" class="b-search__icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--search"/>
            </svg>
        </form>
        <div class="b-nav__mobile-menu js-catalog-mobile-menu js-dropdown">
            <svg viewBox="0 0 15 14" class="b-nav__burger">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--menu"/>
            </svg>
            <div class="b-mobile-menu">
    <ul class="b-mobile-menu__list">
        <li class="b-mobile-menu__item">
            <b class="b-mobile-menu__user-name"><?php echo Yii::app()->user->name; ?></b>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/page/kak-eto-rabotaet">
                Как это работает?
            </a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/women">Каталог</a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/new-arrivals">
                Новинки
            </a>
        </li>
    </ul>
    <ul class="b-mobile-menu__profile">
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/new">
                Добавить вещь
            </a>
        </li>

        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/my/clothes">
                Мои вещи
            </a>
        </li>

        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/my/settings">
                Мои настройки
            </a>
        </li>

        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/my/reviews">
                Мои отзывы
            </a>
        </li>

        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/profile/<?php echo Yii::app()->user->id; ?>">
                Профиль
            </a>
        </li>
        

        <li class="b-mobile-menu__item js-logout-link">
            <a class="b-mobile-menu__link js-logout-link" href="#" data-form-id="logout-form">Выход</a>
            <form accept-charset="UTF-8" action="site/logout" id="logout-form" method="post">
                <input name="csrfmiddlewaretoken" value="vKwGFTPb6CTgkJK4s4ecMXYARwxrvjw4ylmkACqNb0y8x7Kmd4W0yW2w5ZPZTKJg" type="hidden">
            </form>
        </li>
    </ul>
</div>
        </div>
<ul class="b-nav__list">
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Женская одежда
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_2">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Одежда</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/kupalniki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Купальники</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/nijnee-bele" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/platya">
                                    <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/platya-i-kostyumyi-dlya-tantsev" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/yubki">
                                    <span class="b-sub-nav-primary__link-text">Платья и костюмы для танцев</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/yubki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/mayki-i-futbolki">
                                    <span class="b-sub-nav-primary__link-text">Юбки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/djinsyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/rubashki-i-bluzy">
                                    <span class="b-sub-nav-primary__link-text">Джинсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/shortyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki">
                                    <span class="b-sub-nav-primary__link-text">Шорты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/bryuki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki/dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">Брюки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/sportivnaya-odejda" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/shorty">
                                    <span class="b-sub-nav-primary__link-text">Спортивная одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/svitera-djemperyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kofty">
                                    <span class="b-sub-nav-primary__link-text">Свитера, джемперы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/futbolki-i-mayki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Футболки и майки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/tuniki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Туники</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/bluzyi-i-rubashki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Блузы и рубашки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/kostyumyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Костюмы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/svadebnyie-platya" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Свадебные платья</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/platya" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Платья</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/plaschi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Плащи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/kurtki-puhoviki-uteplennyie-jiletyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Куртки, пуховики, утепленные жилеты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/shubyi-dublenki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Шубы, дубленки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/drugaya" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/drugoe">
                                    <span class="b-sub-nav-primary__link-text">Другие вещи</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Обувь</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/obuv-na-tanketke" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/tufli">
                                    <span class="b-sub-nav-primary__link-text">Обувь на танкетке</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/kedyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/baletki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кеды</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/krossovki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bosonozhki-i-shlepancy">
                                    <span class="b-sub-nav-primary__link-text">Кроссовки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/bosonojki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sandalii.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Босоножки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/sliponyi-mokasinyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/sapogi-i-botinki">
                                    <span class="b-sub-nav-primary__link-text">Слипоны, мокасины</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/sandalii-sabo" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/polusapozhki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Сандалии, сабо</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/baletki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rezinovye-sapogi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Балетки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/tufli" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/krossovki-i-kedy/krossovki">
                                    <span class="b-sub-nav-primary__link-text">Туфли</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/botilonyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/krossovki-i-kedy/kedy">
                                    <span class="b-sub-nav-primary__link-text">Ботильоны</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/kantri" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/mokasiny.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кантри</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/polusapojki-botinki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/snikersy.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Полусапожки, ботинки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/sapogi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tapochki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Сапоги</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick2" href="/category/jenskaya-odejda/" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women">
                                Вся женская одежда
                            </a>
                        </li>
                        <li class="b-sub-nav-secondary__item">
                            <a href="/brands" class="b-sub-nav-secondary__link js-ga-onclick2" data-event-action="All brands from dropdown catalog" data-event-category="Catalog" data-event-label="">
                                Все бренды
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Мужская одежда
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_2">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Одежда</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/sportivnaya-odejda" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Спортивная одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/futbolki-futbolki-polo" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/platya">
                                    <span class="b-sub-nav-primary__link-text">Футболки, футболки Поло</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/rubashki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/yubki">
                                    <span class="b-sub-nav-primary__link-text">Рубашки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/shortyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/mayki-i-futbolki">
                                    <span class="b-sub-nav-primary__link-text">Шорты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/djinsyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/rubashki-i-bluzy">
                                    <span class="b-sub-nav-primary__link-text">Джинсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/bryuki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki">
                                    <span class="b-sub-nav-primary__link-text">Брюки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/pidjaki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki/dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">Пиджаки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/kostyumyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/shorty">
                                    <span class="b-sub-nav-primary__link-text">Костюмы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/tolstovki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kofty">
                                    <span class="b-sub-nav-primary__link-text">Толстовки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/svitera-djemperyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Свитера, джемперы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/plaschi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Плащи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/uteplennyie-jiletyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Утепленные желеты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/kurtki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Куртки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/dublenki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Дубленки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/palto" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Пальто</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/m-drugie-veschi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/drugoe">
                                    <span class="b-sub-nav-primary__link-text">Другие вещи</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Обувь</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/zimnyaya-obuv" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/tufli">
                                    <span class="b-sub-nav-primary__link-text">Зимняя обувь</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/oksfordyi-derbi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/baletki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Оксфорды, дерби</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/mokasinyi-loferyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bosonozhki-i-shlepancy">
                                    <span class="b-sub-nav-primary__link-text">Мокасины, лоферы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/brogi-monki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sandalii.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Броги, монги</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/sliperyi-espadrili" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/sapogi-i-botinki">
                                    <span class="b-sub-nav-primary__link-text">Слиперы, эспадрильи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/krossovki-kedyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/polusapozhki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кроссовки, кеды</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/dezertyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rezinovye-sapogi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Дезерты</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick2" href="/women" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women">
                                Вся мужская одежда
                            </a>
                        </li>
                        <li class="b-sub-nav-secondary__item">
                            <a href="/brands" class="b-sub-nav-secondary__link js-ga-onclick2" data-event-action="All brands from dropdown catalog" data-event-category="Catalog" data-event-label="">
                                Все бренды
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Аксессуары
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_2">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Аксессуары</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/koltsa" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kolca.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кольца</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/sergi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sergi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Серьги</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/brasletyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/braslety.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Браслеты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/kole" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kole.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Колье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/chasyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/zhenskie-chasy.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Часы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/ochki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/ochki">
                                    <span class="b-sub-nav-primary__link-text">Очки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/remni" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/remni">
                                    <span class="b-sub-nav-primary__link-text">Ремни</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/shlyapki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/shapki">
                                    <span class="b-sub-nav-primary__link-text">Шляпки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/sharfyi-platki-pareo" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sharfy-i-platki">
                                    <span class="b-sub-nav-primary__link-text">Шарфы, платки, парео</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Сумки</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/dorojnyie" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/klatchi">
                                    <span class="b-sub-nav-primary__link-text">Дорожные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/kross-bodi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-kross-bodi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кросс-боди</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/koshelki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-sakvoyazhi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кошельки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/plyajnyie" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sportivnye-sumki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Пляжные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/ryukzaki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-plyazhnye.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Рюкзаки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/sakvoyaji" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/dorozhnye-sumki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Саквояжи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/sportivnyie" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/ryukzaki">
                                    <span class="b-sub-nav-primary__link-text">Спортивные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/chemodanyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/chemodany">
                                    <span class="b-sub-nav-primary__link-text">Чемоданы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/prochie-sumki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/koshelki">
                                    <span class="b-sub-nav-primary__link-text">Прочие сумки</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick2" href="/women/aksessuary" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary">
                                Все аксессуары
                            </a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Косметика
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_4">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">АРОМАТЫ</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/kosmetika/duhi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/zhenskaya-tualetnaya-voda.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Духи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/kosmetika/tualetnaya-voda" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/parfyumirovannaya-voda.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Туалетная вода</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/kosmetika/parfyumirovannaya-voda" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/duhi-zhenskie.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Парфюмированная вода</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/kosmetika/naturalnyie-aromomasla" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/duhi-zhenskie.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Натуральные аромомасла</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Макияж</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/tonalnyie-kremyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/gubnaya-pomada.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тональные кремы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/korrektoryi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/blesk-dlya-gub.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Корректоры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/pudra" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tush-dlya-resnic.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Пудра</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/rumyana" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/teni-dlya-glaz.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Румяна</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/teni-dlya-vek" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rumyana.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тени для век</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/tush-dlya-resnits" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tonalnye-kremy-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тушь для ресниц</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/pomada-blesk-dlya-gub" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/korrektory-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Помада, блеск для губ</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/pudra-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Пудры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/kisti" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kisti-dlya-makiyazha.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кисти</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Уход</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/shampuni" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-estee-lauder">
                                    <span class="b-sub-nav-primary__link-text">Шампуни</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/balzamyi-i-maski-dlya-volos" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-loreal-paris">
                                    <span class="b-sub-nav-primary__link-text">Бальзамы и маски для волос</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/myilo" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-maybelline">
                                    <span class="b-sub-nav-primary__link-text">Мыло</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/geli-dlya-dusha" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-faberlic">
                                    <span class="b-sub-nav-primary__link-text">Гели для душа</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/geli-dlya-umyivaniya" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-biotherm">
                                    <span class="b-sub-nav-primary__link-text">Гели для умывания</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/toniki-dlya-litsa" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-mary-kay">
                                    <span class="b-sub-nav-primary__link-text">Тоники для лица</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/krema-i-maski-dlya-litsa" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-clinique">
                                    <span class="b-sub-nav-primary__link-text">Крема и маски для лица</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/skrabyi-dlya-litsa" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-farmasi">
                                    <span class="b-sub-nav-primary__link-text">Скрабы для лица</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
<!--            
            <div class="b-sub-nav__row">
                <ul class="b-sub-nav-secondary">
                    <li class="b-sub-nav-secondary__item">
                        <a class="b-sub-nav-secondary__link js-ga-onclick2" href="/women/kosmetika" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kosmetika">
                            Вся косметика
                        </a>
                    </li>
                </ul>
           </div>
            -->
        </div>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            ЭТНОБутик
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_1">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">ЭТНОБутик</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/etnobutik/aksessuaryi-v-etnostile" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/gubnaya-pomada.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Аксессуары в этностиле</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/etnobutik/detskie-vyishivanki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/blesk-dlya-gub.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Детские вышиванки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/etnobutik/mujskie-vyishivanki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tush-dlya-resnic.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Мужские вышиванки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/etnobutik/jenskie-vyishivanki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/teni-dlya-glaz.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Женские вышиванки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/etnobutik/platya-v-etnostile" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rumyana.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Платья в этностиле</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="b-sub-nav__row">
                <ul class="b-sub-nav-secondary">
                    <li class="b-sub-nav-secondary__item">
                        <a class="b-sub-nav-secondary__link js-ga-onclick2" href="/category/etnobutik" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kosmetika">
                            Все в разделе
                        </a>
                    </li>
                </ul>
           </div>
        </div>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            БейбиРум
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_1">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">БейбиРум</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/igrushki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Игрушки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/obuv-devochkam" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/platya-i-sarafany">
                                    <span class="b-sub-nav-primary__link-text">Обувь девочкам</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/obuv-malchikam" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/yubki">
                                    <span class="b-sub-nav-primary__link-text">Обувь мальчикам</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/odejda-devochkam" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Одежда девочкам</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/odejda-malchikam" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/shkolnye-kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Одежда мальчикам</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/0-3-mesyatsa" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/bryuki-i-dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">0-3 месяца</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </li>
    <li class="b-nav__item">
        <a href="/new-arrivals" class="b-nav__link">
            Новинки
        </a>
    </li>
    <li class="b-nav__item">
        <a class="b-nav__link" href="/page/kak-eto-rabotaet">Как это работает?</a>
    </li>
</ul>
    </div>
    <a class="b-nav__add-link js-ga-onclick2" href="/new" data-event-action="Add new product click" data-event-category="Product" data-event-label="Add new product user menu click" data-details="1">Добавить товар</a>
</nav>
<div class="b-header-fixed js-fixed_header">
    <div class="b-header-fixed__container">

        
        <div class="b-header-fixed__nav">
            <nav class="b-nav">
                <div class="b-nav__cell">
                    <form action="/women" class="b-search" style="display: none;">
                        <input placeholder="Поиск" class="b-search__input" name="search_text" autocomplete="off" type="text">
                        <svg viewBox="0 0 612 617.5" class="b-search__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--search"/>
                        </svg>
                    </form>
                    <div class="b-nav__mobile-menu js-catalog-mobile-menu js-dropdown">
                        <svg viewBox="0 0 15 14" class="b-nav__burger">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--menu"/>
                        </svg>
                        <div class="b-mobile-menu">
    <ul class="b-mobile-menu__list">
        <li class="b-mobile-menu__item">
            <b class="b-mobile-menu__user-name"><?php echo Yii::app()->user->name; ?></b>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/page/kak-eto-rabotaet">
                Как это работает?
            </a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/women">Каталог</a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/new-arrivals">
                Новинки
            </a>
        </li>
    </ul>
    <ul class="b-mobile-menu__profile">
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/new">
                Добавить вещь
            </a>
        </li>

        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/my/clothes">
                Мои вещи
            </a>
        </li>

        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/my/settings">
                Мои настройки
            </a>
        </li>

        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/my/reviews">
                Мои отзывы
            </a>
        </li>

        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/profile/<?php echo Yii::app()->user->id; ?>">
                Профиль
            </a>
        </li>
        

        <li class="b-mobile-menu__item js-logout-link">
            <a class="b-mobile-menu__link js-logout-link" href="#" data-form-id="logout-form">Выход</a>
            <form accept-charset="UTF-8" action="site/logout" id="logout-form" method="post">
                <input name="csrfmiddlewaretoken" value="hPN0QbqhfLWrk5eXp19GOwpjrcFTcRKqkqDELU1Tk9Bjxtefa1RuAvtfFFXrAiXC" type="hidden">
            </form>
        </li>
    </ul>
</div>
                    </div>
<ul class="b-nav__list">
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Женская одежда
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_2">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Одежда</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/kupalniki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Купальники</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/nijnee-bele" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/platya">
                                    <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/platya-i-kostyumyi-dlya-tantsev" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/yubki">
                                    <span class="b-sub-nav-primary__link-text">Платья и костюмы для танцев</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/yubki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/mayki-i-futbolki">
                                    <span class="b-sub-nav-primary__link-text">Юбки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/djinsyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/rubashki-i-bluzy">
                                    <span class="b-sub-nav-primary__link-text">Джинсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/shortyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki">
                                    <span class="b-sub-nav-primary__link-text">Шорты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/bryuki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki/dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">Брюки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/sportivnaya-odejda" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/shorty">
                                    <span class="b-sub-nav-primary__link-text">Спортивная одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/svitera-djemperyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kofty">
                                    <span class="b-sub-nav-primary__link-text">Свитера, джемперы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/futbolki-i-mayki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Футболки и майки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/tuniki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Туники</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/bluzyi-i-rubashki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Блузы и рубашки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/kostyumyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Костюмы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/svadebnyie-platya" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Свадебные платья</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/platya" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Платья</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/plaschi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Плащи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/kurtki-puhoviki-uteplennyie-jiletyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Куртки, пуховики, утепленные жилеты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/shubyi-dublenki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Шубы, дубленки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-odejda/drugaya" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/drugoe">
                                    <span class="b-sub-nav-primary__link-text">Другие вещи</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Обувь</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/obuv-na-tanketke" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/tufli">
                                    <span class="b-sub-nav-primary__link-text">Обувь на танкетке</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/kedyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/baletki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кеды</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/krossovki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bosonozhki-i-shlepancy">
                                    <span class="b-sub-nav-primary__link-text">Кроссовки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/bosonojki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sandalii.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Босоножки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/sliponyi-mokasinyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/sapogi-i-botinki">
                                    <span class="b-sub-nav-primary__link-text">Слипоны, мокасины</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/sandalii-sabo" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/polusapozhki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Сандалии, сабо</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/baletki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rezinovye-sapogi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Балетки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/tufli" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/krossovki-i-kedy/krossovki">
                                    <span class="b-sub-nav-primary__link-text">Туфли</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/botilonyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/krossovki-i-kedy/kedy">
                                    <span class="b-sub-nav-primary__link-text">Ботильоны</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/kantri" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/mokasiny.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кантри</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/polusapojki-botinki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/snikersy.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Полусапожки, ботинки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/jenskaya-obuv/sapogi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tapochki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Сапоги</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick2" href="/category/jenskaya-odejda/" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women">
                                Вся женская одежда
                            </a>
                        </li>
                        <li class="b-sub-nav-secondary__item">
                            <a href="/brands" class="b-sub-nav-secondary__link js-ga-onclick2" data-event-action="All brands from dropdown catalog" data-event-category="Catalog" data-event-label="">
                                Все бренды
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Мужская одежда
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_2">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Одежда</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/sportivnaya-odejda" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Спортивная одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/futbolki-futbolki-polo" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/platya">
                                    <span class="b-sub-nav-primary__link-text">Футболки, футболки Поло</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/rubashki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/yubki">
                                    <span class="b-sub-nav-primary__link-text">Рубашки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/shortyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/mayki-i-futbolki">
                                    <span class="b-sub-nav-primary__link-text">Шорты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/djinsyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/rubashki-i-bluzy">
                                    <span class="b-sub-nav-primary__link-text">Джинсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/bryuki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki">
                                    <span class="b-sub-nav-primary__link-text">Брюки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/pidjaki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki/dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">Пиджаки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/kostyumyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/shorty">
                                    <span class="b-sub-nav-primary__link-text">Костюмы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/tolstovki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kofty">
                                    <span class="b-sub-nav-primary__link-text">Толстовки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/svitera-djemperyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Свитера, джемперы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/plaschi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Плащи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/uteplennyie-jiletyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Утепленные желеты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/kurtki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Куртки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/dublenki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Дубленки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/palto" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Пальто</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-odejda/m-drugie-veschi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/drugoe">
                                    <span class="b-sub-nav-primary__link-text">Другие вещи</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Обувь</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/zimnyaya-obuv" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/tufli">
                                    <span class="b-sub-nav-primary__link-text">Зимняя обувь</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/oksfordyi-derbi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/baletki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Оксфорды, дерби</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/mokasinyi-loferyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bosonozhki-i-shlepancy">
                                    <span class="b-sub-nav-primary__link-text">Мокасины, лоферы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/brogi-monki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sandalii.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Броги, монги</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/sliperyi-espadrili" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/sapogi-i-botinki">
                                    <span class="b-sub-nav-primary__link-text">Слиперы, эспадрильи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/krossovki-kedyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/polusapozhki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кроссовки, кеды</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/mujskaya-obuv/dezertyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rezinovye-sapogi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Дезерты</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick2" href="/women" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women">
                                Вся мужская одежда
                            </a>
                        </li>
                        <li class="b-sub-nav-secondary__item">
                            <a href="/brands" class="b-sub-nav-secondary__link js-ga-onclick2" data-event-action="All brands from dropdown catalog" data-event-category="Catalog" data-event-label="">
                                Все бренды
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Аксессуары
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_2">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Аксессуары</div>
                                                <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/koltsa" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kolca.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кольца</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/sergi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sergi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Серьги</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/brasletyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/braslety.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Браслеты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/kole" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kole.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Колье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/chasyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/zhenskie-chasy.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Часы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/ochki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/ochki">
                                    <span class="b-sub-nav-primary__link-text">Очки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/remni" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/remni">
                                    <span class="b-sub-nav-primary__link-text">Ремни</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/shlyapki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/shapki">
                                    <span class="b-sub-nav-primary__link-text">Шляпки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/aksessuaryi/sharfyi-platki-pareo" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sharfy-i-platki">
                                    <span class="b-sub-nav-primary__link-text">Шарфы, платки, парео</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick2" href="/women/aksessuary" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary">
                                Все аксессуары
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Сумки</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/dorojnyie" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/klatchi">
                                    <span class="b-sub-nav-primary__link-text">Дорожные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/kross-bodi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-kross-bodi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кросс-боди</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/koshelki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-sakvoyazhi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кошельки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/plyajnyie" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sportivnye-sumki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Пляжные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/ryukzaki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-plyazhnye.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Рюкзаки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/sakvoyaji" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/dorozhnye-sumki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Саквояжи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/sportivnyie" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/ryukzaki">
                                    <span class="b-sub-nav-primary__link-text">Спортивные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/chemodanyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/chemodany">
                                    <span class="b-sub-nav-primary__link-text">Чемоданы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/sumki/prochie-sumki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/koshelki">
                                    <span class="b-sub-nav-primary__link-text">Прочие сумки</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Косметика
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_4">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">АРОМАТЫ</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/kosmetika/duhi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/zhenskaya-tualetnaya-voda.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Духи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/kosmetika/tualetnaya-voda" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/parfyumirovannaya-voda.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Туалетная вода</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/kosmetika/parfyumirovannaya-voda" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/duhi-zhenskie.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Парфюмированная вода</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/kosmetika/naturalnyie-aromomasla" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/duhi-zhenskie.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Натуральные аромомасла</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Макияж</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/tonalnyie-kremyi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/gubnaya-pomada.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тональные кремы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/korrektoryi" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/blesk-dlya-gub.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Корректоры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/pudra" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tush-dlya-resnic.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Пудра</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/rumyana" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/teni-dlya-glaz.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Румяна</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/teni-dlya-vek" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rumyana.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тени для век</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/tush-dlya-resnits" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tonalnye-kremy-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тушь для ресниц</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/pomada-blesk-dlya-gub" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/korrektory-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Помада, блеск для губ</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/pudra-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Пудры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/makiyaj/kisti" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kisti-dlya-makiyazha.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кисти</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Уход</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/shampuni" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-estee-lauder">
                                    <span class="b-sub-nav-primary__link-text">Шампуни</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/balzamyi-i-maski-dlya-volos" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-loreal-paris">
                                    <span class="b-sub-nav-primary__link-text">Бальзамы и маски для волос</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/myilo" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-maybelline">
                                    <span class="b-sub-nav-primary__link-text">Мыло</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/geli-dlya-dusha" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-faberlic">
                                    <span class="b-sub-nav-primary__link-text">Гели для душа</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/geli-dlya-umyivaniya" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-biotherm">
                                    <span class="b-sub-nav-primary__link-text">Гели для умывания</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/toniki-dlya-litsa" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-mary-kay">
                                    <span class="b-sub-nav-primary__link-text">Тоники для лица</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/krema-i-maski-dlya-litsa" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-clinique">
                                    <span class="b-sub-nav-primary__link-text">Крема и маски для лица</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/uhod/skrabyi-dlya-litsa" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-farmasi">
                                    <span class="b-sub-nav-primary__link-text">Скрабы для лица</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
<!--            
            <div class="b-sub-nav__row">
                <ul class="b-sub-nav-secondary">
                    <li class="b-sub-nav-secondary__item">
                        <a class="b-sub-nav-secondary__link js-ga-onclick2" href="/women/kosmetika" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kosmetika">
                            Вся косметика
                        </a>
                    </li>
                </ul>
           </div>
            -->
        </div>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            ЭТНОБутик
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_1">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">ЭТНОБутик</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/etnobutik/aksessuaryi-v-etnostile" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/gubnaya-pomada.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Аксессуары в этностиле</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/etnobutik/detskie-vyishivanki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/blesk-dlya-gub.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Детские вышиванки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/etnobutik/mujskie-vyishivanki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tush-dlya-resnic.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Мужские вышиванки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/etnobutik/jenskie-vyishivanki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/teni-dlya-glaz.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Женские вышиванки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/etnobutik/platya-v-etnostile" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rumyana.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Платья в этностиле</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="b-sub-nav__row">
                <ul class="b-sub-nav-secondary">
                    <li class="b-sub-nav-secondary__item">
                        <a class="b-sub-nav-secondary__link js-ga-onclick2" href="/category/etnobutik" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kosmetika">
                            Все в разделе
                        </a>
                    </li>
                </ul>
           </div>
        </div>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            БейбиРум
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_1">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">БейбиРум</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/igrushki" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Игрушки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/obuv-devochkam" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/platya-i-sarafany">
                                    <span class="b-sub-nav-primary__link-text">Обувь девочкам</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/obuv-malchikam" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/yubki">
                                    <span class="b-sub-nav-primary__link-text">Обувь мальчикам</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/odejda-devochkam" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Одежда девочкам</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/odejda-malchikam" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/shkolnye-kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Одежда мальчикам</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/category/beybirum/0-3-mesyatsa" class="b-sub-nav-primary__link js-ga-onclick2" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/bryuki-i-dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">0-12 месяцев</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </li>
    <li class="b-nav__item">
        <a href="/new-arrivals" class="b-nav__link">
            Новинки
        </a>
    </li>
    <li class="b-nav__item">
        <a class="b-nav__link" href="/page/kak-eto-rabotaet">Как это работает?</a>
    </li>
</ul>
                </div>
                <a class="b-nav__add-link b-nav__add-link_type_collapsed" href="/new" data-event-action="Add new product click" data-event-category="Product" data-event-label="Add new product user menu click" data-details="1"></a>
            </nav>
        </div>
        <div class="b-header-fixed__logged-in b-header-links b-header-links_type_inverse">
                <a href="/msg/" class="b-header-links__icon">
                    <svg viewBox="0 0 25.001 25.001">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--messages"/>
                    </svg>
                <?php
//                $message_list = Messages::model()->findAllByAttributes(array('ms_recipient'=>Yii::app()->user->id,'ms_readed'=>0));
//                if (!empty($message_list))
//                {
//                    $count_new_messages = count($message_list);
//                    echo "<span class='b-header-links__counter'>$count_new_messages</span>";
//                }
                $this->renderPartial("//layouts/count_msgs");
                ?>
                </a>
                <a href="/my/favourites" class="b-header-links__icon">
                    <svg viewBox="0 0 24 22.004">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--heart"/>
                    </svg>
                </a>
                <div class="b-header-links__profile js-profile-menu js-dropdown">
                    <svg viewBox="0 0 6.8 11" class="b-header-links__profile-arrow">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"/>
                    </svg>
                    <div class="b-header-links__profile-image-wrapper">
                        <img class="b-header-links__profile-image" alt="fontez" src="https://image.flaticon.com/icons/png/128/145/145845.png" title="fontez">
                    </div>
                    <ul class="b-header-links__profile-list b-profile-menu">
    <li class="b-profile-menu__item">
        <a class="b-profile-menu__link" href="/my/clothes">Мои вещи</a>
    </li>

    <li class="b-profile-menu__item">
        <a class="b-profile-menu__link" href="/my/settings">Мои настройки</a>
    </li>

    <li class="b-profile-menu__item">
        <a class="b-profile-menu__link" href="/my/reviews">Мои отзывы</a>
    </li>

    <li class="b-profile-menu__item">
        <a class="b-profile-menu__link" href="/profile/<?php echo Yii::app()->user->id; ?>">Профиль</a>
    </li>
    

    <li class="b-profile-menu__item b-profile-menu__item_type_logout js-logout-link">
        <a href="#" class="b-profile-menu__link js-logout-link" data-form-id="logout-form">Выйти</a>
        <form accept-charset="UTF-8" action="site/logout" id="logout-form" method="post">
            <input name="csrfmiddlewaretoken" value="SvSF6kJZtbmNGckR0IzS4BDmN8pa8Oj3V6Ij13kByz1FTAk9LIhGQAHi1BHIwfwf" type="hidden">
        </form>
    </li>
</ul>
                </div>
            </div></div>
</div>
            
        </div>
    </div>
        <script>
    jQuery(function($) {
                $(".b-nav__link").on("click",function(e){
            //$(this).parent(".js-catalog-menu").siblings(".js-catalog-menu").removeClass("b-nav__item_state_opened");
            $(this).parent('.js-catalog-menu').siblings().removeClass("b-nav__item_state_opened");
        });
    });
        </script>