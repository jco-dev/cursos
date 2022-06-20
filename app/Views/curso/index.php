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
            <div class="card-toolbar">
               <a href="#" class="btn btn-primary font-weight-bolder">
                  <span class="svg-icon svg-icon-md">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect x="0" y="0" width="24" height="24" />
                           <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                           <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000" />
                        </g>
                     </svg>
                  </span>
                  </span>Nuevo Registro
               </a>
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
               <tbody>
                  
                  
               </tbody>
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
<!-- <script src="<?= base_url('assets/js/curso/index.js') ?>"></script> -->
<script>
   var DatatableCursos = function() {

   var init = function() {
      var table = $('#tbl_cursos');
      table.DataTable({
         responsive: true,
         paging: true,
         select:true,
         ajax: {
            url: "<?= base_url(route_to('curso-ajax-datatable')) ?>",
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
   DatatableCursos.init();
});
</script>
<?= $this->endSection() ?>