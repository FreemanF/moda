<?php

class PrefixedModel extends CActiveRecordBehavior
{
    private $_ownerClass;
    private $_prefix;
    private $_object;
    private $_objectSef;
    private $_objectType;
    private $_ownerId;
    private $_ownerName;
    private $_ownerUrl;
    private static $_badAgent;
    private static $_disqus;
    //public $needUpdate = false;
    public $_lateUpdateItems = array();
    protected $_ownerLink;
    
    

    // view_count
    //const VIEW_COUNT_UPDATE_PERIOD = 3; // DEBUG
    const VIEW_COUNT_UPDATE_PERIOD = 1800;
    const VIEW_COUNT_UPDATE_LIMIT  = 1;
    static private $dtCount;
    static private $stopViewCountUpdate = 0;
    
    // comment_count
    //const COMMENT_COUNT_UPDATE_PERIOD = 3; // DEBUG
    const COMMENT_COUNT_UPDATE_PERIOD = 600;
    const COMMENT_COUNT_UPDATE_LIMIT  = 1;
    static private $dtComment;
    static private $stopCommentCountUpdate = 0;
    
    public function getOwnerClass() {
        if ($this->_ownerClass === null) {
            $this->_ownerClass = get_class($this->owner);
        }
        return $this->_ownerClass;
    }
    
    public function getOwnerPrefix() {
        if ($this->_prefix === null)
            $this->getObjectType();
        return $this->_prefix;
    }
    
    public function setOwnerPrefix($ownerPrefix) {
        $this->_prefix = $ownerPrefix;
    }
    
    public function getObjectType() {
        if ($this->_objectType === null) {
            $this->_object = Object::byAlias($this->ownerClass);
            if ($this->_object) {
                $this->_objectType = $this->_object->oid;
                $this->_objectSef  = $this->_object->o_sef;
                $this->_prefix = $this->_object->prefix;
            } else
                throw new CHttpException(500,"Class {$this->ownerClass} not found in Object-table.");
        }
        return $this->_objectType;
    }
    
    public function setObjectType($objectType) {
        $this->_objectType = $objectType;
    }
    
    public function getLinkObject($prefix='obj') {
        return $prefix.'['.$this->objectType.']['.$this->owner->primaryKey.']';
    }
    
    public function getObjectSef() {
        if ($this->_objectSef === null)
            $this->getObjectType();
        return $this->_objectSef;
    }
    
    public function getObject() {
        if ($this->_object === null)
            $this->getObjectType();
        return $this->_object;
    }

    public function getOwnerUrl() {
        if (is_null($this->_ownerUrl)) {
            $ownerSef = $this->owner->getOwnerSef();
            $this->_ownerUrl = $ownerSef 
                ? '/'.$this->owner->getObjectSef().'/'.$ownerSef 
                : '';
        }
        return $this->_ownerUrl;
    }
    
    public function getOwnerLink($htmlOptions=array(),$text=null,$type='') {
        $url = $this->owner->getOwnerUrl();
        if ($type==='full')
            $url = Yii::app()->request->hostInfo.$url;
        else
        if ($type==='admin')
            $url = '/admin/'.Object::getAlias($this->objectType).'/update?id='.$this->owner->primaryKey;
        else
        if ($type==='image')
            $text = $this->owner->mediaForm($text);
            
        $text = is_null($text) ? $this->owner->ownerName : $text;
        
        return $url 
            ? CHtml::link($text, $url, $htmlOptions)
            : CHtml::tag('span', $htmlOptions, $text);
    }
    
    public function getIdField() {
        if ($this->_ownerId === null) {
            $this->_ownerId = $this->ownerPrefix.'id';
        }
        return $this->_ownerId;
    }
    
    public function getOwnerNameField() {
        if ($this->_ownerName === null) {
            $this->_ownerName = $this->ownerPrefix.'_name';
        }
        return $this->_ownerName;
    }
    
    public function setOwnerNameField($nameField) {
        $this->_ownerName = $nameField;
    }
    
    public function getOwnerName() { // Используется при записи протокола изменений
        $nameField = $this->ownerNameField;
        if ($nameField) 
            return $this->owner->{$nameField};
        return '';
    }
    
    ///////////////////////////////////////////////////////
    
    public function addLateUpdate($attribute,$value=NULL,$savetomodel=false) {
        if ($savetomodel) // Используется при публикации в соц.сети
            $this->owner->{$attribute} = $value;
        $this->_lateUpdateItems[$attribute] = $value;
    }
            
    // Отложенное обновление;
    public function lateUpdate() {
        if (!empty($this->_lateUpdateItems))
            $this->owner->updateByPk($this->owner->primaryKey, $this->_lateUpdateItems);
    }
    
    public function afterSave($event) {
        parent::afterSave($event);
        $this->lateUpdate();
    }
    
    static public function badAgent() {
        if (self::$_badAgent === null) {
            $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';


            if (strpos($userAgent,'Mozilla')!==0
            &&  strpos($userAgent,'Opera'  )!==0
            &&  strpos($userAgent,'SAMSUNG')!==0) {

                if (strpos($userAgent,'facebookexternalhit')===0
                ||  strpos($userAgent,'SAS Web Crawler')===0
                ||  strpos($userAgent,'Crowsnest' )===0
                ||  strpos($userAgent,'Google'    )===0
                ||  strpos($userAgent,'ShowyouBot')===0
                ||  strpos($userAgent,'InAGist'   )===0
                ||  strpos($userAgent,'Twitterbot')===0
                ||  strpos($userAgent,'Disqus'    )===0
                ||  strpos($userAgent,'PHP'       )===0
                ||  strpos($userAgent,'(X11)'     )===0
                ||  strpos($userAgent,'MetaURI'   )===0
                ||  strpos($userAgent,'Microsoft Office')===0
                ||  strpos($userAgent,'msnbot')===0
                ||  strpos($userAgent,'Java')===0
                ||  strpos($userAgent,'Livelapbot')===0
                ||  strpos($userAgent,'Foo')===0
                ||  $userAgent=='') {
                    self::$_badAgent = true;
                    return true;
                }
                Yii::log('AGENT-PEEK-COUNTER: '.$userAgent);
            }
            self::$_badAgent = false;
            return false;
        }
        return self::$_badAgent;
    }
    
    static public function getDtCount() {
        if (is_null(self::$dtCount))
            self::$dtCount = date('Y-m-d H:i:s',time()-self::VIEW_COUNT_UPDATE_PERIOD);
        return self::$dtCount;
    }
    
    static public function canViewCountUpdate($continue=true) {
        if ($continue)
            return (self::$stopViewCountUpdate++ < self::VIEW_COUNT_UPDATE_LIMIT);
        self::$stopViewCountUpdate = self::VIEW_COUNT_UPDATE_LIMIT;
        return false;
    }
    
    public function updateViewCount() {
        if (self::canViewCountUpdate() 
        && $this->owner->hasAttribute('dt_count')) 
        {
            if ($this->owner->getAttribute('dt_count') >= self::getDtCount()) {
                // Не учитываем этот вызов
                self::$stopViewCountUpdate--;
                return true;
            }
            
            if (self::badAgent()) return true;
            
            Yii::import('ext.gaCounter.ExtGoogleAnalyticsCounter');
            $sef = $this->getOwnerUrl();
            $view_count = ExtGoogleAnalyticsCounter::staticGetMetric(
                'pagePath', 'pageviews', 
                'ga:pagePath=~'.$sef);
        
            if (!is_null($view_count)) {
                $this->owner->updateByPk($pk=$this->owner->primaryKey, array(
                    'view_count' => $view_count,
                    'dt_count'   => $dt_count = date('Y-m-d H:i:s'),
                ));
                $this->owner->view_count = $view_count;
                $this->owner->dt_count   = $dt_count;
                Yii::log('UpdateViewCount:'.$pk.':'.$dt_count.':'.$view_count.':'.$sef);
                return true;
            }
        }
        return self::canViewCountUpdate(false);
    }
    
    static public function getDtComment() {
        if (is_null(self::$dtComment))
            self::$dtComment = date('Y-m-d H:i:s',time()-self::COMMENT_COUNT_UPDATE_PERIOD);
        return self::$dtComment;
    }
    
    static public function canCommentCountUpdate($continue=true) {
        if ($continue)
            return (self::$stopCommentCountUpdate++ < self::COMMENT_COUNT_UPDATE_LIMIT);
        self::$stopCommentCountUpdate = self::COMMENT_COUNT_UPDATE_LIMIT;
        return false;
    }
    
    public function updateCommentCount() {
        if (self::canCommentCountUpdate() 
        && $this->owner->hasAttribute('dt_comment')) 
        {
            if ($this->owner->getAttribute('dt_comment') >= self::getDtComment()) {
                // Не учитываем этот вызов
                self::$stopCommentCountUpdate--;
                return true;
            }
            
            if (self::badAgent()) return true;
            
            $comment_count = null;
            $sef = Yii::app()->request->hostInfo.
                $this->getOwnerUrl();
            if (is_null(self::$_disqus)) {
                $shortname = trim(Setting::getCachedParam('disqus-site-shortname'));
                $apikey    = trim(Setting::getCachedParam('disqus-site-apikey'));
                if ($shortname && $apikey) try {
                    Yii::import('application.extensions.disqusapi.*');
                    self::$_disqus = new DisqusAPI($apikey);
                } catch (Exception $e) {
                    self::$_disqus = false;
                    Yii::log('DISQUS-INIT-ERROR: '.$e->getMessage());
                }
            }
            if (self::$_disqus) try {
                $options = array(
                    'forum'=>$shortname,
                    'thread'=>'link:'.$sef,
                    'limit'=>1,
                );
                $threads = self::$_disqus->forums->listThreads($options);
                $comment_count = (isset($threads[0]) && $threads[0]->link==$sef)
                    ? intval($threads[0]->posts)
                    : 0;
            } catch (Exception $e) {
                self::$_disqus = false;
                Yii::log('DISQUS-QUERY-ERROR: '.$e->getMessage());
            }
                
            if (!is_null($comment_count)) {
                $this->owner->updateByPk($pk=$this->owner->primaryKey, array(
                    'comment_count' => $comment_count,
                    'dt_comment'   => $dt_comment = date('Y-m-d H:i:s'),
                ));
                $this->owner->comment_count = $comment_count;
                $this->owner->dt_comment   = $dt_comment;
                Yii::log('UpdateCommentCount:'.$pk.':'.$dt_comment.':'.$comment_count.':'.$sef);
                return true;
            }
        }
        return self::canViewCountUpdate(false);
    }
    
}