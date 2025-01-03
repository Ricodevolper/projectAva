<?php

class ModeloEmpleados {
    
    static public function mdlDatosEmpleados($id) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT 
                CONCAT_WS(' ', apaterno_promotor, amaterno_promotor, nombre_promotor) AS nombre_promotor
            FROM 
                tbl_empleados 
            WHERE 
                id_promotor = :id;");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlDatosEmpleados: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    static public function mdlDatosSp($id) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT *,
             CONCAT(tbl_clientes.nombre_clte, ' ', tbl_clientes.apaterno_clte, ' ', tbl_clientes.amaterno_clte) AS cliente  -- Concatenate client's full name
   
            FROM tbl_clientes_sp
              INNER JOIN 
                tbl_clientes 
                ON tbl_clientes.id_cliente = tbl_clientes_sp.fk_cliente  -- Joining condition
        
            WHERE `saldo_total` > 0
            AND Fk_empleado = :id
           
            AND dep_ret = 1;");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlDatosStable: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    static public function mdlDatosBtc($id) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT *,
       CONCAT(tbl_clientes.nombre_clte, ' ', tbl_clientes.apaterno_clte, ' ', tbl_clientes.amaterno_clte) AS cliente,  -- Nombre completo
       (SELECT MAX(precio) 
        FROM bitcoin_historico 
        WHERE bitcoin_historico.fecha <= CURDATE()) AS max_precio  -- Precio máximo con fecha válida
FROM tbl_clientes_bitcoin
INNER JOIN tbl_clientes 
    ON tbl_clientes.id_cliente = tbl_clientes_bitcoin.fk_cliente  -- Unión con clientes
WHERE `monto_btc` > 0
  AND Fk_empleado = :id
  AND dep_ret = 1
  AND status_liquidacion = 0;
");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlDatosStable: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    
    static public function mdlDatosGarant($id) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT 
    tbl_clientes_garant.Fk_cliente, tbl_clientes_garant.t_moneda,
    CONCAT(tbl_clientes.nombre_clte, ' ', tbl_clientes.apaterno_clte, ' ', tbl_clientes.amaterno_clte) AS cliente,
    SUM(tbl_clientes_garant.monto_inver) AS monto_inver
FROM 
    tbl_clientes_garant
INNER JOIN 
    tbl_clientes 
    ON tbl_clientes.id_cliente = tbl_clientes_garant.Fk_cliente
WHERE 
    fk_empleado = :id
    AND status_contrato = 1
GROUP BY 
    tbl_clientes_garant.Fk_cliente, 
    tbl_clientes.nombre_clte, 
    tbl_clientes.apaterno_clte, 
    tbl_clientes.amaterno_clte;


            
          ");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlDatosGarant: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    static public function mdlMensualsp($id, $moneda) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT 
            MONTH(fecha_mov) AS mes,
            SUM(saldo_total) AS suma_mensual
            FROM 
            tbl_clientes_sp
            WHERE 
            fk_empleado = :id
            AND saldo_total > 0
            AND t_moneda = :moneda
             GROUP BY 
            MONTH(fecha_mov)
            ORDER BY 
            MONTH(fecha_mov);");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':moneda', $moneda, PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlMensualGarant: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    static public function mdlDatosEvent($id) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT *
            FROM tbl_clientes_event
            WHERE `id_mov` = (SELECT MAX(`id_mov`) FROM tbl_clientes_event)
            AND Fk_empleado = :id
            AND Fk_cliente <> 53
            AND tipo_movimiento = 1;");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlDatosEvent: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    
    static public function mdlDatosLq($id) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT *
            FROM tbl_clientes_lq
            WHERE `fecha_mov` = (SELECT MAX(`fecha_mov`) FROM tbl_clientes_lq)
            AND fk_empleado = :id;");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlDatosLq: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    
    static public function mdlDatosStable($id) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT *
            FROM tbl_clientes_stable
            WHERE `id_mov` = (SELECT MAX(`id_mov`) FROM tbl_clientes_stable)
            AND Fk_empleado = :id
            AND Fk_cliente <> 53
            AND tipo_movimiento = 1;");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlDatosStable: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    
    static public function mdlDatosTiie($id) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT 
                tbl_clientes_tiie.*,  -- Select all columns from tbl_clientes_tiie
                CONCAT(tbl_clientes.nombre_clte, ' ', tbl_clientes.apaterno_clte, ' ', tbl_clientes.amaterno_clte) AS cliente  -- Concatenate client's full name
            FROM 
                tbl_clientes_tiie
            INNER JOIN 
                tbl_clientes 
                ON tbl_clientes.id_cliente = tbl_clientes_tiie.fk_cliente  -- Joining condition
            WHERE fk_empleado = :id
            AND status_contrato = 1
           ;");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlDatosTiie: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    
    static public function mdlMensualGarant($id, $moneda) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT 
            MONTH(fecha_inser) AS mes,
            SUM(monto_inver) AS suma_mensual
            FROM 
            tbl_clientes_garant
            WHERE 
            fk_empleado = :id
            AND status_contrato = 1
            AND t_moneda = :moneda
            AND YEAR(fecha_inser) = 2024
            GROUP BY 
            MONTH(fecha_inser)
            ORDER BY 
            MONTH(fecha_inser);");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':moneda', $moneda, PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlMensualGarant: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    
    static public function mdlMensualTiie($id) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT 
            MONTH(fecha_inser) AS mes,
            SUM(monto_inver) AS suma_mensual
            FROM 
            tbl_clientes_tiie
            WHERE 
            fk_empleado = :id
            AND status_contrato = 1
            AND YEAR(fecha_inser) = 2024
            GROUP BY 
            MONTH(fecha_inser)
            ORDER BY 
            MONTH(fecha_inser);");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlMensualTiie: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    
    static public function mdlMensualEvent($id) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT 
            MONTH(`fecha_inser`) AS mes, 
            SUM(`saldo_total`) AS suma_mensual
            FROM 
            `tbl_clientes_event`
            WHERE 
            `tipo_movimiento` = 2 
            AND YEAR(`fecha_inser`) = 2024 
            AND `Fk_cliente` <> 53 
            AND `Fk_empleado` = :id
            GROUP BY 
            MONTH(`fecha_inser`)
            ORDER BY
            MONTH(`fecha_inser`);");
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
    
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlMensualEvent: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }
    
}

