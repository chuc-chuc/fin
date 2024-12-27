<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "app/database.php";
require_once "controller/c_servicio.php";
$db = db();
$controller = new ServicioController($db);
if (isset($_POST['metodo'])) {
    $controller->servicios($_POST['metodo']);
    exit;
}