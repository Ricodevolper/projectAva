<?php



class Conexion{

	static public function conectar(){
    
	
		$host = 'localhost';
		$dbname = 'avwm3';
		$username = 'root';
		$password = '';
	
	
		try {
			// Usar las variables en la instancia PDO
			$link = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	
			// Configurar opciones de PDO
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Modo de errores: Excepciones
			$link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Modo de obtención predeterminado: Array asociativo
			$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Desactivar emulación de sentencias preparadas
	
			// Configurar codificación de caracteres
			$link->exec("set names utf8");
	
		} catch (PDOException $e) {
			// Manejar errores de conexión
			die('Error al conectar con la base de datos: ' . $e->getMessage());
		}
	
		return $link;
	}
	



	// static public function conetarOdbc(){

    //  $link new odbc_conect()

	// }

}



?>