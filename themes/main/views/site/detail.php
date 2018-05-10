<h2></h2>
<h1><?php echo $this->cname; ?></h1>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
$('#img-preview img').load(function(){$(this).fadeTo(500, 1)});
$('#print').click(function(){
window.open('/print.php?project='+$('#print').attr('title'),'','width=830,resizable=yes,scrollbars=yes,status=yes');
});
});
</script>
<div id="print" title="22"></div>
<h2 style="margin-bottom: 20px"><?php echo $this->model->tv_name; ?></h2>
<div style="margin: 0 auto; width: 660px;">
    <div class="spec">
<?php
$atributes = $this->model->category->attribute;
if ($atributes) {
    foreach ($atributes as $atribute){
        echo '<div>';
        $text = $this->model->textAttribute($atribute->soaid);
        if ($text)
            echo $atribute->at_name.": ";
            echo "<span>".$text."</span>";
            echo '</div>';
    }
}
?>
        <div>
            Цена под ключ:
            <span><?php echo $this->model->tv_cena; ?> руб.</span>
        </div>
        <?php
        if ($this->model->gallery) {
            echo '<div style="padding-top: 10px;">';
            echo '<a href="/foto/'.$this->model->gallery->g_sef.'">';
            echo '<img src="'.$this->themeImages.'photo-btn.png">';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>

<div id="slideshow">
    <div id="img-preview">
    <?php
    if ( $this->model->media ) {
        foreach ($this->model->media as $img) {
            $img_url = $img->getMediaUrl(); //URL картинки
            $img_name = $img->i_name; //Название изображения
//            $imgID = $img->iid;
            $img_alt = $img->i_alt; //альт. текст
//                        Yii::log('IMG URL: '.var_export($img_url,true));
//                        Yii::log('IMG NAME: '.var_export($img_name,true));
            $image = '<img height="300" src="'.$img_url.'" alt="'.$img_alt.'"/>';
            break;
        }
     } else {
         $image = '';
     }
    ?>
        <a class="highslide" onclick="return hs.expand(this)" href="<?php echo $img_url ?>">
            <?php echo $image; ?>
        </a>
    </div>
    </div>
<h3>Фасады дома</h3>
<?php
if ($this->model->media) {
//    echo "<h3>".$this->model->gallery->g_name."</h3>";
    echo "<div id='img-thumbs'>";
    $imgs = $this->model->media;
    $count = count($imgs);
    if ($count > 1) {
        array_shift($imgs);
    }
    foreach ($imgs as $img) {
        $img_url = $img->getMediaUrl('150-113'); //URL картинки
        $img_name = $img->i_name; //Название изображения
        $imgID = $img->iid;
        $img_alt = $img->i_alt; //альт. текст
//                        Yii::log('IMG URL: '.var_export($img_url,true));
//                        Yii::log('IMG NAME: '.var_export($img_name,true));
        echo '<a class="highslide" title="'.$img_name = $img->i_name.'" onclick="return hs.expand(this)" href="'.$img->getMediaUrl().'">'
                . '<img src="'.$img_url.'" alt="'.$img_alt.'"/></a>';
    }
    echo "</div>";
}
?>
</div>
    <div id="dft">
        <h3>План</h3>
    <?php
    if ( $this->model->media2 ) {
        foreach ($this->model->media2 as $img) {
            $img_url = $img->getMediaUrl(); //URL картинки
            $img_name = $img->i_name; //Название изображения
//            $imgID = $img->iid;
            $img_alt = $img->i_alt; //альт. текст
//                        Yii::log('IMG URL: '.var_export($img_url,true));
//                        Yii::log('IMG NAME: '.var_export($img_name,true));
            $image = '<img style="display:block; margin: 0 auto;" height="330" src="'.$img_url.'" alt="'.$img_alt.'"/>';
            
            echo '<a class="highslide" title="'.$img_name = $img->i_name.'" onclick="return hs.expand(this)" href="'.$img_url.'">';
            echo '<span>';
            echo $image;
            echo '</span>';
            echo '</a>';
        }
     } else {
         $image = '';
     }
    ?>

    <?php
     echo $this->model->content_long;
    ?>
</div>