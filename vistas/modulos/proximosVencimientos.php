<?php

$GarantVencidos = ControladorBi::ctrGarantProximoPago();

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
      <div class="card ">
					<div class="card-body">
						<div class="table-responsive">
							<table id="VencGarant" class="table  table-hover " style="width:100%">
								<thead>
									<tr>
										<th>Nombre Cliente</th>
										<th>Monto de Inversion</th>
                                        <th>Interes</th>
                                        <th>Plazo</th>
                                        <th>Forma de Pago</th>
										                    <th>Fecha de pago</th>
                                        
                                        <th>Cuota Total</th>
                                        <th>Asesor</th>
                                        <th>Numero Contrato Garant</th>
                                        <th>Dias para Pago</th>
                                        <th></th>
                                        <th></th>
								                       	</tr>
								</thead>
								<tbody>
                                    <?php
                                    
                                    foreach ($GarantVencidos as $Vencido ) {
                                        $infoGarant = ControladorBi::ctrBiGarantInfo($Vencido['id_garant']);
                                       
                                  
                                    ?>
                                    <tr>
									<td><?=$Vencido['nombre_clte']?></td>
                                    <td>$ <?=number_format($Vencido['monto_inver'],2).' '.$Vencido['t_moneda']?></td>
                                    <td>$ <?=number_format($Vencido['interes'],2)?></td>
                                    <td><?=$Vencido['plazo']?></td>
                                    <td><?=$Vencido['f_pago']?></td>
                                    <td><?=$Vencido['fecha_pago']?></td>
                                    
                                    <td>$ <?=number_format($Vencido['cuota_total'],2)?></td>
                                    <td><?=$Vencido['fk_cliente']?></td>
                                    <td><?=$Vencido['num_contrato_garant']?></td>
                                    <td><?=$Vencido['dias_para_pago']?></td>
                                    <td>
                                      <button id="perfilCliente" name="id" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#clientemodalGarant<?=$Vencido['fk_cliente']?>" data-id="<?=$Vencido['fk_cliente']?>">
                                        <div class="">
                                          <h4 class="mb-0"><i class="fadeIn animated bx bx-id-card"></i></h4>
                                          <p class="mb-0">Perfil</p>
                                          </div>
                                        </button></td>
                                    <td>
                                    <button type="button" class="btn btn-info px-5 radius-30" data-bs-toggle="modal" data-bs-target="#VencGarantModal<?=$Vencido['fk_cliente']?>">Info</button></td>
                                    </tr>
								</tbody>
                  
								<?php

                                
                                    }
                                    
                                
                                ?>
							</table>
						</div>
					</div>
				</div>
                
               <?php
               
              foreach ($GarantVencidos as $Vencido) {
                ?>
                              
                              <div class="modal fade" id="VencGarantModal<?=$Vencido['fk_cliente']?>" tabindex="-1" inert>
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                               
                              <h5 class="modal-title "><?=$Vencido['nombre_clte']?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              
                              <br>
                            
                             

                           
                            </div>
                            <div class="modal-body">
                            <div class="row">
                              <span class=" col-1 text-info " ><strong>Id: <br> <?=$Vencido['id_garant']?></strong></span>
                              <span class=" col-1 text-info " ><strong>Plazo: <br> <?=$Vencido['plazo']?></strong></span>
                              <span class=" col-1 text-info " ><strong>F.pago: <br><?=$Vencido['f_pago']?></strong></span>
                              <span class=" col-2 text-info " ><strong>Moneda: <br> <?=$Vencido['t_moneda']?></strong></span>
                              <span class=" col-3 text-info " ><strong>Inversion: <br> $<?=number_format($Vencido['monto_inver'],2)?></strong></span>
                              <span class=" col-2 text-info " ><strong>Cuota Total: <br>$<?=number_format($Vencido['cuota_total'],2)?></strong></span>
                              <span class=" col-1 text-info " ><strong>Tasa: <br> % <?=$Vencido['tasa']?></strong></span>
                              </div>
        <div class="card">
          <div class="card-body">
            <table class="table mb-0 table-striped">
              <thead>
                <tr>
                  <th scope="col">Fechas de Pago</th>
                  <th scope="col">Interes</th>
                  <th scope="col">Status</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                $infoGarant =  ControladorBi::ctrBiGarantInfo($Vencido['id_garant']);
                foreach ($infoGarant as $Garant ) {
                 if ($Garant['status_pago'] == 0) {
                    $boton = '<a href="http://192.168.100.121/clientesnew/Sistema.php?url=Inicio/garant_all_mx/' . $Vencido['fk_cliente'] . '" target="_blank">
                    <button type="button" class="btn btn-outline-warning px-5">Pendiente</button>
                 </a>';
       
                 }else {
                    $boton = '<button type="button" class="btn btn-outline-success px-5" disabled>Pagado</button>';
                 }
                    
                ?>
                <tr>
                 
                  <td><?=$Garant['fecha_pago']?></td>
                  <td>$ <?=number_format($Garant['interes'],2)?></td>
                 </a><td><?=$boton?></td></a>
                </tr>
              <?php
              
                }?>
               
              </tbody>
            </table>
          </div>
        </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                <?php
              }
               
              foreach ($GarantVencidos as $Cliente ) {
                    
                include 'modals/garantclientes.modal.php';
           
 
               }
 
               ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const rows = document.querySelectorAll('#VencGarant tbody tr');

                        rows.forEach(row => {
                            row.addEventListener('mouseover', function() {
                                row.querySelectorAll('td').forEach(cell => {
                                    cell.classList.add('text-info');
                                    cell.style.fontWeight = 'bold';
                                });
                            });

                            row.addEventListener('mouseout', function() {
                                row.querySelectorAll('td').forEach(cell => {
                                    cell.classList.remove('text-info');
                                    cell.style.fontWeight = 'normal';
                                });
                            });
                        });
                    });
</script>
                <style>
    /* Cambia el color del texto y aumenta el tamaño al pasar el mouse */
    #VencGarant tbody td:hover {
     
        transform: scale(1.05); /* Aumenta un 5% el tamaño de la fila */
        transition: transform 0.2s, color 0.2s; /* Suaviza la transición */
    }
</style>