<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Client');
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
$routes->get('/', 'Client::index', ['filter' => 'noauth']);
$routes->get('logout', 'Client::logout');

$routes->match(['get','post'],'register', 'Client::register', ['filter' => 'noauth']);
$routes->match(['get','post'],'profile', 'Client::profile',['filter' => 'auth']);
$routes->get('dashboard', 'Dashboard::index',['filter' => 'auth']);
// $routes->get('/addUser','Client::createNew');
// $routes->post('/addUser','Client::new');
// $routes->add('/single/(:any)','Client::client/$1');

//$routes->add('/hello','Client::index');

$routes->add('/income','Income::new',['filter' => 'auth']);
$routes->add('/client_income','Income::income',['filter' => 'auth']);
$routes->add('/client_inc_report','Income::incomeReport',['filter' => 'auth']);

$routes->add('/expense','Expense::index',['filter' => 'auth']);
$routes->add('/client_expense','Expense::expense',['filter' => 'auth']);
$routes->add('/client_exp_report','Expense::expenseReport',['filter' => 'auth']);

// $routes->group('admin', function($routes){
// 	$routes->add('users','Admin\Admin::oh_no');
// 	$routes->add('/','Admin\Admin::index');
// });



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
