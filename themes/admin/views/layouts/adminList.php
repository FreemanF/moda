<?php 
    $this->beginContent('/layouts/admin');
    $this->renderPartial('/layouts/menus/main'); 
    $this->renderPartial('/layouts/menus/user');
    $this->renderPartial('/layouts/panels/'.$this->layout_leftPanel); 
?>
<div class="main-content<?php echo $this->cookieRetracted; ?>">
    <div class="breadcrumb-container">
        <ul class="xbreadcrumbs">
            <li class="fix"><a href="/admin"><i class="icon-photon home"></i></a></li>
            <?php 
                echo '<li class="fix"><a href="/admin/'.$this->currModule.'">'.$this->menuItem['text'].'</a></li>';
                if ($this->actionTitle && $this->action->id != 'index') 
                    echo '<li class="fix current"><a href="javascript:void(0);">'.$this->actionTitle.'</a></li>';
            ?>
            
        </ul>
    </div>
    <?php 
    if ($this->action->id != 'index')
        echo '
            <header>
                <i class="icon-big-notepad"></i>
                <h2><small>'.$this->pageTitle.'</small></h2>
            </header>';
    echo $content; ?>

</div>
<?php $this->endContent(); ?>