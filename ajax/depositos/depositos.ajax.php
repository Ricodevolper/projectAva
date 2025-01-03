<?php


//header('Content-Type: application/json');

require_once '../../modelos/conexion.php';

class DepositosAjax {

    
    static public function precioMercadoActual($id_fondo, $id_serie, $fecha_mov) {
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Consultar el precio de mercado actual
            $stmt = $conn->prepare("SELECT tbl_precio_mercado.p_mercado FROM `rel_fondo_serie_porc`
                INNER JOIN tbl_precio_mercado ON tbl_precio_mercado.`rel_fondo_serie_porc` = rel_fondo_serie_porc.id
                WHERE `fk_fondo` = :fondo AND `fk_serie` = :serie  AND fecha_aplica = :fecha_mov");
            $stmt->bindParam(":fondo", $id_fondo, PDO::PARAM_STR);
            $stmt->bindParam(":serie", $id_serie, PDO::PARAM_STR);
            $stmt->bindParam(":fecha_mov", $fecha_mov, PDO::PARAM_STR);
            $stmt->execute();
    
            // Obtener el resultado
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                // Devolver el resultado como JSON
                echo json_encode(['pm_actual' => $result['p_mercado']]);
            } else {
                // Si no se encuentra el resultado
                echo json_encode(['pm_actual' => null]);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    
        // Cerrar la conexión
        $conn = null;
    }
    static public function precioMercadoActualEvent($id_fondo, $id_serie, $fecha_mov) {
        try {
            // Conectar a la base de datos
            $conn = Conexion::conectar();
    
            // Consultar el precio de mercado actual y el porcentaje
            $stmt = $conn->prepare("SELECT tbl_precio_mercado.p_mercado, rel_fondo_serie_porc.porcentaje FROM `rel_fondo_serie_porc`
                INNER JOIN tbl_precio_mercado ON tbl_precio_mercado.`rel_fondo_serie_porc` = rel_fondo_serie_porc.id
                WHERE `fk_fondo` = :fondo AND `fk_serie` = :serie AND fecha_aplica = :fecha_mov");
            $stmt->bindParam(":fondo", $id_fondo, PDO::PARAM_STR);
            $stmt->bindParam(":serie", $id_serie, PDO::PARAM_STR);
            $stmt->bindParam(":fecha_mov", $fecha_mov, PDO::PARAM_STR);
            $stmt->execute();
    
            // Obtener el resultado
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                echo json_encode([
                    'pm_actual' => $result['p_mercado'],
                    'porcentaje' => $result['porcentaje']
                ]);
            } else {
                echo json_encode([
                    'pm_actual' => null,
                    'porcentaje' => null,
                    'error' => 'No se encontró el precio de mercado para los parámetros proporcionados.'
                ]);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        } finally {
            // Cerrar la conexión
            $conn = null;
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
    
    

    static public function tasaCetes($fecha_solicitud, $tipoTasa) {
        try {
            // Selección de la tasa según el tipo de inversión
            switch ($tipoTasa) {
                case '7':
                case '28':
                    $tasa = 'SF43936_CETES28';
                    break;
                case '60':
                case '91':
                    $tasa = 'SF43939_CETES91';
                    break;
                case '182':
                    $tasa = 'SF43942_CETES182';
                    break;
                default:
                    throw new Exception('Tipo de inversión no válido.');
            }
    
            // Conexión a la base de datos
            $conn = Conexion::conectar();
    
            // Consulta SQL para obtener la tasa
            $query = "SELECT $tasa AS tasa, Fecha
                      FROM `tbl_tasas_cetes` 
                      WHERE `Fecha` <= :fecha_solicitud 
                      AND $tasa IS NOT NULL
                      ORDER BY `Fecha` DESC 
                      LIMIT 1;";
    
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":fecha_solicitud", $fecha_solicitud, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Verificar si se encontró un resultado
                if ($result) {
                    return $result;
                } else {
                    return 'No se encontró una tasa válida para la fecha proporcionada.';
                }
            } else {
                return 'Error al ejecutar la consulta.';
            }
        } catch (Exception $e) {
            // Manejo de errores
            return 'Excepción: ' . $e->getMessage();
        } finally {
            // Cerrar la conexión
            $conn = null;
        }
    }
    static public function tasaTiie($fecha_solicitud, $tipoTasa) {
        try {
            // Selección de la tasa según el tipo de inversión
            switch ($tipoTasa) {
                case '7':
                case '28':
                    $tasa = 'SF43783_TIIE28';
                    break;
                case '60':
                case '91':
                    $tasa = 'SF43878_TIIE91';
                    break;
                case '182':
                    $tasa = 'SF111916_TIIE182';
                    break;
                default:
                    throw new Exception('Tipo de inversión no válido.');
            }
    
            // Conexión a la base de datos
            $conn = Conexion::conectar();
    
            // Consulta SQL para obtener la tasa
            $query = "SELECT $tasa AS tasa, Fecha
                      FROM `tbl_tasas_tiie` 
                      WHERE `Fecha` <= :fecha_solicitud 
                      AND $tasa IS NOT NULL
                      ORDER BY `Fecha` DESC 
                      LIMIT 1;";
    
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":fecha_solicitud", $fecha_solicitud, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Verificar si se encontró un resultado
                if ($result) {
                    return $result;
                } else {
                    return 'No se encontró una tasa válida para la fecha proporcionada.';
                }
            } else {
                return 'Error al ejecutar la consulta.';
            }
        } catch (Exception $e) {
            // Manejo de errores
            return 'Excepción: ' . $e->getMessage();
        } finally {
            // Cerrar la conexión
            $conn = null;
        }
    }
    
}

// Obtener los parámetros de la solicitud AJAX
if (isset($_POST['fk_fondo']) && isset($_POST['fk_serie']) && isset($_POST['fecha_mov'])) {
    $fk_fondo = $_POST['fk_fondo'];
    $fk_serie = $_POST['fk_serie'];
    $fecha_mov = $_POST['fecha_mov'];

    // Llamar a la función
    DepositosAjax::precioMercadoActual($fk_fondo, $fk_serie, $fecha_mov);
} 

if (isset($_POST['fondo']) && isset($_POST['serie']) && isset($_POST['fecha_mov_event'])) {
    $fk_fondo = $_POST['fondo'];
    $fk_serie = $_POST['serie'];
    $fecha_mov = $_POST['fecha_mov_event'];

    // Llamar a la función
    DepositosAjax::precioMercadoActualEvent($fk_fondo, $fk_serie, $fecha_mov);
} 
if (isset($_POST['id_fondoAva']) && isset($_POST['fecha_mov_event_ava'])) {
    $fk_fondo = $_POST['id_fondoAva'];
   
    $fecha_mov = $_POST['fecha_mov_event_ava'];
    $fk_serie = '1';

    // Llamar a la función
    DepositosAjax::precioMercadoActualEvent($fk_fondo, $fk_serie, $fecha_mov);
} 

if (isset($_POST['tipoTasa']) || $_POST['fechaSolicitud']  ||  $_POST['tipoInversion']) {

    // Obtener los valores enviados por la solicitud AJAX
    $fechaSolicitud = $_POST['fechaSolicitud'];
    $plazo = $_POST['plazo'];
    $tipoInversion = $_POST['tipoInversion'];
    $tipoTasa = $_POST['tipoTasa'];

    // Verificar el tipo de tasa y llamar a la función correspondiente
    if ($tipoInversion == 'cetes') {
        $resultado = DepositosAjax::tasaCetes($fechaSolicitud,  $tipoTasa);
    } elseif ($tipoInversion == 'tiie') {
        $resultado = DepositosAjax::tasaTiie($fechaSolicitud, $tipoTasa);
    } else {
        $resultado = 'Tipo de tasa no válido';
    }

    // Devolver la respuesta al cliente
    echo json_encode(array('resultado' => $resultado[0]['tasa'],
                            'fecha' => $resultado[0]['Fecha']));
}




