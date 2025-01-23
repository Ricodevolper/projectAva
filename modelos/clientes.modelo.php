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
    static public function mdlEstados()
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM cat_estado ");
            
          
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $resultado;
        } catch (PDOException $e) {
            error_log('Error en mdlCuentasContablesCliente: ' . $e->getMessage());
            return [];
        }
    }
    static public function mdlMunicipios($id_estado)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM cat_municipio WHERE  fk_estado = :id ");
            
            $stmt->bindParam(':id', $id_estado, PDO::PARAM_INT);

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




    static public function mdlInsertCliente(
        $Fk_promotor, $tipo_cliente, $razon_social, $nombre_clte, $apaterno_clte, $amaterno_clte, $sexo, $tipo_identificacion, $clave_elector, 
        $curp, $rfc, $fecha_nacimiento, $religion, $nacionalidadPais, $fk_estado_nac, $estado_nac_extran, $nacionalidad, $condicion_migrat, 
        $estado_civil, $nombre_cony, $apaterno_cony, $amaterno_cony, $num_hijos, $num_dep_eco, $tel_celular, $tel_casa, $tel_oficina, $tel_otro, 
        $email, $email2, $fk_pais, $fk_estado, $fk_municipio, $fk_localidad, $calle, $num_int, $num_ext, $colonia, $ciudad, $cod_postal
    ) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO tbl_clientes (
                Fk_promotor, tipo_cliente, razon_social, nombre_clte, apaterno_clte, amaterno_clte, sexo, tipo_identificacion, 
                clave_elector, curp, rfc, fecha_nacimiento, religion, Fk_pais_nac, Fk_estado_nac, estado_nac_extran, nacionalidad, 
                condicion_migrat, estado_civil, nombre_cony, apaterno_cony, amaterno_cony, num_hijos, num_dep_eco, tel_celular, 
                tel_casa, tel_oficina, tel_otro, email, email2, fk_pais, fk_estado, fk_municipio, fk_localidad, calle, num_int, 
                num_ext, colonia, ciudad, cod_postal
            ) VALUES (
                :Fk_promotor, :Tipo_cliente, :Razon_social, :Nombre_clte, :Apaterno_clte, :Amaterno_clte, :Sexo, :Tipo_identificacion, 
                :Clave_elector, :Curp, :Rfc, :Fecha_nacimiento, :Religion, :nacionalidadPais, :Fk_estado_nac, :Estado_nac_extran, 
                :Nacionalidad, :Condicion_migrat, :Estado_civil, :Nombre_cony, :Apaterno_cony, :Amaterno_cony, :Num_hijos, :Num_dep_eco, 
                :Tel_celular, :Tel_casa, :Tel_oficina, :Tel_otro, :Email, :Email2, :Fk_pais, :Fk_estado, :Fk_municipio, :Fk_localidad, 
                :Calle, :Num_int, :Num_ext, :Colonia, :Ciudad, :Cod_postal
            )");
    
            // Vincular parámetros
            $stmt->bindParam(':Fk_promotor', $Fk_promotor, PDO::PARAM_INT);
            $stmt->bindParam(':Tipo_cliente', $tipo_cliente, PDO::PARAM_STR);
            $stmt->bindParam(':Razon_social', $razon_social, PDO::PARAM_STR);
            $stmt->bindParam(':Nombre_clte', $nombre_clte, PDO::PARAM_STR);
            $stmt->bindParam(':Apaterno_clte', $apaterno_clte, PDO::PARAM_STR);
            $stmt->bindParam(':Amaterno_clte', $amaterno_clte, PDO::PARAM_STR);
            $stmt->bindParam(':Sexo', $sexo, PDO::PARAM_STR);
            $stmt->bindParam(':Tipo_identificacion', $tipo_identificacion, PDO::PARAM_STR);
            $stmt->bindParam(':Clave_elector', $clave_elector, PDO::PARAM_STR);
            $stmt->bindParam(':Curp', $curp, PDO::PARAM_STR);
            $stmt->bindParam(':Rfc', $rfc, PDO::PARAM_STR);
            $stmt->bindParam(':Fecha_nacimiento', $fecha_nacimiento, PDO::PARAM_STR);
            $stmt->bindParam(':Religion', $religion, PDO::PARAM_STR);
            $stmt->bindParam(':nacionalidadPais', $nacionalidadPais, PDO::PARAM_INT);
            $stmt->bindParam(':Fk_estado_nac', $fk_estado_nac, PDO::PARAM_INT);
            $stmt->bindParam(':Estado_nac_extran', $estado_nac_extran, PDO::PARAM_STR);
            $stmt->bindParam(':Nacionalidad', $nacionalidad, PDO::PARAM_STR);
            $stmt->bindParam(':Condicion_migrat', $condicion_migrat, PDO::PARAM_STR);
            $stmt->bindParam(':Estado_civil', $estado_civil, PDO::PARAM_STR);
            $stmt->bindParam(':Nombre_cony', $nombre_cony, PDO::PARAM_STR);
            $stmt->bindParam(':Apaterno_cony', $apaterno_cony, PDO::PARAM_STR);
            $stmt->bindParam(':Amaterno_cony', $amaterno_cony, PDO::PARAM_STR);
            $stmt->bindParam(':Num_hijos', $num_hijos, PDO::PARAM_INT);
            $stmt->bindParam(':Num_dep_eco', $num_dep_eco, PDO::PARAM_INT);
            $stmt->bindParam(':Tel_celular', $tel_celular, PDO::PARAM_STR);
            $stmt->bindParam(':Tel_casa', $tel_casa, PDO::PARAM_STR);
            $stmt->bindParam(':Tel_oficina', $tel_oficina, PDO::PARAM_STR);
            $stmt->bindParam(':Tel_otro', $tel_otro, PDO::PARAM_STR);
            $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':Email2', $email2, PDO::PARAM_STR);
            $stmt->bindParam(':Fk_pais', $fk_pais, PDO::PARAM_INT);
            $stmt->bindParam(':Fk_estado', $fk_estado, PDO::PARAM_INT);
            $stmt->bindParam(':Fk_municipio', $fk_municipio, PDO::PARAM_INT);
            $stmt->bindParam(':Fk_localidad', $fk_localidad, PDO::PARAM_INT);
            $stmt->bindParam(':Calle', $calle, PDO::PARAM_STR);
            $stmt->bindParam(':Num_int', $num_int, PDO::PARAM_STR);
            $stmt->bindParam(':Num_ext', $num_ext, PDO::PARAM_STR);
            $stmt->bindParam(':Colonia', $colonia, PDO::PARAM_STR);
            $stmt->bindParam(':Ciudad', $ciudad, PDO::PARAM_STR);
            $stmt->bindParam(':Cod_postal', $cod_postal, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                // Obtener el último ID insertado
                $idCliente = $conexion->lastInsertId();
                return [
                    'status' => 'success',
                    'message' => 'Cliente insertado correctamente',
                    'id_cliente' => $idCliente
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Error al insertar cliente'
                ];
            }
        } catch (PDOException $e) {
            return [
                'status' => 'error',
                'message' => 'Error en la base de datos: ' . $e->getMessage()
            ];
        }
    }
    static public function mdlInsertClienteActEco(
        $Id_cliente, $Profesion, $Otra_profesion, $Ocupacion_clte, $Puesto_clte, $Actividad, $Otra_actividad, $Nom_empresa, $Tipo_empresa, $Otro_tipo_emp, $Fk_pais, $Fk_estado, $Fk_municipio,
        $Fk_localidad, $Calle, $Num_int, $Num_ext, $Colonia, $Ciudad, $Cod_postal, $Ingre_mensual, $Ingresos_provienen
    ) {
        try {
            $conexion = Conexion::conectar();
    
            // Fecha de inserción
            $fechaAlta = date('Y-m-d H:i:s');
    
            // Preparar la consulta
            $stmt = $conexion->prepare("INSERT INTO tbl_actividad_economica (
                    fk_cliente, profesion, otra_profesion, ocupacion_clte, puesto_clte, actividad, otra_actividad, nom_empres, tipo_empresa, otro_tipo_emp, 
                    fk_pais, fk_estado, fk_municipio, fk_localidad, calle, num_ext, num_int, colonia, ciudad, cod_postal, ingre_mensual, ingresos_provienen, fecha_alta
                ) VALUES (
                    :Id_cliente, :Profesion, :Otra_profesion, :Ocupacion_clte, :Puesto_clte, :Actividad, :Otra_actividad, :Nom_empresa, :Tipo_empresa, :Otro_tipo_emp, 
                    :Fk_pais, :Fk_estado, :Fk_municipio, :Fk_localidad, :Calle, :Num_ext, :Num_int, :Colonia, :Ciudad, :Cod_postal, :Ingre_mensual, :Ingresos_provienen, :Fecha_alta
                )
            ");
    
            // Vincular parámetros
            $stmt->bindParam(':Id_cliente', $Id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':Profesion', $Profesion, PDO::PARAM_STR);
            $stmt->bindParam(':Otra_profesion', $Otra_profesion, PDO::PARAM_STR);
            $stmt->bindParam(':Ocupacion_clte', $Ocupacion_clte, PDO::PARAM_STR);
            $stmt->bindParam(':Puesto_clte', $Puesto_clte, PDO::PARAM_STR);
            $stmt->bindParam(':Actividad', $Actividad, PDO::PARAM_STR);
            $stmt->bindParam(':Otra_actividad', $Otra_actividad, PDO::PARAM_STR);
            $stmt->bindParam(':Nom_empresa', $Nom_empresa, PDO::PARAM_STR);
            $stmt->bindParam(':Tipo_empresa', $Tipo_empresa, PDO::PARAM_STR);
            $stmt->bindParam(':Otro_tipo_emp', $Otro_tipo_emp, PDO::PARAM_STR);
            $stmt->bindParam(':Fk_pais', $Fk_pais, PDO::PARAM_INT);
            $stmt->bindParam(':Fk_estado', $Fk_estado, PDO::PARAM_STR);
            $stmt->bindParam(':Fk_municipio', $Fk_municipio, PDO::PARAM_STR);
            $stmt->bindParam(':Fk_localidad', $Fk_localidad, PDO::PARAM_STR);
            $stmt->bindParam(':Calle', $Calle, PDO::PARAM_STR);
            $stmt->bindParam(':Num_ext', $Num_ext, PDO::PARAM_STR);
            $stmt->bindParam(':Num_int', $Num_int, PDO::PARAM_STR);
            $stmt->bindParam(':Colonia', $Colonia, PDO::PARAM_STR);
            $stmt->bindParam(':Ciudad', $Ciudad, PDO::PARAM_STR);
            $stmt->bindParam(':Cod_postal', $Cod_postal, PDO::PARAM_STR);
            $stmt->bindParam(':Ingre_mensual', $Ingre_mensual, PDO::PARAM_STR);
            $stmt->bindParam(':Ingresos_provienen', $Ingresos_provienen, PDO::PARAM_STR);
            $stmt->bindParam(':Fecha_alta', $fechaAlta, PDO::PARAM_STR);
    
            // Ejecutar la consulta
            if ($stmt->execute()) {
                return [
                    'status' => 'success',
                    'message' => 'Actividad económica insertada correctamente'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Error al insertar actividad económica'
                ];
            }
        } catch (PDOException $e) {
            return [
                'status' => 'error',
                'message' => 'Error en la base de datos: ' . $e->getMessage()
            ];
        }
    }
    
    static public function mdlInsertClienteBeneficiario( 
    $Nom_beneficiario, $Apaterno_beneficiario, $Amaterno_beneficiario, $Parentesco, $Clave, $Tel_contacto, $Direccion_ben, $F_naciemintoben
) {
    try {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("INSERT INTO tbl_beneficiario (nom_beneficiario, apaterno_beneficiario, amaterno_beneficiario, parentesco, clave_parentesco, tel_contacto, direccion_ben, f_nacimiento_ben) 
        VALUES (:Nom_beneficiario, :Apaterno_beneficiario, :Amaterno_beneficiario, :Parentesco, :Clave, :Tel_contacto, :Direccion_ben, :F_naciemintoben)");

        // Vincular parámetros
        $stmt->bindParam(':Nom_beneficiario', $Nom_beneficiario, PDO::PARAM_STR);
        $stmt->bindParam(':Apaterno_beneficiario', $Apaterno_beneficiario, PDO::PARAM_STR);
        $stmt->bindParam(':Amaterno_beneficiario', $Amaterno_beneficiario, PDO::PARAM_STR);
        $stmt->bindParam(':Parentesco', $Parentesco, PDO::PARAM_STR);
        $stmt->bindParam(':Clave', $Clave, PDO::PARAM_STR);
        $stmt->bindParam(':Tel_contacto', $Tel_contacto, PDO::PARAM_STR);
        $stmt->bindParam(':Direccion_ben', $Direccion_ben, PDO::PARAM_STR);
        $stmt->bindParam(':F_naciemintoben', $F_naciemintoben, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Obtener el último ID insertado
            $id_beneficiario = $conexion->lastInsertId();
            return [
                'status' => 'success',
                'message' => 'Beneficiario insertado correctamente',
                'id_beneficiario' => $id_beneficiario
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Error al insertar Beneficiario'
            ];
        }
    } catch (PDOException $e) {
        return [
            'status' => 'error',
            'message' => 'Error en la base de datos: ' . $e->getMessage()
        ];
    }
}

    static public function mdlInsertClienteBenefeciarioRel(
        $fk_beneficiario, $fk_solSeg, $porcentaje
    ) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO `rel_ben_venta` ( `fk_beneficiario`, `fk_solSeg`, `porcentaje`) VALUES ( :fk_beneficiario, :fk_solSeg, :porcentaje);");
    
            // Vincular parámetros
            $stmt->bindParam(':fk_beneficiario', $fk_beneficiario, PDO::PARAM_INT);
            $stmt->bindParam(':fk_solSeg', $fk_solSeg, PDO::PARAM_STR);
            $stmt->bindParam(':porcentaje', $porcentaje, PDO::PARAM_STR);
            
           
    
            if ($stmt->execute()) {
                // Obtener el último ID insertado
               
                return [
                    'status' => 'success',
                    'message' => 'Beneficiario insertado correctamente'
                   
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Error al insertar Beneficiario'
                ];
            }
        } catch (PDOException $e) {
            return [
                'status' => 'error',
                'message' => 'Error en la base de datos: ' . $e->getMessage()
            ];
        }
    }
    
    static public function mdlInsertTransaccionalidad(
        $Id_cliente, $recursos, $num_porciento_propio, $num_porciento_tercero_glob, $uso_cuenta, $rec_esp, $transac_mens, $mont_mens, $saldo_mens
    ) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("
                INSERT INTO tbl_transaccionalidad (
                    Fk_cliente, recursos, propios, terceros, uso_cuenta, uso_cuenta_otro, 
                    transac_men, monto_men, saldo_men, fecha_alta
                ) VALUES (
                    :Id_cliente, :recursos, :num_porciento_propio, :num_porciento_tercero_glob, 
                    :uso_cuenta, :rec_esp, :transac_mens, :mont_mens, :saldo_mens, :fecha_alta
                )
            ");
    
            // Vincular parámetros
            $stmt->bindParam(':Id_cliente', $Id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':recursos', $recursos, PDO::PARAM_STR);
            $stmt->bindParam(':num_porciento_propio', $num_porciento_propio, PDO::PARAM_STR); 
            $stmt->bindParam(':num_porciento_tercero_glob', $num_porciento_tercero_glob, PDO::PARAM_STR);
            $stmt->bindParam(':uso_cuenta', $uso_cuenta, PDO::PARAM_STR);
            $stmt->bindParam(':rec_esp', $rec_esp, PDO::PARAM_STR);           
            $stmt->bindParam(':transac_mens', $transac_mens, PDO::PARAM_INT);
            $stmt->bindParam(':mont_mens', $mont_mens, PDO::PARAM_STR);
            $stmt->bindParam(':saldo_mens', $saldo_mens, PDO::PARAM_STR);
            $stmt->bindValue(':fecha_alta', date('Y-m-d H:i:s'), PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return [
                    'status' => 'success',
                    'message' => 'Transaccionalidad Insertada'
                ];
            } else {
                // Capturar errores de ejecución
                $errorInfo = $stmt->errorInfo();
                return [
                    'status' => 'error',
                    'message' => 'Error al insertar Transaccionalidad: ' . $errorInfo[2]
                ];
            }
        } catch (PDOException $e) {
            return [
                'status' => 'error',
                'message' => 'Error en la base de datos: ' . $e->getMessage()
            ];
        }
    }
    
    static public function mdlInsertTercero(
        $Nom_tercero, $Apaterno_tercero, $Amaterno_tercero, $Persona_juri, $Tipo_ident_tercero, $Num_ident_tercero, $Nacionalidad_tercero
    ) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO tbl_terceros (nom_tercero, apaterno_tercero, amaterno_tercero, persona_juri, tipo_ident_tercero, num_ident_tercero, nacionalidad_tercero, fecha_alta_tercero) 
            VALUES(:Nom_tercero, :Apaterno_tercero, :Amaterno_tercero, :Persona_juri, :Tipo_ident_tercero, :Num_ident_tercero, :Nacionalidad_tercero, '".date('Y-m-d H:i:s')."')");
    
            // Vincular parámetros
            $stmt->bindParam(':Nom_tercero', $Nom_tercero, PDO::PARAM_INT);
            $stmt->bindParam(':Apaterno_tercero', $Apaterno_tercero, PDO::PARAM_STR);
            $stmt->bindParam(':Amaterno_tercero', $Amaterno_tercero, PDO::PARAM_STR); 
            $stmt->bindParam(':Persona_juri', $Persona_juri, PDO::PARAM_INT);
            $stmt->bindParam(':Tipo_ident_tercero', $Tipo_ident_tercero, PDO::PARAM_STR);
            $stmt->bindParam(':Num_ident_tercero', $Num_ident_tercero, PDO::PARAM_STR);           
            $stmt->bindParam(':Nacionalidad_tercero', $Nacionalidad_tercero, PDO::PARAM_INT);
           
           
    
            if ($stmt->execute()) {
                // Obtener el último ID insertado
               
                return [
                    'status' => 'success',
                    'message' => 'Transaccionalidad Insertada'
                   
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Error al insertar Transaccionalidad'
                ];
            }
        } catch (PDOException $e) {
            return [
                'status' => 'error',
                'message' => 'Error en la base de datos: ' . $e->getMessage()
            ];
        }
    }
    static public function mdlInsertarCotitular(
        $id_cliente, $nombreCotitular, $primerApellidoCotitular, $segundoApellidoCotitular, 
        $generoCotitular, $identificacionOficialCotitular, $claveElectorCotitular, 
        $curpCotitular, $rfcCotitular, $fNacCotitular, $religion_cotitular, 
        $Fk_pais_nac_cotitular, $Fk_estado_nac_cotitular, $nacionalidad_cotitular, 
        $condicion_migrat_cotitular, $estado_civil_cotitular, $tel_celular_cotitular, 
        $tel_casa_cotitular, $email_cotitular, $fk_pais_cotitular, $fk_estado_cotitular, 
        $fk_municipio_cotitular, $fk_localidad_cotitular, $calle_cotitular, 
        $num_ext_cotitular, $num_int_cotitular, $colonia_cotitular, $ciudad_cotitular, 
        $cod_postal_cotitular
    ) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO tbl_cotitular_cliente (
                    Fk_cliente, nombre_cotitular, apaterno_cotitular, amaterno_cotitular,
                    sexo_cotitular, tipo_identificacion_cotitular, clave_elector_cotitular,
                    curp_cotitular, rfc_cotitular, fecha_nacimiento_cotitular, religion_cotitular,
                    Fk_pais_nac_cotitular, Fk_estado_nac_cotitular, nacionalidad_cotitular,
                    condicion_migrat_cotitular, estado_civil_cotitular, tel_celular_cotitular,
                    tel_casa_cotitular, email_cotitular, fk_pais_cotitular, fk_estado_cotitular,
                    fk_municipio_cotitular, fk_localidad_cotitular, calle_cotitular, num_ext_cotitular,
                    num_int_cotitular, colonia_cotitular, ciudad_cotitular, cod_postal_cotitular
                ) VALUES (
                    :id_cliente, :nombreCotitular, :primerApellidoCotitular, :segundoApellidoCotitular,
                    :generoCotitular, :identificacionOficialCotitular, :claveElectorCotitular,
                    :curpCotitular, :rfcCotitular, :fNacCotitular, :religion_cotitular,
                    :Fk_pais_nac_cotitular, :Fk_estado_nac_cotitular, :nacionalidad_cotitular,
                    :condicion_migrat_cotitular, :estado_civil_cotitular, :tel_celular_cotitular,
                    :tel_casa_cotitular, :email_cotitular, :fk_pais_cotitular, :fk_estado_cotitular,
                    :fk_municipio_cotitular, :fk_localidad_cotitular, :calle_cotitular, :num_ext_cotitular,
                    :num_int_cotitular, :colonia_cotitular, :ciudad_cotitular, :cod_postal_cotitular
                )
            ");
    
            // Vincular parámetros (ajusta tipos según corresponda)
            $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':nombreCotitular', $nombreCotitular, PDO::PARAM_STR);
            $stmt->bindParam(':primerApellidoCotitular', $primerApellidoCotitular, PDO::PARAM_STR);
            $stmt->bindParam(':segundoApellidoCotitular', $segundoApellidoCotitular, PDO::PARAM_STR);
            $stmt->bindParam(':generoCotitular', $generoCotitular, PDO::PARAM_STR);
            $stmt->bindParam(':identificacionOficialCotitular', $identificacionOficialCotitular, PDO::PARAM_STR);
            $stmt->bindParam(':claveElectorCotitular', $claveElectorCotitular, PDO::PARAM_STR);
            $stmt->bindParam(':curpCotitular', $curpCotitular, PDO::PARAM_STR);
            $stmt->bindParam(':rfcCotitular', $rfcCotitular, PDO::PARAM_STR);
            $stmt->bindParam(':fNacCotitular', $fNacCotitular, PDO::PARAM_STR);
            $stmt->bindParam(':religion_cotitular', $religion_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':Fk_pais_nac_cotitular', $Fk_pais_nac_cotitular, PDO::PARAM_INT);
            $stmt->bindParam(':Fk_estado_nac_cotitular', $Fk_estado_nac_cotitular, PDO::PARAM_INT);
            $stmt->bindParam(':nacionalidad_cotitular', $nacionalidad_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':condicion_migrat_cotitular', $condicion_migrat_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':estado_civil_cotitular', $estado_civil_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':tel_celular_cotitular', $tel_celular_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':tel_casa_cotitular', $tel_casa_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':email_cotitular', $email_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':fk_pais_cotitular', $fk_pais_cotitular, PDO::PARAM_INT);
            $stmt->bindParam(':fk_estado_cotitular', $fk_estado_cotitular, PDO::PARAM_INT);
            $stmt->bindParam(':fk_municipio_cotitular', $fk_municipio_cotitular, PDO::PARAM_INT);
            $stmt->bindParam(':fk_localidad_cotitular', $fk_localidad_cotitular, PDO::PARAM_INT);
            $stmt->bindParam(':calle_cotitular', $calle_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':num_ext_cotitular', $num_ext_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':num_int_cotitular', $num_int_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':colonia_cotitular', $colonia_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':ciudad_cotitular', $ciudad_cotitular, PDO::PARAM_STR);
            $stmt->bindParam(':cod_postal_cotitular', $cod_postal_cotitular, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return [
                    'status' => 'success',
                    'message' => 'Cotitular insertado correctamente'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Error al insertar el cotitular'
                ];
            }
        } catch (PDOException $e) {
            return [
                'status' => 'error',
                'message' => 'Error en la base de datos: ' . $e->getMessage()
            ];
        }
    }
    
    
} 
