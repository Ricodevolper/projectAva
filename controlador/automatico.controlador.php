<?php



class ControladorAutomatico
{


    static public function ctrInicio()

    {
        $mensaje = '';
        $fechaHoy = date("Y-m-d");


        $revision = ModeloAutomatico::mdlRevisonFecha($fechaHoy);




        if ($revision  == 'go') {
            $insertPrecioBitcoin = ModeloAutomatico::mdlInsertPrecioBitcoin($fechaHoy);
            $insertPrecioBitcoin = ModeloAutomatico::mdlInsertPrecioBitcoinUsd($fechaHoy);
            $detalleBitcoinMxn = ModeloAutomatico::mdlDetalleBitcoinmxn($fechaHoy);
            if ($detalleBitcoinMxn != '') {
                foreach ($detalleBitcoinMxn as $detalle) {
                    $precioActual = ControladorDepositos::ctrprecioMercadoActualBitcoinMxn($detalle['fecha_pago']);
                     if ($precioActual != '') {
                  
                    $saldo_btc = ModeloAutomatico::mdlSaldoBtc($detalle['fk_id_mov_btc']);

                       

                             $saldo_moneda = $precioActual['p_mercado'] * $saldo_btc['saldo_btc'];

                          $cupon = $saldo_moneda * 0.01;

                             $response = ModeloAutomatico::mdlactuLiquidoDetalleBitcoin($detalle['id_mov_dbit'], $cupon, $precioActual['p_mercado']);

                            if ($response != '') {
                                if ($response == 'Error') {
                                    $insertNotificacion = ModeloAutomatico::mdlNotificaciones('Cupón  Bitcoin', 'Error', 'tbl_notificaions',$detalle['id_mov_dbit']);
                                }else {
                                    $insertNotificacion = ModeloAutomatico::mdlNotificaciones('Cupón  Bitcoin', $response, 'tbl_notificaions',$detalle['id_mov_dbit']);
                   
                                }
                                        }

                            
                             
                             $mensaje = 'ejecutado' ;
                   }
                }
            }
            $detalleBitcoin = ModeloAutomatico::mdlDetalleBitcoinUsd($fechaHoy);
            if ($detalleBitcoin != '') {
                foreach ($detalleBitcoin as $detalle) {
                          $precioActual = ControladorDepositos::ctrprecioMercadoActualBitcoinUsd($detalle['fecha_pago']);
             
                   if ($precioActual != '') {
                  
                    $saldo_btc = ModeloAutomatico::mdlSaldoBtc($detalle['fk_id_mov_btc']);

                       

                             $saldo_moneda = $precioActual['p_mercado'] * $saldo_btc['saldo_btc'];

                          $cupon = $saldo_moneda * 0.01;

                             $response = ModeloAutomatico::mdlactuLiquidoDetalleBitcoin($detalle['id_mov_dbit'], $cupon, $precioActual['p_mercado']);

                            if ($response != '') {
                                if ($response == 'Error') {
                                    $insertNotificacion = ModeloAutomatico::mdlNotificaciones('Cupón  Bitcoin Usd', 'Error', 'tbl_notificaions',$detalle['id_mov_dbit']);
                                }else {
                                    $insertNotificacion = ModeloAutomatico::mdlNotificaciones('Cupón  Bitcoin Usd', $response, 'tbl_notificaions',$detalle['id_mov_dbit']);
                   
                                }
                                        }

                            
                             
                             $mensaje = 'ejecutado' ;
                   }
                }
            }
            
            $insertFecha = ModeloAutomatico::mdlInsertFechaAutomatico($fechaHoy);
        }else{
            $mensaje = '';
        }

        return $mensaje;
    }
}
