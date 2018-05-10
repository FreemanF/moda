<?php

class PagesController extends MetaController{
    
    private $params;
    private $Controller;
    
    public function actionIndex(){
        if (Yii::app()->theme->name == Yii::app()->params["themeBackEnd"]) {
            // reset убрали из Controller::initTheme чтобы работали скрипты
            // добавляемые из preload'ed модулей, например debug
            Yii::app()->clientScript->reset();
            $this->initTheme(Yii::app()->params["themeFrontEnd"]);
        }
        $this->params = array_filter(explode('/', Yii::app()->request->url));
        $this->Controller = array_shift($this->params);
        if(trim($this->Controller)!=""){
            $this->model = Page::model()->with('meta')->findByAttributes(array(
                'p_sef'=>$this->Controller,
                'is_published'=>1,
                'is_delete'=>0));
            if($this->model===NULL || !Comportable::pubDate($this->model->dt_start) ){
                if($error=Yii::app()->errorHandler->error) {
                    if (Maintanance::$active) {
                        Yii::log('forward Maintanance');
                        $this->forward(array_shift(Maintanance::$route));
                    }
                    $this->render('error',array('error' => $error));
                }
            }else{
                header("HTTP/1.0 200 OK");
                // для привязки рекламы
                $this->_actionName = $this->Controller;
                $this->noindex  = $this->model->noindex;
                $this->nofollow = $this->model->nofollow;
                
                $this->initAdminPanel(false);
                $this->pushModelMeta();
                $this->breadcrumbs[] = $this->model->p_name;
                
                $this->render("page");
            }
        }
    }
    
    public function missingAction($actionID) 
    {
        throw new CHttpException(404,Yii::app()->params['error404']);
    }
    
}