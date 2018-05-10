<?php
/* @var $this LastProjectsController */
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
			echo $form->checkBoxBS('=is_published');
            echo $form->textFieldBS('link');
            
            echo $form->datetimeFieldBS('=humanDate');
            
            echo $form->mediaFieldBS('del');
            echo $form->mediaFieldBS('i_original');
            echo $form->mediaFieldBS('i_name');
            echo $form->mediaFieldBS('i_alt');
            
            echo $form->tinymceEditor('=content_long');
            
        //    echo $form->metaBS();
        ?>
    
    </div>
    <?php
        echo $form->buttonRow();
        
        $this->endWidget();
    ?>
</div>
