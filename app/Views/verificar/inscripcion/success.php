<?= $this->extend('verificar/base') ?>

<?= $this->section('title') ?>
Verificación de Inscripción
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="w-lg-500px bg-body rounded shadow-sm p-5 p-lg-10 mx-auto">
    <div class="text-center mb-5">
        <h2 class="text-dark text-uppercase mb-3">
            Verificación de Inscripción
        </h2>
        <div class="text-gray-400 fw-bold fs-4">
            <a href="<?= base_url() ?>" class="link-dark text-danger fw-bold">Cursos Posgrado</a>
        </div>
    </div>
    <div class="fv-row mb-5">
        <div class="d-flex align-items-center bg-light-success rounded p-5">
            <div class="flex-grow-1 me-2">
                <span class="text-muted text-gray-900">Participante:</span>
                <span class="fw-bolder text-gray-900 text-center d-block">JUAN CARLOS CONDORI ZAPANA</span>
                <span class="d-block text-gray-900 pt-1">
                    Inscrito correctamente al curso:
                </span>
                <p class="fw-bolder text-gray-900 text-center d-block my-2 mx-2">COMPUTACIÓN - VERSIÓN V</p>
                <span class="text-muted d-block text-gray-900">
                    Que se realizará el:
                    <br />
                    <div class="bg-success d-block text-center text-white shadow-sm rounded-1 border-bottom border-gray-300" style="margin-left: 9px;">
                        20-05-1992 al 31-05-1992
                    </div>
                </span>

                <span class="text-muted d-block text-gray-900 pt-2">
                    Con una carga horaria de:
                    <br />
                    <span class="text-center d-block fw-bold">
                        180 horas académicas
                    </span>
                </span>
            </div>
        </div>
    </div>
    <div class="text-center">
        <div class="text-center text-muted fw-bolder mb-2">
            ID utilizado para la Verificación
        </div>
        <div class="d-flex align-items-center bg-secondary rounded p-3">
            <div class="flex-grow-1 me-2">
                <span class="text-center d-block p-0">
                    <em>4b7b2d4c6565d913939a290239e79b50</em>
                </span>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
