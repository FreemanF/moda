<?php
    $cs = Yii::app()->getClientScript();
    $cs->registerPackage('bootstrap');

    $this->renderPartial('/layouts/menus/main'); 
    $this->renderPartial('/layouts/menus/user');
?>  
<div class="container-fluid dashboard dashboard-title">
    <div class="row-fluid">
        <div class="span12">
            <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
        </div>
    </div>
</div>
<?php 
    $this->renderPartial('shortcutBar');
    $this->renderPartial('widgetsBar');
?>
