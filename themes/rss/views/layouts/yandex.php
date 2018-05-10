        <item>
            <title><?php echo Comportable::rssQuotes($data->ownerName);?></title>
            <link><?php echo $this->rssLink1.$data->ownerSef;?></link>
            <category><?php if ($this->rssAction=='news') 
                echo Comportable::rssQuotes($data->category->c_name); ?></category>
            <description>
                <?php
                    $text = Comportable::rssQuotes(preg_replace(
                        '~(ЧИТА(ЙТЕ|ТЬ|Й)?|ФОТО|НОВОСТЬ|СМОТРЕТЬ) ПО ТЕМЕ: \<a(.)*?\<\/a\>~iu','',
                        Comportable::markdown_mb_substr($data->content_long,0,150)));
                    $text = Comportable::rssReplace($text, array(
                        ', Национальный агропортал Latifundist.com',
                        ', Национальный агропортал Latifundist.соm',
                        ', Национальный агропортал Latifundist.сom',
                        'Национальный агропортал Latifundist.com',
                        'Latifundist.com',
                    ));
                    echo $text;
                ?>
            </description>
            <enclosure url="<?php echo $this->siteUrl.($mediaurl=$data->mediaUrl('300-s')).'" type="'.Comportable::mimeType($mediaurl);?>" />
            <yandex:genre>article</yandex:genre>
            <pubDate><?php echo Comportable::rssDate($data->dt_start);?></pubDate>
            <yandex:full-text><?php echo $text;?></yandex:full-text>
        </item>
