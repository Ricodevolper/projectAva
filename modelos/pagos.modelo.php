<?php


class ModeloPagos {

    static public function mdlPagosPendientesTiieCetes(){
        try{
            $stmt = Conexion::conectar()->prepare("SELECT 
                    CONCAT(cli.nombre_clte, ' ', cli.apaterno_clte, ' ', cli.amaterno_clte) AS nombre_cliente, -- Concatenación del nombre completo
                    c.*, -- Todos los campos de tbl_clientes_tiie
                    d.*  -- Todos los campos de tbl_detalle_tiie
                FROM 
                    tbl_clientes_tiie c
                JOIN 
                    tbl_detalle_tiie d 
                ON 
                    c.id_mov_tiie = d.fk_id_tiie
                JOIN 
                    tbl_clientes cli 
                ON 
                    c.fk_cliente = cli.id_cliente
                WHERE 
                    c.status_contrato = 1
                    AND d.status_pago = 0
                    AND d.fecha_pago <= CURDATE();

                    ");

          
            $stmt->execute();
            $resultados = $stmt->fetchAll();
        
            // Cerrar el cursor, no la conexión
            $stmt->closeCursor();
        
            // Devolver los resultados
            return $resultados;
        } catch (PDOException $e) {
            // Registro del error
            error_log("Error en mdlGarantIngreso: " . $e->getMessage());
    
            // Devolver un valor de error o lanzar una excepción personalizada
            return array('error' => 'Ocurrió un error al consultar la base de datos.');
        }
     
        }
        static public function mdlPagoDetalleTiie($id_detalle_tiie, $interes, $tasa, $tcStrike) {
            try {
                // Preparar la consulta
                $stmt = Conexion::conectar()->prepare("
                    UPDATE tbl_detalle_tiie
                    SET tasa = :nuevo_valor_tasa,
                        t_cam_strike = :nuevo_valor_strike,
                        strike = :interes,
                        interes = :nuevo_valor_interes,
                        status_pago = 1
                    WHERE id_detalle_tiie = :valor_id
                ");
        
                // Enlazar parámetros
                $stmt->bindParam(':valor_id', $id_detalle_tiie, PDO::PARAM_INT);
                $stmt->bindParam(':nuevo_valor_tasa', $tasa, PDO::PARAM_STR);
                $stmt->bindParam(':nuevo_valor_strike', $tcStrike, PDO::PARAM_STR);
                $stmt->bindParam(':interes', $interes, PDO::PARAM_STR);
                $stmt->bindParam(':nuevo_valor_interes', $interes, PDO::PARAM_STR);
        
                // Ejecutar la consulta
                if ($stmt->execute()) {
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Pago aplicado',
                            text: 'El pago ha sido registrado exitosamente.',
                            timer: 3000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = 'pagosPendientes';
                        });
                    </script>";
                } else {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudo aplicar el pago.',
                            timer: 3000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = 'pagosPendientes';
                        });
                    </script>";
                }
                
        
                // Cerrar el cursor
                $stmt->closeCursor();
            } catch (PDOException $e) {
                // Registro del error
                error_log("Error en ctrPagoDetalleTiie: " . $e->getMessage());
        
                // Mostrar alerta de error
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error en el sistema.',
                        timer: 3000,
                        showConfirmButton: false
                    });
                </script>";
            }
        }
        

    }
