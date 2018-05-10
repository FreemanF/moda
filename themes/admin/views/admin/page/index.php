<script type="text/javascript">
    delgenitive = '<?php echo $delgenitive; ?>';
    pageTitle     = '<?php echo $this->pageTitle; ?>';
    pageTitleRoot = 'Все папки сайта';
</script>
<header>
    <i class="icon-big-notepad"></i>
    <h2><small><?php echo $this->pageTitle; ?> <span></span></small></h2>
    <div class="button-add container-fluid" style="margin-top: 10px;">
        <a id="buttonAddFolder" href="javascript:void(0)" class="btn btn-mini"><i class="icon-folder-close"></i> Добавить папку</a>
        <a id="addObject" href="javascript:void(0)" class="btn btn-mini"><i class="icon-file"></i> Добавить страницу</a>
    </div>
</header>
<div class="form-horizontal">
    <?php $this->renderPartial('/layouts/blocks/saveobject'); ?>
    <input type="hidden" id="idParent" value="0">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <?php $this->renderPartial('list'); ?>
            </div>
        </div>
    </div>
</div>