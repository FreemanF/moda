<?php

class {ClassName} extends KpdMigration
{
//                                      ALIAS             //ct mn tg lg rc sc sr ix tm md st sm  ICON              Ед.число                   SEF               ед.ч. род.падеж          Мн.число                  Меню в админке
//Object::idIndex         =>array(100,':site'        ,''   , 0, 0, 0, 0, 1, 0, 0, 0, 0,  0, 0,-1, ''                , 'Главная'                , 'site'           ,''                      ,'Главная'               , 'Главная'               ),
    public $fileUpdate = array(
        'models/Object.php'=>array(
            'OBJECT-LIST'=>array(
/*KPDMFU-START-MIGRATE-OBJECT*/
                Object::idMenu => array(
                    'chars'=>array('alias', 'prefix', 'icon', 'o_sef==alias'),
                    'label'=>array('Module','Singular','Plural','genitive'),
                    'have' => array('log','module',),//'category', 'mention', 'tag', 'reclame', 'social', 'search', 'stripe', 'theme', 'stat', 'sitemap',
                    ),
/*KPDMFU-FINAL-MIGRATE-OBJECT*/
                ),
            ),
        ),
    );
    
}
