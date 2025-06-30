<div id="modalmantenimiento" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lbltitulo">Nuevo Adolescente</h5>
      </div>
      <form id="adolescente_form">
        <div class="modal-body">
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label>Nombres</label>
            <input type="text" id="nombres" name="nombres" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Edad</label>
            <input type="number" id="edad" name="edad" class="form-control" required>
          </div>
          <div class="form-group">
            <label>DNI</label>
            <input type="text" id="dni" name="dni" class="form-control" required maxlength="8">
          </div>
          <div class="form-group">
            <label>Sexo</label>
            <select id="sexo" name="sexo" class="form-control" required>
              <option value="">Seleccione</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
          <div class="form-group">
            <label>Dirección</label>
            <textarea id="direccion" name="direccion" class="form-control" required></textarea>
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