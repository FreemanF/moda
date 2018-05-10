<?php 
    echo $this->renderPartial('//layouts/breadcrumbs');

    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$this->dataProvider,
        'itemView'=>'_index',
        'template'=>"{items}{pager}",
//        'pager' => array('class' => ''),
        'ajaxUpdate' => false,
    ));
?>