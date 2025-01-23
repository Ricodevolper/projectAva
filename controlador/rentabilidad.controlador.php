<?php


class ctrRentabilidad{


    static public function ctrRentabilidadLal(){


        $respuesta = MdlRentabilidad::mdlRentabilidadLal();

        return $respuesta;

    }
    static public function ctrRentabilidadLfa(){


        $respuesta = MdlRentabilidad::mdlRentabilidadLfa();

        return $respuesta;

    }





}