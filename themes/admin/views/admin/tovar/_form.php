<?php
/* @var $this NewsController */
/* @var $form BootstrapForm */

    $cs = Yii::app()->getClientScript();
    $cs->registerPackage($this->themeBase.'update');
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
            echo $form->textFieldBS('sef');
            echo $form->checkBoxBS('=is_published');

            echo $form->dropDownListBS('=tv_gal_id', Gallery::model()->listNames(),array('prompt'=>'Без галлереи'));

            echo $form->textFieldBS('sort');
//            echo $form->datetimeFieldBS('=humanDate');
            
            echo $form->dropDownListBS(
                'cat_main',
                CHtml::listData(Category::model()->getHierarchy(Object::idTovar),'cid','c_name')
            );
            echo $form->textFieldBS('cena');
            
            $form->mediaBehavior = 'MediaBehavior';
            
            echo $form->mediaFieldBS('i_original');
            echo $form->mediaFieldBS('i_name');
            echo $form->mediaFieldBS('i_alt');
            
            foreach ($form->media as $image) 
                if ($image->i_original)
                    echo $form->mediaBS($image,array('del','i_name','i_alt'));
                
            $form->mediaBehavior = 'MediaBehaviorz';
            
            echo $form->mediaFieldBS('i_original');
            echo $form->mediaFieldBS('i_name');
            echo $form->mediaFieldBS('i_alt');
            
            foreach ($form->media as $image) 
                if ($image->i_original)
                    echo $form->mediaBS($image,array('del','i_name','i_alt'));
            
            echo $form->tinymceEditor('=content_long');
            if (!$this->model->isNewRecord)
                $form->productAttribute22();

            
            echo $form->metaBS();
        ?>
    
    </div>
    <?php
        echo $form->buttonSave();
        
        $this->endWidget();
    ?>
</div>
