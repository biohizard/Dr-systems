<!-- Modal UPDATE -->
<div class="modal fade " id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GoldenTradeValue - Usuarios Actualizar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
            <label for="updateInputNombre">Nombre</label>
            <input type="text" class="form-control" id="updateInputNombre" aria-describedby="updatenombreHelp">
            <small id="updatenombreHelp" class="form-text text-muted">Nombre (s) ejemplo Juan Carlos.</small>
          </div>

          <div class="form-group">
            <label for="updateInputApellido">Apellido</label>
            <input type="text" class="form-control" id="updateInputApellido" aria-describedby="updateapellidoHelp">
            <small id="updateapellidoHelp" class="form-text text-muted">Apellido (s) ejemplo Hernandez Garcia.</small>
          </div>

          <div class="form-group">
            <label for="exampleInputUsuario">Usuario</label>
            <input type="text" class="form-control" id="updateInputUsuario" aria-describedby="updateusuarioHelp">
            <small id="updateusuarioHelp" class="form-text text-muted">Usuario min 8 caracteres Alfanumericos A-Z a-z 1-0.</small>
          </div>

          <div class="form-group">
            <label for="InputPassword">Password</label>
            <input type="email" class="form-control" id="updateInputPassword" aria-describedby="updatepasswordHelp">
            <small id="updatepasswordHelp" class="form-text text-muted">Password min 8 caracteres Alfanumericos A-Z a-z 1-0.</small>
          </div>

          <div class="form-group">
            <label for="updateInputPermiso">Permiso</label>
            <select class="custom-select d-block w-100" required="" class="form-control" id="updateInputPermiso" aria-describedby="permisoHelp">>
              <option value=""              class="text-uppercase">- Seleccionar -</option>
              <option value="administrador" class="text-uppercase">  administrador</option>
              <option value="supervisor"    class="text-uppercase">  supervisor</option>
              <option value="vendedor"      class="text-uppercase">  vendedor</option>
              </select>          
            <small id="permisoHelp" class="form-text text-muted">Permiso para el manejo del sistema.</small>
          </div>


          <div class="form-group">
            <label for="updateInputPuesto">Puesto</label>
            <input type="text" class="form-control" id="updateInputPuesto" aria-describedby="updatepuestoHelp">
            <small id="updatepuestoHelp" class="form-text text-muted">Puesto de trabajo ejemplo vendedor, supervisor, mantenimiento.</small>
          </div>

          <div class="form-group">
            <label for="updateInputEmail">Email</label>
            <input type="email" class="form-control" id="updateInputEmail" aria-describedby="updateemailHelp">
            <small id="emailHelp" class="form-text text-muted">Email ejemplo usuario@gmai.com recuerda el email se ocupará para recuperación del password.</small>
          </div>

          <div class="form-group">
            <label for="updateInputTelefono">Telefono</label>
            <input type="text" class="form-control" id="updateInputTelefono" aria-describedby="updatetelefonoHelp">
            <small id="updatetelefonoHelp" class="form-text text-muted">Telefono ejemplo 55 1050 2040</small>
          </div>


        </form>                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-capitalize"   data-dismiss="modal">cerrar ventana</button>
        <button type="button" class="btn btn-primary   text-capitalize"     id="btnUpdateUser">actualizr usuario</button>
      </div>        
      </div>
    </div>
  </div>
</div>
