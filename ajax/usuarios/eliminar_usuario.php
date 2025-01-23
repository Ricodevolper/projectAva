<?php

require_once '../../modelos/conexion.php';

if (isset($_POST['Id_Usuario_Eliminar'])) {

   
        
        $idUsuario = $_POST['Id_Usuario_Eliminar'];
       

        // // Actualizar en la base de datos
        // $sql = "UPDATE `tbl_usu` SET 
        //         `Nombre_Usuario` = :nombre, 
        //         `Mail` = :mail, 
        //         `Perfil` = :perfil 
        //         WHERE `tbl_usu`.`Id_usuario` = :idUsuario";

        // // Aquí deberías tener la conexión a la base de datos y preparar la sentencia

        $stmt = Conexion::conectar()->prepare("DELETE FROM `tbl_usu` WHERE `tbl_usu`.`Id_usuario` = :idUsuario");
        
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_STR);
    

        // Ejecutar la sentencia
       if( $stmt->execute()){
       echo "ok";
       }else{
       echo "error";
       }
    }

