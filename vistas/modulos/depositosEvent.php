<?php
$id_cliente = filter_var($_POST['fk_cliente'], FILTER_SANITIZE_STRING);
$fk_fondo = filter_var($_POST['fk_fondo'], FILTER_SANITIZE_STRING);

$status_rel = filter_var($_POST['status_rel'], FILTER_SANITIZE_STRING);

$validacionEvent = ControladorDepositos::ctrValidacionEvent($id_cliente, $fk_fondo, $status_rel);

$count = count($validacionEvent);

if ($count != 0) {


    $series = ControladorDepositos::ctrSerieEvent();
    $bancos = ControladorDepositos::ctrBancos($id_cliente);

    $bancosJson = json_encode($bancos);
    $fondos = ControladorDepositos::ctrFondos();


    echo "<script>var bancosData = $bancosJson;</script>";
?>


    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Depositos Event</div>
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
            <div class="row">
                <div class="card col-8">
                    <div class="card-body">
                        <div class="container">
                            <h2 class="mt-5">Depósito Fondo Event del Cliente: <span class="text-primary"></span></h2>
                            <form action="saveDepositos" method="POST" class="mt-4">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="fondo" class="form-label">Fondo:</label>
                                        <select class="form-select" id="fondoEvent" name="fondoEvent">
                                            <option selected>-- SELECCIONA FONDO --</option>
                                            <option value="1">EVENT</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="fk_cliente" id="fk_cliente" value="<?= $id_cliente ?>">
                                    <input type="hidden" name="fk_asesor" id="fk_asesor" value="<?= $validacionEvent[0]['id_promotor'] ?>">
                                    <div class="col-md-6">
                                        <label for="serie" class="form-label">Serie</label>
                                        <select class="form-select" name="serieEvent" id="serieEvent">
                                            <option>-- SELECCIONA SERIE --</option>
                                            <?php

                                            foreach ($series as $serie) {

                                            ?>

                                                <option value='<?= $serie['fk_serie'] ?>'><?= $serie['nom_serie'] ?></option>

                                            <?php
                                            }


                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="numero-contrato" class="form-label">Fecha de Deposito</label>
                                        <input type="date" class="form-control" id="fecha_mov_event" name="fecha_mov_event" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tipo-moi" class="form-label">Precio Mercado</label>
                                        <input type="number" class="form-control" name="pm_actualEvent" id="pm_actualEvent" placeholder="Precio Mercado....." readonly required>
                                    </div>


                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="bancos-cliente" class="form-label">Bancos Cliente</label>

                                        <select class="form-select" id="banco" name="banco" onchange="llenarCampos(this.value)" required>
                                            <option>-- SELECCIONA BANCO --</option>
                                            <?php

                                            foreach ($bancos as $banco) {

                                            ?>

                                                <option value='<?= $banco['id_asignado'] ?>'><?= $banco['banco'] ?></option>

                                            <?php
                                            }


                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="titular-cuenta" class="form-label">Nombre de titular de la cuenta</label>
                                        <input type="text" class="form-control" name="titularCuenta" id="titularCuenta" placeholder="NOMBRE TITULAR DE CUENTA" readonly required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="numero-cuenta" class="form-label">Número cuenta</label>
                                        <input type="text" class="form-control" name="numeroCuenta" id="numeroCuenta" placeholder="NUMERO DE CUENTA" readonly required>
                                        <!-- <input type="hidden" class="form-control"  name="fk_cliente" id="fk_cliente" value="<?= $id_cliente ?>" readonly  required>
                        <input type="hidden" class="form-control"  name="fk_empleado" id="fk_empleado" value="<?= $validacionEvent[0]['fk_id_empleado'] ?>" readonly  required>
                    --> <input type="hidden" class="form-control" name="titulosActual" id="titulosActual" value="<?= $validacionEvent[0]['titulos'] ?>" readonly required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="clave" class="form-label">Clabe</label>
                                        <input type="text" class="form-control" id="clave_interbanc" name="clave_interbanc" placeholder="CLABE INTERBANCARIA" readonly required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="monto_inversion" class="form-label">Monto Deposito:</label>
                                        <input type="text" class="form-control" id="monto_deposito" name="monto_deposito" placeholder="MONTO DE DEPOSITO">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tipo_cambio" class="form-label">Tipo de Cambio</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="tipo_cambio" name="tipo_cambio" placeholder="Tipo de Cambio" style="text-align: center; font-weight: bold; color: blue;" step="0.01">
                                            <input type="number" class="form-control" id="porcentaje_dolar" name="porcentaje_dolar" value="0.1" step="0.1" style="text-align: center; color: red; max-width: 70px;">
                                        </div>
                                    </div>


                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="monto_inversion" class="form-label">Monto de USD:</label>
                                        <input type="text" class="form-control" id="monto_inversion_usd" name="monto_inversion_usd" placeholder="MONTO DE INVERSIÓN">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="monto_inversion" class="form-label">Monto de Inversión:</label>
                                        <input type="text" class="form-control" id="monto_inversion_mxn" name="monto_inversion" placeholder="MONTO DE INVERSIÓN">
                                    </div>



                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="asesor" class="form-label">Titulos</label>
                                        <input type="text" class="form-control" name="titulos" id="titulos" placeholder="" value="" readonly required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="porcentaje_comision" class="form-label">Efectivo</label>
                                        <input type="text" class="form-control" id="efectivo" name="efectivo" placeholder="%">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="asesor" class="form-label">Asesor</label>
                                        <input type="text" class="form-control" name="asesor" id="asesor" placeholder="INTRODUCIR NOMBRE DE PROMOTOR" value="<?= $validacionEvent[0]['nombre_completo'] ?>" readonly required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="porcentaje_comision" class="form-label">Porcentaje de Comisión:</label>
                                        <input type="text" class="form-control" id="porcentaje_comision" name="porcentaje_comision" placeholder="%">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="numero-contrato" class="form-label">Núm. Contrato</label>
                                        <input type="text" class="form-control" id="numero-contrato" name="numero-contrato" placeholder="NUMERO DE CONTRATO" value="<?= $validacionEvent[0]['num_contrato'] ?>" readonly required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tipo-moneda" class="form-label">Tipo de Moneda Cuenta</label>
                                        <input type="text" class="form-control" id="tipo_moneda" placeholder="TIPO DE MONEDA" name="tipo_moneda" readonly required>

                                    </div>
                                </div>

                                <h2 class="mt-5">Depósitos AVA Comisión</h2>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="fondo_ava" class="form-label">Fondo:</label>
                                        <select class="form-select" id="fondo_ava" name="fondo_ava">
                                            <option selected>-- SELECCIONA FONDO --</option>
                                            <option value="1">EVENT</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="numero-contrato" class="form-label">Fecha de Deposito</label>
                                        <input type="date" class="form-control" id="fecha_mov_event_ava" name="fecha_mov_event_ava" required>
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="comision_entrada" class="form-label">Comisión entrada:</label>
                                        <input type="text" class="form-control" id="comision_entrada" name="comision_entrada" placeholder="MONTO DE DEPOSITO">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="comision_transferencia" class="form-label">Comisión Transferencia:</label>
                                        <input type="text" class="form-control" id="comision_transferencia" name="comision_transferencia" value="10.00" style="color: red;">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="comision_tipo_cambio" class="form-label">Comisión Tipo Cambio:</label>
                                        <input type="text" class="form-control" id="comision_tipo_cambio" name="comision_tipo_cambio">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="titulos_ava" class="form-label">Títulos:</label>
                                        <input type="text" class="form-control" id="titulos_ava" name="titulos_ava" placeholder="TITULOS">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-2">Guardar</button>
                                    <button type="reset" class="btn btn-danger">Limpiar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card col-4">
        <div class="card-body">
          <h6 class="mb-0">Notas</h6>
          <hr>
          <p>Retiro mínimo: 2.3 USDT</p>
        </div>
      </div>
        </div>


                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        function actualizarMontos() {
                            let tipoCambio = parseFloat(document.getElementById('tipo_cambio').value);
                            let porcentaje_dolar = parseFloat(document.getElementById('porcentaje_dolar').value);
                            let montoDeposito = parseFloat(document.getElementById('monto_deposito').value);
                            let pmActual = parseFloat(document.getElementById('pm_actualEvent').value);
                            let comision_transferencia = parseFloat(document.getElementById('comision_transferencia').value);
                            let montoInversionUSD = 0;
                            let montoInversionMXN = 0;
                            let titulos = 0;
                            let efectivo = 0;
                            let montoInversionPorcent = 0;
                            let descuento = 0; // Inicializar descuento con un valor predeterminado

                            if (!isNaN(tipoCambio) && !isNaN(montoDeposito) && tipoCambio > 0) {
                                tipoCambioPorc = tipoCambio + porcentaje_dolar;
                                montoInversionUSD = montoDeposito / tipoCambio;
                                montoInversionUSDPorc = montoDeposito / tipoCambioPorc;

                                montoInversionPorcent = montoInversionUSD - montoInversionUSDPorc;

                                let porcentajeComision = parseFloat(document.getElementById('porcentaje_comision').value);
                                // Calcular descuento si porcentajeComision es un número válido
                                if (!isNaN(porcentajeComision)) {
                                    descuento = montoInversionUSDPorc * (porcentajeComision / 100);
                                }

                                montoInversionMXN = montoInversionUSDPorc - descuento;

                                comisionDolar = montoInversionMXN - montoInversionPorcent - comision_transferencia;

                                console.log(montoInversionMXN, comisionDolar);
                                console.log(descuento);

                                if (!isNaN(pmActual) && pmActual > 0) {
                                    titulos = comisionDolar / pmActual;
                                    // titulos = titulos % 1 >= 0.5 ? Math.ceil(titulos) : Math.floor(titulos);
                                    titulos = Math.floor(titulos);

                                    efectivo = comisionDolar - (titulos * pmActual);
                                    comision_entrada = montoInversionUSD - comisionDolar;
                                }
                            }

                            document.getElementById('monto_inversion_usd').value = montoInversionUSDPorc.toFixed(2);
                            document.getElementById('monto_inversion_mxn').value = comisionDolar.toFixed(2);
                            document.getElementById('titulos').value = titulos.toFixed(2);
                            document.getElementById('efectivo').value = efectivo.toFixed(2);
                            document.getElementById('comision_entrada').value = descuento.toFixed(2);
                            document.getElementById('comision_tipo_cambio').value = montoInversionPorcent.toFixed(2);
                        }

                        document.getElementById('tipo_cambio').addEventListener('input', actualizarMontos);
                        document.getElementById('monto_deposito').addEventListener('input', actualizarMontos);
                    });



                    $(document).ready(function() {
                        $('#fecha_mov_event_ava').change(function() {
                            var fechaSeleccionada = $(this).val(); // Obtiene la fecha seleccionada en formato YYYY-MM-DD
                            var idFondoAva = $('#fondo_ava').val(); // Obtiene el ID del fondo seleccionado
                            let comision_entrada = parseFloat(document.getElementById('comision_entrada').value);
                            let comision_tipo_cambio = parseFloat(document.getElementById('comision_tipo_cambio').value);
                            let total_comision = comision_entrada + comision_tipo_cambio;


                            // Usa la variable idFondoAva en lugar de idFondo
                            if (idFondoAva && fechaSeleccionada) { // Asegura que ambos valores estén disponibles
                                console.log(fechaSeleccionada, idFondoAva);
                                $.ajax({
                                    url: 'ajax/depositos/depositos.ajax.php', // Cambia esto por la ruta a tu script PHP
                                    type: 'POST',
                                    data: {
                                        id_fondoAva: idFondoAva, // Corrige aquí también
                                        fecha_mov_event_ava: fechaSeleccionada
                                    },
                                    success: function(data) {
                                        titulos_ava = total_comision / data.pm_actual;

                                        titulos_ava = Math.floor(titulos_ava);

                                        document.getElementById('titulos_ava').value = titulos_ava.toFixed(2);
                                    },
                                    error: function(xhr, status, error) {
                                        console.error("Error en la solicitud AJAX: " + error);
                                    }
                                });
                            } else {
                                console.error("ID del fondo o fecha no seleccionados.");
                            }
                        });
                    });
                </script>


                <script src="js/depositos.js"></script>
            <?php


        } else {
            echo '<script>
    Swal.fire({
        icon: "error",
        title: "Sin Asignación",
        text: "Este Cliente no tiene este producto Asignado",
        footer: "<a href=\'clientes\'>Ir a clientes</a>"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "clientes";
        }
    });
</script>';
        }
            ?>