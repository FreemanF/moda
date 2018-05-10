<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>404 Page Not Found - Dark - Photon Admin Panel Theme</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="apple-touch-icon" href="iosicon.png" />
<!--    PRODUCTION CSS -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/css_compiled/photon-min.css" media="all" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/css_compiled/photon-min-part2.css" media="all" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/css_compiled/photon-responsive-min.css" media="all" />
<!--[if IE]>
        <link rel="stylesheet" type="text/css" href="css/css_compiled/ie-only-min.css" />
        

<![endif]-->

<!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="css/css_compiled/ie8-only-min.css" />
        <script type="text/javascript" src="js/plugins/excanvas.js"></script>
        <script type="text/javascript" src="js/plugins/html5shiv.js"></script>
        <script type="text/javascript" src="js/plugins/respond.min.js"></script>
        <script type="text/javascript" src="js/plugins/fixFontIcons.js"></script>
<![endif]-->

        
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap/bootstrap.min.js"></script>
        
    </head>

    <body class="body-inner">
        <div class="error-page error-4">
            <div class="error-block-wrapper">
                <div class="error-block">
                    <div class="error-left">
                        <h1 data-text="404">404</h1>
                        <span class="error-message"><?php echo nl2br(CHtml::encode($data['message'])); ?></span>
                        <span class="error-details">
                            Page is not found.<a href="#" class="bootstrap-tooltip" data-placement="top" data-original-title="The requested resource could not be found but may be available again in the future."><i class="icon-photon info-circle"></i></a>
                        </span>
                    </div>
                    <div class="error-right">
                        <a href="<?php echo Yii::app()->createUrl('user'); ?>"><i class="icon-photon home"></i></a>
                    </div>
                    <div class="error-search container-fluid">
                        <form class="form-horizontal" action="<?php echo Yii::app()->createUrl(''); ?>">
                            <input id="panelSearch" placeholder="Search" type="text" name="panelSearch">
                            <button class="btn btn-search"></button>
                        </form>
                    </div>
                    <div class="version">
                    <?php echo date('Y-m-d H:i:s',$data['time']) .' '. $data['version']; ?>
                    </div>
                    <script>
                            $().ready(function(){
                                var searchTags = [
                                    "Dashboard",
                                    "Form Elements",
                                    "Graphs and Statistics",
                                    "Typography",
                                    "Grid",
                                    "Tables",
                                    "Maps",
                                    "Sidebar Widgets",
                                    "Error Pages",
                                    "Help",
                                    "Input Fields",
                                    "Masked Input Fields",
                                    "Autotabs",
                                    "Text Areas",
                                    "Select Menus",
                                    "Other Form Elements",
                                    "Form Validation",
                                    "UI Elements",
                                    "Graphs",
                                    "Statistical Elements",
                                    "400 Bad Request",
                                    "401 Unauthorized",
                                    "403 Forbidden",
                                    "404 Page Not Found",
                                    "500 Internal Server Error",
                                    "503 Service Unavailable"
                                ];
                                $( "#panelSearch" ).autocomplete({
                                    source: searchTags
                                });
                            });            
                        </script>
                </div>
            </div>
        </div>
        <div class="dashboard-watermark"></div>
</body>
</html>
