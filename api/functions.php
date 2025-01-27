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