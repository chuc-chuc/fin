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
        if (!$main->validarSesion()) {
            echo $main->salir_index();
            exit;
        }
        
        require_once "view/menu.php";
    }
    public function caja_index()
    {
		$main = new vista( $this->db );
		if ( ! $main->validarSesion() ) {
			echo $main->salir_index();
			exit;
		}
		if ( ! $main->validarAcceso('caja') ) {
			echo $main->salir_menu();
			exit;
		}

        require_once "view/caja/index.php";
    }
	public function caja_bobeda() {
		$main = new vista( $this->db );
		if ( ! $main->validarSesion() ) {
			echo $main->salir_index();
			exit;
		}
		if ( ! $main->validarAcceso( 'caja' ) ) {
			echo $main->salir_menu();
			exit;
		}
		require_once "view/caja/bobeda.php";
	}
	public function cambio_contra() {
		$main = new vista( $this->db );
		if ( ! $main->validarSesion() ) {
			echo $main->salir_index();
			exit;
		}
		require_once "view/cambio_contra.php";
	}
    public function error()
    {
        include_once 'app/app.php';
        require_once "view/404.php";
    }
}
