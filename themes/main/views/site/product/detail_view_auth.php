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
            <div class="b-block">
                
                    <!-- /52555387/modnekublo.com.ua_970x90 -->
<div>

</div>
    </div>
            <div class="b-product">
                <div class="b-product__dashboard">
                    
                    <div class="b-block">            

<?php
if ( isset($this->model->media) )
{
    $media_1 = '                <li class="b-product-gallery__additional-item">
                        <a href="'.$this->model->media->getMediaUrl('original').'" class="js-gallery-magnific-item" target="_blank">
                            <img class="b-product-gallery__additional-image"
                                 src="'.$this->model->media->getMediaUrl('original').'"
                                 alt="Montale chypre vanille 100 ml тестер1"
                                 title="Montale chypre vanille 100 ml тестер1"/>
                        </a>
                    </li>';
} else {
    $media_1 = null;
}
if ( isset($this->model->media2) )
{
        $media_2 = '                <li class="b-product-gallery__additional-item">
                        <a href="'.$this->model->media2->getMediaUrl('original').'" class="js-gallery-magnific-item" target="_blank">
                            <img class="b-product-gallery__additional-image"
                                 src="'.$this->model->media2->getMediaUrl('original').'"
                                 alt="Montale chypre vanille 100 ml тестер1"
                                 title="Montale chypre vanille 100 ml тестер1"/>
                        </a>
                    </li>';
} else {
    $media_2 = null;
}
if ( isset($this->model->media3) )
{
        $media_3 = '                <li class="b-product-gallery__additional-item">
                        <a href="'.$this->model->media3->getMediaUrl('original').'" class="js-gallery-magnific-item" target="_blank">
                            <img class="b-product-gallery__additional-image"
                                 src="'.$this->model->media3->getMediaUrl('original').'"
                                 alt="Montale chypre vanille 100 ml тестер1"
                                 title="Montale chypre vanille 100 ml тестер1"/>
                        </a>
                    </li>';
} else {
    $media_3 = null;
}
?>
<div class="b-product__dashboard_section b-product__dashboard_section-left">
    <div class="b-product-gallery b-product-gallery_type_seller">
        <div class="b-product-gallery__additional-images js_frame">
            <ul class="b-product-gallery__additional-list js-gallery-magnific js_slides">
<?php
if ($media_1 !== null){
    echo $media_1;
}
if ($media_2 !== null){
    echo $media_2;
}
if ($media_3 !== null){
    echo $media_3;
}

if ($this->model->pd_main_media == 0)
{
    $mainMedia = $this->model->media;
    if (isset($this->model->media))
    {
    $image_url = $this->model->media->getMediaUrl('original');
    } else {
        $image_url = $this->themeCss.'assets/img/image-placeholder.png';
    }
}
elseif ($this->model->pd_main_media == 1)
{
    $mainMedia = $this->model->media2;
    if (isset($this->model->media2))
    {
    $image_url = $this->model->media2->getMediaUrl('original');
    } else {
        $image_url = $this->themeCss.'assets/img/image-placeholder.png';
    }
}
elseif ($this->model->pd_main_media == 2)
{
    $mainMedia = $this->model->media3;
    if (isset($this->model->media3))
    {
    $image_url = $this->model->media3->getMediaUrl('original');
    } else {
        $image_url = $this->themeCss.'assets/img/image-placeholder.png';
    }
} else {
    $image_url = $this->themeCss.'assets/img/image-placeholder.png';
}
?>
            </ul>
            <div class="b-desktop-only">
                <div class="b-product-gallery__image-wrapper" id="js-main-image">
                    <img class="b-product-gallery__image" src="<?php echo $image_url; ?>" alt="<?php echo $this->model->pd_name; ?>" title="<?php echo $this->model->pd_name; ?>" onerror="this.src='<?php echo $image_url; ?>';"/>
                </div>
            </div>
        </div>

        
    </div>

    <div class="b-product__panel b-product__panel_type_mobile" itemscope="" itemtype="http://schema.org/Product">
            

<meta itemprop="name" content="Эксклюзив. итальянский бренд ронни николь за 500 грн.">
<meta itemprop="url" content="https://modnekublo.com.ua/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol">

<meta itemprop="description" content="ЭКСКЛЮЗИВ. Итальянский Бренд Ронни Николь, указан размер 20, но маломерит. ОГ 118-122, ОТ 100, Об 118-122, длина 105 см. Есть подкладка и она с утягивающим эффектом. Цена 500 грн">

<div class="b-product-price " itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
    <meta itemprop="priceCurrency" content="UAH">
    <meta itemprop="availability" itemtype="http://schema.org/ItemAvailability" content="http://schema.org/InStock">

    
        
        <span class="b-product-price__value" itemprop="price"><?= $this->model->pd_price; ?></span>
        <span class="b-product-price__currency">грн</span>

        
</div>

<div class="b-product__params b-product-params  b-product-params_col_2">
    <div class="b-product-params__item">
        <div class="b-product-params__text"><?php //echo $this->model->size->name; ?></div>
        <div class="b-product-params__title">Размер</div>
    </div>
    <div class="b-product-params__item">
        <div class="b-product-params__text"><?php echo $this->model->pd_state; ?></div>
        <div class="b-product-params__title">Состояние</div>
    </div>
</div>

            <div class="b-product__stats b-product-stats">
    Опубликовано
    <span class="b-new-feature" style="font-size: 8px">New</span>
    <span class="b-product-stats__count">
        31.03.2017
    </span>
</div>





<div class="b-product__button_container js-mark-sold-button">
    <div data-reactroot="">
<!--        <button class="b-button-bordered b-button-bordered_fs_18 b-button-bordered_theme_gray b-button-bordered_theme_transparent b-product__button">Отметить проданным</button>-->
<?php echo CHtml::link('Отметить проданным', '#', array(
'onclick'=>'OLD_JQUERY("#mydialog").dialog("open"); return false;',
'class'=>'b-button-bordered b-button-bordered_fs_18 b-button-bordered_theme_gray b-button-bordered_theme_transparent b-product__button',
'title'=>'Ометить проданным',
));?>
        <!-- react-empty: 3 --><!-- react-empty: 4 -->
    </div>
</div>

<div class="b-product__button_container">
    <div id="res_form">
            <input name="csrfmiddlewaretoken" value="mn8BiKxPEDvwHPZFQP1suk4kn1EljYpGgjOFTbE699B5ufVgozmFrgqS6BI8EOcd" type="hidden">
            <input name="item_id" value="<?php echo $this->model->pdid; ?>" type="hidden">
            <button id="bres" class="b-button-bordered b-button-bordered_fs_18 b-button-bordered_theme_gray b-button-bordered_theme_transparent b-product__button"  onclick="p_res();">
                <?php
                if ($this->model->pd_status == 3){
                    echo 'Снять с резерва';
                } else {
                    echo 'Зарезервировать';
                }
                ?>
            </button>
            
            <script>
function p_res()
{
<?php
    $url = Yii::app()->createUrl("site/reserve/".$this->model->pdid)
?>

OLD_JQUERY.ajax({type: 'post',url:'<?php echo $url; ?>',cache:false,data:{item_id: <?php echo $this->model->pdid; ?>},success:function(html){
        dat=JSON.parse(html);
        OLD_JQUERY("#bres2").html(dat);
        OLD_JQUERY("#bres").html(dat);
    }
    });
//});
//return false;
}

function p_res2()
{
<?php
    $url = Yii::app()->createUrl("site/reserve/".$this->model->pdid)
?>

OLD_JQUERY.ajax({type: 'post',url:'<?php echo $url; ?>',cache:false,data:{item_id: <?php echo $this->model->pdid; ?>},success:function(html){
        dat=JSON.parse(html);
        OLD_JQUERY("#bres2").html(dat);
        OLD_JQUERY("#bres").html(dat);
        if (dat == "Зарезервировать") {
            OLD_JQUERY(".b-product-state__label").text('Активно');
        }
        if (dat == "Снять с резерва") {
            OLD_JQUERY(".b-product-state__label").text('Зарезервировано');
        }
    }
    });
//});
//return false;
}
            </script>

        </div>
    </div>

<div class="b-product__button_container">
        <a class="b-button-bordered b-button-bordered_fs_18 b-button-bordered_theme_gray b-button-bordered_theme_transparent b-product__button js-ga-onclick2" href="/items/4881045/edit" data-event-action="Edit product click" data-event-category="Product" data-event-label="Edit product click on product page">Редактировать</a>
    </div>

<div class="b-product__button_container b-product__button_container-remove-link js-remove-link">
    <div data-reactroot="">
        <a href="#" class="b-warning-link">
            <svg class="b-warning-link__icon">
            <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--trash-o"></use>
            </svg>
            <span class="b-warning-link__text">Удалить</span>
        </a>
    </div>
</div>

<div class="b-product__stats b-product-stats">
    Бесплатных показов
    <span class="b-product-stats__count">0</span>
</div>
<div class="b-product__stats b-product-stats">
    Рекламных показов
    <span class="b-product-stats__count">0</span>
</div>
<div class="b-product__stats b-product-stats">
    Просмотров
    <span class="b-product-stats__count">0</span>
</div>
<div class="b-product__stats b-product-stats">
    Нравится
    <span class="b-product-stats__count">0</span>
</div>
        </div>

    <div class="b-product__social b-social-links b-block_type_small_pad">
        <span class="b-product__social-text">Поделиться:</span>
        <ul class="b-social-links__list">
            <li class="b-social-links__item b-social-links__item-fb">
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://modnekublo.com.ua/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol&amp;title=%D0%AD%D0%BA%D1%81%D0%BA%D0%BB%D1%8E%D0%B7%D0%B8%D0%B2.%20%D0%B8%D1%82%D0%B0%D0%BB%D1%8C%D1%8F%D0%BD%D1%81%D0%BA%D0%B8%D0%B9%20%D0%B1%D1%80%D0%B5%D0%BD%D0%B4%20%D1%80%D0%BE%D0%BD%D0%BD%D0%B8%20%D0%BD%D0%B8%D0%BA%D0%BE%D0%BB%D1%8C%20%D0%B7%D0%B0%20500%20%D0%B3%D1%80%D0%BD." class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="fb" data-action="like" data-url="/">
                    <svg class="b-social-links__icon">
                        <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--fb"></use>
                    </svg>
                </a>
            </li><li class="b-social-links__item b-social-links__item-vk">
                <a href="https://vk.com/share.php?url=https://modnekublo.com.ua/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol&amp;title=%D0%AD%D0%BA%D1%81%D0%BA%D0%BB%D1%8E%D0%B7%D0%B8%D0%B2.%20%D0%B8%D1%82%D0%B0%D0%BB%D1%8C%D1%8F%D0%BD%D1%81%D0%BA%D0%B8%D0%B9%20%D0%B1%D1%80%D0%B5%D0%BD%D0%B4%20%D1%80%D0%BE%D0%BD%D0%BD%D0%B8%20%D0%BD%D0%B8%D0%BA%D0%BE%D0%BB%D1%8C%20%D0%B7%D0%B0%20500%20%D0%B3%D1%80%D0%BD.&amp;image=https://images.shafastatic.net/17515823" class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="vk" data-action="like" data-url="/">
                    <svg class="b-social-links__icon">
                        <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--vk"></use>
                    </svg>
                </a>
            </li><li class="b-social-links__item b-social-links__item-twitter">
                <a href="https://twitter.com/intent/tweet/?text=%D0%AD%D0%BA%D1%81%D0%BA%D0%BB%D1%8E%D0%B7%D0%B8%D0%B2.%20%D0%B8%D1%82%D0%B0%D0%BB%D1%8C%D1%8F%D0%BD%D1%81%D0%BA%D0%B8%D0%B9%20%D0%B1%D1%80%D0%B5%D0%BD%D0%B4%20%D1%80%D0%BE%D0%BD%D0%BD%D0%B8%20%D0%BD%D0%B8%D0%BA%D0%BE%D0%BB%D1%8C%20%D0%B7%D0%B0%20500%20%D0%B3%D1%80%D0%BD.&amp;url=https://modnekublo.com.ua/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol" class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="twitter" data-action="tweet" data-url="https://shafa.novikov.loc/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol">
                    <svg class="b-social-links__icon">
                        <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--twitter"></use>
                    </svg>
                </a>
            </li><li class="b-social-links__item b-social-links__item-pinterest">
                <a href="https://www.pinterest.com/pin/create/button/?url=https://modnekublo.com.ua/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol&amp;media=https://images.shafastatic.net/17515823&amp;description=%D0%AD%D0%BA%D1%81%D0%BA%D0%BB%D1%8E%D0%B7%D0%B8%D0%B2.%20%D0%B8%D1%82%D0%B0%D0%BB%D1%8C%D1%8F%D0%BD%D1%81%D0%BA%D0%B8%D0%B9%20%D0%B1%D1%80%D0%B5%D0%BD%D0%B4%20%D1%80%D0%BE%D0%BD%D0%BD%D0%B8%20%D0%BD%D0%B8%D0%BA%D0%BE%D0%BB%D1%8C%20%D0%B7%D0%B0%20500%20%D0%B3%D1%80%D0%BD." class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="pinterest" data-action="like" data-url="https://shafa.novikov.loc/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol">
                    <svg class="b-social-links__icon">
                        <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--pinterest"></use>
                    </svg>
                </a>
            </li><li class="b-social-links__item b-social-links__item-google">
                <a href="https://plus.google.com/share?url=https://modnekublo.com.ua/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol" class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="google" data-action="like" data-url="https://shafa.novikov.loc/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol">
                    <svg class="b-social-links__icon">
                        <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--google"></use>
                    </svg>
                </a>
            </li><li class="b-social-links__item b-social-links__item-odnoklassniki">
                <a href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st.comments=%D0%AD%D0%BA%D1%81%D0%BA%D0%BB%D1%8E%D0%B7%D0%B8%D0%B2.%20%D0%B8%D1%82%D0%B0%D0%BB%D1%8C%D1%8F%D0%BD%D1%81%D0%BA%D0%B8%D0%B9%20%D0%B1%D1%80%D0%B5%D0%BD%D0%B4%20%D1%80%D0%BE%D0%BD%D0%BD%D0%B8%20%D0%BD%D0%B8%D0%BA%D0%BE%D0%BB%D1%8C%20%D0%B7%D0%B0%20500%20%D0%B3%D1%80%D0%BD.&amp;st._surl=https://shafa.novikov.loc/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol" class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="odnoklassniki" data-action="like" data-url="https://shafa.novikov.loc/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol">
                    <svg class="b-social-links__icon">
                        <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--odnoklassniki"></use>
                    </svg>
                </a>
            </li>
        </ul>
    </div>

    
</div>
                        <div class="b-product__dashboard_section">
    <h1 class="b-product__title"><?= $this->model->pd_name; ?></h1>
    <div class="b-product-state b-block">
        

        <div class="b-product-state__label b-product-state__label_theme_yellow">
                    <?php echo $this->model->getStatusName($this->model->pd_status); ?>
                </div>
    </div>

    <div class="b-block">
        <div class="b-product__description js-truncated" data-length="700" data-text-class=".b-product__description-text">
            <div class="b-product__description-text">
                <p><?= $this->model->content_long; ?></p>
            </div>
        </div>
    </div>

    <div class="b-product-properties">

        <div class="b-product-properties__row">
            <span class="b-product-properties__title">
                Цвет
            </span>
            <span class="b-product-properties__value">
                <?php echo $this->model->getColorName($this->model->pd_color); ?>
            </span>
        </div>

        

        <div class="b-product-properties__row">
            <span class="b-product-properties__title">
                Размер
            </span>
            <span class="b-product-properties__value">
                <?php
                if (!empty ($this->model->size))
                    echo $this->model->size->name;
                ?>
            </span>
        </div>

        <div class="b-product-properties__row">
            <span class="b-product-properties__title">
                Доставка
            </span>
            <span class="b-product-properties__value">
                <p><?= $this->model->pd_transport; ?></p>
            </span>
        </div>
        
    </div>

</div>
                    </div>
                </div>

                <div class="b-product__sidebar">
    <div class="b-product__panel b-product__panel_type_desktop" itemscope="" itemtype="http://schema.org/Product">
        

<meta itemprop="name" content="Эксклюзив. итальянский бренд ронни николь за 500 грн.">
<meta itemprop="url" content="https://modnekublo.com.ua/women/platya/midi/4881045-eksklyuziv-italyanskiy-brend-ronni-nikol">

<meta itemprop="description" content="ЭКСКЛЮЗИВ. Итальянский Бренд Ронни Николь, указан размер 20, но маломерит. ОГ 118-122, ОТ 100, Об 118-122, длина 105 см. Есть подкладка и она с утягивающим эффектом. Цена 500 грн">

<div class="b-product-price " itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
    <meta itemprop="priceCurrency" content="UAH">
    <meta itemprop="availability" itemtype="http://schema.org/ItemAvailability" content="http://schema.org/InStock">

    
        
        <span class="b-product-price__value" itemprop="price"><?= $this->model->pd_price; ?></span>
        <span class="b-product-price__currency">грн</span>

        
</div>

<div class="b-product__params b-product-params  b-product-params_col_2">
    <div class="b-product-params__item">
        <div class="b-product-params__text">
                <?php
                if (!empty ($this->model->size))
                    echo $this->model->size->name;
                ?></div>
        <div class="b-product-params__title">Размер</div>
    </div>
    <div class="b-product-params__item">
        <div class="b-product-params__text"><?php echo $this->model->getStateName($this->model->pd_state); ?></div>
        <div class="b-product-params__title">Состояние</div>
    </div>
</div>

        <div class="b-desktop-only">
                <div class="b-product__stats b-product-stats">
    Опубликовано
    <span class="b-new-feature" style="font-size: 8px">New</span>
    <span class="b-product-stats__count">
        31.03.2017
    </span>
</div>





<div class="b-product__button_container js-mark-sold-button">
    <div data-reactroot="">
<!--        <button class="b-button-bordered b-button-bordered_fs_18 b-button-bordered_theme_gray b-button-bordered_theme_transparent b-product__button">Отметить проданным</button>-->
        <?php echo CHtml::link('Отметить проданным', '#', array(
        'onclick'=>'OLD_JQUERY("#mydialog").dialog("open"); return false;',
        'class'=>'b-button-bordered b-button-bordered_fs_18 b-button-bordered_theme_gray b-button-bordered_theme_transparent b-product__button',
        'title'=>'Ометить проданным',
        ));?>
    </div>
</div>

<div class="b-product__button_container">
        <div>
            <input name="csrfmiddlewaretoken" value="Q6U2rMzPlnH5yaBsBWwZjIfRplu5GL6cK2A62dG6QTNElAx39GRcgEBp8VyS1BTJ" type="hidden">
            <input name="item_id" value="<?php echo $this->model->pdid; ?>" type="hidden">
            <button id="bres2" class="b-button-bordered b-button-bordered_fs_18 b-button-bordered_theme_gray b-button-bordered_theme_transparent b-product__button" type=""  onclick="p_res2();">
                <?php
                if ($this->model->pd_status == 3){
                    echo 'Снять с резерва';
                } else {
                    echo 'Зарезервировать';
                }
                ?>
            </button>
            <?php
//echo CHtml::ajaxSubmitButton('Обработать', "$url", array(
//    'type' => 'POST',
//    // Результат запроса записываем в элемент, найденный
//    // по CSS-селектору #output.
//    'update' => '#bres',
//),
//array(
//    // Меняем тип элемента на submit, чтобы у пользователей
//    // с отключенным JavaScript всё было хорошо.
//    'type' => 'submit'
//));
?>
        </div>
    </div>

<div class="b-product__button_container">
        <a class="b-button-bordered b-button-bordered_fs_18 b-button-bordered_theme_gray b-button-bordered_theme_transparent b-product__button js-ga-onclick" href="<?php echo $this->createAbsoluteUrl('my/editproduct/'.$this->model->pdid); ?>" data-event-action="Edit product click" data-event-category="Product" data-event-label="Edit product click on product page">Редактировать</a>
    </div>

<div class="b-product__button_container b-product__button_container-remove-link js-remove-link">
    <div data-reactroot=""><a href="#" class="b-warning-link">
            <svg class="b-warning-link__icon">
            <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--trash-o"></use>
            </svg>
            <span class="b-warning-link__text">Удалить</span>
        </a>
        <!-- react-empty: 5 -->
    </div>
</div>

<div class="b-product__stats b-product-stats">
    Бесплатных показов
    <span class="b-product-stats__count">0</span>
</div>
<div class="b-product__stats b-product-stats">
    Рекламных показов
    <span class="b-product-stats__count">0</span>
</div>
<div class="b-product__stats b-product-stats">
    Просмотров
    <span class="b-product-stats__count">0</span>
</div>
<div class="b-product__stats b-product-stats">
    Нравится
    <span class="b-product-stats__count">0</span>
</div>
            </div>
    </div>

    <div class="b-block">
    <!-- /52555387/shafa.novikov.loc_300x250 -->

    </div>

    <div class="b-product__panel">
        <div class="b-product-seller b-block">
            <div class="b-product-seller__title">Продавец</div>
            <a href="https://modnekublo.com.ua/member/anni36" class="b-product-seller__image-wrapper js-ga-onclick2" data-event-action="Member sidebar click" data-event-category="Activities" data-event-label="/member/anni36">
                <img class="b-product-seller__image" src="https://image-thumbs.shafastatic.net/27049689_310_430" alt="anni36" title="anni36">
            </a>
            <div class="b-product-seller__info">
                <a href="https://modnekublo.com.ua/member/anni36" class="b-product-seller__info_title js-ga-onclick2" data-event-action="Member sidebar click" data-event-category="Activities" data-event-label="/member/anni36">
                    anni36
                </a>
                <div class="b-product-seller__info_item">
                        <svg class="b-product-seller__info_icon">
                            <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--location"></use>
                        </svg>
                        Полтава
                    </div>
                <div class="b-product-seller__info_item">
                    <svg class="b-product-seller__info_icon">
                        <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--clock"></use>
                    </svg>
                    Была
                    <time datetime="2017-11-17 10:46:49" title="17.11.2017 10.46.49"><span>только что</span></time>
                </div>
            </div>
        </div>

        

        <div class="b-product__params b-product-params">
            <div class="b-product-params__item">
                <div class="b-product-params__title">Отзывы</div>
            </div>
        </div>

        <div class="b-product-seller__info_item">
            <a href="http://shafa.novikov.loc/member/anni36/reviews?r=p">
                <svg class="b-product-seller__info_icon b-product-seller__info_icon-positive">
                    <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--positive"></use>
                </svg>
                Позитивных: 0
            </a>&nbsp;
            <a href="http://shafa.novikov.loc/member/anni36/reviews?r=n">
                <svg class="b-product-seller__info_icon b-product-seller__info_icon-negative">
                    <use xlink="http://www.w3.org/1999/xlink" xlink:href="http://shafa.novikov.loc/sprites/defs/svg/sprite.defs.svg#static--svg--negative"></use>
                </svg>
                Негативных: 0
            </a>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
    <div class="b-section">
        <div class="b-section__container">


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
<?php
//echo CHtml::link('Отправить заявку на разработку интернет сайта', '#', array(
//'onclick'=>'OLD_JQUERY("#mydialog").dialog("open"); return false;',
//'class'=>'g-button g-button-orange',
//'title'=>'Отправить заявку на разработку интернет сайта',
//));
?>
<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
'id' => 'mydialog',
        'options' => array(
            'title' => 'Отметить проданным',
            'autoOpen' => false,
            'modal' => true,
            'resizable'=> false,
        ),
    ));
    $qForm = new FilterForm; 
    $form = $this->beginWidget('CActiveForm', array(
                'id' => 'quick-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
'htmlOptions'=>array(
         'class'=>'form',
),
                'action' => array('site/quick'), // когда форма показывается и в других контроллерах, не только 'site', то я в каждый из этих контроллеров вставил actionQuick, a здесь указал — array('quick'); почему-то не получается с array('//site/quick')
            ));
    ?>
        <?php // echo $form->errorSummary($qForm); ?>
<?php
$users = array();
$dialogues = Dialogs::model()->findAllByAttributes(array('dl_product'=>$this->model->pdid));
if (!empty($dialogues)){
    foreach ($dialogues as $dialogs => $dlg_one){
        $user_id = Users::model()->findByPk($dlg_one->dl_user);
        array_push($users, array('id'=>$user_id->usid,'name'=>$user_id->us_name));
    }
}
//echo var_dump($users);
//Yii::app()->end();
?>
            <?php echo $form->dropDownList($qForm,'user_id', CHtml::listData($users,'id','name')); ?>
            <?php echo $form->hiddenField($qForm, 'prod_id', array('value'=>$this->model->pdid)); ?>
            <?php // echo $form->labelEx($qForm,'name'); ?>
            <?php // echo $form->textField($qForm,'name', array('size'=>30)); ?>
            <?php // echo $form->error($qForm,'name'); ?>

<?php // echo $form->labelEx($qForm,'email'); ?>
            <?php // echo $form->textField($qForm,'email', array('size'=>30)); ?>
            <?php // echo $form->error($qForm,'email'); ?>

            <?php // echo $form->labelEx($qForm,'phone'); ?>
            <?php // echo $form->textField($qForm,'phone', array('size'=>30)); ?>
            <?php // echo $form->error($qForm,'phone'); ?>

<?php // echo $form->labelEx($qForm,'message'); ?>
<?php // echo $form->textArea($qForm,'message',array('rows'=>6, 'cols'=>31)); ?>
<?php // echo $form->error($qForm,'message'); ?>

            <?php echo CHtml::submitButton('Отправить'); ?>

    <?php $this->endWidget();
    $this->endWidget('zii.widgets.jui.CJuiDialog');

    ?>


<script>
    window.staticUrl = '<?php echo $this->themeCss; ?>/assets/';
    window.spriteUrl = '<?php echo $this->themeCss; ?>/sprites/defs/svg/sprite.defs.svg?v=4';
</script>

<script>
OLD_JQUERY(function($) {
    $('#mydialog').dialog({'title':'Отметить проданным','autoOpen':false,'modal':true,'resizable':false});
//    $('#quick-form').yiiactiveform({'validateOnSubmit':true,'attributes':[{'id':'FilterForm_name','inputID':'FilterForm_name','errorID':'FilterForm_name_em_','model':'FilterForm','name':'name','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {
//
//    if($.trim(value)=='') {
//            messages.push("\u041d\u0435\u043e\u0431\u0445\u043e\u0434\u0438\u043c\u043e \u0437\u0430\u043f\u043e\u043b\u043d\u0438\u0442\u044c \u043f\u043e\u043b\u0435 \u00ab\u0412\u0430\u0448\u0435 \u0438\u043c\u044f\u00bb.");
//    }
//
//    },'summary':true},{'id':'FilterForm_email','inputID':'FilterForm_email','errorID':'FilterForm_email_em_','model':'FilterForm','name':'email','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {
//
//    if($.trim(value)=='') {
//            messages.push("\u041d\u0435\u043e\u0431\u0445\u043e\u0434\u0438\u043c\u043e \u0437\u0430\u043f\u043e\u043b\u043d\u0438\u0442\u044c \u043f\u043e\u043b\u0435 \u00abEmail\u00bb.");
//    }
//
//    },'summary':true},{'id':'FilterForm_phone','inputID':'FilterForm_phone','errorID':'FilterForm_phone_em_','model':'FilterForm','name':'phone','enableAjaxValidation':false,'summary':true},{'id':'FilterForm_message','inputID':'FilterForm_message','errorID':'FilterForm_message_em_','model':'FilterForm','name':'message','enableAjaxValidation':false,'clientValidation':function(value, messages, attribute) {
//
//    if($.trim(value)=='') {
//            messages.push("\u041d\u0435\u043e\u0431\u0445\u043e\u0434\u0438\u043c\u043e \u0437\u0430\u043f\u043e\u043b\u043d\u0438\u0442\u044c \u043f\u043e\u043b\u0435 \u00ab\u041e\u043f\u0438\u0448\u0438\u0442\u0435 \u0437\u0430\u0434\u0430\u0447\u0443\u00bb.");
//    }
//
//    },'summary':true},{'summary':true},{'summary':true}],'summaryID':'quick\x2Dform_es_','errorCss':'error'});
});

</script>


<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>

<script defer src="<?php echo $this->themeCss; ?>assets/build/product.js"></script>

<script defer src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<link rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">



</body>
</html>