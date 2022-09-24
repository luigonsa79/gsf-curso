<?php
// iniciamos session
session_start();
require_once('Config/Config.php');
require_once 'Helpers/Helpers.php';

// $ruta = !empty($_GET['url']) ? $_GET['url'] : "Home/index";
$ruta = !empty($_GET['url']) ? $_GET['url'] : CONTROLLER_DEFAULT . "/" . METHOD_DEFAULT;
$array = explode("/", $ruta);
$controller = $array[0];
// $metodo = "index";
$metodo = METHOD_DEFAULT;
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

$dirController = CONTROLLER . "/" . $controller . ".php";
$errorController = CONTROLLER . "/" . CONTROLLER_ERROR . ".php";

if (file_exists($dirController)) {
    require_once $dirController;
    $controller = new $controller();
    if (method_exists($controller, $metodo)) {
        $controller->$metodo($parametro);
    } else {
        require_once $errorController;
        $controller = new Error404;
        $controller->index();
        // echo 'No existe el Metodo';
    }
} else {
    require_once $errorController;
    $controller = new Error404;
    $controller->index();
    // echo 'No existe el controlador';
}
