<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Профиль fontez | Шафа</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><script type="text/javascript">window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var o=n[t]={exports:{}};e[t][0].call(o.exports,function(n){var o=e[t][1][n];return r(o||n)},o,o.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<t.length;o++)r(t[o]);return r}({1:[function(e,n,t){function r(){}function o(e,n,t){return function(){return i(e,[c.now()].concat(u(arguments)),n?null:this,t),n?void 0:this}}var i=e("handle"),a=e(2),u=e(3),f=e("ee").get("tracer"),c=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],d="api-",l=d+"ixn-";a(p,function(e,n){s[n]=o(d+n,!0,"api")}),s.addPageAction=o(d+"addPageAction",!0),s.setCurrentRouteName=o(d+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,o="function"==typeof n;return i(l+"tracer",[c.now(),e,t],r),function(){if(f.emit((o?"":"no-")+"fn-start",[c.now(),r,o],t),o)try{return n.apply(this,arguments)}finally{f.emit("fn-end",[c.now()],t)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=o(l+n)}),newrelic.noticeError=function(e){"string"==typeof e&&(e=new Error(e)),i("err",[e,c.now()])}},{}],2:[function(e,n,t){function r(e,n){var t=[],r="",i=0;for(r in e)o.call(e,r)&&(t[i]=n(r,e[r]),i+=1);return t}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],3:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,o=t-n||0,i=Array(o<0?0:o);++r<o;)i[r]=e[n+r];return i}n.exports=r},{}],4:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function o(e){function n(e){return e&&e instanceof r?e:e?f(e,u,i):i()}function t(t,r,o,i){if(!d.aborted||i){e&&e(t,r,o);for(var a=n(o),u=m(t),f=u.length,c=0;c<f;c++)u[c].apply(a,r);var p=s[y[t]];return p&&p.push([b,t,r,a]),a}}function l(e,n){v[e]=m(e).concat(n)}function m(e){return v[e]||[]}function w(e){return p[e]=p[e]||o(t)}function g(e,n){c(e,function(e,t){n=n||"feature",y[t]=n,n in s||(s[n]=[])})}var v={},y={},b={on:l,emit:t,get:w,listeners:m,context:n,buffer:g,abort:a,aborted:!1};return b}function i(){return new r}function a(){(s.api||s.feature)&&(d.aborted=!0,s=d.backlog={})}var u="nr@context",f=e("gos"),c=e(2),s={},p={},d=n.exports=o();d.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(o.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return e[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){o.buffer([e],r),o.emit(e,n,t)}var o=e("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,i,function(){return o++})}var o=1,i="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!x++){var e=h.info=NREUM.info,n=d.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();c(y,function(n,t){e[n]||(e[n]=t)}),f("mark",["onload",a()+h.offset],null,"api");var t=d.createElement("script");t.src="https://"+e.agent,n.parentNode.insertBefore(t,n)}}function o(){"complete"===d.readyState&&i()}function i(){f("mark",["domContent",a()+h.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(u=Math.max((new Date).getTime(),u))-h.offset}var u=(new Date).getTime(),f=e("handle"),c=e(2),s=e("ee"),p=window,d=p.document,l="addEventListener",m="attachEvent",w=p.XMLHttpRequest,g=w&&w.prototype;NREUM.o={ST:setTimeout,CT:clearTimeout,XHR:w,REQ:p.Request,EV:p.Event,PR:p.Promise,MO:p.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1026.min.js"},b=w&&g&&g[l]&&!/CriOS/.test(navigator.userAgent),h=n.exports={offset:u,now:a,origin:v,features:{},xhrWrappable:b};e(1),d[l]?(d[l]("DOMContentLoaded",i,!1),p[l]("load",r,!1)):(d[m]("onreadystatechange",o),p[m]("onload",r)),f("mark",["firstbyte",u],null,"api");var x=0,E=e(4)},{}]},{},["loader"]);</script><script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","queueTime":0,"licenseKey":"e0a6cba660","agent":"","transactionName":"NQdaZhACXxVRU0UNCwxNfkcMAEUPX14eFwwDBFkcAxNBFR5dVAkGBxAWRAsGRhUeQEQGCAsBAmIXAV0PU31UCQYHEGhADQVYClVmWAETTAVdRg==","applicationID":"24033287","errorBeacon":"bam.nr-data.net","applicationTime":298}</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta name="robots" content="noindex">
    <meta name="description" content="Шафа - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <meta property="og:title" content="Профиль fontez | Шафа"/>
    <meta property="og:type" content="website"/>
    <meta name="author" content="FonteZ">
    <meta property="og:url" content="/member/fontez"/>
    <meta property="og:image" content="/avatars/438599"/>
    <meta property="og:description" content="Шафа - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <meta property="profile:first_name" content="Валерий"/>
    <meta property="profile:last_name" content="Конопля"/>
    <meta property="profile:username" content="fontez"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Профиль fontez | Шафа"/>
    <meta name="twitter:description" content="Шафа - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <meta name="twitter:image" content="/avatars/438599"/>
    <link rel="image_src" href="/avatars/438599"/>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="Shafa">

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


    <meta name="google-site-verification" content="LurOoTdVtstc94kH9R7GXIruV_4kbx0rwAuXBUb2UNA" />
    <meta name="p:domain_verify" content="aa3f8b785adcd3eddcfc2f93df8b71fd"/>
    <meta name="mailru-verification" content="8218c20834b931c9"/>
    <meta name="yandex-verification" content="6c407e203c156261"/>
    <link rel="stylesheet" media="all" href="/assets/build/main.css">
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
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    

    ga('create', 'UA-45115692-1', {
      'siteSpeedSampleRate': 50,
      'cookieDomain': 'fontez.com'
    });
    ga('set','&uid','438599');
    ga('require', 'ecommerce', 'ecommerce.js');
    ga('send', 'pageview');
</script>


    
    

    <div class="b-section b-section_bg_profile">
        <div class="b-section__container">
            

<header class="b-header b-header_type_inverse">
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
            <input type="hidden" name="csrfmiddlewaretoken" value="vnZmsdyHCFHjpefYNenQPHXXug2FauytyYP0nW9jH3mbCCfgye5EBG1TIJkdyVLF" />
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
                <input type="hidden" name="csrfmiddlewaretoken" value="TRWruybAdEd4BNaXIP0j3Q7UZHN5zv9OWsM5phMci2SWObaftPI7PPbQda5DXWm0" />
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
                <input type="hidden" name="csrfmiddlewaretoken" value="E8chhXl735G8lWrEFq7OEOyd0yLwgNV1HJ2VcGWJ8tl0ykrWqqPCqNC9e134Ee8d" />
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
            <input type="hidden" name="csrfmiddlewaretoken" value="Xq6d098OksI9Gelh1mRgfJpUoaCpLpe101WRVSJqpQn1TClzMmz41ItQCDUX9Qrd" />
        </form>
    </li>
</ul>
                </div>
            </div></div>
</div>
            <div class="b-profile-data">
    <div class="b-profile-data__image-wrap">
        <img class="b-profile-data__img"
             src="/avatars/438599"
             alt="fontez"
             title="fontez"/>
    </div>
    <div class="b-profile-data__info">
        

        <h2 class="b-title b-profile-data__title">
            fontez
            
        </h2>
        <div class="b-profile-data__rating b-profile-rating">
            <span class="b-profile-data__item">
                <svg class="b-profile-rating__item">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--positive"></use>
                </svg>
                <span class="b-profile-rating__count">12</span>
                <svg class="b-profile-rating__item b-profile-rating__item_negative">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--negative"></use>
                </svg>
                <span class="b-profile-rating__count">0</span>
            </span>
            
            <span class="b-profile-data__item">
                <span class="b-profile-rating__followers">
                    65 подписчиков
                </span>
            </span>
            
            <span class="b-profile-data__item">
                <span class="b-profile-rating__followers">
                    18 продаж
                </span>
            </span>
            
        </div>
        <span class="b-profile-data__item">
            <svg class="b-profile-data__icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--clock"></use>
            </svg>
            Был
            <time datetime="2017-05-27 15:31:08"
                  title="27.05.2017 15.31.08">&nbsp;</time>
        </span>
        

        <span class="b-profile-data__item">
            <svg class="b-profile-data__icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--check"></use>
            </svg>
            В Шафе
            <time datetime="2017-05-26 10:54:27.477823+00:00"
                  relative="true"
                  title="26.05.2017 10.54.27">&nbsp;</time>
        </span>
        
            <span class="b-profile-data__item">
                <a href="http://vk.com/fontez" class="b-profile-data__link" rel="nofollow" target="_blank">
                    
                        <svg class="b-profile-data__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--vk2"></use>
                        </svg>
                    
                </a>
            </span>
        
        

        

        

        
    </div>
</div>
<div class="b-profile-background" style='background-image: url(/avatars/438599);'></div>
        </div>
    </div>
    


    
    <div class="b-section">
        <div class="b-section__container">
            <div class="b-tabs">
                <button class="b-tabs__button js-tabs_button">
                    Мои товары 62
                    
                    <svg class="b-tabs__arrow">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"></use>
                    </svg>
                </button>
                <ul class="b-tabs__list" data-classactive="b-tabs__list_state_opened">
                    <li class="b-tabs__item b-tabs__item_state_active">
                        <a class="b-tabs__link" href="/member/fontez">
                            Мои товары
                            <sup class="b-tabs__counter">62</sup>
                        </a>
                    </li>
                    
                    <li class="b-tabs__item ">
                        <a class="b-tabs__link" href="/member/fontez/reviews?r=p">
                            Отзывы
                            <sup class="b-tabs__counter">
                                12
                            </sup>
                        </a>
                    </li>
                    <li class="b-tabs__item ">
                        <a class="b-tabs__link" href="/member/fontez/subscriptions">
                            Подписки
                            <sup class="b-tabs__counter">
                                2
                            </sup>
                        </a>
                    </li>
                    
                    <li class="b-tabs__item">
                        <a class="b-tabs__link" href="/msg/new/mr.fontez" rel="nofollow">Написать</a>
                    </li>
                    <li class="b-tabs__item b-tabs__item_pos_right js-complain-link" data-location="profile"><div data-reactroot="" class="b-inline"><a class="b-warning-link b-tabs__link" href="#" rel="nofollow"><svg class="b-warning-link__icon b-tabs__icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--message-warning"></use></svg><span class="b-warning-link__text">Пожаловаться</span></a><noscript></noscript></div></li>
                    
                </ul>
            </div>
            <div class="b-block b-main">
                
    
    <div class="b-block">
        <div class="b-main__content">
            
                

<ul class="b-catalog b-catalog_max-columns_4 b-block"><li class="b-catalog__item" id="b-catalog__item-5690273">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5690273-prodam-stilni-okulyari" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5690273" title="Продам стильні окуляри"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/20513526_310_430" title="Продам стильні окуляри" alt="Продам стильні окуляри" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/20513526_310_430">
        <noscript>
            &lt;img src="/image-thumbs/20513526_310_430" alt="Продам стильні окуляри"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Продам стильні окуляри
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    99
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5611792">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5611792-new-stilni-okulyari-2017" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5611792" title="New!!! стильні окуляри 2017"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/20219553_310_430" title="New!!! стильні окуляри 2017" alt="New!!! стильні окуляри 2017" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/20219553_310_430">
        <noscript>
            &lt;img src="/image-thumbs/20219553_310_430" alt="New!!! стильні окуляри 2017"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            New!!! стильні окуляри 2017
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            <span class="b-catalog__name">Miu Miu</span>

            

            <span class="b-catalog__price">
                    150
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5542077">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5542077-stilni-okulyari" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5542077" title="Стильні окуляри"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19961487_310_430" title="Стильні окуляри" alt="Стильні окуляри" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19961487_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19961487_310_430" alt="Стильні окуляри"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Стильні окуляри
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    180
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5542023">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5542023-prodam-ochki" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5542023" title="Продам очки"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19961267_310_430" title="Продам очки" alt="Продам очки" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19961267_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19961267_310_430" alt="Продам очки"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Продам очки
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    150
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5530345">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5530345-prodam-ochki" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5530345" title="Продам очки"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19917039_310_430" title="Продам очки" alt="Продам очки" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19917039_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19917039_310_430" alt="Продам очки"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Продам очки
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            <span class="b-catalog__name">Lacoste</span>

            <span class="b-catalog__old_price">180 грн</span>

            <span class="b-catalog__price">
                    150
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5509620">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5509620-prodam-ochki" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5509620" title="Продам очки"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19839528_310_430" title="Продам очки" alt="Продам очки" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19839528_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19839528_310_430" alt="Продам очки"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Продам очки
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            <span class="b-catalog__old_price">200 грн</span>

            <span class="b-catalog__price">
                    150
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5509584">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5509584-prodam-ochki-gabriela-marioni" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5509584" title="Продам очки gabriela marioni"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19839389_310_430" title="Продам очки gabriela marioni" alt="Продам очки gabriela marioni" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19839389_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19839389_310_430" alt="Продам очки gabriela marioni"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Продам очки gabriela marioni
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    150
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5509535">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5509535-stilni-polyarizovani-okulyari" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5509535" title="Стильні поляризовані окуляри"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19839279_310_430" title="Стильні поляризовані окуляри" alt="Стильні поляризовані окуляри" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19839279_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19839279_310_430" alt="Стильні поляризовані окуляри"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Стильні поляризовані окуляри
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    200
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5509499">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5509499-prodam-ochki" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5509499" title="Продам очки"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19839119_310_430" title="Продам очки" alt="Продам очки" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19839119_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19839119_310_430" alt="Продам очки"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Продам очки
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    200
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5509460">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5509460-prodam-ochki" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5509460" title="Продам очки"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19838959_310_430" title="Продам очки" alt="Продам очки" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19838959_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19838959_310_430" alt="Продам очки"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Продам очки
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    160
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5509127">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5509127-stilni-okulyari" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5509127" title="Стильні окуляри"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19837577_310_430" title="Стильні окуляри" alt="Стильні окуляри" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19837577_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19837577_310_430" alt="Стильні окуляри"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Стильні окуляри
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    160
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5492638">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5492638-prodam-ochki" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5492638" title="Продам очки"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19774860_310_430" title="Продам очки" alt="Продам очки" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19774860_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19774860_310_430" alt="Продам очки"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Продам очки
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            <span class="b-catalog__name">Tom Ford</span>

            <span class="b-catalog__old_price">180 грн</span>

            <span class="b-catalog__price">
                    150
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5492588">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5492588-stilnye-polyarizovannye-ochki" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5492588" title="Стильные поляризованные очки"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19774639_310_430" title="Стильные поляризованные очки" alt="Стильные поляризованные очки" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19774639_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19774639_310_430" alt="Стильные поляризованные очки"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Стильные поляризованные очки
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    200
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5478426">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5478426-stilni-okulyari" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5478426" title="Стильні окуляри"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19722808_310_430" title="Стильні окуляри" alt="Стильні окуляри" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19722808_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19722808_310_430" alt="Стильні окуляри"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Стильні окуляри
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            <span class="b-catalog__old_price">200 грн</span>

            <span class="b-catalog__price">
                    160
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5474700">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5474700-prodam-ochki" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5474700" title="Продам очки"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19709150_310_430" title="Продам очки" alt="Продам очки" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19709150_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19709150_310_430" alt="Продам очки"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Продам очки
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            <span class="b-catalog__old_price">180 грн</span>

            <span class="b-catalog__price">
                    150
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5466684">
            <a class="b-catalog__link js-ga-onclick " href="/women/aksessuary/ochki/5466684-prodam-ochki" data-event-action="Open from profile" data-event-category="Open" data-event-label="" data-id="5466684" title="Продам очки"><img class="b-catalog__img js-lazy-img lazy-loaded" src="/image-thumbs/19679314_310_430" title="Продам очки" alt="Продам очки" data-placeholder="https://assets.shafastatic.net/img/image-placeholder.png" data-src="/image-thumbs/19679314_310_430">
        <noscript>
            &lt;img src="/image-thumbs/19679314_310_430" alt="Продам очки"/&gt;
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Продам очки
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            <span class="b-catalog__name">Lacoste</span>

            

            <span class="b-catalog__price">
                    180
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li></ul>
            
            
            <div class="b-block">
                <div class="b-block__centering">
                    <a class="b-button-bordered b-button-bordered_icon_arrow" href="/member/fontez/clothes">Посмотреть все 62 вещи</a>
                </div>
            </div>
            
        </div>
        <aside class="b-main__aside">
            <div class="b-main__inner">
                <div class="b-filter b-block">
                    <button class="b-block__subcategories-button b-button-bordered js-toggle" data-toggle-classname="b-shop-categories_state_active" data-target-id="categories">Подкатегории</button>
                    <ul id="categories" class="b-shop-categories">
                        <li class="b-shop-categories__item b-shop-categories__item_state_active">
                            <div class="b-shop-categories__link-wrap">
                                <a href="/member/fontez" class="js-ga-onclick" data-event-category="Catalog Filter" data-event-action="change_category" data-event-label="From Shop">Все вещи</a>
                            </div>
                            <div class="b-shop-categories__counter-wrap">
                                <span class="b-shop-categories__counter">
                                    62
                                </span>
                            </div>
                        </li><li class="b-shop-categories__item">
                            <div class="b-shop-categories__link-wrap">
                                <a href="/member/fontez?category=62" class="js-ga-onclick" data-event-category="Catalog Filter" data-event-action="change_category" data-event-label="From Shop">
                                    Аксессуары
                                </a>
                            </div>
                            <div class="b-shop-categories__counter-wrap">
                                <span class="b-shop-categories__counter">
                                    61
                                </span>
                            </div>
                        </li><li class="b-shop-categories__item">
                            <div class="b-shop-categories__link-wrap">
                                <a href="/member/fontez?category=81" class="js-ga-onclick" data-event-category="Catalog Filter" data-event-action="change_category" data-event-label="From Shop">
                                    Другие вещи
                                </a>
                            </div>
                            <div class="b-shop-categories__counter-wrap">
                                <span class="b-shop-categories__counter">
                                    1
                                </span>
                            </div>
                        </li></ul>
                </div>
            </div>
        </aside>
    </div>
    
    <div class="b-block">
        <div class="b-main__content">
            <div class="b-main__inner b-main__limited">
                <div class="b-feedback b-block">
        
            <div class="b-feedback__item">
                <a class="b-feedback__image-link" href="/member/777kachur">
                    <img class="b-feedback__image" src="/avatars/161772" alt="777kachur">
                </a>
                <div class="b-feedback__info">
                    
                        <svg class="b-feedback__positive">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--positive"></use>
                        </svg>
                    
                    <a href="/member/777kachur">777kachur</a>, товар
                    <a href="/p/5028881" rel="nofollow">Продам очки, 200 грн</a>
                    <p class="b-feedback__time">22 мая 2017 г. в 17:51</p>
                    <p></p><p>Очень понравилось качество очков, предлагаемое у Андрея. Внимательный и добрый продавец. Сделал скидку при покупке нескольких очков, что довольно таки приятно. Спасибо огромное. Надеюсь на дальнейшее взаимовыгодное сотрудничество</p><p></p>
                </div>
            </div>
        
            <div class="b-feedback__item">
                <a class="b-feedback__image-link" href="/member/kykolka777">
                    <img class="b-feedback__image" src="/avatars/75731" alt="kykolka777">
                </a>
                <div class="b-feedback__info">
                    
                        <svg class="b-feedback__positive">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--positive"></use>
                        </svg>
                    
                    <a href="/member/kykolka777">kykolka777</a>, товар
                    <a href="/p/4666215" rel="nofollow">Продам очки gabriela marioni, 170 грн</a>
                    <p class="b-feedback__time">17 мая 2017 г. в 11:19</p>
                    <p></p><p>Спасибо большое продавцу. Все очень быстро и качественно. Отдельное спасибо за терпение и внимание к своим покупателям.Рекомендую.</p><p></p>
                </div>
            </div>
        
            <div class="b-feedback__item">
                <a class="b-feedback__image-link" href="/member/777kachur">
                    <img class="b-feedback__image" src="/avatars/161772" alt="777kachur">
                </a>
                <div class="b-feedback__info">
                    
                        <svg class="b-feedback__positive">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--positive"></use>
                        </svg>
                    
                    <a href="/member/777kachur">777kachur</a>, товар
                    <a href="/p/4529710" rel="nofollow">Продам поляризованые очки  graffito, 190 грн</a>
                    <p class="b-feedback__time">14 мая 2017 г. в 15:30</p>
                    <p></p><p>Всем рекомендую этого продавца. Приобрела у него семь очков. На всей покупке сделал серьёзную скидку. Все очки качественные, копии известных брендов. Спасибо за сделку. Удачных сделок и продаж Вам</p><p></p>
                </div>
            </div>
        
            <div class="b-feedback__item">
                <a class="b-feedback__image-link" href="/member/annushka_s_maslom">
                    <img class="b-feedback__image" src="/avatars/273945" alt="annushka_s_maslom">
                </a>
                <div class="b-feedback__info">
                    
                        <svg class="b-feedback__positive">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--positive"></use>
                        </svg>
                    
                    <a href="/member/annushka_s_maslom">annushka_s_maslom</a>, товар
                    <a href="/p/4880263" rel="nofollow">Продам имиджевые очки lacoste, 99 грн</a>
                    <p class="b-feedback__time">28 апреля 2017 г. в 20:12</p>
                    <p></p><p>Все супер!) Рекомендую)</p><p></p>
                </div>
            </div>
        
            <div class="b-feedback__item">
                <a class="b-feedback__image-link" href="/member/anuta10574">
                    <img class="b-feedback__image" src="/avatars/248625" alt="anuta10574">
                </a>
                <div class="b-feedback__info">
                    
                        <svg class="b-feedback__positive">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--positive"></use>
                        </svg>
                    
                    <a href="/member/anuta10574">anuta10574</a>, товар
                    <a href="/p/4777313" rel="nofollow">Продам очки sandro carsetti, 139 грн</a>
                    <p class="b-feedback__time">19 апреля 2017 г. в 18:00</p>
                    <p></p><p>Очки соответствуют описанию и фотографиям.Отдельное спасибо Андрею (скидочки не исключаются). Только приятные впечатления от сделки, РЕКОМЕНДУЮ как порядочного и ответственного продавца!</p><p></p>
                </div>
            </div>
        
    </div>
    
                <div class="b-block">
                    <div class="b-block__centering">
                        <a class="b-button-bordered b-button-bordered_icon_arrow" href="/member/fontez/reviews?r=p">Посмотреть все 12 отзывов</a>
                    </div>
                </div>
            </div>
        </div>
        <aside class="b-main__aside">
            <div class="b-main__inner">
                <h3>Отзывы</h3>
            </div>
        </aside>
    </div>
    
    

            </div>
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
        <div class="fontez" style="display: none;">
        <p>Developed by <a href="https://vk.com/fontez">FonteZ</a></p>
    </div>
    </div>

<script>
    window.staticUrl = '/assets/';
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
</script>
<script type="application/json+context">{"member": {"username": "fontez", "id": 438599}, "complainLinkData": {"url": "/util/user_complain"}, "followButtonData": {"isSubscribed": false, "urlDestroy": "/member/friendship/destroy", "urlCreate": "/member/friendship"}, "config": {"csrfToken": "7LH9txT7u8mFUI6GcWn6TGY4Dq3vdkb6amxNoguJzw1x766YXW5UFF20RTl3BLoi"}}</script>

<script defer src="/assets/build/shared.js"></script>
<script defer src="/assets/build/global.js"></script>

<script defer src="/assets/build/profile.js"></script>




</body>
</html>
