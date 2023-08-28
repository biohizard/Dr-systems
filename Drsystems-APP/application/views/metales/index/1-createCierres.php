<div class="modal" id="cierreNuevoModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cierre Nuevo</h5>
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
                        <label for="FormControlCliente">Buscar Cliente</label>
                        <input type="text" class="form-control" id="FormControlCliente" aria-describedby="FormControlClienteHelp" placehBuscarolder="Buscar Cliente">
                        <input type="hidden" id="detail_id_advance">
                        <small id="FormControlClienteHelp" class="form-text text-muted" ho>Buscar Cliente</small>
                    </div>

                    <div class="form-group">
                        <label for="detail_fecha">Fecha</label>
                        <input type="date" class="form-control" id="detail_fecha" aria-describedby="detail_fechaHelp">
                        <small id="detail_fechaHelp" class="form-text text-muted">Fecha DD/MM/YYYY</small>
                    </div>

                    </div>
                    <div class="col">

                        <div class="form-group">
                            <label for="detail_tipo">Tipo</label>
                            <select class="form-control" id="detail_tipo">
                                <option               > - Opciones -</option>
                                <option value="compra">   Compra</option>
                            </select>
                            <small id="detail_tipoHelp" class="form-text text-muted">Tipo de transacción.</small>
                        </div> 

                        <div class="form-group">
                            <label for="detail_tipo">Metal</label>
                            <select class="form-control" id="detail_metal">
                                <option               >- Opciones -</option>
                                <option value="compra">  Oro</option>
                            </select>
                            <small id="detail_tipoHelp" class="form-text text-muted">Tipo de metal.</small>
                        </div> 

                        <div class="form-group">
                            <label for="FormControlPeso">Peso</label>
                            <input type="text" class="form-control" id="detail_grs" aria-describedby="FormControlPesoHelp" placehBuscarolder="Peso en Grs">
                            <small id="FormControlPesoHelp" class="form-text text-muted" ho>Peso en Grs</small>
                        </div>

                        <div class="form-group">
                            <label for="FormControlPrecio">Precio</label>
                            <input type="text" class="form-control" id="detail_precio" aria-describedby="FormControlPrecio" placehBuscarolder="Precio">
                            <small id="FormControlPrecioHelp" class="form-text text-muted" ho>Precio</small>
                        </div>

                    </div>
                </div>
            </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cirresModalclosed">Cerrar</button>
        <button type="button" class="btn btn-primary"                        id="cirresModalSave">Generar Cierre </button>
      </div>
    </div>
  </div>
</div>

<style>
  .ui-helper-hidden-accessible {
    display: none
  }

  .ui-front {
    background-color: #fff;
    width: 250px;
    align-content: left;
  }

  .ui-menu-item {
    list-style-type: none;
  }

  .ul.ui-autocomplete.ui-menu {
    z-index: 10000;
    position: relative;
  }

  #ui-id-1 {
    z-index: 10000;
    text-transform: capitalize;
  }
</style>