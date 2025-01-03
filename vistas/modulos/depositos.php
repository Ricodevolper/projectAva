<div class="page-content-wrapper">
  <div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Dashboard</div>
    </div>

    <!-- Formulario de depósitos -->
    <div class="row">
      <div class="card col-8">
        <div class="card-body">
          <div class="border p-3 rounded">
            <h6 class="mb-0 text-uppercase">Depositos</h6>
            <hr>
            <form class="row g-3">
              <!-- Selección de fondo -->
              <div class="col-4">
                <label class="form-label">Fondo</label>
                <select class="form-select form-select-lg mb-3">
                  <option value=""></option>
                  <option value="">Event</option>
                  <option value="">Gub</option>
                  <option value="">Lq</option>
                  <option value="">Tiie</option>
                  <option value="">Cetes</option>
                </select>
              </div>

              <!-- Bancos Cliente -->
              <div class="col-4">
                <label class="form-label">Bancos Cliente</label>
                <select class="form-select form-select-lg mb-3">
                  <option value=""></option>
                  <option value="">Event</option>
                  <option value="">Gub</option>
                </select>
              </div>

              <!-- Número de Cuenta -->
              <div class="col-4">
                <label class="form-label">Número de Cuenta</label>
                <select class="form-select form-select-lg mb-3">
                  <option value=""></option>
                  <option value="">Event</option>
                  <option value="">Gub</option>
                </select>
              </div>

              <!-- Monto de Usd -->
              <div class="col-4">
                <label class="form-label">Monto de Usd</label>
                <div class="input-group">
                  <span class="input-group-text" id="basic-addon1">$</span>
                  <input type="text" class="form-control" aria-describedby="basic-addon1">
                </div>
              </div>

              <!-- Monto de Inversion -->
              <div class="col-4">
                <label class="form-label">Monto de Inversión</label>
                <input type="text" class="form-control">
              </div>

              <!-- Asesor -->
              <div class="col-4">
                <label class="form-label">Asesor</label>
                <input type="text" class="form-control">
              </div>

              <!-- Serie -->
              <div class="col-4">
                <label class="form-label">Serie</label>
                <input type="text" class="form-control">
              </div>

              <!-- Nombre Titular de la Cuenta -->
              <div class="col-4">
                <label class="form-label">Nombre Titular de la Cuenta</label>
                <input type="text" class="form-control">
              </div>

              <!-- Clabe -->
              <div class="col-4">
                <label class="form-label">Clabe</label>
                <input type="text" class="form-control">
              </div>

              <!-- Campo adicional -->
              <div class="col-4">
                <label class="form-label">$</label>
                <input type="text" class="form-control">
              </div>

              <!-- Porcentaje de Comisión -->
              <div class="col-4">
                <label class="form-label">Porcentaje de Comisión</label>
                <input type="text" class="form-control">
              </div>

              <!-- Títulos -->
              <div class="col-4">
                <label class="form-label">Títulos</label>
                <input type="text" class="form-control">
              </div>

              <!-- Número de Contrato -->
              <div class="col-4">
                <label class="form-label">Número de Contrato</label>
                <input type="text" class="form-control">
              </div>

              <!-- Botón de Enviar -->
              <div class="col-12">
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary float-end">Retirar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Notas -->
      <div class="card col-4">
        <div class="card-body">
          <h6 class="mb-0">Notas</h6>
          <hr>
          <p>Retiro mínimo: 2.3 USDT</p>
        </div>
      </div>
    </div>
  </div>
</div>
