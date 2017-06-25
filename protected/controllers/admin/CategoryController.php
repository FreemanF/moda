<?php

class CategoryController extends CRUDController {

    public  $modelClass       = 'Category';
    public  $layout           = 'adminList';
    public  $layout_leftPanel = 'panelJStree';
    public  $jstree_default   = '"#node_o1"';
    public  $layout_index     = 'index';
    public  $treeHrefPrefix   = '/admin/category';
    public  $addAllowActions  = array('list','updatesort');
    public  $date_column      = ''; // В модели нет даты 
    public  $importStatus;

    public function withModel() {
        return array('meta');
    }
    
    public function beforeUpdate() {
        $this->jstree_default = '"#node_'.$this->model->primaryKey.'"';
    }
    
    protected function beforeValidation() {
        if(!$this->model->c_sef) {
            $this->model->c_sef = TranslitFilter::translitUrl($this->model->c_name);
            $_POST['Page']['c_sef'] = $this->model->c_sef;
        }
    }
    
    public function getIndexColumns() {
        $columns = parent::getIndexColumns();
        $this->replaceColumn($columns, 1, array(
            'name'=>'Наименование категории', //1
            'type'=>'html',
            'value'=>'$data->image.($data->primaryKey>0 ? CHtml::link(CHtml::encode($data->ownerName), $data->linkUpdateButton) : CHtml::encode($data->ownerName))',
            'cssClassExpression'=>'"isnamefield"',
        ));
        $columns[2]['buttons']['update']['options'] = array('onclick'=>'updateObject(event,this)','class'=>'update');
        return $columns;
    }
    
    public function setDefaultAttributes() {
        $obj = Yii::app()->request->getParam('dir');
        $dir = intval($obj);
        if ($dir==0 && is_string($obj) && strpos($dir, '0')===0)
            $obj = intval(substr($obj,1));
        else 
            $obj = 0;
        if ($dir) {
            $this->model->c_pid = $dir;
            $parent = Category::model()->findByPk($dir);
            $obj = $parent->c_obj;
        }
        $this->model->c_obj = $obj;
        if ($this->model->isNewRecord && isset($_POST[$this->modelClass])) {
            $criteria=new CDbCriteria;
            $criteria->select    = 'max(c_sort) AS maxSort';
            $criteria->condition = 'c_pid'.($dir ? '='.$dir : ' IS NULL').' AND c_obj='.$obj;
            $result = Category::model()->find($criteria);
            $this->model->c_sort = intval($result?$result->maxSort:-1)+1;
            
            if ($dir && $this->model->parent) {
                if ($this->model->parent->c_level!=0) // понижаем уровень
                    $this->model->c_level = $this->model->parent->c_level - 1;
                else // у меню с c_level==0 не может быть дочерних
                    throw new CHttpException(403,'Недопустимая операция.');
            } else // По умолчанию, на верхнем уровне создаём одноранговое меню
                $this->model->c_level = intval(Object::get($obj, 'have_category'))-1;
        }
    }
    
    protected function scopeModel() {
        // Для индексной страницы убираем HrefPrefix (необязательно это делать)
        $this->treeHrefPrefix = '';
    }
    
    public function actionParent() {
        $criteria = new CDbCriteria();
        
        $c_pid = isset($_POST['c_pid']) ? intval($_POST['c_pid']) : NULL;
        is_null($c_pid) ? $criteria->addCondition ('c_pid IS NULL')
                        : $criteria->compare('c_pid', $c_pid);
        $criteria->compare('c_obj', intval($_POST['c_obj']));
        $criteria->order = 'c_level DESC, c_sort ASC';
        
        $data = Category::model()->findAll($criteria);

        foreach (CHtml::listData($data, 'cid', 'c_name') as $value => $name)
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        
        Yii::app()->end();
    }

    public function rangeSort($parent_id = 0, $needIncremnt = FALSE) {
        $iCount = Category::model()->count('c_pid=' . (int) $parent_id);
        if (!$iCount)
            return array(1 => 1);
        $aReturn = $needIncremnt === 'true'
                 ? range(1, 1 + $iCount)
                 : range(1, $iCount);
        return array_combine($aReturn, $aReturn);
    }

    public function getTree($jsonEncode=true) {
        $this->makeTree(Object::getLabels('category'),$roots, 'makeRoot');
        $this->makeTree(Category::model()->findAll(array('order'=>'c_obj,c_pid,c_sort,cid DESC')),$roots,'level, redirect');
        return $jsonEncode ? json_encode(array_values($roots)) : array_values($roots);
    }
    
    public function actionTree(){
        if(Yii::app()->request->isPostRequest){
            echo $this->getTree();
            Yii::app()->end();
        }
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin/category'));
    }
    
    public function actionList(){
        $this->model=new Category('search');
        $this->renderPartial('list');
        Yii::app()->end();
    }
}
