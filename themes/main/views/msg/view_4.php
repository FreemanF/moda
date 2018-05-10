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
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-1px-left"></use>
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
                                    'id'=>'id_string',
                                    'dataProvider'=>$this->dataProvider,
                                    'itemView'=>'msg_list',
                                    'template'=>"{pager}\n{items}\n{pager}\n",
//                                    'enablePagination'=>true,
//                                    'pager' => array('id' => 'pager',
//                                        'class' => 'CLinkPager',
//                                        ),
                                    'ajaxUpdate' => false,
                                    'enableHistory'=>false,
                                ));
                                
//        $pager=$this->dataProvider->pagination;
//        $pager->itemCount=$dataProvider->totalItemCount;
//        if(!Yii::app()->request->isAjaxRequest){
//                $pager->currentPage=$pager->pageCount;
//                
//        }
//                    $jqueryPath = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('system.web.js.source'));
//                    Yii::app()->clientScript->registerScriptFile($jqueryPath.'/jquery.ba-bbq.min.js',CClientScript::POS_END);
                            ?>
                                <script type="text/javascript">
//                                $(document).ready(function() {    
//                                    jQuery('#id_string').yiiListView({'ajaxUpdate':['1','id_string'],'ajaxVar':'ajax','pagerClass':'pager','loadingClass':'list\x2Dview\x2Dloading','sorterClass':'sorter','enableHistory':false});
//                                });
                                </script>
                                <?php
//                                $this->widget('CLinkPager', array(
//                                    'pages'=>$this->dataProvider->pagination,
//                                ));
                                ?>
<!--                                
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
                                </li>-->

                                
                            </ul>

                            <div class="js-new-message">
                                <form id="new_msg" data-reactroot="" action="" class="b-new-message" method="POST" enctype="multipart/form-data">
    <div class="b-new-message__image-wrapper">
        <img src="https://image.flaticon.com/icons/png/128/145/145845.png" alt="font" class="b-new-message__image">
    </div>
    <div class="b-new-message__textfield">
        <textarea id="new_message" name="new_message" class="b-new-message__textarea" placeholder="Напишите Ваше сообщение" required="required" style="overflow: hidden; word-wrap: break-word; height: 60px;"></textarea>
        <span class="b-new-message__triangle"></span>
        <style>
            #new_message:invalid {
                border-color: #631220;
            }
            /* style all input elements with a required attribute */
#new_message:required {
  box-shadow: 1px 1px 1px rgba(56, 28, 104, 0.85);
}

/**
 * style input elements that have a required
 * attribute and a focus state
 */
#new_message:required:focus {
  border: 1px solid rgb(56, 28, 104);
  outline: none;
}

/**
 * style input elements that have a required
 * attribute and a hover state
 */
#new_message:required:hover {
  opacity: 1;
}
        </style>
    </div>
    <div class="b-messages b-new-message__upload">
        <ul class="b-messages__photos-list js-gallery-magnific"></ul>
    </div>
    <span class="b-messages__photos-upload-loader b-hidden">
        <img src="/assets/img/uploading.gif">
    </span>
    <button class="b-new-message__button b-button b-button_fs_18">Отправить</button>
    <div class="b-new-message__file">
        <svg class="b-new-message__icon">
        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--camera"></use>
        </svg>
        <input id="Fileinput" class="b-new-message__input" name="fileinput[]" title="Выбрать фото" type="file" multiple="multiple">
    </div>
<?php
$md = new Messages();
$this->widget('CMultiFileUpload',
    array(
//        'name'=>
        'model'=> $md,
        'attribute' => 'attachments[]',
        'accept'=> 'doc|docx|pdf|txt|jpg|jpeg',
        'denied'=>'Only doc,docx,pdf and txt are allowed', 
        'max'=>3,
        'remove'=>'[x]',
        'duplicate'=>'Already Selected',
        'htmlOptions' => array('multiple' => 'multiple'),

           )
        );?>

    <div class="b-new-message__file" style="display: none;">
        <svg class="b-new-message__icon">
        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--paste"></use>
        </svg>
        <span class="b-new-message__input" title="Готовые ответы"></span>
    </div>
    <div class="b-new-message__file" style="display: none;">
        <svg class="b-new-message__icon-heart2">
        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--heart2"></use>
        </svg>
        <span class="b-new-message__input" title="Добавить в избранное"></span>
    </div>
    <img src="" id="img_preview" style="max-height: 200px;width: auto; display: none;margin-top: 10px;">
    <output id="list"></output>
    <style>
  .thumb {
    height: 75px;
    border: 1px solid #000;
    margin: 10px 5px 0 0;
  }
  input[type="file"] {
  display: block;
}
/* фвафываыва */
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
    <script>
//        $(function(){
//            $(".b-new-message").click(function(){
//                var $fileUpload = $("input[type='file']");
//                if (parseInt($fileUpload.get(0).files.length)>2){
//                 alert("Вы можете загрузить не более 3 файлов!");
//                }
//            });
//        });
/////////////////////
$(document).ready(function() {
    document.getElementById("Fileinput").value = "";
    document.getElementById("new_msg").reset();
    
  if (window.File && window.FileList && window.FileReader) {
    $("#Fileinput").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      var newList = [];
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<div class=\"pip\">" +
            "<img id=\""+i+"\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Удалить</span>" +
            "</div>").insertAfter("#list");
          $(".remove").click(function(){
              console.log(this);
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>
    <noscript></noscript>
</form>
<!--                                
<form id="Ajaxform">
	<input type="file" name="ajax_file" id="Fileinput">
	<div class="img_preview">
		<div class="im_progress">
                    <img class="loader_img" src="ajax-loader.gif" style="display: none;">
		</div>
            <img src="" id="img_preview" style="max-height: 200px;width: auto;">
	</div>
	<div class="All_images"></div>
</form>
                                -->
<script>
    $(document).ready(function(){
        $('#new_msg').find("input[type=text], textarea").val("");
    });
//$(document).on('change','#Fileinput',function(){
/*	var imgpreview=DisplayImagePreview(this);
	$(".img_preview").show();
        $('.b-new-message').children('#img_preview').show();*/
        //(".img_preview").css('display','block');
//	var url="process.php";
//    ajaxFormSubmit(url,'#Ajaxform',function(output){
//		var data=JSON.parse(output);
//		if(data.status=='success'){
//			$('.im_progress').fadeOut();
//		}else{
//			alert("Something went wrong.Please try again.");
//			$(".img_preview").hide();
//		}
//    })	
//});	
function DisplayImagePreview(input){
	console.log(input.files);
	if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function ajaxFormSubmit(url, form, callback) {
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        datatype: 'json',
        beforeSend: function() {
            // do some loading options
        },
        success: function(data) {
            callback(data);
        },
 
        complete: function() {
            // success alerts
        },
 
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        },
        cache: false,
        contentType: false,
        processData: false
 
    });
 
}
</script>

                            </div>
                        </div>

<script>
// this script executes when click on upload images link
    function uploadImage() {
        $("#forum_image").click();
        return false;
}
</script>
 


                        

                        <div class="b-message-header__table">
                            <div class="b-message-header__cell">
                                <a class="b-message-header__back" href="/msg/">
                                    <svg class="b-message-header__arrow">
                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4#static--svg--arrow-1px-left"></use>
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
    window.spriteUrl = '<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4';
</script>


<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>



<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>

    <script defer src="<?php echo $this->themeCss; ?>assets/build/messages.js"></script>
    
    <script>document.getElementById('last-message').scrollIntoView();</script>
    <script>
//    jQuery("#list-view-id").yiiListView({
//        ajaxUpdate:["list-view-id"],
//        enableHistory:false
//    });
    </script>

</body>
</html>