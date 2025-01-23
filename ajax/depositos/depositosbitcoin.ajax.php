<?php


require_once '../../modelos/conexion.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




class DespositosAjaxBitcoin {

    static public function precioMercadoActualBitcoin($fecha) {
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Consultar el precio de mercado actual
            $stmt = $conn->prepare("SELECT precio AS p_mercado FROM bitcoin_historico WHERE fecha = :fecha");
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->execute();
    
            // Obtener el resultado
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                // Devolver el resultado
                return $result; // Regresamos el array completo, ya tiene 'p_mercado'
            } else {
                // Si no se encuentra el resultado, devolvemos null
                return null;
            }
        } catch (Exception $e) {
            // En caso de error, devolver un mensaje JSON
            echo json_encode(['error' => $e->getMessage()]);
        } finally {
            // Cerrar la conexión
            if (isset($conn)) {
                $conn = null;
            }
        }
    }
    static public function precioMercadoActualBitcoinUsd($fecha) {
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Consultar el precio de mercado actual
            $stmt = $conn->prepare("SELECT precio AS p_mercado FROM bitcoin_historico_usd WHERE fecha = :fecha");
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->execute();
    
            // Obtener el resultado
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                // Devolver el resultado
                return $result; // Regresamos el array completo, ya tiene 'p_mercado'
            } else {
                // Si no se encuentra el resultado, devolvemos null
                return null;
            }
        } catch (Exception $e) {
            // En caso de error, devolver un mensaje JSON
            echo json_encode(['error' => $e->getMessage()]);
        } finally {
            // Cerrar la conexión
            if (isset($conn)) {
                $conn = null;
            }
        }
    }
    static public function depositoSp() {
        // Recuperar los datos del formulario
        $fondo = $_POST['fondo'];
        $idBanco = $_POST['idBanco'];
        $numeroCuenta = $_POST['numeroCuenta'];
        
        // Decodificar y limpiar el monto_mxn
        $montoMxn = urldecode($_POST['monto_mxn']);
        $montoMxn = preg_replace("/[^0-9]/", "", $montoMxn);
        
        $montoInversion = $_POST['monto_inversion'];
        $asesor = $_POST['asesor'];
        $tipoMoneda = $_POST['tipo_moneda'];
        $serie = $_POST['serie'];
        $titularCuenta = $_POST['titularCuenta'];
        $claveInterbanc = $_POST['clave_interbanc'];
        $pCompra = $_POST['p_compra'];
        $porcentajeComision = $_POST['porcentaje-comision'];
        $titulos = $_POST['titulos'];
        $numeroContrato = $_POST['numero-contrato'];
        $idCliente = $_POST['fk_cliente'];
        $fkEmpleado = $_POST['fk_empleado'];
        $fechaMov = $_POST['fecha_mov'];
        $efectivo =  $montoMxn - $montoInversion;
        $saldoTotal = $titulos * $pCompra;
    
        // Inicializar la respuesta
        $response = '';
    
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Insertar los datos en la base de datos
            $stmt = $conn->prepare("INSERT INTO `tbl_clientes_sp` (
                `Fk_cliente`, `num_contrato`, `Fk_empleado`, `fecha_mov`, `valor_inicial`, 
                `valor_compra`, `titulos`, `precio_mercado`, `efectivo`, `total_dls`, `producto`, 
                `precio_compra`, `saldo_total`, `tipo_movimiento`, `fondo`, `serie`, `status_mov`, 
                `saldo_mx`, `tc_compra`, `saldo_usd`, `comision_dls`, `banco`, `t_moneda`
            ) VALUES (
                :fk_cliente, :numeroContrato, :fk_empleado, :fecha_mov, :montoInversion, 
                :pCompra, :titulos, :pCompra1, :efectivo, '0', '1', 
                :precioCompra, :saldo_total, '2', :fondo, :serie, '1', 
                :montoMxn, '0', '0', '0', :idBanco, :tipoMoneda
            );");
    
            // Vincular parámetros
            $stmt->bindParam(':fk_cliente', $idCliente);
            $stmt->bindParam(':numeroContrato', $numeroContrato);
            $stmt->bindParam(':fk_empleado', $fkEmpleado);
            $stmt->bindParam(':fecha_mov', $fechaMov);
            $stmt->bindParam(':montoInversion', $montoInversion);
            $stmt->bindParam(':pCompra', $pCompra);
            $stmt->bindParam(':pCompra1', $pCompra);
            $stmt->bindParam(':titulos', $titulos);
            $stmt->bindParam(':efectivo', $efectivo);
            $stmt->bindParam(':saldo_total', $saldoTotal);
            $stmt->bindParam(':fondo', $fondo);
            $stmt->bindParam(':serie', $serie);
            $stmt->bindParam(':montoMxn', $montoMxn);
            $stmt->bindParam(':idBanco', $idBanco);
            $stmt->bindParam(':tipoMoneda', $tipoMoneda);
            $stmt->bindParam(':precioCompra', $pCompra);
    
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
    static public function actuLiquidoDetalleBitcoin($id_mov_bitcoin, $cupon, $precioActualBtc) {
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Preparar la consulta
            $stmt = $conn->prepare("UPDATE `tbl_detalle_bitcoin`
                SET 
                    `status_pago` = '1', 
                    `strike` =  '1', 
                    `valor_mxn` = :cupon,
                    `valor_btc_aplicado` = :precioActualBtc
                WHERE 
                    `id_mov_dbit` = :id_mov;
            ");
    
            // Vincular parámetros
            $stmt->bindParam(':cupon', $cupon, PDO::PARAM_STR);
            $stmt->bindParam(':id_mov', $id_mov_bitcoin, PDO::PARAM_STR);
            $stmt->bindParam(':precioActualBtc', $precioActualBtc, PDO::PARAM_STR);
    
            // Ejecutar la consulta
            if ($stmt->execute()) {
                return json_encode([
                    'success' => true,
                    'message' => 'Datos actualizados correctamente.'
                ]);
            } else {
                return json_encode([
                    'success' => false,
                    'message' => 'Error al ejecutar la consulta.'
                ]);
            }
        } catch (Exception $e) {
            // Manejo de errores
            return json_encode([
                'success' => false,
                'message' => 'Excepción: ' . $e->getMessage()
            ]);
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
    static public function mdlAsesoresPatrimoniales($idGerente)
    {
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Preparar la consulta SQL
            $stmt = $conn->prepare(
                "SELECT 
                    re.fk_id_gerente, re.fk_id_asesor AS id_asesor,
                    CONCAT(te.nombre_promotor, ' ', te.apaterno_promotor, ' ', te.amaterno_promotor) AS nombre_completo
                FROM 
                    tbl_empleados AS te
                INNER JOIN 
                    rel_gerente_asesor AS re ON re.fk_id_asesor = te.id_promotor 
                WHERE 
                    re.fk_id_gerente = :idGerente  
                    AND te.estatus_promotor = 1 
                    AND te.fk_puesto IN (6, 7)
                ORDER BY 
                    te.nombre_promotor ASC
                LIMIT 20"
            );
    
            // Vincular el parámetro
            $stmt->bindParam(":idGerente", $idGerente, PDO::PARAM_STR);
    
            // Ejecutar la consulta
            if ($stmt->execute()) {
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Validar si hay resultados
                if ($resultados) {
                    return $resultados;
                } else {
                    return 'No se encontraron asesores patrimoniales para el gerente especificado.';
                }
            } else {
                return 'Error al ejecutar la consulta.';
            }
    
        } catch (Exception $e) {
            // Manejo de errores con más detalle
            return 'Excepción: ' . $e->getMessage();
        }
    }

    public static function maxContrato() {
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();

            // Preparar la consulta SQL para obtener el máximo contrato
            $stmt = $conn->prepare("SELECT MAX(num_contrato) AS max_contrato FROM rel_empleado_cliente");

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Obtener el resultado
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verificar si el resultado tiene un valor válido
                if ($resultado && $resultado['max_contrato'] !== null) {
                    // Retornar el resultado en formato JSON
                    echo json_encode(array('maxContrato' => $resultado['max_contrato']));
                } else {
                    // Enviar una respuesta si no se encontraron contratos
                    echo json_encode(array('error' => 'No se encontraron contratos.'));
                }
            } else {
                // Enviar una respuesta de error si la consulta falla
                echo json_encode(array('error' => 'Error al ejecutar la consulta.'));
            }

        } catch (Exception $e) {
            // Enviar la excepción en caso de un error
            echo json_encode(array('error' => 'Excepción: ' . $e->getMessage()));
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
                                WHERE num_contrato = :contrato
                                AND Fk_cliente = :fk_cliente
                            )
                        ) THEN 0
                        ELSE (
                            SELECT MAX(id_mov_bitcoin)
                            FROM tbl_clientes_bitcoin
                            WHERE num_contrato = :contrato
                            AND Fk_cliente = :fk_cliente
                        )
                    END AS resultado;
                "
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

    

    
}

if (isset($_POST['fecha_mov_bitcoin'])) {
    $fecha = $_POST['fecha_mov_bitcoin'];
    
    // Llamar a la función para obtener el precio de mercado
    $resultado = DespositosAjaxBitcoin::precioMercadoActualBitcoin($fecha);
    
    // Verificamos si hay resultado
    if ($resultado) {
        // Devolver la respuesta al cliente con el precio encontrado
        echo json_encode(['p_mercado' => $resultado['p_mercado']]);
    } else {
        // Si no hay precio para esa fecha, enviar un mensaje adecuado
        echo json_encode(['p_mercado' => null, 'message' => 'No se encontró el precio para la fecha especificada']);
    }

    
}
if (isset($_POST['fecha_mov_bitcoin_usd'])) {
    $fecha = $_POST['fecha_mov_bitcoin_usd'];
    
    // Llamar a la función para obtener el precio de mercado
    $resultado = DespositosAjaxBitcoin::precioMercadoActualBitcoinUsd($fecha);
    
    // Verificamos si hay resultado
    if ($resultado) {
        // Devolver la respuesta al cliente con el precio encontrado
        echo json_encode(['p_mercado' => $resultado['p_mercado']]);
    } else {
        // Si no hay precio para esa fecha, enviar un mensaje adecuado
        echo json_encode(['p_mercado' => null, 'message' => 'No se encontró el precio para la fecha especificada']);
    }

    
}




if (isset($_POST['id_gerente'])) {
    $idGerente = $_POST['id_gerente'];

    // Aquí llamas a la función que te devuelve los asesores de ese gerente
    $asesores = DespositosAjaxBitcoin::mdlAsesoresPatrimoniales($idGerente);
    // var_dump($asesores);

    // Construyes las opciones para el select de asesores
    foreach ($asesores as $asesor) {
        echo '<option value="' . $asesor['id_asesor'] . '">' . $asesor['nombre_completo'] . '</option>';
    }
}
if (isset($_POST['nuevoContrato'])) {
   

    
    $asesores = DespositosAjaxBitcoin::maxContrato();
   
   
}


if (isset($_POST['id_mov_dbit'])) {

   
    
    $id_mov_bitcoin = $_POST['id_mov_dbit'];
    $fecha_pago = $_POST['fecha_pago'];
    $saldo_btc = $_POST['saldo_btc'];

    if (empty($id_mov_bitcoin) || empty($fecha_pago) || empty($saldo_btc)) {
        echo json_encode([
            'success' => false,
            'message' => 'Faltan datos para procesar la solicitud.',
        ]);
        exit;
    }

    // Obtener el precio actual de Bitcoin
    $precioActualBtc = DespositosAjaxBitcoin::precioMercadoActualBitcoin($fecha_pago);

    // Calcular saldo en moneda
    $saldo_moneda = $precioActualBtc['p_mercado'] * $saldo_btc;

    // Calcular cupon
    $cupon = $saldo_moneda * 0.01;

    // Actualizar detalle y obtener la respuesta
    $response = DespositosAjaxBitcoin::actuLiquidoDetalleBitcoin($id_mov_bitcoin, $cupon, $precioActualBtc['p_mercado']);

    // Verificar errores y devolver respuesta
    if ($response) {
        echo json_encode([
            'success' => true,
            'message' => 'Actualización exitosa.',
            'cupon' => $cupon,
            'precio_actual' => $precioActualBtc['p_mercado'],
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error al actualizar los datos.',
        ]);
    }
    exit;
}




