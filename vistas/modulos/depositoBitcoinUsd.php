<?php

$id_cliente = filter_var($_POST['fk_cliente'], FILTER_SANITIZE_STRING);
$fk_fondo = filter_var($_POST['fk_fondo'], FILTER_SANITIZE_STRING);
$fk_serie = filter_var($_POST['fk_serie'], FILTER_SANITIZE_STRING);
$status_rel = filter_var($_POST['status_rel'], FILTER_SANITIZE_STRING);
$perfil = $_SESSION['perfil'];
$validacionBitcoin = ControladorDepositos::ctrValidacionBitcoin($id_cliente, $fk_fondo, $fk_serie, $status_rel);


$contratosActivos = ControladorClientes::ctrContratosActivos($id_cliente,$perfil);



$count = count($validacionBitcoin);

if ($count != 0) {


    $series = ControladorDepositos::ctrSerieBitcoin();
    $bancos = ControladorDepositos::ctrBancos($id_cliente);

    $bancosJson = json_encode($bancos);


    echo "<script>var bancosData = $bancosJson;</script>";




?>


    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">  DEPOSITOS CLIENTE BITCOIN <?php
                                    
                                
                                    ?> 
                                    
                                </div>
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
        <div class="border p-3 rounded">
            <div class="container mt-5">
                <form action="saveDepositos" method="POST" id="f_deposito_sp">
                    <input type="hidden" name="">
                    <div class="row">
                        <!-- Columna Izquierda -->
                        <div class="col-md-5">
                            <div class="mb-2">
                                <label for="fondo" class="form-label">Fondo</label>
                                <select class="form-select" id="fondo" name="fondo">
                                    <option value="9">BTC</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="bancos-cliente" class="form-label">Bancos Cliente<></label>
                                <select class="form-select" id="idBanco" name="idBanco" onchange="llenarCampos(this.value)" required>
                                    <option>-- SELECCIONA BANCO --</option>
                                    <?php foreach ($bancos as $banco): ?>
                                        <option value='<?= $banco['id_asignado'] ?>'><?= $banco['banco'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="numero-cuenta" class="form-label">Número cuenta</label>
                                <input type="text" class="form-control" name="numeroCuenta" id="numeroCuenta" placeholder="NUMERO DE CUENTA" readonly required>
                            </div>
                            <input type="hidden" class="form-control" name="fk_cliente" id="fk_cliente" value="<?= $id_cliente ?>" readonly required>
                            <input type="hidden" class="form-control" name="fk_empleado" id="fk_empleado" value="<?= $validacionBitcoin[0]['fk_id_empleado'] ?>" readonly required>
                            <input type="hidden" class="form-control" name="saldoActual" id="saldoActual" value="<?= $validacionBitcoin[0]['saldo_total'] ?>" readonly required>

                          
                            <div class="mb-2">
                                <label for="clave" class="form-label">Clabe</label>
                                <input type="text" class="form-control" id="clave_interbanc" name="clave_interbanc" placeholder="CLABE INTERBANCARIA" readonly required>
                            </div>
                            <div class="mb-2">
                                <label for="numero-contrato" class="form-label">Núm. Contrato</label>
                                <input type="text" class="form-control" id="numero-contrato" name="numero-contrato" placeholder="NUMERO DE CONTRATO" value="<?= $validacionBitcoin[0]['num_contrato'] ?>" readonly required>
                            </div>
                            <div class="mb-2">
                                <label for="cantidad_btc" class="form-label">Cantidad btc</label>
                                <input type="text" class="form-control" id="cantidad_btc" name="cantidad_btc" placeholder="Cantidad btc"  readonly required>
                            </div>
                            <div class="mb-2">
                                <label for="fecha_mov_bitcoin_usd" class="form-label">Fecha de Depósito</label>
                                <input type="date" class="form-control" id="fecha_mov_bitcoin_usd" name="fecha_mov_bitcoin_usd" required>
                            </div>
                               <div class="mb-2">
                                <label for="fec_liquidacion" class="form-label">Fecha Liquidación</label>
                                <input type="date" class="form-control" id="fec_liquidacion" name="fec_liquidacion" required readonly>
                            </div>
                        </div>
                        <!-- Columna Derecha -->
                        <div class="col-md-5 offset-md-1">
                        <div class="mb-3">
                            <label for="monto-inversion" class="form-label">Monto de Inversión</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="lni lni-dollar"></i></span>
                                <input type="text" class="form-control" name="monto_inversion" id="monto_inversion" 
                                    placeholder="MONTO DE INVERSIÓN" step="0.00" required>
                            </div>
                        </div>

                            <div class="mb-3">
                                <label for="asesor" class="form-label">Asesor</label>
                                <input type="text" class="form-control" name="asesor" id="asesor" placeholder="INTRODUCIR NOMBRE DE PROMOTOR" value="<?= $validacionBitcoin[0]['nombre_completo'] ?>" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="tipo-moneda" class="form-label">Tipo de Moneda</label>
                                <input type="text" class="form-control" id="t_moneda" placeholder="TIPO DE MONEDA" name="t_moneda"   value="USD" readonly required>
                                <input type="hidden" class="form-control" id="tipo_moneda" placeholder="TIPO DE MONEDA" name="tipo_moneda" readonly required>
                            </div>
                            <div class="mb-3">
                                <label for="titular-cuenta" class="form-label">Nombre de titular de la cuenta</label>
                                <input type="text" class="form-control" name="titularCuenta" id="titularCuenta" placeholder="NOMBRE TITULAR DE CUENTA" readonly required>
                            </div>
                            <div class="mb-2">
                                <label for="precioActual" class="form-label">Precio Actual</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="lni lni-dollar"></i></span>
                                    <input type="number" class="form-control" id="precioActual" name="precioActual" step="0.01" required readonly>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="monto_compra" class="form-label">Monto Compra</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="lni lni-dollar"></i></span>
                                    <input type="number" class="form-control" id="monto_compra" name="monto_compras" step="0.01" required readonly>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="monto_comision" class="form-label">Monto Comisión</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="lni lni-dollar"></i></span>
                                    <input type="number" class="form-control" id="monto_comision" name="monto_comision" step="0.01" required readonly>
                                </div>
                            </div>
                         
                         
                          
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-info">
                        Enviar Deposito
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


                <div class="card col-4">
                    <div class="card-body">
                        <h6 class="mb-0">Información</h6>
                        <hr>
                       <h6></h6>
                       <div class="card">
                      <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Numero Contrato</th>
                                <th>Valor</th>
                                <th>Moneda</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            foreach ($contratosActivos as $contratos ) {
                                
                               if (isset($contratos['titulos'])) {
                               $valor = $contratos['titulos'];
                               }elseif (isset($contratos['saldo'])) {
                                $valor = $contratos['saldo'];
                               }

                               if (isset($contratos['t_moneda'])) {
                                $moneda = $contratos['t_moneda'];
                               }else{
                                $moneda = '';
                               }
                            ?>
                            <tr>
                                <td><?=$contratos['tabla_origen']?></td>
                                <td><?=$contratos['num_contrato']?></td>
                                <td><?=$valor?></td>
                                <td><?=$moneda?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                      </table>
                      </div>
                      
                    </div>
                </div>
            </div>
           

            <script>
 $(document).ready(function() {
    $('#fecha_mov_bitcoin_usd').on('change', function() {
        var fecha = $(this).val();
        if (fecha) {
            // Separar día, mes y año de la fecha seleccionada
            var partes = fecha.split('-');
            var anio = parseInt(partes[0]);
            var mes = parseInt(partes[1]) + 1; // Sumar un mes
            var dia = partes[2];

            // Ajustar el formato del mes para mantener dos dígitos
            if (mes > 12) {
                mes = 1; // Si el mes excede 12, reiniciarlo a 1
                anio += 1; // Incrementar el año
            }
            mes = mes.toString().padStart(2, '0');

            // Crear la nueva fecha con el año ajustado
            var fechaLiquidacion = `${anio}-${mes}-${dia}`;
            console.log(fechaLiquidacion);

            // Asignar la fecha calculada en el campo fec_liquidacion
            $('#fec_liquidacion').val(fechaLiquidacion);

            // AJAX para obtener el precio
            $.ajax({
                url: 'ajax/depositos/depositosbitcoin.ajax.php',
                type: 'POST',
                data: { fecha_mov_bitcoin_usd: fecha },
                success: function(data) {
                    console.log('Respuesta del servidor:', data);
                    try {
                        var response = JSON.parse(data);
                        console.log(response);

                        if (response.p_mercado !== null) {
                            // Formatear precio actual a dos decimales
                            var precioFormateado = parseFloat(response.p_mercado).toFixed(2);
                            $('#precioActual').val(precioFormateado);

                            // Obtener el monto de inversión y calcular comisión
                            var montoInversionOriginal = parseFloat($('#monto_inversion').val()); // Campo monto inversión
                            if (!isNaN(montoInversionOriginal) && montoInversionOriginal > 0) {
                                // Aplicar comisión del 2%
                                var montoInversionConComision = (montoInversionOriginal * 0.99).toFixed(2);
                                var monto_comision = montoInversionOriginal - montoInversionConComision;
                                $('#monto_comision').val(monto_comision); // Actualizar input con el monto tras la comisión
                                $('#monto_compra').val(montoInversionConComision); // Actualizar input con el monto tras la comisión

                                // Calcular la cantidad de Bitcoin
                                var cantidadBitcoin = (montoInversionConComision / precioFormateado).toFixed(6);
                                $('#cantidad_btc').val(cantidadBitcoin); // Mostrar resultado en un campo
                            } else {
                                alert('Por favor, ingresa un monto de inversión válido.');
                            }
                        } else {
                            $('#precioActual').val('');
                            alert('No se encontró precio para la fecha seleccionada.');
                        }
                    } catch (e) {
                        console.error('Error parsing JSON:', e);
                    }
                },
                error: function() {
                    alert('Hubo un error al obtener el precio.');
                }
            });
        }
    });
});


</script>




        <?php
        if (isset($_POST['titulos'])) {
            // ModeloDepositos::depositoSp();
            // $id_cliente = filter_var($_POST['fk_cliente'], FILTER_SANITIZE_STRING);
        }
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


        <script src="js/depositos.js"></script>







