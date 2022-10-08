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
$routes->setDefaultController('Auth');
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
$routes->get('/home', 'Home::index');
//API
$routes->resource('/api/data-bagian', ['controller' => 'Api\Bagian']);
$routes->resource('/api/data-kegiatan', ['controller' => 'Api\Kegiatan']);
$routes->resource('/api/data-sub-kegiatan', ['controller' => 'Api\SubKegiatan']);
$routes->resource('/api/data-rekening', ['controller' => 'Api\Rekening']);
//Routes Login
$routes->get('/', 'Auth::index');
$routes->add('/auth/verify', 'Auth::cek');
$routes->get('/auth/logout', 'Auth::logout');
//Routes User
$routes->get('data-user', 'User::user');
$routes->get('data-user/add', 'User::add');
$routes->post('data-user/save', 'User::save');
$routes->get('data-user/(:num)', 'User::delete/$1');
$routes->get('data-user/edit/(:segment)', 'User::edit/$1');
$routes->add('data-user/update/(:segment)', 'User::update/$1');
//Routes Data Sekolah
$routes->get('/data-bagian', 'DataBagian::databagian');
$routes->get('/data-bagian/add', 'DataBagian::add');
$routes->add('/data-bagian/save', 'DataBagian::save');
$routes->delete('/data-bagian/(:num)', 'DataBagian::delete/$1');
$routes->get('/data-bagian/edit/(:segment)', 'DataBagian::edit/$1');
$routes->add('/data-bagian/update/(:segment)', 'DataBagian::update/$1');
//Routes Data Anggaran
$routes->get('/data-anggaran', 'DataAnggaran::dataanggaran');
$routes->get('/data-anggaran/add', 'DataAnggaran::add');
$routes->add('/data-anggaran/save', 'DataAnggaran::save');
$routes->delete('/data-anggaran/(:num)', 'DataAnggaran::delete/$1');
$routes->get('/data-anggaran/edit/(:segment)', 'DataAnggaran::edit/$1');
$routes->add('/data-anggaran/update/(:segment)', 'DataAnggaran::update/$1');
//Routes Data Sub Kegiatan
$routes->get('/data-sub-kegiatan', 'DataSubKegiatan::datasubkeg');
$routes->get('/data-sub-kegiatan/add', 'DataSubKegiatan::add');
$routes->add('/data-sub-kegiatan/save', 'DataSubKegiatan::save');
$routes->delete('/data-sub-kegiatan/(:num)', 'DataSubKegiatan::delete/$1');
$routes->get('/data-sub-kegiatan/edit/(:segment)', 'DataSubKegiatan::edit/$1');
$routes->add('/data-sub-kegiatan/update/(:segment)', 'DataSubKegiatan::update/$1');
//Import Data Sub Kegiatan
$routes->post('sub-kegiatan/import', 'DataSubKegiatan::import');
//Routes Data Kode Rekening
$routes->get('/data-kode-rekening', 'DataRekening::datakoderek');
$routes->get('/data-kode-rekening/add', 'DataRekening::add');
$routes->add('/data-kode-rekening/save', 'DataRekening::save');
$routes->delete('/data-kode-rekening/(:num)', 'DataRekening::delete/$1');
$routes->get('/data-kode-rekening/edit/(:segment)', 'DataRekening::edit/$1');
$routes->add('/data-kode-rekening/update/(:segment)', 'DataRekening::update/$1');
//Import Data Kode Rekening
$routes->post('kode-rekening/import', 'DataRekening::import');
//Routes Data Kegiatan
$routes->get('/data-kegiatan', 'DataKegiatan::datakegiatan');
$routes->get('/data-kegiatan/add', 'DataKegiatan::add');
$routes->add('/data-kegiatan/save', 'DataKegiatan::save');
$routes->delete('/data-kegiatan/(:num)', 'DataKegiatan::delete/$1');
$routes->get('/data-kegiatan/edit/(:segment)', 'DataKegiatan::edit/$1');
$routes->add('/data-kegiatan/update/(:segment)', 'DataKegiatan::update/$1');
//Routes Data Kegiatan
$routes->get('/data-gu', 'DataGu::datagu');
$routes->get('/data-gu/add', 'DataGu::add');
$routes->add('/data-gu/save', 'DataGu::save');
$routes->delete('/data-gu/(:num)', 'DataGu::delete/$1');
$routes->get('/data-gu/edit/(:segment)', 'DataGu::edit/$1');
$routes->add('/data-gu/update/(:segment)', 'DataGu::update/$1');
//Routes AJAX
$routes->get('/sppd/kegiatan', 'DataSppd::datakegiatan');
$routes->get('/sppd/subkegiatan/(:segment)', 'DataSppd::datasub/$1');
// ========================================================
//Routes SPPD
$routes->get('/sppd/fetch-subkegiatan/(:segment)', 'DataSppd::subkegiatan/$1');
$routes->get('/sppd', 'DataSppd::datasppd');
$routes->get('/sppd/add', 'DataSppd::add');
$routes->add('/sppd/save', 'DataSppd::save');
$routes->delete('/sppd/(:num)', 'DataSppd::delete/$1');
$routes->get('/sppd/edit/(:segment)', 'DataSppd::edit/$1');
$routes->add('/sppd/update/(:segment)', 'DataSppd::update/$1');
//Routes sub kegiatan from sppd
$routes->get('/sppd/sub-kegiatan/(:segment)', 'DataSppd::datasub/$1');
$routes->get('/sppd/add-sub-kegiatan/(:segment)', 'DataSppd::addsub/$1');
$routes->add('/sppd/save-sub-kegiatan/(:segment)', 'DataSppd::savesub/$1');
$routes->get('/sppd/edit-sub-kegiatan/(:segment)', 'DataSppd::editsub/$1');
$routes->add('/sppd/update-sub-kegiatan/(:segment)', 'DataSppd::updatesub/$1');
$routes->delete('/sppd/sub-kegiatan/(:num)', 'DataSppd::deletesub/$1');
//Routes file kegiatan from sppd
$routes->get('/sppd/file/(:segment)', 'DataSppd::datafile/$1');
$routes->get('/sppd/add-file/(:segment)', 'DataSppd::addfile/$1');
$routes->add('/sppd/save-file/(:segment)', 'DataSppd::savefile/$1');
$routes->get('/sppd/edit-file/(:segment)', 'DataSppd::editfile/$1');
$routes->add('/sppd/update-file/(:segment)', 'DataSppd::updatefile/$1');
$routes->delete('/sppd/file/(:num)', 'DataSppd::deletefile/$1');
//Routes spj kegiatan
$routes->get('/kegiatan', 'DataSpjKegiatan::Dataspjkeg');
$routes->get('/kegiatan/add', 'DataSpjKegiatan::add');
$routes->add('/kegiatan/save', 'DataSpjKegiatan::save');
$routes->delete('/kegiatan/(:num)', 'DataSpjKegiatan::delete/$1');
$routes->get('/kegiatan/edit/(:segment)', 'DataSpjKegiatan::edit/$1');
$routes->add('/kegiatan/update/(:segment)', 'DataSpjKegiatan::update/$1');
//Routes sub kegiatan from kegiatan
$routes->get('/kegiatan/sub-kegiatan/(:segment)', 'DataSpjKegiatan::datasub/$1');
$routes->get('/kegiatan/add-sub-kegiatan/(:segment)', 'DataSpjKegiatan::addsub/$1');
$routes->add('/kegiatan/save-sub-kegiatan/(:segment)', 'DataSpjKegiatan::savesub/$1');
$routes->get('/kegiatan/edit-sub-kegiatan/(:segment)', 'DataSpjKegiatan::editsub/$1');
$routes->add('/kegiatan/update-sub-kegiatan/(:segment)', 'DataSpjKegiatan::updatesub/$1');
$routes->delete('/kegiatan/sub-kegiatan/(:num)', 'DataSpjKegiatan::deletesub/$1');
//Routes file kegiatan from kegiatan
$routes->get('/kegiatan/file/(:segment)', 'DataSpjKegiatan::datafile/$1');
$routes->get('/kegiatan/add-file/(:segment)', 'DataSpjKegiatan::addfile/$1');
$routes->add('/kegiatan/save-file/(:segment)', 'DataSpjKegiatan::savefile/$1');
$routes->get('/kegiatan/edit-file/(:segment)', 'DataSpjKegiatan::editfile/$1');
$routes->add('/kegiatan/update-file/(:segment)', 'DataSpjKegiatan::updatefile/$1');
$routes->delete('/kegiatan/file/(:num)', 'DataSpjKegiatan::deletefile/$1');
//Routes My Profil
$routes->get('/my-profil', 'MyProfil::myprofil');
$routes->get('/my-profil/edit/(:segment)', 'MyProfil::edit/$1');
$routes->add('/my-profil/update/(:segment)', 'MyProfil::update/$1');
//Routes SPPD Admin
$routes->get('/data-sppd', 'DataSppd::dataadmin');
$routes->get('/data-sppd/verifikasi/(:segment)', 'DataSppd::verifikasisppd/$1');
$routes->add('/data-sppd/verif/(:segment)', 'DataSppd::verif/$1');
$routes->add('/data-sppd/tolak/(:segment)', 'DataSppd::tolak/$1');
$routes->add('/data-sppd/review/(:segment)', 'DataSppd::review/$1');
$routes->add('/data-sppd/export-excel/(:segment)', 'DataSppd::export/$1');
//Routes Kegiatan Admin
$routes->get('/data-spjkegiatan', 'DataSpjKegiatan::dataadmin');
$routes->get('/data-spjkegiatan/verifikasi/(:segment)', 'DataSpjKegiatan::verifkegiatan/$1');
$routes->add('/data-spjkegiatan/verif/(:segment)', 'DataSpjKegiatan::verif/$1');
$routes->add('/data-spjkegiatan/tolak/(:segment)', 'DataSpjKegiatan::tolak/$1');
$routes->add('/data-spjkegiatan/review/(:segment)', 'DataSpjKegiatan::review/$1');
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
