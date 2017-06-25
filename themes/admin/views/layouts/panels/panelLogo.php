<style>
.CMSTextTop{
    font-family: "Century Gothic";
    font-size: 21px;
    font-weight: bold;
    margin: 0;
    padding: 0;
}
.CMSTextBottom{
    font-family: "Century Gothic";
    font-size: 20px;
    font-weight: normal;
    margin: 0;
    padding: 0;
}
.CMSConteiner{
    color: #FFFFFF;
    display: inline-table;
    height: 60px;
    line-height: normal;
    margin-left: 60px;
    margin-top: 15px;
    text-align: left;
    vertical-align: middle;
}
.light-version .CMSConteiner{
    color: #626161;
}
.panel-logo {
    display: block;
}    
</style>
<a class="panel-logo" href="<?php echo Yii::app()->request->hostInfo.'/admin'; ?>">
    <div class="CMSConteiner">
        <p class="CMSTextTop"><?php echo CHtml::encode(Yii::app()->name); ?></p>
        <p class="CMSTextBottom">admin panel</p>
    </div>
</a>