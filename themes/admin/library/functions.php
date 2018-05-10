<?php $basePaht = Yii::app()->theme->basePath;?>
<?php 
$controller = Yii::app()->controller->id;
$action = Yii::app()->controller->action->id;
$baseStruct = $controller."/".$action?>

<?
    error_reporting(0);
//    error_reporting(E_ALL);
//    ini_set('display_errors', 'On');
//    $config = parse_ini_file('library/config.ini', true);
//    $menu = parse_ini_file('library/menu.ini', true);
    
    $config = $this->structureModules;
    
    function drawJSTree($data) {
        $out = "<ul>";
        foreach ($data as $key=>$val) {
            if (!is_array($val)) {
                $data = explode('|', $val);
                $out = $out . '<li><a href="' . $data[1] . '">' . $data[0] . '</a></li>';
            } else {
                $out = $out . '<li><a href="' . $data[1] . '">' . $data[0] . '</a>' . array2ul($val) . '</li>';
            }
        }
        $out = $out . '</ul>';
        return $out;
    }
