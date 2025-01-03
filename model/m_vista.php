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

    public function validarSesion()
    {
        if (!isset($_SESSION['usuario_id'])) {
            return false;
        }
        else{
            return true;
        }
    }
    
    public function salir_index(){
        require_once 'app/app.php';
        return "<body>
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Acceso Denegado',
                        text: 'No has iniciado sesión. Serás redireccionado a la página de inicio.',
                        showConfirmButton: false,
                        timer: 2500 // Tiempo antes de la redirección en milisegundos
                    }).then(() => {
                        window.location.href = 'index.php'; // Redirecciona después de cerrar el mensaje
                    });
                </script>
            </body>";
    }
}
