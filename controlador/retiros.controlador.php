<?php

class ControladorRetiros{
    
     static public function ctrRetirosEvent() {
          if (isset($_POST["id_cliente"])) {
              $id_cliente = htmlspecialchars(strip_tags($_POST["id_cliente"]));
      
              if (preg_match('/^[a-zA-Z0-9 ]+$/', $id_cliente)) {
                  try {
                      $respuesta = ModeloRetiros::mdlRetirosEvent($id_cliente);
      
                      if ($respuesta) {
                          return $respuesta;
                      } else {
                          return "No se encontraron datos de retiros Event.";
                      }
                  } catch (Exception $e) {
                      error_log("Error en ctrRetirosEvent: " . $e->getMessage());
                      return "Ocurrió un error al buscar los datos de retiros Event.";
                  }
              } else {
                  return "Formato de id_cliente no válido.";
              }
          } else {
              return "No se proporcionó id_cliente.";
          }
      }
      
      static public function ctrRetirosGarant() {
          if (isset($_POST["id_cliente"])) {
              $id_cliente = htmlspecialchars(strip_tags($_POST["id_cliente"]));
      
              if (preg_match('/^[a-zA-Z0-9 ]+$/', $id_cliente)) {
                  try {
                      $respuesta = ModeloRetiros::mdlRetirosGarant($id_cliente);
      
                      if ($respuesta) {
                          return $respuesta;
                      } else {
                          return "No se encontraron datos de retiros Garant.";
                      }
                  } catch (Exception $e) {
                      error_log("Error en ctrRetirosGarant: " . $e->getMessage());
                      return "Ocurrió un error al buscar los datos de retiros Garant.";
                  }
              } else {
                  return "Formato de id_cliente no válido.";
              }
          } else {
              return "No se proporcionó id_cliente.";
          }
      }
      
      static public function ctrRetirosLq() {
          if (isset($_POST["id_cliente"])) {
              $id_cliente = htmlspecialchars(strip_tags($_POST["id_cliente"]));
      
              if (preg_match('/^[a-zA-Z0-9 ]+$/', $id_cliente)) {
                  try {
                      $respuesta = ModeloRetiros::mdlRetirosLq($id_cliente);
      
                      if ($respuesta) {
                          return $respuesta;
                      } else {
                          return "No se encontraron datos de retiros Lq.";
                      }
                  } catch (Exception $e) {
                      error_log("Error en ctrRetirosLq: " . $e->getMessage());
                      return "Ocurrió un error al buscar los datos de retiros Lq.";
                  }
              } else {
                  return "Formato de id_cliente no válido.";
              }
          } else {
              return "No se proporcionó id_cliente.";
          }
      }
      
      static public function ctrRetirosTiie() {
          if (isset($_POST["id_cliente"])) {
              $id_cliente = htmlspecialchars(strip_tags($_POST["id_cliente"]));
      
              if (preg_match('/^[a-zA-Z0-9 ]+$/', $id_cliente)) {
                  try {
                      $respuesta = ModeloRetiros::mdlRetirosTiie($id_cliente);
      
                      if ($respuesta) {
                          return $respuesta;
                      } else {
                          return "No se encontraron datos de retiros Tiie.";
                      }
                  } catch (Exception $e) {
                      error_log("Error en ctrRetirosTiie: " . $e->getMessage());
                      return "Ocurrió un error al buscar los datos de retiros Tiie.";
                  }
              } else {
                  return "Formato de id_cliente no válido.";
              }
          } else {
              return "No se proporcionó id_cliente.";
          }
      }
      
      static public function ctrRetirosStable() {
          if (isset($_POST["id_cliente"])) {
              $id_cliente = htmlspecialchars(strip_tags($_POST["id_cliente"]));
      
              if (preg_match('/^[a-zA-Z0-9 ]+$/', $id_cliente)) {
                  try {
                      $respuesta = ModeloRetiros::mdlRetirosStable($id_cliente);
      
                      if ($respuesta) {
                          return $respuesta;
                      } else {
                          return "No se encontraron datos de retiros Stable.";
                      }
                  } catch (Exception $e) {
                      error_log("Error en ctrRetirosStable: " . $e->getMessage());
                      return "Ocurrió un error al buscar los datos de retiros Stable.";
                  }
              } else {
                  return "Formato de id_cliente no válido.";
              }
          } else {
              return "No se proporcionó id_cliente.";
          }
      }
      
      static public function ctrAnualGarant() {
          try {
              $respuesta = ModeloRetiros::mdlAnualGarant();
      
              if ($respuesta) {
                  return $respuesta;
              } else {
                  return "No se encontraron datos anuales de Garant.";
              }
          } catch (Exception $e) {
              error_log("Error en ctrAnualGarant: " . $e->getMessage());
              return "Ocurrió un error al buscar los datos anuales de Garant.";
          }
      }
      
      static public function ctrMensualGarant() {
          try {
              $respuesta = ModeloRetiros::mdlMensualGarant();
      
              if ($respuesta) {
                  return $respuesta;
              } else {
                  return "No se encontraron datos mensuales de Garant.";
              }
          } catch (Exception $e) {
              error_log("Error en ctrMensualGarant: " . $e->getMessage());
              return "Ocurrió un error al buscar los datos mensuales de Garant.";
          }
      }
      
      static public function ctrRetirosClienteSP($id_cliente) {
          try {
              $respuesta = ModeloRetiros::mdlRetirosClientesSP($id_cliente);
      
              if ($respuesta) {
                  return $respuesta;
              } else {
                  return "";
              }
          } catch (Exception $e) {
              error_log("Error en ctrMensualGarant: " . $e->getMessage());
              return "Ocurrió un error al buscar los datos mensuales de Garant.";
          }
      }
      static public function ctrDetalleRetiroBtc($id_mov) {
          try {
              $respuesta = ModeloRetiros::mdlDetalleRetiroBtc($id_mov);
      
              if ($respuesta) {
                  return $respuesta;
              } else {
                  return "";
              }
          } catch (Exception $e) {
              error_log("Error en ctrMensualGarant: " . $e->getMessage());
              return "Ocurrió un error al buscar los datos mensuales de Garant.";
          }
      }
      static public function ctrRetirosClienteEvent($id_cliente) {
          try {
              $respuesta = ModeloRetiros::mdlRetirosClientesEvent($id_cliente);
      
              if ($respuesta) {
                  return $respuesta;
              } else {
                  return "";
              }
          } catch (Exception $e) {
              error_log("Error en ctrMensualGarant: " . $e->getMessage());
              return "Ocurrió un error al buscar los datos mensuales de Garant.";
          }
      }
      static public function ctrRetirosClienteBitcoin($id_cliente) {
          try {
              $respuesta = ModeloRetiros::mdlRetirosClienteBitcoin($id_cliente);
      
              if ($respuesta) {
                  return $respuesta;
              } else {
                  return "";
              }
          } catch (Exception $e) {
              error_log("Error en ctrMensualGarant: " . $e->getMessage());
              return "Ocurrió un error al buscar los datos mensuales de Garant.";
          }
      }

      static public function ctrretiroSpSolicitud()
      {
       $respuesta = ModeloRetiros::mdlretiroSpSolicitud();

      }
      static public function ctrretiroSpSolicitudActiva()
      {
       $respuesta = ModeloRetiros::mdlretiroSpSolicitudActiva();
       return $respuesta;

      }

      static public function ctrRetiroSp( $nombre_cliente, $id_cliente, $id_mov, $t_moneda, $precio_compra, $max_precio, $dias_rendimiento, 
      $num_contrato, $saldo_total, $rendimiento_neto, $nuevo_total, $tasa_rendimiento, $idBanco, $numeroCuenta, $clave_interbanc, $titularCuenta, $fondo, 
      $fecha_movsp, $fec_liquidacion, $idmov){
        $respuesta = ModeloRetiros::mdlRetiroSp( $nombre_cliente, $id_cliente, $id_mov, $t_moneda, $precio_compra, $max_precio, $dias_rendimiento, 
        $num_contrato, $saldo_total, $rendimiento_neto, $nuevo_total, $tasa_rendimiento, $idBanco, $numeroCuenta, $clave_interbanc, $titularCuenta, $fondo, 
        $fecha_movsp, $fec_liquidacion, $idmov);
        return $respuesta;

      }
      static public function ctrLiquidarDepositoSp( $idmov){
        $respuesta = ModeloRetiros::mdlLiquidarDepositoSp( $idmov);
        return $respuesta;

      }
      static public function ctrTasacetes( ){
        $respuesta = ModeloRetiros::mdlTasacetes( );
        return $respuesta;

      }
      
}