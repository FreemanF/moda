
<?php
    //echo $this->renderPartial('//layouts/breadcrumbs');

                               $this->widget('zii.widgets.CListView', array(
                                    'id'=>'listID',
                                    'dataProvider'=>$this->dataProvider,
                                    'itemView'=>'msg_list',
                                    'template'=>"{pager}\n{items}\n{pager}\n",
//                                    'itemsTagName'=>'ul',
//                                    'enablePagination'=>true,
//                                    'pager' => array('id' => 'pager',
//                                        'class' => 'CLinkPager',
//                                        ),
                                    'ajaxUpdate' => false,
                                    'enableHistory'=>false,
                                    'ajaxUrl'=>Yii::app()->request->requestUri,
//                                    'updateSelector'=>'div#listID'
                                ));
    ?>

    <script>
        
//        $(document).ready(function($) {
//            (function(){
//                var f = function() {
//                    $.fn.yiiListView.update('listID');
//               };
//               window.setInterval(f, 20000);
//               f();
//            })();
//        });
    </script>