<div id="modalmantenimiento" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbltitulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Nuevo Registro</h6>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body pd-25">
                        <input type="hidden" name="usu_id" id="usu_id" />
                        <div class="col-log-12">
                            <div class="form-group">
                                <label class="form-control-label">Nombre: 
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control tx-uppercase" id="usu_nom" type="text" name="usu_nom" required />
                            </div>
                        </div>     
                        <div class="col-log-12">
                            <div class="form-group">
                                <label class="form-control-label">Apellido Paterno: 
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control tx-uppercase" id="usu_apep" type="text" name="usu_apep" required />
                            </div>
                        </div>        
                        <div class="col-log-12">
                            <div class="form-group">
                                <label class="form-control-label">Apellido Materno: 
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control tx-uppercase" id="usu_apem" type="text" name="usu_apem" required />
                            </div>
                        </div>        
                        <div class="col-log-12">
                            <div class="form-group">
                                <label class="form-control-label">Correo: 
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control tx-uppercase" id="usu_correo" type="email" name="usu_correo" required />
                            </div>
                        </div>    
                        <div class="col-log-12">
                            <div class="form-group">
                                <label class="form-control-label">Contraseña: 
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control tx-uppercase" id="usu_pass" type="text" name="usu_pass" required />
                            </div>
                        </div>   
                        <div class="col-log-12">
                            <div class="form-group">
                                <label class="form-control-label">Sexo: 
                                    <span class="tx-danger">*</span>
                                </label>
                                <select class="form-control" name="usu_sex" id="usu_sex" data-placeholder="Seleccione" required>
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>      
                        <div class="col-log-12">
                            <div class="form-group">
                                <label class="form-control-label">Telefono: 
                                    <span class="tx-danger">*</span>
                                </label>
                                <input class="form-control tx-uppercase" id="usu_telf" type="text" name="usu_telf" required />
                            </div>
                        </div>     
                        <div class="col-log-12">
                            <div class="form-group">
                                <label class="form-control-label">Rol: 
                                    <span class="tx-danger">*</span>
                                </label>
                                <select class="form-control" name="rol_id" id="rol_id" data-placeholder="Seleccione" required>
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="1">Administrador General</option>
                                    <option value="2">Administrador</option>
                                    <option value="3">Profesor</option>
                                </select>
                            </div>
                        </div>        
                </div>
                <div class="modal-footer">
                    <button type="submit" name="action" value="add" class="btn btn-outline-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <button type="button" class="btn btn-outline-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" 
                            aria-label="Close" aria-hidden="true" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>