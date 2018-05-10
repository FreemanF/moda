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
                    <div class="b-threads__head">
                        <div class="b-threads__head-section">
                            <h2 class="b-threads__header">
                                Мои сообщения
                            </h2>
                            <a class="b-threads__archive-link" href="/msg/archive" style="display: none;">Архив</a>
                        </div>
                        <div class="b-threads__head-section" style="display: none;">
                            <div class="b-threads__sorting">
                                Показывать:
                                <span class="b-sort">
                                    <select class="b-sort__select js-sort-select" name="sorting" data-qs="">
                                        <option value="1" selected>
                                            все
                                        </option>
                                        <option value="2" >
                                            непрочитанные
                                        </option>
                                        <option value="3" >
                                            избранные
                                        </option>
                                    </select>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="b-threads b-block">
                        
                        
                    <?php 
                        //echo $this->renderPartial('//layouts/breadcrumbs');

                        $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$this->dataProvider,
                            'itemView'=>'_list',
                            'template'=>"{items}{pager}",
                    //        'pager' => array('class' => ''),
                            'ajaxUpdate' => false,
                        ));
                    ?>
<!--                        
                            <div class="b-threads__item js-link"
                                 data-href="/msg/29476342">
                                <div class="b-threads__image-wrapper">
                                    <a class="b-threads__image-link js-link"
                                       data-href="/m/438649"
                                       href="/m/438649">
                                        <img alt="mr.fontez"
                                             title="mr.fontez"
                                             class="b-threads__image"
                                             src="https://avatars.shafastatic.net/438649?1495798709"/>
                                    </a>
                                    
                                </div>
                                <div class="b-threads__info">
                                    <time class="b-threads__time"
                                          datetime="2017-05-26T14:39:53.117465+03:00"
                                          title="26 мая 2017, 14:39" autoextractnumbers="0">
                                        26 мая
                                    </time>
                                    <a class="b-threads__link js-link"
                                       data-href="/m/438649"
                                       href="/m/438649">
                                        mr.fontez
                                    </a>

                                    <div class="b-threads__title-wrapper">
                                        <div class="b-threads__actions">
                                            <div class="b-desktop-only b-desktop-only__inline-block">
                                                <form action="/msg/29476342/toggle-importance" method="post" id="tif-29476342" class="b-threads__form">
                                                    <input type="hidden" name="csrfmiddlewaretoken" value="S9g1yAjZNqFAh8oQdKNaKFLLB32TFytkVK6FtjUBSOksuwo8YKvYwEPHPwkr3ZGw" />
                                                    <button class="b-threads__action js-thread-action" data-form-id="tif-29476342" title="Добавить в избранное">
                                                        <svg class="b-threads__icon b-threads__icon-heart2" viewBox="0 0 22 22">
                                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 xlink:href="/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--heart2"></use>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            <form action="/msg/29476342/delete" method="post" id="df-29476342" class="b-threads__form">
                                                <input type="hidden" name="csrfmiddlewaretoken" value="bkIphZH4JUuLOPFEdr3XnDRbdTIqYy8CeVy3cIiGOi9D1dFWYrLL9CV7rm0YmZlO" />
                                                <button class="b-threads__action js-thread-action" type="submit" title="В архив" data-form-id="df-29476342">
                                                    <svg class="b-threads__icon b-threads__icon-trashbin">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             xlink:href="/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--trash-o"></use>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <a class="b-threads__title"
                                           href="/msg/29476342">
                                            111
                                        </a>
                                    </div>

                                    <div class="b-threads__text">
                                        
                                        123
                                    </div>
                                </div>
                            </div>
                        
<div class="b-threads__item js-link"
                                 data-href="/msg/29476342">
                                <div class="b-threads__image-wrapper">
                                    <a class="b-threads__image-link js-link"
                                       data-href="/m/438649"
                                       href="/m/438649">
                                        <img alt="mr.fontez"
                                             title="mr.fontez"
                                             class="b-threads__image"
                                             src="https://avatars.shafastatic.net/438649?1495798709"/>
                                    </a>
                                    
                                </div>
                                <div class="b-threads__info">
                                    <time class="b-threads__time"
                                          datetime="2017-05-26T14:39:53.117465+03:00"
                                          title="26 мая 2017, 14:39" autoextractnumbers="0">
                                        26 мая
                                    </time>
                                    <a class="b-threads__link js-link"
                                       data-href="/m/438649"
                                       href="/m/438649">
                                        mr.fontez
                                    </a>

                                    <div class="b-threads__title-wrapper">
                                        <div class="b-threads__actions">
                                            <div class="b-desktop-only b-desktop-only__inline-block">
                                                <form action="/msg/29476342/toggle-importance" method="post" id="tif-29476342" class="b-threads__form">
                                                    <input type="hidden" name="csrfmiddlewaretoken" value="S9g1yAjZNqFAh8oQdKNaKFLLB32TFytkVK6FtjUBSOksuwo8YKvYwEPHPwkr3ZGw" />
                                                    <button class="b-threads__action js-thread-action" data-form-id="tif-29476342" title="Добавить в избранное">
                                                        <svg class="b-threads__icon b-threads__icon-heart2" viewBox="0 0 22 22">
                                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 xlink:href="/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--heart2"></use>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            <form action="/msg/29476342/delete" method="post" id="df-29476342" class="b-threads__form">
                                                <input type="hidden" name="csrfmiddlewaretoken" value="bkIphZH4JUuLOPFEdr3XnDRbdTIqYy8CeVy3cIiGOi9D1dFWYrLL9CV7rm0YmZlO" />
                                                <button class="b-threads__action js-thread-action" type="submit" title="В архив" data-form-id="df-29476342">
                                                    <svg class="b-threads__icon b-threads__icon-trashbin">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             xlink:href="/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--trash-o"></use>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <a class="b-threads__title"
                                           href="/msg/29476342">
                                            111
                                        </a>
                                    </div>

                                    <div class="b-threads__text">
                                        
                                        123
                                    </div>
                                </div>
                            </div>
                        -->
                        </div>

                    <div class="b-pagination">
                        <ul class="b-pagination__list">
                            
                            
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <aside class="b-main__aside">
            <div class="b-main__inner">
                &nbsp;
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
                <a class="b-footer-list__link" rel="nofollow"
                   href="/page/rabota-v-shafe">Работа</a>
            </li>
            <li class="b-footer-list__item">
                <a class="b-footer-list__link"
                   href="http://blog.shafa.ua/">Наш блог</a>
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
        </footer>
    </div>

<script>
    window.staticUrl = '<?php echo $this->themeCss; ?>/assets/';
    window.spriteUrl = '/sprites/defs/svg/sprite.defs.svg?v=4';
</script>


<script defer src="<?php echo $this->themeCss; ?>assets/build/shared.js"></script>
<script defer src="<?php echo $this->themeCss; ?>assets/build/global.js"></script>

<script defer src="/assets/build/messages.js"></script>


</body>
</html>