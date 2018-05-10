<!DOCTYPE html>
<?php
$cs=Yii::app()->clientScript;
$cs->scriptMap=array(
    'jquery.js'=>false,
    'jquery.ui.js' => false,
    'jquery' => false,
);?>
<?php $jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery'] = $jquery; ?>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Модне кубло</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php 
            if ($this->noindex)  echo '        <meta name="robots" content="noindex">'."\n";
            if ($this->nofollow) echo '        <meta name="robots" content="nofollow">'."\n";
            if (!empty($this->meta['keywords'])) echo '        <meta name="keywords" content="'.CHtml::encode($this->meta['keywords']).'" />'."\n";
            if (!empty($this->meta['description'])) echo '        <meta name="description" content="'.CHtml::encode($this->meta['description']).'" />'."\n"; 
    ?>        <title><?php echo CHtml::encode($this->meta['title']); ?></title>
    <meta name="description" content="Модне кубло - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <meta property="og:title" content="Модне кубло"/>
    <meta property="og:type" content="website"/>

    <meta property="og:url" content="https://domain.loc/my/clothes"/>
    <meta property="og:image" content="/assets/img/shafa-og-image.png"/>
    <meta property="og:description" content="Модне кубло - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <link rel="image_src" href="/assets/img/shafa-og-image.png"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Модне кубло"/>
    <meta name="twitter:description" content="Модне кубло - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <meta name="twitter:image" content="/assets/img/shafa-og-image.png"/>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="Modnekublo">

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
    <meta name="msapplication-TileColor" content="#000000"/>
    <meta name="msapplication-TileImage" content="/assets/mstile-144x144.png"/>
    <meta name="theme-color" content="#ffffff"/>


    <meta name="google-site-verification" content="" />
    <meta name="p:domain_verify" content=""/>
    <meta name="mailru-verification" content=""/>
    <meta name="yandex-verification" content=""/>
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>/css/bootstrap-theme.min.css">
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>assets/build/main.css">
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>/css/custom.css">
    <link rel="dns-prefetch" href="<?php echo $this->themeCss; ?>assets/">
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




    
    <div class="b-section">
        <div class="b-section__container">
            

<header class="b-header">
    <div class="b-header__logo b-logo">
        <a href="/" class="b-logo__link">
            <svg class="b-logo__img" >
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shafa-logo"></use>
            </svg>
        </a>
        <span class="b-logo__slogan">
                Брендовые вещи Доступно
            </span>
    </div>
    <div class="b-header__links b-header-links"><a href="/msg/" class="b-header-links__icon">
                <svg viewBox="0 0 25.001 25.001">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--messages"></use>
                </svg>
                
                    <span class="b-header-links__counter">1</span>
                
            </a>
            <a href="/my/favourites" class="b-header-links__icon">
                <svg viewBox="0 0 24 22.004">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--heart"></use>
                </svg>
            </a>
            <div class="b-header-links__profile js-profile-menu js-dropdown">
                <svg viewBox="0 0 6.8 11" class="b-header-links__profile-arrow">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"></use>
                </svg>
                <div class="b-header-links__profile-image-wrapper">
                    <img class="b-header-links__profile-image"
                         alt="fontez"
                         src="/avatars/438599"
                         title="fontez">
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
        <a class="b-profile-menu__link" href="/member/fontez">Профиль</a>
    </li>
    

    <li class="b-profile-menu__item b-profile-menu__item_type_logout js-logout-link">
        <a href="#" class="b-profile-menu__link js-logout-link" data-form-id="logout-form">Выйти</a>
        <form accept-charset="UTF-8" action="/logout" id="logout-form" method="post">
            <input type="hidden" name="csrfmiddlewaretoken" value="7o58ewRt5bdtaaoQKsAvppK3kcV9Tin8aZVM9fs5azSlnyo8vsijboOZyFdHhJAk" />
        </form>
    </li>
</ul>
            </div></div>
</header>
<nav class="b-nav">
    <div class="b-nav__cell">
        <form action="/women" class="b-search">
            <input type="text" placeholder="Поиск" class="b-search__input" name="search_text" autocomplete="off"/>
            <svg viewBox="0 0 612 617.5" class="b-search__icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--search"></use>
            </svg>
        </form>
        <div class="b-nav__mobile-menu js-catalog-mobile-menu js-dropdown">
            <svg viewBox="0 0 15 14" class="b-nav__burger">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--menu"></use>
            </svg>
            <div class="b-mobile-menu">
    <ul class="b-mobile-menu__list">
        <li class="b-mobile-menu__item">
            <b class="b-mobile-menu__user-name">fontez</b>
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
            <a class="b-mobile-menu__link" href="/member/fontez">
                Профиль
            </a>
        </li>
        

        <li class="b-mobile-menu__item js-logout-link">
            <a class="b-mobile-menu__link js-logout-link" href="#" data-form-id="logout-form">Выход</a>
            <form accept-charset="UTF-8" action="/logout" id="logout-form" method="post">
                <input type="hidden" name="csrfmiddlewaretoken" value="d0JjCEf1rQX9A9nsPD0wuPu5ibovR9TFgBzXxnQDweC1NxnKADIkgOy1wEG3fA6R" />
            </form>
        </li>
    </ul>
</div>
        </div>
        <ul class="b-nav__list">
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Каталог
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav">
            <ul class="b-sub-nav-primary">
                <li class="b-sub-nav-primary__item">
                    <a href="/women/verhnyaya-odezhda" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--outerwears"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/platya" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--dress"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Платья</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/yubki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--skirt"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Юбки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/mayki-i-futbolki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--t-shirt"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Майки и футболки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/rubashki-i-bluzy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--clothes"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Рубашки и блузы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bryuki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--pants"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Брюки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/shorty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shorts"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Шорты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kofty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweater"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кофты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/nizhnee-bele-i-kupalniki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweamwear"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/tufli" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shoes"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Туфли</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/sapogi-i-botinki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--boots"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Сапоги и ботинки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/krossovki-i-kedy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sneakers"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кроссовки и кеды</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bosonozhki-i-shlepancy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sandals"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Босоножки и шлепанцы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/aksessuary" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--bag"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Аксессуары</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kosmetika" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--cosmetics"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Косметика</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/drugoe" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--paper-bag"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Другие вещи</span>
                    </a>
                </li>
            </ul>

            <ul class="b-sub-nav-secondary">
                <li class="b-sub-nav-secondary__item">
                    <a class="b-sub-nav-secondary__link" href="/women">
                        Вся одежда
                    </a>
                </li>
            </ul>
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
    <a class="b-nav__add-link js-ga-onclick"
       href="/new"
       data-event-action="Add new product click"
       data-event-category="Product"
       data-event-label="Add new product user menu click"
       data-details="1">Добавить товар</a>
</nav>
<div class="b-header-fixed js-fixed_header">
    <div class="b-header-fixed__container">
        <div class="b-header-fixed__logo b-logo b-logo_loc_fixed-header">
            <a href="/" class="b-logo__link">
                <svg class="b-logo__img b-logo__img_type_inverse">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shafa-logo"></use>
                </svg>
            </a>
        </div>
        
        <div class="b-header-fixed__nav">
            <nav class="b-nav">
                <div class="b-nav__cell">
                    <form action="/women" class="b-search">
                        <input type="text" placeholder="Поиск" class="b-search__input" name="search_text" autocomplete="off"/>
                        <svg viewBox="0 0 612 617.5" class="b-search__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--search"></use>
                        </svg>
                    </form>
                    <div class="b-nav__mobile-menu js-catalog-mobile-menu js-dropdown">
                        <svg viewBox="0 0 15 14" class="b-nav__burger">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--menu"></use>
                        </svg>
                        <div class="b-mobile-menu">
    <ul class="b-mobile-menu__list">
        <li class="b-mobile-menu__item">
            <b class="b-mobile-menu__user-name">fontez</b>
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
            <a class="b-mobile-menu__link" href="/member/fontez">
                Профиль
            </a>
        </li>
        

        <li class="b-mobile-menu__item js-logout-link">
            <a class="b-mobile-menu__link js-logout-link" href="#" data-form-id="logout-form">Выход</a>
            <form accept-charset="UTF-8" action="/logout" id="logout-form" method="post">
                <input type="hidden" name="csrfmiddlewaretoken" value="CuPSQ1L68w2YvJFZPVMOQiN06ZQ3H8UlF5FwLKmIdUHQI7FhAVuCChRWks8B5z7x" />
            </form>
        </li>
    </ul>
</div>
                    </div>
                    <ul class="b-nav__list">
    <li class="b-nav__item js-catalog-menu js-dropdown">
        <a href="#" class="b-nav__link" onclick="event.preventDefault()">
            Каталог
            <svg viewBox="0 0 6.8 11" class="b-nav__arrow">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav">
            <ul class="b-sub-nav-primary">
                <li class="b-sub-nav-primary__item">
                    <a href="/women/verhnyaya-odezhda" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--outerwears"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/platya" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--dress"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Платья</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/yubki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--skirt"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Юбки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/mayki-i-futbolki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--t-shirt"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Майки и футболки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/rubashki-i-bluzy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--clothes"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Рубашки и блузы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bryuki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--pants"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Брюки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/shorty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shorts"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Шорты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kofty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweater"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кофты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/nizhnee-bele-i-kupalniki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweamwear"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/tufli" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shoes"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Туфли</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/sapogi-i-botinki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--boots"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Сапоги и ботинки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/krossovki-i-kedy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sneakers"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кроссовки и кеды</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bosonozhki-i-shlepancy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sandals"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Босоножки и шлепанцы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/aksessuary" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--bag"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Аксессуары</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kosmetika" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--cosmetics"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Косметика</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/drugoe" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--paper-bag"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Другие вещи</span>
                    </a>
                </li>
            </ul>

            <ul class="b-sub-nav-secondary">
                <li class="b-sub-nav-secondary__item">
                    <a class="b-sub-nav-secondary__link" href="/women">
                        Вся одежда
                    </a>
                </li>
            </ul>
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
                <a class="b-nav__add-link b-nav__add-link_type_collapsed"
                   href="/new"
                   data-event-action="Add new product click"
                   data-event-category="Product"
                   data-event-label="Add new product user menu click"
                   data-details="1"></a>
            </nav>
        </div>
        <div class="b-header-fixed__logged-in b-header-links b-header-links_type_inverse">
                <a href="/msg/" class="b-header-links__icon">
                    <svg viewBox="0 0 25.001 25.001">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--messages"></use>
                    </svg>
                    
                        <span class="b-header-links__counter">1</span>
                    
                </a>
                <a href="/my/favourites" class="b-header-links__icon">
                    <svg viewBox="0 0 24 22.004">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--heart"></use>
                    </svg>
                </a>
                <div class="b-header-links__profile js-profile-menu js-dropdown">
                    <svg viewBox="0 0 6.8 11" class="b-header-links__profile-arrow">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"></use>
                    </svg>
                    <div class="b-header-links__profile-image-wrapper">
                        <img class="b-header-links__profile-image"
                             alt="fontez"
                             src="/avatars/438599"
                             title="fontez">
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
        <a class="b-profile-menu__link" href="/member/fontez">Профиль</a>
    </li>
    

    <li class="b-profile-menu__item b-profile-menu__item_type_logout js-logout-link">
        <a href="#" class="b-profile-menu__link js-logout-link" data-form-id="logout-form">Выйти</a>
        <form accept-charset="UTF-8" action="/logout" id="logout-form" method="post">
            <input type="hidden" name="csrfmiddlewaretoken" value="UKJ29h2UOW4Y8pxjpCjgfXs0Js1108NDXlzG40DwTkJQlNxBaC141WwWXVjzoz0P" />
        </form>
    </li>
</ul>
                </div>
            </div></div>
</div>
            
        </div>
    </div>
    


    
    <div class="b-section">
        <div class="b-section__container">
            <h1 class="b-title b-title_type_thin">
                Мои настройки
            </h1>
        </div>
    </div>
    <div class="b-section">
        <div class="b-section__container b-main">
            <div class="b-main__content">
                <div class="b-main__inner">
                    <div class="b-main__block">
                        
    <form action="/login/send-confirm-email" method="post" id="send-confirm-email-form" style="display: none"><input type="hidden" name="csrfmiddlewaretoken" value="3kR3x3WKFEq5Gdepcu4qmP3dn9VIU5km6VHHsMxmK25XTBeHXuMe8O79BCdgiwxy" /></form>

    <form action="/my/settings" method="post" enctype="multipart/form-data" class="b-settings">
        <input type="hidden" name="csrfmiddlewaretoken" value="sWSL6zoRZah0VgVcDbOWoOBvByHri9uMvxIp1iZt4yWS8EVuobwKaNFrP1ZZGAHY" />
        

        <div class="b-form-row">
            <?php
            if ( Yii::app()->user->isGuest ) {
                echo Yii::app()->user->id;
                Yii::app()->end();
            }
            
            $usr = Users::model()->find('usid='.Yii::app()->user->id);
            //$usr = User::model()->find('uid='.Yii::app()->user->id);
            ?>
            <label class="b-settings__label" for="name">Ваш логин: <?php echo $usr->us_login; ?></label>
        </div>

        <div class="b-form-row">
            <label class="b-settings__label" for="email">E-mail (не будет опубликован) *</label>
            <p class="b-settings__help_text">Не добавляйте email на mail.ru, mail.ua, yandex.ru, yandex.ua, list.ru, inbox.ru, bk.ru, vk.ru, ok.ru</p>
            
            <input type="text" class="b-form-input" id="email" name="email" size="40" value="<?php echo $usr->us_email; ?>"/>
            <div class="b-form-error">
                
            </div>
        </div>

        <div class="b-form-row">
            <label class="b-settings__label">Пароль</label>
            <div>
                <a href="/login/create-password" class="b-button b-button-bg_green" type="button">
                    Создать пароль для входа
                </a>
                <span data-hint="Тут вы можете установить/изменить пароль для входа в Шафу по логину и паролю" style="float: right; margin-top: 8px">
                    <svg class="b-settings__icon">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--question-mark"></use>
                    </svg>
                </span>
            </div>
        </div>

        <div class="b-form-row">
            <label class="b-settings__label" for="name">Имя</label>
            <input type="text" class="b-form-input" id="name" name="first_name" size="40" value="<?php echo $usr->us_email; //echo $usr->us_name; ?>"/>
            <div class="b-form-error">
                
            </div>
        </div>

        <div class="b-form-row">
            <label class="b-settings__label" for="second-name">Фамилия</label>
            <input type="text" class="b-form-input" id="second-name" name="last_name" size="40" value="<?php echo $usr->us_family; ?>"/>
            <div class="b-form-error">
                
            </div>
        </div>
<!--
        <div class="b-form-row">
            <div class="b-settings__label">Изменить фото профиля</div>
            <span class="b-new-feature">New</span>
            
            <p class="b-settings__help_text">Выберите квадратное фото не менее 200*200</p>
            <div class="b-settings__picture">
                <label class="b-settings__picture-label b-button-bordered b-button-bordered_theme_gray">
                    <input type="file" class="b-settings__picture-input js-photo-input" name="picture"/>
                    Загрузить
                </label><span class="js-photo-input-name"></span>
            </div>
            <div class="b-settings__hint_pro b-hidden js-photo-help-text">
                Чтобы изменения вступили в силу, нажмите "Сохранить"
            </div>
            
            <div class="b-form-error">
                
            </div>
        </div>
-->
        
            
        

        <div class="b-form-row">
            <label class="b-settings__label" for="show-name">Показывать настоящее имя</label>
            <div class="b-form-select">
                <select name="show_real_name" class="b-form-select__list" id="show-name">
                    <option value="1" >Всем</option>
                    <option value="2" >Только для зарегистрированных пользователей</option>
                    <option value="3" selected>Никому</option>
                </select>
            </div>
        </div>

        

        <div class="b-form-row">
            <label class="b-settings__label" for="show-social-web-site">Показывать ссылку на мой социальный профиль</label>
            <div class="b-form-select">
                <select name="show_social_web_site" class="b-form-select__list" id="show_social_web_site">
                    <option value="y" selected>Да</option>
                    <option value="n" >Нет</option>
                </select>
            </div>
        </div>

        <div class="b-form-row">
            <label class="b-settings__label" for="city">Город</label>
            <div class="b-form-select">
                <select class="b-form-select__list" name="city" id="city">
                
                    <option value="130" >
                        Авдеевка
                    </option>
                
                    <option value="183" >
                        Александрия
                    </option>
                
                    <option value="137" >
                        Александровка
                    </option>
                
                    <option value="311" >
                        Алупка
                    </option>
                
                    <option value="141" >
                        Алушта
                    </option>
                
                    <option value="36" >
                        Алчевск
                    </option>
                
                    <option value="292" >
                        Амвросиевка
                    </option>
                
                    <option value="162" >
                        Антрацит
                    </option>
                
                    <option value="169" >
                        Армянск
                    </option>
                
                    <option value="193" >
                        Артёмовск
                    </option>
                
                    <option value="210" >
                        Ахтырка
                    </option>
                
                    <option value="131" >
                        Балаклея
                    </option>
                
                    <option value="175" >
                        Барышевка
                    </option>
                
                    <option value="127" >
                        Бахчисарай
                    </option>
                
                    <option value="145" >
                        Баштанка
                    </option>
                
                    <option value="40" >
                        Белая Церковь
                    </option>
                
                    <option value="338" >
                        Белгород-Днестровский
                    </option>
                
                    <option value="275" >
                        Белозерка
                    </option>
                
                    <option value="248" >
                        Бердичев
                    </option>
                
                    <option value="57" >
                        Бердянск
                    </option>
                
                    <option value="129" >
                        Берегово
                    </option>
                
                    <option value="213" >
                        Бережаны
                    </option>
                
                    <option value="361" >
                        Березань
                    </option>
                
                    <option value="360" >
                        Берислав
                    </option>
                
                    <option value="332" >
                        Близнюки
                    </option>
                
                    <option value="208" >
                        Богодухов
                    </option>
                
                    <option value="246" >
                        Богородчаны
                    </option>
                
                    <option value="300" >
                        Богуслав
                    </option>
                
                    <option value="342" >
                        Болгар
                    </option>
                
                    <option value="236" >
                        Болград
                    </option>
                
                    <option value="111" >
                        Большая Белозерка
                    </option>
                
                    <option value="29" >
                        Борисполь
                    </option>
                
                    <option value="200" >
                        Боровая
                    </option>
                
                    <option value="294" >
                        Бородянка
                    </option>
                
                    <option value="128" >
                        Бояны
                    </option>
                
                    <option value="99" >
                        Боярка
                    </option>
                
                    <option value="104" >
                        Бровары
                    </option>
                
                    <option value="310" >
                        Броды
                    </option>
                
                    <option value="283" >
                        Буда
                    </option>
                
                    <option value="96" >
                        Бурштын
                    </option>
                
                    <option value="215" >
                        Бурынь
                    </option>
                
                    <option value="365" >
                        Буча
                    </option>
                
                    <option value="168" >
                        Бучач
                    </option>
                
                    <option value="116" >
                        Валки
                    </option>
                
                    <option value="120" >
                        Васильевка
                    </option>
                
                    <option value="178" >
                        Васильков
                    </option>
                
                    <option value="289" >
                        Великий Берёзный
                    </option>
                
                    <option value="352" >
                        Веселиново
                    </option>
                
                    <option value="85" >
                        Винница
                    </option>
                
                    <option value="180" >
                        Виноградов
                    </option>
                
                    <option value="308" >
                        Владимир-Волынский
                    </option>
                
                    <option value="261" >
                        Вознесенск
                    </option>
                
                    <option value="368" >
                        Волноваха
                    </option>
                
                    <option value="253" >
                        Волочиск
                    </option>
                
                    <option value="187" >
                        Волчанск
                    </option>
                
                    <option value="126" >
                        Вольногорск
                    </option>
                
                    <option value="230" >
                        Воронов
                    </option>
                
                    <option value="305" >
                        Высокий
                    </option>
                
                    <option value="114" >
                        Вышгород
                    </option>
                
                    <option value="160" >
                        Гадяч
                    </option>
                
                    <option value="296" >
                        Галич
                    </option>
                
                    <option value="251" >
                        Гаспра
                    </option>
                
                    <option value="315" >
                        Геническ
                    </option>
                
                    <option value="317" >
                        Глыбокая
                    </option>
                
                    <option value="223" >
                        Голая Пристань
                    </option>
                
                    <option value="59" >
                        Горловка
                    </option>
                
                    <option value="356" >
                        Городенка
                    </option>
                
                    <option value="316" >
                        Городок
                    </option>
                
                    <option value="362" >
                        Горохов
                    </option>
                
                    <option value="335" >
                        Гурзуф
                    </option>
                
                    <option value="151" >
                        Гута
                    </option>
                
                    <option value="191" >
                        Двуречная
                    </option>
                
                    <option value="143" >
                        Дебальцево
                    </option>
                
                    <option value="322" >
                        Денисовка
                    </option>
                
                    <option value="108" >
                        Деражня
                    </option>
                
                    <option value="48" >
                        Дергачи
                    </option>
                
                    <option value="312" >
                        Десна
                    </option>
                
                    <option value="147" >
                        Джанкой
                    </option>
                
                    <option value="229" >
                        Дзержинск
                    </option>
                
                    <option value="196" >
                        Диканька
                    </option>
                
                    <option value="206" >
                        Димитров
                    </option>
                
                    <option value="132" >
                        Дмитровка
                    </option>
                
                    <option value="94" >
                        Днепродзержинск
                    </option>
                
                    <option value="33" >
                        Днепропетровск
                    </option>
                
                    <option value="146" >
                        Днепрорудное
                    </option>
                
                    <option value="364" >
                        Доброполье
                    </option>
                
                    <option value="318" >
                        Докучаевск
                    </option>
                
                    <option value="46" >
                        Долина
                    </option>
                
                    <option value="7" >
                        Донецк
                    </option>
                
                    <option value="185" >
                        Дрогобыч
                    </option>
                
                    <option value="182" >
                        Дружковка
                    </option>
                
                    <option value="280" >
                        Дунаевцы
                    </option>
                
                    <option value="51" >
                        Евпатория
                    </option>
                
                    <option value="255" >
                        Енакиево
                    </option>
                
                    <option value="299" >
                        Жёлтые Воды
                    </option>
                
                    <option value="350" >
                        Жидачов
                    </option>
                
                    <option value="32" >
                        Житомир
                    </option>
                
                    <option value="351" >
                        Зазимье
                    </option>
                
                    <option value="8" >
                        Запорожье
                    </option>
                
                    <option value="247" >
                        Збараж
                    </option>
                
                    <option value="344" >
                        Змиёв
                    </option>
                
                    <option value="271" >
                        Знаменка
                    </option>
                
                    <option value="64" >
                        Золотоноша
                    </option>
                
                    <option value="105" >
                        Золочев
                    </option>
                
                    <option value="252" >
                        Зугрэс
                    </option>
                
                    <option value="89" >
                        Ивано-Франковск
                    </option>
                
                    <option value="58" >
                        Измаил
                    </option>
                
                    <option value="319" >
                        Изюм
                    </option>
                
                    <option value="77" >
                        Изяслав
                    </option>
                
                    <option value="73" >
                        Ильичевск
                    </option>
                
                    <option value="366" >
                        Ирпень
                    </option>
                
                    <option value="28" >
                        Ирпин
                    </option>
                
                    <option value="71" >
                        Иршава
                    </option>
                
                    <option value="257" >
                        Ичня
                    </option>
                
                    <option value="228" >
                        Кагарлык
                    </option>
                
                    <option value="45" >
                        Казатин
                    </option>
                
                    <option value="258" >
                        Калинов
                    </option>
                
                    <option value="60" >
                        Калиновка
                    </option>
                
                    <option value="55" >
                        Калуш
                    </option>
                
                    <option value="369" >
                        Каменец-Подольский
                    </option>
                
                    <option value="97" >
                        Каменка Бугская
                    </option>
                
                    <option value="276" >
                        Кандель
                    </option>
                
                    <option value="309" >
                        Канев
                    </option>
                
                    <option value="203" >
                        Карловка
                    </option>
                
                    <option value="270" >
                        Катеринополь
                    </option>
                
                    <option value="242" >
                        Каховка
                    </option>
                
                    <option value="357" >
                        Кегичёвка
                    </option>
                
                    <option value="222" >
                        Кельменцы
                    </option>
                
                    <option value="52" >
                        Керчь
                    </option>
                
                    <option value="179" >
                        Киверцы
                    </option>
                
                    <option value="5" >
                        Киев
                    </option>
                
                    <option value="192" >
                        Килия
                    </option>
                
                    <option value="16" >
                        Кировоград
                    </option>
                
                    <option value="227" >
                        Киселев
                    </option>
                
                    <option value="349" >
                        Кицмань
                    </option>
                
                    <option value="266" >
                        Клевань
                    </option>
                
                    <option value="140" >
                        Ковель
                    </option>
                
                    <option value="88" >
                        Козин
                    </option>
                
                    <option value="198" >
                        Козова
                    </option>
                
                    <option value="321" >
                        Коктебель
                    </option>
                
                    <option value="134" >
                        Коломыя
                    </option>
                
                    <option value="268" >
                        Комарно
                    </option>
                
                    <option value="243" >
                        Комсомольск
                    </option>
                
                    <option value="163" >
                        Коновалов
                    </option>
                
                    <option value="63" >
                        Конотоп
                    </option>
                
                    <option value="133" >
                        Константиновка
                    </option>
                
                    <option value="138" >
                        Кореиз
                    </option>
                
                    <option value="70" >
                        Королево
                    </option>
                
                    <option value="158" >
                        Коростень
                    </option>
                
                    <option value="241" >
                        Корсунь-Шевченковский
                    </option>
                
                    <option value="273" >
                        Костополь
                    </option>
                
                    <option value="260" >
                        Котовск
                    </option>
                
                    <option value="24" >
                        Краматорск
                    </option>
                
                    <option value="329" >
                        Красилов
                    </option>
                
                    <option value="107" >
                        Красноармейск
                    </option>
                
                    <option value="245" >
                        Красноград
                    </option>
                
                    <option value="86" >
                        Краснодон
                    </option>
                
                    <option value="323" >
                        Краснокутск
                    </option>
                
                    <option value="75" >
                        Красноперекопск
                    </option>
                
                    <option value="142" >
                        Красный Лиман
                    </option>
                
                    <option value="207" >
                        Красный Луч
                    </option>
                
                    <option value="166" >
                        Красный Октябрь
                    </option>
                
                    <option value="219" >
                        Кременец
                    </option>
                
                    <option value="345" >
                        Кременная
                    </option>
                
                    <option value="93" >
                        Кременчуг
                    </option>
                
                    <option value="240" >
                        Кривой Рог
                    </option>
                
                    <option value="149" >
                        Кролевец
                    </option>
                
                    <option value="87" >
                        Куликов
                    </option>
                
                    <option value="281" >
                        Куна
                    </option>
                
                    <option value="343" >
                        Купянск
                    </option>
                
                    <option value="250" >
                        Курахово
                    </option>
                
                    <option value="136" >
                        Лазурное
                    </option>
                
                    <option value="259" >
                        Лебедин
                    </option>
                
                    <option value="341" >
                        Летичев
                    </option>
                
                    <option value="177" >
                        Лиман
                    </option>
                
                    <option value="204" >
                        Липовец
                    </option>
                
                    <option value="47" >
                        Лисичанск
                    </option>
                
                    <option value="197" >
                        Лозовая
                    </option>
                
                    <option value="188" >
                        Лубны
                    </option>
                
                    <option value="72" >
                        Луганск
                    </option>
                
                    <option value="212" >
                        Лутугино
                    </option>
                
                    <option value="13" >
                        Луцк
                    </option>
                
                    <option value="6" >
                        Львов
                    </option>
                
                    <option value="286" >
                        Макаров
                    </option>
                
                    <option value="23" >
                        Макеевка
                    </option>
                
                    <option value="80" >
                        Максим
                    </option>
                
                    <option value="164" >
                        Малая Белозерка
                    </option>
                
                    <option value="189" >
                        Малин
                    </option>
                
                    <option value="172" >
                        Малиновка
                    </option>
                
                    <option value="83" >
                        Марганец
                    </option>
                
                    <option value="53" >
                        Марина
                    </option>
                
                    <option value="10" >
                        Мариуполь
                    </option>
                
                    <option value="278" >
                        Марково
                    </option>
                
                    <option value="66" >
                        Марс
                    </option>
                
                    <option value="152" >
                        Медведев
                    </option>
                
                    <option value="265" >
                        Межевая
                    </option>
                
                    <option value="25" >
                        Мелитополь
                    </option>
                
                    <option value="285" >
                        Мельник
                    </option>
                
                    <option value="150" >
                        Мерефа
                    </option>
                
                    <option value="244" >
                        Миргород
                    </option>
                
                    <option value="155" >
                        Мироновка
                    </option>
                
                    <option value="195" >
                        Могила
                    </option>
                
                    <option value="220" >
                        Молодогвардейск
                    </option>
                
                    <option value="156" >
                        Моршин
                    </option>
                
                    <option value="284" >
                        Мостиска
                    </option>
                
                    <option value="39" >
                        Мукачево
                    </option>
                
                    <option value="324" >
                        Научный
                    </option>
                
                    <option value="49" >
                        Нежин
                    </option>
                
                    <option value="231" >
                        Немиров
                    </option>
                
                    <option value="209" >
                        Нетишин
                    </option>
                
                    <option value="2" >
                        Не указан
                    </option>
                
                    <option value="334" >
                        Нижнегорский
                    </option>
                
                    <option value="26" >
                        Николаев
                    </option>
                
                    <option value="18" >
                        Никополь
                    </option>
                
                    <option value="161" >
                        Новая Каховка
                    </option>
                
                    <option value="184" >
                        Нововолынск
                    </option>
                
                    <option value="262" >
                        Новогродовка
                    </option>
                
                    <option value="353" >
                        Новодружеск
                    </option>
                
                    <option value="15" >
                        Новомосковск
                    </option>
                
                    <option value="269" >
                        Новый Раздол
                    </option>
                
                    <option value="295" >
                        Носовка
                    </option>
                
                    <option value="69" >
                        Обухов
                    </option>
                
                    <option value="56" >
                        Овидиополь
                    </option>
                
                    <option value="314" >
                        Овруч
                    </option>
                
                    <option value="359" >
                        Одесса
                    </option>
                
                    <option value="106" >
                        Орджоникидзе
                    </option>
                
                    <option value="293" >
                        Орловка
                    </option>
                
                    <option value="328" >
                        Павлоград
                    </option>
                
                    <option value="221" >
                        Первомайск
                    </option>
                
                    <option value="50" >
                        Первомайский
                    </option>
                
                    <option value="282" >
                        Перечин
                    </option>
                
                    <option value="235" >
                        Переяслав-Хмельницкий
                    </option>
                
                    <option value="153" >
                        Песочин
                    </option>
                
                    <option value="81" >
                        Петровское
                    </option>
                
                    <option value="54" >
                        Победа
                    </option>
                
                    <option value="84" >
                        Погорелов
                    </option>
                
                    <option value="119" >
                        Подгородное
                    </option>
                
                    <option value="109" >
                        Полонное
                    </option>
                
                    <option value="102" >
                        Полтава
                    </option>
                
                    <option value="174" >
                        Поляна
                    </option>
                
                    <option value="327" >
                        Попельня
                    </option>
                
                    <option value="267" >
                        Поповка
                    </option>
                
                    <option value="339" >
                        Почаев
                    </option>
                
                    <option value="171" >
                        Прилуки
                    </option>
                
                    <option value="148" >
                        Приморск
                    </option>
                
                    <option value="41" >
                        Прогресс
                    </option>
                
                    <option value="263" >
                        Путивль
                    </option>
                
                    <option value="205" >
                        Раздельная
                    </option>
                
                    <option value="234" >
                        Рахов
                    </option>
                
                    <option value="118" >
                        Ржищев
                    </option>
                
                    <option value="254" >
                        Ровеньки
                    </option>
                
                    <option value="31" >
                        Ровно
                    </option>
                
                    <option value="121" >
                        Рогатин
                    </option>
                
                    <option value="122" >
                        Рожище
                    </option>
                
                    <option value="173" >
                        Ромны
                    </option>
                
                    <option value="226" >
                        Рубежное
                    </option>
                
                    <option value="144" >
                        Саки
                    </option>
                
                    <option value="110" >
                        Сарны
                    </option>
                
                    <option value="124" >
                        Сартана
                    </option>
                
                    <option value="370" >
                        Сватово
                    </option>
                
                    <option value="256" >
                        Свердловск
                    </option>
                
                    <option value="306" >
                        Свесса
                    </option>
                
                    <option value="95" >
                        Светловодск
                    </option>
                
                    <option value="68" >
                        Свобода
                    </option>
                
                    <option value="17" >
                        Севастополь
                    </option>
                
                    <option value="35" >
                        Северодонецк
                    </option>
                
                    <option value="181" >
                        Селидово
                    </option>
                
                    <option value="277" >
                        Симеиз
                    </option>
                
                    <option value="4" >
                        Симферополь
                    </option>
                
                    <option value="186" >
                        Синельниково
                    </option>
                
                    <option value="74" >
                        Скадовск
                    </option>
                
                    <option value="78" >
                        Славута
                    </option>
                
                    <option value="336" >
                        Славутич
                    </option>
                
                    <option value="272" >
                        Славяносербск
                    </option>
                
                    <option value="67" >
                        Славянск
                    </option>
                
                    <option value="176" >
                        Смела
                    </option>
                
                    <option value="287" >
                        Снежное
                    </option>
                
                    <option value="101" >
                        Сокаль
                    </option>
                
                    <option value="337" >
                        Сокиряны
                    </option>
                
                    <option value="82" >
                        Соколов
                    </option>
                
                    <option value="225" >
                        Соледар
                    </option>
                
                    <option value="117" >
                        Соленое
                    </option>
                
                    <option value="355" >
                        Солоницевка
                    </option>
                
                    <option value="358" >
                        Сосновка
                    </option>
                
                    <option value="218" >
                        Старобельск
                    </option>
                
                    <option value="330" >
                        Староконстантинов
                    </option>
                
                    <option value="367" >
                        Старый Самбор
                    </option>
                
                    <option value="34" >
                        Стаханов
                    </option>
                
                    <option value="135" >
                        Стрый
                    </option>
                
                    <option value="325" >
                        Суворово
                    </option>
                
                    <option value="159" >
                        Судак
                    </option>
                
                    <option value="123" >
                        Судовая Вишня
                    </option>
                
                    <option value="20" >
                        Сумы
                    </option>
                
                    <option value="76" >
                        Теофиполь
                    </option>
                
                    <option value="90" >
                        Теплогорск
                    </option>
                
                    <option value="199" >
                        Теплодар
                    </option>
                
                    <option value="288" >
                        Терновка
                    </option>
                
                    <option value="9" >
                        Тернополь
                    </option>
                
                    <option value="170" >
                        Токмак
                    </option>
                
                    <option value="237" >
                        Толга
                    </option>
                
                    <option value="42" >
                        Толстой
                    </option>
                
                    <option value="139" >
                        Торез
                    </option>
                
                    <option value="115" >
                        Тошковка
                    </option>
                
                    <option value="217" >
                        Трускавец
                    </option>
                
                    <option value="65" >
                        Тячев
                    </option>
                
                    <option value="232" >
                        Угледар
                    </option>
                
                    <option value="14" >
                        Ужгород
                    </option>
                
                    <option value="333" >
                        Узин
                    </option>
                
                    <option value="154" >
                        Украинка
                    </option>
                
                    <option value="98" >
                        Умань
                    </option>
                
                    <option value="37" >
                        Фастов
                    </option>
                
                    <option value="112" >
                        Феодосия
                    </option>
                
                    <option value="194" >
                        Флора
                    </option>
                
                    <option value="348" >
                        Харцызск
                    </option>
                
                    <option value="11" >
                        Харьков
                    </option>
                
                    <option value="27" >
                        Хатне
                    </option>
                
                    <option value="3" >
                        Херсон
                    </option>
                
                    <option value="290" >
                        Хмельник
                    </option>
                
                    <option value="22" >
                        Хмельницкий
                    </option>
                
                    <option value="298" >
                        Хорол
                    </option>
                
                    <option value="113" >
                        Хотин
                    </option>
                
                    <option value="44" >
                        Хуст
                    </option>
                
                    <option value="211" >
                        Хыров
                    </option>
                
                    <option value="214" >
                        Цюрупинск
                    </option>
                
                    <option value="12" >
                        Червоноград
                    </option>
                
                    <option value="30" >
                        Черкассы
                    </option>
                
                    <option value="320" >
                        Черневцы
                    </option>
                
                    <option value="21" >
                        Чернигов
                    </option>
                
                    <option value="216" >
                        Чернобай
                    </option>
                
                    <option value="19" >
                        Чернобыль
                    </option>
                
                    <option value="43" >
                        Черновцы
                    </option>
                
                    <option value="91" >
                        Чугуев
                    </option>
                
                    <option value="100" >
                        Чуднов
                    </option>
                
                    <option value="61" >
                        Шаргород
                    </option>
                
                    <option value="331" >
                        Шепетовка
                    </option>
                
                    <option value="79" >
                        Шостка
                    </option>
                
                    <option value="371" >
                        Энергодар
                    </option>
                
                    <option value="303" >
                        Южное
                    </option>
                
                    <option value="363" >
                        Южноукраинск
                    </option>
                
                    <option value="165" >
                        Яворов
                    </option>
                
                    <option value="340" >
                        Яготин
                    </option>
                
                    <option value="38" >
                        Ялта
                    </option>
                
                    <option value="201" >
                        Янов
                    </option>
                
                    <option value="313" >
                        Яремче
                    </option>
                
                    <option value="224" >
                        Ясиноватая
                    </option>
                
                </select>
            </div>
            <div class="b-form-error">
                
            </div>
        </div>

        <div class="b-form-row">
            <label class="b-settings__label" for="gender">Пол</label>
            <div class="b-form-select">
                <select class="b-form-select__list" name="gender" id="gender">
                    <option value="F" >Женщина</option>
                    <option value="M" selected>Мужчина</option>
                </select>
            </div>
        </div>

        <div class="b-form-row">
            <label class="b-settings__label" for="about">О себе</label>
            <textarea class="b-form-textarea" id="about" name="about" rows="15"></textarea>
        </div>

        <div class="b-form-row">
            <button class="b-button b-button_pull_right b-settings__button">Сохранить</button>
            <a href="/member/fontez" class="b-settings__link">Просмотр профиля</a>
        </div>
    </form>
    <form id="js-photo-reset-form" method="post" action="/member/util/reset-photo">
        <input type="hidden" name="csrfmiddlewaretoken" value="so7a9tFhIDl6RWE7mPU79GfLatp7TegcvZXO4cgTN10Y4kEp7PCVVFjHoWHFhFto" />
    </form>

                    </div>
                </div>
            </div>
            <aside class="b-main__aside">
                <div class="b-main__inner">
                    <ul>
                        <li class="b-side-nav">
                            <a href="/my/settings"
                               class="b-side-nav__link b-side-nav__link_state_active">
                                Основная информация
                            </a>
                        </li>
                        <li class="b-side-nav">
                            <a href="/my/settings/notifications"
                               class="b-side-nav__link ">
                                Настройки уведомлений по почте
                            </a>
                        </li>
                        <li class="b-side-nav">
                            <a href="/my/settings/size"
                               class="b-side-nav__link ">
                                Мои размеры
                            </a>
                        </li>

                        <li class="b-side-nav">
                            <a href="/my/settings/shop"
                               class="b-side-nav__link ">
                                Настройки магазина
                            </a>
                        </li>
                        <li class="b-side-nav">
                            <a href="/my/settings/cards"
                               class="b-side-nav__link ">
                                Настройки платежей
                            </a>
                        </li>
                        <li class="b-side-nav">
                            <a href="/my/settings/mt"
                               class="b-side-nav__link ">
                                Готовые ответы
                            </a>
                        </li>
                        
                        
                    </ul>
                </div>
            </aside>
        </div>
    </div>

    <div class="b-section b-section_bg_footer">
        <footer class="b-section__container">
            <div class="b-footer b-section__vertical-indent">
    <div class="b-footer-info">
        <p class="b-footer-info__copyright">&copy; 2017 <a href="/" class="b-footer-info__link">fontez.com</a>
            <span class="b-footer-info__text">Модная женская одежда и аксессуары по доступной цене. Все права защищены</span>
        </p>
        <ul class="b-footer-info__list b-footer-list">
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" rel="nofollow"
                   href="/page/rabota-v-shafe">Работа в Шафе</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link"
                   href="http://blog.fontez.com/">Наш блог</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link"
                   href="/page/kak-eto-rabotaet">Как это работает?</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link"
                   href="/privacy-policy">Privacy policy</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link"
                   href="/terms-of-service">Договор-оферта</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" rel="nofollow"
                   href="https://plus.google.com/108317175350006940956">Мы в Google+</a>
            </li>
        </ul>
    </div>
</div>
        <div class="freeman" style="display: none;">
        <p>Developed by <a href="https://vk.com/freemanf">Freeman</a></p>
    </div>
    </div>

    <script>
    window.staticUrl = '/assets/';
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
    </script>



    <?php
    
    //Yii::app()->clientScript->scriptMap=array(
    //    'jquery.js'=>false,
//);
   // $cs=Yii::app()->clientScript;
//$cs->scriptMap=array(
 //   'jquery.js'=>'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js?1',
//); 
//$cs->registerScriptFile('jquery.js',CClientScript::POS_HEAD);
?>
    <script type="text/javascript" src="<?php echo $this->themeCss; ?>js/bootstrap.min.js"></script>

    <script defer src="<?php echo $this->themeCss; ?>/assets/build/shared.js"></script>
    <script defer src="<?php echo $this->themeCss; ?>/assets/build/global.js"></script>

    <script>
    $(document).ready(function() {
        //$('.dropdown-toggle').dropdown();
    });
    </script>
</body>

</html>