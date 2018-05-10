<?php echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; ?>
<rss<?php echo $this->rssAttr;?>>
    <channel>
        <title><?php echo $this->siteName.' - '.$this->rssTitle;?></title>
        <link><?php echo $this->rssLink; ?></link>
        <description><?php echo $this->rssDescription; ?></description>
<?php 
switch ($this->service) {
    case 1: // yandex
        echo "        <image>\n";
        echo '            <url>'.$this->siteUrl."themes/agro_classic/assets/css/images/logo-100.png</url>\n";
        echo "        </image>\n";
        break;

    case 2: // ukrnet
        break;

    default:
        echo '        <language>'.Yii::app()->language."</language>\n";
        echo '        <pubDate>'.$this->date."</pubDate>\n";
        echo '        <lastBuildDate>'.$this->date."</lastBuildDate>\n";
        echo '        <atom:link href="'.$this->rssLink0.$this->rssParam.'" rel="self" type="application/rss+xml" />'."\n";
        break;
}
echo $content;
?>
    </channel>
</rss>