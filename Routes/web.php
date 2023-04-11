<?php

$routes->get('login', 'App::login');
$routes->get('logout', 'Form::logout');

$routes->get('/', 'App::index');

$routes->group("", ['filter' => 'authFilter' ], function ($routes) {
    $routes->get('loan-requests', 'App::loan_requests');
    $routes->get('loan-request/add', 'App::add_loan_requests');
    $routes->get('loan-facilities', 'App::loan_facilities');
    $routes->get('transactions', 'App::transactions');
    $routes->get('transaction/(:any)', 'App::transaction/$1');
  
});




$routes->post('authenticate', 'Form::authenticate');
$routes->group("", ['filter' => 'authFilter' ], function ($routes) {
    $routes->group('form', function($routes) {
        //$routes->post('authenticate', 'Form::authenticate');
        $routes->post('approve-loan-request', 'Form::approve_loan_request');
        $routes->post('approve-storage-request','Form::approve_storage_request');
        $routes->post('add-loan-request', 'Form::add_loan_request');
      
    });
});
$routes->group("", ['filter' => 'authFilter' ], function ($routes) {
    $routes->group('modal', function($routes) {
        $routes->get('approve-loan-request/(:any)', 'Modal::approve_loan_request/$1'); 
 
    });
});



$routes->set404Override(function ()
{
    echo view('app-pages/errors/404');
});