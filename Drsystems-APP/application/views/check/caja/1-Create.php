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

<!-- Modal NEW - Saldo Inicial -->
<div class="modal fade " id="saldoinicialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GoldenTradeValue - Saldo Inicial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form>
          <div class="container">
            <div class="row">

              <div class="col-12">
                <!-- Saldo Tota:-->
                <p class="font-weight-light text-right">Saldo Total Actual: <span id="nuevoTotal">Loading</span></p>
                <input type="hidden" id="saldoActualinput">
                <input type="hidden" id="idOperacion">
                <!-- Saldo Tota:-->
              </div>

              <!-- col 1 --->
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                <!-- Fecha:-->
                <div class="form-group">
                  <label for="exampleInputMonto">Fecha</label>
                  <input type="date" class="form-control" id="caja-nuevoFecha" placeholder="dd/mm/aaaa" disabled>
                  <small id="fechaHelp" class="form-text text-muted">Fecha</small>
                </div>
                <!-- Fecha:-->

                <!-- Nombre:-->
                <div class="form-group">
                  <label for="exampleInputNombre">Nombre</label>
                  <div class="input-group input-medium " style="float: right; padding-top: 3px; ">
                    <input type="search" id="buscador" class="form-control text-lowercase" name="q" val="" placeholder="Buscar Usuario, Clientes o Provedores..." autocomplete="off">
                  </div>
                  <input type="hidden" id="result" class="" name="" val="" disabled>
                  <small id="nombreHelp" class="form-text text-muted">Nombre</small>
                </div>
                <!-- Nombre:-->

                <div class="form-group">
                  <label for="exampleInputNotas">Notas</label>
                  <textarea class="form-control" id="caja-notas" aria-describedby="notasHelp" placeholder="Notas de la transacción"></textarea>
                  <small id="notasHelp" class="form-text text-muted">Notas</small>
                </div>

              </div>
              <!-- col 1 --->

              <!-- col 2 --->
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                <!-- Concepto:-->
                <div class="form-group">
                  <label for="exampleInputConcepto">Concepto</label>
                  <textarea class="form-control" id="caja-concepto" aria-describedby="conceptoHelp" placeholder="Concepto Compra, Venta, Comisión"></textarea>
                  <small id="conceptoHelp" class="form-text text-muted">Concepto</small>
                </div>
                <!-- Concepto:-->

                <!-- Tipo:-->
                <div class="form-group">
                  <label for="exampleInputRfc">Tipo</label>
                  <select id="caja-tipo" name="tipo" aria-describedby="tipoHelp" class="form-control">
                  <option value="null">- Opciones -</option>
                  </select>
                </div>
                <!-- Tipo:-->

                <!-- Momento:-->
                <div class="form-group">
                  <label for="exampleInputMonto">Monto</label>
                  <input type="text" class="form-control" id="caja-monto" aria-describedby="montoHelp" placeholder="Monto $00.00">
                  <small id="montoHelp" class="form-text text-muted">Monto</small>
                </div>
                <!-- Momento:-->

                <!-- Opcional Folio:-->
                <div class="form-group">
                  <label for="exampleInputFolio">Folio</label>
                  <input type="text" class="form-control" id="caja-folio" aria-describedby="folioHelp" placeholder="Folio Compra, Venta.">
                  <small id="folioHelp" class="form-text text-muted">Folio</small>
                </div>
                <!-- Opcional Folio:-->

              </div>
              <!-- col 2 --->

          </div>
      </div>
      </form>
    </div>

    <div class="modal-footer">
      <button id="cajaCerrar" class="btn btn-secondary text-capitalize" type="button"  data-dismiss="modal" >cerrar ventana</button>
      <button id="b-new-caja" class="btn btn-success   text-capitalize" type="button"  disabled>guardar</button>
    </div>

  </div>
</div>
</div>
<!-- Modal NEW  Saldo Inicial --->
