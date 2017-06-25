<?php

class SettingController extends CRUDController
{
    public    $modelClass       = 'Setting';
    public    $layout           = 'adminList';
    public    $layout_leftPanel = 'panelJStree';
    public    $jstree_default   = '"#node_o1"';
    public    $layout_index     = 'index';
    public    $treeHrefPrefix   = '/admin/setting';
    protected $_pageTitle       = 'Раздел настроек';
    public    $date_column      = ''; // В модели нет даты 
    protected $actionTitles = array();

    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index','list','save','image'),
                'roles'=>array('Module'.$this->modelClass),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    public function withModel() {
        return array();
    }
    
    protected function scopeModel() {
        // Для индексной страницы убираем HrefPrefix (необязательно это делать)
        $this->enableAddButton = false;
        $this->treeHrefPrefix  = '';
    }
    
    public function getIndexColumns() {
        $columns = parent::getIndexColumns();
        $this->replaceColumn($columns, 1, array(
            'name'=>'Название', 
            'type'=>'html',
            'value'=>'CHtml::encode($data->ownerName)',
        ));
        $this->insertColumn($columns, 2, array(
            'header'=>'Описание',
            'type'=>'raw',
            'value'=>'nl2br($data->s_description)."<textarea class=\"editsetting\" style=\"display:none\">$data->s_value</textarea>"',
            'htmlOptions'=>array("class"=>'setting-content')
        ));
        
        unset($columns[3]['buttons']['delete']);
        $columns[3]['template']='{update}';
        $columns[3]['buttons']['update']['url'] = '';
        
        $this->deleteColumn($columns, 0); // id

        // В "Кодах и счётчиках" значения не показываем  o2 == 'o'.(setting.s_category)
        if (Yii::app()->request->getParam('dir') != 'o2')
            $this->insertColumn($columns, 1, array(
                'header'=>'Значение',
                'type'=>'raw',
                'value'=>'$data->s_type==2 ? "..." : ($data->s_type==1 ? $data->s_value : "")',
                'htmlOptions'=>array("class"=>'setting-result')
            ));
        return $columns;
    }
    
    public function getTree($jsonEncode=true) {
        $this->makeTree(Lists::getList('SC'),$roots,'makeRoot noIcon');
        return $jsonEncode ? json_encode(array_values($roots)) : array_values($roots);
    }
    
    public function actionList(){
        $this->model=new Setting('search');
        $this->renderPartial('list');
        Yii::app()->end();
    }
    
    public function actionSave(){
        $Fail = false;
        if(Yii::app()->request->isPostRequest){
            try {
                $id   = Yii::app()->request->getPost('id');
                $text = Yii::app()->request->getPost('text');
                $this->loadModel($id);
                $this->model->old_value = $this->model->s_value;
                $this->model->s_value  = htmlspecialchars($text,ENT_QUOTES,'utf-8');
                
                $Fail = $this->model->beforeUpdate($text);
                if (is_array($Fail)) {
                    $Result = $Fail;
                    $Fail   = '';
                } else
                    $Result = array();
                    
                if( empty($Fail) && $this->model->save()){
//                    $Fail = $this->model->afterUpdate($text);
//                    if ($Fail=='')
                    $Result['status'] = 'Success';
                    echo json_encode($Result);
                } else
                if ( ! $Fail )
                    $Fail = 'Ошибка сохранения параметра в БД: '.var_export($this->model->errors,true);
            } catch (Exception $exc) {
                $Fail = $exc->getMessage();
            }
        } else 
            $Fail = 'Не корректная операция';
        if ($Fail)
            echo json_encode(array('status'=>$Fail));
        Yii::app()->end();
    }
    
    public function actionImage(){
        $url = '';
        if(Yii::app()->request->isPostRequest){
            try {
                $id  = (int)Yii::app()->request->getPost('id');
                $del = Yii::app()->request->getPost('Media_del');
                if ($this->loadModel($id) && $this->model->s_type==4) {
                    $new_filename = $old_filename = $this->model->s_value;
                    if ($del=='yes' && $old_filename) {
                        if (file_exists($old_filename))
                            @unlink($old_filename);
                        $new_filename = '';
                    }
                    if (isset($_FILES['Media_new'])) {
                        $image = $_FILES['Media_new'];
                        if( $image['error']==UPLOAD_ERR_OK 
                        &&  is_uploaded_file($image['tmp_name']) 
                        &&  $original=basename($image['name'])) 
                        {
                            $parts = explode('.', $original);
                            $ext = count($parts) ? array_pop($parts) : '';
                            if ($ext=='jpg') $ext='jpeg';
                            if ($ext!='jpeg' && $ext!='gif' && $ext!='png')
                                throw new Exception('Файл картинки с некорректным расширением '.$ext);
                                
                            $storage = Media::getMediaUrlPhoto(Object::idSetting,$id);
                            if (!@is_dir($storage))
                                if (!@mkdir($storage, 0777, true))
                                    throw new Exception('Не могу создать дерикторию "'.$storage.'"');
                            $new_filename = $storage.'image.'.$ext;
                            if ($new_filename!=$old_filename && file_exists($old_filename))
                                @unlink($old_filename);
                            if (file_exists($new_filename))
                                @unlink($new_filename);

                            move_uploaded_file($image['tmp_name'], $new_filename);
                            @chmod($new_filename, 0777);
                            $old_filename = ''; // Чтобы выполнился beforeUpdate
                        } else
                            $url = $new_filename;
                    }
                    if ($old_filename!=$new_filename) {
                        //Setting::model()->disableDefaultScope()->updateByPk($id, array('s_value'=>$new_filename),'s_type=4');
                        $this->model->s_value = $new_filename;
                        $Fail = $this->model->beforeUpdate();
                        if ( empty($Fail) ){
                            $this->model->save();
                            $url = $new_filename;
                        } else
                            throw new Exception(var_export($Fail,true));
                    }
                } else
                    Yii::log('Параметр с картинкой и с id='.$id.' не доступен пользователю');
            } catch (Exception $exc) {
                Yii::log($exc->getMessage());
            }
        }
        $this->renderPartial('iframe',array('url'=>$url)); //'/media/news/230-s/00/17/17532/43831-17527.jpg'));
        Yii::app()->end();
    }
}