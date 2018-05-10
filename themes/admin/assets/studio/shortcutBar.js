var isDragActive = false;
var aSortOld = [];

function fSort(event, ui){
    var aSort = [];
    var i = 0;
    $('li.sort','#sortable').each(function(){
        aSort[i] = $(this).attr("data-id");
        i++;
    });
    if( aSort.toString() != aSortOld.toString() && aSortOld.length>0 ){
        $.post('/admin/admin/updatesortbar',{sort:aSort});
        aSortOld = aSort;
    }
    isDragActive = false;
}

function initShortcutBar() {
    
    aSortOld = [];
    if( !aSortOld.length ){
        var i = 0;
        $('li.sort','#sortable').each(function(){
            aSortOld[i] = $(this).attr("data-id");
            i++;
        });
    }

    // Quicklaunch Widget
    $( "#sortable" ).sortable({
        cancel: '#sortable li:last-child',
        start: function(event, ui) {
            isDragActive = true;
            $('.dashboard-quick-launch li img').tooltip('hide');
        },
        stop: fSort,
        containment: 'parent',
        tolerance: 'pointer'
    });

    $('.dashboard-quick-launch li img').not('.dashboard-quick-launch li:last-child').tooltip({
        placement: 'top',
        html: true,
        trigger: 'manual',
        title: '<a href="javascript:;" class="edit-ql"><span class="left">Редактировать</span></a><a class="delete-ql" href="javascript:;"><span class="right">Удалить</span></a>'
    });

    var hoverTimeout;
    $('.dashboard-quick-launch li').hover(function () {
        if (!$(this).find('.tooltip').length){
            $activeQL = $(this);
            clearTimeout(hoverTimeout);
            hoverTimeout = setTimeout(function() {
                if (isDragActive) return;
                $activeQL.find('img').tooltip('show');
            }, 1000);
        }
    }, function () {
        clearTimeout(hoverTimeout);
        $('.dashboard-quick-launch li').find('img').tooltip('hide');
    });

}

var tpmsg = 0;
function bsSBError(context,message) {
    // вывод на текущую модальную форму
    var oldalert = $('#msgbsSBalert');
    if (oldalert.length>0) oldalert.text(message);
    else {
        if (typeof context == 'string') context = $('#'+context);
        if ($(context).hasClass('modal')) context = $(context);
        else context = $(context).closest('.modal');
        context.find('.modal-body:first').prepend(
        '<div class="alert alert-error fade in"><i class="icon-alert icon-alert-info"></i>'+
        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
        '<strong>Ошибка!</strong> <span id="msgbsSBalert">'+message+'</span></div>').alert();
    }
}

$(document).ready(function(){

    initShortcutBar();
    
    // Make widgets sortable
//    $( "#photon_widgets" ).sortable({
//        cancel: '.blank-widget, .flip-it',
//        placeholder: 'dashboard-widget-placeholder',
//        start: function(event, ui) {
//            isDragActive = true;
//            $('.widget-holder').addClass('noPerspective');
//            $('.dashboard-quick-launch li img').tooltip('hide');
//        },
//        stop: function(event, ui) {
//            isDragActive = false;
//            $('.widget-holder').removeClass('noPerspective');
//        },
//        tolerance: 'pointer'
//    });

    $("#addql").live("click", function(){
        var modal = $('#modalQuickLaunch');
        $('.modal-header h3',modal).text('Создание кнопки быстрого доступа');
        $('#saveShortcut').text('Создать');
        var inputs = $('.modal-body:first input',modal);
        $('.loadBarPhoto',modal).attr('src', '').hide();
        inputs.filter('[name="ShortcutId"]'   ).val(0);  //#Shortcut_Id
        inputs.filter('[name="ShortcutLabel"]').val(''); //#Shortcut_Label
        inputs.filter('[name="ShortcutURL"]'  ).val(''); //#Shortcut_URL
        $('#msgbsSBalert').parent().remove(); // alert
        modal.modal("show");
    });

    $(".edit-ql").live("click", function(){
        var modal = $('#modalQuickLaunch');
        $('.modal-header h3',modal).text('Редактирование кнопки быстрого доступа');
        $('#saveShortcut').text('Сохранить');
        var inputs = $('.modal-body:first input',modal);
        var a = $(this).parent().parent().parent();
        $('.loadBarPhoto',modal).attr('src', a.children('img').attr("src"));
        inputs.filter('[name="ShortcutId"]'   ).val(a.parent('li.sort').data('id'));  //#Shortcut_Id
        inputs.filter('[name="ShortcutLabel"]').val(a.children('p').text()); //#Shortcut_Label
        inputs.filter('[name="ShortcutURL"]'  ).val(a.attr("href")); //#Shortcut_URL
        $('#msgbsSBalert').parent().remove(); // alert
        modal.modal("show");
    });

    $(".delete-ql").live("click", function(){
        var li = $(this).parents('li.sort');
        var id = li.data('id');
        li.remove();
        $.post("/admin/admin/deleteShortcutBar",{id:id});
    });

    $(".barPhoto").live("click", function(){
        var icon = $('.loadBarPhoto','#modalQuickLaunch');
        var src  = $(this).find('img').attr('src');
        icon.attr('src', src);
        if( icon.css('display')=='none' )
            icon.toggle();
    });

    $("#saveShortcut").click(function(){
        var modal  = $('#modalQuickLaunch');
        var icon   = $('.loadBarPhoto',modal);
        var inputs = $('.modal-body:first input',modal);
        var data   = {
            icon : icon.css('display')=='none' ? '' : $.trim($('.loadBarPhoto',modal).attr('src')),
            id   : parseInt(inputs.filter('[name="ShortcutId"]'   ).val()),
            name : $.trim(inputs.filter('[name="ShortcutLabel"]').val()),
            url  : $.trim(inputs.filter('[name="ShortcutURL"]'  ).val())
        };
        if (data.name=='') bsSBError(modal,'Название не может быть пустым'); else
        if (data.url =='') bsSBError(modal,'URL не может быть пустым'); else
        if (data.icon=='') bsSBError(modal,'Вы не выбрали картинку'); else
            $.post("/admin/admin/editShortcutBar", data, function(result){
                if( result["status"]!="Fail" ){
                    modal.modal('hide');
                    $("#sortable").replaceWith($("#sortable", result));
                    initShortcutBar();
                } else
                    bsSBError(modal,'По мнению сервера в данных имеется ошибка ;)');
            });
    });

});