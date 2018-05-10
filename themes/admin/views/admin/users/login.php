<?php
    $this->layout='admin';
    $this->pageTitle=Yii::app()->name . ' - Вход';

    $cs = Yii::app()->getClientScript();
    $cs->registerPackage('forgotPass');
    $this->renderPartial('/layouts/blocks/greeting');
?>
<style>
    .login-logo img {
        height: 55px;
        margin-top: 10px;
        width: 55px;
    }
    .CMSTextTop{
        font-family: "Century Gothic";
        font-size: 24px;
        font-weight: bold;
    }
    .CMSTextBottom{
        font-family: "Century Gothic";
        font-size: 22px;
        font-weight: normal;
    }
    .CMSConteiner{
        display: inline-table;
        line-height: inherit;
        text-align: left;
        margin-left: 5px;
        color: #626161;
        padding-top: 13px;
        vertical-align: top;
    }
</style>
<div class="container-login">
    <div class="form-centering-wrapper">
        <div class="form-window-login">
            <div class="form-window-login-logo">
                <div class="login-logo">
                    <a href="/">
                        <img src="<?php echo $this->themeImages; ?>/photon/login-logo@2x.png" alt="<?php echo CHtml::encode(Yii::app()->name); ?>"/>
                    </a>
                    <div class="CMSConteiner">
                        <p class="CMSTextTop"><?php echo CHtml::encode(Yii::app()->name); ?></p>
                        <p class="CMSTextBottom">admin panel</p>
                    </div>
                </div>
                <h2 class="login-title">Добро пожаловать!</h2>
                <div class="login-input-area">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'login-form',
                            'enableAjaxValidation'=>true,
                    )); ?>
                    
                    <span style="color:red;">
                        <?php
                            if( CHtml::errorSummary($model) ){
                                echo '<span style="color:red;">'.
                                        '<div id="LoginForm_password_em_" class="errorMessage">'.
                                            'Неправильное имя пользователя или пароль.'.
                                        '</div>'.
                                    '</span>';
                            }else{
                                echo "<br/>";
                            }
                         ?>
                    </span>
                    
                    <label class="error required" for="LoginForm_username">Имя пользователя</label>
                    <?php echo $form->textField($model,'username'); ?>
                    
                    <label class="error required" for="LoginForm_password">Пароль</label>
                    <?php echo $form->passwordField($model,'password'); ?>

                    <?php echo CHtml::submitButton('Вход', array("class"=>"btn btn-large btn-success btn-login")); ?>
                    
                    <?php $this->endWidget(); ?>
                    
                    <a class="forgot-pass" href="javascript:void(0);">Забыли пароль?</a>
                </div>
            </div>
        </div>
    </div>
</div>
