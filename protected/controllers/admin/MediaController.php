<?php

class MediaController extends CRUDController{
    
    public $layout='admin';
    
    public function filters()
    {
            return array(
                    'accessControl', // perform access control for CRUD operations
                    'postOnly + delete', // we only allow deletion via POST request
            );
    }
    
    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('index'),
                    'users'=>array('*'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('clearCachePhoto'),
                    'roles'=>array('Administrator'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }
    
    public function actionIndex() {
        $request = Yii::app()->request->pathInfo;
        $image = new Media;
        $image->cachePhoto($request);
    }
    
    public function actionClearCachePhoto(){
        $image = new Media;
        $image->ClearCachePhoto(Yii::app()->params['mediaDir']);
    }
}
