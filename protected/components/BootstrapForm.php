<?php

/**
 * @property CRUDController $controller
 * @property CActiveRecord $model
 * @property Media $media
 */
class BootstrapForm extends CActiveForm
{
    private $_controller;
    private $_model;
    private $_prefix;
    private $_media;
    public  $mediaType;
    public  $mediaPostID;
    public  $mediaWithSort;
    public  $mediaWithColor;
    public  $mediaLabel;
    private $_currmodel;
    private $_relation = array();
    private $_mainmodel = false;
    private $_rawmodel; // главная модель
    private $_attribute;
    public  $hasChecked = false;
    private $_editors = array();
    public  $bootstrapValidation;
    public  $multilang  = false;
    private $_withDot   = false;
    private $_metaField = false;
    
    public function init() {
        if ($this->bootstrapValidation) {
            $this->enableAjaxValidation=true;
            //'enableClientValidation'=>true,
            $this->clientOptions=array(
                'inputContainer'=>'.controls',
                'errorCssClass'=>'error-validate',
                'validateOnSubmit'=>true,
                'validateOnChange'=>true,
                'validateOnType'=>true,
                'beforeValidate'=> 'js:function() { if ("tinyMCE" in window && tinyMCE.editors.length && tinyMCE.triggerSave) tinyMCE.triggerSave(); return true;}',
                'afterValidate' => "js: function(form, data, hasError) { $('#summaryValidate').toggleClass('error-validate',hasError); return true; }",
            );
        }
        parent::init();
    }
    
    public function setController($controller) {
        $this->_controller = $controller;
        if (is_null($this->_rawmodel))
            $this->setModel($controller->model);
    }
    
    public function getController() {
        return $this->_controller;
    }
    
    private function mainmodel() {
        if ($this->_mainmodel) return $this->_currmodel;
        if ($this->_model===NULL) {
            $this->_model = $this->_rawmodel;
        }
        $this->_mainmodel = true;
        $this->_currmodel = $this->_model;
        return $this->_currmodel;
    }
    
    public function getModel() {
        return  $this->_currmodel===NULL ? $this->mainmodel() : $this->_currmodel;
    }
    
    public function setModel($model) {
        $this->_rawmodel=$model;
        //if (!$this->getId(false))
             $this->setId($model->ownerClass.'-form');
    }
    
    public function getMedia() {
        if ($this->_media===null) {
            $mainmodel = $this->mainmodel();
            $this->mediaType     = $mainmodel->mediaType;
            $this->mediaPostID   = $mainmodel->mediaPostID;
            $this->mediaWithSort = $mainmodel->withSort;
            $this->_media = $mainmodel->mediaStuff;
        }
        return $this->_media;
    }
    
    public function setMediaBehavior($mediaBehavior) {
        $behavior = $this->mainmodel()->asa($mediaBehavior);
        $this->mediaType     = $behavior->mediaType;
        $this->mediaPostID   = $behavior->mediaPostID;
        $this->mediaWithSort = $behavior->withSort;
        $this->mediaWithColor= $behavior->withColor;
        $this->_media = $behavior->mediaStuff;
        $this->mediaLabel = $behavior->media_label;
    }
    
    public function getPrefix() {
        if ($this->_prefix===null) {
            if ($this->model && $behavior = $this->model->asa('PrefixedModel'))
                $this->_prefix = $behavior->ownerPrefix;
            else {
                $this->_prefix = '';
            }
        }
        return $this->_prefix;
    }
    
    public function setPrefix($prefix) {
        $this->_prefix = $prefix;
    }
    
    public function field($suffix='name',$sep='_',$model=null) {
        return $this->prefix.$sep.$suffix;
    }
    
    public function fieldBS($attribute='',$separator='_') {
        // Пустая строка возвращает предыдущее имя атрибута
        // Минус в конце имени означает, что не нужно сохранять имя текущего атрибута
        // Знак равенства вначале, означает что к имени не нужно приклеивать префикс модели
        // =content_type   => content_type
        // name-           => i_name
        if ($attribute) {
            $this->_withDot = strpos($attribute,'.')!==false;
            $this->_metaField = false;
            if ($this->_withDot) {
                $model = explode('.', $attribute);
                $attribute = array_pop($model);
                $this->_metaField = strpos($attribute,'e_')===0 ? $attribute : false;
                $modelstr = implode('.', $model);
                if (isset($this->_relation[$modelstr])) {
                    $this->_mainmodel = false;
                    $this->_currmodel = $this->_relation[$modelstr];
                } else {
                    $temp = $this->mainmodel();
                    foreach($model as $item) 
                        $temp = is_numeric($item) ? $temp[$item] : $temp->$item;
                    $this->_mainmodel = false;
                    $this->_relation[$modelstr] = $temp;
                    $this->_currmodel = $temp;
                }
            } else {
                $this->mainmodel();
                if ($nosave = substr($attribute,-1)==='-')
                    $attribute = substr($attribute,0,-1);
                $attribute = (substr($attribute,0,1)==='=') 
                        ? substr($attribute,1) : $this->field($attribute,$separator);
                if ($nosave) {
                    return $attribute;
                }
            }
            $this->_attribute = $attribute;
        }
        return $this->_attribute;
    }
    
    public function valueBS($attribute='',$separator='_') {
        return $this->model->{$this->fieldBS($attribute,$separator)};
    }
    
    public function errorSummaryBS($header = null, $footer = null, $htmlOptions = array()) {
        if ( $error = $this->errorSummary($this->model, $header, $footer, $htmlOptions)) {
            $style = ''; // strpos($error,'display:none')===false?'':' style="display:none"';
            //if (strpos($error,'display:none')===false)
            return '<div id="summaryValidate" class="container validate"'.$style.'><div class="alert alert-block"><i class="icon-alert icon-alert-info"></i>'.$error.'</div></div>';
        }
        return '';
    }

    public function errorBS($attribute='', $htmlOptions = array(), $enableAjaxValidation = true, $enableClientValidation = true) {
        $divOptions = $this->getOptions('divOptions',$htmlOptions);
        if( $error = $this->error(
                $this->model, $this->fieldBS($attribute), $htmlOptions,
                $enableAjaxValidation, $enableClientValidation)) {
            
            $style = (isset($divOptions['style']) && $divOptions['style']) 
                ? ' style="'.$divOptions['style'].'"'
                : ''; 
            $br = (isset($divOptions['withoutBR']) && $divOptions['withoutBR'])
                ? '' : '<br/>';
            return '<div class="validate"'.$style.'>'.$br.'<div class="alert alert-block validate"><i class="icon-alert icon-alert-info"></i>'.$error.'</div></div>';
        }
        return '';
    }

    public function errorBS2($model,$attribute) {
        if( $error = $this->error($model, $attribute) ) {
            $style = ''; //strpos($error,'display:none')===false?'':' style="display:none"';
            return '<div class="validate"'.$style.'><br/><div class="alert alert-block"><i class="icon-alert icon-alert-info"></i>'.$error.'</div></div>';
        }
        return '';
    }
    
    public function labelExBS($attribute='', $htmlOptions = array('class'=>'control-label')) {
        return $this->labelEx($this->model, $this->fieldBS($attribute), $htmlOptions);
    }

    public static function getOptions($name,&$htmlOptions,$default=array()) {
        $options = array();
        if (isset($htmlOptions[$name])&&is_array($htmlOptions[$name])) {
            $options = $htmlOptions[$name];
            unset($htmlOptions[$name]);
        }
        foreach($default as $key=>$value) {
            if (isset($options[$key])) {
                if($options[$key]===false)
                    unset($options[$key]);
            } else
                $options[$key] = $value;
        }
        return $options;
    }
    
    public function bootstrapRow($input,$footer='',$htmlOptions = array()) {
        
        $labelOptions = $this->getOptions('labelOptions',$htmlOptions,array('class'=>'control-label'));
        $validateOptions = $this->getOptions('validateOptions',$htmlOptions);
        $label   = $this->labelExBS('',$labelOptions);
        if ($this->_metaField) {
            switch ($this->_metaField) {
            //case 'i_original'    : $afterLabel = Bootstrap::infoTooltip('Размер картинки не должен превышать 2Мб'); break;
            case 'e_title'       : $afterLabel = Bootstrap::infoTooltip('Значение тега title для данной страницы'); break;
            case 'e_keywords'    : $afterLabel = Bootstrap::infoTooltip('Наиболее значимые ключевые слова данной страницы разделенные запятой. Используется для заполнения мета-тег keywords'); break;
            case 'e_description' : $afterLabel = Bootstrap::infoTooltip('Короткое описание данной страницы. Используется для заполнения мета-тег description'); break;
            default: $afterLabel = '';
            }
            if ($afterLabel) $htmlOptions['afterLabel'] = $afterLabel;
        }
        $control = $this->errorBS('',$validateOptions).$input;
        if ($footer)
            $htmlOptions['footer'] = '<div class="span12">'.$footer."</div>\n";
        return $this->bootstrapRow3($label, $control, $htmlOptions);
    }
    
    public function bootstrapRow2($label,$control,$htmlOptions = array()) {
        $htmlOptions['noframe'] = true;
        return $this->bootstrapRow3($label, $control, $htmlOptions);
    }
    
    public function bootstrapRow3($label,$control,$htmlOptions = array()) {
        $beforeLabel= isset($htmlOptions['beforeLabel'])? $htmlOptions['beforeLabel'].' ': '';
        $afterLabel = isset($htmlOptions['afterLabel']) ? ' '.$htmlOptions['afterLabel'] : '';
        $rowClass   = isset($htmlOptions['rowClass'])   ? ' '.$htmlOptions['rowClass']   : '';
        $spanClass  = isset($htmlOptions['spanClass'])  ? ' '.$htmlOptions['spanClass']  : '';
        $controllClass = isset($htmlOptions['controllClass']) ? ' '.$htmlOptions['controllClass'] : '';
        $footer = isset($htmlOptions['footer']) ? $htmlOptions['footer'] : '';
        $hide = (isset($htmlOptions['hide']) && $htmlOptions['hide']) ? ' style="display:none;"' : '';
        $beforeControl ='<div class="controls'.$controllClass.'">'; 
        $afterControl  ='</div>';
        if (isset($htmlOptions['noframe']) && $htmlOptions['noframe'] ) {
            $beforeControl =''; 
            $afterControl  ='';
        }
        
        $rowOptions = $this->getOptions('rowOptions',$htmlOptions);
        if (isset($rowOptions['class'])) {
            $rowClass.=' '.$rowOptions['class'];
            unset($rowOptions['class']);
        }
        $rowAttributes = '';
        foreach($rowOptions as $id=>$value)
            $rowAttributes .= " $id=\"".CHtml::encode($value).'"';
        
        return '
        <div class="control-group row-fluid'.$rowClass.'"'.$hide.$rowAttributes.'>
            <div class="span3">
                '.$beforeLabel.$label.$afterLabel.'
            </div>
            <div class="span9'.$spanClass.'">
                '.$beforeControl.$control.$afterControl.'
            </div>'.$footer.'
        </div>';
    }
    
    public function textFieldBS2($attribute='', $htmlOptions = array(),$password=false) {
        $textOptions = $this->getOptions('textOptions', $htmlOptions, array('size'=>60,'maxlength'=>255));
        $fname = $this->fieldBS($attribute);
        return $password 
            ? $this->passwordField($this->model, $fname, $textOptions)
            : $this->textField($this->model, $fname, $textOptions);
    }
    
    public function textFieldBS($attribute='', $htmlOptions = array(),$password=false,$append='') {
        return $this->bootstrapRow($this->textFieldBS2($attribute, $htmlOptions,$password).$append,'',$htmlOptions);
    }
    
    public function textAreaBS($attribute='', $htmlOptions = array()) {
        $textOptions = $this->getOptions('textOptions', $htmlOptions, array('size'=>60,'maxlength'=>4096,'style'=>'height:140px'));
        $fname = $this->fieldBS($attribute);
        return $this->bootstrapRow($this->textArea($this->model, $fname, $textOptions),'',$htmlOptions);
    }
    
    public function datetimeFieldBS($attribute='',$mode='datetime',$htmlOptions=array()) {
        $dateOptions = $this->getOptions('dateOptions', $htmlOptions);
        if (isset($dateOptions['class'])) {
            if ($dateOptions['class']===false)
                unset($dateOptions['class']);
        } else
            $dateOptions['class'] = 'span4';
        
        $style = isset($dateOptions['style']) && $dateOptions['style']
            ? $dateOptions['style'] : '';
        
        Yii::import('ext.CJuiDateTimePicker.CJuiDateTimePicker');
        
        return $this->bootstrapRow(
            $this->_controller->widget('CJuiDateTimePicker',array(
                'attribute'=>$this->fieldBS($attribute),
                'model'=>$this->model,
                'htmlOptions'=>$dateOptions,
                'mode'=>$mode, //use "time","date" or "datetime" (default)
                'options'=>array('dateFormat' =>'dd-mm-yy',
                                 'showSecond' =>false,
                                 'timeFormat' =>'hh:mm',
                                 'timeText'   =>'Время',
                                 'hourText'   =>'Часы',
                                 'minuteText' =>'Минуты',
//                                 'showOn'     => 'button',
//                                 'buttonImage'=>'images/calendar.gif',
//                                 'buttonImageOnly'=>true
                                 //'secondText'=>'Секунды',
                    ) // jquery plugin options
            ),true),'',$htmlOptions
        );
    }
    
    public static function colorPickerScript($id, $color,$operation=true) {
        $updateValue = $operation ?
'function(color){
   $("#'.$id.'").css({"background-color":color,color: this.hsl[2] > 0.5 ? "#000" : "#fff"}).val(color);
  '.($operation===true?'':$operation.';').'
}' : '"#'.$id.'"';
        $cs = Yii::app()->clientScript;
        $cs->registerPackage('colorpicker');
        $cs->registerScript('colorPicker_'.$id,<<<COLORPICKER
$('#$id').bind('keyup',$.farbtastic($('#$id').next(),$updateValue).setColor('$color').updateValue);
COLORPICKER
,CClientScript::POS_READY);
    }

    public function colorPickerBS($attribute='', $htmlOptions = array(),$operation=true) {
        $textOptions = $this->getOptions('textOptions', $htmlOptions, array());
        $fname = $this->fieldBS($attribute);
        //$id=self::getIdByName(self::resolveName($this->model, $fname));
        CHtml::resolveNameID($this->model, $fname, $textOptions);
        $value = CHtml::resolveValue($this->model, $fname);
        $id = $textOptions['id'];
        self::colorPickerScript($id, $value, $operation);
//$('.colorpicker').prev().each(function(){
//    var input = $(this);
//    input.next().farbtastic('#'+input.attr('id'));
//});
        return $this->bootstrapRow($this->textField($this->model, $fname, $textOptions).'<div class="colorpicker"></div>','',$htmlOptions);
    }
    
    public function dropDownListBS($attribute, $data, $htmlOptions = array()) {
        $fname = $this->fieldBS($attribute);
        if (!isset($htmlOptions['class'])) 
            $htmlOptions['class'] = 'simpleSelectBox';
        if (!isset($htmlOptions['options'])) {
            // Выбранное в списке значение
            $htmlOptions['options'] = array($this->valueBS($attribute) => array('selected'=>true));
            $attribute = ''; // valueBS вычислило название поля, больше не нужно вычислять
        }
        if (isset($htmlOptions['hide'])) {
            $hide = (boolean)$htmlOptions['hide'];
            unset($htmlOptions['hide']);
        } else
            $hide = false;
        
        if (isset($htmlOptions['inputonly'])) {
            $inputonly = $htmlOptions['inputonly'];
            unset($htmlOptions['inputonly']);
        } else 
            $inputonly = false;
        
        $input = $this->dropDownList($this->model, $fname, $data, $htmlOptions);
        if ($inputonly)
            return $input;
        
        return $this->bootstrapRow($input,'',array('hide'=>$hide));
    }
    
    public function checkBoxBS($attribute, $htmlOptions = array(), $values = array('НЕТ','ДА')) {
        $checkBoxOptions = $this->getOptions('checkBox',$htmlOptions);
        if (isset($htmlOptions['inverse'])) {
            if ($htmlOptions['inverse']) {
                $checkBoxOptions['value'] = 0;
                $checkBoxOptions['uncheckValue'] = 1;
            }
            unset($htmlOptions['inverse']);
        }
        if (isset($htmlOptions['values']) && is_array($htmlOptions['values'])) {
            $values = $htmlOptions['values'];
            unset($htmlOptions['values']);
        }
        
        if (isset($htmlOptions['input'])) {
            $input = $htmlOptions['input'];
            unset($htmlOptions['input']);
        } else 
            $input = '';
        
        if (isset($htmlOptions['spanClass'])) {
            if ($htmlOptions['spanClass']===false)
                unset($htmlOptions['spanClass']);
        } else 
            $htmlOptions['spanClass'] = 'span-inset';
        
        
        $nameField = $this->fieldBS($attribute);
        return $this->bootstrapRow(
            '<div id="switch_'.$nameField.'" data-on-label="'.$values[1].'" data-off-label="'.$values[0].
                '" class="switch switch-small" data-on="success" data-off="danger" style="margin-left:-10px">'.
                $this->checkBox($this->model,$nameField, $checkBoxOptions).
            '</div>'.$input,'',$htmlOptions);
    }
    
    public function checkBoxAndFieldBS($cbAttribute, $input) {
        $error = $this->errorBS();

        $nameCB  = $this->fieldBS($cbAttribute);
        $label   = $this->labelExBS('',array('class'=>'control-label'));
        $error  .= $this->errorBS();
        
        return '<style> .cbandinput {padding: 15px 0 0; margin-right:-15px} </style>
        <div class="control-group row-fluid">
            <div class="span3">
                '.$label.'
            </div>
            <div class="span9">'.$error.'
                <div class="span2 cbandinput">
                    <div id="switch_'.$nameCB.'" data-on-label="ДА" data-off-label="НЕТ" class="switch switch-small" data-on="success" data-off="danger">
                    '.$this->checkBox($this->model,$nameCB).'
                    </div>
                </div>
                <div class="span10">
                    '.$input.'
                </div>
            </div>
        </div>';
    }
    
    public function checkBoxes($name, $list, $selection, $htmlOptions = array(), $values = array('НЕТ','ДА')) {
        $this->hasChecked = false;
//        if (isset($htmlOptions['inverse'])) {
//            if ($htmlOptions['inverse']) {
//                $htmlOptions['value'] = 0;
//                $htmlOptions['uncheckValue'] = 1;
//            }
//            unset($htmlOptions['inverse']);
//        }// else { // Нужно, только если  необходимо отправлять из checkbox'ов 0
        //    $htmlOptions['value'] = 1;
        //    $htmlOptions['uncheckValue'] = 0;
        //}
        
        if (isset($htmlOptions['values']) && is_array($htmlOptions['values'])) {
            $values = $htmlOptions['values'];
            unset($htmlOptions['values']);
        }
        
//        if (isset($htmlOptions['style']))
//            $htmlOptions['style'] = 'opacity: 0;'.$htmlOptions['style'];
//        else
//            $htmlOptions['style'] = 'opacity: 0;';
        
        if (isset($htmlOptions['class']))
            $classCheckBox = $htmlOptions['class'];
        else {
            $classCheckBox = 'uniformCheckbox';
            $htmlOptions['class'] = $classCheckBox;
        }
        
        $result = '';
        foreach($list as $id=>$text) {
            $htmlOptions['id'] = $name.'_'.$id;
            $htmlOptions['value'] = $id;
            $checked = isset($selection[$id]['selected']) && $selection[$id]['selected'];
            if ($checked)
                $this->hasChecked = true;
            $result .=
                '<label class="checkbox">'.//<div class="checker"><span'.($checked?' checked="checked"':'').'>'.
                    CHtml::checkBox($name.'[]', $checked, $htmlOptions).
                    //'</span></div>'.
                    CHtml::encode($text)."</label>\n";
            
//            '<div style="height:31px;"><span style="float:left;" data-on-label="'.$values[1].'" data-off-label="'.$values[0].'" class="switch switch-small" data-on="success" data-off="danger">'.
//                //CHtml::checkBox($name.'['.$id.']', $checked, $htmlOptions).
//                CHtml::checkBox($name.'[]', isset($selection[$id]['selected']) && $selection[$id]['selected'], $htmlOptions).
//            '</span>'.CHtml::label(CHtml::encode($text), $name.'_'.$id,array('style'=>'inline;float:left;margin-top:3px;'))."</div>\n";

//            '<div style="height:31px;"><span style="float:left;" data-on-label="'.$values[1].'" data-off-label="'.$values[0].'" class="switch switch-small" data-on="success" data-off="danger">'.
//                //CHtml::checkBox($name.'['.$id.']', $checked, $htmlOptions).
//                CHtml::checkBox($name.'[]', isset($selection[$id]['selected']) && $selection[$id]['selected'], $htmlOptions).
//            '</span>'.CHtml::label(CHtml::encode($text), $name.'_'.$id,array('style'=>'inline;float:left;margin-top:3px;'))."</div>\n";
            
        }
        return $result;
    }
    
    public function hiddenFieldBS2($attribute, $htmlOptions = array()) {
        $fname = $this->fieldBS($attribute);
        return $this->hiddenField($this->model, $fname, $htmlOptions);
    }

    private function appendEditor($editor) {
        $result = '';
        if (!isset($this->_editors[$editor])) {
            if (count($this->_editors)==1)
                $result = '
<script type="text/javascript">
    var editorType  = '.$this->mainmodel()->content_type.';
    var editorModel = "'.$this->model->ownerClass.'";
</script>';
            $this->_editors[$editor] = true;
            $cs = Yii::app()->getClientScript();
            if ($editor=='elrte') $cs->registerPackage('elrte');
            if ($result)          $cs->registerPackage('switchEditor');
        }
        return $result;
    }
    
    public function markdownEditor($attribute) {
        $script = $this->appendEditor('markdown');
        $fname = $this->fieldBS($attribute);
        return $script.$this->bootstrapRow(
                $this->widget('ext.yiiext.widgets.markitup.EMarkitupWidget', array(
                        'model' => $this->model,
                        //'settings'=>'markdown',
                        'attribute' => $fname,
                        'htmlOptions'=>array('class'=>'content_markdown'),
                    ),true),
                '',array(
                    'controllClass'=>'markdown-wrapper',
                ));
    }
    
    public function tinymceEditor($attribute) {
        Yii::app()->getClientScript()->registerPackage('elfinder');
        return $this->bootstrapRow(
            $this->widget(
                'application.extensions.tinymce3.ETinyMce',
                array(
                    'model' => $this->model,
                    'attribute' => $this->fieldBS($attribute),
                    'useSwitch' => false,
                    'editorTemplate'=>'full',
                    'language'=>'ru',
                    'useElFinder'=>false,
                    'fileManager' => array(
                        'class' => 'ext.elFinder.TinyMceElFinder',
                        'id' => 'finder',
                        'connectorRoute'=>'admin/elfinder/connector',
                    ),
                ),
                true
            ),
            '',
            array(
                'controllClass'=>'tinymce-wrapper',
            )
        );
    }
    
    public function elrteEditor($attribute) {
        $script = $this->appendEditor('elrte');
        //row id = WYSIWYG_Editor_-_Full_Options
        $fname = $this->fieldBS($attribute);
        return $script.$this->bootstrapRow(
                $this->textArea($this->model,$fname,array(
                            'rows'=>2,
                            'class'=>'content_elrte auto-resize',
                        )),
                '',array(
                    'controllClass'=>'elrte-wrapper',
                ));
    }
    
    public function metaBS($fields = null,$langs=null) {
        $result = '';
        $prefix = $this->multilang ? '=e_' : 'metaStuff.e_';
        if (is_null($fields))
            $fields = array('title','keywords','description');
        
        if (is_null($langs))
            $langs = $this->multilang ? DMultilangHelper::suffixList(true) : array(''=>'');
        else
            if (!is_array($langs))
                $langs = array($langs=>true);
            
        foreach($langs as $suffix=>$labelSuffix)
        foreach($fields as $field)
            switch ($field) {
            case 'description': 
                $result .= $this->textAreaBS($prefix.$field.$suffix);
                break;
            default :
                $result .= $this->textFieldBS($prefix.$field.$suffix);
            }
        echo $result;
    }
    
    public function mediaBS(Media $image,$fields,$mediaFormat='<W>-s-w') {
        $mediaFormat = str_replace('<W>', $W = Media::$adminWidth, $mediaFormat);
        
        // используется в случае множества картинок
        $control = '';
        foreach($fields as $field) {
            $input = '';
            $htmlOptions = array();
            switch ($field) {
            case 'del': 
                //$imageStyle  = "style=\"max-height:{$W}px;max-width:{$W}px;margin: 10px 0 0 0;\"";
                //$imageStyle  = "style=\"max-height:{$W}px;max-width:{$W}px;\"";
                $imageStyle  = "";
                $hiddenFields = CHtml::hiddenField($this->mediaPostID."_del[{$image->iid}]","no",
                    array('class'=>'inputDel'));
                $cropData = $this->mainmodel()->getCropData($image, $i_crop = $image->cropText);
                if ($this->mainmodel()->cropEditable && $cropData)
                    $hiddenFields .= CHtml::hiddenField($this->mediaPostID."[{$image->iid}][i_crop]",$i_crop,
                        array('class'=>'inputCrop'));
                        //."<div class=\"resizeButton\"$cropData><span>изменить</span></div>";
                if ($this->mediaWithColor) {
                    $cropData .= ' data-color="'.($color=$image->getParam('color')).'"';
                    $hiddenFields .= CHtml::textField($this->mediaPostID."[{$image->iid}][i_color]",$color).
                        '<div class="colorpicker"></div>';
                    self::colorPickerScript($this->mediaPostID.'_'.$image->iid.'_i_color', $color, true);
                }
                
                $control .='
                <div class="span12 resizeBox withDelButton" data-id="'.$image->iid.'" data-type="'.$image->i_main."\">
                    <div class=\"img_upload\" style=\"width: {$W}px;\">
                        <img class=\"resizeImg\"$cropData $imageStyle src=\"".$image->getMediaUrl($mediaFormat.($cropData?'-crop':'')).'"/>
                    </div>
                    <div class="delete-photo-item">
                       <img src="'.$this->controller->themeImages.'photon/newdelete.png" title="удалить" data-toggle="modal" data-ref="'.
                            $this->mediaPostID.'.'.$image->iid.'"/>
                    </div>'.$hiddenFields.'
                </div>';
                break;
            case 'main': // Группа радиокнопок должна быть с одним именем
                $control.=$this->bootstrapRow3(
                    '<div class="span3"><label for="Media_i_main'.$image->iid.'" class="control-label">Главная</label></div>',
                    CHtml::radioButton($this->mediaPostID."_i_main", $image->i_main,array( // [{$image->iid}]
                        'value'=>$image->iid,
                        'class'=>'uniformMediaMain',
                        'id'=>'Media_i_main'.$image->iid,
                    )),array('spanClass' => 'span-inset'));
                break;
            case 'tags':
                $control .= $this->listOfTags("MediaTagsById[".$image->iid."]", "tagsgallery-".$image->iid, 'tagsgallery', $image);
                break;
            case 'watermark': 
                $input ='
                <div data-on-label="ДА" data-off-label="НЕТ" class="switch switch-small" data-on="success" data-off="danger">
                    '.CHtml::checkBox($this->mediaPostID."[{$image->iid}][watermark]", $image->watermark).'
                </div>';
                $htmlOptions['spanClass'] = 'span-inset';
            default:
                if (empty($input))
                    $input = CHtml::textField($this->mediaPostID."[{$image->iid}][$field]",$image->{$field},array('size'=>60,'maxlength'=>255));
                $control  .= $this->bootstrapRow3(
                    $this->labelEx($image,$field, array("class"=>"control-label")),
                    $this->errorBS2($image,$field).$input,
                    $htmlOptions);
                break;
            }
        }
        $rowOptions = array('class'=>'upload');
        if ($this->mediaWithSort) {
            $rowOptions['class'] .= ' item_sort';
            $rowOptions['data-id'  ] = $image->iid;
            $rowOptions['data-type'] = $image->i_main;
        }
        return $this->bootstrapRow2(
            $this->labelEx($image,'i_original', array("class"=>"control-label")), 
            $control,
            array('rowOptions'=>$rowOptions));
    }
    
    public function mediaFieldBS($field) {
        $W = Media::$adminWidth;
        
        $media = $this->media;
        $image = is_array($media) ? $media[0] : $media;
        $cropData = $this->mainmodel()->getCropData($image, $i_crop = $image->cropText);

        $input = '';
        $htmlOptions = ($this->mediaType==Media::typeFILE) ? array() : array('rowClass'=>'uploadNew');
        switch ($field) {
        case 'del': // отображает единственную картинку с возможностью её удалить
            if (is_array($media)) throw new Exception('Для массива картинок не предусмотрена ф-я BootstratForm->mediaFieldBS["del"]');
            if (empty($image->i_original)) return '';
            //$imageStyle  = "style=\"max-height:{$W}px;max-width:{$W}px;margin: 10px 0;\"";
            //$imageStyle  = "style=\"max-height:{$W}px;max-width:{$W}px;\"";
            $imageStyle  = "";
            $hiddenFields = CHtml::hiddenField($this->mediaPostID."_del","no",
                array('class'=>'inputDel'));
            if ($this->mainmodel()->cropEditable && $cropData)
                $hiddenFields .= CHtml::hiddenField($this->mediaPostID."[i_crop]",$i_crop,
                    array('class'=>'inputCrop'));
                    //."<div class=\"resizeButton\"$cropData><span>изменить</span></div>";
            $buttonCrop = '';
            if ($this->mainmodel()->cropEditable && $cropData)
                $buttonCrop = CHtml::hiddenField($this->mediaPostID."[{$image->iid}][i_crop]",$i_crop);
                    //."<div class=\"resizeButton\"$cropData><span>изменить</span></div>";
            $htmlOptions['spanClass']='withDelButton';
            
            $thumbnail = $this->mediaType==Media::typeFILE
                ? '<span>'.$image->getMediaUrl().'</span>'
                : "<img class=\"resizeImg\"$cropData $imageStyle src=\"".$image->getMediaUrl("$W-s".($cropData?'-crop':'')).'"/>';
                
            return $this->bootstrapRow2(
                $this->labelEx($image,'i_original', array("class"=>"control-label", "label"=>$this->mediaLabel)),
                "<div class=\"img_upload\" style=\"width: {$W}px;\">
                    ".$thumbnail.'
                </div>
                <div class="delete-photo-item">
                   <img src="'.$this->controller->themeImages.'photon/newdelete.png" title="удалить" data-toggle="modal" data-ref="'.
                        $this->mediaPostID.'"/>
                </div>'.$hiddenFields,
                $htmlOptions);
            break;
        case 'i_original': // Поле для загрузки картинок 
            if ($this->mediaType==Media::typeYOUTUBE)
                return $this->bootstrapRow3(
                    $this->labelEx($image,'i_original', array("class"=>"control-label", "label"=>$this->mediaLabel)),
                    CHtml::textField($this->mediaPostID."[i_original]", $image->i_original));
        //(если картинка одна и она уже есть, поле скрывается до тех пор пока картинку не удалят)
            
            $htmlFileOptions = array('accept'=>'image/*','class'=>'cropimage');
            if ($this->mediaType==Media::typeFILE)
                $htmlFileOptions = array('accept'=>'*');
            if (is_array($media)) $htmlFileOptions['multiple']='multiple';
            $buttonUpdate = '';
            $idDelete = '';
            $droppedFiles = '';
            if ($cropData) {
                //$htmlFileOptions['class']='cropimage';
                $droppedFiles = '<!-- Область предпросмотра -->
                    <div id="uploaded-holder" class="span12 image-margin-bootom">
                        <div id="dropped-files"></div>
                    </div>
                    <div style="clear:both"></div>';
                $idDelete = 'id="drop-0"';
            } else {
                $buttonUpdate = '<span class="fileupload-exists">Изменить</span>';
            }
            $loadField = '<span class="btn btn-file fileupload-new">
                <span class="fileupload-new">Загрузить</span>'.
                $buttonUpdate.
                CHtml::fileField($this->mediaPostID.'_new'.(is_array($media) ? '[]' : ''),'',$htmlFileOptions).'
            </span>';
            return $this->bootstrapRow2(
                $this->labelEx($image,'i_original', array("class"=>"control-label", "label"=>$this->mediaLabel)),'
                <div class="fileupload fileupload-new" data-provides="fileupload"'.$cropData.'>
                            <div class="input-append">
                                <div class="uneditable-input span3">
                                    <i class="icon-file fileupload-exists"></i>
                                    <span class="fileupload-preview"></span>
                                </div>
                                '.$loadField.'
                                <a href="javascript:void(0);" '.$idDelete.' class="btn fileupload-exists deleteFileUpload" data-dismiss="fileupload">Удалить</a>
                            </div>
                </div>'.$droppedFiles,
                array(
                    'rowOptions'=>array(//'id'=>'File_Upload',
                        'class'=>isset($htmlOptions['rowClass'])?$htmlOptions['rowClass']:''),
                    'hide'=>!(is_array($media) ||empty($image->i_original)),
                    'afterLabel'=>Bootstrap::infoTooltip('Размер картинки не должен превышать 2Мб')
                    ));
            break;
        case 'watermark': 
            $input = '
                <div data-on-label="ДА" data-off-label="НЕТ" class="switch switch-small" data-on="success" data-off="danger">
                    '.CHtml::checkBox($this->mediaPostID."[watermark]", is_array($media) ? 0 : $image->{$field}).'
                </div>';
            $htmlOptions['spanClass'] = 'span-inset';
        default:
            if (empty($input)) {
                $textOptions = array('size'=>60,'maxlength'=>255);
                if ($field=='i_info') {
                    $textOptions['maxlength'] = 4096;
                    $textOptions['style'] = 'height:60px';
                    $input = CHtml::textArea($this->mediaPostID."[$field]",is_array($media)?'':$image->{$field},$textOptions);
                } else
                    $input = CHtml::textField($this->mediaPostID."[$field]",is_array($media)?'':$image->{$field},$textOptions);
            }
            return $this->bootstrapRow3(
                $this->labelEx($image,$field, array("class"=>"control-label")),
                $input,$htmlOptions);
            break;
        }
        
    }
    
    public function buttonSave($title='',$mode='default',$htmlOptions = array()) 
    {
        $default = array(
            'container'  => 'container-fluid',
            'style'      => 'margin-right: 40px; border:none',
            'inputStyle' => 'float:right;',
            'btnClass'   => 'btn-primary'
        );
        switch ($mode) {
        case 'right':
            $default = array(
                'container'  => 'row-fluid',
                'style'      => '',
                'inputStyle' => 'margin: 0 20px 30px 10px; float:right;',
                'btnClass'   => 'btn-primary'
            );
            break;
        }
        $container  = isset($htmlOptions['container'])  ? $htmlOptions['container']  : $default['container'];
        $style      = isset($htmlOptions['style'])      ? $htmlOptions['style']      : $default['style'];
        $inputStyle = isset($htmlOptions['inputStyle']) ? $htmlOptions['inputStyle'] : $default['inputStyle'];
        $btnClass   = isset($htmlOptions['btnClass'])   ? $htmlOptions['btnClass']   : $default['btnClass'];
        $footer     = isset($htmlOptions['footer'])     ? $htmlOptions['footer']     : '';
        
        $header = $container ? '<div class="'.$container.'"'.($style ?' style="'.$style.'"':'').'>' : '';
        $footer = $footer.($container?'</div>':'');
        return $header.($title===false?'':
                    CHtml::submitButton(
                        $title ? $title : ($this->controller->action->id=='create' ? 'Создать' : 'Применить'), array(
                            'class'=>'btn'.($btnClass?' '.$btnClass:''),
                            'style'=>$inputStyle,
                    ))).
               $footer;
    }
    
    public function buttonRow($title1='На сайте',$title2='Сохранить',$title3='') {
        $this->_mainmodel = NULL;
        $this->_model     = NULL;
        $this->_currmodel = NULL;
        return $this->buttonSave($title3,'right',array(
            'footer'=>
                (($this->model->isNewRecord || $title2===false)?'':
                CHtml::submitButton($title2, 
                    array(
                        'class'=>'btn',
                        'name' =>'buttonSave',
                        'style'=>'margin: 0 20px 30px 10px; float:right;'))).
                (($this->model->isNewRecord || $title1===false)?'':
                CHtml::link($title1, 
                    $this->model->ownerUrl,
                    array(
                        'target'=>'_blank',
                        'class' =>'btn btn-success',
                        'style' =>'margin: 0 20px 30px 10px; float:right;')))
            )
        );
    }
    
    
    public function mediaFieldBSCrop($field, $type=NULL, $sizeCrop=NULL) {
        $idDelete = "";

        $media = $this->media;
        $image = is_array($media) ? $media[0] : $media;
        $input = '';
        $htmlOptions = array();
        switch ($field) {
//        case 'tag':
//            return $this->listOfTags("MediaTags", "tagsgallery", 'tagsgallery', new Media());
//            break;
        case 'del': if (is_array($media)) throw new Exception('Для массива картинок не предусмотрена ф-я BootstratForm->mediaFieldBS["del"]');
            if (empty($image->i_original)) return '';
            Yii::app()->getClientScript()->registerPackage('many_crop');
            $crop = $image->i_crop ? explode(":", $image->i_crop) : false;
            return $this->bootstrapRow2(
                $this->labelEx($image,'i_original', array("class"=>"control-label", "label"=>$this->mediaLabel)),'
                <img class="resizeImg" style="width:300px;margin: 10px 0 0 0;" src="'.$image->getMediaUrl('original').'"/>
                <div class="delete-photo-item">
                   <img src="'.$this->controller->themeImages.'photon/newdelete.png" data-toggle="modal" rel="'.
                        $this->mediaPostID.'"/>
                </div>
                <div class="resizeButton" data-type="'.$type.'" href="'.$image->getMediaUrl('original').'" data-id="'.$image->iid.'" data-x1="'.($crop ? $crop[0] : $sizeCrop[0]).'" data-y1="'.($crop ? $crop[1] : $sizeCrop[1]).'" data-x2="'.($crop ? $crop[2] : $sizeCrop[2]).'" data-y2="'.($crop ? $crop[3] : $sizeCrop[3]).'"><span>изменить</span></div>
                '.CHtml::hiddenField($this->mediaPostID."_del","no"),
                array('rowClass'=>'upload'));
            break;
        case 'i_original':
            
            $htmlOptions = array('accept'=>'image/*');
            if (is_array($media)) $htmlOptions['multiple']='multiple';
            
            $loadField = '<span class="btn btn-file">
                        <span class="fileupload-new">Загрузить</span>
                        <span class="fileupload-exists">Изменить</span>
                        '.CHtml::fileField($this->mediaPostID.'_new'.(is_array($media) ? '[]' : ''),'',$htmlOptions).'
                      </span>';
            
            return $this->bootstrapRow2(
                $this->labelEx($image,'i_original', array("class"=>"control-label", "label"=>$this->mediaLabel)),'
                <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="input-append">
                                <div class="uneditable-input span3">
                                    <i class="icon-file fileupload-exists"></i>
                                    <span class="fileupload-preview"></span>
                                </div>
                                '.$loadField.'
                                <a href="javascript:void(0);" '.$idDelete.' class="btn fileupload-exists" data-dismiss="fileupload">Удалить</a>
                            </div>
                </div>',
                array(
                    'rowOptions'=>array('class'=>'upload','id'=>'File_Upload'),
                    'hide'=>!(is_array($media) ||empty($image->i_original))
                    ));
            break;
        case 'watermark': 
            $input ='
                        <div data-on-label="ДА" data-off-label="НЕТ" class="switch switch-small" data-on="success" data-off="danger">
                            '.CHtml::checkBox($this->mediaPostID."[watermark]", is_array($media) ? 0 : $image->{$field}).'
                        </div>';
            $htmlOptions['spanClass'] = 'span-inset';
        default:
            if (empty($input)) {
                $textOptions = array('size'=>60,'maxlength'=>255);
                if ($field=='i_info') {
                    $textOptions['maxlength'] = 4096;
                    $textOptions['style'] = 'height:60px';
                    $input = CHtml::textArea($this->mediaPostID."[$field]",is_array($media)?'':$image->{$field},$textOptions);
                } else
                    $input = CHtml::textField($this->mediaPostID."[$field]",is_array($media)?'':$image->{$field},$textOptions);
            }
            return $this->bootstrapRow3(
                $this->labelEx($image,$field, array("class"=>"control-label")),
                $input,$htmlOptions);
            break;
        }
        
    }
    
    // MultiLang
    public function startTabbable() {
        $this->controller->includePackages[] = 'bootstrap-tab'; 
        $this->controller->jsVars['langTabbable'] = 'true'; // см. update.js
        $tabs = '';
        foreach(DMultilangHelper::suffixList(true) as $suffix=>$label)
            $tabs .= '<li><a href="#tab'.$suffix.'" data-toggle="tab">'.$label.'</a></li>';
        return '<div class="tabbable">
    <ul class="nav nav-tabs" data-tabs="tabs" id="langType">'.$tabs.'</ul>
        <div class="tab-content">';
    }
    
    public function endTabbable() {
        return "    </div>\n</div>\n";
    }
    
    public function startLangPanel($suffix) {
        return '<div class="tab-pane fade" id="tab'.$suffix.'">';
    }
    
    public function endLangPanel() {
        return "</div>\n";
    }
    
}
