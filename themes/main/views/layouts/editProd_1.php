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
        <div class="b-section__container b-add-product js-add-product">
                <?php
                    $options = array(
                    //    'controller'=>$this,
                        'id'=>'product-form',
                        'htmlOptions'=>array('enctype'=>'multipart/form-data','name'=>'product-form'),
                        //'bootstrapValidation'=>true,
                        'enableAjaxValidation'=>true,
                        'clientOptions'=>[
                            'validateOnSubmit'=>true
                            ],
                    );
                    $form=$this->beginWidget('CActiveForm', $options);
                    //echo $form->errorSummary();
                ?>
            
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Загрузите фотографии</h2>
                    <div class="b-section"></div>
                    
					<div class="b-image-upload">
						<div class="b-image-upload__alert">Первое фото станет обложкой карточки товара</div>
						<div class="b-image-upload__count">
						<!-- react-text: 254 -->(<!-- /react-text --><!-- react-text: 255 -->0<!-- /react-text --><!-- react-text: 256 --> из 5 загружено)<!-- /react-text -->
						<span class="b-image-upload__loader b-hidden">
							<img src="/assets/img/uploading.gif">
						</span>
						</div>
						<ul class="b-image-upload__list">
						<li class="b-image-upload__item">
							<div class="b-image-upload___item-inner">
								<div class="b-image-upload___content">
								<svg class="b-image-upload__icon">
                                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--square"/></svg>
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
							<div class="b-imgage-main"><input name="image-main" type="checkbox" style="display:none;"><p>Главное</p></div>
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
							<div class="b-imgage-main b-green"><input name="image-main" type="checkbox" style="display:none;"><p>Сделать главным</p></div>
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
						<div class="b-imgage-main b-green"><input name="image-main" type="checkbox" style="display:none;"><p>Сделать главным</p></div>
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
						<script type="text/javascript">
						function readURL(input) {

							if (input.files && input.files[0]) {
								var reader = new FileReader();

								reader.onload = function (e) {
									$('#b-image-upload__image1').attr('src', e.target.result);
									$('#b-image-upload__image1').show();
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
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Опишите вашу вещь</h2>
                    <div class="b-section"></div>
                    <ul class="b-describe">
                        <li class="b-describe__item b-describe__item_span_2">
                            <label class="b-describe__label" for="product-name">Название *</label>
<!--                            <input name="title" value="Великолепное платье из струящегося шелковистого трикотажа" maxlength="100" autocomplete="off" placeholder="Например: Супер платье в горошек Zara" id="product-name" class="b-form-input b-describe__input b-describe__form_item" type="text">-->
                            <?php echo $form->textField($this->model, 'pd_name', array('class'=>'b-form-input b-describe__input b-describe__form_item')); ?>
                        </li>
                        <li class="b-describe__item">
                            <label class="b-describe__label" for="product-condition">Состояние *</label>
                            <div class="Select Select--single has-value"><input value="1" name="condition" type="hidden">
                                <div class="Select-control">
                                    <span id="react-select-2--value" class="Select-multi-value-wrapper">
                                        <div class="Select-value">
                                            <span id="react-select-2--value-item" aria-selected="true" role="option" class="Select-value-label">Новое</span>
                                        </div>
                                            <div style="border: 0px none; width: 1px; display: inline-block;" aria-readonly="false" tabindex="0" class="Select-input" aria-activedescendant="react-select-2--value" aria-owns="" aria-expanded="false" role="combobox">
                                
                                        </div>
                                    </span>
                                    <span class="Select-arrow-zone">
                                        <span class="Select-arrow"></span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="b-describe__item">
                            <label class="b-describe__label" for="product-brand">Бренд</label>
                            <?php echo $form->dropDownList($this->model, 'brand', Client::model()->listNames(),array('prompt'=>'Без бренда','style'=>'width:100%;')); ?>
                        </li>
                        <li class="b-describe__item b-describe__item_span_2">
                            <label class="b-describe__label" for="product-description">Описание</label>
<!--                            <textarea maxlength="4096" placeholder="Например: в этой блузке вы будете выглядеть, как звезда" name="description" id="product-description" class="b-form-textarea b-describe__form_item">Платье говорит само за себя. Оно шикарно. И обладательница этого шедевра будет им довольна не один сезон. Качество отменное. Размер 18. На ог 118-122, от 100, об 118-122 см. Цена 350 грн</textarea>-->
                            <?php echo $form->textArea($this->model,'content_long',array('class'=>'b-form-textarea b-describe__form_item')); ?>
                        </li>
                        <li class="b-describe__item">
                            <label class="b-describe__label" for="product-consist">Состав</label>
<!--                            <textarea maxlength="250" placeholder="Например: 60% хлопок, 40% шерсть" name="composition" id="product-consist" class="b-form-textarea b-describe__form_item"></textarea>-->
                            <?php echo $form->textArea($this->model,'pd_source',array('class'=>'b-form-textarea b-describe__form_item')); ?>
                        </li>
                        <li class="b-describe__item">
                            <label class="b-describe__label" for="product-pay">Оплата и доставка</label>
<!--                            <textarea placeholder="Например: Отправлю вещь только после оплаты половины на карточку" name="delivery" id="product-pay" class="b-form-textarea b-describe__form_item">предоплата на карту, отправка в течении суток</textarea>-->
                            <?php echo $form->textArea($this->model,'pd_transport',array('class'=>'b-form-textarea b-describe__form_item')); ?>
                        </li>
                    </ul>
                </div>
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Выберите категорию</h2>
                    <div class="b-image-upload__alert">
                        <!-- react-text: 97 -->Товар размещен в рубрике <!-- /react-text -->
                        <strong>Женская одежда / Платья / Длинные платья</strong>
                        <!-- react-text: 99 -->. Рубрику изменить нельзя.<!-- /react-text -->
                    </div>
                </div>
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Выберите размер</h2>
                    <div class="b-section"></div>
                    <input value="on" id="several_sizes" class="b-form-check-input" type="checkbox">
                    <label class="b-form-checkbox b-choose-size__label" for="several_sizes">У меня есть несколько размеров</label>
                    <div class="b-choose-size__notification b-hidden">Хорошо, выберите основной размер</div>
                    <div class="b-choose-size">
                        <div class="b-choose-size__list">
                            <label class="b-choose-size__item">
                                <input value="1" name="size" id="1" class="b-hidden" type="radio">
                                <div>XXS</div>
                                <strong>32</strong>
                                <div>4</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input value="2" name="size" id="2" class="b-hidden" type="radio">
                                <div>XS</div>
                                <strong>34</strong>
                                <div>6</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input value="3" name="size" id="3" class="b-hidden" type="radio">
                                <div>S</div>
                                <strong>36</strong>
                                <div>8</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input value="4" name="size" id="4" class="b-hidden" type="radio">
                                <div>M</div>
                                <strong>38</strong>
                                <div>10</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input value="5" name="size" id="5" class="b-hidden" type="radio">
                                <div>L</div>
                                <strong>40</strong>
                                <div>12</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input value="6" name="size" id="6" class="b-hidden" type="radio">
                                <div>XL</div>
                                <strong>42</strong>
                                <div>14</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input value="7" name="size" id="7" class="b-hidden" type="radio">
                                <div>XXL</div>
                                <strong>44</strong>
                                <div>16</div>
                            </label>
                            <label class="b-choose-size__item b-choose-size__item_state_active">
                                <input value="8" name="size" id="8" class="b-hidden" type="radio">
                                <div>XXXL</div>
                                <strong>46</strong>
                                <div>18</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input value="9" name="size" id="9" class="b-hidden" type="radio">
                                <div> 4XL</div>
                                <strong>48</strong>
                                <div>20</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input value="10" name="size" id="10" class="b-hidden" type="radio">
                                <div>5XL</div>
                                <strong>50</strong>
                                <div>22</div>
                            </label>
                            <label class="b-choose-size__item">
                                <input value="11" name="size" id="11" class="b-hidden" type="radio">
                                <div>One size</div>
                            </label>
                                
                        </div>
                            
                    </div>
                    <svg class="b-add-product__swipe">
                    <use xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--arrows"></use>
                    </svg>
                </div>
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Выберите до 2 оттенков</h2>
                    <div class="b-section"></div>
                    <div class="b-choose-color">
                        <ul class="b-choose-color__list">
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="border: 2px solid rgb(245, 240, 239);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Белый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(237, 238, 240);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Серебристый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(246, 230, 209);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Бежевый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(167, 167, 167);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Серый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(255, 246, 51);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Жёлтый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(255, 225, 51);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Золотистый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(255, 184, 51);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Оранжевый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(255, 51, 153);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Розовый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(217, 91, 51);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Красный</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(197, 229, 237);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Бирюзовый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(51, 149, 210);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Синий</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(158, 155, 107);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Хаки</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(89, 175, 95);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Зелёный</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(154, 51, 155);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Фиолетовый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(133, 93, 51);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Коричневый</div>
                            </li>
                            <li class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background-color: rgb(0, 0, 0);" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Чёрный</div>
                            </li>
                            <li style="background-color: rgba(255, 237, 36, 0.2);" class="b-choose-color__item">
                                <input value="on" class="b-hidden" type="checkbox">
                                <span style="background: transparent linear-gradient(rgb(255, 237, 36), rgb(66, 255, 110), rgb(121, 149, 255)) repeat scroll 0% 0%;" class="b-choose-color__color">&nbsp;</span>
                                <div class="b-choose-color__name">Разноцветный</div>
                            </li>
                        </ul>
                            
                    </div>
                    <svg class="b-add-product__swipe">
                    <use xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--arrows"></use>
                    </svg>
                </div>
                <div class="b-form-row">
                    <h2 class="b-title_type_thin b-add-product__title">Условия продажи</h2>
                    <div class="b-section"></div>
                    <div class="b-info-columns">
                        <label for="price" class="b-info-columns__item b-info-columns__item_state_active">
                            <div class="b-info-columns__title">
                                <svg class="b-info-columns__icon"><use xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--price"></use>
                                </svg>
                                <!-- react-text: 243 -->Оплата<!-- /react-text -->
                            </div>
                            <span class="b-info-columns__left-part">
                                <input name="price" autocomplete="off" placeholder="150" class="b-form-input" value="350" id="price" type="text">
                            </span>
                            <span class="b-info-columns__right-part">грн.</span>
                        </label>
                        <label for="gift" class="b-info-columns__item">
                            <input value="gift" name="sale-type" id="gift" class="b-hidden" type="radio">
                            <div class="b-info-columns__title">
                                <svg class="b-info-columns__icon"><use xlink="http://www.w3.org/1999/xlink" xlink:href="https://shafa.ua/sprites/defs/svg/sprite.defs.svg#static--svg--gift"></use>
                                </svg>
                                <!-- react-text: 251 -->Подарок<!-- /react-text -->
                            </div>
                            <span><!-- react-text: 253 -->Сделайте кому-то <!-- /react-text --><br><!-- react-text: 255 -->приятно<!-- /react-text --></span>
                        </label>
                    </div>
                </div>
                <div class="b-form-row b-add-product__footer">
                    <input value="on" id="i-took-pic" class="b-form-check-input" type="checkbox">
                    <label class="b-form-checkbox b-add-product__checkbox" for="i-took-pic">
                        <!-- react-text: 259 -->Я добавила как минимум одно фото вещи, которое сделала сама. <!-- /react-text -->
                        <a target="_blank" href="http://shafa.ua/page/trebovaniya-k-obyavleniyam#photo">Почему это важно?</a>
                    </label>
                    <button type="submit" class="b-button b-add-product__add-button">Добавить вещь</button>
                        <?php // echo CHtml::submitButton('Добавить вещь',array('class' => 'b-button b-add-product__add-button',)); ?>
                    <div class="b-section"></div>
                    
                </div>

<?php $this->endWidget(); ?>
        </div>
    </div>

    <div class="b-section b-section_bg_footer">
        <footer class="b-section__container">
            <div class="b-footer b-section__vertical-indent">
    <div class="b-footer-info">
        <p class="b-footer-info__copyright">© 2017 <a href="https://shafa.ua/" class="b-footer-info__link">Shafa.ua</a>
            <span class="b-footer-info__text">Модная женская одежда и аксессуары по доступной цене. Все права защищены</span>
        </p>
        <ul class="b-footer-info__list b-footer-list">
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" rel="nofollow" href="https://shafa.ua/page/rabota-v-shafe">Работа в Шафе</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" href="http://blog.shafa.ua/">Наш блог</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" href="https://shafa.ua/page/kak-eto-rabotaet">Как это работает?</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" href="https://shafa.ua/privacy-policy">Privacy policy</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" href="https://shafa.ua/terms-of-service">Договор-оферта</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" rel="nofollow" href="https://plus.google.com/108317175350006940956">Мы в Google+</a>
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


<script type="application/json+context">{"subcategory": {"size_group_id": 1, "title": "\u0414\u043b\u0438\u043d\u043d\u044b\u0435 \u043f\u043b\u0430\u0442\u044c\u044f", "id": 13, "has_one_size": true, "has_other_size": false, "children": null}, "supercategory": null, "searchData": {"size_groups": {"1": {"id": 1, "name": "\u041e\u0434\u0435\u0436\u0434\u0430", "sizes": [{"is_one_size": false, "is_other_size": false, "id": 1, "title": "32 / 4 / XXS"}, {"is_one_size": false, "is_other_size": false, "id": 2, "title": "34 / 6 / XS"}, {"is_one_size": false, "is_other_size": false, "id": 3, "title": "36 / 8 / S"}, {"is_one_size": false, "is_other_size": false, "id": 4, "title": "38 / 10 / M"}, {"is_one_size": false, "is_other_size": false, "id": 5, "title": "40 / 12 / L"}, {"is_one_size": false, "is_other_size": false, "id": 6, "title": "42 / 14 / XL"}, {"is_one_size": false, "is_other_size": false, "id": 7, "title": "44 / 16 / XXL"}, {"is_one_size": false, "is_other_size": false, "id": 8, "title": "46 / 18 / XXXL"}, {"is_one_size": false, "is_other_size": false, "id": 9, "title": "48 / 20 /  4XL"}, {"is_one_size": false, "is_other_size": false, "id": 10, "title": "50 / 22 / 5XL"}, {"is_one_size": true, "is_other_size": false, "id": 11, "title": "One size"}, {"is_one_size": false, "is_other_size": true, "id": 12, "title": "\u0414\u0440\u0443\u0433\u043e\u0439"}]}, "2": {"id": 2, "name": "\u041e\u0431\u0443\u0432\u044c", "sizes": [{"is_one_size": false, "is_other_size": false, "id": 31, "title": "34"}, {"is_one_size": false, "is_other_size": false, "id": 32, "title": "35"}, {"is_one_size": false, "is_other_size": false, "id": 33, "title": "36"}, {"is_one_size": false, "is_other_size": false, "id": 34, "title": "37"}, {"is_one_size": false, "is_other_size": false, "id": 35, "title": "38"}, {"is_one_size": false, "is_other_size": false, "id": 36, "title": "39"}, {"is_one_size": false, "is_other_size": false, "id": 37, "title": "40"}, {"is_one_size": false, "is_other_size": false, "id": 38, "title": "41"}, {"is_one_size": false, "is_other_size": false, "id": 39, "title": "42"}, {"is_one_size": false, "is_other_size": false, "id": 40, "title": "43"}, {"is_one_size": true, "is_other_size": false, "id": 47, "title": "One size"}, {"is_one_size": false, "is_other_size": true, "id": 48, "title": "\u0414\u0440\u0443\u0433\u043e\u0439"}]}, "3": {"id": 3, "name": "\u0414\u0436\u0438\u043d\u0441\u044b", "sizes": [{"is_one_size": false, "is_other_size": false, "id": 49, "title": "24 / 25"}, {"is_one_size": false, "is_other_size": false, "id": 50, "title": "26 / 27"}, {"is_one_size": false, "is_other_size": false, "id": 51, "title": "27 / 28"}, {"is_one_size": false, "is_other_size": false, "id": 52, "title": "29 / 30"}, {"is_one_size": false, "is_other_size": false, "id": 53, "title": "31 / 32"}, {"is_one_size": false, "is_other_size": false, "id": 54, "title": "32 / 33"}, {"is_one_size": false, "is_other_size": false, "id": 55, "title": "34"}, {"is_one_size": false, "is_other_size": false, "id": 56, "title": "34 / 35"}, {"is_one_size": false, "is_other_size": false, "id": 57, "title": "35"}, {"is_one_size": false, "is_other_size": false, "id": 58, "title": "36"}, {"is_one_size": true, "is_other_size": false, "id": 59, "title": "One size"}, {"is_one_size": false, "is_other_size": true, "id": 60, "title": "\u0414\u0440\u0443\u0433\u043e\u0439"}]}, "4": {"id": 4, "name": "\u041e\u0434\u0435\u0436\u0434\u0430 \u0434\u043b\u044f \u043c\u0430\u043b\u044b\u0448\u0435\u0439", "sizes": [{"is_one_size": false, "is_other_size": false, "id": 122, "title": "0-1 \u043c\u0435\u0441"}, {"is_one_size": false, "is_other_size": false, "id": 123, "title": "1-3 \u043c\u0435\u0441"}, {"is_one_size": false, "is_other_size": false, "id": 124, "title": "3-6 \u043c\u0435\u0441"}, {"is_one_size": false, "is_other_size": false, "id": 125, "title": "6-9 \u043c\u0435\u0441"}, {"is_one_size": true, "is_other_size": false, "id": 128, "title": "One size"}, {"is_one_size": false, "is_other_size": true, "id": 129, "title": "\u0414\u0440\u0443\u0433\u043e\u0439"}, {"is_one_size": false, "is_other_size": false, "id": 126, "title": "12 \u043c\u0435\u0441"}, {"is_one_size": false, "is_other_size": false, "id": 127, "title": "18 \u043c\u0435\u0441"}]}, "5": {"id": 5, "name": "\u041e\u0431\u0443\u0432\u044c \u0434\u043b\u044f \u043c\u0430\u043b\u044b\u0448\u0435\u0439", "sizes": [{"is_one_size": false, "is_other_size": false, "id": 133, "title": "19"}, {"is_one_size": false, "is_other_size": false, "id": 134, "title": "20"}, {"is_one_size": false, "is_other_size": false, "id": 130, "title": "16"}, {"is_one_size": false, "is_other_size": false, "id": 131, "title": "17"}, {"is_one_size": false, "is_other_size": false, "id": 132, "title": "18"}, {"is_one_size": false, "is_other_size": false, "id": 135, "title": "21"}]}, "6": {"id": 6, "name": "\u0414\u0435\u0442\u0441\u043a\u0430\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "sizes": [{"is_one_size": false, "is_other_size": false, "id": 61, "title": "2\u0433\u043e\u0434\u0430 / 92\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 62, "title": "3\u0433\u043e\u0434\u0430 / 98\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 63, "title": "4\u0433\u043e\u0434\u0430 / 104\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 64, "title": "5\u043b\u0435\u0442 / 110\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 65, "title": "6\u043b\u0435\u0442 / 116\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 66, "title": "7\u043b\u0435\u0442 / 122\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 67, "title": "8\u043b\u0435\u0442 / 128\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 68, "title": "9\u043b\u0435\u0442 / 134\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 69, "title": "10\u043b\u0435\u0442 / 140\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 70, "title": "11\u043b\u0435\u0442 / 146\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 71, "title": "12\u043b\u0435\u0442 / 152\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 72, "title": "13\u043b\u0435\u0442 / 158\u0441\u043c"}, {"is_one_size": false, "is_other_size": false, "id": 73, "title": "14\u043b\u0435\u0442 / 164\u0441\u043c"}, {"is_one_size": true, "is_other_size": false, "id": 74, "title": "One size"}, {"is_one_size": false, "is_other_size": true, "id": 75, "title": "\u0414\u0440\u0443\u0433\u043e\u0439"}]}, "7": {"id": 7, "name": "\u041e\u0431\u0443\u0432\u044c \u0434\u043b\u044f \u0434\u0435\u0432\u043e\u0447\u0435\u043a", "sizes": [{"is_one_size": false, "is_other_size": false, "id": 88, "title": "22"}, {"is_one_size": false, "is_other_size": false, "id": 89, "title": "23"}, {"is_one_size": false, "is_other_size": false, "id": 90, "title": "24"}, {"is_one_size": false, "is_other_size": false, "id": 91, "title": "25"}, {"is_one_size": false, "is_other_size": false, "id": 92, "title": "26"}, {"is_one_size": false, "is_other_size": false, "id": 93, "title": "27"}, {"is_one_size": false, "is_other_size": false, "id": 94, "title": "28"}, {"is_one_size": false, "is_other_size": false, "id": 95, "title": "29"}, {"is_one_size": false, "is_other_size": false, "id": 96, "title": "30"}, {"is_one_size": false, "is_other_size": false, "id": 97, "title": "31"}, {"is_one_size": false, "is_other_size": false, "id": 98, "title": "32"}, {"is_one_size": false, "is_other_size": false, "id": 99, "title": "33"}, {"is_one_size": false, "is_other_size": false, "id": 100, "title": "34"}, {"is_one_size": false, "is_other_size": false, "id": 101, "title": "35"}, {"is_one_size": false, "is_other_size": false, "id": 102, "title": "36"}]}, "8": {"id": 8, "name": "\u0414\u0435\u0442\u0441\u043a\u0438\u0435 \u0433\u043e\u043b\u043e\u0432\u043d\u044b\u0435 \u0443\u0431\u043e\u0440\u044b", "sizes": [{"is_one_size": false, "is_other_size": false, "id": 76, "title": "49"}, {"is_one_size": false, "is_other_size": false, "id": 77, "title": "50"}, {"is_one_size": false, "is_other_size": false, "id": 78, "title": "51"}, {"is_one_size": false, "is_other_size": false, "id": 79, "title": "52"}, {"is_one_size": false, "is_other_size": false, "id": 80, "title": "53"}, {"is_one_size": false, "is_other_size": false, "id": 81, "title": "54"}, {"is_one_size": false, "is_other_size": false, "id": 82, "title": "55"}, {"is_one_size": false, "is_other_size": false, "id": 83, "title": "56"}, {"is_one_size": false, "is_other_size": false, "id": 84, "title": "57"}, {"is_one_size": false, "is_other_size": false, "id": 85, "title": "58"}, {"is_one_size": true, "is_other_size": false, "id": 86, "title": "One size"}, {"is_one_size": false, "is_other_size": true, "id": 87, "title": "\u0414\u0440\u0443\u0433\u043e\u0439"}]}, "9": {"id": 9, "name": "\u041e\u0431\u0443\u0432\u044c \u0434\u043b\u044f \u043c\u0430\u043b\u044c\u0447\u0438\u043a\u043e\u0432", "sizes": [{"is_one_size": false, "is_other_size": false, "id": 103, "title": "22"}, {"is_one_size": false, "is_other_size": false, "id": 104, "title": "23"}, {"is_one_size": false, "is_other_size": false, "id": 105, "title": "24"}, {"is_one_size": false, "is_other_size": false, "id": 106, "title": "25"}, {"is_one_size": false, "is_other_size": false, "id": 107, "title": "26"}, {"is_one_size": false, "is_other_size": false, "id": 108, "title": "27"}, {"is_one_size": false, "is_other_size": false, "id": 109, "title": "28"}, {"is_one_size": false, "is_other_size": false, "id": 110, "title": "29"}, {"is_one_size": false, "is_other_size": false, "id": 111, "title": "30"}, {"is_one_size": false, "is_other_size": false, "id": 112, "title": "31"}, {"is_one_size": false, "is_other_size": false, "id": 113, "title": "32"}, {"is_one_size": false, "is_other_size": false, "id": 114, "title": "33"}, {"is_one_size": false, "is_other_size": false, "id": 115, "title": "34"}, {"is_one_size": false, "is_other_size": false, "id": 116, "title": "35"}, {"is_one_size": false, "is_other_size": false, "id": 117, "title": "36"}, {"is_one_size": false, "is_other_size": false, "id": 118, "title": "37"}, {"is_one_size": false, "is_other_size": false, "id": 119, "title": "38"}, {"is_one_size": false, "is_other_size": false, "id": 120, "title": "39"}, {"is_one_size": false, "is_other_size": false, "id": 121, "title": "40"}]}, "10": {"id": 10, "name": "\u0413\u043e\u043b\u043e\u0432\u043d\u044b\u0435 \u0443\u0431\u043e\u0440\u044b \u0434\u043b\u044f \u043c\u0430\u043b\u044b\u0448\u0435\u0439", "sizes": [{"is_one_size": false, "is_other_size": false, "id": 142, "title": "47"}, {"is_one_size": false, "is_other_size": false, "id": 143, "title": "48"}, {"is_one_size": false, "is_other_size": true, "id": 144, "title": "\u0414\u0440\u0443\u0433\u043e\u0439"}, {"is_one_size": true, "is_other_size": false, "id": 145, "title": "One size"}, {"is_one_size": false, "is_other_size": false, "id": 138, "title": "35"}, {"is_one_size": false, "is_other_size": false, "id": 139, "title": "40"}, {"is_one_size": false, "is_other_size": false, "id": 140, "title": "44"}, {"is_one_size": false, "is_other_size": false, "id": 141, "title": "46"}]}}, "kids_supercategories": {"children": [{"children": null, "size_group_id": null, "id": 83, "title": "\u0414\u043b\u044f \u0434\u0435\u0432\u043e\u0447\u0435\u043a"}, {"children": null, "size_group_id": null, "id": 84, "title": "\u0414\u043b\u044f \u043c\u0430\u043b\u044c\u0447\u0438\u043a\u043e\u0432"}, {"children": null, "size_group_id": null, "id": 85, "title": "\u0414\u043b\u044f \u043c\u0430\u043b\u044b\u0448\u0435\u0439"}], "size_group_id": null, "id": 82, "title": "\u0414\u0435\u0442\u0441\u043a\u0430\u044f \u043e\u0434\u0435\u0436\u0434\u0430"}, "women_main_categories": {"32": {"size_group_id": 1, "title": "\u041a\u043e\u0444\u0442\u044b", "id": 32, "has_one_size": true, "has_other_size": false, "slug": "kofty", "icon": "#static--svg--sweater"}, "3": {"size_group_id": 1, "title": "\u0412\u0435\u0440\u0445\u043d\u044f\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 3, "has_one_size": true, "has_other_size": false, "slug": "verhnyaya-odezhda", "icon": "#static--svg--outerwears"}, "36": {"size_group_id": 1, "title": "\u041d\u0438\u0436\u043d\u0435\u0435 \u0431\u0435\u043b\u044c\u0435", "id": 36, "has_one_size": true, "has_other_size": true, "slug": "nizhnee-bele-i-kupalniki", "icon": "#static--svg--sweamwear"}, "41": {"size_group_id": 2, "title": "\u0422\u0443\u0444\u043b\u0438", "id": 41, "has_one_size": false, "has_other_size": false, "slug": "tufli", "icon": "#static--svg--shoes"}, "10": {"size_group_id": 1, "title": "\u041f\u043b\u0430\u0442\u044c\u044f", "id": 10, "has_one_size": true, "has_other_size": false, "slug": "platya", "icon": "#static--svg--dress"}, "76": {"size_group_id": null, "title": "\u041a\u043e\u0441\u043c\u0435\u0442\u0438\u043a\u0430", "id": 76, "has_one_size": false, "has_other_size": false, "slug": "kosmetika", "icon": "#static--svg--cosmetics"}, "14": {"size_group_id": 1, "title": "\u042e\u0431\u043a\u0438", "id": 14, "has_one_size": true, "has_other_size": false, "slug": "yubki", "icon": "#static--svg--skirt"}, "47": {"size_group_id": 2, "title": "\u0421\u0430\u043f\u043e\u0433\u0438 \u0438 \u0431\u043e\u0442\u0438\u043d\u043a\u0438", "id": 47, "has_one_size": false, "has_other_size": false, "slug": "sapogi-i-botinki", "icon": "#static--svg--boots"}, "81": {"size_group_id": null, "title": "\u0414\u0440\u0443\u0433\u0438\u0435 \u0432\u0435\u0449\u0438", "id": 81, "has_one_size": true, "has_other_size": false, "slug": "drugoe", "icon": "#static--svg--paper-bag"}, "18": {"size_group_id": 1, "title": "\u041c\u0430\u0439\u043a\u0438 \u0438 \u0444\u0443\u0442\u0431\u043e\u043b\u043a\u0438", "id": 18, "has_one_size": true, "has_other_size": false, "slug": "mayki-i-futbolki", "icon": "#static--svg--t-shirt"}, "21": {"size_group_id": 1, "title": "\u0420\u0443\u0431\u0430\u0448\u043a\u0438 \u0438 \u0431\u043b\u0443\u0437\u044b", "id": 21, "has_one_size": true, "has_other_size": false, "slug": "rubashki-i-bluzy", "icon": "#static--svg--clothes"}, "24": {"size_group_id": 1, "title": "\u0411\u0440\u044e\u043a\u0438", "id": 24, "has_one_size": true, "has_other_size": false, "slug": "bryuki", "icon": "#static--svg--pants"}, "56": {"size_group_id": 2, "title": "\u0411\u043e\u0441\u043e\u043d\u043e\u0436\u043a\u0438 \u0438 \u0448\u043b\u0435\u043f\u0430\u043d\u0446\u044b", "id": 56, "has_one_size": false, "has_other_size": false, "slug": "bosonozhki-i-shlepancy", "icon": "#static--svg--sandals"}, "29": {"size_group_id": 1, "title": "\u0428\u043e\u0440\u0442\u044b", "id": 29, "has_one_size": true, "has_other_size": false, "slug": "shorty", "icon": "#static--svg--shorts"}, "62": {"size_group_id": null, "title": "\u0410\u043a\u0441\u0435\u0441\u0441\u0443\u0430\u0440\u044b", "id": 62, "has_one_size": false, "has_other_size": false, "slug": "aksessuary", "icon": "#static--svg--bag"}, "53": {"size_group_id": 2, "title": "\u041a\u0440\u043e\u0441\u0441\u043e\u0432\u043a\u0438 \u0438 \u043a\u0435\u0434\u044b", "id": 53, "has_one_size": false, "has_other_size": false, "slug": "krossovki-i-kedy", "icon": "#static--svg--sneakers"}}, "kids_tree": {"size_group_id": 6, "title": "\u0414\u0435\u0442\u0441\u043a\u0430\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 82, "has_one_size": null, "has_other_size": null, "children": [{"size_group_id": 6, "title": "\u0414\u043b\u044f \u0434\u0435\u0432\u043e\u0447\u0435\u043a", "id": 83, "has_one_size": null, "has_other_size": null, "children": [{"size_group_id": 6, "title": "\u0412\u0435\u0440\u0445\u043d\u044f\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 86, "has_one_size": true, "has_other_size": true, "children": [{"size_group_id": 6, "title": "\u041a\u0443\u0440\u0442\u043a\u0438", "id": 125, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041f\u0430\u043b\u044c\u0442\u043e", "id": 126, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041f\u043b\u0430\u0449\u0438", "id": 127, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041f\u0443\u0445\u043e\u0432\u0438\u043a\u0438", "id": 128, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0428\u0443\u0431\u044b \u0438 \u0434\u0443\u0431\u043b\u0435\u043d\u043a\u0438", "id": 129, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041f\u0438\u0434\u0436\u0430\u043a\u0438 \u0438 \u0436\u0430\u043a\u0435\u0442\u044b", "id": 130, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0416\u0438\u043b\u0435\u0442\u043a\u0438", "id": 131, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0417\u0438\u043c\u043d\u0438\u0435 \u043a\u043e\u043c\u0431\u0438\u043d\u0435\u0437\u043e\u043d\u044b", "id": 132, "has_one_size": true, "has_other_size": true, "children": null}]}, {"size_group_id": 6, "title": "\u041a\u043e\u0444\u0442\u044b \u0438 \u0441\u0432\u0438\u0442\u0435\u0440\u044b", "id": 87, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0424\u0443\u0442\u0431\u043e\u043b\u043a\u0438 \u0438 \u043c\u0430\u0439\u043a\u0438", "id": 88, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041a\u043e\u0441\u0442\u044e\u043c\u044b", "id": 89, "has_one_size": true, "has_other_size": true, "children": [{"size_group_id": 6, "title": "\u041a\u0430\u0440\u043d\u0430\u0432\u0430\u043b\u044c\u043d\u044b\u0435", "id": 133, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0421\u043f\u043e\u0440\u0442\u0438\u0432\u043d\u044b\u0435", "id": 134, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041f\u043e\u0432\u0441\u0435\u0434\u043d\u0435\u0432\u043d\u044b\u0435", "id": 135, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0428\u043a\u043e\u043b\u044c\u043d\u0430\u044f \u0444\u043e\u0440\u043c\u0430", "id": 136, "has_one_size": true, "has_other_size": true, "children": null}]}, {"size_group_id": 6, "title": "\u041a\u043e\u043b\u0433\u043e\u0442\u044b \u0438 \u043d\u043e\u0441\u043a\u0438", "id": 90, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0411\u0440\u044e\u043a\u0438, \u0434\u0436\u0438\u043d\u0441\u044b, \u043b\u043e\u0441\u0438\u043d\u044b", "id": 91, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0411\u043b\u0443\u0437\u043a\u0438 \u0438 \u0440\u0443\u0431\u0430\u0448\u043a\u0438", "id": 92, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u042e\u0431\u043a\u0438", "id": 93, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0428\u043e\u0440\u0442\u044b", "id": 94, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041a\u043e\u043c\u0431\u0438\u043d\u0435\u0437\u043e\u043d\u044b \u043b\u0435\u0442\u043d\u0438\u0435", "id": 95, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": null, "title": "\u0410\u043a\u0441\u0435\u0441\u0441\u0443\u0430\u0440\u044b", "id": 96, "has_one_size": false, "has_other_size": false, "children": [{"size_group_id": 8, "title": "\u0413\u043e\u043b\u043e\u0432\u043d\u044b\u0435 \u0443\u0431\u043e\u0440\u044b", "id": 137, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": null, "title": "\u0421\u0443\u043c\u043a\u0438 \u0438 \u0440\u044e\u043a\u0437\u0430\u043a\u0438", "id": 138, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 6, "title": "\u041f\u0435\u0440\u0447\u0430\u0442\u043a\u0438 \u0438 \u0432\u0430\u0440\u0435\u0436\u043a\u0438", "id": 139, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": null, "title": "\u0423\u043a\u0440\u0430\u0448\u0435\u043d\u0438\u044f", "id": 140, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 6, "title": "\u041f\u0440\u043e\u0447\u0438\u0435", "id": 141, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0420\u0435\u043c\u043d\u0438 \u0438 \u043f\u043e\u0434\u0442\u044f\u0436\u043a\u0438", "id": 142, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": null, "title": "\u0414\u0435\u0442\u0441\u043a\u0438\u0439 \u0442\u0435\u043a\u0441\u0442\u0438\u043b\u044c", "id": 143, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u041a\u043e\u0441\u043c\u0435\u0442\u0438\u043a\u0430", "id": 144, "has_one_size": false, "has_other_size": false, "children": null}]}, {"size_group_id": 6, "title": "\u0414\u0440\u0443\u0433\u043e\u0435", "id": 97, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041d\u0438\u0436\u043d\u0435\u0435 \u0431\u0435\u043b\u044c\u0435", "id": 98, "has_one_size": true, "has_other_size": true, "children": [{"size_group_id": 6, "title": "\u041f\u0438\u0436\u0430\u043c\u044b", "id": 145, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0411\u0435\u043b\u044c\u0435\u0432\u044b\u0435 \u043c\u0430\u0439\u043a\u0438", "id": 146, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0422\u0440\u0443\u0441\u044b", "id": 147, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041a\u0443\u043f\u0430\u043b\u044c\u043d\u0438\u043a\u0438 \u0438 \u043f\u043b\u0430\u0432\u043a\u0438", "id": 148, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041a\u043e\u043c\u043f\u043b\u0435\u043a\u0442\u044b", "id": 149, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0425\u0430\u043b\u0430\u0442\u044b", "id": 150, "has_one_size": true, "has_other_size": true, "children": null}]}, {"size_group_id": 6, "title": "\u041f\u043b\u0430\u0442\u044c\u044f \u0438 \u0441\u0430\u0440\u0430\u0444\u0430\u043d\u044b", "id": 99, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 7, "title": "\u041e\u0431\u0443\u0432\u044c", "id": 100, "has_one_size": false, "has_other_size": false, "children": [{"size_group_id": 7, "title": "\u041a\u0440\u043e\u0441\u0441\u043e\u0432\u043a\u0438 \u0438 \u043a\u0435\u0434\u044b", "id": 151, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 7, "title": "\u0411\u043e\u0441\u043e\u043d\u043e\u0436\u043a\u0438 \u0438 \u0448\u043b\u0435\u043f\u0430\u043d\u0446\u044b", "id": 152, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 7, "title": "\u0422\u0443\u0444\u043b\u0438", "id": 153, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 7, "title": "\u0421\u0430\u043f\u043e\u0433\u0438 \u0438 \u0431\u043e\u0442\u0438\u043d\u043a\u0438", "id": 154, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 7, "title": "\u0422\u0430\u043f\u043e\u0447\u043a\u0438", "id": 155, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 7, "title": "\u0414\u0440\u0443\u0433\u0430\u044f \u043e\u0431\u0443\u0432\u044c", "id": 156, "has_one_size": false, "has_other_size": false, "children": null}]}]}, {"size_group_id": 6, "title": "\u0414\u043b\u044f \u043c\u0430\u043b\u044c\u0447\u0438\u043a\u043e\u0432", "id": 84, "has_one_size": null, "has_other_size": null, "children": [{"size_group_id": 6, "title": "\u0412\u0435\u0440\u0445\u043d\u044f\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 101, "has_one_size": true, "has_other_size": true, "children": [{"size_group_id": 6, "title": "\u041a\u0443\u0440\u0442\u043a\u0438", "id": 157, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041f\u0430\u043b\u044c\u0442\u043e", "id": 158, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041f\u043b\u0430\u0449\u0438", "id": 159, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041f\u0443\u0445\u043e\u0432\u0438\u043a\u0438", "id": 160, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0428\u0443\u0431\u044b \u0438 \u0434\u0443\u0431\u043b\u0435\u043d\u043a\u0438", "id": 161, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041f\u0438\u0434\u0436\u0430\u043a\u0438 \u0438 \u0436\u0430\u043a\u0435\u0442\u044b", "id": 162, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0416\u0438\u043b\u0435\u0442\u043a\u0438", "id": 163, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0417\u0438\u043c\u043d\u0438\u0435 \u043a\u043e\u043c\u0431\u0438\u043d\u0435\u0437\u043e\u043d\u044b", "id": 164, "has_one_size": true, "has_other_size": true, "children": null}]}, {"size_group_id": 6, "title": "\u041a\u043e\u0444\u0442\u044b \u0438 \u0441\u0432\u0438\u0442\u0435\u0440\u044b", "id": 102, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0424\u0443\u0442\u0431\u043e\u043b\u043a\u0438 \u0438 \u043c\u0430\u0439\u043a\u0438", "id": 103, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041a\u043e\u0441\u0442\u044e\u043c\u044b", "id": 104, "has_one_size": true, "has_other_size": true, "children": [{"size_group_id": 6, "title": "\u041a\u0430\u0440\u043d\u0430\u0432\u0430\u043b\u044c\u043d\u044b\u0435", "id": 165, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0421\u043f\u043e\u0440\u0442\u0438\u0432\u043d\u044b\u0435", "id": 166, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041f\u043e\u0432\u0441\u0435\u0434\u043d\u0435\u0432\u043d\u044b\u0435", "id": 167, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0428\u043a\u043e\u043b\u044c\u043d\u0430\u044f \u0444\u043e\u0440\u043c\u0430", "id": 168, "has_one_size": true, "has_other_size": true, "children": null}]}, {"size_group_id": 6, "title": "\u041a\u043e\u043b\u0433\u043e\u0442\u044b \u0438 \u043d\u043e\u0441\u043a\u0438", "id": 105, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0411\u0440\u044e\u043a\u0438, \u0434\u0436\u0438\u043d\u0441\u044b, \u043b\u043e\u0441\u0438\u043d\u044b", "id": 106, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0420\u0443\u0431\u0430\u0448\u043a\u0438", "id": 107, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0428\u043e\u0440\u0442\u044b", "id": 108, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041a\u043e\u043c\u0431\u0438\u043d\u0435\u0437\u043e\u043d\u044b \u043b\u0435\u0442\u043d\u0438\u0435", "id": 109, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": null, "title": "\u0410\u043a\u0441\u0435\u0441\u0441\u0443\u0430\u0440\u044b", "id": 110, "has_one_size": false, "has_other_size": false, "children": [{"size_group_id": 8, "title": "\u0413\u043e\u043b\u043e\u0432\u043d\u044b\u0435 \u0443\u0431\u043e\u0440\u044b", "id": 169, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": null, "title": "\u0420\u044e\u043a\u0437\u0430\u043a\u0438 \u0438 \u0441\u0443\u043c\u043a\u0438", "id": 170, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 6, "title": "\u041f\u0435\u0440\u0447\u0430\u0442\u043a\u0438 \u0438 \u0432\u0430\u0440\u0435\u0436\u043a\u0438", "id": 171, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": null, "title": "\u0423\u043a\u0440\u0430\u0448\u0435\u043d\u0438\u044f", "id": 172, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u041f\u0440\u043e\u0447\u0438\u0435", "id": 173, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 6, "title": "\u0420\u0435\u043c\u043d\u0438 \u0438 \u043f\u043e\u0434\u0442\u044f\u0436\u043a\u0438", "id": 174, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": null, "title": "\u0414\u0435\u0442\u0441\u043a\u0438\u0439 \u0442\u0435\u043a\u0441\u0442\u0438\u043b\u044c", "id": 175, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u041a\u043e\u0441\u043c\u0435\u0442\u0438\u043a\u0430", "id": 176, "has_one_size": false, "has_other_size": false, "children": null}]}, {"size_group_id": 6, "title": "\u0414\u0440\u0443\u0433\u043e\u0435", "id": 111, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041d\u0438\u0436\u043d\u0435\u0435 \u0431\u0435\u043b\u044c\u0435", "id": 112, "has_one_size": true, "has_other_size": true, "children": [{"size_group_id": 6, "title": "\u041f\u0438\u0436\u0430\u043c\u044b", "id": 177, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0411\u0435\u043b\u044c\u0435\u0432\u044b\u0435 \u043c\u0430\u0439\u043a\u0438", "id": 178, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0422\u0440\u0443\u0441\u044b", "id": 179, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041f\u043b\u0430\u0432\u043a\u0438 \u0438 \u043a\u0443\u043f\u0430\u043b\u044c\u043d\u044b\u0435 \u043a\u043e\u0441\u0442\u044e\u043c\u044b", "id": 180, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u041a\u043e\u043c\u043f\u043b\u0435\u043a\u0442\u044b", "id": 181, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 6, "title": "\u0425\u0430\u043b\u0430\u0442\u044b", "id": 182, "has_one_size": true, "has_other_size": true, "children": null}]}, {"size_group_id": 9, "title": "\u041e\u0431\u0443\u0432\u044c", "id": 113, "has_one_size": false, "has_other_size": false, "children": [{"size_group_id": 9, "title": "\u041a\u0440\u043e\u0441\u0441\u043e\u0432\u043a\u0438 \u0438 \u043a\u0435\u0434\u044b", "id": 183, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 9, "title": "\u0411\u043e\u0441\u043e\u043d\u043e\u0436\u043a\u0438 \u0438 \u0448\u043b\u0435\u043f\u0430\u043d\u0446\u044b", "id": 184, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 9, "title": "\u0422\u0443\u0444\u043b\u0438", "id": 185, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 9, "title": "\u0421\u0430\u043f\u043e\u0433\u0438 \u0438 \u0431\u043e\u0442\u0438\u043d\u043a\u0438", "id": 186, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 9, "title": "\u0422\u0430\u043f\u043e\u0447\u043a\u0438", "id": 187, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 9, "title": "\u0414\u0440\u0443\u0433\u0430\u044f \u043e\u0431\u0443\u0432\u044c", "id": 188, "has_one_size": false, "has_other_size": false, "children": null}]}]}, {"size_group_id": 4, "title": "\u0414\u043b\u044f \u043c\u0430\u043b\u044b\u0448\u0435\u0439", "id": 85, "has_one_size": null, "has_other_size": null, "children": [{"size_group_id": 4, "title": "\u041d\u0430\u0431\u043e\u0440\u044b \u0434\u043b\u044f \u043a\u0440\u0435\u0449\u0435\u043d\u0438\u044f", "id": 114, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 4, "title": "\u041a\u043e\u043d\u0432\u0435\u0440\u0442\u044b, \u0441\u043f\u0430\u043b\u044c\u043d\u044b\u0435 \u043c\u0435\u0448\u043a\u0438, \u043f\u0435\u043b\u0435\u043d\u043a\u0438", "id": 115, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 4, "title": "\u041a\u043e\u0441\u0442\u044e\u043c\u044b \u0438 \u043a\u043e\u043c\u043f\u043b\u0435\u043a\u0442\u044b", "id": 116, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 4, "title": "\u0411\u043e\u0434\u0438, \u0447\u0435\u043b\u043e\u0432\u0435\u0447\u043a\u0438, \u043f\u0435\u0441\u043e\u0447\u043d\u0438\u043a\u0438", "id": 117, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 4, "title": "\u041f\u043e\u043b\u0437\u0443\u043d\u043a\u0438, \u0448\u0442\u0430\u043d\u044b, \u0448\u043e\u0440\u0442\u044b", "id": 118, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 4, "title": "\u0420\u0430\u0441\u043f\u0430\u0448\u043e\u043d\u043a\u0438 \u0438 \u043a\u043e\u0444\u0442\u044b", "id": 119, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 4, "title": "\u041f\u0438\u043d\u0435\u0442\u043a\u0438 \u0438 \u0446\u0430\u0440\u0430\u043f\u043a\u0438", "id": 120, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 4, "title": "\u041f\u043b\u0430\u0442\u044c\u044f, \u0441\u0430\u0440\u0430\u0444\u0430\u043d\u044b, \u044e\u0431\u043a\u0438", "id": 121, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 4, "title": "\u0412\u0435\u0440\u0445\u043d\u044f\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 122, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 5, "title": "\u041e\u0431\u0443\u0432\u044c", "id": 123, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 4, "title": "\u0414\u0440\u0443\u0433\u0430\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 124, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 4, "title": "\u0424\u0443\u0442\u0431\u043e\u043b\u043a\u0438 \u0438 \u043c\u0430\u0439\u043a\u0438", "id": 189, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 10, "title": "\u0413\u043e\u043b\u043e\u0432\u043d\u044b\u0435 \u0443\u0431\u043e\u0440\u044b", "id": 190, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": null, "title": "\u0422\u0435\u043a\u0441\u0442\u0438\u043b\u044c", "id": 191, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 4, "title": "\u041a\u0443\u043f\u0430\u043b\u044c\u043d\u0438\u043a\u0438 \u0438 \u043f\u043b\u0430\u0432\u043a\u0438", "id": 192, "has_one_size": true, "has_other_size": true, "children": null}]}]}, "colors": [{"hex": "#FFFFFF", "id": 1, "label": "\u0411\u0435\u043b\u044b\u0439"}, {"hex": "#EDEEF0", "id": 2, "label": "\u0421\u0435\u0440\u0435\u0431\u0440\u0438\u0441\u0442\u044b\u0439"}, {"hex": "#F6E6D1", "id": 3, "label": "\u0411\u0435\u0436\u0435\u0432\u044b\u0439"}, {"hex": "#A7A7A7", "id": 4, "label": "\u0421\u0435\u0440\u044b\u0439"}, {"hex": "#FFF633", "id": 5, "label": "\u0416\u0451\u043b\u0442\u044b\u0439"}, {"hex": "#FFE133", "id": 6, "label": "\u0417\u043e\u043b\u043e\u0442\u0438\u0441\u0442\u044b\u0439"}, {"hex": "#FFB833", "id": 7, "label": "\u041e\u0440\u0430\u043d\u0436\u0435\u0432\u044b\u0439"}, {"hex": "#FF3399", "id": 8, "label": "\u0420\u043e\u0437\u043e\u0432\u044b\u0439"}, {"hex": "#D95B33", "id": 9, "label": "\u041a\u0440\u0430\u0441\u043d\u044b\u0439"}, {"hex": "#C5E5ED", "id": 10, "label": "\u0411\u0438\u0440\u044e\u0437\u043e\u0432\u044b\u0439"}, {"hex": "#3395D2", "id": 11, "label": "\u0421\u0438\u043d\u0438\u0439"}, {"hex": "#9E9B6B", "id": 12, "label": "\u0425\u0430\u043a\u0438"}, {"hex": "#59AF5F", "id": 13, "label": "\u0417\u0435\u043b\u0451\u043d\u044b\u0439"}, {"hex": "#9A339B", "id": 14, "label": "\u0424\u0438\u043e\u043b\u0435\u0442\u043e\u0432\u044b\u0439"}, {"hex": "#855D33", "id": 15, "label": "\u041a\u043e\u0440\u0438\u0447\u043d\u0435\u0432\u044b\u0439"}, {"hex": "#000000", "id": 16, "label": "\u0427\u0451\u0440\u043d\u044b\u0439"}, {"hex": "#0", "id": 17, "label": "\u0420\u0430\u0437\u043d\u043e\u0446\u0432\u0435\u0442\u043d\u044b\u0439"}], "kids_main_categories": {"83": {"96": {"size_group_id": null, "title": "\u0410\u043a\u0441\u0435\u0441\u0441\u0443\u0430\u0440\u044b", "id": 96, "has_one_size": false, "has_other_size": false, "slug": "dlya-devochek/aksessuary", "icon": "#static--svg--child-hat"}, "97": {"size_group_id": 6, "title": "\u0414\u0440\u0443\u0433\u043e\u0435", "id": 97, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/drugoe", "icon": "#static--svg--paper-bag"}, "98": {"size_group_id": 6, "title": "\u041d\u0438\u0436\u043d\u0435\u0435 \u0431\u0435\u043b\u044c\u0435", "id": 98, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/nizhnee-bele", "icon": "#static--svg--child-underwear-girls"}, "99": {"size_group_id": 6, "title": "\u041f\u043b\u0430\u0442\u044c\u044f \u0438 \u0441\u0430\u0440\u0430\u0444\u0430\u043d\u044b", "id": 99, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/platya-i-sarafany", "icon": "#static--svg--dress"}, "100": {"size_group_id": 7, "title": "\u041e\u0431\u0443\u0432\u044c", "id": 100, "has_one_size": false, "has_other_size": false, "slug": "dlya-devochek/obuv", "icon": "#static--svg--sneakers"}, "86": {"size_group_id": 6, "title": "\u0412\u0435\u0440\u0445\u043d\u044f\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 86, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/verhnyaya-odezhda", "icon": "#static--svg--outerwears"}, "87": {"size_group_id": 6, "title": "\u041a\u043e\u0444\u0442\u044b \u0438 \u0441\u0432\u0438\u0442\u0435\u0440\u044b", "id": 87, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/kofty-i-svitery", "icon": "#static--svg--child-sweater"}, "88": {"size_group_id": 6, "title": "\u0424\u0443\u0442\u0431\u043e\u043b\u043a\u0438 \u0438 \u043c\u0430\u0439\u043a\u0438", "id": 88, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/futbolki-i-mayki", "icon": "#static--svg--child-t-shirt"}, "89": {"size_group_id": 6, "title": "\u041a\u043e\u0441\u0442\u044e\u043c\u044b", "id": 89, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/kostiumy", "icon": "#static--svg--child-suit"}, "90": {"size_group_id": 6, "title": "\u041a\u043e\u043b\u0433\u043e\u0442\u044b \u0438 \u043d\u043e\u0441\u043a\u0438", "id": 90, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/kolgoty-i-noski", "icon": "#static--svg--child-tights"}, "91": {"size_group_id": 6, "title": "\u0411\u0440\u044e\u043a\u0438, \u0434\u0436\u0438\u043d\u0441\u044b, \u043b\u043e\u0441\u0438\u043d\u044b", "id": 91, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/bryuki-i-dzhinsy", "icon": "#static--svg--child-pants"}, "92": {"size_group_id": 6, "title": "\u0411\u043b\u0443\u0437\u043a\u0438 \u0438 \u0440\u0443\u0431\u0430\u0448\u043a\u0438", "id": 92, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/bluzki-i-rubashki", "icon": "#static--svg--child-shirt"}, "93": {"size_group_id": 6, "title": "\u042e\u0431\u043a\u0438", "id": 93, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/yubki", "icon": "#static--svg--skirt"}, "94": {"size_group_id": 6, "title": "\u0428\u043e\u0440\u0442\u044b", "id": 94, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/shorty", "icon": "#static--svg--shorts"}, "95": {"size_group_id": 6, "title": "\u041a\u043e\u043c\u0431\u0438\u043d\u0435\u0437\u043e\u043d\u044b \u043b\u0435\u0442\u043d\u0438\u0435", "id": 95, "has_one_size": true, "has_other_size": true, "slug": "dlya-devochek/letnie-kombinezony", "icon": "#static--svg--child-overalls"}}, "84": {"101": {"size_group_id": 6, "title": "\u0412\u0435\u0440\u0445\u043d\u044f\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 101, "has_one_size": true, "has_other_size": true, "slug": "dlya-malchikov/verhnyaya-odezhda", "icon": "#static--svg--child-outerwear"}, "102": {"size_group_id": 6, "title": "\u041a\u043e\u0444\u0442\u044b \u0438 \u0441\u0432\u0438\u0442\u0435\u0440\u044b", "id": 102, "has_one_size": true, "has_other_size": true, "slug": "dlya-malchikov/kofty-i-svitery", "icon": "#static--svg--child-sweater"}, "103": {"size_group_id": 6, "title": "\u0424\u0443\u0442\u0431\u043e\u043b\u043a\u0438 \u0438 \u043c\u0430\u0439\u043a\u0438", "id": 103, "has_one_size": true, "has_other_size": true, "slug": "dlya-malchikov/futbolki-i-mayki", "icon": "#static--svg--child-t-shirt"}, "104": {"size_group_id": 6, "title": "\u041a\u043e\u0441\u0442\u044e\u043c\u044b", "id": 104, "has_one_size": true, "has_other_size": true, "slug": "dlya-malchikov/kostiumy", "icon": "#static--svg--child-suit"}, "105": {"size_group_id": 6, "title": "\u041a\u043e\u043b\u0433\u043e\u0442\u044b \u0438 \u043d\u043e\u0441\u043a\u0438", "id": 105, "has_one_size": true, "has_other_size": true, "slug": "dlya-malchikov/kolgoty-i-noski", "icon": "#static--svg--child-tights"}, "106": {"size_group_id": 6, "title": "\u0411\u0440\u044e\u043a\u0438, \u0434\u0436\u0438\u043d\u0441\u044b, \u043b\u043e\u0441\u0438\u043d\u044b", "id": 106, "has_one_size": true, "has_other_size": true, "slug": "dlya-malchikov/bryuki-i-dzhinsy", "icon": "#static--svg--child-pants"}, "107": {"size_group_id": 6, "title": "\u0420\u0443\u0431\u0430\u0448\u043a\u0438", "id": 107, "has_one_size": true, "has_other_size": true, "slug": "dlya-malchikov/rubashki", "icon": "#static--svg--child-shirt"}, "108": {"size_group_id": 6, "title": "\u0428\u043e\u0440\u0442\u044b", "id": 108, "has_one_size": true, "has_other_size": true, "slug": "dlya-malchikov/shorty", "icon": "#static--svg--shorts"}, "109": {"size_group_id": 6, "title": "\u041a\u043e\u043c\u0431\u0438\u043d\u0435\u0437\u043e\u043d\u044b \u043b\u0435\u0442\u043d\u0438\u0435", "id": 109, "has_one_size": true, "has_other_size": true, "slug": "dlya-malchikov/letnie-kombinezony", "icon": "#static--svg--child-overalls"}, "110": {"size_group_id": null, "title": "\u0410\u043a\u0441\u0435\u0441\u0441\u0443\u0430\u0440\u044b", "id": 110, "has_one_size": false, "has_other_size": false, "slug": "dlya-malchikov/aksessuary", "icon": "#static--svg--child-hat"}, "111": {"size_group_id": 6, "title": "\u0414\u0440\u0443\u0433\u043e\u0435", "id": 111, "has_one_size": true, "has_other_size": true, "slug": "dlya-malchikov/drugoe", "icon": "#static--svg--paper-bag"}, "112": {"size_group_id": 6, "title": "\u041d\u0438\u0436\u043d\u0435\u0435 \u0431\u0435\u043b\u044c\u0435", "id": 112, "has_one_size": true, "has_other_size": true, "slug": "dlya-malchikov/nizhnee-bele", "icon": "#static--svg--child-underwear-boys"}, "113": {"size_group_id": 9, "title": "\u041e\u0431\u0443\u0432\u044c", "id": 113, "has_one_size": false, "has_other_size": false, "slug": "dlya-malchikov/obuv", "icon": "#static--svg--sneakers"}}, "85": {"192": {"size_group_id": 4, "title": "\u041a\u0443\u043f\u0430\u043b\u044c\u043d\u0438\u043a\u0438 \u0438 \u043f\u043b\u0430\u0432\u043a\u0438", "id": 192, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/kupalniki-i-plavki", "icon": "#static--svg--child-underwear-boys"}, "114": {"size_group_id": 4, "title": "\u041d\u0430\u0431\u043e\u0440\u044b \u0434\u043b\u044f \u043a\u0440\u0435\u0449\u0435\u043d\u0438\u044f", "id": 114, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/nabory-dlya-kresheniya", "icon": "#static--svg--baby-baptismal-kit2"}, "115": {"size_group_id": 4, "title": "\u041a\u043e\u043d\u0432\u0435\u0440\u0442\u044b, \u0441\u043f\u0430\u043b\u044c\u043d\u044b\u0435 \u043c\u0435\u0448\u043a\u0438, \u043f\u0435\u043b\u0435\u043d\u043a\u0438", "id": 115, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/konverty-i-spalnye-meshki", "icon": "#static--svg--baby-envelope"}, "116": {"size_group_id": 4, "title": "\u041a\u043e\u0441\u0442\u044e\u043c\u044b \u0438 \u043a\u043e\u043c\u043f\u043b\u0435\u043a\u0442\u044b", "id": 116, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/kostiumy-i-komplekty", "icon": "#static--svg--baby-suit"}, "117": {"size_group_id": 4, "title": "\u0411\u043e\u0434\u0438, \u0447\u0435\u043b\u043e\u0432\u0435\u0447\u043a\u0438, \u043f\u0435\u0441\u043e\u0447\u043d\u0438\u043a\u0438", "id": 117, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/bodi-i-chelovechki", "icon": "#static--svg--baby-bodysuit"}, "118": {"size_group_id": 4, "title": "\u041f\u043e\u043b\u0437\u0443\u043d\u043a\u0438, \u0448\u0442\u0430\u043d\u044b, \u0448\u043e\u0440\u0442\u044b", "id": 118, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/polzunki-i-shtany", "icon": "#static--svg--baby-crawlers"}, "119": {"size_group_id": 4, "title": "\u0420\u0430\u0441\u043f\u0430\u0448\u043e\u043d\u043a\u0438 \u0438 \u043a\u043e\u0444\u0442\u044b", "id": 119, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/raspashonki-i-kofty", "icon": "#static--svg--baby-shirt"}, "120": {"size_group_id": 4, "title": "\u041f\u0438\u043d\u0435\u0442\u043a\u0438 \u0438 \u0446\u0430\u0440\u0430\u043f\u043a\u0438", "id": 120, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/pinetki-i-carapki", "icon": "#static--svg--baby-booties"}, "121": {"size_group_id": 4, "title": "\u041f\u043b\u0430\u0442\u044c\u044f, \u0441\u0430\u0440\u0430\u0444\u0430\u043d\u044b, \u044e\u0431\u043a\u0438", "id": 121, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/platya-i-yubki", "icon": "#static--svg--dress"}, "122": {"size_group_id": 4, "title": "\u0412\u0435\u0440\u0445\u043d\u044f\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 122, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/verhnyaya-odezhda", "icon": "#static--svg--child-outerwear"}, "123": {"size_group_id": 5, "title": "\u041e\u0431\u0443\u0432\u044c", "id": 123, "has_one_size": false, "has_other_size": false, "slug": "dlya-malyshey/obuv", "icon": "#static--svg--baby-shoes"}, "124": {"size_group_id": 4, "title": "\u0414\u0440\u0443\u0433\u0430\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 124, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/drugoe", "icon": "#static--svg--paper-bag"}, "189": {"size_group_id": 4, "title": "\u0424\u0443\u0442\u0431\u043e\u043b\u043a\u0438 \u0438 \u043c\u0430\u0439\u043a\u0438", "id": 189, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/futbolki-i-mayki", "icon": "#static--svg--child-t-shirt"}, "190": {"size_group_id": 10, "title": "\u0413\u043e\u043b\u043e\u0432\u043d\u044b\u0435 \u0443\u0431\u043e\u0440\u044b", "id": 190, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/golovnye-ubory", "icon": "#static--svg--child-hat"}, "191": {"size_group_id": null, "title": "\u0422\u0435\u043a\u0441\u0442\u0438\u043b\u044c", "id": 191, "has_one_size": true, "has_other_size": true, "slug": "dlya-malyshey/tekstil", "icon": "#static--svg--baby-textile"}}}, "conditions": [{"value": 1, "label": "\u041d\u043e\u0432\u043e\u0435"}, {"value": 2, "label": "\u0418\u0434\u0435\u0430\u043b\u044c\u043d\u043e\u0435"}, {"value": 3, "label": "\u041e\u0447\u0435\u043d\u044c \u0445\u043e\u0440\u043e\u0448\u0435\u0435"}, {"value": 4, "label": "\u0425\u043e\u0440\u043e\u0448\u0435\u0435"}, {"value": 5, "label": "\u0423\u0434\u043e\u0432\u043b\u0435\u0442\u0432\u043e\u0440\u0438\u0442\u0435\u043b\u044c\u043d\u043e\u0435"}], "default_size_group_id": 1, "women_tree": {"size_group_id": 1, "title": "\u0416\u0435\u043d\u0441\u043a\u0430\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 2, "has_one_size": true, "has_other_size": true, "children": [{"size_group_id": 1, "title": "\u042e\u0431\u043a\u0438", "id": 14, "has_one_size": true, "has_other_size": false, "children": [{"size_group_id": 1, "title": "\u041c\u0438\u043d\u0438", "id": 15, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u041c\u0438\u0434\u0438", "id": 16, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u0414\u043b\u0438\u043d\u043d\u044b\u0435 \u044e\u0431\u043a\u0438", "id": 17, "has_one_size": true, "has_other_size": false, "children": null}]}, {"size_group_id": 1, "title": "\u041f\u043b\u0430\u0442\u044c\u044f", "id": 10, "has_one_size": true, "has_other_size": false, "children": [{"size_group_id": 1, "title": "\u041a\u043e\u0440\u043e\u0442\u043a\u0438\u0435 \u043f\u043b\u0430\u0442\u044c\u044f", "id": 11, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u041f\u043b\u0430\u0442\u044c\u044f \u043c\u0438\u0434\u0438", "id": 12, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u0414\u043b\u0438\u043d\u043d\u044b\u0435 \u043f\u043b\u0430\u0442\u044c\u044f", "id": 13, "has_one_size": true, "has_other_size": false, "children": null}]}, {"size_group_id": 1, "title": "\u0412\u0435\u0440\u0445\u043d\u044f\u044f \u043e\u0434\u0435\u0436\u0434\u0430", "id": 3, "has_one_size": true, "has_other_size": false, "children": [{"size_group_id": 1, "title": "\u041f\u0430\u043b\u044c\u0442\u043e", "id": 4, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u041f\u043b\u0430\u0449\u0438", "id": 5, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 1, "title": "\u041a\u0443\u0440\u0442\u043a\u0438", "id": 6, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u0428\u0443\u0431\u044b", "id": 7, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u0416\u0438\u043b\u0435\u0442\u043a\u0438", "id": 8, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u041f\u0438\u0434\u0436\u0430\u043a\u0438 \u0438 \u0436\u0430\u043a\u0435\u0442\u044b", "id": 9, "has_one_size": true, "has_other_size": false, "children": null}]}, {"size_group_id": 1, "title": "\u041c\u0430\u0439\u043a\u0438 \u0438 \u0444\u0443\u0442\u0431\u043e\u043b\u043a\u0438", "id": 18, "has_one_size": true, "has_other_size": false, "children": [{"size_group_id": 1, "title": "\u0424\u0443\u0442\u0431\u043e\u043b\u043a\u0438", "id": 19, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u041c\u0430\u0439\u043a\u0438", "id": 20, "has_one_size": true, "has_other_size": false, "children": null}]}, {"size_group_id": 1, "title": "\u0420\u0443\u0431\u0430\u0448\u043a\u0438 \u0438 \u0431\u043b\u0443\u0437\u044b", "id": 21, "has_one_size": true, "has_other_size": false, "children": [{"size_group_id": 1, "title": "\u0420\u0443\u0431\u0430\u0448\u043a\u0438", "id": 22, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u0411\u043b\u0443\u0437\u044b", "id": 23, "has_one_size": true, "has_other_size": false, "children": null}]}, {"size_group_id": 1, "title": "\u0411\u0440\u044e\u043a\u0438", "id": 24, "has_one_size": true, "has_other_size": false, "children": [{"size_group_id": 3, "title": "\u0414\u0436\u0438\u043d\u0441\u044b", "id": 25, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u041a\u043b\u0430\u0441\u0441\u0438\u0447\u0435\u0441\u043a\u0438\u0435", "id": 26, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u041f\u043e\u0432\u0441\u0435\u0434\u043d\u0435\u0432\u043d\u044b\u0435", "id": 27, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u0421\u043f\u043e\u0440\u0442\u0438\u0432\u043d\u044b\u0435 \u0448\u0442\u0430\u043d\u044b", "id": 28, "has_one_size": true, "has_other_size": false, "children": null}]}, {"size_group_id": 1, "title": "\u0428\u043e\u0440\u0442\u044b", "id": 29, "has_one_size": true, "has_other_size": false, "children": [{"size_group_id": 1, "title": "\u041a\u043e\u0440\u043e\u0442\u043a\u0438\u0435", "id": 30, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u0414\u043e \u043a\u043e\u043b\u0435\u043d", "id": 31, "has_one_size": true, "has_other_size": false, "children": null}]}, {"size_group_id": 1, "title": "\u041a\u043e\u0444\u0442\u044b", "id": 32, "has_one_size": true, "has_other_size": false, "children": [{"size_group_id": 1, "title": "\u0414\u0436\u0435\u043c\u043f\u0435\u0440\u044b", "id": 33, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u0421\u0432\u0438\u0442\u0435\u0440\u044b", "id": 34, "has_one_size": true, "has_other_size": false, "children": null}, {"size_group_id": 1, "title": "\u041a\u0430\u0440\u0434\u0438\u0433\u0430\u043d\u044b", "id": 35, "has_one_size": true, "has_other_size": false, "children": null}]}, {"size_group_id": 1, "title": "\u041d\u0438\u0436\u043d\u0435\u0435 \u0431\u0435\u043b\u044c\u0435", "id": 36, "has_one_size": true, "has_other_size": true, "children": [{"size_group_id": 1, "title": "\u0411\u044e\u0441\u0442\u0433\u0430\u043b\u044c\u0442\u0435\u0440\u044b", "id": 37, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 1, "title": "\u0422\u0440\u0443\u0441\u0438\u043a\u0438", "id": 38, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 1, "title": "\u041a\u043e\u043c\u043f\u043b\u0435\u043a\u0442\u044b", "id": 39, "has_one_size": true, "has_other_size": true, "children": null}, {"size_group_id": 1, "title": "\u041a\u0443\u043f\u0430\u043b\u044c\u043d\u0438\u043a\u0438", "id": 40, "has_one_size": true, "has_other_size": true, "children": null}]}, {"size_group_id": 2, "title": "\u0422\u0443\u0444\u043b\u0438", "id": 41, "has_one_size": false, "has_other_size": false, "children": [{"size_group_id": 2, "title": "\u0412\u044b\u0441\u043e\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a", "id": 42, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u0421\u0440\u0435\u0434\u043d\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a", "id": 43, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u041d\u0438\u0437\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a", "id": 44, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u041f\u043b\u0430\u0442\u0444\u043e\u0440\u043c\u0430", "id": 45, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u0422\u0430\u043d\u043a\u0435\u0442\u043a\u0430", "id": 46, "has_one_size": false, "has_other_size": false, "children": null}]}, {"size_group_id": 2, "title": "\u0421\u0430\u043f\u043e\u0433\u0438 \u0438 \u0431\u043e\u0442\u0438\u043d\u043a\u0438", "id": 47, "has_one_size": false, "has_other_size": false, "children": [{"size_group_id": 2, "title": "\u0412\u044b\u0441\u043e\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a", "id": 48, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u0421\u0440\u0435\u0434\u043d\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a", "id": 49, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u041d\u0438\u0437\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a", "id": 50, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u041f\u043b\u0430\u0442\u0444\u043e\u0440\u043c\u0430", "id": 51, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u0422\u0430\u043d\u043a\u0435\u0442\u043a\u0430", "id": 52, "has_one_size": false, "has_other_size": false, "children": null}]}, {"size_group_id": 2, "title": "\u041a\u0440\u043e\u0441\u0441\u043e\u0432\u043a\u0438 \u0438 \u043a\u0435\u0434\u044b", "id": 53, "has_one_size": false, "has_other_size": false, "children": [{"size_group_id": 2, "title": "\u041a\u0440\u043e\u0441\u0441\u043e\u0432\u043a\u0438", "id": 54, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u041a\u0435\u0434\u044b", "id": 55, "has_one_size": false, "has_other_size": false, "children": null}]}, {"size_group_id": 2, "title": "\u0411\u043e\u0441\u043e\u043d\u043e\u0436\u043a\u0438 \u0438 \u0448\u043b\u0435\u043f\u0430\u043d\u0446\u044b", "id": 56, "has_one_size": false, "has_other_size": false, "children": [{"size_group_id": 2, "title": "\u0412\u044b\u0441\u043e\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a", "id": 57, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u0421\u0440\u0435\u0434\u043d\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a", "id": 58, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u041d\u0438\u0437\u043a\u0438\u0439 \u043a\u0430\u0431\u043b\u0443\u043a", "id": 59, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u041d\u0430 \u043f\u043b\u0430\u0442\u0444\u043e\u0440\u043c\u0435", "id": 60, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": 2, "title": "\u041d\u0430 \u0442\u0430\u043d\u043a\u0435\u0442\u043a\u0435", "id": 61, "has_one_size": false, "has_other_size": false, "children": null}]}, {"size_group_id": null, "title": "\u0410\u043a\u0441\u0435\u0441\u0441\u0443\u0430\u0440\u044b", "id": 62, "has_one_size": false, "has_other_size": false, "children": [{"size_group_id": null, "title": "\u0421\u0443\u043c\u043a\u0438", "id": 63, "has_one_size": false, "has_other_size": false, "children": [{"size_group_id": null, "title": "\u041a\u043b\u0430\u0442\u0447\u0438", "id": 64, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u0421 \u0434\u043b\u0438\u043d\u043d\u044b\u043c\u0438 \u0440\u0443\u0447\u043a\u0430\u043c\u0438", "id": 65, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u0421 \u043a\u043e\u0440\u043e\u0442\u043a\u0438\u043c\u0438 \u0440\u0443\u0447\u043a\u0430\u043c\u0438", "id": 66, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u0420\u044e\u043a\u0437\u0430\u043a\u0438", "id": 67, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u0414\u043e\u0440\u043e\u0436\u043d\u044b\u0435 \u0447\u0435\u043c\u043e\u0434\u0430\u043d\u044b", "id": 68, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u041a\u043e\u0448\u0435\u043b\u044c\u043a\u0438", "id": 69, "has_one_size": false, "has_other_size": false, "children": null}]}, {"size_group_id": null, "title": "\u041e\u0447\u043a\u0438", "id": 70, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u0428\u0430\u043f\u043a\u0438", "id": 71, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u0423\u043a\u0440\u0430\u0448\u0435\u043d\u0438\u044f \u0438 \u0447\u0430\u0441\u044b", "id": 72, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u0420\u0435\u043c\u043d\u0438", "id": 73, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u0428\u0430\u0440\u0444\u044b \u0438 \u043f\u043b\u0430\u0442\u043a\u0438", "id": 74, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u0413\u0430\u043b\u0441\u0442\u0443\u043a\u0438 \u0438 \u0431\u0430\u0431\u043e\u0447\u043a\u0438", "id": 75, "has_one_size": false, "has_other_size": false, "children": null}]}, {"size_group_id": null, "title": "\u041a\u043e\u0441\u043c\u0435\u0442\u0438\u043a\u0430", "id": 76, "has_one_size": false, "has_other_size": false, "children": [{"size_group_id": null, "title": "\u041a\u0440\u0435\u043c\u044b \u0438 \u043c\u0430\u0441\u043a\u0438 \u0434\u043b\u044f \u043b\u0438\u0446\u0430", "id": 77, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u041a\u0440\u0435\u043c\u044b \u0434\u043b\u044f \u0440\u0443\u043a \u0438 \u0442\u0435\u043b\u0430", "id": 78, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u041c\u0430\u043a\u0438\u044f\u0436", "id": 79, "has_one_size": false, "has_other_size": false, "children": null}, {"size_group_id": null, "title": "\u041f\u0430\u0440\u0444\u044e\u043c\u044b", "id": 80, "has_one_size": false, "has_other_size": false, "children": null}]}, {"size_group_id": null, "title": "\u0414\u0440\u0443\u0433\u0438\u0435 \u0432\u0435\u0449\u0438", "id": 81, "has_one_size": true, "has_other_size": false, "children": null}]}}, "editMode": true, "category": null, "promotionTypeId": null, "title": "\u0412\u0435\u043b\u0438\u043a\u043e\u043b\u0435\u043f\u043d\u043e\u0435 \u043f\u043b\u0430\u0442\u044c\u0435 \u0438\u0437 \u0441\u0442\u0440\u0443\u044f\u0449\u0435\u0433\u043e\u0441\u044f \u0448\u0435\u043b\u043a\u043e\u0432\u0438\u0441\u0442\u043e\u0433\u043e \u0442\u0440\u0438\u043a\u043e\u0442\u0430\u0436\u0430", "hasAcceptedTerms": false, "sellingTypeId": 1, "colorIds": [17], "config": {"brandSearchUrl": "/listing/util/brands", "isCanary": false, "photoUploadUrl": "/listing/util/photo", "maxUploadFilesCount": 5, "promoPriceUrl": "/util/promo_price", "csrfToken": "x1TjXSzr1mAOEnAUIuHm2jzp184CpMMUuBqcDULp4tkUHQk7aP6IwcDExKurtbXA", "sentryDsn": "https://961607f1cccc4e8284898f6376ddfe61@app.getsentry.com/14170", "uploadSession": "462df183-5ea2-4d83-aae9-9f99a2009f69", "uploadUrl": "/items/7439903/edit"}, "composition": "", "description": "\u041f\u043b\u0430\u0442\u044c\u0435 \u0433\u043e\u0432\u043e\u0440\u0438\u0442 \u0441\u0430\u043c\u043e \u0437\u0430 \u0441\u0435\u0431\u044f. \u041e\u043d\u043e \u0448\u0438\u043a\u0430\u0440\u043d\u043e. \u0418 \u043e\u0431\u043b\u0430\u0434\u0430\u0442\u0435\u043b\u044c\u043d\u0438\u0446\u0430 \u044d\u0442\u043e\u0433\u043e \u0448\u0435\u0434\u0435\u0432\u0440\u0430 \u0431\u0443\u0434\u0435\u0442 \u0438\u043c \u0434\u043e\u0432\u043e\u043b\u044c\u043d\u0430 \u043d\u0435 \u043e\u0434\u0438\u043d \u0441\u0435\u0437\u043e\u043d. \u041a\u0430\u0447\u0435\u0441\u0442\u0432\u043e \u043e\u0442\u043c\u0435\u043d\u043d\u043e\u0435. \u0420\u0430\u0437\u043c\u0435\u0440 18. \u041d\u0430 \u043e\u0433 118-122, \u043e\u0442 100, \u043e\u0431 118-122 \u0441\u043c. \u0426\u0435\u043d\u0430 350 \u0433\u0440\u043d", "hasSeveralSizes": false, "price": "350", "conditionId": 1, "brandId": null, "delivery": "\u043f\u0440\u0435\u0434\u043e\u043f\u043b\u0430\u0442\u0430 \u043d\u0430 \u043a\u0430\u0440\u0442\u0443, \u043e\u0442\u043f\u0440\u0430\u0432\u043a\u0430 \u0432 \u0442\u0435\u0447\u0435\u043d\u0438\u0438 \u0441\u0443\u0442\u043e\u043a", "namespaceId": 1, "uploadedFiles": [{"original_url": "https://images.shafastatic.net/27049689", "original": "27049689", "readonly": true, "thumbnail_url": "https://image-thumbs.shafastatic.net/27049689_310_430", "content_type": null, "id": 27049689, "thumbnail": "27049689_310_430"}, {"original_url": "https://images.shafastatic.net/27049838", "original": "27049838", "thumbnail": "27049838_310_430", "readonly": true, "thumbnail_url": "https://image-thumbs.shafastatic.net/27049838_310_430", "content_type": null, "id": 27049838}, {"original_url": "https://images.shafastatic.net/27049860", "original": "27049860", "id": 27049860, "readonly": true, "thumbnail_url": "https://image-thumbs.shafastatic.net/27049860_310_430", "content_type": null, "thumbnail": "27049860_310_430"}], "sizeId": 8, "brandName": "", "subcategoryFullPath": "\u0416\u0435\u043d\u0441\u043a\u0430\u044f \u043e\u0434\u0435\u0436\u0434\u0430 / \u041f\u043b\u0430\u0442\u044c\u044f / \u0414\u043b\u0438\u043d\u043d\u044b\u0435 \u043f\u043b\u0430\u0442\u044c\u044f"}</script>

<script type="text/javascript" src="<?php echo $this->themeCss; ?>bxslider/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->themeCss; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $this->themeCss; ?>/assets/build/script.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/new_listing.js"></script>



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