<?php
    $cs = Yii::app()->getClientScript();
    $cs->registerPackage($this->themeBase . 'update');
?>
<div class="form-horizontal">

    <?php
    $form = $this->beginWidget('BootstrapForm', array(
        'controller' => $this,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        'bootstrapValidation'=>true,
    ));

    echo $form->errorSummaryBS();
    ?>

    <div class="container-fluid">
        <div class="form-legend" id="Input_Field">Поля, отмеченные * обязательны для заполнения</div>

        <?php
            $data = CHtml::listData(Category::model()->getHierarchy(Object::idExample, FALSE), 'cid', 'c_name');
            reset($data);
            echo $form->bootstrapRow3(
                CHtml::label('Категории', 'Categories', array("class" => "control-label")).Bootstrap::infoTooltip('Выделять можно несколько категорий, используя клавиши Shift или Ctrl'),
                CHtml::dropDownList(
                    'Categories',
                    key($data),
                    $data,
                    array(
                        'multiple' => 'multiple',
                        'options' => $this->model->selectionCategories(),
                        'size' => '9',
                    )
                )
            );
        ?>

    </div>
    <?php
    echo $form->buttonRow(false);

    $this->endWidget();
    ?>
</div>