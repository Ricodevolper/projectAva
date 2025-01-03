<?php


class ControladorNotificaciones{

       static public function ctrDetalleBitcoinAplicados(){

            try{
            $respuesta = ModeloNotificaciones::mdlDetalleBitcoinAplicados();
            if ($respuesta === false) {
                throw new Exception("Error al obtener datos.");
            }
            return $respuesta;
        } catch (Exception $e) {
              
            error_log($e->getMessage());
    
           
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
            }
       static public function ctrobtenerNotificacionesNoVistas($id_usuario){

            try{
            $respuesta = ModeloNotificaciones::mdlobtenerNotificacionesNoVistas($id_usuario);
            if ($respuesta === false) {
                throw new Exception("Error al obtener datos.");
            }
            return $respuesta;
        } catch (Exception $e) {
              
            error_log($e->getMessage());
    
           
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
            }
       static public function ctrMarcarNotificacionVista($id_usuario, $id_notificacion){

            try{
            $respuesta = ModeloNotificaciones::mdlMarcarNotificacionVista($id_usuario, $id_notificacion);
            if ($respuesta === false) {
                throw new Exception("Error al obtener datos.");
            }
            return $respuesta;
        } catch (Exception $e) {
              
            error_log($e->getMessage());
    
           
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
            }

       


}