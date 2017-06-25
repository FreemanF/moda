<?php
    echo '<a href="'.$data->tv_sef.'">';
    if ( $data->media ) {
        $media = $settings->media;
        $image = CHtml::image($media->getMediaUrl()
                ,$media->i_alt
                ,array('title'=>$media->i_name,
            //                   'width'=>'150',
            //                   'height'=>'100')
                            ));
     } else {
         $image = '';
     }
         echo $image;
    ?>
<br/>
<span class="title"><?php echo $data->tv_name; ?></span>
<br/>
<span class="price"></span>
</a>
