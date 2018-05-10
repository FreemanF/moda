<?php

class TovarController extends CRUDController
{
    public    $modelClass     = 'Tovar';
    protected $_pageTitle     = 'Товар';
    public    $labelAddButton = 'Добавить товар';
    protected $actionTitles   = array('create'=>'Добавить товар','update'=>'Редактирование товара');

    public function setDefaultAttributes() {
        parent::setDefaultAttributes();
        $this->_pageTitle = 'Добавление товара';
    }
    
    public function withModel() {
        return array("media");
    }
    
    protected function beforeValidation() {
        if(!$this->model->tv_sef)
            $this->model->tv_sef = TranslitFilter::translitUrl($this->model->tv_name);
    }
    
    public function getIndexColumns() {
        // 0 - id
        // 1 - name
        // 2 - dt_start
        // 3 - Buttons
        $columns = parent::getIndexColumns();
        $this->insertColumn($columns, 2, array(
           'header' => 'Рубрика',
           'name' => 'category_search',
           'value' => '$data->category->c_name',
           'filter' => CHtml::dropDownList('Tovar[tv_cat_main]',$this->model->tv_cat_main,
                Category::getList(Object::idTovar),
                array(
                    'empty'=>array(0=>'Все рубрики'),
                    'class'=>'filterSelectBox')
                ),
            ));
        return $columns;
    }
    
    public function actionAttribute() {
        $Result = array('status'=>'Success');
        $Fail = 'Не POST запрос';
        if(Yii::app()->request->isPostRequest){
            try {
                $Fail = '';
                $Result['attribute'] = '
                    <div class="control-group row-fluid">
                        <div class="span12">
                            <label class="control-label">Нет атрибутов</label>
                        </div>
                    </div>';
                $cat = Yii::app()->request->getPost('cat');
                if ( $category=Category::model()->findByPk($cat) ) {
                    $attributes = $category->c_level 
                                ? $category->attribute
                                : $category->parent->attribute;
                    if ($attributes) {
                        $Result['attribute'] = '';
                        foreach ($attributes as $attribute)
                            $Result['attribute'] .= '
                                <div class="control-group row-fluid">
                                    <div class="span3">
                                        <label class="control-label" for="Attribute_'.$attribute->atid.'">'.$attribute->at_name.'</label>
                                    </div>
                                    <div class="span8">
                                        <div class="controls">
                                            <input id="Attribute_'.$attribute->atid.'" name="Attribute['.$attribute->atid.']" maxlength="255" size="60" value="" type="text" />
                                        </div>
                                    </div>
                                    <div class="span1">
                                        <div class="control-label">
                                            <input class="AttributeInCatalog" type="checkbox" name="AttributeInCatalog['.$attribute->atid.']" value="1">
                                        </div>
                                    </div>
                                </div>';
                    }
                }
            } catch (Exception $exc) {
                $Fail = 'ProductController.actionAttribute EXCEPTION: '.$exc->getMessage();
            }
        }
        if ($Fail) {
            Yii::log('TovarController.actionAttribute : '.$Fail);
            echo json_encode(array('status'=>$Fail));
        } else
            echo json_encode($Result);
        Yii::app()->end();
    }
    
}