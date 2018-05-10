<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width; initial-scale=1.0;" name="viewport" />
        <meta name="language" content="ru" />
    <?php 
            if ($this->noindex)  echo '        <meta name="robots" content="noindex">'."\n";
            if ($this->nofollow) echo '        <meta name="robots" content="nofollow">'."\n";
            if (!empty($this->meta['keywords'])) echo '        <meta name="keywords" content="'.CHtml::encode($this->meta['keywords']).'" />'."\n";
            if (!empty($this->meta['description'])) echo '        <meta name="description" content="'.CHtml::encode($this->meta['description']).'" />'."\n"; 
    ?>        <title><?php echo CHtml::encode($this->meta['title']); ?></title>
    <?php 
        // Пордключаем пакеты
        $cs = Yii::app()->clientScript;
        foreach($this->includePackages as $package)
            $cs->registerPackage($package);
        // Инициируем переменные JS
        if ($this->jsVars) {
            echo "<script type=\"text/javascript\">\n";
            foreach($this->jsVars as $name=>$value)
                echo (strpos($name,'[')===false?'var ':'    '). "$name = $value;\n";
            echo "</script>\n";
        }

        echo Setting::getParam("google_analytics");
        ?>
    </head>
    <body>
        <?php
            if ( Yii::app()->user->checkAccess("Administrator") )
                $this->renderPartial('//layouts/adminPanel');
        ?>
        <div>
            <?php
                $this->beginWidget('zii.widgets.CMenu', array(
                    'items'=> $this->getMenu(),
                    'encodeLabel' => false,
                    'htmlOptions'=>array('class'=>'menu'),
                ));
                $this->endWidget();
            ?>
        </div>
        <div>
            <?php echo $content; ?>
        </div>
        <?php echo Setting::getParam("Yandex_Metrics"); ?>
    </body>
</html>
