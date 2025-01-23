<?php


class ModeloRetiros {


     static public function mdlRetirosEvent($id)
     {
        $stmt = Conexion::conectar()->prepare("SELECT 
        tbl_clientes_event.*,
        CONCAT(tbl_empleados.nombre_promotor, ' ', tbl_empleados.apaterno_promotor, ' ', tbl_empleados.amaterno_promotor) AS nom_promotor
    FROM 
        tbl_clientes_event
    INNER JOIN 
        tbl_empleados 
    ON 
        tbl_clientes_event.fk_empleado = tbl_empleados.id_promotor
    WHERE 
        tbl_clientes_event.status_liquidacion = 1 
        AND tbl_clientes_event.Fk_cliente = $id;
    ");
    
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
     }
     static public function mdlTasacetes()
     {
        $stmt = Conexion::conectar()->prepare("SELECT MAX(fecha) AS fecha , SF43939_CETES91 AS tasa91
          FROM 
        tbl_tasas_cetes
    
    ");
    
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
     }



     static public function mdlRetirosGarant($id)
     {
        $stmt = Conexion::conectar()->prepare("SELECT 
        tbl_clientes_garant.*,
        CONCAT(tbl_empleados.nombre_promotor, ' ', tbl_empleados.apaterno_promotor, ' ', tbl_empleados.amaterno_promotor) AS nom_promotor
    FROM 
        tbl_clientes_garant
    INNER JOIN 
        tbl_empleados 
    ON 
        tbl_clientes_garant.fk_empleado = tbl_empleados.id_promotor
    WHERE 
        tbl_clientes_garant.status_contrato = 2 
        AND tbl_clientes_garant.Fk_cliente = $id;
    ");
    
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
     }
     static public function mdlRetirosLq($id)
     {
        $stmt = Conexion::conectar()->prepare("SELECT 
        tbl_clientes_Lq.*,
        CONCAT(tbl_empleados.nombre_promotor, ' ', tbl_empleados.apaterno_promotor, ' ', tbl_empleados.amaterno_promotor) AS nom_promotor
    FROM 
        tbl_clientes_Lq
    INNER JOIN 
        tbl_empleados 
    ON 
        tbl_clientes_Lq.fk_empleado = tbl_empleados.id_promotor
    WHERE 
        tbl_clientes_Lq.status_ejecusion = 1 
        AND tbl_clientes_Lq.Fk_cliente = $id;
    ");
    
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
     }
     static public function mdlRetirosTiie($id)
     {
        $stmt = Conexion::conectar()->prepare("SELECT 
        tbl_clientes_tiie.*,
        CONCAT(tbl_empleados.nombre_promotor, ' ', tbl_empleados.apaterno_promotor, ' ', tbl_empleados.amaterno_promotor) AS nom_promotor
    FROM 
        tbl_clientes_tiie
    INNER JOIN 
        tbl_empleados 
    ON 
        tbl_clientes_tiie.fk_empleado = tbl_empleados.id_promotor
    WHERE 
        tbl_clientes_tiie.status_contrato = 2 
        AND tbl_clientes_tiie.Fk_cliente = $id;
    ");
    
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
     }
     static public function mdlRetirosStable($id)
     {
        $stmt = Conexion::conectar()->prepare("SELECT 
        tbl_clientes_stable.*,
        CONCAT(tbl_empleados.nombre_promotor, ' ', tbl_empleados.apaterno_promotor, ' ', tbl_empleados.amaterno_promotor) AS nom_promotor
    FROM 
        tbl_clientes_stable
    INNER JOIN 
        tbl_empleados 
    ON 
        tbl_clientes_stable.fk_empleado = tbl_empleados.id_promotor
    WHERE 
        tbl_clientes_stable.status_liquidacion = 1 
        AND tbl_clientes_stable.Fk_cliente = $id;
    ");
    
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
     }
     

static public function mdlAnualGarant(){
       
       $stmt = Conexion::conectar()->prepare("SELECT 
       YEAR(`fecha_inser`) AS anio,
       SUM(`monto_inver`) AS total
   FROM 
       `tbl_clientes_garant`
   GROUP BY 
       YEAR(`fecha_inser`)
   ORDER BY 
       anio;");
       $stmt->execute();
       $resultados = $stmt->fetchAll();
   
       // Cerrar el cursor, no la conexión
       $stmt->closeCursor();
   
       // Devolver los resultados
       return $resultados;

}


static public function  mdlMensualGarant()
{
    $stmt = Conexion::conectar()->prepare("SELECT 
    DATE_FORMAT(`fecha_inser`, '%m') AS mes,
    SUM(`monto_inver`) AS total
FROM 
    tbl_clientes_garant
WHERE 
    YEAR(`fecha_inser`) = YEAR(NOW())
GROUP BY 
    DATE_FORMAT(`fecha_inser`, '%m')
ORDER BY 
    mes;");
$stmt->execute();
$resultados = $stmt->fetchAll();

$stmt->closeCursor(); // Cerrar el cursor

return $resultados;

}
static public function  mdlRetirosClientesSP($id)
{
    $stmt = Conexion::conectar()->prepare("SELECT 
    c.*, 
    p.fecha_precio AS max_fecha_precio, 
    p.precio AS max_precio
FROM 
    tbl_clientes_sp AS c
JOIN 
    (SELECT fecha_precio, precio
     FROM tbl_precio_sp
     ORDER BY fecha_precio DESC
     LIMIT 1) AS p 
ON 
    1 = 1
WHERE 
    c.tipo_movimiento = 2 
    AND c.dep_ret = 1 
    AND c.Fk_cliente = :id;
");

$stmt->bindParam(":id", $id, PDO::PARAM_STR);
$stmt->execute();
$resultados = $stmt->fetchAll();

$stmt->closeCursor(); // Cerrar el cursor

return $resultados;

}
static public function  mdlDetalleRetiroBtc($id_mov)
{
    $stmt = Conexion::conectar()->prepare("SELECT 
   *
FROM 
    tbl_detalle_bitcoin WHERE `fk_id_mov_btc` = :id_mov;

");

$stmt->bindParam(":id_mov", $id_mov, PDO::PARAM_STR);
$stmt->execute();
$resultados = $stmt->fetchAll();

$stmt->closeCursor(); // Cerrar el cursor

return $resultados;

}
static public function  mdlRetirosClientesEvent($id)
{
    $stmt = Conexion::conectar()->prepare("SELECT * FROM `tbl_clientes_Event`WHERE `Fk_cliente` = :id ORDER BY `tbl_clientes_Event`.`id_mov` DESC LIMIT 1
");

$stmt->bindParam(":id", $id, PDO::PARAM_STR);
$stmt->bindParam(":id1", $id, PDO::PARAM_STR);
$stmt->execute();
$resultados = $stmt->fetchAll();

$stmt->closeCursor(); // Cerrar el cursor

return $resultados;

}
static public function  mdlRetirosClienteBitcoin($id)
{
    $stmt = Conexion::conectar()->prepare("SELECT * FROM `tbl_clientes_bitcoin`WHERE `Fk_cliente` = :id ORDER BY `tbl_clientes_bitcoin`.`id_mov_bitcoin` DESC 
");

$stmt->bindParam(":id", $id, PDO::PARAM_STR);

$stmt->execute();
$resultados = $stmt->fetchAll();

$stmt->closeCursor(); // Cerrar el cursor

return $resultados;

}


static public function mdlretiroSpSolicitud() {
    // Recuperar los datos del formulario
    $fondo = $_POST['fondo1'];
    $idBanco = $_POST['idBanco'];
    $numeroCuenta = $_POST['numeroCuenta'];
    
    // Decodificar y limpiar el monto_mxn
    $montoMxn = urldecode($_POST['montoRetiro']);
    $montoMxn = preg_replace("/[^0-9]/", "", $montoMxn);
   
   
    $montoInversion = $_POST['montoRetiro'];
   // $asesor = $_POST['asesor'];
    $tipoMoneda = $_POST['tipo_moneda'];
    $serie = $_POST['serie1'];
   // $titularCuenta = $_POST['titularCuenta'];
   // $claveInterbanc = $_POST['clave_interbanc'];
    $pCompra = $_POST['precio_mercado'];
    $porcentajeComision = $_POST['porcentaje-comision'];
    $titulos =  $_POST['titulosVender'];;


    $numeroContrato = $_POST['numero_contrato'];
    $idCliente = $_POST['fk_cliente'];
    $fkEmpleado = $_POST['fk_empleado'];
    $fechaMov = $_POST['fecha_sol'];
    $efectivo =  $montoMxn - $montoInversion;
    $saldoTotal = $titulos * $pCompra;
    $concepto = ['concepto'];

    // Inicializar la respuesta
    $response = '';

    try {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Insertar los datos en la base de datos
        $stmt = $conn->prepare("INSERT INTO `tbl_clientes_sp` (
                `Fk_cliente`, `num_contrato`, `Fk_empleado`, `fecha_mov`, `valor_inicial`, 
                `valor_compra`, `titulos`, `precio_mercado`, `efectivo`, `total_dls`, `producto`, 
                `precio_compra`, `saldo_total`, `tipo_movimiento`, `fondo`, `fecha_solicitud`, `status_solicitud`, `serie`, `status_mov`, 
                `saldo_mx`, `tc_compra`, `saldo_usd`, `comision_dls`, `banco`, concepto,  `t_moneda`, `dep_ret`
            ) VALUES (
                :fk_cliente, :numeroContrato, :fk_empleado, :fecha_sol1, :montoInversion, 
                :pCompra, :titulos, :pCompra1, :efectivo, '0', '1', 
                :precioCompra, :saldo_total, '3', :fondo, :fecha_sol, '1', :serie, '1', 
                :montoMxn, '0', '0', '0', :idBanco,:concepto, :tipoMoneda, '2'
            );");

        // Vincular parámetros
        $stmt->bindParam(':fk_cliente', $idCliente);
        $stmt->bindParam(':numeroContrato', $numeroContrato);
        $stmt->bindParam(':fk_empleado', $fkEmpleado);
        $stmt->bindParam(':fecha_sol1', $fechaMov);
        $stmt->bindParam(':fecha_sol', $fechaMov);
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
        $stmt->bindParam(':concepto', $concepto);
        $stmt->bindParam(':tipoMoneda', $tipoMoneda);
        $stmt->bindParam(':precioCompra', $pCompra);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            $response = '
            <script>Swal.fire({
            title: "Solicitud Realizada",
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
        // Manejo de errores
        $response = 'Excepción: ' . $e->getMessage();
    }

    // Devolver la respuesta en texto plano
    echo $response;
}
static public function mdlretiroSpSolicitudActiva() {
   
    // Inicializar la respuesta
    $response = '';

    try {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Insertar los datos en la base de datos
        $stmt = $conn->prepare("SELECT 
            tbl_clientes_sp.`num_contrato`,
            tbl_clientes_sp.`id_mov`,
            tbl_clientes_sp.`Fk_cliente`,
            tbl_clientes_sp.`Fk_empleado`,
            tbl_clientes_sp.`fecha_mov`,
            tbl_clientes_sp.`fecha_solicitud`,
            tbl_clientes_sp.`titulos`,
            tbl_clientes_sp.`precio_mercado`,
            tbl_clientes_sp.`saldo_total`,
            tbl_clientes_sp.`efectivo`,
            tbl_clientes_sp.`t_moneda`,
            tbl_clientes_sp.`fondo`,
            tbl_clientes_sp.`serie`,
            CONCAT(tbl_clientes.`nombre_clte`, ' ', tbl_clientes.`apaterno_clte`, ' ', tbl_clientes.`amaterno_clte`) AS nombre_cliente
        FROM 
            `tbl_clientes_sp`
        INNER JOIN 
            tbl_clientes ON tbl_clientes.id_cliente = tbl_clientes_sp.fk_cliente 
        WHERE 
            `status_solicitud` = 1;");

        

        // Ejecutar la consulta
        if ($stmt->execute()) {
           return $stmt->fetchAll();
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
static public function mdlRetiroSp($nombre_cliente, $id_cliente, $id_mov, $t_moneda, $precio_compra, $max_precio, $dias_rendimiento, 
$num_contrato, $saldo_total, $rendimiento_neto, $nuevo_total, $tasa_rendimiento, $idBanco, $numeroCuenta, $clave_interbanc, $titularCuenta, $fondo, 
$fecha_movsp, $fec_liquidacion, $idmov) {

    $precio_compra = str_replace(['$', ','], '', $precio_compra);
    $max_precio = str_replace(['$', ','], '', $max_precio);
    $saldo_total = str_replace(['$', ','], '', $saldo_total);
    $rendimiento_neto = str_replace(['$', ','], '', $rendimiento_neto);
    $nuevo_total = str_replace(['$', ','], '', $nuevo_total);

   
    try {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Insertar los datos en la base de datos
        $stmt = $conn->prepare("INSERT INTO `tbl_retiros_sp` (`Fk_cliente`, `t_moneda`, `v_compra`, `v_retiro`, `dias_rendimiento`, `num_contrato`, `saldo_inicial`,
         `rendimiento_neto`, `total_retiro`, `tasa_rendimiento`, `idBanco`, `fecha_ini`, `fecha_liqui`, `Fk_id_mov_dep`) 
         VALUES 
         (:id_cliente, :t_moneda, :precio_compra, :max_precio, :dias_rendimiento, :num_contrato, :saldo_total, :rendimiento_neto, :nuevo_total, :tasa_rendimiento, :idBanco, :fec_ini, :fec_ret, :id_mov)");

        // Vincular los parámetros
        $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_STR);
        $stmt->bindParam(":t_moneda", $t_moneda, PDO::PARAM_STR);
        $stmt->bindParam(":precio_compra", $precio_compra, PDO::PARAM_STR);
        $stmt->bindParam(":max_precio", $max_precio, PDO::PARAM_STR);
        $stmt->bindParam(":dias_rendimiento", $dias_rendimiento, PDO::PARAM_STR);
        $stmt->bindParam(":num_contrato", $num_contrato, PDO::PARAM_STR);
        $stmt->bindParam(":saldo_total", $saldo_total, PDO::PARAM_STR);
        $stmt->bindParam(":rendimiento_neto", $rendimiento_neto, PDO::PARAM_STR);
        $stmt->bindParam(":nuevo_total", $nuevo_total, PDO::PARAM_STR);
        $stmt->bindParam(":tasa_rendimiento", $tasa_rendimiento, PDO::PARAM_STR);
        $stmt->bindParam(":idBanco", $idBanco, PDO::PARAM_STR);
        $stmt->bindParam(":fec_ini", $fecha_movsp, PDO::PARAM_STR);
        $stmt->bindParam(":fec_ret", $fec_liquidacion, PDO::PARAM_STR);
        $stmt->bindParam(":id_mov", $idmov, PDO::PARAM_STR);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            $response = "<script>
                Swal.fire({
                    title: 'Liquidación Realizada',
                    text: 'El retiro ha sido realizado con éxito',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false,
                }).then(function() {
                    // Redireccionar a la página de clientes
                    window.location.href = 'clientes';
                });
            </script>";
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
static public function mdlLiquidarDepositoSp($idmov)
     {
        $stmt = Conexion::conectar()->prepare("UPDATE `tbl_clientes_sp` SET `status_liquidacion` = '1' WHERE `tbl_clientes_sp`.`id_mov` = :id;");
        $stmt->bindParam(":id", $idmov, PDO::PARAM_STR);
    
        $stmt->execute();
        $resultados = $stmt->fetchAll();
    
        // Cerrar el cursor, no la conexión
        $stmt->closeCursor();
    
        // Devolver los resultados
        return $resultados;
     }


}

