<?= $this->extend('base') ?>

<?= $this->section('title') ?>
Listado Cursos
<?= $this->endSection() ?>

<?= $this->section('subtitle') ?>
Cursos
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row gy-5 g-xl-8">
   <div class="container-fluid">
      <!--begin::Card-->
      <div class="card card-custom">
         <div class="card-header">
            <div class="card-title">
               <h3 class="card-label">
                  Listado de cursos
               </h3>
            </div>
         </div>
         <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="tbl_cursos" style="width: 100%;">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>nombre curso</th>
                     <th>nombre corto</th>
                     <th>certificado</th>
                     <th>inscritos</th>
                     <th>preinscritos</th>
                     <th>módulos</th>
                     <th>creado</th>
                     <th>informe</th>
                     <th>Acciones</th>
                  </tr>
               </thead>
               <tbody></tbody>
            </table>
            <!--end: Datatable-->
         </div>
      </div>
      <!--end::Card-->
   </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.js') ?>"></script>
<script>
   var DatatableCursos = function() {

      var init = function() {
         var table = $('#tbl_cursos');
         table.DataTable({
            responsive: true,
            paging: true,
            select: true,
            ajax: {
               url: "<?= base_url(route_to('curso-ajax-datatable')) ?>",
               type: "GET",
            }
         });

         $(document).on('click', 'a#btn-inscripcion', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
               url: "<?= base_url(route_to('inscripcion-participante')) ?>",
               type: "POST",
               data: {
                  id: id
               },
               success: function(response) {
                  if (typeof response.exito != "undefined") {
                     table.DataTable().ajax.reload(null, false);
                     Swal.fire("Exito!", response.exito, "success");
                  }
                  if (typeof response.error != "undefined") {
                     Swal.fire("Error!", response.error, "error");
                  }

                  if (typeof response.warning != "undefined") {
                     Swal.fire("Advertencia!", response.warning, "warning");
                  }
               }
            });
         }).on('click', 'a#btn-imprimir-certificados', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let url = $(this).attr('href');

            $.post(url, {
               id
            }, function(response) {
               if (response.fecha_inicio === null || response.fecha_fin === null || response.fecha_certificacion === null) {
                  Swal.fire("Error!", "No se puede imprimir los certificados, faltan configurar las fechas.", "error");
               } else if (new Date(response.fecha_fin).getTime() > new Date(response.fecha_inicio).getTime() &&
                  new Date(response.fecha_certificacion).getTime() > new Date(response.fecha_fin).getTime()) {
                     Swal.fire({
                        title: 'Seleccione',
                        text: 'Seleccione la letra A delante del nombre del participante',
                        input: 'select',
                        inputOptions:{
                           imprimir_a:{
                              SI: 'SI',
                              NO: 'NO'
                           }
                        },
                        showCancelButton: true,
                        inputValidator: (imprimir_a) =>{
                           return new Promise((resolve) => {
                              resolve();
                              $.post("<?= base_url(route_to('imprimir-certificados'))?>", {id, imprimir_a}, function(response){
                                 console.log(response)
                              });
                           })
                        }
                     });
               } else {
                  Swal.fire("Error!", "No se puede imprimir los certificados, las fechas no son correctas.", "error");
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
      DatatableCursos.init();
   });
</script>
<?= $this->endSection() ?>