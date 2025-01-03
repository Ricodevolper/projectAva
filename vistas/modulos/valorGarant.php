<?php

$Garant = ControladorProductos::ctrGarantActivo();

$datosEmpleado = new ControladorEmpleado();


if ($_POST['producto'] == 'garantUsd' ) {


 $producto =  $datosEmpleado->ctrDatosGarant($_POST['id_empleado']);
  
}elseif ($_POST['producto'] == 'garantMxn') {
  $producto =  $datosEmpleado->ctrDatosGarant($_POST['id_empleado']);
  
}elseif ($_POST['producto'] == 'Tiie&Cetes' ) {
  $producto =  $datosEmpleado->ctrDatosTiie($_POST['id_empleado']);
 
}elseif ($_POST['producto'] == 'Event' ) {
  $producto =  $datosEmpleado->ctrDatosEvent($_POST['id_empleado']);
 
}elseif ($_POST['producto'] == 'Lq' ) {
  $producto =  $datosEmpleado->ctrDatosLq($_POST['id_empleado']);
 
}elseif ($_POST['producto'] == 'SP500' ) {
  $producto =  $datosEmpleado->ctrDatosSp($_POST['id_empleado']);
 
}

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
                        <li class="breadcrumb-item">
                            <a href="javascript:;">
                                <ion-icon name="home-outline"></ion-icon>
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Ejecución a solicitudes de Clientes: </h5>
                    <form class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                            <ion-icon name="search-sharp" role="img" class="md hydrated" aria-label="search sharp"></ion-icon>
                        </div>
                        <input class="form-control ps-5" type="text" placeholder="search">
                    </form>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table align-middle mb-0" id="example">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Cliente</th>
                                <th>Monto de Inversión</th>
                                <?php
                                // Verificación de la variable producto para mostrar las columnas necesarias
                                if (isset($_POST['producto']) && $_POST['producto'] != 'garantMxn') {
                                ?>
                                    <th>Fecha Inicio</th>
                                <?php
                                }

                                if (isset($_POST['producto']) && $_POST['producto'] != 'SP500') {
                                ?>
                                    <th>Fecha Termino</th>
                                <?php
                                } else {
                                ?>
                                    <th>Fecha Liquidación</th>
                                <?php
                                }
                                ?>

                                <th>Moneda</th>

                                <?php
                                if (isset($_POST['producto']) && $_POST['producto'] != 'SP500') {
                                ?>
                                    <th>Interés</th>
                                <?php
                                }
                                ?>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                 $total = 0;
                            $interes = 0;
                            foreach ($producto as $activo) {
                                $saldo = isset($activo['monto_inver']) ? $activo['monto_inver'] : $activo['saldo_total'];
                                $interesCli = isset($activo['cuota_total']) ? $activo['cuota_total'] : 0;

                                // Definir las fechas
                                $fecha_inicio = '';
                                $fecha_fin = '';

                                if (isset($activo['fecha_aplicacion'])) {
                                    $fecha_inicio = $activo['fecha_aplicacion'];
                                }

                                if (isset($activo['id_garant'])) {
                                    $fecha_fin = ControladorProductos::ctrGarantMaxFechaPago($activo['id_garant'])[0]['MAX'];
                                } elseif (isset($activo['fecha_inicio'])) {
                                    $fecha_inicio = $activo['fecha_inicio'];
                                } elseif (isset($activo['fecha_mov'])) {
                                    $fecha_inicio = $activo['fecha_mov'];
                                } elseif (isset($activo['id_mov_tiie'])) {
                                    $fecha_fin = ControladorProductos::ctrMaxFechaTiie($activo['id_mov_tiie'])[0]['MAX'];
                                }

                                $total += $saldo;
                                $interes += $interesCli;

                                $Cliente['id_cliente'] = $activo['Fk_cliente'];
                            ?>
                                <tr>
                                    <td><?= $activo['Fk_cliente'] ?></td>
                                    <td><?= $activo['cliente'] ?></td>
                                    <td>$ <?= number_format($saldo, 2) ?></td>

                                    <?php
                                    if (isset($_POST['producto']) && $_POST['producto'] != 'garantMxn') {
                                    ?>
                                        <td><?= !empty($fecha_inicio) ? $fecha_inicio : 'No disponible' ?></td>
                                    <?php
                                    }

                                    if (isset($_POST['producto']) && $_POST['producto'] != 'SP500') {
                                    ?>
                                        <td><?= !empty($fecha_fin) ? $fecha_fin : 'No disponible' ?></td>
                                    <?php
                                    } else {
                                    ?>
                                        <td><?= !empty($activo['fecha_liquidacion']) ? $activo['fecha_liquidacion'] : 'No disponible' ?></td>
                                    <?php
                                    }
                                    ?>

                                    <td><?= $activo['t_moneda'] ?></td>

                                    <?php
                                    if (isset($_POST['producto']) && $_POST['producto'] != 'SP500') {
                                    ?>
                                        <td>$ <?= number_format($interesCli, 2) ?></td>
                                    <?php
                                    }
                                    ?>

                                    <td>
                                        <button id="perfilCliente" name="id" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#clientemodal<?= $Cliente['id_cliente'] ?>" data-id="<?= $Cliente['id_cliente'] ?>">
                                            <div class="">
                                                <h4 class="mb-0"><i class="fadeIn animated bx bx-id-card"></i></h4>
                                                <p class="mb-0">Perfil</p>
                                            </div>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5 class="text-success"><strong>Total: $ <?= number_format($total, 2) ?></strong></h5>
                                </td>
                                <td></td>
                                <td>
                                    <h5 class="text-warning"><strong>Total: $ <?= number_format($interes, 2) ?></strong></h5>
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

            <?php
            
            $clientesProcesados = []; // Array para almacenar los ID de clientes procesados

foreach ($producto as $activo) {

    $Cliente['id_cliente'] = $activo['Fk_cliente'];
    
    // Verifica si el cliente ya ha sido procesado
    if (!in_array($Cliente['id_cliente'], $clientesProcesados)) {

        // Obtener los datos del cliente
        $datosClientes = ControladorClientes::ctrDatosClientes($Cliente['id_cliente']);

        $Cliente['clave_elector'] = $datosClientes[0]['clave_elector'];
        $Cliente['curp'] = $datosClientes[0]['curp'];
        $Cliente['rfc'] = $datosClientes[0]['rfc'];
        $Cliente['fecha_nacimiento'] = $datosClientes[0]['fecha_nacimiento'];

        // Validación de los teléfonos
        $tel1 = ($datosClientes[0]['tel_casa'] == '') ? 'S/R' : $datosClientes[0]['tel_casa'];
        $tel2 = ($datosClientes[0]['tel_oficina'] == '') ? 'S/R' : $datosClientes[0]['tel_oficina'];

        // Validación del género
        if (isset($datosClientes[0]['sexo']) && in_array($datosClientes[0]['sexo'], ['M', 'F'])) {
            $genero = ($datosClientes[0]['sexo'] == 'M') ? 'Masculino' : 'Femenino';
        } else {
            $genero = 'Desconocido';
        }

        // Limpiar número de teléfono celular
        $numeroLimpio = preg_replace('/[^0-9]/', '', $datosClientes[0]['tel_celular']);

        // Obtener datos del cotitular
        $cotitular = ControladorClientes::ctrDatosCotitular($Cliente['id_cliente']);

        // Incluir modal solo si el cliente no ha sido procesado
        include "modals/buscarcliente.modal.php";

        // Añadir el cliente al array de procesados
        $clientesProcesados[] = $Cliente['id_cliente'];
    }
}

            
            ?>
      
        

      
            <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const rows = document.querySelectorAll('#Garant tbody tr');

                        rows.forEach(row => {
                            row.addEventListener('mouseover', function() {
                                row.querySelectorAll('td').forEach(cell => {
                                    cell.classList.add('text-info');
                                    cell.style.fontWeight = 'bold';
                                });
                            });

                            row.addEventListener('mouseout', function() {
                                row.querySelectorAll('td').forEach(cell => {
                                    cell.classList.remove('text-info');
                                    cell.style.fontWeight = 'normal';
                                });
                            });
                        });
                    });
</script>
                <style>
    /* Cambia el color del texto y aumenta el tamaño al pasar el mouse */
    #Garant tbody td:hover {
     
        transform: scale(1.05); /* Aumenta un 5% el tamaño de la fila */
        transition: transform 0.2s, color 0.2s; /* Suaviza la transición */
    }
</style>