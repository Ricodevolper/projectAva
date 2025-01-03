<?php

class ControladorPmercado{

    static public function ctrPmercado(){
        try {
         
            $respuesta = ModeloPmercado::mdlPmercado();
            
           
            if ($respuesta === false) {
                throw new Exception("Error al obtener datos.");
            }
    
            return $respuesta;
        } catch (Exception $e) {
          
            error_log($e->getMessage());
    
           
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }
    static public function ctrHmercado(){
        try {
         
            $respuesta = ModeloPmercado::mdlHmercado();
            
           
            if ($respuesta === false) {
                throw new Exception("Error al obtener datos.");
            }
    
            return $respuesta;
        } catch (Exception $e) {
          
            error_log($e->getMessage());
    
           
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }
    
    static public function ctrActualizarPmercado($fecha_actualizar,$rel_fondo_serie_porc, $p_mercado){
        try {
             // Validar y sanitizar los datos recibidos
        $fecha_actualizar_sanitizado = filter_var($fecha_actualizar, FILTER_SANITIZE_STRING);
        $rel_fondo_serie_porc_sanitizado = filter_var($rel_fondo_serie_porc, FILTER_SANITIZE_STRING);
        $p_mercado_sanitizado = filter_var($p_mercado, FILTER_SANITIZE_NUMBER_FLOAT);

      $respuesta = ModeloPmercado::mdlActualizarPmercado($fecha_actualizar_sanitizado,$rel_fondo_serie_porc_sanitizado,$p_mercado);
      

       

        } catch (Exception $e) {
            error_log($e->getMessage());
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }
    static public function ctrStatusPmercado0($fecha_actualizar){
        try {
             // Validar y sanitizar los datos recibidos
        $fecha_actualizar_sanitizado = filter_var($fecha_actualizar, FILTER_SANITIZE_STRING);


        $respuesta = ModeloPmercado::mdlStatusPmercado0($fecha_actualizar_sanitizado);
    
       

        } catch (Exception $e) {
            error_log($e->getMessage());
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }
    static public function ctrTasasCetes(){
        try {
        
          $respuesta = ModeloPmercado::mdlTasasCetes();
    
          return $respuesta;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return "<script>
             Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Tasas no encontradas Contacgta a tu administrador'
	});
          </script>";
        }
    }
    static public function ctrTasasCetesFecha($fecha_pago ,$serie){
        try {
        
          $respuesta = ModeloPmercado::mdlTasasCetesFecha($fecha_pago ,$serie);
    
          return $respuesta;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return "<script>
             Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Tasas no encontradas Contacgta a tu administrador'
	});
          </script>";
        }
    }
    static public function ctrTasasCetesFechaNumPago1($fk_id_tiie){
        try {
        
          $respuesta = ModeloPmercado::mdlTasasCetesFechaNumPago1($fk_id_tiie);
    
          return $respuesta;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return "<script>
             Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Tasas no encontradas Contacgta a tu administrador'
	});
          </script>";
        }
    }
    static public function ctrTasasCetesFechaNumPago($fk_id_tiie){
        try {
        
          $respuesta = ModeloPmercado::mdlTasasCetesFechaNumPago($fk_id_tiie);
    
          return $respuesta;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return "<script>
             Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Tasas no encontradas Contacgta a tu administrador'
	});
          </script>";
        }
    }
    static public function ctrTasasTiieFechaNumPago1($fk_id_tiie){
        try {
        
          $respuesta = ModeloPmercado::mdlTasasTiieFechaNumPago1($fk_id_tiie);
    
          return $respuesta;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return "<script>
             Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Tasas no encontradas Contacgta a tu administrador'
	});
          </script>";
        }
    }
    static public function ctrTasasTiieFecha($fecha_pago){
        try {
        
          $respuesta = ModeloPmercado::mdlTasasTiieFecha($fecha_pago);
    
          return $respuesta;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return "<script>
             Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Tasas no encontradas Contacgta a tu administrador'
	});
          </script>";
        }
    }
    static public function ctrTipoCambio($fecha_pago){
        try {
        
          $respuesta = ModeloPmercado::mdlTipoCambio($fecha_pago);
    
          return $respuesta;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return "<script>
             Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Tasas no encontradas Contacgta a tu administrador'
	});
          </script>";
        }
    }
    static public function ctrTasasTiie(){
        try {
        
          $respuesta = ModeloPmercado::mdlTasasTiie();
    
          return $respuesta;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return "<script>
             Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Tasas no encontradas Contacgta a tu administrador'
	});
          </script>";
        }
    }
    static public function ctrTcinfo(){
        try {
        
          $respuesta = ModeloPmercado::mdlTcinfo();
    
          return $respuesta;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return "<script>
             Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Tasas no encontradas Contacgta a tu administrador'
	});
          </script>";
        }
    }
    static public function ctrActualizarinversionSp(){
        try {
             // Validar y sanitizar los datos recibidos
        $respuesta = ModeloPmercado::mdlActualizarinversionSp();

        if ($respuesta == 'ok') {
            $mensaje = "<script>
            Lobibox.notify('success', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent.'
	});
            </script>";
        }else{
            $mensaje = "<script>Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-x-circle',
		msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent.'
	});</script>";
        }

       
       return $mensaje;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }
    static public function ctrActualizarinversionEvent(){
        try {
             // Validar y sanitizar los datos recibidos
        $respuesta = ModeloPmercado::mdlActualizarinversionEvent();

        if ($respuesta == 'ok') {
            $mensaje = "<script>
            Lobibox.notify('success', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent.'
	});
            </script>";
        }else{
            $mensaje = "<script>Lobibox.notify('error', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-x-circle',
		msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent.'
	});</script>";
        }

       
       return $mensaje;

        } catch (Exception $e) {
            error_log($e->getMessage());
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }
    static public function ctrActualizarTasas() {
        try {
            date_default_timezone_set('America/Mexico_City');
    
            $fechaActual = date('Y-m-d');
       
            $maxFechaTiie = ModeloPmercado::mdlMaxFechaTiie();
            $maxFechaCetes = ModeloPmercado::mdlMaxFechaCetes();
    
            // Convertir las fechas a objetos DateTime para asegurar una comparación precisa
            $fechaActualObj = new DateTime($fechaActual);
            $maxFechaTiieObj = new DateTime(trim($maxFechaTiie));
            $maxFechaCetesObj = new DateTime(trim($maxFechaCetes));
    
            // Comparar las fechas
            if ($maxFechaTiieObj == $fechaActualObj && $maxFechaCetesObj == $fechaActualObj) {
                return 'actualizadas';
            } else {
                // Ejecutar las actualizaciones si las fechas no coinciden
                $tiie = ModeloPmercado::mdlActualizarTasasTiie($maxFechaTiie, $fechaActual);
                $cetes = ModeloPmercado::mdlActualizarTasasCetes($maxFechaCetes, $fechaActual);
    
                if ($tiie) {
                    return 'ok';
                } else {
                    return 'error';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }
    static public function ctrPmercado500(){
        try {
         
            $respuesta = ModeloPmercado::mdlPmercado500();
            
           
            if ($respuesta === false) {
                throw new Exception("Error al obtener datos.");
            }
    
            return $respuesta;
        } catch (Exception $e) {
          
            error_log($e->getMessage());
    
           
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }
     static public function ctrfechasActivasSp($fecha){
        try {
         
            $respuesta = ModeloPmercado::mdlfechasActivasSp($fecha);
            
           
            if ($respuesta === false) {
                throw new Exception("Error al obtener datos.");
            }
    
            return $respuesta;
        } catch (Exception $e) {
          
            error_log($e->getMessage());
    
           
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }
    
      static public function ctrPrecioAnteriorSp500($fecha){
        try {
         
            $respuesta = ModeloPmercado::mdlPrecioAnteriorSp500($fecha);
            
           
            if ($respuesta === false) {
                throw new Exception("Error al obtener datos.");
            }
    
            return $respuesta;
        } catch (Exception $e) {
          
            error_log($e->getMessage());
    
           
            return array('error' => 'Ocurrió un error al procesar la solicitud.');
        }
    }

    static public function ctrInsertarPmercadoSp500($fecha,$precioActual,$porcentaje){
        try {
         
            $respuesta = ModeloPmercado::mdlInsertarPmercadoSp500($fecha,$precioActual,$porcentaje);
            
           
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

