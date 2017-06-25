        <h2></h2>
        <h1><?php echo $this->cname; ?></h1>
<?php
//ext.CustomListView
//zii.widgets.CListView
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$this->dataProvider,
        'itemView'=>'_index',
//        'itemsTagName'=>'',
        'itemsCssClass'=>'projlist',
        'template'=>"<div class='projlist'>{items}</div>{pager}",
        'pagerCssClass' => 'pagination',
        'pager' => array('class' => 'PesthouseKPD'),
        'ajaxUpdate' => false,
    ));
?>