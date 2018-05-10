var aspectRatio = 157/47;
var DefWidth  = 157;
var DefHeight = 47;
var StartWidth  = 0;
var StartHeight = 0;
var EndWidth  = 157;
var EndHeight = 47;
//var $ = jQuery.noConflict();

function UpdateJcrop() {
    jQuery(function($){

      // Create variables (in this scope) to hold the API and image size
      var jcrop_api, boundx, boundy;
      $('#jcroptarget').Jcrop({
        onChange: updatePreview,
        onSelect: updatePreview,
        boxWidth: document.body.clientWidth/2.5,
        boxHeight: 0,
        minSize:[DefWidth,DefHeight],
        aspectRatio: 1
      },function(){
        // Use the API to get the real image size
        var bounds = this.getBounds();
        boundx = bounds[0];
        boundy = bounds[1];
        // Store the API in the jcrop_api variable
        jcrop_api = this;
        jcrop_api.setSelect([StartWidth,StartHeight,EndWidth,EndHeight]);
        jcrop_api.setOptions({ bgFade: true });
        jcrop_api.ui.selection.addClass('jcrop-selection');
        jcrop_api.setOptions({ aspectRatio: aspectRatio });
        jcrop_api.focus();
      });

      function updatePreview(c)
      {
        if (parseInt(c.w) > 0)
        {
          var x1 = c.x;
          var y1 = c.y;
          var x2 = c.x2;
          var y2 = c.y2;
          $(".images-x1").val(Math.ceil(x1));
          $(".images-x2").val(Math.ceil(x2));
          $(".images-y1").val(Math.ceil(y1));
          $(".images-y2").val(Math.ceil(y2));

//          myWindowWidth = document.body.clientWidth/3;
//          myWindowHeight = myWindowWidth*c.h/c.w;
//          var rx =  myWindowWidth/c.w;
//          var ry =  c.h;

//          $('#preview').css({
//            width: Math.round(rx * boundx) + 'px',
//            height: Math.round(ry * boundy) + 'px',
//            marginLeft: '-' + Math.round(rx * c.x) + 'px',
//            marginTop: '-' + Math.round(ry * c.y) + 'px'
//          });
        }
      };

    });
}

$(document).ready(function() {
	
	// Максимальное количество загружаемых изображений за одни раз
	var maxFiles = 1;
	
	// Оповещение по умолчанию
	var errMessage = 0;
	
	// Кнопка выбора файлов
	var defaultUploadBtn = $('.cropimage');
	
	// Массив для всех изображений
	var dataArray = [];
	
	// Область информер о загруженных изображениях - скрыта
	$('#uploaded-files').hide();
	
	// При нажатии на кнопку выбора файлов
	defaultUploadBtn.on('change', function() {
   		// Заполняем массив выбранными изображениями
   		var files = $(this)[0].files;
   		// Проверяем на максимальное количество файлов
		if (files.length <= maxFiles) {
			// Передаем массив с файлами в функцию загрузки на предпросмотр
			loadInView(files);
			// Очищаем инпут файл путем сброса формы
                        $('#frm').each(function(){
	        	    //this.reset();
			});
		} else {
			alert('Вы не можете загружать больше '+maxFiles+' изображений!'); 
			files.length = 0;
		}
	});
	
	// Функция загрузки изображений на предросмотр
	function loadInView(files) {
		// Показываем обасть предпросмотра
		$('#uploaded-holder').show();
		
		// Для каждого файла
		$.each(files, function(index, file) {
						
			// Несколько оповещений при попытке загрузить не изображение
			if (!files[index].type.match('image.*')) {
				
				if(errMessage == 0) {
                                        alert("Вы можете загружать только изображения!");
                                        $("#uploadbtn").val("");
				}
				return;
			}
			
                        //проверка размера файла
                        if (files[index].size > 1024*2*1024) {
                            alert("Файл изображения не должен превышать 2МБ");
                            $("#uploadbtn").val("");
                            return;
                        }
                        
			// Проверяем количество загружаемых элементов
			if((dataArray.length+files.length) <= maxFiles) {
				// показываем область с кнопками
				$('#upload-button').css({'display' : 'block'});
			} 
			else { alert('Вы не можете загружать больше '+maxFiles+' изображений!'); return; }
			
			// Создаем новый экземпляра FileReader
			var fileReader = new FileReader();
				// Инициируем функцию FileReader
				fileReader.onload = (function(file) {
					
					return function(e) {
						// Помещаем URI изображения в массив
						dataArray.push({name : file.name, value : this.result});
						addImage((dataArray.length-1));
                                                
					}; 
						
				})(files[index]);
			// Производим чтение картинки по URI
			fileReader.readAsDataURL(file);
		});
		return false;
	}
		
	// Процедура добавления эскизов на страницу
	function addImage(ind) {
		// Если индекс отрицательный значит выводим весь массив изображений
		if (ind < 0 ) { 
		start = 0; end = dataArray.length; 
		} else {
		// иначе только определенное изображение 
		start = ind; end = ind+1; } 
		// Оповещения о загруженных файлах
		if(dataArray.length == 0) {
			// Если пустой массив скрываем кнопки и всю область
			$('#upload-button').hide();
			$('#uploaded-holder').hide();
		} else if (dataArray.length == 1) {
			$('#upload-button span').html("Был выбран 1 файл");
		} else {
			$('#upload-button span').html(dataArray.length+" файлов были выбраны");
		}
		// Цикл для каждого элемента массива
		for (i = start; i < end; i++) {
			// размещаем загруженные изображения
			if($('#dropped-files > .image').length <= maxFiles) { 
//                                $('#dropped-files').append('<div id="img-'+i+'" class="image"> <img src='+dataArray[i].value+' id="jcroptarget" /> <a id="drop-'+i+'" class="drop-button">Удалить изображение</a></div>'); 
                                $('#dropped-files').append('<div id="img-'+i+'" class="image"> <img src='+dataArray[i].value+' id="jcroptarget" /></div>'); 
                                UpdateJcrop(i);
			}
		}
		return false;
	}
	
	// Удаление только выбранного изображения 
	$("a[id^='drop']").live('click', function() {
		// получаем название id
 		var elid = $(this).attr('id');
		// создаем массив для разделенных строк
		var temp = new Array();
		// делим строку id на 2 части
		temp = elid.split('-');
		// получаем значение после тире тоесть индекс изображения в массиве
		dataArray.splice(temp[1],1);
		// Удаляем старые эскизы
		$('#dropped-files > .image').remove();
		// Обновляем эскизи в соответсвии с обновленным массивом
		addImage(-1);		
	});
	
	// Простые стили для области перетаскивания
	$('#drop-files').on('dragenter', function() {
		$(this).css({'box-shadow' : 'inset 0px 0px 20px rgba(0, 0, 0, 0.1)', 'border' : '4px dashed #bb2b2b'});
		return false;
	});
	
	$('#drop-files').on('drop', function() {
		$(this).css({'box-shadow' : 'none', 'border' : '4px dashed rgba(0,0,0,0.2)'});
		return false;
	});
});

