<?php

$cms->router->before('GET|POST', '/', 'Middlewares\MiddlewareAuth@isLogin');
//$cms->router->before('GET|POST', '/login', 'Middlewares\MiddlewareAuth@isLogin');
$cms->router->before('GET|POST', '/customer.*', 'Middlewares\MiddlewareAuth@isLogin');
$cms->router->before('GET|POST', '/project.*', 'Middlewares\MiddlewareAuth@isLogin');

$cms->router->get('/', 'Controllers\Home@Index');

// Login Page
$cms->router->get('/login', 'Controllers\Auth@Index');
// Auth
$cms->router->post('/login', 'Controllers\Auth@Login');
$cms->router->get('/logout', 'Controllers\Auth@Logout');


// Customers
$cms->router->mount('/customer', function () use ($cms) {
    $cms->router->get('/', 'Controllers\Customer@Index');
    //id
    $cms->router->get('/add', 'Controllers\Customer@Add');
    $cms->router->post('/add', 'Controllers\Customer@AddCustomer');
    $cms->router->get('/edit/([0-9]+)', 'Controllers\Customer@Edit');
    $cms->router->post('/edit', 'Controllers\Customer@EditCustomer');
    $cms->router->get('/([0-9]+)', 'Controllers\Customer@Detail');
    $cms->router->post('/remove', 'Controllers\Customer@RemoveCustomer');
});
// Projects
$cms->router->mount('/project', function () use ($cms) {
    $cms->router->get('/', 'Controllers\Project@Index');
    //id
    $cms->router->get('/add', 'Controllers\Project@Add');
    $cms->router->post('/add', 'Controllers\Project@AddProject');
    $cms->router->get('/edit/([0-9]+)', 'Controllers\Project@Edit');
    $cms->router->post('/edit', 'Controllers\Project@EditProject');
    $cms->router->get('/([0-9]+)', 'Controllers\Project@Detail');
    $cms->router->post('/remove', 'Controllers\Project@RemoveProject');
});