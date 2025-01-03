<?php

require_once '../../modelos/conexion.php';

if (isset($_POST['Nueva_Contrasena'])) {

   
       
        $idUsuario = $_POST['Id_Usuario_Actualizar_Contrasena'];
        $contraseña = $_POST['Nueva_Contrasena'];
        



        $encriptar = crypt($_POST["Nueva_Contrasena"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


        // // Actualizar en la base de datos
        // $sql = "UPDATE `tbl_usu` SET 
        //         `Nombre_Usuario` = :nombre, 
        //         `Mail` = :mail, 
        //         `Perfil` = :perfil 
        //         WHERE `tbl_usu`.`Id_usuario` = :idUsuario";

        // // Aquí deberías tener la conexión a la base de datos y preparar la sentencia

        $stmt = Conexion::conectar()->prepare("UPDATE `tbl_usu` SET `Password_usuario` = :encriptar WHERE `tbl_usu`.`Id_usuario` = :idUsuario;");
        $stmt->bindParam(':encriptar', $encriptar, PDO::PARAM_STR);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_STR);
        

        // Ejecutar la sentencia
       if( $stmt->execute()){
       echo "ok";
       }else{
       echo "error";
       }
    }