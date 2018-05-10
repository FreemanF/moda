<?php

class CategoryController extends MetaController
{
    const onPage = 12;
    
    public function actionIndex()
    {
//        $this->model = Page::model()->with('meta')->findByAttributes(array(
//                'p_sef'=>'foto',
//                'is_published'=>1,
//                'is_delete'=>0
//            ));
//        if ($this->model===NULL)
//            throw new CHttpException(404,Yii::app()->params['error404']);
//        
//        if ( isset($this->model->meta) )
//            $this->pushMeta(array(
//                'title'          => $this->model->meta['e_title'],
//                'keywords'       => $this->model->meta['e_keywords'],
//                'description'    => $this->model->meta['e_description']
//            ));
//        
//        $criteria = array();
//        $totalItemCount = News::model()->count($criteria);
//        $this->dataProvider = new CActiveDataProvider('Gallery',array(
//            'criteria'       => $criteria,
//            'totalItemCount' => $totalItemCount,
//            'pagination'     =>array(
//                //Количество отзывов на страницу
//                'pageSize'=> self::onPage,
//                'pageVar'=>'page',
//            ),
//        ));
//            
//        $this->render('index');
        $this->redirect('/');
    }
    
    public function missingAction($actionID)
    {
        $sef = $actionID;
        Yii::log("MISSING ACTION");
        $cat = Category::model()->sef($sef)->find();
        
        if($cat){
            $cid = $cat->cid;
            $this->model = Tovar::model()->category($cid)->with('meta')->findAll();
//            Yii::log("TOVAR: ".print_r($this->model,true));
        } else {
            $this->redirect("/");
            Yii::app()->end();
        }
        
//        $this->model = Category::model()->sef($sef)->find();
//        if ( $this->model===null )
//            throw new CHttpException(404,Yii::app()->params['error404']);
        
        if ( isset($this->model->meta) )
            $this->pushMeta(array(
                'title'       => $this->model->meta['e_title'],
                'keywords'    => $this->model->meta['e_keywords'],
                'description' => $this->model->meta['e_description']
            ));
        
//        $this->render('view');
//        
        $criteria = array();
        $totalItemCount = $this->model->count($criteria);
        Yii::log("Total ".print_r($totalItemCount,true));
        $this->dataProvider = new CActiveDataProvider('Tovar',array(
            'criteria'       => $criteria,
            'totalItemCount' => $totalItemCount,
            'pagination'     =>array(
                //Количество отзывов на страницу
                'pageSize'=> self::onPage,
                'pageVar'=>'page',
            ),
        ));
            
        $this->render('index',array('cname'=>$cat->c_name));
    }
}