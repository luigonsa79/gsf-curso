<?php
require_once('Config/Config.php');
require_once 'Helpers/Helpers.php';
$ruta = !empty($_GET['url']) ? $_GET['url'] : "Home/index";
$array = explode("/", $ruta);
$controller = $array[0];
$metodo = "index";
$parametro = "";
if (!empty($array[1])) {
    if (!empty($array[1] != "")) {
        $metodo = $array[1];
    }
}
if (!empty($array[2])) {
    if (!empty($array[2] != "")) {
        for ($i = 2; $i < count($array); $i++) {
            $parametro .= $array[$i] . ",";
        }
        $parametro = trim($parametro, ",");
    }
}

require_once 'Config/App/autoload.php';

$dirController = "Controller/".$controller.".php";

if(file_exists($dirController)){
    require_once $dirController;
    $controller = new $controller();
    if (method_exists($controller, $metodo)) {
        $controller->$metodo($parametro);
    }else{
        echo 'No existe el Metodo';
    }
    
}else{
    echo 'No existe el controlador';
}
