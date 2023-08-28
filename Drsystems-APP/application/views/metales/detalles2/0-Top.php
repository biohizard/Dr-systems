<div class="row">
  
  <div class="col-12">
    <h2 class="text-capitalize">cierres</h2>
  </div>
  
  <div class="col-12 text-right">
    <h6>
      <span class="text-capitalize font-weight-lighter"><ins><span id="xhrCliente">cliente</span></ins></span>
      <span id="xhrSaldotxt" class="text-capitalize font-weight-bold    ">$<span id="xhrSaldo">saldo</span></span>
      <input type="hidden" value="<?php echo $_GET['id'];?>" id="id_advance_x" disabled>
    </h6>
  </div>    
    
  <div class="col-4 offset-8">

      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        <div class="btn-group" role="group">
          <button id="btnMenuCierre"          class="btn btn-primary text-capitalize dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">cierre</button>
            <div id=""                        class="dropdown-menu"                                   aria-labelledby="btnMenuCierre">
              <a id="btnModalCierreNuevo"     class="dropdown-item text-capitalize"                   data-toggle="modal" data-target="#cierreNuevo"    >nuevo</a>
              <a id="btnModalCierreModificar" class="dropdown-item text-capitalize disabled"          data-toggle="modal" data-target="#cierreModificar">modificar</a>
              <a id="btnModalCierreBorrar"    class="dropdown-item text-capitalize disabled"          data-toggle="modal" data-target="#cierreBorrar"   >borrar</a>
              
              <a id="btnModalCierreAbiertos" class="dropdown-item text-capitalize">abierto</a>
              <a id="btnModalCierreCerrados" class="dropdown-item text-capitalize">cerrado</a>
            </div>
            <button id="btnMenuEntregas"     class="btn btn-primary" type="button"  data-toggle="modal" data-target="#entregasNueva">entregas</button>
            <button id="btnMenuRefresh"      class="btn btn-success  text-capitalize"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/><path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/></svg></button>
        </div>

      </div>

  </div>


</div>

<div cass="col-12 text-left  pt-3 pb-2 mb-3 ">
<!--<h3>Norma Hernandez</h3>-->
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
      