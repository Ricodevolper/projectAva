<?php
class ModeloPmercado {

    static public function mdlPmercado()
    {

        
        try{
            $stmt = Conexion::conectar()->prepare("SELECT id_p_mercado,id,rel_fondo_serie_porc,status_rel,fk_fondo,fk_serie,porcentaje,fee,fondo.nom_fondo,serie.nom_serie,p_mercado,fecha_aplica,status_precio FROM rel_fondo_serie_porc 
               inner join tbl_fondo fondo on fondo.id_fondo = rel_fondo_serie_porc.fk_fondo 
              inner join tbl_serie serie on serie.id_serie=rel_fondo_serie_porc.fk_serie 
               inner join tbl_precio_mercado on tbl_precio_mercado.rel_fondo_serie_porc = rel_fondo_serie_porc.id 
                where status_precio ='1' and status_rel='1' and fk_fondo = '8' group by id_p_mercado");
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
    static public function mdlHmercado()
    {
        try{
            $stmt = Conexion::conectar()->prepare("SELECT id_p_mercado,id,rel_fondo_serie_porc,status_rel,fk_fondo,fk_serie,porcentaje,fee,fondo.nom_fondo,serie.nom_serie,p_mercado,fecha_aplica,status_precio FROM rel_fondo_serie_porc 
               inner join tbl_fondo fondo on fondo.id_fondo = rel_fondo_serie_porc.fk_fondo 
              inner join tbl_serie serie on serie.id_serie=rel_fondo_serie_porc.fk_serie 
               inner join tbl_precio_mercado on tbl_precio_mercado.rel_fondo_serie_porc = rel_fondo_serie_porc.id 
                where  status_rel='1' group by id_p_mercado  ORDER BY `tbl_precio_mercado`.`fecha_aplica` DESC");
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
    static public function mdlTcinfo()
    {
        try{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM tbl_cambio_banxico");
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

    public static function mdlActualizarPmercado($fecha_actualizar,$rel_fondo_serie_porc, $p_mercado) {
        try {
          
            $stmt = Conexion::conectar()->prepare("INSERT INTO tbl_precio_mercado (fecha_aplica, rel_fondo_serie_porc, p_mercado, status_precio) VALUES (:fecha_aplica, :rel_fondo_serie_porc, :p_mercado_actual, '1');");
            
            // Bindear los parámetros con los valores correspondientes
            $stmt->bindParam(":fecha_aplica", $fecha_actualizar, PDO::PARAM_STR);
            $stmt->bindParam(":rel_fondo_serie_porc", $rel_fondo_serie_porc, PDO::PARAM_STR);
            $stmt->bindParam(":p_mercado_actual", $p_mercado, PDO::PARAM_STR);
            
            // Ejecutar la consulta
            $stmt->execute();
        
            // Cerrar el cursor
            $stmt->closeCursor();
            
        } catch (Exception $e) {
            // Registrar el error y retornar false
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlStatusPmercado0($fecha_actualizar) {
        try {
          
            $stmt = Conexion::conectar()->prepare("UPDATE tbl_precio_mercado
                    SET status_precio = 0
                    WHERE fecha_aplica <> :fecha_aplica
                    AND rel_fondo_serie_porc > 58 ;");
            
            // Bindear los parámetros con los valores correspondientes
            $stmt->bindParam(":fecha_aplica", $fecha_actualizar, PDO::PARAM_STR);
           
            
            // Ejecutar la consulta
            $stmt->execute();
        
            // Cerrar el cursor
            $stmt->closeCursor();
            return 'ok';
        } catch (Exception $e) {
            // Registrar el error y retornar false
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlTasasCetes() {
        try {
          
            $stmt = Conexion::conectar()->prepare("SELECT * FROM `tbl_tasas_cetes` ");
            
            // Bindear los parámetros con los valores correspondientes
            
            // Ejecutar la consulta
           if ($stmt->execute()) {
            $resultados = $stmt->fetchAll();
            return $resultados;
           }else {
            $resultados = 'error';
           }
        
            // Cerrar el cursor
            $stmt->closeCursor();
            
        } catch (Exception $e) {
            // Registrar el error y retornar false
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlTasasCetesFecha($fecha_pago, $serie) {
        try {
          
            $stmt = Conexion::conectar()->prepare("SELECT * FROM tbl_tasas_cetes
                WHERE `Fecha` <= :fecha_pago
                AND `SF43936_CETES28` IS NOT NULL
                ORDER BY `tbl_tasas_cetes`.`Fecha` DESC LIMIT 1;");
                     $stmt->bindParam(":fecha_pago", $fecha_pago, PDO::PARAM_STR);
          
            // Bindear los parámetros con los valores correspondientes
            
            // Ejecutar la consulta
           if ($stmt->execute()) {
            $resultados = $stmt->fetchAll();
            return $resultados;
           }else {
            $resultados = 'error';
           }
        
            // Cerrar el cursor
            $stmt->closeCursor();
            
        } catch (Exception $e) {
            // Registrar el error y retornar false
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlTasasCetesFechaNumPago1($fk_id_tiie) {
        try {
          
            $stmt = Conexion::conectar()->prepare("SELECT `fecha_cetes` AS 'fecha_pago'  FROM tbl_clientes_tiie
                WHERE `id_mov_tiie` = :fk_id_tiie");
                     $stmt->bindParam(":fk_id_tiie", $fk_id_tiie, PDO::PARAM_STR);
          
            // Bindear los parámetros con los valores correspondientes
            
            // Ejecutar la consulta
           if ($stmt->execute()) {
            $resultados = $stmt->fetch();
            return $resultados;
           }else {
            $resultados = 'error';
           }
        
            // Cerrar el cursor
            $stmt->closeCursor();
            
        } catch (Exception $e) {
            // Registrar el error y retornar false
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlTasasTiieFechaNumPago1($fk_id_tiie) {
        try {
          
            $stmt = Conexion::conectar()->prepare("SELECT `fecha_cetes` AS 'fecha_pago'  FROM tbl_clientes_tiie
                WHERE `id_mov_tiie` = :fk_id_tiie");
                     $stmt->bindParam(":fk_id_tiie", $fk_id_tiie, PDO::PARAM_STR);
          
            // Bindear los parámetros con los valores correspondientes
            
            // Ejecutar la consulta
           if ($stmt->execute()) {
            $resultados = $stmt->fetch();
            return $resultados;
           }else {
            $resultados = 'error';
           }
        
            // Cerrar el cursor
            $stmt->closeCursor();
            
        } catch (Exception $e) {
            // Registrar el error y retornar false
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlTasasCetesFechaNumPago($id_detalle_tiie) {
        try {
          
            $stmt = Conexion::conectar()->prepare("SELECT  fecha_pago  FROM tbl_detalle_tiie
                WHERE `id_detalle_tiie` = :id_detalle_tiie
                 ");
                     $stmt->bindParam(":id_detalle_tiie", $id_detalle_tiie, PDO::PARAM_STR);
                     
            // Bindear los parámetros con los valores correspondientes
            
            // Ejecutar la consulta
           if ($stmt->execute()) {
            $resultados = $stmt->fetch();
            return $resultados;
           }else {
            $resultados = 'error';
           }
        
            // Cerrar el cursor
            $stmt->closeCursor();
            
        } catch (Exception $e) {
            // Registrar el error y retornar false
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlTipoCambio($fecha_pago) {
        try {
          
            $stmt = Conexion::conectar()->prepare("SELECT precio, fecha FROM tbl_cambio_banxico
                WHERE `Fecha` <= :fecha_pago
                AND `precio` IS NOT NULL
                ORDER BY `Fecha` DESC 
                LIMIT 1;");
                     $stmt->bindParam(":fecha_pago", $fecha_pago, PDO::PARAM_STR);
          
            // Bindear los parámetros con los valores correspondientes
            
            // Ejecutar la consulta
           if ($stmt->execute()) {
            $resultados = $stmt->fetchAll();
            return $resultados;
           }else {
            $resultados = 'error';
           }
        
            // Cerrar el cursor
            $stmt->closeCursor();
            
        } catch (Exception $e) {
            // Registrar el error y retornar false
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlTasasTiie() {
        try {
          
            $stmt = Conexion::conectar()->prepare("SELECT * FROM `tbl_tasas_tiie`ORDER BY `tbl_tasas_tiie`.`Fecha` ASC");
            
            // Bindear los parámetros con los valores correspondientes
            
            // Ejecutar la consulta
           if ($stmt->execute()) {
            $resultados = $stmt->fetchAll();
          
            return $resultados;
           }else {
            $resultados = 'error';
           }
        
            // Cerrar el cursor
            $stmt->closeCursor();
            
        } catch (Exception $e) {
            // Registrar el error y retornar false
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlTasasTiieFecha($fecha_pago) {
        try {
          
          
            $stmt = Conexion::conectar()->prepare("SELECT * 
                FROM `tbl_tasas_tiie` 
                WHERE `Fecha` <= :fecha_pago
                ORDER BY `Fecha` DESC 
                LIMIT 1;");
              $stmt->bindParam(":fecha_pago", $fecha_pago, PDO::PARAM_STR);
              // Bindear los parámetros con los valores correspondientes
            
            // Ejecutar la consulta
           if ($stmt->execute()) {
            $resultados = $stmt->fetch();
          
            return $resultados;
           }else {
            $resultados = 'error';
           }
        
            // Cerrar el cursor
            $stmt->closeCursor();
            
        } catch (Exception $e) {
            // Registrar el error y retornar false
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlMaxFechaTiie() {
        try {
          
            $stmt = Conexion::conectar()->prepare("SELECT MAX(`Fecha`) AS 'fecha' FROM `tbl_tasas_tiie`");
            
            // Bindear los parámetros con los valores correspondientes
            
            // Ejecutar la consulta
           if ($stmt->execute()) {
            $resultados = $stmt->fetchAll();
            $resultado =  $resultados[0]['fecha'];
            return $resultado;
           }else {
           return $resultados = 'error';
           }
        
            // Cerrar el cursor
            $stmt->closeCursor();
            
        } catch (Exception $e) {
            // Registrar el error y retornar false
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlMaxFechaCetes() {
        try {
          
            $stmt = Conexion::conectar()->prepare("SELECT MAX(`Fecha`) AS 'fecha' FROM `tbl_tasas_cetes`");
            
           
            if ($stmt->execute()) {
                $resultados = $stmt->fetchAll();
    
                $resultado = $resultados[0]['fecha'];
                return $resultado;
               }else {
                $resultados = 'error';
               }
        
            // Cerrar el cursor
            $stmt->closeCursor();
            
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public static function mdlActualizarTasasTiie($fechaMax, $fechaActual) {
        try {
            // Definir las series de TIIE
            $tiie28 = 'SF43783';
            $tiie91 = 'SF43878';
            $tiie182 = 'SF111916';
            $token = 'a14ef39527884fb354f2f9c6dae886784ead0a6769b1c57838557f09393e7e06';
    
            // Convertimos las fechas a objetos DateTime para poder iterar entre ellas
            $fechaInicio = new DateTime($fechaMax);
            $fechaInicio->modify('+1 day');
            $fechaFin = new DateTime($fechaActual);
    
            // Iteramos desde la fecha máxima hasta la fecha actual
            while ($fechaInicio <= $fechaFin) {
                $fechaFormateada = $fechaInicio->format('Y-m-d');
                
                // Peticiones a la API de Banxico para cada serie
                $series = [$tiie28, $tiie91, $tiie182];
                $data = [];
    
                foreach ($series as $serie) {
                    $url = "https://www.banxico.org.mx/SieAPIRest/service/v1/series/$serie/datos/$fechaFormateada/$fechaFormateada?token=$token";
                    
                    $response = file_get_contents($url);
                    $result = json_decode($response, true);
    
                    if ($result !== null && isset($result['bmx']['series'][0]['datos'][0]['dato'])) {
                        $data[$serie] = $result['bmx']['series'][0]['datos'][0]['dato'];
                    } else {
                        $data[$serie] = null;  // Manejar el caso en que no haya datos
                    }
                }
    
                // Insertar los datos en la base de datos
                $stmt = Conexion::conectar()->prepare("INSERT INTO `tbl_tasas_tiie` (`Fecha`, `SF43783_TIIE28`, `SF43878_TIIE91`, `SF111916_TIIE182`) VALUES (:fecha, :sf43783, :sf43878, :sf111916)");
    
                $stmt->bindParam(':fecha', $fechaFormateada, PDO::PARAM_STR);
                $stmt->bindParam(':sf43783', $data[$tiie28], PDO::PARAM_STR);
                $stmt->bindParam(':sf43878', $data[$tiie91], PDO::PARAM_STR);
                $stmt->bindParam(':sf111916', $data[$tiie182], PDO::PARAM_STR);
    
                if (!$stmt->execute()) {
                    error_log("Error al insertar datos para la fecha $fechaFormateada");
                }
    
                $stmt->closeCursor();
    
                // Avanzar un día
                $fechaInicio->modify('+1 day');
            }
    
            return true;
    
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
    
    
    public static function mdlActualizarTasasCetes($fechaMax, $fechaActual) {
        try {
            // Definir las series de CETES
            $cetes28 = 'SF43936';
            $cetes91 = 'SF43939';
            $cetes182 = 'SF43942';
            $token = 'a14ef39527884fb354f2f9c6dae886784ead0a6769b1c57838557f09393e7e06';
    
            // Convertimos las fechas a objetos DateTime para poder iterar entre ellas
            $fechaInicio = new DateTime($fechaMax);
            $fechaInicio->modify('+1 day');
            
            $fechaFin = new DateTime($fechaActual);
    
            // Iteramos desde la fecha máxima hasta la fecha actual
            while ($fechaInicio <= $fechaFin) {
                $fechaFormateada = $fechaInicio->format('Y-m-d');
                
                // Peticiones a la API de Banxico para cada serie
                $series = [$cetes28, $cetes91, $cetes182];
                $data = [];
    
                foreach ($series as $serie) {
                    $url = "https://www.banxico.org.mx/SieAPIRest/service/v1/series/$serie/datos/$fechaFormateada/$fechaFormateada?token=$token";
                    
                    $response = file_get_contents($url);
                    $result = json_decode($response, true);
    
                    if ($result !== null && isset($result['bmx']['series'][0]['datos'][0]['dato'])) {
                        $data[$serie] = $result['bmx']['series'][0]['datos'][0]['dato'];
                        print_r($data);
                    } else {
                        $data[$serie] = null;  // Manejar el caso en que no haya datos
                    }
                }
    
                // Insertar los datos en la base de datos
                $stmt = Conexion::conectar()->prepare("INSERT INTO `tbl_tasas_cetes` (`Fecha`, `SF43936_CETES28`, `SF43939_CETES91`, `SF43942_CETES182`) VALUES (:fecha, :sf43936, :sf43939, :sf43942)");
    
                $stmt->bindParam(':fecha', $fechaFormateada, PDO::PARAM_STR);
                $stmt->bindParam(':sf43936', $data[$cetes28], PDO::PARAM_STR);
                $stmt->bindParam(':sf43939', $data[$cetes91], PDO::PARAM_STR);
                $stmt->bindParam(':sf43942', $data[$cetes182], PDO::PARAM_STR);
    
                if (!$stmt->execute()) {
                    error_log("Error al insertar datos para la fecha $fechaFormateada");
                }
    
                $stmt->closeCursor();
    
                // Avanzar un día
                $fechaInicio->modify('+1 day');
            }
    
            return true;
    
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
    
    

    static public function mdlActualizarinversionSp()
    {
        try{
            $stmt = Conexion::conectar()->prepare("INSERT INTO tbl_clientes_sp (
    Fk_cliente, num_contrato, Fk_empleado, fecha_mov, valor_inicial, valor_compra, titulos, 
    precio_mercado, efectivo, total_dls, producto, precio_compra, saldo_total, tipo_movimiento, 
    fondo, serie, status_mov, saldo_mx, tc_compra, saldo_usd, comision_dls, banco, t_moneda
)
SELECT 
    c.Fk_cliente, 
    c.num_contrato, 
    c.Fk_empleado, 
    p.fecha_aplica AS fecha_mov, 
    c.valor_inicial, 
    c.valor_compra, 
    c.titulos, 
    p.p_mercado AS precio_mercado, 
    c.efectivo, 
    c.total_dls, 
    c.producto, 
    c.precio_compra, 
    c.titulos * p.p_mercado AS saldo_total, 
    1 AS tipo_movimiento, 
    c.fondo, 
    c.serie, 
    c.status_mov, 
    c.saldo_mx, 
    c.tc_compra, 
    c.saldo_usd, 
    c.comision_dls, 
    c.banco, 
    c.t_moneda
FROM 
    (
        SELECT 
            c1.*
        FROM 
            tbl_clientes_sp c1
        JOIN (
            SELECT 
                Fk_cliente, fondo, serie, MAX(id_mov) AS max_id_mov
            FROM 
                tbl_clientes_sp
            WHERE 
                titulos <> 0
            GROUP BY 
                Fk_cliente, fondo, serie) m ON c1.Fk_cliente = m.Fk_cliente AND c1.fondo = m.fondo AND c1.serie = m.serie AND c1.id_mov = m.max_id_mov
    ) c
JOIN rel_fondo_serie_porc r ON c.fondo = r.fk_fondo AND c.serie = r.fk_serie
JOIN tbl_precio_mercado p ON r.id = p.rel_fondo_serie_porc
WHERE 
    p.status_precio = 1;");

           if ($stmt->execute()) {
            $respuesta = 'ok';
           }else {
            $respuesta = 'error';
           }
           
        return $respuesta;
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
        
            // Devolver los resultados
           
        } catch (PDOException $e) {
            // Registro del error
            error_log("Error en mdlGarantIngreso: " . $e->getMessage());
    
            // Devolver un valor de error o lanzar una excepción personalizada
            return array('error' => 'Ocurrió un error al consultar la base de datos.');
        }
    }
    static public function mdlActualizarinversionEvent()
    {
        try{
            $stmt = Conexion::conectar()->prepare("INSERT INTO tbl_clientes_event (
    Fk_cliente, num_contrato, Fk_empleado, fecha_mov, valor_inicial, valor_compra, titulos, 
    precio_mercado, efectivo, total_dls, producto, precio_compra, saldo_total, tipo_movimiento, 
    fondo, serie, status_mov, saldo_mx, tc_compra, saldo_usd, comision_dls, banco
)
SELECT 
    c.Fk_cliente, 
    c.num_contrato, 
    c.Fk_empleado, 
    p.fecha_aplica AS fecha_mov, 
    c.valor_inicial, 
    c.valor_compra, 
    c.titulos, 
    p.p_mercado AS precio_mercado, 
    c.efectivo, 
    c.total_dls, 
    c.producto, 
    c.precio_compra, 
    c.titulos * p.p_mercado AS saldo_total, 
    1 AS tipo_movimiento, 
    c.fondo, 
    c.serie, 
    c.status_mov, 
    c.saldo_mx, 
    c.tc_compra, 
    c.saldo_usd, 
    c.comision_dls, 
    c.banco
FROM 
    (
        SELECT 
            c1.*
        FROM 
            tbl_clientes_event c1
        JOIN (
            SELECT 
                Fk_cliente, fondo, serie, MAX(id_mov) AS max_id_mov
            FROM 
                tbl_clientes_event
            WHERE 
                titulos <> 0
            GROUP BY 
                Fk_cliente, fondo, serie) m ON c1.Fk_cliente = m.Fk_cliente AND c1.fondo = m.fondo AND c1.serie = m.serie AND c1.id_mov = m.max_id_mov
    ) c
JOIN rel_fondo_serie_porc r ON c.fondo = r.fk_fondo AND c.serie = r.fk_serie
JOIN tbl_precio_mercado p ON r.id = p.rel_fondo_serie_porc
WHERE 
    p.status_precio = 1;");

           if ($stmt->execute()) {
            $respuesta = 'ok';
           }else {
            $respuesta = 'error';
           }
           
        return $respuesta;
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
        
            // Devolver los resultados
           
        } catch (PDOException $e) {
            // Registro del error
            error_log("Error en mdlGarantIngreso: " . $e->getMessage());
    
            // Devolver un valor de error o lanzar una excepción personalizada
            return array('error' => 'Ocurrió un error al consultar la base de datos.');
        }
    }
    static public function mdlInsertarPmercadoSp500($fecha,$precioActual,$porcentaje)
    {
        try{
            $stmt = Conexion::conectar()->prepare("INSERT INTO `tbl_precio_sp` (`fecha_precio`, `precio`, `cambioPorc`)
             VALUES ( :fecha, :precioActual, :porcentaje);");
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":precioActual", $precioActual, PDO::PARAM_STR);
            $stmt->bindParam(":porcentaje", $porcentaje, PDO::PARAM_STR);
          
           if ($stmt->execute()) {
             $mensaje = 'ok';
           }else {
            $mensaje = 'error';
           }
           
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
        
            // Devolver los resultados
            return $mensaje;
        } catch (PDOException $e) {
            // Registro del error
            error_log("Error en mdlGarantIngreso: " . $e->getMessage());
    
            // Devolver un valor de error o lanzar una excepción personalizada
            return array('error' => 'Ocurrió un error al consultar la base de datos.');
        }
    }
    
    static public function mdlPmercado500()
    {
        try{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM tbl_precio_sp");
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
    static public function mdlfechasActivasSp($fecha)
    {
        try{
            $stmt = Conexion::conectar()->prepare("SELECT COUNT(fecha_precio) AS 'fecha_precio' FROM tbl_precio_sp WHERE fecha_precio = :fecha");
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
          
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
     static public function mdlPrecioAnteriorSp500($fecha)
    {


                    // Convertir la fecha a un objeto DateTime
            $fechaObj = new DateTime($fecha);

            // Restarle un día
            $fechaObj->modify('-1 day');

            // Convertir de nuevo a string en formato yyyy-mm-dd
            $fechaMenosUnDia = $fechaObj->format('Y-m-d');
        try{
            $stmt = Conexion::conectar()->prepare("SELECT precio  FROM tbl_precio_sp WHERE fecha_precio = :fecha");
            $stmt->bindParam(":fecha", $fechaMenosUnDia, PDO::PARAM_STR);
          
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
}