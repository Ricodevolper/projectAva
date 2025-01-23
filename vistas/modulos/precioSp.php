<?php

$pMercado = new ControladorPmercado() ;

$listasSp = $pMercado->ctrSpPrecio();

 //print_r($_POST);



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
     

      <div class="row">
  <div class="col-6"></div>
  <div class="card">
    <div class="card-body">
      <div class="border p-3 rounded">
        <h6 class="mb-0 text-uppercase">Historico S&P 500 </h6>
        <div class="container">
    <div class="row justify-content-end">
        <div class="col-3">
          <a
            type="button"
            class="btn btn-primary"
            href="pmercado"
          >
            Actualizar Precios
            </a>
          
        </div>
    </div>
</div>
        <hr>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>






                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Precio</th>
                        <th>Cambio Porc.</th>
                       
                    </tr>
                </thead>
                <tbody>
                  <?php 
                 
                  foreach ($listasSp as $precioSp) {

                  
                 


                  ?>
                    <tr>
                        
                      
                        <td><?=$precioSp['id_mov']?></td>
                        <td><?=$precioSp['fecha_precio']?></td>
                        <td><?=$precioSp['precio']?></td>
                        <td><?=$precioSp['cambioPorc']?></td>
                        
                     
                       
                     
                        


                        
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
        document.addEventListener('DOMContentLoaded', (event) => {
            // Obtener la fecha actual
            const today = new Date();
            // Formatear la fecha en formato YYYY-MM-DD
            const formattedDate = today.toISOString().split('T')[0];
            // Establecer el valor del input con la fecha actual
            document.getElementById('date-time1').value = formattedDate;
        });
    </script>