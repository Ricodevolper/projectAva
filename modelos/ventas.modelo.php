<?php

 require_once 'conexion.php';


class ModeloVentas{

    static public function mdlVentasTotal(){

        $stmt = Conexion::conectar()->prepare("SELECT SUM(`TOTALB`) AS 'Total' FROM `f_alb` WHERE 1");
        $stmt->execute();
        return $stmt->fetch();
        $stmt-> close();

    }
    static public function mdlPromedioTicket(){

        $stmt = Conexion::conectar()->prepare("SELECT SUM(`TOTALB`) / COUNT(*) AS 'promedio_ticket'
        FROM `f_alb`
        WHERE DAYOFWEEK(`FECALB`) BETWEEN 2 AND 6;");
        $stmt->execute();
        return $stmt->fetch();
        $stmt-> close();

    }
    static public function mdlPromedioDiario(){

        $stmt = Conexion::conectar()->prepare("SELECT SUM(`TOTALB`) / COUNT(DISTINCT `FECALB`) AS 'promedio_diario'
        FROM `f_alb`
        WHERE DAYOFWEEK(`FECALB`) BETWEEN 2 AND 6;
        ");
        $stmt->execute();
        return $stmt->fetch();
        $stmt-> close();

    }



    static public function mdlVentasMensuales(){

           $stmt = Conexion::conectar()->prepare("SELECT
           YEAR(`FECALB`) AS 'year',
           m.nombre_mes AS 'mes',
           SUM(`TOTALB`) AS 'venta_mensual'
       FROM
           `f_alb` f
       JOIN meses m ON MONTH(f.`FECALB`) = m.numero_mes
       GROUP BY
           YEAR(`FECALB`), MONTH(`FECALB`), m.nombre_mes
       ORDER BY
           YEAR(`FECALB`), MONTH(`FECALB`);
       
       ");


        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();

    }


    static public function mdlArticulosMasVendidos(){


        $stmt = Conexion::conectar()->prepare("SELECT 
        ARTLAL,
        MAX(DESLAL) AS DESLAL,
        MAX(PRELAL) AS PRELAL,
        COUNT(*) AS CANLAL,
        SUM(totlal) AS total_venta,
        (SUM(totlal) / (SELECT SUM(totlal) FROM f_lal)) * 100 AS porcentaje_venta_total
    FROM f_lal
    GROUP BY ARTLAL
    ORDER BY total_venta DESC
    LIMIT 10;
    
                    ");
                
            $stmt->execute();

            return $stmt->fetchAll();

            $stmt->close();
            
            }


}