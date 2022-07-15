<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cursos Posgrado UPEA | Información</title>
    <meta charset="utf-8" />
    <meta name="description" content="Capacítate con nuestros Cursos Virtuales 100% prácticos" />
    <meta name="keywords" content="Cursos, Virtuales, Prácticos, Universidad, Posgrado, UPEA" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:title" content="Cursos Posgrado UPEA" />
    <meta property="og:url" content="https://cursosposgrado.upea.bo" />
    <meta property="og:site_name" content="Cursos Posgrado | UPEA" />
    <meta property="og:image" content="<?= base_url('assets/principal/logos/posgrado.png') ?>" />
    <link rel="shortcut icon" href="<?= base_url('assets/principal/logos/favicon.ico') ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="<?= base_url('assets/css/informacion/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/informacion/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/informacion/index.css') ?>" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
    <div class="container-fluid p-0 m-0 pt-5" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="min-height: 91vh;">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl p-0">
                    <div class="card">
                        <div class="card card-custom p-0" style="border: 2px solid #000000">
                            <div class="card-body p-0">
                                <img src="<?= base_url($configuracion[0]->banner) ?>" alt="Banner del curso" class="img-fluid rounded" style="width: 100%; height: 170px" />
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="card card-custom" style="border-top: 7px solid #0f1761">
                        <div class="card-body">
                            <div class="fv-row mb-1">
                                <div class="col-md-12 fv-row">
                                    <h6 class="card-label border-left-info text-uppercase pb-2" style="text-align: justify;">
                                        <?= $configuracion[0]->descripcion ?>
                                    </h6>
                                    <div class="separator separator-dashed separator-content border-dark my-5">
                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                            <img src="<?= base_url('assets/img/inscripcion/cursos.svg') ?>" class="h-30px" alt="Logo Cursos Posgrado" />
                                        </span>
                                    </div>
                                    <label class="fs-6 fw-bold text-danger form-label required">Obligatorio</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-6">
                        <div class="card-body">
                            <form class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate" id="frm-informacion" method="POST" action="<?= base_url(route_to('guardar-informacion')) ?>">
                                <div class="w-100">
                                    <div class="pb-5 pb-lg-5">
                                        <h2 class="fw-bolder text-dark">
                                            Ingrese sus datos
                                        </h2>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <div class="col-md-12 fv-row">
                                            <div class="row fv-row">
                                                <div class="col-lg-6 col-sm-12 mt-2">
                                                    <input type="hidden" name="id" id="id" value="<?= $id ?>" />
                                                    <label class="fs-6 fw-bold form-label required" for="celular">Número de celular(con WhatsApp)</label>
                                                    <input type="number" name="celular" id="celular" class="form-control form-control-solid" maxlength="8" placeholder="Tu respuesta" required />
                                                </div>
                                                <div class="col-lg-6 col-sm-12 mt-2">
                                                    <label class="fs-6 fw-bold form-label required" for="celular">Nombre(s)</label>
                                                    <input type="text" name="nombre" id="nombre" class="form-control form-control-solid" placeholder="Tu respuesta" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button id="frm-informacion-button" type="submit" class="btn" style="background-color: #26CC64; color: #fff; border-radius: 4px;">
                                        <span class="indicator-label text-white">
                                            <i class="fab fa-whatsapp text-white"></i>
                                            Regístrate
                                        </span>
                                        <span class="indicator-progress">
                                            Enviando... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-bold me-1">2021-2022©</span>
                    <a href="/" target="_blank" class="text-gray-800 text-hover-primary">Cursos Posgrado UPEA</a>
                </div>
                <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1 align-items-center mb-3 mb-md-0">
                    <li class="menu-item">
                        <a href="https://www.youtube.com/channel/UCjxTWaVkWbP6j8rYRGiShsw" target="_blank" class="menu-link px-3">
                            <img alt="Cursos Posgrado Youtube" src="<?= base_url('assets/img/inscripcion/youtube.svg') ?>" class="h-25px" />
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="https://www.facebook.com/cursosposgradoupea" target="_blank" class="menu-link px-3">
                            <img alt="Cursos Posgrado Facebook" src="<?= base_url('assets/img/inscripcion/facebook.svg') ?>" class="h-20px" />
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="https://www.tiktok.com/@cursosposgrado_upea" target="_blank" class="menu-link px-3">
                            <img alt="Cursos Posgrado Tiktok" src="<?= base_url('assets/img/inscripcion/tiktok.svg') ?>" class="h-25px" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/informacion/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/informacion/scripts.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/informacion/index.js') ?>"></script>
</body>

</html>