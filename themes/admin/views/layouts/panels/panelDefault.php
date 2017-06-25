<div class="panel<?php echo $this->cookieRetracted; ?>">
    <div class="panel-content filler">
        <?php $this->renderPartial('/layouts/panels/panelLogo'); ?>
        <div class="panel-header">
            <h1><small><?php echo $this->h3;?></small></h1>
        </div>
        <div class="row-fluid">
            <div class="span12 span-table-title">
                <?php if ($this->infoAlertOnDefaultPanel )
                    echo '<div class="alert alert-info alert-block">
                    <i class="icon-alert icon-alert-info"></i>
                    <strong>'.$this->infoAlertOnDefaultPanel.'</strong>
                </div>'; ?>
                
            </div>
        </div>
    </div>
    <div class="panel-slider">
        <div class="panel-slider-center">
            <div class="panel-slider-arrow"></div>
        </div>
    </div>
</div>