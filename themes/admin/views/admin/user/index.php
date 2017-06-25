<?php
    $cs = Yii::app()->getClientScript();
    $cs->registerPackage('bootstrap');
?>
<script type="text/javascript">    
    function deleteUser(types){
        uid = $(this).parents("tr").attr("data-uid");
        if(typeof(types)== "object"){
            userId = <? echo Yii::app()->user->id;?>;
            if(userId==uid){
                $("#modal-notification .modal-text").text("Вы не можете удалить самого себя!");
                $("#modal-notification").modal( "show" );
                return false;
            }
            $("input[name='modal-confirm']").val(uid);
            $("#modal-confirm").modal('show');
        }else{
            uid = $("input[name='modal-confirm']").val();
            $.post("/admin/user/delete", {id:uid},function(){
                window.location.reload();
            });
        }
        return false;
    }
    $(document).ready(function() {
        $(".modal-alert-import").html('<div id="modal-notification" class="modal hide fade" data-backdrop="static"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3>Сообщение</h3></div><div class="modal-body"><p class="modal-text" style="text-align: center;"></p></div><div class="modal-footer modal-centered"><a href="javascript:;" class="btn btn-large btn-success" data-dismiss="modal">Продолжить работу</a></div></div>');
        $(".modal-confirm-import").html('<div id="modal-confirm" data-backdrop="static" class="modal hide fade"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3>Удаление пользователя</h3></div><div class="modal-body"><input type="hidden" name="modal-confirm" /><p style="text-align: center;">Вы уверены, что хотите удалить данный элемент?</p></div><div class="modal-footer"><a href="javascript:;" class="btn btn-confirm-back" data-dismiss="modal">Отмена</a><a href="javascript:;" class="btn btn-primary btn-confirm-save">Удалить</a></div></div>');
        $(".disabled a").click(function(){
            return false;
        });
        $(".active a").click(function(){
            return false;
        });
        $(".btn-confirm-save").live("click",function(){
            $("#modal-confirm").modal('hide');
            deleteUser(1);
        });
    });
</script>
<style>
    .delete:hover{
        cursor: pointer;
    }
    .button-column{
        min-width: 15%;
    }
    .button-add{
        border: none !important;
        margin-bottom: 10px !important;
    }
    .main-content .form-horizontal .container-fluid button.btn{
        background-color: #363636;
        background-image: linear-gradient(to bottom, #444444, #222222);
        background-repeat: repeat-x;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        color: #FFFFFF;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.4);
    }
</style>

<?php $baseUrl  = Yii::app()->theme->baseUrl;?>

<div class="form-horizontal">
    <?php 
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
                $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'user-grid',
                        'enableSorting' => true,
                        'dataProvider'=>$user->search(),
                        'filter'=>$user,
                        'htmlOptions' => array('class' => 'dataTables_wrapper'),
                        'itemsCssClass'=> 'table table-striped table-responsive dataTable',
                        'summaryCssClass' => 'dataTables_info',
                        'pagerCssClass' => 'dataTables_paginate paging_bootstrap pagination',
                        'template'=>'{items}{summary}{pager}',
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
                        'summaryText' => 'Показано {start}-{end} из {count} результатов',
                        'rowHtmlOptionsExpression'=>'array("data-uid"=>$data->uid)',
                        'columns'=>array(
                                'uid',
                                'username',
                                'fullname',
                                'email',
                                array(
                                        'class'=>'CButtonColumn',
                                        'template'=> ($user->isAdmin) ? '{update} {delete}' : '{update}',
                                        'buttons'=>array(
                                            'delete' => array(
                                                'label'=>'Удалить',
                                                'imageUrl'=>$this->themeImages.'photon/icons/default/delete-item.png',
                                                'click'=>'deleteUser',
                                                'url'=>'',
                                            ),
                                            'update' => array(
                                                'label'=>'Редактировать',
                                                'imageUrl'=>$this->themeImages.'photon/icons/default/edit.png',
                                                //'url'=>'Yii::app()->controller->createUrl("update",array("uid"=>$data->primaryKey))',
                                            ),
                                        ),
                                ),
                        ),
                ));
                ?>
           </div>
        </div>
    </div>
</div>
