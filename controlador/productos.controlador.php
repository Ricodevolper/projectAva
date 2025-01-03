<?php
class ControladorProductos {

    static public function ctrContratoEvent($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlContratoEvent($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró el contrato para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrContratoEvent: " . $e->getMessage());
                return "Ocurrió un error al buscar el contrato.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    static public function ctrHistoricoClienteEvent($id,$producto) {
        $id_tiie = htmlspecialchars(strip_tags($id));
    
        try {
            $respuesta = ModeloProductos::mdlHistoricoClienteEvent($id,$producto);
            
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró la garantía del asesor para el ID proporcionado.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrGarantAsesor: " . $e->getMessage());
            return "Ocurrió un error al buscar la garantía del asesor.";
        }
    }
    
    static public function ctrContratoLq($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlContratoLq($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró el contrato para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrContratoLq: " . $e->getMessage());
                return "Ocurrió un error al buscar el contrato.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    
    static public function ctrContratoLq7($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlContratoLq7($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró el contrato para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrContratoLq7: " . $e->getMessage());
                return "Ocurrió un error al buscar el contrato.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    
    static public function ctrContratoEvent1($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlContratoEvent1($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró el contrato para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrContratoEvent1: " . $e->getMessage());
                return "Ocurrió un error al buscar el contrato.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    
    static public function ctrContratoEvent7($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlContratoEvent7($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró el contrato para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrContratoEvent7: " . $e->getMessage());
                return "Ocurrió un error al buscar el contrato.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    
    static public function ctrSaldoEvent($id, $contrato) {
        $id = htmlspecialchars(strip_tags($id));
        $contrato = htmlspecialchars(strip_tags($contrato));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id) && preg_match('/^[a-zA-Z0-9 ]+$/', $contrato)) {
            try {
                $respuesta = ModeloProductos::mdlSaldoEvent($id, $contrato);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró el saldo para el ID y contrato proporcionados.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrSaldoEvent: " . $e->getMessage());
                return "Ocurrió un error al buscar el saldo.";
            }
        } else {
            return "El ID o el contrato contienen caracteres no permitidos.";
        }
    }
    
    static public function ctrSaldoEvent1($id, $contrato) {
        $id = htmlspecialchars(strip_tags($id));
        $contrato = htmlspecialchars(strip_tags($contrato));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id) && preg_match('/^[a-zA-Z0-9 ]+$/', $contrato)) {
            try {
                $respuesta = ModeloProductos::mdlSaldoEvent1($id, $contrato);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró el saldo para el ID y contrato proporcionados.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrSaldoEvent1: " . $e->getMessage());
                return "Ocurrió un error al buscar el saldo.";
            }
        } else {
            return "El ID o el contrato contienen caracteres no permitidos.";
        }
    }
    
    static public function ctrSaldoLq1($id, $contrato) {
        $id = htmlspecialchars(strip_tags($id));
        $contrato = htmlspecialchars(strip_tags($contrato));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id) && preg_match('/^[a-zA-Z0-9 ]+$/', $contrato)) {
            try {
                $respuesta = ModeloProductos::mdlSaldoLq1($id, $contrato);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró el saldo para el ID y contrato proporcionados.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrSaldoLq1: " . $e->getMessage());
                return "Ocurrió un error al buscar el saldo.";
            }
        } else {
            return "El ID o el contrato contienen caracteres no permitidos.";
        }
    }
    
    static public function ctrSaldoLq7($id, $contrato) {
        $id = htmlspecialchars(strip_tags($id));
        $contrato = htmlspecialchars(strip_tags($contrato));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id) && preg_match('/^[a-zA-Z0-9 ]+$/', $contrato)) {
            try {
                $respuesta = ModeloProductos::mdlSaldoLq7($id, $contrato);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró el saldo para el ID y contrato proporcionados.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrSaldoLq7: " . $e->getMessage());
                return "Ocurrió un error al buscar el saldo.";
            }
        } else {
            return "El ID o el contrato contienen caracteres no permitidos.";
        }
    }
    
    static public function ctrSaldoGarant($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlSaldoGarant($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró el saldo para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrSaldoGarant: " . $e->getMessage());
                return "Ocurrió un error al buscar el saldo.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    
    static public function ctrSaldoGarantUsd($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlSaldoGarantUsd($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró el saldo para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrSaldoGarantUsd: " . $e->getMessage());
                return "Ocurrió un error al buscar el saldo.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    
    static public function ctrGarant($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlGarant($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró la garantía para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrGarant: " . $e->getMessage());
                return "Ocurrió un error al buscar la garantía.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    
    static public function ctrGarantUsd($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlGarantUsd($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró la garantía para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrGarantUsd: " . $e->getMessage());
                return "Ocurrió un error al buscar la garantía.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    
    static public function ctrTiie($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlTiee($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró la TIIE para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrTiie: " . $e->getMessage());
                return "Ocurrió un error al buscar la TIIE.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    
    static public function ctrSp($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlSp($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró la TIIE para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrTiie: " . $e->getMessage());
                return "Ocurrió un error al buscar la TIIE.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    static public function ctrBitcoin($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $id)) {
            try {
                $respuesta = ModeloProductos::mdlBitcoin($id);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontró la TIIE para el ID proporcionado.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrTiie: " . $e->getMessage());
                return "Ocurrió un error al buscar la TIIE.";
            }
        } else {
            return "El ID contiene caracteres no permitidos.";
        }
    }
    static public function ctrSaldoTotalSp() {
        try {
            $respuesta = ModeloProductos::mdlSaldoTotalSp();
    
            if ($respuesta !== false) {
                return $respuesta;
            } else {
                return "No se encontró el saldo total sp.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrSaldoTotalStable: " . $e->getMessage());
            return "Ocurrió un error al buscar el saldo total estable.";
        }
    }
    
    
    static public function ctrEjecucionesEvent($mes, $year) {
        $mes = htmlspecialchars(strip_tags($mes));
        $year = htmlspecialchars(strip_tags($year));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $mes) && preg_match('/^[a-zA-Z0-9 ]+$/', $year)) {
            try {
                $respuesta = ModeloProductos::mdlEjecucionesEvent($mes, $year);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontraron ejecuciones para el mes y año proporcionados.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrEjecucionesEvent: " . $e->getMessage());
                return "Ocurrió un error al buscar las ejecuciones.";
            }
        } else {
            return "El mes o el año contienen caracteres no permitidos.";
        }
    }
    static public function ctrHistoricoCliente($id,$producto) {
        $id_tiie = htmlspecialchars(strip_tags($id));
    
        try {
            $respuesta = ModeloProductos::mdlHistoricoCliente($id,$producto);
            
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró la garantía del asesor para el ID proporcionado.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrGarantAsesor: " . $e->getMessage());
            return "Ocurrió un error al buscar la garantía del asesor.";
        }
    }
    static public function ctrEjecucionesLq($mes, $year) {
        $mes = htmlspecialchars(strip_tags($mes));
        $year = htmlspecialchars(strip_tags($year));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $mes) && preg_match('/^[a-zA-Z0-9 ]+$/', $year)) {
            try {
                $respuesta = ModeloProductos::mdlEjecucionesLq($mes, $year);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontraron ejecuciones para el mes y año proporcionados.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrEjecucionesLq: " . $e->getMessage());
                return "Ocurrió un error al buscar las ejecuciones.";
            }
        } else {
            return "El mes o el año contienen caracteres no permitidos.";
        }
    }
    
    static public function ctrEjecucionesEventAplicadas($mes, $year) {
        $mes = htmlspecialchars(strip_tags($mes));
        $year = htmlspecialchars(strip_tags($year));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $mes) && preg_match('/^[a-zA-Z0-9 ]+$/', $year)) {
            try {
                $respuesta = ModeloProductos::mdlEjecucionesEventAplicadas($mes, $year);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontraron ejecuciones aplicadas para el mes y año proporcionados.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrEjecucionesEventAplicadas: " . $e->getMessage());
                return "Ocurrió un error al buscar las ejecuciones aplicadas.";
            }
        } else {
            return "El mes o el año contienen caracteres no permitidos.";
        }
    }
    
    static public function ctrEjecucionesLqAplicadas($mes, $year) {
        $mes = htmlspecialchars(strip_tags($mes));
        $year = htmlspecialchars(strip_tags($year));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $mes) && preg_match('/^[a-zA-Z0-9 ]+$/', $year)) {
            try {
                $respuesta = ModeloProductos::mdlEjecucionesLqAplicadas($mes, $year);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontraron ejecuciones aplicadas para el mes y año proporcionados.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrEjecucionesLqAplicadas: " . $e->getMessage());
                return "Ocurrió un error al buscar las ejecuciones aplicadas.";
            }
        } else {
            return "El mes o el año contienen caracteres no permitidos.";
        }
    }
    static public function ctrMaxFechaTiie($id_tiie) {
        $id_tiie = htmlspecialchars(strip_tags($id_tiie));
    
        try {
            $respuesta = ModeloProductos::mdlMaxFechaTiie($id_tiie);
            
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró la garantía del asesor para el ID proporcionado.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrGarantAsesor: " . $e->getMessage());
            return "Ocurrió un error al buscar la garantía del asesor.";
        }
    }

    static public function ctrGarantMaxFechaPago($id_garant) {
        $id_garant = htmlspecialchars(strip_tags($id_garant));
    
        try {
            $respuesta = ModeloProductos::mdlGarantMaxFechaPago($id_garant);
            
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró la garantía del asesor para el ID proporcionado.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrGarantAsesor: " . $e->getMessage());
            return "Ocurrió un error al buscar la garantía del asesor.";
        }
    }
    
    static public function ctrDepositosLq($mes, $year) {
        $mes = htmlspecialchars(strip_tags($mes));
        $year = htmlspecialchars(strip_tags($year));
    
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $mes) && preg_match('/^[a-zA-Z0-9 ]+$/', $year)) {
            try {
                $respuesta = ModeloProductos::mdlDepositosLq($mes, $year);
    
                if ($respuesta) {
                    return $respuesta;
                } else {
                    return "No se encontraron depósitos para el mes y año proporcionados.";
                }
            } catch (Exception $e) {
                error_log("Error en ctrDepositosLq: " . $e->getMessage());
                return "Ocurrió un error al buscar los depósitos.";
            }
        } else {
            return "El mes o el año contienen caracteres no permitidos.";
        }
    }
    
    static public function ctrSaldoTotalEvent() {
        try {
            $respuesta = ModeloProductos::mdlSaldoTotalEvent();
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró el saldo total de eventos.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrSaldoTotalEvent: " . $e->getMessage());
            return "Ocurrió un error al buscar el saldo total de eventos.";
        }
    }
    
    static public function ctrSaldoTotalStable() {
        try {
            $respuesta = ModeloProductos::mdlSaldoTotalStable();
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró el saldo total estable.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrSaldoTotalStable: " . $e->getMessage());
            return "Ocurrió un error al buscar el saldo total estable.";
        }
    }
    
    static public function ctrSaldoTotalTiie() {
        try {
            $respuesta = ModeloProductos::mdlSaldoTotalTiie();
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró el saldo total de TIIE.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrSaldoTotalTiie: " . $e->getMessage());
            return "Ocurrió un error al buscar el saldo total de TIIE.";
        }
    }
    
    static public function ctrSaldoTotalLq() {
        try {
            $respuesta = ModeloProductos::mdlSaldoTotalLq();
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró el saldo total de liquidez.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrSaldoTotalLq: " . $e->getMessage());
            return "Ocurrió un error al buscar el saldo total de liquidez.";
        }
    }
    
    static public function ctrSaldoTotalGarant() {
        try {
            $respuesta = ModeloProductos::mdlSaldoTotalGarant();
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró el saldo total de garantías.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrSaldoTotalGarant: " . $e->getMessage());
            return "Ocurrió un error al buscar el saldo total de garantías.";
        }
    }
    
    static public function ctrGarantActivo() {
        try {
            $respuesta = ModeloProductos::mdlGarantActivo();
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró el activo garantizado.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrGarantActivo: " . $e->getMessage());
            return "Ocurrió un error al buscar el activo garantizado.";
        }
    }
    
    static public function ctrGarantAsesor($id) {
        $id = htmlspecialchars(strip_tags($id));
    
        try {
            $respuesta = ModeloProductos::mdlGarantAsesor($id);
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró la garantía del asesor para el ID proporcionado.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrGarantAsesor: " . $e->getMessage());
            return "Ocurrió un error al buscar la garantía del asesor.";
        }
    }
    static public function ctrSaldoSp($id,$numeroContrato) {
       
        try {
            $respuesta = ModeloProductos::mdlSaldoSp($id,$numeroContrato);
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return "No se encontró la garantía del asesor para el ID proporcionado.";
            }
        } catch (Exception $e) {
            error_log("Error en ctrGarantAsesor: " . $e->getMessage());
            return "Ocurrió un error al buscar la garantía del asesor.";
        }
    }
    static public function ctrSaldoBitcoin($id,$numeroContrato, $tipo_moneda) {
       
        try {
            $respuesta = ModeloProductos::mdlSaldoBitcoin($id,$numeroContrato, $tipo_moneda , $tipo_moneda);
    
            if ($respuesta) {
                return $respuesta;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            error_log("Error en ctrGarantAsesor: " . $e->getMessage());
            return "Ocurrió un error al buscar la garantía del asesor.";
        }
    }
    
  

}
