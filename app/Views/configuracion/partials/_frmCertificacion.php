<form id="frm-certificacion" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_configuracion" id="id_configuracion" />
    <input type="hidden" name="shortname" id="shortname" />
    <div class="form-group row">
        <div class="col-lg-12">
            <label for="fecha_inicio">Imagen del fondo del certificado<span class="text-danger">(*)</span>:</label>
            <div class="multimediaFisica needsclick dz-clickable" id="imagen">
                <div class="dz-message needsclick">
                    Arrastrar o dar click para subir la imagen del fondo del certificado
                </div>
            </div>
            <span class="form-text text-muted">La imagen debe pesar menos de 1.5MB</span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-3">
            <label for="posx_nombre_participante">PosX Nombre participante<span class="text-danger">(*)</span>:</label>
            <input type="number" class="form-control" name="posx_nombre_participante" id="posx_nombre_participante" required />
        </div>
        <div class="col-lg-3">
            <label for="posy_nombre_participante">PosY Nombre participante<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posy_nombre_participante" id="posy_nombre_participante" required />
        </div>
        <div class="col-lg-3">
            <label for="posx_nombre_curso">PosX Nombre curso: </label>
            <input type="number" class="form-control" name="posx_nombre_curso" id="posx_nombre_curso" required />
        </div>
        <div class="col-lg-3">
            <label for="posy_nombre_curso">PosY Nombre curso: </label>
            <input type="number" class="form-control" name="posy_nombre_curso" id="posy_nombre_curso" required />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-3">
            <label for="posx_qr">PosX QR<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posx_qr" id="posx_qr" required />
        </div>
        <div class="col-lg-3">
            <label for="posy_qr">PosY QR<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posy_qr" id="posy_qr" required />
        </div>

        <div class="col-lg-3">
            <label for="posx_tipo_participacion">PosX Tipo participación<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posx_tipo_participacion" id="posx_tipo_participacion" required />
        </div>

        <div class="col-lg-3">
            <label for="posy_tipo_participacion">PosY Tipo participación<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posy_tipo_participacion" id="posy_tipo_participacion" required />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-2">
            <label for="posx_bloque_texto">PosX Texto<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posx_bloque_texto" id="posx_bloque_texto" required />
        </div>
        <div class="col-lg-2">
            <label for="posy_bloque_texto">PosY Texto<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="posy_bloque_texto" id="posy_bloque_texto" required />
        </div>

        <div class="col-lg-3">
            <label for="tamanio_texto_participante">Tam. text Participante<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="tamanio_texto_participante" id="tamanio_texto_participante" required />
        </div>

        <div class="col-lg-3">
            <label for="tamanio_texto_curso">Tam. Text Curso<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="tamanio_texto_curso" id="tamanio_texto_curso" required />
        </div>
        <div class="col-lg-2">
            <label for="tamanio_texto_bloque">Tam. Text <span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="tamanio_texto_bloque" id="tamanio_texto_bloque" required />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-3">
            <label for="orientacion">Orientación<span class="text-danger">(*)</span>: </label>
            <select name="orientacion" id="orientacion" class="form-control">
                <option value="">-- seleccione --</option>
                <option value="horizontal">horizontal</option>
                <option value="vertical">vertical</option>
            </select>
        </div>
        <div class="col-lg-3">
            <label for="color_nombre_participante">Color Nom. Participante<span class="text-danger">(*)</span>: </label>
            <input type="color" class="form-control" name="color_nombre_participante" id="color_nombre_participante" required />
        </div>

        <div class="col-lg-3">
            <label for="color_nombre_curso">Color Nom. Curso<span class="text-danger">(*)</span>: </label>
            <input type="color" class="form-control" name="color_nombre_curso" id="color_nombre_curso" required />
        </div>

        <div class="col-lg-3">
            <label for="alto_texto_nombre_curso">Alto Text Curso<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="alto_texto_nombre_curso" id="alto_texto_nombre_curso" required />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-4">
            <label for="fecha_inicio">Fecha Inicio<span class="text-danger">(*)</span>:</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required />
        </div>
        <div class="col-lg-4">
            <label for="fecha_fin">Fecha Fin: </label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required />
        </div>
        <div class="col-lg-4">
            <label for="fecha_certificacion">Fecha Certificación: </label>
            <input type="date" class="form-control" name="fecha_certificacion" id="fecha_certificacion" required />
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