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

//? Routes to Page
$routes->get('/', 'c_login::display');                                          // Redirect to Dashboard page
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/dashboard', 'c_home::display');                              // Redirect to function Lo    
    $routes->get('/mahasiswa', 'c_mahasiswa::display');                         // Redirect to Table of detail mahasiswa
    $routes->get('/mahasiswa/form_input', 'c_mahasiswa::display_input');        // Redirect to form Input page
    $routes->get('/mahasiswa/form_update/(:any)', 'c_mahasiswa::display_update/$1');    // Redirect to form Update page
    $routes->get('/mahasiswa/detail/(:any)', 'c_mahasiswa::display_one_mahasiswa/$1');  // Redirect to Table of detail mahasiswa
});

//? Routes to Function
$routes->get('/login', 'c_login::auth');                                // Redirect to function Login
$routes->get('/logout', 'c_login::logout');                             // Redirect to function Logout
$routes->post('/mahasiswa/input', 'c_mahasiswa::input');                // Redirect to function Input
$routes->get('/mahasiswa/search', 'c_mahasiswa::search');               // Redirect to function Search
$routes->get('/mahasiswa/delete/(:any)', 'c_mahasiswa::delete/$1');     // Redirect to function Delete
$routes->post('/mahasiswa/update/(:any)', 'c_mahasiswa::update/$1');    // Redirect to funtion Update

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
