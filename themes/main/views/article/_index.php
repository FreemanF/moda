<?php
    echo '
        <p style="text-align: justify;">'
        .'<strong>'.$data->ar_name
        .'</strong>'
        .'</p>
        <p>'.$data->content_cut().'</p>';
    echo '<a href="/article/'.$data->ar_sef.'">'
         .'<span style="color: #008000;">'
         .'<strong>Читать далее</strong>'
         .'</span>'
         .'</a>';
    echo '<hr>';