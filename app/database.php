<?php
function db() {
    $servidor = "localhost";
    $usuario = "root";
    $password = "chuc";
    $db = "fin";
    $conexion = new mysqli($servidor, $usuario, $password, $db);
    if ($conexion->connect_error) {
        die("Conexión fallida jajaja: " . $conexion->connect_error);
    }
    return $conexion;
}