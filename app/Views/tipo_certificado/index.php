<?= $this->extend('base') ?>

<?= $this->section('title') ?>
Tipo certificado
<?= $this->endSection() ?>

<?= $this->section('subtitle') ?>
Tipo Certificado
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/css/configuracion/index.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row gy-5 g-xl-8">
    <div class="container-fluid">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">
                        Listado de Tipo de Certificados
                    </h3>
                </div>
                <div class="card-toolbar">
                    <button class="btn btn-primary font-weight-bolder" id="btn-agregar-tipo-certificado">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                    <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000" />
                                </g>
                            </svg>
                            Nuevo Tipo Certificado
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-separate table-head-custom nowrap table-checkable" id="tbl_tipo_certificado" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>imagen</th>
                            <th>método</th>
                            <th>nombre x - y</th>
                            <th>curso x - y</th>
                            <th>qr x - y</th>
                            <th>participación x - y</th>
                            <th>texto x - y</th>
                            <th>Tam. Nombre</th>
                            <th>Tam. Curso</th>
                            <th>Tam. Texto</th>
                            <th>Orientación</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modal-tipo-certificado" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-tipo-certificado-title"></h5>
                <button type="button" class="close modal-tipo-certificado-close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" id="modal-tipo-certificado-body">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.js') ?>"></script>
<script>
    var imagen = [];
    var tableTipoCertificado;
    var DatatableTipoCertificado = function() {

        var init = function() {
            tableTipoCertificado = $('#tbl_tipo_certificado');
            tableTipoCertificado.DataTable({
                responsive: true,
                paging: true,
                select: true,
                ajax: {
                    url: '<?= base_url(route_to('tipo-certificado-datatable')) ?>',
                    type: 'GET'
                },
            });

            $(document).on('click', 'a#btn-edit-tipo-certificado', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    url: "<?= base_url(route_to('edit-tipo-certificado')) ?>",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('#modal-tipo-certificado-title').html('Editar Tipo Certificado');
                        $('#modal-tipo-certificado-body').html(response.vista);
                        $('#modal-tipo-certificado').modal('show');

                        $("#imagen_certificado").dropzone({
                            url: "/configuracion/subirBannerCurso",
                            addRemoveLinks: true,
                            acceptedFiles: "image/jpeg, image/png, image/jpg",
                            maxFilesize: 0.4,
                            maxFiles: 1,
                            uploadMultiple: false,
                            addRemoveLinks: true,
                            init: function() {
                                this.on("addedfile", function(file) {
                                    let MyDropzone = this;
                                    MyDropzone.on('complete', function(file) {
                                        if (file.status == 'error') {
                                            MyDropzone.removeFile(file);
                                        }
                                    });
                                    imagen.push(file);
                                });

                                this.on("removedfile", function(file) {
                                    var index = imagen.indexOf(file);
                                    imagen.splice(index, 1);
                                });
                            },
                        });
                    }
                });
            }).on('click', 'a#btn-delete-tipo-certificado', function(e) {
                let id = $(this).data('id');
                Swal.fire({
                    title: '¿Está seguro?',
                    text: "¡No podrás revertar esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, borralo!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "<?= base_url(route_to('delete-tipo-certificado')) ?>",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function(response) {
                                if (typeof response.success !== 'undefined') {
                                    tableTipoCertificado.DataTable().ajax.reload(null, false);
                                    Swal.fire(
                                        '¡Éxito!',
                                        response.success,
                                        'success'
                                    );
                                } else if(typeof response.error !== 'undefined') {
                                    Swal.fire(
                                        '¡Error!',
                                        response.error,
                                        'error'
                                    );
                                }
                            }
                        });
                    }
                });
            })

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
        // reset form
        $("#kt_body").on("click", ".cancelFrmTipoCertificacion, .modal-tipo-certificado-close", function(e) {
            e.preventDefault();
            Swal.fire({
                title: "¿Estás seguro de cancelar la edición?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, Cancelar!"
            }).then(function(result) {
                if (result.value) {
                    $("#modal-tipo-certificado-body").children().empty();
                    $("#modal-tipo-certificado").modal('hide');
                }
            });
        });

        // agregar tipo certificado //
        $("#btn-agregar-tipo-certificado").on("click", function(e) {
            $.get("<?= base_url(route_to('frm-tipo-certificado')) ?>", function(response) {
                $("#modal-tipo-certificado-body").html(response.vista);
                parametrosModal('#modal-tipo-certificado', "Tipo de certificado", 'modal-xl', false, 'static');
                $("#imagen_certificado").dropzone({
                    url: "/configuracion/subirBannerCurso",
                    addRemoveLinks: true,
                    acceptedFiles: "image/jpeg, image/png, image/jpg",
                    maxFilesize: 0.4,
                    maxFiles: 1,
                    uploadMultiple: false,
                    addRemoveLinks: true,
                    init: function() {
                        this.on("addedfile", function(file) {
                            let MyDropzone = this;
                            MyDropzone.on('complete', function(file) {
                                if (file.status == 'error') {
                                    MyDropzone.removeFile(file);
                                }
                            });
                            imagen.push(file);
                        });

                        this.on("removedfile", function(file) {
                            var index = imagen.indexOf(file);
                            imagen.splice(index, 1);
                        });
                    },
                });
            });
        });

        // guardar tipo certificación
        $("#kt_body").on("submit", "#frm-tipo-certificado", function(e) {
            e.preventDefault();
            $(".btnSubmitTipoCertificado").attr("disabled", true);
            let formData = new FormData($(this)[0]);
            if (imagen.length == 1 && imagen[0].status == "success")
                formData.append("imagen", imagen[0].dataURL);

            $.ajax({
                url: "<?= base_url(route_to('guardar-tipo-certificado')); ?>",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
            }).done(function(data) {
                $(".btnSubmitTipoCertificado").attr("disabled", false);
                imagen = [];
                if (typeof data.success != 'undefined') {
                    tableTipoCertificado.DataTable().ajax.reload(null, false);
                    $("#modal-tipo-certificado").modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: data.success,
                        showConfirmButton: false,
                        timer: 2500
                    });

                }

                if (typeof data.error != 'undefined') {
                    $("#modal-tipo-certificado").modal('hide');
                    Swal.fire({
                        icon: "error",
                        title: data.error,
                        showConfirmButton: false,
                        timer: 2500
                    });
                }

                if (typeof data.warning != 'undefined') {
                    Swal.fire({
                        title: data.warning.metodo,
                        icon: "warning",
                        showCancelButton: false,
                        confirmButtonText: "Ok"
                    });
                }
            });

        });

        // update tipo certificación
        $("#kt_body").on("submit", "#frm-update-tipo-certificado", function(e) {
            e.preventDefault();
            $(".btnSubmitTipoCertificado").attr("disabled", true);
            let formData = new FormData($(this)[0]);
            if (imagen.length == 1 && imagen[0].status == "success")
                formData.append("imagen", imagen[0].dataURL);

            $.ajax({
                url: "<?= base_url(route_to('update-tipo-certificado')); ?>",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
            }).done(function(data) {
                $(".btnSubmitTipoCertificado").attr("disabled", false);
                imagen = [];
                if (typeof data.success != 'undefined') {
                    tableTipoCertificado.DataTable().ajax.reload(null, false);
                    $("#modal-tipo-certificado").modal('hide');
                    Swal.fire({
                        icon: "success",
                        title: data.success,
                        showConfirmButton: false,
                        timer: 2500
                    });

                }

                if (typeof data.error != 'undefined') {
                    $("#modal-tipo-certificado").modal('hide');
                    Swal.fire({
                        icon: "error",
                        title: data.error,
                        showConfirmButton: false,
                        timer: 2500
                    });
                }

                if (typeof data.warning != 'undefined') {
                    Swal.fire({
                        title: data.warning.metodo,
                        icon: "warning",
                        showCancelButton: false,
                        confirmButtonText: "Ok"
                    });
                }
            });

        });

        DatatableTipoCertificado.init();
    });
</script>
<?= $this->endSection() ?>