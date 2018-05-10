<?php 
//    echo $this->renderPartial('//layouts/breadcrumbs');

    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$this->dataProvider,
        'itemView'=>'_index',
		'itemsTagName'=>'ul',
		'itemsCssClass'=>'b-brands__list',
        'template'=>'{items}',
//        'pager' => array('class' => ''),
        'ajaxUpdate' => false,
    ));
?>