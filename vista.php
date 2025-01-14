<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "app/database.php";
require_once "controller/c_vista.php";
$db = db();
$controller = new VistaController($db);
$ruta = $_GET['ruta'];
switch ($ruta) {
    case 'menu':
        // Verificamos si el método existe en el objeto controller antes de llamarlo.
        if (method_exists($controller, $ruta)) {
            $controller->$ruta();
        } else {
            $controller->error();
        }
        break;
    default:
        $controller->error();
        break;
}
