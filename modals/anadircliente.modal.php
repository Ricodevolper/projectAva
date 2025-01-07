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

<script>
  function uploadFile(event, documentName) {
    const file = event.target.files[0];
    if (file) {
      alert(`Archivo "${file.name}" cargado para ${documentName}.`);
      // Aquí puedes manejar la subida del archivo con AJAX o enviarlo al servidor.
    }
  }
</script>
<div class="modal fade" id="añadirCliente" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Añadir Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--start stepper three-->

        <div class="card">
          <div class="card-body">



            <!--start wrapper-->

            <!--start sidebar -->








            <!--start stepper one-->


            <div id="stepper1" class="bs-stepper">
            </div>
            <!--end stepper one-->


            <!--start stepper two-->

            <div id="stepper2" class="bs-stepper">

            </div>
            <!--end stepper two-->


            <!--start stepper three-->



            <div id="stepper3" class="bs-stepper gap-4 vertical">
              <div class="bs-stepper-header" role="tablist">
                <div class="step" data-target="#test-vl-1">
                  <div class="step-trigger" role="tab" id="stepper3trigger1" aria-controls="test-vl-1">
                    <div class="bs-stepper-circle"><i class='bx bx-user fs-4'></i></div>
                    <div class="">
                      <h5 class="mb-0 steper-title">Datos Generales</h5>
                      <p class="mb-0 steper-sub-title"></p>
                    </div>
                  </div>
                </div>
                <div class="step" data-target="#test-vl-5">
                  <div class="step-trigger" role="tab" id="stepper3trigger1" aria-controls="test-vl-1">
                    <div class="bs-stepper-circle"><i class='bx bx-user fs-4'></i></div>
                    <div class="">
                      <h5 class="mb-0 steper-title">Datos Generales Cotitular</h5>
                      <p class="mb-0 steper-sub-title"></p>
                    </div>
                  </div>
                </div>

                <div class="step" data-target="#test-vl-2">
                  <div class="step-trigger" role="tab" id="stepper3trigger2" aria-controls="test-vl-2">
                    <div class="bs-stepper-circle"><i class='bx bx-file fs-4'></i></div>
                    <div class="">
                      <h5 class="mb-0 steper-title">Datos Economicos</h5>
                      <p class="mb-0 steper-sub-title"></p>
                    </div>
                  </div>
                </div>

                <div class="step" data-target="#test-vl-3">
                  <div class="step-trigger" role="tab" id="stepper3trigger3" aria-controls="test-vl-3">
                    <div class="bs-stepper-circle"><i class='bx bxs-graduation fs-4'></i></div>
                    <div class="">
                      <h5 class="mb-0 steper-title">Beneficiarios</h5>
                      <p class="mb-0 steper-sub-title"></p>
                    </div>
                  </div>
                </div>

                <div class="step" data-target="#test-vl-4">
                  <div class="step-trigger" role="tab" id="stepper3trigger4" aria-controls="test-vl-4">
                    <div class="bs-stepper-circle"><i class='bx bx-briefcase fs-4'></i></div>
                    <div class="">
                      <h5 class="mb-0 steper-title">Transaccionalidad</h5>
                      <p class="mb-0 steper-sub-title"></p>
                    </div>
                  </div>
                </div>
                <div class="step" data-target="#test-vl-6">
                  <div class="step-trigger" role="tab" id="stepper3trigger4" aria-controls="test-vl-4">
                    <div class="bs-stepper-circle"><i class='bx bx-briefcase fs-4'></i></div>
                    <div class="">
                      <h5 class="mb-0 steper-title">Documentación</h5>
                      <p class="mb-0 steper-sub-title"></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="bs-stepper-content">
                <form onSubmit="return false">
                  <div id="test-vl-1" role="tabpane3" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger1">
                    <h5 class="mb-1">Datos Generales</h5>
                    <p class="mb-4"></p>

                    <div class="row g-3">
                      <div class="col-12 col-lg-4">
                        <label for="FisrtName" class="form-label">Nombre(s)</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe Nombre">
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="LastName" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Primer Apellido">
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="LastName" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Segundo Apellido">
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="PhoneNumber" class="form-label">Curp</label>
                        <input type="text" class="form-control" id="curp" name="curp" placeholder="Curp">
                      </div>

                      <div class="col-12 col-lg-4">
                        <label for="InputCountry" class="form-label">Identificación Oficial</label>
                        <select class="form-select" id="identificacionOficial" name="identificacionOficial" aria-label="Default select example">
                          <option selected>---</option>
                          <option value="1">Ine</option>
                          <option value="2">Pasaporte</option>
                          <option value="3">Cedula Profesional</option>
                        </select>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="Genero" class="form-label">Género</label>
                        <select class="form-select" id="genero" name="genero" aria-label="Default select example">
                          <option selected>---</option>
                          <option value="M">Masculino</option>
                          <option value="F">Femenino</option>

                        </select>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="serieNoIdentificacion" class="form-label">Número de Identificación</label>
                        <input type="text" class="form-control" id="serieNoIdentificacion" name="serieNoIdentificacion" placeholder="Número de Identificación">
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">RFC</label>
                        <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Escribe">
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="fNac" class="form-label">Fecha de Nacimiento</label>
                        <input type="text" class="form-control datepicker " id="fNac" name="fNac" placeholder="Ingresa Fecha de Nacimiento">
                      </div>

                      <div class="col-12 col-lg-4">
                        <label for="religion" class="form-label">Religión</label>
                        <input type="text" class="form-control" id="religion" name="religion" placeholder="Ingresa Religión">
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="paisNac" class="form-label">Pais de Nacimiento</label>
                        <select class="form-select" id="paisNac" name="paisNac" aria-label="Default select example">
                          <option selected>---</option>
                          <option value="Afganistán">Afganistán</option>
                          <option value="Albania">Albania</option>
                          <option value="Alemania">Alemania</option>
                          <option value="Andorra">Andorra</option>
                          <option value="Angola">Angola</option>
                          <option value="Antigua y Barbuda">Antigua y Barbuda</option>
                          <option value="Arabia Saudita">Arabia Saudita</option>
                          <option value="Argelia">Argelia</option>
                          <option value="Argentina">Argentina</option>
                          <option value="Armenia">Armenia</option>
                          <option value="Australia">Australia</option>
                          <option value="Austria">Austria</option>
                          <option value="Azerbaiyán">Azerbaiyán</option>
                          <option value="Bahamas">Bahamas</option>
                          <option value="Bangladés">Bangladés</option>
                          <option value="Barbados">Barbados</option>
                          <option value="Baréin">Baréin</option>
                          <option value="Bélgica">Bélgica</option>
                          <option value="Belice">Belice</option>
                          <option value="Benín">Benín</option>
                          <option value="Bermuda">Bermuda</option>
                          <option value="Bielorrusia">Bielorrusia</option>
                          <option value="Bolivia">Bolivia</option>
                          <option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option>
                          <option value="Botsuana">Botsuana</option>
                          <option value="Brasil">Brasil</option>
                          <option value="Brunéi">Brunéi</option>
                          <option value="Bulgaria">Bulgaria</option>
                          <option value="Burkina Faso">Burkina Faso</option>
                          <option value="Burundi">Burundi</option>
                          <option value="Bután">Bután</option>
                          <option value="Cabo Verde">Cabo Verde</option>
                          <option value="Camboya">Camboya</option>
                          <option value="Camerún">Camerún</option>
                          <option value="Canadá">Canadá</option>
                          <option value="Catar">Catar</option>
                          <option value="Chad">Chad</option>
                          <option value="Chile">Chile</option>
                          <option value="China">China</option>
                          <option value="Chipre">Chipre</option>
                          <option value="Colombia">Colombia</option>
                          <option value="Comoras">Comoras</option>
                          <option value="Congo, República Democrática del">Congo, República Democrática del</option>
                          <option value="Congo, República de">Congo, República de</option>
                          <option value="Corea del Norte">Corea del Norte</option>
                          <option value="Corea del Sur">Corea del Sur</option>
                          <option value="Costa de Marfil">Costa de Marfil</option>
                          <option value="Costa Rica">Costa Rica</option>
                          <option value="Croacia">Croacia</option>
                          <option value="Cuba">Cuba</option>
                          <option value="Curazao">Curazao</option>
                          <option value="Dinamarca">Dinamarca</option>
                          <option value="Djibouti">Djibouti</option>
                          <option value="Dominica">Dominica</option>
                          <option value="Ecuador">Ecuador</option>
                          <option value="Egipto">Egipto</option>
                          <option value="El Salvador">El Salvador</option>
                          <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
                          <option value="Eritrea">Eritrea</option>
                          <option value="Eslovaquia">Eslovaquia</option>
                          <option value="Eslovenia">Eslovenia</option>
                          <option value="España">España</option>
                          <option value="Estados Unidos">Estados Unidos</option>
                          <option value="Estonia">Estonia</option>
                          <option value="Etiopía">Etiopía</option>
                          <option value="Filipinas">Filipinas</option>
                          <option value="Finlandia">Finlandia</option>
                          <option value="Fiyi">Fiyi</option>
                          <option value="Francia">Francia</option>
                          <option value="Gabón">Gabón</option>
                          <option value="Gambia">Gambia</option>
                          <option value="Georgia">Georgia</option>
                          <option value="Ghana">Ghana</option>
                          <option value="Granada">Granada</option>
                          <option value="Grecia">Grecia</option>
                          <option value="Groenlandia">Groenlandia</option>
                          <option value="Guam">Guam</option>
                          <option value="Guatemala">Guatemala</option>
                          <option value="Guinea">Guinea</option>
                          <option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
                          <option value="Guinea-Bisáu">Guinea-Bisáu</option>
                          <option value="Guyana">Guyana</option>
                          <option value="Haiti">Haití</option>
                          <option value="Honduras">Honduras</option>
                          <option value="Hong Kong">Hong Kong</option>
                          <option value="Hungria">Hungría</option>
                          <option value="India">India</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Irak">Irak</option>
                          <option value="Iran">Irán</option>
                          <option value="Irlanda">Irlanda</option>
                          <option value="Islandia">Islandia</option>
                          <option value="Islas Caiman">Islas Caimán</option>
                          <option value="Islas Faroe">Islas Faroe</option>
                          <option value="Islas Marianas del Norte">Islas Marianas del Norte</option>
                          <option value="Islas Marshall">Islas Marshall</option>
                          <option value="Islas Salomon">Islas Salomón</option>
                          <option value="Islas Vírgenes Britanicas">Islas Vírgenes Británicas</option>
                          <option value="Islas Virgenes de los Estados Unidos">Islas Vírgenes de los Estados Unidos</option>
                          <option value="Israel">Israel</option>
                          <option value="Italia">Italia</option>
                          <option value="Jamaica">Jamaica</option>
                          <option value="Japon">Japón</option>
                          <option value="Jordania">Jordania</option>
                          <option value="Kazajistan">Kazajistán</option>
                          <option value="Kenia">Kenia</option>
                          <option value="Kirguistan">Kirguistán</option>
                          <option value="Kiribati">Kiribati</option>
                          <option value="Kosovo">Kosovo</option>
                          <option value="Kuwait">Kuwait</option>
                          <option value="Laos">Laos</option>
                          <option value="Lesoto">Lesoto</option>
                          <option value="Letonia">Letonia</option>
                          <option value="Libano">Líbano</option>
                          <option value="Liberia">Liberia</option>
                          <option value="Libia">Libia</option>
                          <option value="Liechtenstein">Liechtenstein</option>
                          <option value="Lituania">Lituania</option>
                          <option value="Luxemburgo">Luxemburgo</option>
                          <option value="Macedonia">Macedonia</option>
                          <option value="Madagascar">Madagascar</option>
                          <option value="Malasia">Malasia</option>
                          <option value="Malaui">Malaui</option>
                          <option value="Maldivas">Maldivas</option>
                          <option value="Mali">Malí</option>
                          <option value="Malta">Malta</option>
                          <option value="Marruecos">Marruecos</option>
                          <option value="Mauricio">Mauricio</option>
                          <option value="Mauritania">Mauritania</option>
                          <option value="Mexico">México</option>
                          <option value="Micronesia">Micronesia</option>
                          <option value="Moldavia">Moldavia</option>
                          <option value="Monaco">Mónaco</option>
                          <option value="Mongolia">Mongolia</option>
                          <option value="Montenegro">Montenegro</option>
                          <option value="Mozambique">Mozambique</option>
                          <option value="Myanmar">Myanmar</option>
                          <option value="Namibia">Namibia</option>
                          <option value="Nauru">Nauru</option>
                          <option value="Nepal">Nepal</option>
                          <option value="Nicaragua">Nicaragua</option>
                          <option value="Niger">Níger</option>
                          <option value="Nigeria">Nigeria</option>
                          <option value="Noruega">Noruega</option>
                          <option value="Nueva Zelanda">Nueva Zelanda</option>
                          <option value="Oman">Omán</option>
                          <option value="Paises Bajos">Países Bajos</option>
                          <option value="Pakistan">Pakistán</option>
                          <option value="Palaos">Palaos</option>
                          <option value="Palestina">Palestina</option>
                          <option value="Panama">Panamá</option>
                          <option value="Papua Nueva Guinea">Papúa Nueva Guinea</option>
                          <option value="Paraguay">Paraguay</option>
                          <option value="Peru">Perú</option>
                          <option value="Polinesia Francesa">Polinesia Francesa</option>
                          <option value="Polonia">Polonia</option>
                          <option value="Portugal">Portugal</option>
                          <option value="Puerto Rico">Puerto Rico</option>
                          <option value="Qatar">Qatar</option>
                          <option value="Reino Unido">Reino Unido</option>
                          <option value="Republica Centroafricana">República Centroafricana</option>
                          <option value="Republica Checa">República Checa</option>
                          <option value="Republica Democrática del Congo">República Democrática del Congo</option>
                          <option value="Republica Dominicana">República Dominicana</option>
                          <option value="Ruanda">Ruanda</option>
                          <option value="Rumania">Rumania</option>
                          <option value="Rusia">Rusia</option>
                          <option value="Samoa">Samoa</option>
                          <option value="Samoa Americana">Samoa Americana</option>
                          <option value="San Cristobal y Nieves">San Cristóbal y Nieves</option>
                          <option value="San Marino">San Marino</option>
                          <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
                          <option value="Santa Lucia">Santa Lucía</option>
                          <option value="Santo Tome y Príncipe">Santo Tomé y Príncipe</option>
                          <option value="Senegal">Senegal</option>
                          <option value="Serbia">Serbia</option>
                          <option value="Seychelles">Seychelles</option>
                          <option value="Sierra Leona">Sierra Leona</option>
                          <option value="Singapur">Singapur</option>
                          <option value="Sint Maarten">Sint Maarten</option>
                          <option value="Siria">Siria</option>
                          <option value="Somalia">Somalia</option>
                          <option value="Sri Lanka">Sri Lanka</option>
                          <option value="Suazilandia">Suazilandia</option>
                          <option value="Sudáfrica">Sudáfrica</option>
                          <option value="Sudan">Sudán</option>
                          <option value="Sudan del Sur">Sudán del Sur</option>
                          <option value="Suecia">Suecia</option>
                          <option value="Suiza">Suiza</option>
                          <option value="Surinam">Surinam</option>
                          <option value="Tailandia">Tailandia</option>
                          <option value="Taiwan">Taiwán</option>
                          <option value="Tanzania">Tanzania</option>
                          <option value="Tayikistan">Tayikistán</option>
                          <option value="Timor Oriental">Timor Oriental</option>
                          <option value="Togo">Togo</option>
                          <option value="Tonga">Tonga</option>
                          <option value="Trinidad y Tobago">Trinidad y Tobago</option>
                          <option value="Tunez">Túnez</option>
                          <option value="Turkmenistan">Turkmenistán</option>
                          <option value="Turquia">Turquía</option>
                          <option value="Tuvalu">Tuvalu</option>
                          <option value="Ucrania">Ucrania</option>
                          <option value="Uganda">Uganda</option>
                          <option value="Uruguay">Uruguay</option>
                          <option value="Uzbekistan">Uzbekistán</option>
                          <option value="Vanuatu">Vanuatu</option>
                          <option value="Vaticano">Vaticano</option>
                          <option value="Venezuela">Venezuela</option>
                          <option value="Vietnam">Vietnam</option>
                          <option value="Yemen">Yemen</option>
                          <option value="Yibuti">Yibuti</option>
                          <option value="Zambia">Zambia</option>
                          <option value="Zimbabue">Zimbabue</option>
                        </select>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                        <select class="form-select" id="nacionalidad" name="nacionalidad" aria-label="Default select example">
                          <option selected>---</option>
                          <option value="Afganistán">Afganistán</option>
                          <option value="Albania">Albania</option>
                          <option value="Alemania">Alemania</option>
                          <option value="Andorra">Andorra</option>
                          <option value="Angola">Angola</option>
                          <option value="Antigua y Barbuda">Antigua y Barbuda</option>
                          <option value="Arabia Saudita">Arabia Saudita</option>
                          <option value="Argelia">Argelia</option>
                          <option value="Argentina">Argentina</option>
                          <option value="Armenia">Armenia</option>
                          <option value="Australia">Australia</option>
                          <option value="Austria">Austria</option>
                          <option value="Azerbaiyán">Azerbaiyán</option>
                          <option value="Bahamas">Bahamas</option>
                          <option value="Bangladés">Bangladés</option>
                          <option value="Barbados">Barbados</option>
                          <option value="Baréin">Baréin</option>
                          <option value="Bélgica">Bélgica</option>
                          <option value="Belice">Belice</option>
                          <option value="Benín">Benín</option>
                          <option value="Bermuda">Bermuda</option>
                          <option value="Bielorrusia">Bielorrusia</option>
                          <option value="Bolivia">Bolivia</option>
                          <option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option>
                          <option value="Botsuana">Botsuana</option>
                          <option value="Brasil">Brasil</option>
                          <option value="Brunéi">Brunéi</option>
                          <option value="Bulgaria">Bulgaria</option>
                          <option value="Burkina Faso">Burkina Faso</option>
                          <option value="Burundi">Burundi</option>
                          <option value="Bután">Bután</option>
                          <option value="Cabo Verde">Cabo Verde</option>
                          <option value="Camboya">Camboya</option>
                          <option value="Camerún">Camerún</option>
                          <option value="Canadá">Canadá</option>
                          <option value="Catar">Catar</option>
                          <option value="Chad">Chad</option>
                          <option value="Chile">Chile</option>
                          <option value="China">China</option>
                          <option value="Chipre">Chipre</option>
                          <option value="Colombia">Colombia</option>
                          <option value="Comoras">Comoras</option>
                          <option value="Congo, República Democrática del">Congo, República Democrática del</option>
                          <option value="Congo, República de">Congo, República de</option>
                          <option value="Corea del Norte">Corea del Norte</option>
                          <option value="Corea del Sur">Corea del Sur</option>
                          <option value="Costa de Marfil">Costa de Marfil</option>
                          <option value="Costa Rica">Costa Rica</option>
                          <option value="Croacia">Croacia</option>
                          <option value="Cuba">Cuba</option>
                          <option value="Curazao">Curazao</option>
                          <option value="Dinamarca">Dinamarca</option>
                          <option value="Djibouti">Djibouti</option>
                          <option value="Dominica">Dominica</option>
                          <option value="Ecuador">Ecuador</option>
                          <option value="Egipto">Egipto</option>
                          <option value="El Salvador">El Salvador</option>
                          <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
                          <option value="Eritrea">Eritrea</option>
                          <option value="Eslovaquia">Eslovaquia</option>
                          <option value="Eslovenia">Eslovenia</option>
                          <option value="España">España</option>
                          <option value="Estados Unidos">Estados Unidos</option>
                          <option value="Estonia">Estonia</option>
                          <option value="Etiopía">Etiopía</option>
                          <option value="Filipinas">Filipinas</option>
                          <option value="Finlandia">Finlandia</option>
                          <option value="Fiyi">Fiyi</option>
                          <option value="Francia">Francia</option>
                          <option value="Gabón">Gabón</option>
                          <option value="Gambia">Gambia</option>
                          <option value="Georgia">Georgia</option>
                          <option value="Ghana">Ghana</option>
                          <option value="Granada">Granada</option>
                          <option value="Grecia">Grecia</option>
                          <option value="Groenlandia">Groenlandia</option>
                          <option value="Guam">Guam</option>
                          <option value="Guatemala">Guatemala</option>
                          <option value="Guinea">Guinea</option>
                          <option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
                          <option value="Guinea-Bisáu">Guinea-Bisáu</option>
                          <option value="Guyana">Guyana</option>
                          <option value="Haiti">Haití</option>
                          <option value="Honduras">Honduras</option>
                          <option value="Hong Kong">Hong Kong</option>
                          <option value="Hungria">Hungría</option>
                          <option value="India">India</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Irak">Irak</option>
                          <option value="Iran">Irán</option>
                          <option value="Irlanda">Irlanda</option>
                          <option value="Islandia">Islandia</option>
                          <option value="Islas Caiman">Islas Caimán</option>
                          <option value="Islas Faroe">Islas Faroe</option>
                          <option value="Islas Marianas del Norte">Islas Marianas del Norte</option>
                          <option value="Islas Marshall">Islas Marshall</option>
                          <option value="Islas Salomon">Islas Salomón</option>
                          <option value="Islas Vírgenes Britanicas">Islas Vírgenes Británicas</option>
                          <option value="Islas Virgenes de los Estados Unidos">Islas Vírgenes de los Estados Unidos</option>
                          <option value="Israel">Israel</option>
                          <option value="Italia">Italia</option>
                          <option value="Jamaica">Jamaica</option>
                          <option value="Japon">Japón</option>
                          <option value="Jordania">Jordania</option>
                          <option value="Kazajistan">Kazajistán</option>
                          <option value="Kenia">Kenia</option>
                          <option value="Kirguistan">Kirguistán</option>
                          <option value="Kiribati">Kiribati</option>
                          <option value="Kosovo">Kosovo</option>
                          <option value="Kuwait">Kuwait</option>
                          <option value="Laos">Laos</option>
                          <option value="Lesoto">Lesoto</option>
                          <option value="Letonia">Letonia</option>
                          <option value="Libano">Líbano</option>
                          <option value="Liberia">Liberia</option>
                          <option value="Libia">Libia</option>
                          <option value="Liechtenstein">Liechtenstein</option>
                          <option value="Lituania">Lituania</option>
                          <option value="Luxemburgo">Luxemburgo</option>
                          <option value="Macedonia">Macedonia</option>
                          <option value="Madagascar">Madagascar</option>
                          <option value="Malasia">Malasia</option>
                          <option value="Malaui">Malaui</option>
                          <option value="Maldivas">Maldivas</option>
                          <option value="Mali">Malí</option>
                          <option value="Malta">Malta</option>
                          <option value="Marruecos">Marruecos</option>
                          <option value="Mauricio">Mauricio</option>
                          <option value="Mauritania">Mauritania</option>
                          <option value="Mexico">México</option>
                          <option value="Micronesia">Micronesia</option>
                          <option value="Moldavia">Moldavia</option>
                          <option value="Monaco">Mónaco</option>
                          <option value="Mongolia">Mongolia</option>
                          <option value="Montenegro">Montenegro</option>
                          <option value="Mozambique">Mozambique</option>
                          <option value="Myanmar">Myanmar</option>
                          <option value="Namibia">Namibia</option>
                          <option value="Nauru">Nauru</option>
                          <option value="Nepal">Nepal</option>
                          <option value="Nicaragua">Nicaragua</option>
                          <option value="Niger">Níger</option>
                          <option value="Nigeria">Nigeria</option>
                          <option value="Noruega">Noruega</option>
                          <option value="Nueva Zelanda">Nueva Zelanda</option>
                          <option value="Oman">Omán</option>
                          <option value="Paises Bajos">Países Bajos</option>
                          <option value="Pakistan">Pakistán</option>
                          <option value="Palaos">Palaos</option>
                          <option value="Palestina">Palestina</option>
                          <option value="Panama">Panamá</option>
                          <option value="Papua Nueva Guinea">Papúa Nueva Guinea</option>
                          <option value="Paraguay">Paraguay</option>
                          <option value="Peru">Perú</option>
                          <option value="Polinesia Francesa">Polinesia Francesa</option>
                          <option value="Polonia">Polonia</option>
                          <option value="Portugal">Portugal</option>
                          <option value="Puerto Rico">Puerto Rico</option>
                          <option value="Qatar">Qatar</option>
                          <option value="Reino Unido">Reino Unido</option>
                          <option value="Republica Centroafricana">República Centroafricana</option>
                          <option value="Republica Checa">República Checa</option>
                          <option value="Republica Democrática del Congo">República Democrática del Congo</option>
                          <option value="Republica Dominicana">República Dominicana</option>
                          <option value="Ruanda">Ruanda</option>
                          <option value="Rumania">Rumania</option>
                          <option value="Rusia">Rusia</option>
                          <option value="Samoa">Samoa</option>
                          <option value="Samoa Americana">Samoa Americana</option>
                          <option value="San Cristobal y Nieves">San Cristóbal y Nieves</option>
                          <option value="San Marino">San Marino</option>
                          <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
                          <option value="Santa Lucia">Santa Lucía</option>
                          <option value="Santo Tome y Príncipe">Santo Tomé y Príncipe</option>
                          <option value="Senegal">Senegal</option>
                          <option value="Serbia">Serbia</option>
                          <option value="Seychelles">Seychelles</option>
                          <option value="Sierra Leona">Sierra Leona</option>
                          <option value="Singapur">Singapur</option>
                          <option value="Sint Maarten">Sint Maarten</option>
                          <option value="Siria">Siria</option>
                          <option value="Somalia">Somalia</option>
                          <option value="Sri Lanka">Sri Lanka</option>
                          <option value="Suazilandia">Suazilandia</option>
                          <option value="Sudáfrica">Sudáfrica</option>
                          <option value="Sudan">Sudán</option>
                          <option value="Sudan del Sur">Sudán del Sur</option>
                          <option value="Suecia">Suecia</option>
                          <option value="Suiza">Suiza</option>
                          <option value="Surinam">Surinam</option>
                          <option value="Tailandia">Tailandia</option>
                          <option value="Taiwan">Taiwán</option>
                          <option value="Tanzania">Tanzania</option>
                          <option value="Tayikistan">Tayikistán</option>
                          <option value="Timor Oriental">Timor Oriental</option>
                          <option value="Togo">Togo</option>
                          <option value="Tonga">Tonga</option>
                          <option value="Trinidad y Tobago">Trinidad y Tobago</option>
                          <option value="Tunez">Túnez</option>
                          <option value="Turkmenistan">Turkmenistán</option>
                          <option value="Turquia">Turquía</option>
                          <option value="Tuvalu">Tuvalu</option>
                          <option value="Ucrania">Ucrania</option>
                          <option value="Uganda">Uganda</option>
                          <option value="Uruguay">Uruguay</option>
                          <option value="Uzbekistan">Uzbekistán</option>
                          <option value="Vanuatu">Vanuatu</option>
                          <option value="Vaticano">Vaticano</option>
                          <option value="Venezuela">Venezuela</option>
                          <option value="Vietnam">Vietnam</option>
                          <option value="Yemen">Yemen</option>
                          <option value="Yibuti">Yibuti</option>
                          <option value="Zambia">Zambia</option>
                          <option value="Zimbabue">Zimbabue</option>
                        </select>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="estCivil" class="form-label">Estado Civil</label>
                        <select class="form-select" id="estCivil" name="estCivil" aria-label="Default select example">
                          <option selected>---</option>
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
                          <input type="number" name="telCelular" class="form-control" placeholder="" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">Teléfono Casa</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                          <input type="number" class="form-control" name="telCasa" placeholder="" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">Teléfono Oficina</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                          <input type="number" class="form-control" placeholder="" name="telOfici" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">Teléfono Otro</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                          <input type="number" class="form-control" placeholder="" name="telOtro" aria-describedby="basic-addon1">
                        </div>
                      </div>

                      <h5 class="mb-1">Domicilio Actual</h5>
                      <p class="mb-4"></p>

                      <div class="col-12 col-lg-3">
                        <label for="estCivil" class="form-label">Estado/Mpio/Localidad</label>
                      </div>
                      <div class="col-12 col-lg-3">
                        <select class="form-select" id="estado" name="estado" aria-label="Default select example">
                          <option value="" selected>---</option>
                          <?php
                          $estados = ControladorClientes::ctrEstados();
                          foreach ($estados as $estado) { ?>
                            <option value="<?= $estado['id_estado'] ?>"><?= $estado['nom_estado'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-12 col-lg-3">
                        <select class="form-select" id="municipio" name="municipio" aria-label="Default select example">
                          <option value="" selected>---</option>
                        </select>
                      </div>

                      <div class="col-12 col-lg-3">
                        <select class="form-select" id="localidad" name="localidad" aria-label="Default select example">
                          <option value="" selected>---</option>
                        </select>
                      </div>

                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">Calle</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                          <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">N. Ext</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                          <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">N. Int</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                          <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">Colonia</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                          <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">Ciudad</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                          <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">C.P</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                          <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>

                      <div class="col-12 col-lg-6">
                        <button class="btn btn-primary px-4" onclick="stepper3.next()">Next<i class='bx bx-right-arrow-alt ms-2'></i></button>
                      </div>
                    </div><!---end row-->

                  </div>

                  <div id="test-vl-2" role="tabpane3" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger2">

                    <h5 class="mb-1">Datos Económicos</h5>
                    <p class="mb-4"></p>

                    <div class="row g-3">
                      <div class="col-12 col-lg-4">
                        <label for="InputUsername" class="form-label">Profesión</label>
                        <select class="form-select" id="profesion" name="profesion" aria-label="Default select example">
                          <option selected>---</option>
                          <option value="empleado">Empleado</option>
                          <option value="empresario">Empresario</option>
                          <option value="inversionista">Inversionista</option>
                          <option value="jubilado">Jubilado</option>
                          <option value="otro">Otro</option>
                        </select>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="InputEmail2" class="form-label">Ocupación</label>
                        <input type="text" name="ocupacion" class="form-control" id="InputEmail2" placeholder="example@xyz.com">
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="InputEmail2" class="form-label">Puesto</label>
                        <input type="text" name="puesto" class="form-control" id="InputEmail2" placeholder="example@xyz.com">
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="InputPassword" class="form-label">Condición de Actividad</label>
                        <select class="form-select" id="condicionActiva" name="condicionActiva" aria-label="Default select example">
                          <option selected>---</option>
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
                        <input type="text" class="form-control" name="nombreEmpresa" id="InputConfirmPassword" value="">
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="InputConfirmPassword" class="form-label">Tipo de Empresa</label>
                        <select class="form-select" id="tipoEmpresa" name="tipoEmpresa" aria-label="Default select example">
                          <option selected>---</option>
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
                          <input type="text" class="form-control" name="calleEmpresa" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">N. Ext</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                          <input type="text" class="form-control" name="nextEmpresa" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">N. Int</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                          <input type="text" class="form-control" name="nintEmpresa" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">Colonia</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                          <input type="text" class="form-control" name="colEmpresa" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">Ciudad</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                          <input type="text" class="form-control" name="ciudadEmpresa" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">C.P</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                          <input type="text" class="form-control" name="cpEmpresa" aria-label="Username" aria-describedby="basic-addon1">
                        </div>



                      </div>
                      <h5 class="mb-1">Ingresos</h5>
                      <p class="mb-4"></p>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">Ingresos Mensual Promedio</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-coin"></i></span>
                          <input type="text" class="form-control" name="ingresoMensual" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-12 col-lg-4">
                        <label for="rfc" class="form-label">Ingresos Provenientes de:</label>
                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-coin"></i></span>
                          <select class="form-select" id="ingresoProvinientes" name="ingresoProvinientes" aria-label="Default select example">
                            <option selected>---</option>
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

                      <div class="col-12">
                        <div class="d-flex align-items-center gap-3">
                          <button class="btn btn-outline-secondary px-4" onclick="stepper3.previous()"><i class='bx bx-left-arrow-alt me-2'></i>Previous</button>
                          <button class="btn btn-primary px-4" onclick="stepper3.next()">Next<i class='bx bx-right-arrow-alt ms-2'></i></button>
                        </div>
                      </div>
                    </div><!---end row-->

                  </div>

                  <div id="test-vl-3" role="tabpane3" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger3">
                    <h5 class="mb-1">Beneficiarios</h5>
                    <p class="mb-4"></p>

                    <div class="row g-3">
                      <div class="col-12 col-lg-6">
                        <label for="nombreBeneficiario" class="form-label">Nombre Completo del Beneficiario</label>
                        <input type="text" class="form-control" id="nombreBeneficiario" placeholder="">
                      </div>
                      <div class="col-12 col-lg-6">
                        <label for="pApellidoBeneficiario" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="pApellidoBeneficiario" placeholder="">
                      </div>
                      <div class="col-12 col-lg-6">
                        <label for="sApellidoBeneficiario" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="sApellidoBeneficiario" placeholder="">
                      </div>
                      <div class="col-12 col-lg-6">
                        <label for="parentezco" class="form-label">Parentezco</label>
                        <select class="form-select" id="parentezco">
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
                        <input type="text" class="form-control" id="porcentajeBeneficiario">
                      </div>
                      <div class="col-12 col-lg-6">
                        <label for="fNacBen" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fNacBen">
                      </div>
                      <div class="col-12 col-lg-6">
                        <label for="telBeneficiario" class="form-label">Teléfono Beneficiario</label>
                        <input type="text" class="form-control" id="telBeneficiario">
                      </div>
                      <div class="col-12 col-lg-6">
                        <label for="dirBeneficiario" class="form-label">Dirección Beneficiario</label>
                        <input type="text" class="form-control" id="dirBeneficiario">
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
                    <div class="col-12">
                      <div class="d-flex align-items-center gap-3">
                        <button class="btn btn-outline-secondary px-4" onclick="stepper3.previous()"><i class='bx bx-left-arrow-alt me-2'></i>Previous</button>
                        <button class="btn btn-primary px-4" onclick="stepper3.next()">Next<i class='bx bx-right-arrow-alt ms-2'></i></button>
                      </div>
                    </div>
                  </div>

                  <div id="test-vl-4" role="tabpane3" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger4">
                    <h5 class="mb-1">Transaccionalidad</h5>

                    <div class="container">
                      <div class="row">
                        <div class="col-12 col-lg-6">
                          <label for="recursosProvienen" class="form-label">Los recursos provienen de:</label>
                          <select class="form-select" id="recursosProvienen" name="recursosProvienen">
                            <option value="RECURSOS DE TERCEROS">RECURSOS DE TERCEROS</option>
                            <option value="OTROS RECURSOS">OTROS RECURSOS</option>
                          </select>
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="porcentajeTerceros" class="form-label">Porcentaje Terceros %</label>
                          <input type="number" class="form-control" id="porcentajeTerceros" name="porcentajeTerceros" value="100">
                        </div>
                      </div>

                      <div class="row mt-3">
                        <h5>Datos de terceros (solo es recursos de terceros).</h5>
                        <div class="col-12 col-lg-4">
                          <label for="nombreBeneficiario" class="form-label">Nombre Completo (Beneficiario)</label>
                          <input type="text" class="form-control" id="nombreBeneficiario" name="nombreBeneficiario" placeholder="Introduce Nombres">
                        </div>
                        <div class="col-12 col-lg-4">
                          <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                          <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Introduce Apellido Paterno">
                        </div>
                        <div class="col-12 col-lg-4">
                          <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                          <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Introduce Apellido Materno">
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-lg-6">
                          <label for="personalidadJuridica" class="form-label">Personalidad Jurídica</label>
                          <input type="text" class="form-control" id="personalidadJuridica" name="personalidadJuridica">
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="porcentaje" class="form-label">Porcentaje %</label>
                          <input type="number" class="form-control" id="porcentaje" name="porcentaje">
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-lg-6">
                          <label for="tipoIdentificacion" class="form-label">Tipo de Identificación Oficial</label>
                          <select class="form-select" id="tipoIdentificacion" name="tipoIdentificacion">
                            <option value="INE">INE</option>
                            <option value="PASAPORTE">PASAPORTE</option>
                          </select>
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="numeroIdentificacion" class="form-label">Nº. Identificación</label>
                          <input type="text" class="form-control" id="numeroIdentificacion" name="numeroIdentificacion">
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12 col-lg-6">
                          <label for="nacionalidad" class="form-label">Nacionalidad</label>
                          <select class="form-select" id="nacionalidad" name="nacionalidad">
                            <option value="MEXICANA">MEXICANA</option>
                            <option value="EXTRANJERA">EXTRANJERA</option>
                          </select>
                        </div>
                        <div class="col-12 col-lg-6">
                          <label for="telBeneficiario" class="form-label">Teléfono Beneficiario</label>
                          <input type="text" class="form-control" id="telBeneficiario" name="telBeneficiario">
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
                    <div class="col-12">
                      <div class="d-flex align-items-center gap-3">
                        <button class="btn btn-outline-secondary px-4" onclick="stepper3.previous()"><i class='bx bx-left-arrow-alt me-2'></i>Previous</button>
                        <button class="btn btn-primary px-4" onclick="stepper3.next()">Next<i class='bx bx-right-arrow-alt ms-2'></i></button>
                      </div>
                    </div>
                  </div>
                  <div id="test-vl-6" role="tabpane3" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger4">
                    <h5 class="mb-1">Documentación</h5>

                    <div class="container mt-4">
                      <div class="row">
                        <!-- INE Anverso -->
                        <div class="col-md-3 mb-4">
                          <div class="document-card">
                            <div class="document-icon">📇</div>
                            <div class="document-title">INE Anverso</div>
                            <input type="file" class="form-control mt-3" onchange="uploadFile(event, 'INE Anverso')" />
                          </div>
                        </div>
                        <!-- INE Reverso -->
                        <div class="col-md-3 mb-4">
                          <div class="document-card">
                            <div class="document-icon">📇</div>
                            <div class="document-title">INE Reverso</div>
                            <input type="file" class="form-control mt-3" onchange="uploadFile(event, 'INE Reverso')" />
                          </div>
                        </div>
                        <!-- Comprobante de Domicilio -->
                        <div class="col-md-3 mb-4">
                          <div class="document-card">
                            <div class="document-icon">📄</div>
                            <div class="document-title">Comprobante de Domicilio</div>
                            <input type="file" class="form-control mt-3" onchange="uploadFile(event, 'Comprobante de Domicilio')" />
                          </div>
                        </div>
                        <!-- CURP -->
                        <div class="col-md-3 mb-4">
                          <div class="document-card">
                            <div class="document-icon">🆔</div>
                            <div class="document-title">CURP</div>
                            <input type="file" class="form-control mt-3" onchange="uploadFile(event, 'CURP')" />
                          </div>
                        </div>
                        <!-- Estado de Cuenta -->
                        <div class="col-md-3 mb-4">
                          <div class="document-card">
                            <div class="document-icon">📑</div>
                            <div class="document-title">Estado de Cuenta</div>
                            <input type="file" class="form-control mt-3" onchange="uploadFile(event, 'Estado de Cuenta')" />
                          </div>
                        </div>
                        <!-- Constancia Fiscal -->
                        <div class="col-md-3 mb-4">
                          <div class="document-card">
                            <div class="document-icon">📜</div>
                            <div class="document-title">Constancia Fiscal</div>
                            <input type="file" class="form-control mt-3" onchange="uploadFile(event, 'Constancia Fiscal')" />
                          </div>
                        </div>
                        <!-- Cuestionario de Inversionista -->
                        <div class="col-md-3 mb-4">
                          <div class="document-card">
                            <div class="document-icon">📝</div>
                            <div class="document-title">Cuestionario de Inversionista</div>
                            <input type="file" class="form-control mt-3" onchange="uploadFile(event, 'Cuestionario de Inversionista')" />
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-flex align-items-center gap-3">
                          <button class="btn btn-outline-secondary px-4" onclick="stepper3.previous()"><i class='bx bx-left-arrow-alt me-2'></i>Previous</button>
                          <button class="btn btn-primary px-4" onclick="stepper3.next()">Next<i class='bx bx-right-arrow-alt ms-2'></i></button>
                        </div>
                      </div>
                    </div>
                  </div>



                  <!---end row-->

              </div>
              <div id="test-vl-5" role="tabpane3" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger4">
                <h5 class="mb-1">Datos Generales Cotitular</h5>


                <div class="row g-3">
                  <div class="col-12 col-lg-4">
                    <label for="nombreCotitular" class="form-label">Cotitular</label>
                    <input type="text" class="form-control" id="nombreCotitular" name="nombreCotitular" placeholder="Nombre(s)">
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="primerApellido" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="primerApellidoCotitular" name="primerApellidoCotitular" placeholder="Primer Apellido">
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="segundoApellido" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="segundoApellidoCotitular" name="segundoApellidoCotitular" placeholder="Segundo Apellido">
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="Genero" class="form-label">Género</label>
                    <select class="form-select" id="generoCotitular" name="generoCotitular" aria-label="Default select example">
                      <option selected>---</option>
                      <option value="M">Masculino</option>
                      <option value="F">Femenino</option>

                    </select>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="InputCountry" class="form-label">Identificación Oficial</label>
                    <select class="form-select" id="identificacionOficialCotitular" name="identificacionOficialCotitular" aria-label="Default select example">
                      <option selected>---</option>
                      <option value="1">Ine</option>
                      <option value="2">Pasaporte</option>
                      <option value="3">Cedula Profesional</option>
                    </select>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="serieNoIdentificacion" class="form-label">Curp</label>
                    <input type="text" class="form-control" id="curpCotitular" name="curpCotitular" placeholder="Número de Identificación">
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="rfc" class="form-label">RFC</label>
                    <input type="text" class="form-control" id="rfcCotitular" name="rfcCotitular" placeholder="Escribe">
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="fNac" class="form-label">Fecha de Nacimiento</label>
                    <input type="text" class="form-control datepicker " id="fNacCotitular" name="fNacCotitular" placeholder="Ingresa Fecha de Nacimiento">
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="edad" class="form-label">Fecha de Nacimiento</label>
                    <input type="number" class="form-control datepicker " id="edadCotitular" name="edadCotitular" placeholder="Ingresa Edad">
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="religion" class="form-label">Religión</label>
                    <input type="text" class="form-control" id="religionCotitular" name="religionCotitular" placeholder="Ingresa Religión">
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="paisNac" class="form-label">Pais de Nacimiento</label>
                    <select class="form-select" id="paisNacCotitular" name="paisNacCotitular" aria-label="Default select example">
                      <option selected>---</option>
                      <option value="Afganistán">Afganistán</option>
                      <option value="Albania">Albania</option>
                      <option value="Alemania">Alemania</option>
                      <option value="Andorra">Andorra</option>
                      <option value="Angola">Angola</option>
                      <option value="Antigua y Barbuda">Antigua y Barbuda</option>
                      <option value="Arabia Saudita">Arabia Saudita</option>
                      <option value="Argelia">Argelia</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Armenia">Armenia</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                      <option value="Azerbaiyán">Azerbaiyán</option>
                      <option value="Bahamas">Bahamas</option>
                      <option value="Bangladés">Bangladés</option>
                      <option value="Barbados">Barbados</option>
                      <option value="Baréin">Baréin</option>
                      <option value="Bélgica">Bélgica</option>
                      <option value="Belice">Belice</option>
                      <option value="Benín">Benín</option>
                      <option value="Bermuda">Bermuda</option>
                      <option value="Bielorrusia">Bielorrusia</option>
                      <option value="Bolivia">Bolivia</option>
                      <option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option>
                      <option value="Botsuana">Botsuana</option>
                      <option value="Brasil">Brasil</option>
                      <option value="Brunéi">Brunéi</option>
                      <option value="Bulgaria">Bulgaria</option>
                      <option value="Burkina Faso">Burkina Faso</option>
                      <option value="Burundi">Burundi</option>
                      <option value="Bután">Bután</option>
                      <option value="Cabo Verde">Cabo Verde</option>
                      <option value="Camboya">Camboya</option>
                      <option value="Camerún">Camerún</option>
                      <option value="Canadá">Canadá</option>
                      <option value="Catar">Catar</option>
                      <option value="Chad">Chad</option>
                      <option value="Chile">Chile</option>
                      <option value="China">China</option>
                      <option value="Chipre">Chipre</option>
                      <option value="Colombia">Colombia</option>
                      <option value="Comoras">Comoras</option>
                      <option value="Congo, República Democrática del">Congo, República Democrática del</option>
                      <option value="Congo, República de">Congo, República de</option>
                      <option value="Corea del Norte">Corea del Norte</option>
                      <option value="Corea del Sur">Corea del Sur</option>
                      <option value="Costa de Marfil">Costa de Marfil</option>
                      <option value="Costa Rica">Costa Rica</option>
                      <option value="Croacia">Croacia</option>
                      <option value="Cuba">Cuba</option>
                      <option value="Curazao">Curazao</option>
                      <option value="Dinamarca">Dinamarca</option>
                      <option value="Djibouti">Djibouti</option>
                      <option value="Dominica">Dominica</option>
                      <option value="Ecuador">Ecuador</option>
                      <option value="Egipto">Egipto</option>
                      <option value="El Salvador">El Salvador</option>
                      <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
                      <option value="Eritrea">Eritrea</option>
                      <option value="Eslovaquia">Eslovaquia</option>
                      <option value="Eslovenia">Eslovenia</option>
                      <option value="España">España</option>
                      <option value="Estados Unidos">Estados Unidos</option>
                      <option value="Estonia">Estonia</option>
                      <option value="Etiopía">Etiopía</option>
                      <option value="Filipinas">Filipinas</option>
                      <option value="Finlandia">Finlandia</option>
                      <option value="Fiyi">Fiyi</option>
                      <option value="Francia">Francia</option>
                      <option value="Gabón">Gabón</option>
                      <option value="Gambia">Gambia</option>
                      <option value="Georgia">Georgia</option>
                      <option value="Ghana">Ghana</option>
                      <option value="Granada">Granada</option>
                      <option value="Grecia">Grecia</option>
                      <option value="Groenlandia">Groenlandia</option>
                      <option value="Guam">Guam</option>
                      <option value="Guatemala">Guatemala</option>
                      <option value="Guinea">Guinea</option>
                      <option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
                      <option value="Guinea-Bisáu">Guinea-Bisáu</option>
                      <option value="Guyana">Guyana</option>
                      <option value="Haiti">Haití</option>
                      <option value="Honduras">Honduras</option>
                      <option value="Hong Kong">Hong Kong</option>
                      <option value="Hungria">Hungría</option>
                      <option value="India">India</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="Irak">Irak</option>
                      <option value="Iran">Irán</option>
                      <option value="Irlanda">Irlanda</option>
                      <option value="Islandia">Islandia</option>
                      <option value="Islas Caiman">Islas Caimán</option>
                      <option value="Islas Faroe">Islas Faroe</option>
                      <option value="Islas Marianas del Norte">Islas Marianas del Norte</option>
                      <option value="Islas Marshall">Islas Marshall</option>
                      <option value="Islas Salomon">Islas Salomón</option>
                      <option value="Islas Vírgenes Britanicas">Islas Vírgenes Británicas</option>
                      <option value="Islas Virgenes de los Estados Unidos">Islas Vírgenes de los Estados Unidos</option>
                      <option value="Israel">Israel</option>
                      <option value="Italia">Italia</option>
                      <option value="Jamaica">Jamaica</option>
                      <option value="Japon">Japón</option>
                      <option value="Jordania">Jordania</option>
                      <option value="Kazajistan">Kazajistán</option>
                      <option value="Kenia">Kenia</option>
                      <option value="Kirguistan">Kirguistán</option>
                      <option value="Kiribati">Kiribati</option>
                      <option value="Kosovo">Kosovo</option>
                      <option value="Kuwait">Kuwait</option>
                      <option value="Laos">Laos</option>
                      <option value="Lesoto">Lesoto</option>
                      <option value="Letonia">Letonia</option>
                      <option value="Libano">Líbano</option>
                      <option value="Liberia">Liberia</option>
                      <option value="Libia">Libia</option>
                      <option value="Liechtenstein">Liechtenstein</option>
                      <option value="Lituania">Lituania</option>
                      <option value="Luxemburgo">Luxemburgo</option>
                      <option value="Macedonia">Macedonia</option>
                      <option value="Madagascar">Madagascar</option>
                      <option value="Malasia">Malasia</option>
                      <option value="Malaui">Malaui</option>
                      <option value="Maldivas">Maldivas</option>
                      <option value="Mali">Malí</option>
                      <option value="Malta">Malta</option>
                      <option value="Marruecos">Marruecos</option>
                      <option value="Mauricio">Mauricio</option>
                      <option value="Mauritania">Mauritania</option>
                      <option value="Mexico">México</option>
                      <option value="Micronesia">Micronesia</option>
                      <option value="Moldavia">Moldavia</option>
                      <option value="Monaco">Mónaco</option>
                      <option value="Mongolia">Mongolia</option>
                      <option value="Montenegro">Montenegro</option>
                      <option value="Mozambique">Mozambique</option>
                      <option value="Myanmar">Myanmar</option>
                      <option value="Namibia">Namibia</option>
                      <option value="Nauru">Nauru</option>
                      <option value="Nepal">Nepal</option>
                      <option value="Nicaragua">Nicaragua</option>
                      <option value="Niger">Níger</option>
                      <option value="Nigeria">Nigeria</option>
                      <option value="Noruega">Noruega</option>
                      <option value="Nueva Zelanda">Nueva Zelanda</option>
                      <option value="Oman">Omán</option>
                      <option value="Paises Bajos">Países Bajos</option>
                      <option value="Pakistan">Pakistán</option>
                      <option value="Palaos">Palaos</option>
                      <option value="Palestina">Palestina</option>
                      <option value="Panama">Panamá</option>
                      <option value="Papua Nueva Guinea">Papúa Nueva Guinea</option>
                      <option value="Paraguay">Paraguay</option>
                      <option value="Peru">Perú</option>
                      <option value="Polinesia Francesa">Polinesia Francesa</option>
                      <option value="Polonia">Polonia</option>
                      <option value="Portugal">Portugal</option>
                      <option value="Puerto Rico">Puerto Rico</option>
                      <option value="Qatar">Qatar</option>
                      <option value="Reino Unido">Reino Unido</option>
                      <option value="Republica Centroafricana">República Centroafricana</option>
                      <option value="Republica Checa">República Checa</option>
                      <option value="Republica Democrática del Congo">República Democrática del Congo</option>
                      <option value="Republica Dominicana">República Dominicana</option>
                      <option value="Ruanda">Ruanda</option>
                      <option value="Rumania">Rumania</option>
                      <option value="Rusia">Rusia</option>
                      <option value="Samoa">Samoa</option>
                      <option value="Samoa Americana">Samoa Americana</option>
                      <option value="San Cristobal y Nieves">San Cristóbal y Nieves</option>
                      <option value="San Marino">San Marino</option>
                      <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
                      <option value="Santa Lucia">Santa Lucía</option>
                      <option value="Santo Tome y Príncipe">Santo Tomé y Príncipe</option>
                      <option value="Senegal">Senegal</option>
                      <option value="Serbia">Serbia</option>
                      <option value="Seychelles">Seychelles</option>
                      <option value="Sierra Leona">Sierra Leona</option>
                      <option value="Singapur">Singapur</option>
                      <option value="Sint Maarten">Sint Maarten</option>
                      <option value="Siria">Siria</option>
                      <option value="Somalia">Somalia</option>
                      <option value="Sri Lanka">Sri Lanka</option>
                      <option value="Suazilandia">Suazilandia</option>
                      <option value="Sudáfrica">Sudáfrica</option>
                      <option value="Sudan">Sudán</option>
                      <option value="Sudan del Sur">Sudán del Sur</option>
                      <option value="Suecia">Suecia</option>
                      <option value="Suiza">Suiza</option>
                      <option value="Surinam">Surinam</option>
                      <option value="Tailandia">Tailandia</option>
                      <option value="Taiwan">Taiwán</option>
                      <option value="Tanzania">Tanzania</option>
                      <option value="Tayikistan">Tayikistán</option>
                      <option value="Timor Oriental">Timor Oriental</option>
                      <option value="Togo">Togo</option>
                      <option value="Tonga">Tonga</option>
                      <option value="Trinidad y Tobago">Trinidad y Tobago</option>
                      <option value="Tunez">Túnez</option>
                      <option value="Turkmenistan">Turkmenistán</option>
                      <option value="Turquia">Turquía</option>
                      <option value="Tuvalu">Tuvalu</option>
                      <option value="Ucrania">Ucrania</option>
                      <option value="Uganda">Uganda</option>
                      <option value="Uruguay">Uruguay</option>
                      <option value="Uzbekistan">Uzbekistán</option>
                      <option value="Vanuatu">Vanuatu</option>
                      <option value="Vaticano">Vaticano</option>
                      <option value="Venezuela">Venezuela</option>
                      <option value="Vietnam">Vietnam</option>
                      <option value="Yemen">Yemen</option>
                      <option value="Yibuti">Yibuti</option>
                      <option value="Zambia">Zambia</option>
                      <option value="Zimbabue">Zimbabue</option>
                    </select>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="nacionalidad" class="form-label">Nacionalidad</label>
                    <select class="form-select" id="nacionalidadCotitular" name="nacionalidadCotitular" aria-label="Default select example">
                      <option selected>---</option>
                      <option value="Afganistán">Afganistán</option>
                      <option value="Albania">Albania</option>
                      <option value="Alemania">Alemania</option>
                      <option value="Andorra">Andorra</option>
                      <option value="Angola">Angola</option>
                      <option value="Antigua y Barbuda">Antigua y Barbuda</option>
                      <option value="Arabia Saudita">Arabia Saudita</option>
                      <option value="Argelia">Argelia</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Armenia">Armenia</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                      <option value="Azerbaiyán">Azerbaiyán</option>
                      <option value="Bahamas">Bahamas</option>
                      <option value="Bangladés">Bangladés</option>
                      <option value="Barbados">Barbados</option>
                      <option value="Baréin">Baréin</option>
                      <option value="Bélgica">Bélgica</option>
                      <option value="Belice">Belice</option>
                      <option value="Benín">Benín</option>
                      <option value="Bermuda">Bermuda</option>
                      <option value="Bielorrusia">Bielorrusia</option>
                      <option value="Bolivia">Bolivia</option>
                      <option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option>
                      <option value="Botsuana">Botsuana</option>
                      <option value="Brasil">Brasil</option>
                      <option value="Brunéi">Brunéi</option>
                      <option value="Bulgaria">Bulgaria</option>
                      <option value="Burkina Faso">Burkina Faso</option>
                      <option value="Burundi">Burundi</option>
                      <option value="Bután">Bután</option>
                      <option value="Cabo Verde">Cabo Verde</option>
                      <option value="Camboya">Camboya</option>
                      <option value="Camerún">Camerún</option>
                      <option value="Canadá">Canadá</option>
                      <option value="Catar">Catar</option>
                      <option value="Chad">Chad</option>
                      <option value="Chile">Chile</option>
                      <option value="China">China</option>
                      <option value="Chipre">Chipre</option>
                      <option value="Colombia">Colombia</option>
                      <option value="Comoras">Comoras</option>
                      <option value="Congo, República Democrática del">Congo, República Democrática del</option>
                      <option value="Congo, República de">Congo, República de</option>
                      <option value="Corea del Norte">Corea del Norte</option>
                      <option value="Corea del Sur">Corea del Sur</option>
                      <option value="Costa de Marfil">Costa de Marfil</option>
                      <option value="Costa Rica">Costa Rica</option>
                      <option value="Croacia">Croacia</option>
                      <option value="Cuba">Cuba</option>
                      <option value="Curazao">Curazao</option>
                      <option value="Dinamarca">Dinamarca</option>
                      <option value="Djibouti">Djibouti</option>
                      <option value="Dominica">Dominica</option>
                      <option value="Ecuador">Ecuador</option>
                      <option value="Egipto">Egipto</option>
                      <option value="El Salvador">El Salvador</option>
                      <option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
                      <option value="Eritrea">Eritrea</option>
                      <option value="Eslovaquia">Eslovaquia</option>
                      <option value="Eslovenia">Eslovenia</option>
                      <option value="España">España</option>
                      <option value="Estados Unidos">Estados Unidos</option>
                      <option value="Estonia">Estonia</option>
                      <option value="Etiopía">Etiopía</option>
                      <option value="Filipinas">Filipinas</option>
                      <option value="Finlandia">Finlandia</option>
                      <option value="Fiyi">Fiyi</option>
                      <option value="Francia">Francia</option>
                      <option value="Gabón">Gabón</option>
                      <option value="Gambia">Gambia</option>
                      <option value="Georgia">Georgia</option>
                      <option value="Ghana">Ghana</option>
                      <option value="Granada">Granada</option>
                      <option value="Grecia">Grecia</option>
                      <option value="Groenlandia">Groenlandia</option>
                      <option value="Guam">Guam</option>
                      <option value="Guatemala">Guatemala</option>
                      <option value="Guinea">Guinea</option>
                      <option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
                      <option value="Guinea-Bisáu">Guinea-Bisáu</option>
                      <option value="Guyana">Guyana</option>
                      <option value="Haiti">Haití</option>
                      <option value="Honduras">Honduras</option>
                      <option value="Hong Kong">Hong Kong</option>
                      <option value="Hungria">Hungría</option>
                      <option value="India">India</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="Irak">Irak</option>
                      <option value="Iran">Irán</option>
                      <option value="Irlanda">Irlanda</option>
                      <option value="Islandia">Islandia</option>
                      <option value="Islas Caiman">Islas Caimán</option>
                      <option value="Islas Faroe">Islas Faroe</option>
                      <option value="Islas Marianas del Norte">Islas Marianas del Norte</option>
                      <option value="Islas Marshall">Islas Marshall</option>
                      <option value="Islas Salomon">Islas Salomón</option>
                      <option value="Islas Vírgenes Britanicas">Islas Vírgenes Británicas</option>
                      <option value="Islas Virgenes de los Estados Unidos">Islas Vírgenes de los Estados Unidos</option>
                      <option value="Israel">Israel</option>
                      <option value="Italia">Italia</option>
                      <option value="Jamaica">Jamaica</option>
                      <option value="Japon">Japón</option>
                      <option value="Jordania">Jordania</option>
                      <option value="Kazajistan">Kazajistán</option>
                      <option value="Kenia">Kenia</option>
                      <option value="Kirguistan">Kirguistán</option>
                      <option value="Kiribati">Kiribati</option>
                      <option value="Kosovo">Kosovo</option>
                      <option value="Kuwait">Kuwait</option>
                      <option value="Laos">Laos</option>
                      <option value="Lesoto">Lesoto</option>
                      <option value="Letonia">Letonia</option>
                      <option value="Libano">Líbano</option>
                      <option value="Liberia">Liberia</option>
                      <option value="Libia">Libia</option>
                      <option value="Liechtenstein">Liechtenstein</option>
                      <option value="Lituania">Lituania</option>
                      <option value="Luxemburgo">Luxemburgo</option>
                      <option value="Macedonia">Macedonia</option>
                      <option value="Madagascar">Madagascar</option>
                      <option value="Malasia">Malasia</option>
                      <option value="Malaui">Malaui</option>
                      <option value="Maldivas">Maldivas</option>
                      <option value="Mali">Malí</option>
                      <option value="Malta">Malta</option>
                      <option value="Marruecos">Marruecos</option>
                      <option value="Mauricio">Mauricio</option>
                      <option value="Mauritania">Mauritania</option>
                      <option value="Mexico">México</option>
                      <option value="Micronesia">Micronesia</option>
                      <option value="Moldavia">Moldavia</option>
                      <option value="Monaco">Mónaco</option>
                      <option value="Mongolia">Mongolia</option>
                      <option value="Montenegro">Montenegro</option>
                      <option value="Mozambique">Mozambique</option>
                      <option value="Myanmar">Myanmar</option>
                      <option value="Namibia">Namibia</option>
                      <option value="Nauru">Nauru</option>
                      <option value="Nepal">Nepal</option>
                      <option value="Nicaragua">Nicaragua</option>
                      <option value="Niger">Níger</option>
                      <option value="Nigeria">Nigeria</option>
                      <option value="Noruega">Noruega</option>
                      <option value="Nueva Zelanda">Nueva Zelanda</option>
                      <option value="Oman">Omán</option>
                      <option value="Paises Bajos">Países Bajos</option>
                      <option value="Pakistan">Pakistán</option>
                      <option value="Palaos">Palaos</option>
                      <option value="Palestina">Palestina</option>
                      <option value="Panama">Panamá</option>
                      <option value="Papua Nueva Guinea">Papúa Nueva Guinea</option>
                      <option value="Paraguay">Paraguay</option>
                      <option value="Peru">Perú</option>
                      <option value="Polinesia Francesa">Polinesia Francesa</option>
                      <option value="Polonia">Polonia</option>
                      <option value="Portugal">Portugal</option>
                      <option value="Puerto Rico">Puerto Rico</option>
                      <option value="Qatar">Qatar</option>
                      <option value="Reino Unido">Reino Unido</option>
                      <option value="Republica Centroafricana">República Centroafricana</option>
                      <option value="Republica Checa">República Checa</option>
                      <option value="Republica Democrática del Congo">República Democrática del Congo</option>
                      <option value="Republica Dominicana">República Dominicana</option>
                      <option value="Ruanda">Ruanda</option>
                      <option value="Rumania">Rumania</option>
                      <option value="Rusia">Rusia</option>
                      <option value="Samoa">Samoa</option>
                      <option value="Samoa Americana">Samoa Americana</option>
                      <option value="San Cristobal y Nieves">San Cristóbal y Nieves</option>
                      <option value="San Marino">San Marino</option>
                      <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
                      <option value="Santa Lucia">Santa Lucía</option>
                      <option value="Santo Tome y Príncipe">Santo Tomé y Príncipe</option>
                      <option value="Senegal">Senegal</option>
                      <option value="Serbia">Serbia</option>
                      <option value="Seychelles">Seychelles</option>
                      <option value="Sierra Leona">Sierra Leona</option>
                      <option value="Singapur">Singapur</option>
                      <option value="Sint Maarten">Sint Maarten</option>
                      <option value="Siria">Siria</option>
                      <option value="Somalia">Somalia</option>
                      <option value="Sri Lanka">Sri Lanka</option>
                      <option value="Suazilandia">Suazilandia</option>
                      <option value="Sudáfrica">Sudáfrica</option>
                      <option value="Sudan">Sudán</option>
                      <option value="Sudan del Sur">Sudán del Sur</option>
                      <option value="Suecia">Suecia</option>
                      <option value="Suiza">Suiza</option>
                      <option value="Surinam">Surinam</option>
                      <option value="Tailandia">Tailandia</option>
                      <option value="Taiwan">Taiwán</option>
                      <option value="Tanzania">Tanzania</option>
                      <option value="Tayikistan">Tayikistán</option>
                      <option value="Timor Oriental">Timor Oriental</option>
                      <option value="Togo">Togo</option>
                      <option value="Tonga">Tonga</option>
                      <option value="Trinidad y Tobago">Trinidad y Tobago</option>
                      <option value="Tunez">Túnez</option>
                      <option value="Turkmenistan">Turkmenistán</option>
                      <option value="Turquia">Turquía</option>
                      <option value="Tuvalu">Tuvalu</option>
                      <option value="Ucrania">Ucrania</option>
                      <option value="Uganda">Uganda</option>
                      <option value="Uruguay">Uruguay</option>
                      <option value="Uzbekistan">Uzbekistán</option>
                      <option value="Vanuatu">Vanuatu</option>
                      <option value="Vaticano">Vaticano</option>
                      <option value="Venezuela">Venezuela</option>
                      <option value="Vietnam">Vietnam</option>
                      <option value="Yemen">Yemen</option>
                      <option value="Yibuti">Yibuti</option>
                      <option value="Zambia">Zambia</option>
                      <option value="Zimbabue">Zimbabue</option>
                    </select>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="estCivil" class="form-label">Estado Civil</label>
                    <select class="form-select" id="estCivilCotitular" name="estCivil" aCotitularria-label="Default select example">
                      <option selected>---</option>
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
                      <input type="text" class="form-control" name="telCelCotitular" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="rfc" class="form-label">Teléfono Casa</label>
                    <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                      <input type="text" class="form-control" name="telCasaCotitular" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="rfc" class="form-label">Teléfono Oficina</label>
                    <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                      <input type="text" class="form-control" name="telOfiCotitular" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="rfc" class="form-label">Teléfono Otro</label>
                    <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                      <input type="text" class="form-control" name="telOtroCotitular" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>

                  <h5 class="mb-1">Domicilio Actual</h5>
                  <p class="mb-4"></p>

                  <div class="col-12 col-lg-3">
                    <label for="estCivil" class="form-label">Estado/Mpio/Localidad</label>
                  </div>
                  <div class="col-12 col-lg-3">
                    <select class="form-select" id="estadoCotitular" name="estadoCotitular" aria-label="Default select example">
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
                      <input type="text" class="form-control" name="calleCotitular" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="rfc" class="form-label">N. Ext</label>
                    <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                      <input type="text" class="form-control" name="noExtCotitular" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="rfc" class="form-label">N. Int</label>
                    <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                      <input type="text" class="form-control" name="noIntCotitular" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="rfc" class="form-label">Colonia</label>
                    <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                      <input type="text" class="form-control" name="coloniaCotitular" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="rfc" class="form-label">Ciudad</label>
                    <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                      <input type="text" class="form-control" name="ciudadCotitular" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>
                  <div class="col-12 col-lg-4">
                    <label for="rfc" class="form-label">C.P</label>
                    <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                      <input type="text" class="form-control" name="cpCotitular" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                  </div>


                  <div class="col-12">
                    <div class="d-flex align-items-center gap-3">
                      <button class="btn btn-outline-secondary px-4" onclick="stepper3.previous()"><i class='bx bx-left-arrow-alt me-2'></i>Previous</button>
                      <button class="btn btn-primary px-4" onclick="stepper3.next()">Next<i class='bx bx-right-arrow-alt ms-2'></i></button>
                    </div>
                  </div>
                </div><!---end row-->

              </div>
              </form>
            </div>












            <!--end wrapper-->









          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <script>
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
    </script>
    <script>
      // Declarar la variable globalmente
      let beneficiaryCounter = 0;

      document.getElementById('addBeneficiaryButton').addEventListener('click', function() {
        const table = document.getElementById('beneficiaryTable');
        const tbody = table.querySelector('tbody');

        // Capturar los valores de los inputs
        const nombre = document.getElementById('nombreBeneficiario').value.trim();
        const pApellido = document.getElementById('pApellidoBeneficiario').value.trim();
        const sApellido = document.getElementById('sApellidoBeneficiario').value.trim();
        const parentezco = document.getElementById('parentezco').value.trim();
        const porcentaje = document.getElementById('porcentajeBeneficiario').value.trim();
        const fechaNac = document.getElementById('fNacBen').value.trim();
        const telefono = document.getElementById('telBeneficiario').value.trim();
        const direccion = document.getElementById('dirBeneficiario').value.trim();

        // Validar que los campos no estén vacíos (opcional)
        if (!nombre || !pApellido || !porcentaje) {
          alert('Por favor, completa al menos los campos requeridos (Nombre, Primer Apellido, Porcentaje).');
          return;
        }

        // Incrementar el contador
        beneficiaryCounter++;

        // Mostrar la tabla si está oculta
        table.classList.remove('d-none');

        // Crear una nueva fila con los valores capturados
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
      <td>${beneficiaryCounter}</td>
      <td><input type="text" class="form-control" name="nombreBeneficiario${beneficiaryCounter}" value="${nombre}" readonly></td>
      <td><input type="text" class="form-control" name="pApellidoBeneficiario${beneficiaryCounter}" value="${pApellido}" readonly></td>
      <td><input type="text" class="form-control" name="sApellidoBeneficiario${beneficiaryCounter}" value="${sApellido}" readonly></td>
      <td><input type="text" class="form-control" name="parentezco${beneficiaryCounter}" value="${parentezco}" readonly></td>
      <td><input type="text" class="form-control" name="porcentajeBeneficiario${beneficiaryCounter}" value="${porcentaje}" readonly></td>
      <td><input type="date" class="form-control" name="fNacBen${beneficiaryCounter}" value="${fechaNac}" readonly></td>
      <td><input type="text" class="form-control" name="telBeneficiario${beneficiaryCounter}" value="${telefono}" readonly></td>
      <td><input type="text" class="form-control" name="dirBeneficiario${beneficiaryCounter}" value="${direccion}" readonly></td>
    `;

        // Agregar la nueva fila al cuerpo de la tabla
        tbody.appendChild(newRow);

        // Limpiar los inputs
        document.getElementById('nombreBeneficiario').value = '';
        document.getElementById('pApellidoBeneficiario').value = '';
        document.getElementById('sApellidoBeneficiario').value = '';
        document.getElementById('parentezco').value = '';
        document.getElementById('porcentajeBeneficiario').value = '';
        document.getElementById('fNacBen').value = '';
        document.getElementById('telBeneficiario').value = '';
        document.getElementById('dirBeneficiario').value = '';
      });
    </script>