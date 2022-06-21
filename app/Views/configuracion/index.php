<?= $this->extend('base') ?>

<?= $this->section('title') ?>
Configuración
<?= $this->endSection() ?>

<?= $this->section('subtitle') ?>
Configuración de Cursos
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
                        Listado de configuración
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-separate table-head-custom table-checkable" id="tbl_configuracion" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>imagen</th>
                            <th>Curso</th>
                            <th>Nombre corto</th>
                            <th>nota(A)</th>
                            <th>carga horaria</th>
                            <th>banner</th>
                            <th>celular</th>
                            <th>inversión</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Límite</th>
                            <th>Certificación</th>
                            <th>descuento</th>
                            <th>Inicio descuento</th>
                            <th>Fin descuento</th>
                            <th>descripción</th>
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
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.js') ?>"></script>
<script src="<?= base_url('assets/js/widgets/bootstrap-select.min.js') ?>"></script>
<script>
    var DatatableConfiguracion = function() {

        var init = function() {
            var table = $('#tbl_configuracion');
            table.DataTable({
                    responsive: true,
                    paging: true,
                    select: true,
                    ajax: {
                        url: "<?= base_url(route_to('configuracion-ajax-datatable')) ?>",
                        type: "GET",
                    }
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
    });
</script>
<?= $this->endSection() ?>