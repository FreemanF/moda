<?php
    if ( !empty($this->breadcrumbs) )
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'tagName'=>'div',
            'homeLink'=>'<a href="/">Главная</a>',
            'links'=>$this->breadcrumbs,
            'activeLinkTemplate'=>'<a href="{url}">{label}</a>',
            'inactiveLinkTemplate'=>'<a>{label}</a>',
            'htmlOptions' => array('class' => ''),
            'separator'=>'',
        ));