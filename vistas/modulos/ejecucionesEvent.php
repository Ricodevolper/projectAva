<?php

$mes = date('m');
$year = date('Y');

$ejecucionClientes = ControladorProductos::ctrEjecucionesEvent($mes, $year);
$ejecucionClientesAplicadas = ControladorProductos::ctrEjecucionesEventAplicadas($mes, $year);




?>



<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

      <!--start breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
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
      <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                   <h5 class="mb-0">Ejecucion a solicitudes de Clientes: </h5>
                    <form class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp" role="img" class="md hydrated" aria-label="search sharp"></ion-icon></div>
                      <input class="form-control ps-5" type="text" placeholder="search">
                    </form>
                </div>
                <div class="table-responsive mt-3">
                  <table class="table align-middle mb-0">
                    <thead class="table-light">
                     <tr>
                       <th>ID</th>
                       <th>Fondo</th>
                       <th>Serie</th>
                       <th>Fecha Solicitud</th>
                       <th>Cliente</th>
                       <th>Titulos</th>
                       <th>Fecha de ejecucion</th>
                       <th>Precio de Mercado</th>
                       <th>Efectivo</th>
                       <th>Total en DLS</th>
                       <th>Fecha Liquidacion</th>
                       <th>Concepto</th>
                     </tr>
                     </thead>
                     <tbody>

                     <?php    
                     foreach ($ejecucionClientes as $ejecucionCliente ) {
                      # code...
                   $total_dls = $ejecucionCliente['precio_mercado'] * $ejecucionCliente ['titulos'];
                     ?>
                      <tr>
                      <td><?=$ejecucionCliente['id_mov']?></td>
                      <td><?=$ejecucionCliente['nom_fondo']?></td>
                      
                      <td><?=$ejecucionCliente['nom_serie']?></td>
                    
                      <td><span class="badge bg-light-warning text-warning w-100"><?=$ejecucionCliente['fecha_mov']?></span></td>
                      <td><?=$ejecucionCliente['nombre_cliente']?></td>
                      <td><?=$ejecucionCliente['titulos']?></td>
                      
                      <td><span class="badge bg-light-success text-success w-100"><?=$ejecucionCliente['fecha_ejecucion']?></span></td>
                      <td>$<?=number_format($ejecucionCliente['precio_mercado'],2)?></td> 
                      <td>$<?=number_format($ejecucionCliente['ultimo_efect'],2)?></td> 
                      <td>$<?=number_format($total_dls,2)?></td> 
                      <td><?=$ejecucionCliente['fecha_liquidacion']?></td> 
                      <td><?=$ejecucionCliente['concepto']?></td> 
                    </tr>
            
                      <?php
                        }
                      
                      ?>
                   
            
                  
                  
                   
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
      <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                   <h5 class="mb-0">Ejecucion Aplicadas: </h5>
                    <form class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp" role="img" class="md hydrated" aria-label="search sharp"></ion-icon></div>
                      <input class="form-control ps-5" type="text" placeholder="search">
                    </form>
                </div>
                <div class="table-responsive mt-3">
                  <table id="example"  class="table align-middle mb-0">
                    <thead class="table-light">
                     <tr>
                       <th>ID</th>
                       <th>Fondo</th>
                       <th>Serie</th>
                       <th>Fecha Solicitud</th>
                       <th>Cliente</th>
                       <th>Titulos</th>
                       <th>Fecha de ejecucion</th>
                       <th>Precio de Mercado</th>
                       <th>Efectivo</th>
                       <th>Total en DLS</th>
                       <th>Fecha Liquidacion</th>
                       <th>Concepto</th>
                     </tr>
                     </thead>
                     <tbody>

                     <?php    
                     foreach ($ejecucionClientesAplicadas as $ejecucionClientesAplicada ) {
                      # code...
                   $total_dls = $ejecucionClientesAplicada['precio_mercado'] * $ejecucionClientesAplicada ['titulos'];
                     ?>
                      <tr>
                      <td><?=$ejecucionClientesAplicada['id_mov']?></td>
                      <td><?=$ejecucionClientesAplicada['nom_fondo']?></td>
                      
                      <td><?=$ejecucionClientesAplicada['nom_serie']?></td>
                    
                      <td><span class="badge bg-light-warning text-warning w-100"><?=$ejecucionClientesAplicada['fecha_mov']?></span></td>
                      <td><?=$ejecucionClientesAplicada['nombre_cliente']?></td>
                      <td><?=$ejecucionClientesAplicada['titulos']?></td>
                      
                      <td><span class="badge bg-light-success text-success w-100"><?=$ejecucionClientesAplicada['fecha_ejecucion']?></span></td>
                      <td>$<?=number_format($ejecucionClientesAplicada['precio_mercado'],2)?></td> 
                      <td>$<?=number_format($ejecucionClientesAplicada['ultimo_efect'],2)?></td> 
                      <td>$<?=number_format($total_dls,2)?></td> 
                      <td><?=$ejecucionClientesAplicada['fecha_liquidacion']?></td> 
                      <td class="col-1" ><?=$ejecucionClientesAplicada['concepto']?></td> 
                    </tr>
            
                      <?php
                        }
                      
                      ?>
                   
            
                  
                  
                   
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
     

      
