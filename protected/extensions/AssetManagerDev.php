<?php

// Взято с http://appossum.com/appsite/techdetail/yii-resources
    
class AssetManagerDev extends CAssetManager
{
    
    // говорящие папки
    protected function hash($path)
    {   
        $path2 = preg_replace("|(.*?)[/\\\]([^/\\\]*)[/\\\]htdocs[/\\\](.*?)|", "\${3}", $path); 
        $path2 = str_replace(array('\\','/'),"_",$path2);
        // можно добавить к содержательной (человекочитаемой) части 
        // для обеспечения уникальности
        //$path2 .= '_'.parent::hash($path);
        return $path2;
    }
    
    // для тех, кто не доверяет регулярным выражениям, хотя, 
    // как ни странно, следующий скрипт работает несколько медленнее, чем предыдущий
    
//    protected function hash($path)
//    {
//        $path2 = str_replace('\\','/',$path).'/';
//        $parts = explode('/assets/',$path2);
//        $ptr = strrpos($parts[0],'/');
//        if($parts[1] != "") {
//            $path2 = str_replace('/','_',  
//                    substr($parts[0],$ptr+1)."_".$parts[1]);
//        } else {
//            $path2 = str_replace('/','_',substr($parts[0],$ptr+1));
//        }
//        return $path2;
//    }    
    
    public function publish($path,$hashByName=false,$level=-1,$forceCopy=false)
    {
        if(defined('ASSETS_FORCE_COPY') && ASSETS_FORCE_COPY) $forceCopy = true;
        return parent::publish($path,$hashByName,$level,$forceCopy);
    }
}