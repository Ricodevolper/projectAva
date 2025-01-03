<?php
$id_usuario = $_SESSION['id'];
$notificaciones = new ControladorNotificaciones();


$noVistas = $notificaciones->ctrobtenerNotificacionesNoVistas($id_usuario);





?>

<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

      <!--start breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Notificaciones<?php
      
        ?></div>
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
        
      </div>

      <div class="row row-cols-1 row-cols-lg-4">
    <?php
    foreach ($noVistas as $notificacion) {
    ?>
        <div class="col col-12 col-md-6 col-lg-3 mb-3">
            <div class="card radius-10 bg-success">
                <div class="card-body text-white">
                    <h6><?= $notificacion['tema_notificacion'] ?></h6>
                    <p class="mb-0"><?= $notificacion['texto_notificacion'] ?></p>
                </div>
            </div>
        </div>
    <?php
    }



    foreach ($noVistas as $vista) {

        $insertVista = $notificaciones->ctrMarcarNotificacionVista($id_usuario,$vista['id_notificaicon']);
       
    }
    ?>
</div>

     
  
      
