<?php if (Yii::app()->user->hasFlash('saveobject')) : // сообщаем о сохранении объекта  ?>
    <div class="row-fluid" id="alertObjectWasSaved">
        <div class="span12 span-table-title">
            <div class="alert alert-success alert-block">
                <i class="icon-alert icon-alert-success"></i>
                <strong><?php echo Yii::app()->user->getFlash('saveobject'); ?></strong>
            </div>
        </div>
    </div>
<?php endif;