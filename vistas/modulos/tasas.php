<!-- start page content wrapper-->
<?php

$tasasCetes = ControladorPmercado::ctrTasasCetes();
$tasasTiie = ControladorPmercado::ctrTasasTiie();
$tctable = ControladorPmercado::ctrTcinfo();
//$tc = ModeloAutomatico::mdlInsertarTipoCambioFaltante('2024-01-01');
//print_r($tc);


?>




<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

    
    

      <!--start breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3 justify-content-between">
    <div class="d-flex align-items-center">
        <div class="breadcrumb-title pe-3">Tasas</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item">
                        <a href="inicio">
                            <ion-icon name="home-outline"></ion-icon>
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <form action="actasas" method="POST">
        <input type="hidden" name="tasasact" value="0" >
   
    <button
        type="submit"
        class="btn btn-primary"
        id="ActualizarTasas">
        Actualizar Tasas
    </button>
    </form>
</div>

     
<h4>Cetes</h4>
      
      <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cetes 28 dias</th>
                        <th>Cetes 60 dias</th>
                        <th>Cetes 91 dias</th>
                        <th>Cetes 182 dias</th>
                        
                    </tr>
                </thead>
                <tbody>
                  <?php 
                 
                 
            foreach ($tasasCetes as $Cetes) {
                # code...
           
                 if ($Cetes['SF43936_CETES28'] != '') {
                    # code...
               


                  ?>
                    <tr>
                        <td><?=$Cetes['Fecha']?></td>
                        <td><?=$Cetes['SF43936_CETES28']?></td>
                        <td></td>
                        <td><?=$Cetes['SF43939_CETES91']?></td>
                        <td><?=$Cetes['SF43942_CETES182']?></td>
                       
                       
                       
                     
                        


                        
                    </tr>
                  
                  <?php
               }
                   
            }
                 
                   
                  
                   
                  ?>
                </tbody>
            </table>
            <hr>
            <h4>Tiie</h4>
      <table id="example2" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha</th>
                       
                        <th>Tiie 28 dias</th>
                        <th>Tiie 91 dias</th>
                        <th>Tiie 182 dias</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                 
                 
            foreach ($tasasTiie as $Tiie) {
               
                if ($Tiie['SF43783_TIIE28'] != '') {
                   

                  ?>
                    <tr>
                    <td><?=$Tiie['Fecha']?></td>
                        <td><?=$Tiie['SF43783_TIIE28']?></td>
                     
                        <td><?=$Tiie['SF43878_TIIE91']?></td>
                        <td><?=$Tiie['SF111916_TIIE182']?></td>
                       
                       
                     
                        


                        
                    </tr>
                  
                  <?php
             
                   
            }
                 
                   
        }  
                   
                  ?>
                </tbody>
            </table>
            <hr>
           
            <h4>Tipo de Cambio</h4>
      <table id="example3" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha</th>
                       
                        <th>Precio</th>
                             </tr>
                </thead>
                <tbody>
                  <?php 
                 
                 
            foreach ($tctable as $tc) {
               
                   

                  ?>
                    <tr>
                    <td><?=$tc['fecha']?></td>
                        <td><?=$tc['precio']?></td>
                       
                        


                        
                    </tr>
                  
                  <?php
             
                   
            }
                 
          
                  ?>
                </tbody>
            </table>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#ActualizarTasas').click(function() {
        // Llama a la función que actualiza las tasas
        actualizarTasas();
    });

    function actualizarTasas() {
        // Obtener la última fecha guardada en la base de datos (esto debería hacerse en tu backend y ser retornado a este punto)
        $.ajax({
            url: 'ruta_al_backend_que_devuelve_la_ultima_fecha',
            method: 'GET',
            success: function(data) {
                const ultimaFecha = data.ultimaFecha;  // Esta es la última fecha registrada
                const fechaHoy = new Date().toISOString().split('T')[0];  // Fecha de hoy en formato YYYY-MM-DD
                
                // Convertir la fecha de última tasa a un objeto Date
                let fechaInicio = new Date(ultimaFecha);
                let fechaFin = new Date(fechaHoy);

                // Recorrer día a día desde la última fecha guardada hasta hoy
                while (fechaInicio <= fechaFin) {
                    let fechaFormato = fechaInicio.toISOString().split('T')[0]; // Formato YYYY-MM-DD

                    // Llamada AJAX a la API de Banxico
                    obtenerDatosBanxico(fechaFormato);

                    // Avanzar un día
                    fechaInicio.setDate(fechaInicio.getDate() + 1);
                }
            },
            error: function(err) {
                console.error('Error al obtener la última fecha guardada:', err);
            }
        });
    }

    function obtenerDatosBanxico(fecha) {
        // Serie de ejemplo (deberías tener las series que necesitas obtener)
        const series = ['SF43718', 'SF46410']; // Ejemplo de series a obtener
        const token = 'a14ef39527884fb354f2f9c6dae886784ead0a6769b1c57838557f09393e7e06';

        series.forEach(function(serie) {
            $.ajax({
                url: `https://www.banxico.org.mx/SieAPIRest/service/v1/series/${serie}/datos/${fecha}/${fecha}?token=${token}`,
                method: 'GET',
                success: function(response) {
                    const datos = response.bmx.series[0].datos;
                    
                    if (datos.length > 0) {
                        const precio = datos[0].dato;
                        guardarTasaEnBaseDeDatos(serie, fecha, precio);
                    }
                },
                error: function(err) {
                    console.error('Error al obtener los datos de Banxico:', err);
                }
            });
        });
    }

    function guardarTasaEnBaseDeDatos(serie, fecha, precio) {
        $.ajax({
            url: 'ruta_al_backend_para_guardar_tasa',
            method: 'POST',
            data: {
                serie: serie,
                fecha: fecha,
                precio: precio
            },
            success: function(response) {
                console.log(`Tasa guardada para la serie ${serie} en la fecha ${fecha}`);
            },
            error: function(err) {
                console.error('Error al guardar la tasa en la base de datos:', err);
            }
        });
    }
});
</script>
