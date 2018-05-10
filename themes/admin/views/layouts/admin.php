<!DOCTYPE html>
<html lang="ru"><!-- style="background:#F6F6F6" -->
    <head>
        <!-- base href="<?php echo $this->themeUrl;?>" / -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta charset="utf-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="shortcut icon" href="<?php echo $this->themeUrl; ?>favicon.ico" />
        <link rel="apple-touch-icon" href="<?php echo $this->themeUrl; ?>iosicon.png" />
    <?php 
        // Пордключаем пакеты
        $cs = Yii::app()->clientScript;
        foreach($this->includePackages as $package)
            $cs->registerPackage($package);
        // Инициируем переменные JS
        if ($this->jsVars) {
            echo "<script type=\"text/javascript\">\n";
            foreach($this->jsVars as $name=>$value) {
                $valueStr = is_array($value) ? json_encode($value) : $value;
                echo (strpos($name,'[')===false?'var ':'    '). "$name = $valueStr;\n";
            }
            echo "</script>\n";
        }
    ?>
    </head>
    <body class="body-dashboard">
        <?php echo $content; ?>
        <!-- Вывод модальных окон и алертов -->
        <div class="modal-import"></div>
        <div class="modal-alert-import"></div>
        <div class="modal-confirm-import"></div>
        <div class="modal-import-panel"></div>
        <div class="modal-alert-import-panel"></div>
        <div class="modal-confirm-import-panel"></div>
        
    </body>
</html>
