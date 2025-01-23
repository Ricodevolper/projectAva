<?php   

$GarantVencidos = ControladorProductos::ctrHistoricoCliente($_POST['id_cliente'],$_POST['producto']);






?>
<!-- start page content wrapper-->
<!-- start page content wrapper-->
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
                            <h5 class="text-black"><?= $GarantVencidos[0]['nombre_clte'] ?></h5>
                        </div>
            <?php foreach ($GarantVencidos as $Vencido):
                
                if (isset($Vencido['id_garant'])) {
                    $id_producto = $Vencido['id_garant'];
                }elseif (isset($Vencido['id_mov_tiie'])) {
                    $id_producto = $Vencido['id_mov_tiie'];
       
                }


                if (isset($Vencido['tasa'])) {
                    $tasa = $Vencido['tasa'];
                }elseif (isset($Vencido['tasa_pactada'])) {
                    $tasa = $Vencido['tasa_pactada'];
       
                }


             
                
                
                ?>
            <div class="card mb-4">
                <div class="card-body">
                    <!-- Título del card con el nombre del cliente -->
                    <div class="row">

                    </div>
                    <!-- blackrmación del cliente -->
                    <div class="row mb-3">
                        <div class="col-1 text-black"><strong>Id:</strong> <?= $id_producto ?></div>
                        <div class="col-1 text-black"><strong>Plazo:</strong> <?= $Vencido['plazo'] ?></div>
                        <div class="col-1 text-black"><strong>F. pago:</strong> <?= $Vencido['f_pago'] ?></div>
                        <div class="col-2 text-black"><strong>Moneda:</strong> <?= $Vencido['t_moneda'] ?></div>
                        <div class="col-3 text-black"><strong>Inversión:</strong> $<?= number_format($Vencido['monto_inver'], 2) ?></div>
                        <div class="col-2 text-black"><strong>Cuota Total:</strong> $<?= number_format($Vencido['cuota_total'], 2) ?></div>
                        <div class="col-1 text-black"><strong>Tasa:</strong> % <?= $tasa ?></div>
                    </div>
                    <!-- Tabla con los detalles de los pagos -->
                    <table id="VencGarant" class="table mb-0 table-striped">
                        <thead>
                            <tr>
                                <th class="text-info" scope="col">Fechas de Pago</th>
                                <th class="text-info" scope="col">Interés</th>
                                <th class="text-info" scope="col">Status</th>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                            if($_POST['producto'] == 'garantMxn' || $_POST['producto'] == 'garantUsd') {
                                # code...
                            
                            $infoGarant = ControladorBi::ctrBiGarantInfo($id_producto);

                        }elseif ($_POST['producto'] == 'tiie') {
                           $infoGarant = ControladorBi::ctrTiieInfo($id_producto);
                        }
                            foreach ($infoGarant as $Garant) {
                                $boton = '';
                                if ($Garant['status_pago'] == 0) {
                                    if (in_array($_SESSION['perfil'], ['administrador', 'Gerente Administrativo', 'director'])) {
                                        $boton = '<a href="https://avawm.mx/clientesnew/Sistema.php?url=Inicio/garant_all_mx/' . $Vencido['Fk_cliente'] . '" target="_blank">
                                            <button type="button" class="btn btn-outline-warning px-5">Pendiente</button>
                                        </a>';
                                    } else {
                                        $boton = '<button type="button" class="btn btn-outline-warning px-5" disabled>Pendiente</button>';
                                    }
                                } else {
                                    $boton = '<button type="button" class="btn btn-outline-success px-5" disabled>Pagado</button>';
                                }
                            ?>
                                <tr>
                                    <td><?= $Garant['fecha_pago'] ?></td>
                                    <td>$ <?= number_format($Garant['interes'], 2) ?></td>
                                    <td><?= $boton ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</div>


