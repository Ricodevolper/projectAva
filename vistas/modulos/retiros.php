<?php

$id_cliente = $_POST['id_cliente'];

$inversionesSp = ControladorRetiros::ctrRetirosClienteSP($id_cliente);
$inversionesEvent = ControladorRetiros::ctrRetirosClienteEvent($id_cliente);
$inversionesBitcoin = ControladorRetiros::ctrRetirosClienteBitcoin($id_cliente);

$fecha_actual = date('Y-m-d');

$series = ControladorDepositos::ctrSerieSp();
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
            <div class="breadcrumb-title pe-3">Retiros</div>
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
            <?php

            ?>
        </div>
        <?php

        if ($inversionesSp  != '') {



        ?>
            <div class="card">



                <div class="card-body">
                    <h4> S&P</h4>
                    <table class="table mb-0 table-striped">
                        <thead>
                            <tr>

                                <th scope="col">Id Mov</th>
                                <th scope="col">Valor Compra</th>
                                <th scope="col">Ultimo Valor</th>
                                <th scope="col">Número Contrato</th>
                                <th scope="col">Saldo Total</th>
                                <th scope="col">Tipo Moneda</th>
                                <th scope="col">Fecha inicio</th>
                                <th scope="col">Fecha Liquidación</th>
                                <th scope="col"></th>
                                <th scope="col">Detalle</th>
                                <th scope="col">Estado Cuenta</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($inversionesSp as $inversion) {


                                $id_serie = $inversion['serie']; // Ejemplo de ID de serie. Cambia este valor según sea necesario.

                                $serie = ($id_serie == 1) ? 'A1' : (($id_serie == 2) ? 'A2' : (($id_serie == 3) ? 'A3' : (($id_serie == 4) ? 'B1' : (($id_serie == 5) ? 'B2' : (($id_serie == 6) ? 'B3' : (($id_serie == 7) ? 'C1' : (($id_serie == 8) ? 'C2' : (($id_serie == 9) ? 'C3' : (($id_serie == 10) ? 'E1' : (($id_serie == 11) ? 'E2' : (($id_serie == 12) ? 'E3' : (($id_serie == 13) ? 'F2' : (($id_serie == 14) ? 'ST' : (($id_serie == 15) ? 'B4' : 'Desconocido'))))))))))))));

                            ?>

                                <form method="POST" action="solicitudRetiro" class="form-retiro" id="form-<?= $inversion['id_mov'] ?>">
                                    <input type="hidden" name="id_cliente" value="<?= $inversion['Fk_cliente'] ?>">
                                    <tr>
                                        <td scope="row">
                                            <input type="text" name="id_mov" value="<?= $inversion['id_mov'] ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="precio_compra" value="<?= number_format($inversion['precio_compra'], 2) ?>" readonly class="form-control">
                                        </td>
                                        <input type="hidden" name="fondo" value="<?= $inversion['fondo'] ?>" readonly class="form-control">
                                        <input type="hidden" name="Fk_empleado" value="<?= $inversion['Fk_empleado'] ?>" readonly class="form-control">
                                         <td>
                                            <input type="text" name="max_precio" value="<?= number_format($inversion['max_precio'], 2) ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="num_contrato" value="<?= $inversion['num_contrato'] ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="saldo_total" value="$ <?= number_format($inversion['total_dls'], 2) ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="t_moneda" value="<?= $inversion['t_moneda'] ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="fecha_movsp" id="fecha_movsp" value="<?= $inversion['fecha_mov'] ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="fec_liquidacion" id="fec_liquidacion" value="<?= $inversion['fecha_liquidacion'] ?>" readonly class="form-control">
                                        </td>
                                      

                                            <?php
                                         
                                                    
                                            if ($inversion['status_liquidacion'] == 0) {
                                                if ($_SESSION['perfil'] == 'administrador') {
                                           ?> 
                                          
                                             <td>
                                             <div class="d-grid gap-2">
                                           <button
                                           type="button" class="btn btn-info retiro-btn"
                                           data-form-id="form-<?= $inversion['id_mov'] ?>"
                                           data-fecha-movsp="<?= $inversion['fecha_mov'] ?>"
                                           data-precio-compra="<?= $inversion['precio_compra'] ?>"
                                           data-max-precio="<?= $inversion['max_precio'] ?>"
                                           data-saldo-total="<?= $inversion['total_dls'] ?>"
                                           data-fec-liquidacion="<?= $inversion['fecha_liquidacion'] ?>"
                                           onclick="ConsultaFechaRetiro(this)">
                                           Consulta
                                       </button>
                                       </td>
                                       <td>
                                       <div class="d-grid gap-2">
                                                <button
                                                    type="button" class="btn btn-danger retiro-btn"
                                                    data-form-id="form-<?= $inversion['id_mov'] ?>"
                                                    data-fecha-movsp="<?= $inversion['fecha_mov'] ?>"
                                                    data-precio-compra="<?= $inversion['precio_compra'] ?>"
                                                    data-max-precio="<?= $inversion['max_precio'] ?>"
                                                    data-saldo-total="<?= $inversion['total_dls'] ?>"
                                                    data-fec-liquidacion="<?= $inversion['fecha_liquidacion'] ?>"
                                                    onclick="verificarFechaRetiro(this)">
                                                    Retiro
                                                </button>
                                                </div>
                                                </td>


                                                </form>

                                                <td>
                                                <div class="d-grid gap-2">
                                                <form action="estadoCuenta" method="POST">
                                                    <input type="hidden" name="id_cliente" value="<?=$inversion['Fk_cliente']?>">
                                                    <input type="hidden" name="num_contrato" value="<?=$inversion['num_contrato']?>">
                                                    <input type="hidden" name="fecha_mov" value="<?=$inversion['fecha_mov'] ?>">
                                           <button type="submit" class="btn btn-dark retiro-btn"> <i class="fadeIn animated bx bx-money"></i></button>
                                           </form>
                                     
                                       </div>

                                       </td>
                                               
                                                <?php
                                                } 
                                            elseif($_SESSION['perfil'] == 'DirectorAvawm' ){?>
                                            <td></td>
                                            <td>
                                            <div class="d-grid gap-2">
                                            <button
                                            
                                                    type="button" class="btn btn-info retiro-btn"
                                                    data-form-id="form-<?= $inversion['id_mov'] ?>"
                                                    data-fecha-movsp="<?= $inversion['fecha_mov'] ?>"
                                                    data-precio-compra="<?= $inversion['precio_compra'] ?>"
                                                    data-max-precio="<?= $inversion['max_precio'] ?>"
                                                    data-saldo-total="<?= $inversion['total_dls'] ?>"
                                                    data-fec-liquidacion="<?= $inversion['fecha_liquidacion'] ?>"
                                                    onclick="ConsultaFechaRetiro(this)">
                                                    Consulta
                                                </button>
                                                </form>
                                                </div>
                                                </td>

                                                <td>
                                                <div class="d-grid gap-2">
                                                <form action="estadoCuenta">
                                                    <input type="hidden" name="id_cliente" value="6">
                                           <button type="submit" class="btn btn-dark retiro-btn"> <i class="fadeIn animated bx bx-money"></i></button>
                                           </form>
                                     
                                       </div>

                                       </td>
                                                
                                            <?php  }?>
                                            </div>
                                       
                                    </tr>
                               
                            <?php

                            }}
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php

            foreach ($inversionesSp as $inversion) {
                $id_serie = $inversion['serie']; // Ejemplo de ID de serie. Cambia este valor según sea necesario.

                $serie = ($id_serie == 1) ? 'A1' : (($id_serie == 2) ? 'A2' : (($id_serie == 3) ? 'A3' : (($id_serie == 4) ? 'B1' : (($id_serie == 5) ? 'B2' : (($id_serie == 6) ? 'B3' : (($id_serie == 7) ? 'C1' : (($id_serie == 8) ? 'C2' : (($id_serie == 9) ? 'C3' : (($id_serie == 10) ? 'E1' : (($id_serie == 11) ? 'E2' : (($id_serie == 12) ? 'E3' : (($id_serie == 13) ? 'F2' : (($id_serie == 14) ? 'ST' : (($id_serie == 15) ? 'B4' : 'Desconocido'))))))))))))));


            ?>
               


              


            <?php
            }
        }
        

        if ($inversionesBitcoin  != '') {



        ?>
            <div class="card">



                <div class="card-body">
                    <h4> BTC</h4>
                    <table class="table mb-0 table-striped">
                        <thead>
                            <tr>

                                <th scope="col">Id Mov</th>
                                <th scope="col"> Ultimo Valor Compra</th>
                                 <th scope="col">Número Contrato</th>
                                <th scope="col">Saldo Total Btc</th>
                                <th scope="col">Tipo Moneda</th>
                                <th scope="col">Fecha inicio</th>
                                <th scope="col">Fecha Liquidación</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($inversionesBitcoin as $inversion) {


              


                               
                            ?>

                                <form method="POST" action="solicitudRetiro" class="form-retiro" id="form-<?= $inversion['id_mov_bitcoin'] ?>">
                                    <input type="hidden" name="id_cliente" value="<?= $inversion['Fk_cliente'] ?>">
                                    <tr>
                                        <td scope="row">
                                            <input type="text" name="id_mov_bitcoin" value="<?= $inversion['id_mov_bitcoin'] ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="precio_compra" value="<?= number_format($inversion['precio_compra'], 2) ?>" readonly class="form-control">
                                        </td>
                                           <input type="hidden" name="Fk_empleado" value="<?= $inversion['fk_empleado'] ?>" readonly class="form-control">
                                        
                                        <td>
                                            <input type="text" name="num_contrato" value="<?= $inversion['num_contrato'] ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="saldo_total" value=" <?= number_format($inversion['monto_btc'], 6) ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="t_moneda" value="<?= $inversion['t_moneda'] ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="fecha_movbtc" id="fecha_movbtc" value="<?= $inversion['fecha_mov'] ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="fec_liquidacion" id="fec_liquidacion" value="<?= $inversion['fecha_liquidacion'] ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2">

                                            <?php
                                         
                                                    
                                            if ($inversion['status_liquidacion'] == 0) {
                                                if ($_SESSION['perfil'] == 'administrador') {
                                           ?>
                                                <button
                                                    type="submit" class="btn btn-danger retiro-btn" data-bs-toggle="modal" data-bs-target="#modalBtc<?$inversion['id_mov_bitcoin'] ?>" >
                                                    Retiro
                                                </button>

                                                <?php
                                                } 
                                            }else{?>
                                            <button
                                                type="button"
                                                class="btn btn-warning" disabled>
                                                Liquidado
                                            </button>
                                            <?php  }?>
                                            </div>
                                        </td>
                                    </tr>
                                </form>

                            <?php

                            }

                             
                            
                            ?>
                            <!-- Modal -->

                        </tbody>
                    </table>
                </div>
            </div>

            <?php

    
    }



   ?>




        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('titulosVender').addEventListener('input', function() {
                    const titulosVender = parseFloat(document.getElementById('titulosVender').value) || 0;
                    const titulosDisponibles = parseFloat(document.getElementById('titulosDisponiblesSp').value) || 0;

                    if (titulosVender > titulosDisponibles) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'La cantidad de títulos a vender no puede ser mayor que los títulos disponibles',
                        });
                        document.getElementById('titulosVender').value = titulosDisponibles;
                        return;
                    }

                    const precioMercado = parseFloat(document.getElementById('precioMercado').value) || 0;
                    const resultado = (titulosVender * precioMercado).toFixed(2);
                    document.getElementById('montoRetiro').value = resultado;
                });
            });
        </script>
        <script>
            document.getElementById('retiroForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Evita que el formulario se envíe inmediatamente

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Confirma que deseas enviar la solicitud de retiro.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, enviar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Envía el formulario si se confirma la alerta
                        document.getElementById('retiroForm').submit();
                    }
                });
            });
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('titulosVenderEvent').addEventListener('input', function() {
                    const titulosVender = parseFloat(document.getElementById('titulosVenderEvent').value) || 0;
                    const titulosDisponibles = parseFloat(document.getElementById('titulosDisponiblesEvent').value) || 0;

                    if (titulosVender > titulosDisponibles) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'La cantidad de títulos a vender no puede ser mayor que los títulos disponibles',
                        });
                        document.getElementById('titulosVenderEvent').value = titulosDisponibles;
                        return;
                    }

                    const precioMercado = parseFloat(document.getElementById('precio_mercadoEvent').value) || 0;
                    const resultado = (titulosVender * precioMercado).toFixed(2);
                    document.getElementById('montoRetiroEvent').value = resultado;
                });
            });
        </script>
        <script>
            document.getElementById('retiroForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Evita que el formulario se envíe inmediatamente

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Confirma que deseas enviar la solicitud de retiro.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, enviar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Envía el formulario si se confirma la alerta
                        document.getElementById('retiroForm').submit();
                    }
                });
            });
        </script>
         <script>
                   function verificarFechaRetiro(button) {
    // Obtener el ID del formulario a partir del atributo data-form-id
    const formId = button.getAttribute('data-form-id');
    const form = document.getElementById(formId);

    if (!form) {
        console.error("Formulario no encontrado para el botón Retiro.");
        return;
    }

    const fechaMovSp = new Date(button.getAttribute('data-fecha-movsp'));
    const fechaActual = new Date();

    // Calcular la diferencia en meses
    const diferenciaMeses = (fechaActual.getFullYear() - fechaMovSp.getFullYear()) * 12 +
        (fechaActual.getMonth() - fechaMovSp.getMonth());

    // Si han pasado menos de 3 meses, muestra el error y no permite retiro
    if (diferenciaMeses < 3) {
        Swal.fire({
            icon: 'error',
            title: 'Retiro no permitido',
            text: 'No se puede realizar el retiro antes de los tres meses desde la fecha del movimiento.',
            confirmButtonText: 'Entendido'
        });
        return;
    }

    // Obtener y comparar con fecha de liquidación
    const fechaLiquidacion = new Date(button.getAttribute('data-fec-liquidacion'));

    if (fechaActual < fechaLiquidacion) {
        const precioCompra = parseFloat(button.getAttribute('data-precio-compra'));
        const maxPrecio = parseFloat(button.getAttribute('data-max-precio'));
        const saldoTotal = parseFloat(button.getAttribute('data-saldo-total'));

        // Cálculo de rendimiento
        let porcentajeDiferencia = ((maxPrecio - precioCompra) / precioCompra) * 100;
        porcentajeDiferencia = Math.min(porcentajeDiferencia, 14); // Limitar a un máximo de 14%

        const rendimientoDiario = porcentajeDiferencia / 365;

        // Calcular la diferencia en días entre fecha_movsp y fecha actual
        const diferenciaDias = Math.floor((fechaActual - fechaMovSp) / (1000 * 60 * 60 * 24));

        // Calcular el rendimiento general
        const rendimientoGeneral = parseFloat(saldoTotal + (saldoTotal * (rendimientoDiario * diferenciaDias) / 100));
        
        const rendimientoFormateado = rendimientoGeneral.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        // Mostrar advertencia
        Swal.fire({
            icon: 'warning',
            title: 'Retiro antes de la fecha de liquidación',
            html: `Se está realizando el retiro antes de la fecha de liquidación.<br><br>
                   El rendimiento calculado hasta la fecha es: <strong>$${rendimientoFormateado}</strong>`,
            confirmButtonText: 'Continuar',
            showCancelButton: true,
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Enviar el formulario encontrado
            }
        });
    } else {
        // Si cumple todas las condiciones, enviar el formulario directamente
        form.submit();
    }
}

                </script>
         <script>
                   function ConsultaFechaRetiro(button) {
    // Obtener el ID del formulario a partir del atributo data-form-id
    const formId = button.getAttribute('data-form-id');
    const form = document.getElementById(formId);

    if (!form) {
        console.error("Formulario no encontrado para el botón Retiro.");
        return;
    }

    const fechaMovSp = new Date(button.getAttribute('data-fecha-movsp'));
    const fechaActual = new Date();

    // Calcular la diferencia en meses
    const diferenciaMeses = (fechaActual.getFullYear() - fechaMovSp.getFullYear()) * 12 +
        (fechaActual.getMonth() - fechaMovSp.getMonth());

    // Si han pasado menos de 3 meses, muestra el error y no permite retiro
   
    // Obtener y comparar con fecha de liquidación
    const fechaLiquidacion = new Date(button.getAttribute('data-fec-liquidacion'));

    if (fechaActual < fechaLiquidacion) {
        const precioCompra = parseFloat(button.getAttribute('data-precio-compra'));
        const maxPrecio = parseFloat(button.getAttribute('data-max-precio'));
        const saldoTotal = parseFloat(button.getAttribute('data-saldo-total'));

        // Cálculo de rendimiento
        let porcentajeDiferencia = ((maxPrecio - precioCompra) / precioCompra) * 100;
        porcentajeDiferencia = Math.min(porcentajeDiferencia, 14); // Limitar a un máximo de 14%

        const rendimientoDiario = porcentajeDiferencia / 365;

        // Calcular la diferencia en días entre fecha_movsp y fecha actual
        const diferenciaDias = Math.floor((fechaActual - fechaMovSp) / (1000 * 60 * 60 * 24));

        // Calcular el rendimiento general
        const rendimientoGeneral = parseFloat(saldoTotal + (saldoTotal * (rendimientoDiario * diferenciaDias) / 100));
        
        const rendimientoFormateado = rendimientoGeneral.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        // Mostrar advertencia
        Swal.fire({
    icon: 'warning',
    title: 'Consulta antes de la fecha de liquidación',
    html: `Rendimiento antes de la fecha de liquidación.<br><br>
           El rendimiento calculado hasta la fecha es: <strong>$${rendimientoFormateado}</strong>`,
    showConfirmButton: false, // Oculta el botón de confirmación (OK)
    showCancelButton: true, // Muestra solo el botón de cancelar
    cancelButtonText: 'Salir', // Cambia el texto del botón de cancelar
});
    } else {
        // Si cumple todas las condiciones, enviar el formulario directamente
        form.submit();
    }
}

                </script>

           


        <script src="js/depositos.js"></script>