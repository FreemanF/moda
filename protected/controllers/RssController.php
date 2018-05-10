<?php

class RssController extends CController
{
    public $layout  = 'rss';
    public $service = 0;
    public $layoutContent = '//layouts/stdindex';
    public $layoutItem    = '//layouts/default';
    public $rssAttr       = ' version="2.0"  xmlns:atom="http://www.w3.org/2005/Atom"';
    public $dataProvider;

    public $siteName      = '';
    public $siteUrl       = '';
    public $rssLink0      = '';
    public $rssLink1      = '';
    public $rssTitle      = '';
    public $rssAction     = '';
    public $rssId         = '';
    public $rssParam      = '';
    public $rssLink       = '';
    public $rssDescription= '';
    public $date;
    
    private $important;
    private $limit;


    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        Yii::app()->clientScript->reset();
        Yii::app()->theme = 'rss';
        $this->siteName = Yii::app()->name;
        $this->siteUrl  = Yii::app()->request->hostInfo;
        
        $important = Yii::app()->request->getParam('important_only', 'false');
        $this->important = $important==='true' ? true : (
                $important==='false' ? false : (boolean)$important );
        $limit = intval(Yii::app()->request->getParam('limit',20));
        $this->limit = $limit>0 ? $limit : 20;
        
        $this->date = date(DATE_RSS);
        
        $pathInfo = Yii::app()->request->pathInfo;
        $list = explode('/',$pathInfo);
        if (count($list)>2) 
            $this->rssParam = $list[2];
    }

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) return false;

        $this->rssAction = $action->id;
        $this->rssLink0 = $this->siteUrl.'/rss/'.$this->rssAction.'/';
        
        return true;
    }
    
    public function initAction($class,$sef='',$condition='',$with=array()) {
        if ($this->service==0)
            $this->rssLink = $this->rssLink0.$this->rssId;

        $this->rssLink1 = $this->siteUrl.'/'.($sef?$sef:$this->rssAction).'/';
        
        $model = $class::model()->with('media');
        foreach($with as $relation)
            $model->with($relation);
        $select = array('limit'=>$this->limit);
        if ($condition)
            $select['condition'] = $condition;
        $this->dataProvider = $model->findAll($select);
    }
    
    public function renderContent() {
        parent::render($this->layoutContent);
    }
    
    public function actionNovosti()
    {
        if (Yii::app()->request->getParam('yandex', false)) {
            $this->layoutItem = '//layouts/yandex';
            $this->service = 1;
            $this->rssAttr = ' xmlns:yandex="http://news.yandex.ru" xmlns:media="http://search.yahoo.com/mrss/" version="2.0"';
            $this->rssDescription = 'Национальный агропортал Latifundist.com - '.$this->rssTitle;
            $this->rssLink = $this->siteUrl.'/';
        } else
        if (Yii::app()->request->getParam('ukrnet', false)) {
            $this->layoutItem = '//layouts/ukrnet';
            $this->service = 2;
            $this->rssAttr = ' version="2.0"  xmlns="http://backend.userland.com/rss2"  xmlns:yandex="http://news.yandex.ru"';
            $this->rssDescription = $this->siteName.' - '.$this->rssTitle;
            $this->rssLink = $this->rssLink0.$this->rssId;
        } else {
        }
        
        $condition = '';
        $with = array('category');
//        $this->rssTitle = 'Новости';
//        $pathInfo = Yii::app()->request->pathInfo;
//        $list = explode('/',$pathInfo);
//        if (count($list)>2) {
//            $fullSef = $list[2];
//            if ($fullSef == 'importantnews')
//                $condition = 'n_important>0';
//            else {
//                $category = Category::model()->news()->sef($fullSef)->find();
//                if ($category) {
//                    $with[] = 'catsone';
//                    $condition = 'catsone.category_id='.$category->primaryKey;
//                    $this->rssTitle .= ' - '.$category->ownerName;
//                    $this->rssId = $fullSef;
//                }
//            }
//        }
//        if ($this->service==1) { //для яндекса только редакционные новости
//            if ($condition) $condition.=' AND ';
//            $condition .= 'n_our_article>0';
//        }
        
        $this->initAction('News','novosti',$condition,$with);
        $this->renderContent();
    }

//    public function actionInterview()
//    {
//        $this->rssTitle = 'Интервью';
//        $this->initAction('Interview');
//        $this->renderContent();
//    }
}