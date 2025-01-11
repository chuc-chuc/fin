<?php
class servicio
{
    private $conexion;
    private $nombre;
    private $email;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
	public function validarSesion() {
		if ( ! isset( $_SESSION['usuario_id'] ) ) {
			return false;
		} else {
			return true;
		}
	}
	public function validarAcceso( $acceso ) {
		$db = db();
		//consulta
		if ( session_status() == PHP_SESSION_NONE ) {
			session_start();
		}
		if ( ! isset( $_SESSION['usuario_id'] ) ) {
			return false;
		}
		$idUsuario = $_SESSION['usuario_id'];
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
    public function sesion()
    {
        $db = db();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $correo = $_POST['email']; // el correo electrónico proporcionado por el usuario
        $clave = md5($_POST['password']); // la clave proporcionada por el usuario

        $query = "CALL IniciarSesion(?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $correo, $clave);

        // Ejecutar la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        // Cerrar sentencia
        $stmt->close();

        // Verificar si se encontraron datos o si se devolvió un mensaje de error
        if ($row = $result->fetch_assoc()) {
            if (isset($row['mensaje'])) {
				echo json_encode( [ 
					'status' => 'Error',
					'message' => $row['mensaje']
				] );
            } else {
                // Establecer variables de sesión
                $_SESSION['usuario_id'] = $row['id'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellido'] = $row['apellido'];
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['idAgencia'] = $row['idAgencia'];
                $_SESSION['idPerfil'] = $row['idPerfil'];
                $_SESSION['fechaCreacion'] = $row['fechaCreacion'];
				echo json_encode( [ 
					'status' => 'Listo',
					'message' => 'Estado de sesion Iniciada'
				] );
                $query2 = "SET time_zone = '-06:00'";
                $stmt2 = $db->prepare($query2);

                // Ejecutar la consulta
                $stmt2->execute();

                // Cerrar sentencia
                $stmt2->close();
            }
        }

        // Cerrar conexión
        $db->close();
    }
	public function cerrarSesion() {
		try {
			// Iniciar sesión si no está iniciada
			if ( session_status() == PHP_SESSION_NONE ) {
				session_start();
			}

			// Destruir todas las variables de sesión
			$_SESSION = array();

			// Destruir la cookie de sesión si existe
			if ( isset( $_COOKIE[session_name()] ) ) {
				setcookie( session_name(), '', time() - 3600, '/' );
			}

			// Destruir la sesión
			session_destroy();

			// Devolver respuesta exitosa para Ajax
			echo json_encode( [ 
				'status' => 'success',
				'message' => 'Sesión cerrada correctamente'
			] );

		} catch (Exception $e) {
			// Devolver mensaje de error para Ajax
			echo json_encode( [ 
				'status' => 'error',
				'message' => 'Error al cerrar sesión: ' . $e->getMessage()
			] );
		}
	}
}