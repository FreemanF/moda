var delgenitive  = '';

callbackDeleteObject = window.callbackDeleteObject || $.Callbacks('unique');

function deleteObject(event,target){
    event = event || window.event;
    event.stopPropagation();
    var tr = $(target).closest("tr");
    var id = tr.attr("data-id");
    var form = $("#confirmDelete");
    $('div.modal-body input[name="objectId"]',form).val(id);
    form.modal('show');
    return false;
}

var tpmsg = 0;
function bsDeleteError(context,message) {
    // вывод на текущую модальную форму
    var oldalert = $('#msgbsdeletealert');
    if (oldalert.length>0) oldalert.text(message);
    else {
        if (typeof context == 'string') context = $('#'+context);
        if ($(context).hasClass('modal')) context = $(context);
        else context = $(context).closest('.modal');
        context.find('.modal-body').prepend(
        '<div class="alert alert-error fade in"><i class="icon-alert icon-alert-info"></i>'+
        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
        '<strong>Ошибка!</strong> <span id="msgbsdeletealert">'+message+'</span></div>').alert();
    }
}

function postDeleteObject() {
    var id = $('div.modal-body input[name="objectId"]',"#confirmDelete").val();
    if (crudalias)
        $.post("/admin/"+crudalias+"/delete", {id:id},function(data){
            if ('status' in data) {
                if (data.status=='Success' || data.status=='Trash') {
                    $('#confirmDelete').modal('hide');
                    $('table.dataTable tbody tr[data-id="'+id+'"]').remove();
                    callbackDeleteObject.fire(id,data);
                } else
                    bsDeleteError('confirmDelete',data.status);
            } else {
                bsDeleteError('confirmDelete','Пришёл некорректный ответ с сервера');
                console.log(data);
            }
            
        },'json');
    else
        console.log('INDEX.JS: crudalias is empty.');
}

function updateSortableFilter() {
    var sortlink = $('a.sort-link','table.dataTable');
    sortlink.filter('.asc').parent('th').attr('class','sorting_asc');
    sortlink.filter('.desc').parent('th').attr('class','sorting_desc');
    sortlink.not('.asc,.desc').parent('th').attr('class','sorting');
}

$(document).ready(function() {
    $(".modal-confirm-import").html('\
    <div id="confirmDelete" data-backdrop="static" class="modal hide fade">\
        <div class="modal-header">\
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
            <h3>Удаление '+delgenitive+'</h3>\
        </div>\
        <div class="modal-body">\
            <input type="hidden" name="objectId" />\
            <p style="text-align: center;">Вы уверены, что хотите удалить данный элемент?</p>\
        </div>\
        <div class="modal-footer">\
            <a href="javascript:;" class="btn btn-confirm-back" data-dismiss="modal">Отмена</a>\
            <a href="javascript:;" class="btn btn-primary" id="btnConfirmDelete">Удалить</a>\
        </div>\
    </div>');

    $(".filterSelectBox").select2({dropdownCssClass: "noSearch", width: "element"});
    
    $("#confirmDelete").on('show',function(){
        $('div.alert',this).remove();
    });
    $("#addObject").click(function(){
        if (crudalias)
            window.location.href = "/admin/"+crudalias+"/create";
        else {
            return false;
        }
    });
    $("#btnConfirmDelete").live("click",function(){
        postDeleteObject();
    });
    updateSortableFilter();
    setTimeout(function(){
        $('#alertObjectWasSaved').hide();
    },5000);
});
