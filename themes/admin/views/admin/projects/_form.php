<?php
/* @var $this ProjectsController */
/* @var $form BootstrapForm */

    $cs = Yii::app()->getClientScript();
    $cs->registerPackage($this->themeBase.'update');
?>
<div class="form-horizontal">

    <?php $form=$this->beginWidget('BootstrapForm', array(
        'controller'=>$this,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        'bootstrapValidation'=>true,
    ));

    echo $form->errorSummaryBS();   ?>
    
    <div class="container-fluid">
        <div class="form-legend" id="Input_Field">Поля, отмеченные * обязательны для заполнения</div>
        
        <?php
            echo $form->textFieldBS('name');
								echo '<div class="control-group row-fluid">
		<div class="span12">
		<p style="font-weight: bold;font-size: 13px;">
		Рекомендуемое количество символов: <span class="label label-info">40</span>
		</p>
		</div></div>';
			echo $form->textFieldBS('sef');
			echo $form->tinymceEditor('title_text');
		echo '<div class="control-group row-fluid">
		<div class="span12">
		<p style="font-weight: bold;font-size: 13px;">
		Рекомендуемое количество символов: <span class="label label-info">200</span>
		</p>
		</div></div>';
		
			echo $form->tinymceEditor('suhie');
			echo $form->tinymceEditor('numbers_block');
	//		echo $form->tinymceEditor('project_block');
			echo $form->checkBoxBS('=is_published');
//            echo $form->textFieldBS('link');
            
            echo $form->datetimeFieldBS('=humanDate');

		echo '<div class="control-group row-fluid">
		<div class="span12">
		<p style="font-weight: bold;font-size: 13px;">
		Рекоммендуемый формат изображений: <span class="label label-info"> JPEG,JPG,PNG</span>
		</p>
		</div></div>';
            $form->mediaBehavior = 'MediaBehavior';
            echo $form->mediaFieldBS('i_original');
//            echo $form->mediaFieldBS('watermark');
            echo $form->mediaFieldBS('i_name');
            echo $form->mediaFieldBS('i_alt');
            
            foreach ($form->media as $image) 
                if ($image->i_original)
                    echo $form->mediaBS($image,array('del','i_name','i_alt'));
            
            echo $form->tinymceEditor('=content_long');
            
        //    echo $form->metaBS();
        ?>
    
    </div>
    <?php
        echo $form->buttonRow();
        
        $this->endWidget();
    ?>
</div>
