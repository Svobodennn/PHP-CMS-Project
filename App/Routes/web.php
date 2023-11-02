<?php
$cms->router->get('/', 'Home@Index');

// Login Page
$cms->router->get('/login', 'Auth@Index');
// Auth
$cms->router->post('/login', 'Auth@Login');
$cms->router->get('/logout', 'Auth@Logout');


// Customers
$cms->router->mount('/customer', function () use ($cms) {
    $cms->router->get('/', 'Customer@Index');
    //id
    $cms->router->get('/add', 'Customer@Add');
    $cms->router->get('/edit/([0-9]+)', 'Customer@Edit');
    $cms->router->get('/([0-9]+)', 'Customer@Detail');
    $cms->router->post('/remove/([0-9]+)', 'Customer@Remove');
});
// Projects
$cms->router->mount('/project', function () use ($cms) {
    $cms->router->get('/', 'Project@Index');
    //id
    $cms->router->get('/add', 'Project@Add');
    $cms->router->get('/edit/([0-9]+)', 'Project@Edit');
    $cms->router->get('/([0-9]+)', 'Project@Detail');
    $cms->router->post('/remove/([0-9]+)', 'Project@Remove');
});