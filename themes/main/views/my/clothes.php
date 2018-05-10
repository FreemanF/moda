<?php
$cs=Yii::app()->clientScript;
$cs->scriptMap=array(
    'jquery.js'=>false,
    'jquery.ui.js' => false,
    'jquery' => false,
);?>
<?php $jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery'] = $jquery; ?>
<?php
    Yii::app()->clientscript->coreScriptPosition = CClientScript::POS_HEAD;
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
            <div class="b-main">
                <div class="b-block">
                    <h1 class="b-title">Мои вещи</h1>
                </div>

                <div class="b-main__content">
                    <div class="b-main__inner">
                        <div class="b-main__block">
                            
    <div class="b-block_type_small_pad" style="display: none;">
        <div class="b-block__item b-search-result-meta"></div>
        <p class="b-block__sorting b-block__item">
        Сортировать:
            <span class="b-sort">
                <select class="b-sort__select js-sort-select" name="sorting" data-qs="">
                    <option value="4" selected>
                        по дате добавления
                    </option>
                    <option value="2" >
                        от дешевых к дорогим
                    </option>
                    <option value="3" >
                        от дорогих к дешевым
                    </option>
                    <option value="1" >
                        по популярности
                    </option>
                </select>
            </span>
    </p>
    </div>
    
        <div class="b-block">
    <?php
        $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$this->dataProvider,
        'itemView'=>'_index',
	'enableSorting'=>1,

        'template'=>"{sorter}<ul class='b-catalog b-catalog_max-columns_4'>{items}</ul>{pager}",
	'sorterHeader'=>'Сортировать по:',
	'id' => 'catview',
	'sortableAttributes'=>array('pd_name','pd_price'),
    //    'pager' => array('class' => 'PesthouseKPD'),
        'ajaxUpdate' => true,
	'enableHistory' => false,
    ));
    ?>
        </div>
<!--  
            <a href="/new"
               class="b-button b-button_mb_half_indent js-ga-onclick"
               data-event-action="Add new product click"
               data-event-category="Product"
               data-event-label="Add new product my products click">Добавить товар</a>
            или
            <a href="/women" class="b-button">Посмотреть каталог</a>
            -->
                        </div>
                    </div>
                </div>
                <aside class="b-main__aside b-shop__aside">
                    <div class="b-main__inner">
                        <div class="b-filter b-block">
                            <div class="b-filter__header">По статусу</div>
                            <button
                                class="b-block__subcategories-button b-button-bordered js-toggle"
                                data-toggle-classname="b-shop-categories_state_active"
                                data-target-id="statuses"
                            >По статусу</button>
                            <ul id="statuses" class="b-shop-categories">
                                <li class="b-shop-categories__item <?php
                                if (isset($_GET['t'])){
                                    if ($_GET['t'] == 'active'){
                                        echo "b-shop-categories__item_state_active";
                                    }
                                }
                                ?>">
                                    <div class="b-shop-categories__link-wrap">
                                        <a href="/my/clothes?t=active">Активные</a>
                                    </div>
                                    <div class="b-shop-categories__counter-wrap">
                                        <span class="b-shop-categories__counter">
                                            <?php
                                                $c1 = Product::model()->user(Yii::app()->user->id)->status(1)->findAll();
                                                $sum1 = count($c1);
                                                $c2 = Product::model()->user(Yii::app()->user->id)->status(2)->findAll();
                                                $sum1 += count($c2);
                                                $c3 = Product::model()->user(Yii::app()->user->id)->status(3)->findAll();
                                                $sum1 += count($c3);
                                                echo $sum1;
                                            ?>
                                        </span>
                                    </div>
                                </li>
                                <li class="b-shop-categories__item">
                                    <div class="b-shop-categories__link-wrap">
                                        <a href="/my/clothes?t=promoted">Рекламируемые</a>
                                    </div>
                                    <div class="b-shop-categories__counter-wrap">
                                        <span class="b-shop-categories__counter">
                                            <?php
                                                $c3 = Product::model()->user(Yii::app()->user->id)->status(2)->findAll();
                                                $sum1 = count($c3);
                                                echo $sum1;
                                            ?>
                                        </span>
                                    </div>
                                </li>
                                <li class="b-shop-categories__item">
                                    <div class="b-shop-categories__link-wrap">
                                        <a href="/my/clothes?t=moderated">На модерации</a>
                                    </div>
                                    <div class="b-shop-categories__counter-wrap">
                                        <span class="b-shop-categories__counter">
                                            <?php
                                                $c3 = Product::model()->user(Yii::app()->user->id)->status(0)->findAll();
                                                $sum1 = count($c3);
                                                echo $sum1;
                                            ?>
                                        </span>
                                    </div>
                                </li>
                                <li class="b-shop-categories__item">
                                    <div class="b-shop-categories__link-wrap">
                                        <a href="/my/clothes?t=reserved">Зарезервированные</a>
                                    </div>
                                    <div class="b-shop-categories__counter-wrap">
                                        <span class="b-shop-categories__counter">
                                            <?php
                                                $c3 = Product::model()->user(Yii::app()->user->id)->status(3)->findAll();
                                                $sum1 = count($c3);
                                                echo $sum1;
                                            ?>
                                        </span>
                                    </div>
                                </li>
<!--                                
                                <li class="b-shop-categories__item">
                                    <div class="b-shop-categories__link-wrap">
                                        <a href="/my/clothes?t=pinned">Закрепленные</a>
                                    </div>
                                    <div class="b-shop-categories__counter-wrap">
                                        <span class="b-shop-categories__counter">
                                            0
                                        </span>
                                    </div>
                                </li>
                                <li class="b-shop-categories__item">
                                    <div class="b-shop-categories__link-wrap">
                                        <a href="/my/clothes?t=inactive">Неактивные</a>
                                    </div>
                                    <div class="b-shop-categories__counter-wrap">
                                        <span class="b-shop-categories__counter">
                                            <?php
                                                $c2 = Product::model()->user(Yii::app()->user->id)->status(0)->findAll();
                                                $sum1 = count($c2);
                                                $c3 = Product::model()->user(Yii::app()->user->id)->status(4)->findAll();
                                                $sum1 = count($c3);
                                                echo $sum1;
                                            ?>
                                        </span>
                                    </div>
                                </li>
                                -->
                            </ul>
                        </div>
                        <div class="b-filter b-block">
                            <div class="b-filter__header">По категориям</div>
                            <button
                                class="b-block__subcategories-button b-button-bordered js-toggle"
                                data-toggle-classname="b-shop-categories_state_active"
                                data-target-id="categories"
                            >По категориям</button>
                            <ul id="categories" class="b-shop-categories">
                                <li class="b-shop-categories__item <?php
                                if (!isset($_GET['t'])){
                                    echo "b-shop-categories__item_state_active";
                                }
                                ?>">
                                    <div class="b-shop-categories__link-wrap">
                                        <a href="/my/clothes">Все вещи</a>
                                    </div>
                                    <div class="b-shop-categories__counter-wrap">
                                        <span class="b-shop-categories__counter">
                                            <?php
                                                $c1 = Product::model()->user(Yii::app()->user->id)->status(1)->findAll();
                                                $sum1 = count($c1);
                                                $c2 = Product::model()->user(Yii::app()->user->id)->status(2)->findAll();
                                                $sum1 += count($c2);
                                                $c3 = Product::model()->user(Yii::app()->user->id)->status(3)->findAll();
                                                $c4 = Product::model()->user(Yii::app()->user->id)->status(0)->findAll();
                                                $sum1 += count($c4);
                                                $sum1 += count($c3);
                                                echo $sum1;
                                            ?>
                                        </span>
                                    </div>
                                </li></ul>
                        </div>
                        
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <div class="b-section b-section_bg_footer">
        <footer class="b-section__container">
            <div class="b-footer b-section__vertical-indent">
    <div class="b-footer-info">
        <p class="b-footer-info__copyright">&copy; 2018 <a href="/" class="b-footer-info__link">Modnekublo.com.ua</a>
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

    </div>

    <script>
    window.staticUrl = '/assets/';
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
    </script>



    <?php
    
    //Yii::app()->clientScript->scriptMap=array(
    //    'jquery.js'=>false,
//);
   // $cs=Yii::app()->clientScript;
//$cs->scriptMap=array(
 //   'jquery.js'=>'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js?1',
//); 
//$cs->registerScriptFile('jquery.js',CClientScript::POS_HEAD);
?>
    <script type="text/javascript" src="<?php echo $this->themeCss; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $this->themeCss; ?>/assets/build/script.js"></script>
    <script defer src="<?php echo $this->themeCss; ?>/assets/build/shared.js"></script>
    <script defer src="<?php echo $this->themeCss; ?>/assets/build/global.js"></script>
<!--    <script defer src="<?php echo $this->themeCss; ?>/assets/build/new_listing.js"></script> -->
    <script>
    $(document).ready(function() {
        //$('.dropdown-toggle').dropdown();
    });
    </script>
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