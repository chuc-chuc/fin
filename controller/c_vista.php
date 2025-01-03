<?php
require_once "model/m_vista.php";

class VistaController
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function menu()
    {
        $main = new vista($this->db);
        $main->validarSesion();
        if (!$main->validarSesion()) {
            echo $main->salir_index();
            exit;
        }
        
        require_once "view/menu.php";
    }
    public function caja_index()
    {
        $main = new vista($this->db);
        require_once "view/caja/index.php";
    }
    public function error()
    {
        include_once 'app/app.php';
        require_once "view/404.php";
    }
}
