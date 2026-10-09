<?php

namespace Config;

use CodeIgniter\Config\Services;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('home');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// Core Pages
$routes->get('/', 'TaskController::index');
$routes->get('/profile', 'TaskController::profile');
$routes->get('/about', 'TaskController::about');

// Authentication Routes
$routes->get('/login', 'Auth::login');
$routes->post('/login/process', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

// Task CRUD Routes (Using TaskController)
$routes->get('/tasks', 'TaskController::listAll');
$routes->get('/tasks/new', 'TaskController::new');
$routes->post('/tasks/create', 'TaskController::create');
$routes->get('/tasks/edit/(:num)', 'TaskController::edit/$1');
$routes->post('/tasks/update/(:num)', 'TaskController::update/$1');
$routes->get('/tasks/delete/(:num)', 'TaskController::delete/$1');

$routes->get('tasks/new', 'TaskController::new');
$routes->post('tasks/create', 'TaskController::create');