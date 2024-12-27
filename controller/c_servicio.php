<?php
require_once "model/m_servicio.php";

class ServicioController
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Función general para servicios y métodos
    public function servicios($metodo)
    {
        $main = new servicio($this->db);
        if (method_exists($main, $metodo)) {
            $main->$metodo();
        } else {
            echo "Error: el método solicitado no existe.";
        }
    }

}