<?php
//    echo '
//        <p>'.$data->n_name.'</p>
//        <p>'.$data->n_sef.'</p>
//        <p>'.Comportable::str_date_format($data->dt_start, 'd.m.Y').'</p>'.
//        $data->mediaForm('85-s-crop', array('class'=> 'picturePost','style'=>'width: 85px;'), '85-85-m').'
//        <p>'.$data->content_cut().'</p>';
?>    
<?php //echo print_r($data['size'],true); Yii::app()->end(); ?>
    <?php
        if ($data->media) {
        $media = $data->media;
        $image = $media->getMediaUrl('original');
    } else
        $image = '';
        ?>
<li class="b-catalog__item" id="b-catalog__item-5495211">
            <a class="b-catalog__link js-ga-onclick2 b-catalog__link_type_small" href="<?php echo Yii::app()->request->getBaseUrl(true).'/product/'.$data->category->parent->c_sef.'/'.$data->category->c_sef.'/'.$data->pd_sef;?>" data-event-action="Open from TOP category" data-event-category="Open" data-event-label="3" data-id="<?php echo $data->pdid; ?>" title="<?php echo $data->pd_name; ?>">
			<!--<img class="b-catalog__img js-lazy-img" src="/assets/_profiles_f_fr_fre_freeman4_test-pro.adr.com.ua_themes_main_assets1496602619/css//assets/img/image-placeholder.png" title="Норковая шуба-трансформер" alt="Норковая шуба-трансформер" data-placeholder="/assets/_profiles_f_fr_fre_freeman4_test-pro.adr.com.ua_themes_main_assets1496602619/css//assets/img/image-placeholder.png" data-src="/image-thumbs/19784927_310_430">-->
			<?php // echo $data->mediaForm('origin', array('class'=> 'b-catalog__img js-lazy-img'), '310-430-m'); ?>
                <img class="b-catalog__img js-lazy-img" src="<?php echo $image; ?>" style="min-height: 245px;"/>
        <noscript>
            <?php echo $data->mediaForm('origin', array('class'=> ''), '310-430-m'); ?>
        </noscript>

        

        <span class="b-catalog__details">
            <?php echo $data->pd_name; ?>
            <span class="b-catalog__details_city">Одесса</span>
        </span>

        <span class="b-catalog__size">
                <span class="b-size">
                    <span class="b-size__item"><?php echo $data['size']['sz_name'].'/'.$data['size']['sz_universal'].'/'.$data['size']['sz_american']; ?></span>
                </span>
            </span>

        <span class="b-catalog__info b-catalog__info_promoted2">
            

            

            <span class="b-catalog__price">
                    <?php echo $data->pd_price; ?>
                    <span class="b-catalog__currency">грн</span>
                </span>

        </span>
    </a>
    
    <div class="b-catalog__footer b-catalog__footer_type_seller_admin">
        <div class="b-catalog__title b-catalog__title_type_centered" data-content="Шикарный сарафан" data-content-small-650="Шикарный сарафан" data-content-medium="Шикарный сарафан"></div>


          <a href="https://modnekublo.com.ua/items/7439804/promote" class="b-button-bordered b-button-bordered_type_catalog b-catalog__button" data-text="Рекламировать" data-text-active="" data-event-action="All products promote click" data-event-category="Activities" data-event-label="">
              <svg class="b-button-bordered__icon">
                  <use xlink="http://www.w3.org/1999/xlink" xlink:href="#static--svg--arrow-up-thick"></use>
              </svg>
          </a>
    </div>           
        </li>