<?= $this->extend('base') ?>

<?= $this->section('title') ?>
Participantes
<?= $this->endSection() ?>

<?= $this->section('subtitle') ?>
Participantes
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row gy-5 g-xl-8">
    <div class="container-fluid">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">
                        Participantes del curso: <?= $fullname ?> - <?= $shortname ?>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-separate table-head-custom table-checkable" id="tbl_participantes" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>participante</th>
                            <th>nota</th>
                            <th>tipo participación</th>
                            <th>certificación</th>
                            <th>estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modal-inscripcion" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-inscripcion-title"></h5>
                <button type="button" class="close modal-inscripcion-close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" id="modal-inscripcion-body">

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.js') ?>"></script>
<script>
    var tableParticipantes;
    var DatatableParticipantes = function() {

        var init = function() {
            tableParticipantes = $('#tbl_participantes');
            tableParticipantes.DataTable({
                responsive: true,
                serverSide: true,
                paging: true,
                select: true,
                ajax: {
                    url: "<?= base_url(route_to('participantes-ajax-datatable')) ?>",
                    type: "GET",
                    data: {
                        id: <?= $id ?>
                    }
                }
            }).on('change', '#select-estado-inscripcion', function(e) {
                let id = $(this).data('id');
                let value = $(this).val();
                Swal.fire({
                    title: "Estas seguro de cambiar de estado?",
                    text: "Esta accion no puede ser revertido",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, Cambiar!",
                    cancelButtonText: "No, Cancelar!",
                    reverseButtons: true,
                }).then(function(result) {
                    if (result.value) {
                        $.post("<?= base_url(route_to('estado-inscripcion')) ?>", {
                            id,
                            value
                        }, function(response) {
                            if (typeof response.exito !== "undefined") {
                                Swal.fire({
                                    title: "Éxito",
                                    text: "El estado de la inscripción ha sido cambiado correctamente",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                tableParticipantes.DataTable().ajax.reload(null, false);
                            } else {
                                Swal.fire({
                                    title: "Error",
                                    text: "No se pudo cambiar el estado de la inscripción",
                                    icon: "error",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                        });
                    }

                });
            }).on('click', "a#btn-edit-inscripcion", function(e) {
                let id = $(this).data('id');
                let participante = $(this).data('participante');
                $.post("<?= base_url(route_to('edit-inscripcion')) ?>", {
                    id
                }, function(response) {
                    $("#modal-inscripcion-body").html(response.vista);
                    $("#calificacion_final").val(response.data.calificacion_final);
                    $("#tipo_participacion").val(response.data.tipo_participacion).trigger('change');
                    parametrosModal('#modal-inscripcion', "Participante: " + participante, 'modal-xl', false, 'static');
                })
            }).on('change', "#select-tipo-participacion", function(e) {

                let id = $(this).data('id');
                let value = $(this).val();
                Swal.fire({
                    title: "Estas seguro de cambiar de estado el tipo de participación en el curso?",
                    text: "Esta acción no puede ser revertido",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, Cambiar!",
                    cancelButtonText: "No, Cancelar!",
                    reverseButtons: true,
                }).then(function(result) {
                    if (result.value) {
                        $.post("<?= base_url(route_to('tipo-participacion')) ?>", {
                            id,
                            value
                        }, function(response) {
                            if (typeof response.exito !== "undefined") {
                                Swal.fire({
                                    title: "Éxito",
                                    text: response.exito,
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                tableParticipantes.DataTable().ajax.reload(null, false);
                            } else {
                                Swal.fire({
                                    title: "Error",
                                    text: response.error,
                                    icon: "error",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                        });
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
        DatatableParticipantes.init();

        // reset form
        $("#kt_body").on("click", ".cancelFrmInscripcion, .modal-inscripcion-close", function(e) {
            e.preventDefault();
            Swal.fire({
                title: "¿Estás seguro de cancelar la edición?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, Cancelar!"
            }).then(function(result) {
                if (result.value) {
                    $("#modal-inscripcion-body").children().empty();
                    $("#modal-inscripcion").modal('hide');
                }
            });
        });

        // guardar inscripcion
        $("#kt_body").on("submit", "#frm-inscripcion", function(e) {
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            $(".btnSubmitInscripcion").attr("disabled", true);
            $.ajax({
                url: "<?= base_url(route_to('update-inscripcion')); ?>",
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
            }).done(function(data) {
                $("#modal-inscripcion").modal('hide');
                if (typeof data.success != 'undefined') {
                    $(".btnSubmitInscripcion").attr("disabled", false);
                    tableParticipantes.DataTable().ajax.reload(null, false);
                    Swal.fire({
                        icon: "success",
                        title: data.success,
                        showConfirmButton: false,
                        timer: 2500
                    });

                }

                if (typeof data.error != 'undefined') {
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