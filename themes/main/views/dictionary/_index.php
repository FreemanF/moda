<?php
    echo '
        <p style="text-align: justify;"></p>';
    echo '<p style="text-align: justify;">'
        .'<a href="/dictionary/'.$data->dc_sef.'">'
        .'<span style="color: #008000;">'
        .'<strong>'
            .'<span style="font-size:medium;">'.
            $data->dc_name
            .'</span>'
        .'</strong>'
        .'</span>'
        .'</a>'
        .'</p>';
    echo '<p style="text-align: justify;">'.$data->content_cut($length=175);
    echo '<a href="/dictionary/'.$data->dc_sef.'">Читать полностью >></a>'
         .'</p>';