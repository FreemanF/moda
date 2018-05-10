<?php
    $cs = Yii::app()->getClientScript();
    $cs->registerPackage('shortcutBar');
?>
<style>
.dashboard-quick-launch ul>li {
    padding-top: 0;
    height: 110px;
    overflow: hidden;
}
.dashboard-quick-launch ul>li>a {
    display:block;
    padding-top: 14px;
    color: #D1D7DF;
    text-shadow: 0 2px 1px rgba(0, 0, 0, 0.3);
}
.light-version .dashboard-quick-launch ul>li>a {
    color: #666666;
    text-shadow: 0 2px 1px rgba(255, 255, 255, 0.3);
}
.dashboard-quick-launch ul>li:last-child {
    display: block;
}
</style>
<div class="container-fluid dashboard dashboard-quick-launch">
     <div class="row-fluid">
        <div class="span12">
            <label class="control-label short-cut-title" style="padding:0px;margin-bottom:10px;text-shadow:none;">
                Панель быстрого доступа
                <!--a class="bootstrap-tooltip" data-original-title="Быстрый доступ к часто используемым модулям" data-placement="right" href="javascript:;">
                    <i class="icon-photon info-circle"></i>
                </a-->
                <?php echo Bootstrap::infoTooltip('Быстрый доступ к часто используемым модулям',false); ?>
            </label>
            <ul id="sortable">
                <?php
                    $shortcutBar = ShortcutBar::model()->findAll(
                            array(
                                "condition"=>"sb_user=".Yii::app()->user->id,
                                "order"=>"sb_sort,sbid",
                            )
                    );
                    foreach ($shortcutBar as $item) {
                ?>
                        <li class="sort quick-launch-button" data-id="<?php echo $item->sbid;?>">
                            <a href="<?php echo CHtml::encode($item->sb_sef);?>">
                            <img src="<?php echo $item->sb_icon;?>" alt="Quick Launch Icon"/>
                            <p><?php echo $item->sb_name;?></p></a>
                        </li>
                <?php
                    }
                ?>
                <li class="add-ql">
                    <a href="javascript:void(0);" title="Добавить">
                        <div class="add-quick-launch" id="addql"></div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="modalQuickLaunch" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3></h3>
    </div>
    <div class="modal-body">
        <div class="control-group row-fluid">
            <div class="span3">
                <label class="control-label" for="Shortcut_Label">Название</label>
            </div>
            <div class="span9">
                <div class="controls">
                    <input id="Shortcut_Id" type="hidden" name="ShortcutId" />
                    <input id="Shortcut_Icon" type="hidden" name="ShortcutIcon" />
                    <input id="Shortcut_Label" type="text" placeholder="Введите название" name="ShortcutLabel" maxlength="30"/>
                </div>
            </div>
        </div>
        <div class="control-group row-fluid">
            <div class="span3">
                <label class="control-label" for="Shortcut_URL">URL</label>
            </div>
            <div class="span9">
                <div class="controls">
                    <input id="Shortcut_URL" type="text" placeholder="Введите URL" name="ShortcutURL" />
                </div>
            </div>
        </div>
        <div class="control-group row-fluid loadBarBlock">
            <div class="span3">
                <label class="control-label">Иконка</label>
            </div>
            <div class="span9">
                <div class="controls">
                    <img class="loadBarPhoto" src="" alt="icon">
                </div>
            </div>
        </div>
        <p class="alternative">Выберите один из предопределенных значков</p>
    </div>
    <div class="modal-body predefined-icons">
        <ul>
            <?php 
                $subPath = DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."icons";
                $defaultImageDir = Yii::app()->theme->basePath.$subPath;
                $defaultImageUrl = Yii::app()->theme->baseUrl.'/assets/images/icons/';
                if (is_dir($defaultImageDir)) {
                    if ($handle = opendir($defaultImageDir)) {
                        while (false !== ($entry = readdir($handle))) {
                            // исключаем папки с назварием '.' и '..' 
                            if ($entry!='.' && $entry!='..' && $entry!='.htaccess'){
                                $tmpPath = $defaultImageUrl.$entry;
                                if (!is_dir($tmpPath)){
                                    echo '<li class="barPhoto"><img src="'.$tmpPath.'" alt="icon"></li>';
                                }
                            }
                        }
                        closedir($handle);
                    }
                }
            ?>
        </ul>
    </div>

    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-primary" id="saveShortcut">Создать</a>
        <a href="javascript:;" class="btn" data-dismiss="modal">Отмена</a>
    </div>
</div>