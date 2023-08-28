<!-- Modal DELETE -->
<div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GoldenTradeValue - Borrar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <p class="font-weight-light">Borrar el Proveedor no altera la información generada por alguna de sus acciones  desde su generación compra, ventas, existencias no se verán afectadas después de su borrado.</p>
          
          <h6>Nombre:<span id="nombredelete" class="text-danger"></span></h6>
          <h6>Email: <span id="emaildelete"  class="text-danger"></span></h6>
        </form>                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-capitalize" data-dismiss="modal">cerrar ventana</button>
        <button type="button" class="btn btn-danger text-capitalize"    id="btnDeleteUser">eliminar usuario</button>
      </div>
    </div>
  </div>
</div>