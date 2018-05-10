<?php
/* @var $this PageController */
/* @var $form BootstrapForm */

    $cs = Yii::app()->getClientScript();
    //$cs->registerPackage('elrte');
    $cs->registerPackage($this->themeBase.'update');
    //$cs->registerPackage('bootstrap-tooltip');
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
            echo $form->hiddenFieldBS2('dir');
            
            echo $form->textFieldBS('name'); 
            echo $form->textFieldBS('sef'); 
            echo $form->checkBoxBS('=is_published');
            //echo $form->datetimeFieldBS('=humanDate'); 
            
            echo $form->tinymceEditor('=content_long');
            
            echo $form->metaBS();

            echo $form->checkBoxBS('=noindex',array(
                'inverse'=>true,
                'beforeLabel'=>  Bootstrap::infoTooltip('Включение или отключение значения noindex',true,true),
                'labelOptions'=>array('style'=>'width:150px;')));
            echo $form->checkBoxBS('=nofollow',array(
                'inverse'=>true,
                'beforeLabel'=>  Bootstrap::infoTooltip('Включение или отключение значения nofollow',true,true),
                'labelOptions'=>array('style'=>'width:150px;')));
        ?>
    
    </div>
    <?php
        echo $form->buttonRow();
        
        $this->endWidget();
    ?>
</div>
