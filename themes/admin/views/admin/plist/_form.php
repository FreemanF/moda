<?php
/* @var $this PlistController */
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
			echo $form->dropDownListBS('project_id', Plist::getListPgs(),array() );
			
			echo $form->textFieldBS('title');
			
		echo '<div class="control-group row-fluid">
		<div class="span12">
		<p style="font-weight: bold;font-size: 13px;">
		Рекомендуемое количество символов: <span class="label label-info">35</span>
		</p>
		</div></div>';
		
			echo $form->tinymceEditor('=content_long');
					echo '<div class="control-group row-fluid">
		<div class="span12">
		<p style="font-weight: bold;font-size: 13px;">
		Рекомендуемое количество символов: <span class="label label-info">60</span>
		</p>
		</div></div>';
		
			echo $form->textFieldBS('big_text');
					echo '<div class="control-group row-fluid">
		<div class="span12">
		<p style="font-weight: bold;font-size: 13px;">
		Рекомендуемое количество символов: <span class="label label-info">35</span>
		</p>
		</div></div>';
		
			echo $form->textFieldBS('small_text');
					echo '<div class="control-group row-fluid">
		<div class="span12">
		<p style="font-weight: bold;font-size: 13px;">
		Рекомендуемое количество символов: <span class="label label-info">70</span>
		</p>
		</div></div>';
            echo $form->datetimeFieldBS('=humanDate');
            
            echo $form->mediaFieldBS('del');
            echo $form->mediaFieldBS('i_original');
            echo $form->mediaFieldBS('i_name');
            echo $form->mediaFieldBS('i_alt');
            
        ?>
    
    </div>
    <?php
        echo $form->buttonRow();
        
        $this->endWidget();
    ?>
</div>
