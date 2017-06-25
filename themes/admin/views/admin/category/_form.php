<?php
    $cs = Yii::app()->getClientScript();
    $cs->registerPackage($this->themeBase.'update');
?>
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
            echo $form->hiddenFieldBS2('obj');
            echo $form->hiddenFieldBS2('pid');
            echo $form->hiddenFieldBS2('sort');
            
            echo $form->textFieldBS('name');
            echo $form->textFieldBS('sef'); 
            
            echo $form->metaBS();
        ?>
    </div>
    <?php
        echo $form->buttonRow(false);
        
        $this->endWidget();
    ?>
</div>

