<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="showModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showModal" v-text="fillKeep.keep"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-justify" v-text="fillKeep.description"></p>
        <hr>
        <strong>Estado de la Tarea:</strong>
        <span v-text="fillKeep.status"></span>
        <hr>
        <strong>Fecha de Creación:</strong>
        <span v-text="fillKeep.created_at"></span>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>