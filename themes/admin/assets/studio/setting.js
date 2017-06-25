var saveUpdateDeferred;
var tpmsg = 0;
function bsError(context,message) {
    // вывод на текущую модальную форму
    var oldalert = $('#msgbsalert');
    oldalert.remove();
    //if (oldalert.length>0) oldalert.text(message);
    //else {
        if (typeof context == 'string') context = $('#'+context);
        if ($(context).hasClass('modal')) context = $(context);
        else context = $(context).closest('.modal');
        context.find('.modal-body').prepend(
        '<div class="alert alert-error fade in"><i class="icon-alert icon-alert-info"></i>'+
        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
        '<strong>Ошибка!</strong> <span id="msgbsalert">'+message+'</span></div>').alert();
    //}
}

var rand = function() {
    return Math.random().toString(36).substr(2); // remove `0.`
};

var token = function() {
    return rand() + rand(); // to make it longer
};

$(function() {

    $('div.modal').on('show',function(){
        $('div.alert',this).remove();
    });
    

    $('a.update').live('click',function(){
        var bt = $(this).parents('.button-column');
        var tr = bt.parent(), id,type;
        $('#idSetting').val(id=parseInt(tr.attr('data-id')));
        $('#tpSetting').val(type=parseInt(tr.attr('data-type')));
        var tx = bt.siblings('.setting-content');
        var rs = bt.siblings('.setting-result');
        var value = $.trim(tx.children('.editsetting').text());
        var dialog = $('#modal-dialog-'+(type==1?'string':(type==4?'image':'text')));
        if (type==4) {
            $('#uploadImage')[0].reset();
            var container = $('div.image-exists','#uploadImage').toggle(!!value);
            if (value) container.children(':first').attr('src','/'+value+'?'+token());
            $('#Media_del').val('no');
            $('input[name="id"]','#uploadImage').val(id);
            $('div.fileupload','#uploadImage').toggle(!value)
        } else
            $('div.modal-body > p',dialog).children().val(value);
        saveUpdateDeferred = $.Deferred();
        //saveUpdateDeferred.item = item;
        saveUpdateDeferred.done(function(newitem){
            tx.children('.editsetting').text(newitem.text);
            if (newitem.type==1)
                rs.text(newitem.text);
        });
        dialog.modal("show");
        return false;
    });

    $("a.btn-form-save").click(function(){
        var type = parseInt($('#tpSetting').val());
        var dialog = $('#modal-dialog-'+(type==1?'string':(type==4?'image':'text')));
        var item = {
            id : parseInt($('#idSetting').val()),
            text : $('div.modal-body > p',dialog).children().val()
        }
        if (type==4)
            $('#uploadImage').submit();
        else
        $.post("/admin/setting/save",item,function(data){
            if ('status' in data) {
                if (data.status=='Success') {
                    if ('refresh' in data && data.refresh) {
                        location.reload();
                        return;
                    }
                    if ('value' in data)
                        item.text = value;
                    dialog.modal('hide');
                    saveUpdateDeferred.resolve({
                        type : type,
                        text : item.text
                    });
                } else
                    bsError(dialog,data.status);
            } else {
                bsError(dialog,'Пришёл некорректный ответ с сервера');
                console.log(data);
            }
        },'json');
        return false;
    });

});
