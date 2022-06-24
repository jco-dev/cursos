<form id="frm-entrega" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_configuracion" id="id_configuracion" />
    <input type="hidden" name="shortname" id="shortname" />
    <div class="form-group row">
        <div class="col-lg-4">
            <label for="certificado_disponible">Disponible: </label><br>
            <select name="certificado_disponible" id="certificado_disponible" class="form-control" required>
                <option value="">-- seleccione --</option>
                <option value="SI">SI</option>
                <option value="NO">NO</option>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="inicio">Disponible desde: </label>
            <input type="date" class="form-control" id="inicio" name="inicio" />
        </div>
        <div class="col-lg-4">
            <label for="fin">Disponible hasta: </label>
            <input type="date" class="form-control" id="fin" name="fin" />
        </div>
    </div>

    <div class="modal-footer">
        <div class="row d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mr-2">
                <i class="fa fa-save"></i>
                Guardar
            </button>
            <button type="button" class="btn btn-light-primary cancelFrmConfiguracion">Cancelar</button>
        </div>
    </div>
</form>