<?php

require_once '../../modelos/conexion.php';


if (isset($_POST['newStatus'])) {
    
    if(preg_match('/^[a-zA-Z0-9@_\-\.]+$/',$_POST['id'])){
         $usuario = $_POST['id'];
         $newStatus = $_POST['newStatus'];
         
      $stmt = Conexion::conectar()->prepare("UPDATE `tbl_usu` SET `Estatus_Usuario` = :newstatus WHERE `tbl_usu`.`Email_usuario` = :usuario;");
      $stmt->bindParam(":newstatus", $newStatus, PDO::PARAM_STR );
      $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR );
     if($stmt->execute()){
        echo "Actualizado con exito";
     }else{
        echo 'Error';
     }
      $stmt = null;



    }



}