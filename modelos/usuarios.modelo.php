<?php
require_once "conexion.php";

class ModeloUsuario
{


    static public function MdlCrearUsuario($Nombre,$mail,$perfil,$password)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO `tbl_usu`(`Nombre_usuario`, `Perfil_usuario`, `Password_usuario`, `Email_usuario`) VALUES (:nombre, :perfil, :password, :mail)");

        $stmt->bindParam(":nombre", $Nombre, PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $perfil, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->bindParam(":mail", $mail, PDO::PARAM_STR);
       

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->closeCursor();

        $stmt = null;
    }


    static public function mdlUsuarios(){
        $stmt = Conexion::conectar()->prepare("Select * From `tbl_usu`");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->closeCursor();
    }

    static public function mdlIngresoUsuario($usuario, $password){
        
      
         $stmt =Conexion::conectar()->prepare("Select * from `tbl_usu` WHERE `Email_usuario` = :usuario AND `Password_usuario` = :password AND `Estatus_Usuario` = 0");
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();
        $stmt ->closeCursor();
        





       
    }
    static public function mdlIngresoUsuarioAva($email){
        
      
         $stmt =Conexion::conectar()->prepare("Select * from `tbl_usuario` WHERE `email` = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
       

        $stmt->execute();

        return $stmt->fetchAll();
        $stmt ->closeCursor();
        





       
    }


    static public function mdlBloqueoCuenta($usuario){

        if(preg_match('/^[a-zA-Z0-9@_\-\.]+$/',$usuario)){

              $stmt=Conexion::conectar()->prepare("UPDATE `tbl_usu` SET `Bloqueo_Usuario` = '1' WHERE `tbl_usu`.`Email_Usuario` = :usuario;");
              $stmt->bindParam(":usuario",$usuario, PDO::PARAM_STR);
            if( $stmt->execute()){
                echo '<br><div class="alert alert-danger">Cuenta bloqueada debido a múltiples intentos fallidos. Comunicate con el Administrador del Sistema</div>';
            }
            $stmt = null;
        
        }


    }


    static public function mdlEditarUsuario($nombre,$mail,$perfil,$password){



    }
   
    
}
