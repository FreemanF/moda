<?php
$cs=Yii::app()->clientScript;
$cs->scriptMap=array(
    'jquery.js'=>false,
    'jquery.ui.js' => false,
    'jquery' => false,
//    'jquery.min.js' => false,
);
?>

<?php // Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php // Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php // Yii::app()->clientscript->scriptMap['jquery'] = $jquery; ?>
<?php $jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'; ?>
<?php //Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php //Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php //Yii::app()->clientscript->scriptMap['jquery'] = $jquery; ?>
<?php
    //Yii::app()->clientscript->coreScriptPosition = CClientScript::POS_HEAD;
?>
<?php
// if($this->beginCache($id, array('duration'=>3600))) {
?>
<?php
	if (Yii::app()->user->isGuest){
		echo $this->renderPartial('//layouts/header');
	} else {
		echo $this->renderPartial('//layouts/header_logged');
	}
?>
    


    
    
    <div class="b-section">
        <div class="b-section__container">
            <div class="b-index-header">
                <!--
                <div class="b-index-header__info">
                    <div class="b-index-header__info_container">
                        <h1 class="b-index-header__info_title">
                            Брендовая женская одежда</br>со скидками до 90%
                        </h1>
                        <p class="b-index-header__info_text">
                            <span class="b-index-header__info_counter">
							<?php
								$tov_count = Product::model()->count(array());
								echo $tov_count;
							?>
							</span>
                            позиции в продаже
                        </p>
                    </div>
                    <a href="/login"
                       class="b-button-bordered b-index-header__info_button js-ga-onclick"
                       data-event-action="Click from home"
                       data-event-category="User">Зарегистрироваться</a>
                </div>
                -->
                <ul class="bxslider">
                    <li><img src="<?php echo $this->themeCss; ?>assets/img/index_banner_green.jpg" /></li>
                    <li><img src="<?php echo $this->themeCss; ?>assets/img/index_banner_green.jpg" /></li>
                    <li><img src="<?php echo $this->themeCss; ?>assets/img/index_banner_green.jpg" /></li>
                    <li><img src="<?php echo $this->themeCss; ?>assets/img/index_banner_green.jpg" /></li>
                </ul>
            </div>
			<div class="b-block__promo">
			Здесь может быть размещена Ваша реклама. <a href="/page/kak-prodvinut-svoe-obyavlenie">Как сюда попасть?</a>
			</div>
        </div>
    </div>

    <div class="b-section">
        <div class="b-section__container">
            <h2>VIP-Объявления</h2>
                

<ul class="b-catalog b-catalog_max-columns_5">

<?php $this->mainVips(); ?>

</ul>

        </div>
    </div>
<!--
    <div class="b-section">
        <div class="b-section__container">
            <div class="b-section__bottom-indent">
                <h2 class="b-title b-block">ПОПУЛЯРНЫЕ РУБРИКИ</h2>
                <div class="b-index-categories">
                    <div class="b-index-categories__row">
                        <?php // $this->showTopCategoriesMain(); ?>
						
                    </div>
					
                    <div class="b-index-categories__collapse" id="categories-collapse">
                        <button class="b-button-bordered b-button-bordered_theme_gray js-collapse" type="button" data-target-id="additional-categories" data-toggle-classname="b-index-categories__row_state_collapsed" data-source-id="categories-collapse">Еще рубрики</button>
                    </div>
					

                </div>
            </div>
        </div>
    </div>-->

    <div class="b-section b-section_bg_brands">
        <div class="b-section__container">
            <div class="b-section__vertical-indent">
                <div class="b-block">
                    <a class="b-block__button b-button-bordered b-button-bordered_icon_arrow" href="/brands">Все бренды</a>
                    <h2 class="b-title">ВЫБОР ПО БРЕНДАМ</h2>
                </div>
                <ul class="b-brands">
                    <?php $this->mainBrands(); ?>
                </ul>

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
                            <h3 class="b-columns__title b-title b-title_theme_italic">Недорого покупать брендовую одежду с нами легко!</h3>
                        </div>
                        <img src="<?php echo $this->themeCss; ?>/assets/img/clothes.png" class="b-column-text__img" alt=""/>
                    </div>
                    <ul class="b-columns b-columns_max-columns_3 b-columns_type_enumerated">
                        <li class="b-columns__item" data-column-number="1">
                            Мы предлагаем модную одежду и обувь, которая продается непосредственно хозяйкой. С ней можно договориться о цене, скидках и доставке.
                        </li><li class="b-columns__item" data-column-number="2">
                            У нас можно найти великолепную брендовую вещь,которая продается за половину стоимости, а, если повезет, то и за одну треть цены.
                        </li><li class="b-columns__item" data-column-number="3">
                            Тысячи единиц красивой одежды, обуви и аксессуаров размещены в нашем каталоге. Выбор огромен!
                        </li>
                    </ul>
                </div>
                <div class="b-index-about b-block">
                    <h3 class="b-columns__title b-title b-title_theme_italic">Как продать вещь у нас</h3>
                </div>

                <div class="b-index-about b-block">
                    <h3 class="b-columns__title b-title b-title_theme_italic">Как купить вещь у нас</h3>
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
        <p class="b-footer-info__copyright">&copy; 2018 <a href="/" class="b-footer-info__link">modnekublo.com.ua</a>
            <span class="b-footer-info__text">Модная женская одежда и аксессуары по доступной цене. Все права защищены</span>
        </p>
        <ul class="b-footer-info__list b-footer-list">

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
                   href="#">Мы в Facebook</a>
            </li>
        </ul>
    </div>
</div>
        </footer>
    </div>

<script>
    window.staticUrl = '<?php echo $this->themeCss; ?>assets/';
    window.spriteUrl = '<?php echo $this->themeCss; ?>assets/sprites/defs/svg/sprite.defs.svg?v=4';
</script>


<script  src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script  src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>

<script type="text/javascript" src="<?php echo $this->themeCss; ?>bxslider/jquery.bxslider.min.js"></script>






<script>
    var j = jQuery.noConflict();

    j(document).ready(function(){
    slider = j('.bxslider').bxSlider({
        easing: 'jswing',
        speed: 500,
        autoStart: true
    });
    slider.startAuto();
    });
</script>
    <script>
    jQuery(function($) {
        //$('.dropdown-toggle').dropdown();
//        $(".js-catalog-menu").on("click",function(e){
//            $(".js-catalog-menu").each(function(){
//                $(this).removeClass("b-nav__item_state_opened");
//            });
//        });
    });
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
<?php
 //$this->endCache(); } 
?>