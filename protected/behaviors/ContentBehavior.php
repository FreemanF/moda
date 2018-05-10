<?php

/**
 * @property string $humanDate
 */
class ContentBehavior extends CActiveRecordBehavior {
    // Пока нет повторного использования и нет различия в названии поля, используем простейший алгоритм
    public    $ownerContentShortField  = 'content_long';
    public    $ownerContentShortLength = 245;
    
    public function getContentLong() {
        return Comportable::getInsertedContent($this->owner->content_long); //{$this->ownerContentLongField});
    }
    
    public function getContentShort($length=null,$inP=false) {
        $content = $this->owner->{$this->ownerContentShortField};
        if (is_null($length)) $length = $this->ownerContentShortLength;
        if (!$length)         $length = strlen($content);
        return ($inP?'<p>':'').
            Comportable::html_mb_substr($content, 0, $length).
            ($inP?'</p>':'');
    }
        
}
