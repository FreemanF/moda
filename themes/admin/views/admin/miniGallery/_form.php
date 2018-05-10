<?php
    $cs = Yii::app()->getClientScript();
    $cs->registerPackage('photo_sort');
?>
<script>
    var oID = '<?php echo $this->model->primaryKey; ?>';
    var crudalias   = '<?php echo $this->crudalias; ?>';
</script>
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
            
            if (!$this->model->isNewRecord)
                echo $form->bootstrapRow3(
                        '<label class="control-label">Код для вставки</label>',
                        '<label class="control-label">{miniGallery:'.$this->model->primaryKey.'}</label>'
                );
            
            echo $form->checkBoxBS('=is_published');
            
            echo $form->mediaFieldBS('i_original');
            echo $form->mediaFieldBS('i_name');
            echo $form->mediaFieldBS('i_alt');
            
            foreach ($form->media as $image) 
                if ($image->i_original)
                    echo $form->mediaBS($image,array('del','i_name','i_alt'));
        ?>
    </div>
    <?php
        echo $form->buttonSave();
        
        $this->endWidget();
    ?>
</div>