<?php
    /* @var $this MenuControllerBase */
    $this->jsVars['delgenitive'] = "'$delgenitive'";
    $this->jsVars['disable_add_in_root'] = "true";
    $this->jsVars['pageOptionsForSelect'] = "'{$this->pages}'";
    $this->jsVars['pageTitle'] = "'{$this->pageTitle}'";
    $this->jsVars['menuType'] = $this->menuType;
    $this->jsVars['newMenuTitle' ] = '"'.Yii::t('app',"admin.{$this->crudalias}.item.new").'"';
    $this->jsVars['editMenuTitle'] = '"'.Yii::t('app',"admin.{$this->crudalias}.item.edit").'"';
//    $this->jsVars['menuLanguages'] = json_encode(Yii::app()->params['translatedLanguages']);
//    $this->jsVars['menuFieldLabels'] = array(
//        'name' =>Yii::t('app','admin.menu.label.name'),
//        'descr'=>Yii::t('app','admin.menu.label.descr'),
//        'newitem'=>Yii::t('app','admin.menu.item.new'),
//        'edititem'=>Yii::t('app','admin.menu.item.edit'),
//        'typeTabBlank'  =>Yii::t('app','admin.menu.type.tab.blank'),
//        'typeTabPage'   =>Yii::t('app','admin.menu.type.tab.page'),
//        'typeTabLink'   =>Yii::t('app','admin.menu.type.tab.link'),
//        'typeLabelBlank'=>Yii::t('app','admin.menu.type.label.blank'),
//        'typeLabelPage' =>Yii::t('app','admin.menu.type.label.page'),
//        'typeLabelLink' =>Yii::t('app','admin.menu.type.label.link'),
//    );
?>
<header>
    <i class="icon-big-notepad"></i>
    <h2><small><?php echo $this->pageTitle; ?> <span></span></small></h2>
    <div class="button-add container-fluid" style="margin-top: 10px;">
        <a id="addObject" href="javascript:void(0)" class="btn btn-mini"><i class="icon-file"></i> <?php echo $this->labelAddButton; ?></a>
    </div>
</header>
<div class="form-horizontal">
    <input type="hidden" id="idParent" value="0">
    <input type="hidden" id="typeParent" value="<?php echo $this->menuType;?>">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <?php $this->renderPartial('/layouts/menulist'); ?>
            </div>
        </div>
    </div>
</div>