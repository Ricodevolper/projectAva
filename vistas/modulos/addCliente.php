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

<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Añadir Cliente</div>
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

            <form action="saveClientes" method="POST" id="multiStepForm">

                <!-- Sección 1: Información Básica -->
                <div class="step" id="step1">
                    <h5 class="mb-1">Datos Generales</h5>
                    <p class="mb-4"></p>





                    <div class="row g-3">
                        <div class="col-12 col-lg-4">
                            <label for="FisrtName" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe Nombre" value="" required>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="LastName" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Primer Apellido" value="" required>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="LastName" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Segundo Apellido" value="" required>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="PhoneNumber" class="form-label">Curp</label>
                            <input type="text" class="form-control" id="curp" name="curp" placeholder="Curp" value="" required>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="InputCountry" class="form-label">Identificación Oficial</label>
                            <select class="form-select" id="identificacionOficial" name="identificacionOficial" aria-label="Default select example">
                                <option value="" selected>---</option>
                                <option value="CREDENCIAL PARA VOTAR">Ine</option>
                                <option value="PASAPORTE">Pasaporte</option>
                                <option value="CEDULA PROFESIONAL">Cedula Profesional</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="serieNoIdentificacion" class="form-label">Número de Identificación</label>
                            <input type="text" class="form-control" id="serieNoIdentificacion" name="serieNoIdentificacion" value="" placeholder="Número de Identificación">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="Genero" class="form-label">Género</label>
                            <select class="form-select" id="genero" name="genero" aria-label="Default select example">
                                <option value="" selected>---</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>

                            </select>
                        </div>
                      
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">RFC</label>
                            <input type="text" class="form-control" id="rfc" value="" name="rfc" placeholder="Escribe">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="fNac" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control  " id="fNac" value="" name="fNac" placeholder="Ingresa Fecha de Nacimiento">
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="religion" class="form-label">Religión</label>
                            <input type="text" class="form-control" id="religion" value="" name="religion" placeholder="Ingresa Religión">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="paisNac" class="form-label">Pais de Nacimiento</label>
                            <select class="form-select" id="paisNac" name="paisNac" value="" aria-label="Default select example">
                                <option selected>---</option>
                                <option value="1">Afganistán</option>
                                <option value="2">Albania</option>
                                <option value="3">Alemania</option>
                                <option value="4">Andorra</option>
                                <option value="5">Angola</option>
                                <option value="6">Antigua y Barbuda</option>
                                <option value="7">Arabia Saudita</option>
                                <option value="8">Argelia</option>
                                <option value="9">Argentina</option>
                                <option value="10">Armenia</option>
                                <option value="11">Australia</option>
                                <option value="12">Austria</option>
                                <option value="13">Azerbaiyán</option>
                                <option value="14">Bahamas</option>
                                <option value="15">Bangladés</option>
                                <option value="16">Barbados</option>
                                <option value="17">Baréin</option>
                                <option value="18">Bélgica</option>
                                <option value="19">Belice</option>
                                <option value="20">Benín</option>
                                <option value="21">Bermuda</option>
                                <option value="22">Bielorrusia</option>
                                <option value="23">Bolivia</option>
                                <option value="24">Bosnia-Herzegovina</option>
                                <option value="25">Botsuana</option>
                                <option value="26">Brasil</option>
                                <option value="27">Brunéi</option>
                                <option value="28">Bulgaria</option>
                                <option value="29">Burkina Faso</option>
                                <option value="30">Burundi</option>
                                <option value="31">Bután</option>
                                <option value="32">Cabo Verde</option>
                                <option value="33">Camboya</option>
                                <option value="34">Camerún</option>
                                <option value="35">Canadá</option>
                                <option value="36">Catar</option>
                                <option value="37">Chad</option>
                                <option value="38">Chile</option>
                                <option value="39">China</option>
                                <option value="40">Chipre</option>
                                <option value="41">Colombia</option>
                                <option value="42">Comoras</option>
                                <option value="43">Congo, República Democrática del</option>
                                <option value="44">Congo, República de</option>
                                <option value="45">Corea del Norte</option>
                                <option value="46">Corea del Sur</option>
                                <option value="47">Costa de Marfil</option>
                                <option value="48">Costa Rica</option>
                                <option value="49">Croacia</option>
                                <option value="50">Cuba</option>
                                <option value="51">Curazao</option>
                                <option value="52">Dinamarca</option>
                                <option value="53">Djibouti</option>
                                <option value="54">Dominica</option>
                                <option value="55">Ecuador</option>
                                <option value="56">Egipto</option>
                                <option value="57">El Salvador</option>
                                <option value="58">Emiratos Árabes Unidos</option>
                                <option value="59">Eritrea</option>
                                <option value="60">Eslovaquia</option>
                                <option value="61">Eslovenia</option>
                                <option value="62">España</option>
                                <option value="63">Estados Unidos</option>
                                <option value="64">Estonia</option>
                                <option value="65">Etiopía</option>
                                <option value="66">Filipinas</option>
                                <option value="67">Finlandia</option>
                                <option value="68">Fiyi</option>
                                <option value="69">Francia</option>
                                <option value="70">Gabón</option>
                                <option value="71">Gambia</option>
                                <option value="72">Georgia</option>
                                <option value="73">Ghana</option>
                                <option value="74">Granada</option>
                                <option value="75">Grecia</option>
                                <option value="76">Groenlandia</option>
                                <option value="77">Guam</option>
                                <option value="78">Guatemala</option>
                                <option value="79">Guinea</option>
                                <option value="80">Guinea Ecuatorial</option>
                                <option value="81">Guinea-Bisáu</option>
                                <option value="82">Guyana</option>
                                <option value="83">Haití</option>
                                <option value="84">Honduras</option>
                                <option value="85">Hong Kong</option>
                                <option value="86">Hungría</option>
                                <option value="87">India</option>
                                <option value="88">Indonesia</option>
                                <option value="89">Irak</option>
                                <option value="90">Irán</option>
                                <option value="91">Irlanda</option>
                                <option value="92">Islandia</option>
                                <option value="93">Islas Caimán</option>
                                <option value="94">Islas Feroe</option>
                                <option value="95">Islas Marianas del Norte</option>
                                <option value="96">Islas Marshall</option>
                                <option value="97">Islas Salomón</option>
                                <option value="98">Islas Vírgenes Británicas</option>
                                <option value="99">Islas Vírgenes de los Estados Unidos</option>
                                <option value="100">Israel</option>
                                <option value="101">Italia</option>
                                <option value="102">Jamaica</option>
                                <option value="103">Japón</option>
                                <option value="104">Jordania</option>
                                <option value="105">Kazajistán</option>
                                <option value="106">Kenia</option>
                                <option value="107">Kirguistán</option>
                                <option value="108">Kiribati</option>
                                <option value="109">Kosovo</option>
                                <option value="110">Kuwait</option>
                                <option value="111">Laos</option>
                                <option value="112">Lesoto</option>
                                <option value="113">Letonia</option>
                                <option value="114">Líbano</option>
                                <option value="115">Liberia</option>
                                <option value="116">Libia</option>
                                <option value="117">Liechtenstein</option>
                                <option value="118">Lituania</option>
                                <option value="119">Luxemburgo</option>
                                <option value="120">Macedonia</option>
                                <option value="121">Madagascar</option>
                                <option value="122">Malasia</option>
                                <option value="123">Malaui</option>
                                <option value="124">Maldivas</option>
                                <option value="125">Malí</option>
                                <option value="126">Malta</option>
                                <option value="127">Marruecos</option>
                                <option value="128">Mauricio</option>
                                <option value="129">Mauritania</option>
                                <option value="130">México</option>
                                <option value="131">Micronesia</option>
                                <option value="132">Moldavia</option>
                                <option value="133">Mónaco</option>
                                <option value="134">Mongolia</option>
                                <option value="135">Montenegro</option>
                                <option value="136">Mozambique</option>
                                <option value="137">Myanmar (Birmania)</option>
                                <option value="138">Namibia</option>
                                <option value="139">Nauru</option>
                                <option value="140">Nepal</option>
                                <option value="141">Nicaragua</option>
                                <option value="142">Níger</option>
                                <option value="143">Nigeria</option>
                                <option value="144">Noruega</option>
                                <option value="145">Nueva Zelanda</option>
                                <option value="146">Omán</option>
                                <option value="147">Países Bajos</option>
                                <option value="148">Pakistán</option>
                                <option value="149">Palaos</option>
                                <option value="150">Panamá</option>
                                <option value="151">Papúa Nueva Guinea</option>
                                <option value="152">Paraguay</option>
                                <option value="153">Perú</option>
                                <option value="154">Polonia</option>
                                <option value="155">Portugal</option>
                                <option value="156">Puerto Rico</option>
                                <option value="157">Reino Unido</option>
                                <option value="158">República Centroafricana</option>
                                <option value="159">República Checa</option>
                                <option value="160">República Dominicana</option>
                                <option value="161">Ruanda</option>
                                <option value="162">Rumania</option>
                                <option value="163">Rusia</option>
                                <option value="164">Samoa</option>
                                <option value="165">San Cristóbal y Nieves</option>
                                <option value="166">San Marino</option>
                                <option value="167">San Vicente y las Granadinas</option>
                                <option value="168">Santa Lucía</option>
                                <option value="169">Santo Tomé y Príncipe</option>
                                <option value="170">Senegal</option>
                                <option value="171">Serbia</option>
                                <option value="172">Seychelles</option>
                                <option value="173">Sierra Leona</option>
                                <option value="174">Singapur</option>
                                <option value="175">Siria</option>
                                <option value="176">Somalia</option>
                                <option value="177">Sri Lanka</option>
                                <option value="178">Sudáfrica</option>
                                <option value="179">Sudán</option>
                                <option value="180">Sudán del Sur</option>
                                <option value="181">Suecia</option>
                                <option value="182">Suiza</option>
                                <option value="183">Surinam</option>
                                <option value="184">Tailandia</option>
                                <option value="185">Tanzania</option>
                                <option value="186">Tayikistán</option>
                                <option value="187">Timor Oriental</option>
                                <option value="188">Togo</option>
                                <option value="189">Tonga</option>
                                <option value="190">Trinidad y Tobago</option>
                                <option value="191">Túnez</option>
                                <option value="192">Turkmenistán</option>
                                <option value="193">Turquía</option>
                                <option value="194">Tuvalu</option>
                                <option value="195">Ucrania</option>
                                <option value="196">Uganda</option>
                                <option value="197">Uruguay</option>
                                <option value="198">Uzbekistán</option>
                                <option value="199">Vanuatu</option>
                                <option value="200">Vaticano</option>
                                <option value="201">Venezuela</option>
                                <option value="202">Vietnam</option>
                                <option value="203">Yemen</option>
                                <option value="204">Yibuti</option>
                                <option value="205">Zambia</option>
                                <option value="206">Zimbabue</option>


                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                            <select class="form-select" id="nacionalidadPais" name="nacionalidadPais" value="0" aria-label="Default select example">
                                <option selected>---</option>
                                <option value="1">Afganistán</option>
                                <option value="2">Albania</option>
                                <option value="3">Alemania</option>
                                <option value="4">Andorra</option>
                                <option value="5">Angola</option>
                                <option value="6">Antigua y Barbuda</option>
                                <option value="7">Arabia Saudita</option>
                                <option value="8">Argelia</option>
                                <option value="9">Argentina</option>
                                <option value="10">Armenia</option>
                                <option value="11">Australia</option>
                                <option value="12">Austria</option>
                                <option value="13">Azerbaiyán</option>
                                <option value="14">Bahamas</option>
                                <option value="15">Bangladés</option>
                                <option value="16">Barbados</option>
                                <option value="17">Baréin</option>
                                <option value="18">Bélgica</option>
                                <option value="19">Belice</option>
                                <option value="20">Benín</option>
                                <option value="21">Bermuda</option>
                                <option value="22">Bielorrusia</option>
                                <option value="23">Bolivia</option>
                                <option value="24">Bosnia-Herzegovina</option>
                                <option value="25">Botsuana</option>
                                <option value="26">Brasil</option>
                                <option value="27">Brunéi</option>
                                <option value="28">Bulgaria</option>
                                <option value="29">Burkina Faso</option>
                                <option value="30">Burundi</option>
                                <option value="31">Bután</option>
                                <option value="32">Cabo Verde</option>
                                <option value="33">Camboya</option>
                                <option value="34">Camerún</option>
                                <option value="35">Canadá</option>
                                <option value="36">Catar</option>
                                <option value="37">Chad</option>
                                <option value="38">Chile</option>
                                <option value="39">China</option>
                                <option value="40">Chipre</option>
                                <option value="41">Colombia</option>
                                <option value="42">Comoras</option>
                                <option value="43">Congo, República Democrática del</option>
                                <option value="44">Congo, República de</option>
                                <option value="45">Corea del Norte</option>
                                <option value="46">Corea del Sur</option>
                                <option value="47">Costa de Marfil</option>
                                <option value="48">Costa Rica</option>
                                <option value="49">Croacia</option>
                                <option value="50">Cuba</option>
                                <option value="51">Curazao</option>
                                <option value="52">Dinamarca</option>
                                <option value="53">Djibouti</option>
                                <option value="54">Dominica</option>
                                <option value="55">Ecuador</option>
                                <option value="56">Egipto</option>
                                <option value="57">El Salvador</option>
                                <option value="58">Emiratos Árabes Unidos</option>
                                <option value="59">Eritrea</option>
                                <option value="60">Eslovaquia</option>
                                <option value="61">Eslovenia</option>
                                <option value="62">España</option>
                                <option value="63">Estados Unidos</option>
                                <option value="64">Estonia</option>
                                <option value="65">Etiopía</option>
                                <option value="66">Filipinas</option>
                                <option value="67">Finlandia</option>
                                <option value="68">Fiyi</option>
                                <option value="69">Francia</option>
                                <option value="70">Gabón</option>
                                <option value="71">Gambia</option>
                                <option value="72">Georgia</option>
                                <option value="73">Ghana</option>
                                <option value="74">Granada</option>
                                <option value="75">Grecia</option>
                                <option value="76">Groenlandia</option>
                                <option value="77">Guam</option>
                                <option value="78">Guatemala</option>
                                <option value="79">Guinea</option>
                                <option value="80">Guinea Ecuatorial</option>
                                <option value="81">Guinea-Bisáu</option>
                                <option value="82">Guyana</option>
                                <option value="83">Haití</option>
                                <option value="84">Honduras</option>
                                <option value="85">Hong Kong</option>
                                <option value="86">Hungría</option>
                                <option value="87">India</option>
                                <option value="88">Indonesia</option>
                                <option value="89">Irak</option>
                                <option value="90">Irán</option>
                                <option value="91">Irlanda</option>
                                <option value="92">Islandia</option>
                                <option value="93">Islas Caimán</option>
                                <option value="94">Islas Feroe</option>
                                <option value="95">Islas Marianas del Norte</option>
                                <option value="96">Islas Marshall</option>
                                <option value="97">Islas Salomón</option>
                                <option value="98">Islas Vírgenes Británicas</option>
                                <option value="99">Islas Vírgenes de los Estados Unidos</option>
                                <option value="100">Israel</option>
                                <option value="101">Italia</option>
                                <option value="102">Jamaica</option>
                                <option value="103">Japón</option>
                                <option value="104">Jordania</option>
                                <option value="105">Kazajistán</option>
                                <option value="106">Kenia</option>
                                <option value="107">Kirguistán</option>
                                <option value="108">Kiribati</option>
                                <option value="109">Kosovo</option>
                                <option value="110">Kuwait</option>
                                <option value="111">Laos</option>
                                <option value="112">Lesoto</option>
                                <option value="113">Letonia</option>
                                <option value="114">Líbano</option>
                                <option value="115">Liberia</option>
                                <option value="116">Libia</option>
                                <option value="117">Liechtenstein</option>
                                <option value="118">Lituania</option>
                                <option value="119">Luxemburgo</option>
                                <option value="120">Macedonia</option>
                                <option value="121">Madagascar</option>
                                <option value="122">Malasia</option>
                                <option value="123">Malaui</option>
                                <option value="124">Maldivas</option>
                                <option value="125">Malí</option>
                                <option value="126">Malta</option>
                                <option value="127">Marruecos</option>
                                <option value="128">Mauricio</option>
                                <option value="129">Mauritania</option>
                                <option value="130">México</option>
                                <option value="131">Micronesia</option>
                                <option value="132">Moldavia</option>
                                <option value="133">Mónaco</option>
                                <option value="134">Mongolia</option>
                                <option value="135">Montenegro</option>
                                <option value="136">Mozambique</option>
                                <option value="137">Myanmar (Birmania)</option>
                                <option value="138">Namibia</option>
                                <option value="139">Nauru</option>
                                <option value="140">Nepal</option>
                                <option value="141">Nicaragua</option>
                                <option value="142">Níger</option>
                                <option value="143">Nigeria</option>
                                <option value="144">Noruega</option>
                                <option value="145">Nueva Zelanda</option>
                                <option value="146">Omán</option>
                                <option value="147">Países Bajos</option>
                                <option value="148">Pakistán</option>
                                <option value="149">Palaos</option>
                                <option value="150">Panamá</option>
                                <option value="151">Papúa Nueva Guinea</option>
                                <option value="152">Paraguay</option>
                                <option value="153">Perú</option>
                                <option value="154">Polonia</option>
                                <option value="155">Portugal</option>
                                <option value="156">Puerto Rico</option>
                                <option value="157">Reino Unido</option>
                                <option value="158">República Centroafricana</option>
                                <option value="159">República Checa</option>
                                <option value="160">República Dominicana</option>
                                <option value="161">Ruanda</option>
                                <option value="162">Rumania</option>
                                <option value="163">Rusia</option>
                                <option value="164">Samoa</option>
                                <option value="165">San Cristóbal y Nieves</option>
                                <option value="166">San Marino</option>
                                <option value="167">San Vicente y las Granadinas</option>
                                <option value="168">Santa Lucía</option>
                                <option value="169">Santo Tomé y Príncipe</option>
                                <option value="170">Senegal</option>
                                <option value="171">Serbia</option>
                                <option value="172">Seychelles</option>
                                <option value="173">Sierra Leona</option>
                                <option value="174">Singapur</option>
                                <option value="175">Siria</option>
                                <option value="176">Somalia</option>
                                <option value="177">Sri Lanka</option>
                                <option value="178">Sudáfrica</option>
                                <option value="179">Sudán</option>
                                <option value="180">Sudán del Sur</option>
                                <option value="181">Suecia</option>
                                <option value="182">Suiza</option>
                                <option value="183">Surinam</option>
                                <option value="184">Tailandia</option>
                                <option value="185">Tanzania</option>
                                <option value="186">Tayikistán</option>
                                <option value="187">Timor Oriental</option>
                                <option value="188">Togo</option>
                                <option value="189">Tonga</option>
                                <option value="190">Trinidad y Tobago</option>
                                <option value="191">Túnez</option>
                                <option value="192">Turkmenistán</option>
                                <option value="193">Turquía</option>
                                <option value="194">Tuvalu</option>
                                <option value="195">Ucrania</option>
                                <option value="196">Uganda</option>
                                <option value="197">Uruguay</option>
                                <option value="198">Uzbekistán</option>
                                <option value="199">Vanuatu</option>
                                <option value="200">Vaticano</option>
                                <option value="201">Venezuela</option>
                                <option value="202">Vietnam</option>
                                <option value="203">Yemen</option>
                                <option value="204">Yibuti</option>
                                <option value="205">Zambia</option>
                                <option value="206">Zimbabue</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4 mt-3" id="condicionMigratoriaDiv" style="display: d-none;">
                            <label for="condicionMigratoria" class="form-label">Condición Migratoria</label>
                            <select class="form-select" id="condicionMigratoria" name="condicionMigratoria">
                                <option   value="" selected>---</option>
                                <option value="Residente Temporal">Residente Temporal</option>
                                <option value="Residente Permanente">Residente Permanente</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="estCivil" class="form-label">Estado Civil</label>
                            <select class="form-select" id="estCivil" name="estCivil" aria-label="Default select example" onchange="toggleConyugeFields()">
                                <option value="" selected>---</option>
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
                                    <input type="text" class="form-control" id="nombreConyuge" name="nombreConyuge" value="" placeholder="Nombre Completo">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="primerApellidoConyuge" class="form-label">Primer Apellido Cónyuge</label>
                                    <input type="text" class="form-control" id="primerApellidoConyuge" name="primerApellidoConyuge" value="" placeholder="Primer Apellido">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="segundoApellidoConyuge" class="form-label">Segundo Apellido Cónyuge</label>
                                    <input type="text" class="form-control" id="segundoApellidoConyuge" name="segundoApellidoConyuge" value="" placeholder="Segundo Apellido">
                                </div>

                                <div class="col-12 col-lg-4">
                                    <label for="numeroHijos" class="form-label">Número de Hijos</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="iconoNumeroHijos">#</span>
                                        <input type="number" class="form-control" id="numeroHijos" name="numeroHijos"  value="0" placeholder="Número Hijos" aria-describedby="iconoNumeroHijos">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <label for="numeroDependientes" class="form-label">Núm. Dep. Económicos</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="iconoDependientes">#</span>
                                        <input type="number" class="form-control" id="numeroDependientes" value="0" name="numeroDependientes" placeholder="Número Dependientes" aria-describedby="iconoDependientes">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Celular</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone"></i></span>
                                <input type="number" name="telCelular" class="form-control" value="0" placeholder="" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Casa</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="number" class="form-control" name="telCasa" value="" placeholder="" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Oficina</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="number" class="form-control" placeholder="" name="telOfici" value="" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Otro</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="number" class="form-control" placeholder="" name="telOtro" value="" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Email Personal</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"> <i class="lni lni-envelope"></i></i></span>
                                <input type="email" name="emailPersonal" class="form-control" value="" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Email Trabajo</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"> <i class="lni lni-envelope"></i></span>
                                <input type="email" name="emailTrabajo" class="form-control" value="" placeholder="">
                            </div>
                        </div>

                        <h5 class="mb-1">Domicilio Actual</h5>
                        <p class="mb-4"></p>

                        <div class="col-12 col-lg-3">
                            <label for="estCivil" class="form-label">Estado/Mpio/Localidad</label>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="estado" name="estadoDom" aria-label="Default select example">
                                <option value="" selected>---</option>
                                <?php
                                $estados = ControladorClientes::ctrEstados();
                                foreach ($estados as $estado) { ?>
                                    <option value="<?= $estado['id_estado'] ?>"><?= $estado['nom_estado'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="municipio" name="municipioDom" aria-label="Default select example">
                                <option value="" selected>---</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="localidad" name="localidadDom" aria-label="Default select example">
                                <option value="" selected>---</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Calle</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" name="calle" value="" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Ext</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" placeholder="" name="noExt" value="0">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Int</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" name="noInt" class="form-control" placeholder="" value="0">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Colonia</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" name="colonia" class="form-control" placeholder=""value="" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Ciudad</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                                <input type="text" name="ciudad" class="form-control" placeholder=""value="" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">C.P</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" name="cp" class="form-control" placeholder="" value="" >
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
                                <option value="" selected>---</option>
                                <option value="empleado">Empleado</option>
                                <option value="empresario">Empresario</option>
                                <option value="inversionista">Inversionista</option>
                                <option value="jubilado">Jubilado</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="InputEmail2" class="form-label">Ocupación</label>
                            <input type="text" name="ocupacion" value="" class="form-control" id="InputEmail2" placeholder="example@xyz.com">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="InputEmail2" class="form-label">Puesto</label>
                            <input type="text" name="puesto" value="" class="form-control" id="InputEmail2" placeholder="example@xyz.com">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="InputPassword" class="form-label">Condición de Actividad</label>
                            <select class="form-select" id="condicionActiva" name="condicionActiva" aria-label="Default select example">
                                <option value="" selected>---</option>
                                <option value="asalariado">Asalariado</option>
                                <option value="independiente">Independiente</option>
                                <option value="jubilado">Jubilado</option>
                                <option value="socio">Socio</option>
                                <option value="estudiante">Estudiante</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="InputConfirmPassword" class="form-label">Nombre de Empresa</label>
                            <input type="text" class="form-control" name="nombreEmpresa" value="" id="InputConfirmPassword" value="">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="InputConfirmPassword" class="form-label">Tipo de Empresa</label>
                            <select class="form-select" id="tipoEmpresa" name="tipoEmpresa" aria-label="Default select example">
                                <option value="" selected>---</option>
                                <option value="publica">Publica</option>
                                <option value="privada">Privada</option>
                                <option value="asociacionCivil">Asociación Civil</option>
                                <option value="otra">Otra</option>
                            </select>
                        </div>

                        <h5 class="mb-1">Domicilio Laboral</h5>
                        <p class="mb-4"></p>

                        <div class="col-12 col-lg-3">
                            <label for="estCivil" class="form-label">Estado/Mpio/Localidad</label>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="estadoLaboral" name="estadoLaboral" aria-label="Default select example">
                                <option value="" selected>---</option>
                                <?php
                                $estados = ControladorClientes::ctrEstados();
                                foreach ($estados as $estado) { ?>
                                    <option value="<?= $estado['id_estado'] ?>"><?= $estado['nom_estado'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="municipioLaboral" name="municipioLaboral" aria-label="Default select example">
                                <option value="" selected>---</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="localidadLaboral" name="localidadLaboral" aria-label="Default select example">
                                <option value="" selected>---</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Calle</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="calleEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Ext</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="nextEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Int</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="nintEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Colonia</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="colEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Ciudad</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                                <input type="text" class="form-control" name="ciudadEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">C.P</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="cpEmpresa" aria-label="Username" aria-describedby="basic-addon1" value="">
                            </div>



                        </div>
                        <h5 class="mb-1">Ingresos</h5>
                        <p class="mb-4"></p>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Ingresos Mensual Promedio</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-coin"></i></span>
                                <input type="text" class="form-control" name="ingresoMensual" aria-label="Username" aria-describedby="basic-addon1" value="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Ingresos Provenientes de:</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-coin"></i></span>
                                <select class="form-select" id="ingresoProvinientes" name="ingresoProvinientes" aria-label="Default select example" >
                                    <option value="" selected>---</option>
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
                            <input type="text" class="form-control" id="nombreBeneficiario" name="nombreBeneficiario" placeholder="" value="" >
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="pApellidoBeneficiario" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="pApellidoBeneficiario" name="pApellidoBeneficiario" placeholder="" value="" >
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="sApellidoBeneficiario" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="sApellidoBeneficiario" name="sApellidoBeneficiario" placeholder="" value="" >
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
                            <input type="text" class="form-control" id="porcentajeBeneficiario" name="porcentajeBeneficiario" value="" >
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="fNacBen" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fNacBen" name="fNacBen" value="" >
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="telBeneficiario" class="form-label">Teléfono Beneficiario</label>
                            <input type="text" class="form-control" id="telBeneficiario" name="telBeneficiario" value="">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="dirBeneficiario" class="form-label">Dirección Beneficiario</label>
                            <input type="text" class="form-control" id="dirBeneficiario" name="dirBeneficiario" value="" >
                        </div>

                        <button type="button" class="btn btn-primary col-2" id="addBeneficiaryButton">
                            Agregar Beneficiario
                        </button>
                    </div>

                    <!-- Tabla de beneficiarios -->
                    <div class="mt-4">
                        <table class="table table-bordered d-none" id="beneficiaryTable">
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
                                </tr>
                            </thead>
                            <tbody>
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
                            <div class="col-12 col-lg-6">
                                <label for="recursosProvienen" class="form-label">Los recursos provienen de:</label>
                                <select class="form-select" id="recursosProvienen" name="recursosProvienen">
                                    <option value="">---------</option>
                                    <option value="OTROS RECURSOS">OTROS RECURSOS</option>
                                    <option value="RECURSOS DE TERCEROS">RECURSOS DE TERCEROS</option>
                                    <option value="OTROS RECURSOS">OTROS RECURSOS</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="porcentajeTerceros" class="form-label">Porcentaje Terceros %</label>
                                <input type="number" class="form-control" id="porcentajeTerceros" name="porcentajeTerceros" value="">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <h5>Datos de terceros (solo es recursos de terceros).</h5>
                            <div class="col-12 col-lg-4">
                                <label for="nombreBeneficiario" class="form-label">Nombre Completo (Beneficiario)</label>
                                <input type="text" class="form-control" id="nombreBeneficiario" name="nombreBeneficiario" placeholder="Introduce Nombres" value="" >
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Introduce Apellido Paterno" value="" >
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Introduce Apellido Materno" value="" >
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-lg-6">
                                <label for="personalidadJuridica" class="form-label">Personalidad Jurídica</label>
                                <input type="text" class="form-control" id="personalidadJuridica" name="personalidadJuridica" value="" >
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="porcentaje" class="form-label">Porcentaje %</label>
                                <input type="number" class="form-control" id="porcentaje" name="porcentaje" value="" >
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-lg-6">
                                <label for="tipoIdentificacion" class="form-label">Tipo de Identificación Oficial</label>
                                <select class="form-select" id="tipoIdentificacion" name="tipoIdentificacion">
                                    <option value="">----</option>
                                    <option value="INE">INE</option>
                                    <option value="PASAPORTE">PASAPORTE</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="numeroIdentificacion" class="form-label">Nº. Identificación</label>
                                <input type="text" class="form-control" id="numeroIdentificacion" name="numeroIdentificacion" value="" >
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-lg-6">
                                <label for="nacionalidad" class="form-label">Nacionalidad</label>
                                <select class="form-select" id="nacionalidad" name="nacionalidad">
                                    <option value="0" selected ></option>
                                    <option value="1">MEXICANA</option>
                                    <option value="2">EXTRANJERA</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="telBeneficiario" class="form-label">Teléfono Beneficiario</label>
                                <input type="text" class="form-control" id="telBeneficiario" name="telBeneficiario" value="" >
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 col-lg-6">
                                <button class="btn btn-primary w-100">Agregar Terceros</button>
                            </div>
                            <div class="col-12 col-lg-6">
                                <button class="btn btn-secondary w-100">Ver Beneficiarios</button>
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
                            <input type="text" class="form-control" id="nombreCotitular" name="nombreCotitular" value="" placeholder="Nombre(s)">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="primerApellido" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="primerApellidoCotitular" name="primerApellidoCotitular" value="" placeholder="Primer Apellido">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="segundoApellido" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="segundoApellidoCotitular" name="segundoApellidoCotitular" value="" placeholder="Segundo Apellido">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="Genero" class="form-label">Género</label>
                            <select class="form-select" id="generoCotitular" name="generoCotitular" aria-label="Default select example">
                                <option value="" selected>---</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>

                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="InputCountry" class="form-label">Identificación Oficial</label>
                            <select class="form-select" id="identificacionOficialCotitular" name="identificacionOficialCotitular" aria-label="Default select example">
                                <option value="" selected>---</option>
                                <option value="1">Ine</option>
                                <option value="2">Pasaporte</option>
                                <option value="3">Cedula Profesional</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="serieNoIdentificacion" class="form-label">Curp</label>
                            <input type="text" class="form-control" id="curpCotitular" name="curpCotitular" value="" placeholder="Número de Identificación">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">RFC</label>
                            <input type="text" class="form-control" id="rfcCotitular" name="rfcCotitular" value="" placeholder="Escribe">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="fNac" class="form-label">Fecha de Nacimiento</label>
                            <input type="text" class="form-control datepicker " id="fNacCotitular" name="fNacCotitular" value="" placeholder="Ingresa Fecha de Nacimiento">
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="religion" class="form-label">Religión</label>
                            <input type="text" class="form-control" id="religionCotitular" name="religionCotitular" value="" placeholder="Ingresa Religión">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="paisNac" class="form-label">Pais de Nacimiento</label>
                            <select class="form-select" id="paisNacCotitular" name="paisNacCotitular"  aria-label="Default select example">
                                <option  value="" selected>---</option>
                                <option value="1">Afganistán</option>
                                <option value="2">Albania</option>
                                <option value="3">Alemania</option>
                                <option value="4">Andorra</option>
                                <option value="5">Angola</option>
                                <option value="6">Antigua y Barbuda</option>
                                <option value="7">Arabia Saudita</option>
                                <option value="8">Argelia</option>
                                <option value="9">Argentina</option>
                                <option value="10">Armenia</option>
                                <option value="11">Australia</option>
                                <option value="12">Austria</option>
                                <option value="13">Azerbaiyán</option>
                                <option value="14">Bahamas</option>
                                <option value="15">Bangladés</option>
                                <option value="16">Barbados</option>
                                <option value="17">Baréin</option>
                                <option value="18">Bélgica</option>
                                <option value="19">Belice</option>
                                <option value="20">Benín</option>
                                <option value="21">Bermuda</option>
                                <option value="22">Bielorrusia</option>
                                <option value="23">Bolivia</option>
                                <option value="24">Bosnia-Herzegovina</option>
                                <option value="25">Botsuana</option>
                                <option value="26">Brasil</option>
                                <option value="27">Brunéi</option>
                                <option value="28">Bulgaria</option>
                                <option value="29">Burkina Faso</option>
                                <option value="30">Burundi</option>
                                <option value="31">Bután</option>
                                <option value="32">Cabo Verde</option>
                                <option value="33">Camboya</option>
                                <option value="34">Camerún</option>
                                <option value="35">Canadá</option>
                                <option value="36">Catar</option>
                                <option value="37">Chad</option>
                                <option value="38">Chile</option>
                                <option value="39">China</option>
                                <option value="40">Chipre</option>
                                <option value="41">Colombia</option>
                                <option value="42">Comoras</option>
                                <option value="43">Congo, República Democrática del</option>
                                <option value="44">Congo, República de</option>
                                <option value="45">Corea del Norte</option>
                                <option value="46">Corea del Sur</option>
                                <option value="47">Costa de Marfil</option>
                                <option value="48">Costa Rica</option>
                                <option value="49">Croacia</option>
                                <option value="50">Cuba</option>
                                <option value="51">Curazao</option>
                                <option value="52">Dinamarca</option>
                                <option value="53">Djibouti</option>
                                <option value="54">Dominica</option>
                                <option value="55">Ecuador</option>
                                <option value="56">Egipto</option>
                                <option value="57">El Salvador</option>
                                <option value="58">Emiratos Árabes Unidos</option>
                                <option value="59">Eritrea</option>
                                <option value="60">Eslovaquia</option>
                                <option value="61">Eslovenia</option>
                                <option value="62">España</option>
                                <option value="63">Estados Unidos</option>
                                <option value="64">Estonia</option>
                                <option value="65">Etiopía</option>
                                <option value="66">Filipinas</option>
                                <option value="67">Finlandia</option>
                                <option value="68">Fiyi</option>
                                <option value="69">Francia</option>
                                <option value="70">Gabón</option>
                                <option value="71">Gambia</option>
                                <option value="72">Georgia</option>
                                <option value="73">Ghana</option>
                                <option value="74">Granada</option>
                                <option value="75">Grecia</option>
                                <option value="76">Groenlandia</option>
                                <option value="77">Guam</option>
                                <option value="78">Guatemala</option>
                                <option value="79">Guinea</option>
                                <option value="80">Guinea Ecuatorial</option>
                                <option value="81">Guinea-Bisáu</option>
                                <option value="82">Guyana</option>
                                <option value="83">Haití</option>
                                <option value="84">Honduras</option>
                                <option value="85">Hong Kong</option>
                                <option value="86">Hungría</option>
                                <option value="87">India</option>
                                <option value="88">Indonesia</option>
                                <option value="89">Irak</option>
                                <option value="90">Irán</option>
                                <option value="91">Irlanda</option>
                                <option value="92">Islandia</option>
                                <option value="93">Islas Caimán</option>
                                <option value="94">Islas Feroe</option>
                                <option value="95">Islas Marianas del Norte</option>
                                <option value="96">Islas Marshall</option>
                                <option value="97">Islas Salomón</option>
                                <option value="98">Islas Vírgenes Británicas</option>
                                <option value="99">Islas Vírgenes de los Estados Unidos</option>
                                <option value="100">Israel</option>
                                <option value="101">Italia</option>
                                <option value="102">Jamaica</option>
                                <option value="103">Japón</option>
                                <option value="104">Jordania</option>
                                <option value="105">Kazajistán</option>
                                <option value="106">Kenia</option>
                                <option value="107">Kirguistán</option>
                                <option value="108">Kiribati</option>
                                <option value="109">Kosovo</option>
                                <option value="110">Kuwait</option>
                                <option value="111">Laos</option>
                                <option value="112">Lesoto</option>
                                <option value="113">Letonia</option>
                                <option value="114">Líbano</option>
                                <option value="115">Liberia</option>
                                <option value="116">Libia</option>
                                <option value="117">Liechtenstein</option>
                                <option value="118">Lituania</option>
                                <option value="119">Luxemburgo</option>
                                <option value="120">Macedonia</option>
                                <option value="121">Madagascar</option>
                                <option value="122">Malasia</option>
                                <option value="123">Malaui</option>
                                <option value="124">Maldivas</option>
                                <option value="125">Malí</option>
                                <option value="126">Malta</option>
                                <option value="127">Marruecos</option>
                                <option value="128">Mauricio</option>
                                <option value="129">Mauritania</option>
                                <option value="130">México</option>
                                <option value="131">Micronesia</option>
                                <option value="132">Moldavia</option>
                                <option value="133">Mónaco</option>
                                <option value="134">Mongolia</option>
                                <option value="135">Montenegro</option>
                                <option value="136">Mozambique</option>
                                <option value="137">Myanmar (Birmania)</option>
                                <option value="138">Namibia</option>
                                <option value="139">Nauru</option>
                                <option value="140">Nepal</option>
                                <option value="141">Nicaragua</option>
                                <option value="142">Níger</option>
                                <option value="143">Nigeria</option>
                                <option value="144">Noruega</option>
                                <option value="145">Nueva Zelanda</option>
                                <option value="146">Omán</option>
                                <option value="147">Países Bajos</option>
                                <option value="148">Pakistán</option>
                                <option value="149">Palaos</option>
                                <option value="150">Panamá</option>
                                <option value="151">Papúa Nueva Guinea</option>
                                <option value="152">Paraguay</option>
                                <option value="153">Perú</option>
                                <option value="154">Polonia</option>
                                <option value="155">Portugal</option>
                                <option value="156">Puerto Rico</option>
                                <option value="157">Reino Unido</option>
                                <option value="158">República Centroafricana</option>
                                <option value="159">República Checa</option>
                                <option value="160">República Dominicana</option>
                                <option value="161">Ruanda</option>
                                <option value="162">Rumania</option>
                                <option value="163">Rusia</option>
                                <option value="164">Samoa</option>
                                <option value="165">San Cristóbal y Nieves</option>
                                <option value="166">San Marino</option>
                                <option value="167">San Vicente y las Granadinas</option>
                                <option value="168">Santa Lucía</option>
                                <option value="169">Santo Tomé y Príncipe</option>
                                <option value="170">Senegal</option>
                                <option value="171">Serbia</option>
                                <option value="172">Seychelles</option>
                                <option value="173">Sierra Leona</option>
                                <option value="174">Singapur</option>
                                <option value="175">Siria</option>
                                <option value="176">Somalia</option>
                                <option value="177">Sri Lanka</option>
                                <option value="178">Sudáfrica</option>
                                <option value="179">Sudán</option>
                                <option value="180">Sudán del Sur</option>
                                <option value="181">Suecia</option>
                                <option value="182">Suiza</option>
                                <option value="183">Surinam</option>
                                <option value="184">Tailandia</option>
                                <option value="185">Tanzania</option>
                                <option value="186">Tayikistán</option>
                                <option value="187">Timor Oriental</option>
                                <option value="188">Togo</option>
                                <option value="189">Tonga</option>
                                <option value="190">Trinidad y Tobago</option>
                                <option value="191">Túnez</option>
                                <option value="192">Turkmenistán</option>
                                <option value="193">Turquía</option>
                                <option value="194">Tuvalu</option>
                                <option value="195">Ucrania</option>
                                <option value="196">Uganda</option>
                                <option value="197">Uruguay</option>
                                <option value="198">Uzbekistán</option>
                                <option value="199">Vanuatu</option>
                                <option value="200">Vaticano</option>
                                <option value="201">Venezuela</option>
                                <option value="202">Vietnam</option>
                                <option value="203">Yemen</option>
                                <option value="204">Yibuti</option>
                                <option value="205">Zambia</option>
                                <option value="206">Zimbabue</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="nacionalidad" class="form-label">Nacionalidad</label>
                            <select class="form-select" id="nacionalidadCotitular" name="nacionalidadCotitular" aria-label="Default select example">
                                <option  value="" selected>---</option>
                                <option value="1">Afganistán</option>
                                <option value="2">Albania</option>
                                <option value="3">Alemania</option>
                                <option value="4">Andorra</option>
                                <option value="5">Angola</option>
                                <option value="6">Antigua y Barbuda</option>
                                <option value="7">Arabia Saudita</option>
                                <option value="8">Argelia</option>
                                <option value="9">Argentina</option>
                                <option value="10">Armenia</option>
                                <option value="11">Australia</option>
                                <option value="12">Austria</option>
                                <option value="13">Azerbaiyán</option>
                                <option value="14">Bahamas</option>
                                <option value="15">Bangladés</option>
                                <option value="16">Barbados</option>
                                <option value="17">Baréin</option>
                                <option value="18">Bélgica</option>
                                <option value="19">Belice</option>
                                <option value="20">Benín</option>
                                <option value="21">Bermuda</option>
                                <option value="22">Bielorrusia</option>
                                <option value="23">Bolivia</option>
                                <option value="24">Bosnia-Herzegovina</option>
                                <option value="25">Botsuana</option>
                                <option value="26">Brasil</option>
                                <option value="27">Brunéi</option>
                                <option value="28">Bulgaria</option>
                                <option value="29">Burkina Faso</option>
                                <option value="30">Burundi</option>
                                <option value="31">Bután</option>
                                <option value="32">Cabo Verde</option>
                                <option value="33">Camboya</option>
                                <option value="34">Camerún</option>
                                <option value="35">Canadá</option>
                                <option value="36">Catar</option>
                                <option value="37">Chad</option>
                                <option value="38">Chile</option>
                                <option value="39">China</option>
                                <option value="40">Chipre</option>
                                <option value="41">Colombia</option>
                                <option value="42">Comoras</option>
                                <option value="43">Congo, República Democrática del</option>
                                <option value="44">Congo, República de</option>
                                <option value="45">Corea del Norte</option>
                                <option value="46">Corea del Sur</option>
                                <option value="47">Costa de Marfil</option>
                                <option value="48">Costa Rica</option>
                                <option value="49">Croacia</option>
                                <option value="50">Cuba</option>
                                <option value="51">Curazao</option>
                                <option value="52">Dinamarca</option>
                                <option value="53">Djibouti</option>
                                <option value="54">Dominica</option>
                                <option value="55">Ecuador</option>
                                <option value="56">Egipto</option>
                                <option value="57">El Salvador</option>
                                <option value="58">Emiratos Árabes Unidos</option>
                                <option value="59">Eritrea</option>
                                <option value="60">Eslovaquia</option>
                                <option value="61">Eslovenia</option>
                                <option value="62">España</option>
                                <option value="63">Estados Unidos</option>
                                <option value="64">Estonia</option>
                                <option value="65">Etiopía</option>
                                <option value="66">Filipinas</option>
                                <option value="67">Finlandia</option>
                                <option value="68">Fiyi</option>
                                <option value="69">Francia</option>
                                <option value="70">Gabón</option>
                                <option value="71">Gambia</option>
                                <option value="72">Georgia</option>
                                <option value="73">Ghana</option>
                                <option value="74">Granada</option>
                                <option value="75">Grecia</option>
                                <option value="76">Groenlandia</option>
                                <option value="77">Guam</option>
                                <option value="78">Guatemala</option>
                                <option value="79">Guinea</option>
                                <option value="80">Guinea Ecuatorial</option>
                                <option value="81">Guinea-Bisáu</option>
                                <option value="82">Guyana</option>
                                <option value="83">Haití</option>
                                <option value="84">Honduras</option>
                                <option value="85">Hong Kong</option>
                                <option value="86">Hungría</option>
                                <option value="87">India</option>
                                <option value="88">Indonesia</option>
                                <option value="89">Irak</option>
                                <option value="90">Irán</option>
                                <option value="91">Irlanda</option>
                                <option value="92">Islandia</option>
                                <option value="93">Islas Caimán</option>
                                <option value="94">Islas Feroe</option>
                                <option value="95">Islas Marianas del Norte</option>
                                <option value="96">Islas Marshall</option>
                                <option value="97">Islas Salomón</option>
                                <option value="98">Islas Vírgenes Británicas</option>
                                <option value="99">Islas Vírgenes de los Estados Unidos</option>
                                <option value="100">Israel</option>
                                <option value="101">Italia</option>
                                <option value="102">Jamaica</option>
                                <option value="103">Japón</option>
                                <option value="104">Jordania</option>
                                <option value="105">Kazajistán</option>
                                <option value="106">Kenia</option>
                                <option value="107">Kirguistán</option>
                                <option value="108">Kiribati</option>
                                <option value="109">Kosovo</option>
                                <option value="110">Kuwait</option>
                                <option value="111">Laos</option>
                                <option value="112">Lesoto</option>
                                <option value="113">Letonia</option>
                                <option value="114">Líbano</option>
                                <option value="115">Liberia</option>
                                <option value="116">Libia</option>
                                <option value="117">Liechtenstein</option>
                                <option value="118">Lituania</option>
                                <option value="119">Luxemburgo</option>
                                <option value="120">Macedonia</option>
                                <option value="121">Madagascar</option>
                                <option value="122">Malasia</option>
                                <option value="123">Malaui</option>
                                <option value="124">Maldivas</option>
                                <option value="125">Malí</option>
                                <option value="126">Malta</option>
                                <option value="127">Marruecos</option>
                                <option value="128">Mauricio</option>
                                <option value="129">Mauritania</option>
                                <option value="130">México</option>
                                <option value="131">Micronesia</option>
                                <option value="132">Moldavia</option>
                                <option value="133">Mónaco</option>
                                <option value="134">Mongolia</option>
                                <option value="135">Montenegro</option>
                                <option value="136">Mozambique</option>
                                <option value="137">Myanmar (Birmania)</option>
                                <option value="138">Namibia</option>
                                <option value="139">Nauru</option>
                                <option value="140">Nepal</option>
                                <option value="141">Nicaragua</option>
                                <option value="142">Níger</option>
                                <option value="143">Nigeria</option>
                                <option value="144">Noruega</option>
                                <option value="145">Nueva Zelanda</option>
                                <option value="146">Omán</option>
                                <option value="147">Países Bajos</option>
                                <option value="148">Pakistán</option>
                                <option value="149">Palaos</option>
                                <option value="150">Panamá</option>
                                <option value="151">Papúa Nueva Guinea</option>
                                <option value="152">Paraguay</option>
                                <option value="153">Perú</option>
                                <option value="154">Polonia</option>
                                <option value="155">Portugal</option>
                                <option value="156">Puerto Rico</option>
                                <option value="157">Reino Unido</option>
                                <option value="158">República Centroafricana</option>
                                <option value="159">República Checa</option>
                                <option value="160">República Dominicana</option>
                                <option value="161">Ruanda</option>
                                <option value="162">Rumania</option>
                                <option value="163">Rusia</option>
                                <option value="164">Samoa</option>
                                <option value="165">San Cristóbal y Nieves</option>
                                <option value="166">San Marino</option>
                                <option value="167">San Vicente y las Granadinas</option>
                                <option value="168">Santa Lucía</option>
                                <option value="169">Santo Tomé y Príncipe</option>
                                <option value="170">Senegal</option>
                                <option value="171">Serbia</option>
                                <option value="172">Seychelles</option>
                                <option value="173">Sierra Leona</option>
                                <option value="174">Singapur</option>
                                <option value="175">Siria</option>
                                <option value="176">Somalia</option>
                                <option value="177">Sri Lanka</option>
                                <option value="178">Sudáfrica</option>
                                <option value="179">Sudán</option>
                                <option value="180">Sudán del Sur</option>
                                <option value="181">Suecia</option>
                                <option value="182">Suiza</option>
                                <option value="183">Surinam</option>
                                <option value="184">Tailandia</option>
                                <option value="185">Tanzania</option>
                                <option value="186">Tayikistán</option>
                                <option value="187">Timor Oriental</option>
                                <option value="188">Togo</option>
                                <option value="189">Tonga</option>
                                <option value="190">Trinidad y Tobago</option>
                                <option value="191">Túnez</option>
                                <option value="192">Turkmenistán</option>
                                <option value="193">Turquía</option>
                                <option value="194">Tuvalu</option>
                                <option value="195">Ucrania</option>
                                <option value="196">Uganda</option>
                                <option value="197">Uruguay</option>
                                <option value="198">Uzbekistán</option>
                                <option value="199">Vanuatu</option>
                                <option value="200">Vaticano</option>
                                <option value="201">Venezuela</option>
                                <option value="202">Vietnam</option>
                                <option value="203">Yemen</option>
                                <option value="204">Yibuti</option>
                                <option value="205">Zambia</option>
                                <option value="206">Zimbabue</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="estCivil" class="form-label">Estado Civil</label>
                            <select class="form-select" id="estCivilCotitular" name="estCivilCotitular" aCotitularria-label="Default select example">
                                <option value="" selected>---</option>
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
                                <input type="text" class="form-control" name="telCelCotitular" value="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Casa</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="text" class="form-control" name="telCasaCotitular" value=""  aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Oficina</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="text" class="form-control" name="telOfiCotitular" value="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Teléfono Otro</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                                <input type="text" class="form-control" name="telOtroCotitular" value="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <h5 class="mb-1">Domicilio Actual</h5>
                        <p class="mb-4"></p>

                        <div class="col-12 col-lg-3">
                            <label for="estCivil" class="form-label">Estado/Mpio/Localidad</label>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="estadoCotitular" name="estadoCotitular"  aria-label="Default select example">
                                <option value="" selected>---</option>
                                <?php
                                $estados = ControladorClientes::ctrEstados();
                                foreach ($estados as $estado) { ?>
                                    <option value="<?= $estado['id_estado'] ?>"><?= $estado['nom_estado'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="municipioCotitular" name="municipioCotitular" aria-label="Default select example">
                                <option value="" selected>---</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-3">
                            <select class="form-select" id="localidadCotitular" name="localidadCotitular" aria-label="Default select example">
                                <option value="" selected>---</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Calle</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="calleCotitular" value="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Ext</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="noExtCotitular" value="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">N. Int</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="noIntCotitular" value="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Colonia</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="coloniaCotitular" value="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">Ciudad</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                                <input type="text" class="form-control" name="ciudadCotitular" value="" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="rfc" class="form-label">C.P</label>
                            <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                                <input type="text" class="form-control" name="cpCotitular" value="" aria-label="Username" aria-describedby="basic-addon1">
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
                                    <div class="document-icon" id="preview-INE-Anverso">📇</div>
                                    <div class="document-title">INE Anverso</div>
                                    <input type="file" name="ineAnverso" value="" class="form-control mt-3" accept=".jpeg,.png,.jpg,.pdf" onchange="uploadFile(event, 'INE Anverso')" />
                                </div>
                            </div>
                            <!-- INE Reverso -->
                            <div class="col-md-3 mb-4">
                                <div class="document-card">
                                    <div class="document-icon" id="preview-INE-Reverso">📇</div>
                                    <div class="document-title">INE Reverso</div>
                                    <input type="file" name="ineReverso" accept=".jpeg,.png,.jpg,.pdf" class="form-control mt-3" onchange="uploadFile(event, 'INE Reverso')" />
                                </div>
                            </div>
                            <!-- Comprobante de Domicilio -->
                            <div class="col-md-3 mb-4">
                                <div class="document-card">
                                    <div class="document-icon" id="preview-Comprobante-Domicilio">📄</div>
                                    <div class="document-title">Comprobante de Domicilio</div>
                                    <input type="file" name="comprobanteDomicilio" value="" accept=".jpeg,.png,.jpg,.pdf" class="form-control mt-3" onchange="uploadFile(event, 'Comprobante de Domicilio')" />
                                </div>
                            </div>
                            <!-- CURP -->
                            <div class="col-md-3 mb-4">
                                <div class="document-card">
                                    <div class="document-icon" id="preview-CURP">🆔</div>
                                    <div class="document-title">CURP</div>
                                    <input type="file" name="curpDoc" value="" accept=".jpeg,.png,.jpg,.pdf" class="form-control mt-3" onchange="uploadFile(event, 'CURP')" />
                                </div>
                            </div>
                            <!-- Estado de Cuenta -->
                            <div class="col-md-3 mb-4">
                                <div class="document-card">
                                    <div class="document-icon" id="preview-Estado-Cuenta">📑</div>
                                    <div class="document-title">Estado de Cuenta</div>
                                    <input type="file" name="estadoCuenta"  value="" accept=".jpeg,.png,.jpg,.pdf" class="form-control mt-3" onchange="uploadFile(event, 'Estado de Cuenta')" />
                                </div>
                            </div>
                            <!-- Constancia Fiscal -->
                            <div class="col-md-3 mb-4">
                                <div class="document-card">
                                    <div class="document-icon" id="preview-Constancia-Fiscal">📜</div>
                                    <div class="document-title">Constancia Fiscal</div>
                                    <input type="file" name="constanciaFiscal" value="" accept=".jpeg,.png,.jpg,.pdf" class="form-control mt-3" onchange="uploadFile(event, 'Constancia Fiscal')" />
                                </div>
                            </div>
                            <!-- Cuestionario de Inversionista -->
                            <div class="col-md-3 mb-4">
                                <div class="document-card">
                                    <div class="document-icon" id="preview-Cuestionario-Inversionista">📝</div>
                                    <div class="document-title">Cuestionario de Inversionista</div>
                                    <input type="file" name="cuestionarioInversionista" value=""     accept=".jpeg,.png,.jpg,.pdf" class="form-control mt-3" onchange="uploadFile(event, 'Cuestionario de Inversionista')" />
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
            let beneficiaryCounter = 0;



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

                // Validación básica para campos requeridos
                if (!nombre || !pApellido || !porcentaje) {
                    Swal.fire('Error', 'Completa al menos los campos requeridos (Nombre, Primer Apellido, Porcentaje).', 'error');
                    return;
                }

                // Incrementar el contador de beneficiarios
                beneficiaryCounter++;

                // Mostrar la tabla si estaba oculta
                table.classList.remove('d-none');

                // Crear una nueva fila con los valores capturados
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
    `;

                // Agregar la nueva fila al cuerpo de la tabla
                tbody.appendChild(newRow);

                // Limpiar los campos de entrada
                document.getElementById('nombreBeneficiario').value = '';
                document.getElementById('pApellidoBeneficiario').value = '';
                document.getElementById('sApellidoBeneficiario').value = '';
                document.getElementById('parentezco').value = '';
                document.getElementById('porcentajeBeneficiario').value = '';
                document.getElementById('fNacBen').value = '';
                document.getElementById('telBeneficiario').value = '';
                document.getElementById('dirBeneficiario').value = '';
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
    document.getElementById("nacionalidadPais").addEventListener("change", function () {
        const seleccion = this.value;
        const condicionMigratoriaDiv = document.getElementById("condicionMigratoriaDiv");
        
        if (seleccion !== "130" && seleccion !== "0") {
            // Mostrar campo Condición Migratoria si no es México
            condicionMigratoriaDiv.classList.remove("d-none");
        } else {
            // Ocultar campo Condición Migratoria si es México o no se selecciona
            condicionMigratoriaDiv.classList.add("d-none");
        }
    });


    document.getElementById("identificacionOficial").addEventListener("change", function () {
        const inputIdentificacion = document.getElementById("serieNoIdentificacion");
        const seleccion = this.value;

        // Restablece restricciones previas
        inputIdentificacion.removeAttribute("maxlength");
        inputIdentificacion.removeAttribute("minlength");
        inputIdentificacion.value = "";  // Limpia el valor

        switch (seleccion) {
            case "CREDENCIAL PARA VOTAR":
                inputIdentificacion.setAttribute("maxlength", "13");
                inputIdentificacion.setAttribute("minlength", "13");
                inputIdentificacion.setAttribute("placeholder", "Ingrese 13 caracteres");
                break;
            case "PASAPORTE":
                inputIdentificacion.setAttribute("maxlength", "9");
                inputIdentificacion.setAttribute("minlength", "9");
                inputIdentificacion.setAttribute("placeholder", "Ingrese 9 caracteres");
                break;
            case "CEDULA":
                inputIdentificacion.setAttribute("placeholder", "Número de Identificación");
                break;
            default:
                inputIdentificacion.setAttribute("placeholder", "Número de Identificación");
        }
    });

    document.getElementById("serieNoIdentificacion").addEventListener("blur", function () {
        const seleccion = document.getElementById("identificacionOficial").value;
        const valor = this.value.trim();
        
        if (seleccion === "INE" && valor.length !== 13) {
            alert("El número de identificación para INE debe tener exactamente 13 caracteres.");
        } 
        else if (seleccion === "PASAPORTE" && valor.length !== 9) {
            alert("El número de identificación para Pasaporte debe tener exactamente 9 caracteres.");
        }
    });
</script>