<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cursos Posgrado UPEA | <?= $this->renderSection('title') ?></title>
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

    <link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/plugins/custom/prismjs/prismjs.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/admin/style.bundle.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/css/admin/themes/layout/header/base/light.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/admin/themes/layout/header/menu/light.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/admin/themes/layout/brand/light.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/admin/themes/layout/aside/dark.css') ?>" rel="stylesheet" type="text/css" />
    <?= $this->renderSection('css') ?>
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading">
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <a href="<?= base_url('principal') ?>">
            <img alt="Logo" src="<?= base_url('assets/principal/logos/logo1.png') ?>" width="90" />
        </a>

        <div class="d-flex align-items-center">
            <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                </span>
            </button>
        </div>

    </div>

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <div id="kt_header" class="header header-fixed">
                    <div class="container-fluid d-flex align-items-stretch justify-content-between" style="background-color: #f5f5f9;">
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <div class="header-logo">
                                <a href="<?= base_url('principal') ?>">
                                    <img alt="Logo" src="<?= base_url('assets/principal/logos/logo1.png') ?>" width="100" />
                                </a>
                            </div>

                            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                <?= $this->include('menu') ?>
                            </div>
                        </div>

                        <div class="topbar">
                            <div class="topbar-item">
                                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Bienvenido,</span>
                                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Juan Carlos Condori</span>
                                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                        <span class="symbol-label font-size-h5 font-weight-bold">J</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <?= $this->include('toolbar') ?>
                    <div class="d-flex flex-column-fluid">
                        <div class="container-fluid">
                            <?= $this->renderSection('content') ?>
                        </div>
                    </div>
                </div>
                <?= $this->include('footer') ?>
            </div>
        </div>
    </div>

    <?= $this->include('user') ?>
    <?= $this->include('scrolltop') ?>

    <script src="<?= base_url('assets/js/admin/config.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/global/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/custom/prismjs/prismjs.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/admin/scripts.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/cursos.js') ?>"></script>
    <?= $this->renderSection('js') ?>
</body>

</html>