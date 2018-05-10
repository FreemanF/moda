var notclickable = '';
var pageOptionsForSelect = '';
var editMenuTabs = true;
var menuType = 4;
var mainLanguage = 'ru';
var menuLanguages = {'ru':true,'en':true};
var menuFieldLabels = {name:'Название',descr:'Описание'};
var attributes = {};

function modalEditMenu(names,descr,mid,m_pid,m_page_id,m_sef,m_image) {
    $('#Menu_mid'    ).val(mid    || 0);
    $('#Menu_m_pid'  ).val(m_pid  || 0);
    for(var lang in menuLanguages) {
        $('#Menu_m_name_'+lang ).val(names[lang] || '');
        $('#Menu_m_descr_'+lang ).val(descr[lang] || '');
    }
    $('#Menu_m_sef'  ).val(m_sef = m_sef || 'http://' );
    $('#Menu_m_image').val(m_image || '' );
    $('#pageSelector').select2('val',m_page_id = m_page_id  || 0);
    $('#langType li:first a').tab('show');
    $('#menuType li:'+(m_page_id ? 'eq(1)' : (m_sef && m_sef!='http://' && m_sef!='https://' ? 'last' : 'first'))+' a').tab('show');
    
    var form = $('#modalEditMenu');
    $('div.modal-header h3',form).text(mid ? menuFieldLabels.edititem : menuFieldLabels.newitem);
    $('div.modal-footer button:eq(0)',form).text(mid ? 'Сохранить' : 'Добавить');
    if (menuType==61) {// Kind
        mid   = parseInt(mid || 0);
        m_pid = parseInt(m_pid || 0);
        //console.log('mid:',mid,' m_pid:',m_pid);
        var flid, count = 0, order = {}, os = {};
        if (m_pid in attributes) {
            for(flid in attributes[m_pid]) {
                count++;
                order[count] = false;
            }
            var selected = mid && mid in attributes ? attributes[mid] : {};
            for(flid in selected) {
                var sort = selected[flid];
                if (sort in order)
                    order[sort] = flid;
            }
            //console.log('order:',order);
            var next = 1;
            for(flid in attributes[m_pid]) {
                var name = attributes[m_pid][flid];
                if (flid in selected) {
                    var sort = selected[flid];
                    os[sort] = [true,flid,name];
                } else {
                    while (order[next]!==false) next++;
                    os[next] = [false,flid,name];
                    next++;
                }
            }
        }
        //console.log('os:',os);
        var html = '';
        for(var sort in os) {
            var field = os[sort];
            html += 
                '<tr class="selection"><td><input type="checkbox" name="Select[]" value="'+field[1]+
                    '" id="selectField'+field[1]+'"'+(field[0]?' checked':'')+
                    '/></td><td><label for="selectField'+field[1]+'">'+field[2]+
                    '</label></td></tr>';
        }
        $('.menutype61 > table > tbody').html(html);
    }
    form.modal("show");
}

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
        image: tr.attr("data-image"),
        names : {},
        descr : {}
    };
    for(var lang in menuLanguages) {
        item.names[lang] = tr.attr("data-"+lang);
        item.descr[lang] = tr.attr("data-descr-"+lang);
    }

    var m_pid = parseInt($('#idParent').val());

    //var currentHash = window.location.hash;
    event.preventDefault();
    if (item.id>0 && th.attr('href')=='#') {
        saveUpdateDeferred = $.Deferred();
        //saveUpdateDeferred.item = item;
        saveUpdateDeferred.done(function(newitem){
            td.text(mainLanguage=='ru'?newitem.names.ru:newitem.names.en)
              .prepend('<ins class="jstree-'+(newitem.level?'folder':'page')+'"></ins>');
            td.next().text(newitem.url);
            tr.attr("data-id"   ,newitem.id);
            tr.attr("data-page" ,newitem.page);
            tr.attr("data-sef"  ,newitem.sef);
            tr.attr("data-image",newitem.image);
            for(var lang in menuLanguages) {
                tr.attr("data-"+lang, newitem.names[lang]);
                tr.attr("data-descr-"+lang, newitem.descr[lang]);
            }
        });
        modalEditMenu(item.names, item.descr, item.id, m_pid, item.page, item.sef, item.image);
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
    var tabs = '', panes='';
    for(var lang in menuLanguages) {
        tabs += '<li><a href="#tab'+lang+'" data-toggle="tab">'+menuLanguages[lang]+'</a></li>';
        panes += 
       '<div class="tab-pane fade" id="tab'+lang+'">\
            <span class="control-label" for="Menu_m_name_'+lang+'">'+menuFieldLabels.name+'</span>\
            <input type="text"   id="Menu_m_name_'+lang+'" name="Menu[m_name_'+lang+']" value="" onkeydown="return checkEnter(event);"/>\
            <div class="menutype2" style="display:none">\
                <span class="control-label" for="Menu_m_descr_'+lang+'">'+menuFieldLabels.descr+'</span>\
                <textarea id="Menu_m_descr_'+lang+'" name="Menu[m_descr_'+lang+']" value="" onkeydown="return checkEnter(event);"></textarea>\
            </div>\
        </div>';
    }
    
    $(".modal-import-panel").html('\
    <div id="modalEditMenu" data-backdrop="static" class="modal hide fade">\
        <div class="modal-header">\
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
            <h3>'+menuFieldLabels.newitem+'</h3>\
        </div>\
        <div class="modal-body">\
            <div class="tabbable">\
                <ul class="nav nav-tabs" data-tabs="tabs" id="langType">'+tabs+'</ul>\
                <div class="tab-content">'+panes+'</div>\
            </div>\
            <input type="hidden" id="Menu_m_pid"  name="Menu[m_pid]"  value="0" />\
            <input type="hidden" id="Menu_mid"    name="Menu[mid]"  value="0" />\
            <input type="hidden" id="Menu_m_type" name="Menu[m_type]" value="0" />\
            <input type="hidden" id="Menu_type" name="m_type" value="#blank" />\
            <div class="tabbable menutype4 menutype2" style="display:none">\
                <ul class="nav nav-tabs" data-tabs="tabs" id="menuType">\
                    <li><a href="#blank" data-toggle="tab">'+menuFieldLabels.typeTabBlank+'</a></li>\
                    <li><a href="#page" data-toggle="tab">'+menuFieldLabels.typeTabPage+'</a></li>\
                    <li><a href="#link" data-toggle="tab">'+menuFieldLabels.typeTabLink+'</a></li>\
                </ul>\
                <div class="tab-content">\
                    <div class="tab-pane fade" id="blank">\
                        <span class="control-label">'+menuFieldLabels.typeLabelBlank+'</span>\
                    </div>\
                    <div class="tab-pane fade" id="page">\
                        <span class="control-label">'+menuFieldLabels.typeLabelPage+'</span>\
                        <select id="pageSelector" name="Menu[m_page_id]" class="selectMenu">'+pageOptionsForSelect+'</select>\
                    </div>\
                    <div class="tab-pane fade" id="link">\
                        <span class="control-label" for="inputField">'+menuFieldLabels.typeLabelLink+'</span>\
                        <input type="text" id="Menu_m_sef" name="Menu[m_sef]" value="" onkeydown="return checkEnter(event);"/>\
                    </div>\
                </div>\
            </div><form id="additional-data" class="form-horizontal">\
            <div class="tabbable menutype61 container-fluid" style="display:none">\
                <table class="table"><thead><tr><th colspan="2">Атрибуты связанные с типом бумаг</th></tr></thead><tbody>\
                <tr class="item_sort"><td></td><td></td></tr>\
                </tbody></table>\
            </div></form>\
        </div>\
        <div class="modal-footer">\
            <button type="submit" class="btn btn-primary" id="saveEditMenu">Сохранить</a>\
            <button class="btn btn-form-back" data-dismiss="modal">Отмена</a>\
        </div>\
    </div>');
    
    //if (!editMenuTabs)
    //    $('.modal-body div.tabbable','#modalEditMenu').hide();
    $('.modal-body div.menutype'+menuType,'#modalEditMenu').show();
    
    $("#pageSelector").select2({
        dropdownCssClass: 'noSearch'
    });
    $('a[data-toggle="tab"]','#menuType').on('shown', function (e) {
        $('input[name="m_type"]','#modalEditMenu').val($(e.target).attr('href'));
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
        $('#Menu_m_type'  ).val($('#typeParent').val());
        var names = {}, descr = {};
        for(var lang in menuLanguages) {
            names[lang] = '';
            descr[lang] = '';
        }
        
        modalEditMenu(names,descr,0,m_pid);
        return false;
    });

    $('#saveEditMenu').click(function(){
        var form = $("#modalEditMenu");
        var item = {
            mid    : parseInt($('#Menu_mid').val()),
            m_pid  : parseInt($('#Menu_m_pid').val()),
            m_type : menuType,
            m_sef  : $('#Menu_m_sef').val().trim(),
            m_image: $('#Menu_m_image').val().trim(),
            m_page_id : parseInt($('#pageSelector').val()),
            type : $('#Menu_type').val().trim()
        };
        var name, emptyname = false;
        for(var lang in menuLanguages) {
            item['m_name_'+lang] = name = $('#Menu_m_name_'+lang).val().trim();
            item['m_descr_'+lang] = $('#Menu_m_descr_'+lang).val().trim();
            if ( ! name) emptyname = true;
        }
        
        //validataion
        if (item.type=='#page' && item.m_page_id==0){
            bsError(form, 'Выберите пожалуйста страницу.');
            return ;
        }
        if (item.type=='#link' && (item.m_sef=='' || item.m_sef=='http://' || item.m_sef=='https://')){
            bsError(form, 'Требуется какая-нибудь ссылка.');
            return ;
        }
        if ( emptyname ) {
              bsError(form, [
                'Сосредоточтесь, от вас требуется всего лишь название',
                'Вы не ввели название меню',
                'Необходимо ввести какое-нибудь название',
                'Название меню не может быть пустым'
            ][(tpmsg=tpmsg ? tpmsg-1 : 3)]);
            return ;
        }
        //send data
        $.post('/admin/'+crudalias+'/save',{Menu:item,data:$('#additional-data').serialize()}, function(data) {
            if ('status' in data) {
                if (data.status=='Success') {
                    form.modal('hide');
                    if ('attributes' in data) {
                        attributes[parseInt(data.rec.mid)] = data.attributes;
                    }
                    var jstree = jQuery('#jstree');
                    if (item.mid) {
                        jstree.jstree('set_text','#node_'+item.mid, item['m_name_'+mainLanguage]);
                        saveUpdateDeferred.resolve({
                            id   : parseInt(data.rec.mid),
                            level: parseInt(data.rec.m_level),
                            names: data.rec.names,
                            descr: data.rec.descr,
                            sef  : data.rec.m_sef,
                            image: data.rec.m_image,
                            page : parseInt(data.rec.m_page_id==null?0:data.rec.m_page_id),
                            url  : data.url
                        });
                    } else {                            
                        jstree.jstree('create_node',
                            item.m_pid ? '#node_'+item.m_pid : -1,
                            'last',{   
                                data: { title : mainLanguage=='ru'?data.rec.names.ru:data.rec.names.en, 
                                        attr  : { href : '#node_'+data.rec.mid },
                                        icon  : sTxtPic },
                                attr: { id           : 'node_'+data.rec.mid, 
                                        'data-id'    : data.rec.mid,
                                        'data-level' : data.rec.m_level
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
          
    });

    $('.menutype61 > table > tbody').sortable( {
        forcePlaceholderSize: true,
        items: '.selection',
        axis: 'y',
        helper : 'clone'
    });
});
