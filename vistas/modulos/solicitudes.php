
<?php


$solicitudes = ControladorRetiros::ctrretiroSpSolicitudActiva();




?>


<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

      <!--start breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Solicitudes


        <?php
        
        // print_r($solicitudes);
        
        ?>
        </div>
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
            <table class="table mb-0 table-striped">
              <thead>
                <tr>
                  <th scope="col">Nombre Cliente</th>
                  <th scope="col">Numero de Contrato</th>
                  <th scope="col">Fecha Solicitud</th>
                  <th scope="col">Titulos</th>
                  <th scope="col">Precio Mercado de Solicitud</th>
                  <th scope="col">Monto Solicitud</th>
                  <th scope="col">Efectivo</th>
                  <th scope="col">Fondo</th>
                  <th scope="col">Serie</th>
                  <th scope="col">Moneda</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($solicitudes as $solicitud) {
                  
                
                
                ?>
                <tr>
                 
                  <td><?=$solicitud['nombre_cliente']?></td>
                  <td><?=$solicitud['num_contrato']?></td>
                  <td><?=$solicitud['fecha_solicitud']?></td>
                  <td><?=$solicitud['titulos']?></td>
                  <td><?=$solicitud['precio_mercado']?></td>
                  <td><?=$solicitud['saldo_total']?></td>
                  <td><?=$solicitud['efectivo']?></td>
                  <td><?=$solicitud['fondo']?></td>
                  <td><?=$solicitud['serie']?></td>
                  <td><?=$solicitud['t_moneda']?></td>
                  <td><div class="d-grid gap-2">

                  <?php
                  
                  if ($solicitud['fondo'] == 8 ) {
                   $texto_boton = 'S&P';
                  }
                  
                  ?>
                    <button
                      type="button"
                      name=""
                      id=""
                      class="btn btn-primary"
                    >
                     <?=$texto_boton?>
                    </button>
                  </div>
                  </td>
                </tr>
               <?php
               
              }
               
               ?>
              </tbody>
            </table>
          </div>
        </div>
