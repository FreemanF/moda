<?php

class Bootstrap extends CActiveForm
{
    public static function infoTooltip($text,$inlabel=true,$floatright=false,$placement='right') {
        return '<a class="bootstrap-tooltip'.($inlabel?' control-label thin-tooltip':'').'" data-original-title="'.
                CHtml::encode($text).'" data-placement="'.$placement.'" '.
                ($floatright?'style="float:right;" ':'').'href="javascript:void(0);">
    <i class="icon-photon info-circle"></i>
</a>
'; //  onkeydown="if(event.keyCode==9) return false;"
    }
    
}
