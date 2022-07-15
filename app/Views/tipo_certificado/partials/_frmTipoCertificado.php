<form id="frm-tipo-certificado" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_tipo_certificado" id="id_tipo_certificado" />
    <div class="form-group row">
        <div class="col-lg-12">
            <label for="imagen_certificado">Imagen de la plantilla del certificado<span class="text-danger">(*)</span>:</label>
            <div class="multimediaFisica needsclick dz-clickable" id="imagen_certificado">
                <div class="dz-message needsclick">
                    Arrastrar o dar click para subir la plantilla del certificado.
                </div>
            </div>
            <span class="form-text text-muted">La imagen debe pesar menos de 800KB</span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-4">
            <label for="metodo">Método<span class="text-danger">(*)</span>:</label>
            <input type="text" class="form-control" name="metodo" id="metodo" required />
        </div>
        <div class="col-lg-4">
            <label for="posx_nombre_participante">Nombre Participante x<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posx_nombre_participante" id="posx_nombre_participante" required />
        </div>
        <div class="col-lg-4">
            <label for="posy_nombre_participante">Nombre Participante y<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posy_nombre_participante" id="posy_nombre_participante" required />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-3">
            <label for="posx_nombre_curso">Nombre Curso x<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posx_nombre_curso" id="posx_nombre_curso" required />
        </div>
        <div class="col-lg-3">
            <label for="posy_nombre_curso">Nombre Curso y<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posy_nombre_curso" id="posy_nombre_curso" required />
        </div>

        <div class="col-lg-3">
            <label for="posx_qr">QR x<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posx_qr" id="posx_qr" required />
        </div>

        <div class="col-lg-3">
            <label for="posy_qr">QR y<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posy_qr" id="posy_qr" required />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-3">
            <label for="posx_tipo_participacion">Tipo Participación x<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posx_tipo_participacion" id="posx_tipo_participacion" required />
        </div>
        <div class="col-lg-3">
            <label for="posy_tipo_participacion">Tipo Participación y<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posy_tipo_participacion" id="posy_tipo_participacion" required />
        </div>

        <div class="col-lg-3">
            <label for="posx_bloque_texto">Bloque Texto x<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posx_bloque_texto" id="posx_bloque_texto" required />
        </div>

        <div class="col-lg-3">
            <label for="posy_bloque_texto">Bloque Texto y<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posy_bloque_texto" id="posy_bloque_texto" required />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-3">
            <label for="tamanio_texto_participante">Texto Participante<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="tamanio_texto_participante" id="tamanio_texto_participante" required />
        </div>
        <div class="col-lg-3">
            <label for="tamanio_texto_curso">Texto Curso<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="tamanio_texto_curso" id="tamanio_texto_curso" required />
        </div>

        <div class="col-lg-3">
            <label for="tamanio_texto_bloque">Bloque Texto<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="tamanio_texto_bloque" id="tamanio_texto_bloque" required />
        </div>

        <div class="col-lg-3">
            <label for="orientacion">Orientación<span class="text-danger">(*)</span>: </label>
            <select class="form-control custom-select" name="orientacion" id="orientacion" required>
                <option value="">Seleccione</option>
                <option value="horizontal">Horizontal</option>
                <option value="vertical">Vertical</option>
            </select>
        </div>
    </div>

    <div class="modal-footer">
        <div class="row d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mr-2 btnSubmitTipoCertificado">
                <i class="fa fa-save"></i>
                Guardar
            </button>
            <button type="button" class="btn btn-light-primary cancelFrmTipoCertificacion">Cancelar</button>
        </div>
    </div>
</form>