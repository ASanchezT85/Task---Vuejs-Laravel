<form method="POST" v-on:submit.prevent="createKeep">
  <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModal">Crear</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="col mb-3">
              <label for="keep">Nueva Tarea</label>
              <input type="text" name="keep" class="form-control" id="keep" 
                     placeholder="Nombre de la tarea" v-model="nameKeep" required>
            </div>
          </div>
          <div class="form-group">
            <label for="description">Descripción de la tarea</label>
            <textarea class="form-control" id="description" rows="3" v-model="descripKeep" required></textarea>
          </div>
          <span v-for="error in errors" class="text-danger" v-text="error"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
</form>