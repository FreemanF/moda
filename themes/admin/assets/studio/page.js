var disable_delete_object = true;
function modalEditFolder(f_name,fid,f_pid) {
    f_name = f_name || '';
    fid    = fid    || 0;
    f_pid  = f_pid  || 0;
    var form = $("#modalEditFolder");
    var body = $('div.modal-body',form);
    $('input[name="fid"]',body).val(fid);
    $('input[name="f_pid"]',body).val(f_pid);
    $('input[name="f_name"]',body).val(f_name);
    $('div.modal-header h3',form).text(fid ? 'Редактирование названия папки' : 'Новая папка');
    $('div.modal-body span.control-label',form).text(fid ? 'Новое название' : 'Название папки');
    $('div.modal-footer a:eq(0)',form).text(fid ? 'Сохранить' : 'Добавить');
    form.modal("show");
}

var tpmsg = 0;
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

var saveUpdateDeferred;
function updateObject(event,target){
    event = event || window.event;
    event.stopPropagation();
    var th = $(target); // tag A
    var tr = th.closest("tr");
    var id = tr.attr("data-id");
    var currentHash = window.location.hash;
    if (id>0 && currentHash!='#trash')
        return true;
    event.preventDefault();
    if (currentHash=='#trash') {
        $.post('/admin/page/restore',{id:id}, function(data) {
            if (('status' in data) && data.status=='Success') {
                if ('tree' in data) {
                    dataTree = data.tree;
                    setTimeout(updateJsTree,0);
                } else
                if (id<0)
                    jQuery('#jstree').jstree('move_node',
                        '#node_'+(-id),
                        data.pid ? '#node_'+data.pid : '#trash',
                        data.pid ? 'last'            : 'before');
                tr.remove();
            } else {
                //bsError(form,'Пришёл не корректный ответ с сервера');
                console.log(data);
            }
        },'json');
        return false;
    }
    if (id<0 && th.attr('href')=='#') {
        var td = tr.find('td:first');
        saveUpdateDeferred = $.Deferred();
        saveUpdateDeferred.text = td.text();
        saveUpdateDeferred.done(function(newtext){td.html('<ins class="jstree-folder"></ins>'+newtext);});
        modalEditFolder(saveUpdateDeferred.text,-id);
    }
    return false;
}

function checkEnter(event) {
    if (event.keyCode == 13) {
        $('#saveEditFolder').trigger('click');
        return false;
    }
}

$(function() {
    
    $("#confirmDelete").on('show',function(){
        var form = $(this);
        var id = $('div.modal-body input[name="objectId"]',form).val();
        $('div.modal-header h3',form).text(id>0
            ? 'Удаление страницы'
            : 'Вы уверены, что хотите удалить данную папку?').css('font-size','20.5px');
        $('div.modal-body p',form).css('text-align','left').html(id>0 
            ? 'Вы уверены, что хотите удалить данную страницу?' 
            : '<font color="#dd4d36">Важно!</font> При удалении папки будут удалены все вложенные папки и страницы');
    });
    
    $(".modal-import-panel").html('\
    <div id="modalEditFolder" data-backdrop="static" class="modal hide fade">\
        <div class="modal-header">\
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
            <h3>Новая папка</h3>\
        </div>\
        <div class="modal-body">\
            <span class="control-label" for="inputField">Название папки</span>\
            <input type="text"   name="f_name" value="" onkeydown="return checkEnter(event);"/>\
            <input type="hidden" name="f_pid"  value="0" />\
            <input type="hidden" name="fid"  value="0" />\
        </div>\
        <div class="modal-footer">\
            <button type="submit" class="btn btn-primary" id="saveEditFolder">Сохранить</a>\
            <button class="btn btn-form-back" data-dismiss="modal">Отмена</a>\
        </div>\
    </div>');
    
    $("#modalEditFolder").on('show',function(){
        $('div.alert',this).remove();
    }).on('shown',function(){
        $('input:text:visible:first',this).focus();
    });
    
    $('#buttonAddRoot').click(function(e){
        //e.stopPropagation();
        //e.preventDefault();
        modalEditFolder();
        return false;
    });
    $('#buttonAddFolder').click(function(event){
        if ($(this).hasClass('disabled')) {
            event = event || window.event;
            event.preventDefault();
            return false;
        }
        var f_pid = parseInt($('#idParent').val());
        modalEditFolder('',0,f_pid);
        return false;
    });
    
    $('#saveEditFolder').click(function(){
        var form = $("#modalEditFolder");
        var body = $('div.modal-body',form);
        var fid    = parseInt($('input[name="fid"]',body).val());
        var f_pid  = parseInt($('input[name="f_pid"]',body).val());
        var f_name = $('input[name="f_name"]',body).val().trim();
        
        if (f_name) {
            
            if (fid && saveUpdateDeferred.text == f_name)
                form.modal('hide');
            else
            $.post('/admin/page/folder',{fid:fid,f_pid:f_pid,f_name:f_name}, function(data) {
                if ('status' in data) {
                    if (data.status=='Success') {
                        form.modal('hide');
                        if (fid) {
                            jQuery('#jstree').jstree('set_text','#node_'+fid, f_name);
                            saveUpdateDeferred.resolve(f_name);
                        } else {
                            jQuery('#jstree').jstree('create_node',
                                f_pid ? '#node_'+f_pid : '#trash',
                                f_pid ? 'last'         : 'before',
                                { 
                                    data: { title : f_name, attr  : { href : '#node_'+data.fid } },
                                    attr: { id : 'node_'+data.fid, 'data-id' : data.fid }
                                });
                            jQuery('#jstree').jstree('select_node','#node_'+data.fid,true);
                        }
                    } else
                        bsError(form,data.status);
                } else {
                    bsError(form,'Пришёл не корректный ответ с сервера');
                    console.log(data);
                }
            },'json');
        } else
            bsError(form, [
                'Сосредоточтесь, от вас требуется всего лишь название',
                'Вы не ввели название папки',
                'Необходимо ввести какое-нибудь название',
                'Название папки не может быть пустым'
            ][(tpmsg=tpmsg ? tpmsg-1 : 3)]);
    });
});
