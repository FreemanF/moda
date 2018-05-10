        <h2></h2>
        <h1><?php echo $c_name; ?></h1>
<?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$this->dataProvider,
        'itemView'=>'_index',
        'template'=>"<div class='projlist'>{items}</div>{pager}",
        'pager' => array('class' => 'PesthouseKPD'),
        'ajaxUpdate' => false,
    ));
?>