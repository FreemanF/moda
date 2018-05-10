<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8"/>
        <title>Модне кубло</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <?php
        if ($this->noindex)
            echo '        <meta name="robots" content="noindex">' . "\n";
        if ($this->nofollow)
            echo '        <meta name="robots" content="nofollow">' . "\n";
        if (!empty($this->meta['keywords']))
            echo '        <meta name="keywords" content="' . CHtml::encode($this->meta['keywords']) . '" />' . "\n";
        if (!empty($this->meta['description']))
            echo '        <meta name="description" content="' . CHtml::encode($this->meta['description']) . '" />' . "\n";
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

    
</head>

    <?php
    // Пордключаем пакеты
    $cs = Yii::app()->clientScript;
    foreach ($this->includePackages as $package)
        $cs->registerPackage($package);
    // Инициируем переменные JS
    if ($this->jsVars) {
        echo "<script type=\"text/javascript\">\n";
        foreach ($this->jsVars as $name => $value)
            echo (strpos($name, '[') === false ? 'var ' : '    ') . "$name = $value;\n";
        echo "</script>\n";
    }

    echo Setting::getParam("google_analytics");
    ?>
    <body>


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
    <div class="b-header__links b-header-links"><div class="b-header-links__buttons">
                            <a href="users/login" class="b-header-links__auth js-ga-onclick" data-event-action="Registration/Login click" data-event-category="Activities" data-event-label="Registration/Login top click">
                    Вход
                </a>
                <span class="b-header-links__separator">|</span>
                            <a href="users/register" class="b-header-links__auth js-ga-onclick" data-event-action="Registration/Login click" data-event-category="Activities" data-event-label="Registration/Login top click">
                    Регистрация
                </a>
            </div>
                        <a class="b-login-button" href="users/login">Вход</a></div>
</header>
<nav class="b-nav">
    <div class="b-nav__cell">
        <form action="/women" class="b-search js-ga-onsubmit" data-event-category="Activities" data-event-action="Search from menu" data-event-label="">
            <input placeholder="Поиск" class="b-search__input" name="search_text" autocomplete="off" type="text">
            <svg viewBox="0 0 612 617.5" class="b-search__icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--search"></use>
            </svg>
        </form>
        <div class="b-nav__mobile-menu js-catalog-mobile-menu js-dropdown">
            <svg viewBox="0 0 15 14" class="b-nav__burger">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--menu"></use>
            </svg>
            <div class="b-mobile-menu">
    <ul class="b-mobile-menu__list">
        
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/women">Женская одежда</a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/women/aksessuary">Аксессуары</a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/women/kosmetika">Косметика</a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/new-arrivals">
                Новинки
            </a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/kids">Детское</a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/page/kak-eto-rabotaet">
                Как это работает?
            </a>
        </li>
    </ul>
</div>
        </div>
        <ul class="b-nav__list">
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Женская одежда
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_2">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Одежда</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/verhnyaya-odezhda" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/platya" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/platya">
                                    <span class="b-sub-nav-primary__link-text">Платья</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/yubki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/yubki">
                                    <span class="b-sub-nav-primary__link-text">Юбки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/mayki-i-futbolki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/mayki-i-futbolki">
                                    <span class="b-sub-nav-primary__link-text">Майки и футболки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/rubashki-i-bluzy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/rubashki-i-bluzy">
                                    <span class="b-sub-nav-primary__link-text">Рубашки и блузы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/bryuki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki">
                                    <span class="b-sub-nav-primary__link-text">Брюки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/bryuki/dzhinsy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki/dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">Джинсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/shorty" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/shorty">
                                    <span class="b-sub-nav-primary__link-text">Шорты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/kofty" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kofty">
                                    <span class="b-sub-nav-primary__link-text">Кофты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/nizhnee-bele-i-kupalniki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/nizhnee-bele-i-kupalniki/kupalniki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Купальники</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/drugoe" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/drugoe">
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
                                <a href="/women/tufli" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/tufli">
                                    <span class="b-sub-nav-primary__link-text">Туфли</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/baletki.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/baletki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Балетки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/bosonozhki-i-shlepancy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bosonozhki-i-shlepancy">
                                    <span class="b-sub-nav-primary__link-text">Босоножки и шлепанцы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sandalii.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sandalii.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Сандалии</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/sapogi-i-botinki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/sapogi-i-botinki">
                                    <span class="b-sub-nav-primary__link-text">Сапоги и ботинки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/polusapozhki.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/polusapozhki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Полусапожки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/rezinovye-sapogi.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rezinovye-sapogi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Резиновые сапоги</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/krossovki-i-kedy/krossovki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/krossovki-i-kedy/krossovki">
                                    <span class="b-sub-nav-primary__link-text">Кроссовки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/krossovki-i-kedy/kedy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/krossovki-i-kedy/kedy">
                                    <span class="b-sub-nav-primary__link-text">Кеды</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/mokasiny.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/mokasiny.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Мокасины</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/snikersy.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/snikersy.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Сникерсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/tapochki.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tapochki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тапочки</span>
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
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/women" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women">
                                Вся женская одежда
                            </a>
                        </li>
                        <li class="b-sub-nav-secondary__item">
                            <a href="/brands" class="b-sub-nav-secondary__link js-ga-onclick" data-event-action="All brands from dropdown catalog" data-event-category="Catalog" data-event-label="">
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
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_2">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Аксессуары</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kolca.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kolca.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кольца</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sergi.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sergi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Серьги</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/braslety.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/braslety.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Браслеты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kole.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kole.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Колье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/zhenskie-chasy.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/zhenskie-chasy.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Часы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/ochki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/ochki">
                                    <span class="b-sub-nav-primary__link-text">Очки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/remni" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/remni">
                                    <span class="b-sub-nav-primary__link-text">Ремни</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/shapki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/shapki">
                                    <span class="b-sub-nav-primary__link-text">Головные уборы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/sharfy-i-platki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sharfy-i-platki">
                                    <span class="b-sub-nav-primary__link-text">Шарфы и платки</span>
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
                                <a href="/women/aksessuary/sumki/klatchi" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/klatchi">
                                    <span class="b-sub-nav-primary__link-text">Клатчи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sumki-kross-bodi.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-kross-bodi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кросс-боди</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sumki-sakvoyazhi.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-sakvoyazhi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Саквояжи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sportivnye-sumki.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sportivnye-sumki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Спортивные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sumki-plyazhnye.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-plyazhnye.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Пляжные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/dorozhnye-sumki.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/dorozhnye-sumki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Дорожные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/sumki/ryukzaki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/ryukzaki">
                                    <span class="b-sub-nav-primary__link-text">Рюкзаки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/sumki/chemodany" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/chemodany">
                                    <span class="b-sub-nav-primary__link-text">Чемоданы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/sumki/koshelki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/koshelki">
                                    <span class="b-sub-nav-primary__link-text">Кошельки</span>
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
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/women/aksessuary" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary">
                                Все аксессуары
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/women/aksessuary/sumki" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki">
                                Все сумки
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
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_4">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Макияж</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/gubnaya-pomada.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/gubnaya-pomada.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Помада</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/blesk-dlya-gub.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/blesk-dlya-gub.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Блеск для губ</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/tush-dlya-resnic.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tush-dlya-resnic.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тушь для ресниц</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/teni-dlya-glaz.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/teni-dlya-glaz.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тени для век</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/rumyana.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rumyana.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Румяна</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/tonalnye-kremy-dlya-lica.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tonalnye-kremy-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тональные кремы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/korrektory-dlya-lica.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/korrektory-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Корректоры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/pudra-dlya-lica.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/pudra-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Пудры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kisti-dlya-makiyazha.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kisti-dlya-makiyazha.xhtml">
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
                                <a href="/geli-dlya-umyvaniya.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/geli-dlya-umyvaniya.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Гели для умывания</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/skraby-dlya-lica.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/skraby-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Скрабы для лица</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/toniki-dlya-lica.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/toniki-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тоники для лица</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/kosmetika/uhod-za-licom" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kosmetika/uhod-za-licom">
                                    <span class="b-sub-nav-primary__link-text">Кремы и маски для лица</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/mylo.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/mylo.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Мыло</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/geli-dlya-dusha.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/geli-dlya-dusha.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Гели для душа</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/kosmetika/uhod-za-telom" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kosmetika/uhod-za-telom">
                                    <span class="b-sub-nav-primary__link-text">Кремы для рук и тела</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/shampuni.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/shampuni.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Шампуни</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/balzamy-dlya-volos.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/balzamy-dlya-volos.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Бальзамы для волос</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Парфюмы</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/zhenskaya-tualetnaya-voda.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/zhenskaya-tualetnaya-voda.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Туалетная вода</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/parfyumirovannaya-voda.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/parfyumirovannaya-voda.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Парфюмированная вода</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/duhi-zhenskie.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/duhi-zhenskie.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Духи</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Бренды</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-estee-lauder" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-estee-lauder">
                                    <span class="b-sub-nav-primary__link-text">Estee Lauder</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-loreal-paris" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-loreal-paris">
                                    <span class="b-sub-nav-primary__link-text">L'Oreal</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-maybelline" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-maybelline">
                                    <span class="b-sub-nav-primary__link-text">Maybelline</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-faberlic" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-faberlic">
                                    <span class="b-sub-nav-primary__link-text">Faberlic</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-biotherm" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-biotherm">
                                    <span class="b-sub-nav-primary__link-text">Biotherm</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-mary-kay" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-mary-kay">
                                    <span class="b-sub-nav-primary__link-text">Mary Kay</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-clinique" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-clinique">
                                    <span class="b-sub-nav-primary__link-text">Clinique</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-farmasi" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-farmasi">
                                    <span class="b-sub-nav-primary__link-text">Farmasi</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-christian-dior" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-christian-dior">
                                    <span class="b-sub-nav-primary__link-text">Christian Dior</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="b-sub-nav__row">
                <ul class="b-sub-nav-secondary">
                    <li class="b-sub-nav-secondary__item">
                        <a class="b-sub-nav-secondary__link js-ga-onclick" href="/women/kosmetika" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kosmetika">
                            Вся косметика
                        </a>
                    </li>
                </ul>
           </div>
        </div>
    </li>
    <li class="b-nav__item">
        <a href="/new-arrivals" class="b-nav__link">
            Новинки
        </a>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Детское
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_3">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Для девочек</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/verhnyaya-odezhda" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/platya-i-sarafany" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/platya-i-sarafany">
                                    <span class="b-sub-nav-primary__link-text">Платья и сарафаны</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/yubki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/yubki">
                                    <span class="b-sub-nav-primary__link-text">Юбки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/kofty-i-svitery" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/kofty-i-svitery">
                                    <span class="b-sub-nav-primary__link-text">Кофты и свитеры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/kostiumy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Костюмы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/shkolnye-kostiumy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/shkolnye-kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Школьная форма</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/bryuki-i-dzhinsy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/bryuki-i-dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">Брюки и джинсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/futbolki-i-mayki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/futbolki-i-mayki">
                                    <span class="b-sub-nav-primary__link-text">Футболки и майки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/nizhnee-bele" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/nizhnee-bele">
                                    <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/obuv" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/obuv">
                                    <span class="b-sub-nav-primary__link-text">Обувь</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Для мальчиков</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/verhnyaya-odezhda" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/rubashki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/rubashki">
                                    <span class="b-sub-nav-primary__link-text">Рубашки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/futbolki-i-mayki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/futbolki-i-mayki">
                                    <span class="b-sub-nav-primary__link-text">Футболки и майки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/kofty-i-svitery" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/kofty-i-svitery">
                                    <span class="b-sub-nav-primary__link-text">Кофты и свитеры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/kostiumy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Костюмы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/shkolnye-kostiumy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/shkolnye-kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Школьная форма</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/bryuki-i-dzhinsy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/bryuki-i-dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">Брюки и джинсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/shorty" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/shorty">
                                    <span class="b-sub-nav-primary__link-text">Шорты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/nizhnee-bele" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/nizhnee-bele">
                                    <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/obuv" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/obuv">
                                    <span class="b-sub-nav-primary__link-text">Обувь</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Для малышей</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/nabory-dlya-kresheniya" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/nabory-dlya-kresheniya">
                                    <span class="b-sub-nav-primary__link-text">Наборы для крещения</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/konverty-i-spalnye-meshki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/konverty-i-spalnye-meshki">
                                    <span class="b-sub-nav-primary__link-text">Конверты и спальные мешки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/kostiumy-i-komplekty" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/kostiumy-i-komplekty">
                                    <span class="b-sub-nav-primary__link-text">Костюмы и комплекты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/bodi-i-chelovechki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/bodi-i-chelovechki">
                                    <span class="b-sub-nav-primary__link-text">Боди и песочники</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/polzunki-i-shtany" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/polzunki-i-shtany">
                                    <span class="b-sub-nav-primary__link-text">Ползунки и штаны</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/raspashonki-i-kofty" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/raspashonki-i-kofty">
                                    <span class="b-sub-nav-primary__link-text">Распашонки и кофты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/pinetki-i-carapki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/pinetki-i-carapki">
                                    <span class="b-sub-nav-primary__link-text">Пинетки и царапки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/platya-i-yubki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/platya-i-yubki">
                                    <span class="b-sub-nav-primary__link-text">Платья и юбки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/verhnyaya-odezhda" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/obuv" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/obuv">
                                    <span class="b-sub-nav-primary__link-text">Обувь</span>
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
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/kids/dlya-devochek" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek">
                                Вся одежда для девочек
                            </a>
                        </li>
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/kids" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids">
                                Вся детская одежда
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/kids/dlya-malchikov" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov">
                                Вся одежда для мальчиков
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/kids/dlya-malyshey" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey">
                                Вся одежда для малышей
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li class="b-nav__item">
        <a class="b-nav__link" href="/page/kak-eto-rabotaet">Как это работает?</a>
    </li>
</ul>
    </div>
    <a class="b-nav__add-link js-ga-onclick" href="/new" data-event-action="Add new product click" data-event-category="Product" data-event-label="Add new product user menu click" data-details="1">Добавить товар</a>
</nav>
<div class="b-header-fixed js-fixed_header">
    <div class="b-header-fixed__container">
        <div class="b-header-fixed__logo b-logo b-logo_loc_fixed-header">
            <a href="/" class="b-logo__link">
                <svg class="b-logo__img b-logo__img_type_inverse">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--shafa-logo"></use>
                </svg>
            </a>
        </div>
        
        <div class="b-header-fixed__nav">
            <nav class="b-nav">
                <div class="b-nav__cell">
                    <form action="/women" class="b-search js-ga-onsubmit" data-event-category="Activities" data-event-action="Search from menu" data-event-label="">
                        <input placeholder="Поиск" class="b-search__input" name="search_text" autocomplete="off" type="text">
                        <svg viewBox="0 0 612 617.5" class="b-search__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--search"></use>
                        </svg>
                    </form>
                    <div class="b-nav__mobile-menu js-catalog-mobile-menu js-dropdown">
                        <svg viewBox="0 0 15 14" class="b-nav__burger">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--menu"></use>
                        </svg>
                        <div class="b-mobile-menu">
    <ul class="b-mobile-menu__list">
        
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/women">Женская одежда</a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/women/aksessuary">Аксессуары</a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/women/kosmetika">Косметика</a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/new-arrivals">
                Новинки
            </a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/kids">Детское</a>
        </li>
        <li class="b-mobile-menu__item">
            <a class="b-mobile-menu__link" href="/page/kak-eto-rabotaet">
                Как это работает?
            </a>
        </li>
    </ul>
</div>
                    </div>
                    <ul class="b-nav__list">
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Женская одежда
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_2">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Одежда</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/verhnyaya-odezhda" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/platya" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/platya">
                                    <span class="b-sub-nav-primary__link-text">Платья</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/yubki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/yubki">
                                    <span class="b-sub-nav-primary__link-text">Юбки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/mayki-i-futbolki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/mayki-i-futbolki">
                                    <span class="b-sub-nav-primary__link-text">Майки и футболки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/rubashki-i-bluzy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/rubashki-i-bluzy">
                                    <span class="b-sub-nav-primary__link-text">Рубашки и блузы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/bryuki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki">
                                    <span class="b-sub-nav-primary__link-text">Брюки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/bryuki/dzhinsy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bryuki/dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">Джинсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/shorty" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/shorty">
                                    <span class="b-sub-nav-primary__link-text">Шорты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/kofty" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kofty">
                                    <span class="b-sub-nav-primary__link-text">Кофты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/nizhnee-bele-i-kupalniki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/nizhnee-bele-i-kupalniki/kupalniki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/nizhnee-bele-i-kupalniki/kupalniki">
                                    <span class="b-sub-nav-primary__link-text">Купальники</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/drugoe" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/drugoe">
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
                                <a href="/women/tufli" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/tufli">
                                    <span class="b-sub-nav-primary__link-text">Туфли</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/baletki.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/baletki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Балетки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/bosonozhki-i-shlepancy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/bosonozhki-i-shlepancy">
                                    <span class="b-sub-nav-primary__link-text">Босоножки и шлепанцы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sandalii.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sandalii.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Сандалии</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/sapogi-i-botinki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/sapogi-i-botinki">
                                    <span class="b-sub-nav-primary__link-text">Сапоги и ботинки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/polusapozhki.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/polusapozhki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Полусапожки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/rezinovye-sapogi.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rezinovye-sapogi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Резиновые сапоги</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/krossovki-i-kedy/krossovki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/krossovki-i-kedy/krossovki">
                                    <span class="b-sub-nav-primary__link-text">Кроссовки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/krossovki-i-kedy/kedy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/krossovki-i-kedy/kedy">
                                    <span class="b-sub-nav-primary__link-text">Кеды</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/mokasiny.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/mokasiny.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Мокасины</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/snikersy.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/snikersy.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Сникерсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/tapochki.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tapochki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тапочки</span>
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
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/women" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women">
                                Вся женская одежда
                            </a>
                        </li>
                        <li class="b-sub-nav-secondary__item">
                            <a href="/brands" class="b-sub-nav-secondary__link js-ga-onclick" data-event-action="All brands from dropdown catalog" data-event-category="Catalog" data-event-label="">
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
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_2">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Аксессуары</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kolca.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kolca.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кольца</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sergi.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sergi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Серьги</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/braslety.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/braslety.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Браслеты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kole.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kole.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Колье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/zhenskie-chasy.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/zhenskie-chasy.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Часы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/ochki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/ochki">
                                    <span class="b-sub-nav-primary__link-text">Очки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/remni" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/remni">
                                    <span class="b-sub-nav-primary__link-text">Ремни</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/shapki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/shapki">
                                    <span class="b-sub-nav-primary__link-text">Головные уборы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/sharfy-i-platki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sharfy-i-platki">
                                    <span class="b-sub-nav-primary__link-text">Шарфы и платки</span>
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
                                <a href="/women/aksessuary/sumki/klatchi" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/klatchi">
                                    <span class="b-sub-nav-primary__link-text">Клатчи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sumki-kross-bodi.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-kross-bodi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Кросс-боди</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sumki-sakvoyazhi.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-sakvoyazhi.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Саквояжи</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sportivnye-sumki.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sportivnye-sumki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Спортивные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/sumki-plyazhnye.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/sumki-plyazhnye.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Пляжные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/dorozhnye-sumki.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/dorozhnye-sumki.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Дорожные</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/sumki/ryukzaki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/ryukzaki">
                                    <span class="b-sub-nav-primary__link-text">Рюкзаки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/sumki/chemodany" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/chemodany">
                                    <span class="b-sub-nav-primary__link-text">Чемоданы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/aksessuary/sumki/koshelki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki/koshelki">
                                    <span class="b-sub-nav-primary__link-text">Кошельки</span>
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
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/women/aksessuary" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary">
                                Все аксессуары
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/women/aksessuary/sumki" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/aksessuary/sumki">
                                Все сумки
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
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_4">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Макияж</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/gubnaya-pomada.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/gubnaya-pomada.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Помада</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/blesk-dlya-gub.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/blesk-dlya-gub.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Блеск для губ</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/tush-dlya-resnic.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tush-dlya-resnic.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тушь для ресниц</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/teni-dlya-glaz.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/teni-dlya-glaz.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тени для век</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/rumyana.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/rumyana.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Румяна</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/tonalnye-kremy-dlya-lica.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/tonalnye-kremy-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тональные кремы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/korrektory-dlya-lica.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/korrektory-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Корректоры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/pudra-dlya-lica.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/pudra-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Пудры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kisti-dlya-makiyazha.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kisti-dlya-makiyazha.xhtml">
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
                                <a href="/geli-dlya-umyvaniya.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/geli-dlya-umyvaniya.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Гели для умывания</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/skraby-dlya-lica.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/skraby-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Скрабы для лица</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/toniki-dlya-lica.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/toniki-dlya-lica.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Тоники для лица</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/kosmetika/uhod-za-licom" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kosmetika/uhod-za-licom">
                                    <span class="b-sub-nav-primary__link-text">Кремы и маски для лица</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/mylo.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/mylo.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Мыло</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/geli-dlya-dusha.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/geli-dlya-dusha.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Гели для душа</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/kosmetika/uhod-za-telom" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kosmetika/uhod-za-telom">
                                    <span class="b-sub-nav-primary__link-text">Кремы для рук и тела</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/shampuni.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/shampuni.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Шампуни</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/balzamy-dlya-volos.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/balzamy-dlya-volos.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Бальзамы для волос</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Парфюмы</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/zhenskaya-tualetnaya-voda.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/zhenskaya-tualetnaya-voda.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Туалетная вода</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/parfyumirovannaya-voda.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/parfyumirovannaya-voda.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Парфюмированная вода</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/duhi-zhenskie.xhtml" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/duhi-zhenskie.xhtml">
                                    <span class="b-sub-nav-primary__link-text">Духи</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Бренды</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-estee-lauder" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-estee-lauder">
                                    <span class="b-sub-nav-primary__link-text">Estee Lauder</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-loreal-paris" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-loreal-paris">
                                    <span class="b-sub-nav-primary__link-text">L'Oreal</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-maybelline" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-maybelline">
                                    <span class="b-sub-nav-primary__link-text">Maybelline</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-faberlic" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-faberlic">
                                    <span class="b-sub-nav-primary__link-text">Faberlic</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-biotherm" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-biotherm">
                                    <span class="b-sub-nav-primary__link-text">Biotherm</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-mary-kay" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-mary-kay">
                                    <span class="b-sub-nav-primary__link-text">Mary Kay</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-clinique" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-clinique">
                                    <span class="b-sub-nav-primary__link-text">Clinique</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-farmasi" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-farmasi">
                                    <span class="b-sub-nav-primary__link-text">Farmasi</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/women/brand-christian-dior" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/brand-christian-dior">
                                    <span class="b-sub-nav-primary__link-text">Christian Dior</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="b-sub-nav__row">
                <ul class="b-sub-nav-secondary">
                    <li class="b-sub-nav-secondary__item">
                        <a class="b-sub-nav-secondary__link js-ga-onclick" href="/women/kosmetika" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/women/kosmetika">
                            Вся косметика
                        </a>
                    </li>
                </ul>
           </div>
        </div>
    </li>
    <li class="b-nav__item">
        <a href="/new-arrivals" class="b-nav__link">
            Новинки
        </a>
    </li>
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Детское
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav b-sub-nav_max-columns_3">
            <div class="b-sub-nav__row">
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Для девочек</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/verhnyaya-odezhda" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/platya-i-sarafany" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/platya-i-sarafany">
                                    <span class="b-sub-nav-primary__link-text">Платья и сарафаны</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/yubki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/yubki">
                                    <span class="b-sub-nav-primary__link-text">Юбки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/kofty-i-svitery" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/kofty-i-svitery">
                                    <span class="b-sub-nav-primary__link-text">Кофты и свитеры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/kostiumy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Костюмы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/shkolnye-kostiumy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/shkolnye-kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Школьная форма</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/bryuki-i-dzhinsy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/bryuki-i-dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">Брюки и джинсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/futbolki-i-mayki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/futbolki-i-mayki">
                                    <span class="b-sub-nav-primary__link-text">Футболки и майки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/nizhnee-bele" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/nizhnee-bele">
                                    <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-devochek/obuv" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek/obuv">
                                    <span class="b-sub-nav-primary__link-text">Обувь</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Для мальчиков</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/verhnyaya-odezhda" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/rubashki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/rubashki">
                                    <span class="b-sub-nav-primary__link-text">Рубашки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/futbolki-i-mayki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/futbolki-i-mayki">
                                    <span class="b-sub-nav-primary__link-text">Футболки и майки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/kofty-i-svitery" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/kofty-i-svitery">
                                    <span class="b-sub-nav-primary__link-text">Кофты и свитеры</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/kostiumy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Костюмы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/shkolnye-kostiumy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/shkolnye-kostiumy">
                                    <span class="b-sub-nav-primary__link-text">Школьная форма</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/bryuki-i-dzhinsy" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/bryuki-i-dzhinsy">
                                    <span class="b-sub-nav-primary__link-text">Брюки и джинсы</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/shorty" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/shorty">
                                    <span class="b-sub-nav-primary__link-text">Шорты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/nizhnee-bele" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/nizhnee-bele">
                                    <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malchikov/obuv" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov/obuv">
                                    <span class="b-sub-nav-primary__link-text">Обувь</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="b-sub-nav__section">
                    <div class="b-sub-nav-primary">
                        <div class="b-sub-nav-primary__title">Для малышей</div>
                        <ul class="b-sub-nav-primary__list">
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/nabory-dlya-kresheniya" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/nabory-dlya-kresheniya">
                                    <span class="b-sub-nav-primary__link-text">Наборы для крещения</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/konverty-i-spalnye-meshki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/konverty-i-spalnye-meshki">
                                    <span class="b-sub-nav-primary__link-text">Конверты и спальные мешки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/kostiumy-i-komplekty" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/kostiumy-i-komplekty">
                                    <span class="b-sub-nav-primary__link-text">Костюмы и комплекты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/bodi-i-chelovechki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/bodi-i-chelovechki">
                                    <span class="b-sub-nav-primary__link-text">Боди и песочники</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/polzunki-i-shtany" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/polzunki-i-shtany">
                                    <span class="b-sub-nav-primary__link-text">Ползунки и штаны</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/raspashonki-i-kofty" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/raspashonki-i-kofty">
                                    <span class="b-sub-nav-primary__link-text">Распашонки и кофты</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/pinetki-i-carapki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/pinetki-i-carapki">
                                    <span class="b-sub-nav-primary__link-text">Пинетки и царапки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/platya-i-yubki" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/platya-i-yubki">
                                    <span class="b-sub-nav-primary__link-text">Платья и юбки</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/verhnyaya-odezhda" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/verhnyaya-odezhda">
                                    <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                                </a>
                            </li>
                            <li class="b-sub-nav-primary__list-item">
                                <a href="/kids/dlya-malyshey/obuv" class="b-sub-nav-primary__link js-ga-onclick" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey/obuv">
                                    <span class="b-sub-nav-primary__link-text">Обувь</span>
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
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/kids/dlya-devochek" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-devochek">
                                Вся одежда для девочек
                            </a>
                        </li>
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/kids" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids">
                                Вся детская одежда
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/kids/dlya-malchikov" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malchikov">
                                Вся одежда для мальчиков
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="b-sub-nav__section">
                    <ul class="b-sub-nav-secondary">
                        <li class="b-sub-nav-secondary__item">
                            <a class="b-sub-nav-secondary__link js-ga-onclick" href="/kids/dlya-malyshey" data-event-category="Catalog" data-event-action="Open from dropdown" data-event-label="/kids/dlya-malyshey">
                                Вся одежда для малышей
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>
    <li class="b-nav__item">
        <a class="b-nav__link" href="/page/kak-eto-rabotaet">Как это работает?</a>
    </li>
</ul>
                </div>
                <a class="b-nav__add-link b-nav__add-link_type_collapsed" href="/new" data-event-action="Add new product click" data-event-category="Product" data-event-label="Add new product user menu click" data-details="1"></a>
            </nav>
        </div>
        <div class="b-header-fixed__log-out b-header-links b-header-links_type_inverse">
                <div class="b-header-links__buttons">
                    <a href="/login?next=/" class="b-header-links__auth js-ga-onclick" data-event-action="Registration/Login click" data-event-category="Activities" data-event-label="Registration/Login top click">
                        Вход
                    </a>
                    <span class="b-header-links__separator">|</span>
                    <a href="/login?next=/" class="b-header-links__auth js-ga-onclick" data-event-action="Registration/Login click" data-event-category="Activities" data-event-label="Registration/Login top click">
                        Регистрация
                    </a>
                </div>
                <a class="b-login-button" href="/login">Вход</a>
            </div></div>
</div>
            
        </div>
        </div>
        <!--    </div> -->