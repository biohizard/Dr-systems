<!-- Modal NEW -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GoldenTradeValue - Usuarios Nuevos</h5>
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
            <label for="exampleInputUsuario">Usuario</label>
            <input type="text" class="form-control" id="exampleInputUsuario" aria-describedby="usuarioHelp">
            <small id="usuarioHelp" class="form-text text-muted">Usuario min 8 caracteres Alfanumericos A-Z a-z 1-0.</small>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp">
            <small id="emailHelp" class="form-text text-muted">Password min 8 caracteres Alfanumericos A-Z a-z 1-0.</small>
          </div>

          <div class="form-group">
            <label for="exampleInputPermiso">Permiso</label>
            <select class="custom-select d-block w-100" required="" class="form-control" id="exampleInputPermiso" aria-describedby="permisoHelp">>
                <option value=""              class="text-uppercase">- Seleccionar -</option>
                <option value="administrador" class="text-uppercase">  administrador</option>
                <option value="supervisor"    class="text-uppercase">  supervisor</option>
                <option value="vendedor"      class="text-uppercase">  vendedor</option>
              </select>          
            <small id="permisoHelp" class="form-text text-muted">Permiso para el manejo del sistema.</small>
          </div>

          <div class="form-group">
            <label for="exampleInputPuesto">puesto de trabajo.</label>
            <input type="text" class="form-control" id="exampleInputPuesto" aria-describedby="puestoHelp">
            <small id="puestoHelp" class="form-text text-muted">Puesto de trabajo ejemplo vendedor, supervisor, mantenimiento.</small>
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
        </form>   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-capitalize" data-dismiss="modal">cerrar ventana</button>
        <button type="button" class="btn btn-success   text-capitalize"   id="b-nuew-user">guardar usuario</button>
      </div>
    </div>
  </div>
</div>
