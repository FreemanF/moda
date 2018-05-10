        <h2></h2>
        <h1><?php echo $c_name; ?></h1>
		
<?php
// echo CHtml::dropDownList('sortAttr','',array_combine($attributes,$attributes),array('id'=>'sort','prompt'=>'select a Field'));


    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$this->dataProvider,
        'itemView'=>'_viewer',
		'enableSorting'=>1,

        'template'=>"{sorter}<ul class='b-catalog b-catalog_max-columns_4'>{items}</ul>{pager}",
		'sorterHeader'=>'Сортировать по:',
		'id' => 'catview',
		'sortableAttributes'=>array('pd_name','pd_price'),
    //    'pager' => array('class' => 'PesthouseKPD'),
        'ajaxUpdate' => false,
		'enableHistory' => false,
    ));
	
//	Yii::app()->clientScript->registerScript('sort','
//$("#sort").change(function()
//        {       
//            $.fn.yiiListView.update("catview",{data:{sortAttr:$(this).val()}})      
//        });
//');
?>