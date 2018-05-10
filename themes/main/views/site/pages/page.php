<?php
	if (Yii::app()->user->isGuest){
		echo $this->renderPartial('//layouts/header');
	} else {
		echo $this->renderPartial('//layouts/header_logged');
	}
?>


    
    <div class="b-section">
        <div class="b-section__container b-main b-main_state_inverse">
            <div class="b-main__content">
                <div class="b-main__inner">
                    <div class="b-main__block">
                        <div class="b-unstyled">
                            <h1><?php echo $this->model->p_name; ?></h1>
                            <?php echo $this->model->content_long; ?>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="b-main__aside">
                <div class="b-main__inner">
                    <div class="b-side-nav">
                        <h5 class="b-title b-side-nav__title">Содержание</h5>
                        
    <ul class="b-side-nav__list">
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link b-side-nav__link_state_active"
                   href="/page/kak-eto-rabotaet">
                    Как это работает
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/vhod-i-registraciya">
                    Вход и регистрация в Шафе
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-uznat-svoj-login">
                    Как узнать свой логин
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/vhod-po-loginu-i-parolyu">
                    Вход по логину и паролю
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-dobavit-vesh-v-shafu">
                    Как добавить вещь в Шафу
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/zapolnyaem-kartochku-tovara">
                    Заполняем карточку товара
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-delat-zamery">
                    Как делать замеры
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/chto-takoe-novaya-vesh-ili-v-sostoyanie-novoy">
                    Что такое &#34;Новая вещь&#34; или &#34;в состояние новой&#34;
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/dobavili-vesh-chto-dalshe">
                    Добавили вещь. Что дальше?
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/chto-takoe-moderaciya-chastye-voprosy">
                    Что такое модерация? Частые вопросы
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-kupit-ponravivshuyusya-vesh">
                    Как купить понравившуюся вещь
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-proverit-nadezhnost-prodavca">
                    Как проверить надежность продавца
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-vernut-vesh-chastye-voprosy">
                    Как вернуть вещь? Частые вопросы
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-prodvinut-svoe-obyavlenie">
                    Как продвинуть свое объявление
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/usluga-top-obyavleniya">
                    Услуга &#34;ТОП объявления&#34;
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/bloki-razmesheniya-top-obyavleniy">
                    Блоки размещения ТОП объявлений
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/stoimost-razmesheniya-v-top">
                    Стоимость размещения в ТОП
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/usluga-vip-obyavleniya">
                    Услуга &#34;VIP-объявления&#34;
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/bloki-razmesheniya-vip-obyavleniy">
                    Блоки размещения VIP объявлений
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/otzyvy-v-shafe">
                    Отзывы в Шафе
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/ostavit-otzyv-o-pokupatele">
                    Оставить отзыв о покупателе
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-traktovat-otzyvy">
                    Как трактовать отзывы
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/blokirovka-i-udalenie-akkaunta">
                    Блокировка и удаление аккаунта
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/zhaloby-na-polzovatelyay-i-procedura-razbiratelstva">
                    Жалобы на пользователей и процедура разбирательства
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/raznye-voprosy">
                    Разные вопросы
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/poleznye-funkcii-dlya-prodavcov">
                    Полезные функции для продавцов
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/shablony-soobshenij">
                    Готовые ответы
                </a>
            </li>

            
        </ul>
            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/pravila-dlya-prodavcov">
                    Правила для продавцов
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/trebovaniya-k-obyavleniyam">
                    Требования к объявлениям
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/pravila-prodazhi-kosmetiki">
                    Правила продажи косметики
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/pravila-dlya-pokupatelyay">
                    Правила для покупателей
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/dlya-professionalnyh-prodavcov">
                    Для профессиональных продавцов
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/kak-sozdat-magazin">
                    Ваш магазин в Шафе
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/pakety-magazinov-v-shafe">
                    Пакеты магазинов в Шафе
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/chto-takoe-publikacii">
                    Что такое публикации
                </a>
            </li>

            
        </ul>
            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/populyarnye-rubriki-v-shafe">
                    Популярные рубрики в Шафе
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/komissionka-shafa">
                    Комиссионка Шафа
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/specialnoe-predlozhenie-dlya-prodavcov-s-aukro">
                    Специальное предложение для продавцов с Аукро
                </a>
            </li>

            
        
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/rabota-v-shafe">
                    Работа в Шафе
                </a>
            </li>

            
                <ul class="b-side-nav__list">
            <li class="b-side-nav__list-item">
                <a class="b-side-nav__link "
                   href="/page/vakansiya-kopirajtera">
                    Вакансия копирайтера
                </a>
            </li>

            
        </ul>
            
        
    </ul>

                    </div>
                </div>
            </aside>
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
                <a class="b-footer-list__link" rel="nofollow"
                   href="/page/rabota-v-shafe">Работа в Шафе</a>
            </li>
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
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
</script>


<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>


</body>
</html>