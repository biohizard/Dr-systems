<!-- Nav tabs -->
<!-- READE -->
    <div class="container">
        <div class="row">

            <div class="col-12">

                <ul class="nav nav-tabs text-capitalize" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="cierres-tab" data-toggle="tab" href="#cierres" role="tab" aria-controls=cierres" aria-selected="true">cierre</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="entregas-tab" data-toggle="tab" href="#entregas" role="tab" aria-controls="entregas" aria-selected="false">entregas</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="cierres2-tab" data-toggle="tab" href="#cierres2" role="tab" aria-controls="cierres2" aria-selected="false">cierres</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pagos-tab" data-toggle="tab" href="#pagos" role="tab" aria-controls="pagos" aria-selected="false">pagos</a>
                    </li>
                </ul>
            
                <!-- Tab panes -->
                <div class="tab-content mt-5">

                    <!-- BEGIN: CIerres-->
                    <div class="tab-pane active" id="cierres"    role="tabpanel" aria-labelledby="cierres-tab">
                        <h5>Cierres</h5>
                        <p class="lead">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID Cierre</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Peso Original</th>
                                        <th scope="col">Peso Actual</th>
                                    </tr>
                                </thead>
                                <tbody id="loadingMetalesCierre"></tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End: CIerres-->         

                    <!-- BEGIN: Entregas-->
                    <div class="tab-pane"        id="entregas"   role="tabpanel" aria-labelledby="entregas-tab">
                        
                        <h5>Entregas</h5>
                        <p class="lead">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
                        
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID Cierre</th>                                  
                                        <th scope="col">Fecha</th>
                                        <th scope="col">n° Vale</th>

                                        <th scope="col">No. Ext</th>
                                        <th scope="col">Grs A/F</th>
                                        <th scope="col">Barra</th>
                                        <th scope="col">Ley</th>
                                        <th scope="col">Fino Original</th> 
                                        <th scope="col">Fino Actual</th> 
                                    </tr>
                                </thead>
                                <tbody id="loadingMetalesEntregas"></tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End: Entregas-->   

                    <!-- BEGIN: Cierres2-->
                    <div class="tab-pane" id="cierres2"    role="tabpanel" aria-labelledby="cierres2-tab">
                        <h5>Cierres Dos</h5>
                        <p class="lead">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
                        
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID Cierre</th>
                                        <th scope="col">Fecha</th>

                                        <th scope="col">Fino / Pza</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Importe</th>
                                    </tr>
                                </thead>
                                <tbody id="loadingMetalesCierresdos"></tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End: Cierres 2-->                        

                    <!-- BEGIN: Cierres2-->
                    <div class="tab-pane" id="pagos"    role="tabpanel" aria-labelledby="pagos-tab">
                        <h5>Cierres Dos</h5>
                        <p class="lead">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
                        
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID Cierre</th>sss
                                        <th scope="col">Fecha</th>

                                        <th scope="col">Total</th>
                                        <th scope="col">Pagos</th>
                                        <th scope="col">Saldo</th>
                                        <th scope="col">Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody id="loadingMetalesPagos"></tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End: Cierres 2-->     
                </div>

            </div>


        </div>
    </div>
<!-- READE -->