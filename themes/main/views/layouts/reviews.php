<?php
$cs=Yii::app()->clientScript;
$cs->scriptMap=array(
    'jquery.js'=>false,
//    'jquery.ui.js' => false,
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

<?php
	if (Yii::app()->user->isGuest){
		echo $this->renderPartial('//layouts/header');
	} else {
		echo $this->renderPartial('//layouts/header_logged');
	}
?>
    
<script>
var OLD_JQUERY = jQuery.noConflict();
</script>


<div class="b-section">
        <div class="b-section__container">
            <div class="b-main b-main_state_inverse">
                <div class="b-block">
                    <h1 class="b-title">Отзывы обо мне</h1>
                </div>
                <div class="b-tabs">
                    <button class="b-tabs__button js-tabs_button">
                        Отзывы обо мне 0
                        
                        <svg  class="b-tabs__arrow">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"></use>
                        </svg>
                    </button>
                    <ul class="b-tabs__list" data-classactive="b-tabs__list_state_opened" data-item-classactive="b-tabs__item_state_active">
                        <li class="b-tabs__item b-tabs__item_state_active">
                            <a class="b-tabs__link" href="/my/reviews">
                                Отзывы обо мне
                                <sup class="b-tabs__counter">0</sup>
                            </a>
                        </li>
                        <li class="b-tabs__item ">
                            <a class="b-tabs__link" href="/my/reviewrequests">
                                Запросы на отзыв
                                <sup class="b-tabs__counter">0</sup>
                            </a>
                        </li>
                        <li class="b-tabs__item b-tabs__item_pos_right">
                            <a class="b-tabs__link" href="/page/otzyvy-v-shafe">
                                Как работают отзывы?
                            </a>
                        </li>
                    </ul>
                </div>
                
    
    <div class="b-main__content">
        <div class="b-main__inner">
            <div class="b-main__block">
                <div class="b-feedback b-block">
        
    </div>
            </div>
        </div>
    </div>
    

            </div>
        </div>
    </div>

    <div class="b-section b-section_bg_footer">
        <footer class="b-section__container">
            <div class="b-footer b-section__vertical-indent">
    <div class="b-footer-info">
        <p class="b-footer-info__copyright">© 2018 <a href="https://modnekublo.com.ua/" class="b-footer-info__link">Modnekublo.com.ua</a>
            <span class="b-footer-info__text">Модная женская одежда и аксессуары по доступной цене. Все права защищены</span>
        </p>
        <ul class="b-footer-info__list b-footer-list">
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" href="/page/kak-eto-rabotaet">Как это работает?</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" href="/privacy-policy">Privacy policy</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" href="/terms-of-service">Договор-оферта</a>
            </li>
<!--            
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" rel="nofollow" href="https://plus.google.com/">Мы в Google+</a>
            </li>
            -->
        </ul>
    </div>
</div>
        </footer>
    </div>

<script>
    window.staticUrl = '<?php echo $this->themeCss; ?>/assets/';
    window.spriteUrl = '<?php echo $this->themeCss; ?>/sprites/defs/svg/sprite.defs.svg?v=4';
</script>


<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>



</body>
</html>
