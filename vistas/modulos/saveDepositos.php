<?php



if (isset($_POST['fecha_mov_event'])) {
   

    $id_cliente = $_POST['fk_cliente'];
    $serie = $_POST['serieEvent'];
    $fondo = $_POST['fondoEvent'];
    $contrato = $_POST['numero-contrato'];
    $empleado = $_POST['fk_asesor'];
    $fecha_mov = $_POST['fecha_mov_event'];
    $precio_mercado = $_POST['pm_actualEvent'];
    $titulos = $_POST['titulos'];
    $efectivo = $_POST['efectivo'];
    $tipo_cambio = $_POST['tipo_cambio'];
    $total_dls = $_POST['monto_inversion'];
    $saldo_comision = $_POST['comision_entrada'];
    $banco = $_POST['banco'];
    $cant_deposito = $titulos*$precio_mercado;
    $titulosAva =  $_POST['titulos_ava'];
    $porcentaje_comision = $_POST['porcentaje_comision'];

    // Obteniendo el saldo anterior
    $titulosActual = ControladorDepositos::ctrSaldoAnteriorEvent($id_cliente, $serie, $fondo, $contrato);

    if ($titulosActual && isset($titulosActual[0]['titulos']) && isset($titulosActual[0]['precio_mercado']) && $titulosActual[0]['titulos'] > 0) {
        $valor_actual = $precio_mercado * $titulosActual[0]['titulos'];
        $titulos = $titulos + $titulosActual[0]['titulos'];
        $precio_mercado_anterior = $titulosActual[0]['precio_mercado'];
        $tc_compra = $titulosActual[0]['tc_compra'];
        $valor_inicial = $precio_mercado_anterior * $titulosActual[0]['titulos'];
        $saldo_usd = $total_dls + $valor_actual;
        $efectivo = $efectivo + $titulosActual[0]['efectivo'];
    } else {
        $valor_actual = $precio_mercado * $titulos;
        $valor_inicial = $precio_mercado * $titulos;
        $tc_compra = $precio_mercado;
        $saldo_usd = $precio_mercado * $titulos;
        $precio_mercado_anterior = $precio_mercado;
    }

    $saldo_total = $titulos * $precio_mercado;
    $saldo_mx = $saldo_usd * $tipo_cambio;

    $ultimo_idmovInsert = $titulosActual[0]['id_mov'];

    // Asegurándonos de que los parámetros estén correctamente ordenados
    $insertDespositoEvent = ControladorDepositos::ctrDespositoEvent(
        $id_cliente,
        $contrato,
        $empleado,
        $fecha_mov,
        $valor_actual,
        $valor_inicial,
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
        $saldo_comision,
        $banco,
        $cant_deposito
    );

    if ($insertDespositoEvent == 'ok') {

       
        $ultimo_idmovInsert = $titulosActual[0]['id_mov'] + 2;
        $cambio_insert =  ControladorDepositos::ctrinsertTipoCambioDeposito($ultimo_idmovInsert,$saldo_mx,$tipo_cambio,$total_dls,$porcentaje_comision,$saldo_comision,$id_cliente);
        $bancoInsert = ControladorDepositos::ctrInsertRegistroBanco($ultimo_idmovInsert,$banco);
        // Obteniendo el saldo anterior
        $titulosActualAva = ControladorDepositos::ctrSaldoAnteriorEvent('53', '1', '1', '00000000_2');
        $titulosAva =  $_POST['titulos_ava'];
    

        if ($titulosActualAva && isset($titulosActualAva[0]['titulos']) && isset($titulosActualAva[0]['precio_mercado']) && $titulosActualAva[0]['titulos'] > 0) {
           
            $valor_actual = $precio_mercado * $titulosActualAva[0]['titulos'];
            $titulosAva = $titulosAva + $titulosActualAva[0]['titulos'];
            $precio_mercado_anterior = $titulosActualAva[0]['precio_mercado'];
            $tc_compra = $titulosActualAva[0]['tc_compra'];
            $valor_inicial = $precio_mercado_anterior * $titulosActualAva[0]['titulos'];
            $saldo_usd = $titulosActualAva[0]['saldo_usd'] + $valor_actual;
            $efectivo = $efectivo + $titulosActualAva[0]['efectivo'];
        } else {
            $valor_actual = $precio_mercado * $titulosAva;
            $valor_inicial = $precio_mercado * $titulosAva;
            $tc_compra = $precio_mercado;
            $saldo_usd = $precio_mercado * $titulosAva;
            $precio_mercado_anterior = $precio_mercado;
        }
      
        $saldo_total = $titulosAva * $precio_mercado;
        $saldo_mx = $saldo_usd * $tipo_cambio;


        $insertDepositoEventAva = ControladorDepositos::ctrDespositoEvent(
            '53',
            '00000000_2',
            '25',
            $fecha_mov,
            $valor_actual,
            $valor_inicial,
            $titulosAva,
            $precio_mercado,
            $efectivo,
            $saldo_usd,
            $precio_mercado_anterior,
            $saldo_total,
            '1',
            '1',
            $saldo_mx,
            $tc_compra,
            $saldo_comision,
            $banco
            ,$cant_deposito
        );

        if ($insertDepositoEventAva == 'ok') {
            echo "<script>
            Swal.fire({
                title: 'Deposito Realizado',
                text: 'El deposito ha sido Realizado con Exito',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false,
            }).then(function() {
                return Swal.fire({
                    title: 'Deposito Realizado Ava',
                    text: 'El deposito ha sido Realizado con Exito',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false,
                });
            }).then(function() {
                // Redireccionar a la página de clientes
                window.location.href = 'clientes';
            });
        </script>";
        
        
        }
    } else {
        echo "<script>Swal.fire({
                title: 'Deposito no realizado Ava',
                text: 'El deposito no ha sido Realizado.',
                icon: 'error',
                timer: 2000,
                showConfirmButton: false,
            });
        </script>";
    }
}





if (isset($_POST['fecha_mov_sp'])) {
   
    // Filtramos y validamos las entradas para evitar posibles problemas
    $fondo = isset($_POST['fondo']) ? filter_var($_POST['fondo'], FILTER_SANITIZE_STRING) : null;
    $fec_liquidacion = isset($_POST['fec_liquidacion']) ? filter_var($_POST['fec_liquidacion'], FILTER_SANITIZE_STRING) : null;
    $idBanco = isset($_POST['idBanco']) ? filter_var($_POST['idBanco'], FILTER_VALIDATE_INT) : null;
    $numeroCuenta = isset($_POST['numeroCuenta']) ? filter_var($_POST['numeroCuenta'], FILTER_SANITIZE_STRING) : null;
    $fk_cliente = isset($_POST['fk_cliente']) ? filter_var($_POST['fk_cliente'], FILTER_VALIDATE_INT) : null;
    $fk_empleado = isset($_POST['fk_empleado']) ? filter_var($_POST['fk_empleado'], FILTER_VALIDATE_INT) : null;
    $saldo_actual = isset($_POST['saldoActual']) ? filter_var($_POST['saldoActual'], FILTER_VALIDATE_FLOAT) : 0.0;
    $clave_interbanc = isset($_POST['clave_interbanc']) ? filter_var($_POST['clave_interbanc'], FILTER_SANITIZE_STRING) : null;
    $numero_contrato = isset($_POST['numero-contrato']) ? filter_var($_POST['numero-contrato'], FILTER_SANITIZE_STRING) : null;
    $fecha_mov_sp = isset($_POST['fecha_mov_sp']) ? filter_var($_POST['fecha_mov_sp'], FILTER_SANITIZE_STRING) : null;
    $monto_inversion = isset($_POST['monto_inversion']) ? filter_var($_POST['monto_inversion'], FILTER_VALIDATE_FLOAT) : 0.0;
    $asesor = isset($_POST['asesor']) ? filter_var($_POST['asesor'], FILTER_SANITIZE_STRING) : null;
    $tipo_moneda = isset($_POST['tipo_moneda']) ? filter_var($_POST['tipo_moneda'], FILTER_SANITIZE_STRING) : null;
    $titularCuenta = isset($_POST['titularCuenta']) ? filter_var($_POST['titularCuenta'], FILTER_SANITIZE_STRING) : null;
    $precioActual = isset($_POST['precioActual']) ? filter_var($_POST['precioActual'], FILTER_VALIDATE_FLOAT) : 0.0;
  
    // Validamos que los campos obligatorios tengan valores válidos
    if ($fk_cliente && $numero_contrato && $fk_empleado  > 0) {

        $contrato = ControladorDepositos::ctrContratoActivoSp($numero_contrato,$fk_cliente);
       
      
        if ($contrato['fecha'] != $fecha_mov_sp ) {
            # code...
      
        // Obtención de saldo actual del cliente
        $saldos = ControladorProductos::ctrSaldoSp($fk_cliente, $numero_contrato);
  
        // Cálculo del saldo actualizado
        $saldo_actual = $saldos['saldo_total'] + $monto_inversion;
  
        // Insertamos el depósito
        $insertDespositoSp = ControladorDepositos::ctrInsertDepositoSp($fk_cliente, $fondo, $numero_contrato, $fk_empleado,$fec_liquidacion, 
        $saldo_actual, $clave_interbanc, $fecha_mov_sp, $monto_inversion, $asesor, $tipo_moneda, $titularCuenta, $precioActual, $idBanco);
  
        if ($insertDespositoSp) {
            echo 'Depósito registrado con éxito.';
        } else {
            echo 'Error al registrar el depósito.';
        }
    } else {
        echo  "<script>Swal.fire({
            icon: 'error',
            title: 'Existe  Inversión',
            text: 'Ya existe esta fecha con inversión.'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'clientes'; // Redirigir a clientes
            }
        });
      </script>";
           }
}else{
    echo 'Faltan datos obligatorios o los datos proporcionados no son válidos.';

}
  }

  
 
          

if (isset($_POST['fecha_mov_bitcoin']) ||  isset($_POST['fecha_mov_bitcoin_usd'])) {

  
  
    // Filtramos y validamos las entradas para evitar posibles problemas
    $fondo = isset($_POST['fondo']) ? filter_var($_POST['fondo'], FILTER_SANITIZE_STRING) : null;
    $fec_liquidacion = isset($_POST['fec_liquidacion']) ? filter_var($_POST['fec_liquidacion'], FILTER_SANITIZE_STRING) : null;
    $idBanco = isset($_POST['idBanco']) ? filter_var($_POST['idBanco'], FILTER_VALIDATE_INT) : null;
    $numeroCuenta = isset($_POST['numeroCuenta']) ? filter_var($_POST['numeroCuenta'], FILTER_SANITIZE_STRING) : null;
    $fk_cliente = isset($_POST['fk_cliente']) ? filter_var($_POST['fk_cliente'], FILTER_VALIDATE_INT) : null;
    $fk_empleado = isset($_POST['fk_empleado']) ? filter_var($_POST['fk_empleado'], FILTER_VALIDATE_INT) : null;
    $saldo_actual = isset($_POST['saldoActual']) ? filter_var($_POST['saldoActual'], FILTER_VALIDATE_FLOAT) : 0.0;
    $clave_interbanc = isset($_POST['clave_interbanc']) ? filter_var($_POST['clave_interbanc'], FILTER_SANITIZE_STRING) : null;
    $numero_contrato = isset($_POST['numero-contrato']) ? filter_var($_POST['numero-contrato'], FILTER_SANITIZE_STRING) : null;
    $fecha_mov_bitcoin = isset($_POST['fecha_mov_bitcoin']) 
    ? filter_var($_POST['fecha_mov_bitcoin'], FILTER_SANITIZE_STRING) 
    : (isset($_POST['fecha_mov_bitcoin_usd']) 
        ? filter_var($_POST['fecha_mov_bitcoin_usd'], FILTER_SANITIZE_STRING) 
        : null);
  $monto_inversion = isset($_POST['monto_inversion']) ? filter_var($_POST['monto_inversion'], FILTER_VALIDATE_FLOAT) : 0.0;
    $asesor = isset($_POST['fk_empleado']) ? filter_var($_POST['fk_empleado'], FILTER_SANITIZE_STRING) : null;
    $tipo_moneda = isset($_POST['fecha_mov_bitcoin_usd']) 
    ? (isset($_POST['t_moneda']) ? filter_var($_POST['t_moneda'], FILTER_SANITIZE_STRING) : null) 
    : (isset($_POST['tipo_moneda']) ? filter_var($_POST['tipo_moneda'], FILTER_SANITIZE_STRING) : null);
  $titularCuenta = isset($_POST['titularCuenta']) ? filter_var($_POST['titularCuenta'], FILTER_SANITIZE_STRING) : null;
    $precioActual = isset($_POST['precioActual']) ? filter_var($_POST['precioActual'], FILTER_VALIDATE_FLOAT) : 0.0;
    $montoCompra = isset($_POST['monto_compras']) ? filter_var($_POST['monto_compras'], FILTER_VALIDATE_FLOAT) : 0.0;
    $montoComision = isset($_POST['monto_comision']) ? filter_var($_POST['monto_comision'], FILTER_VALIDATE_FLOAT) : 0.0;
    $cantidad_btc = isset($_POST['cantidad_btc']) ? filter_var($_POST['cantidad_btc'], FILTER_VALIDATE_FLOAT) : 0.0;

       // Validamos que los campos obligatorios tengan valores válidos
    if ($fk_cliente && $numero_contrato && $fk_empleado  > 0) {

       $contrato = ControladorDepositos::ctrContratoActivoBitcoin($numero_contrato,$fk_cliente,$tipo_moneda);
       

      
      
            # code...
      
      //  Obtención de saldo actual del cliente
       $saldos = ControladorProductos::ctrSaldoBitcoin($fk_cliente, $numero_contrato,  $tipo_moneda);

       $saldo_anterior = 0; // O el valor apropiado.



       if ($saldos != 0) {
       $saldo_anterior = $saldos['saldo_total'];
       }else{
        $saldo_anterior = 0 ;
       }

       



       
    //   $saldo_anterior =   $saldos
  
       // Cálculo del saldo actualizado
       $saldo_actual = $saldo_anterior + $cantidad_btc;

      
  
      //  Insertamos el depósito
        $insertDespositoBitcoin = ControladorDepositos::ctrInsertDepositoBitcoin($fk_cliente, $fondo, $numero_contrato, $fk_empleado,$fec_liquidacion, 
        $saldo_actual, $clave_interbanc, $fecha_mov_bitcoin, $monto_inversion, $asesor, $tipo_moneda, $titularCuenta, $precioActual, $idBanco, $cantidad_btc, $montoComision, $montoCompra, $saldo_actual);
  
       if ($insertDespositoBitcoin ) {


        if (isset($_POST['fecha_mov_bitcoin'])) {
            # code...
       

 

    $id_mov = ControladorDepositos::ctrIdMovMaxBtc($fk_cliente,$numero_contrato);


    
             
       
        
         if ($id_mov != '') {
               
            
              // Obtén la información del depósito
                $info_deposito = ControladorDepositos::ctrInfoIdMovBtc($id_mov);

               

                //print_r($info_deposito);
            
                // Fecha del depósito
               $fecha_deposito = $info_deposito['fecha_mov'];
            
                // Convierte la fecha de depósito en un objeto DateTime
              $fecha_inicial = new DateTime($fecha_deposito);

                for ($num_detalle = 1; $num_detalle <= 12; $num_detalle++) {
                    $fecha_actual = clone $fecha_inicial;
                    $fecha_actual->modify("+$num_detalle month");
                    $fecha_pago = $fecha_actual->format('Y-m-d');

                    $insert_detalle_btc = ControladorDepositos::ctrinsertDetalleBtc($id_mov, $fecha_pago, $num_detalle);
                            
                }

            
            
           
           
        } 
    
    }
          
            echo  "<script>Swal.fire({
                icon: 'success',
                title: 'Desposito Realizado',
                text: 'Se ha realizado el deposito'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'clientes'; // Redirigir a clientes
                }
            });
          </script>";
        } else {
            echo  "<script>Swal.fire({
                icon: 'error',
                title: 'No se registro la Inversión',
                text: 'Consulta los datos a al Administrador no se ha registrado la inversión'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'clientes'; // Redirigir a clientes
                }
            });
          </script>";
        }

 }else{
    echo 'Faltan datos obligatorios o los datos proporcionados no son válidos.';

  }
  }

  
  if (isset($_POST['id_detalle_tiie'])) {

    
   


      $id_detalle_tiie = $_POST['id_detalle_tiie'];
     $tasa_maxima = $_POST['tasa_maxima'];
     $cupon = $_POST['cupon'];
     $cliente = $_POST['cliente'];
     $plazo = $_POST['plazo'];
     $producto = $_POST['producto'];
     $forma_pago = $_POST['forma_pago'];
     $moneda = $_POST['moneda'];
     $inversion = $_POST['inversion'];
     $cuota = $_POST['cuota'];
     $tasa_pactada = $_POST['tasa_pactada'];
     $fecha_aplicacion = $_POST['fecha_aplicacion'];
     $fecha_pago = $_POST['fecha_pago'];
     $tasa = $_POST['tasa'];
     $strike = $_POST['strike'];
     $t_inversion = $_POST['t_inversion'];
     $tip_c_max = $_POST['tip_c_max'];
     $fk_id_tiie = $_POST['fk_id_tiie'];
     $num_pago = $_POST['num_pago'];

    



   $f_pago_map = [
    "1" => "DIAS",
    "6" => "FIN DE PLAZO",
    "3" => "MENSUAL"
];

$plazo_map = [
    "6" => "182 DÍAS",
    "3" => "91 DÍAS"
];

$t_inversion_map = [
    "1" => "TIIE",
    "2" => "CETES"
];

$cetes_a_map = [
    "1" => "28 DÍAS",
    "2" => "91 DÍAS",
    "3" => "182 DÍAS"
];
 $plazos = [
    "0" => "-- -- --",
    "1" => "7 DIAS",
    "2" => "28 DIAS",
    "7" => "60 DIAS",
    "3" => "91 DIAS",
    "6" => "182 DIAS"
];
$periodos = [
    "0" => "-- -- --",
    "4" => "7 DIAS",
    "1" => "28 DIAS",
    "5" => "60 DIAS",
    "2" => "91 DIAS",
    "3" => "182 DIAS"
];

$seriesTiie = [
    "28 DIAS" => 'SF43783_TIIE28',
   "91 DIAS"   =>  'SF43878_TIIE91',
   "182 DIAS"  =>    'SF111916_TIIE182'
];
$seriesCetes = [
      "28 DIAS" => 'SF43936_CETES28',
   "91 DIAS"   =>  'SF43939_CETES91',
   "182 DIAS"  =>    'SF43942_CETES182'
];


$plazos = [
    '28 DIAS' => 28,
    '60 DIAS' => 60,
    '7 DIAS' => 7,
    '91 DIAS' => 91,
    '182 DIAS' => 182
];


$plazo = $plazos[$plazo]; 


$partes = [
    28 => 1,
    91 => 3,
    60 => 1,
    7 => 1,
    182 => 6
];

  $parte = $partes[$plazo];


 if ($t_inversion == 'CETES') {

   
 
       
      $num_pago = ControladorPmercado::ctrTasasCetesFechaNumPago($id_detalle_tiie);
     

//    $num_pago =  $num_pago['num_pago'];
    $numero_pago = $num_pago[0]['num_pago'].'pago';
   $fk_id_tiie = $num_pago[0]['fk_id_tiie'];


  

   if ($numero_pago == 1) {
  $fecha_pago = ControladorPmercado::ctrTasasCetesFechaNumPago1($fk_id_tiie);



    $fecha_pago = $fecha_pago['fecha_pago'];
   }else {
    $numero_pago = (int)$numero_pago;
    $numero_pago = $numero_pago - 1;

    $fecha_pago = ControladorPmercado::ctrTasasCetesFechaNumPago2( $fk_id_tiie,$numero_pago);

    $fecha_pago = $fecha_pago['fecha_pago'];
    
   }
    




  //$fecha_pago = ControladorPagos::ctrretrocederUnMesDiaHabil($fecha_pago);




     
    $serie = $seriesCetes[$producto];
$tasaProducto = ControladorPmercado::ctrTasasCetesFecha($fecha_pago,$serie);



$tasa = $tasaProducto[0][$serie];






$tcCliente = ControladorPmercado::ctrTipoCambio($fecha_pago);




    if ($tcCliente[0]['precio'] > $tip_c_max) {
       $tasa = $tasa + $cupon;
       $tcStrike = $tcCliente[0]['precio'];
    }

  if ($tasa < $tasa_maxima ) {
    $inversion = str_replace(',', '', $inversion);  // Eliminar la coma  
    $interes = ($inversion * $tasa / 100) / 365;   
    $interes = ($interes * $plazo)/$parte;  // Luego multiplicamos por 91 y dividimos entre 3
    

 }else{
    $inversion = str_replace(',', '', $inversion);  // Eliminar la coma  
    $interes = ($inversion * $tasa_maxima / 100) / 365;   
    $interes = ($interes * $plazo)/$parte;  // Luego multiplicamos por 91 y dividimos entre 3
    
    $tasa = $tasa_maxima;
 }



$pagoDetalleTiie = ControladorPagos::ctrPagoDetalleTiie($id_detalle_tiie,$interes,$tasa,$tcStrike);


  }elseif ($t_inversion == 'TIIE') {
  
   
    $num_pago = ControladorPmercado::ctrTasasCetesFechaNumPago($id_detalle_tiie);
     

    //    $num_pago =  $num_pago['num_pago'];
        $numero_pago = $num_pago[0]['num_pago'].'pago';
       $fk_id_tiie = $num_pago[0]['fk_id_tiie'];
    
    
      
    
       if ($numero_pago == 1) {
      $fecha_pago = ControladorPmercado::ctrTasasCetesFechaNumPago1($fk_id_tiie);
    
    
    
        $fecha_pago = $fecha_pago['fecha_pago'];
       }else {
        $numero_pago = (int)$numero_pago;
        $numero_pago = $numero_pago - 1;
    
        $fecha_pago = ControladorPmercado::ctrTasasCetesFechaNumPago2( $fk_id_tiie,$numero_pago);
    
        $fecha_pago = $fecha_pago['fecha_pago'];
        
       }
        
    
    
    
    
      //$fecha_pago = ControladorPagos::ctrretrocederUnMesDiaHabil($fecha_pago);
    
    
    if ($plazo != '60'  && $plazo != '7') {
        # code...
     
   
    
   // $fecha_pago = ControladorPagos::ctrretrocederUnMesDiaHabil($fecha_pago);

    
    $serie = $seriesTiie[$producto];
    $tasaProducto = ControladorPmercado::ctrTasasTiieFecha($fecha_pago);
 
    //SF43878_TIIE91

    $tasa = $tasaProducto[$serie];
   

   

  
$tcCliente = ControladorPmercado::ctrTipoCambio($fecha_pago);





if ($tcCliente[0]['precio'] > $tip_c_max) {
  $tasa = $tasa + $cupon;
  $tcStrike = $tcCliente[0]['precio'];

   
}



if ($tasa < $tasa_maxima ) {
 $inversion = str_replace(',', '', $inversion);  // Eliminar la coma  

  $interes = ($inversion * $tasa / 100) / 365; 

 
 
  $interes = ($interes * $plazo)/$parte;  // Luego multiplicamos por 91 y dividimos entre 3


}else{
$inversion = str_replace(',', '', $inversion);  // Eliminar la coma  
$interes = ($inversion * $tasa_maxima / 100) / 365;   
$interes = ($interes * $plazo)/$parte;  // Luego multiplicamos por 91 y dividimos entre 3

$tasa = $tasa_maxima;


}
}

if($plazo == '60'  && $plazo != '7'){
    $inversion = str_replace(',', '', $inversion);  
   
  $interes = ($inversion * $tasa / 100) / 365;   

 $interes = ($interes * $plazo);  // Luego multiplicamos por 91 y dividimos entre 3


}




$pagoDetalleTiie = ControladorPagos::ctrPagoDetalleTiie($id_detalle_tiie,$interes,$tasa,$tcStrike);





 }
  


}







