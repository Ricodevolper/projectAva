<?php
ini_set('display_errors', 0);  // Deshabilita la visualización de errores en pantalla
ini_set('log_errors', 1);      // Habilita la escritura de errores en un archivo de registro
ini_set('error_log', 'error.log');  ?>


<!-- start page content wrapper-->
<div class="page-content-wrapper">
  <!-- start page content-->
  <div class="page-content">

    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Simulador</div>
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


    <?php

    if (isset($_POST['monto']) && $_POST['monto'] != '') {

      $moneda =  $_POST["moneda"];
      $monto = $_POST['monto'];
      $monto = preg_replace("/[^0-9]/", "", $monto);
      

      if ($monto <= 249999) {
        $montob = 1;
      } elseif ($monto <= 499999) {
        $montob = 2;
      } elseif ($monto <= 999999) {
        $montob = 3;
      } elseif ($monto <= 2999999) {
        $montob = 4;
      } else {
        $montob = 5;
      }
      if ($moneda == 'mxn') {
        $intereses = ControladorSimulador::ctrSimuladorGarantmxn($montob);
        $fondo = 'bg-light-gradient';
      }
      if ($moneda == 'usd') {
        $intereses = ControladorSimulador::ctrSimuladorGarantusd($montob);
        $fondo =  'bg-light-success';
      }

      

      $garant = $_POST['producto'];
    }

    ?>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Garant</button>

    <div class="row">
      <?php

      foreach ($intereses as $interes) {


        $interesCalculado = ($interes['interes'] / 100) * $monto;

         switch ($interes['tipoPago']) {
          case 'trimestral':
           $tipoDePago =  "Trimestral";
            break;
          case 'semestral':
           $tipoDePago =  "  Semestral";
          
            break;
          case 'finDePlazo':
           $tipoDePago =  "Fin de Plazo";
            break;
          
         
         }

      ?>

       
        <div class="col-3">
                    <div class="card radius-10 shadow-none <?=$fondo?> mb-0">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="fs-2 text-success"><ion-icon name="card-sharp" role="img" class="md hydrated" aria-label="card sharp"></ion-icon></div>
                          <div class="fs-6 ms-auto text-success">Tasa: <?=$interes['interes']?>%</div>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                          <div class="">
                            <p class="mb-1 text-info">Inversion</p>
                            <h3 class="mb-0 text-info">$ <?=number_format($monto,2)?> <?=$moneda?></h3>
                            <p class="mb-1 text-success">Interes</p>
                  <h4 class="mb-0 text-success">$ <?=number_format($interesCalculado,2)?> <?=$moneda?></h4>
                 
                          </div>
                          <div class="ms-auto">
                            <p class="mb-0 text-success">Plazo: <?=$interes['meses']?> Meses </p>
                            <p class="mb-0 text-success">Pago: <?=$tipoDePago?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                   </div>
                   

      <?php

      }




      ?>

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" inert style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Simulador</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">


            <form action="" method="POST">
              <div class="card-body">
                <label for="DataList" class="form-label">Producto</label>
                <select class="form-select mb-3" aria-label="Default select example" name="producto" id="producto">
                  <option selected=""></option>
                  <option value="garant">Garant</option>

                </select>
                <label for="DataList" class="form-label">Moneda</label>
                <select class="form-select mb-3" aria-label="Default select example" name="moneda" id="moneda">
                  <option selected=""></option>
                  <option value="mxn">MXN</option>
                  <option value="usd">USD</option>

                </select>
                <label for="monto" class="form-label">Monto</label>
                <div class="input-group mb-3"> <span class="input-group-text">$</span>
                  <input type="text" name="monto" class="form-control" aria-label="Amount (to the nearest dollar)" oninput="formatoMiles(this)"> <span class="input-group-text">.00</span>
                </div>

              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Simular</button>
          </div>
          </form>
        </div>
      </div>
    </div>




    <script>
      function formatoMiles(input) {
        // Obtener el valor actual del campo
        let valor = input.value;

        // Quitar cualquier formato existente (por ejemplo, comas)
        valor = valor.replace(/,/g, '');

        // Verificar si el valor es numérico
        if (!isNaN(valor)) {
          // Formatear en miles
          valor = parseFloat(valor).toLocaleString('mx-MX');
        } else {
          // Si no es numérico, dejar el campo vacío
          valor = '';
        }

        // Actualizar el valor en el campo de entrada
        input.value = valor;
      }
    </script>