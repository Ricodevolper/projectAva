<?php

class ControladorBi{

   
    static public function ctrBiGarantIngreso(){
        try {
         
            $respuesta = ModeloBi::mdlGarantIngreso();
            
           
            if ($respuesta === false) {
                throw new Exception("Error al obtener datos.");
            }
    
            return $respuesta;
        } catch (Exception $e) {
          
            error_log($e->getMessage());
    
           
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }
    static public function ctrSaldoTotalBtc($perfil){
        try {
         
            $respuesta = ModeloBi::mdlSaldoTotalBtc($perfil);
            
           
            if ($respuesta === false) {
                throw new Exception("Error al obtener datos.");
            }
    
            return $respuesta;
        } catch (Exception $e) {
          
            error_log($e->getMessage());
    
           
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }
    static public function ctrTiieInfo($id_garant) {
        // Validación del parámetro
        if (preg_match('/^[0-9]+$/', $id_garant)) {  // Ajusté la expresión regular para permitir solo dígitos
            try {
                // Llamada segura al modelo
                $respuesta = ModeloBi::mdlTiieInfo($id_garant);
    
                // Validación adicional de la respuesta si es necesario
                if ($respuesta === false) {
                    throw new Exception("Error al obtener información del garante.");
                }
    
                return $respuesta;
            } catch (Exception $e) {
                // Registro del error
                error_log($e->getMessage());
    
                // Respuesta segura para no revelar detalles al usuario final
                return array('error' => 'Ocurrió un error al procesar la solicitud.');
            }
        } else {
            // Respuesta en caso de que la validación del parámetro falle
            return array('error' => 'ID de garante inválido.');
        }
    }
    
    static public function ctrBiGarantNuevoCliente(){
     try{
        $respuesta = ModeloBi::mdlGarantNuevoCliente();
        if ($respuesta === false) {
            throw new Exception("Error al obtener datos.");
        }
        return $respuesta;
    } catch (Exception $e) {
          
        error_log($e->getMessage());

       
        return array('error' => 'Ocurrió un error al procesar la solicitud.');
    }
    }
    static public function ctrGarantProximoPago(){
        try{

        $respuesta = ModeloBi::mdlGarantProximoPago();
        if ($respuesta === false) {
            throw new Exception("Error al obtener datos.");
        }
        return $respuesta;
    } catch (Exception $e) {
          
        error_log($e->getMessage());

       
        return array('error' => 'Ocurrió un error al procesar la solicitud.');
    }
        return $respuesta;

    }
    static public function ctrGarantVencidos(){
            try {
        $respuesta = ModeloBi::mdlGarantVencidos();
        if ($respuesta === false) {
            throw new Exception("Error al obtener datos.");
        }
        return $respuesta;
    } catch (Exception $e) {
          
        error_log($e->getMessage());

       
        return array('error' => 'Ocurrió un error al procesar la solicitud.');
    }

    }
    static public function ctrGarantVencidosHoy(){
       try{
        $respuesta = ModeloBi::mdlGarantVencidosHoy();
        if ($respuesta === false) {
            throw new Exception("Error al obtener datos.");
        }
        return $respuesta;
    } catch (Exception $e) {
          
        error_log($e->getMessage());

       
        return array('error' => 'Ocurrió un error al procesar la solicitud.');
    }

    }
    static public function ctrliquidacionesGarant(){
        try {

        $respuesta = ModeloBi::mdlliquidacionesGarant();
        if ($respuesta === false) {
            throw new Exception("Error al obtener datos.");
        }
        return $respuesta;
    } catch (Exception $e) {
          
        error_log($e->getMessage());

       
        return array('error' => 'Ocurrió un error al procesar la solicitud.');
    }

    }
    static public function ctrBiGarantInfo($id_garant) {
        // Validación del parámetro
        if (preg_match('/^[0-9]+$/', $id_garant)) {  // Ajusté la expresión regular para permitir solo dígitos
            try {
                // Llamada segura al modelo
                $respuesta = ModeloBi::mdlBiGarantInfo($id_garant);
    
                // Validación adicional de la respuesta si es necesario
                if ($respuesta === false) {
                    throw new Exception("Error al obtener información del garante.");
                }
    
                return $respuesta;
            } catch (Exception $e) {
                // Registro del error
                error_log($e->getMessage());
    
                // Respuesta segura para no revelar detalles al usuario final
                return array('error' => 'Ocurrió un error al procesar la solicitud.');
            }
        } else {
            // Respuesta en caso de que la validación del parámetro falle
            return array('error' => 'ID de garante inválido.');
        }
    }
    
    static public function ctrLiquidacionesProximas(){
        try{
        $respuesta = ModeloBi::mdlliquidacionesProximas();
        if ($respuesta === false) {
            throw new Exception("Error al obtener datos.");
        }
        return $respuesta;
    } catch (Exception $e) {
          
        error_log($e->getMessage());

       
        return array('error' => 'Ocurrió un error al procesar la solicitud.');
    }
        }

        static public function ctrAsesoresContratosActivos($perfil){
            try {
                $respuesta = ModeloBi::mdlAsesoresContratosActivos($perfil);
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
