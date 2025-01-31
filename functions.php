<?php
function dd($variable){
    echo "<pre>";
    var_dump($variable);
    echo "<pre/>";
    die();
}

function isPath($path){
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $path ;
}

function basePath($path){
    return BASE_PATH.$path;
}

function login($user){
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
    ];
}

function redirect($path,$key=null,$value=null){
    if ($key) $_SESSION[$key] = $value;
    header('location: '.$path);
    exit();
}
function redirectIfNotAuthenticated(){
    if(!isset($_SESSION['user'])){
        header('location: /login');
        exit();
    }
}

function view($path, $attributes = [])
{
    extract($attributes);

    require basePath('views/' . $path);
}

function showFlash($key){
    $message =  $_SESSION[$key];
    unset($_SESSION[$key]);
    return $message;
}

function getOrderByType() {
    if (!isset($_GET['type'])) return 'asc';
    if ($_GET['type'] === 'asc') return  'desc';
    return  'asc';
}