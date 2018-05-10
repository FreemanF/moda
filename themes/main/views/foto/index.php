<?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$this->dataProvider,
        'itemView'=>'_index',
        'template'=>"{items}{pager}",
        'pagerCssClass' => 'pagination',
        'pager' => array('class' => 'PesthouseKPD'),
        'ajaxUpdate' => false,
    ));
?>