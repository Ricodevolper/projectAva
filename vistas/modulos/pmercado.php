<?php

$pMercado = new ControladorPmercado();

$listasPmercado = $pMercado->ctrPmercado500();

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
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="border p-3 rounded">
              <h6 class="mb-0 text-uppercase">Historico Data  </h6>
              <div class="container">
                <div class="row justify-content-end">
                 
                </div>
              </div>
              <hr>
              <table id="example" class="table table-striped table-bordered dataTable">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Precio</th>
                    <th>%</th>

                  </tr>
                </thead>
                <tbody>
                  <?php

                  foreach ($listasPmercado as $precioMercado) {





                  ?>
                    <tr>
                      <td><?= $precioMercado['fecha_precio'] ?></td>
                      <td><?= $precioMercado['precio'] ?></td>
                      <td><?= $precioMercado['cambioPorc'] ?></td>



                    </tr>

                  <?php
                  }




        //           if (isset($_POST['fecha_actualizar'])) {
        //             for ($i = 1; $i <= $cont; $i++) {
        //               $fecha_actualizar = filter_var($_POST['fecha_actualizar'], FILTER_SANITIZE_STRING);

        //               // Construir las claves dinámicas para los campos
        //               $p_mercado_actual_key = 'p_mercado_actual' . $i;
        //               $rel_fondo_serie_porc_key = 'rel_fondo_serie_porc' . $i;

        //               // Verificar que las claves existen en el array $_POST
        //               if (isset($_POST[$p_mercado_actual_key]) && isset($_POST[$rel_fondo_serie_porc_key])) {
        //                 $p_mercado = $_POST[$p_mercado_actual_key];
        //                 $rel_fondo_serie_porc = filter_var($_POST[$rel_fondo_serie_porc_key], FILTER_SANITIZE_STRING);

        //                 // Llamar al método del controlador para actualizar los precios
        //                 $actualizarPrecios = ControladorPmercado::ctrActualizarPmercado($fecha_actualizar, $rel_fondo_serie_porc, $p_mercado);

        //                 if ($actualizarPrecios === false) {
        //                   // Manejar el error si la actualización falla
        //                   echo "Error al actualizar los precios para el conjunto $i";
        //                 } else {
        //                   $respuesta = 'ok';
        //                 }
        //               } else {
        //                 // Manejar el error si alguna clave no existe en $_POST
        //                 echo "Datos faltantes para el conjunto $i";
        //               }
        //             }

        //             if ($respuesta == 'ok') {
        //               $status0 = ControladorPmercado::ctrStatusPmercado0($_POST['fecha_actualizar']);
        //               $actualizarInverionSp = ControladorPmercado::ctrActualizarinversionSp();
        //               $actualizarInverionEvent = ControladorPmercado::ctrActualizarinversionEvent();

        //               unset($_POST);
        //               $_POST = array();
        //               // Mostrar la alerta con JavaScript
        //               echo '<script>
        //     Swal.fire({
        //         title: "Actualizados",
        //         text: "Precios de Mercado",
        //         icon: "success"
        //     }).then(() => {
        //         // Redirigir después de cerrar la alerta (opcional)
        //          window.location.href = "hmercado";
        //     });
        // </script>';
        //             }
        //           }

                  ?>
                </tbody>
              </table>
               </form>
            </div>
          </div>
        </div>
      </div>
      <?php
      if ($_SESSION['perfil'] == 'administrador') {
        # code...
    
      ?>
      <div class="col-6 mx-auto">
  <div class="card shadow-lg">
    <div class="card-header  ">
      <h5 class="mb-0">Actualizar Data</h5>
    </div>
    <div class="card-body">
      <form class="row g-3" action="savePrecioSp500" method="POST" >
        <div class="col-12">
          <label class="form-label">Fecha Actualizar</label>
          <input type="date" class="form-control" placeholder="" name="fecha">
        </div>
        <div class="col-12">
          <label class="form-label">Data</label>
          <input type="number" class="form-control" placeholder="" step="0.01" name="data" required>
        </div>
        <div class="col-12 d-flex justify-content-between">
          <div>
            <a href="javascript:;" class="text-primary"></a>
          </div>
        </div>
        <div class="col-12">
          <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg"> Actualizar Data</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php

      }
?>

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