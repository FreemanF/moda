<?php Yii::app()->clientScript->registerPackage('adminPanel'); ?>
<div class="adminPanel dark">
    <div class="panel">
        <ul class="items">
            <li class="separator"></li>
            <li class="raw">
                <h5>
                    <a href="/admin" target="_blank">Панель</a>
                </h5>
            </li>
            <?php
                if ( $this->adminPanelAddUrl )
                    echo '
                        <li class="separator"></li>
                        <li class="raw">
                            <h5>
                                <a href="'.$this->adminPanelAddUrl.'" target="_blank" class="adminPanelAddLink">Добавить'.($this->adminPanelAddTitle ? ' '.$this->adminPanelAddTitle : '').'</a>
                            </h5>
                        </li>';
                if ( $this->adminPanelEditUrl )
                    echo '
                        <li class="separator"></li>
                        <li class="raw">
                            <h5>
                                <a href="'.$this->adminPanelEditUrl.'" target="_blank" class="adminPanelEditLink">Редактирование страницы</a>
                            </h5>
                        </li>';
            ?>
        </ul>
    </div>
</div>