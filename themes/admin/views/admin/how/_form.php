<?php
/* @var $this HowController */
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
			echo $form->tinymceEditor('title_text');
			echo $form->tinymceEditor('works_block');
			echo $form->tinymceEditor('format_sotr');
			echo $form->tinymceEditor('fitout');
		//	echo $form->checkBoxBS('=is_published');
			echo $form->tinymceEditor('four_steps');
            echo $form->tinymceEditor('sdacha_block');
			
            echo $form->datetimeFieldBS('=humanDate');
            
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
