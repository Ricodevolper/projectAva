<?php
require_once 'conexion.php';

class ModeloDepositos
{

    static public function mdlValidacionSp($id_cliente, $fondo, $serie, $status)

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT 
    rel_empleado_cliente.*,
    CONCAT(tbl_empleados.nombre_promotor, ' ', tbl_empleados.apaterno_promotor, ' ', tbl_empleados.amaterno_promotor) AS nombre_completo,
    tbl_clientes_sp.titulos,
    tbl_clientes_sp.saldo_total
    
FROM 
    rel_empleado_cliente
INNER JOIN 
    tbl_empleados ON rel_empleado_cliente.fk_id_empleado = tbl_empleados.id_promotor
LEFT JOIN 
    (SELECT Fk_cliente, titulos, saldo_total 
     FROM tbl_clientes_sp 
     WHERE Fk_cliente = :id_cliente  AND serie = :serie1
     ORDER BY id_mov DESC 
     LIMIT 1) AS tbl_clientes_sp 
     ON rel_empleado_cliente.fk_cliente = tbl_clientes_sp.Fk_cliente
WHERE 
    rel_empleado_cliente.fk_cliente = :id_cliente1
    AND rel_empleado_cliente.fk_fondo = :fondo
    AND rel_empleado_cliente.fk_serie = :serie
    AND rel_empleado_cliente.status_rel = :status_rel
    ORDER BY id_rel_emp_prom DESC;");
            $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":id_cliente1", $id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":fondo", $fondo, PDO::PARAM_STR);
            $stmt->bindParam(":serie", $serie, PDO::PARAM_STR);
            $stmt->bindParam(":serie1", $serie, PDO::PARAM_STR);
            $stmt->bindParam(":status_rel", $status, PDO::PARAM_STR);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    static public function mdlValidacionBitcoinUsd($id_cliente, $fondo, $status)

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT 
                    rel_empleado_cliente.*,
                    CONCAT(tbl_empleados.nombre_promotor, ' ', tbl_empleados.apaterno_promotor, ' ', tbl_empleados.amaterno_promotor) AS nombre_completo,
                    tbl_empleados.id_promotor
                  
                FROM 
                    rel_empleado_cliente
                INNER JOIN 
                    tbl_empleados ON rel_empleado_cliente.fk_id_empleado = tbl_empleados.id_promotor
                LEFT JOIN 
                    (SELECT Fk_cliente, monto_inver 
                    FROM tbl_clientes_bitcoin 
                    WHERE Fk_cliente = :id_cliente  
                    AND t_moneda = 'USD'  
                    ORDER BY id_mov_bitcoin DESC 
                    LIMIT 1) AS tbl_clientes_bitcoin 
                    ON rel_empleado_cliente.fk_cliente = tbl_clientes_bitcoin.Fk_cliente
                WHERE 
                    rel_empleado_cliente.fk_cliente = :id_cliente1
                    AND rel_empleado_cliente.fk_fondo = :fondo
                   
                    AND rel_empleado_cliente.status_rel = :status_rel;");
            $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":id_cliente1", $id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":fondo", $fondo, PDO::PARAM_STR);

            $stmt->bindParam(":status_rel", $status, PDO::PARAM_STR);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    static public function mdlValidacionBitcoin($id_cliente, $fondo, $status)

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT 
                    rel_empleado_cliente.*,
                    CONCAT(tbl_empleados.nombre_promotor, ' ', tbl_empleados.apaterno_promotor, ' ', tbl_empleados.amaterno_promotor) AS nombre_completo,
                    tbl_empleados.id_promotor
                  
                FROM 
                    rel_empleado_cliente
                INNER JOIN 
                    tbl_empleados ON rel_empleado_cliente.fk_id_empleado = tbl_empleados.id_promotor
                LEFT JOIN 
                    (SELECT Fk_cliente, monto_inver 
                    FROM tbl_clientes_bitcoin 
                    WHERE Fk_cliente = :id_cliente  
                    AND t_moneda = 'MXN'  
                    ORDER BY id_mov_bitcoin DESC 
                    LIMIT 1) AS tbl_clientes_bitcoin 
                    ON rel_empleado_cliente.fk_cliente = tbl_clientes_bitcoin.Fk_cliente
                WHERE 
                    rel_empleado_cliente.fk_cliente = :id_cliente1
                    AND rel_empleado_cliente.fk_fondo = :fondo
                   
                    AND rel_empleado_cliente.status_rel = :status_rel;");
            $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":id_cliente1", $id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":fondo", $fondo, PDO::PARAM_STR);

            $stmt->bindParam(":status_rel", $status, PDO::PARAM_STR);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    static public function mdlprecioMercadoActualBitcoinMxn($fecha_pago)

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT precio AS p_mercado FROM bitcoin_historico WHERE fecha = :fecha ");
            $stmt->bindParam(":fecha", $fecha_pago, PDO::PARAM_STR);
         
             $stmt->execute();

            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

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
    static public function mdlprecioMercadoActualBitcoinUsd($fecha_pago)

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT precio AS p_mercado FROM bitcoin_historico_usd WHERE fecha = :fecha");
            $stmt->bindParam(":fecha", $fecha_pago, PDO::PARAM_STR);
         
             $stmt->execute();

            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

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
    static public function mdlValidacionEvent($id_cliente, $fondo, $status)

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT 
                    rel_empleado_cliente.*,
                    CONCAT(tbl_empleados.nombre_promotor, ' ', tbl_empleados.apaterno_promotor, ' ', tbl_empleados.amaterno_promotor) AS nombre_completo,
                    tbl_empleados.id_promotor,
                    tbl_clientes_event.titulos
                FROM 
                    rel_empleado_cliente
                INNER JOIN 
                    tbl_empleados ON rel_empleado_cliente.fk_id_empleado = tbl_empleados.id_promotor
                LEFT JOIN 
                    (SELECT Fk_cliente, titulos 
                    FROM tbl_clientes_event 
                    WHERE Fk_cliente = :id_cliente  
                    ORDER BY id_mov DESC 
                    LIMIT 1) AS tbl_clientes_event 
                    ON rel_empleado_cliente.fk_cliente = tbl_clientes_event.Fk_cliente
                WHERE 
                    rel_empleado_cliente.fk_cliente = :id_cliente1
                    AND rel_empleado_cliente.fk_fondo = :fondo
                   
                    AND rel_empleado_cliente.status_rel = :status_rel;");
            $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":id_cliente1", $id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":fondo", $fondo, PDO::PARAM_STR);

            $stmt->bindParam(":status_rel", $status, PDO::PARAM_STR);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    static public function mdlSerieSp()

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT rel_fondo_serie_porc.*, tbl_serie.nom_serie 
                                        FROM rel_fondo_serie_porc 
                                        INNER JOIN tbl_serie ON rel_fondo_serie_porc.fk_serie = tbl_serie.id_serie
                                        WHERE rel_fondo_serie_porc.fk_fondo = 8 AND rel_fondo_serie_porc.status_rel = 1;");

            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();

            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Registro del error
            error_log("Error en mdlSerieSp: " . $e->getMessage());

            // Devolver un valor de error o lanzar una excepción personalizada
            return array('error' => 'Ocurrió un error al consultar la base de datos.');
        }
    }
    static public function mdlSerieBitcoin()

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT rel_fondo_serie_porc.*, tbl_serie.nom_serie 
                                        FROM rel_fondo_serie_porc 
                                        INNER JOIN tbl_serie ON rel_fondo_serie_porc.fk_serie = tbl_serie.id_serie
                                        WHERE rel_fondo_serie_porc.fk_fondo = 9 AND rel_fondo_serie_porc.status_rel = 1;");

            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();

            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Registro del error
            error_log("Error en mdlSerieSp: " . $e->getMessage());

            // Devolver un valor de error o lanzar una excepción personalizada
            return array('error' => 'Ocurrió un error al consultar la base de datos.');
        }
    }
    static public function mdlSerieEvent()

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT rel_fondo_serie_porc.*, tbl_serie.nom_serie 
                                        FROM rel_fondo_serie_porc 
                                        INNER JOIN tbl_serie ON rel_fondo_serie_porc.fk_serie = tbl_serie.id_serie
                                        WHERE rel_fondo_serie_porc.fk_fondo = 1 AND rel_fondo_serie_porc.status_rel = 1;");

            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();

            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Registro del error
            error_log("Error en mdlSerieSp: " . $e->getMessage());

            // Devolver un valor de error o lanzar una excepción personalizada
            return array('error' => 'Ocurrió un error al consultar la base de datos.');
        }
    }
    static public function mdlFondos()

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM `tbl_fondo`;");

            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();

            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Registro del error
            error_log("Error en mdlSerieSp: " . $e->getMessage());

            // Devolver un valor de error o lanzar una excepción personalizada
            return array('error' => 'Ocurrió un error al consultar la base de datos.');
        }
    }
    static public function mdlBancos($id_cliente)

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM rel_cuentas_contables_clientes 
        INNER JOIN tbl_cuentas_cliente ON tbl_cuentas_cliente.id_cuenta_cliente = rel_cuentas_contables_clientes.fk_cuenta WHERE rel_cuentas_contables_clientes.fk_cliente = :id_cliente ");
            $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_STR);

            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();

            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Registro del error
            error_log("Error en mdlSerieSp: " . $e->getMessage());

            // Devolver un valor de error o lanzar una excepción personalizada
            return array('error' => 'Ocurrió un error al consultar la base de datos.');
        }
    }
    static public function mdlSaldoAnteriorEvent($id_cliente, $serie, $fondo, $contrato)

    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT id_mov, titulos, precio_mercado, tc_compra, efectivo, saldo_mx, saldo_usd FROM `tbl_clientes_event` WHERE `Fk_cliente` = :id_cliente AND `num_contrato` = :num_contrato AND `fondo` = :fondo AND `serie` = :serie ORDER BY `tbl_clientes_event`.`id_mov` DESC LIMIT 1 ");
            $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":serie", $serie, PDO::PARAM_STR);
            $stmt->bindParam(":fondo", $fondo, PDO::PARAM_STR);
            $stmt->bindParam(":num_contrato", $contrato, PDO::PARAM_STR);

            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();

            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Registro del error
            error_log("Error en mdlSerieSp: " . $e->getMessage());

            // Devolver un valor de error o lanzar una excepción personalizada
            return array('error' => 'Ocurrió un error al consultar la base de datos.');
        }
    }
    static public function mdlDespositoEvent(
        $id_cliente,
        $contrato,
        $empleado,
        $fecha_mov,
        $valor_inicial,
        $valor_actual,
        $titulos,
        $precio_mercado,
        $efectivo,
        $saldo_usd,
        $precio_mercado_anterior,
        $saldo_total,
        $fondo,
        $serie,
        $saldo_mx,
        $tc_compra,
        $comision_dls,
        $banco,
        $cant_deposito
    ) {

        $cantDeposito = $valor_inicial - $valor_actual;
        try {
            $stmt = Conexion::conectar()->prepare(
                "INSERT INTO tbl_clientes_event 
            (`Fk_cliente`, `num_contrato`, `Fk_empleado`, `fecha_mov`, `valor_inicial`, `valor_compra`, 
            `titulos`, `precio_mercado`, `efectivo`, `total_dls`, `producto`, `precio_compra`, `saldo_total`, 
            `tipo_movimiento`, `fondo`, `serie`, `status_mov`, `saldo_mx`, `tc_compra`, `saldo_usd`, 
            `comision_dls`, `banco`, `depret`, `cant_depret`)  
            VALUES
            (:Fk_cliente, :num_contrato, :Fk_empleado, :fecha_mov, :valor_inicial, :valor_compra, 
            :titulos, :precio_mercado, :efectivo, :total_dls, '1', :precio_compra, :saldo_total, '1', 
            :fondo, :serie, '1', :saldo_mx, :tc_compra, :saldo_usd, :comision_dls, :banco, '1', :can_depret)"
            );

            // Asignación de parámetros
            $stmt->bindParam(":Fk_cliente", $id_cliente, PDO::PARAM_STR);
            $stmt->bindParam(":num_contrato", $contrato, PDO::PARAM_STR);
            $stmt->bindParam(":Fk_empleado", $empleado, PDO::PARAM_STR);
            $stmt->bindParam(":fecha_mov", $fecha_mov, PDO::PARAM_STR);
            $stmt->bindParam(":valor_inicial", $valor_inicial, PDO::PARAM_STR);
            $stmt->bindParam(":valor_compra", $valor_actual, PDO::PARAM_STR);
            $stmt->bindParam(":titulos", $titulos, PDO::PARAM_STR);
            $stmt->bindParam(":precio_mercado", $precio_mercado, PDO::PARAM_STR);
            $stmt->bindParam(":efectivo", $efectivo, PDO::PARAM_STR);
            $stmt->bindParam(":total_dls", $saldo_usd, PDO::PARAM_STR);
            $stmt->bindParam(":precio_compra", $precio_mercado_anterior, PDO::PARAM_STR);
            $stmt->bindParam(":saldo_total", $saldo_total, PDO::PARAM_STR);
            $stmt->bindParam(":fondo", $fondo, PDO::PARAM_STR);
            $stmt->bindParam(":serie", $serie, PDO::PARAM_STR);
            $stmt->bindParam(":saldo_mx", $saldo_mx, PDO::PARAM_STR);
            $stmt->bindParam(":tc_compra", $tc_compra, PDO::PARAM_STR);
            $stmt->bindParam(":saldo_usd", $saldo_usd, PDO::PARAM_STR);  // Asignado correctamente
            $stmt->bindParam(":comision_dls", $comision_dls, PDO::PARAM_STR);  // Asignado correctamente
            $stmt->bindParam(":banco", $banco, PDO::PARAM_STR);  // Asignado correctamente
            $stmt->bindParam(":can_depret", $cant_deposito, PDO::PARAM_STR);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (Exception $e) {
            // Manejo de errores
            return 'Excepción: ' . $e->getMessage();
        } finally {
            // Verificar si $stmt fue inicializado antes de intentar cerrar el cursor
            if (isset($stmt)) {
                $stmt->closeCursor();
            }
        }
    }




    static public function mdlinsertTipoCambioDeposito($ultimo_idmovInsert, $saldo_mx, $tipo_cambio, $total_dls, $porcentaje_comision, $saldo_comision, $id_cliente)

    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO tbl_monto_t_cambio_clte (fk_mov,monto, t_cambio,monto_usd,porcentaje,monto_comision_porc, fk_cliente,  fecha_aplicacion)
         VALUES (:ultimo_idmovInsert,:saldo_mx, :tipo_cambio,:total_dls, :porcentaje_comision ,:saldo_comision , :id_cliente,'" . date('Y-m-d H:i:s') . "')");
            $stmt->bindParam(":ultimo_idmovInsert", $ultimo_idmovInsert, PDO::PARAM_STR);
            $stmt->bindParam(":saldo_mx", $saldo_mx, PDO::PARAM_STR);
            $stmt->bindParam(":tipo_cambio", $tipo_cambio, PDO::PARAM_STR);
            $stmt->bindParam(":total_dls", $total_dls, PDO::PARAM_STR);
            $stmt->bindParam(":porcentaje_comision", $porcentaje_comision, PDO::PARAM_STR);
            $stmt->bindParam(":saldo_comision", $saldo_comision, PDO::PARAM_STR);
            $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_STR);


            // Ejecutar la consulta
            if ($stmt->execute()) {
                $response = '
       Tipo de Cambio Insertado';
            } else {
                $response = 'Error al ejecutar la consulta.';
            }

            // Cerrar la conexión
            $stmt->closeCursor();
        } catch (Exception $e) {
            // Manejo de errores
            $response = 'Excepción: ' . $e->getMessage();
        }

        // Devolver la respuesta en texto plano
        echo $response;
    }
    static public function mdlInsertRegistroBanco($ultimo_idmovInsert, $idBanco)

    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO rel_cuenta_clt_retiro (fk_id_mov_retiro,fk_id_cuenta_clte)"
                . "VALUES (:ultimo_idmovInsert,:id_banco)");
            $stmt->bindParam(":ultimo_idmovInsert", $ultimo_idmovInsert, PDO::PARAM_STR);
            $stmt->bindParam(":id_banco", $idBanco, PDO::PARAM_STR);






            // Ejecutar la consulta
            if ($stmt->execute()) {
                $response = '
       Registro Banco Insertado ';
            } else {
                $response = 'Error al ejecutar la registro Banco.';
            }

            // Cerrar la conexión
            $stmt->closeCursor();
        } catch (Exception $e) {
            // Manejo de errores
            $response = 'Excepción: ' . $e->getMessage();
        }

        // Devolver la respuesta en texto plano
        echo $response;
    }


    static public function mdlInsertDepositoBitcoin(
        $fk_cliente,
        $fondo,
        $numero_contrato,
        $fk_empleado,
        $fec_liquidacion,
        $saldo_actual,
        $clave_interbanc,
        $fecha_mov_bitcoin,
        $monto_inversion,
        $asesor,
        $tipo_moneda,
        $titularCuenta,
        $precioActual,
        $idBanco,
        $cantidad_btc,
        $montoComision,
        $montoCompra
    ) {


        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();

            $stmt = $conn->prepare("
        INSERT INTO `tbl_clientes_bitcoin` 
        (
            `Fk_cliente`, `num_contrato`, `monto_inver`, `precio_compra`, `t_moneda`, 
            `monto_btc`, `fecha_liquidacion`, `status_liquidacion`, `dep_ret`, 
            `fecha_mov`, `fk_empleado`, `monto_comison`, `monto_compra`, 
            `saldo_total`, `id_banco`
        ) 
        VALUES 
        (
            :fk_cliente, :numeroContrato, :montoInversion, :precioActual, :tipo_moneda, 
            :cantidad_btc, :fecha_liquidacion, '0', '1', 
            :fecha_mov, :asesor, :montoComision, :monto_compra, 
            :saldo_total, :idBanco
        )
    ");

            // Vincular los parámetros
            $stmt->bindParam(':fk_cliente', $fk_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':numeroContrato', $numero_contrato, PDO::PARAM_STR);
            $stmt->bindParam(':montoInversion', $monto_inversion, PDO::PARAM_STR);
            $stmt->bindParam(':precioActual', $precioActual, PDO::PARAM_STR);
            $stmt->bindParam(':tipo_moneda', $tipo_moneda, PDO::PARAM_STR);
            $stmt->bindParam(':cantidad_btc', $cantidad_btc, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_liquidacion', $fec_liquidacion, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_mov', $fecha_mov_bitcoin, PDO::PARAM_STR);
            $stmt->bindParam(':asesor', $asesor, PDO::PARAM_INT);
            $stmt->bindParam(':montoComision', $montoComision, PDO::PARAM_STR);
            $stmt->bindParam(':monto_compra', $montoCompra, PDO::PARAM_STR);
            $stmt->bindParam(':saldo_total', $saldo_actual, PDO::PARAM_STR);
            $stmt->bindParam(':idBanco', $idBanco, PDO::PARAM_INT);
            // Ejecutar la consulta
            if ($stmt->execute()) {
                $response = '
            <script>Swal.fire({
                title: "Depósito Realizado",
                text: "Datos insertados correctamente.",
                icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "clientes"; 
                }
            });</script>
            ';
            } else {
                $response = 'Error al ejecutar la consulta.';
            }

            // Cerrar la conexión
            $conn = null;
        } catch (Exception $e) {
            // Manejo de errores con más detalle
            $response = 'Excepción: ' . $e->getMessage();
        }

        // Devolver la respuesta
        echo $response;
    }
    static public function mdlInsertDepositoSp(
        $fk_cliente,
        $fondo,
        $numero_contrato,
        $fk_empleado,
        $fec_liquidacion,
        $saldo_actual,
        $clave_interbanc,
        $fecha_mov_sp,
        $monto_inversion,
        $asesor,
        $tipo_moneda,
        $titularCuenta,
        $precioActual,
        $idBanco
    ) {

        $precioActual = str_replace(['$', ','], '', $precioActual);
        $saldo_actual = str_replace(['$', ','], '', $saldo_actual);
        $monto_inversion = str_replace(['$', ','], '', $monto_inversion);

        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();

            // Preparar la consulta SQL
            $stmt = $conn->prepare("INSERT INTO `tbl_clientes_sp` (
                `Fk_cliente`, `num_contrato`, `Fk_empleado`, `fecha_mov`, 
                `valor_inicial`, `valor_compra`, `precio_mercado`, `total_dls`, 
                `precio_compra`, `saldo_total`, `tipo_movimiento`, 
                `fondo`, `status_mov`,`fecha_liquidacion`, `saldo_mx`, 
                 `banco`, `t_moneda`, `dep_ret`
            ) VALUES (
                :fk_cliente, :numeroContrato, :fk_empleado, :fecha_mov, 
                :montoInversion, :precioActual, :precioActual1, :total_dls, 
                 :precioActual2, :saldo_total, '2', 
                :fondo, '1', :fecha_liquidacion, :saldo_mx,
              :idBanco, :tipoMoneda, '1'
            );
        ");

            // Vincular los parámetros
            $stmt->bindParam(':fk_cliente', $fk_cliente);
            $stmt->bindParam(':numeroContrato', $numero_contrato);
            $stmt->bindParam(':fk_empleado', $fk_empleado);
            $stmt->bindParam(':fecha_mov', $fecha_mov_sp);
            $stmt->bindParam(':montoInversion', $monto_inversion);
            $stmt->bindParam(':precioActual', $precioActual);
            $stmt->bindParam(':precioActual1', $precioActual);
            $stmt->bindParam(':total_dls', $monto_inversion); // Ajuste según la lógica de tu aplicación
            $stmt->bindParam(':precioActual2', $precioActual);

            $stmt->bindParam(':saldo_total', $saldo_actual);
            $stmt->bindParam(':fondo', $fondo);
            $stmt->bindParam(':fecha_liquidacion', $fec_liquidacion);
            $stmt->bindParam(':saldo_mx', $saldo_actual);
            $stmt->bindParam(':idBanco', $idBanco);
            $stmt->bindParam(':tipoMoneda', $tipo_moneda);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                $response = '
            <script>Swal.fire({
                title: "Depósito Realizado",
                text: "Datos insertados correctamente.",
                icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "clientes"; 
                }
            });</script>
            ';
            } else {
                $response = 'Error al ejecutar la consulta.';
            }

            // Cerrar la conexión
            $conn = null;
        } catch (Exception $e) {
            // Manejo de errores con más detalle
            $response = 'Excepción: ' . $e->getMessage();
        }

        // Devolver la respuesta
        echo $response;
    }
    static public function mdlNumeroContrato($id_cliente)
    {

        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();

            // Preparar la consulta SQL
            $stmt = $conn->prepare(
                "SELECT num_contrato AS contrato
            FROM tbl_clientes_event 
            WHERE Fk_cliente = :fk_cliente

            UNION

            SELECT num_contrato_garant AS contrato
            FROM tbl_clientes_garant 
            WHERE Fk_cliente = :fk_cliente1

            UNION

            SELECT num_contrato_tiie AS contrato
            FROM tbl_clientes_tiie 
            WHERE Fk_cliente = :fk_cliente2

            UNION

            SELECT num_contrato AS contrato
            FROM tbl_clientes_sp 
            WHERE Fk_cliente = :fk_cliente3

            UNION

            SELECT num_contrato AS contrato
            FROM tbl_clientes_lq 
            WHERE Fk_cliente = :fk_cliente4"
            );

            // Vincular el parámetro
            $stmt->bindParam(':fk_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':fk_cliente1', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':fk_cliente2', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':fk_cliente3', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':fk_cliente4', $id_cliente, PDO::PARAM_INT);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Validar si hay resultados
                if ($resultados) {
                    return $resultados;
                } else {
                    return 'No se encontraron contratos para el cliente especificado.';
                }
            } else {
                return 'Error al ejecutar la consulta.';
            }
        } catch (Exception $e) {
            // Manejo de errores con más detalle
            return 'Excepción: ' . $e->getMessage();
        }
    }


    static public function mdlGerentesPatrimoniales()
    {
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();

            // Preparar la consulta SQL
            $stmt = $conn->prepare(
                "SELECT CONCAT(nombre_promotor, ' ', apaterno_promotor, ' ', amaterno_promotor) AS nombre_completo, id_promotor
            FROM tbl_empleados
            WHERE estatus_promotor = 1
            AND fk_puesto = 6
            ORDER BY nombre_promotor ASC
            LIMIT 20"
            );

            // Vincular el parámetro


            // Ejecutar la consulta
            if ($stmt->execute()) {
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Validar si hay resultados
                if ($resultados) {
                    return $resultados;
                } else {
                    return 'No se encontraron contratos para el cliente especificado.';
                }
            } else {
                return 'Error al ejecutar la consulta.';
            }
        } catch (Exception $e) {
            // Manejo de errores con más detalle
            return 'Excepción: ' . $e->getMessage();
        }
    }
    static public function mdlAsesoresPatrimoniales()
    {
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();

            // Preparar la consulta SQL
            $stmt = $conn->prepare(
                "SELECT *, CONCAT(nombre_promotor, ' ', apaterno_promotor, ' ', amaterno_promotor) AS nombre_completo
FROM tbl_empleados
WHERE estatus_promotor = 1
  AND fk_puesto IN (6, 7)
ORDER BY nombre_promotor ASC
LIMIT 20;
"
            );

            // Vincular el parámetro


            // Ejecutar la consulta
            if ($stmt->execute()) {
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Validar si hay resultados
                if ($resultados) {
                    return $resultados;
                } else {
                    return 'No se encontraron contratos para el cliente especificado.';
                }
            } else {
                return 'Error al ejecutar la consulta.';
            }
        } catch (Exception $e) {
            // Manejo de errores con más detalle
            return 'Excepción: ' . $e->getMessage();
        }
    }
    static public function mdlInsertContrato($id_cliente, $gerente, $asesor, $fondo, $serie, $numeroContrato)
    {

        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();

            // Preparar la consulta SQL
            $stmt = $conn->prepare(
                "INSERT INTO `rel_empleado_cliente` (`fk_gte_patrimonial`, `fk_id_empleado`, `fk_cliente`, `status_rel`,  `fk_producto`, `fk_fondo`, `fk_serie`, `num_contrato`, `fecha_reasignacion`) 
            VALUES ( :gerente, :asesor, :id_cliente, '1',  '1', :fondo, :serie, :num_contrato, NULL);"
            );

            // Vincular el parámetro
            $stmt->bindParam(':gerente', $gerente, PDO::PARAM_INT);
            $stmt->bindParam(':asesor', $asesor, PDO::PARAM_INT);
            $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':fondo', $fondo, PDO::PARAM_INT);
            $stmt->bindParam(':serie', $serie, PDO::PARAM_INT);
            $stmt->bindParam(':num_contrato', $numeroContrato, PDO::PARAM_INT);

            // Ejecutar la consulta
            if ($stmt->execute()) {



                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Contrato Guardado',
                            text: 'El contrato ha sido guardado exitosamente.'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'clientes'; // Redirigir a clientes
                            }
                        });
                      </script>";
            } else {
                echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Contrato No Guardado',
                text: 'No se encontraron contratos para el cliente especificado.'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'clientes'; // Redirigir a clientes
                }
            });
          </script>";
                return 'Error al ejecutar la consulta.';
            }
        } catch (Exception $e) {
            // Manejo de errores con más detalle
            return 'Excepción: ' . $e->getMessage();
        }
    }
    static public function mdlContratoActivoSp($contrato, $fk_cliente)
    {

        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();

            // Preparar la consulta SQL
            $stmt = $conn->prepare(
                "SELECT COUNT(*) AS contrato, `fecha_mov` AS fecha FROM tbl_clientes_sp WHERE num_contrato = :contrato AND Fk_cliente = :fk_cliente"
            );

            // Vincular el parámetro
            $stmt->bindParam(':contrato', $contrato, PDO::PARAM_INT);
            $stmt->bindParam(':fk_cliente', $fk_cliente, PDO::PARAM_INT);

            // Ejecutar la consulta
            $stmt->execute();
            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultados;

            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();

            // Devolver los resultados




        } catch (Exception $e) {
            // Manejo de errores con más detalle
            return 'Excepción: ' . $e->getMessage();
        }
    }
    static public function mdlIdMovMaxBtc($contrato, $fk_cliente)
    {
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Preparar la consulta SQL
            $stmt = $conn->prepare(
                "SELECT 
                    CASE 
                        WHEN EXISTS (
                            SELECT 1
                            FROM tbl_detalle_bitcoin
                            WHERE fk_id_mov_btc = (
                                SELECT MAX(id_mov_bitcoin)
                                FROM tbl_clientes_bitcoin
                                WHERE num_contrato = :contrato1
                                AND Fk_cliente = :fk_cliente1
                            )
                        ) THEN 0
                        ELSE (
                            SELECT MAX(id_mov_bitcoin)
                            FROM tbl_clientes_bitcoin
                            WHERE num_contrato = :contrato2
                            AND Fk_cliente = :fk_cliente2
                        )
                    END AS resultado;"
            );
    
            // Vincular los parámetros con tipos adecuados
            $stmt->bindParam(':contrato1', $contrato, PDO::PARAM_INT);
            $stmt->bindParam(':fk_cliente1', $fk_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':contrato2', $contrato, PDO::PARAM_INT);
            $stmt->bindParam(':fk_cliente2', $fk_cliente, PDO::PARAM_INT);
    
            // Ejecutar la consulta
            $stmt->execute();
    
            // Obtener los resultados
            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Validar resultados
            if ($resultados === false) {
                return "No se encontraron resultados.";
            }
    
            // Retornar el valor del resultado
            return $resultados['resultado'];
    
        } catch (Exception $e) {
            // Manejo detallado de errores
            return 'Excepción: ' . $e->getMessage();
        }
    }
    static public function insertDetalleBtc($id_mov, $fecha_pago, $num_detalle) {
        
    
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Insertar los datos en la base de datos
            $stmt = $conn->prepare("INSERT INTO `tbl_detalle_bitcoin` ( `num_detalle`,   `fk_id_mov_btc`,  `fecha_pago`) 
            VALUES ( :num_detalle, :id_mov, :fecha_pago );");
    
            // Vincular parámetros
            $stmt->bindParam(':num_detalle', $num_detalle);
            $stmt->bindParam(':id_mov', $id_mov);
            $stmt->bindParam(':fecha_pago', $fecha_pago);
            
    
            // Ejecutar la consulta
            if ($stmt->execute()) {
                $response = 'Datos insertados correctamente.';
            } else {
                $response = 'Error al ejecutar la consulta.';
            }
    
            // Cerrar la conexión
            $conn = null;
    
        } catch (Exception $e) {
            // Manejo de errores
            $response = 'Excepción: ' . $e->getMessage();
        }
    
        // Devolver la respuesta en texto plano
        echo $response;
    }  
    
    static public function mdlContratoActivoBitcoin($contrato, $fk_cliente, $tipo_moneda)
    {

        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();

            // Preparar la consulta SQL
            $stmt = $conn->prepare(
                "SELECT COUNT(*) AS contrato, `fecha_mov` AS fecha FROM tbl_clientes_bitcoin WHERE num_contrato = :contrato AND Fk_cliente = :fk_cliente AND t_moneda = :tipo_moneda"
            );

            // Vincular el parámetro
            $stmt->bindParam(':contrato', $contrato, PDO::PARAM_INT);
            $stmt->bindParam(':fk_cliente', $fk_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':tipo_moneda', $tipo_moneda, PDO::PARAM_INT);

            // Ejecutar la consulta
            $stmt->execute();
            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultados;

            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();

            // Devolver los resultados




        } catch (Exception $e) {
            // Manejo de errores con más detalle
            return 'Excepción: ' . $e->getMessage();
        }
    }
    static public function mdlRendimientoSpResumido($id_cliente, $contrato)
    {

        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();

            // Preparar la consulta SQL
            $stmt = $conn->prepare(
                "SELECT 
    c.Fk_cliente, 
    c.saldo_total,
    c.precio_compra,
    COALESCE(p.precio, 
             (SELECT p2.precio 
              FROM tbl_precio_sp p2 
              WHERE p2.fecha_precio < cal.fecha_calendario 
              ORDER BY p2.fecha_precio DESC LIMIT 1)) AS precio_actual,  -- Usar el último precio conocido si no hay precio para la fecha
    cal.fecha_calendario AS fecha_rendimiento,
    DATEDIFF(cal.fecha_calendario, c.fecha_mov) + 1 AS dias_diferencia,  -- Contar días naturales desde la fecha de movimiento empezando desde 0
    ((COALESCE(p.precio, 
              (SELECT p2.precio 
               FROM tbl_precio_sp p2 
               WHERE p2.fecha_precio < cal.fecha_calendario 
               ORDER BY p2.fecha_precio DESC LIMIT 1)) - c.precio_compra) / c.precio_compra) AS cambioPorc,
    -- Columna con la diferencia porcentual antes de dividir entre los días
    ((COALESCE(p.precio, 
              (SELECT p2.precio 
               FROM tbl_precio_sp p2 
               WHERE p2.fecha_precio < cal.fecha_calendario 
               ORDER BY p2.fecha_precio DESC LIMIT 1)) - c.precio_compra) / c.precio_compra) AS diferenciaPorcentaje, 
    (((COALESCE(p.precio, 
               (SELECT p2.precio 
                FROM tbl_precio_sp p2 
                WHERE p2.fecha_precio < cal.fecha_calendario 
                ORDER BY p2.fecha_precio DESC LIMIT 1)) - c.precio_compra) / c.precio_compra) / 365) * DATEDIFF(cal.fecha_calendario, c.fecha_mov) AS rendimiento_diario,
    c.saldo_total + (c.saldo_total * (((COALESCE(p.precio, 
                                               (SELECT p2.precio 
                                                FROM tbl_precio_sp p2 
                                                WHERE p2.fecha_precio < cal.fecha_calendario 
                                                ORDER BY p2.fecha_precio DESC LIMIT 1)) - c.precio_compra) / c.precio_compra) / 365) * DATEDIFF(cal.fecha_calendario, c.fecha_mov)) AS nuevo_saldo
FROM 
    tbl_clientes_sp c
INNER JOIN 
    tbl_calendar cal ON cal.fecha_calendario >= c.fecha_mov  -- Asegura que traiga todos los días naturales desde la fecha de movimiento
LEFT JOIN 
    tbl_precio_sp p ON p.fecha_precio = cal.fecha_calendario  -- Traer el precio solo cuando exista para esa fecha
WHERE 
    c.Fk_cliente = :id  
    AND c.num_contrato = :contrato
    AND cal.fecha_calendario <= (SELECT MAX(fecha_precio) FROM tbl_precio_sp)  -- Limitar hasta la última fecha de precio disponible
ORDER BY 
    cal.fecha_calendario DESC lIMIT 1"
            );

            // Vincular el parámetro
            $stmt->bindParam(':id', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':contrato', $contrato, PDO::PARAM_INT);


            // Ejecutar la consulta
            $stmt->execute();
            $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultados;

            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();

            // Devolver los resultados




        } catch (Exception $e) {
            // Manejo de errores con más detalle
            return 'Excepción: ' . $e->getMessage();
        }
    }
    static public function mdlRendimientoSp($id, $cuenta, $fecha_mov)
    {

        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();

            // Preparar la consulta SQL
            $stmt = $conn->prepare(
                "SELECT 
    c.Fk_cliente, 
    c.saldo_total,
    c.precio_compra,
    c.total_dls,
    COALESCE(p.precio, 
             (SELECT p2.precio 
              FROM tbl_precio_sp p2 
              WHERE p2.fecha_precio < cal.fecha_calendario 
              ORDER BY p2.fecha_precio DESC LIMIT 1)) AS precio_actual,  -- Usar el último precio conocido si no hay precio para la fecha
    cal.fecha_calendario AS fecha_rendimiento,
    DATEDIFF(cal.fecha_calendario, c.fecha_mov) + 1 AS dias_diferencia,  -- Contar días naturales desde la fecha de movimiento empezando desde 0
    ((COALESCE(p.precio, 
              (SELECT p2.precio 
               FROM tbl_precio_sp p2 
               WHERE p2.fecha_precio < cal.fecha_calendario 
               ORDER BY p2.fecha_precio DESC LIMIT 1)) - c.precio_compra) / c.precio_compra) AS cambioPorc,
    -- Columna con la diferencia porcentual antes de dividir entre los días
    ((COALESCE(p.precio, 
              (SELECT p2.precio 
               FROM tbl_precio_sp p2 
               WHERE p2.fecha_precio < cal.fecha_calendario 
               ORDER BY p2.fecha_precio DESC LIMIT 1)) - c.precio_compra) / c.precio_compra) AS diferenciaPorcentaje, 
    (((COALESCE(p.precio, 
               (SELECT p2.precio 
                FROM tbl_precio_sp p2 
                WHERE p2.fecha_precio < cal.fecha_calendario 
                ORDER BY p2.fecha_precio DESC LIMIT 1)) - c.precio_compra) / c.precio_compra) / 365) * DATEDIFF(cal.fecha_calendario, c.fecha_mov) AS rendimiento_diario,
    c.total_dls + (c.total_dls * (((COALESCE(p.precio, 
                                               (SELECT p2.precio 
                                                FROM tbl_precio_sp p2 
                                                WHERE p2.fecha_precio < cal.fecha_calendario 
                                                ORDER BY p2.fecha_precio DESC LIMIT 1)) - c.precio_compra) / c.precio_compra) / 365) * DATEDIFF(cal.fecha_calendario, c.fecha_mov)) AS nuevo_saldo
FROM 
    tbl_clientes_sp c
INNER JOIN 
    tbl_calendar cal ON cal.fecha_calendario >= c.fecha_mov  -- Asegura que traiga todos los días naturales desde la fecha de movimiento
LEFT JOIN 
    tbl_precio_sp p ON p.fecha_precio = cal.fecha_calendario  -- Traer el precio solo cuando exista para esa fecha
WHERE 
    c.Fk_cliente = :id
    AND c.num_contrato = :cuenta
    AND c.fecha_mov = :fecha_mov
      AND cal.fecha_calendario <= (SELECT MAX(fecha_precio) FROM tbl_precio_sp)  -- Limitar hasta la última fecha de precio disponible
ORDER BY 
    cal.fecha_calendario DESC "
            );

            // Vincular el parámetro
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':cuenta', $cuenta, PDO::PARAM_INT);
            $stmt->bindParam(':fecha_mov', $fecha_mov, PDO::PARAM_STR);


            // Ejecutar la consulta
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;

            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();

            // Devolver los resultados




        } catch (Exception $e) {
            // Manejo de errores con más detalle
            return 'Excepción: ' . $e->getMessage();
        }
    }


    static public function mdlinsertDetalleBtc($id_mov, $fecha_pago, $num_detalle) {
        
    
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Insertar los datos en la base de datos
            $stmt = $conn->prepare("INSERT INTO `tbl_detalle_bitcoin` ( `num_detalle`,   `fk_id_mov_btc`,  `fecha_pago`) 
            VALUES ( :num_detalle, :id_mov, :fecha_pago );");
    
            // Vincular parámetros
            $stmt->bindParam(':num_detalle', $num_detalle);
            $stmt->bindParam(':id_mov', $id_mov);
            $stmt->bindParam(':fecha_pago', $fecha_pago);
            
    
            // Ejecutar la consulta
            if ($stmt->execute()) {
                $response = 'Datos insertados correctamente.';
            } else {
                $response = 'Error al ejecutar la consulta.';
            }
    
            // Cerrar la conexión
            $conn = null;
    
        } catch (Exception $e) {
            // Manejo de errores
            $response = 'Excepción: ' . $e->getMessage();
        }
    
        // Devolver la respuesta en texto plano
        echo $response;
    }  
}
