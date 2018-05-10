<?php // if($this->beginCache($id, array('duration'=>3600))) { ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Мои вещи | Шафа</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
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




    <div class="b-auth">
        <div class="b-auth__wrapper">
            <a href="/">
                <div class="b-auth__logo">
                    <svg class="b-auth__logo-image">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shafa-logo-registration"></use>
                    </svg>
                    <svg class="b-auth__logo-shadow">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shafa-logo-registration"></use>
                    </svg>
                </div>
            </a>
            
    <div class="b-auth__form">
        
            
                <h1 class="b-auth__title">Вход | Регистрация</h1>
                <div class="b-auth__form-row">
                    Чтобы зарегистрироваться в <?php echo Yii::app()->getBaseUrl(true); ?>, просто войдите через свой любимый аккаунт в соцсети
                </div>
            

            <div class="b-auth__form-row" style="display: none;">
                <a  class="b-auth__button b-button b-button_fs_18 b-button_fw_normal b-button_bg_vk js-ga-onclick"
                    href="/login/vk-oauth2/?next=%2F"
                    data-event-action="Registration/Login click"
                    data-event-category="Activities"
                    data-event-label="Registration/Login page click"
                    data-details="1"
                    data-ref-url=""
                    data-alt-reg="true">
                        Войти через Вконтакте</a>
            </div>

            <div class="b-auth__form-row">
                
                
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>


<div id="status">
</div>
        <script>
              window.fbAsyncInit = function() {
                FB.init({
                  appId      : '741607065872333',
                  xfbml      : true,
                  version    : 'v2.9'
              });
               FB.AppEvents.logPageView();
              };

              (function(d, s, id){
                 var js, fjs = d.getElementsByTagName(s)[0];
                 if (d.getElementById(id)) {return;}
                 js = d.createElement(s); js.id = id;
                 js.src = "//connect.facebook.net/en_US/sdk.js";
                 fjs.parentNode.insertBefore(js, fjs);
               }(document, 'script', 'facebook-jssdk'));
        </script>
<!-- <a href="#" class="login_fb" onclick="fb_login('741607065872333')" style="display:block;">Login with facebook</a> -->
<a href="#" class="login_fb" onclick="fb_login('741607065872333')" style="display:none;">Sign up with facebook</a>

<script type="text/javascript">
function fb_login(fb_id)
{   
    if(fb_id != "")
    {
         
        FB.init({
              appId      : fb_id,                        // App ID from the app dashboard
              status     : true, 
              cookie     : true,                                // Check Facebook Login status
              xfbml      : true,                                  // Look for social plugins on the page
              version    : 'v2.9'
            });
         FB.login(function(response) {
                 if (response.authResponse) {
                     FB.api('/me?fields=email,name,gender,first_name,last_name,birthday', function(response) {
                         console.log(response);
                       
                        sociallogin(response);
                     });
                   } 
         }, {scope: 'public_profile,email,user_likes,user_birthday,user_location,user_about_me'});
    }
}
 
// make an ajax call to authenticate 
function sociallogin(response)
{
    var url=<?php echo Yii::app()->baseUrl; ?>+'/site/fblogin/';
/*    $.post(url, response, function(output) 
    {
		console.log(output);
        var data=JSON.parse(output);
        if(data.status=='register')
            window.location.href = data.redirect; //
        else if(data.status=='login')
            window.location.href = data.redirect;
        else
            displayflash('error','some error to process your request'); 
    });*/
	$.post('<?php echo Yii::app()->getBaseUrl(true) ?>/site/fblogin/', {status:'login',userData: JSON.stringify(response)}, function(data){ return true; });
}
</script>

<?php
if (Yii::app()->user->isGuest){
            echo    '<a href="/login"
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
            <a class="b-login-button" href="/login">Вход<?php /*echo Yii::app()->user->getId();*/ var_dump(Yii::app()->user->gender); ?></a>';
}
?>

			<?php
			if (!Yii::app()->user->isGuest){
				echo print_r(Yii::app()->user->id,true);
				echo print_r(Yii::app()->user->name,true);
				//echo print_r(Yii::app()->user->gender,true);
				//echo Yii::app()->user->getState('gender');
				echo '<a class="b-login-button" href="';
				echo Yii::app()->createAbsoluteUrl('site/logout');
				echo '" style="display:block;">Выйти</a>';
			}
			?>
			</div>
                <!-- href="https://www.facebook.com/v2.9/dialog/oauth?client_id=741607065872333&redirect_uri=http://shafa.novikov.loc" -->
                <a  class="login_fb b-auth__button b-button b-button_fs_18 b-button_fw_normal b-button_bg_fb js-ga-onclick"
                    href="#"
                    onclick="fb_login('741607065872333')"
                    data-event-action="Registration/Login click"
                    data-event-category="Activities"
                    data-event-label="Registration/Login page click"
                    data-details="1"
                    data-ref-url=""
                    data-alt-reg="true">
                        Войти через Facebook</a>
                <!--
                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>

<div id="status">
</div>
                -->
            </div>

            <br><p>Для зарегистрированных пользователей</p><br>
            <div class="b-auth__form-row">
                <a  class="b-auth__button b-button b-button_fs_18 b-button_fw_normal b-button_bg_gray"
                    href="users/login/">Войти через логин и пароль</a>
            </div>
        
    </div>

        </div>
    </div>


<script>
    window.staticUrl = '<?php echo $this->themeCss; ?>assets/';
    window.spriteUrl = '<?php echo $this->themeCss; ?>assets/sprites/defs/svg/sprite.defs.svg';
</script>


<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>


</body>
</html>