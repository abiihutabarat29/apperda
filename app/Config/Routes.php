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
$routes->setDefaultController('Front');
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
$routes->get('/', 'Front::index');
$routes->get('jadwal', 'Front::jadwal');

$routes->get('site-admin', 'Admin\Auth::index');
$routes->add('auth/verify', 'Admin\Auth::cek');
$routes->get('auth/logout', 'Admin\Auth::logout');
//Routes Login
$routes->group('admin', function ($routes) {
    $routes->get('home', 'Admin\Home::index');
    //API
    $routes->resource('api/data-instansi', ['controller' => 'Api\Instansi']);
    //Routes User
    $routes->get('data-user', 'Admin\User::user');
    $routes->get('data-user/add', 'Admin\User::add');
    $routes->post('data-user/save', 'Admin\User::save');
    $routes->delete('data-user/(:num)', 'Admin\User::delete/$1');
    $routes->get('data-user/edit/(:segment)', 'Admin\User::edit/$1');
    $routes->add('data-user/update/(:segment)', 'Admin\User::update/$1');
    //Routes Data Instansi
    $routes->get('data-instansi', 'Admin\DataInstansi::data');
    $routes->get('data-instansi/add', 'Admin\DataInstansi::add');
    $routes->add('data-instansi/save', 'Admin\DataInstansi::save');
    $routes->delete('data-instansi/(:num)', 'Admin\DataInstansi::delete/$1');
    $routes->get('data-instansi/edit/(:segment)', 'Admin\DataInstansi::edit/$1');
    $routes->add('data-instansi/update/(:segment)', 'Admin\DataInstansi::update/$1');
    //Routes My Profil
    $routes->get('my-profil', 'Admin\MyProfil::myprofil');
    $routes->get('my-profil/edit/(:segment)', 'Admin\MyProfil::edit/$1');
    $routes->add('my-profil/update/(:segment)', 'Admin\MyProfil::update/$1');
    //Routes Perda
    $routes->get('perda', 'Admin\DataPerda::data');
    $routes->get('perda/add', 'Admin\DataPerda::add');
    $routes->add('perda/save', 'Admin\DataPerda::save');
    $routes->delete('/perda/(:num)', 'Admin\DataPerda::delete/$1');
    $routes->get('perda/edit/(:segment)', 'Admin\DataPerda::edit/$1');
    $routes->add('perda/update/(:segment)', 'Admin\DataPerda::update/$1');
    $routes->get('perda/review/(:segment)', 'Admin\DataPerda::review/$1');
    // Routes Slideshow
    $routes->get('slideshow', 'Admin\Slideshow::slideshow');
    $routes->get('slideshow/add', 'Admin\Slideshow::add');
    $routes->add('slideshow/save', 'Admin\Slideshow::save');
    $routes->delete('slideshow/(:num)', 'Admin\Slideshow::delete/$1');
    $routes->get('slideshow/edit/(:segment)', 'Admin\Slideshow::edit/$1');
    $routes->add('slideshow/update/(:segment)', 'Admin\Slideshow::update/$1');
    // Routes Profil
    $routes->get('profil', 'Admin\Profil::profil');
    $routes->get('profil/add', 'Admin\Profil::add');
    $routes->add('profil/save', 'Admin\Profil::save');
    $routes->delete('profil/(:num)', 'Admin\Profil::delete/$1');
    $routes->get('profil/edit/(:segment)', 'Admin\Profil::edit/$1');
    $routes->add('profil/update/(:segment)', 'Admin\Profil::update/$1');
    // Routes Anggota
    $routes->get('data-anggota', 'Admin\Anggota::anggota');
    $routes->get('data-anggota/add', 'Admin\Anggota::add');
    $routes->add('data-anggota/save', 'Admin\Anggota::save');
    $routes->delete('data-anggota/(:num)', 'Admin\Anggota::delete/$1');
    $routes->get('data-anggota/edit/(:segment)', 'Admin\Anggota::edit/$1');
    $routes->add('data-anggota/update/(:segment)', 'Admin\Anggota::update/$1');
    //Routes Pengajuan Perda
    $routes->get('pengajuan-perda', 'Admin\DataPerda::dataperda');
    $routes->get('pengajuan-perda/verifikasi/(:segment)', 'Admin\DataPerda::verifikasi/$1');
    $routes->post('pengajuan-perda/verify/(:segment)', 'Admin\DataPerda::verify/$1');
    $routes->get('pengajuan-perda/review/(:segment)', 'Admin\DataPerda::reviewp/$1');
    //Routes Verifikasi Perda
    $routes->get('verifikasi-perda', 'Admin\DataPerda::dataperdav');
    $routes->get('verifikasi-perda/verifikasi/(:segment)', 'Admin\DataPerda::verifikasiv/$1');
    $routes->add('verifikasi-perda/verif/(:segment)', 'Admin\DataPerda::verifyv/$1');
    //Routes Perda Terverifikasi
    $routes->get('perda-terverifikasi', 'Admin\DataPerda::dataperdapv');
    $routes->get('perda-terverifikasi/verifikasi/(:segment)', 'Admin\DataPerda::verifikasipv/$1');
    $routes->add('perda-terverifikasi/verif/(:segment)', 'Admin\DataPerda::verifypv/$1');
    $routes->add('perda-terverifikasi/jadwal/(:segment)', 'Admin\DataPerda::jadwal/$1');
    //Routes Verifikasi Perda Disposisi
    $routes->get('verif-perda', 'Admin\DataPerda::dataperdavd');
    $routes->get('verif-perda/verifikasi/(:segment)', 'Admin\DataPerda::verifikasivd/$1');
    $routes->add('verif-perda/verif/(:segment)', 'Admin\DataPerda::verifyvd/$1');
    //Routes Data File / Timeline
    $routes->get('data-file/file/(:segment)', 'Admin\DataPerda::addfile/$1');
    $routes->add('data-file/up1/(:segment)', 'Admin\DataPerda::upfile1/$1');
    $routes->add('data-file/up2/(:segment)', 'Admin\DataPerda::upfile2/$1');
    $routes->add('data-file/up3/(:segment)', 'Admin\DataPerda::upfile3/$1');
    $routes->add('data-file/up4/(:segment)', 'Admin\DataPerda::upfile4/$1');
    $routes->add('data-file/up5/(:segment)', 'Admin\DataPerda::upfile5/$1');
    $routes->add('data-file/up6/(:segment)', 'Admin\DataPerda::upfile6/$1');
    $routes->add('data-file/up7/(:segment)', 'Admin\DataPerda::upfile7/$1');
    $routes->add('data-file/up8/(:segment)', 'Admin\DataPerda::upfile8/$1');
    $routes->add('data-file/up9/(:segment)', 'Admin\DataPerda::upfile9/$1');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
