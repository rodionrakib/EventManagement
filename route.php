<?php

$routes = [
    [
        'path' => '/',
        'controller' =>  'controllers/index.php',
        'method' => 'GET'
    ],
    [
        'path' => '/event',
        'controller' =>  'controllers/show.php',
        'method' => 'GET'
    ],

    [
        'path' => '/event/register',
        'controller' =>  'controllers/events/register.php',
        'method' => 'POST'
    ],
    [
        'path' => '/about',
        'controller' =>  'controllers/about.php',
        'method' => 'GET'
    ],
    [
        'path' => '/contact',
        'controller' =>  'controllers/contact.php',
        'method' => 'GET'
    ],
    [
        'path' => '/events/create',
        'controller' =>  'controllers/events/create.php',
        'method' => 'GET'
    ],
    [
        'path' => '/events/create',
        'controller' =>  'controllers/events/store.php',
        'method' => 'POST'
    ],
    [
        'path' => '/register',
        'controller' =>  'controllers/auth/register.php',
        'method' => 'GET'
    ],
    [
        'path' => '/login',
        'controller' =>  'controllers/auth/login.php',
        'method' => 'GET'
    ],
    [
        'path' => '/login',
        'controller' =>  'controllers/auth/login-store.php',
        'method' => 'POST'
    ],
    [
        'path' => '/register',
        'controller' =>  'controllers/auth/register-store.php',
        'method' => 'POST'
    ],
    [
        'path' => '/logout',
        'controller' =>  'controllers/auth/logout.php',
        'method' => 'POST'
    ],
    [
        'path' => '/dashboard',
        'controller' =>  'controllers/dashboard/events.php',
        'method' => 'GET'
    ],
    [
        'path' => '/dashboard/attendees',
        'controller' =>  'controllers/dashboard/attendees.php',
        'method' => 'GET'
    ],
    [
        'path' => '/dashboard/attendees',
        'controller' =>  'controllers/dashboard/attendees-download.php',
        'method' => 'POST'
    ],
];

$path =  parse_url( $_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

function mapRouteToController($routes,$path,$method){
    foreach ($routes as  $route){
        if($route['path'] === $path && $route['method'] ===  $method ){
            require $route['controller'];
            return;
        }
    }
    pageNotFound();
}
function pageNotFound()
{
    require basePath("views/404.php");
    exit();
}

mapRouteToController($routes,$path,$method);


