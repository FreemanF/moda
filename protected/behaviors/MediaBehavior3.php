<?php

/**
 * @property string $metaField
 * @property string $postID
 */
class MediaBehavior3 extends CActiveRecordBehavior {

    private   $_ownerMediaField;
    private   $_media; // Одна картинка или массив
    private   $_oldmedia; // атрибуты картинок
    private   $_mediaPostID;
    private   $_mediaRelation = 'media';
    // Media_new  $_FILES
    // Media_del[iid] или Media_del == "yes"
    public    $media_type=0; // linkOI.type
    public    $media_label; //
    public    $maxFileSize = Media::maxFileSize;
    public    $mediaType = Media::typeIMAGE; // Картинка
    public    $simple=true; // Работаем с одной картинкойc либо с массивом
    public    $countMediaField; // Поле в котором сохранять кол-во медиа-файлов
    public    $withWatermark = false; // По умолчанию в картинках не обрабатывается вотермарка
    //public    $withCrop      = false; // По умолчанию в картинках не обрабатывается обрезка
    public    $withSort      = false;
    public    $withColor     = false;
    public    $_nextSort;
    
    // Позволять редактировать crop загруженных раньше картинок, оригинал остаётся неизменным,
    public    $cropEditable  = true;  // иначе обрезка делается перед сохранением оригинала
    // Соотношение сторон обрезанного участка array(W,H)
    public    $cropAspect    = false; // true - любое соотношение
    public    $minSize       = false; // array(W,H) - минимальные размеры по сторонам
    private static $includeJCrop = false;
    
    public function attach($owner) {
        parent::attach($owner);
        if ($this->minSize === false)
            $this->minSize = Media::$minSize;
    }
    
    public function getCropData(Media $media,$i_crop=null) {
        $cropData = '';
        $cropAspect=$this->cropAspect;
        if (!self::$includeJCrop) {
            $W  = Media::$adminWidth;
            $S  = $this->maxFileSize;
            $T  = Yii::app()->controller->themeImages;
            $P  = $this->mediaPostID; 
            $M  = is_array($this->getMediaStuff()) ? '[]' : '';
            $E  = $cropAspect  ? 'true' : 'false';
            $D  = $this->cropEditable ? 'true' : 'false';
            $cs = Yii::app()->getClientScript();
            $cs->registerPackage('jcrop');
            $cs->registerScript('adminImageWidth',<<<JCROPADMWIDTH
    var adminImageWidth = $W;
    var maxFileSizeMb   = $S;                    
    var themeImages     ='$T';
    var mediaPostID     ='$P';
    var multipleImages  ='$M';
    var jcropEnabled    = $E;
    var jcropEditable   = $D;
JCROPADMWIDTH
    ,CClientScript::POS_END);
            self::$includeJCrop = true;
        }
        if ($cropAspect) 
        {
            if ($i_crop===null) $i_crop = $media->cropText;
            $cropData = ' data-pos="-1" data-crop="'.$i_crop.
                '" data-aspect="'.(is_array($cropAspect)?implode(':', $cropAspect):'').'"'.
                ($this->minSize?' data-min="'.implode(':', $this->minSize).'"':'').
                ' data-original="'.($media->isNewRecord?'':$media->mediaUrl).'"';
        }
        return $cropData;
    }
    
    public function getMediaField() {
        if ($this->_ownerMediaField === null) {
            $this->_ownerMediaField = $this->owner->ownerPrefix.'_'.($this->_mediaRelation=='media' ? 'media_id' : $this->_mediaRelation);
        }
        return $this->_ownerMediaField;
    }
    
    public function setMediaField($mediaField) {
        $this->_ownerMediaField = $mediaField;
    }
    
    public function setMediaRelation($mediaRelation) {
        $this->_mediaRelation = $mediaRelation;
    }
    
    public function getMediaPostID() {
        if ($this->_mediaPostID === null) {
            $this->_mediaPostID = ucfirst($this->_mediaRelation);
        }
        return $this->_mediaPostID;
    }
    
    public function setMediaPostID($mediaPostID) {
        $this->_mediaPostID = $mediaPostID;
    }
    
    private function checkEmpty() {
        if (empty($this->_media)){
            if (is_array($this->_media)) {
                $this->_media = array(new Media());
                $this->_media[0]->iid = -1;
                $this->_media[0]->i_type = $this->mediaType;
                if ($this->mediaType==Media::typeYOUTUBE)
                    $this->_media[0]->scenario = 'youtube';
            } else {
                $this->_media = new Media();
                $this->_media->iid = -1;
                $this->_media->i_type = $this->mediaType;
                if ($this->mediaType==Media::typeYOUTUBE)
                    $this->_media->scenario = 'youtube';
            }
            return true;
        }
        if (is_array($this->_media)) {
            if (empty($this->_media))
                return true;
            reset($this->_media);
            list(,$media) = each($this->_media);
            return $media->iid <= 0;
        } else
            return $this->_media->iid <= 0;
    }
    
    public function mediaUrl($addPath='130-s') {
        $media = $this->owner->{$this->_mediaRelation};
        if (is_array($media))
            $media = array_shift($media);
        return $media ? $media->getMediaUrl($addPath) : '';
    }
    
    public function mediaForm($addPath='original',$htmlOptions = array(),$default=true) {
        $media = $this->owner->{$this->_mediaRelation};
        if (is_array($media))
            $media = array_shift($media);
        return $media 
            ? $media->getMediaForm($addPath,$htmlOptions) 
            : ($default===true
                ? CHtml::image('/media/'.lcfirst($this->owner->ownerClass).'/original/default.png', '', $htmlOptions)
                : $default);

    }
    
    public function mediaFormByCrop($addPath='original',$htmlOptions = array(), $default=NULL) {
        $media = $this->owner->{$this->_mediaRelation};
        if (is_array($media)){
            $main = NULL;
            foreach ($media as $mediaItem)
                if ($mediaItem->i_main)
                    $main = $mediaItem;
                
            $media = $main ? $main : array_shift($media);
        }
        if ($media)
            if ($media->i_crop)
                return $media->getMediaForm($addPath,$htmlOptions);
            else
                return ($default ? $media->getMediaForm($default,$htmlOptions)
                                 : '');
        else return '';
    }
    
    public function getNextSort() {
        if (is_null($this->_nextSort)) {
            $this->_nextSort=0;
            if (is_array($this->_media)) {
                foreach($this->_media as $media)
                    if ($media->i_sort>$this->_nextSort)
                        $this->_nextSort = $media->i_sort;
            } else
                $this->_nextSort = $this->_media->i_sort;
        }
        return ++$this->_nextSort;
    }
    
    /**
     * @return Media
     */
    public function getMediaStuff() {
        if ($this->_media===null) {
            $this->_media = $this->owner->{$this->_mediaRelation};
            $this->checkEmpty();
            if ($this->simple && is_array($this->_media))
                $this->_media = array_shift($this->_media);

            // Сразу же считываем POST атрибуты
            if (isset($_POST[$this->mediaPostID])) {
                $post = $_POST[$this->mediaPostID];
                if ($this->simple) {
                    $this->_oldmedia = $this->_media->attributes;
                    $this->_oldmedia['watermark'] = $this->_media->watermark;
                    $this->_oldmedia['i_crop']    = $this->_media->i_crop;

                    if(!isset($post['watermark']))
                        $post['watermark'] = 0;
                    
                    $this->_media->attributes = $post;
                    $this->mediaType = $this->_media->i_type;
                    if (isset($post['i_crop']))
                        $this->_media->setParam('crop',explode (':', $post['i_crop']));
                    if (isset($post['i_color']))
                        $this->_media->setParam('color',$post['i_color']);
                    
                    if ($this->mediaType==Media::typeYOUTUBE) {
                        $this->_media->i_original = 
                            isset($post['i_original']) 
                            ? $post['i_original'] : '';
                        $this->_media->scenario = 'youtube';
                    }

                    if ($this->mediaType==Media::typeLINK) {
                        $this->_media->i_original = 
                            isset($_POST[$this->mediaPostID."_link"]) 
                            ? $_POST[$this->mediaPostID."_link"] : '';
                    }

                } else {
                    // Радиокнопка "Главная" у всех картинок имеет одно имя
                    $main = isset($_POST[$this->mediaPostID.'_i_main']) 
                        ? intval($_POST[$this->mediaPostID.'_i_main']) : 0;
                    
                    $this->_oldmedia = array();
                    foreach($post as $key=>$item){
                        if(is_numeric($key) && !isset($item['watermark']))
                            $post[$key]['watermark'] = 0;
                    }
                    foreach($this->_media as $key=>$mediaitem) {
                        $iid = $mediaitem->iid;
                        $this->_oldmedia[$iid] = $mediaitem->attributes;
                        $this->_oldmedia[$iid]['watermark'] = $mediaitem->watermark;
                        $this->_oldmedia[$iid]['i_main']    = $mediaitem->i_main;
                        $this->_oldmedia[$iid]['i_crop']    = $mediaitem->i_crop;
                        if (isset($post[$iid])) {
                            $crop = isset($post[$iid]['i_crop']) ? explode (':', $post[$iid]['i_crop']) : false;
                            $color = ($this->withColor && isset($post[$iid]['i_color']) && $post[$iid]['i_color'])
                                    ? $post[$iid]['i_color'] : false;
                            if ($crop) unset($post[$iid]['i_crop']);
                            unset($post[$iid]['i_color']);
                            
                            $this->_media[$key]->attributes = $post[$iid];
                            $this->_media[$key]->i_main = ($main==$iid ? 1 : 0);
                            if ($crop) 
                                $this->_media[$key]->setParam('crop',$crop);
                            if ($this->withColor && $color) 
                                $this->_media[$key]->setParam('color',$color);

                            if ($this->mediaType==Media::typeYOUTUBE) {
                                $this->_media[$key]->i_original = 
                                    isset($post[$iid]['i_original']) 
                                    ? $post[$iid]['i_original'] : '';
                                $this->_media[$key]->scenario = 'youtube';
                            }
                        }
                    }
                }
            }
        }
        return $this->_media;
    }

    private function loadFile($ID,$i_name,$i_alt, $i_info, $i_src, $files=array(),$watermark=null, $i_crop=false, $i_color=false) {
        $mediaitem = null;
        switch ($this->mediaType) {
        case Media::typeYOUTUBE: // 4 - YouTube (simple)
            if ($i_original = isset($_POST[$this->mediaPostID]['i_original']) ? $_POST[$this->mediaPostID]['i_original'] : '') {
                $mediaitem = Media::makeMedia(Media::typeYOUTUBE, $i_original, $this->owner->objectType, $ID, $i_name, $i_alt, $i_info, $i_src);
            }
            break;
        case Media::typeLINK: // 3 - link
            if ($i_original = isset($_POST[$this->mediaPostID.'_link']) ? $_POST[$this->mediaPostID.'_link'] : '') {
                $mediaitem = Media::makeMedia(Media::typeLINK, $i_original, $this->owner->objectType, $ID, $i_name, $i_alt, $i_info, $i_src);
            }
            break;
        default: // 1 - Image
            if ($files['error'] == UPLOAD_ERR_OK && $files['size']) {
                $mediaitem = Media::LoadImg($files, $this->owner->objectType, $ID, $i_name, $i_alt, $i_info, $i_src, 
                    $watermark, $this->cropEditable, $i_crop, $i_color, $this->maxFileSize);
            }
        }
        
        if($mediaitem) {
            $mediaitem->watermark = $watermark;
            //$mediaitem->crop      = $crop;
            if ($this->simple)
                $this->_media = $mediaitem;
            else 
                $this->_media[] = $mediaitem;

            // Фиксируем связь картинки с её владельцем
            $iid = $mediaitem->iid;
            if ($this->simple && $this->mediaField) {
                $this->owner->{$this->mediaField} = $iid;
                $this->owner->addLateUpdate($this->mediaField,$iid);
            } else
                Media::makeLink($this->owner->objectType, $ID, $iid, $this->media_type,$this->withSort?$this->nextSort:0);
        }
    }
    
    public function afterSave($event) {
        $media = $this->getMediaStuff();
        // без валидации сюда не попадём
        //if ($this->owner->validate()) {
        if ($this->simple)
            $media = array($media);
        
        $ID = $this->owner->primaryKey;
        
        // Удаляем картинки
        switch ($this->mediaType) {
        case Media::typeIMAGE:
        case Media::typeFILE:
            $del = isset($_POST[$this->mediaPostID.'_del']) ? $_POST[$this->mediaPostID.'_del'] : array();
            break;
        case Media::typeLINK:
            $del = isset($_POST[$this->mediaPostID.'_del']) ? $_POST[$this->mediaPostID.'_del'] : 'no';
            break;
        default:
            $del = 'no';
        }
        foreach($media as $key=>$mediaitem) {
            $iid = $mediaitem->iid;
            if ($iid>0) // IMAGES ALREADY EXISTS
            if ($del==='yes' || (is_array($del)&&isset($del[$iid])&&$del[$iid]=='yes')) {
                // IMAGES DELETE
                if ($this->simple && $this->mediaField) {
                    $this->owner->{$this->mediaField} = NULL;
                        $this->owner->addLateUpdate($this->mediaField,NULL);
                } //else // Удаление linkOI происходит каскадно
                  //  Media::dropLink ($this->mediaObjectType, $ID, $iid, $this->media_type);
                $mediaitem->delete();
                unset($media[$key]);
            } else {
                // IMAGES UPDATE
                $oldmedia = $this->simple ? $this->_oldmedia : (
                    isset($this->_oldmedia[$iid]) 
                    ? $this->_oldmedia[$iid] : array());
                if ($mediaitem->isEmpty()) {
                    if (!$mediaitem->isNewRecord) {
                        $mediaitem->delete();
                        unset($media[$key]);
                    }
                } else {
                    // В linkOI.type Сохраняем признак главной страницы
                    $mediaitem->updateLink(isset($oldmedia['i_main'])?$oldmedia['i_main']:0);
                    
                    if (empty($oldmedia) || !$mediaitem->isEqual($oldmedia)) {
                        $clearCache = false;
                        if ($this->withWatermark)
                            if($oldmedia["watermark"] != $mediaitem->watermark){
                                $mediaitem->i_watermark = $mediaitem->watermark;
                                $clearCache = true;
                            }
                        $clearCache = isset($oldmedia['i_crop']) 
                            ? $oldmedia['i_crop'] != $mediaitem->i_crop
                            : !!$mediaitem->i_crop;

                        if( $clearCache )
                            $mediaitem->ClearCacheByModel($mediaitem);

                        if (!$mediaitem->save()) 
                            throw new CHttpException(500,"Can't save model '{$this->mediaPostID}'.");
                    }
                }
            } // else IMAGES NOT EXISTS (NEW IMAGES)
        }
        $this->_media = $this->simple ? array_shift($media) : $media; //Сохраняем промежуточный результат

        if ($this->checkEmpty() || ($this->mediaType==Media::typeIMAGE && !$this->simple)) {
            $new = (( $this->mediaType==Media::typeIMAGE 
                      || $this->mediaType==Media::typeFILE 
                    )
                    && isset($_FILES[$this->mediaPostID.'_new'])) 
                 ? $_FILES[$this->mediaPostID.'_new'] : NULL;

            // Если нет новых картинок - уходим
            if ($this->mediaType==Media::typeIMAGE &&  !isset($new['error'])) return;

            $i_name = isset($_POST[$this->mediaPostID]['i_name']) ? $_POST[$this->mediaPostID]['i_name'] : '';
            $i_alt  = isset($_POST[$this->mediaPostID]['i_alt'])  ? $_POST[$this->mediaPostID]['i_alt']  : '';
            $i_info = isset($_POST[$this->mediaPostID]['i_info']) ? $_POST[$this->mediaPostID]['i_info'] : '';
            $i_src  = isset($_POST[$this->mediaPostID]['i_source'])?$_POST[$this->mediaPostID]['i_source'] : '';
            $i_crop = isset($_POST[$this->mediaPostID]['i_crop']) ? $_POST[$this->mediaPostID]['i_crop'] : false;
            $i_color= ($this->withColor && isset($_POST[$this->mediaPostID]['i_color']))
                    ? $_POST[$this->mediaPostID]['i_color']: false;
            $watermark = $this->withWatermark ? (isset($_POST[$this->mediaPostID]['watermark']) ? $_POST[$this->mediaPostID]['watermark'] : 0) : NULL;
            if (is_array($new['error'])) {
                if (!is_array($i_crop)) $i_crop = array();
                foreach($new['error'] as $key=>$error)
                    $this->loadFile(
                        $ID, $i_name, $i_alt, 
                        isset($i_info[$key]) ? $i_info[$key] : '',
                        isset($i_src [$key]) ? $i_src [$key] : '',
                        array(
                            'error' => $new['error'][$key],
                            'name'  => $new['name'][$key],
                            'type'  => $new['type'][$key],
                            'size'  => $new['size'][$key],
                            'tmp_name' => $new['tmp_name'][$key]),
                        $watermark, 
                        isset($i_crop[$key])  ? $i_crop [$key]:false,
                        isset($i_color[$key]) ? $i_color[$key]:false);
            } else
                $this->loadFile($ID,$i_name,$i_alt, $i_info, $i_src, $new,$watermark,$i_crop,$i_color);
            
            // Заставляем владельца перечитать media (Используется при публикации в соц.сети)
            $this->owner->getRelated($this->_mediaRelation,true);
        }
        
        // Записываем новое количество медиа-файлов
        if ($this->countMediaField) {
            $media = $this->getMediaStuff(); // Кол-во подразумевает что $this->simple==false
            $newcount = count($media) - ((count($media)>0 && $media[0]->iid<0) ? 1 : 0);
            if ($this->owner->{$this->countMediaField} != $newcount)
                $this->owner->addLateUpdate($this->countMediaField,$newcount);
        }
    }
    
    public function beforeDelete($event) {
        $media = $this->getMediaStuff();
        if ($this->simple)
            $media = array($media);
        foreach($media as $mediaitem) {
            if (!$mediaitem->isNewRecord)
                $mediaitem->delete();
        }
        return true;
    }
    
}
