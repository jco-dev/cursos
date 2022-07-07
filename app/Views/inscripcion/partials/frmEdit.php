<form id="frm-inscripcion" method="POST">
    <input type="hidden" name="id_inscripcion" id="id_inscripcion" value="<?= $id ?>" />
    <div class="form-group row">
        <div class="col-lg-12">
            <label for="calificacion_final">Calificación Final: </label>
            <input type="number" class="form-control" id="calificacion_final" name="calificacion_final" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            <label for="tipo_participacion required">Tipo participación: </label>
            <select name="tipo_participacion" id="tipo_participacion" class="custom-select form-control" required>
                <option value="">-- seleccione --</option>
                <option value="PARTICIPANTE">PARTICIPANTE</option>
                <option value="EXPOSITOR">EXPOSITOR</option>
                <option value="ORGANIZADOR">ORGANIZADOR</option>
            </select>
        </div>
    </div>

    <div class="modal-footer">
        <div class="row d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mr-2 btnSubmitInscripcion">
                <i class="fa fa-save"></i>
                Guardar
            </button>
            <button type="button" class="btn btn-light-primary cancelFrmInscripcion">Cancelar</button>
        </div>
    </div>
</form>