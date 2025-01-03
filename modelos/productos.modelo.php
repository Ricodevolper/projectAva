<?php

class ModeloProductos {

   static public function mdlContratoEvent($id)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT Fk_cliente, num_contrato, fondo, serie 
               FROM tbl_clientes_event
               WHERE Fk_cliente = :id 
                   AND producto = '1' 
                   AND fondo = '1'
                   AND serie = '6' 
                   AND status_mov = '1'
               GROUP BY num_contrato
           ");
   
           // Validar y ejecutar consulta
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->execute();
           
           // Obtener resultados
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           
           // Cerrar cursor
           $stmt->closeCursor();
   
           return $resultado;
       } catch (PDOException $e) {
           // Manejo de errores (puedes registrar el error, lanzar una excepción, etc.)
           error_log('Error en mdlContratoEvent: ' . $e->getMessage());
           return []; // Devolver un array vacío o manejar el error según lo necesites
       }
   }

   static public function mdlHistoricoCliente($id,$producto){
    if ($producto == 'garantMxn') {
     $query = "SELECT 
     tcg.id_garant,
     tcg.`Fk_cliente`,
     tcg.`num_contrato_garant`,
     tcg.`plazo`,
     tcg.`f_pago`,
     tcg.`monto_inver`,
     tcg.`t_moneda`,
     tcg.`tasa`,
     tcg.`cuota_total`,
     tcg.`fecha_aplicacion`,
     tcg.`status_contrato`,
    
     CONCAT(tbl_clientes.nombre_clte, ' ', tbl_clientes.apaterno_clte, ' ', tbl_clientes.amaterno_clte) AS nombre_clte
 FROM 
     `tbl_clientes_garant` tcg
 
 INNER JOIN 
     tbl_clientes 
     ON tbl_clientes.id_cliente = tcg.Fk_cliente
 WHERE 
     tcg.`Fk_cliente` = :id
     AND tcg.`t_moneda` = 'MXN';
 ";
    }elseif ($producto == 'garantUsd') {
     $query = "SELECT 
     tcg.id_garant,
     tcg.`Fk_cliente`,
     tcg.`num_contrato_garant`,
     tcg.`plazo`,
     tcg.`f_pago`,
     tcg.`monto_inver`,
     tcg.`t_moneda`,
     tcg.`tasa`,
     tcg.`cuota_total`,
     tcg.`fecha_aplicacion`,
     tcg.`status_contrato`,
    
     CONCAT(tbl_clientes.nombre_clte, ' ', tbl_clientes.apaterno_clte, ' ', tbl_clientes.amaterno_clte) AS nombre_clte
 FROM 
     `tbl_clientes_garant` tcg
 
 INNER JOIN 
     tbl_clientes 
     ON tbl_clientes.id_cliente = tcg.Fk_cliente
 WHERE 
     tcg.`Fk_cliente` = :id
     AND tcg.`t_moneda` = 'USD';
 ";
    }
    elseif ($producto == 'tiie') {
     $query = "SELECT 
     tcg.id_mov_tiie,
     tcg.`Fk_cliente`,
     tcg.`num_contrato_tiie`,
     tcg.`plazo`,
     tcg.`f_pago`,
     tcg.`monto_inver`,
     tcg.`t_moneda`,
     tcg.`tasa_pactada`,
     tcg.`cuota_total`,
     tcg.`fecha_aplicacion`,
     tcg.`status_contrato`,
    
     CONCAT(tbl_clientes.nombre_clte, ' ', tbl_clientes.apaterno_clte, ' ', tbl_clientes.amaterno_clte) AS nombre_clte
 FROM 
     `tbl_clientes_tiie` tcg
 
 INNER JOIN 
     tbl_clientes 
     ON tbl_clientes.id_cliente = tcg.Fk_cliente
 WHERE 
     tcg.`Fk_cliente` = :id
     
     ;
 ";
    }
    try {
        $stmt = Conexion::conectar()->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       
 
        $stmt->execute();
        $resultado = $stmt->fetchAll();  
        $stmt->closeCursor();
        return $resultado;
    } catch (PDOException $e) {
        // Manejo de error
        error_log('Error en consulta mdlSaldoTotalGarant: ' . $e->getMessage());
        return false;
    }
 }
   
   static public function mdlContratoEvent7($id)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT Fk_cliente, num_contrato, fondo, serie 
               FROM tbl_clientes_event
               WHERE Fk_cliente = :id 
                   AND producto = '1' 
                   AND fondo = '1'
                   AND serie = '7' 
                   AND status_mov = '1'
               GROUP BY num_contrato
           ");
   
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlContratoEvent7: ' . $e->getMessage());
           return [];
       }
   }
   
   static public function mdlContratoEvent1($id)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT Fk_cliente, num_contrato, fondo, serie 
               FROM tbl_clientes_event 
               WHERE Fk_cliente = :id 
                   AND producto = '1' 
                   AND fondo = '1' 
                   AND serie = '1' 
                   AND status_mov = '1' 
               GROUP BY num_contrato
           ");
   
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlContratoEvent1: ' . $e->getMessage());
           return [];
       }
   }
   
   static public function mdlSaldoEvent($id, $contrato)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT * 
               FROM tbl_clientes_event 
               WHERE Fk_cliente = :id 
                   AND num_contrato = :contrato 
                   AND tipo_movimiento = '1' 
               ORDER BY fecha_inser DESC 
               LIMIT 1
           ");
   
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->bindParam(':contrato', $contrato, PDO::PARAM_INT);
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlSaldoEvent: ' . $e->getMessage());
           return [];
       }
   }
   
   static public function mdlSaldoEvent1($id, $contrato)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT * 
               FROM tbl_clientes_event 
               WHERE Fk_cliente = :id 
                   AND num_contrato = :contrato 
                   AND tipo_movimiento = '1' 
                   AND fondo = '1' 
                   AND serie = '1' 
               ORDER BY fecha_inser DESC 
               LIMIT 1
           ");
   
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->bindParam(':contrato', $contrato, PDO::PARAM_STR);
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlSaldoEvent1: ' . $e->getMessage());
           return [];
       }
   }
   
   static public function mdlSaldoLq1($id, $contrato)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT * 
               FROM tbl_clientes_lq 
               INNER JOIN (
                   SELECT MAX(fecha_mov) AS fecha 
                   FROM tbl_clientes_lq
               ) f ON f.fecha = tbl_clientes_lq.fecha_mov
               INNER JOIN (
                   SELECT 
                       Fk_cliente, 
                       num_contrato, 
                       fecha_mov AS fecha_inicio, 
                       valor_compra, 
                       MAX(id_mov) AS mov, 
                       producto, 
                       fondo, 
                       serie 
                   FROM tbl_clientes_lq 
                   GROUP BY Fk_cliente, producto, fondo, serie, num_contrato 
                   ORDER BY id_mov DESC
               ) f2 ON f2.Fk_cliente = tbl_clientes_lq.Fk_cliente 
                   AND f2.mov = tbl_clientes_lq.id_mov 
                   AND f2.producto = tbl_clientes_lq.producto 
                   AND f2.fondo = tbl_clientes_lq.fondo 
                   AND f2.serie = tbl_clientes_lq.serie 
                   AND f2.num_contrato = tbl_clientes_lq.num_contrato
               WHERE tbl_clientes_lq.Fk_cliente = :id 
                   AND tbl_clientes_lq.num_contrato = :contrato 
                   AND tipo_movimiento = '1'  
               ORDER BY fecha_mov DESC 
               LIMIT 1
           ");
   
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->bindParam(':contrato', $contrato, PDO::PARAM_STR);
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlSaldoLq1: ' . $e->getMessage());
           return [];
       }
   }
   
   static public function mdlSaldoGarant($id)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT 
                   Fk_cliente, 
                   SUM(monto_inver) AS total_garant, 
                   COUNT(id_garant) AS contratos, 
                   num_contrato_garant, 
                   t_moneda 
               FROM tbl_clientes_garant 
               INNER JOIN (
                   SELECT 
                       *, 
                       MAX(fecha_pago) AS fecha 
                   FROM tbl_detalle_garant 
                   GROUP BY fk_id_garant
               ) garant ON garant.fk_id_garant = tbl_clientes_garant.id_garant
               WHERE tbl_clientes_garant.Fk_cliente = :id 
                   AND t_moneda = 'MXN' 
                   AND status_contrato != '3' 
                   AND status_contrato IN (1)
           ");
   
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlSaldoGarant: ' . $e->getMessage());
           return [];
       }
   }
   
   static public function mdlSaldoGarantUsd($id)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT 
                   Fk_cliente, 
                   SUM(monto_inver) AS total_garant, 
                   COUNT(id_garant) AS contratos, 
                   num_contrato_garant, 
                   t_moneda 
               FROM tbl_clientes_garant 
               INNER JOIN (
                   SELECT 
                       *, 
                       MAX(fecha_pago) AS fecha 
                   FROM tbl_detalle_garant 
                   GROUP BY fk_id_garant
               ) garant ON garant.fk_id_garant = tbl_clientes_garant.id_garant
               WHERE tbl_clientes_garant.Fk_cliente = :id 
                   AND t_moneda = 'USD' 
                   AND status_contrato != '3' 
                   AND status_contrato IN (1)
           ");
   
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlSaldoGarantUsd: ' . $e->getMessage());
           return [];
       }
   }
   
   static public function mdlSaldoLq7($id, $contrato)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT * 
               FROM tbl_clientes_lq 
               INNER JOIN (
                   SELECT MAX(fecha_mov) AS fecha 
                   FROM tbl_clientes_lq
               ) f ON f.fecha = tbl_clientes_lq.fecha_mov
               INNER JOIN (
                   SELECT 
                       Fk_cliente, 
                       num_contrato, 
                       fecha_mov AS fecha_inicio, 
                       valor_compra, 
                       MAX(id_mov) AS mov, 
                       producto, 
                       fondo, 
                       serie 
                   FROM tbl_clientes_lq 
                   GROUP BY Fk_cliente, producto, fondo, serie, num_contrato 
                   ORDER BY id_mov DESC
               ) f2 ON f2.Fk_cliente = tbl_clientes_lq.Fk_cliente 
                   AND f2.mov = tbl_clientes_lq.id_mov 
                   AND f2.producto = tbl_clientes_lq.producto 
                   AND f2.fondo = tbl_clientes_lq.fondo 
                   AND f2.serie = tbl_clientes_lq.serie 
                   AND f2.num_contrato = tbl_clientes_lq.num_contrato
               WHERE tbl_clientes_lq.Fk_cliente = :id 
                   AND tbl_clientes_lq.num_contrato = :contrato 
                   AND tipo_movimiento = '1'  
               ORDER BY fecha_mov DESC 
               LIMIT 1
           ");
   
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->bindParam(':contrato', $contrato, PDO::PARAM_STR);
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlSaldoLq7: ' . $e->getMessage());
           return [];
       }
   }
   static public function mdlSaldoTotalSp() {
   
    
    try {
        $stmt = Conexion::conectar()->prepare("SELECT 
    SUM(CASE WHEN saldos.t_moneda = 'MXN' THEN saldos.saldo_total ELSE 0 END) AS saldo_total_mxn,
    SUM(CASE WHEN saldos.t_moneda = 'USD' THEN saldos.saldo_total ELSE 0 END) AS saldo_total_usd
FROM 
    (SELECT 
        tbl_clientes_sp.Fk_cliente, 
        tbl_clientes_sp.num_contrato, 
        tbl_clientes_sp.saldo_total,
        tbl_clientes_sp.t_moneda
    FROM 
        tbl_clientes_sp
    INNER JOIN 
        rel_empleado_cliente ON tbl_clientes_sp.Fk_cliente = rel_empleado_cliente.fk_cliente
    WHERE 
        tbl_clientes_sp.saldo_total > 0
        AND tbl_clientes_sp.dep_ret = 1
    GROUP BY 
        tbl_clientes_sp.Fk_cliente, 
        tbl_clientes_sp.num_contrato, 
        tbl_clientes_sp.t_moneda
    ) AS saldos
LIMIT 0, 25;");
        $stmt->execute();
        
        // Obtener los resultados de la consulta
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Cerrar el cursor de la consulta
        $stmt->closeCursor();
        
        // Devolver los resultados
        return $resultado;
    } catch (PDOException $e) {
        // Manejo de error
        error_log('Error en consulta total Sp: ' . $e->getMessage());
        return false;
    }
}
static public function mdlGarantMaxFechaPago($id_garant){
    try {
        $stmt = Conexion::conectar()->prepare("SELECT MAX(fecha_pago) AS 'MAX' FROM tbl_detalle_garant WHERE  fk_id_garant = :id_garant ");
 
        $stmt->bindParam(':id_garant', $id_garant, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll();  
        $stmt->closeCursor();
        return $resultado;
    } catch (PDOException $e) {
        // Manejo de error
        error_log('Error en consulta mdlGarantAsesor: ' . $e->getMessage());
        return false;
    }
 }

 static public function mdlMaxFechaTiie($id_tiie){
    try {
        $stmt = Conexion::conectar()->prepare("SELECT MAX(fecha_pago) AS 'MAX' FROM tbl_detalle_tiie WHERE  fk_id_tiie = :id_tiie ");
 
        $stmt->bindParam(':id_tiie', $id_tiie, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll();  
        $stmt->closeCursor();
        return $resultado;
    } catch (PDOException $e) {
        // Manejo de error
        error_log('Error en consulta mdlGarantAsesor: ' . $e->getMessage());
        return false;
    }
 }

   
   static public function mdlContratoLq($id)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT 
                   id_mov, 
                   titulos, 
                   fondo, 
                   serie, 
                   Fk_cliente, 
                   num_contrato
               FROM tbl_clientes_lq 
               WHERE Fk_cliente = :id 
                   AND producto = '3' 
                   AND fondo = '3' 
                   AND serie = '3' 
                   AND status_mov = '1' 
                   AND tipo_movimiento = '1' 
               ORDER BY id_mov DESC 
               LIMIT 1
           ");
   
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlContratoLq: ' . $e->getMessage());
           return [];
       }
   }
   
   static public function mdlContratoLq7($id)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT 
                   id_mov, 
                   titulos, 
                   fondo, 
                   serie, 
                   Fk_cliente, 
                   num_contrato
               FROM tbl_clientes_lq 
               WHERE Fk_cliente = :id 
                   AND producto = '3' 
                   AND fondo = '3' 
                   AND serie = '7' 
                   AND status_mov = '1' 
                   AND tipo_movimiento = '1' 
               ORDER BY id_mov DESC 
               LIMIT 1
           ");
   
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlContratoLq7: ' . $e->getMessage());
           return [];
       }
   }
   
   static public function mdlGarant($id)
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT 
                   Fk_cliente, 
                   num_contrato, 
                   serie 
               FROM tbl_clientes_lq 
               WHERE Fk_cliente = :id 
                   AND producto = '3' 
                   AND status_mov = '1' 
               GROUP BY num_contrato
           ");
   
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlGarant: ' . $e->getMessage());
           return [];
       }
   }
   
   static public function mdlGarantActivo()
   {
       try {
           $stmt = Conexion::conectar()->prepare("
               SELECT 
                   *, 
                   CONCAT(tbl_clientes.nombre_clte, ' ', tbl_clientes.apaterno_clte, ' ', tbl_clientes.amaterno_clte) AS cliente, 
                   CONCAT_WS(' ', nombre_promotor, apaterno_promotor, amaterno_promotor) AS nombre_asesor 
               FROM tbl_clientes_garant 
               INNER JOIN (
                   SELECT 
                       fk_id_garant, 
                       MAX(fecha_pago) AS fecha_fin 
                   FROM tbl_detalle_garant 
                   WHERE status_pago = '0' 
                   GROUP BY fk_id_garant
               ) f1 ON f1.fk_id_garant = tbl_clientes_garant.id_garant
               INNER JOIN tbl_clientes ON tbl_clientes.id_cliente = tbl_clientes_garant.Fk_cliente
               INNER JOIN rel_empleado_cliente ON rel_empleado_cliente.fk_cliente = tbl_clientes.id_cliente
               INNER JOIN tbl_empleados ON tbl_empleados.id_promotor = rel_empleado_cliente.fk_id_empleado
               WHERE status_contrato = 1
                   AND tipo_movimiento = 2
               GROUP BY id_garant
           ");
   
           $stmt->execute();
           
           $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $stmt->closeCursor();
           
           return $resultado;
       } catch (PDOException $e) {
           error_log('Error en mdlGarantActivo: ' . $e->getMessage());
           return [];
       }
   }
   
   static public function mdlGarantUsd($id){
      try {
          $stmt = Conexion::conectar()->prepare("SELECT Fk_cliente,num_contrato,serie 
              FROM tbl_clientes_lq 
              WHERE Fk_cliente=:id and producto='3' and status_mov='1' group by num_contrato");
  
          $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
          $stmt->execute();
          $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $stmt->closeCursor();
          return $resultado;
      } catch (PDOException $e) {
          // Manejo de error
          error_log('Error en consulta mdlGarantUsd: ' . $e->getMessage());
          return false;
      }
  }
  
  static public function mdlTiee($id){
      try {
          $stmt = Conexion::conectar()->prepare("SELECT Fk_cliente,SUM(monto_inver) as total_tiie, count(id_mov_tiie) as contratos, num_contrato_tiie, t_moneda FROM tbl_clientes_tiie 
              inner join ( select *, MAX(fecha_pago) as fecha from tbl_detalle_tiie group by fk_id_tiie ) tiie on tiie.fk_id_tiie = tbl_clientes_tiie.id_mov_tiie
              WHERE tbl_clientes_tiie.Fk_cliente=:id and t_moneda='MXN' and status_contrato !='3' and status_contrato in (1)");
  
          $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
          $stmt->execute();
          $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);  
          $stmt->closeCursor();
          return $resultado;
      } catch (PDOException $e) {
          // Manejo de error
          error_log('Error en consulta mdlTiee: ' . $e->getMessage());
          return false;
      }
  }
  static public function mdlSp($id){
      try {
          $stmt = Conexion::conectar()->prepare("SELECT Fk_cliente, SUM(total_dls) AS saldo_total ,  num_contrato, t_moneda FROM tbl_clientes_sp 
              
              WHERE tbl_clientes_sp.Fk_cliente=:id AND status_liquidacion = 0 ORDER BY `tbl_clientes_sp`.`id_mov` DESC");
  
          $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
          $stmt->execute();
          $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);  
          $stmt->closeCursor();
          return $resultado;
      } catch (PDOException $e) {
          // Manejo de error
          error_log('Error en consulta mdlTiee: ' . $e->getMessage());
          return false;
      }
  }
  static public function mdlBitcoin($id){
      try {
          $stmt = Conexion::conectar()->prepare("SELECT Fk_cliente,  saldo_total ,  num_contrato, t_moneda, monto_btc FROM tbl_clientes_bitcoin
              
              WHERE tbl_clientes_bitcoin.Fk_cliente= :id AND status_liquidacion = 0 ORDER BY `tbl_clientes_bitcoin`.`id_mov_bitcoin` DESC LIMIT 1");
  
          $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
          $stmt->execute();
          $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);  
          $stmt->closeCursor();
          return $resultado;
      } catch (PDOException $e) {
          // Manejo de error
          error_log('Error en consulta mdlTiee: ' . $e->getMessage());
          return false;
      }
  }
  
  static public function mdlEjecucionesEvent($mes, $year){
      try {
          $stmt = Conexion::conectar()->prepare("select id_mov,tbl_clientes_event.Fk_cliente,tbl_clientes_event.Fk_empleado, num_contrato, tbl_clientes_event.fecha_mov, titulos,producto,tipo_movimiento,fecha_inser,fondo,serie,status_mov,fecha_ejecucion,status_ejecusion,fecha_liquidacion,status_liquidacion,CONCAT_WS(' ',nombre_clte,apaterno_clte,amaterno_clte) AS nombre_cliente,mercado.p_mercado as precio_mercado ,tbl_cuentas_cliente.banco, nombre_cta,num_cta,clave_interbanc,tipo_moneda,nom_fondo,nom_serie,tbl_clientes_event.efectivo as ultimo_efect, concepto from tbl_clientes_event 
              inner join tbl_clientes on tbl_clientes.id_cliente = tbl_clientes_event.Fk_cliente
              inner join (
              SELECT id_p_mercado,id,rel_fondo_serie_porc,fk_fondo,fk_serie,porcentaje,fondo.nom_fondo,serie.nom_serie,p_mercado,fecha_aplica,status_precio FROM rel_fondo_serie_porc
              inner join tbl_fondo fondo on fondo.id_fondo = rel_fondo_serie_porc.fk_fondo
              inner join tbl_serie serie on serie.id_serie=rel_fondo_serie_porc.fk_serie
              inner join tbl_precio_mercado on tbl_precio_mercado.rel_fondo_serie_porc = rel_fondo_serie_porc.id
              where status_precio ='1' group by id_p_mercado
              ) mercado on mercado.fk_fondo = tbl_clientes_event.fondo and mercado.fk_serie = tbl_clientes_event.serie
              inner join rel_cuenta_clt_retiro on rel_cuenta_clt_retiro.fk_id_mov_retiro = tbl_clientes_event.id_mov
              inner join tbl_cuentas_cliente on tbl_cuentas_cliente.id_cuenta_cliente = rel_cuenta_clt_retiro.fk_id_cuenta_clte 
              where tipo_movimiento=3 and fecha_ejecucion !='' and status_solicitud='1' and status_ejecusion ='0' and MONTH(fecha_ejecucion) = :mes AND YEAR(fecha_ejecucion) = :year group by id_mov");
  
          $stmt->bindParam(':mes', $mes, PDO::PARAM_INT);  
          $stmt->bindParam(':year', $year, PDO::PARAM_INT);  
          $stmt->execute();
          $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);  
          $stmt->closeCursor();
          return $resultado;
      } catch (PDOException $e) {
          // Manejo de error
          error_log('Error en consulta mdlEjecucionesEvent: ' . $e->getMessage());
          return false;
      }
  }
  
  static public function mdlEjecucionesLq($mes, $year){
      try {
          $stmt = Conexion::conectar()->prepare("select id_mov,tbl_clientes_lq.Fk_cliente, num_contrato, tbl_clientes_lq.fecha_mov, titulos,producto,tipo_movimiento,fecha_inser,fondo,serie,status_mov,fecha_ejecucion,status_ejecusion,CONCAT_WS(' ',nombre_clte,apaterno_clte,amaterno_clte) AS nombre_cliente,precio_mercado ,tbl_cuentas_cliente.banco, nombre_cta,num_cta,clave_interbanc,tipo_moneda,nom_fondo,nom_serie,efec.efectivo as ultimo_efect,saldo_total from tbl_clientes_lq 
              inner join tbl_clientes on tbl_clientes.id_cliente = tbl_clientes_lq.Fk_cliente
              inner join tbl_fondo on tbl_fondo.id_fondo = tbl_clientes_lq.fondo
              inner join tbl_serie on tbl_serie.id_serie = tbl_clientes_lq.serie
              inner join rel_cuenta_clt_retiro on rel_cuenta_clt_retiro.fk_id_mov_retiro = tbl_clientes_lq.id_mov
              inner join tbl_cuentas_cliente on tbl_cuentas_cliente.id_cuenta_cliente = rel_cuenta_clt_retiro.fk_id_cuenta_clte
              inner join 
              ( 
              select fk_cliente, fecha_mov, efectivo from tbl_clientes_lq where tipo_movimiento ='3'
              ) efec on efec.fk_cliente = tbl_clientes_lq.Fk_cliente and efec.fecha_mov = tbl_clientes_lq.fecha_ejecucion
              where tipo_movimiento=3 and fecha_ejecucion !='' and status_ejecusion ='0' and MONTH(fecha_ejecucion) = :mes AND YEAR(fecha_ejecucion) = :year group by id_mov");
  
          $stmt->bindParam(':mes', $mes, PDO::PARAM_INT);  
          $stmt->bindParam(':year', $year, PDO::PARAM_INT);  
          $stmt->execute();
          $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);  
          $stmt->closeCursor();
          return $resultado;
      } catch (PDOException $e) {
          // Manejo de error
          error_log('Error en consulta mdlEjecucionesLq: ' . $e->getMessage());
          return false;
      }
  }
  
  static public function mdlEjecucionesEventAplicadas($mes, $year){
      try {
          $stmt = Conexion::conectar()->prepare("select id_mov,tbl_clientes_event.Fk_cliente, num_contrato, tbl_clientes_event.fecha_mov, titulos,producto,tipo_movimiento,fecha_inser,fondo,serie,status_mov,fecha_ejecucion,status_ejecusion,fecha_liquidacion,status_liquidacion,CONCAT_WS(' ',nombre_clte,apaterno_clte,amaterno_clte) AS nombre_cliente,mercado.p_mercado as precio_mercado ,tbl_cuentas_cliente.banco, nombre_cta,num_cta,clave_interbanc,tipo_moneda,nom_fondo,nom_serie,tbl_clientes_event.efectivo as ultimo_efect, concepto from tbl_clientes_event 
              inner join tbl_clientes on tbl_clientes.id_cliente = tbl_clientes_event.Fk_cliente
              inner join (
              SELECT id_p_mercado,id,rel_fondo_serie_porc,fk_fondo,fk_serie,porcentaje,fondo.nom_fondo,serie.nom_serie,p_mercado,fecha_aplica,status_precio FROM rel_fondo_serie_porc
              inner join tbl_fondo fondo on fondo.id_fondo = rel_fondo_serie_porc.fk_fondo
              inner join tbl_serie serie on serie.id_serie=rel_fondo_serie_porc.fk_serie
              inner join tbl_precio_mercado on tbl_precio_mercado.rel_fondo_serie_porc = rel_fondo_serie_porc.id
              where status_precio ='1' group by id_p_mercado
              ) mercado on mercado.fk_fondo = tbl_clientes_event.fondo and mercado.fk_serie = tbl_clientes_event.serie
              inner join rel_cuenta_clt_retiro on rel_cuenta_clt_retiro.fk_id_mov_retiro = tbl_clientes_event.id_mov
              inner join tbl_cuentas_cliente on tbl_cuentas_cliente.id_cuenta_cliente = rel_cuenta_clt_retiro.fk_id_cuenta_clte 
              where tipo_movimiento=3 and fecha_ejecucion !='' and status_ejecusion ='1' group by id_mov");
  
          $stmt->bindParam(':mes', $mes, PDO::PARAM_INT);  
          $stmt->bindParam(':year', $year, PDO::PARAM_INT);  
          $stmt->execute();
          $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);  
          $stmt->closeCursor();
          return $resultado;
      } catch (PDOException $e) {
          // Manejo de error
          error_log('Error en consulta mdlEjecucionesEventAplicadas: ' . $e->getMessage());
          return false;
      }
  }
  
  static public function mdlEjecucionesLqAplicadas($mes, $year){
      try {
          $stmt = Conexion::conectar()->prepare("select id_mov,tbl_clientes_lq.Fk_cliente, num_contrato, tbl_clientes_lq.fecha_mov, titulos,producto,tipo_movimiento,fecha_inser,fondo,serie,status_mov,fecha_ejecucion,status_ejecusion,CONCAT_WS(' ',nombre_clte,apaterno_clte,amaterno_clte) AS nombre_cliente,precio_mercado ,tbl_cuentas_cliente.banco, nombre_cta,num_cta,clave_interbanc,tipo_moneda,nom_fondo,nom_serie,efectivo,saldo_total,concepto from tbl_clientes_lq 
              inner join tbl_clientes on tbl_clientes.id_cliente = tbl_clientes_lq.Fk_cliente 
              inner join tbl_fondo on tbl_fondo.id_fondo = tbl_clientes_lq.fondo 
              inner join tbl_serie on tbl_serie.id_serie = tbl_clientes_lq.serie 
              left join rel_cuenta_clt_retiro on rel_cuenta_clt_retiro.fk_id_mov_retiro = tbl_clientes_lq.id_mov 
              left join tbl_cuentas_cliente on tbl_cuentas_cliente.id_cuenta_cliente = rel_cuenta_clt_retiro.fk_id_cuenta_clte 
              where tipo_movimiento = '3' and fecha_ejecucion !='' and status_ejecusion ='1' group by id_mov");
  
          $stmt->bindParam(':mes', $mes, PDO::PARAM_INT);  
          $stmt->bindParam(':year', $year, PDO::PARAM_INT);  
          $stmt->execute();
          $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);  
          $stmt->closeCursor();
          return $resultado;
      } catch (PDOException $e) {
          // Manejo de error
          error_log('Error en consulta mdlEjecucionesLqAplicadas: ' . $e->getMessage());
          return false;
      }
  }
  
  static public function mdlDepositosLq($mes, $year){
   try {
       $stmt = Conexion::conectar()->prepare("select id_mov,tbl_clientes_lq.Fk_cliente, num_contrato, tbl_clientes_lq.fecha_mov, titulos,producto,tipo_movimiento,fecha_inser,fondo,serie,status_mov,fecha_ejecucion,status_ejecusion,CONCAT_WS(' ',nombre_clte,apaterno_clte,amaterno_clte) AS nombre_cliente,precio_mercado ,tbl_cuentas_cliente.banco, nombre_cta,num_cta,clave_interbanc,tipo_moneda,nom_fondo,nom_serie,efectivo,saldo_total, concepto from tbl_clientes_lq 
       inner join tbl_clientes on tbl_clientes.id_cliente = tbl_clientes_lq.Fk_cliente 
       inner join tbl_fondo on tbl_fondo.id_fondo = tbl_clientes_lq.fondo 
       inner join tbl_serie on tbl_serie.id_serie = tbl_clientes_lq.serie 
       left join rel_cuenta_clt_retiro on rel_cuenta_clt_retiro.fk_id_mov_retiro = tbl_clientes_lq.id_mov 
       left join tbl_cuentas_cliente on tbl_cuentas_cliente.id_cuenta_cliente = rel_cuenta_clt_retiro.fk_id_cuenta_clte 
       where tipo_movimiento = '2' group by id_mov");

       $stmt->execute();
       $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);  
       $stmt->closeCursor();
       return $resultado;
   } catch (PDOException $e) {
       // Manejo de error
       error_log('Error en consulta mdlDepositosLq: ' . $e->getMessage());
       return false;
   }
}

static public function mdlSaldoTotalEvent(){
   try {
       $stmt = Conexion::conectar()->prepare("SELECT 
           SUM(titulos * (precio_mercado + efectivo)) AS saldo_total_sumado
       FROM 
           tbl_clientes_event e
       WHERE
           status_mov = 1
           AND fecha_mov IN (SELECT MAX(fecha_mov) FROM tbl_clientes_event)");

       $stmt->execute();
       $resultado = $stmt->fetch();  
       $stmt->closeCursor();
       return $resultado;
   } catch (PDOException $e) {
       // Manejo de error
       error_log('Error en consulta mdlSaldoTotalEvent: ' . $e->getMessage());
       return false;
   }
}

static public function mdlSaldoTotalStable(){
   try {
       $stmt = Conexion::conectar()->prepare("SELECT 
           SUM(titulos * (precio_mercado)) + efectivo AS saldo_total_sumado
       FROM 
           tbl_clientes_stable e
       WHERE
           status_mov = 1
           AND fecha_mov IN (SELECT MAX(fecha_mov) FROM tbl_clientes_stable)");

       $stmt->execute();
       $resultado = $stmt->fetch();  
       $stmt->closeCursor();
       return $resultado;
   } catch (PDOException $e) {
       // Manejo de error
       error_log('Error en consulta mdlSaldoTotalStable: ' . $e->getMessage());
       return false;
   }
}

static public function mdlSaldoTotalTiie(){
   try {
       $stmt = Conexion::conectar()->prepare("SELECT 
           SUM(monto_inver) AS saldo_total_sumado
       FROM 
           tbl_clientes_tiie
       WHERE
           status_contrato = 1");

       $stmt->execute();
       $resultado = $stmt->fetch();  
       $stmt->closeCursor();
       return $resultado;
   } catch (PDOException $e) {
       // Manejo de error
       error_log('Error en consulta mdlSaldoTotalTiie: ' . $e->getMessage());
       return false;
   }
}

static public function mdlSaldoTotalLq(){
   try {
       $stmt = Conexion::conectar()->prepare("SELECT 
           SUM(titulos * (precio_mercado + efectivo)) AS saldo_total_sumado
       FROM 
           tbl_clientes_lq e
       WHERE
           status_mov = 1
           AND fecha_mov IN (SELECT MAX(fecha_mov) FROM tbl_clientes_lq)");

       $stmt->execute();
       $resultado = $stmt->fetch();  
       $stmt->closeCursor();
       return $resultado;
   } catch (PDOException $e) {
       // Manejo de error
       error_log('Error en consulta mdlSaldoTotalLq: ' . $e->getMessage());
       return false;
   }
}

static public function mdlGarantAsesor($id){
   try {
       $stmt = Conexion::conectar()->prepare("SELECT *,
           `fk_empleado`, 
           CONCAT_WS(' ', nombre_promotor, apaterno_promotor, amaterno_promotor) AS nombre_promotor,
           `t_moneda`,
           SUM(`monto_inver`) AS `tot`
       FROM 
           `tbl_clientes_garant`
       INNER JOIN 
           tbl_empleados ON tbl_clientes_garant.fk_empleado = tbl_empleados.id_promotor
       WHERE 
           fk_empleado = :id");

       $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $stmt->execute();
       $resultado = $stmt->fetchAll();  
       $stmt->closeCursor();
       return $resultado;
   } catch (PDOException $e) {
       // Manejo de error
       error_log('Error en consulta mdlGarantAsesor: ' . $e->getMessage());
       return false;
   }
}

static public function mdlSaldoTotalGarant(){
   try {
       $stmt = Conexion::conectar()->prepare("SELECT 
           SUM(monto_inver) AS saldo_total_sumado
       FROM 
           tbl_clientes_garant
       WHERE
           status_contrato = 1");

       $stmt->execute();
       $resultado = $stmt->fetch();  
       $stmt->closeCursor();
       return $resultado;
   } catch (PDOException $e) {
       // Manejo de error
       error_log('Error en consulta mdlSaldoTotalGarant: ' . $e->getMessage());
       return false;
   }
}
static public function mdlSaldoSp($id,$contrato){
   try {
       $stmt = Conexion::conectar()->prepare("SELECT 
          `saldo_total`
       FROM 
           tbl_clientes_sp
       WHERE
           
          Fk_cliente = :id 
           AND   num_contrato = :contrato ORDER BY `tbl_clientes_sp`.`id_mov` DESC LIMIT 1");


       $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $stmt->bindParam(':contrato', $contrato, PDO::PARAM_INT);
      
       $stmt->execute();
       $resultado = $stmt->fetch();  
       $stmt->closeCursor();
       return $resultado;
   } catch (PDOException $e) {
       // Manejo de error
       error_log('Error en consulta mdlSaldoTotalGarant: ' . $e->getMessage());
       return false;
   }
}
static public function mdlSaldoBitcoin($id,$contrato,$tipo_moneda){
   try {
       $stmt = Conexion::conectar()->prepare("SELECT 
          `saldo_total`
       FROM 
           tbl_clientes_bitcoin
       WHERE
           
          Fk_cliente = :id 
           AND   num_contrato = :contrato  AND t_moneda = :tipo_moneda ORDER BY `tbl_clientes_bitcoin`.`id_mov_bitcoin` DESC LIMIT 1");


       $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $stmt->bindParam(':contrato', $contrato, PDO::PARAM_INT);
       $stmt->bindParam(':tipo_moneda', $tipo_moneda, PDO::PARAM_INT);
      
       $stmt->execute();
       $resultado = $stmt->fetch();  
       $stmt->closeCursor();
       return $resultado;
   } catch (PDOException $e) {
       // Manejo de error
       error_log('Error en consulta mdlSaldoTotalGarant: ' . $e->getMessage());
       return false;
   }
}

public static function mdlInfoIdMovBtc($id_mov) {
    try {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar la consulta SQL para obtener el máximo contrato
        $stmt = $conn->prepare("SELECT * FROM  tbl_clientes_bitcoin WHERE  id_mov_bitcoin = :id_mov ");

        $stmt->bindParam(':id_mov', $id_mov, PDO::PARAM_INT);
      

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Obtener el resultado
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

              return $resultado;
          
        } else {
            // Enviar una respuesta de error si la consulta falla
            echo json_encode(array('error' => 'Error al ejecutar la consulta.'));
        }

    } catch (Exception $e) {
        // Enviar la excepción en caso de un error
        echo json_encode(array('error' => 'Excepción: ' . $e->getMessage()));
    }
}


static public function mdlHistoricoClienteEvent($id,$producto){
    if ($producto == 'event') {
     $query = "SELECT 
     *,
     CONCAT(tbl_clientes.nombre_clte, ' ', tbl_clientes.apaterno_clte, ' ', tbl_clientes.amaterno_clte) AS nombre_clte
 FROM 
     `tbl_clientes_event`
 INNER JOIN 
     tbl_clientes 
     ON tbl_clientes.id_cliente = tbl_clientes_event.Fk_cliente
 WHERE 
     `Fk_cliente` =  $id;
 ";
    }
    elseif ($producto == 'lq') {
     $query = "SELECT 
     *,
     CONCAT(tbl_clientes.nombre_clte, ' ', tbl_clientes.apaterno_clte, ' ', tbl_clientes.amaterno_clte) AS nombre_clte
 FROM 
     `tbl_clientes_lq`
 INNER JOIN 
     tbl_clientes 
     ON tbl_clientes.id_cliente = tbl_clientes_lq.Fk_cliente
 WHERE 
     `Fk_cliente` =  $id
     
     ;
 ";
    }
    try {
        $stmt = Conexion::conectar()->prepare($query);
 
        $stmt->execute();
        $resultado = $stmt->fetchAll();  
        $stmt->closeCursor();
        return $resultado;
    } catch (PDOException $e) {
        // Manejo de error
        error_log('Error en consulta mdlSaldoTotalGarant: ' . $e->getMessage());
        return false;
    }
 }


}

