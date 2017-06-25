<div class="breadcrumb-container">
    <ul class="xbreadcrumbs">
        <li>
            <a href="/admin">
                <i class="icon-photon home"></i>
            </a>
        </li>
        <? if (is_array($config[$config[$baseStruct]['parentmenuitem']])): ?>
        <li>
            <a href="<?=($config[$config[$baseStruct]['parentmenuitem']]['url']=='#' ? '#' : $config[$config[$baseStruct]['parentmenuitem']]['url']);?>"><?=$config[$config[$baseStruct]['parentmenuitem']]['title']?></a>
            <ul class="breadcrumb-sub-nav">
                <? foreach($config[$config[$baseStruct]['parentmenuitem']]['children'] as $key=>$val)
                        echo CHtml::tag ('li', array(), 
                                CHtml::link ($val, $key));
                ?>
            </ul>
        </li>
        <? endif; ?>
        <li class="current">
            <a href="javascript:;"><?=$config[$baseStruct]['title']?></a>
        </li>
    </ul>
</div>
