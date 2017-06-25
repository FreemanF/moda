<?php


echo '<a href="'
        .$data->getMediaUrl('800-s').
        '" class="highslide" onclick="return hs.expand(this)">'.
        $data->getMediaForm('200-s-crop').'
    </a>&nbsp;
    <div class="highslide-caption">'
        .$data->i_name.
    '</div>';
