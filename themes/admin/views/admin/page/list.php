<?php 
// Вынес перед виджетом, чтобы гарантировать вычисление $this->model->inTrash
// перед $this->indexColumns
$dataProvider = $this->model->getlist();
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'page-grid',
    'enableSorting' => false,
    'enablePagination' => false,
    'dataProvider'=>$dataProvider, // search(),//
    'htmlOptions' => array('class' => 'dataTables_wrapper'),
    'itemsCssClass'=> 'table table-striped table-responsive dataTable',
    'template'=>'{items}',
    'rowHtmlOptionsExpression'=>'array("data-id"=>$data->primaryKey)',
    'rowCssClassExpression'=>'$data->classSort',
    'columns'=>$this->indexColumns,
));
