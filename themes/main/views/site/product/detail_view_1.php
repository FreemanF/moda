<?php
	if (Yii::app()->user->isGuest){
		echo $this->renderPartial('//layouts/header');
	} else {
		echo $this->renderPartial('//layouts/header_logged');
	}
?>

    
    <div class="b-section">
        <div class="b-section__container">
            <div class="b-block"> 
                    <!-- /52555387/modnekublo.com.ua_970x90 -->
            </div>
            <div class="b-product">
                <div class="b-product__dashboard">
                    <div class="b-block_type_small_pad">
                        <div class="b-product__breadcrumbs">
                            <ul class="b-breadcrumbs">
    <li class="b-breadcrumbs__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="/" itemprop="url" title="Главная">
                <span itemprop="title">Главная</span>
            </a>
        </li><li class="b-breadcrumbs__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="/women" itemprop="url" title="Женская одежда">
                <span itemprop="title">Женская одежда</span>
            </a>
        </li><li class="b-breadcrumbs__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="/women/kosmetika" itemprop="url" title="Косметика">
                <span itemprop="title">Косметика</span>
            </a>
        </li><li class="b-breadcrumbs__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="/women/kosmetika/parfyumy" itemprop="url" title="Парфюмы">
                <span itemprop="title">Парфюмы</span>
            </a>
        </li>
</ul>
                        </div>
                    </div>

                    

                    

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
                        <a href="'.$this->model->media->getMediaUrl('original').'" class="js-gallery-magnific-item" target="_blank">
                            <img class="b-product-gallery__additional-image"
                                 src="'.$this->model->media->getMediaUrl('original').'"
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
                        <a href="'.$this->model->media->getMediaUrl('original').'" class="js-gallery-magnific-item" target="_blank">
                            <img class="b-product-gallery__additional-image"
                                 src="'.$this->model->media->getMediaUrl('original').'"
                                 alt="Montale chypre vanille 100 ml тестер1"
                                 title="Montale chypre vanille 100 ml тестер1"/>
                        </a>
                    </li>';
} else {
    $media_3 = null;
}
?>
<div class="b-product__dashboard_section b-product__dashboard_section-left">
    <div class="b-product-gallery js_slider">
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
?>
            </ul>
            <div class="b-desktop-only">
                <div class="b-product-gallery__image-wrapper" id="js-main-image">
                    <img class="b-product-gallery__image" src="<?php echo $this->model->media->getMediaUrl('original'); ?>" alt="Montale chypre vanille 100 ml тестер" title="Montale chypre vanille 100 ml тестер" onerror="this.src='https://assets.shafastatic.net/static/item-clothing-310x430-loading.png';"/>
                </div>
            </div>
        </div>

        <div class="b-product-gallery__info" itemscope itemtype="http://schema.org/Product">
                
                    

<meta itemprop="name" content="Montale chypre vanille 100 ml тестер за 485 грн."/>
<meta itemprop="url" content="https://modnekublo.com.ua/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester" />

<meta itemprop="description" content="С легкостью аромата парфюмированной воды Chypre Vanille может сравниться разве что невесомое облако, безмятежно плывущее по небу. Его элегантность и изысканность подобна роскошному классическому наряду. А таинственную загадочность Chypre Vanille сможет передать лишь пронизанная недосказанностью атмосфера Востока. 

Главным ингредиентом парфюмерного микса являются медленно тлеющие благоухания, наполняющие воздух полупрозрачной ладанной дымкой. Их успокаивающий аромат как нельзя лучше гармонирует с бархатистым ирисом и мягкими лепестками алой розы. Шлейф, оставляемый данным парфюмом, запечатлеется в памяти благородным запахом сандалового дерева, амбры и нежно-сладкой ванили. 

Унисекс аромат Chypre Vanille полностью натурален. Он изготовлен без применения спирта, на основе экологически чистых компонентов. 

Дата выпуска: 2007
Страна-производитель: Франция
Пол: унисекс
Классификация аромата: цветочные, восточные
Начальная нота: роза
Нота &#34;сердца&#34;: ладан, ирис
Конечная нота: ваниль, амбра, сандаловое дерево, ветивер, бобы тонка

В наличии большой выбор тестеров Монтале.Отправки Новой Почтой и Укрпочтой каждый день.Самая низкая цена в интернете.
MONTALE	Amber &amp; Spices
MONTALE	Fruits of Musk
MONTALE	Soleil De Capri
MONTALE	Aoud Sense
MONTALE	Aoud Legend
MONTALE	Red Aoud
MONTALE	Blue Amber
MONTALE	Aoud Lime
MONTALE	Jasmin Full
MONTALE	Aoud Lavender
MONTALE	The New Rouse
MONTALE	Spicy Aoud
MONTALE	Golden Sand
MONTALE	Intense Cherry
MONTALE	Aoud Jasmin
MONTALE	Chypre Vanille
MONTALE	Aoud Purple Rose
MONTALE	Nepal Aoud
MONTALE	Boise Fruite
MONTALE	Starry Nights
MONTALE	Red Vetiver
MONTALE	Oriental Flowers
MONTALE	Aoud Meloki
MONTALE	Arabians
MONTALE	Aoud Lagoon
MONTALE	Day Dreams
MONTALE	Highness Rose
MONTALE	Honey Aoud
MONTALE	Gold Flowers
MONTALE	Intense Café
MONTALE	Aoud Forest
MONTALE	Tropical Wood
MONTALE	Mukhallat
MONTALE	Candy Rose
MONTALE	Orange Flowers
MONTALE	Deep Rose
MONTALE	Rose Night
MONTALE	GreyLand
MONTALE	Mango Mango"/>

<div class="b-product-price b-product-price_theme_white" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <meta itemprop="priceCurrency" content="UAH"/>
    <meta itemprop="availability" itemtype="http://schema.org/ItemAvailability" content="http://schema.org/InStock"/>

    
        
        <span class="b-product-price__value" itemprop="price"><?= $this->model->pd_price; ?></span>
        <span class="b-product-price__currency">грн</span>

        
</div>

<div class="b-product__params b-product-params b-product-params_theme_white b-product-params_col_2">
    <div class="b-product-params__item">
        <div class="b-product-params__text">
            <?php
                if (!empty ($this->model->size))
                    echo $this->model->size->name;
                ?>
        </div>
        <div class="b-product-params__title">Размер</div>
    </div>
    <div class="b-product-params__item">
        <div class="b-product-params__text"><?php echo $this->model->getStateName($this->model->pd_state); ?></div>
        <div class="b-product-params__title">Состояние</div>
    </div>
</div>
                
                <div class="b-product-gallery__pagination js_slider_pagination" data-classactive="b-product-gallery__pagination_item_state_active">
                    <span class="b-product-gallery__pagination_item b-product-gallery__pagination_item_state_active"></span>
                </div>
            </div>
    </div>

    <div class="b-product__panel_type_mobile b-block">
            <span class="b-product__likes_type_mobile">
                    <svg class="b-product__likes_type_mobile-icon">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--heart"></use>
                    </svg> 9
                </span>

            <div class="b-product__complain-link js-complain-link"></div>
        </div>

    <div class="b-product__social b-social-links b-block_type_small_pad">
        <span class="b-product__social-text">Поделиться:</span>
        <ul class="b-social-links__list">
            <li class="b-social-links__item b-social-links__item-fb">
                <a href="https://www.facebook.com/sharer/sharer.php?u=http://modnekublo.com.ua/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester&title=Montale chypre vanille 100 ml тестер за 485 грн." class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="fb" data-action="like" data-url="https://shafa.novikov.loc/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester">
                    <svg class="b-social-links__icon">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--fb"></use>
                    </svg>
                </a>
            </li><li class="b-social-links__item b-social-links__item-vk">
                <a href="https://vk.com/share.php?url=http://modnekublo.com.ua/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester&title=Montale chypre vanille 100 ml тестер за 485 грн.&image=https://images.shafastatic.net/32408961" class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="vk" data-action="like" data-url="https://shafa.novikov.loc/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester">
                    <svg class="b-social-links__icon">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--vk"></use>
                    </svg>
                </a>
            </li><li class="b-social-links__item b-social-links__item-twitter">
                <a href="https://twitter.com/intent/tweet/?text=Montale chypre vanille 100 ml тестер за 485 грн.&url=http://modnekublo.com.ua/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester" class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="twitter" data-action="tweet" data-url="https://shafa.ua/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester">
                    <svg class="b-social-links__icon">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--twitter"></use>
                    </svg>
                </a>
            </li><li class="b-social-links__item b-social-links__item-pinterest">
                <a href="https://www.pinterest.com/pin/create/button/?url=http://modnekublo.com.ua/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester&media=https://images.shafastatic.net/32408961&description=Montale chypre vanille 100 ml тестер за 485 грн." class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="pinterest" data-action="like" data-url="https://shafa.ua/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester">
                    <svg class="b-social-links__icon">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--pinterest"></use>
                    </svg>
                </a>
            </li><li class="b-social-links__item b-social-links__item-google">
                <a href="https://plus.google.com/share?url=http://modnekublo.com.ua/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester" class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="google" data-action="like" data-url="http://modnekublo.com.ua/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester">
                    <svg class="b-social-links__icon">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--google"></use>
                    </svg>
                </a>
            </li><li class="b-social-links__item b-social-links__item-odnoklassniki">
                <a href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st.comments=Montale chypre vanille 100 ml тестер за 485 грн.&st._surl=http://modnekublo.com.ua/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester" class="b-social-links__link js-social-share" target="_blank" rel="nofollow" data-social="odnoklassniki" data-action="like" data-url="http://modnekublo.com.ua/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester">
                    <svg class="b-social-links__icon">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--odnoklassniki"></use>
                    </svg>
                </a>
            </li>
        </ul>
    </div>

    <div class="b-desktop-only">
        <div class="b-product__complain-link js-complain-link"></div>
    </div>
</div>
                        <div class="b-product__dashboard_section">
    <h1 class="b-product__title"><?= $this->model->pd_name; ?></h1>
    <div class="b-product-state b-block">
        

        <div class="b-product-state__label b-product-state__label_theme_green">
                    <?php echo $this->model->getStatusName($this->model->pd_status); ?>
                </div>
    </div>

    <div class="b-block">
        <div class="b-product__description js-truncated" data-length="700" data-text-class=".b-product__description-text">
            <div class="b-product__description-text">
                <?= $this->model->content_long; ?>
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
                    echo $this->model->size->sizename;
                ?>
            </span>
        </div>
        
    </div>

    

    <div class="b-product-message">
    <h3 class="b-product-message__title">
        Задать вопрос продавцу
    </h3>
    <div class="b-product-message__image-wrapper">
            <img class="b-product-message__image" src="https://assets.shafastatic.net/static/female-photo-310.png"/>
        </div>
        <?php echo CHtml::form(Yii::app()->createAbsoluteUrl('site/sendfirst')); ?>
        <div class="b-product-message__textfield">
            <?php
            echo CHtml::textArea('input', $input, array('class' => "b-product-message__textarea",'placeholder'=>'Напишите ваш вопрос'));
            echo CHtml::hiddenField('prod',$this->model->pdid);
            echo CHtml::hiddenField('recipient',$this->model->pd_user);
            if (Yii::app()->user->isGuest){
            echo CHtml::ajaxSubmitButton('Отправить сообщение', Yii::app()->createAbsoluteUrl('site/sendfirst'), array(
                'type' => 'POST',
                // Результат запроса записываем в элемент, найденный
                // по CSS-селектору #output.
                'update' => '#input',
                'htmlOptions'=>array('class'=>'b-button b-button_pull_right b-product-message__button b-product-message__button-long'),
            ),
            array(
                // Меняем тип элемента на submit, чтобы у пользователей
                // с отключенным JavaScript всё было хорошо.
                'type' => 'submit'
            ));
            } else {
                echo "<a href='".Yii::app ()->createAbsoluteUrl ('users/register')."' class='b-button b-button_pull_right b-product-message__button b-product-message__button-long'>Войдите, чтоб отправить сообщение</a>";
            }
            ?>
            <?php
            echo CHtml::endForm();
            ?>
            <textarea class="b-product-message__textarea" placeholder="Напишите ваш вопрос" style="display: none;"></textarea>
            <span class="b-product-message__triangle"></span>
        </div>
        <div class="b-product-message__actions">
            <a href="
               <?php
                if (Yii::app()->user->isGuest)
                    echo Yii::app ()->createAbsoluteUrl ('users/register');
                else
                    echo 'dialogs';
                ?>"
               class="b-button b-button_pull_right b-product-message__button b-product-message__button-long">
                <?php
                if (Yii::app()->user->isGuest)
                    echo 'Войти, чтобы задать вопрос продавцу';
                else
                    echo 'Задать вопрос продавцу';
                ?>
            </a>
        </div>
</div>
</div>
                    </div>
                </div>

                <div class="b-product__sidebar">
    <div class="b-product__panel b-product__panel_type_desktop" itemscope itemtype="http://schema.org/Product">
        

<meta itemprop="name" content="Montale chypre vanille 100 ml тестер за 485 грн."/>
<meta itemprop="url" content="https://modnekublo.ua/category/kosmetika/8828714-montale-chypre-vanille-100-ml-tester" />

<meta itemprop="description" content="С легкостью аромата парфюмированной воды Chypre Vanille может сравниться разве что невесомое облако, безмятежно плывущее по небу. Его элегантность и изысканность подобна роскошному классическому наряду. А таинственную загадочность Chypre Vanille сможет передать лишь пронизанная недосказанностью атмосфера Востока. 

Главным ингредиентом парфюмерного микса являются медленно тлеющие благоухания, наполняющие воздух полупрозрачной ладанной дымкой. Их успокаивающий аромат как нельзя лучше гармонирует с бархатистым ирисом и мягкими лепестками алой розы. Шлейф, оставляемый данным парфюмом, запечатлеется в памяти благородным запахом сандалового дерева, амбры и нежно-сладкой ванили. 

Унисекс аромат Chypre Vanille полностью натурален. Он изготовлен без применения спирта, на основе экологически чистых компонентов. 

Дата выпуска: 2007
Страна-производитель: Франция
Пол: унисекс
Классификация аромата: цветочные, восточные
Начальная нота: роза
Нота &#34;сердца&#34;: ладан, ирис
Конечная нота: ваниль, амбра, сандаловое дерево, ветивер, бобы тонка

В наличии большой выбор тестеров Монтале.Отправки Новой Почтой и Укрпочтой каждый день.Самая низкая цена в интернете.
MONTALE	Amber &amp; Spices
MONTALE	Fruits of Musk
MONTALE	Soleil De Capri
MONTALE	Aoud Sense
MONTALE	Aoud Legend
MONTALE	Red Aoud
MONTALE	Blue Amber
MONTALE	Aoud Lime
MONTALE	Jasmin Full
MONTALE	Aoud Lavender
MONTALE	The New Rouse
MONTALE	Spicy Aoud
MONTALE	Golden Sand
MONTALE	Intense Cherry
MONTALE	Aoud Jasmin
MONTALE	Chypre Vanille
MONTALE	Aoud Purple Rose
MONTALE	Nepal Aoud
MONTALE	Boise Fruite
MONTALE	Starry Nights
MONTALE	Red Vetiver
MONTALE	Oriental Flowers
MONTALE	Aoud Meloki
MONTALE	Arabians
MONTALE	Aoud Lagoon
MONTALE	Day Dreams
MONTALE	Highness Rose
MONTALE	Honey Aoud
MONTALE	Gold Flowers
MONTALE	Intense Café
MONTALE	Aoud Forest
MONTALE	Tropical Wood
MONTALE	Mukhallat
MONTALE	Candy Rose
MONTALE	Orange Flowers
MONTALE	Deep Rose
MONTALE	Rose Night
MONTALE	GreyLand
MONTALE	Mango Mango"/>

<div class="b-product-price " itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <meta itemprop="priceCurrency" content="UAH"/>
    <meta itemprop="availability" itemtype="http://schema.org/ItemAvailability" content="http://schema.org/InStock"/>

    
        
        <span class="b-product-price__value" itemprop="price"><?= $this->model->pd_price; ?></span>
        <span class="b-product-price__currency">грн</span>

        
</div>

<div class="b-product__params b-product-params  b-product-params_col_2">
    <div class="b-product-params__item">
        <div class="b-product-params__text">
            <?php
                if (!empty ($this->model->size))
                    echo $this->model->size->name;
                ?>
        </div>
        <div class="b-product-params__title">Размер</div>
    </div>
    <div class="b-product-params__item">
        <div class="b-product-params__text"><?php echo $this->model->getStateName($this->model->pd_state); ?></div>
        <div class="b-product-params__title">Состояние</div>
    </div>
</div>

        <div class="b-desktop-only">
                <div class="b-product__button_container">
        <a href="/login?scope=want&amp;next=/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester" class="b-button b-button_fs_18 b-button_lh_24 b-button_bg_red b-product__button">Хочу!</a>
    </div>

    <div class="b-product__button_container">
        <a href="/login?next=/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester" class="b-button-bordered b-button-bordered_lh_24 b-button-bordered_theme_gray b-button-bordered_theme_transparent b-product__button b-product__button-follow">
            <svg class="b-button-bordered__icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--heart"></use>
            </svg>
            В избранное
        </a>
    </div>

                    <div class="b-product__likes">
                            Нравится 9 пользователям
                        </div>
            </div>
    </div>

    <div class="b-block">
    

    </div>
<?php
	//$user = Users::model()->find('usid='.$this->model->user->primaryKey);
?>
    <div class="b-product__panel">
        <div class="b-product-seller b-block"><div class="b-product-seller__title">Продавец</div>
            <a href="/member/<?php echo $this->model->user->us_sef; ?>"
               class="b-product-seller__image-wrapper js-ga-onclick2"
               data-event-action="Member sidebar click"
               data-event-category="Activities"
               data-event-label="<?php echo $this->model->user->us_sef; ?>">
                <img class="b-product-seller__image"
                     src="https://image-thumbs.shafastatic.net/27049689_310_430"
                     alt="montale"
                     title="montale">
            </a>
            <div class="b-product-seller__info">
                <a href="/member/<?php echo $this->model->user->us_sef; ?>"
                   class="b-product-seller__info_title js-ga-onclick2"
                   data-event-action="Member sidebar click"
                   data-event-category="Activities"
                   data-event-label="/member/<?php echo $this->model->user->us_sef; ?>">
                    <?php echo $this->model->user->us_login; ?>
                </a>
                <div class="b-product-seller__info_item">
                        <svg class="b-product-seller__info_icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--location"></use>
                        </svg>
                        Изюм
                    </div>
                <div class="b-product-seller__info_item">
                    <svg class="b-product-seller__info_icon">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                             xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--clock"></use>
                    </svg>
                    Была
                    <time datetime="2017-11-23 17:06:02"
                          title="23.11.2017 17.06.02">&nbsp;
                    </time>
                </div>
            </div>
        </div>

        

        <div class="b-product__params b-product-params">
            <div class="b-product-params__item">
                <div class="b-product-params__title">Отзывы</div>
            </div>
        </div>

        <div class="b-product-seller__info_item">
            <a href="/member/montale/reviews?r=p">
                <svg class="b-product-seller__info_icon b-product-seller__info_icon-positive">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                         xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--positive"></use>
                </svg>
                Позитивных: 0
            </a>&nbsp;
            <a href="/member/montale/reviews?r=n">
                <svg class="b-product-seller__info_icon b-product-seller__info_icon-negative">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                         xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--negative"></use>
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

            <div class="b-block">
                <h2 class="b-title b-title_fw_500 b-block">
                    Еще продаю
                </h2>
                
                    


<ul class="b-catalog b-catalog_max-columns_5 b-block"><li class="b-catalog__item">
            <a class="b-catalog__link js-ga-onclick2 "
       href="/women/kosmetika/parfyumy/8870181-givenchy-ange-ou-demon-le-secret-edition-riviera-edp-100ml-tester"
       data-event-action="Open from more user products"
       data-event-category="Open"
       data-event-label=""
       data-id="8870181"
       title="Givenchy ange ou demon le secret edition riviera edp 100ml тестер">

        <img class="b-catalog__img js-lazy-img"
             src="https://assets.shafastatic.net/static/img/image-placeholder.png"
             title="Givenchy ange ou demon le secret edition riviera edp 100ml тестер"
             alt="Givenchy ange ou demon le secret edition riviera edp 100ml тестер"

             data-placeholder="https://assets.shafastatic.net/static/img/image-placeholder.png"
             data-src="https://image-thumbs.shafastatic.net/32570578_310_430"/>
        <noscript>
            <img src="https://image-thumbs.shafastatic.net/32570578_310_430" alt="Givenchy ange ou demon le secret edition riviera edp 100ml тестер"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Givenchy ange ou demon le secret edition riviera edp 100ml тестер
            <span class="b-catalog__details_city">Изюм</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    560
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item">
            <a class="b-catalog__link js-ga-onclick2 "
       href="/women/kosmetika/parfyumy/8869522-tom-ford-champaca-absolute-100-ml-tester"
       data-event-action="Open from more user products"
       data-event-category="Open"
       data-event-label=""
       data-id="8869522"
       title="Tom ford champaca absolute 100 ml тестер">

        <img class="b-catalog__img js-lazy-img"
             src="https://assets.shafastatic.net/static/img/image-placeholder.png"
             title="Tom ford champaca absolute 100 ml тестер"
             alt="Tom ford champaca absolute 100 ml тестер"

             data-placeholder="https://assets.shafastatic.net/static/img/image-placeholder.png"
             data-src="https://image-thumbs.shafastatic.net/32568239_310_430"/>
        <noscript>
            <img src="https://image-thumbs.shafastatic.net/32568239_310_430" alt="Tom ford champaca absolute 100 ml тестер"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Tom ford champaca absolute 100 ml тестер
            <span class="b-catalog__details_city">Изюм</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    620
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item">
            <a class="b-catalog__link js-ga-onclick2 "
       href="/women/kosmetika/parfyumy/8869124-creed-aventus-for-her-120-ml-tester"
       data-event-action="Open from more user products"
       data-event-category="Open"
       data-event-label=""
       data-id="8869124"
       title="Creed aventus for her 120 ml тестер">

        <img class="b-catalog__img js-lazy-img"
             src="https://assets.shafastatic.net/static/img/image-placeholder.png"
             title="Creed aventus for her 120 ml тестер"
             alt="Creed aventus for her 120 ml тестер"

             data-placeholder="https://assets.shafastatic.net/static/img/image-placeholder.png"
             data-src="https://image-thumbs.shafastatic.net/32566630_310_430"/>
        <noscript>
            <img src="https://image-thumbs.shafastatic.net/32566630_310_430" alt="Creed aventus for her 120 ml тестер"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Creed aventus for her 120 ml тестер
            <span class="b-catalog__details_city">Изюм</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    620
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item">
            <a class="b-catalog__link js-ga-onclick2 "
       href="/women/kosmetika/parfyumy/8868820-dior-addict-eau-fraiche-100ml-tester"
       data-event-action="Open from more user products"
       data-event-category="Open"
       data-event-label=""
       data-id="8868820"
       title="Dior addict eau fraiche 100ml тестер">

        <img class="b-catalog__img js-lazy-img"
             src="https://assets.shafastatic.net/static/img/image-placeholder.png"
             title="Dior addict eau fraiche 100ml тестер"
             alt="Dior addict eau fraiche 100ml тестер"

             data-placeholder="https://assets.shafastatic.net/static/img/image-placeholder.png"
             data-src="https://image-thumbs.shafastatic.net/32565444_310_430"/>
        <noscript>
            <img src="https://image-thumbs.shafastatic.net/32565444_310_430" alt="Dior addict eau fraiche 100ml тестер"/>
        </noscript>

        <span class="b-catalog__label b-catalog__label_theme_white">Новое</span>

        <span class="b-catalog__details">
            Dior addict eau fraiche 100ml тестер
            <span class="b-catalog__details_city">Изюм</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item">One size</span>
                </span>
            </span>

        <span class="b-catalog__info">
            

            

            <span class="b-catalog__price">
                    540
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
        </li><li class="b-catalog__item">
        <a href="/member/montale/clothes"
           class="b-catalog__more js-ga-onclick2"
           data-event-action="All sellers's prods clicked"
           data-event-category="Product"
           data-event-label="All sellers's prods clicked from product">
            <span class="b-catalog__text">
                338 товаров
            </span>
            <img class="b-catalog__img js-lazy-img"
                 src="https://assets.shafastatic.net/static/img/image-placeholder.png"
                 data-placeholder="https://assets.shafastatic.net/static/more-310x430.jpg"
                 data-src="https://assets.shafastatic.net/static/more-310x430.jpg"/>
            <noscript>
                <img src="https://assets.shafastatic.net/static/more-310x430.jpg"/>
            </noscript>
        </a>
    </li>
</ul>
                
            </div>

            

        </div>
    </div>

    <div class="b-product b-sticky-bar">
            <div class="b-sticky-bar__button-container">
        <a href="/login?next=/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester" class="b-sticky-bar__button b-sticky-bar__button_type_follow">
            <svg class="b-sticky-bar__button_type_follow-icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="//sprites/defs/svg/sprite.defs.svg#static--svg--heart"></use>
            </svg> В избранное
        </a>
    </div><div class="b-sticky-bar__button-container">
        <a href="/login?scope=want&amp;next=/women/kosmetika/parfyumy/8828714-montale-chypre-vanille-100-ml-tester" class="b-sticky-bar__button b-sticky-bar__button_type_want_it">Хочу!</a>
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
                <a class="b-footer-list__link" rel="nofollow"
                   href="/page/rabota-v-shafe">Работа</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link"
                   href="http://blog.shafa.ua/">Наш блог</a>
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
        </footer>
    </div>

<script>
    window.staticUrl = '<?php echo $this->themeCss; ?>/assets/';
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
</script>


<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/product.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<link rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">


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