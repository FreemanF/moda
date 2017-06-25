<?php

class elFinderLogger implements elFinderILogger {
	
    // loggedCommands = array('mkdir', 'mkfile', 'rename', 'upload', 'paste', 'rm', 'duplicate', 'edit', 'resize');
    
    public function fileLog($cmd, $ok, $context, $err='', $errorData = array()) {
        if (false != ($fp = fopen('./protected/runtime/elfinder.log', 'a'))) {
            if ($ok) {
                $str = "cmd: $cmd; OK; context: ".str_replace("\n", '', var_export($context, true))."; \n";
            } else {
                $str = "cmd: $cmd; FAILED; context: ".str_replace("\n", '', var_export($context, true))."; error: $err; errorData: ".str_replace("\n", '', var_export($errorData, true))."\n";
            }
            fwrite($fp, $str);
            fclose($fp);
        }
    }
	
    public function log($cmd, $ok, $context, $err='', $errorData = array()) {
        $this->fileLog($cmd, $ok, $context, $err, $errorData);
        if ($ok) try {

            switch ($cmd) {
            case 'mkdir': Log::makeInsert(Object::idFile, null, $context['dir'].'/'); break;
            case 'mkfile': Log::makeInsert(Object::idFile, null, $context['file']); break;
            case 'rename': Log::makeUpdate(Object::idFile, null, $context['from'].' => '.$context['to']); break;
            case 'upload': $wm = $context['watermark'] ? 'wm: ':'';
                foreach($context['upload'] as $file)
                    Log::makeInsert(Object::idFile, null, $wm.$file); break;
            case 'paste': $cp = $context['cut'] ? '':'copy ';
                $dest = $context['dest'].'/';
                foreach($context['src'] as $file) {
                    $name = basename($file);
                    if ($cp)
                        Log::makeInsert(Object::idFile, null, $cp.$dest.$name); 
                    else
                        Log::makeUpdate(Object::idFile, null, $file.' => '.$dest.$name);
                }
                break;
            case 'rm': 
                foreach($context['targets'] as $file)
                   Log::makeDelete(Object::idFile, null, $file); break;
            case 'duplicate': Log::makeInsert(Object::idFile, null, 'copy '.$context['result']); break;
            case 'edit': Log::makeUpdate(Object::idFile, null, $context['target']); break;
            case 'resize': Log::makeUpdate(Object::idFile, null, $context['width'].'x'.$context['height'].' <= '.$context['target']); break;
            default : Yii::log('elFinder - '.$cmd.' не предусмотрено ведение протокола.', CLogger::LEVEL_ERROR);
            }
                
        } catch (Exception $exc) {
            Yii::log("Не удалось записать в протокол операцию $cmd в elFinder. ".$exc->getMessage(), CLogger::LEVEL_WARNING);
        }
    }
}