<!-- ########################## View User ########################## -->
<button class="btn btn-outline-primary" id="btnConsultas" data-bs-target="#exampleModal" data-bs-toggle="modal" type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
  Consultas
</button>

<button class="btn btn-outline-primary" id="btnHistorial" type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
  Historial
</button>

<button class="btn btn-outline-primary" id="btnRecetas" type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
 Recetas
</button>

<div id="userGrind">
  <!-- -->
    <h2>view pacientes</h2>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody id="allUser"></tbody>
        </table>
      </div>
  <!-- -->
</div>
<!-- ########################## View User ########################## -->