<?php
	if (Yii::app()->user->isGuest){
		echo $this->renderPartial('//layouts/header');
	} else {
		echo $this->renderPartial('//layouts/header_logged');
	}
?>

    <div class="b-section">
        <div class="b-section__container b-main b-main_state_inverse">
            <div class="b-main__content">
                <div class="b-main__inner">
                    <div class="b-main__block">
                        <div class="b-message-header b-block">
                            <div class="b-message-header__table">
                                <div class="b-message-header__cell">
                                    <a class="b-message-header__back" href="/msg/">
                                        <svg class="b-message-header__arrow">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--arrow-1px-left"></use>
                                        </svg>
                                        Все сообщения
                                    </a>
                                </div>
                                <div class="b-message-header__cell">
                                    <p class="b-message-header__link">
                                        
                                            111
                                        
                                    </p>
                                </div>
                            </div>

                            
                        </div>

                        <div class="b-messages b-block">
                            <ul class="b-messages__list">
                                
                            <?php 
                                //echo $this->renderPartial('//layouts/breadcrumbs');

                                $this->widget('zii.widgets.CListView', array(
                                    'dataProvider'=>$this->dataProvider,
                                    'itemView'=>'msg_list',
                                    'template'=>"{items}{pager}",
                            //        'pager' => array('class' => ''),
                                    'ajaxUpdate' => false,
                                ));
                            ?>
                                
                                <li class="b-messages__item " id="last-message">
                                    <a class="b-messages__image-link" href="/m/438649">
                                        <span class="b-messages__image-wrapper">
                                            <img src="/avatars/438649" class="b-messages__image" alt="mr.fontez">
                                        </span>
                                    </a>
                                    <div class="b-messages__info">
                                        <time class="b-messages__time"
                                              datetime="2017-05-26T14:39:53.117465+03:00"
                                              title="26 мая 2017, 14:39">
                                            26 мая
                                        </time>

                                        <a class="b-messages__link" href="/m/438649">mr.fontez</a>

                                        <div class="b-messages__text">
                                            <p>123</p>
                                        </div>

                                        
                                    </div>
                                </li>

                                
                            </ul>

                            <div class="js-new-message">
<?php
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'post-form',
        'enableAjaxValidation' => FALSE,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
?>
                            <!--    <form data-reactroot="" action="" class="b-new-message"> -->
                                    <?php //echo CHtml::form(Yii::app()->createAbsoluteUrl('site/sendfirst'),'POST',array('class'=>'b-new-message','enctype' => 'multipart/form-data')); ?>
                                        <?php
                            //            echo CHtml::textArea('input', $input, array('class' => "b-product-message__textarea",'placeholder'=>'Напишите ваш вопрос'));
                            //            echo CHtml::hiddenField('prod',$this->model->pdid);
//                                        echo CHtml::hiddenField('recipient',$this->model->pd_user);

                                        ?>

                                    <div class="b-new-message__image-wrapper">
                                        <img src="/avatars/438599" alt="font" class="b-new-message__image">
                                    </div>
                                    <div class="b-new-message__textfield">
<!--                                        <textarea class="b-new-message__textarea" placeholder="Текст сообщения" style="overflow: hidden; word-wrap: break-word; height: 60px;"></textarea>-->
                                        <?php echo CHtml::textArea('input', $input, array('class' => "b-new-message__textarea",'placeholder'=>'Текст сообщения','style'=>'overflow: hidden; word-wrap: break-word; height: 60px;')); ?>
                                        <span class="b-new-message__triangle"></span>
                                    </div>
                                    <div class="b-messages b-new-message__upload">
                                        <ul class="b-messages__photos-list js-gallery-magnific"></ul>
                                    </div>
                                    <span class="b-messages__photos-upload-loader b-hidden">
                                        <img src="/assets/img/uploading.gif">
                                    </span>
                            <?php
//                            echo CHtml::ajaxSubmitButton('Обработать', Yii::app()->createAbsoluteUrl('site/sendfirst'), array(
//                'type' => 'POST',
//                // Результат запроса записываем в элемент, найденный
//                // по CSS-селектору #output.
//                'update' => '#input',
//            ),
//            array(
//                // Меняем тип элемента на submit, чтобы у пользователей
//                // с отключенным JavaScript всё было хорошо.
//                'type' => 'submit',
//                'class' => 'b-new-message__button b-button b-button_fs_18"',
//            ));
                            ?>
                            
<!--                                    <button class="b-new-message__button b-button b-button_fs_18">Отправить</button>-->
                                    <div class="b-new-message__file">
                                        <svg class="b-new-message__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--camera"></use>
                                        </svg>
<!--                                        <input type="file" class="b-new-message__input" title="Выбрать фото">-->
                                    <?php //echo CHtml::fileField($image,'b-new-message__input',array('id'=>'image','title'=>'Выбрать фото'));  ?>
                                    <?php
                                        $form->fileField($image,'forum_image',array('id'=>'forum_image',)); // image file select when clicks on upload photo
                                    ?>
                                        <a href="" onclick="return uploadImage();"><b class="photo">Upload Photo</b></a> <!-- Image link to select imag -->
    <?php CHtml::htmlButton('Post',array(
                'onclick'=>'javascript: send();', // on submit call JS send() function
                'id'=> 'post-submit-btn', // button id
                'class'=>'post_submit b-new-message__button b-button b-button_fs_18',
            ));
    ?>
                                    </div>
                                    <div class="b-new-message__file">
                                        <svg class="b-new-message__icon">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--paste"></use>
                                        </svg>
                                        <span class="b-new-message__input" title="Готовые ответы"></span>
                                    </div>
                                    <div class="b-new-message__file">
                                        <svg class="b-new-message__icon-heart2">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--heart2"></use>
                                        </svg>
                                        <span class="b-new-message__input" title="Добавить в избранное"></span>
                                    </div>
                                    
                                    <noscript></noscript>
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>

<script>
// this script executes when click on upload images link
    function uploadImage() {
        $("#forum_image").click();
        return false;
}
</script>
 
<script type="text/javascript">
// this script for collecting the form data and pass to the controller action and doing the on success validations
function send(){
    var formData = new FormData($("#post-form")[0]);
    $.ajax({
        url: '<?php echo Yii::app()->createUrl("forumPost/uploadPost"); ?>',
        type: 'POST',
        data: formData,
        datatype:'json',
        // async: false,
        beforeSend: function() {
            // do some loading options
        },
        success: function (data) {
            // on success do some validation or refresh the content div to display the uploaded images 
            jQuery("#list-of-post").load("<?php echo Yii::app()->createUrl('//forumPost/forumPostDisplay'); ?>");
        },
 
        complete: function() {
            // success alerts
        },
 
        error: function (data) {
            alert("There may a error on uploading. Try again later";)
        },
        cache: false,
        contentType: false,
        processData: false
    });
 
    return false;
}
</script>

                        

                        <div class="b-message-header__table">
                            <div class="b-message-header__cell">
                                <a class="b-message-header__back" href="/msg/">
                                    <svg class="b-message-header__arrow">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--arrow-1px-left"></use>
                                    </svg>
                                    Все сообщения
                                </a>
                            </div>
                            <div class="b-message-header__cell">
                                <a class="b-message-header__up" href="#" onclick="window.scrollTo(0, 0); return false;">&uarr; Наверх</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="b-main__aside">
                <div class="b-main__inner">
                    
                </div>
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
                   href="https://plus.google.com/1">Мы в Google+</a>
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

    <script defer src="<?php echo $this->themeCss; ?>assets/build/messages.js"></script>
    <script>document.getElementById('last-message').scrollIntoView();</script>



</body>
</html>