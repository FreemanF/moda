<?php
/* @var $this NewsController */
/* @var $form BootstrapForm */

//    $cs = Yii::app()->getClientScript();
//    $cs->registerPackage($this->themeBase.'update');
//    $cs->registerPackage('photo_sort');
?>
<script>
    var oID = '<?php // echo  $this->model->primaryKey; ?>';
    var crudalias   = '<?php // echo $this->crudalias; ?>';
</script>
<div class="form-horizontal">

    <?php
        $options = array(
            'controller'=>$this,
            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            'bootstrapValidation'=>true,
        );
        $form=$this->beginWidget('BootstrapForm', $options);
        echo $form->errorSummaryBS();
    ?>

    
    <div class="container-fluid">
        <div class="form-legend" id="Input_Field">Поля, отмеченные * обязательны для заполнения</div>
        
        <?php 
            echo $form->textFieldBS('name'); 
            echo $form->textFieldBS('sef');
            echo $form->dropDownListBS('status', Product::model()->listStatusNames(),array('prompt'=>'Выберите статус'));


            //echo $form->dropDownListBS('=tv_gal_id', Gallery::model()->listNames(),array('prompt'=>'Без галлереи'));

//            echo $form->textFieldBS('sort');
//            echo $form->datetimeFieldBS('=humanDate');
            
            echo $form->dropDownListBS(
                'category',
                CHtml::listData(Category::model()->getHierarchy(Object::idProduct),'cid','c_name')
            );
            echo $form->dropDownListBS('brand', Client::model()->listNames(),array('prompt'=>'Без бренда'));
            //echo $form->textFieldBS('cena');
            

            echo $form->textFieldBS('source');
		//	echo $form->textFieldBS('brand');
			
            echo $form->textFieldBS('transport');
		//	echo $form->textField('color');
            echo $form->textFieldBS('selling');
		//	echo $form->textFieldBS('brand');
            echo $form->tinymceEditor('=content_long');
            echo $form->datetimeFieldBS('=humanDate');
            echo $form->mediaFieldBS('del');
            echo $form->mediaFieldBS('i_original');
            echo $form->mediaFieldBS('i_source');
            echo $form->mediaFieldBS('i_info');

            $form->mediaBehavior = 'MediaBehavior2';
            echo $form->mediaFieldBS('del');
            echo $form->mediaFieldBS('i_original');
            echo $form->mediaFieldBS('i_name');
            echo $form->mediaFieldBS('i_alt');
            
            $form->mediaBehavior = 'MediaBehavior3';
            echo $form->mediaFieldBS('del');
            echo $form->mediaFieldBS('i_original');
            echo $form->mediaFieldBS('i_name');
            echo $form->mediaFieldBS('i_alt');
            
//            $form->mediaBehavior = 'MediaBehavior4';
//            echo $form->mediaFieldBS('del');
//            echo $form->mediaFieldBS('i_original');
//            echo $form->mediaFieldBS('i_name');
//            echo $form->mediaFieldBS('i_alt');
//            
//            $form->mediaBehavior = 'MediaBehavior5';
//            echo $form->mediaFieldBS('del');
//            echo $form->mediaFieldBS('i_original');
//            echo $form->mediaFieldBS('i_name');
//            echo $form->mediaFieldBS('i_alt');

        ?>
    
    </div>
    <?php
        echo $form->buttonSave('Сохранить');
        
        $this->endWidget();
    ?>
</div>
