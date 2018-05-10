<?php

class MsgController extends MetaController
{
    public $layout=false;
    const onPage = 4;
    public $dlg = null;
    
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
        $new_model = new Messages();
        //
        

        
        if(isset($_POST['new_message']) OR !empty($_FILES)){
//            echo var_dump($_POST['new_message']);
//            echo var_dump($_FILES);
//            Yii::app()->end();
            if (isset($_POST['new_message'])){
                $dlg = Dialogs::model()->with('to')->findByPk($id);
                if ($dlg->dl_user == Yii::app()->user->id){
                    $new_msg = new Messages();
                    $new_msg->content_long = $_POST['new_message'];
                    $new_msg->ms_sender = Yii::app()->user->id;
                    $new_msg->ms_recipient = $dlg->dl_to;
                    $new_msg->ms_dlg = $dlg->dlid;
                    if ($new_msg->save()) {
                            $images = CUploadedFile::getInstancesByName('attachments');
                            if (isset($images) && count($images) > 0){
                                 foreach ($images as $image => $pic) {
//                                    echo $pic->name.'<br />';
//                                    $rootDir  = dirname(dirname(__DIR__));
//                                    $picDir = $rootDir.'/attachments';
                                    $msg_directory = dirname(dirname(__DIR__)).'/uploads/'.$new_msg->msid;
                                    if (!is_dir($msg_directory)) {
                                        mkdir($msg_directory);
                                    }
                                    if ($pic->saveAs($msg_directory.'/'.$new_msg->msid.'-'.$pic->name)) {
                                        // add it to the main model now
                                        $img_add = new Attachment();
                                        $img_add->at_name = $new_msg->msid.'-'.$pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
                                        $img_add->at_message = $new_msg->msid; // this links your picture model to the main model (like your user, or profile model)
                                        $img_add->at_patch = $msg_directory.'/'.$new_msg->msid.'-'.$pic->name;
                                        
//                                        echo print_r($img_add,true);
//                                        Yii::app()->end();
                                        if ($img_add->save()){ // DONE
                                            Yii::log('Attachment created.');
                                        }
                                    }
//                                    else
//                                        print_r();// handle the errors here, if you want
                                 }
                                 }
                        /* end file */
                        $success = 'Success';
                    } else {
                        Yii::log('Ошибка при сохранении сообщения');
                    }
                }
                else {
                    if ($dlg->dl_to == Yii::app()->user->id)
                        {
    //                    $dlg = Dialogs::model()->findByPk($id);
    //                    $last_msg = Yii::app()->db->createCommand()->select('msid')->from('messages')->order('msid DESC')->queryRow();
                        $rep_msg = new Messages();
                        $rep_msg->content_long = $_POST['new_message'];
                        $rep_msg->ms_sender = Yii::app()->user->id;
                        $rep_msg->ms_recipient = $dlg->dl_user;
    //                    $rep_msg->rp_message = $last_msg['msid'];
                        $rep_msg->ms_dlg = $dlg->dlid;
                        if ($rep_msg->save()) {
                            $images = CUploadedFile::getInstancesByName('attachments');
                            if (isset($images) && count($images) > 0){
                                 foreach ($images as $image => $pic) {
//                                    echo $pic->name.'<br />';
//                                    $rootDir  = dirname(dirname(__DIR__));
//                                    $picDir = $rootDir.'/attachments';
                                    $msg_directory = dirname(dirname(__DIR__)).'/uploads/'.$rep_msg->msid;
                                    if (!is_dir($msg_directory)) {
                                        mkdir($msg_directory);
                                    }
                                    if ($pic->saveAs($msg_directory.'/'.$rep_msg->msid.'-'.$pic->name)) {
                                        // add it to the main model now
                                        $img_add = new Attachment();
                                        $img_add->at_name = $rep_msg->msid.'-'.$pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
                                        $img_add->at_message = $rep_msg->msid; // this links your picture model to the main model (like your user, or profile model)
                                        $img_add->at_patch = $msg_directory.'/'.$rep_msg->msid.'-'.$pic->name;
                                        
//                                        echo print_r($img_add,true);
//                                        Yii::app()->end();
                                        if ($img_add->save()){ // DONE
                                            Yii::log('Attachment created.');
                                        }
                                    }
//                                    else
//                                        print_r();// handle the errors here, if you want
                                 }
                                 }
                            $success = 'Reply success added.';
                        } else {
                            Yii::log('Произошла ошибка при добавлении ответа');
                        }
                    }
                }
            }

//            }
        }
        //
        
//        $this->model = Dialogs::model()->findByPk($id);
        $this->model = Page::model()->with('meta')->findByAttributes(array(
            'p_sef'        => 'mysettings',
            'is_published' => 1,
            'is_delete'    => 0
        ));
//        echo var_dump($this->model);
//        Yii::app()->end();
        if ($this->model===NULL)
            throw new CHttpException(404,Yii::app()->params['error404']);
        
//        if (Yii::app()->request->isAjaxRequest){
//            $pagerparams = $_GET; 
//            $pagerparams['pagerFlag'] = '1';
//        }
        $dlg = Dialogs::model()->findByPk($id);
        $this->dlg = $dlg;
        $criteria = new CDbCriteria();
        $criteria->scopes = array();
//        $criteria->with = array('messages'=>array('order'=>'msid ASC'),'user','to');
        $criteria->with = array('sender','recipient'=>array('together'=>true));
        $criteria->addCondition('t.ms_dlg='.$id);
        $criteria->order='t.msid ASC';

        $criteria->together = true;
        

        $totalItemCount = Messages::model()->count($criteria);

        $pagerparams = $_GET; 
        $pagerparams['pagerFlag'] = '1';

        $this->dataProvider=new CActiveDataProvider('Messages',array(
            'criteria'       => $criteria,
            'totalItemCount' => $totalItemCount,
//            'totalItemCount' => $cnt,
            'pagination'     =>array(
                //Количество отзывов на страницу
                'pageSize'=> 10,
                'pageVar'=>'page',
                'params'  => $pagerparams,
            ),
        ));

        if(!Yii::app()->request->getIsAjaxRequest() && (!isset($_GET['page']))){
            $this->dataProvider->setPagination(array(
                'currentPage' => (int) (($totalItemCount + 10 - 1) / 10),
            ));
        }
 
        if(Yii::app()->request->isAjaxRequest)
        {
            if(!array_key_exists('pagerFlag', $_GET))
            {
                $this->dataProvider->setPagination(array(
                'currentPage' => (int) (($totalItemCount + 10 - 1) / 10),
                ));
            }
        }
        
//        $this->breadcrumbs['Новости'] = '/msg';
//        $this->breadcrumbs[] = Comportable::html_mb_substr($this->model->n_name, 0, 80);

//        $this->initAdminPanel();
        $this->pushModelMeta();
        $dialog_messages = Dialogs::model()->with('messages')->findByPk($id);
        $user_sender = Users::model()->findByPk($dlg->dl_user);
        $user_recipient = Users::model()->findByPk($dlg->dl_to);
        
        //set messages to readed
        $this->setReadedMessages(Yii::app()->user->id, $dlg->dlid);

        if(Yii::app()->request->isAjaxRequest){
            $this->renderPartial('ajax_update' , array('dataProvider' => $this->dataProvider,
            'input'=>$input,'user_sender'=>$user_sender,
            'user_recipient'=>$user_recipient,'new_model'=>$new_model));
// Yii::app()->clientScript->scriptMap['jquery.js'] = false;
//    Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;  
//    Yii::app()->clientScript->scriptMap['jquery.ba-bbq.js'] = false;
//    Yii::app()->clientScript->scriptMap['jquery.yiilistview.js'] = false;
        Yii::app()->end();
        }
        else{
            $this->render('view',array('dataProvider'=>$this->dataProvider,
                'input'=>$input,'user_sender'=>$user_sender,
                'user_recipient'=>$user_recipient,'new_model'=>$new_model));
        }
    }
    
    public function actionForumPostDisplay($id) {
        $dlg = Dialogs::model()->findByPk($id);
        $this->dlg = $dlg;
        $criteria = new CDbCriteria();
        $criteria->scopes = array();
//        $criteria->with = array('messages'=>array('order'=>'msid ASC'),'user','to');
        $criteria->with = array('sender','recipient'=>array('together'=>true));
        $criteria->addCondition('t.ms_dlg='.$id);
        $criteria->order='t.msid ASC';

        $criteria->together = true;
        

        $totalItemCount = Messages::model()->count($criteria);

        $pagerparams = $_GET; 
        $pagerparams['pagerFlag'] = '1';

        $this->dataProvider=new CActiveDataProvider('Messages',array(
            'criteria'       => $criteria,
            'totalItemCount' => $totalItemCount,
//            'totalItemCount' => $cnt,
            'pagination'     =>array(
                //Количество отзывов на страницу
                'pageSize'=> 10,
                'pageVar'=>'page',
                'params'  => $pagerparams,
            ),
        ));
        $dialog_messages = Dialogs::model()->with('messages')->findByPk($id);
        $user_sender = Users::model()->findByPk($dlg->dl_user);
        $user_recipient = Users::model()->findByPk($dlg->dl_to);
        
                        $this->renderPartial('ajax_update',array('dataProvider'=>$dataProvider),false,true);
                        Yii::app()->end();
    }
    
    
    public function uploadMultifile ($model,$attr,$path)
    {
    /*
    * path when uploads folder is on site root.
    * $path='/tmp/attachments/'
    */
    if($sfile=CUploadedFile::getInstances($model, $attr)){
     foreach ($sfile as $i=>$file){  
        $formatName=time().$i.'.'.$file->getExtensionName();
        $file->saveAs(Yii::app()->basePath .DIRECTORY_SEPARATOR.'..'. $path.$formatName);
        $ffile[$i]=$formatName;
      }
      return ($ffile);
     }
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
    
  public function actionAjaxCount() {
    $this->renderPartial("//layouts/count_msgs");
  }
    
    public function actionError(){
        throw new CHttpException(404,Yii::app()->params['error404']);
    }
}