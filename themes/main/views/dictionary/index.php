<?php
    echo '<h2></h2>';
    echo '<h1>'.$this->model->p_name.'</h1>';
    echo $this->model->content_long;
//    echo '<p style="text-align: justify;"></p>';

    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$this->dataProvider,
        'itemView'=>'_index',
        'template'=>"{items}{pager}",
        'pagerCssClass' => 'pagination',
        'pager' => array('class' => 'PesthouseKPD'),
        'ajaxUpdate' => false,
    ));
?>