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
              <li class="breadcrumb-item"><a href="inicio">
                  <ion-icon name="home-outline"></ion-icon>
                </a>
              </li>
              
            </ol>
          </nav>
        </div>
        
      </div>
     

      <form>
  <div class="container">
    <!-- Título -->
    <h3>Deposito Fondo TIIE del Cliente: <a href="#"></a></h3>

    <!-- Primera fila -->
    <div class="row">
      <div class="col-md-4">
        <label for="fechaSolicitud">Fecha de Solicitud</label>
        <input type="date" class="form-control" id="fechaSolicitud" name="fechaSolicitud" value="">
      </div>
      <div class="col-md-4">
        <label for="plazo">Plazo</label>
        <select class="form-control" id="plazo" name="plazo">
          <option value="">--Elige Plazo--</option>
          <option value="7">7 dias</option>
          <option value="28">28 dias</option>
          <option value="60">60 dias</option>
          <option value="91">91 dias</option>
          <option value="182">182 dias</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="tipoInversion">Tipo de Inversión</label>
        <select class="form-control" id="tipoInversion" name="tipoInversion">
          <option value="">-- -- --</option>
          <option value="cetes">CETES</option>
          <option value="tiie">TIIE</option>
        </select>
      </div>
    </div>

    <!-- Segunda fila -->
    <div class="row mt-3">
      <div class="col-md-4">
        <label for="tipoTasa">Tipo de Tasa</label>
        <select class="form-control" id="tipoTasa" name="tipoTasa">
          <option value="">--Elige Tasa--</option>
          <option value="7">7 dias</option>
          <option value="28">28 dias</option>
          <option value="60">60 dias</option>
          <option value="91">91 dias</option>
          <option value="182">182 dias</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="tipoMoneda">Tipo de Moneda</label>
        <select class="form-control" id="tipoMoneda" name="tipoMoneda">
          <option value="">Elige Moneda</option>
          <option value="MXN">MXN</option>
          <option value="USD">USD</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="formaPago">Forma de pago</label>
        <select class="form-control" id="formaPago" name="formaPago">
          <option value="">-- -- --</option>
          <option value="dias">Dias</option>
          <option value="mensual">Mensual</option>
          <option value="finPlazo">Fin de Plazo</option>
        </select>
      </div>
    </div>

    <!-- Tercera fila -->
    <div class="row mt-3">
      <div class="col-md-4">
        <label for="montoInversion">Monto de Inversión Total</label>
        <input type="text" class="form-control" id="montoInversion" name="montoInversion" placeholder="MONTO TOTAL">
      </div>
      <div class="col-md-4">
        <label for="cupon">Cupón</label>
        <input type="text" class="form-control" id="cupon" name="cupon">
      </div>
      <div class="col-md-4">
    <label for="tasaBanxico">Tasa Banxico</label>
    <div class="input-group">
        <input type="text" class="form-control" id="tasaBanxico" name="tasaBanxico"  readonly>
        <div class="input-group-append">
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-black me-lg-5 "></span>
     
            <span   class="  input-group-text" >%</button>
               </div>
    </div>
</div>

    </div>

    <!-- Cuarta fila -->
    <div class="row mt-3">
      <div class="col-md-4">
        <label for="tasaMaxima">Tasa Maxima</label>
        <input type="text" class="form-control" id="tasaMaxima" name="tasaMaxima">
      </div>
      <div class="col-md-4">
        <label for="tipoCambioMinimo">Tipo de cambio Minimo</label>
        <input type="text" class="form-control" id="tipoCambioMinimo" name="tipoCambioMinimo" value="">
      </div>
      <div class="col-md-4">
        <label for="tipoCambioMaximo">Tipo de cambio Máximo</label>
        <input type="text" class="form-control" id="tipoCambioMaximo" name="tipoCambioMaximo" value="">
      </div>
    </div>

    <!-- Quinta fila -->
    <div class="row mt-3">
      <div class="col-md-4">
        <label for="tipoCambioBanxico">Tipo de cambio BANXICO</label>
        <input type="text" class="form-control" id="tipoCambioBanxico" name="tipoCambioBanxico" placeholder="MAXIMO">
      </div>
      <div class="col-md-4">
        <label for="bancosCliente">Bancos Cliente</label>
        <select class="form-control" id="bancosCliente" name="bancosCliente">
          <option value="">-- SELECCIONA FONDO --</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="numContrato">Num. Contrato</label>
        <input type="text" class="form-control" id="numContrato" name="numContrato" value="">
      </div>
    </div>

    <!-- Sexta fila -->
    <div class="row mt-3">
      <div class="col-md-4">
        <label for="asesor">Asesor</label>
        <input type="text" class="form-control" id="asesor" name="asesor" value="">
      </div>
    </div>

    <!-- Botones -->
    <div class="row mt-4">
      <div class="col-md-12 text-right">
        <button type="button" class="btn btn-danger" id="limpiar" name="limpiar">Limpiar</button>
        <button type="submit" class="btn btn-primary" id="guardar" name="guardar">Guardar</button>
      </div>
    </div>
  </div>
</form>
<script src="js/depositos.js"></script>