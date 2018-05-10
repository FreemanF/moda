<?php

/**
 * This is the model class for table "media".
 *
 * The followings are the available columns in table 'meta_info':
 * @property integer $iid
 * @property integer $i_path
 * @property integer $i_type
 * @property string $i_name
 * @property string $i_original
 * @property string $i_alt
 * @property string $i_source
 * @property string $i_info
 */
class Media extends CActiveRecord{

    const typeUNKNOWN = 0;
    const typeIMAGE   = 1;
    const typeVIDEO   = 2;
    const typeLINK    = 3;
    const typeYOUTUBE = 4;
    const typeFILE    = 5;
    const maxFileSize = 3; //Mb
    
    private $_params; // распарсенное i_crop
    private $extention = "jpeg";
    public $needWatermark = 0;
    public $watermark = 0;
//    public $needCrop = 0;
//    public $crop = 0;
    public $i_main = 0;
    public $i_sort = 0;
        
    public static $youtubeSize = array(
        630 => 360,
        450 => 300, //project urist (uniser)
        501 => 285, //project urist (uniser)
    );
    
    public static $adminWidth = 300;       // Стандартная ширина картинки в админке
    public static $minSize  = array( 6, 6); // MediaBehavior->attach
    // Если после обрезки оригинал не используется, то удаляем его.
    // В случае отладки можно не удалять
    public static $deleteCroppedOriginal = true; 
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MetaInfo the static model class
     */
    public static function model($className=__CLASS__){
            return parent::model($className);
    }
        
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{media}}';
    }

    private function decodeParams() {
        $this->_params = array();
        // для перехода со старого i_crop
        //$str = trim($this->i_crop);
        //if ($str && (strpos($str,'crop')===false))
        //    $str = 'crop:'.$str;
        //    
        // SELECT * FROM `media` WHERE length(i_crop)>0
        // лучше на media применить SQL: 
        // UPDATE `media` SET i_crop=CONCAT("crop:",i_crop) WHERE length(i_crop)>0
        foreach(explode('|', $this->i_crop) as $param) if ($param!=='') {
            $a = explode(':', $param);
            if (count($a)) {
                $nameParam = array_shift($a);
                $this->_params[$nameParam] = 
                    count($a)==0 ? true : (
                    count($a)==1 ? array_shift($a) : $a);
            }
        }
    }
    
    private function encodeParams() {
        $result = '';
        if (!empty($this->_params)) {
            $params = array();
            foreach($this->_params as $name=>$value) {
                if (is_array($value))
                    $params[] = $name.':'.implode (':', $value); else
                if ($value===true)
                    $params[] = $name; else
                if ($value!==false)
                    $params[] = "$name:$value";
            }
            $result = implode('|', $params);
        }
        $this->i_crop = $result;
    }
    
    public function getParam($name) { // "watermark|crop:0:0:100:50|param3"
        if ($this->_params===null) 
            $this->decodeParams();
        return isset($this->_params[$name]) 
            ? $this->_params[$name] 
            : false;
    }
    
    public function setParam($name,$param=true) { // "watermark|crop:0:0:100:50|param3"
        // одноэлементный массив всегда интерпретируем как скалярное значение
        if (($isarray=is_array($param)) && count($param)==1) {
            $isarray = false;
            $param = array_shift($param);
        }
        // Проверяем изменился ли параметр
        if ($isarray==is_array($oldparam=$this->getParam($name)))
            if ($isarray) {
                if(count($param)==count($oldparam)) {
                    $modified = false;
                    foreach($oldparam as $key=>$value)
                        if (!isset($param[$key]) || ($value!==$param[$key])) {
                            $modified = true;
                            break;
                        }
                    if (!$modified)
                        return;
                }
            } else
                if ($param===$oldparam)
                    return;
        // Параметр изменился
        if ($param===false)
            unset($this->_params[$name]);
        else
            if (is_array($param) || (strpos($param,':')===false))
                $this->_params[$name] = $param;
            else // превращаем в массив
                $this->_params[$name] = explode (':', $param);
        
        // Компилируем набор параметров в строку
        $this->encodeParams();
    }
    
    public function getCropText() {
        $i_crop='';
        if (($crop=$this->getParam('crop')) && is_array($crop) && count($crop)==4)
            $i_crop = implode(':', $crop);
        return $i_crop;
    }
    
    public function attributeLabels(){
        return array(
            'i_path'     => 'ID каталога',
            'i_type'     => 'Тип ресурса',
            'i_name'     => 'Название фото',                 // TITLE
            'i_original' => 'Фото',
            'i_alt'      => 'Альтернативный текст для фото', // ALT
            'i_source'   => 'Источник фото',
            'i_info'     => 'Название цвета', //'Подпись к фото',
            'watermark'  => 'WaterMark',
        );
    }
    
    public function rules() {
        return array(
            //array('i_original', 'required','on'=>'youtube'),
            array('i_original', 'length', 'max' => 255),
            array('i_type, i_name, i_alt, i_source, i_info, watermark, crop, i_main', 'safe'),
        );
    }
    
    public function relations()
    {
        return array(
            'path' => array(self::BELONGS_TO, 'Object', 'i_path'),
            'type' => array(self::BELONGS_TO, 'Lists' , array('i_type'=>'lid'),'on'=>'ltype="MT"','order'=>'l_sort ASC'),
        );
    }

    public function scopes() {
        return array(
            'withWatermark' => array(
                'select'=>array('*','1 as needWatermark'),
            ),
//            'withCrop' => array(
//                'select'=>array('*','1 as needCrop'),
//            ),
//            'withCrop&Watermark' => array(
//                'select'=>array('*','1 as needCrop','1 as needWatermark'),
//            ),
            'main'      => array(
                'order'=>'type DESC, sort ASC'
            ),
        );
    }

    public function afterFind() {
        $this->watermark = ($this->isNewRecord || !$this->needWatermark)
            ? 0 
            : $this->i_watermark;
//        $this->crop = $a = ($this->isNewRecord || !$this->needCrop)
//            ? 0 
//            : $this->i_crop;
        parent::afterFind();
    }

    public function beforeDelete() {
        if (!parent::beforeDelete()) return false;
        
        // Удаляем файл
        $dir = self::getMediaUrlPhoto($this->i_path, $this->i_oid,DIRECTORY_SEPARATOR);
        @unlink($dir.$this->i_original);
        if(!glob($dir."*"))
            @rmdir($dir);
        return true;
    }
    
    public function isEmpty() {
        return  empty($this->i_original);
    }
    
    public function isEqual($attributes) {
        return  $this->i_original == $attributes['i_original'] &&
                $this->i_name     == $attributes['i_name']     &&
                $this->i_alt      == $attributes['i_alt']      &&
                $this->i_type     == $attributes['i_type']     &&
                $this->i_source   == $attributes['i_source']   &&
                $this->i_info     == $attributes['i_info']     &&
                $this->watermark  == $attributes['watermark']  &&
                //$this->crop       == $attributes['crop']       &&
                $this->i_crop     == $attributes['i_crop'];
    }
    
    /**
     * 
     * @param type $aFile - массив $_FILES["имя input"]
     * @param type $subDir - дерево деректорий внутри protected/media
     * @param type $name - tag title
     * @param type $alt - tag alt
     * @param type $watermark - 0-без watermark, 1-c watermark
     * @return boolean - если массив пуст True, если ошибка False иначе integer - id в БД
     */
    public static function LoadImg($aFile, $objType, $objId, $name, $alt, $info, $src, 
            $watermark=NULL, $cropEditable=true,$i_crop=false,$i_color=false,$maxFileSize = self::maxFileSize)
    {
        
        if( !$aFile['tmp_name'] )
            return false;
        if($aFile["size"]<1024*1024*$maxFileSize){
            $type = '';
            $imageType = self::typeUNKNOWN;
            if (strpos($aFile['type'],'image/')===0) {
                $type = '.'.str_replace('image/', '', $aFile['type']);
                if ($type=='.jpeg') $type='.jpg';
                $imageType = self::typeIMAGE;  // Фото  см. таблицу list ltype="MT"
            } else
            if (strpos($aFile['type'],'application/')===0) {
                $type = '.'.str_replace('application/', '', $aFile['type']);
                if ($type=='.pdf')
                    $imageType = self::typeFILE;
            }
                
            if ($imageType == self::typeUNKNOWN) {
                Yii::log('Формат '.$aFile['type'].' не поддерживается!');
                return false;
            } //else
              //  Yii::log('Формат картинки!'.$type);
            $reName = explode('.', basename($aFile['name']));
            //$last = 
            array_pop($reName);
            $Filename = TranslitFilter::translitUrl(implode('.', $reName));
            $dir = self::getMediaUrlPhoto($objType, $objId);
            if (is_uploaded_file($aFile['tmp_name'])){
                if (!@is_dir($dir))
                    if (!@mkdir($dir, 0777, true)){
                        Yii::log('Не могу создать дерикторию "'.$dir.'"');
                        return false;
                    }
                $model = new Media;
                $model->needWatermark = $watermark ? 1 : 0;
//                $model->needCrop = $crop ? 1 : 0;
                $model->i_path = $objType;
                $model->i_oid  = $objId;
                $model->i_type = $imageType;
                $model->i_name = $name;
                $model->i_alt = $alt;
                $model->i_info = $info;
                $model->i_source = $src;
                $model->i_original = $Filename.$type;
                $model->i_watermark = is_null($watermark)? 0 : ($watermark ? 1 : 0);
                $model->setParam('crop',$i_crop ? explode (':', $i_crop) : false);
                $crop = $model->getParam('crop');
                $cropImmediately = !$cropEditable && is_array($crop) && count($crop)==4;
                if (!$cropEditable || !is_array($crop) || count($crop)!=4 )
                    $model->setParam('crop',false);
                if ($i_color!==false)
                    $model->setParam('color',$i_color);
                $model->save();
                
                // Доклеиваем к имени файла ID
                $FilenameBIG  = $Filename.($cropImmediately?'-big-':'-').$model->iid;
                $FilenameCrop = $Filename.'-'.$model->iid;
                
                if(move_uploaded_file($aFile['tmp_name'], $BIG=$dir.$FilenameBIG.$type)){
                    if ($cropImmediately) {
                        list($sw, $sh, $imageType) = getimagesize($BIG);
                        if (self::getResampled(
                                $imageType,$dir.$FilenameCrop.$type,$BIG,
                                $dx=$crop[2]-$crop[0],
                                $dy=$crop[3]-$crop[1],
                                $crop[0],$crop[1],$dx,$dy))
                        {
                            // Можно удалить оригинал
                            if (self::$deleteCroppedOriginal)
                                unlink($BIG);
                        } else // В случае неудачи обрезки используем оригинал
                            $FilenameCrop = $FilenameBIG;
                    }
                    Media::model()->updateByPk($model->iid, array(
                        'i_original'=>$FilenameCrop.$type,
                    ));
                }
                return $model;
            }
        }
        Yii::log('Размер превышает '.self::$maxFileSize.'Mb');
        return null;
    }
    
    public static function makeMedia($mediaType, $original, $objType, $objId, $name, $alt, $info, $src) {
        $model = new Media();
        $model->i_path = $objType;
        $model->i_oid  = $objId;
        $model->i_type = $mediaType;
        $model->i_name = $name;
        $model->i_alt  = $alt;
        $model->i_info = $info;
        $model->i_source = $src;
        $model->i_original = $original;
        $model->save();
        return $model;
    }

    static public function suffixedName($name,$suffix) {
        $pieces = explode('.', $name);
        if (1<($count=count($pieces))) {
            $pieces[$count-2] .= $suffix;
            return implode('.', $pieces);
        }
        return $name;
    }
    
    /**
     * 
     * @param string $request - строка запроса в формате: 
     *                          "mediaDir / модель / размеры / id объекта / название фото"
     *                          где: mediaDir - дериктория всех фото
     *                               модель   - имя модели (папки)
     *                               размеры  : число-число   - жестко установлена ширина/высота
     *                                          число-число-m - магическая обзерка вписанной области
     *                                          число-s       - высота масштабируется под заданую ширину
     *                                          s-число       - ширина масштабируется под заданую высоту
     *                                          число-cl      - вырезать заданную ширину слева
     *                                          число-cr      - вырезать заданную ширину справа
     *                                          число-cc      - вырезать заданную ширину по центру
     *                                          ct-число      - вырезать заданную высоту сверху
     *                                          cb-число      - вырезать заданную высоту снизу
     *                                          cс-число      - вырезать заданную высоту по центру
     *                                          o-o           - оригинал
     *                                          w             - НЕ ОБЯЗАТЕЛЬНЫЙ 3 параметр,
     *                                                          watermark (если выбрано пользователем)
     *                                          crop          - НЕ ОБЯЗАТЕЛЬНЫЙ 3 параметр,
     *                                                          обрезка,
     *                                          m             - НЕ ОБЯЗАТЕЛЬНЫЙ 3 параметр,
     *                                                          магическая обрезка ("размер" вписать в картинку),
     *                                          n             - НЕ ОБЯЗАТЕЛЬНЫЙ 3 параметр,
     *                                                          вписать в прямоугольник без обрезки
     *                              id объекта- id объекта этого фото
     */
    public function cachePhoto($request){
        
        if (file_exists($request)) {
            Yii::log('IMAGE:'.$request);
            self::file_force_download($request);
        }
        
        $params = explode("/", $request);
        if(count($params) != 7){
            Yii::log("Количество параметров не равно 7!!!");
            self::file_force_download(Yii::app()->params["defaultPhoto"]);
            Yii::app()->end();
        }
        $dir      = $params[0];
        $model    = $params[1];
        $size     = strtolower($params[2]);
        $subIdOne = $params[3];
        $subIdTwo = $params[4];
        $id_model = $params[5];
        $photo    = $params[6];
        
        $pathOriginal = $dir.DIRECTORY_SEPARATOR.
                $model.DIRECTORY_SEPARATOR.
                'original'.DIRECTORY_SEPARATOR.
                $this->getSubUrlPhoto($id_model).
                $photo;
        $dst_dir = $dir.DIRECTORY_SEPARATOR.
                $model.DIRECTORY_SEPARATOR.
                $size.DIRECTORY_SEPARATOR.
                $this->getSubUrlPhoto($id_model);
        $dst_file = $dir.DIRECTORY_SEPARATOR.
                $model.DIRECTORY_SEPARATOR.
                $size.DIRECTORY_SEPARATOR.
                $this->getSubUrlPhoto($id_model).
                $photo;
        
        if (file_exists($dst_file)) {
            //Yii::log('Для уменьшения нагрузки на сайт, вводите параметры в нижнем регистре!!! "'.$params[2].'" => "'.$size.'"');
            self::file_force_download($dst_file);
            //Yii::app()->end();
        }
        
        if (!file_exists($pathOriginal)) {
            //Yii::log(getcwd());
            //Yii::log("Изображение не найдено!!!");
            self::file_force_download(Yii::app()->params["defaultPhoto"]);
            //Yii::app()->end();
        }
        
        $sizeSettings = explode("-", $size,3);
        if(count($sizeSettings) != 3){
            if(count($sizeSettings) == 2)
                $sizeSettings[] = '';
            else{
                //Yii::log("Размеры фото определяются 2(или 3) параметрами!!!");
                self::file_force_download(Yii::app()->params["defaultPhoto"]);
                //Yii::app()->end();
            }
        }
        
        $w = trim($sizeSettings[0]);
        $h = trim($sizeSettings[1]);
        $flag = trim($sizeSettings[2]);
        
        $flagList = explode('-', $flag);
        
        $watermark = false;
        $crop      = false;
        $magicSize = false;
        $suffix    = '';
        foreach ($flagList as $flagName) {
            if($flagName=="w"   ) $watermark = true; else // w - waterMark,
            if($flagName=="crop") $crop      = true; else // crop - crop,
            if($flagName=="m"   ) $magicSize = 'm'; else
            if($flagName=="n"   ) $magicSize = 'n'; else
                $suffix .= '-'.TranslitFilter::translitUrl($flagName);
        }
        
        if ($suffix) { // Наличие оригинала обязательно. Проверяется выше.
            $suffixedName = self::suffixedName($pathOriginal,$suffix);
            if (($pathOriginal != $suffixedName) && file_exists($suffixedName))
                $pathOriginal = $suffixedName;
            else
                Yii::log('SUFFIXED IMAGE NOT FOUND: '.$suffixedName);//.' <= '.$request);
        }
        
        list($org_w, $org_h, $type) = getimagesize($pathOriginal);
        $mb = ceil(2.6*$org_w*$org_h*4/1024/1024);
        if ($mb>20) {
            Yii::log('MEMORY_LIMIT:'.$mb.' '.$pathOriginal);
            ini_set('memory_limit', $mb.'M');
        }
        
        $dst_x = $dst_y = 0;
        $oldstarw = 0;
        $oldstarh = 0;
        
        $nameMas = explode(".", $photo);
        array_pop($nameMas);
        $name = implode(".", $nameMas);
        $idMas = explode("-", $name);
        $id = array_pop($idMas);
        $MediaModel = Media::model()->findByPk($id);
        
        if (($crop || $watermark) && $MediaModel===null) {
            self::file_force_download(Yii::app()->params["defaultPhoto"]);
            //Yii::app()->end();
        }
        if( $crop ){
            if( ($cropParam = $MediaModel->getParam('crop')) && is_array($cropParam) && count($cropParam)==4){
                $oldstarw  = $cropParam[0];
                $oldstarh  = $cropParam[1];
                $org_w     = $cropParam[2]-$cropParam[0];
                $org_h     = $cropParam[3]-$cropParam[1];
            }
        }
        
//        if( is_numeric($w) && $w>$org_w){
//            $w = $org_w;
//        }
//        if( is_numeric($h) && $h>$org_h){
//            $h = $org_h;
//        }
        
        if ( ($w!="o" && $h!="o") && (!is_numeric($w)) && (!is_numeric($h)) ) {
            Yii::log('"'.$w.'"x"'.$h.'" - не верные параметры!!!');
            self::file_force_download(Yii::app()->params["defaultPhoto"]);
            Yii::app()->end();
        }
        elseif (is_numeric ($w) && is_numeric ($h)) {
            //resize
            if ($w>0 && $h>0 && $org_w>0 && $org_h>0 && $magicSize) {
                //Yii::log("$org_w/$w : $org_h/$h");
                if ($magicSize==='m' ){ // $w>0 && $h>0
                    // Растягиваем оригинал так, чтобы можно было вписать прямоугольник $w*$h
                    // и по этому прямоугольнику вырезаем из середины оригинала
                    $wRatio = $org_w/$w;
                    $hRatio = $org_h/$h;
                    if ($wRatio > $hRatio) {
                        $org_w_temp = $w * $hRatio;
                        if ( !$crop ) {
                            $oldstarh = 0;
                            $oldstarw = ($org_w / 2 - $org_w_temp/2);
                        } else {
                            $oldstarw = $oldstarw+($org_w / 2 - $org_w_temp/2);
                        }
                        $org_h = $org_h;
                        $org_w = $org_w_temp;
                    } else {
                        $org_h_temp = $h * $wRatio;
                        if ( !$crop ) {
                            $oldstarh = ($org_h/2 - $org_h_temp/2);
                            $oldstarw = 0;
                        } else {
                            $oldstarh = $oldstarh+($org_h/2 - $org_h_temp/2);
                        }
                        $org_h = $org_h_temp;
                        $org_w = $org_w;
                    }
                } else
                if ($magicSize==='n'){ //&& $org_w>0 && $org_h>0
                    // Пытаемся вписать в прямоугольник $w*$h (без обрезки)
                    $wRatio = $w/$org_w;
                    $hRatio = $h/$org_h;
                    if ($hRatio < $wRatio) { 
                        // Требуемая ширина ($w) больше полученной в результате сжатия оригинала
                        $w = $org_w * $hRatio;
                        //Yii::log("$oldstarw:$oldstarh:$org_w:$org_h");
                    } else { 
                        // Требуемая высота ($h) больше полученной в результате сжатия оригинала
                        $h = $org_h * $wRatio;
                        //Yii::log("$oldstarw:$oldstarh:$org_w:$org_h");
                    }
                }
            }
            $dst_w = $w;
            $dst_h = $h;
        }
        elseif ($w == 's' && is_numeric ($h)) {
            //zoom
            $dst_h = $h;
            $dst_w = floor($org_w*$h/$org_h);
        }
        elseif (is_numeric ($w) && $h == 's') {
            //zoom
            $dst_h = floor($org_h*$w/$org_w);
            $dst_w = $w;
        }
        elseif ($w == 'ct' && is_numeric ($h)) {
            //crop top
            $dst_h = $h;
            $dst_w = $org_w;
            $org_h = $h;
        }
        elseif ($w == 'cb' && is_numeric ($h)) {
            //crop bottom
            $dst_h = $h;
            $dst_w = $org_w;
            $oldstarh = $org_h-$h;
            $org_h = $h;
        }
        elseif ($w == 'cc' && is_numeric ($h)) {
            //crop center
            $dst_h = $h;
            $dst_w = $org_w;
            $oldstarh = floor(($org_h-$h)/2);
            $org_h = $h;
        }
        elseif (is_numeric ($w) && $h == 'cl') {
            //crop left
            $dst_h = $org_h;
            $dst_w = $w;
            $org_w = $w;
        }
        elseif (is_numeric ($w) && $h == 'cr') {
            //crop right
            $dst_h = $org_h;
            $dst_w = $w;
            $oldstarw = $org_w-$w;
            $org_w = $w;
        }
        elseif (is_numeric ($w) && $h == 'cc') {
            //crop center
            $dst_h = $org_h;
            $dst_w = $w;
            $oldstarw = floor(($org_w-$w)/2);
            $org_w = $w;
        }
        elseif ($w == "o" && $h == 'o') {
            //original
            if( ($org_h > Yii::app()->params['maxSizePhoto']) || 
                ($org_w > Yii::app()->params['maxSizePhoto']) ){
                if( $org_h > $org_w ){
                    $dst_h = Yii::app()->params['maxSizePhoto'];
                    $dst_w = floor($org_w*Yii::app()->params['maxSizePhoto']/$org_h);
                }else{
                    $dst_w = Yii::app()->params['maxSizePhoto'];
                    $dst_h = floor($org_h*Yii::app()->params['maxSizePhoto']/$org_w);
                }
            }else{
                $dst_h = $org_h;
                $dst_w = $org_w;
            }
        }
        else{
            //error
            Yii::log('"'.$w.'"x"'.$h.'" - указанный метод отсутствует!!!');
            self::file_force_download(Yii::app()->params["defaultPhoto"]);
            Yii::app()->end();
        }

        if ( ($dst_w < Yii::app()->params['minSizePhoto']) || 
             ($dst_w > Yii::app()->params['maxSizePhoto']) || 
             ($dst_h < Yii::app()->params['minSizePhoto']) || 
             ($dst_h > Yii::app()->params['maxSizePhoto']) ) {
            // bad size
            Yii::log('"'.$dst_w.'"x"'.$dst_h.'" - не корректные размеры (min или max) !!!');
            self::file_force_download(Yii::app()->params["defaultPhoto"]);
            Yii::app()->end();
        }
        
        if ( ! ($mimeSuf=self::getResampled(
            $type,$dst_file,$pathOriginal,
            $dst_w,$dst_h,$oldstarw,$oldstarh,$org_w,$org_h,$dst_x,$dst_y)))
        {
            self::file_force_download(Yii::app()->params["defaultPhoto"]);
            Yii::app()->end();
        }
        /*-------------waterMark--------------*/
        if( $watermark && $MediaModel->i_watermark )
            watermark::output($dst_file, $dst_file);
        
        self::file_force_download($dst_file,$mimeSuf);
        
        Yii::app()->end();
    }
    
    static protected function getResampled(
        //&$dst,&$src,&$mimeSuf,
        $imageType,$dstName,$srcName,
        $dw,$dh,$sx,$sy,$sw,$sh,
        $dx=0,$dy=0
    ) {
        //Yii::log("$dstName,$srcName, $dx,$dy, $dw,$dh, $sx,$sy, $sw,$sh");
        $dst=false; $src=false; $mimeSuf='';
        switch ($imageType) {
            case 1 : //gif
                $src = ImageCreateFromGif($srcName);
                $dst = imagecreatetruecolor($dw, $dh);
                if( !self::createDir($dstName,true) ) Yii::app()->end();
                imagecopyresampled($dst,$src, $dx,$dy, $sx,$sy, $dw,$dh, $sw,$sh);
                $state = imagegif($dst, $dstName);
                $mimeSuf = "gif";
                break;
            case 2 : //jpg
                $src = ImageCreateFromJpeg($srcName);
                $dst = imagecreatetruecolor($dw, $dh);
                if( !self::createDir($dstName,true) ) Yii::app()->end();
                imagecopyresampled($dst, $src, 0, 0, $sx, $sy, $dw, $dh, $sw, $sh);
                $state = imagejpeg($dst, $dstName, 90);
                $mimeSuf = "jpeg";
                break;
            case 3 : //png
                $src = ImageCreateFromPng($srcName);
                $dst = imagecreatetruecolor($dw, $dh);
                if( !self::createDir($dstName,true) ) Yii::app()->end();
                // Fill with alpha background
                imagefill($dst, 0, 0, imagecolorallocatealpha($dst, 0, 0, 0, 127));
                //imagetruecolortopalette($img_n, false, 65535);
                imagealphablending($dst, false);
                imagesavealpha($dst, true);

                imagecopyresampled($dst, $src, 0, 0, $sx, $sy, $dw, $dh, $sw, $sh);
                $state = imagepng($dst, $dstName, 0);
                $mimeSuf = "png";
                break;
            default :
                Yii::log("Тип не поддерживается!!!");
                $state = false;
                break;
        }
        if ($src) imagedestroy($src);
        if ($dst) imagedestroy($dst);
        
        if (!$state && $mimeSuf) {
            $mimeSuf = '';
            Yii::log("Ошибка записи файла!!!");
        }
            
        return $mimeSuf;
    }
    
    static protected function createDir($dst_dir,$isFile=false) {
        if ($isFile) // отрезаем имя файла
            $dst_dir = substr($dst_dir,0,-strlen(basename($dst_dir)));
        
        if( !is_dir($dst_dir) ){
            if( !mkdir($dst_dir, 0777, true) ){
                Yii::log("Не могу создать директорию '$dst_dir'!!!");
                self::file_force_download(Yii::app()->params["defaultPhoto"]);
                return false;
            }
        }
        return true;
    }
    
    static protected function getMimeSuffixImage($file) {
        $pieces = explode('.', $file);
        if (count($pieces)) {
            $mime = strtolower(array_pop($pieces));
            switch ($mime) {
            case 'jpg' : $mime='jpeg';
            case 'jpeg': case 'png': case 'gif': break;
            default: $mime = '';
            }
        } else
            $mime = '';
        return $mime;
    }
    
    static protected function file_force_download($file,$mimeSuffix=null) {
        if (!file_exists($file)) {
            Yii::log("Новое изображение не найдено!!! $file");
            if ($file!=Yii::app()->params["defaultPhoto"])
                self::file_force_download(Yii::app()->params["defaultPhoto"]);
            throw new CHttpException(404,'Картинка не найдена');
        }
        if ($mimeSuffix===null) {
            $mimeSuffix = self::getMimeSuffixImage($file);
            if (empty($mimeSuffix))
                Yii::app()->end();
        }
        // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
        // если этого не сделать файл будет читаться в память полностью!
        if (ob_get_level()) {
          ob_end_clean();
        }
        // заставляем браузер показать окно сохранения файла
        /*
         * или нет
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        */
        header('Content-Type: image/'.$mimeSuffix);
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: '.filesize($file));
        // читаем файл и отправляем его пользователю
        readfile($file);
        Yii::app()->end();
    }
    
    static public function ClearCacheByOriginal($model,$id,$original){
        $dir = Yii::app()->params['mediaDir'].DIRECTORY_SEPARATOR.$model;
        $pathName = self::getSubUrlPhoto($id,DIRECTORY_SEPARATOR).$original;
        if (is_dir($dir)) {
            if ($handle = opendir($dir)) {
                while (false !== ($entry = readdir($handle))) {
                    //Получили папки объектов
                    // исключаем папки с назварием '.' и '..' 
                    if ($entry!='.' && $entry!='..' && $entry!='original'){
                        $tmpPath = $dir.DIRECTORY_SEPARATOR.$entry;
                        @chmod($tmpPath, 0777);
                        if (is_dir($tmpPath)){
                            // если папка
                            $PhotoFile = $tmpPath.DIRECTORY_SEPARATOR.$pathName;
                            Yii::log("Чистим кеш: ".$PhotoFile);
                            if(file_exists($PhotoFile)){
                                // удаляем файл 
                                if (!@unlink($PhotoFile))
                                    Yii::log('Не удалось удалить '.$PhotoFile);
                            }
                        }
                    }
                }
                closedir($handle);
            }
        } else
        Yii::log("Директория ".$dir." не существует! ".getcwd());
    }
    
    public function ClearCacheByModel($model){
        $dir = Yii::app()->params['mediaDir'].DIRECTORY_SEPARATOR
            .Object::getAlias($model->i_path);
        $pathName = self::getSubUrlPhoto($model->i_oid).$model->i_original;
        if (is_dir($dir)) {
            if ($handle = opendir($dir)) {
                while (false !== ($entry = readdir($handle))) {
                    //Получили папки объектов
                    // исключаем папки с назварием '.' и '..' 
                    if ($entry!='.' && $entry!='..' && $entry!='original'){
                        $tmpPath = $dir.'/'.$entry;
                        @chmod($tmpPath, 0777);
                        if (is_dir($tmpPath)){
                            // если папка
                            $PhotoFile = $tmpPath.DIRECTORY_SEPARATOR.$pathName;
                            //Yii::log($PhotoFile." - очистка cache фото для WaterMark!");
                            if(file_exists($PhotoFile)){
                                // удаляем файл 
                                @unlink($PhotoFile);
                            }
                        }
                    }
                }
                closedir($handle);
            }
        } else
        Yii::log("Директория ".$dir." не существует! ".getcwd());
    }
        
    public function ClearCachePhoto($dir){
        if (is_dir($dir)) {
            if ($handle = opendir($dir)) {
                while (false !== ($entry = readdir($handle))) {
                    //Получили папки объектов
                    // исключаем папки с назварием '.' и '..' 
                    if ($entry!='.' && $entry!='..'){
                        $tmpPath = $dir.'/'.$entry;
                        @chmod($tmpPath, 0777);
                        if (is_dir($tmpPath)){
                            // если папка
                            Yii::log($tmpPath." - очистка cache фото!");
                            if ($handle1 = opendir($tmpPath)) {
                                while (false !== ($entry1 = readdir($handle1))) {
                                    //Получили папку original и cache-папки
                                    // исключаем папки с назварием '.' и '..' и 'original'
                                    if ($entry1!='.' && $entry1!='..' && $entry1!='original'){
                                        $tmpPath1 = $tmpPath.'/'.$entry1;
                                        @chmod($tmpPath1, 0777);
                                        if (is_dir($tmpPath1)){
                                            $this->RemoveDir($tmpPath1);
                                        }else{ 
                                            if(file_exists($tmpPath1)){
                                                // удаляем файл 
                                                @unlink($tmpPath1);
                                            }
                                        }
                                    }
                                }
                            }
                            Yii::log($tmpPath." - удалены все файлы, которые не используются больше ".Yii::app()->params["monthsAgoCachePhoto"]." месяца(ев)!");
                        }else{ 
                            if(file_exists($tmpPath)){
                                // удаляем файл 
                                @unlink($tmpPath);
                            }
                        }
                    }
                }
                closedir($handle);
            }
            Yii::app()->end();
        } else
        Yii::log("Директория ".$dir." не существует! ".getcwd());
        Yii::app()->end();
    }
    
    private function RemoveDir($path){
        if(file_exists($path) && is_dir($path)){
            $dirHandle = opendir($path);
            while (false !== ($file = readdir($dirHandle))){
                if ($file!='.' && $file!='..'){
                    $tmpPath=$path.'/'.$file;
                    @chmod($tmpPath, 0777);

                    if (is_dir($tmpPath)){  // если папка
                        $this->RemoveDir($tmpPath);
                    }else{ 
                        if(file_exists($tmpPath)){
                            // удаляем файл 
                            if($this->oldFile($tmpPath))
                                @unlink($tmpPath);
                        }
                    }
                }
            }
            closedir($dirHandle);
            // удаляем текущую папку
            if(!glob($path."/*"))
                @rmdir($path);
	}else{
            Yii::log("Директория ".$path." не существует!");
            Yii::app()->end();
	}
    }
    
    private function oldFile($pathFile){
        if (file_exists($pathFile)) {
            $oldDate = mktime(date("H"), date("i"), date("s"), date("n")-Yii::app()->params["monthsAgoCachePhoto"], date("j"), date("Y"));
            $dateRead = fileatime($pathFile);
            if($dateRead < $oldDate){
                return true;
            }
            return false;
        }
        Yii::log("Файл $pathFile не существует!");
        return false;
    }
    
    //Media::getSubUrlPhoto($iid);
    public static function getSubUrlPhoto($objId,$sep='/'){
        $zlname = sprintf('%07d', $objId);
        $folders = sprintf('%s'.$sep.'%s'.$sep, substr($zlname, 0, 2), substr($zlname, 2, 2));
        return $folders.$objId.$sep;
    }
    
    public static function getMediaUrlPhoto($objType,$objId,$sep='/',$addPath='original'){
        return Yii::app()->params['mediaDir'].$sep.
            (empty($objType) ? 'default' : Object::getAlias($objType)).$sep.
            $addPath.$sep.self::getSubUrlPhoto($objId);
    }
    
    public function getMediaUrl($addPath='original',$sep='/') {
        switch ($this->i_type) {
        case Media::typeYOUTUBE:
            if ($addPath==450 || $addPath==501)
                return 'http://www.youtube.com/embed/'.$this->i_original;
            return 'http://www.youtube.com/v/'.$this->i_original.'?version=3&amp;hl=uk_UA';
            break;
        case Media::typeLINK:
            return $this->i_original;
            break;
        case Media::typeIMAGE:
            return $sep.self::getMediaUrlPhoto($this->i_path, $this->i_oid,$sep,$addPath).$this->i_original;
            break;
        default: // Media::typeUNKNOWN
            return $this->i_original;
        }
    }
    
    public function getMediaForm($addPath='original', $htmlOptions=array()) {
        $alt = $this->i_alt;
        if (isset($htmlOptions['alt'])) {
            if (empty($alt))
                $alt = $htmlOptions['alt'];
            unset($htmlOptions['alt']);
        }
        switch ($this->i_type) {
        case Media::typeYOUTUBE:
            if (empty($this->i_original)) return '';
            
            if ($addPath=='pict' || $addPath=='140-s') {
                // 140-s - используется в спецтемах
                $name = $addPath=='140-s' ? 'default.jpg' : '0.jpg';
                if (!empty($this->i_name))
                    $htmlOptions['title'] = $this->i_name;
                return CHtml::image("http://i1.ytimg.com/vi/{$this->i_original}/$name", $this->i_alt, $htmlOptions);
            }
            
            $width = $addPath;
            if ( ! isset(self::$youtubeSize[$width]))
                $width = 630;
            $height = self::$youtubeSize[$width];
            $src = $this->getMediaUrl($addPath);
            
            if ($width==450 || $width==501) { //urist
                return "<iframe width='$width' height='$height' src='$src' frameborder='0' allowfullscreen></iframe>";
            }
            return
'                <object width="'.$width.'" height="'.$height.'">
                    <param name="movie" value="'.$src.'"></param>
                    <param name="allowFullScreen" value="true"></param>
                    <param name="allowscriptaccess" value="always"></param>
                    <embed src="'.$src.'" type="application/x-shockwave-flash" width="'.$width.'" height="'.$height.'" allowscriptaccess="always" allowfullscreen="true"></embed>
                </object>
';          break;
        case Media::typeLINK:
            return CHtml::image($this->i_original, '', $htmlOptions);
            break;
        case Media::typeIMAGE:
            if (!empty($this->i_name))
                $htmlOptions['title'] = $this->i_name;
            return CHtml::image($this->getMediaUrl($addPath), $alt, $htmlOptions);
            break;
            
        default: // Media::typeUNKNOWN
            return $this->i_original;
        }
    }

    public function getMediaPath($addPath='original',$sep='/') {
        if ($this->i_type==1)
            return self::getMediaUrlPhoto($this->i_path, $this->i_oid,$sep,$addPath).$this->i_original;
        else 
            return $this->i_original;
    }
    
    public static function makeLink($otype, $oid, $media_id, $type=0, $sort=0){
        if (empty($sort)) {
            $maxSort = LinkOI::model()->find(array(
                'condition' => 'object_type='.$otype.' AND object_id='.$oid,
                "select"    => "MAX(sort) as max"
            ));
            $sort = (is_null($maxSort) || is_null($maxSort->max)) ? 0 : ($maxSort->max+1);
        }    
        Yii::app()->db->createCommand(
            "INSERT INTO `{{linkOI}}` (`object_id`,`object_type`,`media_id`,`type`, `sort`)
             VALUES ($oid, $otype, $media_id, $type, $sort)"
        )->execute();
        
    }
    
    public static function dropLink($otype, $oid, $media_id, $type=0){
        Yii::app()->db->createCommand(
            "DELETE FROM `{{linkOI}}` WHERE `object_id`=$oid 
                    AND `object_type`=$otype 
                    AND `media_id`=$media_id AND `type`=$type)"
        )->execute();
        
    }
    
    public function updateLink($old_main){
        if ($this->isNewRecord) return;
        // Если ничего не изменилось
        if ($this->i_main == $old_main) return;
        Yii::app()->db->createCommand(
            "UPDATE `{{linkOI}}` SET `type`={$this->i_main} WHERE
             `object_type`={$this->i_path} AND `object_id`={$this->i_oid}
             AND `type`=$old_main         AND `media_id`={$this->iid}"
        )->execute();
        
    }
    
    public function dropFile() {
        if ($this->i_type==1 && $this->i_original!="") {
            $dir = self::getMediaUrlPhoto($this->i_type,$this->iid);
            @unlink($dir.$this->i_original);
            if(!glob($dir."*"))
                @rmdir($dir);
        }
        
    }
    
    static public function imageForm($media,$size,$return=false) {
        if (is_array($media) && !empty($media))
            $media = array_shift($media);
        $image = $media ? $media->getMediaForm($size):'';
        if ($return)
            return $image;
        echo $image;
    }
    
    static public function initCrop( $crop=NULL ) {
        if( $crop ){
            $photo = Media::model()->findByPk($crop["id"]);
            $oldCrop = $photo->i_crop;
            $photo->i_crop = $crop["x1"].':'.$crop["y1"].':'.$crop["x2"].':'.$crop["y2"];
            if( $photo->save() ){
                Media::model()->ClearCacheByModel($photo);
                return true;
            }
            return false;
        }else{
            return false;
        }
    }
}
