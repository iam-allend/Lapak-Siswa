<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/about', 'Home::about');
$routes->get('/contactus', 'Home::contactus');
$routes->get('/profile', 'Home::profile');


$routes->get('register', 'Auth::register');
$routes->post('auth/register', 'Auth::add_register');

$routes->get('login', 'Auth::index');
$routes->post('auth/login', 'Auth::login'); // Proses login
$routes->get('auth/logout', 'Auth::logout'); // Proses logout

$routes->get('shop', 'Shop::index'); // Halaman shop untuk customer
$routes->get('profile', 'Profile::index'); // Halaman profil untuk siswa
// $routes->get('admin/dashboard', 'Admin::dashboard'); // Halaman dashboard untuk admin
// $routes->get('superadmin/dashboard', 'SuperAdmin::dashboard'); // Halaman dashboard untuk superadmin


$routes->get('dashboard', 'DashboardController::dashboard');

// MANAGE SISWA
    $routes->get('manage-siswa/', 'ManageSiswaController::index');
    $routes->get('manage-siswa/create', 'ManageSiswaController::create');
    $routes->post('manage-siswa/store', 'ManageSiswaController::store');
    $routes->get('manage-siswa/edit/(:num)', 'ManageSiswaController::edit/$1');
    $routes->post('manage-siswa/update/(:num)', 'ManageSiswaController::update/$1');
    $routes->post('manage-siswa/delete/(:num)', 'ManageSiswaController::delete/$1');
    $routes->get('manage-siswa/delete/(:num)', 'ManageSiswaController::delete/$1');

// MANAGE INDUSTRI - Perusahaan
    $routes->get('manage-indper/', 'ManageIndPerController::index');
    $routes->get('manage-indper/create', 'ManageIndPerController::create');
    $routes->post('manage-indper/store', 'ManageIndPerController::store');
    $routes->get('manage-indper/edit/(:num)', 'ManageIndPerController::edit/$1');
    $routes->post('manage-indper/update/(:num)', 'ManageIndPerController::update/$1');
    $routes->post('manage-indper/delete/(:num)', 'ManageIndPerController::delete/$1');
    $routes->get('manage-indper/delete/(:num)', 'ManageIndPerController::delete/$1');
    




$routes->group('superadmin',function($routes){

});

$routes->group('admin',function($routes){
    // $routes->get('dashboard', 'Admin::dashboard'); // Halaman dashboard untuk admin
});

$routes->group('siswa',function($routes){
    $routes->get('dashboard', 'Siswa::index'); // Halaman profil untuk siswa
});

$routes->group('customer',function($routes){
    $routes->get('dashboard', 'Customer::index'); // Halaman shop untuk customer
});

$routes->group('industri',function($routes){
    $routes->get('dashboard', 'Industri::index'); // Halaman shop untuk customer
});
