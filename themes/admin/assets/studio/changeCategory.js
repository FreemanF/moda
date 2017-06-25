var editorType  = '';
var editorModel = '';
var noChange = false;
function updateAttribute(cat){
    $.post('/admin/tovar/attribute', {cat: cat}, function(data){
        if ( ('status' in data) && (data.status=='Success') && ('attribute' in data) ) {
            $('#attribute_product').html(data.attribute);
            $('.AttributeInCatalog').uniform();
        } else
            $('#attribute_product').html('\
                <div class="control-group row-fluid">\
                    <div class="span12">\
                        <label class="control-label">Нет атрибутов</label>\
                    </div>\
                </div>');
    }, 'json');
}

function changeEditorType(newtype,warning)
{
    var cat = $('#'+editorModel+'_tv_cat_main').val();
    
    if (newtype==0 && cat==null) {
        $('#attribute_product').html('\
            <div class="control-group row-fluid">\
                <div class="span12">\
                    <label class="control-label">Нет атрибутов</label>\
                </div>\
            </div>');
            return;
    }
    if (newtype==0)
        updateAttribute(cat);
    
    if('undefined'==typeof warning)
        warning = true;
    
    if( warning )
        if( window.confirm('При изменение категории товара все выбранные атрибуты будут удалены.\nВы уверены что хотите изменить категорию?')){
            updateAttribute(cat);
        } else {
            noChange = true;
            $('#'+editorModel+'_tv_cat_main').select2('val',editorType);
        }
}

$(document).ready(function() {
    
    changeEditorType(editorType,false);

    $('#'+editorModel+'_tv_cat_main').change(function(){
        if ( noChange )
            noChange = false;
        else
            changeEditorType($(this).val());
    });
});
