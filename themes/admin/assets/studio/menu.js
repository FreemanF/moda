var notclickable = '';
var pageOptionsForSelect = '';

function modalEditMenu(m_name,mid,m_pid,m_page_id,m_sef) {
    $('#Menu_mid'    ).val(mid    || 0);
    $('#Menu_m_pid'  ).val(m_pid  || 0);
    $('#Menu_m_name' ).val(m_name || '');
    $('#Menu_m_sef'  ).val(m_sef = m_sef || 'http://' );
    $('#pageSelector').select2('val',m_page_id = m_page_id  || 0);
    var selectTab = (m_page_id ? 'eq(1)' : (m_sef && m_sef!='http://' && m_sef!='https://' ? 'last' : 'first'));
    $('#menuType li:'+selectTab+' a').tab('show');
    
    var form = $('#modalEditMenu');
    $('div.modal-header h3',form).text(mid ? 'Редактирование пункта меню' : 'Новый пункт меню');
    $('div.modal-footer button:eq(0)',form).text(mid ? 'Сохранить' : 'Добавить');
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
    var td = tr.find('td:first');
    var item = {
        id   : parseInt(tr.attr("data-id")),
        page : parseInt(tr.attr("data-page")),
        sef  : tr.attr("data-sef"),
        name : td.text()
    };
    event.preventDefault();
    if (item.id>0 && th.attr('href')=='#') {
        saveUpdateDeferred = $.Deferred();
        saveUpdateDeferred.done(function(newitem){
            td.text(newitem.name).prepend('<ins class="jstree-page"></ins>');
            td.next().text(newitem.url);
            tr.attr("data-id"  ,newitem.id);
            tr.attr("data-page",newitem.page);
            tr.attr("data-sef" ,newitem.sef);
        });
        modalEditMenu(item.name, item.id, 0, item.page, item.sef);
    }
    return false;
}

function checkEnter(event) {
    if (event.keyCode == 13) {
        $('#saveEditMenu').trigger('click');
        return false;
    }
}

$(function() {
    $(".modal-import-panel").html('\
    <div id="modalEditMenu" data-backdrop="static" class="modal hide fade">\
        <div class="modal-header">\
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
            <h3>Новый пункт меню</h3>\
        </div>\
        <div class="modal-body">\
            <span class="control-label" for="inputField">Название</span>\
            <input type="text"   id="Menu_m_name" name="Menu[m_name]" value="" onkeydown="return checkEnter(event);"/>\
            <input type="hidden" id="Menu_m_pid"  name="Menu[m_pid]"  value="0" />\
            <input type="hidden" id="Menu_mid"    name="Menu[mid]"  value="0" />\
            <input type="hidden" id="Menu_m_level" name="m_level" value="#blank" />\
            <div class="tabbable">\
                <ul class="nav nav-tabs" data-tabs="tabs" id="menuType">\
                    <li><a href="#blank" data-toggle="tab">Пункт заглушка</a></li>\
                    <li><a href="#page" data-toggle="tab">Страница</a></li>\
                    <li><a href="#link" data-toggle="tab">Внешняя ссылка</a></li>\
                </ul>\
                <div class="tab-content">\
                    <div class="tab-pane fade" id="blank">\
                        <span class="control-label">Данный пункт никуда не будет вести</span>\
                    </div>\
                    <div class="tab-pane fade" id="page">\
                        <span class="control-label">Пункт меню будет вести на страницу:</span>\
                        <select id="pageSelector" name="Menu[m_page_id]" class="selectMenu">'+pageOptionsForSelect+'</select>\
                    </div>\
                    <div class="tab-pane fade" id="link">\
                        <span class="control-label" for="inputField">Внешний URL</span>\
                        <input type="text" id="Menu_m_sef" name="Menu[m_sef]" value="" onkeydown="return checkEnter(event);"/>\
                    </div>\
                </div>\
            </div>\
        </div>\
        <div class="modal-footer">\
            <button type="submit" class="btn btn-primary" id="saveEditMenu">Сохранить</a>\
            <button class="btn btn-form-back" data-dismiss="modal">Отмена</a>\
        </div>\
    </div>');
    
    $("#pageSelector").select2({
        dropdownCssClass: 'noSearch'
    });
    $('a[data-toggle="tab"]','#menuType').on('shown', function (e) {
        $('input[name="m_level"]','#modalEditMenu').val($(e.target).attr('href'));
    });
    
    $("#modalEditMenu").on('show',function(){
        $('div.alert',this).remove();
    }).on('shown',function(){
        $('input:text:visible:first',this).focus();
    }).on('hide',function(){
        $('#pageSelector').select2('close');
    });
    
    $('#addObject').unbind('click').click(function(event){
        if ($(this).hasClass('disabled')) {
            event = event || window.event;
            event.preventDefault();
            return false;
        }
        var m_pid = parseInt($('#idParent').val());
        modalEditMenu('',0,m_pid);
        return false;
    });

    $('#saveEditMenu').click(function(){
        var form = $("#modalEditMenu");
        var item = {
            mid    : parseInt($('#Menu_mid').val()),
            m_pid  : parseInt($('#Menu_m_pid').val()),
            m_name : $('#Menu_m_name').val().trim(),
            m_level: $('#Menu_m_level').val().trim(),
            m_sef  : $('#Menu_m_sef').val().trim(),
            m_page_id : parseInt($('#pageSelector').val())
        };
        if (item.m_level=='#page' && item.m_page_id==0)
            bsError(form, 'Выберите пожалуйста страницу.');
        else
        if (item.m_level=='#link' && (item.m_sef=='' || item.m_sef=='http://' || item.m_sef=='https://'))
            bsError(form, 'Требуется какая-нибудь ссылка.');
        else
        if (item.m_name) {
            $.post('/admin/menu/save',{Menu:item}, function(data) {
                if ('status' in data) {
                    if (data.status=='Success') {
                        form.modal('hide');
                        var jstree = jQuery('#jstree');
                        if (item.mid) {
                            jstree.jstree('set_text','#node_'+item.mid, item.m_name);
                            saveUpdateDeferred.resolve({
                                id   : parseInt(data.rec.mid),
                                name : data.rec.m_name,
                                sef  : data.rec.m_sef,
                                page : parseInt(data.rec.m_page_id==null?0:data.rec.m_page_id),
                                url  : data.url
                            });
                        } else {                            
                            jstree.jstree('create_node',
                                item.m_pid ? '#node_'+item.m_pid : -1,
                                'last',{   
                                    data: { title : data.rec.m_name, attr  : { href : '#node_'+data.rec.mid }, 
                                            icon : '/themes/admin/assets/images/photon/txt.png' },
                                    attr: { id          : 'node_'+data.rec.mid, 
                                            'data-id'   : data.rec.mid,
                                            'data-type' : data.rec.m_level 
                                          }
                                });
                            
                            if (item.m_pid) // Вместо странички показываем папку
                                $('#node_'+item.m_pid+'>a:eq(0)>ins:eq(0)').removeAttr('style');
                            if (data.rec.m_level==0) // обновить главную таблицу интерфейса
                                $('#idParent').val(0);
                            jstree.jstree('select_node','#node_'+data.rec.mid,true);
                        }
                    } else
                        bsError(form,data.status);
                } else {
                    bsError(form,'Пришёл некорректный ответ с сервера');
                    console.log(data);
                }
            },'json');
        } else
            bsError(form, [
                'Сосредоточтесь, от вас требуется всего лишь название',
                'Вы не ввели название меню',
                'Необходимо ввести какое-нибудь название',
                'Название меню не может быть пустым'
            ][(tpmsg=tpmsg ? tpmsg-1 : 3)]);
    });

});
