<?php
    foreach($this->dataProvider as $item)
        $this->renderPartial($this->layoutItem,array('data'=>$item));
