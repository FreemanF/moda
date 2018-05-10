<?php

class KPDSitemap
{
    const ALWAYS  = 'always';
    const HOURLY  = 'hourly';
    const DAILY   = 'daily';
    const WEEKLY  = 'weekly';
    const MONTHLY = 'monthly';
    const YEARLY  = 'yearly';
    const NEVER   = 'never';
    
    protected $items = array();
    protected $changeFreq;
    protected $priority;

    public function render(){
        $dom = new DOMDocument('1.0', 'utf-8');
        $urlset = $dom->createElement('urlset');
        $urlset->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');
        foreach($this->items as $item) {
            $url = $dom->createElement('url');
            foreach ($item as $key=>$value) {
                $elem = $dom->createElement($key);
                $elem->appendChild($dom->createTextNode($value));
                $url->appendChild($elem);
            }
            $urlset->appendChild($url);
        }
        $dom->appendChild($urlset);
        return $dom->saveXML();
    }
    
    public function addModels()
    {
        foreach(Object::getLabels('sitemap','alias') as $id=>$alias) {
            $class = ucfirst($alias);
            switch ($class) {
                case 'Site':
                    $this->setStatus(NULL);
                    $this->getFindIndex(NULL);
                    break;
                case 'Page':
                    $this->setStatus($class);
                    $this->getFindAll($id, $class, true);
                    break;
                default:
                    $this->setStatus($class);
                    $this->getFindAll($id, $class);
                    break;
            }
        }
    }
    
    private function setStatus( $class = NULL ){
        if ( $class ) {
            $this->changeFreq = method_exists($class::model(), 'getChangeFreq') ? $class::model()->changeFreq : KPDSitemap::DAILY;
            $this->priority   = method_exists($class::model(), 'getPriority')   ? $class::model()->priority   : 0.5;
        } else {
            $this->changeFreq = KPDSitemap::DAILY;
            $this->priority   = 0.5;
        }
    }
    
    private function getFindIndex($id){
        $this->items[] = array(
            'loc'        => Yii::app()->request->hostInfo.($id ? '/'.Object::getSef($id) : ''),
            'changefreq' => $this->changeFreq,
            'priority'   => $this->priority
        );
    }
    
    private function getFindAll($id, $class, $noIndex=false){
        if ( Object::byAlias($class)->have_category )
            if ( $categoryes=Category::model()->getHierarchy($id) )
                foreach ($categoryes as $category)
                    $this->items[] = array(
                        'loc'        => Yii::app()->request->hostInfo.$class::model()->getCategoryUrl($category),
                        'changefreq' => $this->changeFreq,
                        'priority'   => $this->priority
                    );
        if ( $models=CActiveRecord::model($class)->published()->findAll() ) 
            foreach ($models as $model)
                if ( !($noIndex && $model->getUrl()=='/index') )
                    $this->items[] = array(
                        'loc'        => Yii::app()->request->hostInfo.$model->getUrl(),
                        'changefreq' => $this->changeFreq,
                        'priority'   => $this->priority
                    );
    }    
}