
<?php

$id_cliente = $_POST['id_cliente'];

$datosCliente = ControladorClientes::ctrDatosClientesId($id_cliente);
if (isset($_POST["id_cliente"])) {

$retirosEvent = ControladorRetiros::ctrRetirosEvent($id_cliente);
$retirosGarant = ControladorRetiros::ctrRetirosGarant($id_cliente);
 $retirosLq = ControladorRetiros::ctrRetirosLq($id_cliente);
$retirosTiie = ControladorRetiros::ctrRetirosTiie($id_cliente);
$retirosStable = ControladorRetiros::ctrRetirosStable($id_cliente);
// $retirosEvent = ControladorRetiros::ctrRetirosEvent($id_cliente);

}

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
              <li class="breadcrumb-item"><a href="javascript:;">
                  <ion-icon name="home-outline"></ion-icon>
                </a>
              </li>
              
            </ol>
          </nav>
        </div>
        
      </div>
      <div class="col-3">
              <div class="card radius-10">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <p class="mb-1">Nombre Cliente</p>
                      <h4 class="mb-0 text-primary"><?=$datosCliente[0]['nombre_cliente']?></h4>
                    </div>
                    <div class="ms-auto text-primary fs-2">
                    <i class="lni lni-user"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php     
            
            $qtyEvent =  count($retirosEvent);
            if ($qtyEvent <> 0 ) {
              
          
            ?>
            <div class="col-12">
              <div class="card radius-10">
      <div class="table-responsive mt-3">
                  <table class="table align-middle">
                    <thead class="table-secondary">
                      <tr>
                       <th>Numero Contrato</th>
                       <th>Empleado</th>
                       <th>Fecha Retiro</th>
                       <th>Titulos</th>
                       <th>Precio Mercado</th>
                       <th>Precio Compra</th>
                       <th>Precio Venta</th>
                       <th>Status</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                      foreach ($retirosEvent as $retiroEvent) {
                       
                   $valor_total =  $retiroEvent['titulos']*$retiroEvent['precio_compra'];

                   if ($retiroEvent['status_ejecusion'] == 1) {
                      $stdo = '<button class="btn btn-sm btn-outline-warning">PENDIENTE</button>';
                   }else{
                       $stdo = '<button class="btn btn-sm btn-outline-danger">LIQUIDADO</button>';
                   }
                      
                      ?>
                      <tr>
                       <td class="text-info col-1 " ><strong><?=$retiroEvent['num_contrato']?></strong></td>
                        <td class="text-info col-2 " >
                        <strong><?=$retiroEvent['nom_promotor']?></strong>
                        </td>
                        <td class="text-info col-1" >
                        <strong><?=$retiroEvent['fecha_solicitud']?></strong>
                        </td>
                        <td class="text-info col-1" ><strong><?=$retiroEvent['titulos']?></strong></td>
                        <td class="text-info col-1" ><strong>$ 
                        <?=number_format($retiroEvent['precio_mercado'],2)?></strong>
                        </td>
                        <td class="text-info col-1" ><strong>$ 
                        <?=$retiroEvent['precio_compra']?></strong>
                        </td> 
                        <td class="text-info col-1" ><strong>$ 
                        <?=number_format($valor_total,2)?></strong>
                        </td>
                        <td  ><button class="btn btn-sm btn-outline-danger">LIQUIDADO</button></td>
                      </tr>
                     
                   <?php
                   
                  }
                   ?>
                     
                     
                   
                    </tbody>
                  </table>
                </div>
                </div>
                </div>
                <?php 
                
              }
                
  
            
            $qtyGarant =  count($retirosGarant);
            if ($qtyGarant <> 0 ) {
              
             
          
            ?>
            <div class="col-12">
              <div class="card radius-10">
      <div class="table-responsive mt-3">
                  <table class="table align-middle">
                    <thead class="table-secondary">
                      <tr>
                       <th>Garant</th>
                       <th>Nombre Empleado</th>
                       <th>Contrato</th>
                       <th>Plazo</th>
                       <th>Forma de Pago</th>
                       <th>Monto Inversion</th>
                       <th>Moneda</th>
                       <th>Interes</th>
                       <th>Cuota Total</th>
                       <th>Pagado</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $total_cuota = 0;
                       foreach ($retirosGarant as $retiroGarant) {
               
                       if ($retiroGarant['plazo'] == 7 ) {
                        $txtPlazo = ' Dias';
                       }else{
                        $txtPlazo = ' Meses';
                       }
                      
                       $cuota_total = $retiroGarant['monto_inver']*$retiroGarant['tasa']/ 100;
                       $total_cuota += $cuota_total;
                       if ($retiroGarant['status_contrato'] == 2) {
                        $stdo = '<button class="btn btn-sm btn-outline-success">PAGADO</button>';
                     }else{
                         $stdo = '<button class="btn btn-sm btn-outline-danger">PENDIENTE</button>';
                     }
                      ?>
                      <tr>
                      <td class="text-info col-1"  ><strong><?= $retiroGarant['id_garant']?></strong></td>
                      <td class="text-info col-2" ><strong><?= $retiroGarant['nom_promotor']?></strong></td>
                      <td class="text-info col-1" ><strong><?= $retiroGarant['num_contrato_garant']?></strong></td>
                      <td class="text-info col-1" ><strong><?= $retiroGarant['plazo'].$txtPlazo?></strong></td>
                      <td class="text-info col-1" ><strong><?= $retiroGarant['f_pago']?></strong></td>
                      <td class="text-info col-1" ><strong>$ <?= number_format($retiroGarant['monto_inver'],2)?></strong></td>
                      <td class="text-info col-1" ><strong><?= $retiroGarant['t_moneda']?></strong></td>
                      <td class="text-info col-1" ><strong>% <?= $retiroGarant['tasa']?></strong></td>
                      <td class="text-info col-1" ><strong>$ <?= number_format($cuota_total,2)?></strong></td>
                      <td><?=$stdo?></td>
                      
                      </tr>
                     
                   
                     <?php
                     
                    }
                     
                     ?>
                     
                   
                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-info" ><strong>Total Interes Pagado</strong></td>
                        <td > <h5 class="text-warning" >$ <?=number_format($total_cuota,2);?></h5></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                </div>
                </div>

                <?php 
                
            }
               
            $qtyLq =  count($retirosLq);
            if ($qtyLq <> 0 ) {
              
               ?>
            <div class="col-12">
              <div class="card radius-10">
      <div class="table-responsive mt-3">
                  <table class="table align-middle">
                    <thead class="table-secondary">
                      <tr>
                       <th>Lq</th>
                       <th>Nombre</th>
                       <th>Titulos</th>
                       <th>Precio Mercado</th>
                       <th>Precio Compra</th>
                       <th>Valor Inicial</th>
                       <th>Valor Compra</th>
                       <th>Rentabilidad</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $total_cuota = 0;
                      foreach ($retirosLq as $retiroLq) {
                        $total_cuota += $cuota_total;
                        $total_Compra = $retiroLq['titulos']*$retiroLq['precio_compra'];
                        $total_actual = $retiroLq['titulos']*$retiroLq['precio_mercado'];
                         $rentabilidad = $total_actual - $total_Compra  ;

                         if ($rentabilidad > 0) {
                          $status =  'class="text-success col-1 "';
                         }else{
                          $status = 'class = text-danger col-1 ';
                         }
                      ?>
                      <tr>
                      <td class="text-info col-1 " ><strong><?=$retiroLq['id_mov']?></strong></td>
                      <td class="text-info col-1 " ><strong><?=$retiroLq['nom_promotor']?></strong></td>
                      <td class="text-info col-1 " ><strong><?=$retiroLq['titulos']?></strong></td>
                      <td class="text-info col-1 " ><strong>$ <?=$retiroLq['precio_mercado']?></strong></td>
                      <td class="text-info col-1 " ><strong>$ <?=$retiroLq['precio_compra']?></strong></td>
                      <td class="text-info col-1 " ><strong>$ <?=number_format($total_Compra)?></strong></td>
                      <td class="text-info col-1 " ><strong>$ <?=number_format($total_actual)?></strong></td>
                      <td <?=$status?> > <strong>$ <?=number_format($rentabilidad,2)?></strong></td>
                   
                      </tr>
                     
                   <?php
                     }
                   
                   ?>
                     
                     
                   
                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-info col-1 " > <strong>Total Rentabilidad</strong> </td>
                        <td  ><h5 class="text-warning" >$ <?=number_format($total_cuota,2);?></h5></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                </div>
                </div>
                <?php
                
            }
            $qtyTiie =  count($retirosTiie);
            if ($qtyTiie <> 0 ) {
                ?>
            <div class="col-12">
              <div class="card radius-10">
      <div class="table-responsive mt-3">
                  <table class="table align-middle">
                    <thead class="table-secondary">
                      <tr>
                       <th>tiie</th>
                       <th>Name</th>
                       <th>Address</th>
                       <th>City</th>
                       <th>Pin Code</th>
                       <th>Country</th>
                       <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       <td>1</td>
                        <td>
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                             <img src="assets/images/avatars/01.png" class="rounded-circle" width="44" height="44" alt="">
                             <div class="">
                               <p class="mb-0">Thomas Hardy</p>
                             </div>
                          </div>
                        </td>
                        <td>89 Chicago UK</td>
                        <td>Chicago</td>
                        <td>8574201</td>
                        <td>United Kingdom</td>
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
                <?php
                
            }
            $qtyStable =  count($retirosStable);
            if ($qtyStable <> 0 ) {
                
                ?>
            <div class="col-12">
              <div class="card radius-10">
      <div class="table-responsive mt-3">
                  <table class="table align-middle">
                    <thead class="table-secondary">
                      <tr>
                       <th>#</th>
                       <th>Name</th>
                       <th>Address</th>
                       <th>City</th>
                       <th>Pin Code</th>
                       <th>Country</th>
                       <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       <td>1</td>
                        <td>
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                             <img src="assets/images/avatars/01.png" class="rounded-circle" width="44" height="44" alt="">
                             <div class="">
                               <p class="mb-0">Thomas Hardy</p>
                             </div>
                          </div>
                        </td>
                        <td>89 Chicago UK</td>
                        <td>Chicago</td>
                        <td>8574201</td>
                        <td>United Kingdom</td>
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
                <?php
                
            }
                
                
                ?>
           