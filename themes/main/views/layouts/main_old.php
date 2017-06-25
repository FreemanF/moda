<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" content="ru" />
        <?php
            if ($this->noindex ) echo '<meta name="robots" content="noindex">'."\n";
            if ($this->nofollow) echo '<meta name="robots" content="nofollow">'."\n";
            if (!empty($this->meta['keywords'])   ) echo '<meta name="keywords" content="'.CHtml::encode($this->meta['keywords']).'" />'."\n";
            if (!empty($this->meta['description'])) echo '<meta name="description" content="'.CHtml::encode($this->meta['description']).'" />'."\n"; 
            
            $this->pushMeta(array('title'=>$this->pageTitle),false);
            echo '<title>'.CHtml::encode($this->meta['title']).'</title>';
        ?>
        <meta name="yandex-verification" content="66ae757454da8718" />
        <!--[if lte IE 8]>
            <style type="text/css">
                #wrapper {
                    behavior: url(<?php echo $this->themeCss.'PIE.htc'; ?>);
                }
                #list {
                    behavior: url(<?php echo $this->themeCss.'PIE.htc'; ?>);
                }
                #right h3 {
                    behavior: url(<?php echo $this->themeCss.'PIE.htc'; ?>);
                }
            </style>
        <![endif]-->
        <!--[if IE 6]>
            <style type="text/css">
                #list ul {
                    behavior: none;
                }
            </style>
        <![endif]-->
        <!--[if lte IE 7]>
            <link rel="stylesheet" type="text/css" href="<?php echo $this->themeCss.'IE.css'; ?>"/>
        <![endif]-->
        <link rel="shortcut icon" href="<?php echo $this->themeImages.'favicon.png'; ?>" type="image/png" />
        <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=JlCMmbvggiD1w-7e-ISAEFZxpSVMyQ1A&width=600&height=450"></script>
        <?php echo Setting::getParam("google_analytics") ? Setting::getParam("google_analytics") : ''; ?>
    </head>
    <body>
        <div id="container">
            <div id="outside">
                <div id="header">
                    <a id="logo" href="/"></a>
                    <span id="slogan"><?php echo Setting::getCachedParam('header'); ?></span>
                    <div id="tel">
                        <p style="margin-bottom: 5px;">наши телефоны:</p>
                        <p><?php echo Setting::getCachedParam('phone1'); ?><br></p>
                        <div style="padding-top: 5px;margin-bottom: 5px;">
                            <p style="font-size:14px;">Алексадр.</p>
                        </div>
                        <p><?php echo Setting::getCachedParam('phone2'); ?></p>
                        <div style="padding-top: 5px;margin-bottom: 5px;">
                            <p style="font-size:14px;">Андрей.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="left">
                <div id="menu">
                    <h3>Меню</h3>
                    <?php
                        $this->getLeftMenu();
                        $this->beginWidget('zii.widgets.CMenu', array(
                            'items'=> $this->menu,
                            'encodeLabel' => false,
                        ));
                        $this->endWidget();
                    ?>
                </div>
                <?php
                    if ( false )
                        echo '<div id="left-bottom" class="bestsellers"></div><div id="empty"></div>';
                ?>
                <?php $this->getDict(); ?>

                <?php $this->getBottomBlock(); ?>
                
                <?php
                if (Setting::getCachedParam('side') != ''){
                    echo '<div id="left-bottom" class="bestsellers">'; 
                    echo Setting::getCachedParam('side');
                    echo '</div>';
                }
                ?>

                <div id="empty"></div>
            </div>
            <div id="wrapper">
                <div id="inner-wrapper">
                    <div id="center">
                        <div id="inner-center">
                            <div id="list">
                                <?php
                                    $this->getMenu();
                                    end($this->menu);
                                    $this->menu[key($this->menu)]['itemOptions'] = array('class'=>'last');
                                    $this->beginWidget('zii.widgets.CMenu', array(
                                        'items'=> $this->menu,
                                        'encodeLabel' => false,
                                    ));
                                    $this->endWidget();
                                ?>
                            </div>
                            <div id="content">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>
                    <div id="right">
                        <h3><a href="/news">Новости</a></h3>
                        <?php
                            $lastNews = News::model()->findAll(array('limit' => 1));
                            if ( $lastNews ) {
                                echo '<div class="news">';
                                foreach ($lastNews as $lastNewsValue)
                                    echo '
                                        <div class="date">'.Comportable::str_date_format($lastNewsValue->dt_start, 'd.m.Y').'</div>
                                        <div class="title"><a href="/news/'.$lastNewsValue->n_sef.'">'.$lastNewsValue->n_name.'</a></div>
                                        <div class="description">'.$lastNewsValue->short_content.'<div class="readmore"><a href="/news/'.$lastNewsValue->n_sef.'">читать полностью</a></div></div>';
                                echo '
                                        <div class="allnews"><a href="/news">История новостей</a></div>
                                    </div>';
                            }
                        ?>
                        <?php $this->showHits(); ?>
                    </div>
                </div>
                
            </div>
            <div style="clear:both; height: 1px; width: 1px;"></div>
        </div>
    </div>
        <div id="footer">
            <div id="left-footer"> <?php echo Setting::getCachedParam('footer1'); ?></div>
            <div id="right-footer"><?php echo Setting::getCachedParam('footer2'); ?></div>
            <div style="position: absolute; left: 50%; top: 20px; margin-left: -117px;"> 
                <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
                <div class="yashare-auto-init" data-yashareType="link" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj"></div>
            </div>
            <div style="position:absolute; left:60%;top: 19px;"></div>
        </div>
        <?php echo Setting::getParam("Yandex_Metrics") ? Setting::getParam("Yandex_Metrics") : ''; ?>
    </body>
</html>