<?php 
    /* @var $this CRUDController */
    $this->includePackages[] = 'bootstrap';
    $this->includePackages[] = 'admin-index';
    $this->jsVars['crudalias'  ] = '"'.$this->crudalias.'"';
    $this->jsVars['delgenitive'] = '"'.$delgenitive.'"';
?>
<div class="form-horizontal">
    <?php // сообщаем о сохранении объекта
    $this->renderPartial('//layouts/blocks/saveobject'); 
    
    if ($this->enableNotice) : ?>
        <div id="Basic_Non-responsive_Table" class="row-fluid">
            <div class="span12 span-table-title">
                <div class="alert alert-info alert-block">
                    <i class="icon-alert icon-alert-info"></i>
                    <strong>Вы можете на своё усмотрение ввести операторы сравнения (<, <=, >, >=, <> или =) в начале любой строки поиска, тем самым указывая, что именно вы ищете.</strong>
                </div>
            </div>
        </div>
   <?php endif; ?>
   <div class="container-fluid">
           <div class="row-fluid">
               <div class="span12">
                    <?php
                    $widgetGridViewOptions = array(
                        'id'=>'article-grid',
                        'enableSorting' => $this->enableSearch,
                        'dataProvider'=>$this->model->search(),
                        'filter'=>$this->enableSearch ? $this->model : null,
                        'htmlOptions' => array('class' => 'dataTables_wrapper'),
                        'itemsCssClass'=> 'table table-striped table-responsive dataTable',
                        'summaryCssClass' => 'dataTables_info',
                        'pagerCssClass' => 'dataTables_paginate paging_bootstrap pagination',
                        'template'=>'{items}{pager}',//.(isset($_POST['ajax'])?'{summary}':'').
                        //'summaryText' => 'Показано {start}-{end} из {count} результатов',
                        //'ajaxUpdate' => false,
                        'pager' => array('header' => '',
                                        'footer' => '',
                                        'htmlOptions' => array('class'=>""),
                                        'nextPageCssClass' => "next",
                                        'nextPageLabel' => "»",
                                        'selectedPageCssClass'=>'active',
                                        'previousPageCssClass'=>'prev',
                                        'prevPageLabel' => "«",
                                        'firstPageLabel'=> "««",
                                        'hiddenPageCssClass'=>'disabled',
                                        'lastPageCssClass'=>'next',
                                        'firstPageCssClass'=>'prev',
                                        'lastPageLabel' => "»»"),
                        'rowHtmlOptionsExpression'=>'array("data-id"=>$data->primaryKey)',
                        'afterAjaxUpdate' => 'js:function(){'.$this->filterAjaxUpdate.'}',
                        'columns'=>$this->indexColumns,
                    );
                    
                    $this->widget('zii.widgets.grid.CGridView', $this->prepareIndexOptions($widgetGridViewOptions));
                    ?>
               </div>
           </div>
   </div>
</div>