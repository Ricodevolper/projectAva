<?php

 $articulosAlbaran = ctrRentabilidad::ctrRentabilidadLal();
 $articulosFacturas = ctrRentabilidad::ctrRentabilidadlfa();

 
?>


 <!-- page content -->
 <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
         
        </div>
          <!-- /top tiles -->

          
          <br />

          <div class="row">
          <div class="container mt-4">
  <div class="card">
    <div class="card-header bg-primary">
      <h3 class="text-white">Rentabilidad Articulos Albaranes</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box table-responsive">
          <div class="table-responsive">
  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Costo</th>
        <th class="d-none d-sm-table-cell">Costo Promedio Venta</th>
        <th class="d-none d-sm-table-cell">Precio Albaran</th>
        <th class="d-none d-sm-table-cell">Cantidad</th>
        <th class="d-none d-sm-table-cell">Costo Total</th>
        <th class="d-none d-sm-table-cell">Total Venta</th>
        <th class="d-none d-sm-table-cell">Rentabilidad</th>
      </tr>
    </thead>
    <tbody>
    <?php
// Inicializa las variables para los totales
$granTotalCostoTotal = 0;
$granTotalTotalLAL = 0;

foreach ($articulosAlbaran as $Articulo) {
    // Imprime las filas de la tabla
    ?>
    <tr>
        <td><?= $Articulo['CODART'] ?></td>
        <td><?= utf8_decode($Articulo['DESART']) ?></td>
        <td>$<?= number_format($Articulo['PCOART'], 2) ?></td>
        <td class="d-none d-sm-table-cell">$<?= number_format($Articulo['Costolal'], 2) ?></td>
        <td class="d-none d-sm-table-cell">$<?= number_format($Articulo['PromedioPrecio'], 2) ?></td>
        <td class="d-none d-sm-table-cell"><?= number_format($Articulo['TotalCantidad'], 2) ?></td>
        <td class="d-none d-sm-table-cell">$<?= number_format($Articulo['CostoTotal'], 2) ?></td>
        <td class="d-none d-sm-table-cell">$<?= number_format($Articulo['TotalLAL'], 2) ?></td>
        <td class="d-none d-sm-table-cell"><?= number_format($Articulo['PorcentajeTotalLAL']) ?>%</td>
    </tr>
    <?php

    // Suma los totales
    $granTotalCostoTotal += $Articulo['CostoTotal'];
    $granTotalTotalLAL += $Articulo['TotalLAL'];
}

// Calcula el porcentaje de ganancia
$porcentajeGanancia = ($granTotalTotalLAL > 0) ? ($granTotalCostoTotal / $granTotalTotalLAL) * 100 : 0;
?>

<tfoot>
    <tr>
        <td colspan="6"></td>
        <td class="d-none d-sm-table-cell">$<?= number_format($granTotalCostoTotal, 2) ?></td>
        <td class="d-none d-sm-table-cell">$<?= number_format($granTotalTotalLAL, 2) ?></td>
        <td class="d-none d-sm-table-cell"><?= number_format($porcentajeGanancia, 2) ?>%</td>
    </tr>
</tfoot>
  </table>
</div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

            
          </div>


          
        <!-- /page content -->
