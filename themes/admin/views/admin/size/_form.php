<?php
/* @var $this SizeController */
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
            echo $form->textFieldBS('american');
            echo $form->textFieldBS('universal');
//            echo $form->dropDownListBS('type', Size::model()->listTypes(),array('prompt'=>'Выберите тип размера'));
            echo $form->datetimeFieldBS('=humanDate');
            

        ?>
    
    </div>
    <?php
        echo $form->buttonRow();
        
        $this->endWidget();
    ?>
</div>
