<?php





// Función para sanitizar
function sanitizar($valor) {
    return htmlspecialchars(strip_tags(trim($valor)));
}

// Asignación y sanitización de cada variable individualmente
$nombre_cliente = sanitizar($_POST['nombre_cliente']);
$id_cliente = sanitizar($_POST['id_cliente']);
$id_mov = sanitizar($_POST['id_mov']);
$idmov = sanitizar($_POST['id_mov']);
$t_moneda = sanitizar($_POST['t_moneda']);
$precio_compra = sanitizar($_POST['precio_compra']);
$max_precio = sanitizar($_POST['max_precio']);
$dias_rendimiento = sanitizar($_POST['dias_rendimiento']);
$num_contrato = sanitizar($_POST['num_contrato']);
$saldo_total = sanitizar($_POST['saldo_total']);
$rendimiento_neto = sanitizar($_POST['rendimiento_neto']);
$nuevo_total = sanitizar($_POST['nuevo_total']);
$tasa_rendimiento = sanitizar($_POST['tasa_rendimiento']);
$idBanco = sanitizar($_POST['idBanco']);
$numeroCuenta = sanitizar($_POST['numeroCuenta']);
$clave_interbanc = sanitizar($_POST['clave_interbanc']);
$titularCuenta = sanitizar($_POST['titularCuenta']);
$fondo = sanitizar($_POST['fondo']);
$fecha_movsp = sanitizar($_POST['fecha_movsp']);
$fec_liquidacion = sanitizar($_POST['fec_liquidacion']);



if (
    !empty($nombre_cliente) && !empty($id_cliente) && !empty($id_mov) && !empty($t_moneda) && !empty($precio_compra) && !empty($max_precio) && !empty($dias_rendimiento) && !empty($num_contrato) && 
    !empty($saldo_total) && !empty($rendimiento_neto) && !empty($nuevo_total) && !empty($tasa_rendimiento) && !empty($idBanco) && !empty($numeroCuenta) && !empty($clave_interbanc) 
    && !empty($titularCuenta) && !empty($fondo) && !empty($fecha_movsp) && !empty($fec_liquidacion)
) {   $liquidardeposito = ControladorRetiros::ctrLiquidarDepositoSp($idmov);
    $insertRetiro = ControladorRetiros::ctrRetiroSp($nombre_cliente, $id_cliente, $id_mov, $t_moneda, $precio_compra, $max_precio, $dias_rendimiento, 
    $num_contrato, $saldo_total, $rendimiento_neto, $nuevo_total, $tasa_rendimiento, $idBanco, $numeroCuenta, $clave_interbanc, $titularCuenta, $fondo, 
    $fecha_movsp, $fec_liquidacion, $idmov
    );

  
    
} else {
    echo '<script>
Swal.fire({
  title: "Error",
  text: "Faltan parámetros o están vacíos",
  icon: "error"
}).then(function() {
  // Volver a la página anterior
  window.history.back();
});
</script>
';
}

