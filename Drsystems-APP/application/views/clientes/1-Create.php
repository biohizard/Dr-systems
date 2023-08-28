<!-- Modal NEW -->
<div class="modal fade " id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GoldenTradeValue - Cientes Nuevos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--
      /*
                'id_advance' => random_string('sha1', 20),
                'time'       => date("Y-m-d H:m:s"),
                'user'       => $_POST['user'],
                'permissions'=> $_POST['permissions'],
                'email'      => $_POST['email'],
                'password'   => password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost']),
                'firstname'  => $_POST['first'],
                'secondname' => $_POST['second'],
                'telefono'   => $_POST['tel'],
                'puesto'     => $_POST['puesto']
      */
      -->
        <form>       
          <div class="row">
            <div class="col-6">

              <h3>Razon Social</h3>

              <div class="form-group">
                <label for="exampleInputgiro">Giro Mercantil</label>
                <input type="text" class="form-control" id="exampleInputgiro1" aria-describedby="giroHelp">
                <small id="giroHelp" class="form-text text-muted">Giro Mercantil </small>
              </div>

              <div class="form-group">
                <label for="exampleInputRfc">RFC</label>
                <input type="text" class="form-control" id="exampleInputRfc1" aria-describedby="rfcHelp">
                <small id="rfcHelp" class="form-text text-muted">R.F.C.</small>
              </div>

              <div class="form-group">
                <label for="exampleInputFecha">Fecha de constitución</label>
                <input type="date" class="form-control" id="exampleInputFecha1" aria-describedby="fechaHelp">
                <small id="fechaHelp" class="form-text text-muted">Fecha de constitución</small>
              </div>

              <div class="form-group">
                <label for="exampleInputPais">Pais</label>
                <input type="text" class="form-control" id="exampleInputPais1" aria-describedby="paisHelp">
                <small id="paisHelp" class="form-text text-muted">Pais </small>
              </div>

            </div>
            <div class="col-6">
              <h3>Representante Legal</h3>
                <div class="form-group">
                  <label for="exampleInputNombre">Nombre (s)</label>
                  <input type="text" class="form-control" id="exampleInputNombre" aria-describedby="nombreHelp">
                  <small id="nombreHelp" class="form-text text-muted">Nombre (s) ejemplo Juan Carlos.</small>
                </div>

                <div class="form-group">
                  <label for="exampleInputApellido">Apellido</label>
                  <input type="text" class="form-control" id="exampleInputApellido" aria-describedby="apellidoHelp">
                  <small id="apellidoHelp" class="form-text text-muted">Apellido (s) ejemplo Hernandez Garcia.</small>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">Email ejemplo usuario@gmai.com recuerda el email se ocupará para recuperación del password.</small>
                </div>

                <div class="form-group">
                  <label for="exampleInputTelefono">Telefono</label>
                  <input type="text" class="form-control" id="exampleInputTelefono" aria-describedby="telefonoHelp">
                  <small id="telefonoHelp" class="form-text text-muted">Telefono ejemplo 55 1050 2040</small>
                </div>

                <div class="form-group">
                  <label for="exampleInputRfc">R.F.C</label>
                  <input type="text" class="form-control" id="exampleInputRfc" aria-describedby="rfcHelp">
                  <small id="rfcHelp" class="form-text text-muted">RFC</small>
                </diV>

                <div class="form-group">
                  <label for="exampleInputCurp">C.U.R.P</label>
                  <input type="text" class="form-control" id="exampleInputCurp" aria-describedby="curpHelp">
                  <small id="curpHelp" class="form-text text-muted">CURP</small>
                </diV>

                <div class="form-group">
                  <label for="exampleInputDireccion">Direccion</label>
                  <input type="text" class="form-control" id="exampleInputDireccion" aria-describedby="direccionHelp">
                  <small id="direccionHelp" class="form-text text-muted">Direccion</small>
                </diV>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-capitalize" data-dismiss="modal">cerrar ventana</button>
        <button type="button" class="btn btn-success   text-capitalize" id="b-nuew-user">guardar cliente</button>
      </div>
    </div>
  </div>
</div>