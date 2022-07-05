<?= $this->extend('base') ?>

<?= $this->section('title') ?>
Principal
<?= $this->endSection() ?>

<?= $this->section('subtitle') ?>
Inicio
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!--begin::Dashboard-->
<!--begin::Row-->
<div class="row">
	<div class="col-lg-12 col-xxl-12">
		<div class="row m-0">
			<div class="col bg-danger px-6 py-8 rounded-xl mr-7 mb-7">
				<span class="svg-icon svg-icon-3x svg-icon-white d-block my-2">
					<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<polygon points="0 0 24 0 24 24 0 24" />
							<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
							<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
						</g>
					</svg>
					<!--end::Svg Icon-->
				</span>
				<a href="#" class="text-white font-weight-bold font-size-h6">Más de 5500 participantes registrados</a>
			</div>
			<div class="col bg-warning px-6 py-8 rounded-xl mb-7">
				<span class="svg-icon svg-icon-3x svg-icon-white d-block my-2">
					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->

					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
							<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
							<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
							<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
						</g>
					</svg>
					<!--end::Svg Icon-->
				</span>
				<a href="<?= base_url('curso') ?>" class="text-white font-weight-bold font-size-h6 mt-2">Más de 80 cursos registrados</a>
			</div>
		</div>
	</div>
	<div class="col-lg-12 col-xxl-12">
		<!--begin::List Widget 9-->
		<div class="card card-custom card-stretch gutter-b">
			<!--begin::Header-->
			<div class="card-header align-items-center border-0 mt-4">
				<h3 class="card-title align-items-start flex-column">
					<span class="font-weight-bolder text-dark">Participantes que en más cursos se han registrado</span>
					<span class="text-muted mt-3 font-weight-bold font-size-sm">5500 participantes</span>
				</h3>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body pt-4">
				<div class="table-responsive">
					<table class="table table-rounded table-row-bordered border my-5 gy-7 gs-7" style="width: 100%;">
						<thead>
							<tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
								<th>Participante</th>
								<th>Cantidad</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Juan Carlos Condori Zapana</td>
								<td>5</td>
								<td>
									<button class="btn btn-primary btn-sm">
										<i class="fas fa-1x fa-eye"></i>
										Detalles
									</button>
								</td>
							</tr>

							<tr>
								<td>Juan Carlos Condori Zapana</td>
								<td>5</td>
								<td>
									<button class="btn btn-primary btn-sm">
										<i class="fas fa-1x fa-eye"></i>
										Detalles
									</button>
								</td>
							</tr>

							<tr>
								<td>Juan Carlos Condori Zapana</td>
								<td>5</td>
								<td>
									<button class="btn btn-primary btn-sm">
										<i class="fas fa-1x fa-eye"></i>
										Detalles
									</button>
								</td>
							</tr>

						</tbody>
					</table>

				</div>
			</div>
			<!--end: Card Body-->
		</div>
		<!--end: List Widget 9-->
	</div>
</div>
<!--end::Row-->
<!--end::Dashboard-->
<?= $this->endSection() ?>