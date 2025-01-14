<?php
ini_set('display_errors', 0);  // Deshabilita la visualización de errores en pantalla
ini_set('log_errors', 1);      // Habilita la escritura de errores en un archivo de registro
ini_set('error_log', 'error.log');  ?>
<div class="modal fade" id="clientemodal<?= $Cliente['id_cliente'] ?>" tabindex="-1" inert>
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Perfil Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-lg-8 col-xl-9">
            <div class="card overflow-hidden radius-10">
              <div class="profile-cover bg-dark position-relative mb-4">
                <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
                  <img src="images/user.png" alt="...">
                </div>
              </div>
              <div class="card-body">
                <div class="mt-5 d-flex align-items-start justify-content-between">
                  <div class="">
                    <h3 class="mb-2" id="nombre_cliente"><?= $nombreCompleto ?></h3>
                    <div class="row">
                      <div class="col-6">
                        <p class="mb-1"> <strong>Clave Ine: </strong><?= $Cliente['clave_elector'] ?></p>
                        <p class="mb-1"> <strong>Curp: </strong><?= $Cliente['curp'] ?></p>
                        <p class="mb-1"> <strong>Rfc: </strong><?= $Cliente['rfc'] ?></p>
                        <p class="mb-1"> <strong>Fecha de Nacimiento: </strong><?= $Cliente['fecha_nacimiento'] ?></p>
                        <p class="mb-1"> <strong>Genero: </strong><?= $genero ?></p>
                      </div>
                      <div class="col-6">

                        <p class="mb-1"> <strong>Religión: </strong><?= $datosClientes[0]['religion'] ?></p>
                        <p class="mb-1"> <strong>País de Nacimiento: </strong><?= $datosClientes[0]['pais_nac'] ?></p>
                        <p class="mb-1"> <strong>Estado Nacimiento: </strong><?= $datosClientes[0]['estado_nac'] ?></p>
                        <p class="mb-1"> <strong>Nacionalidad: </strong><?= $datosClientes[0]['nacionalidad'] ?></p>
                        <p class="mb-1"> <strong>Estado Civil: </strong><?= $datosClientes[0]['estado_civil'] ?></p>
                      </div>
                    </div>
                    <div class="">
                      <?php

                      if ($_SESSION['perfil'] == 'administrador' || $_SESSION['director']) {
                        # code...

                      ?>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#retirosModal<?= $Cliente['id_cliente'] ?>">Retiros</button>
                        <button class="btn btn-success">Depositos</button>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <?php

                    if ($_SESSION['perfil'] == 'administrador' || $_SESSION['director']) {
                      # code...

                    ?>
                      <a href="javascript:;" class="btn btn-outline-info"><ion-icon name="send-sharp"></ion-icon>Realizar Deposito</a>
                      <br>
                    <?php


                    } ?>
                    <a type="button" href="https://wa.me/52<?= $numeroLimpio ?>" target="_blank" class="btn  btn-outline-success px-5"> <i class="lni lni-whatsapp"></i>Whatsapp</a>

                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h4 class="mb-2">Información</h4>
                <div class="product-more-info mt-4">
                  <ul class="nav nav-tabs mb-0" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" data-bs-toggle="tab" href="#cotitular<?= $Cliente['id_cliente'] ?>" role="tab" aria-selected="true">
                        <div class="d-flex align-items-center">
                          <div class="tab-title text-uppercase fw-500">Cotitular</div>
                        </div>
                      </a>
                    </li>
                    <?php

                    if ($_SESSION['perfil'] == 'administrador' || $_SESSION['director']) {
                      # code...

                    ?>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#economicos<?= $Cliente['id_cliente'] ?>" role="tab" aria-selected="false" tabindex="-1">
                          <div class="d-flex align-items-center">
                            <div class="tab-title text-uppercase fw-500">Datos Económicos</div>
                          </div>
                        </a>
                      </li>

                      <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#benficiarios<?= $Cliente['id_cliente'] ?>" role="tab" aria-selected="false" tabindex="-1">
                          <div class="d-flex align-items-center">
                            <div class="tab-title text-uppercase fw-500">Beneficiarios</div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#transaccionalidad<?= $Cliente['id_cliente'] ?>" role="tab" aria-selected="false" tabindex="-1">
                          <div class="d-flex align-items-center">
                            <div class="tab-title text-uppercase fw-500">Transaccionalidad</div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#documentacion<?= $Cliente['id_cliente'] ?>" role="tab" aria-selected="false" tabindex="-1">
                          <div class="d-flex align-items-center">
                            <div class="tab-title text-uppercase fw-500">Documentación</div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#contable<?= $Cliente['id_cliente'] ?>" role="tab" aria-selected="false" tabindex="-1">
                          <div class="d-flex align-items-center">
                            <div class="tab-title text-uppercase fw-500">Cuenta Contable</div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#AsignarCliente<?= $Cliente['id_cliente'] ?>" role="tab" aria-selected="false" tabindex="-1">
                          <div class="d-flex align-items-center">
                            <div class="tab-title text-uppercase fw-500">Asignar Cliente</div>
                          </div>
                        </a>
                      </li>
                    <?php

                    }


                    ?>
                  </ul>
                  <div class="tab-content pt-3">
                    <?php

                    $cotitular = ControladorClientes::ctrDatosCotitular($Cliente['id_cliente']);
                    if (isset($cotitular[0])) {
                      # code...


                    ?>
                      <div class="tab-pane fade active show" id="cotitular<?= $Cliente['id_cliente'] ?>" role="tabpanel">

                        <?php

                        if ($cotitular[0]['num_int_cotitular'] == 0) {
                          $num = ' EXT.' . $cotitular[0]['num_ext_cotitular'];
                        } else {
                          $num = ' INT. ' . $cotitular[0]['num_int_cotitular'];
                        }
                        $direcc = 'Calle: ' . $cotitular[0]['calle_cotitular'] . ' Núm.' . $num . ' , Colonia: ' . $cotitular[0]['colonia_cotitular'] . ', Cd. ' . $cotitular[0]['ciudad_cotitular'];

                        if ($cotitular[0]['sexo_cotitular']) {
                          if ($cotitular[0]['sexo_cotitular'] == 'M') {
                            $genero = 'Masculino';
                          } elseif ($cotitular[0]['sexo_cotitular'] == 'F') {
                            $genero = 'Femenino';
                          }
                        } else {
                          $genero = '';
                        }




                        ?>
                        <div class="row">
                          <div class="col-lg-12 mx-auto">

                            <form>
                              <h4 class="mb-3"><i class="fadeIn animated bx bx-user"></i> <?= $cotitular[0]['nombre_cotitular'] ?></h4>


                              <hr>
                              <div class="row g-3">
                                <h5>Datos Generales</h5>
                                <div class="col-3">
                                  <label class="form-label">Clave Ine</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['clave_elector_cotitular'] ?>" disabled>
                                </div>
                                <div class="col-3">
                                  <label class="form-label">Curp</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['curp_cotitular'] ?>" disabled>
                                </div>
                                <div class="col-3">
                                  <label class="form-label">RFC</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['rfc_cotitular'] ?>" disabled>
                                </div>
                                <div class="col-3">
                                  <label class="form-label">Fecha de Nacimiento</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['fecha_nacimiento_cotitular'] ?>" disabled>
                                </div>
                              </div>


                              <div class="row g-3">
                                <div class="col-3">
                                  <label class="form-label">Generó</label>
                                  <input type="text" class="form-control" value="<?= $genero ?>" disabled>
                                </div>
                                <div class="col-3">
                                  <label class="form-label">Religión</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['religion_cotitular'] ?>" disabled>
                                </div>
                                <div class="col-3">
                                  <label class="form-label">País de Nacimiento</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['nacionalidad_cotitular'] ?>" disabled>
                                </div>
                                <div class="col-3">
                                  <label class="form-label">Estado Civil</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['estado_civil_cotitular'] ?>" disabled>
                                </div>

                                <hr>

                              </div>
                              <div class="row g-3">
                                <h5>Contacto</h5>
                                <div class="col-3">

                                  <label class="form-label">Tel Celular</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['tel_celular_cotitular'] ?>" disabled>
                                </div>
                                <div class="col-3">
                                  <label class="form-label">Tel Local</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['tel_casa_cotitular'] ?>" disabled>
                                </div>
                                <div class="col-3">
                                  <label class="form-label">Email</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['email_cotitular'] ?>" disabled>
                                </div>
                                <hr>
                                <h5>Dirección</h5>
                                <div class="col-12">
                                  <label class="form-label">Datos</label>
                                  <input type="text" class="form-control" value="<?= $direcc ?>" disabled>
                                </div>


                              </div>
                              <div class="row g-3">
                                <div class="col-3">
                                  <label class="form-label">Municipio</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['desc_municipio'] ?>" disabled>
                                </div>
                                <div class="col-3">
                                  <label class="form-label">Estado</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['nom_estado'] ?>" disabled>
                                </div>
                                <div class="col-3">
                                  <label class="form-label">Código Postal</label>
                                  <input type="text" class="form-control" value="<?= $cotitular[0]['cod_postal_cotitular'] ?>" disabled>
                                </div>



                              </div>

                          </div>
                          </form>

                        </div><!--end row-->

                      </div>

                    <?php
                    } else { ?>
                      <div class="tab-pane fade active show" id="cotitular<?= $Cliente['id_cliente'] ?>" role="tabpanel">
                        <h4 class="mb-3"><i class="fadeIn animated bx bx-user"></i> Sin Cotitular</h4>

                      </div>
                    <?php      }
                    $economicos = ControladorClientes::ctrDatosEconomicosClientes($Cliente['id_cliente']);


                    ?>
                    <div class="tab-pane fade" id="economicos<?= $Cliente['id_cliente'] ?>" role="tabpanel">
                      <h4 class="mb-3"><i class="lni lni-coin"></i> Datos Económicos del Cliente</h4>
                      <div class="row">
                        <div class=" col-6 card bg-gradient-info">
                          <div class="card-body">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item bg-transparent text-white">Profesión: <?= $economicos[0]['profesion'] ?></li>
                              <li class="list-group-item bg-transparent text-white">Otra Profesión: <?= $economicos[0]['otra_profesion'] ?></li>
                              <li class="list-group-item bg-transparent text-white">Ocupación: <?= $economicos[0]['ocupacion_clte'] ?></li>
                              <li class="list-group-item bg-transparent text-white">Puesto: <?= $economicos[0]['puesto_clte'] ?></li>
                              <li class="list-group-item bg-transparent text-white">Actividad: <?= $economicos[0]['actividad'] ?></li>
                              <li class="list-group-item bg-transparent text-white">Otra Actividad: <?= $economicos[0]['otra_actividad'] ?></li>
                            </ul>
                          </div>
                        </div>
                        <div class=" col-6 card bg-gradient-info">
                          <div class="card-body">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item bg-transparent text-white">Empresa: <?= $economicos[0]['nom_empres'] ?></li>
                            </ul>
                            <li class="list-group-item bg-transparent text-white">Tipo de Empresa: <?= $economicos[0]['tipo_empresa'] ?></li>
                            </ul>
                            <li class="list-group-item bg-transparent text-white">Otro tipo Empresa: <?= $economicos[0]['otro_tipo_emp'] ?></li>
                            </ul>
                            <li class="list-group-item bg-transparent text-white">Ingreso Mensual Promedio: <?= $economicos[0]['ingre_mensual'] ?></li>
                            </ul>
                            <li class="list-group-item bg-transparent text-white">Los ingresos Provienen: <?= $economicos[0]['ingresos_provienen'] ?></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php

                    $benificiaros = ControladorClientes::ctrallbeneficiarioId($Cliente["id_cliente"]);

                    ?>
                    <div class="tab-pane fade" id="benficiarios<?= $Cliente['id_cliente'] ?>" role="tabpanel">
                      <div class="card">
                        <div class="card-body">
                          <div class="list-group">
                            <?php

                            foreach ($benificiaros as $benificiaro) {


                            ?>
                              <a href="javascript:;" class="list-group-item list-group-item-action active" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1 text-white"><?= $benificiaro['nom_beneficiario'] . " " . $benificiaro['apaterno_beneficiario'] . " " . $benificiaro['amaterno_beneficiario'] ?></h5>

                                </div>
                                <hr>
                                <p class="mb-1">Porcentaje: <?= $benificiaro['porcentaje'] ?></p>
                                <p class="mb-1">Parentezco: <?= $benificiaro['parentesco'] ?></p>
                                <p class="mb-1">Teléfono: <?= $benificiaro['tel_contacto'] ?></p>
                                <p class="mb-1">Dirección: <?= $benificiaro['direccion_ben'] ?></p>

                              </a>

                            <?php
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="transaccionalidad<?= $Cliente['id_cliente'] ?>" role="tabpanel">
                      <?php
                      $transaccionalidad = ControladorClientes::ctrconsultarTransaccionalidadCliente($Cliente['id_cliente']);


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

                      ?>
                      <div class="card">
                        <div class="card-body">
                          <div class="list-group">
                            <a href="javascript:;" class="list-group-item list-group-item-action active" aria-current="true">
                              <div class="d-flex w-100 justify-content-between">

                                <h5>Transaccionabilidad</h5>
                                <hr>
                              </div>
                              <p class="mb-1"> Recursos: <?= $transaccionalidad[0]['recursos'] ?></p>
                              <p class="mb-1"> Propios: <?= $transaccionalidad[0]['propios'] ?></p>
                              <p class="mb-1"> Uso de Cuenta: <?= $transaccionalidad[0]['uso_cuenta'] ?></p>
                              <p class="mb-1"> Transacciones Mensuales: <?= $transacciones ?></p>
                              <p class="mb-1"> Monto Transacción Pesos al Mes: <?= $monto ?></p>
                              <p class="mb-1"> Saldo Promedio Mensual en Pesos: <?= $saldo ?></p>
                            </a>


                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="documentacion<?= $Cliente['id_cliente'] ?>" role="tabpanel">
                      <div class="row row-cols-1 row-cols-lg-3">
                        <div class="col">
                          <div class="card">
                            <?php
                            $img_ine1 = ($datosClientes[0]['ine_anverso']) ? 'documentos/clientes/' . $datosClientes[0]['id_cliente'] . '/' . $datosClientes[0]['ine_anverso'] : 'images/no-imagen.png';
                            $img_ine2 = ($datosClientes[0]['ine_reverso']) ? 'documentos/clientes/' . $datosClientes[0]['id_cliente'] . '/' . $datosClientes[0]['ine_reverso'] : 'documentos/img/no-imagen.png';
                            $comprobante = ($datosClientes[0]['domicilio_img']) ? 'documentos/clientes/' . $datosClientes[0]['id_cliente'] . '/' . $datosClientes[0]['domicilio_img'] : 'documentos/img/no-imagen.png';
                            $curp = ($datosClientes[0]['curp_img']) ? 'documentos/clientes/' . $datosClientes[0]['id_cliente'] . '/' . $datosClientes[0]['curp_img'] : 'documentos/img/no-imagen.png';
                            $edo_cuenta = ($datosClientes[0]['edo_cuenta_img']) ? 'documentos/clientes/' . $datosClientes[0]['id_cliente'] . '/' . $datosClientes[0]['edo_cuenta_img'] : 'documentos/img/no-imagen.png';
                            $situacion_fiscal = ($datosClientes[0]['situacion_fiscal_img']) ? 'documentos/clientes/' . $datosClientes[0]['id_cliente'] . '/' . $datosClientes[0]['situacion_fiscal_img'] : 'documentos/img/no-imagen.png';
                            $cuestionario_inver = ($datosClientes[0]['cuestionario_inver_img']) ? 'documentos/clientes/' . $datosClientes[0]['id_cliente'] . '/' . $datosClientes[0]['cuestionario_inver_img'] : 'documentos/img/no-imagen.png';
                            ?>
                            <img src="<?= $img_ine1 ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Ine Anverso</h5>
                              <hr>

                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <img src="<?= $img_ine2 ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Ine Reverso</h5>
                              <hr>

                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card">
                            <div class="col">
                              <a type="button" target="a_blank" href="<?= $comprobante ?>" class="btn btn-xs btn-outline-info "><i class="lni lni-folder"></i>Comprobante Domicilio</a>
                            </div>
                            <br>
                            <div class="col">
                              <a type="button" target="a_blank" href="<?= $curp ?>" class="btn btn-xs btn-outline-info "><i class="lni lni-folder"></i>Curp</a>
                            </div>
                            <br>
                            <div class="col">
                              <a type="button" target="a_blank" href="<?= $edo_cuenta ?>" class="btn btn-xs btn-outline-info "><i class="lni lni-folder"></i>Estado de Cuenta</a>
                            </div>
                            <br>
                            <div class="col">
                              <a type="button" target="a_blank" href="<?= $situacion_fiscal ?>" class="btn btn-xs btn-outline-info "><i class="lni lni-folder"></i>Constancia Fiscal</a>
                            </div>
                            <br>
                            <div class="col">
                              <a type="button" target="a_blank" href="<?= $cuestionario_inver ?>" class="btn btn-xs btn-outline-info "><i class="lni lni-folder"></i>Cuestionario Inversionista</a>
                            </div>
                            <br>
                          </div>
                        </div>

                      </div><!--end row-->

                    </div>
                    <div class="tab-pane fade" id="contable<?= $Cliente['id_cliente'] ?>" role="tabpanel">

                      <div class="row col d-flex align-items-center">

                        <button type="button" class="btn btn-outline-primary col-1 radius-30"><i class="lni lni-plus"></i></button>

                      </div>
                      <?php

                      $cuentasContables = ControladorClientes::ctrCuentasContablesCliente($Cliente['id_cliente']);
                      foreach ($cuentasContables as $cuentasContable) {
                        # code...


                      ?>
                        <div class="row">
                          <br>
                          <div class=" col-5  radius-10">

                            <div class="card-body">
                              <div class="d-flex align-items-center">
                                <div class="flex-grow-1 ms-3">
                                  <h5 class="mt-0">Nombre Cuenta : <?= $cuentasContable['nombre_cta'] ?></h5>
                                  <p class="mb-0">Banco: <?= $cuentasContable['banco'] ?></p>
                                  <p class="mb-0"> Numero de Cuenta <?= $cuentasContable['num_cta'] ?></p>
                                  <p class="mb-0"> Clabe Interbancaria <?= $cuentasContable['clave_interbanc'] ?></p>
                                  <p class="mb-0"> Tipo de Moneda <?= $cuentasContable['tipo_moneda'] ?></p>
                                  <br>
                                </div>
                              </div>
                              <div class="d-flex justify-content-start">
                                <form action="">
                                  <button type='button' class="icon-badge position-relative bg-warning me-lg-5"> <i class="lni lni-pencil"></i>
                                </form>


                                <form action="">
                                  <button type='button' class="icon-badge position-relative bg-danger me-lg-5"> <i class="lni lni-trash"></i>
                                  </button>
                                </form>
                              </div>

                            </div>
                          </div>
                        <?php

                      }


                        ?>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="AsignarCliente<?= $Cliente['id_cliente'] ?>" role="tabpanel">
                      <div class="row col d-flex align-items-center">

                        <button type="button" class="btn btn-outline-primary col-1 radius-30"><i class="lni lni-plus"></i></button>

                      </div>
                      <div class="row">

                        <?php
                        $asignarCliente =  ControladorClientes::ctrAsesorAsignado($Cliente['id_cliente']);

                        foreach ($asignarCliente as $asignado) {




                        ?>
                          <div class="  card col-5  radius-10">
                            <div class="card-body">
                              <div class="d-flex align-items-center">
                                <div class="flex-grow-1 ms-3">
                                  <h5 class="mt-0">Nombre Cliente : <?= $asignado['cliente'] ?></h5>
                                  <hr>
                                  <p class="mb-0">Gerente: <?= $asignado['nombre_gerente'] ?></p>
                                  <p class="mb-0"> Asesor<?= $asignado['nombre_asesor'] ?></p>
                                  <p class="mb-0"> Fondo: <?= $asignado['nom_fondo'] ?></p>
                                  <p class="mb-0"> Serie <?= $asignado['nom_serie'] ?></p>
                                  <p class="mb-0"> Contrato: <?= $asignado['num_contrato'] ?></p>
                                  <hr>
                                </div>
                              </div>
                              <div class="d-flex justify-content-start">
                                <form action="">
                                  <button type='button' class="icon-badge position-relative bg-warning me-lg-5"> <i class="lni lni-pencil"></i>
                                </form>



                              </div>
                            </div>

                          </div>

                        <?php    } ?>


                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 col-xl-3">
            <div class="card radius-10">
              <div class="card-body">
                <h5 class="mb-3"><i class="fadeIn animated bx bx-world"></i> Contacto</h5>
                <p class="mb-0"><i class="lni lni-phone-set"></i> Casa: <?= $datosClientes[0]['tel_casa'] ?></p>
                <p class="mb-0"><i class="lni lni-phone"></i>Celular: <?= $datosClientes[0]['tel_celular'] ?></p>
                <p class="mb-0"><i class="fadeIn animated bx bx-mail-send"></i> <?= $datosClientes[0]['email'] ?></p>
                <p class="mb-0"><i class="fadeIn animated bx bx-mail-send"></i> <?= $datosClientes[0]['email2'] ?></p>
              </div>
            </div>

            <div class="card radius-10">
              <div class="card-body">
                <h5 class="mb-3"><i class="fadeIn animated bx bx-home-circle"></i> Dirección</h5>
                <p class=""><?= $direcc ?></p>

              </div>
            </div>

            <div class="card radius-10">
              <?php

              if ($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'director' || $_SESSION['perfil'] == 'DirectorAvawm') {
                # code...

              ?>
                <div class="card-body">

                  <h5 class="mb-3">Productos</h5>
                  <div class="row">
                    <?php

                    $event = ControladorProductos::ctrContratoEvent($Cliente['id_cliente']);


                    if (isset($event[0])) {

                      if ($event[0]['num_contrato'] !=  'N' ) {
                        # code...
                   

                      
                      $saldoEvent = ControladorProductos::ctrSaldoEvent($event[0]['Fk_cliente'], $event[0]['num_contrato']);



                      $saldoTotalEvent = $saldoEvent[0]['titulos'] * $saldoEvent[0]['precio_mercado'] + $saldoEvent[0]['efectivo'];

                      
                        # code...

                    ?>
                        <div class="card col-6 radius-10">
  <div class="card-body">
    <!-- Encabezado con ícono y título -->
    <div class="d-flex align-items-center mb-3">
      <div class="widget-icon-2 bg-gradient-info text-white p-2 rounded-circle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
          <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
        </svg>
      </div>
      <h5 class="ms-3 mb-0">Event</h5>
    </div>

    <!-- Sección de saldo y serie -->
    <div class="mb-3">
      <h4 class="mb-0" title="Saldo Total">$<?= number_format($saldoTotalEvent, 2) ?></h4>
      <h6 class="text-muted">Serie: A1</h6>
    </div>

    <!-- Sección de número de contrato y botón -->
    <div class="mt-3">
      <h5 class="mb-2" title="Numero de Contrato"><?= $saldoEvent[0]['num_contrato'] ?></h5>
      <form action="historicoClienteLe" method="POST" >
        <input type="hidden" value="<?=$Cliente['id_cliente']?>" name= "id_cliente">
        <input type="hidden" value="event" name="producto">
      <button type="submit" class="btn btn-primary mt-2">Info</button>
      </form>
      
    </div>
  </div>
</div>

                      <?php
                         }
                      
                    }


                    $event1 = ControladorProductos::ctrContratoEvent1($Cliente['id_cliente']);


                    if ($event1[0]['num_contrato'] !=  'N' ) {
                     


                    if (isset($event1[0])) {


                      $saldoEvent1 = ControladorProductos::ctrSaldoEvent($Cliente['id_cliente'], $event1[0]['num_contrato']);



                      $saldoTotalEvent1 = $saldoEvent1[0]['titulos'] * $saldoEvent1[0]['precio_mercado'] + $saldoEvent1[0]['efectivo'];


                     


                      ?>
                       <div class="card col-6 radius-10">
                          <div class="card-body">
                            <!-- Encabezado con ícono y título -->
                            <div class="d-flex align-items-center mb-3">
                              <div class="widget-icon-2 bg-gradient-info text-white p-2 rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                  <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                              </div>
                              <h5 class="ms-3 mb-0">Event</h5>
                            </div>

                            <!-- Sección de saldo total -->
                            <h4 class="mb-2" title="Saldo Total">$<?= number_format($saldoTotalEvent1, 2) ?></h4>

                            <!-- Sección de número de contrato y botón -->
                            <div class="mt-3">
                              <h5 class="mb-2" title="Numero de Contrato"><?= $saldoEvent1[0]['num_contrato'] ?></h5>
                              <!-- Botón colocado debajo -->
                              <form action="historicoClienteLe" method="POST" >
                                <input type="hidden" value="<?=$Cliente['id_cliente']?>" name= "id_cliente">
                                <input type="hidden" value="Event" name="producto">
                              <button type="submit" class="btn btn-primary mt-2">Info</button>
                              </form>
                              
                            </div>
                          </div>
                        </div>


                      <?php

                      }
                    }

                    $event7 = ControladorProductos::ctrContratoEvent7($Cliente['id_cliente']);


                    if ($event7[0]['num_contrato'] !=  'N' ) {
                     


                    if (isset($event7[0])) {


                      $saldoEvent7 = ControladorProductos::ctrSaldoEvent($Cliente['id_cliente'], $event7[0]['num_contrato']);



                      $saldoTotalEvent7 = $saldoEvent7[0]['titulos'] * $saldoEvent7[0]['precio_mercado'] + $saldoEvent7[0]['efectivo'];


                      


                      ?>
                       <div class="card col-6 radius-10">
  <div class="card-body">
    <!-- Encabezado con ícono y título -->
    <div class="d-flex align-items-center mb-3">
      <div class="widget-icon-2 bg-gradient-info text-white p-2 rounded-circle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
          <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
        </svg>
      </div>
      <h5 class="ms-3 mb-0">Event</h5>
    </div>

    <!-- Sección de saldo total -->
    <h4 class="mb-2" title="Saldo Total">$<?= number_format($saldoTotalEvent7, 2) ?></h4>

    <!-- Sección de número de contrato y botón en línea vertical -->
    <div class="mt-3">
      <h5 class="mb-2" title="Numero de Contrato"><?= $saldoEvent7[0]['num_contrato'] ?></h5>
      <!-- Botón debajo del número de contrato -->
      <form action="historicoClienteLe" method="POST" >
        <input type="hidden" value="<?=$Cliente['id_cliente']?>" name= "id_cliente">
        <input type="hidden" value="Event" name="producto">
      <button type="submit" class="btn btn-primary mt-2">Info</button>
      </form>
      
    </div>
  </div>
</div>


                      <?php 
                    }
                  }

                    $Lq1 = ControladorProductos::ctrContratoLq($Cliente['id_cliente']);


                    if ($Lq1[0]['num_contrato'] !=  'N' ) {
                     



                    if (isset($Lq1[0])) {

                      $saldoLq1  = ControladorProductos::ctrSaldoLq1($Lq1[0]['Fk_cliente'], $Lq1[0]['num_contrato']);


                      $saldoTotalLq1 = ($saldoLq1[0]['titulos'] * $saldoLq1[0]['precio_mercado']) + $saldoLq1[0]['efectivo'];

                      

                      ?>

<div class="card col-6 radius-10">
  <div class="card-body">
    <!-- Encabezado con ícono y título -->
    <div class="d-flex align-items-center mb-3">
      <div class="widget-icon-2 bg-gradient-warning text-white p-2 rounded-circle">
        <i class="fadeIn animated bx bx-money"></i>
      </div>
      <h5 class="ms-3 mb-0">Lq</h5>
    </div>

    <!-- Sección de saldo total -->
    <h4 class="mb-2" title="Saldo Total">$<?= number_format($saldoTotalLq1, 2) ?></h4>

    <!-- Sección de número de contrato y botón en línea vertical -->
    <div class="mt-3">
      <h5 class="mb-2" title="Numero de Contrato"><?= $Lq1[0]['num_contrato'] ?></h5>
      <!-- Botón debajo del número de contrato -->
      <form action="historicoClienteLe" method="POST" >
        <input type="hidden" value="<?=$Cliente['id_cliente']?>" name="id_cliente">
        <input type="hidden" value="lq" name="producto">
      <button type="submit" class="btn btn-primary mt-2">Info</button>
      </form>
      
    </div>
  </div>
</div>

                      <?php

                    }
                    }
                    $Lq7 = ControladorProductos::ctrContratoLq7($Cliente['id_cliente']);
                    if ($Lq7[0]['num_contrato'] !=  'N' ) {
                     


                    if (isset($Lq7[0])) {

                      $saldoLq7  = ControladorProductos::ctrSaldoLq7($Lq7[0]['Fk_cliente'], $Lq7[0]['num_contrato']);


                      $saldoTotalLq7 = ($saldoLq7[0]['titulos'] * $saldoLq7[0]['precio_mercado']) + $saldoLq7[0]['efectivo'];

                     

                      ?>



<div class="card col-6 radius-10">
  <div class="card-body">
    <!-- Encabezado con ícono y título -->
    <div class="d-flex align-items-center mb-3">
      <div class="widget-icon-2 bg-gradient-warning text-white p-2 rounded-circle">
        <i class="fadeIn animated bx bx-money"></i>
      </div>
      <h5 class="ms-3 mb-0">Lq</h5>
    </div>

    <!-- Sección de saldo total -->
    <h4 class="mb-2" title="Saldo Total">$<?= number_format($saldoTotalLq7, 2) ?></h4>

    <!-- Sección de número de contrato y botón en línea vertical -->
    <div class="mt-3">
      <h5 class="mb-2" title="Numero de Contrato"><?= $Lq7[0]['num_contrato'] ?></h5>
      <!-- Botón debajo del número de contrato -->
      <form action="historicoClienteLe" method="POST" >
        <input type="hidden" value="<?=$Cliente['id_cliente']?>" name= "id_cliente">
        <input type="hidden" value="lq" name="producto">
      <button type="submit" class="btn btn-primary mt-2">Info</button>
      </form>
      
    </div>
  </div>
</div>

                      <?php
                      
                    }
                  }
                    $garant = ControladorProductos::ctrGarant($Cliente['id_cliente']);
                    
                    if ($garant[0]['num_contrato_garant'] != 'N' ) {
                     
                    if (isset($garant[0])) {

                      $saldoGarant  = ControladorProductos::ctrSaldoGarant($garant[0]['Fk_cliente'], $garant[0]['num_contrato_garant']);


                      $saldoTotalGarant = $saldoGarant[0]['total_garant'];

                      
                      ?>

                      <<div class="card col-6 radius-10">
  <div class="card-body">
    <div class="d-flex align-items-center mb-3">
      <div class="widget-icon-2 bg-gradient-success text-white p-2 rounded-circle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
          <line x1="12" y1="1" x2="12" y2="23"></line>
          <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
        </svg>
      </div>
      <h5 class="ms-3 mb-0">Garant Mxn</h5>
    </div>

    <h5 class="mb-2" title="Saldo Total">$<?= number_format($saldoTotalGarant, 2) ?></h5>

    <!-- Alineación vertical -->
    <div class="mt-3">
      <h5 class="mb-2" title="Numero de Contrato"><?= $garant[0]['num_contrato_garant'] ?></h5>
      <!-- Botón colocado debajo -->
      <form action="historicoCliente" method="POST" >
        <input type="hidden" value="<?=$Cliente['id_cliente']?>" name= "id_cliente">
        <input type="hidden" value="garantMxn" name="producto">
      <button type="submit" class="btn btn-primary mt-2">Info</button>
      </form>
      
    </div>
  </div>
</div>


                      <?php

                    }  
                    }
                    $garantUsd = ControladorProductos::ctrGarantUsd($Cliente['id_cliente']);

                    if ($garantUsd[0]['num_contrato_garant'] !=  'N' ) {
                     
                    if (isset($garantUsd[0])) {

                      $saldoGarantUsd  = ControladorProductos::ctrSaldoGarantUsd($garantUsd[0]['Fk_cliente'], $garantUsd[0]['num_contrato_garant']);


                      $saldoTotalGarantUsd = $saldoGarantUsd[0]['total_garant'];

                    

                      ?>

<div class="card col-6 radius-10">
  <div class="card-body">
    <!-- Icono y título alineados -->
    <div class="d-flex align-items-center mb-3">
      <div class="widget-icon-2 bg-gradient-branding text-white p-2 rounded-circle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
          <line x1="12" y1="1" x2="12" y2="23"></line>
          <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
        </svg>
      </div>
      <h5 class="ms-3 mb-0">Garant Usd</h5>
    </div>

    <!-- Saldo Total -->
    <h5 class="mb-2" title="Saldo Total">$<?= number_format($saldoTotalGarantUsd, 2) ?></h5>

    <!-- Número de Contrato y Botón alineados verticalmente -->
    <div class="mt-3">
      <h5 class="mb-2" title="Número de Contrato"><?= $garantUsd[0]['num_contrato'] ?></h5>
      <form action="historicoCliente" method="POST" >
        <input type="hidden" value="<?=$Cliente['id_cliente']?>" name= "id_cliente">
        <input type="hidden" value="garantUsd" name="producto">
      <button type="submit" class="btn btn-primary mt-2">Info</button>
      </form>
      
    </div>
  </div>
</div>








                        <?php

                    } 
                    }
                    $tiee = ControladorProductos::ctrTiie($Cliente['id_cliente']);


                    if ($garantUsd[0]['num_contrato'] !=  'N' ) {
                  


                    if (isset($tiee[0]) && $tiee[0]['total_tiie'] != '') {

                        ?>
<div class="card col-6 radius-10">
  <div class="card-body">
    <!-- Alineación de ícono y título -->
    <div class="d-flex align-items-center mb-3">
      <div class="widget-icon-2 bg-gradient-danger text-white p-2 rounded-circle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
          <line x1="12" y1="1" x2="12" y2="23"></line>
          <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
        </svg>
      </div>
      <h5 class="ms-3 mb-0">Tiie</h5>
    </div>

    <!-- Saldo Total -->
    <h5 class="mb-2" title="Saldo Total">$<?= number_format($tiee[0]['total_tiie'], 2) ?></h5>

    <!-- Número de Contrato y Botón alineados verticalmente -->
    <div class="mt-3">
      <h5 class="mb-2" title="Número de Contrato"><?= $tiee[0]['num_contrato_tiie'] ?></h5>
      <form action="historicoCliente" method="POST" >
        <input type="hidden" value="<?=$Cliente['id_cliente']?>" name= "id_cliente">
        <input type="hidden" value="tiie" name="producto">
      <button type="submit" class="btn btn-primary mt-2">Info</button>
      </form>
      
    </div>
  </div>
</div>

                      <?php
                    }

                    }   ?>


                        </div>



                  </div>
                <?php
              }

                ?>
                </div>

            </div>
          </div><!--end row-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>