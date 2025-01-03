<?php


class ControladorPagos{
    static public function  ctrPagosPendientesTiieCetes(){

        $resultado = ModeloPagos::mdlPagosPendientesTiieCetes();


        return $resultado;

    }

     static public function  ctrretrocederUnMesDiaHabil($fecha_pago) {
       
        $fecha = new DateTime($fecha_pago);
    
        // Retroceder un mes
        $fecha->modify('-1 month');
    
        // Ajustar al último día del mes si es necesario
        $ultimoDiaMes = $fecha->format('t'); // Último día del mes
        if ((int)$fecha->format('d') > $ultimoDiaMes) {
            $fecha->setDate((int)$fecha->format('Y'), (int)$fecha->format('m'), $ultimoDiaMes);
        }
    
        // Asegurarse de que caiga en un día hábil
        $diaSemana = (int)$fecha->format('N'); // 1 para lunes, 7 para domingo
        if ($diaSemana >= 6) { // Si es sábado (6) o domingo (7)
            $diasARestar = $diaSemana - 5; // Retrocede para llegar al viernes
            $fecha->modify("-{$diasARestar} days");
        }
    
        // Devolver la fecha ajustada en formato YYYY-MM-DD
        return $fecha->format('Y-m-d');
    }
    static public function  ctrPagoDetalleTiie($id_detalle_tiie,$interes,$tasa,$tcStrike){

        $resultado = ModeloPagos::mdlPagoDetalleTiie($id_detalle_tiie,$interes,$tasa,$tcStrike);


        return $resultado;

    }
}