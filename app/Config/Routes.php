<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Verificar');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Verificar::index');
$routes->get('/ofertas', 'Ofertas::index', ['as' => 'ofertas']);

// login
$routes->get('/login', 'Auth::index', ['as' => 'login']);
$routes->post('/login', 'Auth::autentificar', ['as' => 'autentificar']);
$routes->get('/salir', 'Auth::salir', ['as' => 'salir']);

// Preinscripcion
$routes->get('preinscripcion/(:any)', 'Preinscripcion::index/$1');
$routes->post('/buscar-ci', 'Preinscripcion::verificarCi', ['as' => 'buscar-ci']);
$routes->post('/verificar-cupon', 'Preinscripcion::verificarCupon', ['as' => 'verificar-cupon']);
$routes->post('/porcentaje-cupon', 'Preinscripcion::porcentajeCupon', ['as' => 'porcentaje-cupon']);
$routes->post('/verificar-registro', 'Preinscripcion::verificarRegistroCurso', ['as' => 'verificar-registro']);
$routes->post('/guardar-preinscripcion', 'Preinscripcion::save', ['as' => 'guardar-preinscripcion']);

// Información
$routes->get('informacion/(:any)', 'Informacion::index/$1');
$routes->post('/guardar-informacion', 'Informacion::save', ['as' => 'guardar-informacion']);

// Administración de cursos //
// Principal
$routes->get('/principal', 'Principal::index', ['as' => 'principal', 'filter' => 'auth']);

// cursos
$routes->get('/cursos', 'Curso::index', ['as' => 'cursos', 'filter' => 'auth']);
$routes->get('curso-ajax-datatable', 'Curso::ajaxDatatable', ['as' => 'curso-ajax-datatable', 'filter' => 'auth']);

// configuracion
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/configuracion', 'Configuracion::index', ['as' => 'configuracion']);
    $routes->get('configuracion-ajax-datatable', 'Configuracion::ajaxDatatable', ['as' => 'configuracion-ajax-datatable']);
    $routes->get('frm-publicacion', 'Configuracion::editFrmPublicacion', ['as' => 'edit-frm-publicacion']);
    $routes->post('guardar-publicacion', 'Configuracion::guardarPublicacion', ['as' => 'guardar-publicacion']);
    $routes->get('frm-certificacion', 'Configuracion::editFrmCertificacion', ['as' => 'edit-frm-certificacion']);
    $routes->post('guardar-certificacion', 'Configuracion::guardarCertificacion', ['as' => 'guardar-certificacion']);
    $routes->get('frm-personalizacion', 'Configuracion::editFrmPersonalizacion', ['as' => 'edit-frm-personalizacion']);
    $routes->post('guardar-personalizacion', 'Configuracion::guardarPersonalizacion', ['as' => 'guardar-personalizacion']);
    $routes->get('frm-entrega', 'Configuracion::editFrmEntrega', ['as' => 'edit-frm-entrega']);
    $routes->post('guardar-entrega', 'Configuracion::guardarEntrega', ['as' => 'guardar-entrega']);
    $routes->post('terminar-configuracion', 'Configuracion::terminarConfiguracion', ['as' => 'terminar-configuracion']);
});

// configuracion de cursos //
// Inscripcion //
$routes->post('/inscripcion', 'Inscripcion::index', ['as' => 'inscripcion-participante', 'filter' => 'auth']);



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
