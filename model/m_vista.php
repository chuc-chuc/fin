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
	public function validarAcceso( $acceso ) {
		$db = db();
		//consulta
		$idUsuario = 1;
		try {
			$query = "CALL VerificarAccesoUsuario(?, ?, @tieneAcceso)";
			$stmt = $db->prepare( $query );
			// Vincular parámetros
			$stmt->bind_param( 'is', $idUsuario, $acceso );
			// Ejecutar la consulta
			$stmt->execute();
			// Obtener el resultado del parámetro OUT
			$result = $db->query( "SELECT @tieneAcceso AS tieneAcceso" );
			$row = $result->fetch_assoc();
			// Cerrar sentencia y conexión
			$stmt->close();
			$db->close();
			return (bool) $row['tieneAcceso'];
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
    }
	public function salir_menu() {
		require_once 'app/app.php';
		return "<body>
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Acceso Denegado',
                        text: 'No tienes Acceso, Serás redireccionado al Menú.',
                        showConfirmButton: false,
                        timer: 2500 // Tiempo antes de la redirección en milisegundos
                    }).then(() => {
                        window.location.href = 'vista.php?ruta=menu'; // Redirecciona después de cerrar el mensaje
                    });
                </script>
            </body>";
	}
}
