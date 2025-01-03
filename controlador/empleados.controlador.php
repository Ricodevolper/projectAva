<?php


class ControladorEmpleado {

    static public function ctrDatosEmpleados($id) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id)) {
            try {
                $respuesta = ModeloEmpleados::mdlDatosEmpleados($id);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrDatosEmpleados: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos del empleado.";
            }
        }
        return "ID no válido.";
    }
    
    static public function ctrDatosGarant($id) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id)) {
            try {
                $respuesta = ModeloEmpleados::mdlDatosGarant($id);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrDatosGarant: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos de garantía.";
            }
        }
        return "ID no válido.";
    }
    static public function ctrDatosSp($id) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id)) {
            try {
                $respuesta = ModeloEmpleados::mdlDatosSp($id);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrDatosStable: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos estables.";
            }
        }
        return "ID no válido.";
    }
    static public function ctrDatosBtc($id) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id)) {
            try {
                $respuesta = ModeloEmpleados::mdlDatosBtc($id);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrDatosStable: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos estables.";
            }
        }
        return "ID no válido.";
    }
    static public function ctrMensualSp($id, $moneda) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id) && preg_match('/^[a-zA-Z0-9]+$/', $moneda)) {
            try {
                $respuesta = ModeloEmpleados::mdlMensualSp($id, $moneda);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrMensualGarant: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos mensuales de garantía.";
            }
        }
        return "ID o moneda no válidos.";
    }
    
    static public function ctrDatosLq($id) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id)) {
            try {
                $respuesta = ModeloEmpleados::mdlDatosLq($id);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrDatosLq: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos de liquidación.";
            }
        }
        return "ID no válido.";
    }
    
    static public function ctrDatosEvent($id) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id)) {
            try {
                $respuesta = ModeloEmpleados::mdlDatosEvent($id);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrDatosEvent: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos del evento.";
            }
        }
        return "ID no válido.";
    }
    
    static public function ctrDatosStable($id) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id)) {
            try {
                $respuesta = ModeloEmpleados::mdlDatosStable($id);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrDatosStable: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos estables.";
            }
        }
        return "ID no válido.";
    }
    
    static public function ctrDatosTiie($id) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id)) {
            try {
                $respuesta = ModeloEmpleados::mdlDatosTiie($id);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrDatosTiie: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos de TIIE.";
            }
        }
        return "ID no válido.";
    }
    
    static public function ctrMensualGarant($id, $moneda) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id) && preg_match('/^[a-zA-Z0-9]+$/', $moneda)) {
            try {
                $respuesta = ModeloEmpleados::mdlMensualGarant($id, $moneda);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrMensualGarant: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos mensuales de garantía.";
            }
        }
        return "ID o moneda no válidos.";
    }
    
    static public function ctrMensualTiie($id) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id)) {
            try {
                $respuesta = ModeloEmpleados::mdlMensualTiie($id);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrMensualTiie: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos mensuales de TIIE.";
            }
        }
        return "ID no válido.";
    }
    
    static public function ctrMensualEvent($id) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $id)) {
            try {
                $respuesta = ModeloEmpleados::mdlMensualEvent($id);
                return $respuesta;
            } catch (Exception $e) {
                error_log("Error en ctrMensualEvent: " . $e->getMessage());
                return "Ocurrió un error al obtener los datos mensuales del evento.";
            }
        }
        return "ID no válido.";
    }
    
}
