<div id="modalmantenimiento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalmantenimientoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <form method="post" id="padreadolescente_form">
        <div class="modal-header">
          <h5 class="modal-title" id="modalmantenimientoLabel">Registrar Relación Padre-Adolescente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <label for="id_padre">Padre</label>
            <select class="form-control" name="id_padre" id="id_padre" required>
            </select>
          </div>

          <div class="form-group">
            <label for="id_adolescente">Adolescente</label>
            <select class="form-control" name="id_adolescente" id="id_adolescente" required>
            </select>
          </div>

          <div class="form-group">
            <label for="tipo_relacion">Tipo de Relación</label>
            <input type="text" class="form-control" name="tipo_relacion" id="tipo_relacion" placeholder="Ej: Padre biológico, Tutor legal..." required>
          </div>

          <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea class="form-control" name="observaciones" id="observaciones" rows="3" placeholder="Notas adicionales..."></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>

      </form>

    </div>
  </div>
</div>
