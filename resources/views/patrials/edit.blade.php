<form method="POST" v-on:submit.prevent="updateKeep(fillKeep.id)">
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModal">Editar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="col mb-3">
              <label for="keep">Actualizar Tarea</label>
              <input type="text" name="keep" class="form-control" id="keep" 
                     v-model="fillKeep.keep" required>
            </div>
          </div>
          <div class="form-group">
            <label for="description">Descripción de la tarea</label>
            <textarea name="description" class="form-control" rows="3" 
                      v-model="fillKeep.description" required></textarea>
          </div>
          <div class="form-group">
            <label for="">Estado de la Tarea</label>
            <!-- Group of default radios - option 1 -->
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="active" name="groupOfDefaultRadios" v-model="fillKeep.status" value="ACTIVE">
              <label class="custom-control-label" for="active">Activa</label>
            </div>

            <!-- Group of default radios - option 2 -->
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="finish" name="groupOfDefaultRadios" v-model="fillKeep.status" value="FINISHED">
              <label class="custom-control-label" for="finish">Terminada</label>
            </div>
          </div>
          <span v-for="error in errors" class="text-danger">@{{ error }}</span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
</form>