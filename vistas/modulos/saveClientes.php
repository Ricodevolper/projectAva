<?php




if (isset($_POST['insertCliente'])) {

// Variables directas del array
$nombre = isset($_POST['nombre']) ? strtoupper($_POST['nombre']) : '';

$primerApellido = isset($_POST['primerApellido']) ? strtoupper($_POST['primerApellido']) : '';
$segundoApellido = isset($_POST['segundoApellido']) ? strtoupper($_POST['segundoApellido']) : '';
$curp = isset($_POST['curp']) ? strtoupper($_POST['curp']) : '';
$identificacionOficial = isset($_POST['identificacionOficial']) ? strtoupper($_POST['identificacionOficial']) : '';
$genero = isset($_POST['genero']) ? $_POST['genero'] : '';
$serieNoIdentificacion = isset($_POST['serieNoIdentificacion']) ? strtoupper($_POST['serieNoIdentificacion']) : '';
$rfc = isset($_POST['rfc']) ? strtoupper($_POST['rfc']) : '';
$fNac = isset($_POST['fNac']) ? $_POST['fNac'] : '';
$religion = isset($_POST['religion']) ? strtoupper($_POST['religion']) : '';
$paisNac = isset($_POST['paisNac']) ? $_POST['paisNac'] : 0;
$nacionalidad = isset($_POST['nacionalidad']) ? strtoupper($_POST['nacionalidad']) : 0;
$estCivil = isset($_POST['estCivil']) ? strtoupper($_POST['estCivil']) : '';
$nombreConyuge = isset($_POST['nombreConyuge']) ? $_POST['nombreConyuge'] : '';
$primerApellidoConyuge = isset($_POST['primerApellidoConyuge']) ? strtoupper($_POST['primerApellidoConyuge']) : '';
$segundoApellidoConyuge = isset($_POST['segundoApellidoConyuge']) ? strtoupper($_POST['segundoApellidoConyuge']) : '';
$numeroHijos = isset($_POST['numeroHijos']) ? $_POST['numeroHijos'] : 0;
$numeroDependientes = isset($_POST['numeroDependientes']) ? $_POST['numeroDependientes'] : 0;
$telCelular = isset($_POST['telCelular']) ? $_POST['telCelular'] : '';
$telCasa = isset($_POST['telCasa']) ? $_POST['telCasa'] : '';
$telOfici = isset($_POST['telOfici']) ? $_POST['telOfici'] : '';
$telOtro = isset($_POST['telOtro']) ? $_POST['telOtro'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : 0;
$municipio = isset($_POST['municipio']) ? $_POST['municipio'] : '';
$localidad = isset($_POST['localidad']) ? $_POST['localidad'] : '';
$calle = isset($_POST['calle']) ? strtoupper($_POST['calle']) : '';
$noExt = isset($_POST['noExt']) ? $_POST['noExt'] : 0;
$noInt = isset($_POST['noInt']) ? $_POST['noInt'] : 0;
$colonia = isset($_POST['colonia']) ? $_POST['colonia'] : '';
$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : '';
$cp = isset($_POST['cp']) ? $_POST['cp'] : 0;
$profesion = isset($_POST['profesion']) ? strtoupper($_POST['profesion']) : '';
$ocupacion = isset($_POST['ocupacion']) ? strtoupper($_POST['ocupacion']) : '';
$puesto = isset($_POST['puesto']) ? strtoupper($_POST['puesto']) : '';
$condicionActiva = isset($_POST['condicionActiva']) ? strtoupper($_POST['condicionActiva']) : '';
$nombreEmpresa = isset($_POST['nombreEmpresa']) ? strtoupper($_POST['nombreEmpresa']) : '';
$tipoEmpresa = isset($_POST['tipoEmpresa']) ? strtoupper($_POST['tipoEmpresa']) : '';
$estadoLaboral = isset($_POST['estadoLaboral']) ? $_POST['estadoLaboral'] : 0;
$municipioLaboral = isset($_POST['municipioLaboral']) ? $_POST['municipioLaboral'] : 0;
$localidadLaboral = isset($_POST['localidadLaboral']) ? $_POST['localidadLaboral'] : 0;
$calleEmpresa = isset($_POST['calleEmpresa']) ? strtoupper($_POST['calleEmpresa']) : '';
$nextEmpresa = isset($_POST['nextEmpresa']) ? $_POST['nextEmpresa'] : 0;
$nintEmpresa = isset($_POST['nintEmpresa']) ? $_POST['nintEmpresa'] : 0;
$colEmpresa = isset($_POST['colEmpresa']) ? strtoupper($_POST['colEmpresa']) : '';
$ciudadEmpresa = isset($_POST['ciudadEmpresa']) ? $_POST['ciudadEmpresa'] : '';
$cpEmpresa = isset($_POST['cpEmpresa']) ? $_POST['cpEmpresa'] : 0;
$ingresoMensual = isset($_POST['ingresoMensual']) ? $_POST['ingresoMensual'] : '';
$ingresoProvinientes = isset($_POST['ingresoProvinientes']) ? strtoupper($_POST['ingresoProvinientes']) : '';
$recursosProvienen = isset($_POST['recursosProvienen']) ? $_POST['recursosProvienen'] : '';
$porcentajePropios = isset($_POST['porcentajePropios']) ? $_POST['porcentajePropios'] : '';
$especificaOtro = isset($_POST['especificaOtro']) ? $_POST['especificaOtro'] : '';
$mensualTransaccion = isset($_POST['mensualTransaccion']) ? $_POST['mensualTransaccion'] : '';
$montoTransaccion = isset($_POST['montoTransaccion']) ? $_POST['montoTransaccion'] : '';
$saldoPromedioMensual = isset($_POST['saldoPromedioMensual']) ? $_POST['saldoPromedioMensual'] : '';
$usoCuenta = isset($_POST['usoCuenta']) ? $_POST['usoCuenta'] : '';
$porcentajeTerceros = isset($_POST['porcentajeTerceros']) ? $_POST['porcentajeTerceros'] : 0;
$apellidoPaterno = isset($_POST['apellidoPaterno']) ? strtoupper($_POST['apellidoPaterno']) : '';
$apellidoMaterno = isset($_POST['apellidoMaterno']) ? strtoupper($_POST['apellidoMaterno']) : '';
$personalidadJuridica = isset($_POST['personalidadJuridica']) ? $_POST['personalidadJuridica'] : '';
$porcentaje = isset($_POST['porcentaje']) ? $_POST['porcentaje'] : 0;
$tipoIdentificacion = isset($_POST['tipoIdentificacion']) ? $_POST['tipoIdentificacion'] : '';
$numeroIdentificacion = isset($_POST['numeroIdentificacion']) ? $_POST['numeroIdentificacion'] : '';
$nombreCotitular = isset($_POST['nombreCotitular']) ? strtoupper($_POST['nombreCotitular']) : '';
$primerApellidoCotitular = isset($_POST['primerApellidoCotitular']) ? strtoupper($_POST['primerApellidoCotitular']) : '';
$segundoApellidoCotitular = isset($_POST['segundoApellidoCotitular']) ? strtoupper($_POST['segundoApellidoCotitular']) : '';
$generoCotitular = isset($_POST['generoCotitular']) ? strtoupper($_POST['generoCotitular']) : '';
$identificacionOficialCotitular = isset($_POST['identificacionOficialCotitular']) ? $_POST['identificacionOficialCotitular'] : '';
$curpCotitular = isset($_POST['curpCotitular']) ? strtoupper($_POST['curpCotitular']) : '';
$rfcCotitular = isset($_POST['rfcCotitular']) ? strtoupper($_POST['rfcCotitular']) : '';
$fNacCotitular = isset($_POST['fNacCotitular']) ? $_POST['fNacCotitular'] : '';
$municipioCotitular = isset($_POST['municipioCotitular']) ? $_POST['municipioCotitular'] : '';
$localidadCotitular = isset($_POST['localidadCotitular']) ? $_POST['localidadCotitular'] : '';
$religionCotitular = isset($_POST['religionCotitular']) ? strtoupper($_POST['religionCotitular']) : '';
$Fk_pais_nac_cotitular = isset($_POST['paisNacCotitular']) ? $_POST['paisNacCotitular'] : '';
$nacionalidad_cotitular = isset($_POST['nacionalidadCotitular']) ? $_POST['nacionalidadCotitular'] : 0;
$estado_civil_cotitular = isset($_POST['estCivilCotitular']) ? strtoupper($_POST['estCivilCotitular']) : '';
$emailPersonal = isset($_POST['emailPersonal']) ? $_POST['emailPersonal'] : '';
$emailTrabajo = isset($_POST['emailTrabajo']) ? $_POST['emailTrabajo'] : '';
$tel_celular_cotitular = isset($_POST['telCelCotitular']) ? $_POST['telCelCotitular'] : '';
$tel_casa_cotitular = isset($_POST['telCasaCotitular']) ? $_POST['telCasaCotitular'] : '';
$telOfiCotitular = isset($_POST['telOfiCotitular']) ? $_POST['telOfiCotitular'] : '';
$telOtroCotitular = isset($_POST['telOtroCotitular']) ? $_POST['telOtroCotitular'] : '';
$condicionMigratoriaCotitular = isset($_POST['condicionMigratoriaCotitular']) ? $_POST['condicionMigratoriaCotitular'] : '';
$estadoDom = isset($_POST['estadoDom']) ? $_POST['estadoDom'] : '';
$municipioDom = isset($_POST['municipioDom']) ? $_POST['municipioDom'] : '';
$localidadDom = isset($_POST['localidadDom']) ? $_POST['localidadDom'] : '';
$calleCotitular = isset($_POST['calleCotitular']) ? strtoupper($_POST['calleCotitular']) : '';
$noExtCotitular = isset($_POST['noExtCotitular']) ? $_POST['noExtCotitular'] : 0;
$noIntCotitular = isset($_POST['noIntCotitular']) ? $_POST['noIntCotitular'] : 0;
$estadoCotitular = isset($_POST['estadoCotitular']) ? $_POST['estadoCotitular'] : 0;
$coloniaCotitular = isset($_POST['coloniaCotitular']) ? strtoupper($_POST['coloniaCotitular']) : '';
$estadoNacCotitular = isset($_POST['estadoNacCotitular']) ? $_POST['estadoNacCotitular'] : '';
$serieNoIdentificacionCotitular = isset($_POST['serieNoIdentificacionCotitular']) ? $_POST['serieNoIdentificacionCotitular'] : '';
$ciudadCotitular = isset($_POST['ciudadCotitular']) ? $_POST['ciudadCotitular'] : '';
$email_cotitular = isset($_POST['emailPersonalCotitular']) ? $_POST['emailPersonalCotitular'] : '';
$cpCotitular = isset($_POST['cpCotitular']) ? $_POST['cpCotitular'] : 0;
$ineAnverso = isset($_POST['ineAnverso']) ? $_POST['ineAnverso'] : '';
$ineReverso = isset($_POST['ineReverso']) ? $_POST['ineReverso'] : '';
$comprobanteDomicilio = isset($_POST['comprobanteDomicilio']) ? $_POST['comprobanteDomicilio'] : '';
$curpDoc = isset($_POST['curpDoc']) ? $_POST['curpDoc'] : '';
$estadoCuenta = isset($_POST['estadoCuenta']) ? $_POST['estadoCuenta'] : '';
$constanciaFiscal = isset($_POST['constanciaFiscal']) ? $_POST['constanciaFiscal'] : '';
$otroTipoEmpresa = isset($_POST['otroTipoEmpresa']) ? $_POST['otroTipoEmpresa'] : '';
$otraProfesion = isset($_POST['otraProfesion']) ? $_POST['otraProfesion'] : '';
$otraCondicion = isset($_POST['otraCondicion']) ? $_POST['otraCondicion'] : '';
$cuestionarioInversionista = isset($_POST['cuestionarioInversionista']) ? $_POST['cuestionarioInversionista'] : '';
$pApellidoBeneficiario = isset($_POST['pApellidoBeneficiario']) ? $_POST['pApellidoBeneficiario'] : '';
$nacionalidadPais = isset($_POST['nacionalidadPais']) ? $_POST['nacionalidadPais'] : 0;
$Fk_promotor = 3;
$tipo_cliente = 'PERSONA FISICA';
$razon_social = isset($_POST['razon_social']) ? $_POST['razon_social'] : '';
$tipo_identificacion = isset($_POST['tipo_identificacion']) ? $_POST['tipo_identificacion'] : '';
$estado_nac_extran = isset($_POST['estado_nac_extran']) ? $_POST['estado_nac_extran'] : 0;
$condicion_migrat = isset($_POST['condicionMigratoria']) ? $_POST['condicionMigratoria'] : '';
$tel_casa = isset($_POST['tel_casa']) ? $_POST['tel_casa'] : 0;

$nombresTerceros = $_POST['nombreBeneficiariosTerceros'] ?? [];
$apellidosPaternos = $_POST['apellidoPaternosTerceros'] ?? [];
$apellidosMaternos = $_POST['apellidoMaternosTerceros'] ?? [];
$personalidades = $_POST['personalidadesJuridicasTerceros'] ?? [];
$porcentajes = $_POST['porcentajesTerceros'] ?? [];






$fk_pais = '1';












$insertDatosGenerales = ControladorClientes::ctrInsertCliente(
    $Fk_promotor,
    $tipo_cliente,
    $razon_social,
    $nombre,
    $primerApellido,
    $segundoApellido,
    $genero,
    $identificacionOficial,
    $serieNoIdentificacion,
    $curp,
    $rfc,
    $fNac,
    $religion,
    $paisNac,
    $nacionalidadPais,
    $estado_nac_extran,
    $nacionalidadPais,
    $condicion_migrat,
    $estCivil,
    $nombreConyuge,
    $primerApellidoConyuge,
    $segundoApellidoConyuge,
    $numeroHijos,
    $numeroDependientes,
    $telCelular,
    $tel_casa,
    $telOfici,
    $telOtro,
    $emailPersonal,
    $emailTrabajo,
    $fk_pais,
    $estadoDom,
    $municipioDom,
    $localidadDom,
    $calle,
    $noInt,
    $noExt,
    $colonia,
    $ciudad,
    $cp
);




$id_cliente = $insertDatosGenerales['id_cliente'];

if (!empty($id_cliente)) {
    $ActividadEconomica =  ControladorClientes::ctrInsertClienteActEco(
        $id_cliente,
        $profesion,
        $otraProfesion,
        $ocupacion,
        $puesto,
        $condicionActiva,
        $otraCondicion,
        $nombreEmpresa,
        $tipoEmpresa,
        $otroTipoEmpresa,
        $fk_pais,
        $estadoLaboral,
        $municipioLaboral,
        $localidadLaboral,
        $calleEmpresa,
        $nintEmpresa,
        $nextEmpresa,
        $colEmpresa,
        $ciudadEmpresa,
        $cpEmpresa,
        $ingresoMensual,
        $ingresoProvinientes
    );



    $insertTransaccionalidad = ControladorClientes::ctrInsertTransaccionalidad($id_cliente, $recursosProvienen, $porcentajePropios, $porcentajeTerceros, $usoCuenta, $especificaOtro, $mensualTransaccion, $montoTransaccion, $saldoPromedioMensual);


    // Verifica si $_POST contiene los datos necesarios
    if (isset($_POST['nombreBeneficiario'], $_POST['pApellidoBeneficiario'], $_POST['sApellidoBeneficiario'])) {
        $nombreBeneficiario = $_POST['nombreBeneficiario'];
        $pApellidoBeneficiario = $_POST['pApellidoBeneficiario'];
        $sApellidoBeneficiario = $_POST['sApellidoBeneficiario'];
        $parentezco = $_POST['parentezco'] ?? [];
        $porcentajeBeneficiario = $_POST['porcentajeBeneficiario'] ?? [];
        $fNacBen = $_POST['fNacBen'] ?? [];
        $telefonoBeneficiario = $_POST['telBeneficiario'] ?? [];
        $dirBeneficiario = $_POST['dirBeneficiario'] ?? [];
        $claveBeneficiario = $_POST['claveBeneficiario'] ?? 'N/A'; // Valor por defecto si no está definido

        // Reorganiza los datos en un solo array
        $beneficiarios = [];
        foreach ($nombreBeneficiario as $index => $nombre) {
            $beneficiarios[] = [
                'nombre' => $nombre,
                'primerApellido' => $pApellidoBeneficiario[$index] ?? '',
                'segundoApellido' => $sApellidoBeneficiario[$index] ?? '',
                'parentezco' => $parentezco[$index] ?? '',
                'porcentaje' => $porcentajeBeneficiario[$index] ?? 0,
                'fechaNacimiento' => $fNacBen[$index] ?? '',
                'telefono' => $telefonoBeneficiario[$index] ?? '',
                'direccion' => $dirBeneficiario[$index] ?? '',
                'clave' => $claveBeneficiario,
            ];
        }

        // Inserta los datos en la base de datos
        foreach ($beneficiarios as $beneficiario) {
            $Nom_beneficiario = $beneficiario['nombre'];
            $Apaterno_beneficiario = $beneficiario['primerApellido'];
            $Amaterno_beneficiario = $beneficiario['segundoApellido'];
            $Parentesco = $beneficiario['parentezco'];
            $Porcentaje = $beneficiario['porcentaje'];
            $F_naciemintoben = $beneficiario['fechaNacimiento'];
            $Tel_contacto = $beneficiario['telefono'];
            $Direccion_ben = $beneficiario['direccion'];
            $Clave = $beneficiario['clave'];

            // Inserta el beneficiario
            $insertsBenficiarios = ControladorClientes::ctrInsertClienteBenefeciario(
                $Nom_beneficiario,
                $Apaterno_beneficiario,
                $Amaterno_beneficiario,
                $Parentesco,
                $Clave,
                $Tel_contacto,
                $Direccion_ben,
                $F_naciemintoben
            );
            $id_beneficiario = $insertsBenficiarios['id_beneficiario'];
            $InsertRelBenCli = ControladorClientes::ctrInsertClienteBenefeciarioRel($id_beneficiario, $id_cliente, $Porcentaje);

            if (!$insertsBenficiarios) {
                // Log de error si falla
                error_log("Error al insertar el beneficiario: " . json_encode($beneficiario));
            }
        }




        if (!empty($nombresTerceros)) {
            // Recorrer las filas para procesarlas
            foreach ($nombresTerceros as $index => $nombre) {
                $apellidoPaterno = $apellidosPaternos[$index] ?? '';
                $apellidoMaterno = $apellidosMaternos[$index] ?? '';
                $personalidad = $personalidades[$index] ?? '';
                $porcentaje = $porcentajes[$index] ?? 0;
            }
        }
    } else {
        error_log("No se encontraron datos de beneficiarios en el formulario.");
    }





    if (!empty($nombresTerceros)) {
        // Recorrer las filas para procesarlas
        foreach ($nombresTerceros as $index => $nombre) {
            $apellidoPaterno = $apellidosPaternos[$index] ?? '';
            $apellidoMaterno = $apellidosMaternos[$index] ?? '';
            $personalidad = $personalidades[$index] ?? '';
            $porcentaje = $porcentajes[$index] ?? 0;


            // $insert_tercero = ControladorClientes::ctrInsertTercero($nombre, $apellidoMaterno, $apellidoMaterno, $personalidad,$porcentaje);
        }
    }


    $insertCotitular = ControladorClientes::ctrInsertarCotitular(
        $id_cliente,
        $nombreCotitular,
        $primerApellidoCotitular,
        $segundoApellidoCotitular,
        $generoCotitular,
        $identificacionOficialCotitular,
        $serieNoIdentificacionCotitular,
        $curpCotitular,
        $rfcCotitular,
        $fNacCotitular,
        $religionCotitular,
        $fk_pais,
        '1',
        $nacionalidad_cotitular,
        $condicionMigratoriaCotitular,
        $estado_civil_cotitular,
        $tel_celular_cotitular,
        $tel_casa_cotitular,
        $email_cotitular,
        $fk_pais,
        $estadoCotitular,
        $municipioCotitular,
        $localidadCotitular,
        $calleCotitular,
        $noExtCotitular,
        $noIntCotitular,
        $coloniaCotitular,
        $ciudadCotitular,
        $cpCotitular
    );



    // $baseDir = __DIR__ . '/documentos/clientes/';

    $baseDir = '/Applications/XAMPP/xamppfiles/htdocs/project2n9G7KIGFSzo/documentos/clientes/';

    $tamanioMaximo = 5 * 1024 * 1024; // 5 MB
    $extensionesPermitidas = ['jpeg', 'jpg', 'png', 'pdf'];
    
    // Verificar si existe la carpeta documentos y documentos/clientes
    if (!is_dir(__DIR__ . '/documentos')) {
        if (!mkdir(__DIR__ . '/documentos', 0777, true)) {
            die("Error: No se pudo crear el directorio 'documentos'. Verifica los permisos.");
        }
    }
    
    if (!is_dir(__DIR__ . '/documentos/clientes')) {
        if (!mkdir(__DIR__ . '/documentos/clientes', 0777, true)) {
            die("Error: No se pudo crear el directorio 'documentos/clientes'. Verifica los permisos.");
        }
    }
    
    // Crear carpeta del cliente si no existe
    $clienteDir = $baseDir . $id_cliente;
    if (!is_dir($clienteDir)) {
        if (!mkdir($clienteDir, 0777, true)) {
            die("Error: No se pudo crear el directorio $clienteDir. Verifica los permisos.");
        }
    }
    
    // Documentos a procesar
    $documentos = [
        'ineAnverso' => 'ineanver',
        'ineReverso' => 'inerever',
        'comprobanteDomicilio' => 'domicilio',
        'curpDoc' => 'curp',
        'estadoCuenta' => 'estado_cuenta',
        'constanciaFiscal' => 'constfiscal',
        'cuestionarioInversionista' => 'cuestinv'
    ];
    
    // Array para almacenar los nombres finales de los documentos
    $nombresDocs = [];
    
    // Procesar y mover archivos
    foreach ($documentos as $inputName => $nombreDocumento) {
        if (!empty($_FILES[$inputName]['name'])) {
            $file = $_FILES[$inputName];
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $tamanioArchivo = $file['size'];
    
            // Validar tipo de archivo
            if (!in_array($extension, $extensionesPermitidas)) {
                echo "Error: El archivo {$file['name']} tiene un formato no permitido.<br>";
                continue;
            }
    
            // Crear nuevo nombre y ruta destino
            $nuevoNombre = $nombreDocumento . '-' . $id_cliente . '.' . $extension;
            $rutaDestino = $clienteDir . '/' . $nuevoNombre;
    
            // Mover el archivo al destino
            if (move_uploaded_file($file['tmp_name'], $rutaDestino)) {
                echo "Archivo $nuevoNombre guardado correctamente.<br>";
                // Agregar el nombre final al array $nombresDocs
                $nombresDocs[] = $nuevoNombre;
            } else {
                echo "Error al guardar $nombreDocumento.<br>";
            }
        } else {
            echo "Error: No se seleccionó ningún archivo para $inputName.<br>";
        }
    }

    
    // Imprimir los nombres finales guardados
    if (!empty($nombresDocs)) {

    $fech_up = date('Y-m-d');


    $ine_anverso_cotitutar = NULL;
    $ine_reverso_cotitular = NULL;
    $curp_cotitular_img = NULL;
    $situacion_fiscal_cotitular_img = NULL;


       $insertRuta =  ControladorClientes::ctrInsertDocsPersonales(
            $id_cliente,
            $nombresDocs[0],
            $nombresDocs[1],
            $nombresDocs[2],
            $nombresDocs[3],
            $nombresDocs[4],
            $nombresDocs[5],
            $nombresDocs[6],
            $fech_up,
            $ine_anverso_cotitutar,
            $ine_reverso_cotitular,
            $curp_cotitular_img,
            $situacion_fiscal_cotitular_img
       );
      
    } else {
        echo "No se guardaron documentos.";
    }
}


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

}




if (isset($_POST['editCliente']) && !empty($_POST['id_cliente']) ) {




// Variables directas del array
$nombre = isset($_POST['nombre']) ? strtoupper($_POST['nombre']) : '';
$id_cliente = isset($_POST['id_cliente']);

$primerApellido = isset($_POST['primerApellido']) ? strtoupper($_POST['primerApellido']) : '';
$segundoApellido = isset($_POST['segundoApellido']) ? strtoupper($_POST['segundoApellido']) : '';
$curp = isset($_POST['curp']) ? strtoupper($_POST['curp']) : '';
$identificacionOficial = isset($_POST['identificacionOficial']) ? strtoupper($_POST['identificacionOficial']) : '';
$genero = isset($_POST['genero']) ? $_POST['genero'] : '';
$serieNoIdentificacion = isset($_POST['serieNoIdentificacion']) ? strtoupper($_POST['serieNoIdentificacion']) : '';
$rfc = isset($_POST['rfc']) ? strtoupper($_POST['rfc']) : '';
$fNac = isset($_POST['fNac']) ? $_POST['fNac'] : '';
$religion = isset($_POST['religion']) ? strtoupper($_POST['religion']) : '';
$paisNac = isset($_POST['paisNac']) ? $_POST['paisNac'] : 0;
$nacionalidad = isset($_POST['nacionalidad']) ? strtoupper($_POST['nacionalidad']) : 0;
$estCivil = isset($_POST['estCivil']) ? strtoupper($_POST['estCivil']) : '';
$nombreConyuge = isset($_POST['nombreConyuge']) ? $_POST['nombreConyuge'] : '';
$primerApellidoConyuge = isset($_POST['primerApellidoConyuge']) ? strtoupper($_POST['primerApellidoConyuge']) : '';
$segundoApellidoConyuge = isset($_POST['segundoApellidoConyuge']) ? strtoupper($_POST['segundoApellidoConyuge']) : '';
$numeroHijos = isset($_POST['numeroHijos']) ? $_POST['numeroHijos'] : 0;
$numeroDependientes = isset($_POST['numeroDependientes']) ? $_POST['numeroDependientes'] : 0;
$telCelular = isset($_POST['telCelular']) ? $_POST['telCelular'] : '';
$telCasa = isset($_POST['telCasa']) ? $_POST['telCasa'] : '';
$telOfici = isset($_POST['telOfici']) ? $_POST['telOfici'] : '';
$telOtro = isset($_POST['telOtro']) ? $_POST['telOtro'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : 0;
$municipio = isset($_POST['municipio']) ? $_POST['municipio'] : '';
$localidad = isset($_POST['localidad']) ? $_POST['localidad'] : '';
$calle = isset($_POST['calle']) ? strtoupper($_POST['calle']) : '';
$noExt = isset($_POST['noExt']) ? $_POST['noExt'] : 0;
$noInt = isset($_POST['noInt']) ? $_POST['noInt'] : 0;
$colonia = isset($_POST['colonia']) ? $_POST['colonia'] : '';
$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : '';
$cp = isset($_POST['cp']) ? $_POST['cp'] : 0;
$profesion = isset($_POST['profesion']) ? strtoupper($_POST['profesion']) : '';
$ocupacion = isset($_POST['ocupacion']) ? strtoupper($_POST['ocupacion']) : '';
$puesto = isset($_POST['puesto']) ? strtoupper($_POST['puesto']) : '';
$condicionActiva = isset($_POST['condicionActiva']) ? strtoupper($_POST['condicionActiva']) : '';
$nombreEmpresa = isset($_POST['nombreEmpresa']) ? strtoupper($_POST['nombreEmpresa']) : '';
$tipoEmpresa = isset($_POST['tipoEmpresa']) ? strtoupper($_POST['tipoEmpresa']) : '';
$estadoLaboral = isset($_POST['estadoLaboral']) ? $_POST['estadoLaboral'] : 0;
$municipioLaboral = isset($_POST['municipioLaboral']) ? $_POST['municipioLaboral'] : 0;
$localidadLaboral = isset($_POST['localidadLaboral']) ? $_POST['localidadLaboral'] : 0;
$calleEmpresa = isset($_POST['calleEmpresa']) ? strtoupper($_POST['calleEmpresa']) : '';
$nextEmpresa = isset($_POST['nextEmpresa']) ? $_POST['nextEmpresa'] : 0;
$nintEmpresa = isset($_POST['nintEmpresa']) ? $_POST['nintEmpresa'] : 0;
$colEmpresa = isset($_POST['colEmpresa']) ? strtoupper($_POST['colEmpresa']) : '';
$ciudadEmpresa = isset($_POST['ciudadEmpresa']) ? $_POST['ciudadEmpresa'] : '';
$cpEmpresa = isset($_POST['cpEmpresa']) ? $_POST['cpEmpresa'] : 0;
$ingresoMensual = isset($_POST['ingresoMensual']) ? $_POST['ingresoMensual'] : '';
$ingresoProvinientes = isset($_POST['ingresoProvinientes']) ? strtoupper($_POST['ingresoProvinientes']) : '';
$recursosProvienen = isset($_POST['recursosProvienen']) ? $_POST['recursosProvienen'] : '';
$porcentajePropios = isset($_POST['porcentajePropios']) ? $_POST['porcentajePropios'] : '';
$especificaOtro = isset($_POST['especificaOtro']) ? $_POST['especificaOtro'] : '';
$mensualTransaccion = isset($_POST['mensualTransaccion']) ? $_POST['mensualTransaccion'] : '';
$montoTransaccion = isset($_POST['montoTransaccion']) ? $_POST['montoTransaccion'] : '';
$saldoPromedioMensual = isset($_POST['saldoPromedioMensual']) ? $_POST['saldoPromedioMensual'] : '';
$usoCuenta = isset($_POST['usoCuenta']) ? $_POST['usoCuenta'] : '';
$porcentajeTerceros = isset($_POST['porcentajeTerceros']) ? $_POST['porcentajeTerceros'] : 0;
$apellidoPaterno = isset($_POST['apellidoPaterno']) ? strtoupper($_POST['apellidoPaterno']) : '';
$apellidoMaterno = isset($_POST['apellidoMaterno']) ? strtoupper($_POST['apellidoMaterno']) : '';
$personalidadJuridica = isset($_POST['personalidadJuridica']) ? $_POST['personalidadJuridica'] : '';
$porcentaje = isset($_POST['porcentaje']) ? $_POST['porcentaje'] : 0;
$tipoIdentificacion = isset($_POST['tipoIdentificacion']) ? $_POST['tipoIdentificacion'] : '';
$numeroIdentificacion = isset($_POST['numeroIdentificacion']) ? $_POST['numeroIdentificacion'] : '';
$nombreCotitular = isset($_POST['nombreCotitular']) ? strtoupper($_POST['nombreCotitular']) : '';
$primerApellidoCotitular = isset($_POST['primerApellidoCotitular']) ? strtoupper($_POST['primerApellidoCotitular']) : '';
$segundoApellidoCotitular = isset($_POST['segundoApellidoCotitular']) ? strtoupper($_POST['segundoApellidoCotitular']) : '';
$generoCotitular = isset($_POST['generoCotitular']) ? strtoupper($_POST['generoCotitular']) : '';
$identificacionOficialCotitular = isset($_POST['identificacionOficialCotitular']) ? $_POST['identificacionOficialCotitular'] : '';
$curpCotitular = isset($_POST['curpCotitular']) ? strtoupper($_POST['curpCotitular']) : '';
$rfcCotitular = isset($_POST['rfcCotitular']) ? strtoupper($_POST['rfcCotitular']) : '';
$fNacCotitular = isset($_POST['fNacCotitular']) ? $_POST['fNacCotitular'] : '';
$municipioCotitular = isset($_POST['municipioCotitular']) ? $_POST['municipioCotitular'] : '';
$localidadCotitular = isset($_POST['localidadCotitular']) ? $_POST['localidadCotitular'] : '';
$religionCotitular = isset($_POST['religionCotitular']) ? strtoupper($_POST['religionCotitular']) : '';
$Fk_pais_nac_cotitular = isset($_POST['paisNacCotitular']) ? $_POST['paisNacCotitular'] : '';
$nacionalidad_cotitular = isset($_POST['nacionalidadCotitular']) ? $_POST['nacionalidadCotitular'] : 0;
$estado_civil_cotitular = isset($_POST['estCivilCotitular']) ? strtoupper($_POST['estCivilCotitular']) : '';
$emailPersonal = isset($_POST['emailPersonal']) ? $_POST['emailPersonal'] : '';
$emailTrabajo = isset($_POST['emailTrabajo']) ? $_POST['emailTrabajo'] : '';
$tel_celular_cotitular = isset($_POST['telCelCotitular']) ? $_POST['telCelCotitular'] : '';
$tel_casa_cotitular = isset($_POST['telCasaCotitular']) ? $_POST['telCasaCotitular'] : '';
$telOfiCotitular = isset($_POST['telOfiCotitular']) ? $_POST['telOfiCotitular'] : '';
$telOtroCotitular = isset($_POST['telOtroCotitular']) ? $_POST['telOtroCotitular'] : '';
$condicionMigratoriaCotitular = isset($_POST['condicionMigratoriaCotitular']) ? $_POST['condicionMigratoriaCotitular'] : '';
$estadoDom = isset($_POST['estadoDom']) ? $_POST['estadoDom'] : '';
$municipioDom = isset($_POST['municipioDom']) ? $_POST['municipioDom'] : '';
$localidadDom = isset($_POST['localidadDom']) ? $_POST['localidadDom'] : '';
$calleCotitular = isset($_POST['calleCotitular']) ? strtoupper($_POST['calleCotitular']) : '';
$noExtCotitular = isset($_POST['noExtCotitular']) ? $_POST['noExtCotitular'] : 0;
$noIntCotitular = isset($_POST['noIntCotitular']) ? $_POST['noIntCotitular'] : 0;
$estadoCotitular = isset($_POST['estadoCotitular']) ? $_POST['estadoCotitular'] : 0;
$coloniaCotitular = isset($_POST['coloniaCotitular']) ? strtoupper($_POST['coloniaCotitular']) : '';
$estadoNacCotitular = isset($_POST['estadoNacCotitular']) ? $_POST['estadoNacCotitular'] : '';
$serieNoIdentificacionCotitular = isset($_POST['serieNoIdentificacionCotitular']) ? $_POST['serieNoIdentificacionCotitular'] : '';
$ciudadCotitular = isset($_POST['ciudadCotitular']) ? $_POST['ciudadCotitular'] : '';
$email_cotitular = isset($_POST['emailPersonalCotitular']) ? $_POST['emailPersonalCotitular'] : '';
$cpCotitular = isset($_POST['cpCotitular']) ? $_POST['cpCotitular'] : 0;
$ineAnverso = isset($_POST['ineAnverso']) ? $_POST['ineAnverso'] : '';
$ineReverso = isset($_POST['ineReverso']) ? $_POST['ineReverso'] : '';
$comprobanteDomicilio = isset($_POST['comprobanteDomicilio']) ? $_POST['comprobanteDomicilio'] : '';
$curpDoc = isset($_POST['curpDoc']) ? $_POST['curpDoc'] : '';
$estadoCuenta = isset($_POST['estadoCuenta']) ? $_POST['estadoCuenta'] : '';
$constanciaFiscal = isset($_POST['constanciaFiscal']) ? $_POST['constanciaFiscal'] : '';
$otroTipoEmpresa = isset($_POST['otroTipoEmpresa']) ? $_POST['otroTipoEmpresa'] : '';
$otraProfesion = isset($_POST['otraProfesion']) ? $_POST['otraProfesion'] : '';
$otraCondicion = isset($_POST['otraCondicion']) ? $_POST['otraCondicion'] : '';
$cuestionarioInversionista = isset($_POST['cuestionarioInversionista']) ? $_POST['cuestionarioInversionista'] : '';
$pApellidoBeneficiario = isset($_POST['pApellidoBeneficiario']) ? $_POST['pApellidoBeneficiario'] : '';
$nacionalidadPais = isset($_POST['nacionalidadPais']) ? $_POST['nacionalidadPais'] : 0;
$Fk_promotor = 3;
$tipo_cliente = 'PERSONA FISICA';
$razon_social = isset($_POST['razon_social']) ? $_POST['razon_social'] : '';
$tipo_identificacion = isset($_POST['tipo_identificacion']) ? $_POST['tipo_identificacion'] : '';
$estado_nac_extran = isset($_POST['estado_nac_extran']) ? $_POST['estado_nac_extran'] : 0;
$condicion_migrat = isset($_POST['condicionMigratoria']) ? $_POST['condicionMigratoria'] : '';
$tel_casa = isset($_POST['tel_casa']) ? $_POST['tel_casa'] : 0;

$nombresTerceros = $_POST['nombreBeneficiariosTerceros'] ?? [];
$apellidosPaternos = $_POST['apellidoPaternosTerceros'] ?? [];
$apellidosMaternos = $_POST['apellidoMaternosTerceros'] ?? [];
$personalidades = $_POST['personalidadesJuridicasTerceros'] ?? [];
$porcentajes = $_POST['porcentajesTerceros'] ?? [];






$fk_pais = '1';












$insertDatosGenerales = ControladorClientes::ctrEditCliente(
    $id_cliente,
    $Fk_promotor,
    $tipo_cliente,
    $razon_social,
    $nombre,
    $primerApellido,
    $segundoApellido,
    $genero,
    $identificacionOficial,
    $serieNoIdentificacion,
    $curp,
    $rfc,
    $fNac,
    $religion,
    $paisNac,
    $nacionalidadPais,
    $estado_nac_extran,
    $nacionalidadPais,
    $condicion_migrat,
    $estCivil,
    $nombreConyuge,
    $primerApellidoConyuge,
    $segundoApellidoConyuge,
    $numeroHijos,
    $numeroDependientes,
    $telCelular,
    $tel_casa,
    $telOfici,
    $telOtro,
    $emailPersonal,
    $emailTrabajo,
    $fk_pais,
    $estadoDom,
    $municipioDom,
    $localidadDom,
    $calle,
    $noInt,
    $noExt,
    $colonia,
    $ciudad,
    $cp
);


    $ActividadEconomica =  ControladorClientes::ctrUpdateClienteActEco(
        $id_cliente,
        $profesion,
        $otraProfesion,
        $ocupacion,
        $puesto,
        $condicionActiva,
        $otraCondicion,
        $nombreEmpresa,
        $tipoEmpresa,
        $otroTipoEmpresa,
        $fk_pais,
        $estadoLaboral,
        $municipioLaboral,
        $localidadLaboral,
        $calleEmpresa,
        $nintEmpresa,
        $nextEmpresa,
        $colEmpresa,
        $ciudadEmpresa,
        $cpEmpresa,
        $ingresoMensual,
        $ingresoProvinientes
    );



    $insertTransaccionalidad = ControladorClientes::ctrUpdateTransaccionalidad($id_cliente, $recursosProvienen, $porcentajePropios, $porcentajeTerceros, $usoCuenta, $especificaOtro, $mensualTransaccion, $montoTransaccion, $saldoPromedioMensual);


    // Verifica si $_POST contiene los datos necesarios
    if (isset($_POST['nombreBeneficiario'], $_POST['pApellidoBeneficiario'], $_POST['sApellidoBeneficiario'])) {

        $borrarBeneficiariosCliente = ControladorClientes::ctrBorrarBeneficiarios($id_cliente);
        
        $nombreBeneficiario = $_POST['nombreBeneficiario'];
        $pApellidoBeneficiario = $_POST['pApellidoBeneficiario'];
        $sApellidoBeneficiario = $_POST['sApellidoBeneficiario'];
        $parentezco = $_POST['parentezco'] ?? [];
        $porcentajeBeneficiario = $_POST['porcentajeBeneficiario'] ?? [];
        $fNacBen = $_POST['fNacBen'] ?? [];
        $telefonoBeneficiario = $_POST['telBeneficiario'] ?? [];
        $dirBeneficiario = $_POST['dirBeneficiario'] ?? [];
        $claveBeneficiario = $_POST['claveBeneficiario'] ?? 'N/A'; // Valor por defecto si no está definido

        // Reorganiza los datos en un solo array
        $beneficiarios = [];
        foreach ($nombreBeneficiario as $index => $nombre) {
            $beneficiarios[] = [
                'nombre' => $nombre,
                'primerApellido' => $pApellidoBeneficiario[$index] ?? '',
                'segundoApellido' => $sApellidoBeneficiario[$index] ?? '',
                'parentezco' => $parentezco[$index] ?? '',
                'porcentaje' => $porcentajeBeneficiario[$index] ?? 0,
                'fechaNacimiento' => $fNacBen[$index] ?? '',
                'telefono' => $telefonoBeneficiario[$index] ?? '',
                'direccion' => $dirBeneficiario[$index] ?? '',
                'clave' => $claveBeneficiario,
            ];
        }

        // Inserta los datos en la base de datos
        foreach ($beneficiarios as $beneficiario) {
            $Nom_beneficiario = $beneficiario['nombre'];
            $Apaterno_beneficiario = $beneficiario['primerApellido'];
            $Amaterno_beneficiario = $beneficiario['segundoApellido'];
            $Parentesco = $beneficiario['parentezco'];
            $Porcentaje = $beneficiario['porcentaje'];
            $F_naciemintoben = $beneficiario['fechaNacimiento'];
            $Tel_contacto = $beneficiario['telefono'];
            $Direccion_ben = $beneficiario['direccion'];
            $Clave = $beneficiario['clave'];

            // Inserta el beneficiario
            $insertsBenficiarios = ControladorClientes::ctrInsertClienteBenefeciario(
                $Nom_beneficiario,
                $Apaterno_beneficiario,
                $Amaterno_beneficiario,
                $Parentesco,
                $Clave,
                $Tel_contacto,
                $Direccion_ben,
                $F_naciemintoben
            );
            $id_beneficiario = $insertsBenficiarios['id_beneficiario'];
            $InsertRelBenCli = ControladorClientes::ctrInsertClienteBenefeciarioRel($id_beneficiario, $id_cliente, $Porcentaje);

            if (!$insertsBenficiarios) {
                // Log de error si falla
                error_log("Error al insertar el beneficiario: " . json_encode($beneficiario));
            }
        }




        if (!empty($nombresTerceros)) {
            // Recorrer las filas para procesarlas
            foreach ($nombresTerceros as $index => $nombre) {
                $apellidoPaterno = $apellidosPaternos[$index] ?? '';
                $apellidoMaterno = $apellidosMaternos[$index] ?? '';
                $personalidad = $personalidades[$index] ?? '';
                $porcentaje = $porcentajes[$index] ?? 0;
            }
        }
    } else {
        error_log("No se encontraron datos de beneficiarios en el formulario.");
    }





    if (!empty($nombresTerceros)) {
        // Recorrer las filas para procesarlas
        foreach ($nombresTerceros as $index => $nombre) {
            $apellidoPaterno = $apellidosPaternos[$index] ?? '';
            $apellidoMaterno = $apellidosMaternos[$index] ?? '';
            $personalidad = $personalidades[$index] ?? '';
            $porcentaje = $porcentajes[$index] ?? 0;


            // $insert_tercero = ControladorClientes::ctrInsertTercero($nombre, $apellidoMaterno, $apellidoMaterno, $personalidad,$porcentaje);
        }
    }


    $insertCotitular = ControladorClientes::ctrInsertarCotitular(
        $id_cliente,
        $nombreCotitular,
        $primerApellidoCotitular,
        $segundoApellidoCotitular,
        $generoCotitular,
        $identificacionOficialCotitular,
        $serieNoIdentificacionCotitular,
        $curpCotitular,
        $rfcCotitular,
        $fNacCotitular,
        $religionCotitular,
        $fk_pais,
        '1',
        $nacionalidad_cotitular,
        $condicionMigratoriaCotitular,
        $estado_civil_cotitular,
        $tel_celular_cotitular,
        $tel_casa_cotitular,
        $email_cotitular,
        $fk_pais,
        $estadoCotitular,
        $municipioCotitular,
        $localidadCotitular,
        $calleCotitular,
        $noExtCotitular,
        $noIntCotitular,
        $coloniaCotitular,
        $ciudadCotitular,
        $cpCotitular
    );



    // $baseDir = __DIR__ . '/documentos/clientes/';

    $baseDir = '/Applications/XAMPP/xamppfiles/htdocs/project2n9G7KIGFSzo/documentos/clientes/';

    $tamanioMaximo = 5 * 1024 * 1024; // 5 MB
    $extensionesPermitidas = ['jpeg', 'jpg', 'png', 'pdf'];
    
    // Verificar si existe la carpeta documentos y documentos/clientes
    if (!is_dir(__DIR__ . '/documentos')) {
        if (!mkdir(__DIR__ . '/documentos', 0777, true)) {
            die("Error: No se pudo crear el directorio 'documentos'. Verifica los permisos.");
        }
    }
    
    if (!is_dir(__DIR__ . '/documentos/clientes')) {
        if (!mkdir(__DIR__ . '/documentos/clientes', 0777, true)) {
            die("Error: No se pudo crear el directorio 'documentos/clientes'. Verifica los permisos.");
        }
    }
    
    // Crear carpeta del cliente si no existe
    $clienteDir = $baseDir . $id_cliente;
    if (!is_dir($clienteDir)) {
        if (!mkdir($clienteDir, 0777, true)) {
            die("Error: No se pudo crear el directorio $clienteDir. Verifica los permisos.");
        }
    }
    
    // Documentos a procesar
    $documentos = [
        'ineAnverso' => 'ineanver',
        'ineReverso' => 'inerever',
        'comprobanteDomicilio' => 'domicilio',
        'curpDoc' => 'curp',
        'estadoCuenta' => 'estado_cuenta',
        'constanciaFiscal' => 'constfiscal',
        'cuestionarioInversionista' => 'cuestinv'
    ];
    
    // Array para almacenar los nombres finales de los documentos
    $nombresDocs = [];
    
    // Procesar y mover archivos
    foreach ($documentos as $inputName => $nombreDocumento) {
        if (!empty($_FILES[$inputName]['name'])) {
            $file = $_FILES[$inputName];
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $tamanioArchivo = $file['size'];
    
            // Validar tipo de archivo
            if (!in_array($extension, $extensionesPermitidas)) {
                echo "Error: El archivo {$file['name']} tiene un formato no permitido.<br>";
                continue;
            }
    
            // Crear nuevo nombre y ruta destino
            $nuevoNombre = $nombreDocumento . '-' . $id_cliente . '.' . $extension;
            $rutaDestino = $clienteDir . '/' . $nuevoNombre;
    
            // Mover el archivo al destino
            if (move_uploaded_file($file['tmp_name'], $rutaDestino)) {
                echo "Archivo $nuevoNombre guardado correctamente.<br>";
                // Agregar el nombre final al array $nombresDocs
                $nombresDocs[] = $nuevoNombre;
            } else {
                echo "Error al guardar $nombreDocumento.<br>";
            }
        } else {
            echo "Error: No se seleccionó ningún archivo para $inputName.<br>";
        }
    }

    
    // Imprimir los nombres finales guardados
    if (!empty($nombresDocs)) {

    $fech_up = date('Y-m-d');


    $ine_anverso_cotitutar = NULL;
    $ine_reverso_cotitular = NULL;
    $curp_cotitular_img = NULL;
    $situacion_fiscal_cotitular_img = NULL;


       $insertRuta =  ControladorClientes:: ctrUpdateDocsPersonales(
            $id_cliente,
            $nombresDocs[0],
            $nombresDocs[1],
            $nombresDocs[2],
            $nombresDocs[3],
            $nombresDocs[4],
            $nombresDocs[5],
            $nombresDocs[6],
            $fech_up,
            $ine_anverso_cotitutar,
            $ine_reverso_cotitular,
            $curp_cotitular_img,
            $situacion_fiscal_cotitular_img
       );
      
    } else {
        echo "No se guardaron documentos.";
    }



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


}