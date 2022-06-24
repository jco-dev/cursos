<?= $this->extend('base') ?>

<?= $this->section('title') ?>
Configuración
<?= $this->endSection() ?>

<?= $this->section('subtitle') ?>
Configuración
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/css/configuracion/index.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row gy-5 g-xl-8">
    <div class="container-fluid">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">
                        Listado de configuración
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-separate table-head-custom table-checkable" id="tbl_configuracion" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Curso</th>
                            <th>Nombre corto</th>
                            <th>Imagen</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Límite</th>
                            <th>Certificación</th>
                            <th>nota(A)</th>
                            <th>carga horaria</th>
                            <th>descripción</th>
                            <th>banner</th>
                            <th>celular</th>
                            <th>inversión</th>
                            <th>descuento</th>
                            <th>Inicio descuento</th>
                            <th>Fin descuento</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modal-configuracion" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-configuracion-title"></h5>
                <button type="button" class="close modal-configuracion-close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" id="modal-configuracion-body">

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.js') ?>"></script>
<script>
    var banner_curso = [];
    var imagen = [];
    var imagen_personalizado = [];
    var tableConfiguracion;
    var DatatableConfiguracion = function() {

        var init = function() {
            tableConfiguracion = $('#tbl_configuracion');
            tableConfiguracion.DataTable({
                responsive: true,
                paging: true,
                select: true,
                ajax: {
                    url: "<?= base_url(route_to('configuracion-ajax-datatable')) ?>",
                    type: "GET",
                }
            }).on('click', '#configuracion-publicacion', function(e) {
                let id = $(this).data('id');
                let curso = $(this).data('curso');
                let corto = $(this).data('corto');
                $.ajax({
                    url: "<?= base_url(route_to('edit-frm-publicacion')) ?>",
                    type: 'GET',
                    data: {
                        id
                    }
                }).done(function(data) {
                    $("#modal-configuracion-body").html(data.vista);
                    // Edit
                    $("#id_configuracion").val(id);
                    $("#shortname").val(corto);
                    $("#fecha_inicio").val(data.data[0].fecha_inicio);
                    $("#fecha_fin").val(data.data[0].fecha_fin);
                    $("#fecha_fin").val(data.data[0].fecha_fin);
                    $("#fecha_limite_inscripcion").val(data.data[0].fecha_limite_inscripcion);
                    $("#nota_aprobacion").val(data.data[0].nota_aprobacion);
                    $("#carga_horaria").val(data.data[0].carga_horaria);
                    $("#celular_referencia").val(data.data[0].celular_referencia);
                    $("#inversion").val(data.data[0].inversion);
                    $("#descripcion").val(data.data[0].descripcion);
                    $("#descuento").val(data.data[0].descuento);
                    $("#fecha_inicio_descuento").val(data.data[0].fecha_inicio_descuento);
                    $("#fecha_fin_descuento").val(data.data[0].fecha_fin_descuento);

                    parametrosModal('#modal-configuracion', "Publicación: " + curso + " - " + corto, 'modal-xl', false, 'static');

                    $("#banner_curso").dropzone({
                        url: "/configuracion/subirBannerCurso",
                        addRemoveLinks: true,
                        acceptedFiles: "image/jpeg, image/png, image/jpg",
                        maxFilesize: 0.4,
                        maxFiles: 1,
                        init: function() {
                            this.on("addedfile", function(file) {
                                banner_curso.push(file);
                                // console.log(banner_curso);
                            });

                            this.on("removedfile", function(file) {
                                var index = banner_curso.indexOf(file);
                                banner_curso.splice(index, 1);
                                // console.log(banner_curso);
                            });
                        },
                    });
                }).fail(function(xhr) {});
            }).on('click', "#configuracion-certificado", function(e) {
                let id = $(this).data('id');
                let curso = $(this).data('curso');
                let corto = $(this).data('corto');
                $.ajax({
                    url: "<?= base_url(route_to('edit-frm-certificacion')) ?>",
                    type: 'GET',
                    data: {
                        id
                    }
                }).done(function(data) {
                    $("#modal-configuracion-body").html(data.vista);
                    // Edit
                    $("#id_configuracion").val(id);
                    $("#shortname").val(corto);
                    $("#imagen").val(data.data[0].imagen);
                    $("#posx_nombre_participante").val(data.data[0].posx_nombre_participante);
                    $("#posy_nombre_participante").val(data.data[0].posy_nombre_participante);
                    $("#posx_nombre_curso").val(data.data[0].posx_nombre_curso);
                    $("#posy_nombre_curso").val(data.data[0].posy_nombre_curso);
                    $("#posx_qr").val(data.data[0].posx_qr);
                    $("#posy_qr").val(data.data[0].posy_qr);
                    $("#posx_tipo_participacion").val(data.data[0].posx_tipo_participacion);
                    $("#posy_tipo_participacion").val(data.data[0].posy_tipo_participacion);
                    $("#posx_bloque_texto").val(data.data[0].posx_bloque_texto);
                    $("#posy_bloque_texto").val(data.data[0].posy_bloque_texto);
                    $("#tamanio_texto_participante").val(data.data[0].tamanio_texto_participante);
                    $("#tamanio_texto_curso").val(data.data[0].tamanio_texto_curso);
                    $("#tamanio_texto_bloque").val(data.data[0].tamanio_texto_bloque);
                    $("#orientacion").val(data.data[0].orientacion).trigger('change');
                    $("#alto_texto_nombre_curso").val(data.data[0].alto_texto_nombre_curso);

                    if (data.data[0].color_nombre_participante != null || data.data[0].color_nombre_participante != "") {
                        $("#color_nombre_participante").val(
                            data.data[0].color_nombre_participante
                        );
                    } else {
                        $("#color_nombre_participante").val("#000000");
                    }

                    if (data.data[0].color_nombre_curso != null || data.data[0].color_nombre_curso != "") {
                        $("#color_nombre_curso").val(
                            data.data[0].color_nombre_curso
                        );
                    } else {
                        $("#color_nombre_curso").val("#000000");
                    }

                    $("#fecha_inicio").val(data.data[0].fecha_inicio);
                    $("#fecha_fin").val(data.data[0].fecha_fin);
                    $("#fecha_certificacion").val(data.data[0].fecha_certificacion);

                    parametrosModal('#modal-configuracion', "Certificación: " + curso + " - " + corto, 'modal-xl', false, 'static');

                    $("#imagen").dropzone({
                        url: "/configuracion/subirBannerCurso",
                        addRemoveLinks: true,
                        acceptedFiles: "image/jpeg, image/png, image/jpg",
                        maxFilesize: 1.5,
                        maxFiles: 1,
                        init: function() {
                            this.on("addedfile", function(file) {
                                imagen.push(file);
                            });

                            this.on("removedfile", function(file) {
                                var index = imagen.indexOf(file);
                                imagen.splice(index, 1);
                            });
                        },
                    });
                }).fail(function(xhr) {});
            }).on('click', "#configuracion-personalizacion", function(e) {
                let id = $(this).data('id');
                let curso = $(this).data('curso');
                let corto = $(this).data('corto');
                $.ajax({
                    url: "<?= base_url(route_to('edit-frm-personalizacion')) ?>",
                    type: 'GET',
                    data: {
                        id
                    }
                }).done(function(data) {
                    $("#modal-configuracion-body").html(data.vista);
                    // Edit
                    $("#id_configuracion").val(id);
                    $("#shortname").val(corto);
                    $("#imagen_personalizado").val(data.data[0].imagen_personalizado);
                    $("#posx_imagen_personalizado").val(data.data[0].posx_imagen_personalizado);
                    $("#posy_imagen_personalizado").val(data.data[0].posy_imagen_personalizado);
                    $("#imprimir_subtitulo").val(data.data[0].imprimir_subtitulo).trigger('change');
                    $("#subtitulo").val(data.data[0].subtitulo);

                    parametrosModal('#modal-configuracion', "Certificación: " + curso + " - " + corto, 'modal-xl', false, 'static');

                    $("#imagen_personalizado").dropzone({
                        url: "/configuracion/subirBannerCurso",
                        addRemoveLinks: true,
                        acceptedFiles: "image/jpeg, image/png, image/jpg",
                        maxFilesize: 0.6,
                        maxFiles: 1,
                        init: function() {
                            this.on("addedfile", function(file) {
                                imagen_personalizado.push(file);
                            });

                            this.on("removedfile", function(file) {
                                var index = imagen_personalizado.indexOf(file);
                                imagen_personalizado.splice(index, 1);
                            });
                        },
                    });
                }).fail(function(xhr) {});
            }).on('click', "#configuracion-entrega", function(e) {
                let id = $(this).data('id');
                let curso = $(this).data('curso');
                let corto = $(this).data('corto');
                $.ajax({
                    url: "<?= base_url(route_to('edit-frm-entrega')) ?>",
                    type: 'GET',
                    data: {
                        id
                    }
                }).done(function(data) {
                    $("#modal-configuracion-body").html(data.vista);
                    // Edit
                    $("#id_configuracion").val(id);
                    $("#shortname").val(corto);
                    $("#certificado_disponible").val(data.data[0].certificado_disponible);
                    $("#inicio").val(data.data[0].inicio);
                    $("#fin").val(data.data[0].fin);

                    parametrosModal('#modal-configuracion', "Entrega: " + curso + " - " + corto, 'modal-xl', false, 'static');

                }).fail(function(xhr) {});
            }).on('click', "#configuracion-finalizar", function(e) {
                let id = $(this).data('id');
                let curso = $(this).data('curso');
                let corto = $(this).data('corto');

                Swal.fire({
                    title: "Estas seguro de terminar la configuracion del curso: " + curso + " -" + corto + "?",
                    text: "Después de finalizar no se puede realizar ningún cambio en la configuración del curso",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, terminar!",
                    cancelButtonText: "No, Cancelar!",
                    reverseButtons: true,
                }).then(function(result) {
                    if (result.value) {
                        $.post("<?= base_url(route_to('terminar-configuracion')) ?>", {
                                id,
                            },
                            function(response) {
                                if (typeof response.success != "undefined") {
                                    Swal.fire("Exito!", response.success, "success");
                                    tableConfiguracion.DataTable().ajax.reload(null, false);
                                }
                                if (typeof response.error != "undefined") {
                                    Swal.fire("Error!", response.error, "error");
                                }
                            }
                        );
                    } else if (result.dismiss === "cancel") {
                        Swal.fire(
                            "Cancelado",
                            "La configuracion del curso no ha finalizado aún :)",
                            "error"
                        );
                    }
                });
            });

            $('#kt_datatable_search_status').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'Status');
            });

            $('#kt_datatable_search_type').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'Type');
            });

            $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
        };

        return {
            init: function() {
                init();
            }
        };
    }();

    jQuery(document).ready(function() {
        DatatableConfiguracion.init();

        // reset form
        $("#kt_body").on("click", ".cancelFrmConfiguracion, .modal-configuracion-close", function(e) {
            e.preventDefault();
            Swal.fire({
                title: "¿Estás seguro de cancelar la edición?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, Cancelar!"
            }).then(function(result) {
                if (result.value) {
                    $("#modal-configuracion-body").children().empty();
                    $("#modal-configuracion").modal('hide');
                }
            });
        });

        // guardar publicación
        $("#kt_body").on("submit", "#frm-publicacion", function(e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            if (banner_curso.length == 1 && banner_curso[0].status == "success")
                formData.append("banner_curso", banner_curso[0].dataURL);

            $.ajax({
                url: "<?= base_url(route_to('guardar-publicacion')); ?>",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
            }).done(function(data) {
                banner_curso = [];
                if (typeof data.success != 'undefined') {
                    tableConfiguracion.DataTable().ajax.reload(null, false);
                    $("#modal-configuracion").modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: data.success,
                        showConfirmButton: false,
                        timer: 2500
                    });

                }

                if (typeof data.error != 'undefined') {
                    $("#modal-configuracion").modal('hide');
                    Swal.fire({
                        icon: "error",
                        title: data.error,
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            });

        });

        // guardar certificación
        $("#kt_body").on("submit", "#frm-certificacion", function(e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            if (imagen.length == 1 && imagen[0].status == "success")
                formData.append("imagen", imagen[0].dataURL);

            $.ajax({
                url: "<?= base_url(route_to('guardar-certificacion')); ?>",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
            }).done(function(data) {
                imagen = [];
                if (typeof data.success != 'undefined') {
                    tableConfiguracion.DataTable().ajax.reload(null, false);
                    $("#modal-configuracion").modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: data.success,
                        showConfirmButton: false,
                        timer: 2500
                    });

                }

                if (typeof data.error != 'undefined') {
                    $("#modal-configuracion").modal('hide');
                    Swal.fire({
                        icon: "error",
                        title: data.error,
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            });

        });

        // guardar personalizacion
        $("#kt_body").on("submit", "#frm-personalizacion", function(e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            if (imagen_personalizado.length == 1 && imagen_personalizado[0].status == "success")
                formData.append("imagen_personalizado", imagen_personalizado[0].dataURL);

            $.ajax({
                url: "<?= base_url(route_to('guardar-personalizacion')); ?>",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
            }).done(function(data) {
                imagen_personalizado = [];
                if (typeof data.success != 'undefined') {
                    tableConfiguracion.DataTable().ajax.reload(null, false);
                    $("#modal-configuracion").modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: data.success,
                        showConfirmButton: false,
                        timer: 2500
                    });

                }

                if (typeof data.error != 'undefined') {
                    $("#modal-configuracion").modal('hide');
                    Swal.fire({
                        icon: "error",
                        title: data.error,
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            });

        });

        // guardar personalizacion
        $("#kt_body").on("submit", "#frm-entrega", function(e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);

            $.ajax({
                url: "<?= base_url(route_to('guardar-entrega')); ?>",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
            }).done(function(data) {
                if (typeof data.success != 'undefined') {
                    tableConfiguracion.DataTable().ajax.reload(null, false);
                    $("#modal-configuracion").modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: data.success,
                        showConfirmButton: false,
                        timer: 2500
                    });

                }

                if (typeof data.error != 'undefined') {
                    $("#modal-configuracion").modal('hide');
                    Swal.fire({
                        icon: "error",
                        title: data.error,
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            });

        });
    });
</script>
<?= $this->endSection() ?>