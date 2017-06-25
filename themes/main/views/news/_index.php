<?php
    echo '
        <a href="'.$data->ownerUrl.'">'.$data->n_name.'</a>
        <p>'.Comportable::str_date_format($data->dt_start, 'd.m.Y').'</p>'.
        $data->mediaFormByCrop('110-s-crop', array('style'=>'width: 110px;'), '110-85-m').'
        <p>'.Comportable::html_mb_substr($data->content_long, 0, 200).'</p>';