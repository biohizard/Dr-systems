<!-- BTNS -->

<!-- CREATE -->
  
  <!-- Modal Cierre-->
    <div class="modal fade" id="cierreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
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
                        </div>

                        <div class="col">

                            <div class="form-group">
                                <label for="detail_fecha">Fecha</label>
                                <input type="date" class="form-control" id="generar_c_fecha" aria-describedby="detail_fechaHelp">
                                <small id="detail_fechaHelp" class="form-text text-muted">Fecha DD/MM/YYYY</small>
                            </div>

                            <div class="form-group">
                                <label for="detail_tipo">Tipo</label>
                                <select class="form-control" id="generar_c_tipo">
                                    <option               > - Opciones -</option>
                                    <option value="compra">   Compra</option>
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
  <!-- Modal Cierre-->


  <!-- Modal Generar Entrega primero selecion un cierre para generar una entrega-->
  <div class="modal fade" id="entregaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
              <div class="col-5 offset-1">


                <div class="mb-3">
                  <label for="firstName">No. Ext</label>
                  <input type="text" class="form-control" id="input_nolext" placeholder="" value="0" required="">
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>

                <div class="mb-3">
                  <label for="firstName">Grs a/f</label>
                  <input type="text" class="form-control" id="input_grsaf" placeholder="" value="0" required="">
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>


                <div class="mb-3">
                  <label for="firstName">No Vale</label>
                  <input type="text" class="form-control" id="input_novale" placeholder="" value="0" required="" disabled>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>

              </div>

              <div class="col-5">

                  <div class="mb-3">
                    <label for="firstName">Barra</label>
                    <input type="text" class="form-control" id="input_barra" placeholder="" value="" required="">
                    <div class="invalid-feedback">Valid first name is required.</div>
                  </div>

                  <div class="mb-3">
                    <label for="firstName">Ley</label>
                    <input type="text" class="form-control" id="input_ley" placeholder="" value="" required="">
                    <div class="invalid-feedback">Valid first name is required.</div>
                  </div>

                  <div class="mb-3">
                    <label for="firstName">Fino</label>
                    <input type="text" class="form-control" id="input_fino" placeholder="" value="" required="" disabled data-toggle="tooltip" data-placement="top" title="barra*ley/24">
                    <div class="invalid-feedback">Valid first name is required.</div>
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

  <!-- Modal Cierres Simple-->
  <div class="modal fade" id="cierresModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Generar Cierres Simple</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form>
            
              <div class="container">
                  <div class="row">
                    
                    <div class="col">
                      <p>ENTREGAS <br/>Paso 1</p>
                      <div class="p-3 mb-2 bg-primary text-white font-weight-bolder text-center">
                      <p><span id="cierresTxt">00.00 Grs</span></p>
                      <input type="text" id="cierre_id_advance" disabled>
                      <input type="text" id="cierres_id_advance" disabled>
                      </div>
                      
                    </div>

                    <div class="col">
                      <p>CIERRE <br/>Paso 2</p>

                        <div class="d-none loading-origen-x spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>

                        <div class="loading-origen form-group">
                            <label for="detail_tipo">Origen</label>
                            <select class="form-control" id="cierres_origen">
                                <option value="null"   > - Opciones -</option>
                                <option value="cierre" > cierre</option>
                            </select>
                            <small id="detail_tipoHelp" class="form-text text-muted">Tipo de transacción.</small>
                        </div> 

                        <div class="loading-origen form-group"         id="cierresGrs">
                          <select class="form-control"  id="cierres_origen_grs">
                            <option value="null"   > - Opciones -</option>
                          </select>                        
                        </div> 

                    </div>

                    <div class="col">
                    <p>CIERRES <br/>Paso 3</p>

                      <div class="form-group">
                          <label for="FormControlPrecio">fino/pza</label>
                          <input type="text" class="form-control" id="generar_fino_pza" aria-describedby="FormControlPrecio" placehBuscarolder="Precio">
                          <small id="FormControlPrecioHelp" class="form-text text-muted">fino/pza</small>
                      </div>

                      <div class="form-group">
                          <label for="FormControlPrecio">Precio</label>
                          <input type="text" class="form-control" id="generar_precio" aria-describedby="FormControlPrecio" placehBuscarolder="Precio" disabled>
                          <small id="FormControlPrecioHelp" class="form-text text-muted">Precio</small>
                      </div>

                      <div class="form-group">
                          <label for="FormControlPrecio">importe</label>
                          <input type="text" class="form-control" id="generar_importe" aria-describedby="FormControlPrecio" placehBuscarolder="Precio" disabled>
                          <small id="FormControlPrecioHelp" class="form-text text-muted">importe</small>
                      </div>
                    </div>

                    <div class="col">
                    <p>PAGOS <br/>Paso 4</p>

                      <div class="form-group">
                          <label for="FormControlPrecio">pagos</label>
                          <input type="text" class="form-control" id="generar_pagos" aria-describedby="FormControlPrecio" placeholder="Pago">
                          <small id="FormControlPrecioHelp" class="form-text text-muted">pago</small>
                      </div>

                      <div class="form-group">
                        <select name="select" class="form-control" id="generar_TipoPago">
                          <option name="pago">pago</option>
                          <option name="anticipo">anticipo</option>
                          <option name="prestamo">prestamo</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="FormControlPrecio">observaciones</label>
                        <textarea class="form-control" id="generar_Observaciones" rows="3"></textarea>
                        <small class="form-text text-muted" id="FormControlPrecioHelp">observaciones</small>
                    </div>

                    </div>
                  </div>
              </div>

            </form>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar Cierre</button>
            <button type="button" class="btn btn-primary   " id="btnGenerarCierres">Generar Cierre</button>
          </div>
        </div>
      </div>
    </div>
  <!-- Modal Cierres-->

  <!-- Modal Cierres Simple-->
  <div class="modal fade" id="cierresMultipleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Generar Cierres Multiple</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form>
            
              <div class="container">
                  <div class="row">
                    
                    <div class="col">
                      <p>ENTREGAS <br/>Paso 1</p>
                      <div class="p-3 mb-2 bg-primary text-white font-weight-bolder text-center">
                      <p><span id="cierresMultipleTxt">00.00 Grs</span></p>
                      <input type="text" id="cierre_id_advance_mul" disabled>
                      <input type="text" id="cierres_id_advance_mul" disabled>
                      </div>
                      
                    </div>

                    <div class="col">
                      <p>CIERRE <br/>Paso 2</p>

                        <div class=" loading-origen-x-mul spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>

                        <div class="d-none loading-origen-mul form-group"         id="cierresGrs">
                          <select class="form-control"  id="cierres_origen_grs_mul">
                            <option value="null"   > - Opciones -</option>
                          </select>                        
                        </div> 

                    </div>

                    <div class="col">
                    <p>CIERRES <br/>Paso 3</p>

                      <div class="form-group">
                          <label for="FormControlPrecio">fino/pza</label>
                          <input type="text" class="form-control" id="generar_fino_pza" aria-describedby="FormControlPrecio" placehBuscarolder="Precio">
                          <small id="FormControlPrecioHelp" class="form-text text-muted">fino/pza</small>
                      </div>

                      <div class="form-group">
                          <label for="FormControlPrecio">Precio</label>
                          <input type="text" class="form-control" id="generar_precio" aria-describedby="FormControlPrecio" placehBuscarolder="Precio" disabled>
                          <small id="FormControlPrecioHelp" class="form-text text-muted">Precio</small>
                      </div>

                      <div class="form-group">
                          <label for="FormControlPrecio">importe</label>
                          <input type="text" class="form-control" id="generar_importe" aria-describedby="FormControlPrecio" placehBuscarolder="Precio" disabled>
                          <small id="FormControlPrecioHelp" class="form-text text-muted">importe</small>
                      </div>
                    </div>

                    <div class="col">
                    <p>PAGOS <br/>Paso 4</p>

                      <div class="form-group">
                          <label for="FormControlPrecio">pagos</label>
                          <input type="text" class="form-control" id="generar_pagos" aria-describedby="FormControlPrecio" placeholder="Pago">
                          <small id="FormControlPrecioHelp" class="form-text text-muted">pago</small>
                      </div>

                      <div class="form-group">
                        <select name="select" class="form-control" id="generar_TipoPago">
                          <option name="pago">pago</option>
                          <option name="anticipo">anticipo</option>
                          <option name="prestamo">prestamo</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="FormControlPrecio">observaciones</label>
                        <textarea class="form-control" id="generar_Observaciones" rows="3"></textarea>
                        <small class="form-text text-muted" id="FormControlPrecioHelp">observaciones</small>
                    </div>

                    </div>
                  </div>
              </div>

            </form>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar Cierre</button>
            <button type="button" class="btn btn-primary   " id="btnGenerarCierres">Generar Cierre</button>
          </div>
        </div>
      </div>
    </div>
  <!-- Modal Cierres-->

  <!-- Modal Pagos-->
    <div class="modal fade" id="pagosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Generar Pago</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>

          <div class="modal-body">
            <div class="container">
                <div class="row">

                  <div class="col">
                    <p></p>
                    total
                    pagos
                      tipo
                    saldo
                    observaciones

                    <div class="form-group">
                        <label for="FormControlPrecio">total</label>
                        <input type="text" class="form-control"         id="generarPagoTotal"   aria-describedby="FormControlPrecio" placehBuscarolder="Precio" value="0.00" disabled>
                        <small             class="form-text text-muted" id="FormControlPrecioHelp" >total</small>
                    </div>
                    <div class="form-group">
                        <label for="FormControlPrecio">pagos</label>
                        <input type="text" class="form-control"         id="generarPago"   aria-describedby="FormControlPrecio" placehBuscarolder="Precio">
                        <small             class="form-text text-muted" id="FormControlPrecioHelp" >pagos</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">tipo</label>
                      <select name="select" class="form-control" id="generarTipoPago">
                        <option name="pago"    >pago</option>
                        <option name="anticipo">anticipo</option>
                        <option name="prestamo">prestamo</option>
                      </select>
                      <small             class="form-text text-muted" id="FormControlPrecioHelp" >tipo de pago</small>
                    </div>                      
                    <div class="form-group">
                        <label for="FormControlPrecio">saldo</label>
                        <input type="text" class="form-control"         id="generarSaldo"   aria-describedby="FormControlPrecio" placehBuscarolder="Precio" disabled>
                        <small             class="form-text text-muted" id="FormControlPrecioHelp" >saldo</small>
                    </div>
                    <div class="form-group">
                        <label for="FormControlPrecio">observaciones</label>
                        <textarea class="form-control" id="generarObservaciones" rows="3"></textarea>
                        <small             class="form-text text-muted" id="FormControlPrecioHelp" >observaciones</small>
                    </div>                                            
                </div>

                </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
            <button type="button" class="btn btn-primary" id="btnGenerarPago">generar pago</button>
          </div>

        </div>
      </div>
    </div>
  <!-- Modal Pagos-->

<!-- CREATE -->