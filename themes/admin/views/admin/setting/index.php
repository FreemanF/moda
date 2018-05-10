<script type="text/javascript">
    disable_add_in_root = true;
</script>
<header>
    <i class="icon-big-notepad"></i>
    <h2><small><?php echo $this->pageTitle; ?> <span></span></small></h2>
</header>
<div class="form-horizontal">
    <div class="container-fluid">
<?php
    $access = Yii::app()->session['SettingAccess'];
    // есть ли доступ к настройкам Facebook. см. Setting.defaultScope
    if (is_array($access) && in_array(2,$access,true)) {
        $enabled = Setting::getCachedParam('social-fb-enabled');
        //Yii::log('USER HAVE SETTING ACCESS: FB:'.($enabled?'enabled':'disabled'));
        if (($err=Setting::getCachedParam('social-fb-error')) || !$enabled) {
            //Yii::log('SETTING ACCESS ERR: '.$err);
            $this->renderPartial('//layouts/blocks/settinginfo',array(
                'message'=>$enabled ? $err : 'Публикация на Facebook запрещена',
                'type'=>$enabled ? 'danger' : 'info',
            )); 
        }
        if (($expired=(int)Setting::getCachedParam('social-fb-expired'))>0) {
            $human = Social::humanExpire($expired);
            $this->renderPartial('//layouts/blocks/settinginfo',array(
                'message'=>'Токен будет оставаться действительным ещё '.$human,
                'type'=>'info'
            )); 
        }
        if ($link=Setting::getCachedParam('social-fb-loginurl')) {
            if ($appname = Setting::getCachedParam('social-fb-appname'))
                $appname = "($appname) ";
            $this->renderPartial('//layouts/blocks/settinginfo',array(
                'message'=>'Чтобы приложение '.$appname.
                    'получило необходимый доступ перейдите по <a target="_blank" href="'.
                    $link.'">ссылке</a>.<br>'.
                    'Затем, новый <a target="_blank" href="https://developers.facebook.com/tools/explorer/'.
                    Setting::getCachedParam('social-fb-appid').
                    '">Access Token</a> сохраните в настройках сайта',
                'type'=>'success',
            )); 
        }
    }
?>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->renderPartial('list'); ?>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal-setting-panels">
    <input id="idSetting" type="hidden" value="" />
    <input id="tpSetting" type="hidden" value="" />
    <div id="modal-dialog-string" data-backdrop="static" class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Значение</h3>
        </div>
        <div class="modal-body">
            <p><input type="text" name="setting" value="" /></p>
        </div>
        <div class="modal-footer">
            <a href="javascript:;" class="btn btn-primary btn-form-save">Сохранить</a>
            <a href="javascript:;" class="btn btn-form-back" data-dismiss="modal">Отмена</a>
        </div>
    </div>
    
    <div id="modal-dialog-text" data-backdrop="static" class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Значение</h3>
        </div>
        <div class="modal-body">
            <p><textarea rows="10" name="setting"></textarea></p>
        </div>
        <div class="modal-footer">
            <a href="javascript:;" class="btn btn-primary btn-form-save">Сохранить</a>
            <a href="javascript:;" class="btn btn-form-back" data-dismiss="modal">Отмена</a>
        </div>
    </div>    

    <div id="modal-dialog-image" data-backdrop="static" class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Картинка</h3>
        </div>
        <div class="modal-body" style="text-align: center;">
            <form id="uploadImage" action="/admin/setting/image" enctype="multipart/form-data" target="upload_target" method="POST">
                <input type="hidden" name="id" value="" />
                <div data-provides="fileupload" class="fileupload fileupload-new upload">
                    <div class="input-append">
                        <div class="uneditable-input span3">
                            <i class="icon-file fileupload-exists"></i>
                            <span class="fileupload-preview"></span>
                        </div>
                        <span class="btn btn-file">
                            <span class="fileupload-new">Загрузить</span>
                            <span class="fileupload-exists">Изменить</span>
                            <input type="file" id="Media_new" name="Media_new" value="" accept="image/*">
                        </span>
                        <a data-dismiss="fileupload" class="btn fileupload-exists" href="javascript:void(0);">Удалить</a>
                    </div>
                </div>
                <div class="image-exists upload">
                    <img src="/media/setting/original/00/17/17535/43792-17530.jpg" style="max-width:500px;max-height:375px;margin: 10px 0;">
                    <div class="delete-photo-item">
                       <img rel="Media" data-toggle="modal" src="<?php echo $this->themeImages;?>photon/newdelete.png">
                    </div>
                    <input type="hidden" id="Media_del" name="Media_del" value="no">
                </div>            
            </form>    
            <iframe name="upload_target" style="visibility: hidden;height: 0px;width: 0px;"></iframe>
        </div>
        <div class="modal-footer">
            <a href="javascript:;" class="btn btn-primary btn-form-save">Сохранить</a>
            <a href="javascript:;" class="btn btn-form-back" data-dismiss="modal">Отмена</a>
        </div>
    </div>    

