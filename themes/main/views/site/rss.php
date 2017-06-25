<div>
    <ul>
        <?php
            foreach($this->dataProvider as $head) {
                echo '        <li><a href="/rss/'.$head['sef'].'">'.$head['name'].'</a>'."\n";
                if (count($head['child'])) {
                    echo "            <ul>\n";
                    foreach ($head['child'] as $sef=>$name)
                        echo '                <li><a href="/rss/'.
                            $head['sef'].'/'.$sef.'">'.$name."</a></li>\n";
                    echo "            </ul>\n";
                }
                echo "        <li>\n";
            }
        ?>
    </ul>
</div>
