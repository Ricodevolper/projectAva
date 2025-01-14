<?php
// save_form_section.php

require_once 'conexion.php';


class SaveClienteAjax{

    static public function mdlInsertCliente( $Fk_promotor, $tipo_cliente, $razon_social, $nombre_clte, $apaterno_clte, $amaterno_clte, $sexo, $tipo_identificacion, $clave_elector, 
    $curp, $rfc, $fecha_nacimiento, $religion, $fk_pais_nac, $fk_estado_nac, $estado_nac_extran, $nacionalidad, $condicion_migrat, $estado_civil, $nombre_cony, $apaterno_cony, 
    $amaterno_cony, $num_hijos, $num_dep_eco, $tel_celular, $tel_casa, $tel_oficina, $tel_otro, $email, $email2, $fk_pais, $fk_estado, $fk_municipio, $fk_localidad, $calle, $num_int, 
    $num_ext, $colonia, $ciudad, $cod_postal
    ){
    try {
        $stmt = Conexion::conectar()->prepare("INSERT INTO tbl_clientes (Fk_promotor,tipo_cliente,razon_social, nombre_clte, apaterno_clte, amaterno_clte, sexo, tipo_identificacion,
         clave_elector, curp, rfc, fecha_nacimiento,religion, Fk_pais_nac, Fk_estado_nac, estado_nac_extran, nacionalidad, condicion_migrat, estado_civil, nombre_cony, apaterno_cony, 
         amaterno_cony, num_hijos, num_dep_eco, tel_celular, tel_casa, tel_oficina, tel_otro, email, email2, fk_pais, fk_estado, fk_municipio, fk_localidad, calle, num_ext, num_int, 
         colonia, ciudad, cod_postal) 
         VALUES (:Fk_promotor, :Tipo_cliente, :Razon_social, :Nombre_clte, :Apaterno_clte, :Amaterno_clte, :Sexo, :Tipo_identificacion, :Clave_elector, :Curp, :Rfc,:Fecha_nacimiento,
        :Religion, :Fk_pais_nac, :Fk_estado_nac, :Estado_nac_extran, :Nacionalidad, :Condicion_migrat, :Estado_civil, :Nombre_cony, :Apaterno_cony, :Amaterno_cony, :Num_hijos, :Num_dep_eco, 
        :Tel_celular, :Tel_casa, :Tel_oficina, :Tel_otro, :Email, :Email2,:Fk_pais, :Fk_estado,:Fk_municipio, :Fk_localidad, :Calle, :Num_int, :Num_ext, :Colonia, :Ciudad , :Cod_postal)");
        
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
        $stmt->bindParam(':Fk_pais_nac', $fk_pais_nac, PDO::PARAM_INT);
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
        

        $stmt->execute();

        return $stmt->rowCount(); // Devuelve el número de filas afectadas
        $stmt->closeCursor();

        return $resultado;
    } catch (PDOException $e) {
        error_log('Error en mdlCuentasContablesCliente: ' . $e->getMessage());
        return [];
    }
  }

}



if (isset($_POST['datgen'])) {
    $Fk_promotor = isset($_POST['fk_promotor']) ? $_POST['fk_promotor'] : '';
    $tipo_cliente = isset($_POST['tipoCliente']) ? $_POST['tipoCliente'] : '';
    $razon_social = isset($_POST['razonSocial']) ? $_POST['razonSocial'] : '';
    $nombre_clte = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apaterno_clte = isset($_POST['primerApellido']) ? $_POST['primerApellido'] : '';
    $amaterno_clte = isset($_POST['segundoApellido']) ? $_POST['segundoApellido'] : '';
    $sexo = isset($_POST['genero']) ? $_POST['genero'] : '';
    $tipo_identificacion = isset($_POST['identificacionOficial']) ? $_POST['identificacionOficial'] : '';
    $clave_elector = isset($_POST['serieNoIdentificacion']) ? $_POST['serieNoIdentificacion'] : '';
    $curp = isset($_POST['curp']) ? $_POST['curp'] : '';
    $rfc = isset($_POST['rfc']) ? $_POST['rfc'] : '';
    $fecha_nacimiento = isset($_POST['fNac']) ? $_POST['fNac'] : '';
    $religion = isset($_POST['religion']) ? $_POST['religion'] : '';
    $fk_pais_nac = isset($_POST['paisNac']) ? $_POST['paisNac'] : '';
    $fk_estado_nac = isset($_POST['fk_estadoNacimiento']) ? $_POST['fk_estadoNacimiento'] : '';
    $estado_nac_extran = isset($_POST['estadoNacimiento']) ? $_POST['estadoNacimiento'] : '';
    $nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : '';
    $condicion_migrat = isset($_POST['condicionMigratoria']) ? $_POST['condicionMigratoria'] : '';
    $estado_civil = isset($_POST['estCivil']) ? $_POST['estCivil'] : '';
    $nombre_cony = isset($_POST['nombreConyuge']) ? $_POST['nombreConyuge'] : '';
    $apaterno_cony = isset($_POST['primerApellidoConyuge']) ? $_POST['primerApellidoConyuge'] : '';
    $amaterno_cony = isset($_POST['segundoApellidoConyuge']) ? $_POST['segundoApellidoConyuge'] : '';
    $num_hijos = isset($_POST['numeroHijos']) ? $_POST['numeroHijos'] : '';
    $num_dep_eco = isset($_POST['numeroDependientes']) ? $_POST['numeroDependientes'] : '';
    $tel_celular = isset($_POST['telCelular']) ? $_POST['telCelular'] : '';
    $tel_casa = isset($_POST['telCasa']) ? $_POST['telCasa'] : '';
    $tel_oficina = isset($_POST['telOfici']) ? $_POST['telOfici'] : '';
    $tel_otro = isset($_POST['telOtro']) ? $_POST['telOtro'] : '';
    $email = isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] : '';
    $email2 = isset($_POST['correoElectronico2']) ? $_POST['correoElectronico2'] : '';
    $fk_pais = isset($_POST['fk_pais']) ? $_POST['fk_pais'] : '';
    $fk_estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $fk_municipio = isset($_POST['municipio']) ? $_POST['municipio'] : '';
    $fk_localidad = isset($_POST['localidad']) ? $_POST['localidad'] : '';
    $calle = isset($_POST['calle']) ? $_POST['calle'] : '';
    $num_int = isset($_POST['noInt']) ? $_POST['noInt'] : '';
    $num_ext = isset($_POST['noExt']) ? $_POST['noExt'] : '';
    $colonia = isset($_POST['colonia']) ? $_POST['colonia'] : '';
    $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : '';
    $cod_postal = isset($_POST['cp']) ? $_POST['cp'] : '';
    $profesion = isset($_POST['profesion']) ? $_POST['profesion'] : '';
$ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : '';
$puesto = isset($_POST['puesto']) ? $_POST['puesto'] : '';
$condicionActiva = isset($_POST['condicionActiva']) ? $_POST['condicionActiva'] : '';
$nombreEmpresa = isset($_POST['nombreEmpresa']) ? $_POST['nombreEmpresa'] : '';
$tipoEmpresa = isset($_POST['tipoEmpresa']) ? $_POST['tipoEmpresa'] : '';

$estadoLaboral = isset($_POST['estadoLaboral']) ? $_POST['estadoLaboral'] : '';
$municipioLaboral = isset($_POST['municipioLaboral']) ? $_POST['municipioLaboral'] : '';
$localidadLaboral = isset($_POST['localidadLaboral']) ? $_POST['localidadLaboral'] : '';

$calleEmpresa = isset($_POST['calleEmpresa']) ? $_POST['calleEmpresa'] : '';
$nextEmpresa = isset($_POST['nextEmpresa']) ? $_POST['nextEmpresa'] : '';
$nintEmpresa = isset($_POST['nintEmpresa']) ? $_POST['nintEmpresa'] : '';
$colEmpresa = isset($_POST['colEmpresa']) ? $_POST['colEmpresa'] : '';
$ciudadEmpresa = isset($_POST['ciudadEmpresa']) ? $_POST['ciudadEmpresa'] : '';
$cpEmpresa = isset($_POST['cpEmpresa']) ? $_POST['cpEmpresa'] : '';

$ingresoMensual = isset($_POST['ingresoMensual']) ? $_POST['ingresoMensual'] : '';
$ingresoProvinientes = isset($_POST['ingresoProvinientes']) ? $_POST['ingresoProvinientes'] : '';
$nombreCotitular = isset($_POST['nombreCotitular']) ? $_POST['nombreCotitular'] : '';
$primerApellidoCotitular = isset($_POST['primerApellidoCotitular']) ? $_POST['primerApellidoCotitular'] : '';
$segundoApellidoCotitular = isset($_POST['segundoApellidoCotitular']) ? $_POST['segundoApellidoCotitular'] : '';
$generoCotitular = isset($_POST['generoCotitular']) ? $_POST['generoCotitular'] : '';
$identificacionOficialCotitular = isset($_POST['identificacionOficialCotitular']) ? $_POST['identificacionOficialCotitular'] : '';
$curpCotitular = isset($_POST['curpCotitular']) ? $_POST['curpCotitular'] : '';
$rfcCotitular = isset($_POST['rfcCotitular']) ? $_POST['rfcCotitular'] : '';
$fNacCotitular = isset($_POST['fNacCotitular']) ? $_POST['fNacCotitular'] : '';
$religionCotitular = isset($_POST['religionCotitular']) ? $_POST['religionCotitular'] : '';
$paisNacCotitular = isset($_POST['paisNacCotitular']) ? $_POST['paisNacCotitular'] : '';
$nacionalidadCotitular = isset($_POST['nacionalidadCotitular']) ? $_POST['nacionalidadCotitular'] : '';
$estCivilCotitular = isset($_POST['estCivilCotitular']) ? $_POST['estCivilCotitular'] : '';
$telCelCotitular = isset($_POST['telCelCotitular']) ? $_POST['telCelCotitular'] : '';
$telCasaCotitular = isset($_POST['telCasaCotitular']) ? $_POST['telCasaCotitular'] : '';
$telOfiCotitular = isset($_POST['telOfiCotitular']) ? $_POST['telOfiCotitular'] : '';
$telOtroCotitular = isset($_POST['telOtroCotitular']) ? $_POST['telOtroCotitular'] : '';

$estadoCotitular = isset($_POST['estadoCotitular']) ? $_POST['estadoCotitular'] : '';
$municipioCotitular = isset($_POST['municipioCotitular']) ? $_POST['municipioCotitular'] : '';
$localidadCotitular = isset($_POST['localidadCotitular']) ? $_POST['localidadCotitular'] : '';
$calleCotitular = isset($_POST['calleCotitular']) ? $_POST['calleCotitular'] : '';
$noExtCotitular = isset($_POST['noExtCotitular']) ? $_POST['noExtCotitular'] : '';
$noIntCotitular = isset($_POST['noIntCotitular']) ? $_POST['noIntCotitular'] : '';
$coloniaCotitular = isset($_POST['coloniaCotitular']) ? $_POST['coloniaCotitular'] : '';
$recursosProvienen = isset($_POST['recursosProvienen']) ? $_POST['recursosProvienen'] : '';
$porcentajeTerceros = isset($_POST['porcentajeTerceros']) ? $_POST['porcentajeTerceros'] : '';
$nombreBeneficiario = isset($_POST['nombreBeneficiario']) ? $_POST['nombreBeneficiario'] : '';
$apellidoPaterno = isset($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno'] : '';
$apellidoMaterno = isset($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno'] : '';
$personalidadJuridica = isset($_POST['personalidadJuridica']) ? $_POST['personalidadJuridica'] : '';
$porcentaje = isset($_POST['porcentaje']) ? $_POST['porcentaje'] : '';
$tipoIdentificacion = isset($_POST['tipoIdentificacion']) ? $_POST['tipoIdentificacion'] : '';
$numeroIdentificacion = isset($_POST['numeroIdentificacion']) ? $_POST['numeroIdentificacion'] : '';
$nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : '';
$telBeneficiario = isset($_POST['telBeneficiario']) ? $_POST['telBeneficiario'] : '';



    




}
?>
