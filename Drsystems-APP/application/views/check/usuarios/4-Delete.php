<!-- Modal DELETE -->
<div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GoldenTradeValue - Borrar Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        
          <p class="font-weight-light">Borrar el usuario es especialmente importante para impedir el <span class="font-weight-bold">acceso</span> del usuario, la información generada por el usuario desde su generación de este como compra, ventas, existencias no se verán afectadas después de su borrado.</p>
          
          <h6>
            Usuarios:  <span id="usuariodelete" class="text-danger"></span></br>
            Nombre:    <span id="nombredelete"  class="text-danger"></span></br>
          </h6>

        </form>                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-capitalize" data-dismiss="modal">cerrar ventana</button>
        <button type="button" class="btn btn-danger text-capitalize"    id="btnDeleteUser">eliminar usuario</button>
      </div>
    </div>
  </div>
</div>