<!DOCTYPE html>
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
    <link rel="stylesheet" media="all" href="<?php echo $this->themeCss; ?>assets/build/main.css">
    <link rel="dns-prefetch" href="<?php echo $this->themeCss; ?>assets/">
    <link rel="dns-prefetch" href="/avatars/">
    <link rel="dns-prefetch" href="/image-thumbnails/">

    
</head>
<!--
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo $this->themeCss; ?>vendor.css">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/5.0.0/normalize.css">
    <link rel="stylesheet" href="<?php echo $this->themeJs; ?>libs/owl.carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $this->themeJs; ?>libs/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $this->themeCss; ?>main.css">
    <link rel="stylesheet" href="<?php echo $this->themeCss; ?>media.css">
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!--
  </head>
  -->
  <body>
 <script>
//  window.fbAsyncInit = function() {
//    FB.init({
//      appId      : '741607065872333',
//      xfbml      : true,
//      version    : 'v2.9'
//   });
//   FB.AppEvents.logPageView();
//  };

//  (function(d, s, id){
//     var js, fjs = d.getElementsByTagName(s)[0];
//     if (d.getElementById(id)) {return;}
//     js = d.createElement(s); js.id = id;
//     js.src = "//connect.facebook.net/en_US/sdk.js";
//     fjs.parentNode.insertBefore(js, fjs);
//   }(document, 'script', 'facebook-jssdk'));
</script>
<!--
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
	  //logOutF();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '741607065872333',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/uk_UA/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!'+'<br/><img src="http://graph.facebook.com/'+response.id+'/picture?type=small">'
    });
  }
  
  function logOutF(){
	FB.logout(function(response) {
	// user is now logged out
	console.log('User is logged out.');
	document.getElementById('status').innerHTML =
        'Your logged out!';
	});
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

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
                
            </span>
    </div>
    <div class="b-header__links b-header-links"><a href="/msg/" class="b-header-links__icon">
                <svg viewBox="0 0 25.001 25.001">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--messages"/>
                </svg>
                
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
                    <img class="b-header-links__profile-image" alt="fontez" src="/assets/_profiles_f_fr_fre_freeman4_test-pro.adr.com.ua_themes_main_assets1496602619/css//assets/logo.png" title="fontez">
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
            <input name="csrfmiddlewaretoken" value="DN4enDuCfu4kUxrX6sNu0ytPkOPxS35tGoUSim5ekSJc7VrfRsviMxxLyh75guiF" type="hidden">
        </form>
    </li>
</ul>
            </div></div>
</header>
<nav class="b-nav">
    <div class="b-nav__cell">
        <form action="/women" class="b-search">
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
                <input name="csrfmiddlewaretoken" value="vKwGFTPb6CTgkJK4s4ecMXYARwxrvjw4ylmkACqNb0y8x7Kmd4W0yW2w5ZPZTKJg" type="hidden">
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
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"/>
            </svg>
        </a>
        <div class="b-sub-nav">
            <ul class="b-sub-nav-primary">
                <li class="b-sub-nav-primary__item">
                    <a href="/women/verhnyaya-odezhda" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--outerwears"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/platya" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--dress"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Платья</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/yubki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--skirt"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Юбки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/mayki-i-futbolki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--t-shirt"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Майки и футболки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/rubashki-i-bluzy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--clothes"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Рубашки и блузы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bryuki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--pants"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Брюки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/shorty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--shorts"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Шорты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kofty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--sweater"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кофты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/nizhnee-bele-i-kupalniki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--sweamwear"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/tufli" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--shoes"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Туфли</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/sapogi-i-botinki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--boots"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Сапоги и ботинки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/krossovki-i-kedy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--sneakers"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кроссовки и кеды</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bosonozhki-i-shlepancy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--sandals"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Босоножки и шлепанцы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/aksessuary" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--bag"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Аксессуары</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kosmetika" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--cosmetics"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Косметика</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/drugoe" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--paper-bag"/>
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
    <a class="b-nav__add-link js-ga-onclick" href="/new" data-event-action="Add new product click" data-event-category="Product" data-event-label="Add new product user menu click" data-details="1">Добавить товар</a>
</nav>
<div class="b-header-fixed js-fixed_header">
    <div class="b-header-fixed__container">
        <div class="b-header-fixed__logo b-logo b-logo_loc_fixed-header">
            <a href="/" class="b-logo__link">
                <svg class="b-logo__img b-logo__img_type_inverse">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--shafa-logo"/>
                </svg>
            </a>
        </div>
        
        <div class="b-header-fixed__nav">
            <nav class="b-nav">
                <div class="b-nav__cell">
                    <form action="/women" class="b-search">
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
                <input name="csrfmiddlewaretoken" value="hPN0QbqhfLWrk5eXp19GOwpjrcFTcRKqkqDELU1Tk9Bjxtefa1RuAvtfFFXrAiXC" type="hidden">
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
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"/>
            </svg>
        </a>
        <div class="b-sub-nav">
            <ul class="b-sub-nav-primary">
                <li class="b-sub-nav-primary__item">
                    <a href="/women/verhnyaya-odezhda" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--outerwears"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/platya" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--dress"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Платья</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/yubki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--skirt"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Юбки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/mayki-i-futbolki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--t-shirt"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Майки и футболки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/rubashki-i-bluzy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--clothes"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Рубашки и блузы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bryuki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--pants"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Брюки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/shorty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--shorts"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Шорты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kofty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--sweater"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кофты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/nizhnee-bele-i-kupalniki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--sweamwear"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/tufli" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--shoes"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Туфли</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/sapogi-i-botinki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--boots"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Сапоги и ботинки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/krossovki-i-kedy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--sneakers"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кроссовки и кеды</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bosonozhki-i-shlepancy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--sandals"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Босоножки и шлепанцы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/aksessuary" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--bag"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Аксессуары</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kosmetika" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--cosmetics"/>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Косметика</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/drugoe" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--paper-bag"/>
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
                <a class="b-nav__add-link b-nav__add-link_type_collapsed" href="/new" data-event-action="Add new product click" data-event-category="Product" data-event-label="Add new product user menu click" data-details="1"></a>
            </nav>
        </div>
        <div class="b-header-fixed__logged-in b-header-links b-header-links_type_inverse">
                <a href="/msg/" class="b-header-links__icon">
                    <svg viewBox="0 0 25.001 25.001">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--messages"/>
                    </svg>
                    
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
                        <img class="b-header-links__profile-image" alt="fontez" src="/avatars/438599" title="fontez">
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
            <input name="csrfmiddlewaretoken" value="SvSF6kJZtbmNGckR0IzS4BDmN8pa8Oj3V6Ij13kByz1FTAk9LIhGQAHi1BHIwfwf" type="hidden">
        </form>
    </li>
</ul>
                </div>
            </div></div>
</div>
            
        </div>
    </div>
    <div class="b-section">
        <div class="b-section__container b-add-product js-add-product">
            <form data-reactroot="" action="/new" method="post">
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Загрузите фотографии</h2>
                    <div class="b-section"></div>
                    <div class="b-image-upload b-hidden">
                        <div class="b-image-upload__alert">Первое фото станет обложкой карточки товара</div>
                        <div class="b-image-upload__count">
                            <!-- react-text: 254 -->(
                            <!-- /react-text -->
                            <!-- react-text: 255 -->0
                            <!-- /react-text -->
                            <!-- react-text: 256 -->из 3 загружено)
                            <!-- /react-text --><span class="b-image-upload__loader b-hidden"><img src="<?php echo $this->themeCss; ?>/assets/img/uploading.gif"></span></div>
                        <ul class="b-image-upload__list">
                            <li class="b-image-upload__item">
                                <div class="b-image-upload___item-inner">
                                    <div class="b-image-upload___content">
                                        <svg class="b-image-upload__icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--square"></use>
                                        </svg>
                                        <div class="b-image-upload__text"><span class="b-image-upload__link">Загрузите</span>
                                            <!-- react-text: 266 -->фото вас в изделии в полном размере
                                            <!-- /react-text -->
                                        </div>
                                    </div>
                                    <div class="b-image-upload__image-container"><img class="b-image-upload__image" src="#" alt="your image"></div>
                                    <input type="hidden" class="style-input-js" name="cover-style" value="">
                                    <input type="file" id="upload-img" class="b-image-upload__upload-input" name="cover" title="Кликните для выбора фото" multiple="">
                                </div>
                            </li>
                            
                            <li class="b-image-upload__item">
                                <div class="b-image-upload___item-inner">
                                    <div class="b-image-upload___content">
                                        <svg class="b-image-upload__icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--label"></use>
                                        </svg>
                                        <div class="b-image-upload__text"><span class="b-image-upload__link">Загрузите</span>
                                            <!-- react-text: 299 -->фото бирочки изделия
                                            <!-- /react-text -->
                                        </div>
                                    </div>
                                    <div class="b-image-upload__image-container"><img class="b-image-upload__image" src="#" alt="your image"></div>
                                    <input type="hidden" class="style-input-js" name="cover-style" value="">
                                    <input type="file" id="upload-img" class="b-image-upload__upload-input" name="cover" title="Кликните для выбора фото" multiple="">
                                </div>
                            </li>
                            <li class="b-image-upload__item">
                                <div class="b-image-upload___item-inner">
                                    <div class="b-image-upload___content">
                                        <svg class="b-image-upload__icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--drop"></use>
                                        </svg>
                                        <div class="b-image-upload__text"><span class="b-image-upload__link">Загрузите</span>
                                            <!-- react-text: 310 -->фото пятен или других недостатков
                                            <!-- /react-text -->
                                        </div>
                                    </div>
                                    <div class="b-image-upload__image-container"><img class="b-image-upload__image" src="#" alt="your image"></div>
                                    <input type="hidden" class="style-input-js" name="cover-style" value="">
                                    <input type="file" id="upload-img" class="b-image-upload__upload-input" name="cover" title="Кликните для выбора фото" multiple="">
                                </div>
                            </li>
                        </ul><span><!-- react-text: 316 -->Вы можете изменить порядок фотографий, перемещая их с помощью мыши.<!-- /react-text --><!-- react-text: 317 --><!-- /react-text --></span>
                    </div>
                    <div class="b-section">
                        <div class="b-info-slider b-add-product__slider">
                            <div class="b-info-slider__item">
                                <div class="b-inline">
                                    <div class="b-info-slider__image-wrap"><img class="b-info-slider__image" src="/assets/helper/1+.jpg" height="140" width="100" alt="Не правильно"><img class="b-info-slider__image" src="/assets/helper/1-.jpg" height="140" width="100" alt="Правильно"></div>
                                    <div class="b-info-slider__wrapper">
                                        <h4 class="b-info-slider__title">Правильный ракурс</h4>
                                        <p>Сделайте фото одежды на модели или на вешалке, так она будет выглядеть намного лучше, чем на полу или кровати. На главном фото вещь должна быть показана в полный рост.</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="b-info-slider__pagination">
                                <li class="b-info-slider__pagination-item b-info-slider__pagination-item_state_active"></li>
                                <li class="b-info-slider__pagination-item"></li>
                                <li class="b-info-slider__pagination-item"></li>
                                <li class="b-info-slider__pagination-item"></li>
                                <li class="b-info-slider__pagination-item"></li>
                                <li class="b-info-slider__pagination-item"></li>
                                <li class="b-info-slider__pagination-item"></li>
                                <li class="b-info-slider__pagination-item"></li>
                                <li class="b-info-slider__pagination-item"></li>
                            </ul>
                        </div>
						<!--
                        <div class="b-add-product__button-wrapper">
                            <button class="b-button b-image-upload b-add-product__button" type="button">
                                <svg class="b-button_icon_cloud">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--upload"></use>
                                </svg>
                                <!-- react-text: 28 -->
                                <!-- /react-text -->
                        <!--    </button>
                        </div>
						-->
                    </div>
                </div>
				
				<!-- loading photos -->
				<div class="b-form-row">
					<h2 class="b-title_type_thin b-add-product__title">Загрузите фотографии</h2>
					<div class="b-section"></div>
					<div class="b-section b-hidden">
						<div class="b-info-slider b-add-product__slider">
						<div class="b-info-slider__item">
							<div class="b-inline">
								<div class="b-info-slider__image-wrap">
								<img class="b-info-slider__image" src="<?php echo $this->themeCss; ?>/assets/helper/1+.jpg" alt="Не правильно" width="100" height="140">
								<img class="b-info-slider__image" src="<?php echo $this->themeCss; ?>/assets/helper/1-.jpg" alt="Правильно" width="100" height="140">
							</div>
							<div class="b-info-slider__wrapper">
								<h4 class="b-info-slider__title">Правильный ракурс</h4>
								<p>Сделайте фото одежды на модели или на вешалке, так она будет выглядеть намного лучше, чем на полу или кровати. На главном фото вещь должна быть показана в полный рост.</p>
							</div>
						</div>
						</div>
						<ul class="b-info-slider__pagination">
							<li class="b-info-slider__pagination-item b-info-slider__pagination-item_state_active"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
						</ul>
						</div>
						<!--
						<div class="b-add-product__button-wrapper">
							<button class="b-button b-image-upload b-add-product__button" type="button">
								<svg class="b-button_icon_cloud"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--upload"/></svg>
								<!-- react-text: 28 -->Перейти к загрузке фотографий<!-- /react-text -->
						<!--	</button>
						</div>
						-->
					</div>
					<div class="b-image-upload">
						<div class="b-image-upload__alert">Первое фото станет обложкой карточки товара</div>
						<div class="b-image-upload__count">
						<!-- react-text: 254 -->(<!-- /react-text --><!-- react-text: 255 -->0<!-- /react-text --><!-- react-text: 256 --> из 5 загружено)<!-- /react-text -->
						<span class="b-image-upload__loader b-hidden">
							<img src="/assets/img/uploading.gif">
						</span>
						</div>
						<ul class="b-image-upload__list">
						<li class="b-image-upload__item">
							<div class="b-image-upload___item-inner">
								<div class="b-image-upload___content">
								<svg class="b-image-upload__icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--square"/></svg>
								<div class="b-image-upload__text">
								<span class="b-image-upload__link">Загрузите</span>
								<!-- react-text: 266 -->фото вас в изделии в полном размере<!-- /react-text -->
								</div>
								</div>
								<div class="b-image-upload__image-container">
								<img class="b-image-upload__image" src="#" alt="your image">
								</div>
								<input class="style-input-js" name="cover-style" value="" type="hidden">
								<input id="upload-img" class="b-image-upload__upload-input" name="cover" title="Кликните для выбора фото" multiple="" type="file">
							</div>
						</li>

						<li class="b-image-upload__item">
						<div class="b-image-upload___item-inner">
						<div class="b-image-upload___content">
						<svg class="b-image-upload__icon">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--label"/>
						</svg>
						<div class="b-image-upload__text">
						<span class="b-image-upload__link">Загрузите</span>
						<!-- react-text: 299 -->фото бирочки изделия<!-- /react-text -->
						</div>
						</div>
						<div class="b-image-upload__image-container">
						<img id="b-image-upload__image1" class="b-image-upload__image" src="#" alt="your image" style="height:100%;">
						</div>
						<input class="style-input-js" name="cover-style" value="" type="hidden">
						<input id="upload-img1" class="b-image-upload__upload-input" name="cover" title="Кликните для выбора фото" multiple="" type="file">
						</div>
						
						<script type="text/javascript">
						function readURL(input) {

							if (input.files && input.files[0]) {
								var reader = new FileReader();

								reader.onload = function (e) {
									$('#b-image-upload__image1').attr('src', e.target.result);
									$('#b-image-upload__image1').show();
								};

								reader.readAsDataURL(input.files[0]);
							}
						}

						$("#upload-img1").change(function(){
							readURL(this);
							
						});
						</script>
						
						
						</li>
						<li class="b-image-upload__item">
						<div class="b-image-upload___item-inner">
						<div class="b-image-upload___content">
						<svg class="b-image-upload__icon">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--drop"/>
						</svg>
						<div class="b-image-upload__text">
						<span class="b-image-upload__link">Загрузите</span>
						<!-- react-text: 310 -->фото пятен или других недостатков<!-- /react-text -->
						</div>
						</div>
						<div class="b-image-upload__image-container">
						<img class="b-image-upload__image" src="#" alt="your image">
						</div>
						<input class="style-input-js" name="cover-style" value="" type="hidden">
						<input id="upload-img" class="b-image-upload__upload-input" name="cover" title="Кликните для выбора фото" multiple="" type="file">
						</div>
						</li>
						</ul>
						<span>
						<!-- react-text: 316 -->Вы можете изменить порядок фотографий, перемещая их с помощью мыши.<!-- /react-text -->
						<!-- react-text: 317 --><!-- /react-text -->
						</span>
					</div>
				</div>
				<!-- end loading photos -->
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Опишите вашу вещь</h2>
                    <div class="b-section"></div>
                    <ul class="b-describe"><li class="b-describe__item b-describe__item_span_2"><label for="product-name" class="b-describe__label">Название *</label><input type="text" class="b-form-input b-describe__input b-describe__form_item" id="product-name" placeholder="Например: Платье в горошек RESERVED" autocomplete="off" maxlength="100" value="" name="title"></li><li class="b-describe__item"><label for="product-condition" class="b-describe__label">Состояние *</label><div class="Select Select--single product-condition"><div class="Select-control"><span class="Select-multi-value-wrapper" id="react-select-2--value"><div class="Select-placeholder">Выберите</div><div role="combobox" aria-expanded="false" aria-owns="react-select-2--value" aria-activedescendant="react-select-2--value" class="Select-input" tabindex="0" aria-readonly="false" style="border: 0px; width: 1px; display: inline-block;"></div></span><span class="Select-arrow-zone"><span class="Select-arrow"></span></span></div>
                    <div class="Select-menu-outer" style="display: none;">
                    <div class="Select-menu">
                        <div class="Select-option">Новое</div>
                        <div class="Select-option">Идеальное</div>
                        <div class="Select-option">Очень хорошее</div>
                    </div>
                    </div></div></li><li class="b-describe__item"><label for="product-brand" class="b-describe__label">Бренд</label><div class="Select Select--single product-brand is-clearable is-searchable"><div class="Select-control"><span class="Select-multi-value-wrapper" id="react-select-3--value"><div class="Select-placeholder">Начните вводить</div><div class="Select-input" style="display: inline-block;"><input role="combobox" aria-expanded="false" aria-owns="" aria-haspopup="false" aria-activedescendant="react-select-3--value" value="" style="width: 5px; box-sizing: content-box;"><div style="position: absolute; top: 0px; left: 0px; visibility: hidden; height: 0px; overflow: scroll; white-space: pre;"></div></div></span><span class="Select-arrow-zone"><span class="Select-arrow"></span></span></div>
                     <div class="Select-menu-outer" style="display: none;">
                    <div class="Select-menu">
                        <div class="Select-option">Пока ничего не найдено</div>
                    </div></div></li><li class="b-describe__item b-describe__item_span_2"><label for="product-description" class="b-describe__label">Описание</label><textarea class="b-form-textarea b-describe__form_item" id="product-description" name="description" placeholder="Например: в этом платье, Вы будете королевой" maxlength="4096"></textarea></li><li class="b-describe__item"><label for="product-consist" class="b-describe__label">Состав</label><textarea class="b-form-textarea b-describe__form_item" id="product-consist" name="composition" placeholder="Например: 50% лен,50% котон" maxlength="250"></textarea></li><li class="b-describe__item"><label for="product-pay" class="b-describe__label">Оплата и доставка</label><textarea class="b-form-textarea b-describe__form_item" id="product-pay" name="delivery" placeholder="Например: Отправлю вещь только после оплаты половины на карточку"></textarea></li></ul>
                </div>
                <div class="b-form-row"><h2 class="b-title_type_thin b-add-product__title">Выберите категорию</h2><div class="b-section"></div><noscript></noscript><div class="b-choose-category"><ul class="b-choose-category__list"><li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--outerwears"></use>
				</svg><span>Верхняя одежда</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--dress"></use>
				</svg>
				<span>Платья</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--skirt"></use>
				</svg>
				<span>Юбки</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--t-shirt"></use>
				</svg>
				<span>Майки и футболки</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--clothes"></use>
				</svg>
				<span>Рубашки и блузы</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--pants"></use>
				</svg>
				<span>Брюки</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shorts"></use>
				</svg>
				<span>Шорты</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweater"></use>
				</svg>
				<span>Кофты</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweamwear"></use>
				</svg>
				<span>Нижнее белье</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shoes"></use>
				</svg>
				<span>Туфли</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--boots"></use>
				</svg>
				<span>Сапоги и ботинки</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sneakers"></use>
				</svg>
				<span>Кроссовки и кеды</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sandals"></use>
				</svg>
				<span>Босоножки и шлепанцы</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--bag"></use>
				</svg>
				<span>Аксессуары</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--cosmetics"></use>
				</svg>
				<span>Косметика</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--paper-bag"></use>
				</svg>
				<span>Другие вещи</span>
				</li>
				</ul>
				</div>
				<svg class="b-add-product__swipe"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrows"></use>
				</svg>
				<div class="b-choose-category__chosen b-hidden">
				<svg class="b-choose-category__delete">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--close"></use>
				</svg>
				<strong>Подкатегория:</strong>
				<!-- react-text: 123 --> <!-- /react-text --><span></span>
				</div>
				</div>

                <div class="b-form-row b-hidden" id="sizex">
                    <h2 class="b-title_type_thin b-add-product__title">Выберите размер</h2>
                    <div class="b-section"></div>
                    <input type="checkbox" class="b-form-check-input" id="several_sizes" value="on">
                    <label for="several_sizes" class="b-form-checkbox b-choose-size__label">У меня есть несколько размеров</label>
                    <div class="b-choose-size__notification b-hidden">Хорошо, выберите основной размер</div>
                    <div class="b-choose-size">
                        <div class="b-choose-size__list">
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="1" name="size" value="1">
                                <div>XXS</div>
                                <strong>32</strong>
                                <div>4</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="2" name="size" value="2">
                                <div>XS</div>
                                <strong>34</strong>
                                <div>6</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="3" name="size" value="3">
                                <div>S</div>
                                <strong>36</strong>
                                <div>8</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="4" name="size" value="4">
                                <div>M</div>
                                <strong>38</strong>
                                <div>10</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="5" name="size" value="5">
                                <div>L</div>
                                <strong>40</strong>
                                <div>12</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="6" name="size" value="6">
                                <div>XL</div>
                                <strong>42</strong>
                                <div>14</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="7" name="size" value="7">
                                <div>XXL</div>
                                <strong>44</strong>
                                <div>16</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="8" name="size" value="8">
                                <div>XXXL</div>
                                <strong>46</strong>
                                <div>18</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="9" name="size" value="9">
                                <div> 4XL</div>
                                <strong>48</strong>
                                <div>20</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="10" name="size" value="10">
                                <div>5XL</div>
                                <strong>50</strong>
                                <div>22</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="11" name="size" value="11">
                                <div>One size</div>
                            </label>
                                
                        </div>
                            
                    </div>
                    <svg class="b-add-product__swipe">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrows"></use>
                    </svg>
                </div>


                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Выберите до 2 оттенков</h2>
                    <div class="b-section"></div>
                    <div class="b-choose-color">
                        <ul class="b-choose-color__list">
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="border: 2px solid rgb(245, 240, 239);">&nbsp;</span>
                                <div class="b-choose-color__name">Белый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(237, 238, 240);">&nbsp;</span>
                                <div class="b-choose-color__name">Серебристый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(246, 230, 209);">&nbsp;</span>
                                <div class="b-choose-color__name">Бежевый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(167, 167, 167);">&nbsp;</span>
                                <div class="b-choose-color__name">Серый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(255, 246, 51);">&nbsp;</span>
                                <div class="b-choose-color__name">Жёлтый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(255, 225, 51);">&nbsp;</span>
                                <div class="b-choose-color__name">Золотистый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(255, 184, 51);">&nbsp;</span>
                                <div class="b-choose-color__name">Оранжевый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(255, 51, 153);">&nbsp;</span>
                                <div class="b-choose-color__name">Розовый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(217, 91, 51);">&nbsp;</span>
                                <div class="b-choose-color__name">Красный</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(197, 229, 237);">&nbsp;</span>
                                <div class="b-choose-color__name">Бирюзовый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(51, 149, 210);">&nbsp;</span>
                                <div class="b-choose-color__name">Синий</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(158, 155, 107);">&nbsp;</span>
                                <div class="b-choose-color__name">Хаки</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(89, 175, 95);">&nbsp;</span>
                                <div class="b-choose-color__name">Зелёный</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(154, 51, 155);">&nbsp;</span>
                                <div class="b-choose-color__name">Фиолетовый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(133, 93, 51);">&nbsp;</span>
                                <div class="b-choose-color__name">Коричневый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background-color: rgb(0, 0, 0);">&nbsp;</span>
                                <div class="b-choose-color__name">Чёрный</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="background: linear-gradient(rgb(255, 237, 36), rgb(66, 255, 110), rgb(121, 149, 255));">&nbsp;</span>
                                <div class="b-choose-color__name">Разноцветный</div>
                            </li>
                        </ul>
                            
                    </div>
                    <svg class="b-add-product__swipe">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrows"></use>
                    </svg>
                </div>
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Условия продажи</h2>
                    <div class="b-section"></div>
                    <div class="b-info-columns salex">
                        <label class="b-info-columns__item" for="price">
                            <div class="b-info-columns__title">
                                <svg class="b-info-columns__icon">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--price"></use>
                                </svg>
                                <!-- react-text: 206 -->Оплата
                                <!-- /react-text -->
                            </div><span class="b-info-columns__left-part"><input type="text" id="price" value="" class="b-form-input" placeholder="300" autocomplete="off" name="price"></span><span class="b-info-columns__right-part">грн.</span></label>
                        <label class="b-info-columns__item" for="gift">
                            <input type="radio" class="b-hidden" id="gift" name="sale-type" value="gift">
                            <div class="b-info-columns__title">
                                <svg class="b-info-columns__icon">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--gift"></use>
                                </svg>
                                <!-- react-text: 214 -->Подарок
                                <!-- /react-text -->
                            </div><span><!-- react-text: 216 -->Сделайте кому-то <!-- /react-text --><br><!-- react-text: 218 -->приятно<!-- /react-text --></span></label>
                    </div>
                </div>
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Продвижение объявления</h2>
                    <div class="b-section"></div>
                    <div class="b-info-columns seox">
                        <label class="b-info-columns__item" for="priced">
                            <div class="b-info-columns__title">
                                <svg class="b-info-columns__icon b-info-columns__icon_color_green">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--paperplane"></use>
                                </svg>
                                <!-- react-text: 226 -->ТОП-объявление на 14 дней
                                <!-- /react-text -->
                            </div><span><!-- react-text: 228 -->Помещается в отдельном блоке над обычными объявлениями в каталоге и в блоке "ТОП объявления" на страницах товаров. <!-- /react-text --><a class="b-desktop-only b-desktop-only__inline-block" href="http://fontez.com/page/bloki-razmesheniya-top-obyavleniy">Посмотреть пример</a></span>
                            <ul class="b-info-columns__list">
                                <li class="b-info-columns__list-item">
                                    <svg class="b-info-columns__list-icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--check"></use>
                                    </svg>
                                    <!-- react-text: 233 -->Примерно в 10 раз больше просмотров
                                    <!-- /react-text -->
                                </li>
                                <li class="b-info-columns__list-item">
                                    <svg class="b-info-columns__list-icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--check"></use>
                                    </svg>
                                    <!-- react-text: 236 -->Примерно в 5 раз больше откликов
                                    <!-- /react-text -->
                                </li>
                                <li class="b-info-columns__list-item">
                                    <svg class="b-info-columns__list-icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--check"></use>
                                    </svg>
                                    <!-- react-text: 239 -->Продажа в несколько раз быстрее
                                    <!-- /react-text -->
                                </li>
                            </ul>
                        </label>
                        <label class="b-info-columns__item" for="exchange">
                            <input type="radio" class="b-hidden" id="exchange" name="promotion-type" value="exchange" title="overall type: UNKNOWN_TYPE
    server type: NO_SERVER_DATA
    heuristic type: UNKNOWN_TYPE
    label: ТОП-объявление на 14 днейПомещается в отдельном блоке над обычными объявлениями в каталоге и в блоке
    parseable name: promotion-type
    field signature: 4049213747
    form signature: 12874694538832266849" autofill-prediction="UNKNOWN_TYPE">
                            <div class="b-info-columns__title">Обычное объявление</div><span>Стандартное объявление, помещается в общий каталог</span></label>
                    </div>
                </div>
                <div class="b-form-row b-add-product__footer">
                    <input type="checkbox" class="b-form-check-input" id="i-took-pic" value="on" title="overall type: UNKNOWN_TYPE
    server type: NO_SERVER_DATA
    heuristic type: UNKNOWN_TYPE
    label: Я добавила как минимум одно фото вещи, которое сделала сама. Почему это важно?
    parseable name: i-took-pic
    field signature: 1901163510
    form signature: 12874694538832266849" autofill-prediction="UNKNOWN_TYPE">
                    <label for="i-took-pic" class="b-form-checkbox b-add-product__checkbox">
                        <!-- react-text: 247 -->Я добавила как минимум одно фото вещи, которое сделала сама.
                        <!-- /react-text --><a href="http://fontez.com/page/trebovaniya-k-obyavleniyam#photo" target="_blank">Почему это важно?</a></label>
                    <button class="b-button b-add-product__add-button" type="submit">Добавить вещь</button>
                    <div class="b-section"></div>
                </div>
            </form>
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
                            <a class="b-footer-list__link" rel="nofollow" href="/page/rabota-v-shafe">Работа в Шафе</a>
                        </li>
                        <li class="b-footer-list__item">
                            <a class="b-footer-list__link" href="http://blog.fontez.com/">Наш блог</a>
                        </li>
                        <li class="b-footer-list__item">
                            <a class="b-footer-list__link" href="/page/kak-eto-rabotaet">Как это работает?</a>
                        </li>
                        <li class="b-footer-list__item">
                            <a class="b-footer-list__link" href="/privacy-policy">Privacy policy</a>
                        </li>
                        <li class="b-footer-list__item">
                            <a class="b-footer-list__link" href="/terms-of-service">Договор-оферта</a>
                        </li>
                        <li class="b-footer-list__item">
                            <a class="b-footer-list__link" rel="nofollow" href="https://plus.google.com/108317175350006940956">Мы в Google+</a>
                        </li>
                    </ul>
                </div>
            </div>
        <div class="fontez" style="display: none;">
        <p>Developed by <a href="https://vk.com/fontez">FonteZ</a></p>
    </div>
    </div>
    <div class="">
        <div class="b-modal__overlay" id="category-select" style="display:none;">
            <div class="b-modal" tabindex="-1" aria-label="Modal">
                <div class="b-tree"><a href="#" class="b-tree__link b-togglable b-togglable__down">Верхняя одежда</a>
                    <ul class="b-tree__list b-tree__list_state_active">
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Пальто</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Плащи</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Куртки</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Шубы</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Жилетки</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Пиджаки и жакеты</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
    window.staticUrl = '/assets/';
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
    </script>
    <script type="application/json+context">
    {
     /*   "subcategoryId": null,
        "editMode": false,
        "searchData": {
            "size_groups": {
                "1": {
                    "id": 1,
                    "name": "\u041e\u0434\u0435\u0436\u0434\u0430",
                    "sizes": [{
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 1,
                        "title": "32 / 4 / XXS"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 2,
                        "title": "34 / 6 / XS"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 3,
                        "title": "36 / 8 / S"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 4,
                        "title": "38 / 10 / M"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 5,
                        "title": "40 / 12 / L"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 6,
                        "title": "42 / 14 / XL"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 7,
                        "title": "44 / 16 / XXL"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 8,
                        "title": "46 / 18 / XXXL"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 9,
                        "title": "48 / 20 /  4XL"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 10,
                        "title": "50 / 22 / 5XL"
                    }, {
                        "is_one_size": true,
                        "is_other_size": false,
                        "id": 11,
                        "title": "One size"
                    }, {
                        "is_one_size": false,
                        "is_other_size": true,
                        "id": 12,
                        "title": "\u0414\u0440\u0443\u0433\u043e\u0439"
                    }]
                },
                "2": {
                    "id": 2,
                    "name": "\u041e\u0431\u0443\u0432\u044c",
                    "sizes": [{
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 31,
                        "title": "34"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 32,
                        "title": "35"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 33,
                        "title": "36"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 34,
                        "title": "37"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 35,
                        "title": "38"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 36,
                        "title": "39"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 37,
                        "title": "40"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 38,
                        "title": "41"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 39,
                        "title": "42"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 40,
                        "title": "43"
                    }, {
                        "is_one_size": true,
                        "is_other_size": false,
                        "id": 47,
                        "title": "One size"
                    }, {
                        "is_one_size": false,
                        "is_other_size": true,
                        "id": 48,
                        "title": "\u0414\u0440\u0443\u0433\u043e\u0439"
                    }]
                },
                "3": {
                    "id": 3,
                    "name": "\u0414\u0436\u0438\u043d\u0441\u044b",
                    "sizes": [{
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 49,
                        "title": "24 / 25"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 50,
                        "title": "26 / 27"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 51,
                        "title": "27 / 28"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 52,
                        "title": "29 / 30"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 53,
                        "title": "31 / 32"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 54,
                        "title": "32 / 33"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 55,
                        "title": "34"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 56,
                        "title": "34 / 35"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 57,
                        "title": "35"
                    }, {
                        "is_one_size": false,
                        "is_other_size": false,
                        "id": 58,
                        "title": "36"
                    }, {
                        "is_one_size": true,
                        "is_other_size": false,
                        "id": 59,
                        "title": "One size"
                    }, {
                        "is_one_size": false,
                        "is_other_size": true,
                        "id": 60,
                        "title": "\u0414\u0440\u0443\u0433\u043e\u0439"
                    }]
                }
            },
            "tree": {
                "title": "\u0416\u0435\u043d\u0441\u043a\u0430\u044f \u043e\u0434\u0435\u0436\u0434\u0430",
                "children": [{
                    "title": "\u042e\u0431\u043a\u0438",
                    "children": [{
                        "title": "\u041c\u0438\u043d\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 15
                    }, {
                        "title": "\u041c\u0438\u0434\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 16
                    }, {
                        "title": "\u0414\u043b\u0438\u043d\u043d\u044b\u0435 \u044e\u0431\u043a\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 17
                    }],
                    "size_group": 1,
                    "id": 14
                }, {
                    "title": "\u041f\u043b\u0430\u0442\u044c\u044f",
                    "children": [{
                        "title": "\u041a\u043e\u0440\u043e\u0442\u043a\u0438\u0435 \u043f\u043b\u0430\u0442\u044c\u044f",
                        "children": null,
                        "size_group": 1,
                        "id": 11
                    }, {
                        "title": "\u041f\u043b\u0430\u0442\u044c\u044f \u043c\u0438\u0434\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 12
                    }, {
                        "title": "\u0414\u043b\u0438\u043d\u043d\u044b\u0435 \u043f\u043b\u0430\u0442\u044c\u044f",
                        "children": null,
                        "size_group": 1,
                        "id": 13
                    }],
                    "size_group": 1,
                    "id": 10
                }, {
                    "title": "\u0412\u0435\u0440\u0445\u043d\u044f\u044f \u043e\u0434\u0435\u0436\u0434\u0430",
                    "children": [{
                        "title": "\u041f\u0430\u043b\u044c\u0442\u043e",
                        "children": null,
                        "size_group": 1,
                        "id": 4
                    }, {
                        "title": "\u041f\u043b\u0430\u0449\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 5
                    }, {
                        "title": "\u041a\u0443\u0440\u0442\u043a\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 6
                    }, {
                        "title": "\u0428\u0443\u0431\u044b",
                        "children": null,
                        "size_group": 1,
                        "id": 7
                    }, {
                        "title": "\u0416\u0438\u043b\u0435\u0442\u043a\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 8
                    }, {
                        "title": "\u041f\u0438\u0434\u0436\u0430\u043a\u0438 \u0438 \u0436\u0430\u043a\u0435\u0442\u044b",
                        "children": null,
                        "size_group": 1,
                        "id": 9
                    }],
                    "size_group": 1,
                    "id": 3
                }, {
                    "title": "\u041c\u0430\u0439\u043a\u0438 \u0438 \u0444\u0443\u0442\u0431\u043e\u043b\u043a\u0438",
                    "children": [{
                        "title": "\u0424\u0443\u0442\u0431\u043e\u043b\u043a\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 19
                    }, {
                        "title": "\u041c\u0430\u0439\u043a\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 20
                    }],
                    "size_group": 1,
                    "id": 18
                }, {
                    "title": "\u0420\u0443\u0431\u0430\u0448\u043a\u0438 \u0438 \u0431\u043b\u0443\u0437\u044b",
                    "children": [{
                        "title": "\u0420\u0443\u0431\u0430\u0448\u043a\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 22
                    }, {
                        "title": "\u0411\u043b\u0443\u0437\u044b",
                        "children": null,
                        "size_group": 1,
                        "id": 23
                    }],
                    "size_group": 1,
                    "id": 21
                }, {
                    "title": "\u0411\u0440\u044e\u043a\u0438",
                    "children": [{
                        "title": "\u0414\u0436\u0438\u043d\u0441\u044b",
                        "children": null,
                        "size_group": 3,
                        "id": 25
                    }, {
                        "title": "\u041a\u043b\u0430\u0441\u0441\u0438\u0447\u0435\u0441\u043a\u0438\u0435",
                        "children": null,
                        "size_group": 1,
                        "id": 26
                    }, {
                        "title": "\u041f\u043e\u0432\u0441\u0435\u0434\u043d\u0435\u0432\u043d\u044b\u0435",
                        "children": null,
                        "size_group": 1,
                        "id": 27
                    }, {
                        "title": "\u0421\u043f\u043e\u0440\u0442\u0438\u0432\u043d\u044b\u0435 \u0448\u0442\u0430\u043d\u044b",
                        "children": null,
                        "size_group": 1,
                        "id": 28
                    }],
                    "size_group": 1,
                    "id": 24
                }, {
                    "title": "\u0428\u043e\u0440\u0442\u044b",
                    "children": [{
                        "title": "\u041a\u043e\u0440\u043e\u0442\u043a\u0438\u0435",
                        "children": null,
                        "size_group": 1,
                        "id": 30
                    }, {
                        "title": "\u0414\u043e \u043a\u043e\u043b\u0435\u043d",
                        "children": null,
                        "size_group": 1,
                        "id": 31
                    }],
                    "size_group": 1,
                    "id": 29
                }, {
                    "title": "\u041a\u043e\u0444\u0442\u044b",
                    "children": [{
                        "title": "\u0414\u0436\u0435\u043c\u043f\u0435\u0440\u044b",
                        "children": null,
                        "size_group": 1,
                        "id": 33
                    }, {
                        "title": "\u0421\u0432\u0438\u0442\u0435\u0440\u044b",
                        "children": null,
                        "size_group": 1,
                        "id": 34
                    }, {
                        "title": "\u041a\u0430\u0440\u0434\u0438\u0433\u0430\u043d\u044b",
                        "children": null,
                        "size_group": 1,
                        "id": 35
                    }],
                    "size_group": 1,
                    "id": 32
                }, {
                    "title": "\u041d\u0438\u0436\u043d\u0435\u0435 \u0431\u0435\u043b\u044c\u0435",
                    "children": [{
                        "title": "\u0411\u044e\u0441\u0442\u0433\u0430\u043b\u044c\u0442\u0435\u0440\u044b",
                        "children": null,
                        "size_group": 1,
                        "id": 37
                    }, {
                        "title": "\u0422\u0440\u0443\u0441\u0438\u043a\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 38
                    }, {
                        "title": "\u041a\u043e\u043c\u043f\u043b\u0435\u043a\u0442\u044b",
                        "children": null,
                        "size_group": 1,
                        "id": 39
                    }, {
                        "title": "\u041a\u0443\u043f\u0430\u043b\u044c\u043d\u0438\u043a\u0438",
                        "children": null,
                        "size_group": 1,
                        "id": 40
                    }],
                    "size_group": 1,
                    "id": 36
                }, {
                    "title": "\u0422\u0443\u0444\u043b\u0438",
                    "children": [{
                        "title": "\u0412\u044b\u0441\u043e\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a",
                        "children": null,
                        "size_group": 2,
                        "id": 42
                    }, {
                        "title": "\u0421\u0440\u0435\u0434\u043d\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a",
                        "children": null,
                        "size_group": 2,
                        "id": 43
                    }, {
                        "title": "\u041d\u0438\u0437\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a",
                        "children": null,
                        "size_group": 2,
                        "id": 44
                    }, {
                        "title": "\u041f\u043b\u0430\u0442\u0444\u043e\u0440\u043c\u0430",
                        "children": null,
                        "size_group": 2,
                        "id": 45
                    }, {
                        "title": "\u0422\u0430\u043d\u043a\u0435\u0442\u043a\u0430",
                        "children": null,
                        "size_group": 2,
                        "id": 46
                    }],
                    "size_group": 2,
                    "id": 41
                }, {
                    "title": "\u0421\u0430\u043f\u043e\u0433\u0438 \u0438 \u0431\u043e\u0442\u0438\u043d\u043a\u0438",
                    "children": [{
                        "title": "\u0412\u044b\u0441\u043e\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a",
                        "children": null,
                        "size_group": 2,
                        "id": 48
                    }, {
                        "title": "\u0421\u0440\u0435\u0434\u043d\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a",
                        "children": null,
                        "size_group": 2,
                        "id": 49
                    }, {
                        "title": "\u041d\u0438\u0437\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a",
                        "children": null,
                        "size_group": 2,
                        "id": 50
                    }, {
                        "title": "\u041f\u043b\u0430\u0442\u0444\u043e\u0440\u043c\u0430",
                        "children": null,
                        "size_group": 2,
                        "id": 51
                    }, {
                        "title": "\u0422\u0430\u043d\u043a\u0435\u0442\u043a\u0430",
                        "children": null,
                        "size_group": 2,
                        "id": 52
                    }],
                    "size_group": 2,
                    "id": 47
                }, {
                    "title": "\u041a\u0440\u043e\u0441\u0441\u043e\u0432\u043a\u0438 \u0438 \u043a\u0435\u0434\u044b",
                    "children": [{
                        "title": "\u041a\u0440\u043e\u0441\u0441\u043e\u0432\u043a\u0438",
                        "children": null,
                        "size_group": 2,
                        "id": 54
                    }, {
                        "title": "\u041a\u0435\u0434\u044b",
                        "children": null,
                        "size_group": 2,
                        "id": 55
                    }],
                    "size_group": 2,
                    "id": 53
                }, {
                    "title": "\u0411\u043e\u0441\u043e\u043d\u043e\u0436\u043a\u0438 \u0438 \u0448\u043b\u0435\u043f\u0430\u043d\u0446\u044b",
                    "children": [{
                        "title": "\u0412\u044b\u0441\u043e\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a",
                        "children": null,
                        "size_group": 2,
                        "id": 57
                    }, {
                        "title": "\u0421\u0440\u0435\u0434\u043d\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a",
                        "children": null,
                        "size_group": 2,
                        "id": 58
                    }, {
                        "title": "\u041d\u0438\u0437\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a",
                        "children": null,
                        "size_group": 2,
                        "id": 59
                    }, {
                        "title": "\u041d\u0430 \u043f\u043b\u0430\u0442\u0444\u043e\u0440\u043c\u0435",
                        "children": null,
                        "size_group": 2,
                        "id": 60
                    }, {
                        "title": "\u041d\u0430 \u0442\u0430\u043d\u043a\u0435\u0442\u043a\u0435",
                        "children": null,
                        "size_group": 2,
                        "id": 61
                    }],
                    "size_group": 2,
                    "id": 56
                }, {
                    "title": "\u0410\u043a\u0441\u0435\u0441\u0441\u0443\u0430\u0440\u044b",
                    "children": [{
                        "title": "\u0421\u0443\u043c\u043a\u0438",
                        "children": [{
                            "title": "\u041a\u043b\u0430\u0442\u0447\u0438",
                            "children": null,
                            "size_group": null,
                            "id": 64
                        }, {
                            "title": "\u0421 \u0434\u043b\u0438\u043d\u043d\u044b\u043c\u0438 \u0440\u0443\u0447\u043a\u0430\u043c\u0438",
                            "children": null,
                            "size_group": null,
                            "id": 65
                        }, {
                            "title": "\u0421 \u043a\u043e\u0440\u043e\u0442\u043a\u0438\u043c\u0438 \u0440\u0443\u0447\u043a\u0430\u043c\u0438",
                            "children": null,
                            "size_group": null,
                            "id": 66
                        }, {
                            "title": "\u0420\u044e\u043a\u0437\u0430\u043a\u0438",
                            "children": null,
                            "size_group": null,
                            "id": 67
                        }, {
                            "title": "\u0414\u043e\u0440\u043e\u0436\u043d\u044b\u0435 \u0447\u0435\u043c\u043e\u0434\u0430\u043d\u044b",
                            "children": null,
                            "size_group": null,
                            "id": 68
                        }, {
                            "title": "\u041a\u043e\u0448\u0435\u043b\u044c\u043a\u0438",
                            "children": null,
                            "size_group": null,
                            "id": 69
                        }],
                        "size_group": null,
                        "id": 63
                    }, {
                        "title": "\u041e\u0447\u043a\u0438",
                        "children": null,
                        "size_group": null,
                        "id": 70
                    }, {
                        "title": "\u0428\u0430\u043f\u043a\u0438",
                        "children": null,
                        "size_group": null,
                        "id": 71
                    }, {
                        "title": "\u0423\u043a\u0440\u0430\u0448\u0435\u043d\u0438\u044f \u0438 \u0447\u0430\u0441\u044b",
                        "children": null,
                        "size_group": null,
                        "id": 72
                    }, {
                        "title": "\u0420\u0435\u043c\u043d\u0438",
                        "children": null,
                        "size_group": null,
                        "id": 73
                    }, {
                        "title": "\u0428\u0430\u0440\u0444\u044b \u0438 \u043f\u043b\u0430\u0442\u043a\u0438",
                        "children": null,
                        "size_group": null,
                        "id": 74
                    }, {
                        "title": "\u0413\u0430\u043b\u0441\u0442\u0443\u043a\u0438 \u0438 \u0431\u0430\u0431\u043e\u0447\u043a\u0438",
                        "children": null,
                        "size_group": null,
                        "id": 75
                    }],
                    "size_group": null,
                    "id": 62
                }, {
                    "title": "\u041a\u043e\u0441\u043c\u0435\u0442\u0438\u043a\u0430",
                    "children": [{
                        "title": "\u041a\u0440\u0435\u043c\u044b \u0438 \u043c\u0430\u0441\u043a\u0438 \u0434\u043b\u044f \u043b\u0438\u0446\u0430",
                        "children": null,
                        "size_group": null,
                        "id": 77
                    }, {
                        "title": "\u041a\u0440\u0435\u043c\u044b \u0434\u043b\u044f \u0440\u0443\u043a \u0438 \u0442\u0435\u043b\u0430",
                        "children": null,
                        "size_group": null,
                        "id": 78
                    }, {
                        "title": "\u041c\u0430\u043a\u0438\u044f\u0436",
                        "children": null,
                        "size_group": null,
                        "id": 79
                    }, {
                        "title": "\u041f\u0430\u0440\u0444\u044e\u043c\u044b",
                        "children": null,
                        "size_group": null,
                        "id": 80
                    }],
                    "size_group": null,
                    "id": 76
                }, {
                    "title": "\u0414\u0440\u0443\u0433\u0438\u0435 \u0432\u0435\u0449\u0438",
                    "children": null,
                    "size_group": null,
                    "id": 81
                }],
                "size_group": 1,
                "id": 2
            },
            "colors": [{
                "hex": "#FFFFFF",
                "id": 1,
                "label": "\u0411\u0435\u043b\u044b\u0439"
            }, {
                "hex": "#EDEEF0",
                "id": 2,
                "label": "\u0421\u0435\u0440\u0435\u0431\u0440\u0438\u0441\u0442\u044b\u0439"
            }, {
                "hex": "#F6E6D1",
                "id": 3,
                "label": "\u0411\u0435\u0436\u0435\u0432\u044b\u0439"
            }, {
                "hex": "#A7A7A7",
                "id": 4,
                "label": "\u0421\u0435\u0440\u044b\u0439"
            }, {
                "hex": "#FFF633",
                "id": 5,
                "label": "\u0416\u0451\u043b\u0442\u044b\u0439"
            }, {
                "hex": "#FFE133",
                "id": 6,
                "label": "\u0417\u043e\u043b\u043e\u0442\u0438\u0441\u0442\u044b\u0439"
            }, {
                "hex": "#FFB833",
                "id": 7,
                "label": "\u041e\u0440\u0430\u043d\u0436\u0435\u0432\u044b\u0439"
            }, {
                "hex": "#FF3399",
                "id": 8,
                "label": "\u0420\u043e\u0437\u043e\u0432\u044b\u0439"
            }, {
                "hex": "#D95B33",
                "id": 9,
                "label": "\u041a\u0440\u0430\u0441\u043d\u044b\u0439"
            }, {
                "hex": "#C5E5ED",
                "id": 10,
                "label": "\u0411\u0438\u0440\u044e\u0437\u043e\u0432\u044b\u0439"
            }, {
                "hex": "#3395D2",
                "id": 11,
                "label": "\u0421\u0438\u043d\u0438\u0439"
            }, {
                "hex": "#9E9B6B",
                "id": 12,
                "label": "\u0425\u0430\u043a\u0438"
            }, {
                "hex": "#59AF5F",
                "id": 13,
                "label": "\u0417\u0435\u043b\u0451\u043d\u044b\u0439"
            }, {
                "hex": "#9A339B",
                "id": 14,
                "label": "\u0424\u0438\u043e\u043b\u0435\u0442\u043e\u0432\u044b\u0439"
            }, {
                "hex": "#855D33",
                "id": 15,
                "label": "\u041a\u043e\u0440\u0438\u0447\u043d\u0435\u0432\u044b\u0439"
            }, {
                "hex": "#000000",
                "id": 16,
                "label": "\u0427\u0451\u0440\u043d\u044b\u0439"
            }, {
                "hex": "#0",
                "id": 17,
                "label": "\u0420\u0430\u0437\u043d\u043e\u0446\u0432\u0435\u0442\u043d\u044b\u0439"
            }],
            "default_size_group_id": 1,
            "brands": [],
            "conditions": [{
                "value": 1,
                "label": "\u041d\u043e\u0432\u043e\u0435"
            }, {
                "value": 2,
                "label": "\u0418\u0434\u0435\u0430\u043b\u044c\u043d\u043e\u0435"
            }, {
                "value": 3,
                "label": "\u041e\u0447\u0435\u043d\u044c \u0445\u043e\u0440\u043e\u0448\u0435\u0435"
            }, {
                "value": 4,
                "label": "\u0425\u043e\u0440\u043e\u0448\u0435\u0435"
            }, {
                "value": 5,
                "label": "\u0423\u0434\u043e\u0432\u043b\u0435\u0442\u0432\u043e\u0440\u0438\u0442\u0435\u043b\u044c\u043d\u043e\u0435"
            }],
            "main_categories": {
                "32": {
                    "size_group_id": 1,
                    "name": "\u041a\u043e\u0444\u0442\u044b",
                    "id": 32,
                    "has_one_size": true,
                    "has_other_size": false,
                    "slug": "kofty",
                    "icon": "#static--svg--sweater"
                },
                "3": {
                    "size_group_id": 1,
                    "name": "\u0412\u0435\u0440\u0445\u043d\u044f\u044f \u043e\u0434\u0435\u0436\u0434\u0430",
                    "id": 3,
                    "has_one_size": true,
                    "has_other_size": false,
                    "slug": "verhnyaya-odezhda",
                    "icon": "#static--svg--outerwears"
                },
                "36": {
                    "size_group_id": 1,
                    "name": "\u041d\u0438\u0436\u043d\u0435\u0435 \u0431\u0435\u043b\u044c\u0435",
                    "id": 36,
                    "has_one_size": true,
                    "has_other_size": true,
                    "slug": "nizhnee-bele-i-kupalniki",
                    "icon": "#static--svg--sweamwear"
                },
                "41": {
                    "size_group_id": 2,
                    "name": "\u0422\u0443\u0444\u043b\u0438",
                    "id": 41,
                    "has_one_size": false,
                    "has_other_size": false,
                    "slug": "tufli",
                    "icon": "#static--svg--shoes"
                },
                "10": {
                    "size_group_id": 1,
                    "name": "\u041f\u043b\u0430\u0442\u044c\u044f",
                    "id": 10,
                    "has_one_size": true,
                    "has_other_size": false,
                    "slug": "platya",
                    "icon": "#static--svg--dress"
                },
                "76": {
                    "size_group_id": null,
                    "name": "\u041a\u043e\u0441\u043c\u0435\u0442\u0438\u043a\u0430",
                    "id": 76,
                    "has_one_size": false,
                    "has_other_size": false,
                    "slug": "kosmetika",
                    "icon": "#static--svg--cosmetics"
                },
                "14": {
                    "size_group_id": 1,
                    "name": "\u042e\u0431\u043a\u0438",
                    "id": 14,
                    "has_one_size": true,
                    "has_other_size": false,
                    "slug": "yubki",
                    "icon": "#static--svg--skirt"
                },
                "47": {
                    "size_group_id": 2,
                    "name": "\u0421\u0430\u043f\u043e\u0433\u0438 \u0438 \u0431\u043e\u0442\u0438\u043d\u043a\u0438",
                    "id": 47,
                    "has_one_size": false,
                    "has_other_size": false,
                    "slug": "sapogi-i-botinki",
                    "icon": "#static--svg--boots"
                },
                "81": {
                    "size_group_id": null,
                    "name": "\u0414\u0440\u0443\u0433\u0438\u0435 \u0432\u0435\u0449\u0438",
                    "id": 81,
                    "has_one_size": true,
                    "has_other_size": false,
                    "slug": "drugoe",
                    "icon": "#static--svg--paper-bag"
                },
                "18": {
                    "size_group_id": 1,
                    "name": "\u041c\u0430\u0439\u043a\u0438 \u0438 \u0444\u0443\u0442\u0431\u043e\u043b\u043a\u0438",
                    "id": 18,
                    "has_one_size": true,
                    "has_other_size": false,
                    "slug": "mayki-i-futbolki",
                    "icon": "#static--svg--t-shirt"
                },
                "21": {
                    "size_group_id": 1,
                    "name": "\u0420\u0443\u0431\u0430\u0448\u043a\u0438 \u0438 \u0431\u043b\u0443\u0437\u044b",
                    "id": 21,
                    "has_one_size": true,
                    "has_other_size": false,
                    "slug": "rubashki-i-bluzy",
                    "icon": "#static--svg--clothes"
                },
                "24": {
                    "size_group_id": 1,
                    "name": "\u0411\u0440\u044e\u043a\u0438",
                    "id": 24,
                    "has_one_size": true,
                    "has_other_size": false,
                    "slug": "bryuki",
                    "icon": "#static--svg--pants"
                },
                "56": {
                    "size_group_id": 2,
                    "name": "\u0411\u043e\u0441\u043e\u043d\u043e\u0436\u043a\u0438 \u0438 \u0448\u043b\u0435\u043f\u0430\u043d\u0446\u044b",
                    "id": 56,
                    "has_one_size": false,
                    "has_other_size": false,
                    "slug": "bosonozhki-i-shlepancy",
                    "icon": "#static--svg--sandals"
                },
                "29": {
                    "size_group_id": 1,
                    "name": "\u0428\u043e\u0440\u0442\u044b",
                    "id": 29,
                    "has_one_size": true,
                    "has_other_size": false,
                    "slug": "shorty",
                    "icon": "#static--svg--shorts"
                },
                "62": {
                    "size_group_id": null,
                    "name": "\u0410\u043a\u0441\u0435\u0441\u0441\u0443\u0430\u0440\u044b",
                    "id": 62,
                    "has_one_size": false,
                    "has_other_size": false,
                    "slug": "aksessuary",
                    "icon": "#static--svg--bag"
                },
                "53": {
                    "size_group_id": 2,
                    "name": "\u041a\u0440\u043e\u0441\u0441\u043e\u0432\u043a\u0438 \u0438 \u043a\u0435\u0434\u044b",
                    "id": 53,
                    "has_one_size": false,
                    "has_other_size": false,
                    "slug": "krossovki-i-kedy",
                    "icon": "#static--svg--sneakers"
                }
            },
            "categories": []
        },
        "description": "",
        "promotionTypeId": null,
        "title": "",
        "hasAcceptedTerms": false,
        "sellingTypeId": null,
        "colorIds": [],
        "subcategoryName": null,
        "kidsSupercategories": {},
        "config": {
            "brandSearchUrl": "/listing/util/brands",
            "isCanary": false,
            "photoUploadUrl": "/listing/util/photo",
            "maxUploadFilesCount": 5,
            "promoPriceUrl": "/util/promo_price",
            "csrfToken": "XJH4nDlUWLIjJq1l6CzQP9O6jRT0Uewi3AQ9qiyJZszSzG9LluZ6maMLj9I44pKM",
            "sentryDsn": "https://961607f1cccc4e8284898f6376ddfe61@app.getsentry.com/14170",
            "uploadSession": "fdbfd412-509a-4762-8967-bd060a4d63e7",
            "uploadUrl": "/new"
        },
        "categoryId": null,
        "categoryName": null,
        "hasSeveralSizes": false,
        "price": null,
        "conditionId": null,
        "brandId": null,
        "delivery": "",
        "listingsLeft": 100,
        "reimburseAt": "2017-06-25T10:54:27.110295+00:00",
        "uploadedFiles": [],
        "productsQuota": 200,
        "sizeId": null,
        "composition": "",
        "brandName": null,
        "productsCount": 0,
        "listingsQuota": 100,
        "sizeGroupId": null
    }*/
    </script>
    
    <script src="<?php echo $this->themeCss; ?>/assets/build/script.js"></script>
    <script defer src="<?php echo $this->themeCss; ?>/assets/build/shared.js"></script>
    <script defer src="<?php echo $this->themeCss; ?>/assets/build/global.js"></script>
<!--    <script defer src="<?php echo $this->themeCss; ?>/assets/build/new_listing.js"></script> -->
    <script>
    </script>
</body>

</html>
