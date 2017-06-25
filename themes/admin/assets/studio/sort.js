//var crudalias = '';
callbackSortObject = window.callbackSortObject || $.Callbacks('unique');
function getItemsSort() {
    var itemsSort = [];
    $('table.dataTable tbody tr.item_sort').each(function(){
        itemsSort.push(parseInt($(this).data("id")));
    });
    return itemsSort;
}
function updateItemsSort(event, ui){
    var newItemsSort = getItemsSort();
    if( newItemsSort.toString() != oldItemsSort.toString() && oldItemsSort.length>0 ){
        $.post('/admin/admin/updatesort',{sort:newItemsSort,alias:crudalias},function(data){
            if (('status' in data) && (data.status=='Success')) {
                oldItemsSort = newItemsSort;
                callbackSortObject.fire(data);
            } else
                alert('Не удалось изменить порядок записей на стороне сервера. Обновите страницу.');
        },'json');
    }
}
function initItemsSort() {
    $('table.dataTable tbody').sortable( {
        stop: updateItemsSort,
        forcePlaceholderSize: true,
        items: '.item_sort',
        axis: 'y',
        helper : 'clone'
    });
}
$(function(){
    oldItemsSort = getItemsSort();
    initItemsSort();
});
