$(document).ready(function(){
    $('body').append('\
        <div class="modal-alert-clear">\
            <div id="alertClear" data-backdrop="static" class="modal hide fade">\
                <div class="modal-header">\
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
                    <h3>Сообщение</h3>\
                </div>\
                <div class="modal-body">\
                    <p style="text-align: center;"></p>\
                </div>\
                <div class="modal-footer modal-centered">\
                    <a href="javascript:;" class="btn btn-large btn-success" data-dismiss="modal">Продолжить</a>\
                </div>\
            </div>\
        </div>');
    $('.user-sub-menu .clearAssets').on('click', function(){
        $.post('/admin/admin/clear', {target: 'assets'}, function(data){
            $("#alertClear .modal-body p").text((data=='OK') ? '/assets очищен' : 'Ошибка! /assets не очищен');
            $("#alertClear").modal("show");
        });
    });
    $('.user-sub-menu .clearСache').on('click', function(){
        $.post('/admin/admin/clear', {target: 'cache'}, function(data){
            $("#alertClear .modal-body p").text((data=='OK') ? 'Кэш очищен' : 'Ошибка! Кэш  не очищен');
            $("#alertClear").modal("show");
        });
    });
});