<?php
    $cs = Yii::app()->getClientScript();
    $cs->registerPackage($this->themeBase.'update');
?>
<script type="text/javascript">
$(document).ready( function() {
    $('#switch_userisadmin').on('switch-change', function (e,data) {
        var checkAdm = $('#Modules').closest('.control-group');
        checkAdm.toggle(!data.value);
    });
//    $('#switch_userisblogger').on('switch-change', function (e,data) {
//        var checkBlg = $('#User_u_sef,#User_profile,#User_fullname_r').closest('.control-group');
//        checkBlg.toggle(data.value);
//    });
});
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
            //echo $form->hiddenFieldBS2('dir');
            
            echo $form->textFieldBS('=us_name'); 
            echo $form->textFieldBS('=us_password',array(),'password'); 
            echo $form->textFieldBS('=us_email'); 
            echo $form->textFieldBS('=us_otchestvo'); 
            
 
        ?>
    
    </div>
    <?php
        echo $form->buttonRow(false);
        
        $this->endWidget();
    ?>
</div>