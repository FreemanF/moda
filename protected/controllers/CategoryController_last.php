<?php

class CategoryController extends MetaController
{
    const onPage = 40;
	public $layout         = '//layouts/category';
	public $cname = '';
        public $dataProvider;
    //public $class          = ''; // См. /layouts/news
	
    
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
    
    public function actionView($sef)
    {
	$this->layout = '//layouts/category';
        //$sef = isset($_GET['sef']) ? $_GET['sef'] : '';
        
        if ($sef == 'index'){
            $this->redirect('/');
        }
		
        Yii::log("MISSING ACTION");
        $cat = Category::model()->sef($sef)->find();
        //echo print_r($cat,true);
		//break;
        if($cat){
            $cid = $cat->cid;
            $this->model = Product::model()->category($cid)->find();
            $this->cname = $cat->c_name;
//			echo print_r($this->model,true);
//			break; break;
			//$this->model = Product::model()->with('media')->findAll();
//            Yii::log("TOVAR: ".print_r($this->model,true));
//            echo var_dump($this->model);
//            Yii::app()->end();
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
		if ($this->model)
		{
		//custom last changes 17.40
		$attributes = array_keys($this->model->attributes);
		isset($_GET['sortAttr'])?$sortAttr=array($_GET['sortAttr']):$sortAttr=array();
		/////////////////////////////
		$sort = new CSort('Product');
	//	$sort->sortVar = 'sort';
		$sort->defaultOrder = 't.pd_price ASC';
		$sort->multiSort = false;
		
		$sort->attributes = array(
                    'pd_name'=>array(
                        'label'=>'названию',
                        'asc'=>'t.pd_name ASC',
                        'desc'=>'t.pd_name DESC',
                        'default'=>'desc',
                    ),
                    'pd_price'=>array(
                        'asc'=>'t.pd_price ASC',
                        'desc'=>'t.pd_price DESC',
                        'default'=>'desc',
                        'label'=>'цене',
                    ),
                );

	$criteria = array('with'=>array('category','size'),'condition'=>'t.pd_category='.$cid, );
        //$criteria = array();
        $totalItemCount = $this->model->count();
        //Yii::log("Total ".print_r($totalItemCount,true));
        $this->dataProvider = new CActiveDataProvider('Product',array(
            'criteria'       => $criteria,
			'sort' => array(
				'attributes' => array(
                    'pd_name'=>array(
                        'label'=>'названию',
                        'asc'=>'t.pd_name ASC',
                        'desc'=>'t.pd_name DESC',
                        'default'=>'desc',
                    ),
                    'pd_price'=>array(
                        'asc'=>'t.pd_price ASC',
                        'desc'=>'t.pd_price DESC',
                        'default'=>'desc',
                        'label'=>'цене',
                    ),
                ),
			),
            'totalItemCount' => $totalItemCount,
            'pagination'     =>array(
                //Количество отзывов на страницу
                'pageSize'=> self::onPage,
                'pageVar'=>'page',
            ),
        ));
        
		//
//            echo var_dump($this->dataProvider);
//            Yii::app()->end();
                //
        
        $this->render('index',array('cname'=>$cat->c_name,'dataProvider'=>$this->dataProvider,'attributes'=>$attributes,'sortAttr'=>$sortAttr,));
		} else {
			$this->redirect("/");
			Yii::app()->end();
		}
    }
}