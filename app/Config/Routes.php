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
$routes->setDefaultController('Home');
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

$routes->get('/', 'Home::index');

$routes->get('/auth', 'Auth::index');
$routes->get('/home', 'Home::index');
$routes->get('/home/damus', 'Home::damus');
$routes->get('/home/ldk', 'Home::ldk');
$routes->get('/register', 'Register::index');
$routes->get('/formpendaftaran', 'FormPendaftaran::index');
$routes->get('formpendaftaran/save', 'Pendaftaran::save');



$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'role:adminbem,admindamus,adminldk']);

// UKM List
$routes->group('ukmlist', ['filter' => 'role:adminbem'], function ($routes) {
    $routes->get('create', 'Ukmlist::create');
    $routes->delete('(:num)', 'Ukmlist::delete/$1');
    $routes->get('edit/(:segment)', 'Ukmlist::edit/$1');
    $routes->get('save', 'Ukmlist::save');
});

//user list
$routes->get('/admin', 'Admin::index', ['filter' => 'role:adminbem']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:adminbem']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:adminbem']);

// PENDAFTARAN
$routes->group('pendaftaran', ['filter' => 'role:adminbem'], function ($routes) {
    $routes->get('create', 'Pendaftaran::create');
    $routes->get('edit/(:segment)', 'Pendaftaran::edit/$1');
    $routes->delete('(:num)', 'Pendaftaran::delete/$1');
    $routes->get('(:any)', 'Pendaftaran::detail/$1');
});


/// UKM DAPUR MUSIK
// struktur
$routes->group('sdapus', ['filter' => 'role:adminbem,admindamus'], function ($routes) {
    $routes->get('/sdapus', 'Sdapus::index');
    $routes->get('create', 'Sdapus::create');
    $routes->delete('(:num)', 'Sdapus::delete/$1');
    $routes->get('edit/(:segment)', 'Sdapus::edit/$1');
    $routes->get('save', 'Sdapus::save');
});

// anggota
$routes->group('adapus', ['filter' => 'role:adminbem,admindamus'], function ($routes) {
    $routes->get('create', 'Adapus::create');
    $routes->delete('(:num)', 'Adapus::delete/$1');
    $routes->get('edit/(:segment)', 'Adapus::edit/$1');
    $routes->get('save', 'Adapus::save');
});

//profil
$routes->group('pdapus', ['filter' => 'role:adminbem,admindamus'], function ($routes) {
    $routes->get('create', 'Pdapus::create');
    $routes->delete('(:num)', 'Pdapus::delete/$1');
    $routes->get('edit/(:segment)', 'Pdapus::edit/$1');
    $routes->get('save', 'Pdapus::save');
});

$routes->group('kdapus', ['filter' => 'role:adminbem,admindamus'], function ($routes) {
    $routes->get('create', 'Kdapus::create');
    $routes->delete('(:num)', 'Kdapus::delete/$1');
    $routes->get('edit/(:segment)', 'Kdapus::edit/$1');
    $routes->get('save', 'Kdapus::save');
    $routes->get('(:any)', 'Kdapus::detail/$1');
});

///UKM LDK SUBULUSSALAM
//anggota
$routes->group('aldk', ['filter' => 'role:adminbem,adminldk'], function ($routes) {
    $routes->get('create', 'Aldk::create');
    $routes->delete('(:num)', 'Aldk::delete/$1');
    $routes->get('edit/(:segment)', 'Aldk::edit/$1');
    $routes->get('save', 'Aldk::save');
});

//struktur
$routes->group('sldk', ['filter' => 'role:adminbem,adminldk'], function ($routes) {
    $routes->get('create', 'Sldk::create');
    $routes->delete('(:num)', 'Sldk::delete/$1');
    $routes->get('edit/(:segment)', 'Sldk::edit/$1');
    $routes->get('save', 'Sldk::save');
});

//profil
$routes->group('pldk', ['filter' => 'role:adminbem,adminldk'], function ($routes) {
    $routes->get('create', 'Pldk::create');
    $routes->delete('(:num)', 'Pldk::delete/$1');
    $routes->get('edit/(:segment)', 'Pldk::edit/$1');
    $routes->get('save', 'Pldk::save');
});

//kegiatan
$routes->group('kldk', ['filter' => 'role:adminbem,adminldk'], function ($routes) {
    $routes->get('create', 'Kldk::create');
    $routes->delete('(:num)', 'Kldk::delete/$1');
    $routes->get('edit/(:segment)', 'Kldk::edit/$1');
    $routes->get('save', 'Kldk::save');
    $routes->get('(:any)', 'Kldk::detail/$1');
});

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
