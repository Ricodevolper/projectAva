<?php

class ControladorSimulador {

    // Añade "function" para definir un método
    static public function ctrSimuladorGarantmxn(  $montob) {

        $consulta = ModeloSimulador::mdlSimuladorGarantmxn( $montob);
        return $consulta;

}
    static public function ctrSimuladorGarantusd(  $montob) {

        $consulta = ModeloSimulador::mdlSimuladorGarantusd( $montob);
        return $consulta;

}


}


