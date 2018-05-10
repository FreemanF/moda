<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Как это работает</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><script type="text/javascript">window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var o=n[t]={exports:{}};e[t][0].call(o.exports,function(n){var o=e[t][1][n];return r(o||n)},o,o.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<t.length;o++)r(t[o]);return r}({1:[function(e,n,t){function r(){}function o(e,n,t){return function(){return i(e,[c.now()].concat(u(arguments)),n?null:this,t),n?void 0:this}}var i=e("handle"),a=e(2),u=e(3),f=e("ee").get("tracer"),c=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],d="api-",l=d+"ixn-";a(p,function(e,n){s[n]=o(d+n,!0,"api")}),s.addPageAction=o(d+"addPageAction",!0),s.setCurrentRouteName=o(d+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,o="function"==typeof n;return i(l+"tracer",[c.now(),e,t],r),function(){if(f.emit((o?"":"no-")+"fn-start",[c.now(),r,o],t),o)try{return n.apply(this,arguments)}finally{f.emit("fn-end",[c.now()],t)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=o(l+n)}),newrelic.noticeError=function(e){"string"==typeof e&&(e=new Error(e)),i("err",[e,c.now()])}},{}],2:[function(e,n,t){function r(e,n){var t=[],r="",i=0;for(r in e)o.call(e,r)&&(t[i]=n(r,e[r]),i+=1);return t}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],3:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,o=t-n||0,i=Array(o<0?0:o);++r<o;)i[r]=e[n+r];return i}n.exports=r},{}],4:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function o(e){function n(e){return e&&e instanceof r?e:e?f(e,u,i):i()}function t(t,r,o,i){if(!d.aborted||i){e&&e(t,r,o);for(var a=n(o),u=m(t),f=u.length,c=0;c<f;c++)u[c].apply(a,r);var p=s[y[t]];return p&&p.push([b,t,r,a]),a}}function l(e,n){v[e]=m(e).concat(n)}function m(e){return v[e]||[]}function w(e){return p[e]=p[e]||o(t)}function g(e,n){c(e,function(e,t){n=n||"feature",y[t]=n,n in s||(s[n]=[])})}var v={},y={},b={on:l,emit:t,get:w,listeners:m,context:n,buffer:g,abort:a,aborted:!1};return b}function i(){return new r}function a(){(s.api||s.feature)&&(d.aborted=!0,s=d.backlog={})}var u="nr@context",f=e("gos"),c=e(2),s={},p={},d=n.exports=o();d.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(o.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return e[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){o.buffer([e],r),o.emit(e,n,t)}var o=e("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,i,function(){return o++})}var o=1,i="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!x++){var e=h.info=NREUM.info,n=d.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();c(y,function(n,t){e[n]||(e[n]=t)}),f("mark",["onload",a()+h.offset],null,"api");var t=d.createElement("script");t.src="https://"+e.agent,n.parentNode.insertBefore(t,n)}}function o(){"complete"===d.readyState&&i()}function i(){f("mark",["domContent",a()+h.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(u=Math.max((new Date).getTime(),u))-h.offset}var u=(new Date).getTime(),f=e("handle"),c=e(2),s=e("ee"),p=window,d=p.document,l="addEventListener",m="attachEvent",w=p.XMLHttpRequest,g=w&&w.prototype;NREUM.o={ST:setTimeout,CT:clearTimeout,XHR:w,REQ:p.Request,EV:p.Event,PR:p.Promise,MO:p.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1026.min.js"},b=w&&g&&g[l]&&!/CriOS/.test(navigator.userAgent),h=n.exports={offset:u,now:a,origin:v,features:{},xhrWrappable:b};e(1),d[l]?(d[l]("DOMContentLoaded",i,!1),p[l]("load",r,!1)):(d[m]("onreadystatechange",o),p[m]("onload",r)),f("mark",["firstbyte",u],null,"api");var x=0,E=e(4)},{}]},{},["loader"]);</script><script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","queueTime":0,"licenseKey":"e0a6cba660","agent":"","transactionName":"NQdaZhACXxVRU0UNCwxNfkcMAEUPX14eFwwDBFkcAxNBFR5AUAMBEUxOWwcUQlxgUVYBMgsHTxwFBkU=","applicationID":"24033287","errorBeacon":"bam.nr-data.net","applicationTime":107}</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta name="description" content="Шафа - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <meta property="og:title" content="Шафа"/>
    <meta property="og:type" content="website"/>
    <meta name="author" content="FonteZ">
    <meta property="og:url" content="https://fontez.com/page/kak-eto-rabotaet"/>
    <meta property="og:image" content="/assets/img/shafa-og-image.png"/>
    <meta property="og:description" content="Шафа - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <link rel="image_src" href="/assets/img/shafa-og-image.png"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Шафа"/>
    <meta name="twitter:description" content="Шафа - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <meta name="twitter:image" content="/assets/img/shafa-og-image.png"/>
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
    
    ga('require', 'ecommerce', 'ecommerce.js');
    ga('send', 'pageview');
</script>


    
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
    <div class="b-header__links b-header-links"><div class="b-header-links__buttons">
                <a href="/login?next=/page/kak-eto-rabotaet"
                   class="b-header-links__auth js-ga-onclick"
                   data-event-action="Registration/Login click"
                   data-event-category="Activities"
                   data-event-label="Registration/Login top click">
                    Вход
                </a>
                <span class="b-header-links__separator">|</span>
                <a href="/login?next=/page/kak-eto-rabotaet"
                   class="b-header-links__auth js-ga-onclick"
                   data-event-action="Registration/Login click"
                   data-event-category="Activities"
                   data-event-label="Registration/Login top click">
                    Регистрация
                </a>
            </div>
            <a class="b-login-button" href="/login">Вход</a></div>
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
        <div class="b-header-fixed__log-out b-header-links b-header-links_type_inverse">
                <div class="b-header-links__buttons">
                    <a href="/login?next=/page/kak-eto-rabotaet"
                       class="b-header-links__auth js-ga-onclick"
                       data-event-action="Registration/Login click"
                       data-event-category="Activities"
                       data-event-label="Registration/Login top click">
                        Вход
                    </a>
                    <span class="b-header-links__separator">|</span>
                    <a href="/login?next=/page/kak-eto-rabotaet"
                       class="b-header-links__auth js-ga-onclick"
                       data-event-action="Registration/Login click"
                       data-event-category="Activities"
                       data-event-label="Registration/Login top click">
                        Регистрация
                    </a>
                </div>
                <a class="b-login-button" href="/login">Вход</a>
            </div></div>
</div>
            
        </div>
    </div>
    


    
    <div class="b-section">
        <div class="b-section__container b-main b-main_state_inverse">
            <div class="b-main__content">
                <div class="b-main__inner">
                    <div class="b-main__block">
                        <div class="b-unstyled">
                            <h1>Как это работает</h1>
                            <h2>Приветствуем вас в Шафе!</h2>

<p>Шафа - это площадка для продажи женских вещей и аксессуаров. Здесь вы общаетесь напрямую с продавцом вещи или можете стать таким продавцом сами.&nbsp;<br />
&nbsp;</p>

<h3>Как я могу купить вещь в Шафе</h3>

<p>Вы можете перейти в <a href="http://fontez.com/women">каталог </a>и выбрать интересующую вас рубрику. Как только вы нашли интересную вещь, вы можете задать вопрос напрямую продавцу и обсудить с ней все условия покупки и доставки. Для этого нажмите кнопку &quot;Хочу&quot; или напишите свой вопрос в специальном поле под описанием вещи.</p>

<p><strong>Также вам могут быть полезны:</strong></p>

<ul>
	<li><a href="http://fontez.com/page/kak-kupit-ponravivshuyusya-vesh">Как купить понравившуюся вещь</a></li>
	<li><a href="http://fontez.com/page/pravila-dlya-pokupatelyay">Правила для покупателей</a></li>
	<li><a href="http://fontez.com/page/otzyvy-v-shafe">Отзывы в Шафе</a></li>
</ul>

<p>&nbsp;</p>

<h3>Как я могу продать свою вещь в Шафе</h3>

<p>Мы рекомендуем размещать вещи либо новые, либо слегка ношенные без заметных следов носки.</p>

<p>Чтобы разместить вещь, нажимайте на кнопку &quot;<a href="http://fontez.com/new">Добавить товар</a>&quot;. Вам необходимо будет сделать несколько фотографий вашей вещи, придумать название и описание.</p>

<p>Мы не принимаем детские и мужские вещи.&nbsp;</p>

<p>После размещения ваших вещей они проходят модерацию. Это обычно занимает несколько часов и после модерации ваши вещи появятся в каталоге.</p>

<p>Далее, если ваша вещь кого-то заинтересует, вам напишут сообщение и вы будете договариваться с потенциальным покупателем напрямую</p>

<p><strong>Также вам могут быть полезны:</strong></p>

<ul>
	<li><a href="http://fontez.com/page/kak-dobavit-vesh-v-shafu">Как добавить вещь в Шафу</a></li>
	<li><a href="http://fontez.com/page/chto-takoe-moderaciya-chastye-voprosy">Что такое модерация? Частые вопросы</a></li>
	<li><a href="http://fontez.com/page/pravila-dlya-prodavcov">Правила для продавцов</a></li>
	<li><a href="http://fontez.com/page/otzyvy-v-shafe">Отзывы в Шафе</a></li>
</ul>

<p>&nbsp;</p>

<p>Если вдруг вы не нашли ответ на ваш вопрос, загляните на страницу с <a href="http://fontez.com/page/raznye-voprosy">разными вопросами</a>.</p>

<p>Если вашего вопроса там нет,&nbsp;то <strong>пишите нам</strong> на hello@shafa.com.ua, ответьте на любое письмо или можете задать вопрос&nbsp;<a href="http://fontez.com/member/admin">администратору</a>. Ответ на вопрос вы получите в течение 3х дней.&nbsp;<br />
Обратите внимание, что в Шафе запрещено иметь несколько аккаунтов.&nbsp;</p>

<p><span style="font-size:16px"><a href="http://fontez.com/page/pravila-dlya-prodavcov">Правила для продавцов</a></span></p>

<p><span style="font-size:16px"><a href="http://fontez.com/page/pravila-dlya-pokupatelyay">Правила для покупателей</a></span></p>

                        </div>
                    </div>
                </div>
            </div>
            <aside class="b-main__aside">
                <div class="b-main__inner">
                    <div class="b-side-nav">
                        <h5 class="b-title b-side-nav__title">Содержание</h5>
                        
    <ul class="b-side-nav__list">
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link b-side-nav__link_state_active"
                   href="/page/kak-eto-rabotaet">
                    Как это работает
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/vhod-i-registraciya">
                    Вход и регистрация в Шафе
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-uznat-svoj-login">
                    Как узнать свой логин
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/vhod-po-loginu-i-parolyu">
                    Вход по логину и паролю
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-dobavit-vesh-v-shafu">
                    Как добавить вещь в Шафу
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/zapolnyaem-kartochku-tovara">
                    Заполняем карточку товара
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-delat-zamery">
                    Как делать замеры
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/chto-takoe-novaya-vesh-ili-v-sostoyanie-novoy">
                    Что такое &#34;Новая вещь&#34; или &#34;в состояние новой&#34;
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/dobavili-vesh-chto-dalshe">
                    Добавили вещь. Что дальше?
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/chto-takoe-moderaciya-chastye-voprosy">
                    Что такое модерация? Частые вопросы
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-kupit-ponravivshuyusya-vesh">
                    Как купить понравившуюся вещь
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-proverit-nadezhnost-prodavca">
                    Как проверить надежность продавца
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-vernut-vesh-chastye-voprosy">
                    Как вернуть вещь? Частые вопросы
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-prodvinut-svoe-obyavlenie">
                    Как продвинуть свое объявление
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/usluga-top-obyavleniya">
                    Услуга &#34;ТОП объявления&#34;
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/bloki-razmesheniya-top-obyavleniy">
                    Блоки размещения ТОП объявлений
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/stoimost-razmesheniya-v-top">
                    Стоимость размещения в ТОП
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/usluga-vip-obyavleniya">
                    Услуга &#34;VIP-объявления&#34;
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/bloki-razmesheniya-vip-obyavleniy">
                    Блоки размещения VIP объявлений
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/otzyvy-v-shafe">
                    Отзывы в Шафе
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/ostavit-otzyv-o-pokupatele">
                    Оставить отзыв о покупателе
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-traktovat-otzyvy">
                    Как трактовать отзывы
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/blokirovka-i-udalenie-akkaunta">
                    Блокировка и удаление аккаунта
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/zhaloby-na-polzovatelyay-i-procedura-razbiratelstva">
                    Жалобы на пользователей и процедура разбирательства
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/raznye-voprosy">
                    Разные вопросы
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/poleznye-funkcii-dlya-prodavcov">
                    Полезные функции для продавцов
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/shablony-soobshenij">
                    Готовые ответы
                </a>
            </li>

            
        </ul>
            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/pravila-dlya-prodavcov">
                    Правила для продавцов
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/trebovaniya-k-obyavleniyam">
                    Требования к объявлениям
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/pravila-prodazhi-kosmetiki">
                    Правила продажи косметики
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/pravila-dlya-pokupatelyay">
                    Правила для покупателей
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/dlya-professionalnyh-prodavcov">
                    Для профессиональных продавцов
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-sozdat-magazin">
                    Ваш магазин в Шафе
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/pakety-magazinov-v-shafe">
                    Пакеты магазинов в Шафе
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/chto-takoe-publikacii">
                    Что такое публикации
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/populyarnye-rubriki-v-shafe">
                    Популярные рубрики в Шафе
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/komissionka-shafa">
                    Комиссионка Шафа
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/specialnoe-predlozhenie-dlya-prodavcov-s-aukro">
                    Специальное предложение для продавцов с Аукро
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/rabota-v-shafe">
                    Работа в Шафе
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/vakansiya-kopirajtera">
                    Вакансия копирайтера
                </a>
            </li>

            
        </ul>
            
        
    </ul>

                    </div>
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
        <div class="fontez" style="display: none;">
        <p>Developed by <a href="https://vk.com/fontez">FonteZ</a></p>
    </div>
    </div>

<script>
    window.staticUrl = '/assets/';
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
</script>


<script defer src="/assets/build/shared.js"></script>
<script defer src="/assets/build/global.js"></script>

    <script>
    $(document).ready(function() {
        //$('.dropdown-toggle').dropdown();
        $(".js-catalog-menu").on("click",function(e){
            $(".js-catalog-menu").each(function(){
                $(this).removeClass("b-nav__item_state_opened");
            });
        });
    });
    </script>

</body>
</html>