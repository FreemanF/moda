<?php
    $hasButtons = false;
    $soc = Yii::app()->params['social'];
    if(!isset($scope)) $scope = 'FB,TW,VK';
    foreach(explode(',', $scope) as $hub)
        if (isset($soc[$hub]['enabled']) && $soc[$hub]['enabled']) {
            $hasButtons = true;
            echo $form->checkBoxSocial('socialStuff.'.strtolower($hub).'_need');
        }
    if ($hasButtons) : ?>
        <script type="text/javascript">
            $(function(){
                $(".uniformSocial").uniform();
            });            
        </script>
    <?php endif;
