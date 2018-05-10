<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
            if ($this->noindex)  echo '        <meta name="robots" content="noindex">'."\n";
            if ($this->nofollow) echo '        <meta name="robots" content="nofollow">'."\n";
            if (!empty($this->meta['keywords'])) echo '        <meta name="keywords" content="'.CHtml::encode($this->meta['keywords']).'" />'."\n";
            if (!empty($this->meta['description'])) echo '        <meta name="description" content="'.CHtml::encode($this->meta['description']).'" />'."\n"; 
    ?>        <title><?php echo CHtml::encode($this->meta['title']); ?></title>
    <link rel="stylesheet" href="<?php echo $this->themeCss; ?>vendor.css">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/5.0.0/normalize.css">
    <link rel="stylesheet" href="<?php echo $this->themeJs; ?>libs/owl.carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $this->themeJs; ?>libs/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $this->themeCss; ?>main.css">
    <link rel="stylesheet" href="<?php echo $this->themeCss; ?>media.css">
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header class="header">
      <div class="container">
        <div class="header-menu">
          <div class="row">
            <div class="col-md-3">
              <a href="/" class="header-logo">
                <img src="<?php echo $this->themeImages; ?>img/logo.png" alt="">
              </a>
            </div>
			<?php
			$this_pg = Page::model()->with('meta')->findByAttributes(array(
                'pid'=>3,
                'is_published'=>1,
                'is_delete'=>0));
			if ($this_pg)
				echo $this_pg->content_long;
			?>
          </div>
        </div>
      </div>
  <div class="header-content">
    <div class="container">
      <div class="header-content-wrap">
        <div class="header-side-link-wrap left">
          <a href="/howitwork" class="header-side-link ">как это работает</a>
        </div>
        <div class="header-side-link-wrap right">
          <a href="/" class="header-side-link ">under construction</a>
        </div>
        <div class="header-content-inner">
          <h1 class="page-title child">
            <?php echo $this->how_model->hw_name; ?>
          </h1>
          <p class="header-text child">
            <?php echo $this->how_model->hw_title_text; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="important-work">
  <div class="container">
	<?php echo $this->how_model->hw_works_block; ?>
  </div>
</div>
<div class="cooperation-format">
  <div class="container">
    <h2 class="title">формат сотрудничества</h2>
    <span class="sub-title">зависит от потребностей проекта</span>
	<?php echo $this->how_model->hw_format_sotr; ?>
    </div>
  </div>
</div>
<section class="work-options">
  <div class="container">
    <h2 class="title">Варианты работы по системе Fit-out</h2>
    <div class="row work-options-table">
	<?php echo $this->how_model->hw_fitout; ?>
  </div>
</section>
<section class="step-for-ideal">
  <div class="container">
    <h2 class="title">Всего 4 шага на пути к идеальному рабочему пространству</h2>
    <span class="sub-title">Практически без усилий с вашей стороны</span>
	<?php echo $this->how_model->hw_four_steps; ?>
    <article class="step-for-ideal-item center">
      <h3 data-number="04" class="step-for-ideal-title">Сдача работ</h3>
    </article>
    <div class="row">
	<?php echo $this->how_model->hw_sdacha_block; ?>
    </div>
  </div>
  <div class="step-for-ideal-result">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-push-2">
          <div class="step-for-ideal-result-item">
            <?php echo $this->how_model->content_long; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="consultation">
  <div class="container">
    <h2 class="title">Закажите бесплатную консультацию и расчёт сметы</h2>
    <span class="sub-title">Заполните всего 2 поля, мы свяжемся с вами в течение 10 минут</span>
    <form action="http://www.rugerbest.ru/contacts" class="consultation-form" method="POST">
      <div class="row">
        <div class="col-lg-4 col-sm-6 col-lg-push-2">
          <input class="input-text" type="text" name="name" placeholder="Введите Ваше имя" required>
        </div>
        <div class="col-lg-4 col-sm-6 col-lg-push-2">
          <input class="input-text" type="tel" name="phone" placeholder="Введите контактный телефон" required>
        </div>
      </div>
      <button type="submit" class="button">получить расчет</button>
      <span class="consultation-note">*Соблюдаем политику конфиденциальности</span>
    </form>
  </div>
</section>
<section class="footer-top">
  <div class="container">
    <h2 class="footer-top-title">
      <span>Полный цикл услуг по строительству объектов коммерческой недвижимости:</span>
      от технического задания до введения в эксплуатацию
    </h2>
  </div>
</section>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-3">
            <span class="footer-copyright">© 2017 Under Constraction. Все права защищены.</span>
          </div>
          <div class="col-lg-4 col-md-5">
            <ul class="footer-menu">
              <li><a href="/howitwork">Как это работает</a></li>
              <li><a href="/who">Кто мы такие</a></li>
              <li><a href="/works">Результаты работы</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-lg-offset-1 col-md-4">
            <div class="footer-contact-wrap">
              <a href="mailto:info@uconstruction.ru" class="footer-link">info@uconstruction.ru </a>
              <a href="tel:+74957928939" class="footer-link">+7 (495) 792-89-39</a>
            </div>
          </div>
        </div>
        <a id="inline" class="footer-feedback" href="#contact_form_pop">Заказать обратный звонок</a>
      </div>
    </footer>
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
		Yii::app()->getClientScript()->registerPackage('fancyBox');
        echo Setting::getParam("google_analytics");
        ?>

    <script src="<?php echo $this->themeJs; ?>libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?php echo $this->themeJs; ?>libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $this->themeJs; ?>main.js"></script>
<?php echo $this->renderPartial('//layouts/modals'); ?>
  </body>
</html>