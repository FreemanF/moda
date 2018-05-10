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
    $('#switch_userisblogger').on('switch-change', function (e,data) {
        var checkBlg = $('#User_u_sef,#User_profile,#User_fullname_r').closest('.control-group');
        checkBlg.toggle(data.value);
    });
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
            
            echo $form->textFieldBS('=username'); 
            echo $form->textFieldBS('=password',array(),'password'); 
            echo $form->textFieldBS('=email'); 
            echo $form->textFieldBS('=fullname'); 
            
            if( $this->model->canEditAccess )
            {
                echo $form->checkBoxBS('=status');
                
                echo $form->checkBoxBS('=userisadmin');
                ?>
                <div class="control-group row-fluid" <?php if($this->model->userisadmin) echo ' style="display:none"'; else echo ''; ?>>
                    <div class="span3">
                        <?php 
                            echo CHtml::label('Доступ к модулям', 'Modules', array("class"=>"control-label")); 
                            echo Bootstrap::infoTooltip('Выделять можно несколько модулей, используя клавиши Shift или Ctrl');
                        ?>
                    </div>
                    <div class="span9">
                        <div class="controls">
                            <?php 
                                //$disabled = $model->id == Yii::app()->user->id ? array('disabled'=>'disabled') : array();
                                $disabled = array();
                                $data =CHtml::listData(ModuleController::getModules(),'name','description');
                                
                                // Убираем модули к которым не нужно предоставлять доступ 
                                // Или невозможно предоставить таким способом (Роль не подчинена Modules)
                                unset($data['TaskManager']);
                                
                                echo CHtml::dropDownList('Modules', 0, $data, array_merge($disabled,array(
                                    'multiple' => 'multiple',
                                    'options' => $this->model->grantedModules(),
                                    'size'=>'9',
                                    )));
                             ?>
                        </div>
                    </div>
                </div> <?php
            }       
        ?>
    
    </div>
    <?php
        echo $form->buttonRow(false);
        
        $this->endWidget();
    ?>
</div>