

<?php
// $datosEmpleado =  ControladorEmpleado::ctrDatosEmpleados($_POST['id_empleado']);

$datosEmpleado = new ControladorEmpleado();

$datos = $datosEmpleado->ctrDatosEmpleados($_POST['id_empleado']);

$garant = $datosEmpleado->ctrDatosGarant($_POST['id_empleado']);
$Lq = $datosEmpleado->ctrDatosLq($_POST['id_empleado']);
$event = $datosEmpleado->ctrDatosEvent($_POST['id_empleado']);
$stable = $datosEmpleado->ctrDatosStable($_POST['id_empleado']);
$sp = $datosEmpleado->ctrDatosSp($_POST['id_empleado']);
$tiie = $datosEmpleado->ctrDatosTiie($_POST['id_empleado']);
$tiie = $datosEmpleado->ctrDatosTiie($_POST['id_empleado']);
$mensualGarantMxn = $datosEmpleado->ctrMensualGarant($_POST['id_empleado'],'MXN');
$mensualGarantUsd = $datosEmpleado->ctrMensualGarant($_POST['id_empleado'],'USD');
$mensualSpUsd = $datosEmpleado->ctrMensualSp($_POST['id_empleado'],'USD');
$mensualSpMxn = $datosEmpleado->ctrMensualSp($_POST['id_empleado'],'MXN');
$mensualTiie = $datosEmpleado->ctrMensualTiie($_POST['id_empleado']);
$mensualEvent = $datosEmpleado->ctrMensualEvent($_POST['id_empleado']);
$mensualEvent = $datosEmpleado->ctrMensualEvent($_POST['id_empleado']);
// Inicializa el array con 12 elementos en 0
$garantJsonMxn = array_fill(0, 12, 0);
$garantJsonUsd = array_fill(0, 12, 0);
$tiieJson = array_fill(0, 12, 0);
$eventJson = array_fill(0, 12, 0);
$spJsonUsd = array_fill(0, 12, 0);
$spJsonMxn = array_fill(0, 12, 0);

// Llena el array con los valores de suma_mensual
foreach ($mensualGarantMxn as $row) {
    $mes = $row['mes'];
    $suma_mensual = $row['suma_mensual'];
    $garantJsonMxn[$mes - 1] = $suma_mensual; // -1 porque los índices de los arrays comienzan en 0
}
foreach ($mensualGarantUsd as $row) {
    $mes = $row['mes'];
    $suma_mensual = $row['suma_mensual'];
    $garantJsonUsd[$mes - 1] = $suma_mensual; // -1 porque los índices de los arrays comienzan en 0
}
foreach ($mensualSpUsd as $row) {
    $mes = $row['mes'];
    $suma_mensual = $row['suma_mensual'];
    $spJsonUsd[$mes - 1] = $suma_mensual; // -1 porque los índices de los arrays comienzan en 0
}
foreach ($mensualSpMxn as $row) {
    $mes = $row['mes'];
    $suma_mensual = $row['suma_mensual'];
    $spJsonMxn[$mes - 1] = $suma_mensual; // -1 porque los índices de los arrays comienzan en 0
}
foreach ($mensualTiie as $row) {
    $mes = $row['mes'];
    $suma_mensual = $row['suma_mensual'];
    $tiieJson[$mes - 1] = $suma_mensual; // -1 porque los índices de los arrays comienzan en 0
}
foreach ($mensualEvent as $row) {
    $mes = $row['mes'];
    $suma_mensual = $row['suma_mensual'];
    $eventJson[$mes - 1] = $suma_mensual; // -1 porque los índices de los arrays comienzan en 0
}


$garantJsonMxn = array_values($garantJsonMxn);
$garantJsonUsd = array_values($garantJsonUsd);
$spJsonMxn = array_values($spJsonMxn);
$spJsonUsd = array_values($spJsonUsd);
$garantJsonUsd = array_values($garantJsonUsd);
$tiieJson = array_values($tiieJson);
$eventJson = array_values($eventJson);


$data = [
    'garant' => $garantJsonMxn,
    'garantUsd' => $garantJsonUsd,
    'SPMXN' => $spJsonMxn,
    'SPUSD' => $spJsonUsd,
   
     'tiie' => $tiieJson,
    'event' => $eventJson
    // 'series5' => $series5
];

 $data = json_encode($data);

 

?>


<div class="page-content-wrapper">
    <!-- start page content -->
    <div class="page-content">
        <div class="row  ">
            <div class="col-12 col-md-4 col-lg-3 col-xl-3 ">
                <div style="background-color: #E2E3E2;">
                    
                <div class="card-body"><h4><?php 
                        // Suponiendo que $data contiene los datos que quieres enviar al frontend


                         $montoGarantMxn = 0;
                         $montoGarantUsd = 0;
                         $montoSpUsd = 0;
                         $montoSpMxn = 0;
                         $montoEvent = 0;
                         $montostable = 0;
                         $montotiie = 0;
                         $montoSpMxn = 0;
                         $montoSpusd = 0;
                           echo $datos[0]['nombre_promotor'];
                           foreach ($garant as $sumaGarant ) {
                              if ($sumaGarant['t_moneda'] == 'MXN' ) {
                                $montoGarantMxn +=  $sumaGarant['monto_inver'];
                              }
                              if ($sumaGarant['t_moneda'] == 'USD' ) {
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
                           
                            if ($sumasp['t_moneda'] == 'MXN' ) {
                              $montoSpMxn +=  $sumasp['saldo_total'];
                            }
                            if ($sumasp['t_moneda'] == 'USD' ) {
                              $montoSpUsd +=  $sumasp['saldo_total'];
                            }
                           }
                       

                           $totalMxn = $montoGarantMxn;
                           $totalUsd = $montoGarantUsd;
                           $totalSpMxn = $montoSpMxn;
                           $totalSpUsd = $montoSpUsd;
                           $totalLq = $montoLq;
                           $totalEvent = $montoEvent;
                           $totalstable = $montostable;

                           $total = $montoGarantMxn + $montoGarantUsd + $montoLq + $montoEvent + $montostable + $montotiie + $montoSpMxn + $montoSpUsd;
                           
                        $dataTotal = [
                            'garantTotal' => $totalMxn,
                            'garantUsdTotal' => $totalUsd,
                            'spTotal' => $totalSpMxn,
                            'spUsdTotal' => $totalSpUsd,
                        
                            'lqTotal' => $totalLq,
                            'stableTotal' => $totalstable,
                            'eventTotal' => $totalEvent
                        ];
                          
                        $dataTotal = json_encode($dataTotal);
                          ?>

                        </h4>
                        <div class="  d-flex flex-wrap align-items-center justify-content-around mt-4">
                            <div class="text-center mb-3">
                                <div class="fs-3 text-tiffany">
                                    <a href="ejecucionesEvent">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                        </svg>
                                    </a>
                                </div>
                                <br>
                                <h5 class="mb-0">Event</h5>
                            </div>
                            <div class="text-center mb-3">
                                <div class="fs-3 text-tiffany">
                                    <a href="ejecucionesLq" class="btn btn-warning">
                                        <i class="fadeIn animated bx bx-money"></i>
                                    </a>
                                </div>
                                <br>
                                <h5 class="mb-0">Lq</h5>
                            </div>
                            <div class="text-center mb-3">
                                <div class="fs-3 text-tiffany">
                                    <a href="valorGarant" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg>
                                    </a>
                                </div>
                                <br>
                                <h5 class="mb-0">Garant</h5>
                            </div>
                            <div class="text-center mb-3">
                                <div class="fs-3 text-tiffany">
                                    <a href="ejecucionesGarant" class="btn btn-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-codesandbox">
                                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                            <polyline points="7.5 4.21 12 6.81 16.5 4.21"></polyline>
                                            <polyline points="7.5 19.79 7.5 14.6 3 12"></polyline>
                                            <polyline points="21 12 16.5 14.6 16.5 19.79"></polyline>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                    </a>
                                </div>
                                <br>
                                <h5 class="mb-0">Stable</h5>
                            </div>
                            <div class="text-center mb-3">
                                <div class="fs-3 text-tiffany">
                                    <a href="ejecucionesGarant" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-type"><polyline points="4 7 4 4 20 4 20 7"></polyline>
                                    <line x1="9" y1="20" x2="15" y2="20"></line><line x1="12" y1="4" x2="12" y2="20"></line></svg>
                                    </a>
                                </div>
                                <br>
                                <h5 class="mb-0">Tiie&Cetes</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
    <div class="col-12 col-md-6 col-lg-2 mb-4">
        <div style="background-color: #E2E3E2;" class="text-center">
            <h1 class="mb-0 text-black">$<?= number_format($total, 2)?></h1>
            <h5 class="mb-0">Total de Inversiones</h5>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-5 mb-4 ms-auto">
        <div class="col-12 col-sm-8 col-lg-12">
            <div id="graficaPastelProductos"></div>
        </div>
    </div>

    <!-- Espacio en blanco para empujar la gráfica a la derecha -->
    <div class="col-12 col-md-3"></div> <!-- Puedes ajustar el tamaño de esta columna según sea necesario -->

  


            <!-- <div class="col-12 col-md-6 col-lg-2 mb-4">
            <div class="col-12 col-sm-8 col-lg-12">
                        <div id="chart6" class="mb-3 mx-auto"></div>
                    </div>
            </div> -->
           
            
        
        </div>
        <br> 
        <div class="row">
        <div class="  col-12 col-md-6 col-lg-9 mb-4  full-height;">
            <div class="  col-12 col-sm-8 col-lg-12">
                        <div id="graficaEmpleado" class=" card mb-3 mx-auto"  ></div>
                    </div>
            </div>
        <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                   <h4 class="mb-0">Mis Activos</h4>
                   
                </div>
                
                  <table class="table align-middle">
                    <thead class="table-secondary">
                      <tr>
                       <th>Producto</th>
                       <th>Monto Inversion</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       <td>Event
                        <form action="valorGarant" method="POST">
                            <input type="hidden" name="id_cliente" value="<?=$_POST['id_cliente']?>">
                            <input type="hidden" name="producto" value="Event" >
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                          <div class="fs-3 text-tiffany">
                                    <button class="btn btn-primary" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                        </svg>
                    </button>
                                    </form>
                                </div>
                           
                          </div>
                        </td>
                        <td><strong>$ <?=number_format($totalEvent,2)?></strong></strong></td>
                       
                        <td>
                          <div class="table-actions d-flex align-items-center gap-3 fs-6">
                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                       <td>Lq
                       <form action="valorGarant" method="POST">
                            <input type="hidden" name="id_empleado" value="<?=$_POST['id_empleado']?>">
                            <input type="hidden" name="producto" value="Lq" >
                     
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                          <div class="fs-3 text-tiffany">
                                    <button href="" class="btn btn-warning">
                                        <i class="fadeIn animated bx bx-money"></i>
                    </button>
                    </form>
                                </div>
                             
                          </div>
                        </td>
                        <td> <strong>$ <?= number_format($montoLq,2)?></strong></td>
                       
                        <td>
                         <div class="table-actions d-flex align-items-center gap-3 fs-6">
                           <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                           <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                           <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                         </div>
                       </td>
                      </tr>
                      <tr>
                       <td>Stable
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                          <div class="fs-3 text-tiffany">
                                    <a href="ejecucionesGarant" class="btn btn-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-codesandbox">
                                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                            <polyline points="7.5 4.21 12 6.81 16.5 4.21"></polyline>
                                            <polyline points="7.5 19.79 7.5 14.6 3 12"></polyline>
                                            <polyline points="21 12 16.5 14.6 16.5 19.79"></polyline>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                    </a>
                                </div>
                            
                          </div>
                        </td>
                        <td> <strong>$ <?=number_format($totalstable,2)?></strong></td>
                        
                        <td>
                         <div class="table-actions d-flex align-items-center gap-3 fs-6">
                           <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                           <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                           <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                         </div>
                       </td>
                      </tr>
                      <tr>
                       <td>Garant Usd
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                          <div class="fs-3 text-tiffany">
                            <form action="valorGarant" method="POST">
                            <input type="hidden" id="id_empleado" name="id_empleado" value="<?=$_POST['id_empleado']?>" >
                            <input type="hidden" id="producto" name="producto" value="garantUsd" >
                                    <button type="submit" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg>
                    </button>
                    </form>
                                </div>
                            
                          </div>
                        </td>
                        <td> <strong>$ <?=number_format($totalUsd,2)?></strong></td>
                       
                        <td>
                         <div class="table-actions d-flex align-items-center gap-3 fs-6">
                           <a href="javascript:;" class="hidden-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                           <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                           <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                         </div>
                       </td>
                      </tr>
                      <tr>
                       <td>Garant Mxn
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                          <div class="fs-3 text-tiffany">
                            <form action="valorGarant" method="POST" >
                            <input type="hidden" id="id_empleado" name="id_empleado" value="<?=$_POST['id_empleado']?>" >
                            <input type="hidden" id="garant" name="producto" value="garantMxn" >
                              <button  class="btn btn-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg>
                                    </button>
                                    </form>
                                </div>
                            
                          </div>
                        </td>
                        <td> <strong>$ <?=number_format($totalMxn,2)?></td>
                        
                        <td>
                         <!-- <div class="table-actions d-flex align-items-center gap-3 fs-6">
                           <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                           <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                           <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                         </div> -->
                       </td>
                      </tr>
                      <tr>
                       <td>Tiie & Cetes
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                          <div class="fs-3 text-tiffany">
                          <form action="valorGarant" method="POST">
                            <input type="hidden" id="id_empleado" name="id_empleado" value="<?=$_POST['id_empleado']?>" >
                            <input type="hidden" id="garant" name="producto" value="Tiie&Cetes" >
                             
                                    <button href="valorGarant" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-type"><polyline points="4 7 4 4 20 4 20 7"></polyline>
                                    <line x1="9" y1="20" x2="15" y2="20"></line><line x1="12" y1="4" x2="12" y2="20"></line></svg>
                    </button>
                                    </form>
                                </div>
                            
                          </div>
                        </td>
                      
                        <td> <strong>$ <?=number_format($montotiie,2)?></td>
                       
                        <td>
                         <div class="table-actions d-flex align-items-center gap-3 fs-6">
                           <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                           <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                           <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                         </div>
                       </td>
                      </tr>
                      <tr>
                      <td>S&P 500
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                          <div class="fs-3 text-tiffany">
                          <form action="valorGarant" method="POST">
                            <input type="hidden" id="id_empleado" name="id_empleado" value="<?=$_POST['id_empleado']?>" >
                            <input type="hidden" id="sp" name="producto" value="SP500" >
                             
                                    <button href="valorGarant" class="btn btn-dark">
                                    <i class="lni lni-sketch"></i>
                                       </button>
                                    </form>
                                </div>
                            
                          </div>
                        </td>
                      
                        <td> <strong>$ <?=number_format($montoSpMxn,2)?> Mxn</strong><br>
                        <strong>$ <?=number_format($montoSpUsd,2)?> Usd</strong>
                      </td>
                       
                        <td>
                         <div class="table-actions d-flex align-items-center gap-3 fs-6">
                           <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                           <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                           <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                         </div>
                       </td>
                      </tr>
                     
                     
                    </tbody>
                  </table>
                </div>
           
            </div>
            </div>
   
</div>




    </div>
</div>
<script>
    // Suponiendo que 'jsonData' es la cadena JSON recibida desde PHP
var parsedData = JSON.parse('<?php echo $data; ?>'); // Parsear la cadena JSON a objeto JavaScript
var parsedDataTotal = JSON.parse('<?php echo $dataTotal; ?>'); // Parsear la cadena JSON a objeto JavaScript




    $(function () {
	"use strict";
    
	var options = {
		series: [{
			name: 'Garant Mxn',
			type: 'column',
			data: parsedData.garant
		}, {
			name: 'Garant Dolar',
			type: 'column',
			data: parsedData.garantUsd
		}, {
			name: 'Tiie&Cetes',
			type: 'area',
			data: parsedData.tiie
		}, {
			name: 'Lq',
			type: 'area',
			data: [20, 30, 40, 50, 60, 70, 80, 90, 70, 65, 28]
		}, {
			name: 'Event',
			type: 'area',
			data: parsedData.event
		}],
		chart: {
			foreColor: '#9ba7b2',
			height: 350,
			type: 'line',
			stacked: false,
			zoom: {
				enabled: false
			},
			toolbar: {
				show: true
			},
		},
		colors: ["#0d6efd", "#17a00e", "#f41127", "#f4c22b", "#8b78e6"],
		stroke: {
			width: [2, 2, 2, 2, 2],
			curve: 'smooth'
		},
		plotOptions: {
			bar: {
				columnWidth: '50%'
			}
		},
		fill: {
			opacity: [0.25, 0.25, 0.25, 0.25, 0.25],
			gradient: {
				inverseColors: false,
				shade: 'light',
				type: "vertical",
				opacityFrom: 0.85,
				opacityTo: 0.55,
				stops: [0, 100, 100, 100]
			}
		},
		labels: ['01/01/2024', '02/01/2024', '03/01/2024', '04/01/2024', '05/01/2024', '06/01/2024', '07/01/2024', '08/01/2024', '09/01/2024', '10/01/2024', '11/01/2024', '12/01/2024'],
		markers: {
			size: 0
		},
		xaxis: {
			type: 'datetime'
		},
		yaxis: {
			title: {
				text: 'Inversión',
			},
			min: 0
		},
		tooltip: {
			shared: true,
			intersect: false,
			y: {
				formatter: function (y) {
					if (typeof y !== "undefined") {
						return y.toFixed(0) + " Inversión";
					}
					return y;
				}
			}
		}
	};
	var chart = new ApexCharts(document.querySelector("#graficaEmpleado"), options);
	chart.render();

var  GarantTot  = parsedDataTotal.garantUsdTotal+parsedDataTotal.garantTotal;
    // chart 8
	var options = {
		series: [parsedDataTotal.eventTotal, 0, GarantTot, 43, parsedDataTotal.lqTotal],
		chart: {
			foreColor: '#9ba7b2',
			height: 330,
			type: 'pie',
		},
		colors: ["#923eb9", "#f73757", "#18bb6b", "#32bfff", "#ffab4d"],
		labels: ['Event', 'Tiie&Cetes', 'Garant', 'Stable', 'Lq'],
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 360
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#graficaPastelProductos"), options);
	chart.render();
	
	
	// chart 9
	var options = {
		series: [44, 55, 41, 17, 15],
		chart: {
			foreColor: '#9ba7b2',
			height: 380,
			type: 'donut',
		},
		colors: ["#923eb9", "#f73757", "#18bb6b", "#32bfff", "#ffab4d"],
		responsive: [{
			breakpoint: 480,
			options: {
				chart: {
					height: 320
				},
				legend: {
					position: 'bottom'
				}
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chart9"), options);
	chart.render();
	
});




</script>

<!-- <script src="assets/plugins/apexcharts-bundle/js/apex-custom.js"></script> -->
