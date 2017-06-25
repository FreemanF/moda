<script type="text/javascript">
    delgenitive = '<?php echo $delgenitive; ?>';
    disable_add_in_root = true;
    pageOptionsForSelect = '<?php echo $this->pages; ?>';
    pageTitle     = '<?php echo $this->pageTitle; ?>';
    pageTitleRoot = 'Меню';
</script>
<header>
    <i class="icon-big-notepad"></i>
    <h2><small><?php echo $this->pageTitle; ?> <span></span></small></h2>
    <div class="button-add container-fluid" style="margin-top: 10px;">
        <a id="addObject" href="javascript:void(0)" class="btn btn-mini"><i class="icon-file"></i> Добавить пункт меню</a>
    </div>
</header>
<div class="form-horizontal">
    <input type="hidden" id="idParent" value="0">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <?php $this->renderPartial('list'); ?>
            </div>
        </div>
    </div>
</div>