<?php

class PageController extends CRUDController
{
    public    $modelClass       = 'Page';
    public    $layout           = 'adminList';
    public    $layout_leftPanel = 'panelJStree';
    public    $defaultContentType = 1;
    public    $jstree_default   = -1;
    public    $layout_index     = 'index';
    public    $is_published     = true; // CheckBox published на индексной странице админки
    public    $treeHrefPrefix   = '/admin/page';
    protected $_pageTitle       = "Содержимое папки";
    public    $addAllowActions  = array('list','folder','restore');
    protected $_h3 = 'Дерево каталогов';
    protected $actionTitles = array('create'=>'Добавить страницу','update'=>'Редактирование cтраницы');

    public function withModel() {
        // в классе Folder нет Meta-тегов
        //return $this->modelClass == 'Page' ? array('meta') : array();
        return array();
    }

    public function beforeUpdate() {
        $dir = $this->model->dir;
        if (!empty($dir))
            $this->jstree_default = '"#node_'.$dir.'"';
    }
    
    protected function beforeValidation() {
        if(!$this->model->p_sef) {
            $this->model->p_sef = TranslitFilter::translitUrl($this->model->p_name);
            $_POST['Page']['p_sef'] = $this->model->p_sef;
        }
    }
    
    public function inheritedDeleter($fid) {
        if (empty($fid)) return '*';
        $folder = Folder::model()->findByPk($fid, array('select'=>'can_delete'));
        return $folder ? $folder->can_delete : '*';
    }
    
    public function setDefaultAttributes() {
        
        parent::setDefaultAttributes();
        
        $fid = isset($_POST[$this->modelClass])
            ? intval($_POST[$this->modelClass]['p_dir'])
            : intval(Yii::app()->request->getParam('dir'));
        
        if ( $fid )
            $this->model->p_dir = $fid;
        //else // Можно ли создавать страницы в корне дерева?
        //    throw new CHttpException(403,'Недопустимая операция.');
        
        $this->model->can_delete = $this->inheritedDeleter($fid);
            
        $this->model->is_published  = 1;
        $this->model->p_lang = 'ru';
        
        if ($this->model->isNewRecord && isset($_POST[$this->modelClass])) {
            $criteria=new CDbCriteria;
            $criteria->select    = 'max(p_sort) AS maxSort';
            $criteria->condition = 'p_dir'.($fid ? '='.$fid : ' IS NULL');
            $result = Page::model()->find($criteria);
            $this->model->p_sort = intval($result?$result->maxSort:-1)+1;
        }
            
    }
    
    protected function scopeModel() {
        // Для индексной страницы убираем HrefPrefix (необязательно это делать)
        $this->treeHrefPrefix = '';
        //$this->_actionTitle   = 'Создание, редактирование, удаление текстовых страниц';
    }
    
    function getIdsChildren($pid,$is_delete=0,$trash=true) {
        // если есть дочерние, но нет is_delete, то возвращает array()
        // если нет даже дочерних, то возвращает null
        // это сделано для того, чтобы знать, нужно ли отправлять дерево для перестроения
        // если нет дочерних, то дерево можно не перестраивать, просто удалить узел.
//        Yii::log('getIdsChildren START:'.var_export(array(
//            'pid'=>$pid,
//            'is_delete'=>$is_delete,
//            'trash'=>$trash,
//        ),true));
        settype($pid,'array');
        if (count($pid)>1)
            $list = Folder::model()->findAll(array(
                'select'=>'fid,is_delete',
                'condition'=>'f_pid in ('.implode(',',$pid).')'
            ));
        else
            $list = Folder::model()->findAll(array(
                'select'=>'fid,is_delete',
                'condition'=>'f_pid='.$pid[0]
            ));
        $result = array();
        foreach($list as $folder)
            if ($folder->is_delete==$is_delete)
                $result[] = $folder->fid;
        if ( $trash && count($result)) { // Чтобы не выполнять лишнюю работу при удалении
            $add = $this->getIdsChildren($result,$is_delete);
            if ($add)
                $result = array_merge ($result,$add);
        }
        //Yii::log('getIdsChildren RESULT:'.var_export(empty($result) && empty($list) ? null : $result,true));
        return empty($result) && empty($list) ? null : $result;
    }
    
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete(){
        $this->treeHrefPrefix = ''; // Удаление, м.б. вызвано только с индексной страницы
        $Fail = false;
        if(Yii::app()->request->isPostRequest){
            $id = intval(Yii::app()->request->getPost('id'));
            try {
                switch ($id) {
                case $id<0: // Folder
                    $this->modelClass = 'Folder';
                    $id = -$id;
                    $this->loadModel($id);
                    break;
                case $id>0:  // Page
                    $this->loadModel($id);
                    break;
                default:
                    $Fail = 'Не указан объект';
                    break;
                }
                if (!$Fail) {
                    if ( ! $this->model->canDelete)
                        $Fail = 'Недостаточно доступа.';
                    else
                    if ($this->model->is_delete) {
                        // Если папка с дочерними, то перестраиваем дерево
                        $needUpdateTree = 'Page'==$this->modelClass ? false : 
                            null!==$this->getIdsChildren($id,0,false);
                        if ($this->model->delete()) {
                            $result = array('status'=>'Success');
                            if ($needUpdateTree)
                                $result['tree'] = $this->getTree(false);
                            echo json_encode($result);
                        } else    
                            $Fail = 'Неудачная попытка удалить. '.var_export($this->model->errors,true);
                    } else {
                        // Рекурсивно переносим в корзину
                        if ($this->model->updateByPk($id,array('is_delete'=>1))) {
                            $result = array('status'=>'Trash');
                            if ( 'Page'==$this->modelClass )
                                $needUpdateTree = false;
                            else { // Folder
                                $ids = $this->getIdsChildren($id);
                                if ($ids===null) {
                                    $needUpdateTree = false;
                                    $ids = array();
                                } else
                                    $needUpdateTree = true;
                                if (count($ids)>0)
                                    $this->model->updateByPk($ids,array('is_delete'=>1));
                                $ids[]=$id; // Для родительской папки тоже
                                $criteria = new CDbCriteria;
                                $criteria->addInCondition('p_dir', $ids);
                                Page::model()->updateAll(array('is_delete'=>1),$criteria);
                            }
                            if ($needUpdateTree)
                                $result['tree'] = $this->getTree(false);
                            echo json_encode($result);
                        } else
                            $Fail = 'Неудачная попытка перенести в корзину. '.var_export($this->model->errors,true);
                    }
                }
                else
                    $Fail = 'Неудачная попытка удалить. '.var_export($this->model->errors,true);
            } catch (Exception $exc) {
                $Fail = $exc->getMessage();
            }
        } else 
            $Fail = 'Не корректная операция';
        if ($Fail)
            echo json_encode(array('status'=>$Fail));
        Yii::app()->end();
    }
    
    public function actionRestore() {
        $this->treeHrefPrefix = ''; // Восстановление, м.б. вызвано только с индексной страницы
        $Fail = false;
        if(Yii::app()->request->isPostRequest){
            $id = intval(Yii::app()->request->getPost('id'));
            try {
                switch ($id) {
                case $id<0: // Folder
                    $this->modelClass = 'Folder';
                    $id = -$id;
                    $this->loadModel($id);
                    break;
                case $id>0:  // Page
                    $this->loadModel($id);
                    break;
                default:
                    $Fail = 'Не указан объект';
                    break;
                }
                if (!$Fail) {
                    if ( ! $this->model->is_delete)
                        $Fail = 'Действие запрещено.';
                    else {
                        // Рекурсивно восстанавливаем
                        if ($this->model->updateByPk($id,array('is_delete'=>0))) {
                            $result = array('status'=>'Success');
                            if ( 'Page'==$this->modelClass )
                                $needUpdateTree = false;
                            else { // Folder
                                $ids = $this->getIdsChildren($id,1);
                                if ($ids===null) {
                                    $needUpdateTree = false;
                                    $ids = array();
                                } else
                                    $needUpdateTree = true;
                                if (count($ids)>0)
                                    $this->model->updateByPk($ids,array('is_delete'=>0));
                                $ids[]=$id; // Для родительской папки тоже
                                $criteria = new CDbCriteria;
                                $criteria->addInCondition('p_dir', $ids);
                                Page::model()->updateAll(array('is_delete'=>0),$criteria);
                            }
                            if ($needUpdateTree)
                                $result['tree'] = $this->getTree(false);
                            else
                                $result['pid'] = $this->modelClass == 'Folder' 
                                    ? $this->model->f_pid 
                                    : $this->model->p_dir;
                            
                            echo json_encode($result);
                        } else
                            $Fail = 'Неудачная попытка восстановить. '.var_export($this->model->errors,true);
                    }
                }
                else
                    $Fail = 'Неудачная попытка восстановить. '.var_export($this->model->errors,true);
            } catch (Exception $exc) {
                $Fail = $exc->getMessage();
            }
        } else 
            $Fail = 'Не корректная операция';
        if ($Fail)
            echo json_encode(array('status'=>$Fail));
        Yii::app()->end();
    }

    public function getIndexColumns() {
        $columns = parent::getIndexColumns();
        $this->replaceColumn($columns, 1, array(
            'name'=>'Название папки или страницы', //1
            'type'=>'html',
            'value'=>'$data->image.($data->primaryKey>0 ? CHtml::link(CHtml::encode($data->ownerName), $data->linkUpdateButton) : CHtml::encode($data->ownerName))',
            //'cssClassExpression'=>'$data->primaryKey<=0?"isnamefield":""',
            'cssClassExpression'=>'"isnamefield"',
        ));
        $this->insertColumn($columns, 2, array('header'=>'URL','name'=>'p_sef'));
        $columns[5]['buttons']['delete']['visible'] = '$data->canDelete';
        $columns[5]['buttons']['delete']['label'] = $this->model->inTrash
            ? 'Удалить навсегда' : 'Удалить в корзину';
        
        if (Yii::app()->request->getParam('dir')==='trash') {
            $columns[5]['buttons']['update']['label'] = 'Восстановить';
            $columns[5]['buttons']['update']['imageUrl'] = $this->themeImages.'photon/icons/default/re_trash.png';
        } else {
            $columns[5]['buttons']['update']['visible'] = '$data->is_delete==0';
        }
        $columns[5]['buttons']['update']['url']   = '$data->linkUpdateButton';
        $columns[5]['buttons']['update']['options'] = array('onclick'=>'updateObject(event,this)','class'=>'update');
        if ($this->model->inTrash)
            $this->deleteColumn($columns, 4);
        $columns[3]['header'] = 'Дата создания';
        $this->deleteColumn($columns, 0); // id
        return $columns;
    }
    
    public function actionFolder(){
        if(Yii::app()->request->isPostRequest){
            $fid    = intval(Yii::app()->request->getPost('fid'));
            $f_pid  = intval(Yii::app()->request->getPost('f_pid'));
            $f_name = filter_var(trim(Yii::app()->request->getPost('f_name')),FILTER_SANITIZE_STRING);
            if ($fid) {
                $model = Folder::model();
                $model->updateByPk($fid, array('f_name'=>$f_name));
                Log::makeUpdate(Object::idFolder, $fid, $f_name);
            } else {
                $model = new Folder();
                $model->f_name = $f_name;
                if ($f_pid)
                    $model->f_pid = $f_pid;
                $model->can_delete = $this->inheritedDeleter($f_pid);
                
                $criteria=new CDbCriteria;
                $criteria->select    = 'max(f_sort) AS maxSort';
                $criteria->condition = 'f_pid'.($f_pid?'='.$f_pid:' IS NULL');
                $result = Folder::model()->find($criteria);
                $model->f_sort = intval($result?$result->maxSort:-1)+1;
                if ($model->save())
                    $fid = $model->primaryKey;
                else {
                    echo json_encode(array('status'=>var_export($this->model->errors,true)));
                    Yii::app()->end();
                }
            }
            echo json_encode(array('status'=>'Success','fid'=>$fid));
        } else
            echo json_encode(array('status'=>'Неверный запрос'));
        Yii::app()->end();
    }
    
    public function getTree($jsonEncode=true) {
        $this->makeTree(Folder::model()->findAll(array(
            'order'=>'f_pid,f_sort,f_name,fid DESC'))
            ,$roots,'noIcon trash');
        return $jsonEncode ? json_encode(array_values($roots)) : array_values($roots);
    }
    
    public function actionList(){
        $this->model=new Page('search');
        $this->renderPartial('list');
        Yii::app()->end();
    }
    
}
