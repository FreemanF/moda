<?php
/* @var $this TaskController */
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
            echo $form->dropDownListBS('command',CHtml::listData(Task::getCommands(),'name','description'));
            echo $form->dropDownListBS('task',CHtml::listData($this->model->getTasks(),'name','description'));
            
            echo $form->textFieldBS('min'); 
            echo $form->textFieldBS('hour'); 
            echo $form->textFieldBS('day'); 
            echo $form->textFieldBS('month'); 
            echo $form->textFieldBS('dayofweek'); 
        ?>
    
    </div>
    <?php
        echo $form->buttonSave();
        
        $this->endWidget();
    ?>
</div>
