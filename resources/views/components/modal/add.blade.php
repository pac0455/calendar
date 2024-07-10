<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="open_add_modal" data-bs-toggle="modal" data-bs-target="#add_modal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="{{ route('calendar.store') }}" method="post">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="exampleModalLabel">Crear evento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @csrf
          @method('POST')
          <div class="input-group mb-3">
            <input type="datetime-local" id="date_start" name="fechaHora_incio" required class="form-control mr-3">
            <input type="datetime-local" id="date_end" name="fechaHora_fin" required class="form-control">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Titulo</label>
            <input type="text" required class="form-control" id="titulo" name="titulo">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Tipo de evento</label>
            <select class="form-select" name="tipo_evento_id" id="tipos_eventos">
              <!-- TIPOS DE EVENTOS -->
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </form>
</div>