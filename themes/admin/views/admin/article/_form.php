<?php
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
            echo $form->textFieldBS('sef');
            
            echo $form->datetimeFieldBS('=humanDate');
            
//            echo $form->textAreaBS('=short_content');
            
            echo $form->tinymceEditor('=content_long');
            
            echo $form->metaBS();
        ?>
    
    </div>
    <?php
        echo $form->buttonSave();
        
        $this->endWidget();
    ?>
</div>
