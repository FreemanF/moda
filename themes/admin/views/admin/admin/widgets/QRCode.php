<script> siteURL = "<?php echo Yii::app()->request->hostInfo; ?>"; </script>
<div class="widget-holder widget-white">
    <div class="widget-flipper">
        <div class="widget-area qr-code-generation skin-white">
            <div class="widget-head">QR code</div>
            <p class="widget-description">Ссылка на <?php echo '<a href="'.Yii::app()->request->hostInfo.'" target="_blank">'.Yii::app()->request->hostInfo.'</a>'; ?></p>
            <div id="qrcode"></div>
            <img class="widget-white-shadow" src="<?php echo $this->themeImages.'photon/w_shadow.png'; ?>" alt="shadow"/>
        </div>
    </div>
</div>