<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Compra de Metales</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <!-- CRUD -->
      <button type="button" class="btn btn-sm btn-outline-secondary" id="btnDetallesCierres" disabled>Detalles</button>
      <button type="button" class="btn btn-sm btn-outline-secondary" id="btnCierres" ><span class="oi oi-reload"></span></button>
    </div>
  </div>
</div>

<!-- Nav tabs -->
<div class="container">
    <div class="row">
        <div class="col-12">
       
            <!-- Tab panes -->
            <div class="tab-content mt-5">

                <!-- BEGIN: CIerres-->
                <div class="tab-pane active" id="cierres"    role="tabpanel" aria-labelledby="cierres-tab">
                    <h5>Cierres</h5>
                    <p class="lead">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID Cliente</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Saldo</th>
                                </tr>
                            </thead>
                            <tbody id="loadingMetales"></tbody>
                        </table>
                    </div>
                </div>
                <!-- End: CIerres-->         
                
            </div>

        </div>
    </div>
</div>