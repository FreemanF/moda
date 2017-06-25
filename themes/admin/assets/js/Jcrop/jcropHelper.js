var framecrop,
    adminImageWidth, 
    maxImageFiles =  0, // Максимальное количество картинок у модели
    maxFileSizeMb =  2,
    themeImages   = '',
    mediaPostID   = '',
    multipleImages= '', // []
    tryAlert = {verySmall:true,veryBig:true,onlyImages:true},
    
    defaultUploadMin    = '',
    defaultUploadAspect = '',
    dataArray            = [], // Массив для всех изображений
    currentPositionImage = -1, // Позиция последнего проверенного, среди добавленных, изображения
    nextPositionImage    =  0,  // Реальная позиция добавляемого изображения
    jcropEnabled         = false,
    jcropEditable        = false,
    countModelImages     = 0,
    countDeletedImages   = 0;
    callbackAddImage = window.callbackAddImage || $.Callbacks('unique');
    
function checkEnter(e){
    e = e || event;
    var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
    return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
}

function checkAddedImages() {
    //console.log('checkAddedImages',currentPositionImage,dataArray.length);
    while (++currentPositionImage<dataArray.length) {
//            console.log('checkAddedImages('+currentPositionImage+') '+
//                dataArray[currentPositionImage].index+':'+
//                dataArray[currentPositionImage].local);
        if (defaultUploadAspect) {
            dataArray[currentPositionImage].dataSrc.trigger('click');
            //UpdateJcrop(dataArray[currentPositionImage].dataSrc);
            break;
        }
    } 
    currentPositionImage = Math.min(currentPositionImage,dataArray.length - 1);
    if (dataArray.length && !multipleImages) {
        $('#'+mediaPostID+'_new').closest('.uploadNew').hide();
    }
}

function deleteNewImage(pos) {
    if (pos>=0 && (pos in dataArray) && !dataArray[pos].delete) {
        $('#'+mediaPostID+'_del_new_'+pos)
            .val('yes')
            .closest('.upload,.uploadNew')
            .remove(); // чтобы не уходили инпуты связанные с удалёнными картинками
            //.hide();
        countDeletedImages++;
        dataArray[pos].delete = true;
    }
}
function updatePreview(coords){
    if (parseInt(coords.w) > 0){
        //console.log(coords);
        framecrop.crop = [
            Math.ceil(coords.x),
            Math.ceil(coords.y),
            Math.ceil(coords.x2),
            Math.ceil(coords.y2)
        ];
        if (framecrop.crop[3]-framecrop.crop[1] < framecrop.size[1])
            framecrop.crop[3]=framecrop.crop[1] + framecrop.size[1];
        if (framecrop.crop[2]-framecrop.crop[0] < framecrop.size[0])
            framecrop.crop[2]=framecrop.crop[0] + framecrop.size[0]
    }
}

function parseCropData(frame,source) {
    frame.dataSrc= source;
    frame.crop   = source.data('crop'  ).split(':');
    frame.aspect = source.data('aspect').split(':');
    var size     = source.data('min'   ).split(':');
    frame.size   = [parseInt(size[0]),parseInt(size[1])];
    frame.url    = source.data('original');
    frame.pos    = parseInt(source.data('pos'));
    if (!frame.url)
        frame.url = source.attr('src');
}

function UpdateJcrop(){
    if (!jcropEnabled) return false;
    var image  = $(this);
    if (!jcropEditable && parseInt(image.data('pos'))<0) return false;
    framecrop = {
        form    : $('#modalCropImage'),
        preview : image,
        frame   : image.closest('.span9'),
        };
    parseCropData(framecrop,image);
    //console.log(framecrop);
    framecrop.image = 
        $('div.modal-body div.image-place',framecrop.form)
            .html('<img class="imagerate" src="'+framecrop.url+'">')
            .find('img');
    
    var first = parseInt(framecrop.dataSrc.data('first'));
    framecrop.form.find(
        'div.modal-footer > button.btn-form-back, div.modal-header > button.close'
    ).each(function(){
        var btn = $(this);
        if (first) 
            btn.attr('disabled','disabled');
        else
            btn.removeAttr('disabled');
    });

    framecrop.image.one('load',function(){
        var CurImg = framecrop.image;
        CurImg.removeAttr("width").removeAttr("height").css({ width: "", height: "" });
        // Получаем реальные ширину и высоту.
        var width  = CurImg[0].width;                    
        var height = CurImg[0].height;
        framecrop.real = [width,height];
        //console.log('real',width,height);
        //var min = Math.min(width,height);
        //min = min>0 ? Math.min(50,min) : 50;

        var box       = CurImg.parent();
        var modalbody = box.closest('.modal-body');
        var maxHeight = parseInt(modalbody.css('max-height'));
        var maxWidth  = parseInt(modalbody.closest('.modal').css('width'))-30;
        framecrop.box = [maxWidth,maxHeight];
        //console.log('body',maxWidth,maxHeight);

        // Подгоняем размеры бокса для картинки
        newHeight = maxHeight;
        if (maxWidth == maxHeight) {
            if (width >= height) framecrop.box[1] = 0;
            else framecrop.box[0] = parseInt(maxHeight*width/height);
        } else {
            var newHeight = maxWidth * height / width;
            if (newHeight > maxHeight) {
                newHeight = maxHeight;
                framecrop.box[0] = parseInt(maxHeight*width/height);
            } else {
                newHeight = parseInt(newHeight);
                framecrop.box[1] = 0;
            }

        }
        // Если картинка меньше максимальных размеров, уменьшаем их
        framecrop.box[0] = Math.min(framecrop.box[0],width);
        newHeight = Math.min(newHeight,height);
        framecrop.box[1] = Math.min(framecrop.box[1],newHeight);
        //console.log('box',lookitemcrop.box[0],newHeight);

        // Если надо, сдвигаем бокс на середину
        box.css({width:framecrop.box[0]+'px'});
        if (framecrop.box[1])
            box.css({height:framecrop.box[1]+'px'});

        var marginLeft = Math.ceil((maxWidth - framecrop.box[0])/2);
        if (marginLeft>0) marginLeft--;
        if (marginLeft>0)
            box.css({marginLeft:marginLeft+'px'});
        //CurImg.css('display', 'block');

        // Подбираем начальный crop
        var aspect=framecrop.aspect.length==2 ? framecrop.aspect[0]/framecrop.aspect[1] : false;
        if (framecrop.crop.length!=4) {
            if (aspect) {
                var cw = height*aspect;
                if (cw>width) {
                    var ch = parseInt(width/aspect);
                    var y0 = parseInt((height-ch)/2);
                    framecrop.crop = [0,y0,width,y0+ch];
                } else {
                    cw = parseInt(cw);
                    var x0 = parseInt((width-cw)/2);
                    framecrop.crop = [x0,0,x0+cw,height];
                }
            } else {
                framecrop.crop = [0,0,width,height];
            }
        }
        
        if (framecrop.crop[3]-framecrop.crop[1] < framecrop.size[1]
        ||  framecrop.crop[2]-framecrop.crop[0] < framecrop.size[0])
        {
            //Картинка очень маленькая
            if (tryAlert.verySmall) {
                tryAlert.verySmall = false;
                alert("Изображение не может быть меньше "+framecrop.size[0]+'x'+framecrop.size[1]+' px');
            }
            countDeletedImages++;
            deleteNewImage(framecrop.pos);
            setTimeout(checkAddedImages,0);
            return false;
        }
        
//        console.log('select',framecrop.crop);
//        console.log('boxWidth :'+framecrop.box[0]);
//        console.log('boxHeight:'+framecrop.box[1]);

        var jcropOptions = {
            onChange: updatePreview,
            onSelect: updatePreview,
            boxWidth   : framecrop.box[0],
            boxHeight  : framecrop.box[1],
            minSize    : framecrop.size,//[min,min],
        };
        if (aspect)
            jcropOptions.aspectRatio = aspect;
        framecrop.image.Jcrop(jcropOptions,function(){
            var jcrop_api = this;
//            var bounds = jcrop_api.getBounds();
//            console.log('bounds',bounds);
//            console.log('crop',framecrop.crop);
            if (framecrop.crop.length==4)
                jcrop_api.setSelect(framecrop.crop);
        });

        framecrop.form.modal("show");

    }).each(function() { if (this.complete) $(this).trigger('load'); });
}

$(function(){
    $(".modal-import-panel").html('\
    <div id="modalCropImage" data-backdrop="static" class="modal hide fade">\
        <div class="modal-header">\
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
            <h3>Изменение размера</h3>\
        </div>\
        <div class="modal-body">\
            <div class="image-place">\
            </div>\
        </div>\
        <div class="modal-footer">\
            <button type="submit" class="btn btn-primary" id="saveCroppedImage">Сохранить</a>\
            <button class="btn btn-form-back" data-dismiss="modal">Отмена</a>\
        </div>\
    </div>');
    
    $("img.resizeImg").live('click',UpdateJcrop);
    //$(".resizeButton").live('click',UpdateJcrop);
            
    $('#modalCropImage').on('show',function(){
    }).on('shown',function(){
    }).on('hide',function(){
        framecrop.dataSrc.data('first',0);
        //framecrop.preview.removeClass('preview');
        //console.log('crop',framecrop.crop);
    }).on('hidden',function(){
        setTimeout(checkAddedImages,0);
    });
    
    $("#saveCroppedImage").click(function(){
        //console.log(framecrop);
        var crop = framecrop.crop;
        if (framecrop.preview) {
            if (framecrop.url && framecrop.preview.attr('src')!=framecrop.url)
                framecrop.preview.attr('src',framecrop.url);
            // adminImageWidth - ширина .img_upload
            var ratio = adminImageWidth / (crop[2]-crop[0]);

            framecrop.preview.css({
                width: Math.round(ratio * framecrop.real[0]) + 'px',
                height: Math.round(ratio * framecrop.real[1]) + 'px',
                marginLeft: '-' + Math.round(ratio * crop[0]) + 'px',
                marginTop: '-' + Math.round(ratio * crop[1]) + 'px'
            }).parent().css({
                height: Math.round(ratio * (crop[3]-crop[1])) + 'px'
            });
        }
        var textCrop=crop.join(':');
        framecrop.dataSrc.data('crop',textCrop);
        framecrop.frame.find('input.inputCrop').val(textCrop);
        
        framecrop.form.modal("hide");
    });

    
    // Кнопка выбора файлов
    var defaultUploadBtn = $('.cropimage');
    var defaultUploadOptions = $('.uploadNew > div.span9 > div.fileupload');
    if (defaultUploadOptions.length) {
        defaultUploadMin    = defaultUploadOptions.data('min');
        defaultUploadAspect = defaultUploadOptions.data('aspect');
    }
    
    // Область информер о загруженных изображениях - скрыта
    //$('#uploaded-files').hide();

    // При нажатии на кнопку выбора файлов
    defaultUploadBtn.on('change', function() {
        //console.log('change files');
        // Заполняем массив выбранными изображениями
        var files = $(this)[0].files;
        // Проверяем на максимальное количество файлов
        if (maxImageFiles===0 || (dataArray.length + files.length + countModelImages - countDeletedImages)<= maxImageFiles) {
            // Передаем массив с файлами в функцию загрузки на предпросмотр
            loadInView(files);
            // Очищаем инпут файл путем сброса формы
            //$('#frm').each(function(){
                //this.reset();
            //});
        } else {
            files.length = 0;
            $('a.deleteFileUpload').trigger('click');
            alert('Вы не можете загружать больше '+maxImageFiles+' изображений!'); 
        }
    });

    // Функция добавления картинок к массиву новых изображений
    function loadInView(files) {
        // Показываем обасть предпросмотра
        //$('#uploaded-holder').show();
        //console.log('loadInView');

        // Для каждого файла
	var countFilesToLoad = 0;
        $.each(files, function(index, file) {

            // Несколько оповещений при попытке загрузить не изображение
            if (!files[index].type.match('image.*')) {
                if (tryAlert.onlyImages) {
                    tryAlert.onlyImages = false;
                    alert("Вы можете загружать только изображения!");
                }
                delete files[index];
                return;
            }

            //проверка размера файла
            if (files[index].size > 1024*1024*maxFileSizeMb) {
                if (tryAlert.veryBig) {
                    tryAlert.veryBig = false;
                    alert("Файл изображения не должен превышать "+maxFileSizeMb+"МБ");
                }
                delete files[index];
                return;
            }

            // показываем область с кнопками
            //$('#upload-button').css({'display' : 'block'});

            // Создаем новый экземпляра FileReader
	    countFilesToLoad++;
            var fileReader = new FileReader();
            // Инициируем функцию FileReader
            fileReader.onload = (function(file) {
                return function(e) {
                    // Помещаем URI изображения в массив
                    dataArray.push({
                        name : file.name, 
                        value : this.result, 
                        delete:false, 
                        pos:nextPositionImage++
                    });//, index:index, files:files});
                    addImage((dataArray.length-1));
		    if (!--countFilesToLoad)
		        setTimeout(checkAddedImages,0);
                }; 
            })(files[index]);
            // Производим чтение картинки по URI
            fileReader.readAsDataURL(file);
        });
        //setTimeout(checkAddedImages,0);
        return false;
    }
	
    // Процедура добавления эскизов на страницу
    function addImage(index) {
        //console.log('addImage0');
        if (!(index in dataArray)) return false;
        var lastUpload = $('div.control-group.upload:last');
        if (lastUpload.length===0) lastUpload = $('div.control-group.uploadNew:last');
        if (lastUpload.length===0) lastUpload = $('#File_Upload');
        if (lastUpload.length===0) return false;
        var position = multipleImages ? '['+dataArray[index].pos+']' : '';
        //console.log('addImage1');
        lastUpload.after(
'<div class="control-group row-fluid upload">\
    <div class="span3">\
        <label class="control-label">Фото</label>\
    </div>\
    <div class="span9 withDelButton">\
        <div style="width: 300px;" class="img_upload">\
            <img src="'+dataArray[index].value+
                '" style="width:300px" data-original="" data-min="'+defaultUploadMin+
                '" data-pos="'+index+
                '" data-aspect="'+defaultUploadAspect+
                '" data-crop="" data-first="'+(defaultUploadAspect?1:0)+'" class="resizeImg">\
        </div>\
        <div class="delete-photo-item">\
           <img data-toggle="modal" title="удалить" src="'+themeImages+
                'photon/newdelete.png" data-ref="'+mediaPostID+'.new_'+index+'">\
        </div>\
        '+(multipleImages?'<input type="hidden" id="'+mediaPostID+'_del_new_'+index+
                '" name="'+mediaPostID+'_del_new'+position+
                '" value="no" class="inputDel">':'')+'\
        <input type="hidden" name="Media[i_crop]'+position+'" value="" class="inputCrop">\
    </div>\
</div>');
        var controlGroup = lastUpload.next();
        dataArray[index].dataSrc = controlGroup.find('img.resizeImg');
        callbackAddImage.fire(controlGroup);
        return true;
    }
    
    if (!multipleImages)
        $(".delete-photo-item").live('click',function(){
            //$('#'+mediaPostID+'_new').val('');
            $('a.deleteFileUpload').trigger('click');
            setTimeout(function(){
                $('#'+mediaPostID+'_new').closest('.uploadNew').show();
            },0);
        });
    

    $('a.deleteFileUpload').click(function(){
        // удаляем накопленное в dataArray
        for(var index in dataArray)
            if (!dataArray[index].delete)
                deleteNewImage(index);
        dataArray            = []; // Массив для всех изображений
        currentPositionImage = -1; // Позиция последнего проверенного, среди добавленных, изображения
        nextPositionImage    =  0; // Реальная позиция добавляемого изображения
        
    });
    
    countModelImages   =
    $(".delete-photo-item").live('click',function(){
        var ref = $('img',this).data('ref').split('.'); // Media.25235   Media.new_0
        
        $(this).closest('.upload,.uploadNew').hide();
        countDeletedImages++;

        $('#'+ref[0]+'_new').closest('.uploadNew').show();
        $('#'+ref[0]+'_del'+(ref.length>1?'_'+ref[1]:'')).val('yes');
        return false;
    }).length;

});
