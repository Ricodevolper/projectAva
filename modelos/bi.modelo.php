<?php
class ModeloBi{
    static public function mdlGarantIngreso(){
        try{
        $stmt = Conexion::conectar()->prepare("SELECT 
        `fk_empleado`, 
        CONCAT_WS(' ', nombre_promotor, apaterno_promotor, amaterno_promotor) AS nombre_promotor,
        `t_moneda`,
        SUM(`monto_inver`) AS `tot`
    FROM 
        `tbl_clientes_garant`
    INNER JOIN 
        tbl_empleados ON tbl_clientes_garant.fk_empleado = tbl_empleados.id_promotor
    WHERE 
        YEAR(`fecha_inser`) = 2024
    GROUP BY 
        `fk_empleado`, `t_moneda`;
    
    ");
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    } catch (PDOException $e) {
        // Registro del error
        error_log("Error en mdlGarantIngreso: " . $e->getMessage());

        // Devolver un valor de error o lanzar una excepción personalizada
        return array('error' => 'Ocurrió un error al consultar la base de datos.');
    }
 
    }

    static public function mdlTiieInfo($id_garant){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM `tbl_detalle_tiie` WHERE `fk_id_tiie` = $id_garant  ORDER BY `tbl_detalle_tiie`.`fecha_pago` ASC;");
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
 
    }
    static public function mdlGarantNuevoCliente(){
        try{
        $stmt = Conexion::conectar()->prepare("SELECT *, fk_cliente FROM `tbl_clientes`
        INNER JOIN 
        tbl_clientes_garant ON tbl_clientes.id_cliente = tbl_clientes_garant.Fk_cliente 
        
        WHERE YEAR(`alta_sistema`) = 2024 ");
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    } catch (PDOException $e) {
        // Registro del error
        error_log("Error en mdlGarantNuevoCliente: " . $e->getMessage());

        // Devolver un valor de error o lanzar una excepción personalizada
        return array('error' => 'Ocurrió un error al consultar la base de datos.');
    }
 
    }
    static public function mdlSaldoTotalBtc($perfil){
        try{
        $stmt = Conexion::conectar()->prepare("SELECT 
    SUM(monto_btc) * (
        SELECT precio 
        FROM `bitcoin_historico` 
        ORDER BY fecha DESC 
        LIMIT 1
    ) AS total,
   SUM(monto_btc) AS btc
FROM 
    `tbl_clientes_bitcoin` WHERE status_liquidacion = 0; ");
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    } catch (PDOException $e) {
        // Registro del error
        error_log("Error en mdlGarantNuevoCliente: " . $e->getMessage());

        // Devolver un valor de error o lanzar una excepción personalizada
        return array('error' => 'Ocurrió un error al consultar la base de datos.');
    }
 
    }
    static public function mdlGarantProximoPago(){
        try{
        $stmt = Conexion::conectar()->prepare("SELECT 
        id_detalle_garant, 
        fecha_pago, 
        status_pago, 
        `interes`,
        DATEDIFF(fecha_pago, CURDATE()) AS dias_para_pago,
         CONCAT_WS(' ', nombre_clte, apaterno_clte, amaterno_clte) AS nombre_clte,
         tbl_clientes.id_cliente,
         tbl_clientes_garant.fk_cliente,
         tbl_clientes_garant.monto_inver,
         tbl_clientes_garant.t_moneda,
         tbl_clientes_garant.tasa,
         tbl_clientes_garant.f_pago,
         tbl_clientes_garant.plazo,
         tbl_clientes_garant.id_garant,
         tbl_clientes_garant.cuota_total,
         tbl_clientes_garant.fecha_aplicacion,
         tbl_clientes_garant.num_contrato_garant
         
      FROM 
        tbl_detalle_garant 
        INNER JOIN 
        
        tbl_clientes_garant ON tbl_clientes_garant.id_garant = tbl_detalle_garant.fk_id_garant
        
        INNER JOIN
        tbl_clientes  ON tbl_clientes_garant.Fk_cliente =tbl_clientes.id_cliente
        
      WHERE 
        status_pago = 0 
        AND DATEDIFF(fecha_pago, CURDATE()) < 30 
        AND DATEDIFF(fecha_pago, CURDATE()) > 0;");
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    } catch (PDOException $e) {
        // Registro del error
        error_log("Error en mdlGarantIngreso: " . $e->getMessage());

        // Devolver un valor de error o lanzar una excepción personalizada
        return array('error' => 'Ocurrió un error al consultar la base de datos.');
    }
        
 
    }
    static public function mdlGarantVencidos(){
        try{
        $stmt = Conexion::conectar()->prepare("SELECT 
        id_detalle_garant, 
        fecha_pago, 
        status_pago, 
        `interes`,
        DATEDIFF(fecha_pago, CURDATE()) AS dias_para_pago,
         CONCAT_WS(' ', nombre_clte, apaterno_clte, amaterno_clte) AS nombre_clte,
         tbl_clientes.id_cliente,
         tbl_clientes_garant.fk_cliente,
         tbl_clientes_garant.monto_inver,
         tbl_clientes_garant.t_moneda,
         tbl_clientes_garant.tasa,
         tbl_clientes_garant.f_pago,
         tbl_clientes_garant.plazo,
         tbl_clientes_garant.id_garant,
         tbl_clientes_garant.cuota_total,
         tbl_clientes_garant.fecha_aplicacion,
         tbl_clientes_garant.num_contrato_garant
         
      FROM 
        tbl_detalle_garant 
        INNER JOIN 
        
        tbl_clientes_garant ON tbl_clientes_garant.id_garant = tbl_detalle_garant.fk_id_garant
        
        INNER JOIN
        tbl_clientes  ON tbl_clientes_garant.Fk_cliente =tbl_clientes.id_cliente
        
      WHERE 
        status_pago = 0 
        
        AND DATEDIFF(fecha_pago, CURDATE()) < 0;");
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    } catch (PDOException $e) {
        // Registro del error
        error_log("Error en mdlGarantIngreso: " . $e->getMessage());

        // Devolver un valor de error o lanzar una excepción personalizada
        return array('error' => 'Ocurrió un error al consultar la base de datos.');
    }
 
    }
    static public function mdlGarantVencidosHoy(){
        try{
        $stmt = Conexion::conectar()->prepare("SELECT 
        id_detalle_garant, 
        fecha_pago, 
        status_pago, 
        `interes`,
        DATEDIFF(fecha_pago, CURDATE()) AS dias_para_pago,
        CONCAT_WS(' ', nombre_clte, apaterno_clte, amaterno_clte) AS nombre_clte,
        tbl_clientes.id_cliente,
        tbl_clientes_garant.fk_cliente,
        tbl_clientes_garant.monto_inver,
        tbl_clientes_garant.t_moneda,
        tbl_clientes_garant.tasa,
        tbl_clientes_garant.f_pago,
        tbl_clientes_garant.plazo,
        tbl_clientes_garant.id_garant,
        tbl_clientes_garant.cuota_total,
        tbl_clientes_garant.fecha_aplicacion,
        tbl_clientes_garant.num_contrato_garant
    FROM 
        tbl_detalle_garant 
        INNER JOIN tbl_clientes_garant 
            ON tbl_clientes_garant.id_garant = tbl_detalle_garant.fk_id_garant
        INNER JOIN tbl_clientes  
            ON tbl_clientes_garant.fk_cliente = tbl_clientes.id_cliente
    WHERE 
        status_pago = 0 
        AND fecha_pago = CURDATE();
    ");
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    } catch (PDOException $e) {
        // Registro del error
        error_log("Error en mdlGarantIngreso: " . $e->getMessage());

        // Devolver un valor de error o lanzar una excepción personalizada
        return array('error' => 'Ocurrió un error al consultar la base de datos.');
    }
 
    }
    static public function mdlBiGarantInfo($id_garant){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM `tbl_detalle_garant` WHERE `Fk_id_garant` = $id_garant  ORDER BY `tbl_detalle_garant`.`fecha_pago` ASC;");
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
 
    }
    static public function mdlliquidacionesProximas(){
        try{
        $stmt = Conexion::conectar()->prepare("SELECT 
         CONCAT_WS(' ', tbl_clientes.nombre_clte, tbl_clientes.apaterno_clte, tbl_clientes.amaterno_clte) AS nombre_clte,
         tbl_clientes.id_cliente,
         CONCAT_WS(' ', nombre_promotor, apaterno_promotor, amaterno_promotor) AS nombre_promotor,
         DATEDIFF(tdg.fecha_pago, CURDATE()) AS dias_para_pago,
        tcg.id_garant,
        tcg.tasa,
        tcg.monto_inver,
        tcg.num_contrato_garant,
        tcg.t_moneda,
        tdg.interes,
        tcg.fk_cliente,
        tcg.plazo,
        tcg.f_pago,
        tcg.cuota_total,
        tcg.status_contrato,
        COUNT(tdg.status_pago) AS status_pago_count,
        MAX(tdg.num_pago) AS num_pago,
        MAX(tdg.fecha_pago) AS fecha_pago,
        MAX(tdg.num_pago) - COUNT(tdg.status_pago) AS diff_count
    FROM 
        tbl_clientes_garant tcg
        INNER JOIN 
        tbl_empleados ON tcg.fk_empleado = tbl_empleados.id_promotor
        INNER JOIN tbl_clientes  
            ON tcg.fk_cliente = tbl_clientes.id_cliente
    LEFT JOIN 
        tbl_detalle_garant tdg ON tdg.fk_id_garant = tcg.id_garant AND tdg.status_pago = 0
    WHERE 
        tcg.status_contrato = 1
    GROUP BY 
        tcg.id_garant, tcg.status_contrato
    HAVING 
        YEAR(MAX(tdg.fecha_pago)) = YEAR(CURDATE()) AND MONTH(MAX(tdg.fecha_pago)) = MONTH(CURDATE());
    ");
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    } catch (PDOException $e) {
        // Registro del error
        error_log("Error en mdlGarantIngreso: " . $e->getMessage());

        // Devolver un valor de error o lanzar una excepción personalizada
        return array('error' => 'Ocurrió un error al consultar la base de datos.');
    }
 
    }
    static public function mdlliquidacionesGarant(){
        try{
        $stmt = Conexion::conectar()->prepare("SELECT 
        tcg.id_garant,
        tcg.status_contrato,
        COUNT(tdg.status_pago) AS status_pago_count,
        MAX(tdg.num_pago) AS num_pago,
        MAX(tdg.fecha_pago) AS fecha_pago,
        MAX(tdg.num_pago) - COUNT(tdg.status_pago) AS diff_count
    FROM 
        tbl_clientes_garant tcg
    LEFT JOIN 
        tbl_detalle_garant tdg ON tdg.fk_id_garant = tcg.id_garant AND tdg.status_pago = 0
    WHERE 
        tcg.status_contrato = 1
    GROUP BY 
        tcg.id_garant, tcg.status_contrato
    HAVING 
        YEAR(MAX(tdg.fecha_pago)) = YEAR(CURDATE()) AND MONTH(MAX(tdg.fecha_pago)) = MONTH(CURDATE());
    ");
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
    } catch (PDOException $e) {
        // Registro del error
        error_log("Error en mdlGarantIngreso: " . $e->getMessage());

        // Devolver un valor de error o lanzar una excepción personalizada
        return array('error' => 'Ocurrió un error al consultar la base de datos.');
    }
 
    }

    static public function mdlAsesoresContratosActivos($perfil){

        if ($perfil == 'administrador' || $perfil == 'Gerente Administrativo') {
            $query = "SELECT DISTINCT tct.fk_empleado
        FROM tbl_clientes_tiie tct
        INNER JOIN rel_gerente_asesor rga1 ON rga1.fk_id_asesor = tct.fk_empleado
        WHERE tct.status_contrato = 1
       
        UNION

        SELECT DISTINCT tce.fk_empleado
        FROM tbl_clientes_event tce
        INNER JOIN rel_gerente_asesor rga2 ON rga2.fk_id_asesor = tce.fk_empleado
        WHERE tce.titulos <> 0
       
        UNION

        SELECT DISTINCT tcl.fk_empleado
        FROM tbl_clientes_lq tcl
        INNER JOIN rel_gerente_asesor rga3 ON rga3.fk_id_asesor = tcl.fk_empleado
        WHERE tcl.titulos <> 0
       
        UNION

        SELECT DISTINCT tcg.fk_empleado
        FROM tbl_clientes_garant tcg
        INNER JOIN rel_gerente_asesor rga4 ON rga4.fk_id_asesor = tcg.fk_empleado
        WHERE tcg.status_contrato = 1
        ";
        }elseif ($perfil == 'DirectorAvawm') {
            $query = "SELECT DISTINCT tct.fk_empleado
            FROM tbl_clientes_tiie tct
            INNER JOIN rel_gerente_asesor rga1 ON rga1.fk_id_asesor = tct.fk_empleado
            WHERE tct.status_contrato = 1
            AND rga1.fk_id_gerente = 10
    
            UNION
    
            SELECT DISTINCT tce.fk_empleado
            FROM tbl_clientes_event tce
            INNER JOIN rel_gerente_asesor rga2 ON rga2.fk_id_asesor = tce.fk_empleado
            WHERE tce.titulos <> 0
            AND rga2.fk_id_gerente = 10
    
            UNION
    
            SELECT DISTINCT tcl.fk_empleado
            FROM tbl_clientes_lq tcl
            INNER JOIN rel_gerente_asesor rga3 ON rga3.fk_id_asesor = tcl.fk_empleado
            WHERE tcl.titulos <> 0
            AND rga3.fk_id_gerente = 10
    
            UNION
    
            SELECT DISTINCT tcg.fk_empleado
            FROM tbl_clientes_garant tcg
            INNER JOIN rel_gerente_asesor rga4 ON rga4.fk_id_asesor = tcg.fk_empleado
            WHERE tcg.status_contrato = 1
            AND rga4.fk_id_gerente = 10;";
        }
        try {
            $stmt = Conexion::conectar()->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            $stmt->execute();
            
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultado;
            
        } catch (PDOException $e) {
            // Manejar la excepción
            echo "Error: " . $e->getMessage();
        } finally {
            $stmt->closeCursor();  // Cerramos el cursor al final.
        }
        
 
    }
}