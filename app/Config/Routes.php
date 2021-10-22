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
// $routes->get('/', 'Home::index');

$routes->group('api', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    // $routes->group('api', function ($routes) {

    $routes->group('v1',  function ($routes) {

        // api routes for users
        // $routes->resource('UserController', ['namespace' => 'App\Controllers\Api']);
        $routes->group('user',  function ($routes) {


            // use get request for retrive data from database
            $routes->get('/', 'UserController::index');
            $routes->get('(:num)', 'UserController::show/$1');
            $routes->get('deleted', 'UserController::deleted');

            // use post request for modify data in database
            $routes->post('/', 'UserController::create');
            $routes->post('(:num)', 'UserController::update/$1');

            // $routes->post('(:num)/delete', 'UserController::delete/$1');
            // $routes->post('(:num)/restore', 'UserController::restore/$1');

            $routes->post('delete/(:num)', 'UserController::delete/$1');
            $routes->post('restore/(:num)', 'UserController::restore/$1');
        });

        // $routes->resource('student');
    });
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
