<?php

class BrandsController extends MetaController
{
    const onPage = 10;
	public $cname = '';
        public $c_name = '';
        public $model_search;
    
    public function actionIndex(){
		$this->layout = '//layouts/brands';
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'        => 'brands',
            'is_published' => 1,
            'is_delete'    => 0
        ));
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
            
        $this->breadcrumbs[] = 'Бренды';
        
        $this->initAdminPanel();
        $this->adminPanelAddUrl = '/admin/brands/create';
        $this->pushModelMeta();
            
        $criteria = array('order'=>'cl_name ASC');
        $totalItemCount = Client::model()->count($criteria);
        $this->dataProvider=new CActiveDataProvider('Client',array(
            'criteria'       => $criteria,
            'totalItemCount' => $totalItemCount,
            'pagination'     =>FALSE,
        ));
        
        $this->render('index');
    }
    
    public function actionView($sef){
	$this->layout = '//layouts/category';
		
        $brands = Client::model()->with(array('media'))->sef($sef)->find();
	$this->model = $brands;
        $this->model_search = Product::model()->with('size');
		
        //if ($this->model===NULL)
        //    throw new CHttpException(404,Yii::app()->params['error404']);
		
		if ($this->model===NULL){
			$this->redirect("/");
			Yii::app()->end();
		} else {
			$this->model = Product::model()->brand($brands->clid)->with('brand','category','size')->find();
                        if (isset($this->model->category))
                            $this->c_name = $this->model->category->c_name;
		}
        
        $this->breadcrumbs['Бренды'] = '/brands';
        //$this->breadcrumbs[] = Comportable::html_mb_substr($this->model->cl_name, 0, 80);

        //$this->initAdminPanel();
    //    $this->pushModelMeta();
                $criteria = new CDbCriteria;
        
	//$criteria = array('with'=>array('category','size'),'condition'=>'category.c_pid='.$cid, );
        $criteria->with = array('category','size','media');
        $criteria->addCondition('t.pd_brand='.$brands->clid);
	
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
		//	$criteria = array('with'=>array('category','media','brand'),'condition'=>'t.pd_brand='.$brands->clid,
        //);
        //$criteria = array();
                
        ///////////// FILTERING START /////////////////////
        //
        if (isset($_POST['price'])){
            switch ($_POST['price']) {
                case 'cost-range-0':
                    if ( isset(Yii::app()->session['filter_price']) ){
                        if ( Yii::app()->session['filter_price'] == 'cost-range-0' ){
                            Yii::app()->session['filter_price'] = '';
                            unset($_SESSION['filter_price']);
                        }
                        else {
                        $criteria->addCondition('pd_price<=100');
                        Yii::app()->session['filter_price'] = 'cost-range-0';
                        }
                    } else {
                        $criteria->addCondition('pd_price<=100');
                        Yii::app()->session['filter_price'] = 'cost-range-0';
                    }
                    break;
                case 'cost-range-1':
                    if ( isset(Yii::app()->session['filter_price']) ){
                        if ( Yii::app()->session['filter_price'] == 'cost-range-1' ){
                            Yii::app()->session['filter_price'] = '';
                            unset($_SESSION['filter_price']);
                        }
                        else {
                        $criteria->addBetweenCondition('pd_price', '100', '300');
                        Yii::app()->session['filter_price'] = 'cost-range-1';
                        }
                    } else {
                        $criteria->addBetweenCondition('pd_price', '100', '300');
                        Yii::app()->session['filter_price'] = 'cost-range-1';
                    }
                    break;
                case 'cost-range-2':
                    if ( isset(Yii::app()->session['filter_price']) ){
                        if ( Yii::app()->session['filter_price'] == 'cost-range-2' ){
                            Yii::app()->session['filter_price'] = '';
                            unset($_SESSION['filter_price']);
                        }
                        else {
                            $criteria->addBetweenCondition('pd_price', '300', '500');
                            Yii::app()->session['filter_price'] = 'cost-range-2';
                        }
                    } else {
                        $criteria->addBetweenCondition('pd_price', '300', '500');
                        Yii::app()->session['filter_price'] = 'cost-range-2';
                    }
//                    $criteria->addBetweenCondition('pd_price', '300', '500');
//                    Yii::app()->session['filter_price'] = 'cost-range-2';
                    break;
                case 'cost-range-3':
                    if ( isset(Yii::app()->session['filter_price']) ){
                        if ( Yii::app()->session['filter_price'] == 'cost-range-3' ){
                            Yii::app()->session['filter_price'] = '';
                            unset($_SESSION['filter_price']);
                        }
                        else {
                            $criteria->addBetweenCondition('pd_price', '500', '1000');
                            Yii::app()->session['filter_price'] = 'cost-range-3';
                        }
                    } else {
                        $criteria->addBetweenCondition('pd_price', '500', '1000');
                        Yii::app()->session['filter_price'] = 'cost-range-3';
                    }
//                    $criteria->addBetweenCondition('pd_price', '500', '1000');
//                    Yii::app()->session['filter_price'] = 'cost-range-3';
                    break;
                case 'cost-range-4':
                    if ( isset(Yii::app()->session['filter_price']) ){
                        if ( Yii::app()->session['filter_price'] == 'cost-range-4' ){
                            Yii::app()->session['filter_price'] = '';
                            unset($_SESSION['filter_price']);
                        }
                        else {
                            $criteria->addCondition('pd_price>1000');
                            Yii::app()->session['filter_price'] = 'cost-range-4';
                        }
                    } else {
                        $criteria->addCondition('pd_price>1000');
                        Yii::app()->session['filter_price'] = 'cost-range-4';
                    }
                    break;

            }

        } else {
            if ( isset(Yii::app()->session['filter_price']) ){
                if ( Yii::app()->session['filter_price'] !== ''){
                    if (Yii::app()->session['filter_price'] == 'cost-range-0'){
                        $criteria->addCondition('pd_price<=100');
                    }
                    
                    if (Yii::app()->session['filter_price'] == 'cost-range-1'){
                        $criteria->addBetweenCondition('pd_price', '100', '300');
                    }
                    
                    if (Yii::app()->session['filter_price'] == 'cost-range-2'){
                        $criteria->addBetweenCondition('pd_price', '300', '500');
                    }
                    
                    if (Yii::app()->session['filter_price'] == 'cost-range-3'){
                        $criteria->addBetweenCondition('pd_price', '500', '1000');
                    }
                    
                    if (Yii::app()->session['filter_price'] == 'cost-range-4'){
                        $criteria->addCondition('pd_price>1000');
                    }
                    
                }
            }
        }
        
        //size filter criteria
        if ( isset($_POST['size']) ){
            if ( isset(Yii::app()->session['filter_size']) ){
                if ( Yii::app()->session['filter_size'] == $_POST['size']){
                    Yii::app()->session['filter_size'] = '';
                    unset($_SESSION['filter_size']);
                }
                else {
                    $criteria->addCondition('size.szid='.$_POST['size']);
                    Yii::app()->session['filter_size'] = $_POST['size'];
                }
            } else {
                $criteria->addCondition('size.szid='.$_POST['size']);
                Yii::app()->session['filter_size'] = $_POST['size'];
            }
        } else {
        
            if ( isset(Yii::app()->session['filter_size']) ){
                if ( Yii::app()->session['filter_size'] !== ''){
                    $criteria->addCondition('size.szid='.Yii::app()->session['filter_size']);
                }
            }
        }
        
        //color filter criteria
        if ( isset($_POST['color']) ){
            if ($_POST['color'] == 'color-1'){
                $color_id = 0;
            }
            if ($_POST['color'] == 'color-2'){
                $color_id = 1;
            }
            if ($_POST['color'] == 'color-3'){
                $color_id = 2;
            }
            if ($_POST['color'] == 'color-4'){
                $color_id = 3;
            }
            if ($_POST['color'] == 'color-5'){
                $color_id = 4;
            }
            if ($_POST['color'] == 'color-6'){
                $color_id = 5;
            }
            if ($_POST['color'] == 'color-7'){
                $color_id = 6;
            }
            if ($_POST['color'] == 'color-8'){
                $color_id = 7;
            }
            if ($_POST['color'] == 'color-9'){
                $color_id = 8;
            }
            if ($_POST['color'] == 'color-10'){
                $color_id = 9;
            }
            if ($_POST['color'] == 'color-11'){
                $color_id = 10;
            }
            if ($_POST['color'] == 'color-12'){
                $color_id = 11;
            }
            if ($_POST['color'] == 'color-13'){
                $color_id = 12;
            }
            if ($_POST['color'] == 'color-14'){
                $color_id = 13;
            }
            if ($_POST['color'] == 'color-15'){
                $color_id = 14;
            }
            if ($_POST['color'] == 'color-16'){
                $color_id = 15;
            }
            if ($_POST['color'] == 'color-17'){
                $color_id = 16;
            }
//            if ($_POST['color'] == 17){
//                $color_id = 17;
//            }

            
            if ( isset(Yii::app()->session['filter_color']) ){
                if ( Yii::app()->session['filter_color'] == $_POST['color']){
                    Yii::app()->session['filter_color'] = '';
                    unset($_SESSION['filter_color']);
                }
                else {
                    $criteria->addCondition('pd_color='.$color_id);
                    Yii::app()->session['filter_color'] = $_POST['color'];
                }
            }
//            else {
//                $criteria->addCondition('pd_color='.$color_id);
//                Yii::app()->session['filter_color'] = $_POST['color'];
//            }
        } else {
            ///////////////////////////
if ( isset(Yii::app()->session['filter_color']) ){
            if (Yii::app()->session['filter_color'] == 'color-1'){
                $color_id = 0;
            }
            if (Yii::app()->session['filter_color'] == 'color-2'){
                $color_id = 1;
            }
            if (Yii::app()->session['filter_color'] == 'color-3'){
                $color_id = 2;
            }
            if (Yii::app()->session['filter_color'] == 'color-4'){
                $color_id = 3;
            }
            if (Yii::app()->session['filter_color'] == 'color-5'){
                $color_id = 4;
            }
            if (Yii::app()->session['filter_color'] == 'color-6'){
                $color_id = 5;
            }
            if (Yii::app()->session['filter_color'] == 'color-7'){
                $color_id = 6;
            }
            if (Yii::app()->session['filter_color'] == 'color-8'){
                $color_id = 7;
            }
            if (Yii::app()->session['filter_color'] == 'color-9'){
                $color_id = 8;
            }
            if (Yii::app()->session['filter_color'] == 'color-10'){
                $color_id = 9;
            }
            if (Yii::app()->session['filter_color'] == 'color-11'){
                $color_id = 10;
            }
            if (Yii::app()->session['filter_color'] == 'color-12'){
                $color_id = 11;
            }
            if (Yii::app()->session['filter_color'] == 'color-13'){
                $color_id = 12;
            }
            if (Yii::app()->session['filter_color'] == 'color-14'){
                $color_id = 13;
            }
            if (Yii::app()->session['filter_color'] == 'color-15'){
                $color_id = 14;
            }
            if (Yii::app()->session['filter_color'] == 'color-16'){
                $color_id = 15;
            }
            if (Yii::app()->session['filter_color'] == 'color-17'){
                $color_id = 16;
            }
            
//                if ( Yii::app()->session['filter_color'] !== '' ){
                    $criteria->addCondition('t.pd_color='.$color_id);
//                }
}

        }
        
////////////////FILTER STATUS ////////////////

        if (isset($_POST['status'])){
            switch ($_POST['status']) {

                case 'used-1':
                    if ( isset(Yii::app()->session['filter_status']) ){
                        if ( Yii::app()->session['filter_status'] == 'used-1' ){
                            Yii::app()->session['filter_status'] = '';
                            unset($_SESSION['filter_status']);
                        }
                        else {
                            $criteria->addCondition('pd_status = 0');
                            Yii::app()->session['filter_status'] = 'used-1';
                        }
                    } else {
                        $criteria->addCondition('pd_status = 0');
                        Yii::app()->session['filter_status'] = 'used-1';
                    }
                    break;
                    
                case 'used-2':
                    if ( isset(Yii::app()->session['filter_status']) ){
                        if ( Yii::app()->session['filter_status'] == 'used-2' ){
                            Yii::app()->session['filter_status'] = '';
                            unset($_SESSION['filter_status']);
                        }
                        else {
                            $criteria->addCondition('pd_state = 1');
                            Yii::app()->session['filter_status'] = 'used-2';
                        }
                    } else {
                        $criteria->addCondition('pd_state = 1');
                        Yii::app()->session['filter_status'] = 'used-2';
                    }
                    break;
                    
                case 'used-3':
                    if ( isset(Yii::app()->session['filter_status']) ){
                        if ( Yii::app()->session['filter_status'] == 'used-3' ){
                            Yii::app()->session['filter_status'] = '';
                            unset($_SESSION['filter_status']);
                        }
                        else {
                            $criteria->addCondition('pd_state = 2');
                            Yii::app()->session['filter_status'] = 'used-3';
                        }
                    } else {
                        $criteria->addCondition('pd_state = 2');
                        Yii::app()->session['filter_status'] = 'used-3';
                    }
                    break;
            }
        } else {
            if ( isset(Yii::app()->session['filter_status']) ){
                if (Yii::app()->session['filter_status'] == 'used-1'){
                    $stat_id = 0;
                }
                if (Yii::app()->session['filter_status'] == 'used-2'){
                    $stat_id = 1;
                }
                if (Yii::app()->session['filter_status'] == 'used-3'){
                    $stat_id = 2;
                }
                
                $criteria->addCondition('t.pd_state='.$stat_id);
            }
        }
///////////////END FILTER STATUS /////////////

//////////// FILTERING END ///////////////////////
                
        $totalItemCount = Product::model()->count($criteria);
//        Yii::log("Total ".print_r($totalItemCount,true));
        $this->dataProvider = new CActiveDataProvider('Product',array(
            'criteria'  => $criteria,
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
	////////////
        
        $this->render('view',array('c_name'=> $this->c_name, 'dataProvider'=>$this->dataProvider,'attributes'=>$attributes,'sortAttr'=>$sortAttr,'model'=>$this->model));

    }
    
    public function actionError(){
        throw new CHttpException(404,Yii::app()->params['error404']);
    }
}