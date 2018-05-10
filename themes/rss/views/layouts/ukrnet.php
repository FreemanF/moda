        <item>
            <title><![CDATA[<?php echo $data->ownerName;?>]]></title>
            <link><?php echo $this->rssLink1.$data->ownerSef;?></link>
            <category><?php if ($this->rssAction=='news') 
                echo Comportable::rssQuotes($data->category->c_name); ?></category>
            <description>
                <![CDATA[<?php 
                    $text = strip_tags(Comportable::markdown_mb_substr($data->content_long,0,150));
                    echo $text; ?>]]>
            </description>
            <enclosure url="<?php echo $this->siteUrl.($mediaurl=$data->mediaUrl('300-s')).'" type="'.Comportable::mimeType($mediaurl);?>" />
            <yandex:genre>article</yandex:genre>
            <pubDate><?php echo Comportable::rssDate($data->dt_start);?></pubDate>
            <yandex:full-text><![CDATA[<?php echo $text; ?>]]></yandex:full-text>
        </item>
