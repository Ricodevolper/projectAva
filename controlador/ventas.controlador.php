<?php

class ControladorVentas{

    
    static public function ctrVentasTotal(){

       $respuesta = ModeloVentas::mdlVentasTotal();

       return $respuesta;


    }
    static public function ctrPromedioTicket(){

       $respuesta = ModeloVentas::mdlPromedioTicket();

       return $respuesta;


    }
    static public function ctrPromedioDiario(){

       $respuesta = ModeloVentas::mdlPromedioDiario();

       return $respuesta;


    }
    static public function ctrVentasMensuales(){

       $respuesta = ModeloVentas::mdlVentasMensuales();

       return $respuesta;


    }
    static public function ctrArticulosMasVendidos(){

       $respuesta = ModeloVentas::mdlArticulosMasVendidos();

       return $respuesta;


    }


}