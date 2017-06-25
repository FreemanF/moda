<?php

class WhoController extends MetaController
{
	public $layout         = '//layouts/who_we';
    const onPage = 10;
	public $who_model;
    
    public function actionIndex(){
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'pid'        => 4,
            'is_published' => 1,
            'is_delete'    => 0
        ));
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
            
        $this->breadcrumbs[] = 'Как это работает';
        
        $this->initAdminPanel();
        $this->adminPanelAddUrl = '/admin/';
        $this->pushModelMeta();
            
		$this->who_model = Who::model()->with()->findByAttributes(array(
            'wid'        => 1
        ));
        
        $this->render('view');
    }
  /*  
    public function actionView($sef){
        $this->model = News::model()->with(array('meta'))->sef($sef)->find();
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
        
        $this->breadcrumbs['Новости'] = '/news';
        $this->breadcrumbs[] = Comportable::html_mb_substr($this->model->n_name, 0, 80);

        $this->initAdminPanel();
        $this->pushModelMeta();
        
        $this->render('view');
    }
    */
    public function actionError(){
        throw new CHttpException(404,Yii::app()->params['error404']);
    }
}