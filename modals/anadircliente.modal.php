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
                               <h5 class="mb-0 steper-title">Work Experience</h5>
                               <p class="mb-0 steper-sub-title">Experience Details</p>
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
                               <input type="text" class="form-control" id="nombre" placeholder="Escribe Nombre">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="LastName" class="form-label">Primer Apellido</label>
                               <input type="text" class="form-control" id="primerApellido" placeholder="Primer Apellido">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="LastName" class="form-label">Segundo Apellido</label>
                               <input type="text" class="form-control" id="segundoApellido" placeholder="Segundo Apellido">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="PhoneNumber" class="form-label">Curp</label>
                               <input type="text" class="form-control" id="curp" placeholder="Curp">
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
                               <select class="form-select" id="genero"  name="genero" aria-label="Default select example">
                                 <option selected>---</option>
                                 <option value="M">Masculino</option>
                                 <option value="F">Femenino</option>
                            
                                 </select>
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="serieNoIdentificacion" class="form-label">Curp</label>
                               <input type="text" class="form-control" id="serieNoIdentificacion"  name="serieNoIdentificacion" placeholder="Número de Identificación">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">RFC</label>
                               <input type="text" class="form-control" id="rfc"  name="rfc" placeholder="Escribe">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="fNac" class="form-label">Fecha de Nacimiento</label>
                               <input type="text" class="form-control datepicker " id="fNac"  name="fNac" placeholder="Ingresa Fecha de Nacimiento">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="edad" class="form-label">Fecha de Nacimiento</label>
                               <input type="number" class="form-control datepicker " id="edad"  name="edad" placeholder="Ingresa Edad">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="religion" class="form-label">Religión</label>
                               <input type="text" class="form-control" id="religion"  name="religion" placeholder="Ingresa Religión">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="paisNac" class="form-label">Pais de Nacimiento</label>
                               <select class="form-select" id="paisNac" name="paisNac" aria-label="Default select example">
                                 <option selected>---</option>
                                 <option value="Afganistán">Afganistán</option><option value="Albania">Albania</option><option value="Alemania">Alemania</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua y Barbuda">Antigua y Barbuda</option><option value="Arabia Saudita">Arabia Saudita</option><option value="Argelia">Argelia</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaiyán">Azerbaiyán</option><option value="Bahamas">Bahamas</option><option value="Bangladés">Bangladés</option><option value="Barbados">Barbados</option><option value="Baréin">Baréin</option><option value="Bélgica">Bélgica</option><option value="Belice">Belice</option><option value="Benín">Benín</option><option value="Bermuda">Bermuda</option><option value="Bielorrusia">Bielorrusia</option><option value="Bolivia">Bolivia</option><option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option><option value="Botsuana">Botsuana</option><option value="Brasil">Brasil</option><option value="Brunéi">Brunéi</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Bután">Bután</option><option value="Cabo Verde">Cabo Verde</option><option value="Camboya">Camboya</option><option value="Camerún">Camerún</option><option value="Canadá">Canadá</option><option value="Catar">Catar</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Chipre">Chipre</option><option value="Colombia">Colombia</option><option value="Comoras">Comoras</option><option value="Congo, República Democrática del">Congo, República Democrática del</option><option value="Congo, República de">Congo, República de</option><option value="Corea del Norte">Corea del Norte</option><option value="Corea del Sur">Corea del Sur</option><option value="Costa de Marfil">Costa de Marfil</option><option value="Costa Rica">Costa Rica</option><option value="Croacia">Croacia</option><option value="Cuba">Cuba</option><option value="Curazao">Curazao</option><option value="Dinamarca">Dinamarca</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Ecuador">Ecuador</option><option value="Egipto">Egipto</option><option value="El Salvador">El Salvador</option><option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option><option value="Eritrea">Eritrea</option><option value="Eslovaquia">Eslovaquia</option><option value="Eslovenia">Eslovenia</option><option value="España">España</option><option value="Estados Unidos">Estados Unidos</option><option value="Estonia">Estonia</option><option value="Etiopía">Etiopía</option><option value="Filipinas">Filipinas</option><option value="Finlandia">Finlandia</option><option value="Fiyi">Fiyi</option><option value="Francia">Francia</option><option value="Gabón">Gabón</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Ghana">Ghana</option><option value="Granada">Granada</option><option value="Grecia">Grecia</option><option value="Groenlandia">Groenlandia</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea Ecuatorial">Guinea Ecuatorial</option><option value="Guinea-Bisáu">Guinea-Bisáu</option><option value="Guyana">Guyana</option><option value="Haiti">Haití</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungria">Hungría</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Irak">Irak</option><option value="Iran">Irán</option><option value="Irlanda">Irlanda</option><option value="Islandia">Islandia</option><option value="Islas Caiman">Islas Caimán</option><option value="Islas Faroe">Islas Faroe</option><option value="Islas Marianas del Norte">Islas Marianas del Norte</option><option value="Islas Marshall">Islas Marshall</option><option value="Islas Salomon">Islas Salomón</option><option value="Islas Vírgenes Britanicas">Islas Vírgenes Británicas</option><option value="Islas Virgenes de los Estados Unidos">Islas Vírgenes de los Estados Unidos</option><option value="Israel">Israel</option><option value="Italia">Italia</option><option value="Jamaica">Jamaica</option><option value="Japon">Japón</option><option value="Jordania">Jordania</option><option value="Kazajistan">Kazajistán</option><option value="Kenia">Kenia</option><option value="Kirguistan">Kirguistán</option><option value="Kiribati">Kiribati</option><option value="Kosovo">Kosovo</option><option value="Kuwait">Kuwait</option><option value="Laos">Laos</option><option value="Lesoto">Lesoto</option><option value="Letonia">Letonia</option><option value="Libano">Líbano</option><option value="Liberia">Liberia</option><option value="Libia">Libia</option><option value="Liechtenstein">Liechtenstein</option><option value="Lituania">Lituania</option><option value="Luxemburgo">Luxemburgo</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malasia">Malasia</option><option value="Malaui">Malaui</option><option value="Maldivas">Maldivas</option><option value="Mali">Malí</option><option value="Malta">Malta</option><option value="Marruecos">Marruecos</option><option value="Mauricio">Mauricio</option><option value="Mauritania">Mauritania</option><option value="Mexico">México</option><option value="Micronesia">Micronesia</option><option value="Moldavia">Moldavia</option><option value="Monaco">Mónaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Níger</option><option value="Nigeria">Nigeria</option><option value="Noruega">Noruega</option><option value="Nueva Zelanda">Nueva Zelanda</option><option value="Oman">Omán</option><option value="Paises Bajos">Países Bajos</option><option value="Pakistan">Pakistán</option><option value="Palaos">Palaos</option><option value="Palestina">Palestina</option><option value="Panama">Panamá</option><option value="Papua Nueva Guinea">Papúa Nueva Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Perú</option><option value="Polinesia Francesa">Polinesia Francesa</option><option value="Polonia">Polonia</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reino Unido">Reino Unido</option><option value="Republica Centroafricana">República Centroafricana</option><option value="Republica Checa">República Checa</option><option value="Republica Democrática del Congo">República Democrática del Congo</option><option value="Republica Dominicana">República Dominicana</option><option value="Ruanda">Ruanda</option><option value="Rumania">Rumania</option><option value="Rusia">Rusia</option><option value="Samoa">Samoa</option><option value="Samoa Americana">Samoa Americana</option><option value="San Cristobal y Nieves">San Cristóbal y Nieves</option><option value="San Marino">San Marino</option><option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option><option value="Santa Lucia">Santa Lucía</option><option value="Santo Tome y Príncipe">Santo Tomé y Príncipe</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leona">Sierra Leona</option><option value="Singapur">Singapur</option><option value="Sint Maarten">Sint Maarten</option><option value="Siria">Siria</option><option value="Somalia">Somalia</option><option value="Sri Lanka">Sri Lanka</option><option value="Suazilandia">Suazilandia</option><option value="Sudáfrica">Sudáfrica</option><option value="Sudan">Sudán</option><option value="Sudan del Sur">Sudán del Sur</option><option value="Suecia">Suecia</option><option value="Suiza">Suiza</option><option value="Surinam">Surinam</option><option value="Tailandia">Tailandia</option><option value="Taiwan">Taiwán</option><option value="Tanzania">Tanzania</option><option value="Tayikistan">Tayikistán</option><option value="Timor Oriental">Timor Oriental</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad y Tobago">Trinidad y Tobago</option><option value="Tunez">Túnez</option><option value="Turkmenistan">Turkmenistán</option><option value="Turquia">Turquía</option><option value="Tuvalu">Tuvalu</option><option value="Ucrania">Ucrania</option><option value="Uganda">Uganda</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistán</option><option value="Vanuatu">Vanuatu</option><option value="Vaticano">Vaticano</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Yemen">Yemen</option><option value="Yibuti">Yibuti</option><option value="Zambia">Zambia</option><option value="Zimbabue">Zimbabue</option>
                                 </select>
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="nacionalidad" class="form-label">Nacionalidad</label>
                               <select class="form-select" id="nacionalidad" name="nacionalidad" aria-label="Default select example">
                                 <option selected>---</option>
                                 <option value="Afganistán">Afganistán</option><option value="Albania">Albania</option><option value="Alemania">Alemania</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua y Barbuda">Antigua y Barbuda</option><option value="Arabia Saudita">Arabia Saudita</option><option value="Argelia">Argelia</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaiyán">Azerbaiyán</option><option value="Bahamas">Bahamas</option><option value="Bangladés">Bangladés</option><option value="Barbados">Barbados</option><option value="Baréin">Baréin</option><option value="Bélgica">Bélgica</option><option value="Belice">Belice</option><option value="Benín">Benín</option><option value="Bermuda">Bermuda</option><option value="Bielorrusia">Bielorrusia</option><option value="Bolivia">Bolivia</option><option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option><option value="Botsuana">Botsuana</option><option value="Brasil">Brasil</option><option value="Brunéi">Brunéi</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Bután">Bután</option><option value="Cabo Verde">Cabo Verde</option><option value="Camboya">Camboya</option><option value="Camerún">Camerún</option><option value="Canadá">Canadá</option><option value="Catar">Catar</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Chipre">Chipre</option><option value="Colombia">Colombia</option><option value="Comoras">Comoras</option><option value="Congo, República Democrática del">Congo, República Democrática del</option><option value="Congo, República de">Congo, República de</option><option value="Corea del Norte">Corea del Norte</option><option value="Corea del Sur">Corea del Sur</option><option value="Costa de Marfil">Costa de Marfil</option><option value="Costa Rica">Costa Rica</option><option value="Croacia">Croacia</option><option value="Cuba">Cuba</option><option value="Curazao">Curazao</option><option value="Dinamarca">Dinamarca</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Ecuador">Ecuador</option><option value="Egipto">Egipto</option><option value="El Salvador">El Salvador</option><option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option><option value="Eritrea">Eritrea</option><option value="Eslovaquia">Eslovaquia</option><option value="Eslovenia">Eslovenia</option><option value="España">España</option><option value="Estados Unidos">Estados Unidos</option><option value="Estonia">Estonia</option><option value="Etiopía">Etiopía</option><option value="Filipinas">Filipinas</option><option value="Finlandia">Finlandia</option><option value="Fiyi">Fiyi</option><option value="Francia">Francia</option><option value="Gabón">Gabón</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Ghana">Ghana</option><option value="Granada">Granada</option><option value="Grecia">Grecia</option><option value="Groenlandia">Groenlandia</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea Ecuatorial">Guinea Ecuatorial</option><option value="Guinea-Bisáu">Guinea-Bisáu</option><option value="Guyana">Guyana</option><option value="Haiti">Haití</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungria">Hungría</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Irak">Irak</option><option value="Iran">Irán</option><option value="Irlanda">Irlanda</option><option value="Islandia">Islandia</option><option value="Islas Caiman">Islas Caimán</option><option value="Islas Faroe">Islas Faroe</option><option value="Islas Marianas del Norte">Islas Marianas del Norte</option><option value="Islas Marshall">Islas Marshall</option><option value="Islas Salomon">Islas Salomón</option><option value="Islas Vírgenes Britanicas">Islas Vírgenes Británicas</option><option value="Islas Virgenes de los Estados Unidos">Islas Vírgenes de los Estados Unidos</option><option value="Israel">Israel</option><option value="Italia">Italia</option><option value="Jamaica">Jamaica</option><option value="Japon">Japón</option><option value="Jordania">Jordania</option><option value="Kazajistan">Kazajistán</option><option value="Kenia">Kenia</option><option value="Kirguistan">Kirguistán</option><option value="Kiribati">Kiribati</option><option value="Kosovo">Kosovo</option><option value="Kuwait">Kuwait</option><option value="Laos">Laos</option><option value="Lesoto">Lesoto</option><option value="Letonia">Letonia</option><option value="Libano">Líbano</option><option value="Liberia">Liberia</option><option value="Libia">Libia</option><option value="Liechtenstein">Liechtenstein</option><option value="Lituania">Lituania</option><option value="Luxemburgo">Luxemburgo</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malasia">Malasia</option><option value="Malaui">Malaui</option><option value="Maldivas">Maldivas</option><option value="Mali">Malí</option><option value="Malta">Malta</option><option value="Marruecos">Marruecos</option><option value="Mauricio">Mauricio</option><option value="Mauritania">Mauritania</option><option value="Mexico">México</option><option value="Micronesia">Micronesia</option><option value="Moldavia">Moldavia</option><option value="Monaco">Mónaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Níger</option><option value="Nigeria">Nigeria</option><option value="Noruega">Noruega</option><option value="Nueva Zelanda">Nueva Zelanda</option><option value="Oman">Omán</option><option value="Paises Bajos">Países Bajos</option><option value="Pakistan">Pakistán</option><option value="Palaos">Palaos</option><option value="Palestina">Palestina</option><option value="Panama">Panamá</option><option value="Papua Nueva Guinea">Papúa Nueva Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Perú</option><option value="Polinesia Francesa">Polinesia Francesa</option><option value="Polonia">Polonia</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reino Unido">Reino Unido</option><option value="Republica Centroafricana">República Centroafricana</option><option value="Republica Checa">República Checa</option><option value="Republica Democrática del Congo">República Democrática del Congo</option><option value="Republica Dominicana">República Dominicana</option><option value="Ruanda">Ruanda</option><option value="Rumania">Rumania</option><option value="Rusia">Rusia</option><option value="Samoa">Samoa</option><option value="Samoa Americana">Samoa Americana</option><option value="San Cristobal y Nieves">San Cristóbal y Nieves</option><option value="San Marino">San Marino</option><option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option><option value="Santa Lucia">Santa Lucía</option><option value="Santo Tome y Príncipe">Santo Tomé y Príncipe</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leona">Sierra Leona</option><option value="Singapur">Singapur</option><option value="Sint Maarten">Sint Maarten</option><option value="Siria">Siria</option><option value="Somalia">Somalia</option><option value="Sri Lanka">Sri Lanka</option><option value="Suazilandia">Suazilandia</option><option value="Sudáfrica">Sudáfrica</option><option value="Sudan">Sudán</option><option value="Sudan del Sur">Sudán del Sur</option><option value="Suecia">Suecia</option><option value="Suiza">Suiza</option><option value="Surinam">Surinam</option><option value="Tailandia">Tailandia</option><option value="Taiwan">Taiwán</option><option value="Tanzania">Tanzania</option><option value="Tayikistan">Tayikistán</option><option value="Timor Oriental">Timor Oriental</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad y Tobago">Trinidad y Tobago</option><option value="Tunez">Túnez</option><option value="Turkmenistan">Turkmenistán</option><option value="Turquia">Turquía</option><option value="Tuvalu">Tuvalu</option><option value="Ucrania">Ucrania</option><option value="Uganda">Uganda</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistán</option><option value="Vanuatu">Vanuatu</option><option value="Vaticano">Vaticano</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Yemen">Yemen</option><option value="Yibuti">Yibuti</option><option value="Zambia">Zambia</option><option value="Zimbabue">Zimbabue</option>
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
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>
                             <div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Teléfono Casa</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>
                             <div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Teléfono Oficina</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>
                             <div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Teléfono Otro</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>

                      <h5 class="mb-1">Domicilio Actual</h5>
                           <p class="mb-4"></p>
                   
                           <div class="col-12 col-lg-3">
                           <label for="estCivil" class="form-label">Estado/Mpio/Localidad</label>  
                          </div>
                           <div class="col-12 col-lg-3">
                             
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
                                  <div class="col-12 col-lg-3">
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
                                  <div class="col-12 col-lg-3">
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
                               <label for="rfc" class="form-label">Calle</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>
                      <div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">N. Ext</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">N. Int</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Colonia</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Ciudad</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">C.P</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>

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
                               <select class="form-select" id="estCivil" name="estCivil" aria-label="Default select example">
                                 <option selected>---</option>
                                 <option value="soltero(a)">Soltero(a)</option>
                                 <option value="casado(a)">Casado(a)</option>
                                 <option value="viudo(a)">Viudo(a)</option>
                                 <option value="divorciado(a)">Divorciado(a)</option>
                                 <option value="unionLibre">Unión Libre</option>
                                 <option value="indistinto">Indistinto</option>
                                  </select>   </div>
                             <div class="col-12 col-lg-4">
                               <label for="InputEmail2" class="form-label">Ocupación</label>
                               <input type="text" class="form-control" id="InputEmail2" placeholder="example@xyz.com">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="InputPassword" class="form-label">Condición de Actividad</label>
                               <input type="text" class="form-control" id="InputPassword" value="">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="InputConfirmPassword" class="form-label">Nombre de Empresa</label>
                               <input type="text" class="form-control" id="InputConfirmPassword" value="">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="InputConfirmPassword" class="form-label">Tipo de Empresa</label>
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

                             <h5 class="mb-1">Domicilio Laboral</h5>
                           <p class="mb-4"></p>
                   
                           <div class="col-12 col-lg-3">
                           <label for="estCivil" class="form-label">Estado/Mpio/Localidad</label>  
                          </div>
                           <div class="col-12 col-lg-3">
                             
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
                                  <div class="col-12 col-lg-3">
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
                                  <div class="col-12 col-lg-3">
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
                               <label for="rfc" class="form-label">Calle</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>
                      <div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">N. Ext</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">N. Int</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Colonia</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Ciudad</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">C.P</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                          </div> 
                    
                    
                    
                       </div>
                       <h5 class="mb-1">Ingresos</h5>
                           <p class="mb-4"></p>
                           <div class="col-12 col-lg-4">
                           <label for="rfc" class="form-label">Ingresos Mensual Promedio</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-coin"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div> 
                      </div> 
                      <div class="col-12 col-lg-4">
                      <label for="rfc" class="form-label">Ingresos Provenientes de:</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-coin"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
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
                               <label for="SchoolName" class="form-label">Nombre Completo  del Beneficiario</label>
                               <input type="text" class="form-control" id="SchoolName" placeholder="School Name">
                             </div>
                             <div class="col-12 col-lg-6">
                               <label for="BoardName" class="form-label">Primer Apellido</label>
                               <input type="text" class="form-control" id="BoardName" placeholder="Board Name">
                             </div>
                             <div class="col-12 col-lg-6">
                               <label for="UniversityName" class="form-label">Segundo Apellido </label>
                               <input type="text" class="form-control" id="UniversityName" placeholder="University Name">
                             </div>
                             <div class="col-12 col-lg-6">
                               <label for="InputCountry" class="form-label">Parentezco</label>
                               <select class="form-select" id="InputCountry" aria-label="Default select example">
                                 <option selected>---</option>
                                 <option value="1">One</option>
                                 <option value="2">Two</option>
                                 <option value="3">Three</option>
                                 </select>
                             </div>
                             <div class="col-12 col-lg-6">
                               <label for="UniversityName" class="form-label">Porcentaje%</label>
                               <input type="text" class="form-control" id="UniversityName" placeholder="University Name">
                             </div>
                             <div class="col-12 col-lg-6">
                               <label for="UniversityName" class="form-label">Fecha de Nacimiento</label>
                               <input type="text" class="form-control datepicker " id="UniversityName" placeholder="University Name">
                             </div>
                             <div class="col-12">
                               <div class="d-flex align-items-center gap-3">
                                 <button class="btn btn-outline-secondary px-4" onclick="stepper3.previous()"><i class='bx bx-left-arrow-alt me-2'></i>Previous</button>
                                 <button class="btn btn-primary px-4" onclick="stepper3.next()">Next<i class='bx bx-right-arrow-alt ms-2'></i></button>
                               </div>
                             </div>
                           </div><!---end row-->
                           
                           </div>
             
                           <div id="test-vl-4" role="tabpane3" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger4">
                           <h5 class="mb-1">Work Experiences</h5>
                           <p class="mb-4">Can you talk about your past work experience?</p>
             
                           <div class="row g-3">
                             <div class="col-12 col-lg-6">
                               <label for="Experience1" class="form-label">Experience 1</label>
                               <input type="text" class="form-control" id="Experience1" placeholder="Experience 1">
                             </div>
                             <div class="col-12 col-lg-6">
                               <label for="Position1" class="form-label">Position</label>
                               <input type="text" class="form-control" id="Position1" placeholder="Position">
                             </div>
                             <div class="col-12 col-lg-6">
                               <label for="Experience2" class="form-label">Experience 2</label>
                               <input type="text" class="form-control" id="Experience2" placeholder="Experience 2">
                             </div>
                             <div class="col-12 col-lg-6">
                               <label for="PhoneNumber" class="form-label">Position</label>
                               <input type="text" class="form-control" id="PhoneNumber" placeholder="Position">
                             </div>
                             <div class="col-12 col-lg-6">
                               <label for="Experience3" class="form-label">Experience 3</label>
                               <input type="text" class="form-control" id="Experience3" placeholder="Experience 3">
                             </div>
                             <div class="col-12 col-lg-6">
                               <label for="PhoneNumber" class="form-label">Position</label>
                               <input type="text" class="form-control" id="PhoneNumber" placeholder="Position">
                             </div>
                             <div class="col-12">
                               <div class="d-flex align-items-center gap-3">
                                 <button class="btn btn-primary px-4" onclick="stepper3.previous()"><i class='bx bx-left-arrow-alt me-2'></i>Previous</button>
                                 <button class="btn btn-success px-4" onclick="stepper3.next()">Submit</button>
                               </div>
                             </div>
                           </div><!---end row-->
                           
                           </div>
                           <div id="test-vl-5" role="tabpane3" class="bs-stepper-pane content fade" aria-labelledby="stepper3trigger4">
                           <h5 class="mb-1">Datos Generales Cotitular</h5>
                         
             
                           <div class="row g-3">
                             <div class="col-12 col-lg-4">
                               <label for="nombreCotitular" class="form-label">Cotitular</label>
                               <input type="text" class="form-control" id="nombreCotitular" placeholder="Nombre(s)">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="primerApellido" class="form-label">Primer Apellido</label>
                               <input type="text" class="form-control" id="primerApellido" placeholder="Primer Apellido">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="segundoApellido" class="form-label">Segundo Apellido</label>
                               <input type="text" class="form-control" id="segundoApellido" placeholder="Segundo Apellido">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="Genero" class="form-label">Género</label>
                               <select class="form-select" id="generoCotitular"  name="generoCotitular" aria-label="Default select example">
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
                               <input type="text" class="form-control" id="serieNoIdentificacion"  name="serieNoIdentificacion" placeholder="Número de Identificación">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">RFC</label>
                               <input type="text" class="form-control" id="rfc"  name="rfc" placeholder="Escribe">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="fNac" class="form-label">Fecha de Nacimiento</label>
                               <input type="text" class="form-control datepicker " id="fNac"  name="fNac" placeholder="Ingresa Fecha de Nacimiento">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="edad" class="form-label">Fecha de Nacimiento</label>
                               <input type="number" class="form-control datepicker " id="edad"  name="edad" placeholder="Ingresa Edad">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="religion" class="form-label">Religión</label>
                               <input type="text" class="form-control" id="religion"  name="religion" placeholder="Ingresa Religión">
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="paisNac" class="form-label">Pais de Nacimiento</label>
                               <select class="form-select" id="paisNac" name="paisNac" aria-label="Default select example">
                                 <option selected>---</option>
                                 <option value="Afganistán">Afganistán</option><option value="Albania">Albania</option><option value="Alemania">Alemania</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua y Barbuda">Antigua y Barbuda</option><option value="Arabia Saudita">Arabia Saudita</option><option value="Argelia">Argelia</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaiyán">Azerbaiyán</option><option value="Bahamas">Bahamas</option><option value="Bangladés">Bangladés</option><option value="Barbados">Barbados</option><option value="Baréin">Baréin</option><option value="Bélgica">Bélgica</option><option value="Belice">Belice</option><option value="Benín">Benín</option><option value="Bermuda">Bermuda</option><option value="Bielorrusia">Bielorrusia</option><option value="Bolivia">Bolivia</option><option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option><option value="Botsuana">Botsuana</option><option value="Brasil">Brasil</option><option value="Brunéi">Brunéi</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Bután">Bután</option><option value="Cabo Verde">Cabo Verde</option><option value="Camboya">Camboya</option><option value="Camerún">Camerún</option><option value="Canadá">Canadá</option><option value="Catar">Catar</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Chipre">Chipre</option><option value="Colombia">Colombia</option><option value="Comoras">Comoras</option><option value="Congo, República Democrática del">Congo, República Democrática del</option><option value="Congo, República de">Congo, República de</option><option value="Corea del Norte">Corea del Norte</option><option value="Corea del Sur">Corea del Sur</option><option value="Costa de Marfil">Costa de Marfil</option><option value="Costa Rica">Costa Rica</option><option value="Croacia">Croacia</option><option value="Cuba">Cuba</option><option value="Curazao">Curazao</option><option value="Dinamarca">Dinamarca</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Ecuador">Ecuador</option><option value="Egipto">Egipto</option><option value="El Salvador">El Salvador</option><option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option><option value="Eritrea">Eritrea</option><option value="Eslovaquia">Eslovaquia</option><option value="Eslovenia">Eslovenia</option><option value="España">España</option><option value="Estados Unidos">Estados Unidos</option><option value="Estonia">Estonia</option><option value="Etiopía">Etiopía</option><option value="Filipinas">Filipinas</option><option value="Finlandia">Finlandia</option><option value="Fiyi">Fiyi</option><option value="Francia">Francia</option><option value="Gabón">Gabón</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Ghana">Ghana</option><option value="Granada">Granada</option><option value="Grecia">Grecia</option><option value="Groenlandia">Groenlandia</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea Ecuatorial">Guinea Ecuatorial</option><option value="Guinea-Bisáu">Guinea-Bisáu</option><option value="Guyana">Guyana</option><option value="Haiti">Haití</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungria">Hungría</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Irak">Irak</option><option value="Iran">Irán</option><option value="Irlanda">Irlanda</option><option value="Islandia">Islandia</option><option value="Islas Caiman">Islas Caimán</option><option value="Islas Faroe">Islas Faroe</option><option value="Islas Marianas del Norte">Islas Marianas del Norte</option><option value="Islas Marshall">Islas Marshall</option><option value="Islas Salomon">Islas Salomón</option><option value="Islas Vírgenes Britanicas">Islas Vírgenes Británicas</option><option value="Islas Virgenes de los Estados Unidos">Islas Vírgenes de los Estados Unidos</option><option value="Israel">Israel</option><option value="Italia">Italia</option><option value="Jamaica">Jamaica</option><option value="Japon">Japón</option><option value="Jordania">Jordania</option><option value="Kazajistan">Kazajistán</option><option value="Kenia">Kenia</option><option value="Kirguistan">Kirguistán</option><option value="Kiribati">Kiribati</option><option value="Kosovo">Kosovo</option><option value="Kuwait">Kuwait</option><option value="Laos">Laos</option><option value="Lesoto">Lesoto</option><option value="Letonia">Letonia</option><option value="Libano">Líbano</option><option value="Liberia">Liberia</option><option value="Libia">Libia</option><option value="Liechtenstein">Liechtenstein</option><option value="Lituania">Lituania</option><option value="Luxemburgo">Luxemburgo</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malasia">Malasia</option><option value="Malaui">Malaui</option><option value="Maldivas">Maldivas</option><option value="Mali">Malí</option><option value="Malta">Malta</option><option value="Marruecos">Marruecos</option><option value="Mauricio">Mauricio</option><option value="Mauritania">Mauritania</option><option value="Mexico">México</option><option value="Micronesia">Micronesia</option><option value="Moldavia">Moldavia</option><option value="Monaco">Mónaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Níger</option><option value="Nigeria">Nigeria</option><option value="Noruega">Noruega</option><option value="Nueva Zelanda">Nueva Zelanda</option><option value="Oman">Omán</option><option value="Paises Bajos">Países Bajos</option><option value="Pakistan">Pakistán</option><option value="Palaos">Palaos</option><option value="Palestina">Palestina</option><option value="Panama">Panamá</option><option value="Papua Nueva Guinea">Papúa Nueva Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Perú</option><option value="Polinesia Francesa">Polinesia Francesa</option><option value="Polonia">Polonia</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reino Unido">Reino Unido</option><option value="Republica Centroafricana">República Centroafricana</option><option value="Republica Checa">República Checa</option><option value="Republica Democrática del Congo">República Democrática del Congo</option><option value="Republica Dominicana">República Dominicana</option><option value="Ruanda">Ruanda</option><option value="Rumania">Rumania</option><option value="Rusia">Rusia</option><option value="Samoa">Samoa</option><option value="Samoa Americana">Samoa Americana</option><option value="San Cristobal y Nieves">San Cristóbal y Nieves</option><option value="San Marino">San Marino</option><option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option><option value="Santa Lucia">Santa Lucía</option><option value="Santo Tome y Príncipe">Santo Tomé y Príncipe</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leona">Sierra Leona</option><option value="Singapur">Singapur</option><option value="Sint Maarten">Sint Maarten</option><option value="Siria">Siria</option><option value="Somalia">Somalia</option><option value="Sri Lanka">Sri Lanka</option><option value="Suazilandia">Suazilandia</option><option value="Sudáfrica">Sudáfrica</option><option value="Sudan">Sudán</option><option value="Sudan del Sur">Sudán del Sur</option><option value="Suecia">Suecia</option><option value="Suiza">Suiza</option><option value="Surinam">Surinam</option><option value="Tailandia">Tailandia</option><option value="Taiwan">Taiwán</option><option value="Tanzania">Tanzania</option><option value="Tayikistan">Tayikistán</option><option value="Timor Oriental">Timor Oriental</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad y Tobago">Trinidad y Tobago</option><option value="Tunez">Túnez</option><option value="Turkmenistan">Turkmenistán</option><option value="Turquia">Turquía</option><option value="Tuvalu">Tuvalu</option><option value="Ucrania">Ucrania</option><option value="Uganda">Uganda</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistán</option><option value="Vanuatu">Vanuatu</option><option value="Vaticano">Vaticano</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Yemen">Yemen</option><option value="Yibuti">Yibuti</option><option value="Zambia">Zambia</option><option value="Zimbabue">Zimbabue</option>
                                 </select>
                             </div>
                             <div class="col-12 col-lg-4">
                               <label for="nacionalidad" class="form-label">Nacionalidad</label>
                               <select class="form-select" id="nacionalidad" name="nacionalidad" aria-label="Default select example">
                                 <option selected>---</option>
                                 <option value="Afganistán">Afganistán</option><option value="Albania">Albania</option><option value="Alemania">Alemania</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua y Barbuda">Antigua y Barbuda</option><option value="Arabia Saudita">Arabia Saudita</option><option value="Argelia">Argelia</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaiyán">Azerbaiyán</option><option value="Bahamas">Bahamas</option><option value="Bangladés">Bangladés</option><option value="Barbados">Barbados</option><option value="Baréin">Baréin</option><option value="Bélgica">Bélgica</option><option value="Belice">Belice</option><option value="Benín">Benín</option><option value="Bermuda">Bermuda</option><option value="Bielorrusia">Bielorrusia</option><option value="Bolivia">Bolivia</option><option value="Bosnia-Herzegovina">Bosnia-Herzegovina</option><option value="Botsuana">Botsuana</option><option value="Brasil">Brasil</option><option value="Brunéi">Brunéi</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Bután">Bután</option><option value="Cabo Verde">Cabo Verde</option><option value="Camboya">Camboya</option><option value="Camerún">Camerún</option><option value="Canadá">Canadá</option><option value="Catar">Catar</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Chipre">Chipre</option><option value="Colombia">Colombia</option><option value="Comoras">Comoras</option><option value="Congo, República Democrática del">Congo, República Democrática del</option><option value="Congo, República de">Congo, República de</option><option value="Corea del Norte">Corea del Norte</option><option value="Corea del Sur">Corea del Sur</option><option value="Costa de Marfil">Costa de Marfil</option><option value="Costa Rica">Costa Rica</option><option value="Croacia">Croacia</option><option value="Cuba">Cuba</option><option value="Curazao">Curazao</option><option value="Dinamarca">Dinamarca</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Ecuador">Ecuador</option><option value="Egipto">Egipto</option><option value="El Salvador">El Salvador</option><option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option><option value="Eritrea">Eritrea</option><option value="Eslovaquia">Eslovaquia</option><option value="Eslovenia">Eslovenia</option><option value="España">España</option><option value="Estados Unidos">Estados Unidos</option><option value="Estonia">Estonia</option><option value="Etiopía">Etiopía</option><option value="Filipinas">Filipinas</option><option value="Finlandia">Finlandia</option><option value="Fiyi">Fiyi</option><option value="Francia">Francia</option><option value="Gabón">Gabón</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Ghana">Ghana</option><option value="Granada">Granada</option><option value="Grecia">Grecia</option><option value="Groenlandia">Groenlandia</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea Ecuatorial">Guinea Ecuatorial</option><option value="Guinea-Bisáu">Guinea-Bisáu</option><option value="Guyana">Guyana</option><option value="Haiti">Haití</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungria">Hungría</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Irak">Irak</option><option value="Iran">Irán</option><option value="Irlanda">Irlanda</option><option value="Islandia">Islandia</option><option value="Islas Caiman">Islas Caimán</option><option value="Islas Faroe">Islas Faroe</option><option value="Islas Marianas del Norte">Islas Marianas del Norte</option><option value="Islas Marshall">Islas Marshall</option><option value="Islas Salomon">Islas Salomón</option><option value="Islas Vírgenes Britanicas">Islas Vírgenes Británicas</option><option value="Islas Virgenes de los Estados Unidos">Islas Vírgenes de los Estados Unidos</option><option value="Israel">Israel</option><option value="Italia">Italia</option><option value="Jamaica">Jamaica</option><option value="Japon">Japón</option><option value="Jordania">Jordania</option><option value="Kazajistan">Kazajistán</option><option value="Kenia">Kenia</option><option value="Kirguistan">Kirguistán</option><option value="Kiribati">Kiribati</option><option value="Kosovo">Kosovo</option><option value="Kuwait">Kuwait</option><option value="Laos">Laos</option><option value="Lesoto">Lesoto</option><option value="Letonia">Letonia</option><option value="Libano">Líbano</option><option value="Liberia">Liberia</option><option value="Libia">Libia</option><option value="Liechtenstein">Liechtenstein</option><option value="Lituania">Lituania</option><option value="Luxemburgo">Luxemburgo</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malasia">Malasia</option><option value="Malaui">Malaui</option><option value="Maldivas">Maldivas</option><option value="Mali">Malí</option><option value="Malta">Malta</option><option value="Marruecos">Marruecos</option><option value="Mauricio">Mauricio</option><option value="Mauritania">Mauritania</option><option value="Mexico">México</option><option value="Micronesia">Micronesia</option><option value="Moldavia">Moldavia</option><option value="Monaco">Mónaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Níger</option><option value="Nigeria">Nigeria</option><option value="Noruega">Noruega</option><option value="Nueva Zelanda">Nueva Zelanda</option><option value="Oman">Omán</option><option value="Paises Bajos">Países Bajos</option><option value="Pakistan">Pakistán</option><option value="Palaos">Palaos</option><option value="Palestina">Palestina</option><option value="Panama">Panamá</option><option value="Papua Nueva Guinea">Papúa Nueva Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Perú</option><option value="Polinesia Francesa">Polinesia Francesa</option><option value="Polonia">Polonia</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reino Unido">Reino Unido</option><option value="Republica Centroafricana">República Centroafricana</option><option value="Republica Checa">República Checa</option><option value="Republica Democrática del Congo">República Democrática del Congo</option><option value="Republica Dominicana">República Dominicana</option><option value="Ruanda">Ruanda</option><option value="Rumania">Rumania</option><option value="Rusia">Rusia</option><option value="Samoa">Samoa</option><option value="Samoa Americana">Samoa Americana</option><option value="San Cristobal y Nieves">San Cristóbal y Nieves</option><option value="San Marino">San Marino</option><option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option><option value="Santa Lucia">Santa Lucía</option><option value="Santo Tome y Príncipe">Santo Tomé y Príncipe</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leona">Sierra Leona</option><option value="Singapur">Singapur</option><option value="Sint Maarten">Sint Maarten</option><option value="Siria">Siria</option><option value="Somalia">Somalia</option><option value="Sri Lanka">Sri Lanka</option><option value="Suazilandia">Suazilandia</option><option value="Sudáfrica">Sudáfrica</option><option value="Sudan">Sudán</option><option value="Sudan del Sur">Sudán del Sur</option><option value="Suecia">Suecia</option><option value="Suiza">Suiza</option><option value="Surinam">Surinam</option><option value="Tailandia">Tailandia</option><option value="Taiwan">Taiwán</option><option value="Tanzania">Tanzania</option><option value="Tayikistan">Tayikistán</option><option value="Timor Oriental">Timor Oriental</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad y Tobago">Trinidad y Tobago</option><option value="Tunez">Túnez</option><option value="Turkmenistan">Turkmenistán</option><option value="Turquia">Turquía</option><option value="Tuvalu">Tuvalu</option><option value="Ucrania">Ucrania</option><option value="Uganda">Uganda</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistán</option><option value="Vanuatu">Vanuatu</option><option value="Vaticano">Vaticano</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Yemen">Yemen</option><option value="Yibuti">Yibuti</option><option value="Zambia">Zambia</option><option value="Zimbabue">Zimbabue</option>
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
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>
                             <div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Teléfono Casa</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>
                             <div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Teléfono Oficina</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>
                             <div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Teléfono Otro</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-phone-set"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>

                      <h5 class="mb-1">Domicilio Actual</h5>
                           <p class="mb-4"></p>
                   
                           <div class="col-12 col-lg-3">
                           <label for="estCivil" class="form-label">Estado/Mpio/Localidad</label>  
                          </div>
                           <div class="col-12 col-lg-3">
                             
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
                                  <div class="col-12 col-lg-3">
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
                                  <div class="col-12 col-lg-3">
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
                               <label for="rfc" class="form-label">Calle</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>
                      <div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">N. Ext</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">N. Int</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Colonia</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">Ciudad</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div><div class="col-12 col-lg-4">
                               <label for="rfc" class="form-label">C.P</label>
                               <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"><i class="lni lni-map"></i></span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                      </div>  </div>

                             
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