<div class="modal fade" id="edit_modal_tipoEventos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="form_edit_tipoEventos">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar tipo de evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" id="id_event_toUpdate" name="id_event_toUpdate" >
                        <label for="nombre"  class="form-label">Nombre</label>
                        <input type="text" required class="form-control" id="nombre_toUpdate" name="nombre">

                    </div>
                    <div class="mb-3">
                        <label for="fondo" class="form-label">Fondo</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="fondo" name="fondo"  style="width: 90%;">
                            <!-- El input de color tiene un ancho del 20% -->
                            <input type="color" id="color_fondo" style="width: 10%;" class="form-control" aria-label="fondo">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="border" class="form-label">Borde</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="border" name="border" style="width: 90%;">
                            <!-- El input de color tiene un ancho del 20% -->
                            <input type="color" id="color_border" style="width: 10%;" class="form-control" aria-label="border">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="texto" class="form-label">Texto</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="texto" name="texto" style="width: 90%;">
                            <!-- El input de color tiene un ancho del 20% -->
                            <input type="color" id="color_texto" style="width: 10%;" class="form-control" aria-label="texto">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="update_tipo_eventos">Save changes</button>
                </div>
        </div>
        </form>
    </div>
</div>
