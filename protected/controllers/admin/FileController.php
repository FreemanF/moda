<?php

class FileController extends CRUDController{
    
    protected $_pageTitle = 'Файловый менеджер';
    protected $actionTitles = array();
    
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
                    'roles'=>array('ModuleFile'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }
    
    public function actionIndex() {
        $this->render('index');
    }

}