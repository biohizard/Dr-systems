<div id="sMesalert" class="alert alert-warning" role="alert" style="display: none;"><span class="text-primary font-weight-bold">Golden Trade Value</span> – Hasta el momento no existe un <span class="text-danger font-weight-normal text-uppercase">saldo inicial</span> para este mes.</div>
<div id="rMesalert" class="alert alert-warning" role="alert" style="display: none;"><span class="text-primary font-weight-bold">Golden Trade Value</span> – Hasta el momento no existe <span class="text-danger font-weight-normal text-uppercase">registro en la caja</span> para este mes..</div>


<!-- Modal NEW -->
<div id="rMestabla" class="table-responsive" style="display: none;">
  <h4>Entradas /  Salidas</h4>
  <table class="table table-hover p-1 ">
    <thead class="thead-dark">
      <tr class="text-center">
        <th scope="col text-capitalize">#</th>
        <th scope="col text-capitalize">No</th>
        <th scope="col text-capitalize">Fecha</th>
        <th scope="col text-capitalize">Nombre</th>
        
        <th scope="col text-capitalize">Tipo</th>
        <th scope="col text-capitalize">Concepto</th>

        <th scope="col text-capitalize">Entrada</th>
        <th scope="col text-capitalize">Salida</th>
        <th scope="col text-capitalize">Saldo</th>
      </tr>
    </thead>
    <tbody id="allCaja" class="text-right ">
      <tr>
        <th scope="row">
          demo 0
        </th>
        <td>
          demo
        </td>
      </tr>

    </tbody>
  </table>
</div>



<!-- Modal NEW -->
<div id="rCancelados" class="table-responsive  pt-5 " style="display: none;">
  <h4>Cancelados</h4>
  <table class="table table-hover p-1 ">
    <thead class="thead-dark">
      <tr class="text-center">
        <th scope="col text-capitalize">#</th>
        <th scope="col text-capitalize">No</th>
        <th scope="col text-capitalize">Fecha</th>
        <th scope="col text-capitalize">Nombre</th>
        
        <th scope="col text-capitalize">Tipo</th>
        <th scope="col text-capitalize">Concepto</th>

        <th scope="col text-capitalize">Entrada</th>
        <th scope="col text-capitalize">Salida</th>
        <th scope="col text-capitalize">Saldo</th>
      </tr>
    </thead>
    <tbody id="allCancelados" class="text-right ">
      <tr>
        <th scope="row">demo 0</th>
        <td>demo</td>
      </tr>

    </tbody>
  </table>
</div>

<div class="col-2 py-3">

  <table class="table">
    <thead class="text-center"><tr><th scope="col">Contenido</th></tr></thead>
      <tbody class="text-center"> 
        <tr >
          <th scope="row" class="table-info"   >Inicial<br/>0 / 1 </th>
          <th scope="row" class="table-success">Entrada<br/>+</th>
          <th scope="row" class="table-warning">Salida<br/>-</th>
          <th scope="row" class="table-danger" >Cancelado<br/>x</th>
          <th scope="row" class="table-primary">Total<br/>=</th>
        </tr>
      </tbody>
    </table>

</div>      


<div class="container bg-light mt-5 d-none" id="Ticket">
  <div class="row">
    <div class="col-4">

      <div class="row">

        <div class="col-12">
          <p>################################################</p>
        </div>
        <div class="col-12 text-center">
          <p>GOLDEN TRADE VALUE</p>
        </div>
        <div class="col-12 text-center">Fecha de la transaccion <span id="fechaTran">0000-00-00 00:00</span></div>
        <div class="col-12">
          <p>************************************************</p>
        </div>

        <div class="col-6 text-left">Fecha : </div>
        <div class="col-6 text-right text-uppercase" id="ticketFecha"> 0000-00-00</div>
        <div class="col-6 text-left">Nombre: </div>
        <div class="col-6 text-right text-uppercase" id="ticketNombre"> 0</div>
        <div class="col-6 text-left">Concepto: </div>
        <div class="col-6 text-right text-uppercase" id="ticketConcepto"> 0</div>
        <div class="col-6 text-left">Tipo: </div>
        <div class="col-6 text-right text-uppercase" id="ticketTipo"> 0</div>
        <div class="col-6 text-left">Monto: </div>
        <div class="col-6 text-right text-uppercase" id="ticketMonto"> $0</div>


        <div class="col-12">
          <p>################################################</p>
        </div>
      </div>


    </div>
  </div>
</div>