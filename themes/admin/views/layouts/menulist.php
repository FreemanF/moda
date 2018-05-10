<?php 
// Вынес перед виджетом, чтобы гарантировать вычисление $this->model->inTrash
// перед $this->indexColumns
$dataProvider = $this->model->getlist($this->menuType);

$addData = '';
//foreach(DMultilangHelper::suffixList(true,'') as $lang=>$label)
//    $addData .= '
//        "data-'.$lang.'"=>CHtml::encode($data->m_name_'.$lang.'),
//        "data-descr-'.$lang.'"=>CHtml::encode($data->m_descr_'.$lang.'),';

$widgetGridViewOptions = array(
    'id'=>$this->crudalias.'-grid',
    'enableSorting' => false,
    'enablePagination' => false,
    'dataProvider'=>$dataProvider, // search(),//
    'htmlOptions' => array('class' => 'dataTables_wrapper'),
    'itemsCssClass'=> 'table table-striped table-responsive dataTable',
    'template'=>'{items}',
    'rowHtmlOptionsExpression'=>'array(
        "data-id"=>$data->primaryKey,'.
        $addData.'
        "data-page"=>$data->m_page_id,
        "data-sef"=>CHtml::encode($data->m_sef))',
        //"data-image"=>CHtml::encode($data->m_image))',
    'rowCssClassExpression'=>'$data->classSort',
    'columns'=>$this->indexColumns,
);
$this->widget('zii.widgets.grid.CGridView', $this->prepareIndexOptions($widgetGridViewOptions));
