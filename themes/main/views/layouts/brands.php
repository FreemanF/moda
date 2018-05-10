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
        <div class="b-section__container b-main">
            <div class="b-main__inner">
                <h1 class="b-title b-brands__header">Брендовые вещи</h1>
                <div class="b-unstyled">
                    <p>Выбирайте женскую одежду по брендам! В нашем каталоге более 800 известных брендов, отсортированных по алфавиту. Тут можно встретить как вещи из новых коллекций люкс брендов, так и недорогой масс-маркет. Все вещи уже в Украине с доставкой в ваш город. Экономьте до 90% от цены вещи на официальном сайте!</p>
                </div>
                <h2 class="b-title b-brands__header">Каталог брендов в Modnekublo</h2>
                <div class="b-main__block">
<!--                    
                    <div class="b-desktop-only">
                        <div class="b-section b-section_bg_brands">
                            <div class="b-section__container">
                                <ul class="b-brands">
                                    <li class="b-brands__item_small">
                                            <a href="/women/brand-reserved" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0031_reserved.png" alt="Reserved"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-tommy-hilfiger" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0042_tommy_hilfiger.png" alt="Tommy Hilfiger"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-stradivarius" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0034_stradivarius.png" alt="Stradivarius"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-victorias-secret" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0039_vs.png" alt="Victoria&#39;s Secret"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-dorothy-perkins" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0014_dorothy_perkins.png" alt="Dorothy Perkins"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-next" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0026_next.png" alt="Next"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-george" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0019_george.png" alt="George"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-terranova" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0036_terranova.png" alt="Terranova"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-centro" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0009_centro.png" alt="Centro"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-zara" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0041_zara.png" alt="ZARA"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-other-stories" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0000_otherstories.png" alt="&amp; Other Stories"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-asos" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0005_asos.png" alt="ASOS"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-atmosphere" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0006_atmosphere_9LIVnGs.png" alt="Atmosphere"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-amisu" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0004_amisu.png" alt="AMISU"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-denim-co" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0013_denim_co.png" alt="Denim Co"/>
                                            </a>
                                        </li><li class="b-brands__item_small">
                                            <a href="/women/brand-mango" class="b-brands__link">
                                                <img class="b-brands__img" src="/uploads/brands/brand_0023_mango.png" alt="Mango"/>
                                            </a>
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="b-section">
                        <div class="b-section__container">
						<?php
							echo $content;
						?>
                            

                        </div>
                    </div>
                </div>
                <div class="b-unstyled">
                    <h2>Брендовая женская одежда в интернет магазине Modnekublo</h2>

                    <p>Брендовая одежда &ndash; это не всегда дорого. В разнообразии моделей известных марок&nbsp; достаточно вещей по вполне демократичным ценам. Такая одежда относится к категории масс-маркет брендов и рассчитана на покупательниц со средним уровнем достатка. Практически в каждом городе сегодня можно встретить магазин одежды известных марок. Если его нет в вашем городе, вы можете посетить интернет магазин и купить брендовую женскую одежду онлайн.</p>

                    <p>В каталог&nbsp; Modnekublo ежедневно добавляются тысячи новинок самой актуальной женской одежды. Самая востребованная категория &ndash; женская брендовая одежда. Украина, Польша, Испания, Италия, Франция, Германия&nbsp; - именно в этих странах сосредоточены производители стильной брендовой одежды. Каждый из брендов минимум два раза в год предоставляет новые коллекции, которые определяют основные тренды будущих сезонов.</p>

                    <p>Еще одной особенностью одежды известных марок является пошив вещей по специальным дизайнерским лекалам. Поэтому такие предметы гардероба проще подобрать по фигуре, особенно, если речь идет о моделях больших размеров.&nbsp;</p>

                    <h3>Разнообразие брендовой женской одежды</h3>

                    <p>К самым популярным направлениям брендовой одежды можно отнести следующие:</p>

                    <h4>Классическая одежда</h4>

                    <p>Это самое консервативное направление. Такая одежда отличается простыми линиями, лаконичным кроем и сдержанными оттенками. Это идеальный вариант для офиса со строгим дресс-кодом. Длина, ширина или объем моделей всегда средние.&nbsp; Яркие акценты или декор отсутствуют.</p>

                    <h4>Одежда в стиле кэжуал</h4>

                    <p>Casual &ndash; один из самых известных и распространенных направлений повседневной женской одеждой. Магазины брендовой женской одежды в Украине чаще всего представляют именно эту категорию. Основными требованиями к моделям в стиле кэжуал являются простота и комфорт, которые очень важны в повседневной носке.</p>

                    <h4>Романтический стиль</h4>

                    <p>Такое направление призвано воздать утонченный романтичный женский образ. Рюши, воланы, воздушный крой &ndash; обязательные атрибуты одежды в романтическом стиле. Длинные развивающиеся платья, летящие шифоновые юбки и романтичные шляпки &ndash; самые узнаваемые представители этого модного направления.</p>

                    <h4>Спортивная одежда</h4>

                    <p>Одежда, которая не стесняет движений, свободная и уютная. Она подходит не только для занятий спортом и интенсивных тренировок, но и для активного отдыха на свежем воздухе или прогулок. Цветовая гамма может быть самой разнообразной: от черно-белой классики до ярких кислотных оттенков.</p>

                    <h3>Самые востребованные бренды женской одежды</h3>

                    <p>Последние несколько лет на пике популярности находятся бренды группы компаний Inditex Group.</p>

                    <p>К ним относятся: Zara, Pull and Bear, Oysho, Stradivarius, Bershka, Massimo Dutti и другие.</p>

                    <p>Одежда этих испанских брендов отличается актуальностью, узнаваемым кроем и демократичными ценами.</p>

                    <p>Особенностью брендов являются сроки, по которым новые коллекции проходят путь от дизайна до процесса продажи &ndash; 2-4 недели.</p>

                    <p>Не менее популярными являются скандинавские марки женской одежды. Самой востребованной среди них, безусловно, является&nbsp; H&amp;M. Hennes &amp; Mauritz &ndash; это демократичный бренд, выпускающий стильную женскую &nbsp;одежду, обувь, нижнее белье, косметику, домашний текстиль.</p>

                    <p>Компания активно принимает участие в акциях, которые посвящены проблемам экологии. С 2012 года производятся специальные коллекции моделей из отходов производства и органического хлопка.</p>

                    <h3>Где в Киеве и Украине недорого купить брендовую женскую одежду</h3>

                    <p>Интернет магазин Шафа &ndash; это одна из самых популярных и быстро развивающихся торговых площадок по продаже женской одежды, обуви и аксессуаров. Лучшие продавцы Киева и всей Украины успешно продают здесь свою одежду. У вас есть возможность купить вещь прямо у хозяйки, которая ответит на все ваши вопросы и сделает дополнительные фото или замеры. Можно договориться о личной встрече или воспользоваться услугами удобной вам транспортной компании, чтобы доставить заказ в любой уголок Украины.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="b-section b-section_bg_footer">
        <footer class="b-section__container">
            <div class="b-footer b-section__vertical-indent">
    <div class="b-footer-info">
        <p class="b-footer-info__copyright">&copy; 2017 <a href="/" class="b-footer-info__link">fontez.com</a>
            <span class="b-footer-info__text">Модная женская одежда и аксессуары по доступной цене. Все права защищены</span>
        </p>
        <ul class="b-footer-info__list b-footer-list">
            <li class="b-footer-list__item">
                <a class="b-footer-list__link"
                   href="http://blog.fontez.com/">Наш блог</a>
            </li>
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
                   href="https://plus.google.com/108317175350006940956">Мы в Google+</a>
            </li>
        </ul>
    </div>
</div>
        <div class="fontez" style="display: none;">
        <p>Developed by <a href="https://vk.com/fontez">FonteZ</a></p>
    </div>
    </div>

<script>
    window.staticUrl = '<?php echo $this->themeCss; ?>/assets/';
    window.spriteUrl = '<?php echo $this->themeCss; ?>/assets/sprites/defs/svg/sprite.defs.svg?v=4';
</script>


<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>
    <script>
    $(document).ready(function() {
        //$('.dropdown-toggle').dropdown();
        $(".js-catalog-menu").on("click",function(e){
            $(".js-catalog-menu").each(function(){
                $(this).removeClass("b-nav__item_state_opened");
            });
        });
    });
    </script>

</body>
</html>