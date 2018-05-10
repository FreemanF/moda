<?php
    echo '
        <h1>'.$this->model->g_name.'</h1>
        <div align="center">
            <div class="highslide-gallery">';
    if ( $this->model->media )
        foreach ($this->model->media as $media)
            echo '
                <a href="'.$media->getMediaUrl('800-s').'" class="highslide" onclick="return hs.expand(this)">'.
                    $media->getMediaForm('200-s-crop').'
                </a>&nbsp;
                <div class="highslide-caption">'.$media->i_name.'</div>';
    echo '
            </div>
        </div>';