<?php   

$Movimientos = ControladorProductos::ctrHistoricoClienteEvent($_POST['id_cliente'],$_POST['producto']);






?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard<?php



?>
</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <ion-icon name="home-outline"></ion-icon>
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Contenido de los Garant Vencidos reestructurado -->
        <div class="container">
        <div class="col">
                        </div>
           
            <div class="card mb-4">
            <div class="card">
            <div class="col">
                            <h5 class="text-black"><?= $Movimientos[0]['nombre_clte'] ?></h5>
                        </div>
              <div class="card-body">
              <div style="width: 100%; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>
              </div>
            </div> 
            </div>
           
        </div>
        
    </div>
</div>


    <script>
     // Suponiendo que ya tienes los datos del servidor en formato JSON
// Reemplaza `movimientosData` con el resultado real de tu consulta JSON.

const movimientosData = <?php echo json_encode($Movimientos); ?>;

// Extraer fechas (fecha_mov) y calcular 'titulos * precio_mercado' para los valores
const labels = movimientosData.map(movimiento => movimiento.fecha_mov);
const data = movimientosData.map(movimiento => movimiento.titulos * movimiento.precio_mercado);

// Crear el gráfico
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels, // Fechas extraídas
        datasets: [{
            label: 'Movimientos Diarios ($)',
            data: data, // Cantidades resultantes de titulos * precio_mercado
            fill: false,
            borderColor: 'rgba(75, 192, 192, 1)',
            tension: 0.1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


    </script>


