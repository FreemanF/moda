<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ElfinderController extends CController
{
    public function actions()
    {
        return array(
            'connector' => array(
                'class' => 'ext.elFinder.ElFinderConnectorAction',
                'settings' => array(
                    'id'   => 'finder',
                    'root' => Yii::getPathOfAlias('webroot') . '/storage/',
                    'URL'  => Yii::app()->baseUrl . '/storage/',
                    'rootAlias' => 'Home',
                    'mimeDetect' => 'none'
                )
            ),
        );
    }
}

