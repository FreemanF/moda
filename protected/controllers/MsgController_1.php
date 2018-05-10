<?php

class MsgController extends MetaController
{
    public $layout=false;
    const onPage = 4;
    
    public function actionIndex(){
        
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'        => 'mysettings',
            'is_published' => 1,
            'is_delete'    => 0
        ));
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
            
        $this->breadcrumbs[] = 'Новости';
        
        $this->initAdminPanel();
        $this->adminPanelAddUrl = '/admin/news/create';
        $this->pushModelMeta();
            
        $criteria = new CDbCriteria();
    //    $criteria = array();
        $criteria->with = array('user','product');
        $criteria->addCondition('dl_user='.Yii::app()->user->id);
        $criteria->addCondition('dl_to='.Yii::app()->user->id, 'OR');
        $totalItemCount = Dialogs::model()->count($criteria);
        $this->dataProvider=new CActiveDataProvider('Dialogs',array(
            'criteria'       => $criteria,
            'totalItemCount' => $totalItemCount,
//            'pagination'     =>array(
//                //Количество отзывов на страницу
//                'pageSize'=> self::onPage,
//                'pageVar'=>'page',
//            ),
        ));
        
        $this->render('index');
    }
    
    public function actionView($id){
        $input = '';
        $image = new Media();
        //
        
        if(isset($_POST['new_message']) OR !empty($_FILES)){
//            echo var_dump($_POST['new_message']);
//            echo var_dump($_FILES);
//            Yii::app()->end();
            if (isset($_POST['new_message'])){
                $dlg = Dialogs::model()->findByPk($id);
                if ($dlg->dl_user == Yii::app()->user->id){
                    $new_msg = new Messages();
                    $new_msg->content_long = $_POST['new_message'];
                    $new_msg->ms_sender = Yii::app()->user->id;
                    $new_msg->ms_recipient = $dlg->dl_to;
                    $new_msg->ms_dlg = $dlg->dlid;
                    if ($new_msg->save()) {
                        $success = 'Success';
                    } else {
                        Yii::log('Ошибка при сохранении сообщения');
                    }
                }
                else {
                    $dlg = Dialogs::model()->findByPk($id);
                    $last_msg = Yii::app()->db->createCommand()->select('msid')->from('messages')->order('msid DESC')->queryRow();
                    $rep_msg = new Replyes();
                    $rep_msg->content_long = $_POST['new_message'];
                    $rep_msg->rp_sender = Yii::app()->user->id;
                    $rep_msg->rp_message = $last_msg['msid'];
                    $rep_msg->rp_dlg = $dlg->dlid;
                    if ($rep_msg->save()) {
                        $success = 'Reply success added.';
                    } else {
                        Yii::log('Произошла ошибка при добавлении ответа');
                    }
                }
            }
//            $model=new Messages;
//            $model->attributes=$_POST['Item'];
//            $model->image=CUploadedFile::getInstance($model,'image');
//            if($model->save()){
//                $path=Yii::getPathOfAlias('webroot').'/upload/'.$model->image->getName();
//                $model->image->saveAs($path);
//                // перенаправляем на страницу, где выводим сообщение об
//				// успешной загрузке
//            }
        }
        //
        
        $this->model = Dialogs::model()->findByPk($id);
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'        => 'mysettings',
            'is_published' => 1,
            'is_delete'    => 0
        ));
//        echo var_dump($this->model);
//        Yii::app()->end();
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
        
        
        //if ($this->model->dl_user)
            
        $criteria = new CDbCriteria();
        $criteria->scopes = array();
        $criteria->with = array('messages'=>array('order'=>'msid ASC'),'user','to');
        $criteria->addCondition('t.dlid='.$id);
//        $criteria->together = FALSE;
//        $criteria->group = 't.dlid';
        $criteria->together = true;
        $totalItemCount = Dialogs::model()->count($criteria);
        echo $totalItemCount;
        $totalItemCount = count(Dialogs::model()->findAll($criteria));
        Yii::app()->end();
        $this->dataProvider=new CActiveDataProvider('Dialogs',array(
            'criteria'       => $criteria,
            'totalItemCount' => $totalItemCount,
            'pagination'     =>array(
                //Количество отзывов на страницу
                'pageSize'=> 2,
                'pageVar'=>'page',
            ),
        ));
//        $this->breadcrumbs['Новости'] = '/msg';
//        $this->breadcrumbs[] = Comportable::html_mb_substr($this->model->n_name, 0, 80);

//        $this->initAdminPanel();
        $this->pushModelMeta();
        $dialog_messages = Dialogs::model()->with('messages')->findByPk($id);
        
        $this->render('view',array('dataProvider'=>$this->dataProvider,'input'=>$input,'image'=>$image));
    }
    
    
    public function actionSettings(){
        if (Yii::app()->user->isGuest)
            $this->redirect (Yii::app()->homeUrl);
        
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'        => 'mysettings'
        ));
        
        $this->breadcrumbs['Настройки'] = '/settings';
        //$this->breadcrumbs[] = Comportable::html_mb_substr($this->model->n_name, 0, 80);

        //$this->initAdminPanel();
        $this->pushModelMeta();
        
        //$this->render('index');

        $uid = Yii::app()->user->id;
        $user = Users::model()->find('usid='.$uid);
        //
        if(isset($_POST['Users']))
        {
        // получаем данные от пользователя
        $user->attributes=$_POST['Users'];
        // проверяем полученные данные и, если результат проверки положительный,
        // перенаправляем пользователя на предыдущую страницу
        if($user->validate() && $user->save())
            $msg = "Данные успешно изменены";
        }
        //
        $this->render('my',array('user'=>$user));
    }
    
    public function actionEditProduct($sef){
        if (Yii::app()->user->isGuest)
            $this->redirect (Yii::app()->homeUrl);
        
        
        $user_id = Yii::app()->user->id;
        $this->model = Product::model()->with('media','media2','media3','category','brand','user')->user($user_id)->find('pdid='.$sef);
        $this->layout = '//layouts/editProd';

        //start custom code
        if(Yii::app()->request->isPostRequest){
            //echo print_r($_FILES,true);
            $prod = $this->model;
            //$prod->media->attributes = $_POST['upload-img2'];

            
//            $prod->pd_name = $_POST['title'];
//            $prod->pd_brand = $_POST['brand'];
//            $prod->pd_category = $_POST['second_cat '];
//            $prod->pd_color = 1;
//            $prod->pd_source = $_POST['composition'];
//            $prod->pd_transport = $_POST['delivery'];
//            $prod->pd_user = Yii::app()->user->id;
//            $prod->content_long = $_POST['description'];
//            $prod->pd_price = $_POST['price'];
//            $prod->dt_start = date('Y-m-d H:i:s',strtotime('now'));
           // echo print_r($prod->media,true);
            //echo $_POST['title'];
//            echo $_POST['description'];
//            echo $_POST['composition'];
//            echo $_POST['delivery'];
//            echo $_POST['first_cat'];
//            echo $_POST['price'];
            //echo $_POST['sale-type'];
            //echo $_POST['promotion-type'];
            if ($prod->save() ) {
            ///////////SAVE IMAGE 1 ////////////////////////
            if ($_FILES['upload-img2']['error'] == UPLOAD_ERR_OK)
            {
                //check image
                if ($this->model->media){
//                    $this->model->media->dropLink(Object::idProduct, $this->model->pdid, $this->model->media->iid);
//                    $media_url = $this->model->media->getMediaUrl('original');
//                    $this->model->media->dropFile();
                        $this->model->media->delete();
                }
                /////////////
                $prod->attachBehavior('MediaBehavior', array(
                'class'=>'MediaBehavior',
                'simple'=>true,
                'media_label' => 'Фото 1',
                'media_type' => 0,
                'mediaField' => 'pd_media_id',
                'mediaRelation' => 'media')
                    );
                $mid = Media::LoadImg($_FILES['upload-img2'], Object::idProduct, $prod->pdid, 'product', 'product', '','');
                if ( $mid !== false )
                {
                    //echo print_r($mid,true);
                    //echo $mid->iid;
                    //Yii::app()->end();
                    Media::makeLink(Object::idProduct, $prod->pdid, $mid->iid, 0,0);
                    $prod->pd_media_id = $mid->iid;
                    $prod->detachBehavior('MediaBehavior');
                    echo "Media macked";
                }
                $prod->pd_media_id = $mid->iid;
            }
                ///////////MAKE IMAGE 2///////////////////
//            if ($_FILES['upload-img1']['error'] == UPLOAD_ERR_OK)
//            {
//                $prod->attachBehavior('MediaBehavior', array(
//                'class'=>'MediaBehavior',
//                'simple'=>true,
//                'media_label' => 'Фото 2',
//                'media_type' => 1,
//                'mediaField' => 'pd_media_id2',
//                'mediaRelation' => 'media2')
//                    );
//                $mid = Media::LoadImg($_FILES['upload-img1'], Object::idProduct, $prod->pdid, 'product', 'product', '','');
//                if ( $mid !== false )
//                {
//                    Media::makeLink(Object::idProduct, $prod->pdid, $mid->iid, 0,0);
//                    $prod->pd_media_id2 = $mid->iid;
//                    $prod->detachBehavior('MediaBehavior');
//                    echo "Media2 macked";
//                }
//                $prod->pd_media_id2 = $mid->iid;
//            }
                //////////////////////////////////////////
                //////////////MAKE IMAGE 3////////////////
//            if ($_FILES['upload-img3']['error'] == UPLOAD_ERR_OK)
//            {
//                $prod->attachBehavior('MediaBehavior', array(
//                'class'=>'MediaBehavior',
//                'simple'=>true,
//                'media_label' => 'Фото 3',
//                'media_type' => 1,
//                'mediaField' => 'pd_media_id3',
//                'mediaRelation' => 'media3')
//                    );
//                $mid = Media::LoadImg($_FILES['upload-img3'], Object::idProduct, $prod->pdid, 'product', 'product', '','');
//                if ( $mid !== false )
//                {
//                    Media::makeLink(Object::idProduct, $prod->pdid, $mid->iid, 0,0);
//                    $prod->pd_media_id3 = $mid->iid;
//                    $prod->detachBehavior('MediaBehavior');
//                    echo "Media3 macked";
//                }
//                $prod->pd_media_id3 = $mid->iid;
//            }
                //////////////////////////////////////////
                $prod->save();
            }
            
           // Yii::app()->end();
            $this->refresh();
        }        
        ////////end custom code ////////
        
        
        $this->render('index',array('model'=> $this->model));
    }

        public function actionClothes($t='active'){
        if (Yii::app()->user->isGuest)
            $this->redirect (Yii::app()->homeUrl);
        
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'        => 'mysettings'
        ));
        
        $this->breadcrumbs['Настройки'] = '/settings';
        //$this->breadcrumbs[] = Comportable::html_mb_substr($this->model->n_name, 0, 80);

        //$this->initAdminPanel();
        $this->pushModelMeta();
        //start code
        $attributes = array_keys(Product::model()->attributes);
        isset($_GET['sortAttr'])?$sortAttr=array($_GET['sortAttr']):$sortAttr=array();
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
        $criteria=new CDbCriteria;
	//$criteria = array('with'=>array('media','media2','media3','category','user','brand'),'condition'=>'t.pd_user='.Yii::app()->user->id, );

        //$criteria->addCondition('t.pd_user='.Yii::app()->user->id, 'AND');
        $criteria->compare('t.pd_user',Yii::app()->user->id,false,'AND');
        $criteria->compare('pd_status', 1,false,"AND");
        $criteria->compare('pd_status', 2,false,"OR");
        $criteria->compare('pd_status', 3,false,"OR");
        $criteria->with = array('media','media2','media3','category','user','brand');
        $criteria->together = true;
        
        $totalItemCount = Product::model()->count($criteria);
        Yii::log("Total ".print_r($totalItemCount,true));
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
        //end code
        
        $this->render('clothes',array('dataProvider'=>$this->dataProvider,'attributes'=>$attributes,'sortAttr'=>$sortAttr,));
    }
    
    public function actionError(){
        throw new CHttpException(404,Yii::app()->params['error404']);
    }
}