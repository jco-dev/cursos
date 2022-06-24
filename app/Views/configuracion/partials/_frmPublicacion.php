<form id="frm-publicacion" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_configuracion" id="id_configuracion" />
    <input type="hidden" name="shortname" id="shortname" />
    <div class="form-group row">
        <div class="col-lg-12">
            <label for="fecha_inicio">Banner del curso para la publicación<span class="text-danger">(*)</span>:</label>
            <div class="multimediaFisica needsclick dz-clickable" id="banner_curso">
                <div class="dz-message needsclick">
                    Arrastrar o dar click para subir el banner del curso.
                </div>
            </div>
            <span class="form-text text-muted">La imagen debe pesar menos de 400KB</span>
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
            <label for="fecha_limite_inscripcion">Fecha Límite Inscripción: </label>
            <input type="date" class="form-control" name="fecha_limite_inscripcion" id="fecha_limite_inscripcion" required />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-3">
            <label for="nota_aprobacion">Nota aprobación<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="nota_aprobacion" id="nota_aprobacion" required />
        </div>
        <div class="col-lg-3">
            <label for="carga_horaria">Carga Horaria<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="carga_horaria" id="carga_horaria" required />
        </div>

        <div class="col-lg-3">
            <label for="celular_referencia">Celular Referencia<span class="text-danger">(*)</span>: </label>
            <input type="text" class="form-control" name="celular_referencia" id="celular_referencia" required />
        </div>

        <div class="col-lg-3">
            <label for="inversion">Inversión<span class="text-danger">(*)</span>: </label>
            <input type="number" class="form-control" name="inversion" id="inversion" required />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            <label for="descripcion">Descripción<span class="text-danger">(*)</span>: </label>
            <textarea name="descripcion" id="descripcion" rows="2" class="form-control" required></textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-4">
            <label for="descuento">Descuento: </label>
            <input type="number" class="form-control" name="descuento" id="descuento" />
        </div>
        <div class="col-lg-4">
            <label for="fecha_inicio_descuento">Fecha Inicio Descuento: </label>
            <input type="date" class="form-control" name="fecha_inicio_descuento" id="fecha_inicio_descuento" />
        </div>
        <div class="col-lg-4">
            <label for="fecha_fin_descuento">Fecha Fin Descuento: </label>
            <input type="date" class="form-control" name="fecha_fin_descuento" id="fecha_fin_descuento" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-4">
            <label for="pago_qr">Pago QR: </label>
            <input type="file" class="form-control" name="pago_qr" id="pago_qr" accept="image/*" />
        </div>
        <div class="col-lg-4">
            <label for="pago_qr_descuento">Pago QR descuento: </label>
            <input type="file" class="form-control" name="pago_qr_descuento" id="pago_qr_descuento" accept="image/*" />
        </div>
        <div class="col-lg-4">
            <label for="pdf">Infografía del curso<span class="text-danger">(PDF)</span></label>
            <input type="file" class="form-control" name="pdf" id="pdf" accept=".pdf" />
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