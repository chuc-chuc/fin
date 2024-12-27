<?php
class vista
{
    private $db;
    private $nombre;
    private $email;

    public function __construct($conexion)
    {
        $this->db = $conexion;
    }

}
