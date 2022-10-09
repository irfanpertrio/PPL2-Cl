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
$routes->get('/',                                       'tugasTemplate\c_login::display');                              // Redirect to Login page
//? Routes to Page
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/welcome',                            'tugasTemplate\c_home::welcome');                           // Redirect to Selamat datang page
    $routes->get('/dashboard',                          'tugasTemplate\c_home::dashboard');                         // Redirect to Dashboard page
    $routes->get('/mahasiswa',                          'tugasTemplate\c_mahasiswa::display');                      // Redirect to Table list of mahasiswa
    $routes->get('/mahasiswa/detail/(:any)',            'tugasTemplate\c_mahasiswa::display_detail/$1');            // Redirect to Table of detail mahasiswa
    $routes->get('/mahasiswa/form_update/(:any)',       'tugasTemplate\c_mahasiswa::display_update/$1');            // Redirect to Update form page
    $routes->get('/dashboard/temp',                     'tugasMahasiswa\c_home::display');                          // Redirect to Dashboard page
    $routes->get('/mahasiswa/temp',                     'tugasMahasiswa\c_mahasiswa::display');                     // Redirect to Table list of mahasiswa
    $routes->get('/mahasiswa/temp/form_input',          'tugasMahasiswa\c_mahasiswa::display_input');               // Redirect to Input form page
    $routes->get('/mahasiswa/temp/detail/(:any)',       'tugasMahasiswa\c_mahasiswa::display_one_mahasiswa/$1');    // Redirect to Table of detail mahasiswa
    $routes->get('/mahasiswa/temp/form_update/(:any)',  'tugasMahasiswa\c_mahasiswa::display_update/$1');           // Redirect to Update form page
});

//? Routes to Function
$routes->get('/login',                              'tugasMahasiswa\c_login::auth');            // Redirect to function Login
$routes->get('/logout',                             'tugasMahasiswa\c_login::logout');          // Redirect to function Logout
$routes->post('/mahasiswa/input',                   'tugasMahasiswa\c_mahasiswa::input');       // Redirect to function Input
$routes->get('/mahasiswa/search',                   'tugasTemplate\c_mahasiswa::search');       // Redirect to function Search
$routes->get('/mahasiswa/temp/search',              'tugasMahasiswa\c_mahasiswa::search');      // Redirect to function Search
$routes->get('/mahasiswa/delete/(:any)',            'tugasMahasiswa\c_mahasiswa::delete/$1');   // Redirect to function Delete
$routes->post('/mahasiswa/update/(:any)',           'tugasMahasiswa\c_mahasiswa::update/$1');   // Redirect to funtion Update

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
