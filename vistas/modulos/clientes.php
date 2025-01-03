<?php
$perfil = $_SESSION['perfil'];


if (isset($_POST['nombreBusquedaCliente'])) {

  $nombre = $_POST['nombreBusquedaCliente'];
  
  $buscarcliente = ControladorClientes::ctrBuscarCliente($nombre, $perfil);
  
}


?>


<!-- start page content wrapper-->
<div class="page-content-wrapper">
  <!-- start page content-->
  <div class="page-content">

    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Clientes</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0 align-items-center">
            <li class="breadcrumb-item"><a href="inicio">
                <ion-icon name="home-outline"></ion-icon>
              </a>
            </li>

          </ol>
        </nav>
      </div>
<div>


</div>
<div class="ms-auto">
              <div class="btn-group">
                <button  id="añadirClienteb" name="añadirClienteb" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#añadirCliente" data-id="" type="button" class="btn btn-outline-primary">Añadir Cliente</button>
               
              
              </div>
            </div>
    </div>
   
    <form action="" method="POST">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-3">
        <div class="col">

          <div class="card radius-10">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="widget-icon-2 bg-gradient-info text-white">
                  <ion-icon name="accessibility-sharp"></ion-icon>


                </div>

                <input type="text" class="form-control" placeholder="Ingresa Nombre" name="nombreBusquedaCliente">
                <button type="submit" class="btn btn-outline  btn-info px-1">
                  <i style="color:white" class="lni lni-keyword-research"></i></button>

              </div>
    </form>





  </div>
  <div class="col">
   </div>
  <br>
</div>

</div>

</div>


<!-- Cartas Clientes -->

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-xl-4 row-cols-xxl-4 g-4">


  <?php

  if (isset($_POST['nombreBusquedaCliente'])) {


    foreach ($buscarcliente as $Cliente) {

      $datosClientes = ControladorClientes::ctrDatosClientes($Cliente['id_cliente']);
      $numeroLimpio = preg_replace('/[^0-9]/', '', $datosClientes[0]['tel_celular']);


      $nombreCompleto = $Cliente['nombre_clte'] . ' ' . $Cliente['apaterno_clte'] . ' ' . $Cliente['amaterno_clte'];
      if ($Cliente['tel_casa'] == '') {
        $tel1 = 'S/R';
      } else {
        $tel1 = $Cliente['tel_casa'];
      }
      if ($Cliente['tel_oficina'] == '') {
        $tel2 = 'S/R';
      } else {
        $tel2 = $Cliente['tel_oficina'];
      }


      if ($Cliente['sexo']) {
        if ($Cliente['sexo'] == 'M') {
          $genero = 'Masculino';
        } elseif ($Cliente['sexo'] == 'F') {
          $genero = 'Femenino';
        }
      } else {
        $genero = '';
      }

      if ($datosClientes[0]['num_int'] == 0) {
        $num = ' <br><b>EXT.</b> ' . $datosClientes[0]['num_ext'];
      } else {
        $num = ' <br><b>INT.</b> ' . $datosClientes[0]['num_int'];
      }
      $direcc = '<b>Calle: </b>' . $datosClientes[0]['calle'] . '<br> <b>Núm.</b>' . $num . ' ,<br> <b>Colonia: </b>' . $datosClientes[0]['colonia'] . ',<br><b>Cd.</b> ' . $datosClientes[0]['ciudad'];


      include "modals/buscarcliente.modal.php";
      
  ?>

      <!-- inicio card -->
      <div class="col">
        <div class="card radius-10">
          <div class="card-body text-center">
            <div class="profile-img">
              <img src="images/user.png" class="rounded-circle" width="120" height="120" alt="">
            </div>
            <div class="mt-4">
              <h5 class="mb-1"><?= $nombreCompleto ?></h5>
              <hr>
              <p class="mb-0"><?= $Cliente['tipo_cliente'] ?></p>
              <p> Curp: <?= $Cliente['curp'] ?> </p>
            </div>
            <hr>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>Contacto </strong> <br> Tel Casa: <?= $tel1 ?><br> Tel Ofi: <?= $tel2 ?> <br> Email: <?= $Cliente['email'] ?> </li>
              <li class="list-group-item"><strong>Asesor: </strong><?= $Cliente['nombre_asesor'] ?> <br> Fecha Alta: <?= $Cliente['alta_sistema'] ?> </li>


            </ul>
            <div class="d-flex align-items-center justify-content-around mt-4">
            <?php
              
              if ($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'director' || $_SESSION['perfil'] == 'DirectorAvawm' ) {
             
           

              ?>
              <button id="perfilCliente" name="id" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#clientemodal<?= $Cliente['id_cliente'] ?>" data-id="<?= $Cliente['id_cliente'] ?>">
                <div class="">
                  <h4 class="mb-0"><i class="fadeIn animated bx bx-id-card"></i></h4>
                  <p class="mb-0">Perfil</p>
                </div>
              </button>
              <?php
              
            } 
              ?>
               <?php
              
              if ($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'director'  ) {
             
           

              ?>
              <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#depositosModal<?=$Cliente['id_cliente']?>">
                <div class="">
                  <div class="font-22"> <i class="lni lni-money-protection"></i>
                  </div>
                  <p class="mb-0">Depositos</p>
                </div>
              </button>

            

              <?php include "modals/depositos.modal.php";  ?>
              <?php
              
            } 
            
              ?>

              <?php
              
              if ($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'director'  || $_SESSION['perfil'] == 'DirectorAvawm' ) {
             
           

              ?>

              <div class="">
             <form action="retiros"method='POST'>
              <input type="hidden" value="<?=$Cliente['id_cliente']?>" name="id_cliente" >
                <button class="btn btn-outline-warning">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                  </svg>
                  <p class="mb-0">Retiros<?=$hola?></p>
              </div>
              </button>
          </form>
          <?php
              
            } 
            
              ?>
            </div>
          </div>
        </div>
      </div>
      <!-- fincard -->
      
  <?php


    }
  } ?>



<?php


if (isset($_POST['titulosVender'])) {
  $retiroSp =ControladorRetiros::ctrretiroSpSolicitud();
}

 

?>



</div>




<script src="js/clientes.js"></script>

<?php



include "modals/retiros.modal.php";
include "modals/anadircliente.modal.php";





?>