<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 * @property CActiveRecord $model
 */
class CRUDController extends ModuleController
{
    public  $model;
    public  $modelClass;
    private $_prefix;
    private $_crudalias;
    public  $layout           = 'adminHeader';
    
    public  $layout_leftPanel = 'panelDefault';
    public  $infoAlertOnDefaultPanel = '';
    public  $editFormView = '_form';
    
    public  $layout_index     = '//layouts/stdindex';
    public  $rowopt_index     = 'array("data-id"=>$data->primaryKey)';
    public  $is_published     = false; // CheckBox published на индексной странице админки
    public  $date_column      = 'dt_start'; // Используется в getIndexColumns()
    public  $defaultContentType = 1;
    public  $autocomplete     = false; // Поиск по имени объекта
    public  $formatsearch     = 'search'; //'name'  OR 'update';
    public  $addAllowActions  = array();
    public  $deleteGenitive   = ''; // Родительный падеж удаляемого объекта (с маленькой буквы)
    public  $treeHrefPrefix   = '';
    public  $do_rendering     = true; // Используется в MenuController.actionSave
    public  $redirect         = true; // - false не переходить в список
    public  $enableAddButton  = false;
    public  $labelAddButton   = 'Добавить';
    public  $enableNotice  = false; // Используется в заголовке модальной формы при удалении на индексной странице админки
    public  $enableSearch  = true;  // Разрешаем сортировку и фильтрацию на индексной странице
    public  $socialObject  = 'новость';  // Объект публикации в социалках по умолчанию (используется в метке при редактировании объекта)
    public  $messageObjectSaved = 'Запись успешно добавлена.';
    public  $indexPackage  = 'admin-index';
    public  $indexRowCssClassExpression = '';
    
    public function getPrefix($model=null) {
        if ($this->_prefix===null) {
            if (is_null($model)) $model = $this->model;
            if ($model && $behavior = $model->asa('PrefixedModel'))
                $this->_prefix = $behavior->ownerPrefix;
            else {
                $this->_prefix = '';
            }
        }
        return $this->_prefix;
    }
    
    public function field($suffix='name',$sep='_',$model=null) {
        // используется в stdindex
        return $this->getPrefix($model).$sep.$suffix;
    }

    public function withModel() {
        return array('media');
    }
    
    public function addScope($model) {
        return $model->disableDefaultScope();
    }
    
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        $actions = array_merge(array('index','create','update','delete'),
                $this->addAllowActions);
        return array(
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>$actions,
                    'roles'=>array('Module'.$this->modelClass),
                ),
                array('deny',  // deny all users
                    'users'=>array('*'),
                ),
        );
    }

    public function setDefaultAttributes() {
        if ($this->date_column)
            $this->model->dt_start = date('Y-m-d H:i:s');
        if ($this->defaultContentType)  // 1- TinyMCE; 2 - Markdown;
            $this->model->content_type = $this->defaultContentType;
        if ($this->is_published!==false)
            $this->model->is_published  = $this->is_published;
    }
    
    public function afterSave() { // Используется в actionCreate & actionUpdate
        return true;
    }
    
    public function errorSave() { // Используется в actionCreate & actionUpdate
        return false;
    }
    
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $class = $this->modelClass;
        $this->model = new $class();
        $this->setDefaultAttributes();
        if (isset($_POST[$this->modelClass]))
        {
            $this->model->attributes=$_POST[$this->modelClass];
            $this->performAjaxValidation();

            if($this->model->save()) {
                $data = $this->afterSave();
                if ($this->do_rendering) {
                    Yii::app()->user->setFlash('saveobject',$this->messageObjectSaved);
                    if ($this->redirect)
                        $this->redirect(
                            (isset($_POST['buttonSave']) && $_POST['buttonSave']=='Сохранить') ? '/admin/'.$this->crudalias
                                                                                               : '/admin/'.$this->crudalias.'/update?id='.$this->model->primaryKey);
                    else
                        return $data;
                } else return $data;
            } else {
                $this->errorSave();
                Yii::log('AFTER CREATE ERROR:'.var_export($this->model->errors,true));
                if ( ! $this->do_rendering) return false;
            }
        }

        if ($this->do_rendering)            
            $this->render('_form');
        else return true;
    }

    public function beforeUpdate() {
        return true;
    }
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $this->loadModel($id);
        $this->beforeUpdate();
        if(isset($_POST[$this->modelClass]))
        {
            $this->model->attributes = $_POST[$this->modelClass];
            $this->performAjaxValidation();

            if ($this->model->save()) {
                $data = $this->afterSave();
                if ($this->do_rendering) {
                    if (!Yii::app()->user->hasFlash('nosaveobject'))
                        Yii::app()->user->setFlash('saveobject','Запись успешно отредактирована.');
                    $this->redirect(
                            (isset($_POST['buttonSave']) && $_POST['buttonSave']=='Сохранить') ? '/admin/'.$this->crudalias
                                                                                               : '/admin/'.$this->crudalias.'/update?id='.$this->model->primaryKey);
                } else return $data;
            } else {
                $this->errorSave();
                Yii::log('AFTER UPDATE ERROR:'.var_export($this->model->errors,true));
                if ( ! $this->do_rendering) return false;
            }
        }
        if ($this->do_rendering)
            $this->render($this->editFormView);
        else return true;
    }

    public function beforeDelete($model) {
        // Ф-я возвращает сообщение об ошибке или ''
        return '';
    }
    
    public function afterDelete() {
    }
    
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete(){
        $Fail = false;
        if(Yii::app()->request->isPostRequest){
            $id = Yii::app()->request->getPost('id');
            try {
                $model = $this->loadModel($id);
                $Fail=$this->beforeDelete($model);
                if (empty($Fail))
                    if ($model->delete()) {
                        echo json_encode(array('status'=>'Success','res'=>$this->afterDelete($model)));
                    } else
                        $Fail = 'Неудачная попытка удалить. '.$model->errors;
            } catch (Exception $exc) {
                $Fail = $exc->getMessage();
                if (strpos($Fail,'FOREIGN KEY (`z_user`) REFERENCES `User` (`uid`)')!==false)
                    $Fail = 'Пользователь вносил изменения на сайт. Чтобы удалить пользователя, необходимо сначала почистить протокол.';
                else
                if (strpos($Fail,'foreign key constraint')!==false)
                    $Fail = 'Невозможно удалить используемый объект';
            }
        } else 
            $Fail = 'Не корректная операция';
        if ($Fail)
            echo json_encode(array('status'=>$Fail));
        Yii::app()->end();
    }

    public function getFilterAjaxUpdate() { // используется в //layouts/stdindex
        // Обновляем элементы на форме после фильтрации
        return 
            '$(".filterSelectBox").select2({dropdownCssClass: "noSearch", width: "element"});'.
            'updateSortableFilter();'.
            ($this->autocomplete ? 'initAutocomplete(true);':'').
            ($this->is_published!==false ? 'if ($(".uniformPublished").length) updateCBS();':'').
            ($this->date_column  ? 'jQuery("#filter_'.$this->date_column.
                '").datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional["ru"], {"dateFormat":"dd-mm-yy"}));':'');
    }
    
    public function getNameFieldInfo() {
        return array( //1
            'name'=>$fieldname=$this->field('name'),
            'type'=>'html',
            'value'=> 'CHtml::link(CHtml::encode($data->ownerName), "/admin/'.$this->crudalias.'/update?id=".$data->primaryKey)',
            'cssClassExpression'=>'"isnamefield"',
            'filter'=>CHtml::textField($this->modelClass.'['.$fieldname.']',$this->model->ownerName,array('id'=>'namesearch')),
            );
    }
    
    // Добавление/удаление столбцов в actionIndex
    public function getIndexColumns() { // используется в //layouts/stdindex
        // 0 - id
        // 1 - name
        // 2 - dt_start         // condition
        // 3 - is_published     // condition
        // 4 - Buttons
        $columns = array(
            array( //0
                'header'=>'ID',
                'name'=>$this->field('id',''),
                'htmlOptions'=>array('width'=>'60px'),
            ),
            $this->getNameFieldInfo(),
            array( //4
                'header'=>'Действия',
                'class'=>'CButtonColumn',
                'template'=>'{update} {delete}',
                'buttons'=>array(
                    'update' => array(
                        'label'=>'Редактировать',
                        'imageUrl'=>$this->themeImages.'photon/icons/default/edit.png',
                    ),
                    'delete' => array(
                        'label'=>'Удалить',
                        'imageUrl'=>$this->themeImages.'photon/icons/default/delete-item.png',
                        'options' => array(
                            'onclick'=>'deleteObject(event,this)',
                            'class'=>'delete'),
                        'url'=>'',
                    ),
                ),
            ),
        );
        if ($this->autocomplete) {
            $cs = Yii::app()->clientScript;
            $cs->registerPackage('adminAutocomplete');
            $cs->registerScript('nameSearch',<<<NAMESEARCH
idsearch = '#namesearch';
typesearch = '$this->autocomplete';
formatsearch = '$this->formatsearch';   
NAMESEARCH
,CClientScript::POS_END);
        }
        if ($this->is_published!==false)
            $this->insertColumn($columns, 2, // 3
                $this->columnPublished($this->model->objectType)
            );
        if ($this->date_column)
            $this->insertColumn($columns, 2, 
                array(//'name'=>'dt_start', //2
                    'header'=>'Начало публикации',
                    'name' =>$this->date_column, // чтобы работала сортировка
                    'value'=>'Comportable::humanDate($data->'.$this->date_column.')',
                    'type' => 'raw',
                    'filter'=>$this->widget('ext.CJuiDateTimePicker.CJuiDateTimePicker',array(
                        'id'=>'filter_'.$this->date_column,
                        'attribute'=>$this->date_column,
                        'model'=>$this->model,
                        'mode'=>'date',
                        'options'=>array('dateFormat'=>'dd-mm-yy'), // jquery plugin options
                    ),true)
                )
            );
        return $columns;
    }
    
    protected function insertColumn(&$columns,$pos,$item) {
        array_splice( $columns, $pos, 0, array($item) );
    }
    
    protected function replaceColumn(&$columns,$pos,$item) {
        array_splice( $columns, $pos, 1, array($item) );
    }
    
    protected function deleteColumn(&$columns,$pos) {
        array_splice( $columns, $pos, 1 );
    }
    
    protected function appendColumn(&$columns,$item) {
        $columns[] = $item;
    }
    
    protected function scopeModel() {
        // должна использоваться только в actionIndex, см. PageController.actionIndex
        
    }
    
    protected function scopeUpdate($preparedModel) {
        // должна использоваться только в actionUpdate, см. UserController
        return $preparedModel;
    }
    
    public function columnPublished($objectType) {
        // допустимо использовать только с одним $objectType на странице
        Yii::app()->getClientScript()->registerScript('cbPublished',<<<CBPUBLISHED
//console.log('cbPublished');
function updateCBS (action,clazz) {
    action = action || 'published';
    clazz  = clazz  || 'uniformPublished';
    //console.log(action,clazz);
    var cbs = $('.'+clazz);
    cbs.uniform();
    cbs.click(function(){
        var th = $(this);
        var newstate = th.attr("checked")==undefined ? 0 : 1;
        var id = th.closest('tr').data('id');
        $.ajax('/admin/admin/'+action, {
            type:"POST",
            data: {id:id,state:newstate,type:"$objectType"},
            success:function(data) {
                if (data=='Ok')
                    if (newstate) th.attr("checked","checked");
                    else          th.removeAttr("checked");
                else
                    if (newstate) th.removeAttr("checked");
                    else          th.attr("checked","checked");
                $.uniform.update(th);
                if (data!='Ok')
                    if (data.length<100)
                        alert(data);
                    else {
                        console.log(data);
                        alert("Сбой операции: обновите страницу.")
                    }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                if (newstate) th.removeAttr("checked");
                else          th.attr("checked","checked");
                $.uniform.update(th);
                alert("Не удалось изменить состояние");
            },
        });
    });
}
$(function(){ updateCBS(); });            
CBPUBLISHED
,CClientScript::POS_END);
            
            
        return array(
            'class'=>'CCheckBoxColumn', 
            'selectableRows'=>0,
            'checkBoxHtmlOptions' => array(
                'class'=>'uniformPublished',
                'name' =>false,
            ),
            'header'=>'Публиковать',
            'checked'=>'$data->is_published',
            'value'=>'1',
            'htmlOptions'=>array(
                //'width'=>'40px',
                'style'=>'text-align:center;'
                ),
            );
    }
    
    /**
     * Manages all models.
     */
    public function getCrudalias() {
        if ($this->_crudalias===null)
            $this->_crudalias = lcfirst($this->modelClass);
        return $this->_crudalias;
    }
    
    public function setCrudalias($crudalias) {
        $this->_crudalias=$crudalias;
    }
    
    public function actionIndex()
    {
        $this->enableAddButton = true;
        $class = $this->modelClass;
        $this->model=new $class('search');
        $this->model->disableDefaultScope()->unsetAttributes();  // clear any default values
        if(isset($_GET[$this->modelClass]))
            $this->model->attributes=$_GET[$this->modelClass];

        $this->scopeModel();
        
        $this->render($this->layout_index,array(
            //'crudalias'   => $this->crudalias,
            'delgenitive' => $this->deleteGenitive ? $this->deleteGenitive : 
                Object::getGenitive($this->model->objectType),
            ));
    }

    public function prepareIndexOptions($widgetGridViewOptions) {
        return $widgetGridViewOptions;
    }
    
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Article the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        if ($this->model===null || $this->model->primaryKey!=$id) {
            $class = $this->modelClass;
            $preparedModel = $this->addScope($class::model());
            foreach($this->withModel() as $addModel)
                $preparedModel->with($addModel);
            $preparedModel = $this->scopeUpdate($preparedModel); // Накладываем доп. ограничения (например доступ)
            $this->model = $preparedModel->findByPk($id);
            if($this->model===null)
                    throw new CHttpException(404,'Запрошенный объект больше не существует.');
        }
        return $this->model;
    }

    /**
     * Performs the AJAX validation.
     * @param Article $model the model to be validated
     */
    protected function beforeValidation() {
        if ($this->defaultContentType)
            switch ($this->model->content_type) {
                case 1: // 1 = TinyMCE
                    $this->model->content_long  = Comportable::ClearPHPTags($this->model->content_long);
                    break;

                default: // 2 = Markdown
                    $this->model->content_long  = Comportable::ClearPHPTags($this->model->content_long);
                    break;
            }
    }
    
    protected function performAjaxValidation()
    {   
        $this->beforeValidation();
        if(isset($_POST['ajax']) && $_POST['ajax']===$this->model->ownerClass.'-form')
        {
            echo CActiveForm::validate($this->model,null,false); // не устанавливаем и не считываем атрибуты
            Yii::app()->end();
        }
    }
    
    public function makeTree($selectedItems,&$roots,$options='') {
        $makeRoot = strpos($options,'makeRoot') !== false;
        $noIcon   = strpos($options,'noIcon') !== false;
        $trash    = strpos($options,'trash') !== false;
        $level    = strpos($options,'level') !== false;
        $rootPrefix = empty($roots) && !$makeRoot ? '' : 'o';
        $pid    = null;
        $prefix = null;
        $list = array();
        $deleted = array();
        settype($roots,'array');
        foreach($roots as $key=>$item)
            $list[$key] = &$roots[$key];
        
        foreach ($selectedItems as $key=>$item) {
            $del = false;
            if (is_string($item)) {
                $id   = $key;
                $name = $item;
            } else {
                if ($prefix===null)
                    $prefix = $item->ownerPrefix.'_';
                $id   = $item->primaryKey;
                $name = $item->ownerName;
                $pid  = $item->getDir('o',$makeRoot); //{$prefix.'pid'}; 
                if ($trash && $item->is_delete) {
                    $deleted[$id] = true; // Изначально кладём удалённые в корень корзины
                    if (isset($deleted[$pid])) // если родитель удалён
                        $deleted[$id] = false; // то дочерний не в корне корзины
                    $del = true;
                }
                if (empty($pid) && $rootPrefix)
                    $pid = $rootPrefix.$item->{$prefix.'obj'};
            }
            if ($makeRoot) $id = $rootPrefix.$id;
            if (isset($list[$id])) {
                if ($trash && isset($list[$id]['children']))
                if ( $del ) {
                    foreach($list[$id]['children'] as $child) {
                        $cid = $child['attr']['data-id'];
                        if(isset($deleted[$cid]))
                            $deleted[$cid] = false; // дочерние не в корне корзины
                    }
                } else { // убираем удалённые дочерние из неудалённых родительских
                    foreach($list[$id]['children'] as $key=>$child) {
                        $cid = $child['attr']['data-id'];
                        if (isset($deleted[$cid]))
                            unset($list[$id]['children'][$key]);
                    }
                }
            } else
                $list[$id] = array();
            $data = array(
                'title' => $name,
                'attr'  => array(
                    'href'=> $this->treeHrefPrefix.'#node_'.$id,
                    //'name'=> $name,
                ),
            );
            if (!($makeRoot || $noIcon))
                $data['icon'] = $this->themeImages."photon/txt.png";
            
            $attr = array("id"=>'node_'.$id,'data-id'=>$id);
            if ($level) {// одноуровневые/многоуровневые меню
                $attr['data-level']=$item->{$prefix.'level'};
                if ($item->{$prefix.'level'} && isset($data['icon']) && $item->{$prefix.'pid'}==null)
                    unset($data['icon']);
            }
            
            $list[$id]['data'] = $data;            
            $list[$id]['attr'] = $attr;
            if ($pid) {
                if (!isset($list[$pid]))
                    $list[$pid] = array();
                if (!isset($list[$pid]['children']))
                    $list[$pid]['children'] = array();
                unset($list[$pid]['data']['icon']);
                if (isset($deleted[$pid]) || !$del)
                    $list[$pid]['children'][] = &$list[$id];
            } else{
                if ($makeRoot)
                    $roots[$id] = &$list[$id];
                else
                    if ($rootPrefix)
                        $roots[$id]["children"][] = &$list[$id];
                    else
                        if ( ! $del )
                        $roots[$id] = &$list[$id];
            }
        }
        if ($trash) { // Корзину добавляем последней к списку $roots 
            if (! isset($list['trash']))
                $list['trash'] = array();
            $roots['trash'] = &$list['trash'];
            
            $list['trash']['data'] = array(
                'title' => 'Корзина',
                'attr'  => array('href'=> $this->treeHrefPrefix.'#trash'));
            $list['trash']['attr'] = array("id"=>'trash','data-id'=>'trash');
            $del = true; // Удалённых нет в корне корзины
            foreach($deleted as $id=>$root) if ($root) {
                if ($del) {
                    $del = false;
                    $list['trash']['children'] = array();
                }
                $list['trash']['children'][] = &$list[$id];
            }
        }
        return $list;
    }
}
