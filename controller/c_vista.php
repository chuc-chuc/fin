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
        require_once "view/menu.php";
    }
    public function error()
    {
        include_once 'app/app.php';
        require_once "view/404.php";
    }
}
