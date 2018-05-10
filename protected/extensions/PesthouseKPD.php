<?php

class PesthouseKPD extends CLinkPager
{
    public function init() {
        if ( !isset($this->htmlOptions['align']) )
            $this->htmlOptions['align']='center';
    }
    
    public function run() {
        $buttons=$this->createPageButtons();
        if ( empty($buttons) ) return;
        echo CHtml::tag('div',$this->htmlOptions,implode("\n",$buttons));
    }
    
    protected function createPageButtons() {
        if ( ($pageCount=$this->getPageCount())<=1 )
            return array();
        list($beginPage,$endPage) = $this->getPageRange();
        $currentPage = $this->getCurrentPage(false);
        $buttons=array();
        for ($i=$beginPage; $i<=$endPage; ++$i)
            $buttons[] = $this->createPageButton($i+1,$i,$this->internalPageCssClass,false,$i==$currentPage);
        return $buttons;
    }
    
    protected function createPageButton($label,$page,$class,$hidden,$selected) {
        return $selected ? '<span>'.$label.'</span>' 
                         : CHtml::link($label,$this->createPageUrl($page));
    }
    
    protected function createPageUrl($page){
        $controller = $this->getController();
        $action = $controller->getAction();
        if ($controller->id=='news' && $action->id=='index'){
            return $page==0 ? '/news' : '/news?page='.($page+1);
        }else
            return $this->getPages()->createPageUrl($controller,$page);
    }
}

?>
