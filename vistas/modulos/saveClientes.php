<?php



// Variables directas del array
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$datgen = isset($_POST['datgen']) ? $_POST['datgen'] : '';
$primerApellido = isset($_POST['primerApellido']) ? $_POST['primerApellido'] : '';
$segundoApellido = isset($_POST['segundoApellido']) ? $_POST['segundoApellido'] : '';
$curp = isset($_POST['curp']) ? $_POST['curp'] : '';
$identificacionOficial = isset($_POST['identificacionOficial']) ? $_POST['identificacionOficial'] : '';
$genero = isset($_POST['genero']) ? $_POST['genero'] : '';
$serieNoIdentificacion = isset($_POST['serieNoIdentificacion']) ? $_POST['serieNoIdentificacion'] : '';
$rfc = isset($_POST['rfc']) ? $_POST['rfc'] : '';
$fNac = isset($_POST['fNac']) ? $_POST['fNac'] : '';
$religion = isset($_POST['religion']) ? $_POST['religion'] : '';
$paisNac = isset($_POST['paisNac']) ? $_POST['paisNac'] : '';
$nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : 0;
$estCivil = isset($_POST['estCivil']) ? $_POST['estCivil'] : '';
$nombreConyuge = isset($_POST['nombreConyuge']) ? $_POST['nombreConyuge'] : '';
$primerApellidoConyuge = isset($_POST['primerApellidoConyuge']) ? $_POST['primerApellidoConyuge'] : '';
$segundoApellidoConyuge = isset($_POST['segundoApellidoConyuge']) ? $_POST['segundoApellidoConyuge'] : '';
$numeroHijos = isset($_POST['numeroHijos']) ? $_POST['numeroHijos'] : 0;
$numeroDependientes = isset($_POST['numeroDependientes']) ? $_POST['numeroDependientes'] : 0;
$telCelular = isset($_POST['telCelular']) ? $_POST['telCelular'] : '';
$telCasa = isset($_POST['telCasa']) ? $_POST['telCasa'] : '';
$telOfici = isset($_POST['telOfici']) ? $_POST['telOfici'] : '';
$telOtro = isset($_POST['telOtro']) ? $_POST['telOtro'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : 0 ;
$municipio = isset($_POST['municipio']) ? $_POST['municipio'] : '';
$localidad = isset($_POST['localidad']) ? $_POST['localidad'] : '';
$calle = isset($_POST['calle']) ? $_POST['calle'] : '';
$noExt = isset($_POST['noExt']) ? $_POST['noExt'] : 0;
$noInt = isset($_POST['noInt']) ? $_POST['noInt'] : 0;
$colonia = isset($_POST['colonia']) ? $_POST['colonia'] : '';
$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : '';
$cp = isset($_POST['cp']) ? $_POST['cp'] : 0;
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
$nextEmpresa = isset($_POST['nextEmpresa']) ? $_POST['nextEmpresa'] : 0;
$nintEmpresa = isset($_POST['nintEmpresa']) ? $_POST['nintEmpresa'] : 0;
$colEmpresa = isset($_POST['colEmpresa']) ? $_POST['colEmpresa'] : '';
$ciudadEmpresa = isset($_POST['ciudadEmpresa']) ? $_POST['ciudadEmpresa'] : '';
$cpEmpresa = isset($_POST['cpEmpresa']) ? $_POST['cpEmpresa'] : 0;
$ingresoMensual = isset($_POST['ingresoMensual']) ? $_POST['ingresoMensual'] : '';
$ingresoProvinientes = isset($_POST['ingresoProvinientes']) ? $_POST['ingresoProvinientes'] : '';
$recursosProvienen = isset($_POST['recursosProvienen']) ? $_POST['recursosProvienen'] : '';
$porcentajeTerceros = isset($_POST['porcentajeTerceros']) ? $_POST['porcentajeTerceros'] : 0;
$apellidoPaterno = isset($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno'] : '';
$apellidoMaterno = isset($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno'] : '';
$personalidadJuridica = isset($_POST['personalidadJuridica']) ? $_POST['personalidadJuridica'] : '';
$porcentaje = isset($_POST['porcentaje']) ? $_POST['porcentaje'] : 0;
$tipoIdentificacion = isset($_POST['tipoIdentificacion']) ? $_POST['tipoIdentificacion'] : '';
$numeroIdentificacion = isset($_POST['numeroIdentificacion']) ? $_POST['numeroIdentificacion'] : '';
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
$emailPersonal = isset($_POST['emailPersonal']) ? $_POST['emailPersonal'] : '';
$emailTrabajo = isset($_POST['emailTrabajo']) ? $_POST['emailTrabajo'] : '';
$telCelCotitular = isset($_POST['telCelCotitular']) ? $_POST['telCelCotitular'] : '';
$telCasaCotitular = isset($_POST['telCasaCotitular']) ? $_POST['telCasaCotitular'] : '';
$telOfiCotitular = isset($_POST['telOfiCotitular']) ? $_POST['telOfiCotitular'] : '';
$telOtroCotitular = isset($_POST['telOtroCotitular']) ? $_POST['telOtroCotitular'] : '';
$estadoDom = isset($_POST['estadoDom']) ? $_POST['estadoDom'] : '';
$municipioDom = isset($_POST['municipioDom']) ? $_POST['municipioDom'] : '';
$localidadDom = isset($_POST['localidadDom']) ? $_POST['localidadDom'] : '';
$calleCotitular = isset($_POST['calleCotitular']) ? $_POST['calleCotitular'] : '';
$noExtCotitular = isset($_POST['noExtCotitular']) ? $_POST['noExtCotitular'] : 0;
$noIntCotitular = isset($_POST['noIntCotitular']) ? $_POST['noIntCotitular'] : 0;
$coloniaCotitular = isset($_POST['coloniaCotitular']) ? $_POST['coloniaCotitular'] : '';
$ciudadCotitular = isset($_POST['ciudadCotitular']) ? $_POST['ciudadCotitular'] : '';
$cpCotitular = isset($_POST['cpCotitular']) ? $_POST['cpCotitular'] : 0;
$ineAnverso = isset($_POST['ineAnverso']) ? $_POST['ineAnverso'] : '';
$ineReverso = isset($_POST['ineReverso']) ? $_POST['ineReverso'] : '';
$comprobanteDomicilio = isset($_POST['comprobanteDomicilio']) ? $_POST['comprobanteDomicilio'] : '';
$curpDoc = isset($_POST['curpDoc']) ? $_POST['curpDoc'] : '';
$estadoCuenta = isset($_POST['estadoCuenta']) ? $_POST['estadoCuenta'] : '';
$constanciaFiscal = isset($_POST['constanciaFiscal']) ? $_POST['constanciaFiscal'] : '';
$cuestionarioInversionista = isset($_POST['cuestionarioInversionista']) ? $_POST['cuestionarioInversionista'] : '';
$pApellidoBeneficiario = isset($_POST['pApellidoBeneficiario']) ? $_POST['pApellidoBeneficiario'] : '';
$nacionalidadPais = isset($_POST['nacionalidadPais']) ? $_POST['nacionalidadPais'] : 0;
 $Fk_promotor = 0;
$tipo_cliente = 'PERSONA FISICA';
$razon_social = isset($_POST['razon_social']) ? $_POST['razon_social'] : '';
 $tipo_identificacion = isset($_POST['tipo_identificacion']) ? $_POST['tipo_identificacion'] : '';
$estado_nac_extran = isset($_POST['estado_nac_extran']) ? $_POST['estado_nac_extran'] : 0;
$condicion_migrat = isset($_POST['condicionMigratoria']) ? $_POST['condicionMigratoria'] : '';
 $tel_casa = isset($_POST['tel_casa']) ? $_POST['tel_casa'] : 0;



$fk_pais = '1';



// echo 'nombreEmpresa'.$nombreEmpresa = isset($_POST['nombreEmpresa']) ? $_POST['nombreEmpresa'] : ''.'<br>';
// echo 'tipoEmpresa'.$tipoEmpresa = isset($_POST['tipoEmpresa']) ? $_POST['tipoEmpresa'] : ''.'<br>';
// echo 'estadoLaboral'.$estadoLaboral = isset($_POST['estadoLaboral']) ? $_POST['estadoLaboral'] : ''.'<br>';
// echo 'municipioLaboral'.$municipioLaboral = isset($_POST['municipioLaboral']) ? $_POST['municipioLaboral'] : ''.'<br>';
// echo 'localidadLaboral'.$localidadLaboral = isset($_POST['localidadLaboral']) ? $_POST['localidadLaboral'] : ''.'<br>';
// echo 'calleEmpresa'.$calleEmpresa = isset($_POST['calleEmpresa']) ? $_POST['calleEmpresa'] : ''.'<br>';
// echo 'nextEmpresa'.$nextEmpresa = isset($_POST['nextEmpresa']) ? $_POST['nextEmpresa'] : 0;
// echo 'nintEmpresa'.$nintEmpresa = isset($_POST['nintEmpresa']) ? $_POST['nintEmpresa'] : 0;
// echo 'colEmpresa'.$colEmpresa = isset($_POST['colEmpresa']) ? $_POST['colEmpresa'] : ''.'<br>';
// echo 'ciudadEmpresa'.$ciudadEmpresa = isset($_POST['ciudadEmpresa']) ? $_POST['ciudadEmpresa'] : ''.'<br>';
// echo 'cpEmpresa'.$cpEmpresa = isset($_POST['cpEmpresa']) ? $_POST['cpEmpresa'] : 0;
// echo 'ingresoMensual'.$ingresoMensual = isset($_POST['ingresoMensual']) ? $_POST['ingresoMensual'] : ''.'<br>';
// echo 'ingresoProvinientes'.$ingresoProvinientes = isset($_POST['ingresoProvinientes']) ? $_POST['ingresoProvinientes'] : ''.'<br>';
// echo 'recursosProvienen'.$recursosProvienen = isset($_POST['recursosProvienen']) ? $_POST['recursosProvienen'] : ''.'<br>';
// echo 'porcentajeTerceros'.$porcentajeTerceros = isset($_POST['porcentajeTerceros']) ? $_POST['porcentajeTerceros'] : 0;
// echo 'apellidoPaterno'.$apellidoPaterno = isset($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno'] : ''.'<br>';
// echo 'apellidoMaterno'.$apellidoMaterno = isset($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno'] : ''.'<br>';
// echo 'personalidadJuridica'.$personalidadJuridica = isset($_POST['personalidadJuridica']) ? $_POST['personalidadJuridica'] : ''.'<br>';
// echo 'porcentaje'.$porcentaje = isset($_POST['porcentaje']) ? $_POST['porcentaje'] : 0;
// echo 'tipoIdentificacion'.$tipoIdentificacion = isset($_POST['tipoIdentificacion']) ? $_POST['tipoIdentificacion'] : ''.'<br>';
// echo 'numeroIdentificacion'.$numeroIdentificacion = isset($_POST['numeroIdentificacion']) ? $_POST['numeroIdentificacion'] : ''.'<br>';
// echo 'nombreCotitular'.$nombreCotitular = isset($_POST['nombreCotitular']) ? $_POST['nombreCotitular'] : ''.'<br>';
// echo 'primerApellidoCotitular'.$primerApellidoCotitular = isset($_POST['primerApellidoCotitular']) ? $_POST['primerApellidoCotitular'] : ''.'<br>';
// echo 'segundoApellidoCotitular'.$segundoApellidoCotitular = isset($_POST['segundoApellidoCotitular']) ? $_POST['segundoApellidoCotitular'] : ''.'<br>';
// echo 'generoCotitular'.$generoCotitular = isset($_POST['generoCotitular']) ? $_POST['generoCotitular'] : ''.'<br>';
// echo 'identificacionOficialCotitular'.$identificacionOficialCotitular = isset($_POST['identificacionOficialCotitular']) ? $_POST['identificacionOficialCotitular'] : ''.'<br>';
// echo 'curpCotitular'.$curpCotitular = isset($_POST['curpCotitular']) ? $_POST['curpCotitular'] : ''.'<br>';
// echo 'rfcCotitular'.$rfcCotitular = isset($_POST['rfcCotitular']) ? $_POST['rfcCotitular'] : ''.'<br>';
// echo 'fNacCotitular'.$fNacCotitular = isset($_POST['fNacCotitular']) ? $_POST['fNacCotitular'] : ''.'<br>';
// echo 'religionCotitular'.$religionCotitular = isset($_POST['religionCotitular']) ? $_POST['religionCotitular'] : ''.'<br>';
// echo 'paisNacCotitular'.$paisNacCotitular = isset($_POST['paisNacCotitular']) ? $_POST['paisNacCotitular'] : ''.'<br>';
// echo 'nacionalidadCotitular'.$nacionalidadCotitular = isset($_POST['nacionalidadCotitular']) ? $_POST['nacionalidadCotitular'] : ''.'<br>';
// echo 'estCivilCotitular'.$estCivilCotitular = isset($_POST['estCivilCotitular']) ? $_POST['estCivilCotitular'] : ''.'<br>';
// echo 'emailPersonal'.$emailPersonal = isset($_POST['emailPersonal']) ? $_POST['emailPersonal'] : ''.'<br>';
// echo 'emailTrabajo'.$emailTrabajo = isset($_POST['emailTrabajo']) ? $_POST['emailTrabajo'] : ''.'<br>';
// echo 'telCelCotitular'.$telCelCotitular = isset($_POST['telCelCotitular']) ? $_POST['telCelCotitular'] : ''.'<br>';
// echo 'telCasaCotitular'.$telCasaCotitular = isset($_POST['telCasaCotitular']) ? $_POST['telCasaCotitular'] : ''.'<br>';
// echo 'telOfiCotitular'.$telOfiCotitular = isset($_POST['telOfiCotitular']) ? $_POST['telOfiCotitular'] : ''.'<br>';
// echo 'telOtroCotitular'.$telOtroCotitular = isset($_POST['telOtroCotitular']) ? $_POST['telOtroCotitular'] : ''.'<br>';
// echo 'estadoDom'.$estadoDom = isset($_POST['estadoDom']) ? $_POST['estadoDom'] : ''.'<br>';
// echo 'municipioDom'.$municipioDom = isset($_POST['municipioDom']) ? $_POST['municipioDom'] : ''.'<br>';
// echo 'localidadDom'.$localidadDom = isset($_POST['localidadDom']) ? $_POST['localidadDom'] : ''.'<br>';
// echo 'calleCotitular'.$calleCotitular = isset($_POST['calleCotitular']) ? $_POST['calleCotitular'] : ''.'<br>';
// echo 'noExtCotitular'.$noExtCotitular = isset($_POST['noExtCotitular']) ? $_POST['noExtCotitular'] : 0;
// echo 'noIntCotitular'.$noIntCotitular = isset($_POST['noIntCotitular']) ? $_POST['noIntCotitular'] : 0;
// echo 'coloniaCotitular'.$coloniaCotitular = isset($_POST['coloniaCotitular']) ? $_POST['coloniaCotitular'] : ''.'<br>';
// echo 'ciudadCotitular'.$ciudadCotitular = isset($_POST['ciudadCotitular']) ? $_POST['ciudadCotitular'] : ''.'<br>';
// echo 'cpCotitular'.$cpCotitular = isset($_POST['cpCotitular']) ? $_POST['cpCotitular'] : 0;
// echo 'ineAnverso'.$ineAnverso = isset($_POST['ineAnverso']) ? $_POST['ineAnverso'] : ''.'<br>';
// echo 'ineReverso'.$ineReverso = isset($_POST['ineReverso']) ? $_POST['ineReverso'] : ''.'<br>';
// echo 'comprobanteDomicilio'.$comprobanteDomicilio = isset($_POST['comprobanteDomicilio']) ? $_POST['comprobanteDomicilio'] : ''.'<br>';
// echo 'curpDoc'.$curpDoc = isset($_POST['curpDoc']) ? $_POST['curpDoc'] : ''.'<br>';
// echo 'estadoCuenta'.$estadoCuenta = isset($_POST['estadoCuenta']) ? $_POST['estadoCuenta'] : ''.'<br>';
// echo 'constanciaFiscal'.$constanciaFiscal = isset($_POST['constanciaFiscal']) ? $_POST['constanciaFiscal'] : ''.'<br>';
// echo 'cuestionarioInversionista'.$cuestionarioInversionista = isset($_POST['cuestionarioInversionista']) ? $_POST['cuestionarioInversionista'] : ''.'<br>';
// echo 'pApellidoBeneficiario'.$pApellidoBeneficiario = isset($_POST['pApellidoBeneficiario']) ? $_POST['pApellidoBeneficiario'] : ''.'<br>';
// echo 'nombre'.$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : ''.'<br>';
// echo 'datgen'.$datgen = isset($_POST['datgen']) ? $_POST['datgen'] : ''.'<br>';
// echo 'primerApellido'.$primerApellido = isset($_POST['primerApellido']) ? $_POST['primerApellido'] : ''.'<br>';
// echo 'segundoApellido'.$segundoApellido = isset($_POST['segundoApellido']) ? $_POST['segundoApellido'] : ''.'<br>';
// echo 'curp'.$curp = isset($_POST['curp']) ? $_POST['curp'] : ''.'<br>';
// echo 'identificacion'.$identificacionOficial = isset($_POST['identificacionOficial']) ? $_POST['identificacionOficial'] : ''.'<br>';
// echo 'genero'.$genero = isset($_POST['genero']) ? $_POST['genero'] : ''.'<br>';
// echo 'serieIdentificacion'.$serieNoIdentificacion = isset($_POST['serieNoIdentificacion']) ? $_POST['serieNoIdentificacion'] : ''.'<br>';
// echo 'rfc'.$rfc = isset($_POST['rfc']) ? $_POST['rfc'] : ''.'<br>';
// echo 'fNac'.$fNac = isset($_POST['fNac']) ? $_POST['fNac'] : ''.'<br>';
// echo 'religion'.$religion = isset($_POST['religion']) ? $_POST['religion'] : ''.'<br>';
// echo 'paisNac'.$paisNac = isset($_POST['paisNac']) ? $_POST['paisNac'] : 0 .'<br>';
// echo 'nacionalidad'.$nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : ''.'<br>';
// echo 'estCivil'.$estCivil = isset($_POST['estCivil']) ? $_POST['estCivil'] : ''.'<br>';
// echo 'nombreConyugue'.$nombreConyuge = isset($_POST['nombreConyuge']) ? $_POST['nombreConyuge'] : ''.'<br>';
// echo 'primerApellidoConyuge'.$primerApellidoConyuge = isset($_POST['primerApellidoConyuge']) ? $_POST['primerApellidoConyuge'] : ''.'<br>';
// echo 'segundoApellidoConyuge'.$segundoApellidoConyuge = isset($_POST['segundoApellidoConyuge']) ? $_POST['segundoApellidoConyuge'] : ''.'<br>';
// $numeroHijos = isset($_POST['numeroHijos']) ? $_POST['numeroHijos'] : 0;
// echo 'numeroHijos: ' . $numeroHijos;
// echo 'numeroDependientes'.$numeroDependientes = isset($_POST['numeroDependientes']) ? $_POST['numeroDependientes'] : 0;
// echo 'telCelular'.$telCelular = isset($_POST['telCelular']) ? $_POST['telCelular'] : ''.'<br>';
// echo 'telcasa'.$telCasa = isset($_POST['telCasa']) ? $_POST['telCasa'] : ''.'<br>';
// echo 'telOfici'.$telOfici = isset($_POST['telOfici']) ? $_POST['telOfici'] : ''.'<br>';
// echo 'telOtro'.$telOtro = isset($_POST['telOtro']) ? $_POST['telOtro'] : ''.'<br>';
// echo 'estado'.$estado = isset($_POST['estado']) ? $_POST['estado'] : 1 .'<br>';
// echo 'municipio'.$municipio = isset($_POST['municipio']) ? $_POST['municipio'] : ''.'<br>';
// echo 'localidad'.$localidad = isset($_POST['localidad']) ? $_POST['localidad'] : ''.'<br>';
// echo 'calle'.$calle = isset($_POST['calle']) ? $_POST['calle'] : ''.'<br>';
// echo 'noExt'.$noExt = isset($_POST['noExt']) ? $_POST['noExt'] : 0;
// echo 'noInt'.$noInt = isset($_POST['noInt']) ? $_POST['noInt'] : 0;
// echo 'colonia'.$colonia = isset($_POST['colonia']) ? $_POST['colonia'] : ''.'<br>';
// echo 'ciudad'.$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : ''.'<br>';
// echo 'cp'.$cp = isset($_POST['cp']) ? $_POST['cp'] : 0;
// echo 'profesion'.$profesion = isset($_POST['profesion']) ? $_POST['profesion'] : ''.'<br>';
// echo 'ocupacion'.$ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : ''.'<br>';
// echo 'puesto'.$puesto = isset($_POST['puesto']) ? $_POST['puesto'] : ''.'<br>';
// echo 'condicionActiva'.$condicionActiva = isset($_POST['condicionActiva']) ? $_POST['condicionActiva'] : ''.'<br>';



if (is_array($pApellidoBeneficiario)) {
    foreach ($pApellidoBeneficiario as $index => $apellido) {
        $index;
       $apellido;
        $sApellidoBeneficiario[$index];
        $parentezco[$index];
        $porcentajeBeneficiario[$index];
        $fNacBen[$index];
        $dirBeneficiario[$index];
    }
} 



echo 'Nacionalidad'. $nacionalidad;



$insertDatosGenerales = ControladorClientes::ctrInsertCliente($Fk_promotor, $tipo_cliente, $razon_social, $nombre, $primerApellido, $segundoApellido, $genero, $tipo_identificacion, $serieNoIdentificacion, 
$curp, $rfc, $fNac, $religion, $paisNac, $nacionalidadPais, $estado_nac_extran, $nacionalidad, $condicion_migrat, $estCivil, $nombreConyuge, $primerApellidoConyuge, 
$segundoApellidoConyuge, $numeroHijos, $numeroDependientes, $telCelular, $tel_casa, $telOfici, $telOtro, $emailPersonal, $emailTrabajo, $fk_pais, $estadoDom, $municipioDom, $localidadDom, $calle, $noInt, 
$noExt, $colonia, $ciudad, $cp);



if ($insertDatosGenerales['status'] == 'success') {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{$insertDatosGenerales['message']}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: '{$insertDatosGenerales['message']}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>";
}


?>



