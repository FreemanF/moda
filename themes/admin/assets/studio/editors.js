var editorType  = ''; // $this->model->content_type
var editorModel = ''; // $this->model->ownerClass
function changeEditorType(newtype,warning){
    if('undefined'==typeof warning) warning = true;
    if(warning && editorType!=newtype)
    if(!window.confirm('Вы готовы потерять изменения?')){
        $('#'+editorModel+'_content_type').select2('val',editorType);
        return;
    }
    if (newtype!='1') $('.content_tinymce').closest('.control-group').hide();
    if (newtype!='2') $('.content_markdown').closest('.control-group').hide();
    if (newtype!='3') $('.content_elrte').closest('.control-group').hide();
    if (newtype=='1') $('.content_tinymce').closest('.control-group').show();
    if (newtype=='2') $('.content_markdown').closest('.control-group').show();
    if (newtype=='3') $('.content_elrte').closest('.control-group').show();
    editorType = newtype;
}

$(document).ready(function() {
    
    changeEditorType(editorType,false);

    $('#'+editorModel+'_content_type').change(function(){
        changeEditorType($(this).val());
    });
});
