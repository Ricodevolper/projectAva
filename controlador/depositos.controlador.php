<?php


class ControladorDepositos{


    static public function ctrValidacionSp($id_cliente,$fondo,$serie,$status)
    {
     $repuesta = ModeloDepositos::mdlValidacionSp($id_cliente,$fondo,$serie,$status);
     return $repuesta;
    }
    static public function ctrIdMovMaxBtc($id_cliente, $contrato)
    {
        $respuesta = ModeloDepositos::mdlIdMovMaxBtc($contrato, $id_cliente);
        return $respuesta;
    }
    
    static public function ctrValidacionBitcoin($id_cliente,$fondo,$serie,$status)
    {
     $repuesta = ModeloDepositos::mdlValidacionBitcoin($id_cliente,$fondo,$serie,$status);
     return $repuesta;
    }
    static public function ctrValidacionBitcoinUsd($id_cliente,$fondo,$serie,$status)
    {
     $repuesta = ModeloDepositos::mdlValidacionBitcoinUsd($id_cliente,$fondo,$serie,$status);
     return $repuesta;
    }
    static public function ctrValidacionEvent($id_cliente,$fondo,$status)
    {
     $repuesta = ModeloDepositos::mdlValidacionEvent($id_cliente,$fondo,$status);
     return $repuesta;
    }
    static public function ctrRendimientoSp($id_cliente,$contrato,$fecha_mov)
    {
     $repuesta = ModeloDepositos::mdlRendimientoSp($id_cliente,$contrato,$fecha_mov);
     return $repuesta;
    }
    static public function ctrSerieSp()
    {
     $repuesta = ModeloDepositos::mdlSerieSp();
     return $repuesta;
    }
    static public function ctrSerieBitcoin()
    {
     $repuesta = ModeloDepositos::mdlSerieBitcoin();
     return $repuesta;
    }
    static public function ctrSerieEvent()
    {
     $repuesta = ModeloDepositos::mdlSerieEvent();
     return $repuesta;
    }
    static public function ctrFondos()
    {
     $repuesta = ModeloDepositos::mdlFondos();
     return $repuesta;
    }



    static public function ctrBancos($id_cliente)
    {
        $repuesta = ModeloDepositos::mdlBancos($id_cliente);
        return $repuesta;
    }
    static public function ctrSaldoAnteriorEvent($id_cliente,$serie,$fondo,$contrato)
    {
        $saldo = ModeloDepositos::mdlSaldoAnteriorEvent($id_cliente,$serie,$fondo,$contrato);

       return $saldo;



       
    }
    static public function ctrinsertTipoCambioDeposito($ultimo_idmovInsert,$saldo_mx,$tipo_cambio,$total_dls,$porcentaje_comision,$saldo_comision,$id_cliente)
    {
        $saldo = ModeloDepositos::mdlinsertTipoCambioDeposito($ultimo_idmovInsert,$saldo_mx,$tipo_cambio,$total_dls,$porcentaje_comision,$saldo_comision,$id_cliente);

       return $saldo;



       
    }
    static public function ctrInsertRegistroBanco($ultimo_idmovInsert,$idBanco)
    {
        $saldo = ModeloDepositos::mdlInsertRegistroBanco($ultimo_idmovInsert,$idBanco);

       return $saldo;



       
    }
    static public function ctrDespositoEvent(
        $id_cliente, $contrato, $empleado, $fecha_mov, $valor_actual, $valor_inicial,  
        $titulos, $precio_mercado, $efectivo, $saldo_usd, $precio_mercado_anterior, $saldo_total,  
        $fondo, $serie, $saldo_mx, $tc_compra, $saldo_comision, $banco,$cant_deposito
    ) {
        // Llamada al modelo para realizar la operación
        $saldo = ModeloDepositos::mdlDespositoEvent(
            $id_cliente, $contrato, $empleado, $fecha_mov, $valor_actual, $valor_inicial,  
            $titulos, $precio_mercado, $efectivo, $saldo_usd, $precio_mercado_anterior, $saldo_total,  
            $fondo, $serie, $saldo_mx, $tc_compra, $saldo_comision, $banco,$cant_deposito
        );
    
        // Devolver el resultado obtenido del modelo
        return $saldo;
    }



    static public function ctrInsertDepositoSp($fk_cliente, $fondo, $numero_contrato, $fk_empleado,$fec_liquidacion, 
    $saldo_actual, $clave_interbanc, $fecha_mov_sp, $monto_inversion, $asesor, $tipo_moneda, $titularCuenta, $precioActual, $idBanco) {

    try {
        // Llamada al modelo para insertar el depósito
        $respuesta = ModeloDepositos::mdlInsertDepositoSp($fk_cliente, $fondo, $numero_contrato, $fk_empleado,$fec_liquidacion, 
        $saldo_actual, $clave_interbanc, $fecha_mov_sp, $monto_inversion, $asesor, $tipo_moneda, $titularCuenta, $precioActual, $idBanco);

        // Verificar si la respuesta es exitosa
        if ($respuesta) {
            return $respuesta;
        } else {
            return "No se pudo insertar el depósito. Verifique los datos proporcionados.";
        }

    } catch (Exception $e) {
        // Registro del error en los logs del sistema
        error_log("Error en ctrInsertDepositoSp: " . $e->getMessage());

        // Retornar un mensaje de error más genérico para mostrar al usuario
        return "Ocurrió un error al insertar el depósito. Por favor, intente nuevamente.";
    }
}
                    static public function ctrInsertDepositoBitcoin($fk_cliente, $fondo, $numero_contrato, $fk_empleado, $fec_liquidacion, 
                    $saldo_actual, $clave_interbanc, $fecha_mov_sp, $monto_inversion, $asesor, $tipo_moneda, $titularCuenta, 
                    $precioActual, $idBanco, $cantidad_btc, $montoComision, $montoCompra, $saldo_total) {

                    try {
                        // Validación básica de parámetros
                        if (empty($fk_cliente) || empty($fondo) || empty($numero_contrato) || empty($precioActual) || 
                            $monto_inversion <= 0 || $cantidad_btc <= 0) {
                            return "Algunos parámetros son inválidos o están vacíos.";
                        }

                        // Llamada al modelo para insertar el depósito
                        $respuesta = ModeloDepositos::mdlInsertDepositoBitcoin($fk_cliente, $fondo, $numero_contrato, $fk_empleado,
                            $fec_liquidacion, $saldo_actual, $clave_interbanc, $fecha_mov_sp, $monto_inversion, $asesor, $tipo_moneda, 
                            $titularCuenta, $precioActual, $idBanco, $cantidad_btc, $montoComision, $montoCompra, $saldo_total);

                        // Verificar si la respuesta es exitosa
                        if ($respuesta) {
                            return $respuesta; // Podrías retornar más detalles del depósito insertado si el modelo los proporciona
                        } else {
                            return "No se pudo insertar el depósito. Verifique los datos proporcionados.";
                        }

                    } catch (Exception $e) {
                        // Registro del error en los logs del sistema
                        error_log("Error en ctrInsertDepositoBitcoin: " . $e->getMessage());

                        // Retornar un mensaje de error más genérico para mostrar al usuario
                        return "Ocurrió un error al insertar el depósito. Por favor, intente nuevamente.";
                    }
                    }


    static public function ctrNumeroContrato($id)
    {
          $respuesta = ModeloDepositos::mdlNumeroContrato($id);

          return $respuesta;
    }
    static public function ctrGerentesPatrimoniales()
    {
          $respuesta = ModeloDepositos::mdlGerentesPatrimoniales();

          return $respuesta;
    }
    static public function ctrAsesoresPatrimoniales()
    {
          $respuesta = ModeloDepositos::mdlAsesoresPatrimoniales();

          return $respuesta;
    }
    static public function ctrprecioMercadoActualBitcoinMxn($fecha_pago)
    {
          $respuesta = ModeloDepositos::mdlprecioMercadoActualBitcoinMxn($fecha_pago);

          return $respuesta;
    }
    static public function ctrprecioMercadoActualBitcoinUsd($fecha_pago)
    {
          $respuesta = ModeloDepositos::mdlprecioMercadoActualBitcoinUsd($fecha_pago);

          return $respuesta;
    }
    static public function ctrInsertContrato($id_cliente, $gerente, $asesor, $fondo, $serie, $numeroContrato)
    {
          $respuesta = ModeloDepositos::mdlInsertContrato($id_cliente, $gerente, $asesor, $fondo, $serie, $numeroContrato);

          return $respuesta;
    }
    static public function ctrContratoActivoSp($contrato, $fk_cliente)
    {
          $respuesta = ModeloDepositos::mdlContratoActivoSp($contrato, $fk_cliente);

          return $respuesta;
    }
    static public function ctrContratoActivoBitcoin($contrato, $fk_cliente,$tipo_moneda)
    {
          $respuesta = ModeloDepositos::mdlContratoActivoBitcoin($contrato, $fk_cliente, $tipo_moneda);

          return $respuesta;
    }
    static public function ctrRendimientoSpResumido($id_cliente,$contrato)
    {
          $respuesta = ModeloDepositos::mdlRendimientoSpResumido($id_cliente,$contrato);

          return $respuesta;
    }


    static public function ctrInfoIdMovBtc($id) {
       
        try {
            $respuesta = ModeloProductos::mdlInfoIdMovBtc($id);
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            error_log("Error en ctrGarantAsesor: " . $e->getMessage());
            return "Ocurrió un error al buscar la garantía del asesor.";
        }
    }
    static public function ctrinsertDetalleBtc($id_mov, $fecha_pago, $num_detalle) {
       
        try {
            $respuesta = ModeloDepositos::mdlinsertDetalleBtc($id_mov, $fecha_pago, $num_detalle);
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            error_log("Error en ctrGarantAsesor: " . $e->getMessage());
            return "Ocurrió un error al buscar la garantía del asesor.";
        }
    }
    
}