<?php Yii::app()->clientScript->registerPackage('widgets'); ?>
<div class="container-fluid dashboard dashboard-widget-group">
     <div class="row-fluid">
        <div id="photon_widgets" class="span12 ui-sortable">
            <?php 
                $this->renderPartial('widgets/clock');
                $this->renderPartial('widgets/QRCode');
                $this->renderPartial('widgets/logs');
                $this->renderPartial('widgets/news');
            ?>
        </div>
    </div>
</div>