<?php 
// Вынес перед виджетом, чтобы гарантировать вычисление $this->model->inTrash
// перед $this->indexColumns
$dataProvider = $this->model->getlist();
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>$this->crudalias.'-grid',
    'enableSorting' => false,
    'enablePagination' => false,
    'dataProvider'=>$dataProvider, // search(),//
    'htmlOptions' => array('class' => 'dataTables_wrapper'),
    'itemsCssClass'=> 'table table-striped table-responsive dataTable',
    'template'=>'{items}',
    'rowHtmlOptionsExpression'=>'array("data-id"=>$data->primaryKey,"data-type"=>$data->s_type)',
    'columns'=>$this->indexColumns,
));
