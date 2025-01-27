<?php
$path =  parse_url( $_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
    '/events-create' => 'controllers/events-create.php'
];

function pageNotFound()
{
    require "views/404.php";
}

if(array_key_exists($path,$routes)) {
    require $routes[$path];
}else {
    pageNotFound();
}