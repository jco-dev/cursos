<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cursos Posgrado UPEA</title>
    <meta charset="utf-8" />
    <meta name="description" content="Capacítate con nuestros Cursos Virtuales 100% prácticos" />
    <meta name="keywords" content="Cursos, Virtuales, Prácticos, Universidad, Posgrado, UPEA" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:title" content="Cursos Posgrado UPEA" />
    <meta property="og:url" content="https://cursosposgrado.upea.bo" />
    <meta property="og:site_name" content="Cursos Posgrado | UPEA" />
    <meta property="og:image" content="<?= base_url('assets/principal/logos/posgrado.png') ?>" />
    <link rel="shortcut icon" href="<?= base_url('assets/principal/logos/favicon.ico') ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="<?= base_url('assets/css/oferta/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/oferta/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/oferta/ribbon.min.css') ?>" rel="stylesheet" type="text/css" />
</head>

<body id="inicio" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
    <div class="d-flex flex-column flex-root">
        <!-- Header -->
        <div class="mb-0" id="home">
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg">
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center flex-equal">
                                <!-- Mobile menu toggle-->
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                                    <span class="svg-icon svg-icon-2hx">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
                                            <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </button>
                                <!-- Fin Mobile menu toggle-->
                                <!-- Logo -->
                                <a href="/">
                                    <img alt="Logo" src="<?= base_url('assets/principal/logos/logo.png') ?>" class="logo-default h-30px h-md-30px h-lg-45px" />
                                    <img alt="Logo" src="<?= base_url('assets/principal/logos/logo-dark.png') ?>" class="logo-sticky h-30px h-md-30px h-lg-45px" />
                                </a>
                                <!-- Logo -->
                            </div>
                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#inicio', lg: '#kt_header_nav_wrapper'}">
                                    <!--begin::Menu-->
                                    <?= view('ofertas/menu') ?>
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--Toolbar-->
                            <div class="flex-equal text-end ms-1">
                                <a href="<?= base_url(route_to('login')) ?>" class="btn btn-sm btn-success">Login</a>
                            </div>
                            <!--Toolbar-->
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                        <h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">
                            Porque tu formación <br />académica
                            <span style="background: linear-gradient(to right,#12ce5d 0%,#ffd80c 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                <span id="kt_landing_hero_text">nos interesa.</span>
                            </span>
                        </h1>
                        <a href="/" class="btn btn-primary" id="btn-cursos">Cursos Posgrado</a>
                    </div>
                    <?= view('ofertas/slider') ?>
                </div>
            </div>
            <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Header -->

        <!-- Cursos -->
        <div class="mb-n10 mb-lg-n20 z-index-2">
            <div class="container-fluid px-lg-15">
                <div class="text-center mb-15">
                    <h3 class="fs-2hx text-dark mb-5" id="cursos" data-kt-scroll-offset="{default: 100, lg: 150}">
                        Cursos Vigentes
                    </h3>
                    <div class="fs-5 text-muted fw-bold">
                        Prepárate para el futuro con nosotros
                    </div>
                </div>

                <div class="row mx-auto w-100 gy-10 mb-md-20">
                    <!-- aquí va la impresión de cards de cursos -->
                    <?= $curso ?>
                </div>

                <div class="text-center mb-5 mt-15">
                    <h3 class="fs-2hx text-dark mb-5" id="cursos" data-kt-scroll-offset="{default: 100, lg: 150}">
                        Cursos más Solicitados
                    </h3>
                    <div class="fs-5 text-muted fw-bold">
                        por nuestros participantes
                    </div>
                </div>
                <?= view('ofertas/cursos_frecuentes') ?>
            </div>
        </div>
        <!-- Cursos -->

        <!--Certificados-->
        <div class="mt-sm-n10">
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 -2 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
                </svg>
            </div>
            <div class="pb-15 pt-18 landing-dark-bg">
                <div class="container">
                    <div class="text-center mt-15 mb-18" id="certificacion" data-kt-scroll-offset="{default: 100, lg: 150}">
                        <h3 class="fs-2hx text-white fw-bolder mb-5">
                            Nuestros certificados cuentan con:
                        </h3>
                        <div class="fs-5 text-gray-700 fw-bold">
                            <div class="d-flex justify-content-center">
                                <div class="d-flex flex-column align-items-start">
                                    <li class="d-flex align-items-center py-2">
                                        <span class="bullet me-5"></span> Verificación QR &nbsp;<strong>(Online)</strong>
                                    </li>
                                    <li class="d-flex align-items-center py-2">
                                        <span class="bullet me-5"></span> Carga horaria
                                    </li>
                                    <li class="d-flex align-items-center py-2">
                                        <span class="bullet me-5"></span> Nombre impreso del participante
                                    </li>
                                    <li class="d-flex align-items-center py-2">
                                        <span class="bullet me-5"></span> Respaldo de nuestras autoridades.
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-center">
                        <div class="d-flex flex-wrap flex-center justify-content-lg-between mx-auto w-xl-900px">
                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="
                    background-image: url('assets/media/slider/octagon.svg');
                  ">
                                <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                                    </svg>
                                </span>
                                <div class="mb-0">
                                    <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="80" data-kt-countup-suffix="+">
                                            0
                                        </div>
                                    </div>
                                    <span class="text-gray-600 fw-bold fs-5 mx-1">Cursos</span>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/slider/octagon.svg');">
                                <span class="svg-icon svg-icon-2tx svg-icon-white mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z" fill="currentColor" />
                                        <path opacity="0.3" d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z" fill="currentColor" />
                                        <path opacity="0.3" d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <div class="mb-0">
                                    <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="5000" data-kt-countup-suffix="+">
                                            0
                                        </div>
                                    </div>
                                    <span class="text-gray-600 fw-bold fs-5 mx-1">Participantes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary">
                            <i class="fa fa-info"></i>
                            Verificar mi Certificado
                        </button>
                    </div>
                </div>
            </div>
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Certificados-->

        <!-- Cupon -->
        <div class="text-center py-5 py-lg-10">
            <div class="container">
                <div class="mb-0">
                    <h3 class="text-dark" id="cupon" data-kt-scroll-offset="{default: 100, lg: 150}"></h3>
                    <div class="row">
                        <div class="col-lg-12 p-10">
                            <div class="d-flex flex-column">
                                <img src="assets/media/cupon/50k-1.jpeg" class="mx-auto" width="300" alt="Imagen de cupón" />
                                <h3 class="mx-auto fw-bolder mt-2">
                                    ¡Obtén tu descuento ahora!
                                </h3>

                                <p class="text-gray-800 m-0 p-0">
                                    Consigue tus descuentos para tus próximas inscripciones en
                                    cualquiera de nuestros cursos.
                                </p>

                                <div class="d-flex justify-content-center">
                                    <div class="d-flex flex-column align-items-start">
                                        <li class="d-flex align-items-center py-2">
                                            <span class="bullet me-5"></span> Regístrate en el
                                            formulario.
                                        </li>
                                        <li class="d-flex align-items-center py-2">
                                            <span class="bullet me-5"></span> Obtén un cupón de
                                            descuento del &nbsp;<strong>30%</strong>.
                                        </li>
                                        <li class="d-flex align-items-center py-2">
                                            <span class="bullet me-5"></span> Comparte esta noticia
                                            con tus amig@s para que obtengan su cupón.
                                        </li>
                                    </div>
                                </div>

                                <h5 class="text-center mt-2 fw-bold">
                                    Cupón canjeable sólo en la inscripción de cualquiera de
                                    nuestros cursos validando el código.
                                </h5>
                                <p>
                                    📆 Promoción válida hasta:
                                    <strong>12-12-2022</strong>
                                </p>
                                <div id="cupon-fecha-fin"></div>
                            </div>
                            <button class="btn btn-primary px-10 px-md-px-5">
                                ¡OBTÉN TU CUPÓN AHORA!
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cupon -->
        <?= view('ofertas/footer') ?>
        <?= view('ofertas/scrolltop') ?>
    </div>

    <script src="<?= base_url('assets/js/oferta/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/oferta/scripts.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/expander/jquery.expander.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/expander/custom.js') ?>"></script>
    <script src="<?= base_url('assets/js/video/index.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/oferta/index.js') ?>"></script>
</body>

</html>