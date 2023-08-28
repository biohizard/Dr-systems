      
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Caja</h1>
        
        <div class="btn-toolbar mb-2 mb-md-0">

          <div class="btn-group mr-2">
          <!-- CRUD -->
            <button type="button" class="btn btn-sm btn-outline-secondary" id="btnNewEntradaSalida" data-toggle="modal" data-target="#saldoinicialModal" >Nuevo</button>
            <button type="button" class="btn btn-sm btn-outline-secondary" id="saldoinicial-create" data-toggle="modal" data-target="#saldoinicialModal"  style="display: none;">Saldo Inicial</button>
            <input  type="month"  class=""                                 id="start"               name="start" min="2020-01" value="<?php echo date("Y-m"); ?>">
            <button type="button" class="btn btn-sm btn-outline-secondary" id="reloadCaja"><span class="oi oi-reload"></span></button>
            

            
          </div>
          
        </div>

      </div>

      <div class="col-10 offset-1 text-right py-3">
      <button type="button" class="btn btn-primary" id="btnCancelar">Cancelar</button>
      <button type="button" class="btn btn-success" id="btnResumen">Resumen</button>
        <!-- Large modal -->
        <!-- 
        <button type="button" class="btn btn-primary" id="user-resume" data-toggle="modal" data-target=".bd-example-modal-lg" disabled>Resumen</button>
        <button type="button" class="btn btn-success d-none" id="ticket-print" data-toggle="modal" data-target=".bd-example-modal-lg">Ticket</button>
    -->
        
        <input type="hidden" id="saldoinicial" placeholder="Saldo Inicial"            value="" disabled>
        <input type="hidden" id="saldofinal"   placeholder="Saldo Final"              value="" disabled>
        <input type="hidden" id="ultimafecha"  placeholder="Ultima Fecha de Registro" value="" disabled>

      </div>

  <!-- Modal Resumen -->
  <div class="modal fade" id="resumenModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">GoldenTradeValue - Resumen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form>
              <div class="container">
                <div class="row">
                  <p id="cr_id_advance" class="d-none">ID ADVANCE</p>

                  <!-- col 1 --->
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   <!-- Id:-->
                   <div class="form-group">                       
                        <p>Id: <code class="highlighter-rouge"><strong id="crId" >list-style</strong></code></p>                        
                    </div>
                    <!-- Id:-->                    
                  </div>
                  <!-- col 1 --->

                  <!-- col 1 --->
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <!-- Fecha:-->
                    <div class="form-group">
                      <p>Generado por: <code class="highlighter-rouge"><strong id="crGeneradoNombre" >list-style</strong></code></p>    
                    </div>
                    <!-- Fecha:-->
                  </div>
                  <!-- col 1 --->

                  <!-- col 1 --->
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <!-- Fecha:-->
                    <div class="form-group">
                      <p>Fecha de generacion: <code class="highlighter-rouge"><strong id="crGeneradoFecha" >list-style</strong></code></p>    
                    </div>
                    <!-- Fecha:-->
                  </div>
                  <!-- col 1 --->

                  

                  <hr>
                  <!-- col 1 --->
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <!-- Fecha:-->
                    <div class="form-group">
                      <p>Fecha: <code class="highlighter-rouge"><strong id="crFecha" >list-style</strong></code></p>    
                    </div>
                    <!-- Fecha:-->

                    <!-- Nombre:-->
                    <div class="form-group">
                      <p>Nombre: <code class="highlighter-rouge"><strong id="crNombre" >list-style</strong></code></p>                          
                    </div>
                    <!-- Nombre:-->

                    <div class="form-group">
                      <p>Notas: <code class="highlighter-rouge"><strong id="crNotas" >list-style</strong></code></p>    
                    </div>

                  </div>
                  <!-- col 1 --->

                  <!-- col 2 --->
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <!-- Concepto:-->
                    <div class="form-group">
                      <p>Concepto: <code class="highlighter-rouge"><strong id="crConcepto">list-style</strong></code></p>    
                    </div>
                    <!-- Concepto:-->

                    <!-- Tipo:-->
                    <div class="form-group">
                      <p>Tipo: <code class="highlighter-rouge"><strong id="crTipo">list-style</strong></code></p>    
                    </div>
                    <!-- Tipo:-->

                    <!-- Momento:-->
                    <div class="form-group">
                      <p>Montos: <code class="highlighter-rouge"><strong id="crMonto">list-style</strong></code></p>    
                    </div>
                    <!-- Momento:-->

                  </div>
                  <!-- col 2 --->

              </div>
              </div>
            </form>
          </div>

        <div class="modal-footer">
          <button id="cajaCerrar" class="btn btn-secondary text-capitalize" type="button"  data-dismiss="modal" >cerrar ventana</button>
        </div>

        </div>
    </div>
  </div>
  <!-- Modal Resumen--->
      