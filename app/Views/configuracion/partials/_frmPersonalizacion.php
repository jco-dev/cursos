<form id="frm-personalizacion" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_configuracion" id="id_configuracion" />
    <input type="hidden" name="shortname" id="shortname" />
    <div class="form-group row">
        <div class="col-lg-12">
            <label for="fecha_inicio">Imagen personalizado del curso<span class="text-danger">(*)</span>:</label>
            <div class="multimediaFisica needsclick dz-clickable" id="imagen_personalizado">
                <div class="dz-message needsclick">
                    Arrastrar o dar click para subir la imagen personalizado del curso
                </div>
            </div>
            <span class="form-text text-muted">La imagen debe pesar menos de 600KB</span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <label for="posx_imagen_personalizado">X imagen personalizado <span class="text-danger">(*)</span>:</label>
            <input type="number" class="form-control" id="posx_imagen_personalizado" name="posx_imagen_personalizado" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
            <span class="form-text text-muted">Posicion x imagen personalizado</span>
        </div>

        <div class="col-lg-6">
            <label for="posy_imagen_personalizado">Y imagen personalizado <span class="text-danger">(*)</span>:</label>
            <input type="number" class="form-control" id="posy_imagen_personalizado" name="posy_imagen_personalizado" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
            <span class="form-text text-muted">Posicion y imagen personalizado</span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-4">
            <label for="imprimir_subtitulo">Imprimir imprimir_subtitulo: </label><br>
            <select name="imprimir_subtitulo" id="imprimir_subtitulo" class="form-control" required>
                <option value="">-- seleccione --</option>
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
        </div>
        <div class="col-lg-8">
            <label for="subtitulo">Subtítulo: </label>
            <input type="text" class="form-control" id="subtitulo" name="subtitulo" />
            <span class="form-text text-muted">Ingrese subtítulo</span>
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