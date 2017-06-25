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
            <div class="col-md-2">
              <a href="/howitwork" class="header-link active">
                <span>Как</span>это работает
              </a>
            </div>
            <div class="col-md-2">
              <a href="#" class="header-link">
                <span>Кто</span>мы такие
              </a>
            </div>
            <div class="col-md-2">
              <a href="#" class="header-link">
                <span>Результаты</span>работы
              </a>
            </div>
            <div class="col-md-3">
              <div class="header-contact-wrap">
                <a class="header-phone" href="tel:+74957928939">+7 (495) 792-89-39</a>
                <a href="#" class="header-button"><span>Перезвоните мне</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
  <div class="header-content">
    <div class="container">
      <div class="header-content-wrap">
        <div class="header-side-link-wrap left">
          <a href="#" class="header-side-link ">как это работает</a>
        </div>
        <div class="header-side-link-wrap right">
          <a href="#" class="header-side-link ">under construction</a>
        </div>
        <div class="header-content-inner">
          <h1 class="page-title child">
            Как это работает
          </h1>
          <p class="header-text child">
            Fit-Out: организация коммерческого пространства <span>"под ключ"</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="important-work">
  <div class="container">
    <h2 class="title">Множество важных работ</h2>
    <div class="important-work-list">
      <div class="important-work-row one">
        <h3 data-number="01" class="important-work-title for-three">
          <span>Проектирование</span>
        </h3>
        <h3 data-number="02" class="important-work-title for-three">
          <span>Строительство</span>
        </h3>
        <h3 data-number="03" class="important-work-title for-three">
          <span>Внутренняя отделка</span>
        </h3>
      </div>
      <div class="important-work-row">
        <h3 data-number="04" class="important-work-title for-two">
          <span>Инженерное оснащение</span>
        </h3>
        <h3 data-number="05" class="important-work-title for-two">
          <span>Введение в эксплуатацию</span>
        </h3>
      </div>
    </div>
    <span class="important-work-screaming">и только одна ответственная компания</span>
  </div>
</div>
<div class="cooperation-format">
  <div class="container">
    <h2 class="title">формат сотрудничества</h2>
    <span class="sub-title">зависит от потребностей проекта</span>
    <div class="cooperation-format-list">
      <article class="cooperation-format-item">
        <h3 class="cooperation-format-title">
          Строительство
        </h3>
        <p class="cooperation-format-text">
          У вас есть готовая рабочая документация. Мы оказываем строительные услуги: строительно-монтажные и отделочные работы.
        </p>
        <a href="#" class="button black">Узнать больше</a>
      </article>
      <article class="cooperation-format-item general">
        <h3 class="cooperation-format-title">
          Генеральные подрядные работы
        </h3>
        <p class="cooperation-format-text">
          Вы ни о чем не беспокоитесь. <br> Мы занимаемся проектом на всех этапах: от проектирования и строительства до сдачи готового помещения и введения объекта в эксплуатацию согласно всем нормам.
        </p>
        <span class="cooperation-format-note">Иначе это называется Fit-out.</span>
        <a href="#" class="button">Узнать больше</a>
      </article>
      <article class="cooperation-format-item">
        <h3 class="cooperation-format-title">
          Проектирование
        </h3>
        <p class="cooperation-format-text">
          Вы высказываете технические требования <br> к помещению (количество кабинетов, мест, переговорных и т.п) и ищете строителей. <br> Мы проектируем архитектуру, дизайн и инженерные системы.
        </p>
        <a href="#" class="button black">Узнать больше</a>
      </article>
    </div>
  </div>
</div>
<section class="work-options">
  <div class="container">
    <h2 class="title">Варианты работы по системе Fit-out</h2>
    <div class="row work-options-table">
      <div class="col-md-6 work-options-table-cell">
        <article class="work-options-item dark">
          <h3 class="work-options-title">Design&Build</h3>
          <p class="work-options-text">
            Вы доверяете проектирование и стрительство компании Under Construction. Работы начинаются сразу после согласования тестовой посадки (test fit). Далее идет поэтапное утверждение.
          </p>
          <p class="work-options-attention">
            <span>Сдача объекта происходит в 1,9 раза быстрее,</span> чем при обычной схеме работы "сначала проект - потом строительство".
          </p>
        </article>
      </div>
      <div class="col-md-6 work-options-table-cell">
        <article class="work-options-item light">
          <h3 class="work-options-title">Design&Build</h3>
          <p class="work-options-text">
            Вы доверяете проектирование и стрительство компании Under Construction. Работы начинаются сразу после согласования тестовой посадки (test fit). Далее идет поэтапное утверждение.
          </p>
        </article>
      </div
    </div>
  </div>
</section>
<section class="step-for-ideal">
  <div class="container">
    <h2 class="title">Всего 4 шага на пути к идеальному рабочему пространству</h2>
    <span class="sub-title">Практически без усилий с вашей стороны</span>
    <article class="step-for-ideal-item left i1">
      <div class="row">
        <div class="col-md-6 step-for-ideal-for-line-left">
          <h3 data-number="01" class="step-for-ideal-title">Подготовка</h3>
          <ul class="step-for-ideal-list">
            <li>Изучаем потребности бизнеса и разрабатываем тестовые посадки.</li>
            <li>Подписываем договор и движемся в ускоренном темпе! В этот момент ваше помещение </li>
          </ul>
        </div>
        <div class="col-md-6">
          <div class="step-for-ideal-description">
            <p class="step-for-ideal-top">
              Одно из ключевых требований к коммерческим пространствам: легкая адаптивность.
            </p>
            <p class="step-for-ideal-bottom">
              Мы продумываем этот момент ещё на этапе подготовки. Вы получаете офис, в котором можно безболезненно варьировать количество рабочих мест.
            </p>
          </div>
        </div>
      </div>
    </article>
    <article class="step-for-ideal-item right i2">
      <div class="row">
        <div class="col-md-6 col-md-push-6 step-for-ideal-for-line-right">
          <h3 data-number="02" class="step-for-ideal-title">Проектирование</h3>
          <ul class="step-for-ideal-list">
            <li>Создаем индивидуальный концепт под стать вашему бизнесу.</li>
            <li>Разрабатываем проект архитектуры, дизайна и инженерных систем. Подбираем материалы. </li>
          </ul>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <div class="step-for-ideal-description">
            <p class="step-for-ideal-top">
              Когда все работы по проекту выполняет один подрядчик - это не только экономия энергии, но и сохранение бюджета.
            </p>
            <p class="step-for-ideal-bottom">
              Мы умеем эффективно оптимизировать расходы и ведем открытую финансовую политику.
            </p>
          </div>
        </div>
      </div>
    </article>
    <article class="step-for-ideal-item left i3">
      <div class="row">
        <div class="col-md-6 step-for-ideal-for-line-right">
          <h3 data-number="03" class="step-for-ideal-title">Строительство</h3>
          <ul class="step-for-ideal-list">
            <li>Строительные и инженерные работы. Команда трудится 23/7.</li>
            <li>Внутренний контроль качества выполненных работ.</li>
          </ul>
        </div>
        <div class="col-md-6">
          <div class="step-for-ideal-description">
            <p class="step-for-ideal-top">
              Контролируйте качество и скорость работ над проектом из любой точки мира:
            </p>
            <p class="step-for-ideal-bottom">
              на объекте установлены камеры видеонаблюдения и подключен круглосуточный удаленный доступ.
            </p>
          </div>
        </div>
      </div>
    </article>
    <article class="step-for-ideal-item center">
      <h3 data-number="04" class="step-for-ideal-title">Сдача работ</h3>
    </article>
    <div class="row">
      <div class="col-sm-4">
        <article class="step-for-ideal-final-item i1">
          <h3 class="step-for-ideal-final-title">Безупречный клининг</h3>
          <p class="step-for-ideal-final-text">
            Такой, что на следующий день сможете смело принимать клиентов в переговорной
          </p>
        </article>
      </div>
      <div class="col-sm-4">
        <article class="step-for-ideal-final-item i2">
          <h3 class="step-for-ideal-final-title">Передача исполнительной документации</h3>
          <p class="step-for-ideal-final-text">
            Введение объекта в эксплуатацию.
          </p>
        </article>
      </div>
      <div class="col-sm-4">
        <article class="step-for-ideal-final-item i3">
          <h3 class="step-for-ideal-final-title">Прием выполненных работ</h3>
          <p class="step-for-ideal-final-text">
            Вы останетесь довольны!
          </p>
        </article>
      </div>
    </div>
  </div>
  <div class="step-for-ideal-result">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-push-2">
          <div class="step-for-ideal-result-item">
            <h3 class="step-for-ideal-result-title">
              В результате получаем <br> технологичное помещение безупречного качества
            </h3>
            <p class="step-for-ideal-result-text">
              Именно это пространство отражает имидж вашего бизнеса
            </p>
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
    <form action="#" class="consultation-form">
      <div class="row">
        <div class="col-lg-4 col-sm-6 col-lg-push-2">
          <input class="input-text" type="text" name="name" placeholder="Введите Ваше имя">
        </div>
        <div class="col-lg-4 col-sm-6 col-lg-push-2">
          <input class="input-text" type="tel" name="phone" placeholder="Введите контактный телефон">
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
              <li><a href="#">Как это работает</a></li>
              <li><a href="#">Кто мы такие</a></li>
              <li><a href="#">Результаты работы</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-lg-offset-1 col-md-4">
            <div class="footer-contact-wrap">
              <a href="mailto:info@uconstruction.ru" class="footer-link">info@uconstruction.ru </a>
              <a href="tel:+74957928939" class="footer-link">+7 (495) 792-89-39</a>
            </div>
          </div>
        </div>
        <a class="footer-feedback" href="#">Заказать обратный звонок</a>
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

        echo Setting::getParam("google_analytics");
        ?>

    <script src="<?php echo $this->themeJs; ?>libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?php echo $this->themeJs; ?>libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $this->themeJs; ?>main.js"></script>
  </body>
</html>