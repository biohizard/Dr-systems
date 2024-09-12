<div class="container">
  <main>
    <div class="row g-5">

      <div class="col-md-6 col-lg-4 order-md-last">

        <div class="div-12">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Examen físico:</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">TA</h6>
                <small class="text-body-secondary">Tensión Arterial</small>
              </div>
              <input type="text" class="form-control" id="" placeholder="000/0" style="width: 35%;">

            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">FC</h6>
                <small class="text-body-secondary">Frecuencia cardiaca</small>
              </div>
              <input type="text" class="form-control" id="" placeholder="000 Bpm" style="width: 35%;">
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">T</h6>
                <small class="text-body-secondary">Temperatura</small>
              </div>
              <input type="text" class="form-control" id="" placeholder="00°" style="width: 35%;">
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">P</h6>
                <small class="text-body-secondary">Peso</small>
              </div>
              <input type="text" class="form-control" id="" placeholder="000 Kg" style="width: 35%;">
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">A</h6>
                <small class="text-body-secondary">Altura</small>
              </div>
              <input type="text" class="form-control" id="" placeholder="000 Cm" style="width: 35%;">
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">IMC</h6>
                <small class="text-body-secondary">Indice de Masa Corporal</small>
              </div>
              <input type="text" class="form-control" id="" placeholder="00.0 IMC" style="width: 35%;" disabled>
            </li>
          </ul>
        </div>

        <hr class="my-4">

        <div class="div-12">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Hábitos tóxicos:</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Alcohol</h6>
              </div>
              <select class="form-select" id="" required="" style="width:50%;">
                <option value="">Opciones</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Tabaco</h6>
              </div>
              <select class="form-select" id="" required="" style="width: 50%;">
                <option value="">Opciones</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Drogas</h6>
              </div>
              <select class="form-select" id="" required="" style="width:50%;">
                <option value="">Opciones</option>
                <option>Si</option>
                <option>No</option>
              </select>
            </li>
          </ul>
        </div>

      </div>

      <div class="col-md-6 col-lg-8">

        <h4 class="d-flex justify-content-between align-items-center mb-3"><span class="text-primary">Consulta</span></h4>

        <div class="row g-3">

          <div class="col-12">
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Motivo de consulta</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Enfermedad actual</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Antecedentes de enfermedad actual</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

          </div>

        </div>

        <hr class="my-4">

        <h4 class="d-flex justify-content-between align-items-center mb-3"><span class="text-primary">Receta</span></h4>

        <div class="row g-3">
          <div class="col-12">

            <div class="mb-3">
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

          </div>
        </div>

        <hr class="my-4">

        <div class="row g-3">
          <div class="col-12">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Guardar consulta</button>
          </div>
        </div>

      </div>

    </div>
  </main>
</div>