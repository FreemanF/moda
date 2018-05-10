<?php

class DictionaryController extends MetaController
{
    const onPage = 7;
    
    public function actionIndex(){
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'=>'dictionary',
            'is_published'=>1,
            'is_delete'=>0
        ));
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
            
        if (isset($this->model->meta))
            $this->pushMeta(array(
                'title'       => $this->model->meta['e_title'],
                'keywords'    => $this->model->meta['e_keywords'],
                'description' => $this->model->meta['e_description']
            ));
            
        $criteria = array();
        $totalItemCount = Dictionary::model()->count($criteria);
        $this->dataProvider=new CActiveDataProvider('Dictionary',array(
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
    
    public function actionView(){
        $sef = isset($_GET['sef']) ? $_GET['sef'] : '';
        
        if ($sef == 'index'){
            $this->redirect('/dictionary');
        }
        
        $this->model = Dictionary::model()->sef($sef)->with('meta')->find();
        if ( $this->model===null )
            throw new CHttpException(404,Yii::app()->params['error404']);
        
        if ( isset($this->model->meta) )
            $this->pushMeta(array(
                'title'       => $this->model->meta['e_title'],
                'keywords'    => $this->model->meta['e_keywords'],
                'description' => $this->model->meta['e_description']
            ));
        
        $this->render('view');
    }
    
    public function actionError(){
        throw new CHttpException(404,Yii::app()->params['error404']);
    }
}