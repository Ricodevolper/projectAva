<?php

require_once '../../modelos/conexion.php';


if (isset($_POST['newBlockStatus'])) {
   
    
    if(preg_match('/^[a-zA-Z0-9@_\-\.]+$/',$_POST['id'])){
      echo  $usuario =  $_POST['id'];
        echo   $newBlockStatus = $_POST['newBlockStatus'];
         
      $stmt = Conexion::conectar()->prepare("UPDATE `tbl_usu` SET `Bloqueo_Usuario` = :newBlockStatus  WHERE `tbl_usu`.`Email_usuario` = :usuario;");
      $stmt->bindParam(":newBlockStatus", $newBlockStatus, PDO::PARAM_INT );
      $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR );
     if($stmt->execute()){
        echo "Actualizado con exito";
     }else{
        echo 'Error';
     }
      $stmt = null;



    }



}
