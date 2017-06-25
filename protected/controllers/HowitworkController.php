<?php

class HowitworkController extends MetaController
{
	public $layout         = '//layouts/how_it';
    const onPage = 10;
	public $how_model;
    
    public function actionIndex(){
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'        => 'howitwork',
            'is_published' => 1,
            'is_delete'    => 0
        ));
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
            
        $this->breadcrumbs[] = 'Как это работает';
        
        $this->initAdminPanel();
        $this->adminPanelAddUrl = '/admin/';
        $this->pushModelMeta();
            
		$this->how_model = How::model()->with('media')->findByAttributes(array(
            'hwid'        => 1
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