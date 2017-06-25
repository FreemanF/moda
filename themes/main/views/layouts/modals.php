<?php
$variable=<<<XYZ

	<script type="text/javascript">
$(document).ready(function(){
    $("a#inline").fancybox({
		'scrolling' : 'no',
		'width': 480,
		'height': 520,
		'autoSize': false,
		'autoDimensions': false,
		'autoScale': false,
		'transitionIn': 'none',
		'transitionOut': 'none',
		'overlayColor' : '#e9e9e7',
//		'hideOnContentClick': false,
//		'type' : 'dialog'
	});
	

    //$("#f_contact").submit(function(){ return false; });
//    $("#f_send").on("click", function(){
         
        // тут дальнейшие действия по обработке формы
        // закрываем окно, как правило делать это нужно после обработки данных
//        $("#f_contact").fadeOut("fast", function(){
//            $(this).before("<p><strong>Ваше сообщение отправлено!</strong></p>");
//            setTimeout("$.fancybox.close()", 1000);
//        });
//    });
});
</script>
  	<!-- modal window -->

	<div style="display:none"><!-- hidden inline form -->
	<div id="contact_form_pop" style="background-color:#e9e9e7;">
		<h2 class="title with-el" style="text-align:center;align:center;margin-bottom:-25px;">Обратный звонок <p style="font-size: 11px; margin-top: 20px;font-weight:normal;">Заполните всего 2 поля, мы свяжемся с вами </br> в течении 10 минут</p></h2>

		<form id="f_contact" name="contact" action="contacts/requestcall" class="consultation-form" method="POST">
		<div class="row">
        <div class="col-lg-4 col-sm-12 col-lg-push-1">
          <input id="f_name" class="input-text" type="text" name="name" placeholder="Введите Ваше имя" required >
          <input id="phone" class="input-text" type="tel" name="phone" placeholder="Введите контактный телефон" required >
        </div>
		</div>
			<button id="f_send" type="submit" class="button sendt">ПОЗВОНИТЕ МНЕ</button>
			<span class="consultation-note">*Соблюдаем политику конфиденциальности</span>
		</form>
	</div>
	</div>
	
	<div style="display:none"><!-- hidden inline form -->
	<div id="contact_form_pop2" style="background-color:#e9e9e7;">
		<h2 class="title with-el" style="text-align:center;align:center;margin-bottom:-25px;margin-top:100px;margin-left: -38px;">Спасибо! <p style="font-size: 12px; margin-top: 20px;font-weight:normal;">Ваша заявка успешно отправлена, мы свяжемся с Вами </br> в течении 10 минут</p></h2>

	</div>
	</div>

<script>
    $('.sendt').click(function(){
        var formData = new FormData($('div#contact_form_pop > form')[0]);
		/**
        $.post("contacts/requestcall",formData, function(data) {
          console.log(data);
            if (('status' in data) && (data.status=='success')){
                $('.bottomWindowForm').dialog('close');
                $('.bottomWindowForm').css("display", "none");
                $('div.mainBlock > form').trigger("reset");
                alert('Ваша заявка успешно отправлена!');
            }
            if (('status' in data) && (data.status=='error')){
                alert('Произошла ошибка при отправке сообщения, попробуйте повторить позже');
            }
            }, 'json');
**/
            $.ajax({
            url: 'contacts/requestcall',
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
            //    alert('Ваша заявка успешно отправлена!');
            //    $('.bottomWindowForm').dialog('close');
            //    $('.bottomWindowForm').css("display", "none");
                $('div#contact_form_pop > form').trigger("reset");
				$('#fancybox-close').trigger('click');
				//
		$.fancybox({
			'href': '#contact_form_pop2',
			'scrolling' : 'no',
			'width': 460,
			'height': 380,
			'autoSize': false,
			'autoDimensions': false,
			'autoScale': false,
			'transitionIn': 'none',
			'transitionOut': 'none',
			'overlayColor' : '#e9e9e7',
			'hideOnContentClick': true,
			'modal': true,
			'type' : 'inline',
	});
	setTimeout("$.fancybox.close()", 5000);
            },
            error: function(){
                alert("Произошла ошибка при отправке сообщения, попробуйте повторить позже");
            }
        });
		
            return false;
			
    });
</script>

XYZ;
echo $variable;
?>