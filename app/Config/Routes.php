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


// MANAGE ADMIN
    $routes->get('dashboard', 'DashboardController::dashboard'); // Halaman dashboard untuk superadmin$routes->get('manage-admin', 'ManageAdminController::index');
    $routes->get('manage-admin/', 'ManageAdminController::index');
    $routes->get('manage-admin/create', 'ManageAdminController::create');
    $routes->post('manage-admin/store', 'ManageAdminController::store');
    $routes->get('manage-admin/edit/(:num)', 'ManageAdminController::edit/$1');
    $routes->post('manage-admin/update/(:num)', 'ManageAdminController::update/$1');
    $routes->post('manage-admin/delete/(:num)', 'ManageAdminController::delete/$1');
    $routes->get('manage-admin/delete/(:num)', 'ManageAdminController::delete/$1');
    
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
