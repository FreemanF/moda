<?php
    echo '
        <h1>'.$this->model->g_name.'</h1>
        <div align="center">
            <div class="highslide-gallery">';
    
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$this->dataProvider,
        'itemView'=>'_detail',
        'template'=>"{items}{pager}",
        'pagerCssClass' => 'pagination',
        'pager' => array('class' => 'PesthouseKPD'),
        'ajaxUpdate' => false,
    ));
    
    echo '
            </div>
        </div>';
?>