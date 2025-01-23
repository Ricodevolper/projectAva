<?php






 function sanitizar($valor) {
    return htmlspecialchars(strip_tags(trim($valor)));
}





// Asignación y sanitización de cada variable individualmente
$nombre_cliente = sanitizar($_POST['nombre_cliente_r']);
$id_cliente = sanitizar($_POST['id_cliente_r']);
$id_mov_l = sanitizar($_POST['id_mov_l']);
$t_moneda = sanitizar($_POST['t_moneda_r']);
$precio_compra = sanitizar($_POST['precioActual']);
$precio_compra_l = sanitizar($_POST['precio_compra_l']);
$max_precio = sanitizar($_POST['max_precio_l']);
$dias_rendimiento = sanitizar($_POST['dias_rendimiento_r']);
$num_contrato = sanitizar($_POST['num_contrato_r']);
$fk_empleado = sanitizar($_POST['Fk_empleado']);
$saldo_total_r = sanitizar($POST['nuevo_total_l']);

$saldo_total = sanitizar($_POST['saldo_total_r']);
$rendimiento_neto = sanitizar($_POST['rendimiento_neto_r']);
$nuevo_total = sanitizar($_POST['nuevo_total_r']);
$tasa_rendimiento = sanitizar($_POST['tasa_rendimiento_r']);
$idBanco = sanitizar($_POST['idBanco_r']);
$numeroCuenta = '';
$clave_interbanc = '';
$titularCuenta = '';
$fondo = sanitizar($_POST['fondo_r']);
$fecha_movsp = sanitizar($_POST['fecha_movsp_l']);
$fecha_mov_sp = sanitizar($_POST['fecha_mov_sp']);
$fec_liquidacion = sanitizar($_POST['fec_liquidacion_l']);
$fec_liquidacion_r = sanitizar($_POST['fec_liquidacion_r']);
$tipo_inversion = sanitizar($_POST['tipo_inversion']);


if ($tipo_inversion == '1') {
    $saldo_total_r = $nuevo_total;
}elseif ($tipo_inversion == '2') {
    $saldo_total_r = $rendimiento_neto; 
}elseif ($tipo_inversion == '3') {
    $saldo_total_r = $saldo_total; 
}





if (
    !empty($nombre_cliente) && !empty($id_cliente) && !empty($id_mov_l) && !empty($t_moneda) && !empty($precio_compra) && !empty($max_precio) && !empty($dias_rendimiento) && !empty($num_contrato) && 
    !empty($saldo_total) && !empty($rendimiento_neto) && !empty($nuevo_total) && !empty($tasa_rendimiento) && !empty($idBanco)
   && !empty($fondo) && !empty($fecha_movsp) && !empty($fec_liquidacion)
) {   

    $insertDespositoSp = ControladorDepositos::ctrInsertDepositoSp($id_cliente, $fondo, $num_contrato, $fk_empleado,$fec_liquidacion_r, 
   $saldo_total_r, $clave_interbanc, $fecha_mov_sp, $saldo_total_r, $fk_empleado, $t_moneda, $titularCuenta, $precio_compra, $idBanco);

    $liquidardeposito = ControladorRetiros::ctrLiquidarDepositoSp($id_mov_l);
    $insertRetiro = ControladorRetiros::ctrRetiroSp($nombre_cliente, $id_cliente, $id_mov_l, $t_moneda, $precio_compra, $max_precio, $dias_rendimiento, 
    $num_contrato, $saldo_total, $rendimiento_neto, $nuevo_total, $tasa_rendimiento, $idBanco, $numeroCuenta, $clave_interbanc, $titularCuenta, $fondo, 
    $fecha_movsp, $fec_liquidacion, $id_mov_l
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



 
