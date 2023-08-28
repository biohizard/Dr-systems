<!-- Modal NEW -->
<div class="modal fade " id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title  text-capitalize" id="updateModalLabel"><?PHP echo GTV; ?> - usuarios actualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="row">

          <div class="col-6">
            <div class="form-group">
              <label for="updateInputNombre">Nombre (s)</label>
              <input type="text" class="form-control" id="updateInputNombre" aria-describedby="nombreHelp">
              <small id="nombreHelp" class="form-text text-muted">Nombre (s) ejemplo Juan Carlos.</small>
            </div>

            <div class="form-group">
              <label for="updateInputApellido">Apellido</label>
              <input type="text" class="form-control" id="updateInputApellido" aria-describedby="apellidoHelp">
              <small id="apellidoHelp" class="form-text text-muted">Apellido (s) ejemplo Hernandez Garcia.</small>
            </div>

            <div class="form-group">
              <label for="updateInputPuesto">puesto de trabajo.</label>
              <input type="text" class="form-control" id="updateInputPuesto" aria-describedby="puestoHelp">
              <small id="puestoHelp" class="form-text text-muted">Puesto de trabajo ejemplo vendedor, supervisor, mantenimiento.</small>
            </div>

            <div class="form-group">
              <label for="updateInputTelefono">Telefono</label>
              <input type="text" class="form-control" id="updateInputTelefono" aria-describedby="telefonoHelp">
              <small id="telefonoHelp" class="form-text text-muted">Telefono ejemplo 55 1050 2040</small>
            </div> 
          </div>

          <div class="col-6">
            <div class="form-group">
              <label for="updateInputUsuario">Usuario</label>
              <input type="text" class="form-control" id="updateInputUsuario" aria-describedby="usuarioHelp">
              <small id="usuarioHelp" class="form-text text-muted">Usuario min 8 caracteres Alfanumericos A-Z a-z 1-0.</small>
            </div>

            <div class="form-group">
              <label for="updateInputPassword">Password</label>
              <input type="password" class="form-control" id="updateInputPassword" aria-describedby="passwordHelp">
              <small id="passwordHelp" class="form-text text-muted">Password min 8 caracteres Alfanumericos A-Z a-z 1-0.</small>
            </div>

            <div class="form-group">
              <label for="updateInputPermiso">Permiso</label>
              <select class="custom-select d-block w-100" required="" class="form-control" id="updateInputPermiso" aria-describedby="permisoHelp">>
                <option value="null"              class="text-uppercase">- Seleccionar -</option>
                <option value="vendedor"      class="text-uppercase">  vendedor</option>
                <option value="supervisor"    class="text-uppercase">  supervisor</option>
                <option value="mantenimiento" class="text-uppercase">  mantenimiento</option>
                </select>          
              <small id="permisoHelp" class="form-text text-muted">Permiso para el manejo del sistema.</small>
            </div>

            <div class="form-group">
              <label for="updateInputEmail">Email</label>
              <input type="email" class="form-control" id="updateInputEmail" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">Email ejemplo usuario@gmai.com recuerda el email se ocupará para recuperación del password.</small>
            </div>   
           
          </div>     

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-capitalize" data-dismiss="modal">cerrar ventana</button>
        <button type="button" class="btn btn-success   text-capitalize"     id="btnUpdateUser">guardar usuario</button>
      </div>

    </div>
  </div>
</div>
