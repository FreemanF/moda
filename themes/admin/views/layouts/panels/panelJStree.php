<?php
//    if (is_array($this->packages)) {
//        $cs = Yii::app()->getClientScript();
//        foreach($this->packages as $package)
//            $cs->registerPackage($package);
//    }
    $cs = Yii::app()->getClientScript();
    $pack = ($this->crudalias == 'kind' || $this->crudalias == 'group') 
        ? 'menu' : $this->crudalias;
    $cs->registerPackage('panel-'.$pack);
    if ($this->action->id=='index')
        // На других страницах bootstrap конфликтует с TinyMCE
        $cs->registerPackage('bootstrap');
        
?>
<script type="text/javascript">
var crudalias   = '<?php echo $this->crudalias; ?>';
var dataTree = <?php echo $this->getTree(); ?>;
var isPageIndex = <?php echo ($this->action->id=='index') ? 'true' : 'false'; ?>;
var treeHrefPrefix = '<?php echo $this->treeHrefPrefix; ?>';
var jstree_default = <?php echo $this->jstree_default; ?>;
var jstree_first   = true;
var sTxtPic = '<?php echo Yii::app()->assetManager->publish('themes/admin/assets/images/photon/txt.png');?>';
</script>
<div class="panel<?php echo $this->cookieRetracted; ?>">
    <div class="panel-content filler">
        <?php $this->renderPartial('/layouts/panels/panelLogo'); ?>
        <div class="panel-header">
            <h1><small><?php echo $this->h3;?></small></h1>
            <?php if ($this->crudalias=='page' && $this->action->id=='index')
                echo '<button id="buttonAddRoot" class="btn btn-mini"><i class="icon-photon move_alt2"></i> Добавить корневую папку</button>'; ?>
        </div>
        <div class="sidebarMenuHolder">
            <div class="JStree">
                <div class="Jstree_shadow_top"></div>
                <div id="jstree" class="jstree-default"></div>
                <div class="Jstree_shadow_bottom"></div>
            </div>
        </div>
    </div>
    <div class="panel-slider">
        <div class="panel-slider-center">
            <div class="panel-slider-arrow"></div>
        </div>
    </div>
</div>