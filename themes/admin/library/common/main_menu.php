    
<div class="btn-toolbar btn-mobile-menus">
    <button class="btn btn-main-menu"></button>
    <button class="btn btn-user-menu"><i class="icon-logo"></i></button>
</div>

<div class="nav-fixed-left" style="visibility: hidden">
<?php
    $this->makeUserMenu();
    $this->beginWidget('zii.widgets.CMenu', array(
            'items'=> $this->menu,
            'encodeLabel' => false,
            'htmlOptions'=>array('class'=>'nav nav-side-menu'),
    ));
    $this->endWidget();
?>
</div>
