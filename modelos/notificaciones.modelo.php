<?php



class ModeloNotificaciones{
    static public function mdlDetalleBitcoinAplicados(){

        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Preparar la consulta
            $stmt = $conn->prepare("SELECT * FROM `tbl_notificaions` WHERE tema_notificacion = 'Cupon  Bitcoin'
            ");

            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->closeCursor();
    
            // Vincular parámetros
        
        } catch (Exception $e) {
            // Manejo de errores
            return json_encode([
                'success' => false,
                'message' => 'Excepción: ' . $e->getMessage()
            ]);
        }

    }


    static public  function mdlobtenerNotificacionesNoVistas($id_usuario) {
       

        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Preparar la consulta
            $stmt = $conn->prepare("SELECT n.*
            FROM tbl_notificaions n
            LEFT JOIN tbl_vistos_notificaciones v 
                ON n.`id_notificaicon` = v.id_notificacion AND v.id_usuario = :id_usuario
            WHERE v.id_usuario IS NULL;
            ");
              $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
      
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->closeCursor();
    
            // Vincular parámetros
        
        } catch (Exception $e) {
            // Manejo de errores
            return json_encode([
                'success' => false,
                'message' => 'Excepción: ' . $e->getMessage()
            ]);
        }
       
    }
     static public  function mdlMarcarNotificacionVista($id_usuario, $id_notificacion) {
       
      

        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Preparar la consulta
            $stmt = $conn->prepare("INSERT INTO tbl_vistos_notificaciones (id_notificacion, id_usuario)
            VALUES (:id_notificacion, :id_usuario);
            ");
             $stmt->bindParam(':id_notificacion', $id_notificacion, PDO::PARAM_INT);
             $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
           
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->closeCursor();
    
            // Vincular parámetros
        
        } catch (Exception $e) {
            // Manejo de errores
            return json_encode([
                'success' => false,
                'message' => 'Excepción: ' . $e->getMessage()
            ]);
        }
    }
    
    
}