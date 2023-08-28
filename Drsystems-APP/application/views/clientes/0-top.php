      
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
        
        <div class="btn-toolbar mb-2 mb-md-0">

          <div class="btn-group mr-2">
          <!-- CRUD -->
            <button type="button" class="btn btn-sm btn-outline-secondary" id="user-create" data-toggle="modal" data-target="#createModal">Nuevo</button>
            <button type="button" class="btn btn-sm btn-outline-secondary" id="user-update" data-toggle="modal" data-target="#updateModal" disabled>Actualizar</button>
            <button type="button" class="btn btn-sm btn-outline-secondary" id="user-delete" data-toggle="modal" data-target="#deleteModal" disabled>Borrar</button>
          </div>
          <!--
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            Tipo
          </button>
          -->
        </div>

      </div>

      <div class="col-10 offset-1 text-right py-3">
        <!-- Large modal -->
        <button type="button" class="btn btn-primary" id="user-resume" data-toggle="modal" data-target=".bd-example-modal-lg" disabled>Resumen</button>

        <input type="hidden" id="iduserupdate">
      </div>      