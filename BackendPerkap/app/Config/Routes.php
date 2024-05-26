<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->addPlaceholder('idJenisBarang', '[a-zA-Z]{2,5}');
$routes->addPlaceholder('idBarang', '[a-zA-Z]{2,5}-[0-9]{2,5}');

# Jangan diubah yang ini!
$routes->get('/', 'Home::index');
// $routes->get('/test', 'Home::test');
$routes->get('assets/(.*)', 'Assets::index');
$routes->get('uploads/(.*)', 'Uploads::index');

$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
// $routes->match(['get', 'post'], '/auth', "Login::login");
// $routes->match(['get', 'post'], '/auth2', "Login::login2");
$routes->post('/auth2', "Login::login2");
$routes->get('/hardLogin', "Login::hardLogin");


$routes->get('/home', 'Home::home', ['filter' => 'auth']);

$routes->group('/', ['filter' => 'auth-admin'], function ($routes) {
    $routes->match(['get', 'post'], 'penukaran', "Penukaran::index");

    $routes->group('peminjaman', function ($routes) {
        $routes->get('/', 'Peminjaman::index');
        $routes->post('pinjam', 'Peminjaman::pinjam');
        $routes->get('check_item_availability', 'Peminjaman::checkItemAvailability');
    });

    $routes->group("jenisBarang", function ($routes) {
        $routes->get("/", "JenisBarang::index");
        $routes->post("/", "JenisBarang::add");
        $routes->put("(:idJenisBarang)", "JenisBarang::update/$1");
        $routes->delete("(:idJenisBarang)", "JenisBarang::delete/$1");
    });


    $routes->group("tambahBarang", function ($routes) {
        $routes->get("/", "TambahBarang::index");
        $routes->post("/", "TambahBarang::insert");
    });

    $routes->group("daftarBarang", function ($routes) {
        $routes->get("/", "DaftarBarang::index");
        $routes->post("/", "DaftarBarang::filter");
        $routes->delete("(:idBarang)", "DaftarBarang::delete/$1");
    });

    $routes->group("pengembalian", function ($routes) {
        $routes->get("/", "Pengembalian::index");
        $routes->post("kembali", "Pengembalian::kembali");
        $routes->post("ajaxTabel", "Pengembalian::ajaxTabel");
    });

    $routes->group("log", function ($routes) {
        $routes->get("/", "Log::index");
    });
});

$routes->group('/dataPanitia', ['filter' => 'authBphkIt'], function ($routes) {
    $routes->get('/', 'DataPanitia::index');
    $routes->post('syncBPHK', 'DataPanitia::syncBPHK');
    $routes->post('syncAnggota', 'DataPanitia::syncAnggota');
    $routes->post('syncCommittees', 'DataPanitia::syncCommittees');
});

// $routes->get('/coba_template', 'Home::coba_template');



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
