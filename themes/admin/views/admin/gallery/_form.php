<?php
    $cs = Yii::app()->getClientScript();
    $cs->registerPackage($this->themeBase.'update');
    $cs->registerPackage('photo_sort');   
?>
<script>
    var oID = '<?php echo $this->model->primaryKey; ?>';
    var crudalias   = 'gallery';
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
                
            echo $form->datetimeFieldBS('=humanDate');

            echo $form->textAreaBS('=short_content');
            
            echo $form->mediaFieldBS('i_original');
            echo $form->mediaFieldBS('i_name');
            echo $form->mediaFieldBS('i_alt');
            
            foreach ($form->media as $image) 
                if ($image->i_original)
                    echo $form->mediaBS($image,array('del','i_name','i_alt'));
                
            echo $form->metaBS();
        ?>
    </div>
    <?php
        echo $form->buttonSave();
        
        $this->endWidget();
    ?>
</div>