<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('login', 'LoginController::login');



$routes->get('/about', 'Home::about');
$routes->get('/contactus', 'Home::contactus');
$routes->get('/profile', 'Home::profile');


$routes->get('/dashboard', 'LayOutController::dashboard');
$routes->get('/card', 'LayOutController::card');