<?php
    echo '<a href="/product/'.$data->tv_sef.'">';
    if ( $data->media ) {
        foreach ($data->media as $img) {
            $img_url = $img->getMediaUrl(); //URL картинки
            $img_name = $img->i_name; //Название изображения
//            $imgID = $img->iid;
            $img_alt = $img->i_alt; //альт. текст
//                        Yii::log('IMG URL: '.var_export($img_url,true));
//                        Yii::log('IMG NAME: '.var_export($img_name,true));
            echo '<img style="height:154px; width:205px;" src="'.$img_url.'" alt="'.$img_alt.'"/>';
            break;
        }
     } else {
         $image = '';
     }
         
    ?>
<br/>
<span class="title"><?php echo $data->tv_name; ?></span>
<br/>
<?php
$atributes = $data->category->attribute;
if ($atributes) {
    foreach ($atributes as $atribute){
        if ($atribute->inFilter == 1) {
            $text = $data->textAttribute($atribute->soaid);
                if ($text)
                    echo $atribute->at_name.": ";
                    echo "<span>".$text."</span>";
                    echo '<br/>';
        }
    }
}
?>
<span>Под ключ:</span>
<span><?php echo $data->tv_cena; ?> руб</span>
</a>
