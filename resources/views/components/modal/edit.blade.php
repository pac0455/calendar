<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="open_edit_modal" data-bs-toggle="modal"
    data-bs-target="#edit_modal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    @csrf
    @method('PUT')
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Editar evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <input type="datetime-local" id="date_edit_start" name="fechaHora_incio" required
                        class="form-control mr-3">
                    <input type="datetime-local" id="date_edit_end" name="fechaHora_fin" required class="form-control">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Titulo</label>
                    <input type="text" required class="form-control" id="edit_title" name="titulo">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tipo de evento</label>
                    <select class="form-select" name="tipo_evento_id" id="tipos_eventos_edit">
                        <!-- TIPOS DE EVENTOS -->
                    </select>
                </div>
                <input type="hidden" name="id" id="event_id" data-id>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close_edit_modal">Close</button>
                <button type="submit" class="btn btn-primary" id="update_calendar">Guardar</button>
            </div>
        </div>
    </div>
</div>
