<div class="breadcrumb-container">
    <ul class="xbreadcrumbs">
        <li>
            <a href="/admin">
                <i class="icon-photon home"></i>
            </a>
        </li>
<?php if ($this->hasParent) {
    $menuItem = $this->menuItem;
    echo "<li>\n";
    echo CHtml::link($menuItem['text'], '/admin/'.$this->urlParent);
    echo "</li>\n";
} ?>
<?php if ($this->actionTitle) {   ?>
        <li class="current">
            <a href="javascript:;"><?php echo $this->actionTitle; ?></a>
        </li>
<?php } ?>
    </ul>
</div>