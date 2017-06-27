<?php // if($this->beginCache($id, array('duration'=>3600))) { ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Мои вещи | Шафа</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><script type="text/javascript">window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var o=n[t]={exports:{}};e[t][0].call(o.exports,function(n){var o=e[t][1][n];return r(o||n)},o,o.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<t.length;o++)r(t[o]);return r}({1:[function(e,n,t){function r(){}function o(e,n,t){return function(){return i(e,[c.now()].concat(u(arguments)),n?null:this,t),n?void 0:this}}var i=e("handle"),a=e(2),u=e(3),f=e("ee").get("tracer"),c=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],d="api-",l=d+"ixn-";a(p,function(e,n){s[n]=o(d+n,!0,"api")}),s.addPageAction=o(d+"addPageAction",!0),s.setCurrentRouteName=o(d+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,o="function"==typeof n;return i(l+"tracer",[c.now(),e,t],r),function(){if(f.emit((o?"":"no-")+"fn-start",[c.now(),r,o],t),o)try{return n.apply(this,arguments)}finally{f.emit("fn-end",[c.now()],t)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=o(l+n)}),newrelic.noticeError=function(e){"string"==typeof e&&(e=new Error(e)),i("err",[e,c.now()])}},{}],2:[function(e,n,t){function r(e,n){var t=[],r="",i=0;for(r in e)o.call(e,r)&&(t[i]=n(r,e[r]),i+=1);return t}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],3:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,o=t-n||0,i=Array(o<0?0:o);++r<o;)i[r]=e[n+r];return i}n.exports=r},{}],4:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function o(e){function n(e){return e&&e instanceof r?e:e?f(e,u,i):i()}function t(t,r,o,i){if(!d.aborted||i){e&&e(t,r,o);for(var a=n(o),u=m(t),f=u.length,c=0;c<f;c++)u[c].apply(a,r);var p=s[y[t]];return p&&p.push([b,t,r,a]),a}}function l(e,n){v[e]=m(e).concat(n)}function m(e){return v[e]||[]}function w(e){return p[e]=p[e]||o(t)}function g(e,n){c(e,function(e,t){n=n||"feature",y[t]=n,n in s||(s[n]=[])})}var v={},y={},b={on:l,emit:t,get:w,listeners:m,context:n,buffer:g,abort:a,aborted:!1};return b}function i(){return new r}function a(){(s.api||s.feature)&&(d.aborted=!0,s=d.backlog={})}var u="nr@context",f=e("gos"),c=e(2),s={},p={},d=n.exports=o();d.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(o.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return e[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){o.buffer([e],r),o.emit(e,n,t)}var o=e("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,i,function(){return o++})}var o=1,i="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!x++){var e=h.info=NREUM.info,n=d.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();c(y,function(n,t){e[n]||(e[n]=t)}),f("mark",["onload",a()+h.offset],null,"api");var t=d.createElement("script");t.src="https://"+e.agent,n.parentNode.insertBefore(t,n)}}function o(){"complete"===d.readyState&&i()}function i(){f("mark",["domContent",a()+h.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(u=Math.max((new Date).getTime(),u))-h.offset}var u=(new Date).getTime(),f=e("handle"),c=e(2),s=e("ee"),p=window,d=p.document,l="addEventListener",m="attachEvent",w=p.XMLHttpRequest,g=w&&w.prototype;NREUM.o={ST:setTimeout,CT:clearTimeout,XHR:w,REQ:p.Request,EV:p.Event,PR:p.Promise,MO:p.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1026.min.js"},b=w&&g&&g[l]&&!/CriOS/.test(navigator.userAgent),h=n.exports={offset:u,now:a,origin:v,features:{},xhrWrappable:b};e(1),d[l]?(d[l]("DOMContentLoaded",i,!1),p[l]("load",r,!1)):(d[m]("onreadystatechange",o),p[m]("onload",r)),f("mark",["firstbyte",u],null,"api");var x=0,E=e(4)},{}]},{},["loader"]);</script><script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","queueTime":0,"licenseKey":"e0a6cba660","agent":"","transactionName":"NQdaZhACXxVRU0UNCwxNfkcMAEUPX14eFwwDBFkcAxNBFR5dVAkGBxAWRAsGRhUeQEMLAgsOXQgvBlwEVUJ4EAEPEW5bBxQfAVVE","applicationID":"24033287","errorBeacon":"bam.nr-data.net","applicationTime":55}</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php 
            if ($this->noindex)  echo '        <meta name="robots" content="noindex">'."\n";
            if ($this->nofollow) echo '        <meta name="robots" content="nofollow">'."\n";
            if (!empty($this->meta['keywords'])) echo '        <meta name="keywords" content="'.CHtml::encode($this->meta['keywords']).'" />'."\n";
            if (!empty($this->meta['description'])) echo '        <meta name="description" content="'.CHtml::encode($this->meta['description']).'" />'."\n"; 
    ?>        <title><?php echo CHtml::encode($this->meta['title']); ?></title>
    <meta name="description" content="Шафа - это сайт для продажи и обмена женской одежды. Распродайте свой гардероб и найдите для себя что-то интересное!"/>
    <meta property="og:title" content="Шафа"/>
    <meta property="og:type" content="website"/>
    <meta name="author" content="FonteZ">
    <meta property="og:url" content="https://domain.loc/my/clothes"/>
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


<!--<a href="https://www.facebook.com/v2.9/dialog/oauth?client_id=741607065872333&redirect_uri=http://test-pro.adr.com.ua">Login</a>-->
    <div class="b-section">
        <div class="b-section__container">
            

<header class="b-header">
    <div class="b-header__logo b-logo">
        <a href="/" class="b-logo__link">
            <svg class="b-logo__img" >
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shafa-logo"></use>
            </svg>
        </a>
        <span class="b-logo__slogan">
                Брендовые вещи Доступно
            </span>
    </div>
    <div class="b-header__links b-header-links"><div class="b-header-links__buttons">
	<?php
	if (Yii::app()->user->hasFlash('error')) {
		echo '<div class="error">'.Yii::app()->user->getFlash('error').'</div>';
	}
?>

<?php
	//$this->widget('application.extensions.eauth.EAuthWidget', array('action' => 'site/login'));
	echo Yii::app()->user->name;
?>
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>
                <a href="/login"
                   class="b-header-links__auth js-ga-onclick"
                   data-event-action="Registration/Login click"
                   data-event-category="Activities"
                   data-event-label="Registration/Login top click">
                    Вход
                </a>
                <span class="b-header-links__separator">|</span>
                <a href="/login?next=/"
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
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--search"></use>
            </svg>
        </form>
        <div class="b-nav__mobile-menu js-catalog-mobile-menu js-dropdown">
            <svg viewBox="0 0 15 14" class="b-nav__burger">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--menu"></use>
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
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav">
            <ul class="b-sub-nav-primary">
                <li class="b-sub-nav-primary__item">
                    <a href="/women/verhnyaya-odezhda" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--outerwears"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/platya" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--dress"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Платья</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/yubki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--skirt"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Юбки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/mayki-i-futbolki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--t-shirt"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Майки и футболки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/rubashki-i-bluzy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--clothes"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Рубашки и блузы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bryuki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--pants"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Брюки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/shorty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shorts"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Шорты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kofty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweater"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кофты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/nizhnee-bele-i-kupalniki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweamwear"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/tufli" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shoes"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Туфли</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/sapogi-i-botinki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--boots"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Сапоги и ботинки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/krossovki-i-kedy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sneakers"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кроссовки и кеды</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bosonozhki-i-shlepancy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sandals"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Босоножки и шлепанцы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/aksessuary" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--bag"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Аксессуары</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kosmetika" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--cosmetics"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Косметика</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/drugoe" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--paper-bag"></use>
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
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shafa-logo"></use>
                </svg>
            </a>
        </div>
        
        <div class="b-header-fixed__nav">
            <nav class="b-nav">
                <div class="b-nav__cell">
                    <form action="/women" class="b-search">
                        <input type="text" placeholder="Поиск" class="b-search__input" name="search_text" autocomplete="off"/>
                        <svg viewBox="0 0 612 617.5" class="b-search__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--search"></use>
                        </svg>
                    </form>
                    <div class="b-nav__mobile-menu js-catalog-mobile-menu js-dropdown">
                        <svg viewBox="0 0 15 14" class="b-nav__burger">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--menu"></use>
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
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"></use>
            </svg>
        </a>
        <div class="b-sub-nav">
            <ul class="b-sub-nav-primary">
                <li class="b-sub-nav-primary__item">
                    <a href="/women/verhnyaya-odezhda" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--outerwears"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Верхняя одежда</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/platya" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--dress"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Платья</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/yubki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--skirt"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Юбки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/mayki-i-futbolki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--t-shirt"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Майки и футболки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/rubashki-i-bluzy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--clothes"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Рубашки и блузы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bryuki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--pants"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Брюки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/shorty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shorts"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Шорты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kofty" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweater"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кофты</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/nizhnee-bele-i-kupalniki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweamwear"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Нижнее белье</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/tufli" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shoes"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Туфли</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/sapogi-i-botinki" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--boots"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Сапоги и ботинки</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/krossovki-i-kedy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sneakers"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Кроссовки и кеды</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/bosonozhki-i-shlepancy" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sandals"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Босоножки и шлепанцы</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/aksessuary" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--bag"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Аксессуары</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/kosmetika" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--cosmetics"></use>
                        </svg>
                        <span class="b-sub-nav-primary__link-text">Косметика</span>
                    </a>
                </li><li class="b-sub-nav-primary__item">
                    <a href="/women/drugoe" class="b-sub-nav-primary__link">
                        <svg class="b-sub-nav-primary__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--paper-bag"></use>
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
                    <a href="/login?next=/"
                       class="b-header-links__auth js-ga-onclick"
                       data-event-action="Registration/Login click"
                       data-event-category="Activities"
                       data-event-label="Registration/Login top click">
                        Вход
                    </a>
                    <span class="b-header-links__separator">|</span>
                    <a href="/login?next=/"
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
        <div class="b-section__container">
            <div class="b-index-header">
                <div class="b-index-header__info">
                    <div class="b-index-header__info_container">
                        <h1 class="b-index-header__info_title">
                            Брендовая женская одежда</br>со скидками до 90%
                        </h1>
                        <p class="b-index-header__info_text">
                            <span class="b-index-header__info_counter">2043743</span>
                            позиции в продаже
                        </p>
                    </div>
                    <a href="/login"
                       class="b-button-bordered b-index-header__info_button js-ga-onclick"
                       data-event-action="Click from home"
                       data-event-category="User">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </div>

    <div class="b-section">
        <div class="b-section__container">
            <h2>VIP-Объявления</h2>
                

<ul class="b-catalog b-catalog_max-columns_5"><li class="b-catalog__item" id="b-catalog__item-5609173" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/platya/midi/5609173-stilne-plattya-pryamogo-kroyu-z-karmanami-r10-finery"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5609173"
       title="Стильне плаття прямого крою з карманами р10 finery"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Стильне плаття прямого крою з карманами р10 finery"
             alt="Стильне плаття прямого крою з карманами р10 finery"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/20209310_310_430"/>
        <noscript>
            <img src="image-thumbs/20209310_310_430" alt="Стильне плаття прямого крою з карманами р10 finery"/>
        </noscript>

        

        <span class="b-catalog__details">
            Стильне плаття прямого крою з карманами р10 finery
            <span class="b-catalog__details_city">Луцк</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">38 / 10 / M</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">Finery Geo</span>

            

            <span class="b-catalog__price">
                    350
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-2093757" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/aksessuary/ukrasheniya-i-chasy/2093757-otkryvayushiysya-kulon-serdce-vmeste-s-cepochkoy"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="2093757"
       title="Открывающийся кулон сердце вместе с цепочкой"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Открывающийся кулон сердце вместе с цепочкой"
             alt="Открывающийся кулон сердце вместе с цепочкой"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/7033682_310_430"/>
        <noscript>
            <img src="image-thumbs/7033682_310_430" alt="Открывающийся кулон сердце вместе с цепочкой"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Открывающийся кулон сердце вместе с цепочкой
            <span class="b-catalog__details_city">Киев</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">Другой</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">Forever 21</span>

            

            <span class="b-catalog__price">
                    85
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5479747" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/platya/mini/5479747-neveroyatno-krasivoe-vypusknoe-plate"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5479747"
       title="Невероятно красивое выпускное платье"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Невероятно красивое выпускное платье"
             alt="Невероятно красивое выпускное платье"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/19727535_310_430"/>
        <noscript>
            <img src="image-thumbs/19727535_310_430" alt="Невероятно красивое выпускное платье"/>
        </noscript>

        

        <span class="b-catalog__details">
            Невероятно красивое выпускное платье
            <span class="b-catalog__details_city">Ужгород</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">34 / 6 / XS</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            

            

            <span class="b-catalog__price">
                    1000
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-4615331" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/verhnyaya-odezhda/plashi/4615331-kozhanyy-plash-na-tepluyu-vesnu-v-idealnom-sostoyanii"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="4615331"
       title="Кожаный плащ на теплую весну. в идеальном состоянии ."><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Кожаный плащ на теплую весну. в идеальном состоянии ."
             alt="Кожаный плащ на теплую весну. в идеальном состоянии ."

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/16529996_310_430"/>
        <noscript>
            <img src="image-thumbs/16529996_310_430" alt="Кожаный плащ на теплую весну. в идеальном состоянии ."/>
        </noscript>

        

        <span class="b-catalog__details">
            Кожаный плащ на теплую весну. в идеальном состоянии .
            <span class="b-catalog__details_city">Киев</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">36 / 8 / S</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            

            <span class="b-catalog__old_price">5100 грн</span>

            <span class="b-catalog__price">
                    4500
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5670143" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/nizhnee-bele-i-kupalniki/kupalniki/5670143-duzhe-garniy-kupalnik-vid-bikini-lab-chashka-b-z-pushapom"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5670143"
       title="Дуже гарний купальник від bikini lab  чашка б з пушапом"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Дуже гарний купальник від bikini lab  чашка б з пушапом"
             alt="Дуже гарний купальник від bikini lab  чашка б з пушапом"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/20436409_310_430"/>
        <noscript>
            <img src="image-thumbs/20436409_310_430" alt="Дуже гарний купальник від bikini lab  чашка б з пушапом"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Дуже гарний купальник від bikini lab  чашка б з пушапом
            <span class="b-catalog__details_city">Львов</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">38 / 10 / M</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">ASOS</span>

            

            <span class="b-catalog__price">
                    550
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5554697" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/platya/mini/5554697-plate-suknya-koloru-marsala-zara"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5554697"
       title="Платье/ сукня кольору марсала zara"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Платье/ сукня кольору марсала zara"
             alt="Платье/ сукня кольору марсала zara"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/20008015_310_430"/>
        <noscript>
            <img src="image-thumbs/20008015_310_430" alt="Платье/ сукня кольору марсала zara"/>
        </noscript>

        

        <span class="b-catalog__details">
            Платье/ сукня кольору марсала zara
            <span class="b-catalog__details_city">Сумы</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">36 / 8 / S</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">ZARA</span>

            

            <span class="b-catalog__price">
                    199
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5468918" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/nizhnee-bele-i-kupalniki/kupalniki/5468918-shikarnye-kupalnikievro-46-52nash-50-56-na-s-d-chashku2-rascvetki"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5468918"
       title="Шикарные купальники,евро 46-52,наш 50-56 на с-д чашку,2 расцветки"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Шикарные купальники,евро 46-52,наш 50-56 на с-д чашку,2 расцветки"
             alt="Шикарные купальники,евро 46-52,наш 50-56 на с-д чашку,2 расцветки"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/19687685_310_430"/>
        <noscript>
            <img src="image-thumbs/19687685_310_430" alt="Шикарные купальники,евро 46-52,наш 50-56 на с-д чашку,2 расцветки"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Шикарные купальники,евро 46-52,наш 50-56 на с-д чашку,2 расцветки
            <span class="b-catalog__details_city">Харьков</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">44 / 16 / XXL</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            

            

            <span class="b-catalog__price">
                    420
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5677117" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/krossovki-i-kedy/kedy/5677117-kedy"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5677117"
       title="Кеды"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Кеды"
             alt="Кеды"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/20462719_310_430"/>
        <noscript>
            <img src="image-thumbs/20462719_310_430" alt="Кеды"/>
        </noscript>

        

        <span class="b-catalog__details">
            Кеды
            <span class="b-catalog__details_city">Киев</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">39</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            

            

            <span class="b-catalog__price">
                    600
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5688495" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/platya/mini/5688495-ochen-krasivyy-kombinezon-romper-peacocks-razmer-12"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5688495"
       title="Заходи на обнову! очень красивый комбинезон / ромпер peacocks / размер 12"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Заходи на обнову! очень красивый комбинезон / ромпер peacocks / размер 12"
             alt="Заходи на обнову! очень красивый комбинезон / ромпер peacocks / размер 12"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/20544765_310_430"/>
        <noscript>
            <img src="image-thumbs/20544765_310_430" alt="Заходи на обнову! очень красивый комбинезон / ромпер peacocks / размер 12"/>
        </noscript>

        

        <span class="b-catalog__details">
            Заходи на обнову! очень красивый комбинезон / ромпер peacocks / размер 12
            <span class="b-catalog__details_city">Киев</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">40 / 12 / L</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">Peacocks</span>

            

            <span class="b-catalog__price">
                    175
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5523542" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/kosmetika/makiyazh/5523542-nabor-pomad-kylie-holiday-edition"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5523542"
       title="Набор помад kylie holiday edition"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Набор помад kylie holiday edition"
             alt="Набор помад kylie holiday edition"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/19891644_310_430"/>
        <noscript>
            <img src="image-thumbs/19891644_310_430" alt="Набор помад kylie holiday edition"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Набор помад kylie holiday edition
            <span class="b-catalog__details_city">Киев</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">Kylie</span>

            <span class="b-catalog__old_price">250 грн</span>

            <span class="b-catalog__price">
                    199
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-4471149" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/krossovki-i-kedy/kedy/4471149-novye-mokasiny-ot-guess-original-iz-ssha"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="4471149"
       title="Новые мокасины от guess. оригинал из сша"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Новые мокасины от guess. оригинал из сша"
             alt="Новые мокасины от guess. оригинал из сша"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/15991940_310_430"/>
        <noscript>
            <img src="image-thumbs/15991940_310_430" alt="Новые мокасины от guess. оригинал из сша"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Новые мокасины от guess. оригинал из сша
            <span class="b-catalog__details_city">Одесса</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">36</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">Guess</span>

            

            <span class="b-catalog__price">
                    1000
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5657458" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/platya/midi/5657458-stilnoe-plate-kardigan"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5657458"
       title="Стильное платье-кардиган!"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Стильное платье-кардиган!"
             alt="Стильное платье-кардиган!"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/20390793_310_430"/>
        <noscript>
            <img src="image-thumbs/20390793_310_430" alt="Стильное платье-кардиган!"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Стильное платье-кардиган!
            
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">38 / 10 / M</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            

            

            <span class="b-catalog__price">
                    400
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5507253" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/tufli/vysokiy-kabluk/5507253-tufli-na-vypusknoy-lodochki-shpilka-serebryannye"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5507253"
       title="Туфли на выпускной лодочки шпилька серебрянные"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="Туфли на выпускной лодочки шпилька серебрянные"
             alt="Туфли на выпускной лодочки шпилька серебрянные"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/19830905_310_430"/>
        <noscript>
            <img src="image-thumbs/19830905_310_430" alt="Туфли на выпускной лодочки шпилька серебрянные"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Туфли на выпускной лодочки шпилька серебрянные
            <span class="b-catalog__details_city">Одесса</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">38</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">Vitto Rossi</span>

            

            <span class="b-catalog__price">
                    750
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item" id="b-catalog__item-5658043" >
            <a class="b-catalog__link js-ga-onclick "
       href="/women/aksessuary/sumki/s-korotkimi-ruchkami/5658043-new-sumka-ot-vera-pelle-italy-original"
       data-event-action="Open from VIP"
       data-event-category="Open"
       data-event-label=""
       data-id="5658043"
       title="New!!! сумка от vera pelle italy оригинал"><img class="b-catalog__img js-lazy-img"
             src="img/image-placeholder.png"
             title="New!!! сумка от vera pelle italy оригинал"
             alt="New!!! сумка от vera pelle italy оригинал"

             data-placeholder="img/image-placeholder.png"
             data-src="image-thumbs/20392927_310_430"/>
        <noscript>
            <img src="image-thumbs/20392927_310_430" alt="New!!! сумка от vera pelle italy оригинал"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            New!!! сумка от vera pelle italy оригинал
            <span class="b-catalog__details_city">Ковель</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted">
            <span class="b-catalog__name">Vera Pelle</span>

            

            <span class="b-catalog__price">
                    655
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li></ul>

<div class="b-block__promo">
    Реклама в Шафе. <a href="/page/kak-prodvinut-svoe-obyavlenie">Как сюда попасть?</a>
</div>
        </div>
    </div>

    <div class="b-section">
        <div class="b-section__container">
            <div class="b-section__bottom-indent">
                <h2 class="b-title b-block">ПОПУЛЯРНЫЕ РУБРИКИ</h2>
                <div class="b-index-categories">
                    <div class="b-index-categories__row">
                        <div class="b-index-categories__block">
                                <div class="b-block">
                                    <svg class="b-index-categories__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweater"></use>
                                    </svg>
                                    <h3 class="b-index-categories__title">Кофты</h3>
                                </div>
                                <ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/reglany-zhenskie.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/reglany-zhenskie.xhtml">
                                           Регланы
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/svitshoty.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/svitshoty.xhtml">
                                           Свитшоты
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/tolstovki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/tolstovki.xhtml">
                                           Толстовки
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/poncho-nakidka.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/poncho-nakidka.xhtml">
                                           Пончо
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/pulovery.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/pulovery.xhtml">
                                           Пуловеры
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/vodolazki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/vodolazki.xhtml">
                                           Водолазки
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/olimpiyki-zhenskie.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/olimpiyki-zhenskie.xhtml">
                                           Олимпийки
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/golf-zhenskiy.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/golf-zhenskiy.xhtml">
                                           Гольфы
                                        </a>
                                    </li>
                                </ul>
                            </div><div class="b-index-categories__block">
                                <div class="b-block">
                                    <svg class="b-index-categories__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shoes"></use>
                                    </svg>
                                    <h3 class="b-index-categories__title">Туфли</h3>
                                </div>
                                <ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/klassicheskie-tufli.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/klassicheskie-tufli.xhtml">
                                           Классика
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/mokasiny.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/mokasiny.xhtml">
                                           Мокасины
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/oksfordy.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/oksfordy.xhtml">
                                           Оксфорды
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/tufli-s-otkrytym-noskom.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/tufli-s-otkrytym-noskom.xhtml">
                                           Открытые
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/tufli-lodochki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/tufli-lodochki.xhtml">
                                           Лодочки
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/espadrili.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/espadrili.xhtml">
                                           Эспадрильи
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/baletki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/baletki.xhtml">
                                           Балетки
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/svadebnye-tufli.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/svadebnye-tufli.xhtml">
                                           Свадебные
                                        </a>
                                    </li>
                                </ul>
                            </div><div class="b-index-categories__block">
                                <div class="b-block">
                                    <svg class="b-index-categories__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--dress"></use>
                                    </svg>
                                    <h3 class="b-index-categories__title">Платья</h3>
                                </div>
                                <ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/koktyaylnye-platya.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/koktyaylnye-platya.xhtml">
                                           Коктейльные
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/platya-byuste.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/platya-byuste.xhtml">
                                           Бюстье
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/teplye-platya.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/teplye-platya.xhtml">
                                           Теплые
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/vyazanye-platya.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/vyazanye-platya.xhtml">
                                           Вязаные
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/sarafany-letnie.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/sarafany-letnie.xhtml">
                                           Сарафаны
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/platya-futlyar.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/platya-futlyar.xhtml">
                                           Футляр
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/platya-tuniki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/platya-tuniki.xhtml">
                                           Туника
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/vechernie-platya.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/vechernie-platya.xhtml">
                                           Вечерние
                                        </a>
                                    </li>
                                </ul>
                            </div><div class="b-index-categories__block">
                                <div class="b-block">
                                    <svg class="b-index-categories__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--t-shirt"></use>
                                    </svg>
                                    <h3 class="b-index-categories__title">Футболки</h3>
                                </div>
                                <ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/futbolki-polo.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/futbolki-polo.xhtml">
                                           Поло
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/tenniski.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/tenniski.xhtml">
                                           Тенниски
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/sportivnye-futbolki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/sportivnye-futbolki.xhtml">
                                           Спортивные
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/futbolki-na-odno-plecho.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/futbolki-na-odno-plecho.xhtml">
                                           На одно плечо
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/futbolki-s-kapyushonom.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/futbolki-s-kapyushonom.xhtml">
                                           С капюшоном
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/futbolki-s-printom.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/futbolki-s-printom.xhtml">
                                           С принтами
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/futbolki-s-vyshivkoy.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/futbolki-s-vyshivkoy.xhtml">
                                           С вышивкой
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/futbolki-s-nadpisyami.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/futbolki-s-nadpisyami.xhtml">
                                           С надписями
                                        </a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                    <div class="b-index-categories__collapse" id="categories-collapse">
                        <button class="b-button-bordered b-button-bordered_theme_gray js-collapse" type="button" data-target-id="additional-categories" data-toggle-classname="b-index-categories__row_state_collapsed" data-source-id="categories-collapse">Еще рубрики</button>
                    </div>
                    <div class="b-index-categories__row b-index-categories__row_state_collapsed" id="additional-categories">
                        <div class="b-index-categories__block">
                                <div class="b-block">
                                    <svg class="b-index-categories__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sneakers"></use>
                                    </svg>
                                    <h3 class="b-index-categories__title">Кроссовки</h3>
                                </div>
                                <ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/zamshevye-krossovki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/zamshevye-krossovki.xhtml">
                                           Замшевые
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/kozhanye-krossovki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/kozhanye-krossovki.xhtml">
                                           Кожаные
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/krossovki-dlya-fitnesa.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/krossovki-dlya-fitnesa.xhtml">
                                           Для фитнеса
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/krossovki-dlya-bega.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/krossovki-dlya-bega.xhtml">
                                           Для бега
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/snikersy.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/snikersy.xhtml">
                                           Сникерсы
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/sportivnye-krossovki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/sportivnye-krossovki.xhtml">
                                           Спортивные
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/dyshashie-krossovki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/dyshashie-krossovki.xhtml">
                                           Дышащие
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/vysokie-krossovki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/vysokie-krossovki.xhtml">
                                           Высокие
                                        </a>
                                    </li>
                                </ul>
                            </div><div class="b-index-categories__block">
                                <div class="b-block">
                                    <svg class="b-index-categories__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sandals"></use>
                                    </svg>
                                    <h3 class="b-index-categories__title">Босоножки и шлепанцы</h3>
                                </div>
                                <ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/sandalii.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/sandalii.xhtml">
                                           Сандалии
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/zhenskie-sabo.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/zhenskie-sabo.xhtml">
                                           Сабо
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/tapochki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/tapochki.xhtml">
                                           Тапочки
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/kroksy.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/kroksy.xhtml">
                                           Кроксы
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/shlepancy-zhenskie.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/shlepancy-zhenskie.xhtml">
                                           Шлепанцы
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/bosonozhki-na-shpilke.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/bosonozhki-na-shpilke.xhtml">
                                           На шпильке
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/bosonozhki-gladiatory.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/bosonozhki-gladiatory.xhtml">
                                           Гладиаторы
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/vetnamki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/vetnamki.xhtml">
                                           Вьетнамки
                                        </a>
                                    </li>
                                </ul>
                            </div><div class="b-index-categories__block">
                                <div class="b-block">
                                    <svg class="b-index-categories__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--pants"></use>
                                    </svg>
                                    <h3 class="b-index-categories__title">Джинсы</h3>
                                </div>
                                <ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/dzhinsy-pryamye.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/dzhinsy-pryamye.xhtml">
                                           Прямые
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/dzhinsy-skinni.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/dzhinsy-skinni.xhtml">
                                           Скинни
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/dzhinsy-boyfrendy.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/dzhinsy-boyfrendy.xhtml">
                                           Бойфренды
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/vysokie-dzhinsy-s-vysokoy-taliyay.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/vysokie-dzhinsy-s-vysokoy-taliyay.xhtml">
                                           Высокие
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/uzkie-dzhinsy.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/uzkie-dzhinsy.xhtml">
                                           Узкие
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/rvanye-dzhinsy.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/rvanye-dzhinsy.xhtml">
                                           Рваные
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/dzhinsy-s-dyrkami.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/dzhinsy-s-dyrkami.xhtml">
                                           С дырками
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/dzhegginsy.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/dzhegginsy.xhtml">
                                           Джеггинсы
                                        </a>
                                    </li>
                                </ul>
                            </div><div class="b-index-categories__block">
                                <div class="b-block">
                                    <svg class="b-index-categories__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="sprites/defs/svg/sprite.defs.svg?v=4#static--svg--bag"></use>
                                    </svg>
                                    <h3 class="b-index-categories__title">Сумки</h3>
                                </div>
                                <ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/sumki-cherez-plecho.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/sumki-cherez-plecho.xhtml">
                                           Через плечо
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/kosmetichki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/kosmetichki.xhtml">
                                           Косметички
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/malenkie-sumochki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/malenkie-sumochki.xhtml">
                                           Маленькие
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/sumki-bananki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/sumki-bananki.xhtml">
                                           Бананки
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/sportivnye-sumki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/sportivnye-sumki.xhtml">
                                           Спортивные
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/sumki-kross-bodi.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/sumki-kross-bodi.xhtml">
                                           Кросс боди
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/dorozhnye-sumki.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/dorozhnye-sumki.xhtml">
                                           Дорожные
                                        </a>
                                    </li>
                                </ul><ul class="b-index-categories__list">
                                    <li class="b-index-categories__list_item">
                                        <a href="/sumki-shopper.xhtml"   class="js-ga-onclick"
                                           data-event-category="Catalog"
                                           data-event-action="Open from home"
                                           data-event-label="/sumki-shopper.xhtml">
                                           Шоппер
                                        </a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="b-section b-section_bg_brands">
        <div class="b-section__container">
            <div class="b-section__vertical-indent">
                <div class="b-block">
                    <a class="b-block__button b-button-bordered b-button-bordered_icon_arrow" href="/brands">Все бренды</a>
                    <h2 class="b-title">ВЫБИРАЙ ПО БРЕНДАМ</h2>
                </div>
                <ul class="b-brands">
                    <li class="b-brands__item">
                            <a href="/women/brand-reserved" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0031_reserved.png" alt="Reserved"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-tommy-hilfiger" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0042_tommy_hilfiger.png" alt="Tommy Hilfiger"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-stradivarius" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0034_stradivarius.png" alt="Stradivarius"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-victorias-secret" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0039_vs.png" alt="Victoria&#39;s Secret"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-dorothy-perkins" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0014_dorothy_perkins.png" alt="Dorothy Perkins"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-next" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0026_next.png" alt="Next"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-george" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0019_george.png" alt="George"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-terranova" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0036_terranova.png" alt="Terranova"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-centro" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0009_centro.png" alt="Centro"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-zara" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0041_zara.png" alt="ZARA"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-other-stories" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0000_otherstories.png" alt="&amp; Other Stories"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-asos" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0005_asos.png" alt="ASOS"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-atmosphere" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0006_atmosphere_9LIVnGs.png" alt="Atmosphere"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-amisu" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0004_amisu.png" alt="AMISU"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-denim-co" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0013_denim_co.png" alt="Denim Co"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-mango" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0023_mango.png" alt="Mango"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-ff" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0016_fnf.png" alt="F&amp;F"/>
                            </a>
                        </li><li class="b-brands__item">
                            <a href="/women/brand-only" class="b-brands__link">
                                <img class="b-brands__img" src="uploads/brands/brand_0028_only.png" alt="ONLY"/>
                            </a>
                        </li>
                </ul>
                <div class="b-block">
                    <div class="b-block__centering" id="brands-collapse">
                        <a href="#" class="b-link b-link__indented js-collapse" data-target-id="additional-brands" data-toggle-classname="b-hidden" data-source-id="brands-collapse">Еще бренды</a>
                    </div>
                    <div class="b-hidden" id="additional-brands">
                        <ul class="b-brands b-block">
                            <li class="b-brands__item">
                                    <a href="/women/brand-vero-moda" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0038_vero_moda.png" alt="Vero Moda"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-tally-weijl" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0035_tally_w.png" alt="Tally Weijl"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-kira-plastinina" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0022_kira_plastinina.png" alt="Kira Plastinina"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-hm" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0021_hm.png" alt="H&amp;M"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-new-look" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0025_new_look.png" alt="New Look"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-marks-spencer" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0024_ms.png" alt="Marks &amp; Spencer"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-colins" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0010_colins.png" alt="Colin&#39;s"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-cos" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0012_cos.png" alt="COS"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-topshop" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0037_topshop.png" alt="Topshop"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-esprit" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0015_esprit.png" alt="Esprit"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-forever-21" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0017_forever21_7fpcjTf.png" alt="Forever 21"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-oodji" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0029_oodji.png" alt="Oodji"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-papaya" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0030_papaya.png" alt="Papaya"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-river-island" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0032_ri.png" alt="River Island"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-adidas" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0001_adidas.png" alt="Adidas"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-bershka" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0007_bershka.png" alt="Bershka"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-gloria-jeans" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0020_gloria_jeans.png" alt="Gloria Jeans"/>
                                    </a>
                                </li><li class="b-brands__item">
                                    <a href="/women/brand-nike" class="b-brands__link">
                                        <img class="b-brands__img" src="uploads/brands/brand_0027_nike.png" alt="Nike"/>
                                    </a>
                                </li>
                        </ul>
                        <a class="b-block__button b-button-bordered b-button-bordered_icon_arrow" href="/brands">Все бренды</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="b-section b-section_bg_pattern b-noselect">
        <div class="b-section__container">
            <div class="b-section__vertical-indent">
                <h2 class="b-title b-block">О НАШЕМ СЕРВИСЕ</h2>
                <div class="b-block">
                    <div class="b-column-text b-columns b-columns_max-columns_2">
                        <div class="b-columns__item">
                            <h3 class="b-columns__title b-title b-title_theme_italic">Мы знаем, как недорого покупать женскую одежду</h3>
                            Интернет магазины в своих каталогах предлагают широкий ассортимент на любой вкус и кошелек. Почему же мы рекомендуем тебе остановить свой выбор на Шафе?
                        </div>
                        <img src="img/clothes.png" class="b-column-text__img" alt=""/>
                    </div>
                    <ul class="b-columns b-columns_max-columns_3 b-columns_type_enumerated">
                        <li class="b-columns__item" data-column-number="1">
                            Только у нас модная женская одежда продается непосредственно хозяйкой, с которой ты сможешь договориться о цене и доставке в любой город Украины.
                        </li><li class="b-columns__item" data-column-number="2">
                            Десятки тысяч единиц красивой женской одежды, обуви и аксессуаров размещены в нашем каталоге. Где еще ты найдешь такой выбор?
                        </li><li class="b-columns__item" data-column-number="3">
                            У нас часто можно найти отличную <a href="/brands">брендовую вещь</a>, которая продается в полцены.
                        </li>
                    </ul>
                </div>
                <div class="b-index-about b-block">
                    <h3 class="b-columns__title b-title b-title_theme_italic">Как купить недорого классную вещь в Шафе</h3>
                    <p class="b-index-about__paragraph">
                        1. Найдите в каталоге нужный раздел или вбейте свой запрос в строке поиска.</br>
                        2. Выбирайте подходящую вещь по фото. Когда вы наведете на него курсор, то увидите краткое описание. А на страничке товара вы найдете подробное описание и дополнительные фотографии.</br>
                        3. Все подходит? Жмите кнопку &laquo;Хочу&raquo;! Есть вопрос к продавцу? Задайте его тут же, на страничке товара. Не стесняйтесь попросить точные замеры, уточнить состояние или попросить фото лучшего качества.</br>
                        4. Договоритесь про способ оплаты и о доставке в личной переписке с продавцом. А может стоит поторговаться или предложить обмен? Выбор за вами.</br>
                        Вы хотите купить женскую одежду в Украине онлайн? Зачем переплачивать в интернет магазинах, если у нас вас ждет недорогая стильная одежда!</br>
                        Распродажа в сезон - только у нас. Зарегистрируйтесь, чтобы быть в курсе модных новинок и лучших Шаф наших пользователей.
                    </p>
                </div>

                <div class="b-index-about b-block">
                    <h3 class="b-columns__title b-title b-title_theme_italic">Хотите продать свои вещи? Проще простого!</h3>

                    <p class="b-index-about__paragraph">Если вы уже давно искали, где можно продать свои бу вещи, то вы в самом правильном месте. Теперь вы не ограничены своим городом - будь то Харьков, Одесса или Киев. На нашем сайте ежедневно тысячи покупателей готовы приобрести хорошие вещи по разумным ценам.</p>
                    <p class="b-index-about__paragraph">Теперь вам не нужно продавать или покупать женскую одежду во Вконтакте, или на OLX(Сландо) или на других неспециализированных площадках. Попробуйте Шафу, вам понравится!</p>
                    <p class="b-index-about__paragraph">Никогда еще не продавали в интернете? Мы поможем. Шафа, в отличие от других площадок, была создана для девушек, которые распродают свой гардероб и делают это впервые. Почитайте наше руководство &laquo;<a href="http://blog.fontez.com/5-veshhey-kotoryie-nado-znat-pered-tem-kak-prodavat-odezhdu-v-internete/">Как продавать одежду в интернете</a>&raquo; и смело размещайте залежавшиеся вещи.</p>
                </div>

                <div class="b-index-about b-block">
                    <h3 class="b-columns__title b-title b-title_theme_italic">Модная женская одежда в вашем городе</h3>

                    <p class="b-index-about__paragraph">Вы можете найти продавцов отличной женской одежды в вашем городе:</p>

                    <ul class="b-index-about__cities">
                        <li>в <a href="/women/gorod-dnepropetrovsk">Днепропетровске</a></li>
                        <li>в <a href="/women/gorod-odessa">Одессе</a></li>
                        <li>в <a href="/women/gorod-harkov">Харькове</a></li>
                        <li>во <a href="/women/gorod-lvov">Львове</a></li>
                        <li>в <a href="/women/gorod-zaporozhe">Запорожье</a></li>
                        <li>в <a href="/women">Киеве</a></li>
                        <li>в <a href="/women/gorod-krivoy-rog">Кривом Роге</a></li>
                        <li>в <a href="/women/gorod-nikolaev">Николаеве</a></li>
                        <li>в <a href="/women/gorod-vinnica">Виннице</a></li>
                        <li>в <a href="/women/gorod-zhitomir">Житомире</a></li>
                        <li>в <a href="/women/gorod-chernigov">Чернигове</a></li>
                        <li>в <a href="/women/gorod-sumy">Сумах</a></li>
                        <li>в <a href="/women/gorod-poltava">Полтаве</a></li>
                        <li>в <a href="/women/gorod-rovno">Ровно</a></li>
                        <li>в <a href="/women/gorod-cherkassy">Черкассах</a></li>
                        <li>в <a href="/women/gorod-hmelnickiy">Хмельницком</a></li>
                        <li>в <a href="/women/gorod-kirovograd">Кировограде</a></li>
                        <li>в <a href="/women/gorod-mariupol">Мариуполе</a></li>
                        <li>в <a href="/women/gorod-ternopol">Тернополе</a></li>
                        <li>в <a href="/women/gorod-herson">Херсоне</a></li>
                    </ul>
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

    </div>

<script>
    window.staticUrl = '<?php echo $this->themeCss; ?>/assets/';
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
</script>


<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>/assets/build/global.js"></script>






<script>
    
</script>



	    <?php 
        // Пордключаем пакеты
//**        $cs = Yii::app()->clientScript;
//        foreach($this->includePackages as $package)
//            $cs->registerPackage($package);
        // Инициируем переменные JS
//        if ($this->jsVars) {
//            echo "<script type=\"text/javascript\">\n";
//            foreach($this->jsVars as $name=>$value)
//                echo (strpos($name,'[')===false?'var ':'    '). "$name = $value;\n";
//            echo "</script>\n";
//        }
//		Yii::app()->getClientScript()->registerPackage('fancyBox');
//        echo Setting::getParam("google_analytics");
        ?>


	<?php
	// echo $this->renderPartial('//layouts/modals'); 
	?>

  </body>

</html>
<?php // $this->endCache(); } ?>