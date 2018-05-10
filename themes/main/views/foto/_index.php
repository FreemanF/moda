<?php
    echo '
        <h2><a href="/foto/'.$data->g_sef.'">'.$data->g_name.'</a></h2>
        <p>'.$data->short_content.'</p>';
    if ( $data->media ) {
        echo '<div align="center">';
        foreach ($data->media as $key=>$media){
            echo '
                <a href="/foto/'.$data->g_sef.'">'.
                    $media->getMediaForm('200-s-crop', array('height'=>'150')).'
                </a>&nbsp;';
            if ( $key>1 )
                break;
        }
        echo '</div>';
    }
