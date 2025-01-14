<?php 

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "vistas/modulos/head.php";
date_default_timezone_set('America/Mexico_City');
?>

<body>



<!--start wrapper-->
<div class="wrapper">

  <?php
  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {



 
  include "vistas/modulos/aside.php";
  include "vistas/modulos/sidebarmenu.php";

        // Obtiene la hora actual
      $horaActual = date('H:i');

      // Hora objetivo (4 PM)
      $horaObjetivo = '16:00';

if ($_SESSION['perfil'] == 'administrador') {
    $ejecucion =  ControladorAutomatico::ctrInicio();
    if ($ejecucion == 'ejecutado') {
      echo '<script>
      Swal.fire({
          title: "¡Tienes nuevas notificaciones!",
          text: "Revisa tus notificaciones de actualizaciones automáticas.",
          icon: "success",
          timer: 5000,
          timerProgressBar: true,
          showConfirmButton: false,
          toast: true,
          position: "top-end"
      });
      </script>';
    }
  }

  if (isset($_GET["ruta"])) {
    if (

    $_GET["ruta"] == "inicio" ||
      $_GET["ruta"] == "blank" ||
      $_GET["ruta"] == "usuarios" ||
      $_GET["ruta"] == "clientes" ||
      $_GET["ruta"] == "tablablank" ||
      $_GET["ruta"] == "rentabilidad" ||
      $_GET["ruta"] == "rentabilidadfac" ||
      $_GET["ruta"] == "depositos" ||
      $_GET["ruta"] == "ejecucionesEvent" ||
      $_GET["ruta"] == "valorGarant" ||
      $_GET["ruta"] == "ejecucionesLq" ||
      $_GET["ruta"] == "simulador" ||
      $_GET["ruta"] == "retiros" ||
      $_GET["ruta"] == "vencidosGarant" ||
      $_GET["ruta"] == "proximosVencimientos" ||
      $_GET["ruta"] == "vencimientoshoy" ||
      $_GET["ruta"] == "garantAsesor" ||
      $_GET["ruta"] == "panelUsuario" ||
      $_GET["ruta"] == "panelEmpleado" ||
      $_GET["ruta"] == "liquidacionesGarant" ||
      $_GET["ruta"] == "pmercado" ||
      $_GET["ruta"] == "hmercado" ||
      $_GET["ruta"] == "depositoSp" ||
      $_GET["ruta"] == "solicitudes" ||
      $_GET["ruta"] == "depositosEvent" ||
      $_GET["ruta"] == "depositostiie" ||
      $_GET["ruta"] == "saveDepositos" ||
      $_GET["ruta"] == "saveClientes" ||
      $_GET["ruta"] == "saveContratos" ||
       $_GET["ruta"] == "savePrecioSp500" ||
      $_GET["ruta"] == "tasas" ||
      $_GET["ruta"] == "actasas" ||
      $_GET["ruta"] == "depositos" ||
      $_GET["ruta"] == "solicitudRetiro" ||
      $_GET["ruta"] == "saveRetiros" ||
      $_GET["ruta"] == "reinvertir" ||
      $_GET["ruta"] == "editarPermiso" ||
      $_GET["ruta"] == "depositoBitcoin" ||
      $_GET["ruta"] == "notificacionesview" ||
      $_GET["ruta"] == "historicoCliente" ||
      $_GET["ruta"] == "historicoClienteLe" ||
      $_GET["ruta"] == "estadoCuenta" ||
      $_GET["ruta"] == "depositoBitcoinUsd" ||
      $_GET["ruta"] == "addCliente"||
      $_GET["ruta"] == "pagosPendientes" ||
     
      $_GET["ruta"] == "salir"

      ) {
        include "modulos/" . $_GET["ruta"] . ".php";
}else {
  
 
    
   
  
  }}

 
  include "vistas/modulos/js.php";
  echo '</body>';

  echo '
  <style>
  body {
      background-color: #E2E3E2;
  }
</style>';
  include "vistas/modulos/footer.php";

}else {
  include "vistas/modulos/login.php";
}
  ?>
  <!--end sidebar -->

  <!--start top header-->
  


  

  