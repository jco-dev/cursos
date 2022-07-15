<?= $this->extend('verificar/base') ?>

<?= $this->section('title') ?>
Verificación de Inscripción
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <div class="text-center mb-5">
        <h1 class="text-dark text-uppercase mb-3">
            Verificación de Inscripción
        </h1>
        <div class="text-gray-400 fw-bold fs-4">
            <a href="<?= base_url() ?>" class="link-dark text-danger fw-bold">Cursos Posgrado</a>
        </div>
    </div>
    <div class="fv-row mb-5">
        <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
            <div class="flex-grow-1 me-2">
                <span class="d-block text-danger text-center text-uppercase fw-bolder" style="text-decoration: none">
                    Verificación incorrecta
                </span>
                <span class="d-block text-center text-danger fw-bold text-dark-75">
                    El código de verificación es incorrecto.
                    <br>
                </span>
                <p class="text-danger mt-3" style="text-align: justify">
                    Verifique que el código QR de la boleta no
                    tenga enmiendas ni raspaduras.
                </p>
            </div>
        </div>
    </div>
    <div class="text-center">
        <div class="text-center text-muted fw-bolder mb-5">
            ID utilizado para la Verificación
        </div>
        <div class="d-flex align-items-center bg-secondary rounded p-2 mb-7">
            <div class="flex-grow-1 me-2">
                <span class="text-center d-block p-0">
                    <em>4b7b2d4c6565d913939a290239e79b50</em>
                </span>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
