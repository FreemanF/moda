function sortingFilter(){
    var pointer;
    var index = 0;
    var flags = $(".AttributeFilters");
    $(".pickList_targetList .pickList_listItem").each(function(){
        var val = $(this).data("value");
        var flag = flags.filter("[id=AttributeFilter"+val+"]");
        if (index++>0)
            pointer.after(flag);
        pointer = flag;
    });
}
function sortingAttribute(){
    var pointer;
    var index = 0;
    var options = $("#listofattribute option:selected");
    var flags   = $(".AttributeFilters");
    $(".pickList_targetList .pickList_listItem").each(function(){
        var val = $(this).data("value");
        var item = options.filter("[value="+val+"]");
        if (index++>0)
            pointer.after(item);
        pointer = item;
    });
}
$().ready(function(){
    $("#"+inputID).pickList({
        sourceListLabel : 'Не выбранные',
        targetListLabel : 'Выбранные',
        sortItems: 0,
        onChange: function(){
            $('select#'+inputID+' option').each(function(){
                if ( $(this).attr('selected') == 'selected' ) {
                    if ( !$('#AttributeFilter'+$(this).val()).hasClass('AttributeFilterSelected') )
                        $('#AttributeFilter'+$(this).val()).addClass('AttributeFilterSelected');
                } else {
                    $('#AttributeFilter'+$(this).val()).removeClass('AttributeFilterSelected');
                }
            });
            sortingFilter();
        },
    });
    $(".pickList_targetList").sortable( {
        stop: sortingFilter,
        forcePlaceholderSize: true,
        items: ".pickList_listItem",
        axis: "y",
        helper : "clone"
    });
    $('.uniformPublished').uniform();
});