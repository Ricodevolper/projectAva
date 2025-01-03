<?php



class ModeloClientes
{


    static public function mdlBuscarCliente($nombre, $perfil)
    {
        try {
            // Sanitizar la entrada
            $nombre = htmlspecialchars(trim($nombre));

           if ($perfil == 'DirectorAvawm') {
            $query = "SELECT tbl_clientes.*, CONCAT(tbl_clientes.nombre_clte,' ',tbl_clientes.apaterno_clte,' ',tbl_clientes.amaterno_clte) AS cliente,cat_localidad.nom_localidad,cat_municipio.desc_municipio,cat_estado.nom_estado,CONCAT_WS(' ',nombre_promotor,apaterno_promotor,amaterno_promotor) AS nombre_asesor FROM tbl_clientes 
            LEFT JOIN cat_localidad ON tbl_clientes.fk_localidad = cat_localidad.clave_localidad AND tbl_clientes.fk_pais = cat_localidad.fk_pais AND tbl_clientes.fk_estado = cat_localidad.fk_estado AND tbl_clientes.fk_municipio = cat_localidad.fk_municipio
            LEFT JOIN cat_municipio ON cat_localidad.fk_pais = cat_municipio.fk_pais AND cat_localidad.fk_estado = cat_municipio.fk_estado AND cat_localidad.fk_municipio = cat_municipio.clave_municipio
            LEFT JOIN cat_estado ON cat_municipio.fk_estado = cat_estado.id_estado AND cat_municipio.fk_pais = cat_estado.fk_pais
            LEFT join rel_empleado_cliente on rel_empleado_cliente.fk_cliente = tbl_clientes.id_cliente
            LEFT join tbl_empleados on tbl_empleados.id_promotor = rel_empleado_cliente.fk_id_empleado
             LEFT join rel_gerente_asesor on tbl_empleados.id_promotor = rel_gerente_asesor.fk_id_asesor 
            WHERE CONCAT(TRIM(tbl_clientes.nombre_clte),' ',TRIM(tbl_clientes.apaterno_clte),' ',TRIM(tbl_clientes.amaterno_clte)) LIKE  :nombre  AND rel_gerente_asesor.fk_id_gerente = 10 GROUP BY  tbl_clientes.id_cliente";
           }else{
            $query = "SELECT tbl_clientes.*, CONCAT(tbl_clientes.nombre_clte,' ',tbl_clientes.apaterno_clte,' ',tbl_clientes.amaterno_clte) AS cliente,cat_localidad.nom_localidad,cat_municipio.desc_municipio,cat_estado.nom_estado,CONCAT_WS(' ',nombre_promotor,apaterno_promotor,amaterno_promotor) AS nombre_asesor FROM tbl_clientes 
            LEFT JOIN cat_localidad ON tbl_clientes.fk_localidad = cat_localidad.clave_localidad AND tbl_clientes.fk_pais = cat_localidad.fk_pais AND tbl_clientes.fk_estado = cat_localidad.fk_estado AND tbl_clientes.fk_municipio = cat_localidad.fk_municipio
            LEFT JOIN cat_municipio ON cat_localidad.fk_pais = cat_municipio.fk_pais AND cat_localidad.fk_estado = cat_municipio.fk_estado AND cat_localidad.fk_municipio = cat_municipio.clave_municipio
            LEFT JOIN cat_estado ON cat_municipio.fk_estado = cat_estado.id_estado AND cat_municipio.fk_pais = cat_estado.fk_pais
            LEFT join rel_empleado_cliente on rel_empleado_cliente.fk_cliente = tbl_clientes.id_cliente
            LEFT join tbl_empleados on tbl_empleados.id_promotor = rel_empleado_cliente.fk_id_empleado
            WHERE CONCAT(TRIM(tbl_clientes.nombre_clte),' ',TRIM(tbl_clientes.apaterno_clte),' ',TRIM(tbl_clientes.amaterno_clte)) LIKE  :nombre GROUP BY  tbl_clientes.id_cliente";
           
           }
           
           // Preparar la consulta SQL con parámetros
            $stmt = Conexion::conectar()->prepare($query);

            // Vincular el parámetro correctamente
            $nombreParam = "%$nombre%";
            $stmt->bindParam(":nombre", $nombreParam, PDO::PARAM_STR);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener y devolver los resultados
            $resultados = $stmt->fetchAll();

            // Cerrar el cursor explícitamente (aunque PHP lo hace automáticamente al finalizar la función)
            $stmt->closeCursor();

            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlBuscarCliente: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }

    static public function mdlBuscarClienteId($id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT tbl_clientes.*, CONCAT(tbl_clientes.nombre_clte,' ',tbl_clientes.apaterno_clte,' ',tbl_clientes.amaterno_clte) AS cliente,cat_localidad.nom_localidad,cat_municipio.desc_municipio,cat_estado.nom_estado,CONCAT_WS(' ',nombre_promotor,apaterno_promotor,amaterno_promotor) AS nombre_asesor FROM tbl_clientes 
            LEFT JOIN cat_localidad ON tbl_clientes.fk_localidad = cat_localidad.clave_localidad AND tbl_clientes.fk_pais = cat_localidad.fk_pais AND tbl_clientes.fk_estado = cat_localidad.fk_estado AND tbl_clientes.fk_municipio = cat_localidad.fk_municipio
            LEFT JOIN cat_municipio ON cat_localidad.fk_pais = cat_municipio.fk_pais AND cat_localidad.fk_estado = cat_municipio.fk_estado AND cat_localidad.fk_municipio = cat_municipio.clave_municipio
            LEFT JOIN cat_estado ON cat_municipio.fk_estado = cat_estado.id_estado AND cat_municipio.fk_pais = cat_estado.fk_pais
            LEFT join rel_empleado_cliente on rel_empleado_cliente.fk_cliente = tbl_clientes.id_cliente
            LEFT join tbl_empleados on tbl_empleados.id_promotor = rel_empleado_cliente.fk_id_empleado
            WHERE id_cliente = :id GROUP BY  tbl_clientes.id_cliente");

            $stmt->bindParam(":id", $id, PDO::PARAM_STR);

            $stmt->execute();

            // Obtener y devolver los resultados
            $resultados = $stmt->fetchAll();

            // Cerrar el cursor explícitamente (aunque PHP lo hace automáticamente al finalizar la función)
            $stmt->closeCursor();

            return $resultados;
        } catch (PDOException $e) {
            // Manejar la excepción (puedes personalizar el manejo según tus necesidades)
            error_log('Error en mdlBuscarClienteId: ' . $e->getMessage());
            return []; // Otra acción como lanzar una excepción o mensaje de error al usuario
        }
    }




    static public function mdlDatosClientes($id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT
            id_cliente, clave_elector, tipo_cliente, 
            CONCAT_WS(' ', nombre_clte, apaterno_clte, amaterno_clte) AS nombre_cliente, curp, rfc, fecha_nacimiento, religion, Fk_estado_nac, tipo_identificacion, clave_elector, nom_localidad,
            sexo, tel_celular, tel_casa, tel_oficina, tel_otro,  email, email2 , calle, colonia, ciudad, num_int, num_ext, cod_postal, nacimi.nom_pais as pais_nac, nac.nom_estado as estado_nac, nacionali.nom_pais as nacionalidad,
            CONCAT_WS(' ', nombre_cony, apaterno_cony, amaterno_cony) AS nombre_conyugue, num_hijos, num_dep_eco, estado_civil,
            nom_localidad, desc_municipio, c.nom_estado, ine_anverso, ine_reverso, domicilio_img, curp_img, edo_cuenta_img, situacion_fiscal_img, cuestionario_inver_img, ine_anverso_cotitutar, ine_reverso_cotitular, curp_cotitular_img, situacion_fiscal_cotitular_img
        FROM 
            tbl_clientes
        
        INNER JOIN  
            cat_localidad ON cat_localidad.clave_localidad = tbl_clientes.fk_localidad
            AND cat_localidad.fk_pais = tbl_clientes.fk_pais
            AND cat_localidad.fk_estado = tbl_clientes.fk_estado
            AND cat_localidad.fk_municipio = tbl_clientes.fk_municipio
        INNER JOIN 
            cat_municipio ON cat_municipio.fk_pais = cat_localidad.fk_pais
            AND cat_municipio.fk_estado = cat_localidad.fk_estado
            AND cat_localidad.fk_municipio = cat_municipio.clave_municipio
        INNER JOIN 
            cat_estado as c ON c.id_estado = cat_municipio.fk_estado
            AND c.fk_pais = cat_municipio.fk_pais
            
        INNER JOIN 
            cat_nacionalidad as nacimi ON nacimi.id_nacion = tbl_clientes.Fk_pais_nac
           
        LEFT JOIN 
            cat_estado AS nac ON nac.id_estado = tbl_clientes.Fk_estado_nac
            
        INNER JOIN 
            cat_nacionalidad as nacionali ON nacionali.id_nacion = tbl_clientes.nacionalidad
            
        LEFT JOIN 
            tbl_docs_personales ON tbl_docs_personales.fk_cliente = tbl_clientes.id_cliente
        WHERE 
            id_cliente = :id");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $resultado;
        } catch (PDOException $e) {
            error_log('Error en mdlDatosClientes: ' . $e->getMessage());
            return [];
        }
    }

    static public function mdlDatosCotitular($id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT *, CONCAT_WS(' ',nombre_cotitular,apaterno_cotitular,amaterno_cotitular) AS nombre_cotitular,nom_localidad as nom_localidad_cotitular,nacimi.nom_pais as pais_nac_cotitular, nac.nom_estado as estado_nac_cotitular, nacionali.nom_pais as nacionalidad_cotitular,desc_municipio as desc_municipio_cotitular, c.nom_estado as nom_estado_cotitular 
            FROM tbl_cotitular_cliente 
                             INNER JOIN  
                                cat_localidad ON cat_localidad.clave_localidad = tbl_cotitular_cliente.fk_localidad_cotitular
                                AND cat_localidad.fk_pais = tbl_cotitular_cliente.fk_pais_cotitular
                                AND cat_localidad.fk_estado = tbl_cotitular_cliente.fk_estado_cotitular
                                AND cat_localidad.fk_municipio = tbl_cotitular_cliente.fk_municipio_cotitular
                            INNER JOIN 
                                cat_municipio ON cat_municipio.fk_pais = cat_localidad.fk_pais
                                AND cat_municipio.fk_estado = cat_localidad.fk_estado
                                AND cat_localidad.fk_municipio = cat_municipio.clave_municipio
                            INNER JOIN 
                                cat_estado as c ON c.id_estado = cat_municipio.fk_estado
                                AND c.fk_pais = cat_municipio.fk_pais
                
                            INNER JOIN 
                                cat_nacionalidad as nacimi ON nacimi.id_nacion = tbl_cotitular_cliente.Fk_pais_nac_cotitular
                                
                            INNER JOIN 
                                cat_estado AS nac ON nac.id_estado = tbl_cotitular_cliente.Fk_estado_nac_cotitular
                                
                                    
                            INNER JOIN 
                                cat_nacionalidad as nacionali ON nacionali.id_nacion = tbl_cotitular_cliente.nacionalidad_cotitular
            
            WHERE Fk_cliente =:id");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $resultado;
        } catch (PDOException $e) {
            error_log('Error en mdlDatosCotitular: ' . $e->getMessage());
            return [];
        }
    }

    static public function mdlDatosEconomicosClientes($id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT fk_cliente,profesion, otra_profesion, ocupacion_clte, puesto_clte, actividad, otra_actividad, nom_empres, tipo_empresa, otro_tipo_emp, tbl_actividad_economica.fk_pais, tbl_actividad_economica.fk_estado, tbl_actividad_economica.fk_municipio, fk_localidad, calle, num_ext, num_int, colonia, ciudad, cod_postal, ingre_mensual, ingresos_provienen, nom_localidad, desc_municipio, c.nom_estado from tbl_actividad_economica
            LEFT JOIN  
                                cat_localidad ON cat_localidad.clave_localidad = tbl_actividad_economica.fk_localidad
                                AND cat_localidad.fk_pais = tbl_actividad_economica.fk_pais
                                AND cat_localidad.fk_estado = tbl_actividad_economica.fk_estado
                                AND cat_localidad.fk_municipio = tbl_actividad_economica.fk_municipio
                            LEFT JOIN 
                                cat_municipio ON cat_municipio.fk_pais = cat_localidad.fk_pais
                                AND cat_municipio.fk_estado = cat_localidad.fk_estado
                                AND cat_localidad.fk_municipio = cat_municipio.clave_municipio
                            LEFT JOIN 
                                cat_estado as c ON c.id_estado = cat_municipio.fk_estado
                                AND c.fk_pais = cat_municipio.fk_pais
            
            WHERE Fk_cliente=:id");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $resultado;
        } catch (PDOException $e) {
            error_log('Error en mdlDatosEconomicosClientes: ' . $e->getMessage());
            return [];
        }
    }

    static public function mdlallbeneficiarioId($id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT b.*, bv.porcentaje
            FROM tbl_beneficiario b
            INNER JOIN rel_ben_venta bv ON bv.fk_beneficiario = b.id_beneficiario
            WHERE bv.fk_solSeg = :id and estado_contacto='1'");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $resultado;
        } catch (PDOException $e) {
            error_log('Error en mdlallbeneficiarioId: ' . $e->getMessage());
            return [];
        }
    }

    static public function mdlconsultarTransaccionalidadCliente($id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM tbl_transaccionalidad where fk_cliente=:id");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $resultado;
        } catch (PDOException $e) {
            error_log('Error en mdlconsultarTransaccionalidadCliente: ' . $e->getMessage());
            return [];
        }
    }

    static public function mdlCuentasContablesCliente($id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM rel_cuentas_contables_clientes 
            INNER JOIN tbl_cuentas_cliente ON tbl_cuentas_cliente.id_cuenta_cliente = rel_cuentas_contables_clientes.fk_cuenta WHERE rel_cuentas_contables_clientes.fk_cliente =:id");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $resultado;
        } catch (PDOException $e) {
            error_log('Error en mdlCuentasContablesCliente: ' . $e->getMessage());
            return [];
        }
    }

    static public function mdlAsesorAsignado($id)
    {
        try {
            $stmt = Conexion::conectar()->prepare("select id_rel_emp_prom,fk_gte_patrimonial, fk_id_empleado, fk_cliente, fk_producto, fk_fondo, fk_serie, CONCAT(tbl_clientes.nombre_clte,' ',tbl_clientes.apaterno_clte,' ',tbl_clientes.amaterno_clte) AS cliente, CONCAT(gerente.nombre_promotor,' ',gerente.apaterno_promotor,' ',gerente.amaterno_promotor) AS nombre_gerente, CONCAT(asesor.nombre_promotor,' ',asesor.apaterno_promotor,' ',asesor.amaterno_promotor) AS nombre_asesor,asesor.foto_pro, tbl_fondo.nom_fondo, tbl_serie.nom_serie, num_contrato from rel_empleado_cliente 
            inner join rel_gerente_asesor on rel_gerente_asesor.fk_id_gerente = rel_empleado_cliente.fk_gte_patrimonial and rel_gerente_asesor.fk_id_asesor = rel_empleado_cliente.fk_id_empleado
            inner join tbl_clientes on tbl_clientes.id_cliente = rel_empleado_cliente.fk_cliente
            inner join tbl_empleados as gerente on gerente.id_promotor = rel_gerente_asesor.fk_id_gerente
            inner join tbl_empleados as asesor on asesor.id_promotor = rel_gerente_asesor.fk_id_asesor
            inner join tbl_fondo on tbl_fondo.id_fondo = rel_empleado_cliente.fk_fondo
            inner join tbl_serie on tbl_serie.id_serie = rel_empleado_cliente.fk_serie
            where fk_cliente=:id");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $resultado;
        } catch (PDOException $e) {
            error_log('Error en mdlAsesorAsignado: ' . $e->getMessage());
            return [];
        }
    }
    static public function mdlContratosActivos($id, $perfil)
    {
      
            $query = "SELECT 
    tct.num_contrato_tiie AS num_contrato, 
    tct.plazo, 
    tct.f_pago, 
    SUM(tct.monto_inver) AS saldo, 
    tct.status_contrato, 
    NULL AS t_moneda, 
    NULL AS fk_empleado, 
    NULL AS titulos, 
    NULL AS fecha_mov, 
    'TIIE' AS tabla_origen
FROM tbl_clientes_tiie tct
INNER JOIN rel_gerente_asesor rga1 ON rga1.fk_id_asesor = tct.fk_empleado
WHERE tct.status_contrato = 1
AND tct.fk_cliente = $id
GROUP BY tct.num_contrato_tiie, tct.plazo, tct.f_pago, tct.status_contrato

UNION

SELECT 
    latest_event.num_contrato, 
    NULL AS plazo, 
    NULL AS f_pago, 
    NULL AS monto_inver, 
    NULL AS status_contrato, 
    NULL AS t_moneda, 
    latest_event.fk_empleado, 
    latest_event.titulos, 
    latest_event.fecha_mov, 
    'EVENT' AS tabla_origen
FROM (
    SELECT 
        tce.num_contrato, 
        tce.fk_empleado, 
        tce.titulos, 
        tce.fecha_mov,
        ROW_NUMBER() OVER (PARTITION BY tce.num_contrato ORDER BY tce.fecha_mov DESC) AS rn
    FROM tbl_clientes_event tce
    WHERE tce.titulos <> 0
    AND tce.fk_cliente = $id
) AS latest_event
INNER JOIN rel_gerente_asesor rga2 ON rga2.fk_id_asesor = latest_event.fk_empleado
WHERE latest_event.rn = 1

UNION

SELECT 
    latest_sp.num_contrato, 
    NULL AS plazo, 
    NULL AS f_pago, 
    NULL AS monto_inver, 
    NULL AS status_contrato, 
    NULL AS t_moneda, 
    latest_sp.fk_empleado, 
    latest_sp.saldo_total, 
    latest_sp.fecha_mov, 
    'SP' AS tabla_origen
FROM (
    SELECT 
        tce.num_contrato, 
        tce.fk_empleado, 
        tce.saldo_total, 
        tce.fecha_mov,
        ROW_NUMBER() OVER (PARTITION BY tce.num_contrato ORDER BY tce.fecha_mov DESC) AS rn
    FROM tbl_clientes_sp tce
    WHERE tce.saldo_total <> 0
    AND tce.fk_cliente = $id
) AS latest_sp
INNER JOIN rel_gerente_asesor rga3 ON rga3.fk_id_asesor = latest_sp.fk_empleado
WHERE latest_sp.rn = 1

UNION

SELECT 
    latest_lq.num_contrato, 
    NULL AS plazo, 
    NULL AS f_pago, 
    NULL AS monto_inver, 
    NULL AS status_contrato, 
    NULL AS t_moneda, 
    latest_lq.fk_empleado, 
    latest_lq.titulos, 
    latest_lq.fecha_mov, 
    'LQ' AS tabla_origen
FROM (
    SELECT 
        tcl.num_contrato, 
        tcl.fk_empleado, 
        tcl.titulos, 
        tcl.fecha_mov,
        ROW_NUMBER() OVER (PARTITION BY tcl.num_contrato ORDER BY tcl.fecha_mov DESC) AS rn
    FROM tbl_clientes_lq tcl
    WHERE tcl.titulos <> 0
    AND tcl.fk_cliente = $id
) AS latest_lq
INNER JOIN rel_gerente_asesor rga4 ON rga4.fk_id_asesor = latest_lq.fk_empleado
WHERE latest_lq.rn = 1

UNION

SELECT 
    tcg.num_contrato_garant AS num_contrato, 
    tcg.plazo, 
    tcg.f_pago, 
    SUM(tcg.monto_inver) AS saldo, 
    tcg.status_contrato, 
    tcg.t_moneda, 
    tcg.fk_empleado, 
    NULL AS titulos, 
    NULL AS fecha_mov, 
    'GARANT' AS tabla_origen
FROM tbl_clientes_garant tcg
INNER JOIN rel_gerente_asesor rga5 ON rga5.fk_id_asesor = tcg.fk_empleado
WHERE tcg.status_contrato = 1
AND tcg.fk_cliente = $id
GROUP BY tcg.num_contrato_garant, tcg.plazo, tcg.f_pago, tcg.status_contrato, tcg.t_moneda, tcg.fk_empleado

UNION

SELECT 
    tcb.num_contrato AS num_contrato, 
    NULL AS plazo, 
    NULL AS f_pago, 
    SUM(tcb.monto_btc) AS saldo, 
    tcb.status_liquidacion, 
    tcb.t_moneda, 
    tcb.fk_empleado, 
    NULL AS titulos, 
    NULL AS fecha_mov, 
    'BTC' AS tabla_origen
FROM tbl_clientes_bitcoin tcb
INNER JOIN rel_gerente_asesor rga5 ON rga5.fk_id_asesor = tcb.fk_empleado
WHERE tcb.status_liquidacion = 0
AND tcb.fk_cliente = $id
GROUP BY tcb.num_contrato, tcb.status_liquidacion, tcb.t_moneda, tcb.fk_empleado;

                        ";
       
        try {
            $stmt = Conexion::conectar()->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_STR);

            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
           

            return $resultado;
            $stmt->closeCursor();
        } catch (PDOException $e) {
            error_log('Error en mdlAsesorAsignado: ' . $e->getMessage());
            return [];
        }
    }
}
