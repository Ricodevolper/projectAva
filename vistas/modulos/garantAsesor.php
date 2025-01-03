<?php
$id = $_POST['id_empleado'];

$GarantAsesor = ControladorProductos::ctrGarantAsesor($id);




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
							<table id="VencGarant" class="table  table-hover table-dark " style="width:100%">
								<thead>
									<tr>
										<th>Id Garant</th>
										<th>Monto de Inversion</th>
                                        <th>Interes</th>
                                        <th>Plazo</th>
                                        <th>Forma de Pago</th>
										                    <th>Fecha de pago</th>
                                        
                                        <th>Cuota Total</th>
                                        
                                        <th>Numero Contrato Garant</th>
                                        
								                       	</tr>
								</thead>
								<tbody>
                                    <?php
                                    
                                    foreach ($GarantAsesor as $Garant ) {
                                      
                                       
                                  
                                    ?>
                                    <tr>
									<td><?=$Garant['id_garant']?></td>
                                    <td><?=$Garant['monto_inver']?></td>
                                    <td><?=$Garant['tasa']?></td>
                                    <td><?=$Garant['plazo']?></td>
                                    <td><?=$Garant['f_pago']?></td>
                                    <td><?=$Garant['fecha_aplicacion']?></td>
                                    
                                    <td><?=$Garant['cuota_total']?></td>
                                    <td><?=$Garant['num_contrato']?></td>
                                  
                                   
                                 
                                    </tr>
								</tbody>
                  
								<?php

                                
                                    }
                                    
                                
                                ?>
							</table>
						</div>
					</div>
				</div>