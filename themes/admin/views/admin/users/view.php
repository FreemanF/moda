<form class="form-horizontal">               
    <div class="container-fluid">
           <div class="row-fluid">
               <div class="span12">
                    <?php
                     $this->widget('zii.widgets.CDetailView', array(
                            'data'=>$user,
                            'attributes'=>array(
                                    'uid',
                                    'username',
                                    'password',
                                    'email',
                            ),
                            'htmlOptions' => array('class' => 'table table-bordered table-striped'),
                    )); 
                    ?>
               </div>
           </div>
    </div>
</form>
