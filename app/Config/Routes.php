<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('/about', 'Home::about');
$routes->get('/contactus', 'Home::contactus');
$routes->get('/profile', 'Home::profile');


$routes->get('/dashboard', 'LayOutController::dashboard');




$routes->get('register', 'Auth::register');
$routes->post('auth/register', 'Auth::add_register');

$routes->get('login', 'Auth::index');
$routes->post('auth/login', 'Auth::login'); // Proses login
$routes->get('auth/logout', 'Auth::logout'); // Proses logout
$routes->get('shop', 'Shop::index'); // Halaman shop untuk customer
$routes->get('profile', 'Profile::index'); // Halaman profil untuk siswa
$routes->get('admin/dashboard', 'Admin::dashboard'); // Halaman dashboard untuk admin
$routes->get('superadmin/dashboard', 'SuperAdmin::dashboard'); // Halaman dashboard untuk superadmin



// MANAGE ADMIN
$routes->get('manage-admin', 'ManageAdminController::index');
$routes->get('admin', 'ManageAdminController::index');
$routes->get('admin/create', 'ManageAdminController::create');
$routes->post('admin/store', 'ManageAdminController::store');
$routes->get('admin/edit/(:num)', 'ManageAdminController::edit/$1');
$routes->post('admin/update/(:num)', 'ManageAdminController::update/$1');
$routes->post('admin/delete/(:num)', 'ManageAdminController::delete/$1');