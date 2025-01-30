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
$routes->get('/card', 'LayOutController::card');



$routes->get('auth/login', 'Auth::index'); // Halaman   login

$routes->get('auth/login', 'Auth::login'); // Halaman login
$routes->post('auth/login', 'Auth::login'); // Proses login
$routes->get('auth/logout', 'Auth::logout'); // Proses logout
$routes->get('shop', 'Shop::index'); // Halaman shop untuk customer
$routes->get('profile', 'Profile::index'); // Halaman profil untuk siswa
$routes->get('admin/dashboard', 'Admin::dashboard'); // Halaman dashboard untuk admin
$routes->get('superadmin/dashboard', 'SuperAdmin::dashboard'); // Halaman dashboard untuk superadmin
