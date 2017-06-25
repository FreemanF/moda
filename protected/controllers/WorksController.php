<?php

class WorksController extends MetaController
{
	public $layout         = '//layouts/results';
	public $posts = null;
    const onPage = 10;
    
    public function actionIndex(){
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'        => 'works',
            'is_published' => 1,
            'is_delete'    => 0
        ));
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
            
        $this->breadcrumbs[] = 'Как это работает';
        
        $this->initAdminPanel();
        $this->adminPanelAddUrl = '/admin/';
        $this->pushModelMeta();
            
        $this->posts = Results::model()->findByAttributes(array('rzid'=>1));
        
        $this->render('view');
    }
    
    public function actionView($sef){
        $this->model = Projects::model()->with('media')->findByAttributes(array('pr_sef'=>$sef));
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
        
    //    $this->breadcrumbs['Новости'] = '/news';
    //    $this->breadcrumbs[] = Comportable::html_mb_substr($this->model->n_name, 0, 80);

    //    $this->initAdminPanel();
    //    $this->pushModelMeta();
        $this->layout = '//layouts/project';
        $this->render('view');
    }
    
    public function actionError(){
        throw new CHttpException(404,Yii::app()->params['error404']);
    }
	
}