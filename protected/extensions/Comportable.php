<?php

@define('MARKDOWN_PARSER_CLASS', 'MarkdownParser');
setlocale(LC_ALL, 'ru_RU.utf-8', ' ru_RU.utf8', 'ru_RU', 'russian');
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Kiev');

final class Comportable {


    public static function Markdown($text) {
    #
    # Initialize the parser and return the result of its transform method.
    #
        # Setup static parser variable.
        static $parser;
        if (!isset($parser)) {
            $parser_class = MARKDOWN_PARSER_CLASS;
            $parser = new $parser_class;
        }

        # Transform text using parser.
        # Transform text using parser.
        $text = $parser->transform($text);
        $jevix = new Jevix();
        //Конфигурация
    // 1. Устанавливаем разрешённые теги. (Все не разрешенные теги считаются запрещенными.)
        $jevix->cfgAllowTags(array('iframe','table','tbody','tr','td','p','a', 'img', 'i', 'b', 'u', 'em', 'strong', 'nobr', 'li', 'ol', 'ul', 'sup', 'abbr', 'pre', 'acronym', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'adabracut', 'br', 'code','blockquote'));

    // 2. Устанавливаем коротие теги. (не имеющие закрывающего тега)
        $jevix->cfgSetTagShort(array('br', 'img'));
        
        // Не удалять пустые тэги
        $jevix->cfgSetTagIsEmpty(array('iframe'));
                
    // 3. Устанавливаем преформатированные теги. (в них все будет заменятся на HTML сущности)
        $jevix->cfgSetTagPreformatted(array('pre'));

    // 4. Устанавливаем теги, которые необходимо вырезать из текста вместе с контентом.
        $jevix->cfgSetTagCutWithContent(array('script', 'object', /*'iframe', */'style'));
        
    // 5. Устанавливаем разрешённые параметры тегов. Также можно устанавливать допустимые значения этих параметров.
        $jevix->cfgAllowTagParams('a', array('title', 'href'));
        $jevix->cfgAllowTagParams('img', array('src', 'alt' => '#text', 'title', 'align' => array('right', 'left', 'center'), 'width' => '#int', 'height' => '#int', 'hspace' => '#int', 'vspace' => '#int'));
        $jevix->cfgAllowTagParams('iframe', array('width','height','frameborder','scrolling','marginheight','marginwidth','src','allowfullscreen'));


    // 6. Устанавливаем параметры тегов являющиеся обязяательными. Без них вырезает тег оставляя содержимое.
        $jevix->cfgSetTagParamsRequired('img', 'src');
        $jevix->cfgSetTagParamsRequired('a', 'href');

    // 7. Устанавливаем теги которые может содержать тег контейнер
    //    cfgSetTagChilds($tag, $childs, $isContainerOnly, $isChildOnly)
    //       $isContainerOnly : тег является только контейнером для других тегов и не может содержать текст (по умолчанию false)
    //       $isChildOnly : вложенные теги не могут присутствовать нигде кроме указанного тега (по умолчанию false)
        //$jevix->cfgSetTagChilds('ul', 'li', true, true);
        $jevix->cfgSetTagChilds('ul', array('li'), false, true);
        $jevix->cfgSetTagChilds('ol', array('li'), false, true);


    // 8. Устанавливаем атрибуты тегов, которые будут добавлятся автоматически
       // $jevix->cfgSetTagParamsAutoAdd('a', array('rel' => 'nofollow'));
        //$jevix->cfgSetTagParamsAutoAdd('img', array('width' => '300', 'height' => '300'));

    // 9. Устанавливаем автозамену
        $jevix->cfgSetAutoReplace(array('+/-', '(c)', '(r)'), array('±', '©', '®'));

    // 10. Включаем или выключаем режим XHTML. (по умолчанию включен)
        $jevix->cfgSetXHTMLMode(true);

    // 11. Включаем или выключаем режим замены переноса строк на тег <br/>. (по умолчанию включен)
        $jevix->cfgSetAutoBrMode(false);

    // 12. Включаем или выключаем режим автоматического определения ссылок. (по умолчанию включен)
        $jevix->cfgSetAutoLinkMode(true);

    // 13. Отключаем типографирование в определенном теге
        $jevix->cfgSetTagNoTypography('code');
    // 14. Где не вставлять auto-br
        $jevix->cfgSetTagNoAutoBr(array('ul','ol','object'));



        $error="";
        //Yii::log('JEVIX-BEFORE:'.$text);
        $res=$jevix->parse($text, $error);
        //Yii::log('JEVIX-AFTER:'.$res);
        // Зачёркнутый текст
        $aMatches = array();
        preg_match_all('/\~\~(.)*?\~\~/u', $res, $aMatches);
        $aReplace = array();
        foreach ($aMatches[0] as $key => $match){
            $aReplace[$key] = '<s>'.mb_substr($match, 2, mb_strlen($match)-4).'</s>';
        }
        $res = str_replace($aMatches[0], $aReplace, $res);
        
//        $res = preg_replace_callback('/@@(\d\d:\d\d)(\|\d\d\.\d\d\.\d\d\d\d)?(@[^@]*)?@(?!@)(.*?)@@(<\/p>)?/', function ($match) {
//            return '<div class="relacja_item"><div class="relacja_date">'.$match[1].($match[2]?'<br/>'.substr($match[2],1):'').
//                   '</div><div class="relacja_text">'.
//                ($match[3]?'<h6 class="styleH6">'.substr($match[3],1).'</h6>':'').
//                $match[4].'</div></div>';
//        },$res);
        
        // Геокоординаты
//        $aMatches = array();
//        preg_match_all('/@(.)*?@/u', $res, $aMatches);
//        $aReplace = array();
//        foreach ($aMatches[0] as $key => $match){
//            $geodata = array_filter(explode(',',mb_substr($match, 1, mb_strlen($match)-2),3),'trim');
//            if (count($geodata)>1 && is_numeric($geodata[0]) && is_numeric($geodata[1]))
//                $aReplace[$key] = '<div class="geoplace"'.
//                        (isset($geodata[2]) ? ' data-title="'.CHtml::encode($geodata[2]).'"' : '').
//                        ' data-geo="'.$geodata[0].', '.$geodata[1].'"></div>';
//            else
//                $aReplace[$key] = $match;
//        }
//        $res = str_replace($aMatches[0], $aReplace, $res);
        
        //Yii::log('MARKDOWN-FINAL:'.$res);
        return $res;
    }

    static function ClearPHPTags($param) {
        return str_replace(array('<?php', '?>'), array('&lt?php', '?&gt'), $param);
    }
    
    public static function html_mb_substr($str, $from, $to) {
        $str = strip_tags($str." ");
        $ss = mb_substr($str, $from, $to);
        $ctx = preg_match('~(.*)\s~sm', $ss, $matches);
        if ($ctx == 0) {
            $ctx = $ss . '...';
        } else {
            $ctx = $matches[1] . '...';
        }
        return self::ClearPHPTags($ctx);
    }

    public static function markdown_mb_substr($str, $from, $to) {
        return self::Markdown(self::html_mb_substr($str, $from, $to));
    }
    
    public static function str_date_pretty($str, $format='%e %b %G') {
        $m = explode('-', $str);
        $str = strtotime($str);
        $month = array(
            '01' => 'Января',
            '02' => 'Февраля',
            '03' => 'Марта',
            '04' => 'Апреля',
            '05' => 'Мая',
            '06' => 'Июня',
            '07' => 'Июля',
            '08' => 'Августа',
            '09' => 'Сентября',
            '10' => 'Октября',
            '11' => 'Ноября',
            '12' => 'Декабря',
        );
        //echo $format.'<br />';
        $format = str_replace(array('%b', '%B'), 'month', $format);
        //echo $format.'<br />';
        $str = strftime($format, $str);
        //echo $str.'<br />';
        return str_replace('month', $month[$m[1]], $str);
    }

    public static function str_date_format($str, $format) {
        return date_format(date_create($str), $format);
    }

    public static function str_date_today_pretty($str, $format='%e %b %G') {
        if (self::emptyDate($str)) return '';
        $pubDate = strtotime($str);
        $preDate = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
        if ($str >= date('Y-m-d')) {
            return 'Сегодня, ' . self::str_date_format($str, 'H:i');
        } elseif ($pubDate >= $preDate) {
            return 'Вчера, ' . self::str_date_format($str, 'H:i');
        } else {
            return strpos($format,'%')===false
                ? date_format(date_create($str), $format)
                : self::str_date_pretty($str, $format);
        }
    }
    
    public static function str_date_today_pretty_date($str, $format) {
        if (self::emptyDate($str)) return '';
        $pubDate = strtotime($str);
        $preDate = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
        if (date('Y-m-d',$pubDate) == date('Y-m-d')) {
            return 'Сегодня';
        } elseif (date('Y-m-d',$pubDate) == date('Y-m-d',$preDate)) {
            return 'Вчера';
        } else {
            return self::str_date_pretty($str, $format);
        }
    }
    
    public static function str_date_is_new($str) {
        if (self::emptyDate($str)) return false;
        $pubDate = strtotime($str);
        $preDate = mktime(0, 0, 0, date('m'), date('d') - 1, date('Y'));
        $deltaDate = $pubDate-$preDate;
        return $deltaDate > 0 && $deltaDate < 86400;
    }
    
    public static function httpis($url_with_or_no_http) {
        $aUrl = parse_url($url_with_or_no_http);
        if (!isset($aUrl['scheme'])) {
            $url_with_or_no_http = 'http://' . $url_with_or_no_http;
            /* $url_with_or_no_http = 'http://'.
              $aUrl['host'].'/'.$aUrl['path'].'?'.$aUrl['query'].'#'.$aUrl['fragment']; */
        }
        return $url_with_or_no_http;
    }
    
    public static function emptyDate($date) {
        return empty($date) || $date == '0000-00-00' || $date == '0000-00-00 00:00:00';
    }
    
    public static function filterDate($date,$default='',$to='Y-m-d',$from='dd-MM-yyyy') {
        if (self::emptyDate($date)) return $default;
        if ($time = CDateTimeParser::parse($date,$from))
            return date($to,$time);
        else
            return $default;
    }
    
    public static function rssDate($date) {
        return self::emptyDate($date) ? '' : date(DATE_RSS, strtotime($date));
    }

    public static function rssQuotes($str) {
        return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
    }
    
    public static function rssReplace($text,$replace) {
        if (is_array($replace))
            foreach($replace as $substr)
                $text = self::rssReplace($text, $substr);
        else 
            if (($pos=mb_stripos($text, $replace))!==false && $pos > mb_strlen($text)-mb_strlen($replace)-2)
                $text=mb_substr($text, 0, $pos);
        return $text;
    }
    
    public static function mimeType($filename) {
        $ext = array_pop(explode('.', basename($filename)));
        switch ($ext) {
        case 'jpeg':
        case 'jpg': return 'image/jpeg';
        case 'png': return 'image/png';
        case 'gif': return 'image/gif';
        }
        return '';
    }
    
    static private function getdayofweek($date) {
        return mb_substr(strftime('%a', $date), 0, 2);
    }

/**
 * @param string date $begin
 * @param string date $end
 * @param boolean $showdayofweek
 * @return string formated date
 * @throws Exception
 */
    public static function datesRange($begin, $end, $showdayofweek = false) {
        if (!$begin && !$end) {
            throw new Exception('No dates for range');
        }

        $begin = strtotime($begin);
        $end = strtotime($end);
        if (strftime('%Y%m%d', $begin) == strftime('%Y%m%d', $end)) {
            return $showdayofweek ? strftime('%B,&nbsp;%e (', $begin) . self::getdayofweek($begin) . ')'
                        :
                    strftime('%B,&nbsp;%e', $begin);
        }

        $range = null;
        if (strftime('%Y%m', $begin) == strftime('%Y%m', $end)) {
            $pattern = $showdayofweek ? '%s -&nbsp;%s (%s-%s)' : '%s -&nbsp;%s';
            $range = sprintf($pattern, strftime('%B,&nbsp;%e', $begin)
                    , strftime('%e', $end)
                    , self::getdayofweek($begin)
                    , self::getdayofweek($end)
            );
        }
        else {
            $pattern = $showdayofweek ? '%s -&nbsp;%s (%s-%s)' : '%s -&nbsp;%s';
            $range = sprintf($pattern, strftime('%B,&nbsp;%e', $begin)
                    , strftime('%B,&nbsp;%e', $end)
                    , self::getdayofweek($begin)
                    , self::getdayofweek($end)
            );
        }

        return $range;
    }

    public static function number_literate($iLiteral, $unoWord, $someWord, $manyWord) {
        $Last = $iLiteral % 100  > 20 ? $iLiteral % 10 : $iLiteral % 20;
        if ($Last == 1) {
            return $unoWord;
        }
        elseif ($Last >= 2 && $Last <= 4) {
            return $someWord;
        }
        else {
            return $manyWord;
        }
    }
    /**
     * get difference between two dates:
     * @param DateTime $start
     * @param DateTime $finish
     * @param boolean $inclusive - include start date or not
     * @return object DateInterval or -1 if parrams are bad
     */
    public static function dateDifference($start, $finish){
        if((! $start  instanceof DateTime && !is_string($start))
        || (! $finish instanceof DateTime && !is_string($finish)))
                return -1;
        
        $oStart  = is_string($start)  ? new DateTime($start)  : clone $start;
        $oFinish = is_string($finish) ? new DateTime($finish) : clone $finish;
        
        //if ($oStart>$oFinish) return -1;
        
        $oDiff = $oFinish->diff($oStart);
        return $oDiff;
    }

    public static function humanDate($date,$format='d-m-Y H:i',$default='') {
	if (self::emptyDate($date))
	    return $default;
	else {
	    //Yii::log('humanDate0:'.$date);
	    //Yii::log('humanDate1:'.strtotime($date));
	    return date($format,strtotime($date));
	}
    }
    
    public static function pubDate($date, $now = null) {
        // Можно ли публиковать объект с такой датой?
        if (self::emptyDate($date))
            return true;
        if (is_null($now))
            $now = time();
        return strtotime($date) < $now;
    }
    
    public static function steam($str) {
        $str = preg_replace('~[\%|\_|]~','',$str);
        $str = preg_replace("~[\']~","\'",$str);
        $word_list = mb_split(' ', $str);
        $str_no_stem = implode('%', $word_list);
        $stemmer = new Steamer();
        foreach ($word_list as $key=>$word) {
             $word_list[$key] = $stemmer->stemword($word);
        }
        $str = implode('%', $word_list);
        if (mb_strlen($str) <= 2)
            $str = $str_no_stem;
        //$length = mb_strlen($str);
        return $str;
    }
    
    public static function getInsertedContent($str)
    {
        $str = self::miniGallery($str);
        return $str;
    }
    
    public static function miniGallery($str){
        $packages = false;
        $before = '{miniGallery:';
        $after  = '}';
        if (preg_match_all('/(?<='.$before.')\d+?(?='.$after.')/', $str, $matches))
            if (isset($matches[0]) && !empty($matches[0]) && is_array($matches[0])){
                $IDs     = $matches[0];
                $replace = array();
                $miniGallery = MiniGallery::model()->findAll('mgid IN ('.implode(",", $IDs).') AND is_published=1');
                if ($miniGallery)
                    foreach ($miniGallery as $mini){
                        $photos = '';
                        if ($mini->media)
                            foreach ($mini->media as $media)
                                $photos .= '
                                    <li>
                                        <a class="gallery_group" rel="group_1" href="'.$media->getMediaUrl().'" title="'.$media->i_name.'">'.(
                                            $media->i_crop ? $media->getMediaForm('220-s-crop') : $media->getMediaForm('220-160-m')).'
                                            <span></span>
                                        </a>
                                    </li>';
                        if ($photos){
                            if (!$packages){
                                Yii::app()->getClientScript()->registerPackage('miniGallery');
                                $packages = true;
                            }
                            $replace[$mini->mgid] = '
                                <ul class="gallery">'.
                                    $photos.'
                                </ul>';
                        }
                    }
                foreach ($IDs as $ID)
                    $str = str_replace(
                        $before.$ID.$after,
                        isset($replace[$ID]) ? $replace[$ID] : '',
                        $str
                    );
            }
        return $str;
    }
        
    public static function padCounter($count,$pad=4,$side=STR_PAD_LEFT)
    {
        return str_pad($count, $pad, '0', $side);
    }
    
    public static function viewStateRegion($state,$region,$sep='') {
        if (substr($region, 0,1)=='=')
            $region = strlen($region)==1?'':substr($region,1);
        return ($state?$state.$sep:'').($region?$region.$sep:'');
    }
    
    /**
     * This function is to replace PHP's extremely buggy realpath().
     * @param string The original path, can be relative etc.
     * @return string The resolved path, it might not exist.
     */
    static public function truepath($path){
        // whether $path is unix or not
        $unipath=strlen($path)==0 || $path{0}!='/';
        // attempts to detect if path is relative in which case, add cwd
        if(strpos($path,':')===false && $unipath)
            $path=getcwd().DIRECTORY_SEPARATOR.$path;
        // resolve path parts (single dot, double dot and double delimiters)
        $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
        $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
        $absolutes = array();
        foreach ($parts as $part) {
            if ('.'  == $part) continue;
            if ('..' == $part) {
                array_pop($absolutes);
            } else {
                $absolutes[] = $part;
            }
        }
        $path=implode(DIRECTORY_SEPARATOR, $absolutes);
        // resolve any symlinks
        Yii::log("realpath: $path");
        if(file_exists($path) && linkinfo($path)>0)$path=readlink($path);
        // put initial separator that could have been lost
        $path=$unipath ? '/'.$path : $path;
        return $path;
    }    
    
    public static function getMimeType($filename) {
        $pieces = explode('.', $filename);
        if (count($pieces)) {
            $mime = strtolower(array_pop($pieces));
            switch ($mime) {
            case 'jpg' : $mime='jpeg';
            case 'jpeg': case 'png': case 'gif': $mime = 'image/'.$mime; break;
            case 'pdf' : $mime='application/pdf'; break;
            default: $mime = '';
            }
        } else
            $mime = '';
        return $mime;
    }
    
    public static function file_force_download($file,$mime=null) {
        if ($mime===null) $mime = self::getMimeType($file);
        if (empty($mime)) Yii::app()->end();
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
        header('Content-Type: '.$mime);
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: '.filesize($file));
        // читаем файл и отправляем его пользователю
        readfile($file);
        Yii::app()->end();
    }

    

    public static function timeAgo($time) {
        $dif = time()- $time;

        if ( $dif<59 ) {
            return $dif." с";
        } elseif ( $dif/60>1 && $dif/60<59 ) {
            return round($dif/60)." мин";
        } elseif ( $dif/3600>1 && $dif/3600<23 ) {
            return round($dif/3600)." ч";
        } else
            return round($dif/3600/24)." д";
//            return date('d.m.Y',$time);
    }
}
