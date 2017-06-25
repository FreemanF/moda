$(document).ready(function() {
    
    autoGrowField($(".auto-resize").get(0));
    
    $(".auto-resize").keyup(function(){
        autoGrowField($(this).get(0)); 
    });

    $('.content_elrte').elrte({
        lang: "ru",
        styleWithCSS: false,
        height: 400,
        toolbar: 'maxi',
        fmOpen : function(callback) {
            $('<div id="myelfinder" />').elfinder({
            url : '/admin/admin/connect',
            lang : 'ru',
            dialog : { width : 900, modal : true, title : 'Файлы' },
            closeOnEditorCallback : true,
            editorCallback : callback
            })
        }
    });
});
