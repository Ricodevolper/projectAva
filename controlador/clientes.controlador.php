<?php 


class ControladorClientes {

    static public function ctrBuscarCliente($nombre, $perfil){
        // Sanitizar la entrada del usuario para evitar inyección SQL
        $nombre = htmlspecialchars(strip_tags($nombre));
    
        // Verificar que la entrada solo contiene caracteres alfanuméricos y espacios
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $nombre)) {
            try {
                $cliente = ModeloClientes::mdlBuscarCliente($nombre, $perfil);
    
                // Verificar que la consulta devolvió resultados
                if ($cliente) {
                    return $cliente;
                } else {
                    // Manejar el caso cuando no se encuentran clientes
                    return "No se encontraron clientes con ese nombre.";
                }
            } catch (Exception $e) {
                // Manejar posibles errores de la base de datos
                error_log("Error en ctrBuscarCliente: " . $e->getMessage());
                return "Ocurrió un error al buscar el cliente.";
            }
        } else {
            // Manejar la entrada no válida
            return "El nombre del cliente contiene caracteres no permitidos.";
        }
    }
    
    static public function ctrBuscarClienteId($Id){
        $Id = htmlspecialchars(strip_tags($Id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$Id)){
           $cliente =  ModeloClientes::mdlBuscarClienteId($Id);

           return $cliente;

        }



    }

    static public function ctrDatosClientes($nombre){
        $nombre = htmlspecialchars(strip_tags($nombre));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$nombre)){
           $cliente =  ModeloClientes::mdlDatosClientes($nombre);

           return $cliente;

        }



    }
    static public function ctrDatosCotitular($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $cotitular =  ModeloClientes::mdlDatosCotitular($id);

           return $cotitular;

        }



    }
    static public function ctrDatosEconomicosClientes($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $cotitular =  ModeloClientes::mdlDatosEconomicosClientes($id);

           return $cotitular;

        }



    }
    static public function ctrallbeneficiarioId($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $beneficiaros =  ModeloClientes::mdlallbeneficiarioId($id);

           return $beneficiaros;

        }



    }
    static public function ctrconsultarTransaccionalidadCliente($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $respuesta =  ModeloClientes::mdlconsultarTransaccionalidadCliente($id);

           return $respuesta;

        }



    }
    static public function ctrBorrarBeneficiarios($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $respuesta =  ModeloClientes::mdlBorrarBeneficiarios($id);

           return $respuesta;

        }



    }
    static public function ctrConsultaDocsPersonal($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $respuesta =  ModeloClientes::mdlConsultaDocsPersonal($id);

           return $respuesta;

        }



    }
    static public function ctrCuentasContablesCliente($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $respuesta =  ModeloClientes::mdlCuentasContablesCliente($id);

           return $respuesta;

        }



    }
    static public function ctrAsesorAsignado($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $respuesta =  ModeloClientes::mdlAsesorAsignado($id);

           return $respuesta;

        }



    }

    static public function ctrDatosClientesId($id) 
   
    {
        $id = htmlspecialchars(strip_tags($id));
        if(preg_match('/^[0-9 ]+$/',$id)){
            $respuesta =  ModeloClientes::mdlDatosClientes($id);
 
            return $respuesta;
    }



}
    static public function ctrContratosActivos($id,$perfil) 
   
    {
         
            $respuesta =  ModeloClientes::mdlContratosActivos($id,$perfil);
 
            return $respuesta;
    



}
    static public function ctrEstados() 
   
    {
         
            $respuesta =  ModeloClientes::mdlEstados();
 
            return $respuesta;
    



}
    static public function ctrMunicipios($id_estado) 
   
    {
         
            $respuesta =  ModeloClientes::mdlMunicipios($id_estado);
 
            return $respuesta;
    



}
static public function ctrInsertCliente( $Fk_promotor, $tipo_cliente, $razon_social, $nombre_clte, $apaterno_clte, $amaterno_clte, $sexo, $tipo_identificacion, $clave_elector, 
$curp, $rfc, $fecha_nacimiento, $religion, $fk_pais_nac, $fk_estado_nac, $estado_nac_extran, $nacionalidad, $condicion_migrat, $estado_civil, $nombre_cony, $apaterno_cony, 
$amaterno_cony, $num_hijos, $num_dep_eco, $tel_celular, $tel_casa, $tel_oficina, $tel_otro, $email, $email2, $fk_pais, $fk_estado, $fk_municipio, $fk_localidad, $calle, $num_int, 
$num_ext, $colonia, $ciudad, $cod_postal
){

    $respuesta =  ModeloClientes::mdlInsertCliente($Fk_promotor, $tipo_cliente, $razon_social, $nombre_clte, $apaterno_clte, $amaterno_clte, $sexo, $tipo_identificacion, $clave_elector, 
    $curp, $rfc, $fecha_nacimiento, $religion, $fk_pais_nac, $fk_estado_nac, $estado_nac_extran, $nacionalidad, $condicion_migrat, $estado_civil, $nombre_cony, $apaterno_cony, 
    $amaterno_cony, $num_hijos, $num_dep_eco, $tel_celular, $tel_casa, $tel_oficina, $tel_otro, $email, $email2, $fk_pais, $fk_estado, $fk_municipio, $fk_localidad, $calle, $num_int, 
    $num_ext, $colonia, $ciudad, $cod_postal);
 
    return $respuesta;

}
static public function ctrEditCliente( $id_cleinte, $Fk_promotor, $tipo_cliente, $razon_social, $nombre_clte, $apaterno_clte, $amaterno_clte, $sexo, $tipo_identificacion, $clave_elector, 
$curp, $rfc, $fecha_nacimiento, $religion, $fk_pais_nac, $fk_estado_nac, $estado_nac_extran, $nacionalidad, $condicion_migrat, $estado_civil, $nombre_cony, $apaterno_cony, 
$amaterno_cony, $num_hijos, $num_dep_eco, $tel_celular, $tel_casa, $tel_oficina, $tel_otro, $email, $email2, $fk_pais, $fk_estado, $fk_municipio, $fk_localidad, $calle, $num_int, 
$num_ext, $colonia, $ciudad, $cod_postal
){

    $respuesta =  ModeloClientes::mdlEditCliente( $id_cleinte, $Fk_promotor, $tipo_cliente, $razon_social, $nombre_clte, $apaterno_clte, $amaterno_clte, $sexo, $tipo_identificacion, $clave_elector, 
    $curp, $rfc, $fecha_nacimiento, $religion, $fk_pais_nac, $fk_estado_nac, $estado_nac_extran, $nacionalidad, $condicion_migrat, $estado_civil, $nombre_cony, $apaterno_cony, 
    $amaterno_cony, $num_hijos, $num_dep_eco, $tel_celular, $tel_casa, $tel_oficina, $tel_otro, $email, $email2, $fk_pais, $fk_estado, $fk_municipio, $fk_localidad, $calle, $num_int, 
    $num_ext, $colonia, $ciudad, $cod_postal);
 
    return $respuesta;

}
static public function ctrInsertClienteActEco(
    $Id_cliente, $Profesion, $Otra_profesion, $Ocupacion_clte, $Puesto_clte, $Actividad, $Otra_actividad, $Nom_empresa, $Tipo_empresa, $Otro_tipo_emp, $Fk_pais, $Fk_estado, $Fk_municipio,
     $Fk_localidad, $Calle, $Num_int, $Num_ext, $Colonia, $Ciudad, $Cod_postal, $Ingre_mensual, $Ingresos_provienen
){

    $respuesta =  ModeloClientes::mdlInsertClienteActEco(
        $Id_cliente, $Profesion, $Otra_profesion, $Ocupacion_clte, $Puesto_clte, $Actividad, $Otra_actividad, $Nom_empresa, $Tipo_empresa, $Otro_tipo_emp, $Fk_pais, $Fk_estado, $Fk_municipio,
         $Fk_localidad, $Calle, $Num_int, $Num_ext, $Colonia, $Ciudad, $Cod_postal, $Ingre_mensual, $Ingresos_provienen
    );
 
    return $respuesta;

}
static public function ctrUpdateClienteActEco(
    $Id_cliente, $Profesion, $Otra_profesion, $Ocupacion_clte, $Puesto_clte, $Actividad, $Otra_actividad, $Nom_empresa, $Tipo_empresa, $Otro_tipo_emp, $Fk_pais, $Fk_estado, $Fk_municipio,
     $Fk_localidad, $Calle, $Num_int, $Num_ext, $Colonia, $Ciudad, $Cod_postal, $Ingre_mensual, $Ingresos_provienen
){

    $respuesta =  ModeloClientes::mdlUpdateClienteActEco(
        $Id_cliente, $Profesion, $Otra_profesion, $Ocupacion_clte, $Puesto_clte, $Actividad, $Otra_actividad, $Nom_empresa, $Tipo_empresa, $Otro_tipo_emp, $Fk_pais, $Fk_estado, $Fk_municipio,
         $Fk_localidad, $Calle, $Num_int, $Num_ext, $Colonia, $Ciudad, $Cod_postal, $Ingre_mensual, $Ingresos_provienen
    );
 
    return $respuesta;

}
static public function ctrInsertClienteBenefeciario(
    $Nom_beneficiario, $Apaterno_beneficiario, $Amaterno_beneficiario, $Parentesco, $Clave, $Tel_contacto, $Direccion_ben, $F_naciemintoben
){

    $respuesta =  ModeloClientes::mdlInsertClienteBeneficiario(
        $Nom_beneficiario, $Apaterno_beneficiario, $Amaterno_beneficiario, $Parentesco, $Clave, $Tel_contacto, $Direccion_ben, $F_naciemintoben
    );
 
    return $respuesta;

}
  static public function ctrInsertClienteBenefeciarioRel(
    $fk_beneficiario, $fk_solSeg, $porcentaje
) {

    $respuesta =  ModeloClientes::mdlInsertClienteBenefeciarioRel(
        $fk_beneficiario, $fk_solSeg, $porcentaje    );
 
    return $respuesta;

}
  static public function ctrInsertTransaccionalidad(
    $Id_cliente, $recursos, $num_porciento_propio, $num_porciento_tercero_glob, $uso_cuenta, $rec_esp, $transac_mens, $mont_mens, $saldo_mens

) {

    $respuesta =  ModeloClientes::mdlInsertTransaccionalidad(
        $Id_cliente, $recursos, $num_porciento_propio, $num_porciento_tercero_glob, $uso_cuenta, $rec_esp, $transac_mens, $mont_mens, $saldo_mens
    );
 
    return $respuesta;

}
  static public function ctrUpdateTransaccionalidad(
    $Id_cliente, $recursos, $num_porciento_propio, $num_porciento_tercero_glob, $uso_cuenta, $rec_esp, $transac_mens, $mont_mens, $saldo_mens

) {

    $respuesta =  ModeloClientes::mdlUpdateTransaccionalidad(
        $Id_cliente, $recursos, $num_porciento_propio, $num_porciento_tercero_glob, $uso_cuenta, $rec_esp, $transac_mens, $mont_mens, $saldo_mens
    );
 
    return $respuesta;

}
  static public function ctrInsertTercero(
    $Nom_tercero, $Apaterno_tercero, $Amaterno_tercero, $Persona_juri, $Tipo_ident_tercero, $Num_ident_tercero, $Nacionalidad_tercero
 
) {

    $respuesta =  ModeloClientes::mdlInsertTercero(
        $Nom_tercero, $Apaterno_tercero, $Amaterno_tercero, $Persona_juri, $Tipo_ident_tercero, $Num_ident_tercero, $Nacionalidad_tercero
    );
 
    return $respuesta;

}
  static public function ctrInsertarCotitular($id_cliente, $nombreCotitular, $primerApellidoCotitular, $segundoApellidoCotitular, $generoCotitular, $identificacionOficialCotitular, $claveElectorCotitular,
  $curpCotitular,  $rfcCotitular, $fNacCotitular, $religion_cotitular, $Fk_pais_nac_cotitular, $Fk_estado_nac_cotitular, $nacionalidad_cotitular, $condicion_migrat_cotitular, $estado_civil_cotitular, $tel_celular_cotitular, $tel_casa_cotitular, $email_cotitular, $fk_pais_cotitular, $fk_estado_cotitular, $fk_municipio_cotitular, $fk_localidad_cotitular, 
    $calle_cotitular, $num_ext_cotitular, $num_int_cotitular, $colonia_cotitular, $ciudad_cotitular, $cod_postal_cotitular) {

    $respuesta =  ModeloClientes::mdlInsertarCotitular( $id_cliente, $nombreCotitular, $primerApellidoCotitular, $segundoApellidoCotitular, $generoCotitular, $identificacionOficialCotitular, $claveElectorCotitular,
    $curpCotitular,  $rfcCotitular, $fNacCotitular, $religion_cotitular, $Fk_pais_nac_cotitular, $Fk_estado_nac_cotitular, $nacionalidad_cotitular, $condicion_migrat_cotitular, $estado_civil_cotitular, $tel_celular_cotitular, $tel_casa_cotitular, $email_cotitular, $fk_pais_cotitular, $fk_estado_cotitular, $fk_municipio_cotitular, $fk_localidad_cotitular, 
      $calle_cotitular, $num_ext_cotitular, $num_int_cotitular, $colonia_cotitular, $ciudad_cotitular, $cod_postal_cotitular );
 
    return $respuesta;

}


static public function ctrInsertDocsPersonales(
    $fk_cliente,
    $ine_anverso,
    $ine_reverso,
    $domicilio_img,
    $curp_img,
    $edo_cuenta_img,
    $situacion_fiscal_img,
    $cuestionario_inver_img,
    $fech_up,
    $ine_anverso_cotitutar,
    $ine_reverso_cotitular,
    $curp_cotitular_img,
    $situacion_fiscal_cotitular_img
)
{
    $respuesta =  ModeloClientes::mdlInsertDocsPersonales(
        $fk_cliente,
        $ine_anverso,
        $ine_reverso,
        $domicilio_img,
        $curp_img,
        $edo_cuenta_img,
        $situacion_fiscal_img,
        $cuestionario_inver_img,
        $fech_up,
        $ine_anverso_cotitutar,
        $ine_reverso_cotitular,
        $curp_cotitular_img,
        $situacion_fiscal_cotitular_img
     );
     return $respuesta;
}
static public function ctrUpdateDocsPersonales(
    $fk_cliente,
    $ine_anverso,
    $ine_reverso,
    $domicilio_img,
    $curp_img,
    $edo_cuenta_img,
    $situacion_fiscal_img,
    $cuestionario_inver_img,
    $fech_up,
    $ine_anverso_cotitutar,
    $ine_reverso_cotitular,
    $curp_cotitular_img,
    $situacion_fiscal_cotitular_img
)
{
    $respuesta =  ModeloClientes::mdlUpdateDocsPersonales(
        $fk_cliente,
        $ine_anverso,
        $ine_reverso,
        $domicilio_img,
        $curp_img,
        $edo_cuenta_img,
        $situacion_fiscal_img,
        $cuestionario_inver_img,
        $fech_up,
        $ine_anverso_cotitutar,
        $ine_reverso_cotitular,
        $curp_cotitular_img,
        $situacion_fiscal_cotitular_img
     );
     return $respuesta;
}

}


