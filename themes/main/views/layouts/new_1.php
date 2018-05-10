<!DOCTYPE html>
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
// if($this->beginCache($id, array('duration'=>3600))) {
?>
<?php
	if (Yii::app()->user->isGuest){
		Yii::app()->redirect('/');
	} else {
		echo $this->renderPartial('//layouts/header_logged');
	}
?>
<!--<a href="https://www.facebook.com/v2.9/dialog/oauth?client_id=741607065872333&redirect_uri=http://test-pro.adr.com.ua">Login</a>-->

    <div class="b-section">
        <div class="b-section__container b-add-product js-add-product">
            <form name="product-form" enctype="multipart/form-data" id="Product-form" data-reactroot="" action="/new" method="post">
				
				<!-- loading photos -->
				<div class="b-form-row">
				
					<h2 class="b-title_type_thin b-add-product__title">Загрузите фотографии</h2>
					<div class="b-section"></div>
					<div class="b-section">
						<div class="b-info-slider b-add-product__slider">
						<div class="b-info-slider__item">
							<div class="b-inline">
								<div class="b-info-slider__image-wrap">
								<img class="b-info-slider__image" src="<?php echo $this->themeCss; ?>/assets/helper/1+.jpg" alt="Не правильно" width="100" height="140">
								<img class="b-info-slider__image" src="<?php echo $this->themeCss; ?>/assets/helper/1-.jpg" alt="Правильно" width="100" height="140">
							</div>
							<div class="b-info-slider__wrapper">
								<h4 class="b-info-slider__title">Правильный ракурс</h4>
								<p>Сделайте фото одежды на модели или на вешалке, так она будет выглядеть намного лучше, чем на полу или кровати. На главном фото вещь должна быть показана в полный рост.</p>
							</div>
						</div>
						</div>
						<ul class="b-info-slider__pagination">
							<li class="b-info-slider__pagination-item b-info-slider__pagination-item_state_active"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
							<li class="b-info-slider__pagination-item"></li>
						</ul>
						</div>
						<!--
						<div class="b-add-product__button-wrapper">
							<button class="b-button b-image-upload b-add-product__button" type="button">
								<svg class="b-button_icon_cloud"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--upload"/></svg>
								<!-- react-text: 28 -->Перейти к загрузке фотографий<!-- /react-text -->
						<!--	</button>
						</div>
						-->
					</div>
					<div class="b-image-upload">
						<div class="b-image-upload__alert">Первое фото станет обложкой карточки товара</div>
						<div class="b-image-upload__count">
						<!-- react-text: 254 -->(<!-- /react-text --><!-- react-text: 255 -->0<!-- /react-text --><!-- react-text: 256 --> из 3 загружено)<!-- /react-text -->
						<span class="b-image-upload__loader b-hidden">
							<img src="/assets/img/uploading.gif">
						</span>
						</div>
						<ul class="b-image-upload__list">
						<li class="b-image-upload__item">
							<div class="b-image-upload___item-inner">
								<div class="b-image-upload___content">
								<svg class="b-image-upload__icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--square"/></svg>
								<div class="b-image-upload__text">
								<span class="b-image-upload__link">Загрузите</span>
								<!-- react-text: 266 -->фото вас в изделии в полном размере<!-- /react-text -->
								</div>
								</div>
								<div class="b-image-upload__image-container">
								<img id="b-image-upload__image2" class="b-image-upload__image" src="#" alt="your image" style="height:100%;">
								</div>
								<input class="style-input-js" name="upload-img2" value="" type="hidden">
								<input id="upload-img2" class="b-image-upload__upload-input" name="upload-img2" accept="image/*" title="Кликните для выбора фото" multiple="" type="file">
							</div>
							<div class="b-imgage-main"><input name="image-main" type="checkbox" style="display:none;"><p class='img-main1' style="cursor: pointer;">Главное</p></div>
						</li>

						<li class="b-image-upload__item">
						<div class="b-image-upload___item-inner">
						<div class="b-image-upload___content">
						<svg class="b-image-upload__icon">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--label"/>
						</svg>
						<div class="b-image-upload__text">
						<span class="b-image-upload__link">Загрузите</span>
						<!-- react-text: 299 -->фото бирочки изделия<!-- /react-text -->
						</div>
						</div>
						<div class="b-image-upload__image-container">
						<img id="b-image-upload__image1" class="b-image-upload__image" src="#" alt="your image" style="height:100%;">
						</div>
						<input class="style-input-js" name="cover-style" value="" type="hidden">
						<input id="upload-img1" class="b-image-upload__upload-input" name="upload-img1" accept="image/*" title="Кликните для выбора фото" multiple="" type="file">
						</div>
							<div class="b-imgage-main b-green">
                                                            <input id='image-main' name="image-main" type="hidden" value="1" style="display:none;"><p class='img-main2' style="cursor: pointer;">Сделать главным</p>
                                                        </div>
						</li>
						<li class="b-image-upload__item">
						<div class="b-image-upload___item-inner">
						<div class="b-image-upload___content">
						<svg class="b-image-upload__icon">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--drop"/>
						</svg>
						<div class="b-image-upload__text">
						<span class="b-image-upload__link">Загрузите</span>
						<!-- react-text: 310 -->фото пятен или других недостатков<!-- /react-text -->
						</div>
						</div>
						<div class="b-image-upload__image-container">
                                                    <img id="b-image-upload__image3"  class="b-image-upload__image3" src="#" alt="" style="height:100%;">
						</div>
                                                    <input class="style-input-js" name="cover-style" value="" type="hidden">
                                                    <input id="upload-img3" class="b-image-upload__upload-input" name="upload-img3" accept="image/*" title="Кликните для выбора фото" multiple="" type="file">
						</div>
						<div class="b-imgage-main b-green">
                                                    <input name="image-main" type="checkbox" style="display:none;"><p class='img-main3' style="cursor: pointer;">Сделать главным</p>
                                                </div>
						</li>
						</ul>
					<style>
					.b-imgage-main.b-green{
						background: rgba(89, 203, 39, 0.4);
					}
					.b-imgage-main {
						height: 2.5em;
						vertical-align: middle;
						background: rgba(43, 71, 171, 0.27);/*rgba(234,23,44,0.5);*/
						padding: 0;
						margin: 1px 5px;
						text-align: center;
                                                display: none;
					}
					.b-imgage-main > p {
						text-align: center;
						position: relative;
						top: 50%;
						-ms-transform: translateY(-50%);
						-webkit-transform: translateY(-50%);
						transform: translateY(-50%);
					}
					</style>
                                        
                                        <script>
                                        $( document ).ready(function() {
                                            $("p.img-main1").click(function () {
                                                $("input#image-main").val("1");
                                            //    $(this).parent("div.b-imgage-main").css('display','block');
                                                $(this).parent("div.b-imgage-main").removeClass("b-green");
                                                $(this).text("Главное");
                                                $("p.img-main2").text("Сделать главным");
                                                $("p.img-main3").text("Сделать главным");
                                                $("p.img-main2").parent("div.b-imgage-main").addClass("b-green");
                                                $("p.img-main3").parent("div.b-imgage-main").addClass("b-green");
                                           });
                                           
                                           $("p.img-main2").click(function () {
                                               $("input#image-main").val("2");
                                            //   $(this).parent("div.b-imgage-main").css('display','block');
                                               $(this).parent("div.b-imgage-main").removeClass("b-green");
                                               $(this).text("Главное");
                                              
                                               $("p.img-main1").text("Сделать главным");
                                               $("p.img-main3").text("Сделать главным");
                                               $("p.img-main1").parent("div.b-imgage-main").addClass("b-green");
                                               $("p.img-main3").parent("div.b-imgage-main").addClass("b-green");
                                           });
                                           
                                           $("p.img-main3").click(function () {
                                             $("input#image-main").val("3");
                                             
                                             $(this).parent("div.b-imgage-main").removeClass("b-green");
                                               $(this).text("Главное");
                                               $("p.img-main1").text("Сделать главным");
                                               $("p.img-main2").text("Сделать главным");
                                             $("p.img-main2").parent("div.b-imgage-main").addClass("b-green");
                                             $("p.img-main1").parent("div.b-imgage-main").addClass("b-green");
                                           });
                                       });
                                        </script>
						<script type="text/javascript">
						function readURL(input) {

							if (input.files && input.files[0]) {
								var reader = new FileReader();

								reader.onload = function (e) {
									$('#b-image-upload__image1').attr('src', e.target.result);
									$('#b-image-upload__image1').show();
                                                                        $("p.img-main2").parent("div.b-imgage-main").css('display','block');
								};

								reader.readAsDataURL(input.files[0]);
							}
						}

						$("#upload-img1").change(function(){
							readURL(this);
							
						});
						
						//photo 2
						function readURL2(input) {

							if (input.files && input.files[0]) {
								var reader = new FileReader();

								reader.onload = function (e) {
									$('#b-image-upload__image2').attr('src', e.target.result);
									$('#b-image-upload__image2').show();
                                                                        $("p.img-main1").parent("div.b-imgage-main").css('display','block');
								};

								reader.readAsDataURL(input.files[0]);
							}
						}

						$("#upload-img2").change(function(){
							readURL2(this);
							
						});
						
						//photo 3
						function readURL3(input) {

							if (input.files && input.files[0]) {
								var reader = new FileReader();

								reader.onload = function (e) {
									$('#b-image-upload__image3').attr('src', e.target.result);
									$('#b-image-upload__image3').show();
                                                                        $("p.img-main3").parent("div.b-imgage-main").css('display','block');
								};

								reader.readAsDataURL(input.files[0]);
							}
						}

						$("#upload-img3").change(function(){
							readURL3(this);
							
						});
						</script>
						
						
						<span>
						<!-- react-text: 316 -->Вы можете изменить порядок фотографий, перемещая их с помощью мыши.<!-- /react-text -->
						<!-- react-text: 317 --><!-- /react-text -->
						</span>
					</div>
				</div>
				<!-- end loading photos -->
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Опишите вашу вещь</h2>
                    <div class="b-section"></div>
                    <ul class="b-describe">
                        <li class="b-describe__item b-describe__item_span_2">
                        <label for="product-name" class="b-describe__label">Название *</label>
                        <input type="text" class="b-form-input b-describe__input b-describe__form_item" id="product-name" placeholder="Например: Платье в горошек RESERVED" autocomplete="off" maxlength="100" value="" name="title">
                        </li>
                        <li class="b-describe__item">
                            <label for="product-condition" class="b-describe__label">Состояние *</label>
<!--                            
                            <div class="Select Select--single product-condition">
                                <div class="Select-control">
                                    <span class="Select-multi-value-wrapper" id="react-select-2--value">
                                        <div class="Select-placeholder">Выберите</div>
                                        <div role="combobox" aria-expanded="false" aria-owns="react-select-2--value" aria-activedescendant="react-select-2--value" class="Select-input" tabindex="0" aria-readonly="false" style="border: 0px; width: 1px; display: inline-block;"></div>
                                    </span>
                                    <span class="Select-arrow-zone"><span class="Select-arrow"></span></span>
                                </div>
                    <div class="Select-menu-outer" style="display: none;">
                    <div class="Select-menu">
                        <div class="Select-option">Новое</div>
                        <div class="Select-option">Идеальное</div>
                        <div class="Select-option">Очень хорошее</div>
                    </div>
                    </div>
                        </div>
                            -->
                            
<select style="width:100%;" name="Product[state]" id="Product_state">
<option value="0">Новое</option>
<option value="1">Идеальное</option>
<option value="2">Хорошее</option>
</select>

                        </li>
                        <li class="b-describe__item"><label for="product-brand" class="b-describe__label">Бренд</label>
                <?php
                $cl_all = Client::model()->findAll();
                $a= CHtml::listData($cl_all,'clid','cl_name');
		echo CHtml::dropDownList('brand','',$a,array('class'=>'form-control'));
                ?>
                        </li><li class="b-describe__item b-describe__item_span_2"><label for="product-description" class="b-describe__label">Описание</label><textarea class="b-form-textarea b-describe__form_item" id="product-description" name="description" placeholder="Например: в этом платье, Вы будете королевой" maxlength="4096"></textarea></li><li class="b-describe__item"><label for="product-consist" class="b-describe__label">Состав</label><textarea class="b-form-textarea b-describe__form_item" id="product-consist" name="composition" placeholder="Например: 50% лен,50% котон" maxlength="250"></textarea></li><li class="b-describe__item"><label for="product-pay" class="b-describe__label">Оплата и доставка</label><textarea class="b-form-textarea b-describe__form_item" id="product-pay" name="delivery" placeholder="Например: Отправлю вещь только после оплаты половины на карточку"></textarea></li></ul>
                </div>
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Выберите категорию</h2>
                    <!-- start custom content list categories -->

	      <?php
        $cl_all = Category::model()->findAll('c_pid is null');
        $a= CHtml::listData($cl_all,'cid','c_name');
	echo CHtml::dropDownList('first_cat','',$a,array('class'=>'form-control',
                    'prompt'=>'Выберите категорию',
                    'ajax'=> array(
                        'type'=>'post',
                        'url'=>CController::createUrl('site/batch'),
                        'update'=>'#second_cat',
                        'data'=> array('cid' => 'js:this.value'),
                       // 'dataType' => 'JSON',  
                    )
                    ));

                

    echo CHtml::dropDownList('second_cat','', array(),array(
        'class'=>'form-control',
        'empty'=>'Выберите сначала основную категорию',
        'style'=>'margin-top:20px;'
        ));
?>
                    
                    
	  	<style>
		#first_cat,#second_cat {
			font-size: 18px;
			font-weight: bolder;
			height: 40px;
			padding-bottom: 0;
			padding-top: 0;
		}
		</style>
                    <!-- end custom content list categories -->
                    <div class="b-section"></div>
                    <noscript></noscript>
                    <div class="b-choose-category" style="display:none;">
                        <ul class="b-choose-category__list">
                            <li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--outerwears"></use>
				</svg><span>Верхняя одежда</span>
                            </li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--dress"></use>
				</svg>
				<span>Платья</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--skirt"></use>
				</svg>
				<span>Юбки</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--t-shirt"></use>
				</svg>
				<span>Майки и футболки</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--clothes"></use>
				</svg>
				<span>Рубашки и блузы</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--pants"></use>
				</svg>
				<span>Брюки</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shorts"></use>
				</svg>
				<span>Шорты</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweater"></use>
				</svg>
				<span>Кофты</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sweamwear"></use>
				</svg>
				<span>Нижнее белье</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--shoes"></use>
				</svg>
				<span>Туфли</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--boots"></use>
				</svg>
				<span>Сапоги и ботинки</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sneakers"></use>
				</svg>
				<span>Кроссовки и кеды</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--sandals"></use>
				</svg>
				<span>Босоножки и шлепанцы</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--bag"></use>
				</svg>
				<span>Аксессуары</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--cosmetics"></use>
				</svg>
				<span>Косметика</span>
				</li>
				<li class="b-choose-category__item">
				<svg class="b-choose-category__icon">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--paper-bag"></use>
				</svg>
				<span>Другие вещи</span>
				</li>
				</ul>
				</div>
				<svg class="b-add-product__swipe"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrows"></use>
				</svg>
				<div class="b-choose-category__chosen b-hidden">
				<svg class="b-choose-category__delete">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--close"></use>
				</svg>
				<strong>Подкатегория:</strong>
				<!-- react-text: 123 --> <!-- /react-text --><span></span>
				</div>
				</div>

                <div class="b-form-row b-hidden2" id="sizex">
                    <h2 class="b-title_type_thin b-add-product__title">Выберите размер</h2>
                    <div class="b-section"></div>
                    <input type="checkbox" class="b-form-check-input" id="several_sizes" value="on">
                    <label for="several_sizes" class="b-form-checkbox b-choose-size__label">У меня есть несколько размеров</label>
                    <div class="b-choose-size__notification b-hidden">Хорошо, выберите основной размер</div>
                    <div class="b-choose-size">
                        <div class="b-choose-size__list">
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="1" name="size" value="1">
                                <div>XXS</div>
                                <strong>32</strong>
                                <div>4</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="2" name="size" value="2">
                                <div>XS</div>
                                <strong>34</strong>
                                <div>6</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="3" name="size" value="3">
                                <div>S</div>
                                <strong>36</strong>
                                <div>8</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="4" name="size" value="4">
                                <div>M</div>
                                <strong>38</strong>
                                <div>10</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="5" name="size" value="5">
                                <div>L</div>
                                <strong>40</strong>
                                <div>12</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="6" name="size" value="6">
                                <div>XL</div>
                                <strong>42</strong>
                                <div>14</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="7" name="size" value="7">
                                <div>XXL</div>
                                <strong>44</strong>
                                <div>16</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="8" name="size" value="8">
                                <div>XXXL</div>
                                <strong>46</strong>
                                <div>18</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="9" name="size" value="9">
                                <div> 4XL</div>
                                <strong>48</strong>
                                <div>20</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="10" name="size" value="10">
                                <div>5XL</div>
                                <strong>50</strong>
                                <div>22</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input type="radio" class="b-hidden" id="11" name="size" value="11">
                                <div>One size</div>
                            </label>
                                
                        </div>
                            
                    </div>
                    <svg class="b-add-product__swipe">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrows"></use>
                    </svg>
                </div>


                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Выберите цвет товара</h2>
                    <div class="b-section"></div>

                    <div class="b-choose-color">
                        <ul class="b-choose-color__list">
                            <!--
                            <li class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="border: 2px solid rgb(245, 240, 239);">&nbsp;</span>
                                <div class="b-choose-color__name">Белый</div>
                            </li>
                            -->
                    <?php
                    //echo print_r($this->getColors(),true);
                     
                    $cs = $this->getcolors();
                    $l_count = 0;
                    foreach ($cs as $cs => $val){
                         //echo $val['cp_name']."<br/>";
                         //echo $val['cp_rgb']."<br/>";
                         echo '<li id="'.$l_count.'" class="b-choose-color__item">
                                <input type="checkbox" class="b-hidden" value="on">
                                <span class="b-choose-color__color" style="border: 2px solid'.$val['cp_rgb'].';background-color:'.$val['cp_rgb'].'">&nbsp;</span>
                                <div class="b-choose-color__name">'.$val['cp_name'].'</div>
                            </li>';
                    $l_count++;
                    }
                    ?>
                            <script type="text/javascript">
                            $( document ).ready(function() {
                                $(".b-choose-color__item").on("click.someNamespace", function() {
                                //console.log("anonymous!");
                                var ctxt1 ="";
                                //ctxt1 = $(this).children(".b-choose-color__name").text();
                                ctxt1 = $(this).attr('id');
                                //console.log(ctxt1);
                                $("#pr_color1").val(ctxt1);
                                $("#pr_color1").attr('val',ctxt1);
                                var clid = $(this).attr('id');
                                //console.log("ID "+clid);
                                colcnt();
                                clearCols(clid);
                            });
                                
                            
                            function clearCols(i){
                                var clName = '.c'+i;
                                //console.log("ID IN FUNC"+i);
                                for (c = 0; c < 17; c++) {
                                    clName = 'c'+c;
                                    clName.toString();
                                    //console.log("CL name "+clName);
                                    if (i != c){
                                        $('li#'+c+'.'+clName).removeClass(clName);
                                                //console.log("class removed");
                                    }
                                }
                            }
                            
                            function colcnt(){                        
                                var clcnt = 0;
                                if ( $(".c0").length > 0)
                                    clcnt++;
                                if ($(".c1").length > 0)
                                    clcnt++;
                                if ($(".c2").length > 0)
                                    clcnt++;
                                if ($(".c3").length > 0)
                                    clcnt++;
                                if ($(".c4").length > 0)
                                    clcnt++;
                                if ($(".c5").length > 0)
                                    clcnt++;
                                if ($(".c6").length > 0)
                                    clcnt++;
                                if ($(".c7").length > 0)
                                    clcnt++;
                                if ($(".c8").length > 0)
                                    clcnt++;
                                if ($(".c9").length > 0)
                                    clcnt++;
                                if ($(".c10").length > 0)
                                    clcnt++;
                                if ($(".c11").length > 0)
                                    clcnt++;
                                if ($(".c12").length > 0)
                                    clcnt++;
                                if ($(".c13").length > 0)
                                    clcnt++;
                                if ($(".c14").length > 0)
                                    clcnt++;
                                if ($(".c15").length > 0)
                                    clcnt++;
                                if ($(".c16").length > 0)
                                    clcnt++;
                                
                                console.log(clcnt);
                            }
                            });
                            </script>
                        </ul>
                    <input class="form-control" id="pr_color1" type="text" name="pr_color1" value="" style="display:none;" />
                    
                    </div>
                    <svg class="b-add-product__swipe">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrows"></use>
                    </svg>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input name="pr_color2" class="form-check-input" type="checkbox" value="0" rel="pr_color2" />

                        У меня несколько цветов данного товара
                      </label>
                    </div>
                </div>
                <script>
                    var chk = $('input[rel="pr_color2"]');
//                    chk.each(function(){
//                        var v = $(this).attr('checked') == 'checked'?1:0;
//                        $(this).after('<input type="hidden" name="'+$(this).attr('rel')+'" value="'+v+'" />');
//                    });

                    chk.change(function(){ 
                        var v = $(this).is(':checked')?1:0;
                        $(this).val(v);
                    });
                </script>
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Условия продажи</h2>
                    <div class="b-section"></div>
                    <div class="b-info-columns salex">
                        <label class="b-info-columns__item" for="price" style="width:50%;display: inline-table;">
                            <div class="b-info-columns__title">
                                <svg class="b-info-columns__icon">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--price"></use>
                                </svg>
                                <!-- react-text: 206 -->Оплата
                                <!-- /react-text -->
                            </div>
                            <span class="b-info-columns__left-part">
                                <input type="text" id="price" value="" class="b-form-input" placeholder="300" autocomplete="off" name="price" style="color:#000;">
                            </span>
                            <span class="b-info-columns__right-part">грн.</span>
                        </label>

                    </div>
                </div>
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Продвижение объявления</h2>
                    <div class="b-section"></div>
                    <div class="b-info-columns seox">
                        <label class="b-info-columns__item" for="priced">
                            <div class="b-info-columns__title">
                                <svg class="b-info-columns__icon b-info-columns__icon_color_green">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--paperplane"></use>
                                </svg>
                                <!-- react-text: 226 -->ТОП-объявление на 14 дней
                                <!-- /react-text -->
                            </div><span><!-- react-text: 228 -->Помещается в отдельном блоке над обычными объявлениями в каталоге и в блоке "ТОП объявления" на страницах товаров. <!-- /react-text --><a class="b-desktop-only b-desktop-only__inline-block" href="http://fontez.com/page/bloki-razmesheniya-top-obyavleniy">Посмотреть пример</a></span>
                            <ul class="b-info-columns__list">
                                <li class="b-info-columns__list-item">
                                    <svg class="b-info-columns__list-icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--check"></use>
                                    </svg>
                                    <!-- react-text: 233 -->Примерно в 10 раз больше просмотров
                                    <!-- /react-text -->
                                </li>
                                <li class="b-info-columns__list-item">
                                    <svg class="b-info-columns__list-icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--check"></use>
                                    </svg>
                                    <!-- react-text: 236 -->Примерно в 5 раз больше откликов
                                    <!-- /react-text -->
                                </li>
                                <li class="b-info-columns__list-item">
                                    <svg class="b-info-columns__list-icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--check"></use>
                                    </svg>
                                    <!-- react-text: 239 -->Продажа в несколько раз быстрее
                                    <!-- /react-text -->
                                </li>
                            </ul>
                        </label>
                        <label class="b-info-columns__item" for="exchange">
                            <input type="radio" class="b-hidden" id="exchange" name="promotion-type" value="exchange" title="overall type: UNKNOWN_TYPE
    server type: NO_SERVER_DATA
    heuristic type: UNKNOWN_TYPE
    label: ТОП-объявление на 14 днейПомещается в отдельном блоке над обычными объявлениями в каталоге и в блоке
    parseable name: promotion-type
    field signature: 4049213747
    form signature: 12874694538832266849" autofill-prediction="UNKNOWN_TYPE">
                            <div class="b-info-columns__title">Обычное объявление</div><span>Стандартное объявление, помещается в общий каталог</span></label>
                    </div>
                </div>
                <div class="b-form-row b-add-product__footer">
                    <input type="checkbox" class="b-form-check-input" id="i-took-pic" value="on" title="overall type: UNKNOWN_TYPE
    server type: NO_SERVER_DATA
    heuristic type: UNKNOWN_TYPE
    label: Я добавила как минимум одно фото вещи, которое сделала сама. Почему это важно?
    parseable name: i-took-pic
    field signature: 1901163510
    form signature: 12874694538832266849" autofill-prediction="UNKNOWN_TYPE">
                    <label for="i-took-pic" class="b-form-checkbox b-add-product__checkbox">
                        <!-- react-text: 247 -->Я добавила как минимум одно фото вещи, которое сделала сама.
                        <!-- /react-text --><a href="http://fontez.com/page/trebovaniya-k-obyavleniyam#photo" target="_blank">Почему это важно?</a></label>
                    <button class="b-button b-add-product__add-button" type="submit">Добавить вещь</button>
                    <div class="b-section"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="b-section b-section_bg_footer">
        <footer class="b-section__container">
            <div class="b-footer b-section__vertical-indent">
                <div class="b-footer-info">
                    <p class="b-footer-info__copyright">&copy; 2017 <a href="/" class="b-footer-info__link">modnekublo.com.ua</a>
                        <span class="b-footer-info__text">Модная женская одежда и аксессуары по доступной цене. Все права защищены</span>
                    </p>
                    <ul class="b-footer-info__list b-footer-list">
                        <li class="b-footer-list__item">
                            <a class="b-footer-list__link" rel="nofollow" href="/page/rabota-v-shafe">Работа в Шафе</a>
                        </li>
                        <li class="b-footer-list__item">
                            <a class="b-footer-list__link" href="http://blog.fontez.com/">Наш блог</a>
                        </li>
                        <li class="b-footer-list__item">
                            <a class="b-footer-list__link" href="/page/kak-eto-rabotaet">Как это работает?</a>
                        </li>
                        <li class="b-footer-list__item">
                            <a class="b-footer-list__link" href="/privacy-policy">Privacy policy</a>
                        </li>
                        <li class="b-footer-list__item">
                            <a class="b-footer-list__link" href="/terms-of-service">Договор-оферта</a>
                        </li>
                        <li class="b-footer-list__item">
                            <a class="b-footer-list__link" rel="nofollow" href="https://plus.google.com/108317175350006940956">Мы в Google+</a>
                        </li>
                    </ul>
                </div>
            </div>
        <div class="fontez" style="display: none;">
        <p>Developed by <a href="https://vk.com/fontez">FonteZ</a></p>
    </div>
    </div>
    <div class="">
        <div class="b-modal__overlay" id="category-select" style="display:none;">
            <div class="b-modal" tabindex="-1" aria-label="Modal">
                <div class="b-tree"><a href="#" class="b-tree__link b-togglable b-togglable__down">Верхняя одежда</a>
                    <ul class="b-tree__list b-tree__list_state_active">
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Пальто</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Плащи</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Куртки</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Шубы</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Жилетки</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                        <li class="b-tree__item">
                            <div class="b-tree"><a href="#" id="category-select-close" class="b-tree__link b-togglable">Пиджаки и жакеты</a>
                                <ul class="b-tree__list b-tree__list_state_active"></ul>
                            </div>
                        </li>
                    </ul>
                </div>
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
</body>

</html>
