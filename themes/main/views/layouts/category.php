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
        <div class="b-section__container b-main">
            <div class="b-main__content">
                <div class="b-main__inner js-pjax-mount">
                    <div class="b-main__block">
    <div class="b-block">
        <ul class="b-breadcrumbs">
            
                <li class="b-breadcrumbs__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a href="/"
                       itemprop="url">
                        <span itemprop="title">Главная</span>
                    </a>
                </li>
            
                <li class="b-breadcrumbs__item" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a href="/category/jenskaya-odejda/"
                       itemprop="url">
                        <span itemprop="title"><?php echo $this->cname; ?></span>
                    </a>
                </li>
            
<!--                <li class="b-breadcrumbs__item">
                    Верхняя одежда
                </li>
-->
            
        </ul>
    </div>

    

    <div class="b-block b-catalog-title">
        <h1 class="b-title_type_catalog b-catalog-title__text">
            <?php echo $this->cname; ?>
        </h1>

        <p class="b-catalog-title__count">- <?php echo $this->dataProvider->totalItemCount; ?> вещи</p>
    </div>
<!--
    <div class="b-block">
        <button
            class="b-block__subcategories-button b-button-bordered js-toggle"
            data-toggle-classname="b-subcategories_state_active"
            data-target-id="subcategories">Подкатегории</button>
        <ul id="subcategories" class="b-subcategories">
            <li class="b-subcategories__item b-subcategories__item_mobile">
                <div class="b-subcategories__inner">
                    <div class="b-subcategories__link-wrap">
                        <a class="b-link_theme_green js-ga-onclick"
                           href="/new-arrivals?category=3"
                           data-event-category="Catalog"
                           data-event-action="New Arrivals from mobile catalog"
                           data-event-label="">
                            Новинки в рубрике</a>
                    </div>
                    <div class="b-subcategories__counter-wrap"></div>
                </div>
            </li><li class="b-subcategories__item">
                    <div class="b-subcategories__inner">
                        <div class="b-subcategories__link-wrap">
                            <a href="/women/verhnyaya-odezhda/palto">
                                Пальто
                            </a>
                        </div>
                        <div class="b-subcategories__counter-wrap">
                            <span class="b-subcategories__counter">
                                36408
                            </span>
                        </div>
                    </div>
                </li><li class="b-subcategories__item">
                    <div class="b-subcategories__inner">
                        <div class="b-subcategories__link-wrap">
                            <a href="/women/verhnyaya-odezhda/plashi">
                                Плащи
                            </a>
                        </div>
                        <div class="b-subcategories__counter-wrap">
                            <span class="b-subcategories__counter">
                                11536
                            </span>
                        </div>
                    </div>
                </li><li class="b-subcategories__item">
                    <div class="b-subcategories__inner">
                        <div class="b-subcategories__link-wrap">
                            <a href="/women/verhnyaya-odezhda/kurtki">
                                Куртки
                            </a>
                        </div>
                        <div class="b-subcategories__counter-wrap">
                            <span class="b-subcategories__counter">
                                65307
                            </span>
                        </div>
                    </div>
                </li><li class="b-subcategories__item">
                    <div class="b-subcategories__inner">
                        <div class="b-subcategories__link-wrap">
                            <a href="/women/verhnyaya-odezhda/shuby">
                                Шубы
                            </a>
                        </div>
                        <div class="b-subcategories__counter-wrap">
                            <span class="b-subcategories__counter">
                                13250
                            </span>
                        </div>
                    </div>
                </li><li class="b-subcategories__item">
                    <div class="b-subcategories__inner">
                        <div class="b-subcategories__link-wrap">
                            <a href="/women/verhnyaya-odezhda/zhiletki">
                                Жилетки
                            </a>
                        </div>
                        <div class="b-subcategories__counter-wrap">
                            <span class="b-subcategories__counter">
                                16019
                            </span>
                        </div>
                    </div>
                </li><li class="b-subcategories__item">
                    <div class="b-subcategories__inner">
                        <div class="b-subcategories__link-wrap">
                            <a href="/women/verhnyaya-odezhda/pidzhaki-i-zhakety">
                                Пиджаки и жакеты
                            </a>
                        </div>
                        <div class="b-subcategories__counter-wrap">
                            <span class="b-subcategories__counter">
                                46332
                            </span>
                        </div>
                    </div>
                </li></ul>
    </div>
-->

    <div class="b-block b-gslot-catalog">
        
<!--            
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Shafa cat top -->
			<!--
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-6433908226769098"
                 data-ad-slot="2169609474"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            
        -->
    </div>

    <div class="b-block" style="display:none;"><div class="b-block__item b-search-result-meta">
        
        

    </div><div class="b-block__sorting b-block__item">
            Сортировать:
                <span class="b-sort">
                    <select class="b-sort__select js-catalog-sorting" name="sorting">
                        <option value="1"
                                >
                            по популярности
                        </option>
                        <option value="2"
                                >
                            от дешевых к дорогим
                        </option>
                        <option value="3"
                                >
                            от дорогих к дешевым
                        </option>
                        <option value="4"
                                >
                            по дате добавления
                        </option>
                    </select>
                </span>
        </div>
    </div>

    
            
<?php echo $content; ?> 


        
<!--            
    <div class="b-pagination b-block">
        <ul class="b-pagination__list">
            
                <li class="b-pagination__item b-pagination__item_state_active">
                    <a class="b-pagination__link js-catalog-pagination" href="?page=1" data-page="1">1</a>
                </li>
                
                <li class="b-pagination__item ">
                    <a class="b-pagination__link js-catalog-pagination" href="?page=2" data-page="2">2</a>
                </li>
                
                <li class="b-pagination__item ">
                    <a class="b-pagination__link js-catalog-pagination" href="?page=3" data-page="3">3</a>
                </li>
                
                <li class="b-pagination__item ">
                    <a class="b-pagination__link js-catalog-pagination" href="?page=4" data-page="4">4</a>
                </li>
                
                <li class="b-pagination__item b-pagination__item_type_next">
                    <a class="b-pagination__link js-catalog-pagination"
                       href="?page=2"
                       data-page="2">Следующая страница</a>
                </li>
            
        </ul>
    </div>

     -->   

    

    <div class="b-block b-gslot-catalog">
    <!--
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Shafa cat bottom -->
		<!--
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6400000000000000"
             data-ad-slot="5000820000"
             data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        
    -->
    </div>


        <div class="b-unstyled b-noselect">
            <h2><span style="font-size:14px">Женская верхняя одежда - какую выбрать и где купить</span></h2>

<p>Женская верхняя одежда важная часть современного модного гардероба. С наступлением холодов без нее не обойтись. Каждый интернет магазин предложит тебе широкий ассортимент, но как же выбрать и можно ли купить ее дешево?&nbsp;</p>

<h3><span style="font-size:14px">Недорогая верхняя одежда бу на осень и весну</span></h3>

<p>Весна и осень самые капризные и непредсказуемые времена года. Ведь, выходя утром из дома, мы зачастую не знаем, какая погода нас ожидает. Поэтому на эти сезоны нам необходимо несколько вариантов верхней одежды.&nbsp;<br />
Легкая ветровка или пиджак защитят от первых холодов и ветра.&nbsp;<br />
Стильный дождевик не позволит первому дождику намочить тебя. Но не носи его без особой надобности, ведь такая одежда шьется из синтетических тканей и не пропускает воздух.&nbsp;<br />
Когда осень вступит в свои права, в ход пойдут разнообразные куртки. Они могут быть тканевыми, кожаными или из кожзама, джинсовые, дутые. На более прохладное время подойдет плащ или <a href="http://fontez.com/women/verhnyaya-odezhda/palto">пальто</a>. Большое разнообразие моделей и тканей, из которых они шьются, позволят легко выбрать то, что тебе подойдет и будет соответствовать твоему стилю.&nbsp;</p>


<h3><span style="font-size:14px">Зимняя верхняя одежда</span></h3>

<p>Зимы у нас тоже бывают капризными и морозы чередуются с дождями. Поэтому если ты выбираешь один вариант зимней верхней одежды, то она должна быть теплой и водонепроницаемой. Тут тебе поможет пуховик со специальной водоотталкивающей пропиткой.&nbsp;<br />
Если же у тебя есть возможность подобрать несколько вещей на зиму, то у тебя большой выбор: от лютых морозов тебя защитит шуба, <a href="http://fontez.com/38-dublenki.html">дубленка</a> или пуховик. На более теплую зиму подойдет утепленное пальто с меховым воротником.<br />
Любительницам активного зимнего отдыха стоит выбрать хороший лыжный костюм. Он защитит от ветра и дождя, а также не будет сковывать движений. А если под него ты наденешь термобелье и флисовую кофту, то тебе не будут страшны никакие морозы.&nbsp;</p>

<h3><span style="font-size:14px">Верхняя одежда на лето</span></h3>

<p>Лето иногда тоже не радует нас погодой и временами нам приходится доставать теплую одежду. На лето подойдут легкие <a href="http://fontez.com/women/verhnyaya-odezhda/pidzhaki-i-zhakety">пиджаки и жакеты</a>, ветровки, курточки из флиса и жилеты.&nbsp;</p>

<h3><span style="font-size:14px">Где купить недорого женскую верхнюю одежду в Украине на сезон 2018?</span></h3>

<p>Множество магазинов продают женскую одежду. Но зачем тратить время и деньги, если в Шафе тебя ждет большой выбор брендов верхней одежды и самые разнообразные модели! Заходи в наш онлайн каталог верхней женской одежды и выбирай по фото то, что тебе подходит. Общайся напрямую с продавцом, выбирай лучшие цены и ищи скидки. Ведь Модне кубло не просто интернет магазин, где можно дешево купить отличную одежду, а постоянно действующая распродажа. Задавай свои вопросы, договаривайся о скидке, проси выслать тебе точные замеры или более подробные фото. Твой заказ будет отправлен по Украине выбранной транспортной компанией. А тебе останется лишь дождаться его и наслаждаться обновками.&nbsp;<br />
Удачных тебе покупок!</p>

        </div>

</div>
                </div>
            </div>
            <aside class="b-main__aside">
                <div class="b-main__inner b-filter" id="filters">
                    <!--
                    <button
                        class="b-filter__button b-button-bordered js-toggle"
                        data-toggle-classname="b-filter_state_active"
                        data-target-id="filters"
                    >Фильтры</button>
<?php
$model = $this->model_search;
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'product-filter-form',
//    'method'=>'get',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // See class documentation of CActiveForm for details on this,
    // you need to use the performAjaxValidation()-method described there.
    'enableAjaxValidation'=>false,
));
?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <?php echo $form->labelEx($model,'pd_size'); ?>
        <?php echo $form->checkBox($model,'pd_size'); ?>
        <?php echo $form->error($model,'pd_size'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>


<?php
Yii::app()->clientScript->registerScript('search', "
$('#product-filter-form').submit(function(){
    data = $(this).serialize();
        $.fn.yiiListView.update('catview', {
            data: data,
            success: function(data){alert(data);}
        });
        return false;
});
"); 
?>
    
<!-- form -->

                    <div class="js-filters-containers">
                        <div data-reactroot="">
						<div class="b-filter__header">Фильтры</div>
						<div class="b-filter__section b-filter__section_state_active">
							<p class="b-filter__title">Размер</p>
                                                        
							<ul class="b-filter__content b-cell-list">
								<li class="b-cell-list__item">
									<input id="1" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-1">32/XXS</label>
								</li>
								<li class="b-cell-list__item">
									<input id="2" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-2">34/XS</label>
								</li>
								<li class="b-cell-list__item">
									<input id="3" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-3">36/S</label>
								</li>
								<li class="b-cell-list__item">
									<input id="4" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-4">38/M</label>
								</li>
								<li class="b-cell-list__item">
									<input id="5" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-5">40/L</label>
								</li>
								<li class="b-cell-list__item">
									<input id="6" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-6">42/XL</label>
								</li>
								<li class="b-cell-list__item">
									<input id="7" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-7">44/XXL</label>
								</li>
								<li class="b-cell-list__item">
									<input id="8" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-8">46/3XL</label>
								</li>
								<li class="b-cell-list__item">
									<input id="9" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-9">48/4XL</label>
								</li>
								<li class="b-cell-list__item">
									<input id="10" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-10">50/5XL</label>
								</li>
								<li class="b-cell-list__item">
									<input id="11" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-11">One size</label>
								</li>
								<li class="b-cell-list__item">
									<input id="12" class="b-cell-list__input" name="size" value="on" type="checkbox">
									<label class="b-cell-list__label" for="size-12">Другой</label>
								</li>
							</ul>
							</div>
							<div id="filter-price" class="b-filter__section b-filter__section_state_active">
								<p class="b-filter__title">Цена</p>
								<div class="b-filter__content">
									<ul class="b-filter__list b-simple-list">
									<li class="b-simple-list__item">
										<input id="cost-range-0" name="cost" class="b-form-check-input" value="on" type="checkbox">
										<label for="cost-range-0" class="b-form-checkbox">До 100 грн</label>
									</li>
									<li class="b-simple-list__item">
										<input id="cost-range-1" name="cost" class="b-form-check-input" value="on" type="checkbox">
										<label for="cost-range-1" class="b-form-checkbox">От 100 до 300 грн</label>
									</li>
									<li class="b-simple-list__item">
										<input id="cost-range-2" name="cost" class="b-form-check-input" value="on" type="checkbox">
										<label for="cost-range-2" class="b-form-checkbox">От 300 до 500 грн</label>
									</li>
									<li class="b-simple-list__item">
										<input id="cost-range-3" name="cost" class="b-form-check-input" value="on" type="checkbox">
										<label for="cost-range-3" class="b-form-checkbox">От 500 до 1000 грн</label>
									</li>
									<li class="b-simple-list__item">
										<input id="cost-range-4" name="cost" class="b-form-check-input" value="on" type="checkbox">
										<label for="cost-range-4" class="b-form-checkbox">Более 1000 грн</label>
									</li>
									</ul>
<!--                                                                    
									<div class="b-filter__row">
									<label class="b-filter__label" for="cost-from">От</label>
									<div class="b-filter__input">
										<input id="cost-from" class="b-form-input" name="costFrom" value="" type="text">
									</div>
									</div>
									<div class="b-filter__row">
									<label class="b-filter__label" for="cost-to">До</label>
									<div class="b-filter__input">
										<input id="cost-to" class="b-form-input" name="costTo" value="" type="text">
									</div>
									</div>
                                                                    -->
								</div>
							</div>
							<div class="b-filter__section b-filter__section_state_active">
							<p class="b-filter__title">Цвет</p>
							<ul class="b-filter__content b-color-list">
								<li class="b-color-list__item">
								<input id="color-1" class="b-color-list__input" name="color-1" value="on" type="checkbox">
								<label class="b-color-list__label b-color-list__label_type_bordered" for="color-1" style="background-color: rgb(255, 255, 255);">Белый</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-2" class="b-color-list__input" name="color-2" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-2" style="background-color: rgb(237, 238, 240);">Серебристый</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-3" class="b-color-list__input" name="color-3" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-3" style="background-color: rgb(246, 230, 209);">Бежевый</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-4" class="b-color-list__input" name="color-4" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-4" style="background-color: rgb(167, 167, 167);">Серый</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-5" class="b-color-list__input" name="color-5" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-5" style="background-color: rgb(255, 246, 51);">Жёлтый</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-6" class="b-color-list__input" name="color-6" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-6" style="background-color: rgb(255, 225, 51);">Золотистый</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-7" class="b-color-list__input" name="color-7" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-7" style="background-color: rgb(255, 184, 51);">Оранжевый</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-8" class="b-color-list__input" name="color-8" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-8" style="background-color: rgb(255, 51, 153);">Розовый</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-9" class="b-color-list__input" name="color-9" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-9" style="background-color: rgb(217, 91, 51);">Красный</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-10" class="b-color-list__input" name="color-10" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-10" style="background-color: rgb(197, 229, 237);">Бирюзовый</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-11" class="b-color-list__input" name="color-11" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-11" style="background-color: rgb(51, 149, 210);">Синий</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-12" class="b-color-list__input" name="color-12" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-12" style="background-color: rgb(158, 155, 107);">Хаки</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-13" class="b-color-list__input" name="color-13" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-13" style="background-color: rgb(89, 175, 95);">Зелёный</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-14" class="b-color-list__input" name="color-14" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-14" style="background-color: rgb(154, 51, 155);">Фиолетовый</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-15" class="b-color-list__input" name="color-15" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-15" style="background-color: rgb(133, 93, 51);">Коричневый</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-16" class="b-color-list__input" name="color-16" value="on" type="checkbox">
								<label class="b-color-list__label" for="color-16" style="background-color: rgb(0, 0, 0);">Чёрный</label>
								</li>
								<li class="b-color-list__item">
								<input id="color-17" class="b-color-list__input" name="color-17" value="on" type="checkbox">
								<label class="b-color-list__label b-color-list__label_type_multicolored" for="color-17" style="">Разноцветный</label>
								</li>
							</ul>
							</div>
                                                <div id="filter-status" class="b-filter__section b-filter__section_state_active">
							<p class="b-filter__title">Состояние</p>
							<ul class="b-filter__content b-simple-list">
								<li class="b-simple-list__item">
								<input id="used-1" class="b-form-check-input" value="on" type="checkbox">
								<label for="used-1" class="b-form-checkbox">Новое</label>
								</li>
								<li class="b-simple-list__item">
								<input id="used-2" class="b-form-check-input" value="on" type="checkbox">
								<label for="used-2" class="b-form-checkbox">Идеальное</label>
								</li>
								<li class="b-simple-list__item">
								<input id="used-3" class="b-form-check-input" value="on" type="checkbox">
								<label for="used-3" class="b-form-checkbox">Хорошее</label>
								</li>
							</ul>
							</div>
<!--                                                
						<div id="filter-brand" class="b-filter__section b-filter__section_state_active">
							<p class="b-filter__title">Бренд</p>
							<div class="b-filter__content">
							<input class="b-filter__list b-form-input" placeholder="Поиск">
							<ul class="b-simple-list">
								<li class="b-simple-list__item">
								<input id="brand-2" class="b-form-check-input" value="on" type="checkbox">
								<label for="brand-2" class="b-form-checkbox">Atmosphere</label>
								</li>
								<li class="b-simple-list__item">
								<input id="brand-11" class="b-form-check-input" value="on" type="checkbox">
								<label for="brand-11" class="b-form-checkbox">Bershka</label>
								</li>
								<li class="b-simple-list__item">
								<input id="brand-54" class="b-form-check-input" value="on" type="checkbox">
								<label for="brand-54" class="b-form-checkbox">George</label>
								</li>
								<li class="b-simple-list__item">
								<input id="brand-63" class="b-form-check-input" value="on" type="checkbox">
								<label for="brand-63" class="b-form-checkbox">H&amp;M</label>
								</li>
								<li class="b-simple-list__item">
								<input id="brand-94" class="b-form-check-input" value="on" type="checkbox">
								<label for="brand-94" class="b-form-checkbox">Mango</label>
								</li>
								<li class="b-simple-list__item">
								<input id="brand-102" class="b-form-check-input" value="on" type="checkbox">
								<label for="brand-102" class="b-form-checkbox">New Look</label>
								</li>
								<li class="b-simple-list__item">
								<input id="brand-105" class="b-form-check-input" value="on" type="checkbox">
								<label for="brand-105" class="b-form-checkbox">Next</label>
								</li>
								<li class="b-simple-list__item">
								<input id="brand-135" class="b-form-check-input" value="on" type="checkbox">
								<label for="brand-135" class="b-form-checkbox">River Island</label>
								</li>
								<li class="b-simple-list__item">
								<input id="brand-183" class="b-form-check-input" value="on" type="checkbox">
								<label for="brand-183" class="b-form-checkbox">ZARA</label>
								</li>
								<li class="b-simple-list__item">
								<input id="brand-734" class="b-form-check-input" value="on" type="checkbox">
								<label for="brand-734" class="b-form-checkbox">Marks &amp; Spencer</label>
								</li>
							</ul>
						</div>
						</div>
                                                -->
						</div>
                    </div>

<!--                    
                    <div class="b-sidebar-links">
                        <div id="Подрубрики" class="b-filter__section b-filter__section_state_active">
                                <p class="b-filter__title js-toggle" data-target-id="Подрубрики" data-toggle-classname="b-filter__section_state_active">
                                    Подрубрики
                                </p>
                                <ul class="b-filter__content b-simple-list">
                                    
                                    <li class="b-simple-list__item">
                                        <a href="/trenchi.xhtml"
                                           class="js-ga-onclick"
                                           data-event-category="Clicks"
                                           data-event-action="From sidebar"
                                           data-event-label="/trenchi.xhtml">Тренчи</a>
                                    </li>
                                    
                                    <li class="b-simple-list__item">
                                        <a href="/dublenki.xhtml"
                                           class="js-ga-onclick"
                                           data-event-category="Clicks"
                                           data-event-action="From sidebar"
                                           data-event-label="/dublenki.xhtml">Дубленки</a>
                                    </li>
                                    
                                    <li class="b-simple-list__item">
                                        <a href="/zhenskie-dozhdeviki.xhtml"
                                           class="js-ga-onclick"
                                           data-event-category="Clicks"
                                           data-event-action="From sidebar"
                                           data-event-label="/zhenskie-dozhdeviki.xhtml">Дождевики</a>
                                    </li>
                                    
                                    <li class="b-simple-list__item">
                                        <a href="/puhoviki-puhovye-palto.xhtml"
                                           class="js-ga-onclick"
                                           data-event-category="Clicks"
                                           data-event-action="From sidebar"
                                           data-event-label="/puhoviki-puhovye-palto.xhtml">Пуховики</a>
                                    </li>
                                    
                                </ul>
                            </div>
                    </div>
-->

<!--                    
                    <div class="b-sidebar-links">
                        <div id="filter-crosslinking" class="b-filter__section b-filter__section_state_active">
                            <p class="b-filter__title js-toggle" data-target-id="filter-crosslinking" data-toggle-classname="b-filter__section_state_active">Популярные бренды</p>
                            <ul class="b-filter__content b-simple-list b-filter__content_with_scroll">
                                <li class="b-simple-list__item">
                                    <a href="/tureckie-puhoviki.xhtml"
                                       class="js-ga-onclick"
                                       data-event-category="Clicks"
                                       data-event-action="From sidebar"
                                       data-event-label="/tureckie-puhoviki.xhtml">
                                        
                                    </a>
                                </li><li class="b-simple-list__item">
                                    <a href="/puhoviki-mango.xhtml"
                                       class="js-ga-onclick"
                                       data-event-category="Clicks"
                                       data-event-action="From sidebar"
                                       data-event-label="/puhoviki-mango.xhtml">
                                        Mango
                                    </a>
                                </li><li class="b-simple-list__item">
                                    <a href="/puhoviki-savage.xhtml"
                                       class="js-ga-onclick"
                                       data-event-category="Clicks"
                                       data-event-action="From sidebar"
                                       data-event-label="/puhoviki-savage.xhtml">
                                        Savage
                                    </a>
                                </li><li class="b-simple-list__item">
                                    <a href="/puhoviki-gap.xhtml"
                                       class="js-ga-onclick"
                                       data-event-category="Clicks"
                                       data-event-action="From sidebar"
                                       data-event-label="/puhoviki-gap.xhtml">
                                        GAP
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    -->
<!--                    
                    <div class="b-sidebar-links">
                        <div id="filter-crosslinking" class="b-filter__section b-filter__section_state_active">
                            <p class="b-filter__title js-toggle" data-target-id="filter-crosslinking" data-toggle-classname="b-filter__section_state_active">Другие города</p>
                            <ul class="b-filter__content b-simple-list b-filter__content_with_scroll">
                                <li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-belaya-cerkov">Верхняя одежда  в Белой Церкви</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-vinnica">Верхняя одежда  в Виннице</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-dnepropetrovsk">Верхняя одежда  в Днепропетровске</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-zhitomir">Верхняя одежда  в Житомире</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-zaporozhe">Верхняя одежда  в Запорожье</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-kirovograd">Верхняя одежда  в Кировограде</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-kremenchug">Верхняя одежда  в Кременчуге</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-krivoy-rog">Верхняя одежда  в Кривом Роге</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-lugansk">Верхняя одежда  в Луганске</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-luck">Верхняя одежда  в Луцке</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-lvov">Верхняя одежда  в Львове</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-mariupol">Верхняя одежда  в Мариуполе</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-nikolaev">Верхняя одежда  в Николаеве</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-odessa">Верхняя одежда  в Одессе</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-poltava">Верхняя одежда  в Полтаве</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-rovno">Верхняя одежда  в Ровно</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-sumy">Верхняя одежда  в Сумах</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-ternopol">Верхняя одежда  в Тернополе</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-uzhgorod">Верхняя одежда  в Ужгороде</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-harkov">Верхняя одежда  в Харькове</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-herson">Верхняя одежда  в Херсоне</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-hmelnickiy">Верхняя одежда  в Хмельницком</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-cherkassy">Верхняя одежда  в Черкассах</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-chernigov">Верхняя одежда  в Чернигове</a>
                                </li><li class="b-simple-list__item">
                                    <a href="/women/verhnyaya-odezhda/gorod-chernovcy">Верхняя одежда  в Черновцах</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    -->
                </div>
<!--                
                <div class="b-desktop-only">
                    
                    <div class="b-main__inner b-filter">
                        <div class="b-filter__header">Статьи</div>
                        <div class="b-sidebar-links">
                            <div class="b-filter__section b-filter__section_state_active">
                                <ul class="b-simple-list">
                                <li class="b-simple-list__item">
                                        <a href="http://blog.fontez.com/vyibiraem-zhenskiy-puhovik-intervyu-s-predstavitelem-populyarnyih-kanadskih-brendov/" target="_blank" class="b-sidebar-links__article">
                                            <img class="b-sidebar-links__article_image" src="" alt="Как выбрать пуховик"/>
                                            <span class="b-sidebar-links__article_text">Как выбрать пуховик</span>
                                        </a>
                                    </li><li class="b-simple-list__item">
                                        <a href="http://blog.fontez.com/luchshie-brendyi-puhovikov/" target="_blank" class="b-sidebar-links__article">
                                            <img class="b-sidebar-links__article_image" src="" alt="Популярные ..."/>
                                            <span class="b-sidebar-links__article_text">Популярные бренды пуховиков</span>
                                        </a>
                                    </li><li class="b-simple-list__item">
                                        <a href="http://blog.fontez.com/kak-vyibrat-palto-na-zimu-7-pravil-poiska-ideala/" target="_blank" class="b-sidebar-links__article">
                                            <img class="b-sidebar-links__article_image" src="" alt="Как выбрать ..."/>
                                            <span class="b-sidebar-links__article_text">Как выбрать пальто на зиму: 7 правил поиска идеала</span>
                                        </a>
                                    </li><li class="b-simple-list__item">
                                        <a href="http://blog.fontez.com/kak-vyibrat-nedoroguju-shubu-iz-naturalnogo-meha/" target="_blank" class="b-sidebar-links__article">
                                            <img class="b-sidebar-links__article_image" src="" alt="Выбираем ..."/>
                                            <span class="b-sidebar-links__article_text">Выбираем недорогую шубу из кролика, мутона, нутрии и лисы</span>
                                        </a>
                                    </li><li class="b-simple-list__item">
                                        <a href="http://blog.fontez.com/kak-kupit-nedorogo-norkovuyu-shubu-v-ukraine/" target="_blank" class="b-sidebar-links__article">
                                            <img class="b-sidebar-links__article_image" src="" alt="Как купить ..."/>
                                            <span class="b-sidebar-links__article_text">Как купить недорогую норковую шубу бу</span>
                                        </a>
                                    </li><li class="b-simple-list__item">
                                        <a href="http://blog.fontez.com/kak-vyibrat-nedoroguyu-shubu-iz-iskusstvennogo-meha/" target="_blank" class="b-sidebar-links__article">
                                            <img class="b-sidebar-links__article_image" src="" alt="Как выбрать бу ..."/>
                                            <span class="b-sidebar-links__article_text">Как выбрать бу шубу из искусственного меха</span>
                                        </a>
                                    </li><li class="b-simple-list__item">
                                        <a href="http://blog.fontez.com/mehovyie-zhenskie-shubyi-vse-chto-tyi-hotela-znat/" target="_blank" class="b-sidebar-links__article">
                                            <img class="b-sidebar-links__article_image" src="" alt="Как выбрать ..."/>
                                            <span class="b-sidebar-links__article_text">Как выбрать шубу: полное руководство</span>
                                        </a>
                                    </li><li class="b-simple-list__item">
                                        <a href="http://blog.fontez.com/verhnyaya-odezhda-na-zimu-2014-kak-vyibrat/" target="_blank" class="b-sidebar-links__article">
                                            <img class="b-sidebar-links__article_image" src="" alt="Выбираем ..."/>
                                            <span class="b-sidebar-links__article_text">Выбираем недорогую зимнюю одежду: пальто, пуховик или куртка?</span>
                                        </a>
                                    </li><li class="b-simple-list__item">
                                        <a href="http://blog.fontez.com/brendovyie-zhenskie-palto-v-shafe/" target="_blank" class="b-sidebar-links__article">
                                            <img class="b-sidebar-links__article_image" src="" alt="Брнедовые пальто ..."/>
                                            <span class="b-sidebar-links__article_text">Брнедовые пальто в Шафе</span>
                                        </a>
                                    </li><li class="b-simple-list__item">
                                        <a href="http://blog.fontez.com/kak-vyibrat-zhenskoe-palto-i-plashh/" target="_blank" class="b-sidebar-links__article">
                                            <img class="b-sidebar-links__article_image" src="" alt="Как выбрать плащ ..."/>
                                            <span class="b-sidebar-links__article_text">Как выбрать плащ и пальто</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </aside>
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
                   href="https://plus.google.com/">Мы в Google+</a>
            </li>
        </ul>
    </div>
</div>


    </div>
	<?php
/*
	$cs = Yii::app()->clientScript;
        foreach($this->includePackages as $package)
            $cs->registerPackage($package);
        // Инициируем переменные JS
        if ($this->jsVars) {
            echo "<script type=\"text/javascript\">\n";
            foreach($this->jsVars as $name=>$value)
                echo (strpos($name,'[')===false?'var ':'    '). "$name = $value;\n";
            echo "</script>\n";
        }
		$jqueryPath = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('system.web.js.source'));
		Yii::app()->clientScript->registerScriptFile($jqueryPath.'/jquery.ba-bbq.min.js',CClientScript::POS_HEAD);
*/
?>
<?php

?>
		<script>

		</script>
<script>
    window.staticUrl = '<?php echo $this->themeCss; ?>/assets/';
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
</script>



<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>



    <scriptt defer src="<?php echo $this->themeCss; ?>assets/build/catalog.js"></scriptt>
	
<script type="text/javascript" src="<?php echo $this->themeCss; ?>/js/bootstrap.min.js"></script>


    <script>
    OLD_JQUERY(function($) {
        //$('.dropdown-toggle').dropdown();
        $(".js-catalog-menu").on("click",function(e){
            $(".js-catalog-menu").each(function(){
                $(this).removeClass("b-nav__item_state_opened");
            });
        });

        $('#catview').yiiListView({'ajaxUpdate':[],'ajaxVar':'ajax','pagerClass':'pager','loadingClass':'list\x2Dview\x2Dloading','sorterClass':'sorter','enableHistory':false});
        


        $("ul.b-cell-list > li.b-cell-list__item").click(function(e){
//            e.preventDefault();
            var in_value = $(this).children("input.b-cell-list__input").attr('id');
            console.log(in_value);
            $(this).children("input.b-cell-list__input").prop("checked", true);
//            $(document.body).append(form);
            $('<form name="size" action="" method="POST">' + 
    '<input type="hidden" name="size" value="' + in_value + '">' +
    '</form>').appendTo($(document.body)).submit();
        });

        ///////filter price
        $("ul.b-simple-list > li.b-simple-list__item").click(function(e){
//            e.preventDefault();
            var in_value = $(this).children("input.b-form-check-input").attr('id');
            console.log(in_value);
            $(this).children("input.b-form-check-input").prop("checked", true);
//            $(document.body).append(form);
            $('<form name="price" action="" method="POST">' + 
    '<input type="hidden" name="price" value="' + in_value + '">' +
    '</form>').appendTo($(document.body)).submit();
        });
        
        /////filter color
        $("ul.b-color-list > li.b-color-list__item").click(function(e){
//            e.preventDefault();
            var in_value = $(this).children("input.b-color-list__input").attr('id');
            console.log(in_value);
            $(this).children("input.b-color-list__input").prop("checked", true);
//            $(document.body).append(form);
            $('<form name="color" action="" method="POST">' + 
    '<input type="hidden" name="color" value="' + in_value + '">' +
    '</form>').appendTo($(document.body)).submit();
        });
        
        
        ///////filter price
        $("div#filter-status ul.b-simple-list > li.b-simple-list__item").click(function(e){
//            e.preventDefault();
            var in_value = $(this).children("input.b-form-check-input").attr('id');
            console.log(in_value);
            $(this).children("input.b-form-check-input").prop("checked", true);
//            $(document.body).append(form);
            $('<form name="status" action="" method="POST">' + 
    '<input type="hidden" name="status" value="' + in_value + '">' +
    '</form>').appendTo($(document.body)).submit();
        });
        
    });
    </script>
<?php
//set size filter state
if ( isset(Yii::app()->session['filter_size']) ){
    $szid = Yii::app()->session['filter_size'];
Yii::app()->clientScript->registerScript('sized', "
    OLD_JQUERY(function($) {
$('#".$szid."').prop('checked',true);
    });
", CClientScript::POS_END); 
}
?>
<?php
//set price filter state
if ( isset($_POST['price']) ){
    if ( isset(Yii::app()->session['filter_price']) ){
//    if ( Yii::app()->session['filter_price'] !== $_POST['price'] ){
    $price_id = $_POST['price'];
Yii::app()->clientScript->registerScript('priced', "
    OLD_JQUERY(function($) {
$('#".$price_id."').prop('checked',true);
    });
", CClientScript::POS_END);
//    }
    }
} else {
    if ( isset(Yii::app()->session['filter_price']) ){
//        if ( Yii::app()->session['filter_price'] !== '' ){
        $price_id = Yii::app()->session['filter_price'];
Yii::app()->clientScript->registerScript('priced', "
    OLD_JQUERY(function($) {
$('#".$price_id."').prop('checked',true);
    });
", CClientScript::POS_END);
//    }
    }
}
?>
<?php
//set color filter state
//if ( isset($_POST['color']) ){
//    if ( Yii::app()->session['filter_color'] !== '' ){
//    $color_id = $_POST['color'];
//Yii::app()->clientScript->registerScript('coloring', "
//    OLD_JQUERY(function($) {
//$('#".$color_id."').prop('checked',true);
//    });
//", CClientScript::POS_END);
//    }
//} else {
    if ( isset(Yii::app()->session['filter_color']) ) {
        if ( Yii::app()->session['filter_color'] !== '' ){
            $color_id = Yii::app()->session['filter_color'];
Yii::app()->clientScript->registerScript('coloring', "
    OLD_JQUERY(function($) {
$('#".$color_id."').prop('checked',true);
    });
", CClientScript::POS_END);
        }
    }
//}
?>
    
<?php
//set state filter state
if ( isset($_POST['status']) ){
    if ( isset(Yii::app()->session['filter_status']) ){
//    if ( Yii::app()->session['filter_price'] !== $_POST['price'] ){
    $stat_id = $_POST['status'];
Yii::app()->clientScript->registerScript('stated', "
    OLD_JQUERY(function($) {
$('#".$stat_id."').prop('checked',true);
    });
", CClientScript::POS_END);
//    }
    }
} else {
    if ( isset(Yii::app()->session['filter_status']) ){
//        if ( Yii::app()->session['filter_price'] !== '' ){
        $stat_id = Yii::app()->session['filter_status'];
Yii::app()->clientScript->registerScript('stated', "
    OLD_JQUERY(function($) {
$('#".$stat_id."').prop('checked',true);
    });
", CClientScript::POS_END);
//    }
    }
}
?>
</body>
</html>