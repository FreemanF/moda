<?php
// if($this->beginCache($id, array('duration'=>3600))) {
?>
<?php
	if (Yii::app()->user->isGuest){
		Yii::app()->redirect('/');
	} else {
		echo $this->renderPartial('//layouts/header_logged');
	}
?>

        <div class="b-profile-data">
    <div class="b-profile-data__image-wrap" style="margin-left:19%;">
        <img class="b-profile-data__img"
             src="http://ma-wish.com/placeholders/avatar/avatar.png"
             alt="avatar"
             title="avatar"/>
    </div>
    <div class="b-profile-data__info">
        

        <h2 class="b-title b-profile-data__title">
            <?php echo Yii::app()->user->name; ?>
            
        </h2>
        <div class="b-profile-data__rating b-profile-rating">
            <span class="b-profile-data__item">
                <svg class="b-profile-rating__item">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--positive"></use>
                </svg>
                <span class="b-profile-rating__count">0</span>
                <svg class="b-profile-rating__item b-profile-rating__item_negative">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--negative"></use>
                </svg>
                <span class="b-profile-rating__count">0</span>
            </span>
            
            <span class="b-profile-data__item">
                <span class="b-profile-rating__followers">
                    0 подписчиков
                </span>
            </span>
            
            <span class="b-profile-data__item">
                <span class="b-profile-rating__followers">
                    0 продаж
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
        
        <span class="b-profile-data__item" style="display: none;">
                <a href="http://vk.com/id" class="b-profile-data__link" rel="nofollow" target="_blank">
                    
                        <svg class="b-profile-data__icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--vk2"></use>
                        </svg>
                    
                </a>
            </span>
        
        

        

        

        
    </div>
</div>
<div class="b-profile-background" ></div>
<!--        </div>-->
<!--    </div>-->
    


    
    <div class="b-section">
        <div class="b-section__container">
            <div class="b-tabs">
                <button class="b-tabs__button js-tabs_button">
                    Мои товары <?php
                    $vipsc = 0;
                    $vipsc = Product::model()->user(Yii::app()->user->id)->count();
                    echo $vipsc;
                    ?>
                    
                    <svg class="b-tabs__arrow">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-2px"></use>
                    </svg>
                </button>
                <ul class="b-tabs__list" data-classactive="b-tabs__list_state_opened">
                    <li class="b-tabs__item b-tabs__item_state_active">
                        <a class="b-tabs__link" href="<?php echo Yii::app()->createAbsoluteUrl('profile/'.$_GET['sef']); ?>">
                            Мои товары
                            <sup class="b-tabs__counter"><?php
                    $vipsc = 0;
                    $vipsc = Product::model()->user(Yii::app()->user->id)->count();
                    echo $vipsc;
                    ?></sup>
                        </a>
                    </li>
                    
                    <li class="b-tabs__item ">
                        <a class="b-tabs__link" href="/member/fontez/reviews?r=p">
                            Отзывы
                            <sup class="b-tabs__counter">
                                0
                            </sup>
                        </a>
                    </li>
                    <li class="b-tabs__item ">
                        <a class="b-tabs__link" href="/member/fontez/subscriptions">
                            Подписки
                            <sup class="b-tabs__counter">
                                0
                            </sup>
                        </a>
                    </li>
<!--                    
                    <li class="b-tabs__item">
                        <a class="b-tabs__link" href="/msg/new/mr.fontez" rel="nofollow">Написать</a>
                    </li>
                    
                    <li class="b-tabs__item b-tabs__item_pos_right js-complain-link" data-location="profile">
                        <div data-reactroot="" class="b-inline">
                            <a class="b-warning-link b-tabs__link" href="#" rel="nofollow">
                                <svg class="b-warning-link__icon b-tabs__icon">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--message-warning"></use>
                                </svg>
                                <span class="b-warning-link__text">Пожаловаться</span>
                            </a>
                            <noscript></noscript>
                        </div>
                    </li>
                    -->
                </ul>
            </div>
            <div class="b-block b-main">
                
    
    <div class="b-block">
        <div class="b-main__content">
            
<ul class="b-catalog b-catalog_max-columns_4 b-block">            
<?php
if (isset($_GET['category']))
{
    $this->myProducts(Yii::app()->user->id,$_GET['category']);
} else {
    $this->myProducts(Yii::app()->user->id,'all');
}
?>
</ul>

<!--
            <div class="b-block">
                <div class="b-block__centering">
                    <a class="b-button-bordered b-button-bordered_icon_arrow" href="/member/fontez/clothes">Посмотреть все 62 вещи</a>
                </div>
            </div>
            -->
        </div>
        <aside class="b-main__aside">
            <div class="b-main__inner">
                <div class="b-filter b-block">
                    <button class="b-block__subcategories-button b-button-bordered js-toggle" data-toggle-classname="b-shop-categories_state_active" data-target-id="categories">Подкатегории</button>
                    <ul id="categories" class="b-shop-categories">
                    <?php
                        if (isset($_GET['category']))
                        {
                            $active_class = 'b-shop-categories__item_state_active';
                            $mainClass = '';
                        } else {
                            $active_class = '';
                            $mainClass = 'b-shop-categories__item_state_active';
                        }
                    ?>
                        <li class="b-shop-categories__item <?php echo $mainClass; ?>">
                            <div class="b-shop-categories__link-wrap">
                                <a href="/profile/<?php echo Yii::app()->user->id; ?>" class="js-ga-onclick2" data-event-category="Catalog Filter" data-event-action="change_category" data-event-label="From Shop">Все вещи</a>
                            </div>
                            <div class="b-shop-categories__counter-wrap">
                                <span class="b-shop-categories__counter">
                                    <?php
//                    $vipsc = 0;
//                    $vipsc = Product::model()->user(Yii::app()->user->id)->count();
                    echo $vipsc;
                    ?>
                                </span>
                            </div>
                        </li>
                        <?php
//                        if (isset($_GET['category']))
//                        {
//                            $active_class = 'b-shop-categories__item_state_active';
//                        } else {
//                            $active_class = '';
//                        }
                        $user_products = Product::model()->user(Yii::app()->user->id)->with('category')->findAll();
                        $categoriesID = array();
                        $cats = array();
                        foreach ($user_products as $products => $product)
                        {
                                if (!in_array($product->category->cid,$categoriesID)){
                                   //Обращаемся по ключу к ячейке.
                                   array_push($categoriesID, $product->category->cid);
                                   array_push($cats, $product->category);
                                }
                        }

                        foreach ($cats as $key => $cat) {
                            $active_class = '';
                            if (isset($_GET['category']))
                            {
                            if ($_GET['category'] == $cat->cid)
                            {
                                $active_class = 'b-shop-categories__item_state_active';
                            }
                            }
                            else {
                                $active_class = '';
                            }
                            echo '<li class="b-shop-categories__item '.$active_class.'">
                            <div class="b-shop-categories__link-wrap">
                                <a href="'.Yii::app()->createAbsoluteUrl('profile/'.$_GET['sef'],array('category'=>$cat->cid)).'" class="js-ga-onclick2" data-event-category="Catalog Filter" data-event-action="change_category" data-event-label="From Shop">
                                    '.$cat->c_name.'
                                </a>
                            </div>
                            <div class="b-shop-categories__counter-wrap">
                                <span class="b-shop-categories__counter">';
                                    echo Product::model()->user(Yii::app()->user->id)->cat($cat->cid)->count();
                                echo '</span>
                            </div>
                        </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
<!--    
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
    
    -->

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
                   href="https://plus.google.com/108317175350006940956">Мы в Google+</a>
            </li>
        </ul>
    </div>
</div>
        <div class="fontez" style="display: none;">
        <p>Developed by <a href="https://vk.com/freemanf">Dmitriy Novikov</a></p>
    </div>
    </div>

<script>
    window.staticUrl = '<?php echo $this->themeCss; ?>/assets/';
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
</script>


<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>

    <script defer src="<?php echo $this->themeCss; ?>assets/build/profile.js"></script>



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