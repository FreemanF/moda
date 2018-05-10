<?php

class XMP extends CController{
    
    private static $IPTC_field=array('TITLE'               =>'2#005',
                                     'AUTHOR'              =>'2#080',
                                     'AUTHOR_TITLE'        =>'2#085',
                                     'DESCRIPTION'         =>'2#120',
                                     'KEYWORDS'            =>'2#025',
                                     'COPYRIGHTS_NOTICE'   =>'2#116',
                                     'SPECIAL_INSTRUCTIONS'=>'2#040', // watermark
                                     'CAPTION_ABSTRACT'    =>'2#120', // crop через ":"
                                    );

    public static function getXMP($sAbsoluteFilePath,$iptc_field){
        if (!file_exists($sAbsoluteFilePath)){
            Yii::log("File $sAbsoluteFilePath not exists");
            return 0;
        }
        try {
            @getimagesize($sAbsoluteFilePath, $iptc);
        } catch (Exception $e) {
            Yii::log('GET XMP ERROR: '.$sAbsoluteFilePath);
        }
        if (!isset($iptc['APP13'])) return 0;
        $aIptc=iptcparse($iptc['APP13']);
        $fieldname = self::$IPTC_field[$iptc_field];
        return isset($aIptc[$fieldname][0]) ? $aIptc[$fieldname][0] : 0;
    }  

    public static function setXMP($sAbsoluteFilePath,$aIPTC=array()){
        if (!file_exists($sAbsoluteFilePath)){
            Yii::log("File $sAbsoluteFilePath not exists");
            return false;
        }

        $utf8seq = chr(0x1b) . chr(0x25) . chr(0x47);
        $length = strlen($utf8seq);
        $data = chr(0x1C) . chr(1) . chr('090') . chr($length >> 8) . chr($length & 0xFF) . $utf8seq; 

        foreach($aIPTC as $iptc => $string){
            if (!self::$IPTC_field[$iptc])
                continue;
            $tag = substr(self::$IPTC_field[$iptc], 2);
            $data .= self::iptc_make_tag(2, $tag, $string);
        }
        $new_img=iptcembed($data, $sAbsoluteFilePath);

        if(file_put_contents($sAbsoluteFilePath,$new_img))
            return true;
        else{
            Yii::log("File $sAbsoluteFilePath not save");
            return false;
        }
    }
    
    private static function iptc_make_tag($rec, $data, $value) {
        $length = strlen($value);
        $retval = chr(0x1C) . chr($rec) . chr($data);

        if ($length < 0x8000) {
            $retval .= chr($length >> 8) . chr($length & 0xFF);
        } else {
            $retval .= chr(0x80) .
            chr(0x04) .
            chr(($length >> 24) & 0xFF) .
            chr(($length >> 16) & 0xFF) .
            chr(($length >> 8) & 0xFF) .
            chr($length & 0xFF);
        }

        return $retval . $value;
    }
}