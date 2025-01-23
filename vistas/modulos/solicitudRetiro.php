<?php
if (!isset($_POST['id_mov_bitcoin'])) {
   
$id_cliente = $_POST['id_cliente'];
$perfil = $_SESSION['perfil'];
$contrato = $_POST['num_contrato'];

$contratosActivos = ControladorClientes::ctrContratosActivos($id_cliente, $perfil);
$nombreCliente = ControladorClientes::ctrBuscarClienteId($id_cliente);
$bancos = ControladorDepositos::ctrBancos($id_cliente);

$rendimiento = ControladorDepositos::ctrRendimientoSpResumido($id_cliente, $contrato);
$bancosJson = json_encode($bancos);

// Calcular tasa de rendimiento y rendimiento neto
$tasa_rendimiento = $rendimiento['rendimiento_diario'] * 100;
$rendimiento_neto = $rendimiento['nuevo_saldo'] - $rendimiento['saldo_total'];

// Si la tasa de rendimiento supera el 17%, usar el cálculo de rendimiento diario con 17%
if ($tasa_rendimiento >= 14) {
    $rendimiento_neto = $rendimiento['saldo_total'] * ((14 / 365) * $rendimiento['dias_diferencia']) / 100;
    $tasa_rendimiento = (14 / 365) * $rendimiento['dias_diferencia'];
}elseif ($tasa_rendimiento < 0) {

    $tasaCetes = ControladorRetiros::ctrTasacetes(); 

    $porc = $tasaCetes[0]['tasa91'];
    $porc = $porc - 3 ;
    $rendimiento_neto = $rendimiento['saldo_total'] * ((14 / 365) * $rendimiento['dias_diferencia']) / 100;
    $tasa_rendimiento = (14 / 365) * $rendimiento['dias_diferencia'];

} {
    
}

// Calcular el saldo total sin formateo
$saldo_total = $rendimiento['saldo_total'] + $rendimiento_neto;

// Aplicar `number_format` solo al mostrar los resultados
$rendimiento_neto_formateado = number_format($rendimiento_neto, 2, '.', ',');
$tasa_rendimiento_formateada = number_format($tasa_rendimiento, 2, '.', ',');
$saldo_total_formateado = number_format($saldo_total, 2, '.', ',');


echo "<script>var bancosData = $bancosJson;</script>";

}else {
    
 $id_cliente = $_POST['id_cliente'];
$perfil = $_SESSION['perfil'];
$contrato = $_POST['num_contrato'];

$contratosActivos = ControladorClientes::ctrContratosActivos($id_cliente, $perfil);
$nombreCliente = ControladorClientes::ctrBuscarClienteId($id_cliente);
$bancos = ControladorDepositos::ctrBancos($id_cliente);
}


?>

<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Solicitud Retiros<?php
           
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

        <!-- Contenedor principal en una fila para alinear las tarjetas en columnas -->
        <div class="row">
            <!-- Formulario principal en una tarjeta -->
            <?php
                          if (!isset($_POST['id_mov_bitcoin'])) {
                      
                     ?>
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">Retiro</h5>
                    </div>
                   
                    <div class="card-body">
                        <form method="POST" id="formLiquidation" action="saveRetiros">
                            <div class="row">
                               

                                <div class="row">
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="id_cliente" class="form-label text-muted">Nombre Cliente</label>
                                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="<?= $nombreCliente[0]['cliente'] ?>" readonly required>
                                        <input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="<?= htmlspecialchars($_POST['id_cliente']) ?>" readonly required>
                                        <input type="hidden" class="form-control" id="id_mov" name="id_mov" value="<?= htmlspecialchars($_POST['id_mov']) ?>" readonly required>
                                    </div>

                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="t_moneda" class="form-label text-muted">Moneda</label>
                                        <input type="text" class="form-control" id="t_moneda" name="t_moneda" value="<?= htmlspecialchars($_POST['t_moneda']) ?>" readonly required>
                                    </div>

                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="precio_compra" class="form-label text-muted">Valor de Compra</label>
                                        <input type="text" class="form-control" id="precio_compra" name="precio_compra" value="<?= htmlspecialchars($_POST['precio_compra']) ?>" readonly required>
                                    </div>


                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="max_precio" class="form-label text-muted">Valor Actual</label>
                                        <input type="text" class="form-control" id="max_precio" name="max_precio" value="<?= htmlspecialchars($_POST['max_precio']) ?>" readonly required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="dias_rendimiento" class="form-label text-muted">Dias de rendimiento</label>
                                        <input type="text" class="form-control" id="dias_rendimiento" name="dias_rendimiento" value="<?= $rendimiento['dias_diferencia'] ?>" readonly required>
                                    </div>

                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="num_contrato" class="form-label text-muted">Número de Contrato</label>
                                        <input type="text" class="form-control" id="num_contrato" name="num_contrato" value="<?= htmlspecialchars($_POST['num_contrato']) ?>" readonly required>
                                    </div>

                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="saldo_total" class="form-label text-muted">Inversión</label>
                                        <input type="text" class="form-control" id="saldo_total" name="saldo_total" value="<?= htmlspecialchars($_POST['saldo_total']) ?>" readonly required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="rendimiento_neto" class="form-label text-muted">Rendimiento</label>
                                        <input type="text" class="form-control" id="rendimiento_neto" name="rendimiento_neto" value="$ <?= $rendimiento_neto_formateado ?>" readonly required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="nuevo_total" class="form-label text-muted">Saldo Total</label>
                                        <input type="text" class="form-control" id="nuevo_total" name="nuevo_total" value="$ <?= $saldo_total_formateado ?>" readonly required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="rendimiento_neto" class="form-label text-muted">Tasa Rendimeinto</label>
                                        <input type="text" class="form-control" id="tasa_rendimiento" name="tasa_rendimiento" value="<?= $tasa_rendimiento_formateada ?>%" readonly required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="bancos-cliente" class="form-label">Bancos Cliente</label>
                                        <select class="form-select" id="idBanco" name="idBanco" onchange="llenarCampos(this.value)" required>
                                            <option>-- SELECCIONA BANCO --</option>
                                            <?php foreach ($bancos as $banco): ?>
                                                <option value='<?= $banco['id_asignado'] ?>'><?= $banco['banco'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="numero-cuenta" class="form-label">Número cuenta</label>
                                        <input type="text" class="form-control" name="numeroCuenta" id="numeroCuenta" placeholder="NUMERO DE CUENTA" readonly required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="clave" class="form-label">Clabe</label>
                                        <input type="text" class="form-control" id="clave_interbanc" name="clave_interbanc" placeholder="CLABE INTERBANCARIA" readonly required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="titular-cuenta" class="form-label">Nombre de titular de la cuenta</label>
                                        <input type="text" class="form-control" name="titularCuenta" id="titularCuenta" placeholder="NOMBRE TITULAR DE CUENTA" readonly required>
                                    </div>


                                    <input type="hidden" class="form-control" id="fondo" name="fondo" value="<?= htmlspecialchars($_POST['fondo']) ?>" readonly required>


                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="fecha_movsp" class="form-label text-muted">Fecha de Inicio</label>
                                        <input type="text" class="form-control" id="fecha_movsp" name="fecha_movsp" value="<?= htmlspecialchars($_POST['fecha_movsp']) ?>" readonly required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3">
                                        <label for="fec_liquidacion" class="form-label text-muted">Fecha de Inicio</label>
                                        <input type="text" class="form-control" id="fec_liquidacion" name="fec_liquidacion" value="<?= htmlspecialchars($_POST['fec_liquidacion']) ?>" readonly required>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-center gap-3 mt-4">
                                <button type="button" class="btn btn-danger px-4" onclick="confirmLiquidation()">Liquidar</button>

                                <button type="button" class="btn btn-secondary px-4" onclick="window.history.back();">Cancelar</button>
                                <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#exampleModal"> Reinvertir </button>
                        </form>
                    </div>



                </div>
            </div>
            <?php
            
                                            }else{

                         $infoDetalle = ControladorRetiros::ctrDetalleRetiroBtc($_POST['id_mov_bitcoin']);
       

               ?>
               <div class="col-md-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header ">
          
                <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                   <h5 class="mb-0">Detalle Bitcoin</h5>
                   
                </div>
                <div class="table-responsive mt-3">
                  <table class="table align-middle" id="example">
                    <thead class="table-secondary">
                      <tr>
                       <th>Num. Detalle</th>
                      
                       <th>Fecha Pago</th>
                       <th>Valor Moneda</th>
                       <th>Cupon</th>
                       <th>Valor Btc Pago</th>
                       <th>Valor Btc Cliente</th>
                       <th></th>
                       
                      </tr>
                    </thead>
                    <tbody>
                     
                 
                      <?php   
                      foreach ($infoDetalle as $detalle) {

                        if ($detalle['valor_btc_aplicado'] != '') {
                            $valor_btc_aplicado = '$'.number_format($detalle['valor_btc_aplicado'],2);
                        }else{
                            $valor_btc_aplicado  = '';
                        }
                           ?>
        
                      <tr>
                      <td><?=$detalle['num_detalle']?></td>
                     
                    
                      <td><?=$detalle['fecha_pago']?></td>
                      <td>$ <?=number_format($detalle['valor_mxn'],2)?></td> 
                     
                      <td><?=$detalle['strike']?> %</td>
                      <td><?=$valor_btc_aplicado?></td> 
                      <td><?=$_POST['saldo_total']?></td> 

                      <td>
                        
                      <?php
                      
                      if ($detalle['fecha_pago'] <= date('Y-m-d') && $detalle['status_pago'] == 0) { 
                        
                        
                        ?>

                    <form id="formLiquidar_<?=$detalle['id_mov_dbit']?>" method="POST">
                        <input type="hidden" name="id_mov_dbit" value="<?=$detalle['id_mov_dbit']?>">
                        <input type="hidden" name="fecha_pago" value="<?=$detalle['fecha_pago']?>">
                        <input type="hidden" name="saldo_btc" value="<?=$_POST['saldo_total']?>">
                        <button type="button" class="btn btn-success aplicarPago" data-id="<?=$detalle['id_mov_dbit']?>">Aplicar</button>
                    </form>



                     <?php }elseif($detalle['status_pago'] == 0){ ?>
                       <button
                        name="" id=""class="btn btn-outline-warning"  href="#"role="button" disabled >No Aplicado</button
                      >
                       <?php }elseif ($detalle['status_pago'] == 1) { ?>
                        <button
                        name="" id=""class="btn btn-outline-info"  href="#"role="button" disabled >Aplicado</button
                      >
                        <?php } ?>
                      </td>
                      </tr>

                      <?php
                         }
                      
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
            </div>

                                                <?php        
                                            }
            
            ?>
        </div>

        <!-- Tarjeta separada para la tabla de ejemplo -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white text-center">
                    <h5 class="mb-0">Datos Cliente<?php


                                                        ?></h5>
                </div>
                <div class="card-body">
                  <h6>Nombre: <strong><?= $nombreCliente[0]['cliente'] ?></strong></h6><br>

                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white text-center">
                    <h5 class="mb-0">Productos Activos<?php


                                                        ?></h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="table-primary text-center">
                                <th>Producto</th>
                                <th>Valor</th>
                                <th>Fecha</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($contratosActivos as $contrato) {
                                # code...

                            ?>
                                <tr>
                                    <td><?= $contrato['tabla_origen'] ?></td>
                                    <td><?= $contrato['titulos'] ?></td>
                                    <td><?= $contrato['fecha_mov'] ?></td>

                                </tr>
                            <?php

                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   <!-- Modal -->
<div class="modal fade" id="exampleModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Formulario principal en una tarjeta -->
                    <div class="col-md-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white text-center">
                                <h5 class="mb-0">Retiro</h5>
                            </div>
                            <div class="card-body">
                                <form action="reinvertir" method="post">
                                    <div class="row">
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="nombre_cliente_r" class="form-label text-muted">Nombre Cliente</label> 
                                            <input type="text" class="form-control" id="nombre_cliente_r" name="nombre_cliente_r" value="<?= $nombreCliente[0]['cliente'] ?>" readonly required>
                                        </div>
                                        
                                        <input type="hidden" class="form-control" id="id_cliente_r" name="id_cliente_r" value="<?= htmlspecialchars($_POST['id_cliente']) ?>" readonly required>
                                        <input type="hidden" class="form-control" id="id_mov_l" name="id_mov_l" value="<?= htmlspecialchars($_POST['id_mov']) ?>" readonly required>
                                        <input type="hidden" class="form-control" id="Fk_empleado" name="Fk_empleado" value="<?= htmlspecialchars($_POST['Fk_empleado']) ?>" readonly required>
                                        <input type="hidden" class="form-control" id="precio_compra_l" name="precio_compra_l" value="<?= htmlspecialchars($_POST['precio_compra']) ?>">
                                        <input type="hidden" class="form-control" id="max_precio" name="max_precio_l" value="<?= htmlspecialchars($_POST['max_precio']) ?>" readonly required>
                                        <input type="hidden" class="form-control" id="fecha_movsp_l" name="fecha_movsp_l" value="<?= htmlspecialchars($_POST['fecha_movsp']) ?>" readonly required>
                                        <input type="hidden" class="form-control" id="fec_liquidacion_l" name="fec_liquidacion_l" value="<?= htmlspecialchars($_POST['fec_liquidacion']) ?>" readonly required>
                                        <input type="hidden" class="form-control" id="nuevo_total_l" name="nuevo_total_l" value="$ <?= $saldo_total_formateado ?>" readonly required>
                                   
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="t_moneda_r" class="form-label text-muted">Moneda</label>
                                            <input type="text" class="form-control" id="t_moneda_r" name="t_moneda_r" value="<?= htmlspecialchars($_POST['t_moneda']) ?>" readonly required>
                                        </div>
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="precio_compra_r" class="form-label text-muted">Valor de Compra</label>
                                            <input type="text" class="form-control" id="precioActual" name="precioActual" value="" readonly required>
                                        </div>
                                        
                                       
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="dias_rendimiento_r" class="form-label text-muted">Días de Rendimiento</label>
                                            <input type="text" class="form-control" id="dias_rendimiento_r" name="dias_rendimiento_r" value="<?= $rendimiento['dias_diferencia'] ?>" readonly required>
                                        </div>
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="num_contrato_r" class="form-label text-muted">Número de Contrato</label>
                                            <input type="text" class="form-control" id="num_contrato_r" name="num_contrato_r" value="<?= htmlspecialchars($_POST['num_contrato']) ?>" readonly required>
                                        </div>
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="saldo_total_r" class="form-label text-muted">Inversión</label>
                                            <input type="text" class="form-control" id="saldo_total_r" name="saldo_total_r" value="<?= htmlspecialchars($_POST['saldo_total']) ?>" readonly required>
                                        </div>
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="rendimiento_neto_r" class="form-label text-muted">Rendimiento</label>
                                            <input type="text" class="form-control" id="rendimiento_neto_r" name="rendimiento_neto_r" value="$ <?= $rendimiento_neto_formateado ?>" readonly required>
                                        </div>
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="nuevo_total_r" class="form-label text-muted">Saldo Total</label>
                                            <input type="text" class="form-control" id="nuevo_total_r" name="nuevo_total_r" value="$ <?= $saldo_total_formateado ?>" readonly required>
                                        </div>
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="tasa_rendimiento_r" class="form-label text-muted">Tasa de Rendimiento</label>
                                            <input type="text" class="form-control" id="tasa_rendimiento_r" name="tasa_rendimiento_r" value="<?= $tasa_rendimiento_formateada ?>%" readonly required>
                                        </div>
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="idBanco_r" class="form-label">Bancos Cliente</label>
                                            <select class="form-select" id="idBanco_r" name="idBanco_r" required>
                                                <option>-- SELECCIONA BANCO --</option>
                                                <?php foreach ($bancos as $banco): ?>
                                                    <option value='<?= $banco['id_asignado'] ?>'><?= $banco['banco'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        
                                        <input type="hidden" class="form-control" id="fondo_r" name="fondo_r" value="<?= htmlspecialchars($_POST['fondo']) ?>" readonly required>
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="fecha_mov_sp" class="form-label">Fecha de Reinversión</label>
                                            <input type="date" class="form-control" id="fecha_mov_sp" name="fecha_mov_sp" required>
                                        </div>
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="fec_liquidacion" class="form-label text-muted">Fecha de Liquidación</label>
                                            <input type="date" class="form-control" id="fec_liquidacion_r" name="fec_liquidacion_r" readonly required>
                                        </div>
                                        
                                        <div class="col-12 col-md-4 mb-3">
                                            <label for="tipo_inversion" class="form-label text-muted">Inversión</label>
                                            <select class="form-select" id="tipo_inversion" name="tipo_inversion" required>
                                                <option>--- SELECCIONA OPCIÓN ---</option>
                                                <option value="1">Inversión con intereses</option>
                                                <option value="2">Solo Intereses</option>
                                                <option value="3">Inversión Inicial</option>
                                            </select>
                                        </div>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Reinvertir</button>
                </form>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

<script src="js/reitros.js"></script>
<script>
    function llenarCampos(idBanco) {
        // Buscar el banco seleccionado por su ID
        const bancoSeleccionado = bancosData.find(banco => banco.id_asignado === parseInt(idBanco));

        if (!bancoSeleccionado) {
            console.error('Banco no encontrado');
            return;
        }

        var moneda = bancoSeleccionado.tipo_moneda;
        var txtmoneda;

        if (moneda == '1') {
            txtmoneda = 'USD'; // Definir las monedas como strings
        } else {
            txtmoneda = 'MXN';
        }

        // Llenar los campos automáticamente
        document.getElementById('numeroCuenta').value = bancoSeleccionado.num_cta;
        document.getElementById('titularCuenta').value = bancoSeleccionado.nombre_cta;
        document.getElementById('clave_interbanc').value = bancoSeleccionado.clave_interbanc;
        document.getElementById('tipo_moneda').value = txtmoneda;
        // Agregar más campos según sea necesario



    }
</script>
<script>
    function confirmLiquidation() {
        Swal.fire({
            title: '¿Estás seguro de que deseas liquidar esta inversión?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, liquidar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Aquí puedes enviar el formulario de liquidación
                document.getElementById('formLiquidation').submit();
            }
        });
    }
</script>
<script>
 $(document).ready(function() {
    $('#fecha_mov_sp').on('change', function() {
        var fecha = $(this).val();
        if (fecha) {
            // Separar día, mes y año de la fecha seleccionada
            var partes = fecha.split('-');
            var anio = parseInt(partes[0]) + 1; // Sumar un año
            var mes = partes[1];
            var dia = partes[2];

            // Crear la nueva fecha con el año ajustado
            var fechaLiquidacion = `${anio}-${mes}-${dia}`;

            // Asignar la fecha calculada en el campo fec_liquidacion
            $('#fec_liquidacion_r').val(fechaLiquidacion);

            // AJAX para obtener el precio
            $.ajax({
                url: 'ajax/depositos/depositossp.ajax.php',
                type: 'POST',
                data: { fecha_mov_sp: fecha },
                success: function(data) {
                    console.log('Respuesta del servidor:', data);
                    try {
                        var response = JSON.parse(data);
                        console.log(response);

                        if (response.p_mercado !== null) {
                            $('#precioActual').val(response.p_mercado);
                        } else {
                            $('#precioActual').val('');
                            alert('No se encontró precio para la fecha seleccionada.');
                        }
                    } catch (e) {
                        console.error('Error parsing JSON:', e);
                    }
                },
                error: function() {
                    alert('Hubo un error al obtener el precio.');
                }
            });
        }
    });
});

document.querySelectorAll(".aplicarPago").forEach((button) => {
    button.addEventListener("click", function () {
        const idMov = this.dataset.id;
        const form = document.querySelector(`#formLiquidar_${idMov}`);
        const fechaPago = form.querySelector("input[name='fecha_pago']").value;
        const saldoBtc = form.querySelector("input[name='saldo_btc']").value;

        console.log(idMov, fechaPago, saldoBtc);

        // Enviar AJAX
        fetch("ajax/depositos/depositosbitcoin.ajax.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `id_mov_dbit=${idMov}&fecha_pago=${fechaPago}&accion=liquidar&saldo_btc=${saldoBtc}`, 
        })
            .then((response) => {
                if (!response.ok) {
                    return response.text().then((text) => { 
                        throw new Error(text || "Error desconocido del servidor.");
                    });
                }
                return response.json();
            })
            .then((data) => {
                if (data.success) {
                    Swal.fire({
                        icon: "success",
                        title: "¡Éxito!",
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false,
                    }).then(() => {
                        // Recargar la página después de la alerta
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "¡Error!",
                        text: data.message,
                    });
                }
            })
            .catch((error) => {
                console.error("Respuesta del servidor:", error.message);
        Swal.fire({
            icon: "error",
            title: "¡Error inesperado!",
            text: `Detalles del error: ${error.message}`,
                });
            });
    });
});





</script>
