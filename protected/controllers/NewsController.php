<?php

class NewsController extends MetaController
{
    const onPage = 10;
    
    public function actionIndex(){
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'        => 'news',
            'is_published' => 1,
            'is_delete'    => 0
        ));
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
            
        $this->breadcrumbs[] = 'Новости';
        
        $this->initAdminPanel();
        $this->adminPanelAddUrl = '/admin/news/create';
        $this->pushModelMeta();
            
        $criteria = array();
        $totalItemCount = News::model()->count($criteria);
        $this->dataProvider=new CActiveDataProvider('News',array(
            'criteria'       => $criteria,
            'totalItemCount' => $totalItemCount,
            'pagination'     =>array(
                //Количество отзывов на страницу
                'pageSize'=> self::onPage,
                'pageVar'=>'page',
            ),
        ));
        
        $this->render('index');
    }
    
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
    
    public function actionError(){
        throw new CHttpException(404,Yii::app()->params['error404']);
    }
}