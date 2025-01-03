<?php
$id_cliente = filter_var($_POST['fk_cliente'], FILTER_SANITIZE_STRING); 
$fk_fondo =filter_var($_POST['fk_fondo'], FILTER_SANITIZE_STRING);

$status_rel =filter_var($_POST['status_rel'], FILTER_SANITIZE_STRING);

$validacionEvent = ControladorDepositos::ctrValidacionEvent($id_cliente,$fk_fondo,$status_rel);

$count = count($validacionEvent);

 if ($count != 0 ) {
    


?>


<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

      <!--start breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Depositos Event</div>
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
      <div class="container">
        <h2 class="mt-5">Depósito Fondo Garant del Cliente: <span class="text-primary">CADGRAFICS SA DE CV</span></h2>
        <form action="procesar_formulario.php" method="post" class="mt-4">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="fecha_solicitud" class="form-label">Fecha de Solicitud:</label>
                    <input type="date" class="form-control" id="fecha_solicitud" name="fecha_solicitud" value="2024-07-31">
                </div>
                <div class="col-md-4">
                    <label for="monto_total" class="form-label">Monto de Inversión Total:</label>
                    <input type="text" class="form-control" id="monto_total" name="monto_total" placeholder="MONTO TOTAL">
                </div>
                <div class="col-md-4">
                    <label for="tasa_total" class="form-label">Tasa total:</label>
                    <input type="text" class="form-control" id="tasa_total" name="tasa_total" placeholder="TASA TOTAL" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="plazo" class="form-label">Plazo:</label>
                    <select class="form-select" id="plazo" name="plazo">
                        <option selected>-- -- --</option>
                        <!-- Agrega opciones aquí -->
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="forma_pago" class="form-label">Forma de pago:</label>
                    <select class="form-select" id="forma_pago" name="forma_pago">
                        <option selected>-- -- --</option>
                        <!-- Agrega opciones aquí -->
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="tipo_moneda" class="form-label">Tipo de Moneda:</label>
                    <input type="text" class="form-control" id="tipo_moneda" name="tipo_moneda" value="MXN" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="bancos_cliente" class="form-label">Bancos Cliente:</label>
                    <select class="form-select" id="bancos_cliente" name="bancos_cliente">
                        <option selected>-- SELECCIONA FONDO --</option>
                        <!-- Agrega opciones aquí -->
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="num_contrato" class="form-label">Num. Contrato:</label>
                    <input type="text" class="form-control" id="num_contrato" name="num_contrato" value="76709099">
                </div>
                <div class="col-md-4">
                    <label for="tasa" class="form-label">Tasa:</label>
                    <input type="text" class="form-control" id="tasa" name="tasa" placeholder="%">
                </div>
            </div>
            <div class="mb-3">
                <label for="asesor" class="form-label">Asesor:</label>
                <input type="text" class="form-control" id="asesor" name="asesor" value="Ups! No hay datos que mostrar">
            </div>
            <div class="mb-3">
                <label class="form-label">Check:</label>
                <!-- Aquí va la tabla que aparece en tu imagen -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Check</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Cuota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" class="text-center">No hay datos que mostrar</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">Guardar</button>
                <button type="reset" class="btn btn-danger">Limpiar</button>
            </div>
        </form>
    </div>
<?php


    }else {
    echo '<script>
    Swal.fire({
        icon: "error",
        title: "Sin Asignación",
        text: "Este Cliente no tiene este producto Asignado",
        footer: "<a href=\'clientes\'>Ir a clientes</a>"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "clientes";
        }
    });
</script>';
}
    ?>