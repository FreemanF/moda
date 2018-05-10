<?php
    //$cs = Yii::app()->getClientScript();
    //$cs->registerPackage('elfinder');
?>
<div style="padding:25px;">
    <?php 
        $this->widget('ext.elFinder.ElFinderWidget', array(
            'id' => 'finder',
            'connectorRoute'=>'/admin/elfinder/connector',
            'settings'=> array(
                'places' => '', // Не смог наделить смыслом :) см.п.6 в migrate/bags201307161.docx
            ),
        ));
    ?>
</div>
