<?php

class FotoController extends MetaController
{
    const onPage = 4;
    
    public function actionIndex()
    {
        $this->model = Page::model()->with('meta')->findByAttributes(array(
                'p_sef'=>'foto',
                'is_published'=>1,
                'is_delete'=>0
            ));
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
        
        if ( isset($this->model->meta) )
            $this->pushMeta(array(
                'title'          => $this->model->meta['e_title'],
                'keywords'       => $this->model->meta['e_keywords'],
                'description'    => $this->model->meta['e_description']
            ));
        
        $criteria = array();
        $totalItemCount = Gallery::model()->count($criteria);
        $this->dataProvider = new CActiveDataProvider('Gallery',array(
            'criteria'       => $criteria,
            'totalItemCount' => $totalItemCount,
            'pagination'     =>array(
                //Количество отзывов на страницу
                'pageSize'=> self::onPage,
                'pageVar'=>'page',
//                'route' => '/foto',
            ),
        ));
            
        $this->render('index');
    }
    
    public function actionView()
    {
        $sef = isset($_GET['sef']) ? $_GET['sef'] : '';
        if ($sef == 'index'){
            $this->redirect('/foto');
        }
        
        $this->model = Gallery::model()->sef($sef)->with('meta')->find();
        if ( $this->model===null )
            throw new CHttpException(404,Yii::app()->params['error404']);
        
        if ( isset($this->model->meta) )
            $this->pushMeta(array(
                'title'       => $this->model->meta['e_title'],
                'keywords'    => $this->model->meta['e_keywords'],
                'description' => $this->model->meta['e_description']
            ));
        
        //
        $modelID = $this->model->gid;
        $criteria = new CDbCriteria;
        $criteria->condition = "t.i_oid = $modelID AND t.i_path = 8";
        $totalItemCount = Media::model()->count($criteria);
        $this->dataProvider = new CActiveDataProvider('Media', array(
            'criteria' => $criteria,
            'totalItemCount' => $totalItemCount,
            'pagination'     =>array(
                //Количество отзывов на страницу
                'pageSize'=> 18,
                'pageVar'=>'page',
//                'route' => '/foto',
            ),
        ));
        //
        
//        $this->render('view');
        $this->render('detail');
    }
}