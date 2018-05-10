function checkEnter(event) {
    if (event.keyCode == 13) {
        $('#saveForgotPass').trigger('click');
        return false;
    }
}

function bsError(context,message) {
    // вывод на текущую модальную форму
    var oldalert = $('#msgbsalert');
    if (oldalert.length>0) oldalert.text(message);
    else {
        if (typeof context == 'string') context = $('#'+context);
        if ($(context).hasClass('modal')) context = $(context);
        else context = $(context).closest('.modal');
        context.find('.modal-body').prepend(
        '<div class="alert alert-error fade in"><i class="icon-alert icon-alert-info"></i>'+
        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
        '<strong>Ошибка!</strong> <span id="msgbsalert">'+message+'</span></div>').alert();
    }
}
function bsAlert(context,message) {
    // вывод на текущую модальную форму
    var oldalert = $('#msgbsalert');
    if (oldalert.length>0) oldalert.text(message);
    else {
        if (typeof context == 'string') context = $('#'+context);
        if ($(context).hasClass('modal')) context = $(context);
        else context = $(context).closest('.modal');
        context.find('.modal-body').prepend(
        '<div class="alert alert-block fade in"><i class="icon-alert icon-alert-info"></i>'+
        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
        '<strong>Минуточку!</strong> <span id="msgbsalert">'+message+'</span></div>').alert();
    }
}

$(document).ready(function(){
    $(".modal-import-panel").html('\
    <div id="modalForgotPass" data-backdrop="static" class="modal hide fade">\
        <div class="modal-header">\
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
            <h3>Восстановление пароля</h3>\
        </div>\
        <div class="modal-body">\
            <span class="control-label" for="inputField">Введите свой email</span>\
            <input id="ForgotPass-email" type="text" name="email" value="" onkeydown="return checkEnter(event);"/>\
        </div>\
        <div class="modal-footer">\
            <button type="submit" class="btn btn-primary" id="saveForgotPass">Отправить</a>\
            <button class="btn btn-form-back" data-dismiss="modal">Отмена</a>\
        </div>\
    </div>');
    $(".modal-alert-import").html('\
    <div id="alertForgotPass" data-backdrop="static" class="modal hide fade">\
        <div class="modal-header">\
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
                <h3>Сообщение</h3>\
        </div>\
        <div class="modal-body">\
            <p>На Вашу почту отправлено письмо с инструкцией по восстановлению пароля</p>\
        </div>\
        <div class="modal-footer modal-centered">\
            <a href="javascript:;" class="btn btn-large btn-success" data-dismiss="modal">Продолжить</a>\
        </div>\
    </div>');
    $(".forgot-pass").click(function(){
        $("#modalForgotPass").modal("show");
    });
    
    $("#modalForgotPass").on('show',function(){
        $('div.alert',this).remove();
    }).on('shown',function(){
        $('input:text:visible:first',this).focus();
    });
    
    $("#saveForgotPass").click(function(){
        var form = $("#modalForgotPass");
        var email = $.trim($("#ForgotPass-email").val());
        if( email ){
            $('div.alert',form).remove();
            bsAlert(form,"");
            $.post('/admin/user/forgotpass',{email:email}, function(data) {
                $('div.alert',form).remove();
                if ('status' in data) {
                    if (data.status=='Success') {
                        form.modal('hide');
                        $("#alertForgotPass").modal("show");
                    } else{
                        bsError(form,data.status);
                    }
                } else {
                    bsError(form,'Пришёл не корректный ответ с сервера');
                    console.log(data);
                }
            },'json');
        }else{
            $('div.alert',form).remove();
            bsError(form, 'Email не может быть пустым');
        }
    });
});