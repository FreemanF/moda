<?php
    echo $this->renderPartial('//layouts/breadcrumbs');
    
    echo '
        <p>'.$this->model->n_name.'</p>
        <p>'.Comportable::str_date_format($this->model->dt_start, 'd.m.Y').'</p>'.
        $this->model->mediaFormByCrop('110-s-crop', array('style'=>'width: 110px;'), '110-85-m').
        $this->model->contentLong;