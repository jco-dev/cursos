<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cursos Posgrado UPEA | <?= $this->renderSection('title')?></title>
    <meta charset="utf-8" />
    <meta name="description" content="Capacítate con nuestros Cursos Virtuales 100% prácticos" />
    <meta name="keywords" content="Cursos, Virtuales, Prácticos, Universidad, Posgrado, UPEA" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:title" content="Cursos Posgrado UPEA" />
    <meta property="og:url" content="<?= base_url()?>" />
    <meta property="og:site_name" content="Cursos Posgrado | UPEA" />
    <meta property="og:image" content="<?= base_url('assets/principal/logos/posgrado.png')?>" />
    <link rel="shortcut icon" href="<?= base_url('assets/principal/logos/favicon.ico')?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="<?= base_url('assets/verificar/css/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/verificar/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="bg-dark">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="
					background-image: url(assets/principal/logos/14-dark.png);">
            <div class="d-flex flex-center flex-column flex-column-fluid p-5 pb-lg-20">
                <a href="/" class="mb-8">
                    <img alt="Logo Posgrado" src="<?= base_url('assets/principal/logos/logo.png')?>" class="h-50px" />
                </a>
                <?= $this->renderSection('content')?>
            </div>
            <div class="d-flex flex-center flex-column-auto p-10">
                <div class="d-flex align-items-center fw-bold">
                    <a href="https://cursosposgrado.upea.bo/" target="_blank" style="text-decoration: none;" class="text-muted px-2">Cursos Posgrado</a>
                    <a href="https://clic.upea.bo/r/contacto" target="_blank" style="text-decoration: none;" class="text-muted px-2">Contacto</a>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/verificar/js/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/verificar/js/scripts.bundle.js') ?>"></script>
</body>

</html>