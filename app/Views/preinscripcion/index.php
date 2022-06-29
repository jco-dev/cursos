<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cursos Posgrado UPEA | Inscripcion Curso Moodle</title>
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
    <link href="<?= base_url('assets/css/inscripcion/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/inscripcion/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/inscripcion/index.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/viewerjs/css/viewer.css') ?>" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
    <div class="container-fluid p-0 m-0 pt-5" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
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
                                    <h6 class="card-label border-left-info text-uppercase pb-5" style="text-align: justify;">
                                        <?= $configuracion[0]->descripcion ?>
                                    </h6>
                                    <div class="separator separator-dashed separator-content border-dark my-5">
                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                            <img src="<?= base_url('assets/img/inscripcion/cursos.svg') ?>" class="h-30px" alt="Logo Cursos Posgrado" />
                                        </span>
                                    </div>

                                    <div class="row fv-row pt-2">
                                        <div class="col-lg-9 col-sm-12">
                                            <div class="lh-lg mb-2">
                                                <?php if ($configuracion[0]->fecha_limite_inscripcion >= date('Y-m-d')) { ?>
                                                    &nbsp;🪙 <strong>INVERSIÓN</strong>:
                                                    <?php if (strtotime(date('d-m-Y')) >= strtotime($configuracion[0]->fecha_inicio_descuento) && strtotime(date('d-m-Y')) <= strtotime($configuracion[0]->fecha_fin_descuento) && $configuracion[0]->descuento > 0) { ?>
                                                        <span class="fw-normal"><del class="text-danger">Bs. <?= $configuracion[0]->inversion ?></del>
                                                            <span class="fw-bold">Bs. <?= intval(($configuracion[0]->inversion) - ($configuracion[0]->inversion * $configuracion[0]->descuento / 100)) ?></span>
                                                        </span>
                                                        <span class="font-size-md font-weight-normal text-primary">
                                                            (descuento de
                                                            <span class="text-primary fw-bold"><?= $configuracion[0]->descuento ?>%
                                                            </span>
                                                            hasta <?= $configuracion[0]->fecha_fin_descuento ?>)
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="fw-bold">Bs. <?= $configuracion[0]->inversion ?></span>
                                                    <?php } ?>
                                                <?php } ?>
                                                <br />&nbsp; ▶️ <strong>OPCIONES DE PAGO</strong>:
                                                <ol>
                                                    <li>
                                                        Transferencia bancaria o depósito a los
                                                        siguientes números de cuenta (Iván Jhonny Mejia Baltazar - 9061397 LP):
                                                        <ul>
                                                            <li>
                                                                10000044162084 - Banco Unión.
                                                            </li>
                                                            <li>
                                                                4071112506 - Banco Mercantil Santa Cruz
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        Transferencia a Tigo Money
                                                        <span class="font-size-md font-weight-normal">
                                                            <span class="font-weight-bold">Bs. 90</span>
                                                        </span>
                                                        al número (Incluir comisigón 4 Bs): 📲
                                                        76209205 (Brayan Condori Choque).
                                                    </li>
                                                    <li>
                                                        Haciendo el pago directamente en nuestra
                                                        oficina: Edificio Emblemático UPEA, 3er
                                                        piso, Oficina 3 de Posgrado.
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12">
                                            <div class="card">
                                                <h4>
                                                    <span class="font-size-md font-weight-normal text-dark d-flex justify-content-center">PAGO RÁPIDO</span>
                                                </h4>
                                                <div class="card card-custom p-0">
                                                    <div class="card-body p-0 d-flex justify-content-center">
                                                        <?php if (strtotime(date('d-m-Y')) >= strtotime($configuracion[0]->fecha_inicio_descuento) && strtotime(date('d-m-Y')) <= strtotime($configuracion[0]->fecha_fin_descuento) && $configuracion[0]->descuento > 0) { ?>
                                                            <img src="<?= base_url($configuracion[0]->pago_qr_descuento) ?>" alt="Pago rápido" class="img-fluid rounded" style="width: auto; height: 157px; border: 2px solid #000000" />
                                                        <?php } else { ?>
                                                            <img src="<?= base_url($configuracion[0]->pago_qr) ?>" alt="Pago rápido" class="img-fluid rounded" style="width: auto; height: 157px; border: 2px solid #000000" />
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="card">
                        <div class="card-body">
                            <div class="stepper" id="preinscripcion_stepper">
                                <!--begin::Nav-->
                                <div class="stepper-nav mb-5">
                                    <div class="stepper-item current" data-kt-stepper-element="nav"></div>
                                    <div class="stepper-item" data-kt-stepper-element="nav"></div>
                                    <div class="stepper-item" data-kt-stepper-element="nav"></div>
                                    <div class="stepper-item" data-kt-stepper-element="nav"></div>
                                </div>
                                <form class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate" id="frm-preinscripcion" method="POST" action="<?= base_url(route_to('guardar-preinscripcion')) ?>" enctype="multipart/form-data">
                                    <div class="current" data-kt-stepper-element="content">
                                        <div class="w-100">
                                            <div class="pb-5 pb-lg-5">
                                                <h2 class="fw-bolder text-dark">
                                                    DATOS PERSONALES
                                                </h2>
                                            </div>
                                            <div class="fv-row mb-10">
                                                <div class="col-md-12 fv-row">
                                                    <label class="required fs-6 fw-bold form-label mb-2" for="ci">Carnet de Identidad</label>
                                                    <div class="row fv-row">
                                                        <div class="col-lg-8 col-sm-12 mt-2">
                                                            <input type="text" name="ci" id="ci" class="form-control form-control-solid" placeholder="Solamente número sin expedido" required />
                                                        </div>
                                                        <div class="col-lg-4 col-sm-12 mt-2">
                                                            <select name="expedido" id="expedido" class="form-select form-select-solid" data-control="select2" data-placeholder="Expedido" data-allow-clear="true" required>
                                                                <option value="">Elige</option>
                                                                <option value="QR">Nueva cédula con código QR</option>
                                                                <option value="LP">La Paz</option>
                                                                <option value="OR">Oruro</option>
                                                                <option value="PT">Potosí</option>
                                                                <option value="CB">Cochabamba</option>
                                                                <option value="CH">Chuquisaca</option>
                                                                <option value="TJ">Tarija</option>
                                                                <option value="SC">Santa Cruz</option>
                                                                <option value="BE">Beni</option>
                                                                <option value="PD">Pando</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="fv-row mb-10">
                                                <label class="fs-6 fw-bold form-label required" for="email">Dirección de correo electrónico</label>
                                                <input type="email" name="correo" id="correo" class="form-control form-control-solid" placeholder="Tu dirección de correo electrónico" required />
                                            </div>

                                            <div class="fv-row mb-10">
                                                <label class="fs-6 fw-bold form-label required" for="nombre">Nombre(s)</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control form-control-solid" placeholder="Tu respuesta" required />
                                            </div>

                                            <div class="fv-row mb-10">
                                                <label class="fs-6 fw-bold form-label" for="paterno">Apellido Paterno</label>
                                                <input type="text" name="paterno" id="paterno" class="form-control form-control-solid" placeholder="Tu respuesta" />
                                            </div>

                                            <div class="fv-row mb-10">
                                                <label class="fs-6 fw-bold form-label" for="materno">Apellido Materno</label>
                                                <input type="text" name="materno" id="materno" class="form-control form-control-solid" placeholder="Tu respuesta" />
                                            </div>

                                            <div class="fv-row mb-10">
                                                <label class="required fw-bold fs-6 mb-5" for="genero">Género</label>
                                                <div class="d-flex flex-column fv-row">
                                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                                        <input class="form-check-input me-3" name="genero" id="genero" type="radio" value="M" id="kt_docs_formvalidation_radio_option_1" checked />
                                                        <label class="form-check-label" for="kt_docs_formvalidation_radio_option_1">
                                                            <div class="fw-bolder text-gray-500">
                                                                Masculino
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                                        <input class="form-check-input me-3" name="genero" id="genero" type="radio" value="F" id="kt_docs_formvalidation_radio_option_2" />
                                                        <label class="form-check-label" for="kt_docs_formvalidation_radio_option_2">
                                                            <div class="fw-bolder text-gray-500">
                                                                Femenino
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="fv-row mb-10">
                                                <div class="col-md-12 fv-row">
                                                    <label class="required fs-6 fw-bold form-label mb-2">Fecha de Nacimiento</label>
                                                    <div class="row fv-row" id="fecha">
                                                        <div class="col-4">
                                                            <select name="gestion" id="gestion" class="form-select form-select-solid" data-control="select2" data-placeholder="Año" data-allow-clear="true" required>
                                                                <option></option>
                                                                <?php
                                                                $gestion = intval(date('Y')) - 10;
                                                                for ($i = 0; $i < 100; $i++) {
                                                                    echo "<option value=" . $gestion . ">" . $gestion . "</option>";
                                                                    $gestion--;
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-4">
                                                            <select name="mes" id="mes" class="form-select form-select-solid" data-control="select2" data-placeholder="Mes" data-allow-clear="true" disabled required>
                                                                <option></option>
                                                                <option value="01">Enero</option>
                                                                <option value="02">Febrero</option>
                                                                <option value="03">Marzo</option>
                                                                <option value="04">Abril</option>
                                                                <option value="05">Mayo</option>
                                                                <option value="06">Junio</option>
                                                                <option value="07">Julio</option>
                                                                <option value="08">Agosto</option>
                                                                <option value="09">Septiembre</option>
                                                                <option value="10">Octubre</option>
                                                                <option value="11">Noviembre</option>
                                                                <option value="12">Diciembre</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-4">
                                                            <select name="dia" id="dia" class="form-select form-select-solid" data-control="select2" data-placeholder="Día" data-allow-clear="true" disabled required>
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="fv-row mb-10">
                                                <label class="fs-6 fw-bold form-label required" for="celular">Numero de celular(con WhatsApp)</label>
                                                <input type="number" name="celular" id="celular" class="form-control form-control-solid" maxlength="8" placeholder="Tu respuesta" required />
                                            </div>

                                            <div class="fv-row mb-10">
                                                <label class="required form-label fs-6 mb-2" for="ciudad_residencia">Cuidad de residencia</label>
                                                <select class="form-select form-select-solid" name="ciudad_residencia" id="ciudad_residencia" data-control="select2" data-allow-clear="true" data-placeholder="Elige" required>
                                                    <option></option>
                                                    <?php
                                                    foreach ($municipios as $key => $municipio) {
                                                        echo "<option value='" . $municipio->id_municipio . "'>" . $municipio->nombre_departamento . " - " . $municipio->nombre_municipio . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-kt-stepper-element="content">
                                        <div class="w-100">
                                            <div class="pb-5 pb-lg-5">
                                                <h2 class="fw-bolder text-dark">
                                                    PAGO DEL CURSO
                                                </h2>
                                            </div>
                                            <div class="d-flex flex-column mb-1 fv-row">
                                                <div class="mb-10">
                                                    <label class="required fw-bold fs-6 mb-5">Modalidad de Inscripción</label>
                                                    <div class="d-flex flex-column fv-row">
                                                        <label class="form-check form-check-custom form-check-solid mb-3">
                                                            <input type="radio" class="form-check-input" name="modalidad_inscripcion" id="modalidad_inscripcion" value="TIGO MONEY" />
                                                            <span class="form-check-label" style="margin-right: 6px;"></span>
                                                            <div class="fw-bolder pointer text-gray-500" style="cursor:pointer">Tigo Money</div>
                                                        </label>
                                                        <label class="form-check form-check-custom form-check-solid mb-3">
                                                            <input type="radio" class="form-check-input" name="modalidad_inscripcion" id="modalidad_inscripcion" value="DEPOSITO BANCARIO" />
                                                            <span class="form-check-label" style="margin-right: 6px;"></span>
                                                            <div class="fw-bolder pointer text-gray-500" style="cursor:pointer">Depósito o transferencia bancaria</div>
                                                        </label>
                                                        <label class="form-check form-check-custom form-check-solid mb-1">
                                                            <input type="radio" class="form-check-input" name="modalidad_inscripcion" id="modalidad_inscripcion" value="PAGO EFECTIVO" />
                                                            <span class="form-check-label" style="margin-right: 6px;"></span>
                                                            <div class="fw-bolder pointer text-gray-500" style="cursor:pointer">Pago Efectivo</div>
                                                        </label>
                                                    </div>
                                                    <div id="banco" class="fv-row">
                                                        <hr>
                                                        <select id='id_banco' name='id_banco' class='form-select form-select-solid' data-minimum-results-for-search="Infinity" data-control="select2" data-allow-clear="false" required>
                                                            <option value=''> Seleccione un Banco </option>
                                                            <?php
                                                            foreach ($bancos as $key => $banco) {
                                                                echo "<option value='" . $banco->id_banco . "'>" . $banco->nombre . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <label class="required fs-6 fw-bold form-label mb-2">Nro. de Transacción o Depósito</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control form-control-solid" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" pattern="[0-9]*" placeholder="Tu respuesta" name="nro_transaccion" id="nro_transaccion" required />
                                                    <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                        <img src="<?= base_url('assets/img/inscripcion/tigo-money.png') ?>" alt="" class="h-25px" />
                                                        <img src="<?= base_url('assets/img/inscripcion/banco_union.png') ?>" alt="" class="h-25px" />
                                                        <img src="<?= base_url('assets/img/inscripcion/mercantil.png') ?>" alt="" class="h-25px" />
                                                        <!-- <img src="assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" /> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fv-row mb-10">
                                                <label class="fs-6 fw-bold form-label required">Fecha Pago</label>
                                                <input type="date" id="fecha_pago" name="fecha_pago" class="form-control form-control-solid" value="<?= date("Y-m-d") ?>" required />
                                            </div>

                                            <div class="d-flex flex-column mb-7 fv-row" id="card-cupon">
                                                <div class="mb-10" id="card-cupon-body">
                                                </div>
                                            </div>

                                            <div class="fv-row mb-10">
                                                <div class="col-md-12 fv-row">
                                                    <div class="row fv-row">
                                                        <div class="col-8">
                                                            <label class="required fs-6 fw-bold form-label mb-2">Monto Pago en Bolivianos</label>
                                                            <input type="number" name="monto_pago" id="monto_pago" class="form-control form-control-lg form-control-solid" min="50" max="1000" require />
                                                            <div class="form-text-costo fs-7 font-weight-bold"></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label class="fs-6 fw-bold form-label mb-2">Costo del Curso</label>
                                                            <?php if (strtotime(date('d-m-Y')) >= strtotime($configuracion[0]->fecha_inicio_descuento) && strtotime(date('d-m-Y')) <= strtotime($configuracion[0]->fecha_fin_descuento) && $configuracion[0]->descuento > 0) { ?>
                                                                <input type="text" id="costo_curso" value="Bs. <?= intval(($configuracion[0]->inversion) - ($configuracion[0]->inversion * $configuracion[0]->descuento / 100)) ?>" class="form-control form-control-solid" disabled>
                                                            <?php } else { ?>
                                                                <input type="text" id="costo_curso" value="Bs. <?= intval($configuracion[0]->inversion) ?>" class="form-control form-control-solid" disabled>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fv-row mb-7">
                                                <label class="col-form-label text-lg-right">Respaldo de la transacción (Subir fotografía o captura del depósito o transacción) <span class="text-danger">(*)</span></label>
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" id="respaldo_transaccion" name="respaldo_transaccion" accept="image/jpeg,image/png, image/jpg" />
                                                </div>
                                                <div class="form-text">
                                                    Tipos de archivos permitidos: jpg, jpeg, png.
                                                </div>
                                                <div class="d-flex justify-content-center mt-3">

                                                    <div class="container d-none text-center">
                                                        <div id="galley">
                                                            <ul class="pictures" style="list-style: none;">
                                                                <li>
                                                                    <img style="cursor: pointer;" class="img img-thumbnail" width="200" height="200" data-original="<?= base_url('assets/img/default.jpg') ?>" src="" id="img-preview" />
                                                                    <i style="cursor: pointer;" class="fa fa-eye text-info"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div data-kt-stepper-element="content">
                                        <div class="w-100">
                                            <div class="pb-5 pb-lg-5">
                                                <h2 class="fw-bolder text-dark">
                                                    CERTIFICACIÓN
                                                </h2>
                                            </div>
                                            <div class="mb-10">
                                                <label class="required fw-bold fs-6 mb-5">Solicite el tipo de certificado</label>
                                                <div class="d-flex flex-column fv-row">
                                                    <label class="form-check form-check-custom form-check-solid mb-3">
                                                        <input type="radio" class="form-check-input" name="tipo_certificado_solicitado" id="tipo_certificado_solicitado" value="DIGITAL" />
                                                        <span class="form-check-label" style="margin-right: 6px;"></span>
                                                        <div class="fw-bolder pointer text-gray-500" style="cursor:pointer">Digital</div>
                                                    </label>
                                                    <label class="form-check form-check-custom form-check-solid mb-3">
                                                        <input type="radio" class="form-check-input" name="tipo_certificado_solicitado" id="tipo_certificado_solicitado" value="FISICO" />
                                                        <span class="form-check-label" style="margin-right: 6px;"></span>
                                                        <div class="fw-bolder pointer text-gray-500" style="cursor:pointer">F&iacute;sico</div>
                                                    </label>
                                                    <label class="form-check form-check-custom form-check-solid mb-3">
                                                        <input type="radio" class="form-check-input" name="tipo_certificado_solicitado" id="tipo_certificado_solicitado" value="AMBOS" checked />
                                                        <span class="form-check-label" style="margin-right: 6px;"></span>
                                                        <div class="fw-bolder pointer text-gray-500" style="cursor:pointer">Ambos</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-10">
                                                <label class="required fw-bold fs-6 mb-5">Certificación</label>
                                                <div class="d-flex flex-column fv-row">
                                                    <label class="form-check form-check-custom form-check-solid mb-3">
                                                        <input type="radio" class="form-check-input" name="certificacion" id="certificacion" value="CURSO" <?= (count($modulos) === 0) ? 'checked' : '' ?> />
                                                        <span class="form-check-label" style="margin-right: 6px;"></span>
                                                        <div class="fw-bolder pointer text-gray-500" style="cursor:pointer">Por curso de <?= $configuracion[0]->carga_horaria ?> horas académicas. </div>
                                                    </label>
                                                    <?php
                                                    $listar = null;
                                                    foreach ($modulos as $key => $module) {
                                                        if (count($modulos) > 1) {
                                                            if ($key == count($modulos) - 2) {
                                                                $listar .= ucwords(strtolower($module->nombre_modulo)) . ' y ';
                                                            } else {
                                                                $listar .= ucwords(strtolower($module->nombre_modulo)) . ', ';
                                                            }
                                                        } else {
                                                            $listar .= ucwords(strtolower($module->nombre_modulo));
                                                        }
                                                    }
                                                    $l = rtrim($listar, ', ');
                                                    ?>
                                                    <?php if (count($modulos) > 0) { ?>
                                                        <label class="form-check form-check-custom form-check-solid mb-3">
                                                            <input type="radio" class="form-check-input" name="certificacion" id="certificacion" value="MÓDULOS" <?= (count($modulos) === 0) ? 'checked' : '' ?> />
                                                            <span class="form-check-label" style="margin-right: 6px;"></span>
                                                            <div class="fw-bolder pointer text-gray-500" style="cursor:pointer">Por módulos&nbsp;(<?= $l ?>)
                                                                de <?= $configuracion[0]->carga_horaria / count($modulos) ?> horas académicas cada uno.</div>
                                                        </label>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-kt-stepper-element="content">
                                        <div class="w-100">
                                            <div class="mb-0">
                                                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed m-10 mb-2 mt-0 p-2">
                                                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                                                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <div class="d-flex flex-stack flex-grow-1">
                                                        <div class="fw-bold">
                                                            <h4 class="text-gray-900 fw-bolder m-0">
                                                                ¡Revise sus datos antes de enviar!
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-3">
                                                <ul class="list-group">
                                                    <li class="list-group-item active" style="list-style: none;"><strong>1. DATOS PERSONALES</strong></li>
                                                    <li class="list-group-item">
                                                        <strong>Carnet de Identidad:&nbsp;</strong> <span id="m_ci"></span> <span id="m_expedido"></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Nombres:&nbsp;</strong> <span id="m_nombre"></span> <span id="m_paterno"></span> <span id="m_materno"></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Correo:&nbsp;</strong>
                                                        <span id="m_correo"></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>N&uacute;mero celular: &nbsp;</strong>
                                                        <span id="m_celular"></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Fecha Nacimiento (YYYY-MM-DD): </strong>
                                                        <span id="m_gestion"></span>-<span id="m_mes"></span>-<span id="m_dia"></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Ciudad residencia: &nbsp;</strong>
                                                        <span id="m_ciudad_residencia"></span>
                                                    </li>
                                                    <li class="list-group-item active">
                                                        <strong>2. PAGO DEL CURSO</strong>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Modalidad Inscripci&oacute;n:</strong>&nbsp;
                                                        <span id="m_modalidad_inscripcion"></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Nº Transacci&oacute;n:</strong>&nbsp;
                                                        <span id="m_nro_transaccion"></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Fecha Pago (YYYY-MM-DD): &nbsp;</strong>
                                                        <span id="m_fecha_pago"><?= date("Y-m-d") ?></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Monto Pago:&nbsp;</strong>
                                                        <span id="m_monto_pago"></span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Cupón:&nbsp;</strong>
                                                        <span id="m_cupon_participante"></span>
                                                    </li>
                                                    <li class="list-group-item active"><strong>3. RECOJO DEL CERTIFICADO</strong></li>
                                                    <li class="list-group-item">
                                                        <strong>Tipo certificado solicitado:</strong>
                                                        <span id="m_tipo_certificado_solicitado">Ambos</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Certificado:</strong>
                                                        <span id="m_certificacion"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-stack">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                                        <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Atras
                                            </button>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                                                <span class="indicator-label">Enviar
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                    <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="indicator-progress">Cargando...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">
                                                Siguiente
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-bold me-1">2021-2022©</span>
                    <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Cursos Posgrado UPEA</a>
                </div>
                <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1 align-items-center mb-3 mb-md-0">
                    <li class="menu-item">
                        <a href="https://www.youtube.com/channel/UCjxTWaVkWbP6j8rYRGiShsw" target="_blank" class="menu-link px-3">
                            <img alt="Keenthemes Youtube" src="<?= base_url('assets/img/inscripcion/youtube.svg') ?>" class="h-25px" />
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="https://www.facebook.com/cursosposgradoupea" target="_blank" class="menu-link px-3">
                            <img alt="Keenthemes Facebook" src="<?= base_url('assets/img/inscripcion/facebook.svg') ?>" class="h-20px" />
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="https://www.tiktok.com/@cursosposgrado_upea" target="_blank" class="menu-link px-3">
                            <img alt="Keenthemes tiktok" src="<?= base_url('assets/img/inscripcion/tiktok.svg') ?>" class="h-25px" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/inscripcion/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/inscripcion/scripts.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/inscripcion/date.js') ?>"></script>
    <script src="<?= base_url('assets/js/inscripcion/index.js') ?>"></script>
    <script src="<?= base_url('assets/js/viewerjs/js/viewer.js') ?>"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var galley = document.getElementById('galley');
            var viewer = new Viewer(galley, {
                url: 'data-original',
                title: function(image) {
                    return image.alt + ' (' + (this.index + 1) + '/' + this.length + ')';
                },
            });
        });
    </script>
    <!-- <script src="assets/js/custom/utilities/modals/create-account.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script> -->
</body>

</html>