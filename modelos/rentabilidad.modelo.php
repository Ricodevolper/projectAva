<?php
require_once "conexion.php";
class MdlRentabilidad {

    static public function mdlRentabilidadLal(){
        $stmt = Conexion::conectar()->prepare("SELECT
        art.CODART,
        art.DESART,
        art.PCOART,
        SUM(lal.CANLAL) AS TotalCantidad,
        AVG(lal.PRELAL) AS PromedioPrecio,
        SUM(lal.TOTLAL) AS TotalLAL,
        AVG(lal.COSLAL) AS Costolal,
        SUM(lal.CANLAL) * AVG(lal.COSLAL) AS CostoTotal,
        ABS((1 - (SUM(lal.TOTLAL) / (SUM(lal.CANLAL) * AVG(lal.COSLAL)))) * 100) AS PorcentajeTotalLAL
    FROM
        lal
    INNER JOIN
        art ON lal.ARTLAL = art.CODART
    GROUP BY
        art.CODART, art.DESART, art.PCOART;
    ");
    
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    }


    static public function mdlRentabilidadLfa(){
        $stmt = Conexion::conectar()->prepare("SELECT
        art.CODART,
        art.DESART,
        art.PCOART,
        SUM(lfa.CANlfa) AS TotalCantidad,
        AVG(lfa.PRElfa) AS PromedioPrecio,
        SUM(lfa.TOTlfa) AS Totallfa,
        AVG(lfa.COSlfa) AS Costolfa,
        SUM(lfa.CANlfa) * AVG(lfa.COSlfa) AS CostoTotal,
        ABS((1 - (SUM(lfa.TOTlfa) / (SUM(lfa.CANlfa) * AVG(lfa.COSlfa)))) * 100) AS PorcentajeTotallfa
    FROM
        lfa
    INNER JOIN
        art ON lfa.ARTlfa = art.CODART
    GROUP BY
        art.CODART, art.DESART, art.PCOART;
    ");
    
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    }
    
    

}



