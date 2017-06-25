        <item>
            <title><![CDATA[<?php echo $data->ownerName;?>]]></title>
            <link><?php echo $this->rssLink1.$data->ownerSef;?></link>
            <description>
                <![CDATA[<?php
                echo $data->mediaForm('140-s',array(
                    'align'=>'left', 'vspace'=>'5', 'hspace'=>'10'));
                echo Comportable::markdown_mb_substr($data->content_long,0,150);
                ?>]]>
            </description>
            <pubDate><![CDATA[<?php echo Comportable::rssDate($data->dt_start);?>]]></pubDate>
            <guid><![CDATA[<?php echo $this->rssLink1.$data->ownerSef;?>]]></guid>
        </item>
