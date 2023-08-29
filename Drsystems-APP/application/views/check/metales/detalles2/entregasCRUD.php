  <!-- Modal Generar Entrega primero selecion un cierre para generar una entrega-->
  <div class="modal fade" id="entregasNueva" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Generar Entrega...</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" id="cierreEntrega" class="" disabled hidden>

          <!-- entregas -->
          <div class="row bg-white">

            <div class="col-10 offset-1">
                <div class="mb-3"><label for="firstName">No Vale: <span id="input_novale">000</span></label></div>

                <div class="mb-3">
                    <label for="firstName">No. Ext</label>
                    <input type="text" class="form-control" id="input_nolext" placeholder="000">
                    <div class="invalid-feedback">Valid first name is required.</div>
                </div>

                <div class="mb-3">
                    <label for="firstName">Grs a/f</label>
                    <input type="text" class="form-control" id="input_grsaf" placeholder="00.00 grs">
                    <div class="invalid-feedback">Valid first name is required.</div>
                </div>

                <div class="mb-3">
                    <label for="firstName">Barra</label>
                    <input type="text" class="form-control" id="input_barra" placeholder="00.00 grs">
                    <div class="invalid-feedback">Valid first name is required.</div>
                </div>

                <div class="mb-3">
                    <label for="firstName">Ley</label>
                    <input type="text" class="form-control" id="input_ley" placeholder="00 Kt">
                    <div class="invalid-feedback">Valid first name is required.</div>
                </div>

                <div class="mb-3">
                    <label for="firstName">Fino <span id="input_fino" >00.00 grs </span></label>
                    <div class="invalid-feedback">barra*ley/24</div>
                </div>

            </div>

          </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar Entrega</button>
          <button type="button" class="btn btn-primary" id="btnGenerarEntrega">Generar Entrega</button>
        </div>
      </div>
    </div>
  </div>