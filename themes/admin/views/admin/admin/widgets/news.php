<div class="widget-holder">
    <div class="widget-flipper">
        <div class="widget-area widget-general-stats widget-front">
            <div class="widget-head">
                Последние новости
                <div>
                    <img src="<?php echo $this->themeImages.'photon/w_latest@2x.png'; ?>" alt="Протокол изменений"/>
                </div>
            </div>
            <ul>
                <?php
                    $news = News::model()->findAll(array(
                        'limit' => 5,
                    ));
                    if ( !empty($news) )
                        foreach ($news as $newsValue)
                            echo '
                                <li>
                                    <a href="/admin/news/update?id='.$newsValue->primaryKey.'" target="_blank">
                                        <span>'.Comportable::html_mb_substr($newsValue->n_name, 0, 30).'</span>
                                    </a>
                                    <div>'.Comportable::timeAgo(strtotime($newsValue->dt_start)).'</div>
                                </li>';
                ?>
            </ul>
        </div>
    </div>
</div>