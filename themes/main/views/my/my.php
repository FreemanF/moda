<?php
$cs=Yii::app()->clientScript;
$cs->scriptMap=array(
    'jquery.js'=>false,
    'jquery.ui.js' => false,
    'jquery' => false,
//    'jquery.min.js' => false,
);
?>

<?php // Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php // Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php // Yii::app()->clientscript->scriptMap['jquery'] = $jquery; ?>
<?php $jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'; ?>
<?php //Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php //Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php //Yii::app()->clientscript->scriptMap['jquery'] = $jquery; ?>
<?php
    //Yii::app()->clientscript->coreScriptPosition = CClientScript::POS_HEAD;
?>
<?php
// if($this->beginCache($id, array('duration'=>3600))) {
?>
<?php
	if (Yii::app()->user->isGuest){
		echo $this->renderPartial('//layouts/header');
	} else {
		echo $this->renderPartial('//layouts/header_logged');
	}
?>


    
    <div class="b-section">
        <div class="b-section__container">
            <h1 class="b-title b-title_type_thin">
                Мои настройки
            </h1>
        </div>
    </div>
    <div class="b-section">
        <div class="b-section__container b-main">
            <div class="b-main__content">
                <div class="b-main__inner">
                    <div class="b-main__block">
                        


 <?php
/* @var $this UsersController */
/* @var $user Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'users-edit-form',
    'enableAjaxValidation'=>false,
    'clientOptions'=>array(
    'validateOnSubmit'=>true,
    ),
)); ?>
<!--
    <p class="note">Fields with <span class="required">*</span> are required.</p>
-->

    <?php echo $form->errorSummary($user); ?>

    <div class="b-form-row">
        <?php echo $form->labelEx($user,'us_login',array('class'=>'b-settings__label')); ?>
        <?php echo $form->textField($user,'us_login',array('class'=>'b-form-input')); ?>
        <?php echo $form->error($user,'us_login',array('class'=>'b-form-error')); ?>
    </div>
    
    <div class="b-form-row">
        <?php echo $form->labelEx($user,'us_name',array('class'=>'b-settings__label')); ?>
        <?php echo $form->textField($user,'us_name',array('class'=>'b-form-input')); ?>
        <?php echo $form->error($user,'us_name',array('class'=>'b-form-error')); ?>
    </div>

    <div class="b-form-row">
        <?php echo $form->labelEx($user,'us_family',array('class'=>'b-settings__label')); ?>
        <?php echo $form->textField($user,'us_family',array('class'=>'b-form-input')); ?>
        <?php echo $form->error($user,'us_family',array('class'=>'b-form-error')); ?>
    </div>
    
    <div class="b-form-row">
        <?php echo $form->labelEx($user,'us_otchestvo',array('class'=>'b-settings__label')); ?>
        <?php echo $form->textField($user,'us_otchestvo',array('class'=>'b-form-input')); ?>
        <?php echo $form->error($user,'us_otchestvo',array('class'=>'b-form-error')); ?>
    </div>

    <div class="b-form-row">
        <?php echo $form->labelEx($user,'us_email',array('class'=>'b-settings__label')); ?>
        <?php echo $form->textField($user,'us_email',array('class'=>'b-form-input')); ?>
        <?php echo $form->error($user,'us_email',array('class'=>'b-form-error')); ?>
    </div>


    <div class="b-form-row">
        <?php //echo $form->labelEx($user,'us_city'); ?>
        <?php //echo $form->textField($user,'us_city'); ?>
        
        <?php
//        $cityes = City::model()->findAll();
//        
//        
//        $a= CHtml::listData($cityes,'ctid','ct_name');
//	echo $form->dropDownList($user,'us_city',$a,array('class'=>'selectpicker',
//                    'prompt'=>'Выберите город',
//                    'style' => 'width:49%; font-size:1.3em;',
//                    ));
        ?>
        <?php // echo $form->error($user,'us_city',array('class'=>'b-form-error')); ?>
    </div>



    <div class="b-form-row">
        <?php echo CHtml::submitButton('Сохранить',array('class'=>'b-button b-button_pull_right b-settings__button')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->


                    </div>
                </div>
            </div>
            <aside class="b-main__aside">
                <div class="b-main__inner">
                    Обязательно заполните поле "Логин" для Вашего магазина.
                    <ul style="display: none;">
                        <li class="b-side-nav">
                            <a href="/my/settings"
                               class="b-side-nav__link b-side-nav__link_state_active" rel="nofollow">
                                Основная информация
                            </a>
                        </li>
                        <li class="b-side-nav">
                            <a href="/my/settings/notifications"
                               class="b-side-nav__link " rel="nofollow">
                                Настройки уведомлений по почте
                            </a>
                        </li>
                        <li class="b-side-nav">
                            <a href="/my/settings/size"
                               class="b-side-nav__link " rel="nofollow">
                                Мои размеры
                            </a>
                        </li>

                        <li class="b-side-nav">
                            <a href="/my/settings/shop"
                               class="b-side-nav__link " rel="nofollow">
                                Настройки магазина
                            </a>
                        </li>
                        <li class="b-side-nav">
                            <a href="/my/settings/cards"
                               class="b-side-nav__link " rel="nofollow">
                                Настройки платежей
                            </a>
                        </li>
                        <li class="b-side-nav">
                            <a href="/my/settings/mt"
                               class="b-side-nav__link " rel="nofollow">
                                Готовые ответы
                            </a>
                        </li>
                        
                        
                    </ul>
                </div>
            </aside>
        </div>
    </div>

    <div class="b-section b-section_bg_footer">
        <footer class="b-section__container">
            <div class="b-footer b-section__vertical-indent">
    <div class="b-footer-info">
        <p class="b-footer-info__copyright">&copy; 2018 <a href="/" class="b-footer-info__link">modnekublo.com.ua</a>
            <span class="b-footer-info__text">Модная женская одежда и аксессуары по доступной цене. Все права защищены</span>
        </p>
        <ul class="b-footer-info__list b-footer-list">
            <li class="b-footer-list__item">
                <a class="b-footer-list__link"
                   href="/page/kak-eto-rabotaet">Как это работает?</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link"
                   href="/privacy-policy">Privacy policy</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link"
                   href="/terms-of-service">Договор-оферта</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link" rel="nofollow"
                   href="https://plus.google.com/1">Мы в Google+</a>
            </li>
        </ul>
    </div>
</div>

    </div>

    <script>
    window.staticUrl = '/assets/';
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
    </script>



    <?php
    
    //Yii::app()->clientScript->scriptMap=array(
    //    'jquery.js'=>false,
//);
   // $cs=Yii::app()->clientScript;
//$cs->scriptMap=array(
 //   'jquery.js'=>'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js?1',
//); 
//$cs->registerScriptFile('jquery.js',CClientScript::POS_HEAD);
?>
    <?php  //Yii::app()->clientScript->registerCoreScript('jquery.ui') ?>
<?php
//$cs=Yii::app()->clientScript;
//$cs->scriptMap=array(
//    'jquery.js'=>false,
//    'jquery.ui.js' => FALSE,
//    'jquery' => false,
//);

?>
<?php $jquery = 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery'] = $jquery; ?>

<?php    Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<?php Yii::app()->clientScript->registerScriptFile($this->themeCss.'js/bootstrap.min.js', CClientScript::POS_END); ?>
<?php //Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <?php //Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
        <?php
//        $cs = Yii::app()->clientScript;
//        $cs->coreScriptPosition = $cs::POS_END;
// 
//        $cs->scriptMap = array(
//            'jquery.js'=>false,
//            'jquery.ui.js'=>false,
//        );
        ?>

    <script>
    $(document).ready(function() {
        //$('.dropdown-toggle').dropdown();
    });
    </script>


    <script defer src="<?php echo $this->themeCss; ?>/assets/build/shared.js"></script>
    <script defer src="<?php echo $this->themeCss; ?>/assets/build/global.js"></script>
</body>

</html>