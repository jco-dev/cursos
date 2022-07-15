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

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #ff9d0a">
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <a href="/" class="py-9 mb-5">
                            <img alt="Logo" src="<?= base_url('assets/principal/logos/logo-dark.png') ?>" class="h-60px" />
                        </a>
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #fff;">¡Bienvenido!</h1>
                    </div>
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(assets/principal/logos/13.png);"></div>
                </div>
            </div>

            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="<?= base_url(route_to('autentificar')) ?>">
                            <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">Iniciar Sesión</h1>
                                <div class="text-gray-400 fw-bold fs-4">
                                    <a href="/" class="link-primary fw-bolder">cursos posgrado</a>
                                </div>
                            </div>
                            <div class="fv-row mb-10">
                                <label for="username" class="form-label fs-6 fw-bolder text-dark required">Usuario</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="username" id="username" autocomplete="off" />
                            </div>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <label for="password" class="form-label fw-bolder text-dark fs-6 mb-0 required">Contraseña</label>
                                    <a href="" class="link-primary fs-6 fw-bolder">Has olvidado tu contraseña ?</a>
                                </div>
                                <input class="form-control form-control-lg form-control-solid" type="password" name="password" id="password" autocomplete="off" />
                            </div>
                            <div class="text-center">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Continuar</span>
                                    <span class="indicator-progress">Espere por favor...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <div class="text-center text-muted text-uppercase fw-bolder mb-5">o</div>
                                <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                    <img alt="Logo" src="<?= base_url('assets/principal/logos/google-icon.svg') ?>" class="h-20px me-3" />Continuar con Google</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                    <div class="d-flex flex-center fw-bold fs-6">
                        <a href="javascript:;" class="text-muted text-hover-primary px-2">Acerca de</a>
                        <a href="https://clic.upea.bo/r/contacto" class="text-muted text-hover-primary px-2" target="_blank">Contacto</a>
                        <a href="/" class="text-muted text-hover-primary px-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/oferta/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/oferta/scripts.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/login/index.js')?>"></script>
</body>

</html>