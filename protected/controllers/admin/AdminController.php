<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AdminController extends CRUDController
{
    
    public $layout       = 'admin';
    
    public function accessRules()
    {
        return array(

            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('published','updatesort','updatephotosort','updatecrop','editShortcutBar','deleteShortcutBar','updatesortbar'),
                    'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('index', 'clear'),
                    'roles'=>array('Administrator'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('connect'),
                    'roles'=>array('ModuleFile'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }
    
    public function actionIndex() {
        $this->render('index');
        
    }
    
    public function actionConnect(){
        $referrer = Yii::app()->request->urlReferrer;
        if( $referrer == ""){
            throw new CHttpException(404,'The requested page does not exist.');
        }else{
            $opts = array(
                'root'            => Yii::app()->basePath.'/../storage/' // path to root directory
              , 'URL'             => Yii::app()->request->getBaseUrl(true).'/storage/' // root directory URL
              , 'rootAlias'       => 'Home'       // display this instead of root directory name
              //'uploadAllow'   => array('images/*'),
              , 'uploadDeny'    => array('text/x-php') //if userspace disable text/html text/xml and more
              , 'uploadOrder'   => 'deny,allow'
              , 'debug'        => true
            );
            $fm = new elFinder($opts);
            $fm->run();
            die();
        }
    }
    
    public function actionPublished() {
        $request = Yii::app()->getRequest();
        $type  = intval($request->getParam('type'));
        $id    = intval($request->getParam('id'));
        $state = intval($request->getParam('state'));
        try {
            // Ловятся ошибки: нет поля (is_published) и нет типа объекта
            // Класс модели должен существовать,иначе ошибка не ловится
            $obj = Object::getObject($type);
            $class = ucfirst($obj->alias);
            if (Yii::app()->user->checkAccess($type==Object::idTask?'TaskManager':'Module'.$class)) {
                $class::model()->updateByPk($id,array('is_published'=>$state));
                if ($type==Object::idTask)
                    Task::updateCrontab();
                if ($obj->have_log) {
                    $model = $class::model()->disableDefaultScope()->findByPk($id);
                    if ($model)
                        if ($model->is_published)
                            Log::makeShow($type, $id, $model->ownerName);
                        else
                            Log::makeHide($type, $id, $model->ownerName);
                    else
                        echo 'Объект не найден в БД';
                }
                echo 'Ok';
            } else
                echo 'Нет соответствующего доступа (Module'.$class.')';
        } catch (Exception $exc) {
            echo 'Ошибка в параметрах: '.$exc->getMessage();
        }
        Yii::app()->end();
    }
    
    public function actionUpdateSort() {
        $Result = array('status'=>'Success');
        $Fail = 'Не POST запрос';
        if(Yii::app()->request->isPostRequest){
            $alias = filter_var(trim(Yii::app()->getRequest()->getParam('alias')),FILTER_SANITIZE_STRING);
            $class = ucfirst($alias);
            $role  = 'Module'.($class=='Place' ? 'Reclame' : ($class=='Member' ? 'Rating' : $class) );
            if (Yii::app()->user->checkAccess($role))
                try {
                    $sort  = Yii::app()->request->getPost('sort');
                    settype($sort,'array');
                    $sort  = array_filter($sort,'intval');
                    // Ловятся ошибки: нет поля (is_published) и нет типа объекта
                    // Класс модели должен существовать,иначе ошибка не ловится
                    if ($class=='Kind' || $class=='Group') $class = 'Menu';
                    $model  = $class::model();
                    $sortField = $model->ownerPrefix.'_sort';
                    foreach( $sort as $key=>$value ){
                        $model->updateByPk($value, array($sortField=>$key));
                    }
                    $Fail = '';
                } catch (Exception $exc) {
                    $Fail = 'AdminController.actionUpdateSort EXCEPTION: '.$exc->getMessage();
                }
            else
                $Fail = 'Нет доступа к '.$role;
        }
        if ($Fail) {
            Yii::log('AdminController.actionUpdateSort : '.$Fail);
            echo json_encode(array('status'=>$Fail));
        } else
            echo json_encode($Result);
        Yii::app()->end();
    }
    
    public function actionUpdatePhotoSort() {
        $Result = array('status'=>'Success');
        $Fail = 'Не POST запрос';
        if(Yii::app()->request->isPostRequest) try {
            $alias = filter_var(trim(Yii::app()->getRequest()->getParam('alias')),FILTER_SANITIZE_STRING);
            $obj   = Object::byAlias($alias);
            $objectID = intval(filter_var(trim(Yii::app()->getRequest()->getParam('oID')),FILTER_SANITIZE_STRING));
            $objectType  = $obj->oid; //intval(constant('Object::id'.ucfirst($alias)));
            $class = Object::getClass($objectType); //ucfirst(strtolower($alias));
            $role  = 'Module'.$class;
            if (Yii::app()->user->checkAccess($role))
                try {
                    $sort  = Yii::app()->request->getPost('sort');
                    settype($sort,'array');
                    $sort  = array_filter($sort,'intval');
                    $type  = Yii::app()->request->getPost('type');
                    settype($type,'array');
                    $type  = array_filter($type,'intval');
                    foreach( $sort as $key=>$value )
                        LinkOI::model()->updateByPk(
                            array(
                                'object_type' => $objectType,
                                'object_id'   => $objectID,
                                'type'        => isset($type[$key]) ? $type[$key] : 0,
                                'media_id'    => $value,
                            ),
                            array('sort'=>1+$key)
                        );
                    $Fail = '';
                } catch (Exception $exc) {
                    $Fail = 'AdminController.actionUpdatePhotoSort EXCEPTION: '.$exc->getMessage();
                }
            else
                $Fail = 'Нет доступа к '.$role;
        } catch (Exception $exc) {
            $Fail = $exc->getMessage();
        }
        if ($Fail) {
            Yii::log('AdminController.actionUpdatePhotoSort : '.$Fail);
            echo json_encode(array('status'=>$Fail));
        } else
            echo json_encode($Result);
        Yii::app()->end();
    }
    
    public function actionEditShortcutBar(){
        if(Yii::app()->request->isPostRequest){
            
            $id   = Yii::app()->request->getPost('id')   ? Yii::app()->request->getPost('id')   : 0;
            $name = Yii::app()->request->getPost('name') ? Yii::app()->request->getPost('name') : "";
            $url  = Yii::app()->request->getPost('url')  ? Yii::app()->request->getPost('url')  : "";
            $icon = Yii::app()->request->getPost('icon') ? Yii::app()->request->getPost('icon') : NULL;
            $max = ShortcutBar::model()->count();
            
            if( $id ){
                $shortcutBar = ShortcutBar::model()->findByPk($id);
            }else{
                $shortcutBar = new ShortcutBar();
                $shortcutBar->sb_sort = $max ? ($max+1)
                                             : 0;
                $shortcutBar->sb_user = Yii::app()->user->id;
            }
            $shortcutBar->sb_name = $name;
            $shortcutBar->sb_sef  = $url;
            $shortcutBar->sb_icon = $icon;
            
            if( $shortcutBar->save() ){
                $this->renderPartial('shortcutBar');                
            }else{
                echo "Fail";
            }
        }else{
            Yii::log('AdminController.actionCreateShortcutBar : Не POST запрос');
            echo "Fail";
        }
        Yii::app()->end();
    }
    
    public function actionDeleteShortcutBar(){
        if(Yii::app()->request->isPostRequest){
            
            $id = Yii::app()->request->getPost('id') ? Yii::app()->request->getPost('id') : 0;
            
            if( $id ){
                $shortcutBar = ShortcutBar::model()->findByPk($id);
                if( $shortcutBar->sb_user == Yii::app()->user->id )
                    if( $shortcutBar->delete() ){
                        echo json_encode(array("status"=>"Success"));
                        Yii::app()->end();
                    }
            }
            echo json_encode(array("status"=>"Fail"));
        }else{
            Yii::log('AdminController.actionCreateShortcutBar : Не POST запрос');
            echo "Fail";
        }
        Yii::app()->end();
    }
    
    public function actionUpdatesortbar(){
        if(Yii::app()->request->isPostRequest){
            foreach( Yii::app()->request->getPost('sort') as $key=>$value ){
                $ShortcutBar = ShortcutBar::model()->updateByPk($value, array("sb_sort"=>$key));
            }
            Yii::app()->end();
        }
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    
    public function actionUpdateCrop() {
        $Result = array('status'=>'Success');
        $Fail = 'Не POST запрос';
        if(Yii::app()->request->isPostRequest){
            try {
                $crop = Yii::app()->request->getPost('crop');
    
                if( isset($crop["id"]) && isset($crop["x1"]) && isset($crop["y1"]) && isset($crop["x2"]) && isset($crop["y2"]) ){
                    if( Media::initCrop($crop) ){
                        $Fail = '';
                    }else{
                        $Fail = 'Возникла очень страшная ошибка!';
                    }
                }else{
                    $Fail = 'Нет доступа';
                }
            } catch (Exception $exc) {
                $Fail = 'AdminController.actionUpdateCrop EXCEPTION: '.$exc->getMessage();
            }
        }
        if ($Fail) {
            Yii::log('AdminController.actionUpdateCrop : '.$Fail);
            echo json_encode(array('status'=>$Fail));
        } else
            echo json_encode($Result);
        Yii::app()->end();
    }

    public function actionMarkdown()
    {
        if (Yii::app()->theme->name == Yii::app()->params["themeBackEnd"]) {
            Yii::app()->clientScript->reset();
            $this->initTheme(Yii::app()->params["themeFrontEnd"]);
        }
        $this->layout = '/layouts/preview';
        $data = Yii::app()->request->getParam('data');
        $this->render(/* agro_classic/views/admin/admin */ 'markdown',array('data'=>Comportable::Markdown($data)));
    }
    
    public function actionClear()
    {        
        if ( Yii::app()->request->isPostRequest ) {
            $target = trim(filter_var(Yii::app()->request->getPost('target'),FILTER_SANITIZE_STRING));
            $result = 'ERROR';
            $dir    = '';
            switch ( $target ) {
                case 'assets':
                    $dir = 'assets';
                    break;
                case 'cache':
                    $dir = 'protected/runtime/cache';
                    break;
            }
            
            if ($dir && is_dir($dir)) {
                if ($handle = opendir($dir)) {
                    while (false !== ($entry = readdir($handle)))
                        //Получили папки объектов
                        // исключаем папки с назварием '.' и '..' 
                        if ($entry!='.' && $entry!='..' && $entry!='.gitignore') {
                            $tmpPath = $dir.'/'.$entry;
                            @chmod($tmpPath, 0777);
                            if (is_dir($tmpPath)) { // если папка
                                $this->RemoveDir($tmpPath);
                            } else
                                if (file_exists($tmpPath)) // удаляем файл 
                                    @unlink($tmpPath);
                        }
                    closedir($handle);
                    $result = 'OK';
                }
            } else
                Yii::log("Директория ".$dir." не существует! ".getcwd());
            
            echo $result;
            Yii::app()->end();
        } else 
            throw new CHttpException(404,Yii::app()->params['error404']);
    }
    
    private function RemoveDir($path){
        if (file_exists($path) && is_dir($path)) {
            $dirHandle = opendir($path);
            while (false !== ($file = readdir($dirHandle)))
                if ($file!='.' && $file!='..') {
                    $tmpPath=$path.'/'.$file;
                    @chmod($tmpPath, 0777);
                    if (is_dir($tmpPath)) {  // если папка
                        $this->RemoveDir($tmpPath);
                    } else
                        if (file_exists($tmpPath)) // удаляем файл 
                            @unlink($tmpPath);
                }
            closedir($dirHandle);
            // удаляем текущую папку
            if(!glob($path."/*"))
                @rmdir($path);
	} else {
            Yii::log("Директория ".$path." не существует!");
            Yii::app()->end();
	}
    }
}
