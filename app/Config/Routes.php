<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/products', 'ProductController::index');
$routes->get('products/create', 'ProductController::create');
$routes->post('products/store', 'ProductController::store');
$routes->get('products/edit/(:num)', 'ProductController::edit/$1');
$routes->post('products/update/(:num)', 'ProductController::update/$1');
$routes->get('products/delete/(:num)', 'ProductController::delete/$1');

$routes->get('/', 'ShopController::index');  // Homepage = Product list

//route add to cart 
$routes->get('cart/add/(:num)', 'CartController::add/$1');
$routes->get('cart/view', 'CartController::view');
$routes->get('cart/remove/(:num)', 'CartController::remove/$1');
$routes->post('cart/update', 'CartController::update');


//routing for checkout page 
$routes->get('checkout', 'OrderController::checkout');
$routes->post('place-order', 'OrderController::placeOrder');


//routing for authentication 
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::store');

$routes->post('register', 'AuthController::store');
