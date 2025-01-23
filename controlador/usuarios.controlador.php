<?php

class ControladorUsuarios {
	public static function ctrCrearUsuario() {
		if (isset($_POST["mail"])) {
			if (preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["Nombre_Completo"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])) {
	
				$encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
	
				// Sanitización de entradas
				$Nombre = htmlspecialchars(strip_tags($_POST["Nombre_Completo"]));
				$mail = filter_var($_POST["mail"], FILTER_SANITIZE_EMAIL);
				$perfil = htmlspecialchars(strip_tags($_POST["perfil"]));
				$password = $encriptar;
	
				try {
					$respuesta = ModeloUsuario::MdlCrearUsuario($Nombre, $mail, $perfil, $password);
	
					if ($respuesta == "ok") {
						echo 'hola';
					} else {
						echo 'no hola';
					}
				} catch (Exception $e) {
					error_log("Error en ctrCrearUsuario: " . $e->getMessage());
					echo 'Ocurrió un error al crear el usuario.';
				}
			}
		}
	}
	
	static public function ctrUsuarios() {
		try {
			$respuesta = ModeloUsuario::mdlUsuarios();
			return $respuesta;
		} catch (Exception $e) {
			error_log("Error en ctrUsuarios: " . $e->getMessage());
			return "Ocurrió un error al obtener los usuarios.";
		}
	}
	
	static public function ctrIngresoUsuario() {
		if (isset($_POST["ingUsuario"])) {
			if (preg_match('/^[a-zA-Z0-9@.]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {
	
				// Sanitización de entradas
				$usuario = htmlspecialchars($_POST["ingUsuario"], ENT_QUOTES, 'UTF-8');
				$password = htmlspecialchars($_POST["ingPassword"], ENT_QUOTES, 'UTF-8');
	
				$encriptar = crypt($password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
	
				try {
					$respuesta = ModeloUsuario::mdlIngresoUsuario($usuario, $encriptar);
					$inicio = count($respuesta);
	
					if ($inicio == 1) {
						if ($respuesta[0]["Bloqueo_Usuario"] == 0) {
							$perfilAva = ModeloUsuario::mdlIngresoUsuarioAva($respuesta[0]["Email_usuario"]);
							$_SESSION["perfilAva"] = $perfilAva[0]['tipo'];
							$_SESSION["iniciarSesion"] = "ok";
							$_SESSION["id"] = $respuesta[0]["Id_usuario"];
							$_SESSION["nombre"] = $respuesta[0]["Nombre_Usuario"];
							$_SESSION["usuario"] = $respuesta[0]["Email_usuario"];
							$_SESSION["perfil"] = $respuesta[0]["Perfil_usuario"];
							$_SESSION['intentosFallidos'] = 0;
							$_SESSION['cuentabloqueda'] = 0;
	
							echo '<script>window.location = "inicio";</script>';
						} else {
							$_SESSION['cuentabloqueda'] = 1;
							$_SESSION['intentosFallidos'] = 3;
							echo '<br><div class="alert alert-danger">Cuenta Bloqueada. Comunicate con Avatrade</div>';
						}
					} else {
						// Manejo de intentos fallidos
						$maxIntentosFallidos = 3;
						if (!isset($_SESSION['intentosFallidos'])) {
							$_SESSION['intentosFallidos'] = 1;
						} else {
							$_SESSION['intentosFallidos']++;
						}
						if ($_SESSION['intentosFallidos'] >= $maxIntentosFallidos) {
							$_SESSION['cuentabloqueda'] = 1;
							$bloqueo = ModeloUsuario::mdlBloqueoCuenta($usuario);
							return $bloqueo;
						} else {
							echo '<br><div class="alert alert-warning">Credenciales incorrectas. Intento fallido número ' . $_SESSION['intentosFallidos'] . '</div>';
						}
					}
				} catch (Exception $e) {
					error_log("Error en ctrIngresoUsuario: " . $e->getMessage());
					echo '<br><div class="alert alert-danger">Ocurrió un error al intentar ingresar.</div>';
				}
			}
		}
	}
	
	static public function ctrEditarUsuario() {
		if (isset($_POST["Editar_Nombre"]) &&
			preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["Editar_Nombre"]) &&
			preg_match('/^[a-zA-Z0-9@.]+$/', $_POST["Editar_mail"]) &&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["editar_perfil"]) &&
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["editar_password"])) {
	
			$encriptar = crypt($_POST["editar_password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
	
			// Sanitización de entradas
			$nombre = htmlspecialchars(strip_tags($_POST["Editar_Nombre"]));
			$mail = filter_var($_POST["Editar_mail"], FILTER_SANITIZE_EMAIL);
			$perfil = htmlspecialchars(strip_tags($_POST["editar_perfil"]));
			$password = $encriptar;
	
			try {
				$respuesta = ModeloUsuario::mdlEditarUsuario($nombre, $mail, $perfil, $password);
				return $respuesta;
			} catch (Exception $e) {
				error_log("Error en ctrEditarUsuario: " . $e->getMessage());
				return "Ocurrió un error al editar el usuario.";
			}
		}
	}
	

}

?>

