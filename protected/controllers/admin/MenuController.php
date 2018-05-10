<?php

class MenuController extends CRUDController
{
    public    $modelClass       = 'Menu';
    public    $layout           = 'adminList';
    public    $layout_leftPanel = 'panelJStree';
    public    $jstree_default   = -1;
    public    $layout_index     = 'index';
    public    $treeHrefPrefix   = '';
    protected $_pageTitle       = "Содержимое папки";
    public    $date_column      = ''; // В модели нет даты 
    protected $actionTitles = array();
    public    $defaultContentType = NULL;

    public function __construct($id, $module = null) {
        $this->treeHrefPrefix = '/admin/menu';
        parent::__construct($id, $module);
    }
    
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index','list','save','delete'),
                'roles'=>array('Module'.$this->modelClass),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    public function withModel() {
        return array('page');
    }
    
    public function setDefaultAttributes() {
        
        $isPost = isset($_POST[$this->modelClass]) ? $_POST[$this->modelClass] : null;
        $pid = $isPost ? intval($isPost['m_pid']) : 0;
        
        if ( $pid )
            $this->model->m_pid = $pid;
        if ($isPost) {
            
            $sef     = isset($isPost['m_sef']) ? $isPost['m_sef'] : '';
            $type    = isset($isPost['m_level']) ? $isPost['m_level'] : '#blank';
            $page_id = isset($isPost['m_page_id']) ? intval($isPost['m_page_id']) : 0;
            $this->model->m_page_id = $page_id && $type=='#page' ? $page_id : new CDbExpression('NULL');
            $this->model->m_sef = $sef && $type!='#blank' ? $sef : '';
            
            if ($this->model->isNewRecord) {
                // вычисляем поле сортировки
                $criteria=new CDbCriteria;
                $criteria->select    = 'max(m_sort) AS maxSort';
                $criteria->condition = 'm_pid'.($pid ? '='.$pid : ' IS NULL');;
                $result = Menu::model()->find($criteria);
                $this->model->m_sort = intval($result->maxSort)+1;
                
                // вычисляем поле type
                if ($pid && $parent = Menu::model()->find('mid='.$pid)) {
                    if ($parent->m_level) // понижаем уровень
                        $this->model->m_level = $parent->m_level - 1;
                    else
                        throw new CHttpException(403,'Недопустимая операция.');
                } else // По умолчанию, на верхнем уровне создаём одноранговое меню
                    $this->model->m_level = 1;
            }
        }
    }
    
    protected function scopeModel() {
        // Для индексной страницы убираем HrefPrefix (необязательно это делать)
        $this->treeHrefPrefix = '';
    }
    
    public function beforeUpdate() {
        $this->setDefaultAttributes();
        $dir = $this->model->dir;
        if (!empty($dir))
            $this->jstree_default = '"#node_'.$dir.'"';
    }
    
    public function actionSave(){
        $Fail = false;
        if(Yii::app()->request->isPostRequest){
            try {
                $this->do_rendering = false;
                $id = intval(isset($_POST[$this->modelClass]['mid']) ? $_POST[$this->modelClass]['mid'] : 0);
                $ok = $id ? parent::actionUpdate($id) : parent::actionCreate();
                if ($ok) {
                    $this->model->getRelated('page',true); // Перечитать связанную страницу
                    $result = array('status'=>'Success','rec'=>$this->model->attributes);
                    if (!is_int($result['rec']['m_page_id']))
                        $result['rec']['m_page_id'] = null;
                    $result['url'] = $this->model->getUrl('');
                    echo json_encode($result,true);
                } else
                    $Fail = var_export($this->model->errors,true);
            } catch (Exception $exc) {
                $Fail = $exc->getMessage();
            }
        } else 
            $Fail = 'Не корректная операция';
        if ($Fail)
            echo json_encode(array('status'=>$Fail));
        Yii::app()->end();
    }
    
    function getIdsChildren($pid) {
        // если есть дочерние, то возвращает array(...)
        // если нет даже дочерних, то возвращает null
        // это сделано для того, чтобы знать, нужно ли отправлять дерево для перестроения
        // если нет дочерних, то дерево можно не перестраивать, просто удалить узел.
        settype($pid,'array');
        if (count($pid)>1)
            $list = Menu::model()->findAll(array(
                'select'=>'mid',
                'condition'=>'m_pid in ('.implode(',',$pid).')'
            ));
        else
            $list = Menu::model()->findAll(array(
                'select'=>'mid',
                'condition'=>'m_pid='.$pid[0]
            ));
        $result = array();
        foreach($list as $menu)
            $result[] = $menu->mid;
        if (count($result)) { // Чтобы не выполнять лишнюю работу при удалении
            if ($add = $this->getIdsChildren($result))
                $result = array_merge ($result,$add);
        }
        return empty($result) && empty($list) ? null : $result;
    }
    
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete(){
        // Удаление, м.б. вызвано только с индексной страницы, поэтому префикс не нужен
        $this->treeHrefPrefix = ''; // используется в makeTree
        
        $Fail = false;
        if(Yii::app()->request->isPostRequest){
            $id = intval(Yii::app()->request->getPost('id'));
            try {
                $this->loadModel($id);
                // Если меню с дочерними, то перестраиваем дерево
                $needUpdateTree =  null!==$this->getIdsChildren($id);
                if ($this->model->delete()) {
                    $result = array('status'=>'Success');
                    //if ($needUpdateTree)
                    $result['tree'] = $this->getTree(false);
                    echo json_encode($result);
                } else    
                    $Fail = 'Неудачная попытка удалить. '.$this->model->errors;
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
            'name'=>'Название пункта меню', //1
            'type'=>'html',
            'value'=>'$data->image.CHtml::encode($data->ownerName)',
            'cssClassExpression'=>'$data->m_pid?"":"isnamefield"',
        ));
        $this->insertColumn($columns, 2, array('header'=>'URL','value'=>'$data->getUrl("")'));
        $columns[3]['buttons']['delete']['visible'] = '$data->canDelete';
        $columns[3]['buttons']['update']['url']   = '$data->linkUpdateButton';
        $columns[3]['buttons']['update']['options'] = array('onclick'=>'updateObject(event,this)','class'=>'update');
        $this->deleteColumn($columns, 0);
        return $columns;
    }
    
    public function getTree($jsonEncode=true) {
        $this->makeTree(Menu::model()->findAll(array('order'=>'m_pid,m_sort,mid DESC')),$roots,'level');
        return $jsonEncode ? json_encode(array_values($roots)) : array_values($roots);
    }
    
    public function actionList(){
        $this->model=new Menu('search');
        $this->renderPartial('list');
        Yii::app()->end();
    }
    
    private function getOptions($root,$level=0) {
        if (!isset($root['children'])) return '';
        $result = ''; $groups='';
        $nbsp  = str_repeat('-&nbsp;', $level);
        $space = str_repeat('  ', $level);
        foreach ($root['children'] as $child) {
            $dataId = $child['attr']['data-id'];
            if (substr($dataId,0,1)==='o') {
                if (isset($child['children']) && count($child['children']))
                    $groups .= $space.'<optgroup label="'.$nbsp.CHtml::encode($child['data']['title']).'"></optgroup>\\'."\n"
                        .$this->getOptions($child,$level+1);
            } else
                $result .= $space.'<option value="'.$dataId.'">'.$nbsp.CHtml::encode($child['data']['title'])."</option>\\\n";
        }
        return $result.$groups;
    }
    
    public function getPages() {
        // используется при создании пункта меню ссылающегося на страницу
        // Строим дерево папок (удалённые в сторону)
        $list0 = $this->makeTree(Folder::model()->findAll(array(
            'order'=>'f_pid,f_sort,f_name,fid DESC'))
            ,$roots,'makeRoot noIcon trash');
        // Привязываем страницы к папкам
        $list1 = $this->makeTree(Page::model()->findAll(array(
            'order'=>'p_dir,p_sort,pid DESC'))
            ,$list0,'noIcon');
        // Выбираем корневой элемент дерева
        $root = isset($list1['o']) ? $list1['o'] : array();
        $options = '<option value="0">=== Выберите страницу ===</option>'.$this->getOptions($root);
        return $options;
    }
}