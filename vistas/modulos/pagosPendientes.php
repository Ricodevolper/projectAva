<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

      <!--start breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Pagos Pendientes</div>
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
      <?php
        
          $pagosTiie = ControladorPagos::ctrPagosPendientesTiieCetes(); 
          if ($pagosTiie != '') {?>


          <div class="card-body">
                <div class="d-flex align-items-center">
                   <h5 class="mb-0">Tiie Cetes</h5>
                       </div>
                <div class="table-responsive mt-3">
                  <table id="example" class="table align-middle mb-0"  >
                    <thead class="table-light">
                     <tr>
                       <th>Cliente</th>
                       <th>Plazo</th>
                       <th>Producto</th>
                       <th>Forma de Pago</th>
                       <th>Moneda</th>
                        <th>Cuota Total</th>
                       <th>Tasa Pactada</th>
                       <th>Producto</th>
                       <th>Fecha Apertura</th>
                       <th>Fecha Pago </th>
                                      <th>Status</th>
                       
                     </tr>
                     </thead>
                     <tbody>

                     <?php
                     $f_pago_map = [
                        "1" => "DIAS",
                        "6" => "FIN DE PLAZO",
                        "3" => "MENSUAL"
                    ];
                    
                    $plazo_map = [
                        "6" => "182 DÍAS",
                        "3" => "91 DÍAS"
                    ];
                    
                    $t_inversion_map = [
                        "1" => "TIIE",
                        "2" => "CETES"
                    ];
                    
                    $cetes_a_map = [
                        "1" => "28 DÍAS",
                        "2" => "91 DÍAS",
                        "3" => "182 DÍAS"
                    ];
                     $plazos = [
                        "0" => "-- -- --",
                        "1" => "7 DIAS",
                        "2" => "28 DIAS",
                        "7" => "60 DIAS",
                        "3" => "91 DIAS",
                        "6" => "182 DIAS"
                    ];
                    $periodos = [
                        "0" => "-- -- --",
                        "4" => "7 DIAS",
                        "1" => "28 DIAS",
                        "5" => "60 DIAS",
                        "2" => "91 DIAS",
                        "3" => "182 DIAS"
                    ];
                     foreach ($pagosTiie as $pago ) {
                      
                     ?>
                        <tr>
                    <td><?=$pago['nombre_cliente']?></td>
                    <td><?=$plazos[$pago['plazo']]?></td>
                    <td><?=$periodos[$pago['cetes_a']]?></td>
                    <td><?=$f_pago_map[$pago['f_pago']]?></td>
                    <td><?=$pago['t_moneda']?></td>
                    <td><?=number_format($pago['cuota_total'],2)?></td>
                    <td><?=number_format($pago['tasa_pactada'],2)?></td>
                    <td><?=$t_inversion_map[$pago['t_inversion']]?></td>
                    <td><?=$pago['fecha_aplicacion']?></td>
                    <td><?=$pago['fecha_pago']?></td>
                          <td>
                <button 
                    type="submit"
                    class="btn btn-warning open-modal"
                    data-id="<?=$pago['id_detalle_tiie']?>"
                    data-cliente="<?=$pago['nombre_cliente']?>"
                    data-plazo="<?=$plazos[$pago['plazo']]?>"
                    data-producto="<?=$periodos[$pago['cetes_a']]?>"
                    data-forma-pago="<?=$f_pago_map[$pago['f_pago']]?>"
                    data-moneda="<?=$pago['t_moneda']?>"
                    data-inversion="<?=number_format($pago['monto_inver'],2)?>"
                    data-cuota="<?=number_format($pago['cuota_total'],2)?>"
                    data-tasa-pactada="<?=number_format($pago['tasa_pactada'],2)?>"
                    data-fecha-aplicacion="<?=$pago['fecha_aplicacion']?>"
                    data-fecha-pago="<?=$pago['fecha_pago']?>"
                    data-tasa="<?=number_format($pago['tasa'],2)?>"
                    data-strike="<?=number_format($pago['strike'],2)?>"
                    data-tasa_maxima="<?=number_format($pago['tasa_maxima'],2)?>"
                    data-cupon="<?=number_format($pago['cupon'],2)?>"
                    data-t_inversion="<?=$t_inversion_map[$pago['t_inversion']]?>"
                    data-tip_c_max ="<?=number_format($pago['tip_c_max'],2)?>"
                    data-fk_id_tiie ="<?=number_format($pago['fk_id_tiie'],2)?>"
                    data-num_pago ="<?=$pago['num_pago']?>"
                >
                    Por aplicar
                </button>
            </td>
        </tr>


                     <?php
                     
                    }
                     ?>
            
                   
                   
            
                    
        
                      </tbody>
                    </table>
                </div>
              </div>

          <?php  # code...
          }
        
        ?>
     


<!-- Modal -->
<div class="modal fade" id="detalleModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" inert>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- Encabezado -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalLabel">Aplicar Pago</h5>
                 </div>

            <!-- Cuerpo del modal -->
            <div class="modal-body">
                <form id="formPago" method="POST" action = 'saveDepositos'>
                    <input type="hidden" id="id_detalle_tiie" name="id_detalle_tiie">
                    <input type="hidden" id="tasa_maxima" name="tasa_maxima">
                    <input type="hidden" id="cupon" name="cupon">
                    <input type="hidden" id="t_inversion" name="t_inversion">
                    <input type="hidden" id="tip_c_max" name="tip_c_max">
                    <input type="hidden" id="fk_id_tiie" name="fk_id_tiie">
                    <input type="hidden" id="num_pago" name="num_pago">
                  
                    <!-- Organización del formulario -->
                    <div class="row row-cols-1 row-cols-md-2 g-3">
                        <div class="form-group col">
                            <label for="cliente">Cliente</label>
                            <input type="text" class="form-control" id="cliente" name="cliente" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="plazo">Plazo</label>
                            <input type="text" class="form-control" id="plazo" name="plazo" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="producto">Producto</label>
                            <input type="text" class="form-control" id="producto" name="producto" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="forma_pago">Forma de Pago</label>
                            <input type="text" class="form-control" id="forma_pago" name="forma_pago" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="moneda">Moneda</label>
                            <input type="text" class="form-control" id="moneda" name="moneda" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="inversion">Inversión</label>
                            <input type="text" class="form-control" id="inversion" name="inversion" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="cuota">Cuota Total</label>
                            <input type="text" class="form-control" id="cuota" name="cuota" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="tasa_pactada">Tasa Pactada</label>
                            <input type="text" class="form-control" id="tasa_pactada" name="tasa_pactada" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="fecha_aplicacion">Fecha Apertura</label>
                            <input type="text" class="form-control" id="fecha_aplicacion" name="fecha_aplicacion" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="fecha_pago">Fecha Pago</label>
                            <input type="text" class="form-control" id="fecha_pago" name="fecha_pago" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="tasa">Tasa</label>
                            <input type="text" class="form-control" id="tasa" name="tasa" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="strike">Strike</label>
                            <input type="text" class="form-control" id="strike" name="strike" readonly>
                        </div>
                    </div>

                    <!-- Botón de envío -->
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success w-100">Pagar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<script>
document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll('.open-modal');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            // Obtener valores de los atributos data-*
            document.getElementById('id_detalle_tiie').value = this.getAttribute('data-id');
            document.getElementById('cliente').value = this.getAttribute('data-cliente');
            document.getElementById('plazo').value = this.getAttribute('data-plazo');
            document.getElementById('producto').value = this.getAttribute('data-producto');
            document.getElementById('forma_pago').value = this.getAttribute('data-forma-pago');
            document.getElementById('moneda').value = this.getAttribute('data-moneda');
            document.getElementById('inversion').value = this.getAttribute('data-inversion');
            document.getElementById('cuota').value = this.getAttribute('data-cuota');
            document.getElementById('tasa_pactada').value = this.getAttribute('data-tasa-pactada');
            document.getElementById('fecha_aplicacion').value = this.getAttribute('data-fecha-aplicacion');
            document.getElementById('fecha_pago').value = this.getAttribute('data-fecha-pago');
            document.getElementById('tasa').value = this.getAttribute('data-tasa');
            document.getElementById('strike').value = this.getAttribute('data-strike');
            document.getElementById('tasa_maxima').value = this.getAttribute('data-tasa_maxima');
            document.getElementById('cupon').value = this.getAttribute('data-cupon');
            document.getElementById('t_inversion').value = this.getAttribute('data-t_inversion');
            document.getElementById('tip_c_max').value = this.getAttribute('data-tip_c_max');
            document.getElementById('fk_id_tiie').value = this.getAttribute('data-fk_id_tiie');
            document.getElementById('num_pago').value = this.getAttribute('data-num_pago');

            // Mostrar el modal
            $('#detalleModal').modal('show');
        });
    });
});
</script>


