<?php

require_once '../../modelos/conexion.php';

if (isset($_POST['Editar_Nombre'])) {

   
        $usuario = $_POST['Editar_Nombre'];
        $idUsuario = $_POST['Id_Usuario'];
        $mail = $_POST['Editar_mail'];
        $perfil = $_POST['editar_perfil'];

        // // Actualizar en la base de datos
        // $sql = "UPDATE `tbl_usu` SET 
        //         `Nombre_Usuario` = :nombre, 
        //         `Mail` = :mail, 
        //         `Perfil` = :perfil 
        //         WHERE `tbl_usu`.`Id_usuario` = :idUsuario";

        // // Aquí deberías tener la conexión a la base de datos y preparar la sentencia

        $stmt = Conexion::conectar()->prepare("UPDATE `tbl_usu` SET 
        `Nombre_Usuario` = :nombre, 
        `Email_usuario` = :mail, 
        `Perfil_usuario` = :perfil 
        WHERE `tbl_usu`.`Id_usuario` = :idUsuario");
        $stmt->bindParam(':nombre', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_STR);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt->bindParam(':perfil', $perfil, PDO::PARAM_STR);

        // Ejecutar la sentencia
       if( $stmt->execute()){
       echo "ok";
       }else{
       echo "error";
       }
    }

