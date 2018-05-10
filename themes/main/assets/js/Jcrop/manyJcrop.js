var aspectRatio, minSizeX, minSizeY;

$(function(){
    $(".modal-import-panel").html('\
    <div id="modalEditPhoto" data-backdrop="static" class="modal hide fade">\
        <div class="modal-header">\
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
            <h3>Изменение размера</h3>\
        </div>\
        <div class="modal-body">\
        </div>\
        <div class="modal-footer">\
            <button type="submit" class="btn btn-primary" id="saveEditPhoto">Сохранить</a>\
            <button class="btn btn-form-back" data-dismiss="modal">Отмена</a>\
        </div>\
    </div>');
});

$(document).ready(function(){
    
    var x1, y1, x2, y2, obj, form = $('#modalEditPhoto');
    
    function UpdateJcrop(sw, sh, w, h){
        jQuery(function($){
            var jcrop_api,
                boundx,
                boundy;
            $('#PhotoResize').Jcrop({
                onChange: updatePreview,
                onSelect: updatePreview,
                boxWidth: form.width()-30,
                boxHeight: 0,
                minSize:[minSizeX,minSizeY],
                aspectRatio: aspectRatio
            },function(){
                // Use the API to get the real image size
                var bounds = this.getBounds();
                boundx = bounds[0];
                boundy = bounds[1];
                // Store the API in the jcrop_api variable
                jcrop_api = this;
                jcrop_api.setSelect([sw, sh, w, h]);
                jcrop_api.setOptions({ bgFade: true });
                jcrop_api.ui.selection.addClass('jcrop-selection');
                jcrop_api.setOptions({ aspectRatio: aspectRatio });
                jcrop_api.focus();
            });

            function updatePreview(c){
                if (parseInt(c.w) > 0){
                    x1 = Math.ceil(c.x);
                    y1 = Math.ceil(c.y);
                    x2 = Math.ceil(c.x2);
                    y2 = Math.ceil(c.y2);
                }
            };
        });
    }
    $(".resizeButton").click(function(){
        obj = $(this);
        href = obj.attr("href");
        bx1 = obj.attr("data-x1");
        by1 = obj.attr("data-y1");
        bx2 = obj.attr("data-x2");
        by2 = obj.attr("data-y2");
        
        type = obj.attr("data-type");
        
        if (type=='slider'){
            aspectRatio = 690/325;
            minSizeX    = 138;
            minSizeY    = 65;
        } 

        form.children("div.modal-body").html('<img id="PhotoResize" src="'+href+'" />');
        UpdateJcrop(bx1, by1, bx2, by2);
        form.modal("show");
    });

    $("#saveEditPhoto").click(function(){
        obj.attr("data-x1", x1);
        obj.attr("data-y1", y1);
        obj.attr("data-x2", x2);
        obj.attr("data-y2", y2);
        id = obj.attr("data-id");
        $.post('/admin/admin/updatecrop',{crop: {id:id, x1:x1, y1:y1, x2:x2, y2:y2}}, function(){
            form.modal("hide");
        }, 'json');
    });
});
