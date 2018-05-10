callbackSortObject = window.callbackSortObject || $.Callbacks('unique');
var itemChecked;
function getItemsSort() {
    var itemsSort = [];
    $('.form-horizontal .container-fluid .item_sort').each(function(){
        itemsSort.push(parseInt($(this).data("id")));
    });
    return itemsSort;
}

function getItemsType() {
    var itemsMain = [];
    $('.form-horizontal .container-fluid .item_sort').each(function(){
        itemsMain.push(parseInt($(this).data("type")));
    });
    return itemsMain;
}

function updateItemsSort(event, ui){
    var newItemsSort = getItemsSort();
    var newItemsType = getItemsType();
    if( newItemsSort.toString() != oldItemsSort.toString() && oldItemsSort.length>0 ){
        $.post('/admin/admin/updatephotosort',{sort:newItemsSort,alias:crudalias,oID:oID,type:newItemsType},function(data){
            if (('status' in data) && (data.status=='Success')) {
                oldItemsSort = newItemsSort;
                callbackSortObject.fire(data);
                $("#"+itemChecked).attr("checked", "checked");
            } else
                alert('Не удалось изменить порядок записей на стороне сервера. Обновите страницу.');
        },'json');
    }
}
function initItemsSort() {
    $('.form-horizontal .container-fluid').sortable( {
        stop: updateItemsSort,
        forcePlaceholderSize: true,
        items: '.item_sort',
        axis: 'y',
        helper : 'clone'
    });
}
$(document).ready(function(){
    oldItemsSort = getItemsSort();
    itemChecked = $("input[name=Media_i_main]:checked").attr("id");
    initItemsSort();
});
