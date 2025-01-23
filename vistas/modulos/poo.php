<?php


$bi = new ControladorBi();


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
      <h1>Hola</h1>
      <?php
      
     foreach ($bi->ctrGarantVencidos() as $Garant) {
      print_r($Garant);
     }
      
      
      ?>
     </div>