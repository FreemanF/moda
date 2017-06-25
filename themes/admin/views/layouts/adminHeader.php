<?php 
    $this->beginContent('/layouts/admin');
    $this->renderPartial('/layouts/menus/main'); 
    $this->renderPartial('/layouts/menus/user');
    $this->renderPartial('/layouts/panels/'.$this->layout_leftPanel); 
?>  <div class="main-content<?php echo $this->cookieRetracted; ?>">
        <?php $this->renderPartial('/layouts/menus/breadcrumbs'); ?>
        <header>
            <i class="icon-big-notepad"></i>
            <h2><small><?php echo $this->pageTitle; ?> <span></span></small></h2>
            <?php if ($this->enableAddButton) : ?><div class="button-add container-fluid" style="margin-top: 10px;">
                <a id="addObject" href="/admin/<?php echo $this->crudalias;?>/create" class="btn btn-mini">
                    <i class="icon-photon move_alt2"></i> <?php echo $this->labelAddButton; ?></a>
            </div><?php endif; ?>
        </header>
        
        <?php echo $content; ?>
        
    </div>
<?php $this->endContent(); ?>