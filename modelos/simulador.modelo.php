<?php


class  ModeloSimulador {

    static public function mdlSimuladorGarantmxn(  $montob  )
    {
        $stmt = Conexion::conectar()->prepare("SELECT `Moneda`, `meses`, `interes`, `tipoPago` from tbl_garant_interes WHERE `Moneda`  = 'mxn' and Monto = :montob 
       ");

      
       $stmt->bindParam(':montob', $montob, PDO::PARAM_INT);  
      
    
        $stmt->execute();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $resultados[] = $fila;
        }
    // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    }
    static public function mdlSimuladorGarantusd(  $montob  )
    {
        $stmt = Conexion::conectar()->prepare("SELECT `Moneda`, `meses`, `interes`, `tipoPago` from tbl_garant_interes WHERE `Moneda`  = 'usd' and Monto = :montob 
       ");

      
       $stmt->bindParam(':montob', $montob, PDO::PARAM_INT);  
      
    
        $stmt->execute();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $resultados[] = $fila;
        }
    // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    }
}