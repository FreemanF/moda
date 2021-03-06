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
            
            echo $form->checkBoxBS('=is_published');
//            echo $form->dropDownListBS(
//                'category',
//                CHtml::listData(Category::model()->getHierarchy(Object::idBrand),'cid','c_name')
//            );
            echo $form->textFieldBS('sef');
            
            echo $form->mediaFieldBS('del');
            echo $form->mediaFieldBS('i_original');
            echo $form->mediaFieldBS('i_name');
            echo $form->mediaFieldBS('i_alt');
        ?>
    
    </div>
    <?php
        echo $form->buttonSave();
        
        $this->endWidget();
    ?>
</div>