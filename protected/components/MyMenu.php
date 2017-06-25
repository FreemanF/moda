<?php

/**
 * Переопределяю класс CMenu, для удаления ul и li из меню
 */
Yii::import('zii.widgets.CMenu');
 
class MyMenu extends CMenu
{
	public $linkLabelWrapper = 'div';
	//public $linkLabelWrapperHtmlOptions = array('class'=>'header-link');
	
	
	
    public function renderMenu($items)
    {
        if(count($items))
        {
            //echo CHtml::openTag('ul',$this->htmlOptions)."\n";
			
            $this->renderMenuRecursive($items);
			echo '</div>';
            //echo CHtml::closeTag('ul');
        }
    }

    public function renderMenuItem($item)
    {
        if(isset($item['url']))
        {
			print_r($item['linkOptions'],true);
            $label=$this->linkLabelWrapper===null ? $item['label'] : CHtml::tag($this->linkLabelWrapper, $this->linkLabelWrapperHtmlOptions, $item['label']);
            return CHtml::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array('class'=>'header-link'));
        }
        else
            return CHtml::tag('span',isset($item['linkOptions']) ? $item['linkOptions'] : array('class'=>'header-link'), $item['label']);
    }

    public function renderMenuRecursive($items)
    {
        $count=0;
        $n=count($items);
		$item['class'] = 'header-link';
        foreach($items as $item)
        {
            $count++;
            $options=isset($item['itemOptions']) ? $item['itemOptions'] : array('class'=>'header-link');
            $class=array();
            if($item['active'] && $this->activeCssClass!='')
                $class[]=$this->activeCssClass;
            if($count===1 && $this->firstItemCssClass!==null)
                $class[]=$this->firstItemCssClass;
            if($count===$n && $this->lastItemCssClass!==null)
                $class[]=$this->lastItemCssClass;
            if($this->itemCssClass!==null)
                $class[]=$this->itemCssClass.' header-link';
            if($class!==array())
            {
                if(empty($options['class']))
                    $options['class']=implode(' ',$class);
                else
                    $options['class'].=' '.implode(' ',$class);
            }

            //echo CHtml::openTag('li', $options);

            $menu=$this->renderMenuItem($item);
            if(isset($this->itemTemplate) || isset($item['template']))
            {
                $template=isset($item['template']) ? $item['template'] : $this->itemTemplate;
                echo strtr($template,array('{menu}'=>$menu));
            }
            else
                echo $menu;

            if(isset($item['items']) && count($item['items']))
            {
                echo "\n".CHtml::openTag('ul',isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions)."\n";
                $this->renderMenuRecursive($item['items']);
                echo CHtml::closeTag('ul')."\n";
            }

            //echo CHtml::closeTag('li')."\n";
        }
    }
}
?>