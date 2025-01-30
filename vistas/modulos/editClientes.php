<style>
    .document-card {
        text-align: center;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        transition: box-shadow 0.3s;
    }

    .document-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .document-icon {
        font-size: 50px;
        margin-bottom: 10px;
        color: #6c757d;
    }

    .document-title {
        font-size: 14px;
        font-weight: bold;
        margin-top: 10px;
    }
</style>

<?php

$id_cliente = $_POST['id_cliente'];
$datosClientes = ControladorClientes::ctrDatosClientes($id_cliente);

$cotitular = ControladorClientes::ctrDatosCotitular($id_cliente);

$economicos = ControladorClientes::ctrDatosEconomicosClientes($id_cliente);

$beneficiarios = ControladorClientes::ctrallbeneficiarioId($id_cliente);
$transaccionalidad = ControladorClientes::ctrconsultarTransaccionalidadCliente($id_cliente);

$cuentasContables = ControladorClientes::ctrCuentasContablesCliente($id_cliente);
$asignarCliente =  ControladorClientes::ctrAsesorAsignado($id_cliente);

$documentosClientes = ControladorClientes::ctrConsultaDocsPersonal($id_cliente);




$documentos = $documentosClientes[0];

function renderDocumentPreview($filePath, $previewId, $id_cliente) {
    if (!$filePath) return "📇"; // Icono si no hay archivo

    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
    $basePath = "documentos/clientes/".$id_cliente."/"; // Ajusta la ruta base

    if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png'])) {
        return "<img src='{$basePath}{$filePath}' alt='Preview' style='max-width: 100%; max-height: 150px;' />";
    } elseif (strtolower($extension) === 'pdf') {
        return "<iframe src='{$basePath}{$filePath}' style='width: 100%; height: 150px;' frameborder='0'></iframe>";
    }

    return "Formato no soportado";
}


if ($transaccionalidad[0]['transac_men'] == '1_14') {
    $transacciones = '1 A 14';
} elseif ($transaccionalidad[0]['transac_men'] == '14_29') {
    $transacciones = '15 A 29';
} elseif ($transaccionalidad[0]['transac_men'] == '30_38') {
    $transacciones = '30 A 38';
} elseif ($transaccionalidad[0]['transac_men'] == '40_mas') {
    $transacciones = '40 A Más';
}


if ($transaccionalidad[0]['monto_men'] == '1_15000') {
    $monto = '$1 A $15,000';
} elseif ($transaccionalidad[0]['monto_men'] == '1,5001_50,000') {
    $monto = '$15,001 A $50,000';
} elseif ($transaccionalidad[0]['monto_men'] == '5,0001_90,000') {
    $monto = '$50,000 A $90,000';
} elseif ($transaccionalidad[0]['monto_men'] == '90,001_150,000') {
    $monto = '$90,001 A $150,0000';
} elseif ($transaccionalidad[0]['monto_men'] == '150,000_mas') {
    $monto = '$150,0001 A Más';
} else {
    $monto = '';
}

if ($transaccionalidad[0]['saldo_men'] == '1_10501') {
    $saldo = '$1 A $10,501';
} elseif ($transaccionalidad[0]['saldo_men'] == '10,501_35,000') {
    $saldo = '$10,501 A $35,000';
} elseif ($transaccionalidad[0]['saldo_men'] == '35,001_63,000') {
    $saldo = '$35001 A $63,000';
} elseif ($transaccionalidad[0]['saldo_men'] == '63001_105,000') {
    $saldo = '$63,001 A $105,000';
} elseif ($transaccionalidad[0]['saldo_men'] == '105,001_mas') {
    $saldo = '$105,001 A Más';
} else {
    $saldo = '';
}


if ($datosClientes[0]['tipo_identificacion'] == 'CREDENCIAL PARA VOTAR') {
    $tipo_identificacion = 'INE';
} elseif ($datosClientes[0]['tipo_identificacion'] == 'PASAPORTE') {
    $tipo_identificacion = 'PASAPORTE';
} elseif ($datosClientes[0]['tipo_identificacion'] == 'CEDULA PROFESIONAL') {
    $tipo_identificacion = 'CEDULA';
}


print_r($_POST);

?>


<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Editar Cliente</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="inicio">
                                <ion-icon name="home-outline"></ion-icon>
                            </a>
                        </li>

                    </ol>
                </nav>
            </div>

        </div>



        <div class="container mt-5">

            <form action="saveClientes" method="POST" id="multiStepForm" enctype="multipart/form-data">


                <input type="hidden" name="editCliente" value="1" >

                <!-- Sección 1: Información Básica -->
                <div class="step" id="step1">
                    <h5 class="mb-1">Datos Generales</h5>
                    <p class="mb-4"></p>





                    <div class="row g-3">
                        <div class="col-12 col-lg-4">
                            <label for="FisrtName" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe Nombre" value="<?= $datosClientes[0]['nombre_clte'] ?>" required>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="LastName" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Primer Apellido" value="<?= $datosClientes[0]['apaterno_clte'] ?>" required>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="LastName" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Segundo Apellido" value="<?= $datosClientes[0]['amaterno_clte'] ?>" required>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="PhoneNumber" class="form-label">Curp</label>
                            <input type="text" class="form-control" id="curp" name="curp" placeholder="Curp" value="<?= $datosClientes[0]['curp'] ?>" required>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="InputCountry" class="form-label">Identificación Oficial</label>
                            <select class="form-select" id="identificacionOficial" name="identificacionOficial" aria-label="Default select example">
                                <option value="<?= $datosClientes[0]['tipo_identificacion'] ?>" selected><?= $tipo_identificacion ?></option>
                                <option value="CREDENCIAL PARA VOTAR">Ine</option>
                                <option value="PASAPORTE">Pasaporte</option>
                                <option value="CEDULA PROFESIONAL">Cedula Profesional</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="serieNoIdentificacion" class="form-label">Número de Identificación</label>
                            <input type="text" class="form-control" id="serieNoIdentificacion" name="serieNoIdentificacion" value="<?= $datosClientes[0]['clave_elector'] ?>" placeholder="Número de Identificación">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="Genero" class="form-label">Género</label>
                            <select class="form-select" id="genero" name="genero" aria-label="Default select example">
                                <option value="<?= $datosClientes[0]['sexo'] ?>" selected><?= $datosClientes[0]['sexo'] ?></option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>

                            </select>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">RFC</label>
                            <input type="text" class="form-control" id="rfc" value="<?= $datosClientes[0]['rfc'] ?>" name="rfc" placeholder="Escribe">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="fNac" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control  " id="fNac" value="<?= $datosClientes[0]['fecha_nacimiento'] ?>" name="fNac" placeholder="Ingresa Fecha de Nacimiento">
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="religion" class="form-label">Religión</label>
                            <input type="text" class="form-control" id="religion" value="<?= $datosClientes[0]['religion'] ?>" name="religion" placeholder="Ingresa Religión">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="paisNac" class="form-label">Pais de Nacimiento</label>
                            <select class="form-select" id="paisNac" name="paisNac" aria-label="Default select example">
                                <option value="<?= $datosClientes[0]['Fk_estado_nac'] ?>"><?= $datosClientes[0]['pais_nac'] ?></option>
                                <option value="1">NAM :: NAMIBIANA</option>
                                <option value="2">AGO :: ANGOLESA</option>
                                <option value="3">DZA :: ARGELIANA</option>
                                <option value="4">BEN :: DE BENNIN</option>
                                <option value="5">BWA :: BOTSWANESA</option>
                                <option value="6">BDI :: BURUNDESA</option>
                                <option value="7">CPV :: DE CABO VERDE</option>
                                <option value="8">COM :: COMORENSE</option>
                                <option value="9">COD :: CONGOLESA</option>
                                <option value="10">COG :: MARFILEÑA</option>
                                <option value="11">TCD :: CHADIANA</option>
                                <option value="12">DJI :: DE DJIBOUTI</option>
                                <option value="13">EGY :: EGIPCIA</option>
                                <option value="14">ETH :: ETIOPE</option>
                                <option value="15">GAB :: GABONESA</option>
                                <option value="16">GMB :: GAMBIANA</option>
                                <option value="17">GHA :: GHANATA</option>
                                <option value="18">GNB :: GUINEA</option>
                                <option value="19">GIN :: GUINEA</option>
                                <option value="20">GNQ :: GUINEA ECUATORIANA</option>
                                <option value="21">LBY :: LIBIA</option>
                                <option value="22">KEN :: KENIANA</option>
                                <option value="23">LSO :: LESOTHENSE</option>
                                <option value="24">LBR :: LIBERIANA</option>
                                <option value="25">MWI :: MALAWIANA</option>
                                <option value="26">MLI :: MALIENSE</option>
                                <option value="27">MAR :: MARROQUI</option>
                                <option value="28">MUS :: MAURICIANA</option>
                                <option value="29">MRT :: MAURITANA</option>
                                <option value="30">MOZ :: MOZAMBIQUEÑA</option>
                                <option value="31">NER :: NIGERINA</option>
                                <option value="32">NGA :: NIGERIANA</option>
                                <option value="33">CAF :: CENTRO AFRICANA</option>
                                <option value="34">CMR :: CAMERUNESA</option>
                                <option value="35">TZA :: TANZANIANA</option>
                                <option value="36">RWA :: RWANDESA</option>
                                <option value="37">ESH :: DEL SAHARA</option>
                                <option value="38">STP :: DE SANTO TOME</option>
                                <option value="39">SEN :: SENEGALESA</option>
                                <option value="40">SYC :: DE SEYCHELLES</option>
                                <option value="41">SLE :: SIERRA LEONESA</option>
                                <option value="42">SOM :: SOMALI</option>
                                <option value="43">ZAF :: SUDAFRICANA</option>
                                <option value="44">SDN :: SUDANESA</option>
                                <option value="45">SWZ :: SWAZI</option>
                                <option value="46">TGO :: TOGOLESA</option>
                                <option value="47">TUN :: TUNECINA</option>
                                <option value="48">UGA :: UGANDESA</option>
                                <option value="49">ZAR :: ZAIRANA</option>
                                <option value="50">ZMB :: ZAMBIANA</option>
                                <option value="51">ZWE :: DE ZIMBAWI</option>
                                <option value="52">ARG :: ARGENTINA</option>
                                <option value="53">BHS :: BAHAMEÑA</option>
                                <option value="54">BRB :: DE BARBADOS</option>
                                <option value="55">BLZ :: BELICEÑA</option>
                                <option value="56">BOL :: BOLIVIANA</option>
                                <option value="57">BRA :: BRASILEÑA</option>
                                <option value="58">CAN :: CANADIENSE</option>
                                <option value="59">COL :: COLOMBIANA</option>
                                <option value="60">CRI :: COSTARRICENSE</option>
                                <option value="61">CUB :: CUBANA</option>
                                <option value="62">CHL :: CHILENA</option>
                                <option value="63">DMA :: DOMINICA</option>
                                <option value="64">SLV :: SALVADOREÑA</option>
                                <option value="65">USA :: ESTADOUNIDENSE</option>
                                <option value="66">VCT :: GRANADINA</option>
                                <option value="67">GTM :: GUATEMALTECA</option>
                                <option value="68">VGB :: BRITANICA</option>
                                <option value="69">GUY :: GUYANESA</option>
                                <option value="70">HTI :: HAITIANA</option>
                                <option value="71">HND :: HONDUREÑA</option>
                                <option value="72">JAM :: JAMAIQUINA</option>
                                <option value="73">MEX :: MEXICANA</option>
                                <option value="74">NIC :: NICARAGUENSE</option>
                                <option value="75">PAN :: PANAMEÑA</option>
                                <option value="76">PRY :: PARAGUAYA</option>
                                <option value="77">PER :: PERUANA</option>
                                <option value="78">PRI :: PUERTORRIQUEÑA</option>
                                <option value="79">DOM :: DOMINICANA</option>
                                <option value="80">LCA :: SANTA LUCIENSE</option>
                                <option value="81">SUR :: SURINAMENSE</option>
                                <option value="82">TTO :: TRINITARIA</option>
                                <option value="83">URY :: URUGUAYA</option>
                                <option value="84">VEN :: VENEZOLANA</option>
                                <option value="85">USA :: AMERICANA</option>
                                <option value="86">AFG :: AFGANA</option>
                                <option value="87">BHR :: DE BAHREIN</option>
                                <option value="88">BTN :: BHUTANESA</option>
                                <option value="89">BUR :: BIRMANA</option>
                                <option value="90">PRK :: NORCOREANA</option>
                                <option value="91">KOR :: SUDCOREANA</option>
                                <option value="92">CHN :: CHINA</option>
                                <option value="93">CYP :: CHIPRIOTA</option>
                                <option value="94">SAU :: ARABE</option>
                                <option value="95">PHL :: FILIPINA</option>
                                <option value="96">IND :: HINDU</option>
                                <option value="97">IDN :: INDONESA</option>
                                <option value="98">IRQ :: IRAQUI</option>
                                <option value="99">IRN :: IRANI</option>
                                <option value="100">ISR :: ISRAELI</option>
                                <option value="101">JPN :: JAPONESA</option>
                                <option value="102">JOR :: JORDANA</option>
                                <option value="103">KHM :: CAMBOYANA</option>
                                <option value="104">KWT :: KUWAITI</option>
                                <option value="105">LBN :: LIBANESA</option>
                                <option value="106">MYS :: MALASIA</option>
                                <option value="107">MDV :: MALDIVA</option>
                                <option value="108">MNG :: MONGOLESA</option>
                                <option value="109">NPL :: NEPALESA</option>
                                <option value="110">OMN :: OMANESA</option>
                                <option value="111">PAK :: PAKISTANI</option>
                                <option value="112">QAT :: DEL QATAR</option>
                                <option value="113">SYR :: SIRIA</option>
                                <option value="114">LAO :: LAOSIANA</option>
                                <option value="115">SGP :: SINGAPORENSE</option>
                                <option value="116">THA :: TAILANDESA</option>
                                <option value="117">TWN :: TAIWANESA</option>
                                <option value="118">TUR :: TURCA</option>
                                <option value="119">VNM :: NORVIETNAMITA</option>
                                <option value="120">YEM :: YEMENI</option>
                                <option value="121">ALB :: ALBANESA</option>
                                <option value="122">DEU :: ALEMANA</option>
                                <option value="123">AND :: ANDORRANA</option>
                                <option value="124">AUT :: AUSTRIACA</option>
                                <option value="125">BEL :: BELGA</option>
                                <option value="126">BGR :: BULGARA</option>
                                <option value="127">CSK :: CHECOSLOVACA</option>
                                <option value="128">DNK :: DANESA</option>
                                <option value="129">VAT :: VATICANA</option>
                                <option value="130">ESP :: ESPAÑOLA</option>
                                <option value="131">FIN :: FINLANDESA</option>
                                <option value="132">FRA :: FRANCESA</option>
                                <option value="133">GRC :: GRIEGA</option>
                                <option value="134">HUN :: HUNGARA</option>
                                <option value="135">IRL :: IRLANDESA</option>
                                <option value="136">ISL :: ISLANDESA</option>
                                <option value="137">ITA :: ITALIANA</option>
                                <option value="138">LIE :: LIECHTENSTENSE</option>
                                <option value="139">LUX :: LUXEMBURGUESA</option>
                                <option value="140">MLT :: MALTESA</option>
                                <option value="141">MCO :: MONEGASCA</option>
                                <option value="142">NOR :: NORUEGA</option>
                                <option value="143">NLD :: HOLANDESA</option>
                                <option value="144">PRT :: PORTUGUESA</option>
                                <option value="145">IOT :: BRITANICA</option>
                                <option value="146">BLR :: SOVIETICA BIELORRUSA</option>
                                <option value="147">UKR :: SOVIETICA UCRANIANA</option>
                                <option value="148">ROM :: RUMANA</option>
                                <option value="149">SMR :: SAN MARINENSE</option>
                                <option value="150">SWE :: SUECA</option>
                                <option value="151">CHE :: SUIZA</option>
                                <option value="152">YUG :: YUGOSLAVA</option>
                                <option value="153">AUS :: AUSTRALIANA</option>
                                <option value="154">FJI :: FIJIANA</option>
                                <option value="155">SLB :: SALOMONESA</option>
                                <option value="156">NRU :: NAURUANA</option>
                                <option value="157">PNG :: PAPUENSE</option>
                                <option value="158">WSM :: SAMOANA</option>
                                <option value="159">SVK :: ESLOVACA</option>
                                <option value="160">BFA :: BURKINA FASO</option>
                                <option value="161">EST :: ESTONIA</option>
                                <option value="162">FSM :: MICRONECIA</option>
                                <option value="163">GBD :: REINO UNIDO(DEPEN. TET. BRIT.)</option>
                                <option value="164">GBN :: REINO UNIDO(BRIT. DEL EXT.)</option>
                                <option value="165">GBO :: REINO UNIDO(C. BRIT. DEL EXT.)</option>
                                <option value="166">GBR :: REINO UNIDO</option>
                                <option value="167">KGZ :: KIRGUISTAN</option>
                                <option value="168">LTU :: LITUANIA</option>
                                <option value="169">MDA :: MOLDOVIA, REPUBLICA DE</option>
                                <option value="170">MKD :: MACEDONIA</option>
                                <option value="171">SVN :: ESLOVENIA</option>
                                <option value="172">XES :: ESLOVAQUIA</option>


                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                            <select class="form-select" id="nacionalidadPais" name="nacionalidadPais" aria-label="Default select example">
                                <option value="<?= $datosClientes[0]['Fk_estado_nac'] ?>"><?= $datosClientes[0]['nacionalidad'] ?></option>
                                <option value="1">NAM :: NAMIBIANA</option>
                                <option value="2">AGO :: ANGOLESA</option>
                                <option value="3">DZA :: ARGELIANA</option>
                                <option value="4">BEN :: DE BENNIN</option>
                                <option value="5">BWA :: BOTSWANESA</option>
                                <option value="6">BDI :: BURUNDESA</option>
                                <option value="7">CPV :: DE CABO VERDE</option>
                                <option value="8">COM :: COMORENSE</option>
                                <option value="9">COD :: CONGOLESA</option>
                                <option value="10">COG :: MARFILEÑA</option>
                                <option value="11">TCD :: CHADIANA</option>
                                <option value="12">DJI :: DE DJIBOUTI</option>
                                <option value="13">EGY :: EGIPCIA</option>
                                <option value="14">ETH :: ETIOPE</option>
                                <option value="15">GAB :: GABONESA</option>
                                <option value="16">GMB :: GAMBIANA</option>
                                <option value="17">GHA :: GHANATA</option>
                                <option value="18">GNB :: GUINEA</option>
                                <option value="19">GIN :: GUINEA</option>
                                <option value="20">GNQ :: GUINEA ECUATORIANA</option>
                                <option value="21">LBY :: LIBIA</option>
                                <option value="22">KEN :: KENIANA</option>
                                <option value="23">LSO :: LESOTHENSE</option>
                                <option value="24">LBR :: LIBERIANA</option>
                                <option value="25">MWI :: MALAWIANA</option>
                                <option value="26">MLI :: MALIENSE</option>
                                <option value="27">MAR :: MARROQUI</option>
                                <option value="28">MUS :: MAURICIANA</option>
                                <option value="29">MRT :: MAURITANA</option>
                                <option value="30">MOZ :: MOZAMBIQUEÑA</option>
                                <option value="31">NER :: NIGERINA</option>
                                <option value="32">NGA :: NIGERIANA</option>
                                <option value="33">CAF :: CENTRO AFRICANA</option>
                                <option value="34">CMR :: CAMERUNESA</option>
                                <option value="35">TZA :: TANZANIANA</option>
                                <option value="36">RWA :: RWANDESA</option>
                                <option value="37">ESH :: DEL SAHARA</option>
                                <option value="38">STP :: DE SANTO TOME</option>
                                <option value="39">SEN :: SENEGALESA</option>
                                <option value="40">SYC :: DE SEYCHELLES</option>
                                <option value="41">SLE :: SIERRA LEONESA</option>
                                <option value="42">SOM :: SOMALI</option>
                                <option value="43">ZAF :: SUDAFRICANA</option>
                                <option value="44">SDN :: SUDANESA</option>
                                <option value="45">SWZ :: SWAZI</option>
                                <option value="46">TGO :: TOGOLESA</option>
                                <option value="47">TUN :: TUNECINA</option>
                                <option value="48">UGA :: UGANDESA</option>
                                <option value="49">ZAR :: ZAIRANA</option>
                                <option value="50">ZMB :: ZAMBIANA</option>
                                <option value="51">ZWE :: DE ZIMBAWI</option>
                                <option value="52">ARG :: ARGENTINA</option>
                                <option value="53">BHS :: BAHAMEÑA</option>
                                <option value="54">BRB :: DE BARBADOS</option>
                                <option value="55">BLZ :: BELICEÑA</option>
                                <option value="56">BOL :: BOLIVIANA</option>
                                <option value="57">BRA :: BRASILEÑA</option>
                                <option value="58">CAN :: CANADIENSE</option>
                                <option value="59">COL :: COLOMBIANA</option>
                                <option value="60">CRI :: COSTARRICENSE</option>
                                <option value="61">CUB :: CUBANA</option>
                                <option value="62">CHL :: CHILENA</option>
                                <option value="63">DMA :: DOMINICA</option>
                                <option value="64">SLV :: SALVADOREÑA</option>
                                <option value="65">USA :: ESTADOUNIDENSE</option>
                                <option value="66">VCT :: GRANADINA</option>
                                <option value="67">GTM :: GUATEMALTECA</option>
                                <option value="68">VGB :: BRITANICA</option>
                                <option value="69">GUY :: GUYANESA</option>
                                <option value="70">HTI :: HAITIANA</option>
                                <option value="71">HND :: HONDUREÑA</option>
                                <option value="72">JAM :: JAMAIQUINA</option>
                                <option value="73">MEX :: MEXICANA</option>
                                <option value="74">NIC :: NICARAGUENSE</option>
                                <option value="75">PAN :: PANAMEÑA</option>
                                <option value="76">PRY :: PARAGUAYA</option>
                                <option value="77">PER :: PERUANA</option>
                                <option value="78">PRI :: PUERTORRIQUEÑA</option>
                                <option value="79">DOM :: DOMINICANA</option>
                                <option value="80">LCA :: SANTA LUCIENSE</option>
                                <option value="81">SUR :: SURINAMENSE</option>
                                <option value="82">TTO :: TRINITARIA</option>
                                <option value="83">URY :: URUGUAYA</option>
                                <option value="84">VEN :: VENEZOLANA</option>
                                <option value="85">USA :: AMERICANA</option>
                                <option value="86">AFG :: AFGANA</option>
                                <option value="87">BHR :: DE BAHREIN</option>
                                <option value="88">BTN :: BHUTANESA</option>
                                <option value="89">BUR :: BIRMANA</option>
                                <option value="90">PRK :: NORCOREANA</option>
                                <option value="91">KOR :: SUDCOREANA</option>
                                <option value="92">CHN :: CHINA</option>
                                <option value="93">CYP :: CHIPRIOTA</option>
                                <option value="94">SAU :: ARABE</option>
                                <option value="95">PHL :: FILIPINA</option>
                                <option value="96">IND :: HINDU</option>
                                <option value="97">IDN :: INDONESA</option>
                                <option value="98">IRQ :: IRAQUI</option>
                                <option value="99">IRN :: IRANI</option>
                                <option value="100">ISR :: ISRAELI</option>
                                <option value="101">JPN :: JAPONESA</option>
                                <option value="102">JOR :: JORDANA</option>
                                <option value="103">KHM :: CAMBOYANA</option>
                                <option value="104">KWT :: KUWAITI</option>
                                <option value="105">LBN :: LIBANESA</option>
                                <option value="106">MYS :: MALASIA</option>
                                <option value="107">MDV :: MALDIVA</option>
                                <option value="108">MNG :: MONGOLESA</option>
                                <option value="109">NPL :: NEPALESA</option>
                                <option value="110">OMN :: OMANESA</option>
                                <option value="111">PAK :: PAKISTANI</option>
                                <option value="112">QAT :: DEL QATAR</option>
                                <option value="113">SYR :: SIRIA</option>
                                <option value="114">LAO :: LAOSIANA</option>
                                <option value="115">SGP :: SINGAPORENSE</option>
                                <option value="116">THA :: TAILANDESA</option>
                                <option value="117">TWN :: TAIWANESA</option>
                                <option value="118">TUR :: TURCA</option>
                                <option value="119">VNM :: NORVIETNAMITA</option>
                                <option value="120">YEM :: YEMENI</option>
                                <option value="121">ALB :: ALBANESA</option>
                                <option value="122">DEU :: ALEMANA</option>
                                <option value="123">AND :: ANDORRANA</option>
                                <option value="124">AUT :: AUSTRIACA</option>
                                <option value="125">BEL :: BELGA</option>
                                <option value="126">BGR :: BULGARA</option>
                                <option value="127">CSK :: CHECOSLOVACA</option>
                                <option value="128">DNK :: DANESA</option>
                                <option value="129">VAT :: VATICANA</option>
                                <option value="130">ESP :: ESPAÑOLA</option>
                                <option value="131">FIN :: FINLANDESA</option>
                                <option value="132">FRA :: FRANCESA</option>
                                <option value="133">GRC :: GRIEGA</option>
                                <option value="134">HUN :: HUNGARA</option>
                                <option value="135">IRL :: IRLANDESA</option>
                                <option value="136">ISL :: ISLANDESA</option>
                                <option value="137">ITA :: ITALIANA</option>
                                <option value="138">LIE :: LIECHTENSTENSE</option>
                                <option value="139">LUX :: LUXEMBURGUESA</option>
                                <option value="140">MLT :: MALTESA</option>
                                <option value="141">MCO :: MONEGASCA</option>
                                <option value="142">NOR :: NORUEGA</option>
                                <option value="143">NLD :: HOLANDESA</option>
                                <option value="144">PRT :: PORTUGUESA</option>
                                <option value="145">IOT :: BRITANICA</option>
                                <option value="146">BLR :: SOVIETICA BIELORRUSA</option>
                                <option value="147">UKR :: SOVIETICA UCRANIANA</option>
                                <option value="148">ROM :: RUMANA</option>
                                <option value="149">SMR :: SAN MARINENSE</option>
                                <option value="150">SWE :: SUECA</option>
                                <option value="151">CHE :: SUIZA</option>
                                <option value="152">YUG :: YUGOSLAVA</option>
                                <option value="153">AUS :: AUSTRALIANA</option>
                                <option value="154">FJI :: FIJIANA</option>
                                <option value="155">SLB :: SALOMONESA</option>
                                <option value="156">NRU :: NAURUANA</option>
                                <option value="157">PNG :: PAPUENSE</option>
                                <option value="158">WSM :: SAMOANA</option>
                                <option value="159">SVK :: ESLOVACA</option>
                                <option value="160">BFA :: BURKINA FASO</option>
                                <option value="161">EST :: ESTONIA</option>
                                <option value="162">FSM :: MICRONECIA</option>
                                <option value="163">GBD :: REINO UNIDO(DEPEN. TET. BRIT.)</option>
                                <option value="164">GBN :: REINO UNIDO(BRIT. DEL EXT.)</option>
                                <option value="165">GBO :: REINO UNIDO(C. BRIT. DEL EXT.)</option>
                                <option value="166">GBR :: REINO UNIDO</option>
                                <option value="167">KGZ :: KIRGUISTAN</option>
                                <option value="168">LTU :: LITUANIA</option>
                                <option value="169">MDA :: MOLDOVIA, REPUBLICA DE</option>
                                <option value="170">MKD :: MACEDONIA</option>
                                <option value="171">SVN :: ESLOVENIA</option>
                                <option value="172">XES :: ESLOVAQUIA</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4 mt-3" id="condicionMigratoriaDiv" style="display: d-none;">
                            <label for="condicionMigratoria" class="form-label">Condición Migratoria</label>
                            <select class="form-select" id="condicionMigratoria" name="condicionMigratoria">
                                <option value="<?= $datosClientes[0]['condicion_migrat'] ?>" selected><?= $datosClientes[0]['condicion_migrat'] ?></option>
                                <option value="Residente Temporal">Residente Temporal</option>
                                <option value="Residente Permanente">Residente Permanente</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="estCivil" class="form-label">Estado Civil</label>
                            <select class="form-select" id="estCivil" name="estCivil" aria-label="Default select example" onchange="toggleConyugeFields()">
                                <option value="<?= $datosClientes[0]['estado_civil'] ?>" selected><?= $datosClientes[0]['estado_civil'] ?></option>
                                <option value="soltero(a)">Soltero(a)</option>
                                <option value="casado(a)">Casado(a)</option>
                                <option value="viudo(a)">Viudo(a)</option>
                                <option value="divorciado(a)">Divorciado(a)</option>
                                <option value="unionLibre">Unión Libre</option>
                                <option value="indistinto">Indistinto</option>
                            </select>
                        </div>
                        <div id="conyugeFields" style="display: none;">
                            <div class="row g-3 mt-3">

                                <div class="col-12 col-lg-4">
                                    <label for="nombreConyuge" class="form-label">Nombre Cónyuge</label>
                                    <input type="text" class="form-control" id="nombreConyuge" name="nombreConyuge" value="<?= $datosClientes[0]['nombre_cony'] ?>" placeholder="Nombre Completo">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="primerApellidoConyuge" class="form-label">Primer Apellido Cónyuge</label>
                                    <input type="text" class="form-control" id="primerApellidoConyuge" name="primerApellidoConyuge" value="<?= $datosClientes[0]['apaterno_cony'] ?>" placeholder="Primer Apellido">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="segundoApellidoConyuge" class="form-label">Segundo Apellido Cónyuge</label>
                                    <input type="text" class="form-control" id="segundoApellidoConyuge" name="segundoApellidoConyuge" value="<?= $datosClientes[0]['amaterno_cony'] ?>" placeholder="Segundo Apellido">
                                </div>

                                <div class="col-12 col-lg-4">
                                    <label for="numeroHijos" class="form-label">Número de Hijos</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="iconoNumeroHijos">#</span>
                                        <input type="number" class="form-control" id="numeroHijos" name="numeroHijos" value="<?= $datosClientes[0]['num_hijos'] ?>" placeholder="Número Hijos" aria-describedby="iconoNumeroHijos">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <label for="numeroDependientes" class="form-label">Núm. Dep. Económicos</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="iconoDependientes">#</span>
                                        <input type="number" class="form-control" id="numeroDependientes" value="<?= $datosClientes[0]['num_dep_eco'] ?>" name="numeroDependientes" placeholder="Número Dependientes" aria-describedby="iconoDependientes">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Celular</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone"></i></span>
                                <input type="number" name="telCelular" class="form-control" value="<?= $datosClientes[0]['tel_celular'] ?>" placeholder="" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Casa</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="number" class="form-control" name="telCasa" value="<?= $datosClientes[0]['tel_casa'] ?>" placeholder="" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Oficina</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="number" class="form-control" placeholder="" name="telOfici" value="<?= $datosClientes[0]['tel_oficina'] ?>" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Otro</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="number" class="form-control" placeholder="" name="telOtro" value="<?= $datosClientes[0]['tel_otro'] ?>" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Email Personal</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"> <i class="lni lni-envelope"></i></i></span>
                                <input type="email" name="emailPersonal" class="form-control" value="<?= $datosClientes[0]['email'] ?>" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Email Trabajo</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"> <i class="lni lni-envelope"></i></span>
                                <input type="email" name="emailTrabajo" class="form-control" value="<?= $datosClientes[0]['email2'] ?>" placeholder="">
                            </div>
                        </div>

                        <h5 class="mb-1">Domicilio Actual</h5>
                        <p class="mb-4"></p>

                        <div class="col-12 col-lg-3">
                            <label for="estCivil" class="form-label">Estado/Mpio/Localidad</label>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="estado" name="estadoDom" aria-label="Default select example">
                                <option value="<?= $datosClientes[0]['fk_estado'] ?>" selected><?= $datosClientes[0]['nom_estado'] ?></option>
                                <?php
                                $estados = ControladorClientes::ctrEstados();
                                foreach ($estados as $estado) { ?>
                                    <option value="<?= $estado['id_estado'] ?>"><?= $estado['nom_estado'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="municipio" name="municipioDom" aria-label="Default select example">
                                <option value="<?= $datosClientes[0]['fk_municipio'] ?>" selected><?= $datosClientes[0]['desc_municipio'] ?></option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="localidad" name="localidadDom" aria-label="Default select example">
                                <option value="<?= $datosClientes[0]['fk_localidad'] ?>" selected><?= $datosClientes[0]['nom_localidad'] ?></option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Calle</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" name="calle" value="<?= $datosClientes[0]['calle'] ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Ext</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" placeholder="" name="noExt" value="<?= $datosClientes[0]['num_ext'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Int</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" name="noInt" class="form-control" placeholder="" value="<?= $datosClientes[0]['num_int'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Colonia</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" name="colonia" class="form-control" placeholder="" value="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Ciudad</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                                <input type="text" name="ciudad" class="form-control" placeholder="" value="<?= $datosClientes[0]['colonia'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">C.P</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" name="cp" class="form-control" placeholder="" value="<?= $datosClientes[0]['cod_postal'] ?>">
                            </div>
                        </div>



                        <button type="button" class="btn btn-primary col-1 next">Siguiente</button>
                    </div>
                </div>

                <!-- Sección 2: Dirección -->
                <div class="step d-none" id="step2">
                    <h5 class="mb-1">Datos Económicos</h5>
                    <p class="mb-4"></p>

                    <div class="row g-3">
                        <div class="col-12 col-lg-4">
                            <label for="InputUsername" class="form-label">Profesión</label>
                            <select class="form-select" id="profesion" name="profesion" aria-label="Default select example">
                                <option value="<?= $economicos[0]['profesion'] ?>" selected><?= $economicos[0]['profesion'] ?></option>
                                <option value="empleado">Empleado</option>
                                <option value="empresario">Empresario</option>
                                <option value="inversionista">Inversionista</option>
                                <option value="jubilado">Jubilado</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4" id="otraProfesionContainer" style="display: none;">
                            <label for="otraProfesion" class="form-label">Otra Profesión</label>
                            <input type="text" name="otraProfesion" value="<?= $economicos[0]['otra_profesion'] ?>" class="form-control" id="otraProfesion" placeholder="">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="InputEmail2" class="form-label">Ocupación</label>
                            <input type="text" id="ocupacion" name="ocupacion" value="<?= $economicos[0]['ocupacion_clte'] ?>" class="form-control" id="InputEmail2" placeholder="">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="InputEmail2" class="form-label">Puesto</label>
                            <input type="text" id="puesto" name="puesto" value="<?= $economicos[0]['puesto_clte'] ?>" class="form-control" id="InputEmail2" placeholder="">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="InputPassword" class="form-label">Condición de Actividad</label>
                            <select class="form-select" id="condicionActiva" name="condicionActiva" aria-label="Default select example">
                                <option value="<?= $economicos[0]['actividad'] ?>" selected><?= $economicos[0]['actividad'] ?></option>
                                <option value="asalariado">Asalariado</option>
                                <option value="independiente">Independiente</option>
                                <option value="jubilado">Jubilado</option>
                                <option value="socio">Socio</option>
                                <option value="estudiante">Estudiante</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4" id="otraCondicionContainer" style="display: none;">
                            <label for="otraCondicion" class="form-label">Especificar Condición</label>
                            <input type="text" id="otraCondicion" name="otraCondicion" class="form-control" id="otraCondicion" value="<?= $economicos[0]['otra_actividad'] ?>" placeholder="Especificar">
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="InputConfirmPassword" class="form-label">Nombre de Empresa</label>
                            <input type="text" id="nombreEmpresa" class="form-control" name="nombreEmpresa" value="<?= $economicos[0]['nom_empres'] ?>" id="InputConfirmPassword" value="">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="InputConfirmPassword" class="form-label">Tipo de Empresa</label>
                            <select class="form-select" id="tipoEmpresa" name="tipoEmpresa" aria-label="Default select example">
                                <option value="<?= $economicos[0]['tipo_empreesa'] ?>" selected><?= $economicos[0]['tipo_empresa'] ?></option>
                                <option value="publica">Publica</option>
                                <option value="privada">Privada</option>
                                <option value="asociacionCivil">Asociación Civil</option>
                                <option value="otra">Otra</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4" id="otroTipoEmpresaContainer" style="display: none;">
                            <label for="otroTipoEmpresa" class="form-label">Especificar Tipo de Empresa</label>
                            <input type="text" name="otroTipoEmpresa" class="form-control" id="otroTipoEmpresa" value="<?= $economicos[0]['otro_tipo_emp'] ?>" placeholder="Especificar tipo de empresa">
                        </div>

                        <h5 class="mb-1">Domicilio Laboral</h5>
                        <p class="mb-4"></p>

                        <div class="col-12 col-lg-3">
                            <label for="estCivil" class="form-label">Estado/Mpio/Localidad</label>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="estadoLaboral" name="estadoLaboral" aria-label="Default select example">
                                <option value="<?= $economicos[0]['fk_pais'] ?>" selected><?= $economicos[0]['nom_estado'] ?></option>
                                <?php
                                $estados = ControladorClientes::ctrEstados();
                                foreach ($estados as $estado) { ?>
                                    <option value="<?= $estado['id_estado'] ?>"><?= $estado['nom_estado'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="municipioLaboral" name="municipioLaboral" aria-label="Default select example">
                                <option value="<?= $economicos[0]['fk_municipio'] ?>" selected><?= $economicos[0]['desc_municipio'] ?></option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="localidadLaboral" name="localidadLaboral" aria-label="Default select example">
                                <option value="<?= $economicos[0]['fk_localidad'] ?>" selected><?= $economicos[0]['nom_localidad'] ?></option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Calle</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" id="calleEmpresa" name="calleEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="<?= $economicos[0]['calle'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Ext</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="number" class="form-control" id="nextEmpresa" name="nextEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="<?= $economicos[0]['num_ext'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Int</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="number" class="form-control" id="nintEmpresa" name="nintEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="<?= $economicos[0]['num_int'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Colonia</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" id="colEmpresa" name="colEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="<?= $economicos[0]['colonia'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Ciudad</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                                <input type="text" class="form-control" id="ciudadEmpresa" name="ciudadEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="<?= $economicos[0]['ciudad'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">C.P</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" id="cpEmpresa" name="cpEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="<?= $economicos[0]['cod_postal'] ?>">
                            </div>



                        </div>
                        <h5 class="mb-1">Ingresos</h5>
                        <p class="mb-4"></p>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Ingresos Mensual Promedio</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-coin"></i></span>
                                <input type="number" class="form-control" id="ingresoMensual" name="ingresoMensual" aria-label="Username" aria-describedby="basic-addon1" value="<?= $economicos[0]['ingre_mensual'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Ingresos Provenientes de:</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-coin"></i></span>
                                <select class="form-select" id="ingresoProvinientes" name="ingresoProvinientes" aria-label="Default select example">
                                    <option value="<?= $economicos[0]['ingresos_provienen'] ?>" selected><?= $economicos[0]['ingresos_provienen'] ?></option>
                                    <option value="ACTIVIDADES_SORTEOS_CONCUROS"> ACTIVIDADES SOSTEOS Y CONCURSOS </option>
                                    <option value="TARJETAS_CREDITO"> TARJETAS DE CREDITO </option>
                                    <option value="PRESTAMOS_CREDITOS"> OTORGAMIENTO PRESTAMOS O CREDITOS </option>
                                    <option value="BIENES_INMUEBLES"> SERVICIOS DE BIENES O INMUEBLES </option>
                                    <option value="JOYERIA"> COMERCIALIZACION DE JOYERIA </option>
                                    <option value="OBRAS_ARTE"> COMERCIALIZACION DE OBRAS DE ARTE </option>
                                    <option value="COMER_VEHICULOS"> COMERCIALIZACION DE VEHICULOS </option>
                                    <option value="BLINDAJE_VEHI_INMU"> SERVICIOS DE BLIDAJE DE VEHICULOS E BIENES INMUEBLES </option>
                                    <option value="CUSTODIA_VALORES"> SERVICIO DE TRASLADO CUSTODIA DE VALORES </option>
                                    <option value="SERV_PROFECIONALES"> SERVICIO PROFESIONALES INDEPENDIENTES </option>
                                    <option value="NOTARIO_PUBLICO"> NOTARIO PUBLICO </option>
                                    <option value="CORREDOR_PUBLICO"> CORREDOR PUBLICO </option>
                                    <option value="DONATIVOS"> RECEPCION DE DONATIVOS </option>
                                    <option value="ADUANAL"> AGENTE ADUANAL </option>
                                    <option value="CONST_PERSO_INMUE"> CONSTITUCION PERSONALES O BIENES INMUEBLES </option>
                                    <option value="INT_ACTIV_VIRT_ENT_FINAN"> INTERCABIO DE ACTIVOS VITUALES A ENTIDADES FINANCIERAS </option>
                                    <option value="NINGUNA_ANTE"> NINGUNA DE LAS ANTERIORES </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary col-1 prev">Anterior</button>
                    <button type="button" class="btn btn-primary col-1 next">Siguiente</button>

                </div>

                <!-- Sección 3: Información Financiera -->
                <div class="step d-none" id="step3">
                    <h5 class="mb-1">Beneficiarios</h5>
                    <p class="mb-4"></p>

                    <div class="row g-3">
                        <div class="col-12 col-lg-6">
                            <label for="nombreBeneficiario" class="form-label">Nombre Completo del Beneficiario</label>
                            <input type="text" class="form-control" id="nombreBeneficiario" name="nombreBeneficiario" placeholder="" value="">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="pApellidoBeneficiario" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="pApellidoBeneficiario" name="pApellidoBeneficiario" placeholder="" value="">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="sApellidoBeneficiario" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="sApellidoBeneficiario" name="sApellidoBeneficiario" placeholder="" value="">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="parentezco" class="form-label">Parentezco</label>
                            <select class="form-select" id="parentezco" name="parentezco">
                                <option value="">----</option>
                                <option value="PAPÁ">PAPÁ</option>
                                <option value="MAMÁ">MAMÁ</option>
                                <option value="ESPOSO(A)">ESPOSO(A)</option>
                                <option value="HERMANO(A)">HERMANO(A)</option>
                                <option value="TIO(A)">TIO(A)</option>
                                <option value="CUÑADO(A)">CUÑADO(A)</option>
                                <option value="HIJO(A)">HIJO(A)</option>
                                <option value="ABUELO(A)">ABUELO(A)</option>
                                <option value="PRIMO(A)">PRIMO(A)</option>
                                <option value="SOBRINO(A)">SOBRINO(A)</option>
                                <option value="NIETO(A)">NIETO(A)</option>
                                <option value="SUEGRO(A)">SUEGRO(A)</option>
                                <option value="NUERA">NUERA</option>
                                <option value="YERNO">YERNO</option>
                                <option value="OTRO">OTRO</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="porcentajeBeneficiario" class="form-label">Porcentaje%</label>
                            <input type="text" class="form-control" id="porcentajeBeneficiario" name="porcentajeBeneficiario" value="">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="fNacBen" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fNacBen" name="fNacBen" value="">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="telBeneficiario" class="form-label">Teléfono Beneficiario</label>
                            <input type="text" class="form-control" id="telBeneficiario" name="telBeneficiario" value="">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="dirBeneficiario" class="form-label">Dirección Beneficiario</label>
                            <input type="text" class="form-control" id="dirBeneficiario" name="dirBeneficiario" value="">
                        </div>

                        <button type="button" class="btn btn-primary col-2" id="addBeneficiaryButton">
                            Agregar Beneficiario
                        </button>
                    </div>

                    <!-- Tabla de beneficiarios -->
                    <div class="mt-4">
                        <table class="table table-bordered <?= empty($beneficiarios) ? 'd-none' : '' ?>" id="beneficiaryTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>Parentezco</th>
                                    <th>Porcentaje</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($beneficiarios)) : ?>
                                    <?php foreach ($beneficiarios as $index => $beneficiario) : ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><input type="text" class="form-control" name="nombreBeneficiario[]" value="<?= $beneficiario['nom_beneficiario']; ?>" readonly></td>
                                            <td><input type="text" class="form-control" name="pApellidoBeneficiario[]" value="<?= $beneficiario['apaterno_beneficiario']; ?>" readonly></td>
                                            <td><input type="text" class="form-control" name="sApellidoBeneficiario[]" value="<?= $beneficiario['amaterno_beneficiario']; ?>" readonly></td>
                                            <td><input type="text" class="form-control" name="parentezco[]" value="<?= $beneficiario['parentesco']; ?>" readonly></td>
                                            <td><input type="text" class="form-control" name="porcentajeBeneficiario[]" value="<?= $beneficiario['porcentaje']; ?>" readonly></td>
                                            <td><input type="date" class="form-control" name="fNacBen[]" value="<?= $beneficiario['f_nacimiento_ben']; ?>" readonly></td>
                                            <td><input type="text" class="form-control" name="telBeneficiario[]" value="<?= $beneficiario['tel_contacto']; ?>" readonly></td>
                                            <td><input type="text" class="form-control" name="dirBeneficiario[]" value="<?= $beneficiario['direccion_ben']; ?>" readonly></td>
                                            <td><button type="button" class="btn btn-danger btn-sm removeBeneficiary">Eliminar</button></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-secondary prev">Anterior</button>
                    <button type="button" class="btn btn-primary next">Siguiente</button>
                </div>

                <!-- Sección 4: Información de Contacto de Emergencia -->
                <div class="step d-none" id="step4">
                    <h5 class="mb-1">Transaccionalidad</h5>

                    <div class="container">
                        <div class="row">

                            <!-- Select para escoger el origen de los recursos -->
                            <div class="col-12 col-lg-6">
                                <label for="recursosProvienen" class="form-label">Los recursos provienen de:</label>
                                <select class="form-select" id="recursosProvienen" name="recursosProvienen" value='' onchange="toggleInputs()">
                                    <option value="<?=$transaccionalidad[0]['recursos']?>"><?=$transaccionalidad[0]['recursos']?></option>
                                    <option value="RECURSOS PROPIOS">RECURSOS PROPIOS</option>
                                    <option value="RECURSOS DE TERCEROS">RECURSOS DE TERCEROS</option>
                                    <option value="AMBOS">AMBOS</option>
                                </select>
                            </div>
                        </div>

                        <!-- Campos para Recursos Propios -->
                        <div id="recursosPropiosInputs" class="row mt-4" style="display: none;">
                            <div class="text-center mb-4">
                                <h3 class="fw-bold text-dark">Datos de Recursos Propios</h3>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="porcentajePropios" class="form-label">Recursos Propios (%)</label>
                                <input type="number" class="form-control" id="porcentajePropios" name="porcentajePropios" value='' placeholder="Ingresa el porcentaje">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="usoCuenta" class="form-label">Uso de la cuenta</label>
                                <select id="usoCuenta" name="usoCuenta" class="form-control form-control-sm" required>
                                    <option value="<?=$transaccionalidad[0]['uso_cuenta']?>"><?=$transaccionalidad[0]['uso_cuenta']?></option>
                                    <option value="AHORRO_INGR_PROPIO">Ahorro o Ingresos Propios</option>
                                    <option value="APOR_GOB">Aportación de Gobierno</option>
                                    <option value="SALARIO">Depósito de Salario</option>
                                    <option value="NEGOCIO">Flujo de Negocio</option>
                                    <option value="OTRO">Otro</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6 mt-3" id="especificaContainer" style="display: none;">
                                <label for="especificaOtro" class="form-label">Especifica</label>
                                <input type="text" id="especificaOtro" name="especificaOtro" class="form-control form-control-sm" value='<?=$transaccionalidad[0]['uso_cuenta_otro']?>' placeholder="Especifica el uso de la cuenta">
                            </div>
                        </div>

                        <!-- Campos para Recursos de Terceros -->
                        <div id="recursosTercerosInputs" class="row mt-4" style="display: none;">
                            <div class="text-center mb-4">
                                <h3 class="fw-bold text-dark">Datos de terceros (solo es recursos de terceros).</h3>
                            </div>
                            <div id="recursosTercerosInputs" class="row mt-4">
                                <div class="row mt-3">
                                    <div class="col-12 col-lg-4">
                                        <label for="nombreTercero" class="form-label">Nombre Completo (Beneficiario)</label>
                                        <input type="text" class="form-control" id="nombreTercero" placeholder="Introduce Nombres">
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="apellidoPaternoTercero" class="form-label">Apellido Paterno</label>
                                        <input type="text" class="form-control" id="apellidoPaternoTercero" placeholder="Introduce Apellido Paterno">
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="apellidoMaternoTercero" class="form-label">Apellido Materno</label>
                                        <input type="text" class="form-control" id="apellidoMaternoTercero" placeholder="Introduce Apellido Materno">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 col-lg-6">
                                        <label for="personalidadJuridicaTercero" class="form-label">Personalidad Jurídica</label>
                                        <input type="text" class="form-control" id="personalidadJuridicaTercero">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="porcentajeTerceros" class="form-label">Porcentaje Terceros (%)</label>
                                        <input type="number" class="form-control" id="porcentajeTerceros">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="tipoIdentificacionTercero" class="form-label">Tipo de Identifiación</label>
                                        <select class="form-control form-control-sm" name="tipoIdentificacionTercero" id="tipoIdentificacionTercero">
                                            <option selected value=""> --- --- --- </option>
                                            <option value="CREDENCIAL PARA VOTAR">CREDENCIAL PARA VOTAR</option>
                                            <option value="PASAPORTE">PASAPORTE</option>
                                            <option value="CEDULA PROFESIONAL">CEDULA PROFESIONAL</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="numeroIdentificacionTercero" class="form-label">Numero Identificacion </label>
                                        <input class="form-control form-control-sm" type="text" name="numeroIdentificacionTercero" id="numeroIdentificacionTercero" placeholder="">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="nacionalidadTercero" class="form-label">Numero Identificacion </label>
                                        <select class="form-control form-control-sm" id="nacionalidadTercero" name="nacionalidadTercero">
                                            <option value=""> -- SELECCIONA NACION -- </option>
                                            <option value="1">NAM :: NAMIBIANA</option>
                                            <option value="2">AGO :: ANGOLESA</option>
                                            <option value="3">DZA :: ARGELIANA</option>
                                            <option value="4">BEN :: DE BENNIN</option>
                                            <option value="5">BWA :: BOTSWANESA</option>
                                            <option value="6">BDI :: BURUNDESA</option>
                                            <option value="7">CPV :: DE CABO VERDE</option>
                                            <option value="8">COM :: COMORENSE</option>
                                            <option value="9">COD :: CONGOLESA</option>
                                            <option value="10">COG :: MARFILEÑA</option>
                                            <option value="11">TCD :: CHADIANA</option>
                                            <option value="12">DJI :: DE DJIBOUTI</option>
                                            <option value="13">EGY :: EGIPCIA</option>
                                            <option value="14">ETH :: ETIOPE</option>
                                            <option value="15">GAB :: GABONESA</option>
                                            <option value="16">GMB :: GAMBIANA</option>
                                            <option value="17">GHA :: GHANATA</option>
                                            <option value="18">GNB :: GUINEA</option>
                                            <option value="19">GIN :: GUINEA</option>
                                            <option value="20">GNQ :: GUINEA ECUATORIANA</option>
                                            <option value="21">LBY :: LIBIA</option>
                                            <option value="22">KEN :: KENIANA</option>
                                            <option value="23">LSO :: LESOTHENSE</option>
                                            <option value="24">LBR :: LIBERIANA</option>
                                            <option value="25">MWI :: MALAWIANA</option>
                                            <option value="26">MLI :: MALIENSE</option>
                                            <option value="27">MAR :: MARROQUI</option>
                                            <option value="28">MUS :: MAURICIANA</option>
                                            <option value="29">MRT :: MAURITANA</option>
                                            <option value="30">MOZ :: MOZAMBIQUEÑA</option>
                                            <option value="31">NER :: NIGERINA</option>
                                            <option value="32">NGA :: NIGERIANA</option>
                                            <option value="33">CAF :: CENTRO AFRICANA</option>
                                            <option value="34">CMR :: CAMERUNESA</option>
                                            <option value="35">TZA :: TANZANIANA</option>
                                            <option value="36">RWA :: RWANDESA</option>
                                            <option value="37">ESH :: DEL SAHARA</option>
                                            <option value="38">STP :: DE SANTO TOME</option>
                                            <option value="39">SEN :: SENEGALESA</option>
                                            <option value="40">SYC :: DE SEYCHELLES</option>
                                            <option value="41">SLE :: SIERRA LEONESA</option>
                                            <option value="42">SOM :: SOMALI</option>
                                            <option value="43">ZAF :: SUDAFRICANA</option>
                                            <option value="44">SDN :: SUDANESA</option>
                                            <option value="45">SWZ :: SWAZI</option>
                                            <option value="46">TGO :: TOGOLESA</option>
                                            <option value="47">TUN :: TUNECINA</option>
                                            <option value="48">UGA :: UGANDESA</option>
                                            <option value="49">ZAR :: ZAIRANA</option>
                                            <option value="50">ZMB :: ZAMBIANA</option>
                                            <option value="51">ZWE :: DE ZIMBAWI</option>
                                            <option value="52">ARG :: ARGENTINA</option>
                                            <option value="53">BHS :: BAHAMEÑA</option>
                                            <option value="54">BRB :: DE BARBADOS</option>
                                            <option value="55">BLZ :: BELICEÑA</option>
                                            <option value="56">BOL :: BOLIVIANA</option>
                                            <option value="57">BRA :: BRASILEÑA</option>
                                            <option value="58">CAN :: CANADIENSE</option>
                                            <option value="59">COL :: COLOMBIANA</option>
                                            <option value="60">CRI :: COSTARRICENSE</option>
                                            <option value="61">CUB :: CUBANA</option>
                                            <option value="62">CHL :: CHILENA</option>
                                            <option value="63">DMA :: DOMINICA</option>
                                            <option value="64">SLV :: SALVADOREÑA</option>
                                            <option value="65">USA :: ESTADOUNIDENSE</option>
                                            <option value="66">VCT :: GRANADINA</option>
                                            <option value="67">GTM :: GUATEMALTECA</option>
                                            <option value="68">VGB :: BRITANICA</option>
                                            <option value="69">GUY :: GUYANESA</option>
                                            <option value="70">HTI :: HAITIANA</option>
                                            <option value="71">HND :: HONDUREÑA</option>
                                            <option value="72">JAM :: JAMAIQUINA</option>
                                            <option value="73">MEX :: MEXICANA</option>
                                            <option value="74">NIC :: NICARAGUENSE</option>
                                            <option value="75">PAN :: PANAMEÑA</option>
                                            <option value="76">PRY :: PARAGUAYA</option>
                                            <option value="77">PER :: PERUANA</option>
                                            <option value="78">PRI :: PUERTORRIQUEÑA</option>
                                            <option value="79">DOM :: DOMINICANA</option>
                                            <option value="80">LCA :: SANTA LUCIENSE</option>
                                            <option value="81">SUR :: SURINAMENSE</option>
                                            <option value="82">TTO :: TRINITARIA</option>
                                            <option value="83">URY :: URUGUAYA</option>
                                            <option value="84">VEN :: VENEZOLANA</option>
                                            <option value="85">USA :: AMERICANA</option>
                                            <option value="86">AFG :: AFGANA</option>
                                            <option value="87">BHR :: DE BAHREIN</option>
                                            <option value="88">BTN :: BHUTANESA</option>
                                            <option value="89">BUR :: BIRMANA</option>
                                            <option value="90">PRK :: NORCOREANA</option>
                                            <option value="91">KOR :: SUDCOREANA</option>
                                            <option value="92">CHN :: CHINA</option>
                                            <option value="93">CYP :: CHIPRIOTA</option>
                                            <option value="94">SAU :: ARABE</option>
                                            <option value="95">PHL :: FILIPINA</option>
                                            <option value="96">IND :: HINDU</option>
                                            <option value="97">IDN :: INDONESA</option>
                                            <option value="98">IRQ :: IRAQUI</option>
                                            <option value="99">IRN :: IRANI</option>
                                            <option value="100">ISR :: ISRAELI</option>
                                            <option value="101">JPN :: JAPONESA</option>
                                            <option value="102">JOR :: JORDANA</option>
                                            <option value="103">KHM :: CAMBOYANA</option>
                                            <option value="104">KWT :: KUWAITI</option>
                                            <option value="105">LBN :: LIBANESA</option>
                                            <option value="106">MYS :: MALASIA</option>
                                            <option value="107">MDV :: MALDIVA</option>
                                            <option value="108">MNG :: MONGOLESA</option>
                                            <option value="109">NPL :: NEPALESA</option>
                                            <option value="110">OMN :: OMANESA</option>
                                            <option value="111">PAK :: PAKISTANI</option>
                                            <option value="112">QAT :: DEL QATAR</option>
                                            <option value="113">SYR :: SIRIA</option>
                                            <option value="114">LAO :: LAOSIANA</option>
                                            <option value="115">SGP :: SINGAPORENSE</option>
                                            <option value="116">THA :: TAILANDESA</option>
                                            <option value="117">TWN :: TAIWANESA</option>
                                            <option value="118">TUR :: TURCA</option>
                                            <option value="119">VNM :: NORVIETNAMITA</option>
                                            <option value="120">YEM :: YEMENI</option>
                                            <option value="121">ALB :: ALBANESA</option>
                                            <option value="122">DEU :: ALEMANA</option>
                                            <option value="123">AND :: ANDORRANA</option>
                                            <option value="124">AUT :: AUSTRIACA</option>
                                            <option value="125">BEL :: BELGA</option>
                                            <option value="126">BGR :: BULGARA</option>
                                            <option value="127">CSK :: CHECOSLOVACA</option>
                                            <option value="128">DNK :: DANESA</option>
                                            <option value="129">VAT :: VATICANA</option>
                                            <option value="130">ESP :: ESPAÑOLA</option>
                                            <option value="131">FIN :: FINLANDESA</option>
                                            <option value="132">FRA :: FRANCESA</option>
                                            <option value="133">GRC :: GRIEGA</option>
                                            <option value="134">HUN :: HUNGARA</option>
                                            <option value="135">IRL :: IRLANDESA</option>
                                            <option value="136">ISL :: ISLANDESA</option>
                                            <option value="137">ITA :: ITALIANA</option>
                                            <option value="138">LIE :: LIECHTENSTENSE</option>
                                            <option value="139">LUX :: LUXEMBURGUESA</option>
                                            <option value="140">MLT :: MALTESA</option>
                                            <option value="141">MCO :: MONEGASCA</option>
                                            <option value="142">NOR :: NORUEGA</option>
                                            <option value="143">NLD :: HOLANDESA</option>
                                            <option value="144">PRT :: PORTUGUESA</option>
                                            <option value="145">IOT :: BRITANICA</option>
                                            <option value="146">BLR :: SOVIETICA BIELORRUSA</option>
                                            <option value="147">UKR :: SOVIETICA UCRANIANA</option>
                                            <option value="148">ROM :: RUMANA</option>
                                            <option value="149">SMR :: SAN MARINENSE</option>
                                            <option value="150">SWE :: SUECA</option>
                                            <option value="151">CHE :: SUIZA</option>
                                            <option value="152">YUG :: YUGOSLAVA</option>
                                            <option value="153">AUS :: AUSTRALIANA</option>
                                            <option value="154">FJI :: FIJIANA</option>
                                            <option value="155">SLB :: SALOMONESA</option>
                                            <option value="156">NRU :: NAURUANA</option>
                                            <option value="157">PNG :: PAPUENSE</option>
                                            <option value="158">WSM :: SAMOANA</option>
                                            <option value="159">SVK :: ESLOVACA</option>
                                            <option value="160">BFA :: BURKINA FASO</option>
                                            <option value="161">EST :: ESTONIA</option>
                                            <option value="162">FSM :: MICRONECIA</option>
                                            <option value="163">GBD :: REINO UNIDO(DEPEN. TET. BRIT.)</option>
                                            <option value="164">GBN :: REINO UNIDO(BRIT. DEL EXT.)</option>
                                            <option value="165">GBO :: REINO UNIDO(C. BRIT. DEL EXT.)</option>
                                            <option value="166">GBR :: REINO UNIDO</option>
                                            <option value="167">KGZ :: KIRGUISTAN</option>
                                            <option value="168">LTU :: LITUANIA</option>
                                            <option value="169">MDA :: MOLDOVIA, REPUBLICA DE</option>
                                            <option value="170">MKD :: MACEDONIA</option>
                                            <option value="171">SVN :: ESLOVENIA</option>
                                            <option value="172">XES :: ESLOVAQUIA</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-3"></div>
                                    <div class="col-12 col-lg-6 mt-3">
                                        <button type="button" class="btn btn-primary" id="agregarTercero">Agregar Tercero</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Tabla donde se agregarán los terceros -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <table class="table table-bordered" id="tablaTerceros">
                                        <thead>
                                            <tr>
                                                <th>Nombre Completo</th>
                                                <th>Apellido Paterno</th>
                                                <th>Apellido Materno</th>
                                                <th>Personalidad Jurídica</th>
                                                <th>Porcentaje (%)</th>
                                                <th>TIpo de Identificacion</th>
                                                <th># de Identificacion</th>
                                                <th>Nacionalidad</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Las filas se agregarán aquí -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-end"><strong>Total Porcentaje:</strong></td>
                                                <td id="totalPorcentaje">0%</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="9" id="mensajePorcentaje" class="text-center text-danger">
                                                    El porcentaje total debe ser exactamente 100%.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9">
                                                    <div class="progress">
                                                        <div id="barraProgreso" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>


                        </div>








                        <div id="" class="row mt-4">
                            <div class="row">
                                <div class="text-center mb-4">
                                    <h3 class="fw-bold text-dark">Transacciones</h3>
                                </div>

                                <!-- Campo 1: Transacciones Mensuales -->
                                <div class="col-12 col-lg-4">
                                    <label for="transaccionesMensuales" class="form-label">Transacciones Mensuales</label>
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="mensualTransaccion" id="mensualTransaccion">

                                            <span class="input-group-text" id="basic-addon1"><i class="lni lni-stats-up"></i></span>
                                            <option value="<?=$transaccionalidad[0]['transac_men']?>"><?=$transaccionalidad[0]['transac_men']?></option>
                                            <option value="1_14"> 1 A 14 </option>
                                            <option value="15_29"> 15 A 29 </option>
                                            <option value="30_38"> 30 A 38 </option>
                                            <option value="49_mas"> 49 0 Más </option><!-- Agrega más opciones si es necesario -->
                                        </select>
                                    </div>
                                </div>

                                <!-- Campo 2: Monto Transacción Pesos al Mes -->
                                <div class="col-12 col-lg-4">
                                    <label for="montoTransaccion" class="form-label">Monto Transacción Pesos al Mes</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon2"><i class="lni lni-dollar"></i></span>
                                        <select class="form-control" name="montoTransaccion" id="montoTransaccion">
                                            <option value="<?=$transaccionalidad[0]['monto_men']?>"><?=$transaccionalidad[0]['monto_men']?></option>
                                            <option value="1_15000"> 1 A 15,000 </option>
                                            <option value="15,001_50,000"> 15,001 A 50,000 </option>
                                            <option value="50,001_90,000"> 50,000 A 90,000 </option>
                                            <option value="90,001_150,000"> 90,001 A 1500,000 </option>
                                            <option value="150,000_mas"> 150,001 A Más </option> <!-- Agrega más opciones si es necesario -->
                                        </select>
                                    </div>
                                </div>

                                <!-- Campo 3: Saldo Promedio Mensual Pesos -->
                                <div class="col-12 col-lg-4">
                                    <label for="saldoPromedioMensual" class="form-label">Saldo Promedio Mensual Pesos</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon3"><i class="lni lni-graph"></i></span>
                                        <select class="form-control" name="saldoPromedioMensual" id="saldoPromedioMensual">
                                            <option value="<?=$transaccionalidad[0]['saldo_men']?>"><?=$transaccionalidad[0]['saldo_men']?></option>
                                            <option value="1_10,501"> 1 A 10,501 </option>
                                            <option value="10,501_35,000"> 10,501 A 35,000 </option>
                                            <option value="35,001_63,000"> 35,001 A 63,000 </option>
                                            <option value="63,001_105,000"> 63,001 A 105,000 </option>
                                            <option value="105,001_mas"> 105,001 A Más </option> <!-- Agrega más opciones si es necesario -->
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>





                    </div>
                    <button type="button" class="btn btn-secondary prev">Anterior</button>
                    <button type="button" class="btn btn-primary next">Siguiente</button>
                </div>

                <!-- Sección 5: Preferencias del Cliente -->
                <div class="step d-none" id="step5">
                    <h5 class="mb-1">Datos Generales Cotitular</h5>


                    <div class="row g-3">
                        <div class="col-12 col-lg-4">
                            <label for="nombreCotitular" class="form-label">Cotitular</label>
                            <input type="text" class="form-control" id="nombreCotitular" name="nombreCotitular" value="<?=$cotitular[0]['nom_cotitular']?>" placeholder="Nombre(s)">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="primerApellido" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="primerApellidoCotitular" name="primerApellidoCotitular" value="<?=$cotitular[0]['apaterno_cotitular']?>" placeholder="Primer Apellido">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="segundoApellido" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="segundoApellidoCotitular" name="segundoApellidoCotitular" value="<?=$cotitular[0]['amaterno_cotitular']?>" placeholder="Segundo Apellido">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="Genero" class="form-label">Género</label>
                            <select class="form-select" id="generoCotitular" name="generoCotitular" aria-label="Default select example">
                                <option value="<?=$cotitular[0]['sexo_cotitular']?>" selected><?=$cotitular[0]['sexo_cotitular']?></option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>

                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="InputCountry" class="form-label">Identificación Oficial</label>
                            <select class="form-select" id="identificacionOficialCotitular" name="identificacionOficialCotitular" aria-label="Default select example">
                                <option value="<?=$cotitular[0]['tipo_identificacion_cotitular']?>" selected><?=$cotitular[0]['tipo_identificacion_cotitular']?></option>
                                <option value="1">Ine</option>
                                <option value="2">Pasaporte</option>
                                <option value="3">Cedula Profesional</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="serieNoIdentificacionCotitular" class="form-label">Número de Identificación</label>
                            <input type="text" class="form-control" id="serieNoIdentificacionCotitular" name="serieNoIdentificacionCotitular" value="<?=$cotitular[0]['clave_elector_cotitular']?>" placeholder="Número de Identificación">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="serieNoIdentificacion" class="form-label">Curp</label>
                            <input type="text" class="form-control" id="curpCotitular" name="curpCotitular" value="<?=$cotitular[0]['curp_cotitular']?>" placeholder="Número de Identificación">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">RFC</label>
                            <input type="text" class="form-control" id="rfcCotitular" name="rfcCotitular" value="<?=$cotitular[0]['rfc_cotitular']?>" placeholder="Escribe">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="fNac" class="form-label">Fecha de Nacimiento</label>
                            <input type="text" class="form-control" id="fNacCotitular" name="fNacCotitular" value="<?=$cotitular[0]['fecha_nacimiento_cotitular']?>" placeholder="Ingresa Fecha de Nacimiento">
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="religion" class="form-label">Religión</label>
                            <input type="text" class="form-control" id="religionCotitular" name="religionCotitular" value="<?=$cotitular[0]['religion_cotitular']?>" placeholder="Ingresa Religión">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="paisNac" class="form-label">Pais de Nacimiento</label>
                            <select class="form-select" id="paisNacCotitular" name="paisNacCotitular"   aria-label="Default select example">
                                <option value="<?=$cotitular[0]['Fk_pais_nac_cotitular']?>"><?=$cotitular[0]['pais_nac_cotitular']?></option>
                                <option value="1">NAM :: NAMIBIANA</option>
                                <option value="2">AGO :: ANGOLESA</option>
                                <option value="3">DZA :: ARGELIANA</option>
                                <option value="4">BEN :: DE BENNIN</option>
                                <option value="5">BWA :: BOTSWANESA</option>
                                <option value="6">BDI :: BURUNDESA</option>
                                <option value="7">CPV :: DE CABO VERDE</option>
                                <option value="8">COM :: COMORENSE</option>
                                <option value="9">COD :: CONGOLESA</option>
                                <option value="10">COG :: MARFILEÑA</option>
                                <option value="11">TCD :: CHADIANA</option>
                                <option value="12">DJI :: DE DJIBOUTI</option>
                                <option value="13">EGY :: EGIPCIA</option>
                                <option value="14">ETH :: ETIOPE</option>
                                <option value="15">GAB :: GABONESA</option>
                                <option value="16">GMB :: GAMBIANA</option>
                                <option value="17">GHA :: GHANATA</option>
                                <option value="18">GNB :: GUINEA</option>
                                <option value="19">GIN :: GUINEA</option>
                                <option value="20">GNQ :: GUINEA ECUATORIANA</option>
                                <option value="21">LBY :: LIBIA</option>
                                <option value="22">KEN :: KENIANA</option>
                                <option value="23">LSO :: LESOTHENSE</option>
                                <option value="24">LBR :: LIBERIANA</option>
                                <option value="25">MWI :: MALAWIANA</option>
                                <option value="26">MLI :: MALIENSE</option>
                                <option value="27">MAR :: MARROQUI</option>
                                <option value="28">MUS :: MAURICIANA</option>
                                <option value="29">MRT :: MAURITANA</option>
                                <option value="30">MOZ :: MOZAMBIQUEÑA</option>
                                <option value="31">NER :: NIGERINA</option>
                                <option value="32">NGA :: NIGERIANA</option>
                                <option value="33">CAF :: CENTRO AFRICANA</option>
                                <option value="34">CMR :: CAMERUNESA</option>
                                <option value="35">TZA :: TANZANIANA</option>
                                <option value="36">RWA :: RWANDESA</option>
                                <option value="37">ESH :: DEL SAHARA</option>
                                <option value="38">STP :: DE SANTO TOME</option>
                                <option value="39">SEN :: SENEGALESA</option>
                                <option value="40">SYC :: DE SEYCHELLES</option>
                                <option value="41">SLE :: SIERRA LEONESA</option>
                                <option value="42">SOM :: SOMALI</option>
                                <option value="43">ZAF :: SUDAFRICANA</option>
                                <option value="44">SDN :: SUDANESA</option>
                                <option value="45">SWZ :: SWAZI</option>
                                <option value="46">TGO :: TOGOLESA</option>
                                <option value="47">TUN :: TUNECINA</option>
                                <option value="48">UGA :: UGANDESA</option>
                                <option value="49">ZAR :: ZAIRANA</option>
                                <option value="50">ZMB :: ZAMBIANA</option>
                                <option value="51">ZWE :: DE ZIMBAWI</option>
                                <option value="52">ARG :: ARGENTINA</option>
                                <option value="53">BHS :: BAHAMEÑA</option>
                                <option value="54">BRB :: DE BARBADOS</option>
                                <option value="55">BLZ :: BELICEÑA</option>
                                <option value="56">BOL :: BOLIVIANA</option>
                                <option value="57">BRA :: BRASILEÑA</option>
                                <option value="58">CAN :: CANADIENSE</option>
                                <option value="59">COL :: COLOMBIANA</option>
                                <option value="60">CRI :: COSTARRICENSE</option>
                                <option value="61">CUB :: CUBANA</option>
                                <option value="62">CHL :: CHILENA</option>
                                <option value="63">DMA :: DOMINICA</option>
                                <option value="64">SLV :: SALVADOREÑA</option>
                                <option value="65">USA :: ESTADOUNIDENSE</option>
                                <option value="66">VCT :: GRANADINA</option>
                                <option value="67">GTM :: GUATEMALTECA</option>
                                <option value="68">VGB :: BRITANICA</option>
                                <option value="69">GUY :: GUYANESA</option>
                                <option value="70">HTI :: HAITIANA</option>
                                <option value="71">HND :: HONDUREÑA</option>
                                <option value="72">JAM :: JAMAIQUINA</option>
                                <option value="73">MEX :: MEXICANA</option>
                                <option value="74">NIC :: NICARAGUENSE</option>
                                <option value="75">PAN :: PANAMEÑA</option>
                                <option value="76">PRY :: PARAGUAYA</option>
                                <option value="77">PER :: PERUANA</option>
                                <option value="78">PRI :: PUERTORRIQUEÑA</option>
                                <option value="79">DOM :: DOMINICANA</option>
                                <option value="80">LCA :: SANTA LUCIENSE</option>
                                <option value="81">SUR :: SURINAMENSE</option>
                                <option value="82">TTO :: TRINITARIA</option>
                                <option value="83">URY :: URUGUAYA</option>
                                <option value="84">VEN :: VENEZOLANA</option>
                                <option value="85">USA :: AMERICANA</option>
                                <option value="86">AFG :: AFGANA</option>
                                <option value="87">BHR :: DE BAHREIN</option>
                                <option value="88">BTN :: BHUTANESA</option>
                                <option value="89">BUR :: BIRMANA</option>
                                <option value="90">PRK :: NORCOREANA</option>
                                <option value="91">KOR :: SUDCOREANA</option>
                                <option value="92">CHN :: CHINA</option>
                                <option value="93">CYP :: CHIPRIOTA</option>
                                <option value="94">SAU :: ARABE</option>
                                <option value="95">PHL :: FILIPINA</option>
                                <option value="96">IND :: HINDU</option>
                                <option value="97">IDN :: INDONESA</option>
                                <option value="98">IRQ :: IRAQUI</option>
                                <option value="99">IRN :: IRANI</option>
                                <option value="100">ISR :: ISRAELI</option>
                                <option value="101">JPN :: JAPONESA</option>
                                <option value="102">JOR :: JORDANA</option>
                                <option value="103">KHM :: CAMBOYANA</option>
                                <option value="104">KWT :: KUWAITI</option>
                                <option value="105">LBN :: LIBANESA</option>
                                <option value="106">MYS :: MALASIA</option>
                                <option value="107">MDV :: MALDIVA</option>
                                <option value="108">MNG :: MONGOLESA</option>
                                <option value="109">NPL :: NEPALESA</option>
                                <option value="110">OMN :: OMANESA</option>
                                <option value="111">PAK :: PAKISTANI</option>
                                <option value="112">QAT :: DEL QATAR</option>
                                <option value="113">SYR :: SIRIA</option>
                                <option value="114">LAO :: LAOSIANA</option>
                                <option value="115">SGP :: SINGAPORENSE</option>
                                <option value="116">THA :: TAILANDESA</option>
                                <option value="117">TWN :: TAIWANESA</option>
                                <option value="118">TUR :: TURCA</option>
                                <option value="119">VNM :: NORVIETNAMITA</option>
                                <option value="120">YEM :: YEMENI</option>
                                <option value="121">ALB :: ALBANESA</option>
                                <option value="122">DEU :: ALEMANA</option>
                                <option value="123">AND :: ANDORRANA</option>
                                <option value="124">AUT :: AUSTRIACA</option>
                                <option value="125">BEL :: BELGA</option>
                                <option value="126">BGR :: BULGARA</option>
                                <option value="127">CSK :: CHECOSLOVACA</option>
                                <option value="128">DNK :: DANESA</option>
                                <option value="129">VAT :: VATICANA</option>
                                <option value="130">ESP :: ESPAÑOLA</option>
                                <option value="131">FIN :: FINLANDESA</option>
                                <option value="132">FRA :: FRANCESA</option>
                                <option value="133">GRC :: GRIEGA</option>
                                <option value="134">HUN :: HUNGARA</option>
                                <option value="135">IRL :: IRLANDESA</option>
                                <option value="136">ISL :: ISLANDESA</option>
                                <option value="137">ITA :: ITALIANA</option>
                                <option value="138">LIE :: LIECHTENSTENSE</option>
                                <option value="139">LUX :: LUXEMBURGUESA</option>
                                <option value="140">MLT :: MALTESA</option>
                                <option value="141">MCO :: MONEGASCA</option>
                                <option value="142">NOR :: NORUEGA</option>
                                <option value="143">NLD :: HOLANDESA</option>
                                <option value="144">PRT :: PORTUGUESA</option>
                                <option value="145">IOT :: BRITANICA</option>
                                <option value="146">BLR :: SOVIETICA BIELORRUSA</option>
                                <option value="147">UKR :: SOVIETICA UCRANIANA</option>
                                <option value="148">ROM :: RUMANA</option>
                                <option value="149">SMR :: SAN MARINENSE</option>
                                <option value="150">SWE :: SUECA</option>
                                <option value="151">CHE :: SUIZA</option>
                                <option value="152">YUG :: YUGOSLAVA</option>
                                <option value="153">AUS :: AUSTRALIANA</option>
                                <option value="154">FJI :: FIJIANA</option>
                                <option value="155">SLB :: SALOMONESA</option>
                                <option value="156">NRU :: NAURUANA</option>
                                <option value="157">PNG :: PAPUENSE</option>
                                <option value="158">WSM :: SAMOANA</option>
                                <option value="159">SVK :: ESLOVACA</option>
                                <option value="160">BFA :: BURKINA FASO</option>
                                <option value="161">EST :: ESTONIA</option>
                                <option value="162">FSM :: MICRONECIA</option>
                                <option value="163">GBD :: REINO UNIDO(DEPEN. TET. BRIT.)</option>
                                <option value="164">GBN :: REINO UNIDO(BRIT. DEL EXT.)</option>
                                <option value="165">GBO :: REINO UNIDO(C. BRIT. DEL EXT.)</option>
                                <option value="166">GBR :: REINO UNIDO</option>
                                <option value="167">KGZ :: KIRGUISTAN</option>
                                <option value="168">LTU :: LITUANIA</option>
                                <option value="169">MDA :: MOLDOVIA, REPUBLICA DE</option>
                                <option value="170">MKD :: MACEDONIA</option>
                                <option value="171">SVN :: ESLOVENIA</option>
                                <option value="172">XES :: ESLOVAQUIA</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                            <select class="form-select" id="nacionalidadCotitular" name="nacionalidadCotitular" aria-label="Default select example">
                                <option value="<?=$cotitular[0]['nacionalidad_cotitular']?>"> <?=$cotitular[0]['nacionalidad_cotitular']?></option>
                                <option value="1">NAM :: NAMIBIANA</option>
                                <option value="2">AGO :: ANGOLESA</option>
                                <option value="3">DZA :: ARGELIANA</option>
                                <option value="4">BEN :: DE BENNIN</option>
                                <option value="5">BWA :: BOTSWANESA</option>
                                <option value="6">BDI :: BURUNDESA</option>
                                <option value="7">CPV :: DE CABO VERDE</option>
                                <option value="8">COM :: COMORENSE</option>
                                <option value="9">COD :: CONGOLESA</option>
                                <option value="10">COG :: MARFILEÑA</option>
                                <option value="11">TCD :: CHADIANA</option>
                                <option value="12">DJI :: DE DJIBOUTI</option>
                                <option value="13">EGY :: EGIPCIA</option>
                                <option value="14">ETH :: ETIOPE</option>
                                <option value="15">GAB :: GABONESA</option>
                                <option value="16">GMB :: GAMBIANA</option>
                                <option value="17">GHA :: GHANATA</option>
                                <option value="18">GNB :: GUINEA</option>
                                <option value="19">GIN :: GUINEA</option>
                                <option value="20">GNQ :: GUINEA ECUATORIANA</option>
                                <option value="21">LBY :: LIBIA</option>
                                <option value="22">KEN :: KENIANA</option>
                                <option value="23">LSO :: LESOTHENSE</option>
                                <option value="24">LBR :: LIBERIANA</option>
                                <option value="25">MWI :: MALAWIANA</option>
                                <option value="26">MLI :: MALIENSE</option>
                                <option value="27">MAR :: MARROQUI</option>
                                <option value="28">MUS :: MAURICIANA</option>
                                <option value="29">MRT :: MAURITANA</option>
                                <option value="30">MOZ :: MOZAMBIQUEÑA</option>
                                <option value="31">NER :: NIGERINA</option>
                                <option value="32">NGA :: NIGERIANA</option>
                                <option value="33">CAF :: CENTRO AFRICANA</option>
                                <option value="34">CMR :: CAMERUNESA</option>
                                <option value="35">TZA :: TANZANIANA</option>
                                <option value="36">RWA :: RWANDESA</option>
                                <option value="37">ESH :: DEL SAHARA</option>
                                <option value="38">STP :: DE SANTO TOME</option>
                                <option value="39">SEN :: SENEGALESA</option>
                                <option value="40">SYC :: DE SEYCHELLES</option>
                                <option value="41">SLE :: SIERRA LEONESA</option>
                                <option value="42">SOM :: SOMALI</option>
                                <option value="43">ZAF :: SUDAFRICANA</option>
                                <option value="44">SDN :: SUDANESA</option>
                                <option value="45">SWZ :: SWAZI</option>
                                <option value="46">TGO :: TOGOLESA</option>
                                <option value="47">TUN :: TUNECINA</option>
                                <option value="48">UGA :: UGANDESA</option>
                                <option value="49">ZAR :: ZAIRANA</option>
                                <option value="50">ZMB :: ZAMBIANA</option>
                                <option value="51">ZWE :: DE ZIMBAWI</option>
                                <option value="52">ARG :: ARGENTINA</option>
                                <option value="53">BHS :: BAHAMEÑA</option>
                                <option value="54">BRB :: DE BARBADOS</option>
                                <option value="55">BLZ :: BELICEÑA</option>
                                <option value="56">BOL :: BOLIVIANA</option>
                                <option value="57">BRA :: BRASILEÑA</option>
                                <option value="58">CAN :: CANADIENSE</option>
                                <option value="59">COL :: COLOMBIANA</option>
                                <option value="60">CRI :: COSTARRICENSE</option>
                                <option value="61">CUB :: CUBANA</option>
                                <option value="62">CHL :: CHILENA</option>
                                <option value="63">DMA :: DOMINICA</option>
                                <option value="64">SLV :: SALVADOREÑA</option>
                                <option value="65">USA :: ESTADOUNIDENSE</option>
                                <option value="66">VCT :: GRANADINA</option>
                                <option value="67">GTM :: GUATEMALTECA</option>
                                <option value="68">VGB :: BRITANICA</option>
                                <option value="69">GUY :: GUYANESA</option>
                                <option value="70">HTI :: HAITIANA</option>
                                <option value="71">HND :: HONDUREÑA</option>
                                <option value="72">JAM :: JAMAIQUINA</option>
                                <option value="73">MEX :: MEXICANA</option>
                                <option value="74">NIC :: NICARAGUENSE</option>
                                <option value="75">PAN :: PANAMEÑA</option>
                                <option value="76">PRY :: PARAGUAYA</option>
                                <option value="77">PER :: PERUANA</option>
                                <option value="78">PRI :: PUERTORRIQUEÑA</option>
                                <option value="79">DOM :: DOMINICANA</option>
                                <option value="80">LCA :: SANTA LUCIENSE</option>
                                <option value="81">SUR :: SURINAMENSE</option>
                                <option value="82">TTO :: TRINITARIA</option>
                                <option value="83">URY :: URUGUAYA</option>
                                <option value="84">VEN :: VENEZOLANA</option>
                                <option value="85">USA :: AMERICANA</option>
                                <option value="86">AFG :: AFGANA</option>
                                <option value="87">BHR :: DE BAHREIN</option>
                                <option value="88">BTN :: BHUTANESA</option>
                                <option value="89">BUR :: BIRMANA</option>
                                <option value="90">PRK :: NORCOREANA</option>
                                <option value="91">KOR :: SUDCOREANA</option>
                                <option value="92">CHN :: CHINA</option>
                                <option value="93">CYP :: CHIPRIOTA</option>
                                <option value="94">SAU :: ARABE</option>
                                <option value="95">PHL :: FILIPINA</option>
                                <option value="96">IND :: HINDU</option>
                                <option value="97">IDN :: INDONESA</option>
                                <option value="98">IRQ :: IRAQUI</option>
                                <option value="99">IRN :: IRANI</option>
                                <option value="100">ISR :: ISRAELI</option>
                                <option value="101">JPN :: JAPONESA</option>
                                <option value="102">JOR :: JORDANA</option>
                                <option value="103">KHM :: CAMBOYANA</option>
                                <option value="104">KWT :: KUWAITI</option>
                                <option value="105">LBN :: LIBANESA</option>
                                <option value="106">MYS :: MALASIA</option>
                                <option value="107">MDV :: MALDIVA</option>
                                <option value="108">MNG :: MONGOLESA</option>
                                <option value="109">NPL :: NEPALESA</option>
                                <option value="110">OMN :: OMANESA</option>
                                <option value="111">PAK :: PAKISTANI</option>
                                <option value="112">QAT :: DEL QATAR</option>
                                <option value="113">SYR :: SIRIA</option>
                                <option value="114">LAO :: LAOSIANA</option>
                                <option value="115">SGP :: SINGAPORENSE</option>
                                <option value="116">THA :: TAILANDESA</option>
                                <option value="117">TWN :: TAIWANESA</option>
                                <option value="118">TUR :: TURCA</option>
                                <option value="119">VNM :: NORVIETNAMITA</option>
                                <option value="120">YEM :: YEMENI</option>
                                <option value="121">ALB :: ALBANESA</option>
                                <option value="122">DEU :: ALEMANA</option>
                                <option value="123">AND :: ANDORRANA</option>
                                <option value="124">AUT :: AUSTRIACA</option>
                                <option value="125">BEL :: BELGA</option>
                                <option value="126">BGR :: BULGARA</option>
                                <option value="127">CSK :: CHECOSLOVACA</option>
                                <option value="128">DNK :: DANESA</option>
                                <option value="129">VAT :: VATICANA</option>
                                <option value="130">ESP :: ESPAÑOLA</option>
                                <option value="131">FIN :: FINLANDESA</option>
                                <option value="132">FRA :: FRANCESA</option>
                                <option value="133">GRC :: GRIEGA</option>
                                <option value="134">HUN :: HUNGARA</option>
                                <option value="135">IRL :: IRLANDESA</option>
                                <option value="136">ISL :: ISLANDESA</option>
                                <option value="137">ITA :: ITALIANA</option>
                                <option value="138">LIE :: LIECHTENSTENSE</option>
                                <option value="139">LUX :: LUXEMBURGUESA</option>
                                <option value="140">MLT :: MALTESA</option>
                                <option value="141">MCO :: MONEGASCA</option>
                                <option value="142">NOR :: NORUEGA</option>
                                <option value="143">NLD :: HOLANDESA</option>
                                <option value="144">PRT :: PORTUGUESA</option>
                                <option value="145">IOT :: BRITANICA</option>
                                <option value="146">BLR :: SOVIETICA BIELORRUSA</option>
                                <option value="147">UKR :: SOVIETICA UCRANIANA</option>
                                <option value="148">ROM :: RUMANA</option>
                                <option value="149">SMR :: SAN MARINENSE</option>
                                <option value="150">SWE :: SUECA</option>
                                <option value="151">CHE :: SUIZA</option>
                                <option value="152">YUG :: YUGOSLAVA</option>
                                <option value="153">AUS :: AUSTRALIANA</option>
                                <option value="154">FJI :: FIJIANA</option>
                                <option value="155">SLB :: SALOMONESA</option>
                                <option value="156">NRU :: NAURUANA</option>
                                <option value="157">PNG :: PAPUENSE</option>
                                <option value="158">WSM :: SAMOANA</option>
                                <option value="159">SVK :: ESLOVACA</option>
                                <option value="160">BFA :: BURKINA FASO</option>
                                <option value="161">EST :: ESTONIA</option>
                                <option value="162">FSM :: MICRONECIA</option>
                                <option value="163">GBD :: REINO UNIDO(DEPEN. TET. BRIT.)</option>
                                <option value="164">GBN :: REINO UNIDO(BRIT. DEL EXT.)</option>
                                <option value="165">GBO :: REINO UNIDO(C. BRIT. DEL EXT.)</option>
                                <option value="166">GBR :: REINO UNIDO</option>
                                <option value="167">KGZ :: KIRGUISTAN</option>
                                <option value="168">LTU :: LITUANIA</option>
                                <option value="169">MDA :: MOLDOVIA, REPUBLICA DE</option>
                                <option value="170">MKD :: MACEDONIA</option>
                                <option value="171">SVN :: ESLOVENIA</option>
                                <option value="172">XES :: ESLOVAQUIA</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Entidad Nacimiento Federativa</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="estadoNacCotitular" id="estadoNacCotitular" value="<?=$cotitular[0]['Fk_estado_nac_cotitular']?>" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>


                        <div class="col-12 col-lg-4 mt-3" id="condicionMigratoriaDivCotitular" style="display: d-none;">
                            <label for="condicionMigratoriaCotitular" class="form-label">Condición Migratoria</label>
                            <select class="form-select" id="condicionMigratoriaCotitular" name="condicionMigratoriaCotitular">
                                <option value="<?=$cotitular[0]['condicion_migrat_cotitular']?>" selected><?=$cotitular[0]['condicion_migrat_cotitular']?></option>
                                <option value="Residente Temporal">Residente Temporal</option>
                                <option value="Residente Permanente">Residente Permanente</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="estCivil" class="form-label">Estado Civil</label>
                            <select class="form-select" id="estCivilCotitular" name="estCivilCotitular" aCotitularria-label="Default select example">
                                <option value="<?=$cotitular[0]['estado_civil_cotitular']?>" selected><?=$cotitular[0]['estado_civil_cotitular']?></option>
                                <option value="soltero(a)">Soltero(a)</option>
                                <option value="casado(a)">Casado(a)</option>
                                <option value="viudo(a)">Viudo(a)</option>
                                <option value="divorciado(a)">Divorciado(a)</option>
                                <option value="unionLibre">Unión Libre</option>
                                <option value="indistinto">Indistinto</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Celular</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone"></i></span>
                                <input type="text" class="form-control" name="telCelCotitular" value="<?=$cotitular[0]['tel_celular_cotitular']?>" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Casa</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="text" class="form-control" name="telCasaCotitular" value="<?=$cotitular[0]['tel_casa_cotitular']?>" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Oficina</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="text" class="form-control" name="telOfiCotitular" value="<?=$cotitular[0]['tel_celular_cotitular']?>" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Otro</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="text" class="form-control" name="telOtroCotitular" value="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Email Personal Cotitular</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"> <i class="lni lni-envelope"></i></i></span>
                                <input type="email" name="emailPersonalCotitular" id="emailPersonalCotitular" class="form-control" value="<?=$cotitular[0]['email_cotitular']?>" placeholder="">
                            </div>
                        </div>

                        <h5 class="mb-1">Domicilio Actual</h5>
                        <p class="mb-4"></p>

                        <div class="col-12 col-lg-3">
                            <label for="estCivil" class="form-label">Estado/Mpio/Localidad</label>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="estadoCotitular" name="estadoCotitular" aria-label="Default select example">
                                <option value="<?=$cotitular[0]['fk_estado_cotitular']?>" selected><?=$cotitular[0]['nom_estado_cotitular']?></option>
                                <?php
                                $estados = ControladorClientes::ctrEstados();
                                foreach ($estados as $estado) { ?>
                                    <option value="<?= $estado['id_estado'] ?>"><?= $estado['nom_estado'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="municipioCotitular" name="municipioCotitular" aria-label="Default select example">
                                <option value="<?=$cotitular[0]['fk_municipio_cotitular']?>" selected><?=$cotitular[0]['desc_municipio_cotitular']?></option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="localidadCotitular" name="localidadCotitular" aria-label="Default select example">
                                <option value="<?=$cotitular[0]['fk_localidad_cotitular']?>" selected><?=$cotitular[0]['nom_localidad_cotitular']?></option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Calle</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="calleCotitular" value="<?=$cotitular[0]['calle_cotitular']?>" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Ext</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="noExtCotitular" value="<?=$cotitular[0]['num_ext_cotitular']?>" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Int</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="noIntCotitular" value="<?=$cotitular[0]['num_int_cotitular']?>" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Colonia</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="coloniaCotitular" value="<?=$cotitular[0]['colonia_cotitular']?>" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Ciudad</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                                <input type="text" class="form-control" name="ciudadCotitular" value="<?=$cotitular[0]['colonia_cotitular']?>" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">C.P</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="cpCotitular" value="<?=$cotitular[0]['cod_postal_cotitular']?>" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>

                    </div>

                    <button type="button" class="btn btn-secondary prev">Anterior</button>
                    <button type="button" class="btn btn-primary next">Siguiente</button>

                </div>

                <!-- Sección 6: Confirmación -->
                <div class="step d-none" id="step6">
                    <h5 class="mb-1">Documentación</h5>

                    <div class="container mt-4">
                    <div class="row">
    <!-- INE Anverso -->
    <div class="col-md-3 mb-4">
        <div class="document-card">
            <div class="document-icon" id="preview-INE-Anverso">
                <?= renderDocumentPreview($documentos['ine_anverso'], 'preview-INE-Anverso',$id_cliente) ?>
            </div>
            <div class="document-title">INE Anverso</div>
            <input type="file" name="ineAnverso" class="form-control mt-3" accept=".jpeg,.png,.jpg,.pdf" onchange="previewFile(this, 'preview-INE-Anverso')" />
        </div>
    </div>

    <!-- INE Reverso -->
    <div class="col-md-3 mb-4">
        <div class="document-card">
            <div class="document-icon" id="preview-INE-Reverso">
                <?= renderDocumentPreview($documentos['ine_reverso'], 'preview-INE-Reverso',$id_cliente) ?>
            </div>
            <div class="document-title">INE Reverso</div>
            <input type="file" name="ineReverso" class="form-control mt-3" accept=".jpeg,.png,.jpg,.pdf" onchange="previewFile(this, 'preview-INE-Reverso')" />
        </div>
    </div>

    <!-- Comprobante de Domicilio -->
    <div class="col-md-3 mb-4">
        <div class="document-card">
            <div class="document-icon" id="preview-Comprobante-Domicilio">
                <?= renderDocumentPreview($documentos['domicilio_img'], 'preview-Comprobante-Domicilio',$id_cliente) ?>
            </div>
            <div class="document-title">Comprobante de Domicilio</div>
            <input type="file" name="comprobanteDomicilio" class="form-control mt-3" accept=".jpeg,.png,.jpg,.pdf" onchange="previewFile(this, 'preview-Comprobante-Domicilio')" />
        </div>
    </div>

    <!-- CURP -->
    <div class="col-md-3 mb-4">
        <div class="document-card">
            <div class="document-icon" id="preview-CURP">
                <?= renderDocumentPreview($documentos['curp_img'], 'preview-CURP',$id_cliente) ?>
            </div>
            <div class="document-title">CURP</div>
            <input type="file" name="curpDoc" class="form-control mt-3" accept=".jpeg,.png,.jpg,.pdf" onchange="previewFile(this, 'preview-CURP')" />
        </div>
    </div>

    <!-- Estado de Cuenta -->
    <div class="col-md-3 mb-4">
        <div class="document-card">
            <div class="document-icon" id="preview-Estado-Cuenta">
                <?= renderDocumentPreview($documentos['edo_cuenta_img'], 'preview-Estado-Cuenta',$id_cliente) ?>
            </div>
            <div class="document-title">Estado de Cuenta</div>
            <input type="file" name="estadoCuenta" class="form-control mt-3" accept=".jpeg,.png,.jpg,.pdf" onchange="previewFile(this, 'preview-Estado-Cuenta')" />
        </div>
    </div>

    <!-- Constancia Fiscal -->
    <div class="col-md-3 mb-4">
        <div class="document-card">
            <div class="document-icon" id="preview-Constancia-Fiscal">
                <?= renderDocumentPreview($documentos['situacion_fiscal_img'], 'preview-Constancia-Fiscal',$id_cliente) ?>
            </div>
            <div class="document-title">Constancia Fiscal</div>
            <input type="file" name="constanciaFiscal" class="form-control mt-3" accept=".jpeg,.png,.jpg,.pdf" onchange="previewFile(this, 'preview-Constancia-Fiscal')" />
        </div>
    </div>

    <!-- Cuestionario de Inversionista -->
    <div class="col-md-3 mb-4">
        <div class="document-card">
            <div class="document-icon" id="preview-Cuestionario-Inversionista">
                <?= renderDocumentPreview($documentos['cuestionario_inver_img'], 'preview-Cuestionario-Inversionista',$id_cliente) ?>
            </div>
            <div class="document-title">Cuestionario de Inversionista</div>
            <input type="file" name="cuestionarioInversionista" class="form-control mt-3" accept=".jpeg,.png,.jpg,.pdf" onchange="previewFile(this, 'preview-Cuestionario-Inversionista')" />
        </div>
    </div>
</div>


                        <h2>Confirmación</h2>
                        <p>Por favor revisa tu información antes de enviar el formulario.</p>
                        <button type="button" class="btn btn-secondary prev">Anterior</button>
                        <button type="submit" class="btn btn-success">Finalizar</button>
                    </div>
            </form>
        </div>

        <script>
            // Navegación del formulario por etapas
            // Navegación del formulario por etapas
            document.addEventListener('DOMContentLoaded', function() {
                const steps = document.querySelectorAll('.step');
                let currentStep = 0;

                // Botón "Siguiente"
                document.querySelectorAll('.next').forEach(button => {
                    button.addEventListener('click', function() {
                        steps[currentStep].classList.add('d-none');
                        currentStep++;
                        steps[currentStep].classList.remove('d-none');
                    });
                });

                // Botón "Anterior"
                document.querySelectorAll('.prev').forEach(button => {
                    button.addEventListener('click', function() {
                        steps[currentStep].classList.add('d-none');
                        currentStep--;
                        steps[currentStep].classList.remove('d-none');
                    });
                });

                // Manejo del envío del formulario
                document.querySelector('#multiStepForm').addEventListener('submit', function(event) {
                    event.preventDefault(); // Evita el envío inmediato del formulario

                    Swal.fire({
                        title: 'Procesando...',
                        text: 'Por favor espera mientras procesamos la información.',
                        icon: 'info',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Simulación de procesamiento (opcional, solo para demostración)
                    setTimeout(() => {
                        Swal.close();
                        this.submit(); // Envía el formulario después de cerrar la alerta
                    }, 1000);
                });
            });

            $(document).ready(function() {
                $('#estado').on('change', function() {
                    var idEstado = $(this).val();
                    var municipioSelect = $('#municipio');

                    // Limpiar municipios anteriores
                    municipioSelect.html('<option value="" selected>---</option>');

                    if (idEstado) {
                        $.ajax({
                            url: 'ajax/clientes/perfil_cliente.php', // Cambia esta ruta a tu archivo PHP
                            type: 'POST',
                            data: {
                                id_estado: idEstado
                            },
                            dataType: 'json',
                            success: function(data) {
                                // Agregar los municipios al select
                                $.each(data, function(index, municipio) {
                                    municipioSelect.append(
                                        $('<option>', {
                                            value: municipio.clave_municipio,
                                            text: municipio.desc_municipio,
                                        })
                                    );
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                            },
                        });
                    }
                });
            });
            $(document).ready(function() {
                $('#estadoCotitular').on('change', function() {
                    var idEstado = $(this).val();
                    var municipioSelect = $('#municipioCotitular');

                    // Limpiar municipios anteriores
                    municipioSelect.html('<option value="" selected>---</option>');

                    if (idEstado) {
                        $.ajax({
                            url: 'ajax/clientes/perfil_cliente.php', // Cambia esta ruta a tu archivo PHP
                            type: 'POST',
                            data: {
                                id_estado: idEstado
                            },
                            dataType: 'json',
                            success: function(data) {
                                // Agregar los municipios al select
                                $.each(data, function(index, municipio) {
                                    municipioSelect.append(
                                        $('<option>', {
                                            value: municipio.clave_municipio,
                                            text: municipio.desc_municipio,
                                        })
                                    );
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                            },
                        });
                    }
                });
            });
            $(document).ready(function() {
                $('#estadoLaboral').on('change', function() {
                    var idEstado = $(this).val();
                    var municipioSelect = $('#municipioLaboral');

                    // Limpiar municipios anteriores
                    municipioSelect.html('<option value="" selected>---</option>');

                    if (idEstado) {
                        $.ajax({
                            url: 'ajax/clientes/perfil_cliente.php', // Cambia esta ruta a tu archivo PHP
                            type: 'POST',
                            data: {
                                id_estado: idEstado
                            },
                            dataType: 'json',
                            success: function(data) {
                                // Agregar los municipios al select
                                $.each(data, function(index, municipio) {
                                    municipioSelect.append(
                                        $('<option>', {
                                            value: municipio.clave_municipio,
                                            text: municipio.desc_municipio,
                                        })
                                    );
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                            },
                        });
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#municipio').on('change', function() {
                    var idMunicipio = $(this).val();
                    var localidadSelect = $('#localidad');

                    // Limpiar localidades anteriores
                    localidadSelect.html('<option value="" selected>---</option>');

                    if (idMunicipio) {
                        $.ajax({
                            url: 'ajax/clientes/perfil_cliente.php', // Cambia esta ruta a tu archivo PHP
                            type: 'POST',
                            data: {
                                id_municipio: idMunicipio
                            },
                            dataType: 'json',
                            success: function(data) {
                                // Agregar las localidades al select
                                $.each(data, function(index, localidad) {
                                    localidadSelect.append(
                                        $('<option>', {
                                            value: localidad.clave_localidad,
                                            text: localidad.nom_localidad,
                                        })
                                    );
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                            },
                        });
                    }
                });
            });
            $(document).ready(function() {
                $('#municipioCotitular').on('change', function() {
                    var idMunicipio = $(this).val();
                    var localidadSelect = $('#localidadCotitular');

                    // Limpiar localidades anteriores
                    localidadSelect.html('<option value="" selected>---</option>');

                    if (idMunicipio) {
                        $.ajax({
                            url: 'ajax/clientes/perfil_cliente.php', // Cambia esta ruta a tu archivo PHP
                            type: 'POST',
                            data: {
                                id_municipio: idMunicipio
                            },
                            dataType: 'json',
                            success: function(data) {
                                // Agregar las localidades al select
                                $.each(data, function(index, localidad) {
                                    localidadSelect.append(
                                        $('<option>', {
                                            value: localidad.clave_localidad,
                                            text: localidad.nom_localidad,
                                        })
                                    );
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                            },
                        });
                    }
                });
            });
            $(document).ready(function() {
                $('#municipioLaboral').on('change', function() {
                    var idMunicipio = $(this).val();
                    var localidadSelect = $('#localidadLaboral');

                    // Limpiar localidades anteriores
                    localidadSelect.html('<option value="" selected>---</option>');

                    if (idMunicipio) {
                        $.ajax({
                            url: 'ajax/clientes/perfil_cliente.php', // Cambia esta ruta a tu archivo PHP
                            type: 'POST',
                            data: {
                                id_municipio: idMunicipio
                            },
                            dataType: 'json',
                            success: function(data) {
                                // Agregar las localidades al select
                                $.each(data, function(index, localidad) {
                                    localidadSelect.append(
                                        $('<option>', {
                                            value: localidad.clave_localidad,
                                            text: localidad.nom_localidad,
                                        })
                                    );
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error:', error);
                            },
                        });
                    }
                });
            });
            let beneficiaryCounter = <?= count($beneficiarios); ?>;
            let totalPercentage = 0;

            // Calcular el porcentaje total inicial
            <?php if (!empty($beneficiarios)) : ?>
                <?php foreach ($beneficiarios as $beneficiario) : ?>
                    totalPercentage += parseFloat('<?= $beneficiario['porcentaje']; ?>') || 0;
                <?php endforeach; ?>
            <?php endif; ?>

            document.getElementById('addBeneficiaryButton').addEventListener('click', function() {
                const table = document.getElementById('beneficiaryTable');
                const tbody = table.querySelector('tbody');

                // Capturar valores de los inputs
                const nombre = document.getElementById('nombreBeneficiario').value.trim();
                const pApellido = document.getElementById('pApellidoBeneficiario').value.trim();
                const sApellido = document.getElementById('sApellidoBeneficiario').value.trim();
                const parentezco = document.getElementById('parentezco').value.trim();
                const porcentaje = document.getElementById('porcentajeBeneficiario').value.trim();
                const fechaNac = document.getElementById('fNacBen').value.trim();
                const telefono = document.getElementById('telBeneficiario').value.trim();
                const direccion = document.getElementById('dirBeneficiario').value.trim();

                if (!nombre || !pApellido || !sApellido || !parentezco || !porcentaje || !fechaNac || !telefono || !direccion) {
                    Swal.fire('Error', 'Todos los campos son obligatorios. Por favor, completa todos los campos.', 'error');
                    return;
                }

                if (isNaN(porcentaje) || porcentaje <= 0) {
                    Swal.fire('Error', 'El porcentaje debe ser un número mayor a 0.', 'error');
                    return;
                }

                const porcentajeFloat = parseFloat(porcentaje);
                if (totalPercentage + porcentajeFloat > 100) {
                    Swal.fire('Error', 'El porcentaje total no puede exceder el 100%.', 'error');
                    return;
                }

                totalPercentage += porcentajeFloat;
                beneficiaryCounter++;

                table.classList.remove('d-none');

                const newRow = document.createElement('tr');
                newRow.innerHTML = `
        <td>${beneficiaryCounter}</td>
        <td><input type="text" class="form-control" name="nombreBeneficiario[]" value="${nombre}" readonly></td>
        <td><input type="text" class="form-control" name="pApellidoBeneficiario[]" value="${pApellido}" readonly></td>
        <td><input type="text" class="form-control" name="sApellidoBeneficiario[]" value="${sApellido}" readonly></td>
        <td><input type="text" class="form-control" name="parentezco[]" value="${parentezco}" readonly></td>
        <td><input type="text" class="form-control" name="porcentajeBeneficiario[]" value="${porcentaje}" readonly></td>
        <td><input type="date" class="form-control" name="fNacBen[]" value="${fechaNac}" readonly></td>
        <td><input type="text" class="form-control" name="telBeneficiario[]" value="${telefono}" readonly></td>
        <td><input type="text" class="form-control" name="dirBeneficiario[]" value="${direccion}" readonly></td>
        <td><button type="button" class="btn btn-danger btn-sm removeBeneficiary">Eliminar</button></td>
    `;

                tbody.appendChild(newRow);

                if (totalPercentage === 100) {
                    Swal.fire('Información', 'El porcentaje total ha alcanzado el 100%.', 'success');
                }

                document.getElementById('nombreBeneficiario').value = '';
                document.getElementById('pApellidoBeneficiario').value = '';
                document.getElementById('sApellidoBeneficiario').value = '';
                document.getElementById('parentezco').value = '';
                document.getElementById('porcentajeBeneficiario').value = '';
                document.getElementById('fNacBen').value = '';
                document.getElementById('telBeneficiario').value = '';
                document.getElementById('dirBeneficiario').value = '';
            });

            document.getElementById('beneficiaryTable').addEventListener('click', function(event) {
                if (event.target.classList.contains('removeBeneficiary')) {
                    const row = event.target.closest('tr');
                    const porcentaje = parseFloat(row.querySelector('input[name="porcentajeBeneficiario[]"]').value);

                    totalPercentage -= porcentaje;

                    row.remove();

                    Swal.fire('Información', 'El beneficiario ha sido eliminado.', 'info');
                }
            });



            // Mostrar u ocultar los campos del cónyuge según el estado civil
            function toggleConyugeFields() {
                const estCivil = document.getElementById("estCivil").value;
                const conyugeFields = document.getElementById("conyugeFields");

                if (estCivil === "casado(a)") {
                    conyugeFields.style.display = "block";
                } else {
                    conyugeFields.style.display = "none";
                }
            }
        </script>


        <script>
            document.getElementById("nacionalidadPais").addEventListener("change", function() {
                const seleccion = this.value;
                const condicionMigratoriaDiv = document.getElementById("condicionMigratoriaDiv");

                if (seleccion !== "73" && seleccion !== "0") {
                    // Mostrar campo Condición Migratoria si no es México
                    condicionMigratoriaDiv.classList.remove("d-none");
                } else {
                    // Ocultar campo Condición Migratoria si es México o no se selecciona
                    condicionMigratoriaDiv.classList.add("d-none");
                }
            });
            document.getElementById("nacionalidadCotitular").addEventListener("change", function() {
                const seleccion = this.value;
                const condicionMigratoriaDiv = document.getElementById("condicionMigratoriaDivCotitular");

                if (seleccion !== "73" && seleccion !== "0") {
                    // Mostrar campo Condición Migratoria si no es México
                    condicionMigratoriaDiv.classList.remove("d-none");
                } else {
                    // Ocultar campo Condición Migratoria si es México o no se selecciona
                    condicionMigratoriaDiv.classList.add("d-none");
                }
            });


            document.getElementById("identificacionOficial").addEventListener("change", function() {
                const inputIdentificacion = document.getElementById("serieNoIdentificacion");
                const seleccion = this.value;

                // Restablecer restricciones y limpiar el campo
                inputIdentificacion.value = "";
                inputIdentificacion.removeAttribute("maxlength");

                switch (seleccion) {
                    case "CREDENCIAL PARA VOTAR":
                        inputIdentificacion.setAttribute("maxlength", "13");
                        inputIdentificacion.setAttribute("placeholder", "Ingrese 13 caracteres");
                        break;
                    case "PASAPORTE":
                        inputIdentificacion.setAttribute("maxlength", "9");
                        inputIdentificacion.setAttribute("placeholder", "Ingrese 9 caracteres");
                        break;
                    case "CEDULA":
                        inputIdentificacion.setAttribute("placeholder", "Número de Identificación libre");
                        break;
                    default:
                        inputIdentificacion.setAttribute("placeholder", "Número de Identificación");
                }
            });

            document.getElementById("serieNoIdentificacion").addEventListener("blur", function() {
                const seleccion = document.getElementById("identificacionOficial").value;
                const valor = this.value.trim();

                if (seleccion === "CREDENCIAL PARA VOTAR" && valor.length !== 13) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'El número de identificación para INE debe tener exactamente 13 caracteres.',
                        timer: 3000, // Tiempo en milisegundos antes de cerrar automáticamente
                        showConfirmButton: false // Ocultar botón de confirmación
                    });
                } else if (seleccion === "PASAPORTE" && valor.length !== 9) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'El número de identificación para Pasaporte debe tener exactamente 9 caracteres.',
                        timer: 3000, // Tiempo en milisegundos antes de cerrar automáticamente
                        showConfirmButton: false // Ocultar botón de confirmación
                    });
                }
            });
            document.getElementById("identificacionOficialCotitular").addEventListener("change", function() {
                const inputIdentificacion = document.getElementById("serieNoIdentificacionCotitular");
                const seleccion = this.value;

                // Restablecer restricciones y limpiar el campo
                inputIdentificacion.value = "";
                inputIdentificacion.removeAttribute("maxlength");

                switch (seleccion) {
                    case "CREDENCIAL PARA VOTAR":
                        inputIdentificacion.setAttribute("maxlength", "13");
                        inputIdentificacion.setAttribute("placeholder", "Ingrese 13 caracteres");
                        break;
                    case "PASAPORTE":
                        inputIdentificacion.setAttribute("maxlength", "9");
                        inputIdentificacion.setAttribute("placeholder", "Ingrese 9 caracteres");
                        break;
                    case "CEDULA":
                        inputIdentificacion.setAttribute("placeholder", "Número de Identificación libre");
                        break;
                    default:
                        inputIdentificacion.setAttribute("placeholder", "Número de Identificación");
                }
            });

            document.getElementById("serieNoIdentificacionCotitular").addEventListener("blur", function() {
                const seleccion = document.getElementById("identificacionOficialCotitular").value;
                const valor = this.value.trim();

                if (seleccion === "CREDENCIAL PARA VOTAR" && valor.length !== 13) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'El número de identificación para INE debe tener exactamente 13 caracteres.',
                        timer: 3000, // Tiempo en milisegundos antes de cerrar automáticamente
                        showConfirmButton: false // Ocultar botón de confirmación
                    });
                } else if (seleccion === "PASAPORTE" && valor.length !== 9) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'El número de identificación para Pasaporte debe tener exactamente 9 caracteres.',
                        timer: 3000, // Tiempo en milisegundos antes de cerrar automáticamente
                        showConfirmButton: false // Ocultar botón de confirmación
                    });
                }
            });



            document.getElementById('profesion').addEventListener('change', function() {
                const otraProfesionContainer = document.getElementById('otraProfesionContainer');
                if (this.value === 'otro') {
                    otraProfesionContainer.style.display = 'block';
                } else {
                    otraProfesionContainer.style.display = 'none';
                }
            });

            document.getElementById('condicionActiva').addEventListener('change', function() {
                const otraCondicionContainer = document.getElementById('otraCondicionContainer');
                const otraCondicionInput = document.getElementById('otraCondicion');

                if (this.value === 'otro') {
                    otraCondicionContainer.style.display = 'block';
                    otraCondicionInput.placeholder = 'Especificar';
                } else {
                    otraCondicionContainer.style.display = 'none';
                    otraCondicionInput.value = ''; // Limpiar valor si se oculta el campo
                }
            });

            document.getElementById('tipoEmpresa').addEventListener('change', function() {
                const otroTipoEmpresaContainer = document.getElementById('otroTipoEmpresaContainer');
                const otroTipoEmpresaInput = document.getElementById('otroTipoEmpresa');

                if (this.value === 'otra') {
                    otroTipoEmpresaContainer.style.display = 'block';
                    otroTipoEmpresaInput.placeholder = 'Especificar tipo de empresa';
                } else {
                    otroTipoEmpresaContainer.style.display = 'none';
                    otroTipoEmpresaInput.value = ''; // Limpiar el valor si se oculta el campo
                }
            });

            document.getElementById('profesion').addEventListener('change', function() {
                if (this.value === 'jubilado') {
                    // Campos de texto
                    const textFields = [
                        'otraProfesion',
                        'ocupacion',
                        'puesto',
                        'nombreEmpresa',
                        'InputEmail2',
                        'InputConfirmPassword',
                        'calleEmpresa',
                        'colEmpresa',
                        'ciudadEmpresa',
                        'cpEmpresa',
                        'otraCondicion'
                    ];

                    textFields.forEach(id => {
                        const element = document.getElementById(id);
                        if (element) element.value = 'N/A';
                    });

                    // Campos de select
                    const selectFields = [
                        'condicionActiva',
                        'tipoEmpresa',
                        'ingresoProvinientes'

                    ];

                    selectFields.forEach(id => {
                        const element = document.getElementById(id);
                        if (element) element.value = '';
                    });

                    // Campos numéricos
                    const numberFields = [
                        'nextEmpresa',
                        'nintEmpresa',
                        'ingresoMensual',
                        'estadoLaboral',
                        'municipioLaboral',
                        'localidadLaboral'
                    ];

                    numberFields.forEach(id => {
                        const element = document.getElementById(id);
                        if (element) element.value = 0;
                    });
                }
            });

            function toggleInputs() {
                const select = document.getElementById("recursosProvienen").value;
                const recursosPropiosInputs = document.getElementById("recursosPropiosInputs");
                const recursosTercerosInputs = document.getElementById("recursosTercerosInputs");

                // Oculta todos los campos al inicio
                recursosPropiosInputs.style.display = "none";
                recursosTercerosInputs.style.display = "none";

                // Muestra los campos según la opción seleccionada
                if (select === "RECURSOS PROPIOS") {
                    recursosPropiosInputs.style.display = "flex";
                } else if (select === "RECURSOS DE TERCEROS") {
                    recursosTercerosInputs.style.display = "block";
                } else if (select === "AMBOS") {
                    recursosPropiosInputs.style.display = "flex";
                    recursosTercerosInputs.style.display = "block";
                }
            }

            document.getElementById("agregarTercero").addEventListener("click", function() {
                const nombre = document.getElementById("nombreTercero").value.trim();
                const apellidoPaterno = document.getElementById("apellidoPaternoTercero").value.trim();
                const apellidoMaterno = document.getElementById("apellidoMaternoTercero").value.trim();
                const personalidadJuridica = document.getElementById("personalidadJuridicaTercero").value.trim();
                const porcentaje = parseFloat(document.getElementById("porcentajeTerceros").value.trim());
                const tipoIdentificacion = document.getElementById("tipoIdentificacionTercero").value.trim();
                const numeroIdentificacion = document.getElementById("numeroIdentificacionTercero").value.trim();
                const nacionalidad = document.getElementById("nacionalidadTercero").value.trim();

                if (!nombre || !apellidoPaterno || !apellidoMaterno || !personalidadJuridica || isNaN(porcentaje) || !tipoIdentificacion || !numeroIdentificacion || !nacionalidad) {
                    alert("Por favor, complete todos los campos antes de agregar un tercero.");
                    return;
                }

                const totalPorcentaje = calcularTotalPorcentaje();
                if (totalPorcentaje + porcentaje > 100) {
                    alert("El total del porcentaje no puede exceder el 100%.");
                    return;
                }

                const nuevaFila = `
        <tr>
            <td><input type="text" name="nombreBeneficiariosTerceros[]" class="form-control" value="${nombre}" readonly></td>
            <td><input type="text" name="apellidoPaternosTerceros[]" class="form-control" value="${apellidoPaterno}" readonly></td>
            <td><input type="text" name="apellidoMaternosTerceros[]" class="form-control" value="${apellidoMaterno}" readonly></td>
            <td><input type="text" name="personalidadesJuridicasTerceros[]" class="form-control" value="${personalidadJuridica}" readonly></td>
            <td><input type="number" name="porcentajesTerceros[]" class="form-control" value="${porcentaje}" readonly></td>
            <td><input type="text" name="tipoIdentificacionTerceros[]" class="form-control" value="${tipoIdentificacion}" readonly></td>
            <td><input type="text" name="numeroIdentificacionTerceros[]" class="form-control" value="${numeroIdentificacion}" readonly></td>
            <td><input type="text" name="nacionalidadesTerceros[]" class="form-control" value="${nacionalidad}" readonly></td>
            <td><button type="button" class="btn btn-danger btn-sm eliminarTercero">Eliminar</button></td>
        </tr>
    `;

                document.querySelector("#tablaTerceros tbody").insertAdjacentHTML("beforeend", nuevaFila);
                actualizarTotalPorcentaje();

                document.getElementById("nombreTercero").value = "";
                document.getElementById("apellidoPaternoTercero").value = "";
                document.getElementById("apellidoMaternoTercero").value = "";
                document.getElementById("personalidadJuridicaTercero").value = "";
                document.getElementById("porcentajeTerceros").value = "";
                document.getElementById("tipoIdentificacionTercero").value = "";
                document.getElementById("numeroIdentificacionTercero").value = "";
                document.getElementById("nacionalidadTercero").value = "";
            });

            document.querySelector("#tablaTerceros tbody").addEventListener("click", function(e) {
                if (e.target.classList.contains("eliminarTercero")) {
                    e.target.closest("tr").remove();
                    actualizarTotalPorcentaje();
                }
            });

            function calcularTotalPorcentaje() {
                let total = 0;
                document.querySelectorAll("input[name='porcentajesTerceros[]']").forEach(function(input) {
                    total += parseFloat(input.value);
                });
                return total;
            }

            function actualizarTotalPorcentaje() {
                const total = calcularTotalPorcentaje();
                document.getElementById("totalPorcentaje").innerText = `${total}%`;

                const barraProgreso = document.getElementById("barraProgreso");
                barraProgreso.style.width = `${total}%`;
                barraProgreso.setAttribute("aria-valuenow", total);

                const mensaje = document.getElementById("mensajePorcentaje");
                if (total < 100) {
                    mensaje.textContent = "El porcentaje total aún no llega al 100%.";
                    mensaje.classList.remove("text-success");
                    mensaje.classList.add("text-danger");
                } else if (total === 100) {
                    mensaje.textContent = "¡El porcentaje total es 100%! Todo está correcto.";
                    mensaje.classList.remove("text-danger");
                    mensaje.classList.add("text-success");
                } else {
                    mensaje.textContent = "El porcentaje total excede el 100%. Corrige los valores.";
                    mensaje.classList.remove("text-success");
                    mensaje.classList.add("text-danger");
                }
            }

            function previewFile(input, previewId) {
                const file = input.files[0];
                const preview = document.getElementById(previewId);

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        if (file.type.includes("image")) {
                            preview.innerHTML = `<img src="${e.target.result}" alt="Preview" style="max-width: 100%; max-height: 150px;" />`;
                        } else if (file.type.includes("pdf")) {
                            preview.innerHTML = `
                    <iframe src="${e.target.result}" style="width: 100%; height: 150px;" frameborder="0"></iframe>
                `;
                        } else {
                            preview.innerHTML = "Formato no soportado";
                        }
                    };

                    reader.readAsDataURL(file);
                } else {
                    preview.innerHTML = "📇";
                }
            }
        </script>