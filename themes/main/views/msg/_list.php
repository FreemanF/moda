<?php
/*    echo '
        <a href="'.$data->ownerUrl.'">'.$data->n_name.'</a>
        <p>'.Comportable::str_date_format($data->dt_start, 'd.m.Y').'</p>'.
        $data->mediaFormByCrop('110-s-crop', array('style'=>'width: 110px;'), '110-85-m').'
        <p>'.Comportable::html_mb_substr($data->content_long, 0, 200).'</p>';*/
    ?>
    <?php
    $unreaded_msgs = Messages::model()->findAllByAttributes(
            array(
                'ms_dlg'=>$data->dlid,
                'ms_recipient'=>Yii::app()->user->id,
                'ms_readed'=>0
                )
            );
    if (!empty($unreaded_msgs)){
        $class_active = "b-threads__item_state_unread";
    } else {
        $class_active = "";
    }
    ?>
                            <div class="b-threads__item js-link <?php echo $class_active; ?>"
                                 data-href="/msg/<?php echo $data->dlid; ?>">
                                <div class="b-threads__image-wrapper">
                                    <a class="b-threads__image-link js-link"
                                       data-href="/m/<?php echo $data->dlid; ?>"
                                       href="/m/<?php echo $data->dlid; ?>">
                                        <img alt="<?php echo $data->user->us_name; ?>"
                                             title="<?php echo $data->user->us_name; ?>"
                                             class="b-threads__image"
                                             src="https://image.flaticon.com/icons/png/128/145/145845.png"/>
                                    </a>
                                    
                                </div>
                                <div class="b-threads__info">
                                    <time class="b-threads__time"
                                          datetime="<?php echo $data->dt_start; ?>"
                                          title="<?php echo Comportable::str_date_format($data->dt_start, 'd.m.Y'); ?>" autoextractnumbers="0">
                                        <?php echo Comportable::str_date_format($data->dt_start, 'd.m.Y'); ?>
                                    </time>
                                    <a class="b-threads__link js-link"
                                       data-href="/m/438649"
                                       href="/m/438649">
                                        <?php echo $data->user->us_name; ?>
                                    </a>

                                    <div class="b-threads__title-wrapper">
                                        <div class="b-threads__actions" style="display:none;">
                                            <div class="b-desktop-only b-desktop-only__inline-block">
                                                <form action="/msg/<?php echo $data->dlid; ?>/toggle-importance" method="post" id="tif-29476342" class="b-threads__form">
                                                    <input type="hidden" name="csrfmiddlewaretoken" value="S9g1yAjZNqFAh8oQdKNaKFLLB32TFytkVK6FtjUBSOksuwo8YKvYwEPHPwkr3ZGw" />
                                                    <button class="b-threads__action js-thread-action" data-form-id="<?php echo $data->dlid; ?>" title="Добавить в избранное">
                                                        <svg class="b-threads__icon b-threads__icon-heart2" viewBox="0 0 22 22">
                                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 xlink:href="/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--heart2"></use>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            <form action="/msg/<?php echo $data->dlid; ?>/delete" method="post" id="<?php echo $data->dlid; ?>" class="b-threads__form">
                                                <input type="hidden" name="csrfmiddlewaretoken" value="bkIphZH4JUuLOPFEdr3XnDRbdTIqYy8CeVy3cIiGOi9D1dFWYrLL9CV7rm0YmZlO" />
                                                <button class="b-threads__action js-thread-action" type="submit" title="В архив" data-form-id="<?php echo $data->dlid; ?>">
                                                    <svg class="b-threads__icon b-threads__icon-trashbin">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             xlink:href="/sprites//defs/svg/sprite.defs.svg?v=4#static--svg--trash-o"></use>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <a class="b-threads__title"
                                           href="/msg/<?php echo $data->dlid; ?>">
                                            Товар: <?php echo $data->product->pd_name; ?>
                                        </a>
                                    </div>

                                    <div class="b-threads__text">
                                        <?php
                                        echo $data->product->user->us_name;
                                        ?>
                                    </div>
                                </div>
                            </div>