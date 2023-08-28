<!-- CRUD -->

<!-- Modal Cierre Nuevo-->
<div class="modal fade" id="cierreNuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generar Cierre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form>
          <div class="container">
            <div class="row">
              <div class="col">

                <div class="form-group">
                  <label for="detail_fecha">Fecha</label>
                  <input type="date" class="form-control" id="generar_c_fecha" aria-describedby="detail_fechaHelp">
                  <small id="detail_fechaHelp" class="form-text text-muted">Fecha DD/MM/YYYY</small>
                </div>

                <div class="form-group">
                  <label for="detail_tipo">Tipo</label>
                  <select class="form-control" id="generar_c_tipo">
                    <option> - Opciones -</option>
                    <option value="compra"> Compra</option>
                  </select>
                  <small id="detail_tipoHelp" class="form-text text-muted">Tipo de transacción.</small>
                </div>

                <div class="form-group">
                  <label for="FormControlPeso">Peso</label>
                  <input type="text" class="form-control" id="generar_c_grs" aria-describedby="FormControlPesoHelp" placehBuscarolder="Peso en Grs">
                  <small id="FormControlPesoHelp" class="form-text text-muted" ho>Peso en Grs</small>
                </div>

                <div class="form-group">
                  <label for="FormControlPrecio">Precio</label>
                  <input type="text" class="form-control" id="generar_c_precio" aria-describedby="FormControlPrecio" placehBuscarolder="Precio">
                  <small id="FormControlPrecioHelp" class="form-text text-muted" ho>Precio</small>
                </div>

              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar Cierre</button>
        <button type="button" class="btn btn-primary" id="btnGenerarCierre">Generar Cierre</button>
      </div>

    </div>
  </div>
</div>
<!-- Modal Cierre Nuevo-->

<!-- Modal Cierre Modificar-->
<div class="modal fade" id="cierreModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Cierre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="lead">El CIERRE aolo puede ser modificado si Peso Original y Peso Actual es el mismo.</p>
            						
            <div>
                <h6 class="my-0">ID Cierre</h6>
                <input type="hidden" id="modificarCierreIdAdvance" value="">
                <small class="text-success" id="modificarCierreIdcierre"> -txt- </small>
            </div>
            <div>
                <h6 class="my-0">Fecha</h6>
                <small class="text-success" id="modificarCierreFecha"> -txt- </small>
            </div>
            <div>
                <h6 class="my-0">Tipo</h6>
                <small class="text-success" id="modificarCierreTipo"> -txt- </small>
            </div>
            <div>
                <h6 class="my-0">Status</h6>
                <small class="text-success" id="modificarCierreStatus"> -txt- </small>
            </div>
            <div>
                <h6 class="my-0">Precio</h6>
                <input type="text" class="form-control" id="modificarCierrePrecio" aria-describedby="emailHelp" value="" placeholder="">
            </div>
            <div>
                <h6 class="my-0">Peso Original</h6>
                <input type="text" class="form-control" id="modificarCierrePesoOri" aria-describedby="emailHelp" value="" placeholder="">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updateCierre">Actualizar Cierre</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Cierre Modificar-->

<!-- Modal Cierre Borrar-->
<div class="modal fade" id="cierreBorrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrar Cierre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="lead">El CIERRE aolo puede ser modificado si Peso Original y Peso Actual es el mismo.</p>
            						
            <div>
                <h6 class="my-0">ID Cierre</h6>
                <input type="hidden" id="borrarCierreIdAdvance" value="">
                <small class="text-success" id="borrarCierreIdcierre"> -txt- </small>
            </div>
            <div>
                <h6 class="my-0">Fecha</h6>
                <small class="text-success" id="borrarCierreFecha"> -txt- </small>
            </div>
            <div>
                <h6 class="my-0">Tipo</h6>
                <small class="text-success" id="borrarCierreTipo"> -txt- </small>
            </div>
            <div>
                <h6 class="my-0">Status</h6>
                <small class="text-success" id="borrarCierreStatus"> -txt- </small>
            </div>
            <div>
                <h6 class="my-0">Precio</h6>
                <small class="text-success" id="borrarCierrePrecio"> -txt- </small>
            </div>
            <div>
                <h6 class="my-0">Peso Original</h6>
                <small class="text-success" id="borrarCierrePesoOri"> -txt- </small>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="deleteCierre">Borrar Cierre</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Cierre Borrar-->