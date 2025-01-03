<?php
$perfil = $_SESSION['perfil'];
$saldoTotalEvent = ControladorProductos::ctrSaldoTotalEvent($perfil);
$saldoTotalLq = ControladorProductos::ctrSaldoTotalLq($perfil);
$saldoTotalGarant = ControladorProductos::ctrSaldoTotalGarant($perfil);
$saldoTotalStable = ControladorProductos::ctrSaldoTotalStable($perfil);
$saldoTotalSp = ControladorProductos::ctrSaldoTotalSp($perfil);
$saldoTotalTiie = ControladorProductos::ctrSaldoTotalTiie($perfil);
$totalanualGarant = ControladorRetiros::ctrAnualGarant();
$totalMensualGarant = ControladorRetiros::ctrMensualGarant();
$ventaUsuarios = ControladorBi::ctrBiGarantIngreso($perfil);
$NewClient = ControladorBi::ctrBiGarantNuevoCliente();
$GarantProxVenc = ControladorBi::ctrGarantProximoPago($perfil);
$GarantVencidos = ControladorBi::ctrGarantVencidos($perfil);
$GarantVencidosHoy = ControladorBi::ctrGarantVencidosHoy();
$GarantLiquidaciones = ControladorBi::ctrLiquidacionesProximas($perfil);
$saldoTotalBtc = ControladorBi::ctrSaldoTotalBtc($perfil);

$agentesConContratos = ControladorBi::ctrAsesoresContratosActivos($perfil);



//   foreach ($agentesConContratos as $id_empleado) {
//     // Obtener datos del empleado
//     $datos = $datosEmpleado->ctrDatosEmpleados($id_empleado);
//     $garant = $datosEmpleado->ctrDatosGarant($id_empleado);
//     $Lq = $datosEmpleado->ctrDatosLq($id_empleado);
//     $event = $datosEmpleado->ctrDatosEvent($id_empleado);
//     $stable = $datosEmpleado->ctrDatosStable($id_empleado);
//     $tiie = $datosEmpleado->ctrDatosTiie($id_empleado);

//   }


$clientesGarantProxVenc = [];

foreach ($GarantProxVenc as $fila) {
    // Agregar solo los clientes únicos al array
    $clientesGarantProxVenc[$fila['fk_cliente']] = true;
}

// Contar los distintos clientes
$totalClientesGarantProxVenc = count($clientesGarantProxVenc);


$clientesGarantVencidos;
foreach ($GarantVencidos as $fila) {
    // Agregar solo los clientes únicos al array
    $clientesGarantVencidos[$fila['fk_cliente']] = true;
}

// Contar los distintos clientes
$totalClientesGarantVencidos = count($clientesGarantVencidos);

?>

<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard <?php

                                                            ?> </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="javascript:;">
                                <ion-icon name="home-outline"></ion-icon>
                            </a>
                        </li>

                    </ol>
                </nav>
            </div>

        </div>
        <div class="row align-items-stretch">
            <div class="col-12 col-md-4 col-lg-2 d-flex">
                <div class="card radius-10 border shadow-none mb-0 flex-fill">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="fs-3 text-tiffany">
                                <a href="" class="btn btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                    </svg>
                                </a>
                            </div>
                            <h5 class="mb-0 mt-2">Event</h5>
                            <div>
                                <h4 class="mb-0">$ <?= number_format($saldoTotalEvent['saldo_total_sumado']) ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-2 d-flex">
                <div class="card radius-10 border shadow-none mb-0 flex-fill">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="fs-3 text-tiffany">
                                <a href="" class="btn btn-dark">
                                    <i class="fadeIn animated bx bx-money"></i>
                                </a>
                            </div>
                            <h5 class="mb-0 mt-2">Lq</h5>
                            <div>
                                <h4 class="mb-0">$ <?= number_format($saldoTotalLq['saldo_total_sumado']) ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-2 d-flex">
                <div class="card radius-10 border shadow-none mb-0 flex-fill">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="fs-3 text-tiffany">
                                <a href="" class="btn btn-dark">
                                    <i class="fadeIn animated bx bx-money"></i>
                                </a>
                            </div>
                            <h5 class="mb-0 mt-2">Sp</h5>
                            <div>
                                <h4 class="mb-0">$ <?= number_format($saldoTotalSp['saldo_total_mxn']) ?> Mxn</h4><Br>
                                <h4 class="mb-0">$ <?= number_format($saldoTotalSp['saldo_total_usd']) ?> Usd</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-2 d-flex">
                <div class="card radius-10 border shadow-none mb-0 flex-fill">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="fs-3 text-tiffany">
                                <a href="" class="btn btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                </a>
                            </div>
                            <h5 class="mb-0 mt-2">Garant</h5>
                            <div>
                                <h4 class="mb-0">$ <?= number_format($saldoTotalGarant['saldo_total_sumado']) ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-2 d-flex">
                <div class="card radius-10 border shadow-none mb-0 flex-fill">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="fs-3 text-tiffany">
                                <a href="" class="btn btn-dark">
                                    <i class="lni lni-bitcoin"></i>
                                </a>
                            </div>
                            <h5 class="mb-0 mt-2">Bitcoin</h5>
                            <div>
                                <h4 class="mb-0">$ <?= number_format($saldoTotalBtc[0]['total'],2)?> Mxn</h4>
                                <h4 class="mb-0"><?= number_format($saldoTotalBtc[0]['btc'],6)?> Btc</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-2 d-flex">
                <div class="card radius-10 border shadow-none mb-0 flex-fill">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="fs-3 text-tiffany">
                                <a href="" class="btn btn-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-type">
                                        <polyline points="4 7 4 4 20 4 20 7"></polyline>
                                        <line x1="9" y1="20" x2="15" y2="20"></line>
                                        <line x1="12" y1="4" x2="12" y2="20"></line>
                                    </svg>
                                </a>
                            </div>
                            <h5 class="mb-0 mt-2">Tiie & Cetes</h5>
                            <div>
                                <h4 class="mb-0">$ <?= number_format($saldoTotalTiie['saldo_total_sumado'], 2) ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <h1 class="text-"></h1>
            <div class="col-12 col-xl-9 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">

                            <div class="dropdown options ms-auto">
                                <div class="dropdown-toggle dropdown-toggle-nocaret"
                                    data-bs-toggle="dropdown">
                                    <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                                </div>

                            </div>
                        </div>
                        <div class="row g-4 align-items-center mb-4">
                            <div class="col-12 col-xl-4">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <h3 class="mb-0 text-black">
                                        $<?= number_format($totalanualGarant[3]['total'], 2) ?>
                                    </h3>

                                </div>
                                <p class="mb-0">Inversion Actual</p>
                            </div>
                            <div class="col-12 col-xl-8">
                                <div id="chart3"></div>
                            </div>
                            <div class="d-flex flex-column flex-lg-row align-items-lg-center align-self-end justify-content-lg-between  p-3 gap-3 mb-0 ">
                                <?php foreach ($totalanualGarant as $anualGarant) { ?>
                                    <div class="  radius-10 w-100 ">
                                        <div class=" ">
                                            <h4 class="mb-0 text-info">$<?= number_format($anualGarant['total'], 2) ?></h4>
                                            <p class="mb-0 text-black">
                                                <strong><?= $anualGarant['anio'] ?></strong>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- <div class="vr d-none d-lg-block"></div> -->
                                <?php } ?>

                                <?php
                                function getMonthName($monthNumber)
                                {
                                    $months = [
                                        '01' => 'Jan',
                                        '02' => 'Feb',
                                        '03' => 'Mar',
                                        '04' => 'Apr',
                                        '05' => 'May',
                                        '06' => 'Jun',
                                        '07' => 'Jul',
                                        '08' => 'Aug',
                                        '09' => 'Sep',
                                        '10' => 'Oct',
                                        '11' => 'Nov',
                                        '12' => 'Dec'
                                    ];
                                    return $months[$monthNumber];
                                }

                                foreach ($totalMensualGarant as &$entry) {
                                    $entry['mes'] = getMonthName($entry['mes']);
                                }
                                ?>

                            </div>

                            <div class="d-flex align-items-start gap-2">
                                <div>
                                    <p class="mb-0 fs-6">Clientes Nuevo Garant</p>
                                </div>

                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <div>
                                    <h4 class="mb-0"><?= count($NewClient); ?></h4>
                                </div>

                            </div>

                        </div>
                        <!--end row-->


                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-4 col-xl-3">
                <div class="card radius-10 w-100">
                    <div class="card-body col-12 ">
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0">Ingreso por Usuario</h6>
                            <div class="dropdown options ms-auto">
                                <div class="dropdown-toggle dropdown-toggle-nocaret"
                                    data-bs-toggle="dropdown">
                                    <ion-icon name="ellipsis-horizontal-outline"
                                        class="md hydrated"></ion-icon>
                                </div>

                            </div>
                        </div>
                        <div class="colcountries-list">


                            <?php
                            $datosEmpleado = new ControladorEmpleado();
                            foreach ($agentesConContratos as $key) {
                                $id_empleado =  $key['fk_empleado'];
                                // Obtener datos del empleado
                                $datos = $datosEmpleado->ctrDatosEmpleados($id_empleado);
                                $garant = $datosEmpleado->ctrDatosGarant($id_empleado);
                                $Lq = $datosEmpleado->ctrDatosLq($id_empleado);
                                $event = $datosEmpleado->ctrDatosEvent($id_empleado);
                                $stable = $datosEmpleado->ctrDatosStable($id_empleado);
                                $tiie = $datosEmpleado->ctrDatosTiie($id_empleado);
                                $sp = $datosEmpleado->ctrDatosSP($id_empleado);
                                $btc = $datosEmpleado->ctrDatosBtc($id_empleado);

                            


                                $montoGarantMxn = 0;
                                $montoGarantUsd = 0;
                                $montoEvent = 0;
                                $montostable = 0;
                                $montotiie = 0;
                                $montospMxn = 0;
                                $montospUsd = 0;
                                $montobtcUsd = 0;
                                $montobtcMxn = 0;

                                foreach ($garant as $sumaGarant) {
                                    if ($sumaGarant['t_moneda'] == 'MXN') {
                                        $montoGarantMxn +=  $sumaGarant['monto_inver'];
                                    }
                                    if ($sumaGarant['t_moneda'] == 'USD') {
                                        $montoGarantUsd +=  $sumaGarant['monto_inver'];
                                    }
                                }

                                $montoLq = 0;

                                foreach ($Lq as $sumaLq) {

                                    $montoLq += $sumaLq['saldo_total'];
                                }
                                foreach ($tiie as $sumatiie) {

                                    $montotiie += $sumatiie['monto_inver'];
                                }
                                foreach ($event as $sumaEvent) {

                                    $montoEvent += $sumaEvent['saldo_total'];
                                }
                                foreach ($stable as $sumastable) {

                                    $montostable += $sumastable['saldo_total'];
                                }
                                foreach ($sp as $sumasp) {
                                       if ($sumasp['t_moneda'] == 'MXN') {
                                        $montospMxn += $sumasp['saldo_total'];
                                       }
                                       if ($sumasp['t_moneda'] == 'USD') {
                                        $montospUsd += $sumasp['saldo_total'];
                                       }
                                   
                                }
                                foreach ($btc as $sumabtc) {
                                       if ($sumabtc['t_moneda'] == 'MXN') {
                                        $montobtcUsd += $sumabtc['saldo_total'];
                                       }
                                       if ($sumabtc['t_moneda'] == 'USD') {
                                        $montobtcMxn += $sumabtc['saldo_total'];
                                       }
                                        
                                }

                               if (isset($btc[0]['max_precio'])) {
                                $montobtcUsd = $montobtcUsd * $btc[0]['max_precio']; 
                                $montobtcMxn = $montobtcMxn *$btc[0]['max_precio']; 

                               }

                              

                                $totalMxn = $montoGarantMxn;
                                $totalUsd = $montoGarantUsd;
                                $totalLq = $montoLq;
                                $totalEvent = $montoEvent;
                                $totalstable = $montostable;
                                $totalSpUsd = $montospUsd;
                                $totalSpMxn = $montospMxn;

                                $total = $montoGarantMxn + $montoLq + $montoEvent + $montostable + $montotiie + $montospMxn +$montobtcMxn ;
                                $totalUsd =  $montoGarantUsd + $montospUsd + $montobtcUsd; 

                                if ($total != 0) {




                            ?>

                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="col-12 d-flex align-items-center">
                                            <form action="panelEmpleado" method="POST" class="me-3">
                                                <input type="hidden" name="id_empleado" value="<?= $id_empleado ?>">
                                                <input type="hidden" name="tipo_ava" value="<?= $_SESSION['perfil'] ?>">
                                                <button type="submit" class="btn btn-dark">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-dollar-sign">
                                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                            <div class="country-name flex-grow-1">
                                                <h5 class="mb-0 text-info">$<?= number_format($total, 2)  ?>Mxn</h5>
                                                <h5 class="mb-0 text-info">$<?= number_format($totalUsd, 2)  ?>Usd</h5>
                                                <p class="mb-0 text-secondary"><?= $datos[0]['nombre_promotor'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                            <?php

                                }
                            }

                            ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
        if ($_SESSION['perfil'] == 'director' || $_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'DirectorAvawm') {



        ?>
            <div class="row">

                <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                    <div class="card radius-10 border shadow-none mb-0">
                        <a href="vencimientoshoy">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-2">
                                    <div>
                                        <p class="mb-0 fs-6 text-dark">Vencimientos de Hoy</p>
                                    </div>
                                    <div
                                        class="ms-auto widget-icon-small text-white bg-gradient-info">
                                        <ion-icon name="bar-chart-outline" role="img"
                                            class="md hydrated" aria-label="bar chart outline">
                                        </ion-icon>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3">
                                    <div>
                                        <h4 class="mb-0 text-success">
                                            <?= count($GarantVencidosHoy); ?> </h4><br>
                                        <?php
                                        $interesGarant = 0;
                                        foreach ($GarantVencidosHoy as $interes) {
                                            $interesGarant += $interes['interes'];
                                        } ?>

                                        <h5 class="text-info">Total Interes: $
                                            <?= number_format($interesGarant, 2); ?></h5>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 col-xl-3">

                    <div class="card radius-10 border shadow-none mb-0">
                        <a href="proximosVencimientos">
                            <div class="card-body">
                                <div class="d-flex align-items-start text-dark gap-2">
                                    <div>
                                        <p class="mb-0 fs-6 text-dark ">Garant Proximo a Vencimiento</p>
                                    </div>
                                    <div
                                        class="ms-auto widget-icon-small text-white bg-gradient-warning">
                                        <ion-icon name="wallet-outline" role="img"
                                            class="md hydrated" aria-label="wallet outline">
                                        </ion-icon>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3">
                                    <div>
                                        <h4 class="mb-0 text-warning">
                                            <?= $totalClientesGarantProxVenc; ?> </h4><br>
                                        <?php
                                        $interesGarant = 0;
                                        foreach ($GarantProxVenc as $interes) {
                                            $interesGarant += $interes['interes'];
                                        } ?>

                                        <h5 class="text-info">Total Interes: $
                                            <?= number_format($interesGarant, 2); ?></h5>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                    <div class="card radius-10 border shadow-none mb-0">
                        <a href="vencidosGarant">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-2">
                                    <div>
                                        <p class="mb-0 fs-6 text-dark ">Garant Vencidos</p>
                                    </div>
                                    <div
                                        class="ms-auto widget-icon-small text-white bg-gradient-danger">
                                        <ion-icon name="wallet-outline" role="img"
                                            class="md hydrated" aria-label="wallet outline">
                                        </ion-icon>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3">
                                    <div>
                                        <h4 class="mb-0 text-danger">
                                            <?= $totalClientesGarantVencidos; ?> </h4><br>
                                        <?php
                                        $interesGarant = 0;
                                        foreach ($GarantVencidos as $interes) {
                                            $interesGarant += $interes['interes'];
                                        } ?>

                                        <h5 class="text-info">Total Interes: $
                                            <?= number_format($interesGarant, 2); ?></h5>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                    <div class="card radius-10 border shadow-none mb-0">
                        <a href="liquidacionesGarant">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-2">
                                    <div>
                                        <p class="mb-0 fs-6 text-dark">Liquidaciónes de Mes</p>
                                    </div>
                                    <div
                                        class="ms-auto widget-icon-small text-white bg-gradient-info">
                                        <ion-icon name="bar-chart-outline" role="img"
                                            class="md hydrated" aria-label="bar chart outline">
                                        </ion-icon>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3">
                                    <div>
                                        <h4 class="mb-0 text-success">
                                        </h4><br>
                                        <?php
                                        $numLiquidacion = 0;
                                        foreach ($GarantLiquidaciones as $Liquidacion) {
                                            if ($Liquidacion['status_pago_count'] == 1) {
                                                $numLiquidacion += 1;
                                            }
                                        };

                                        ?>
                                        <h4 class="text-danger"><?= number_format($numLiquidacion); ?></h4>
                                        <h5 class="text-danger">Total : $
                                            <?= number_format($interesGarant, 2); ?></h5>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php

        }
        ?>


    </div>
</div>
<script>
    // Convertir el array PHP a JSON y pasarlo a JavaScript
    var dataArray = <?php echo json_encode($totalMensualGarant); ?>;

    // Extraer los datos del array
    var categories = dataArray.map(item => item.mes);
    var seriesData = dataArray.map(item => item.total);

    // Función para formatear los números con comas
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Formatear los datos de la serie
    var formattedSeriesData = seriesData.map(item => numberWithCommas(item));

    document.addEventListener('DOMContentLoaded', function() {
        // Configuración del gráfico
        var options = {
            series: [{
                name: "Total Orders",
                data: seriesData
            }],
            chart: {
                type: "bar",
                height: 250,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                },
                dropShadow: {
                    enabled: false,
                    top: 3,
                    left: 14,
                    blur: 4,
                    opacity: 0.12,
                    color: "#923eb9"
                },
                sparkline: {
                    enabled: false
                }
            },
            markers: {
                size: 0,
                colors: ["#923eb9"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "35%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2.5,
                curve: "smooth"
            },
            grid: {
                show: false
            },
            xaxis: {
                categories: categories // Etiquetas del eje X desde el array dinámico
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.5,
                    gradientToColors: ['#3361ff'],
                    inverseColors: false,
                    opacityFrom: 0.8,
                    opacityTo: 0.3
                }
            },
            colors: ["#3361ff"],
            tooltip: {
                theme: "dark",
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    formatter: function(val) {
                        return numberWithCommas(val);
                    },
                    title: {
                        formatter: function() {
                            return ""
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();
    });
</script>