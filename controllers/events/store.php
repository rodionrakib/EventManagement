<?php
redirectIfNotAuthenticated();

require basePath("Database.php");
$config = require basePath("config.php");
$db = new Database($config['database']);
$heading = "Create Event";
require basePath("Validator.php");
$errors = [];

// validate
$title = $_POST['title'];
$description = $_POST['description'];
$maxCapacity = $_POST['max-capacity'];
$startAt = $_POST['start-at'];
$address = $_POST['address'];


if(!Validator::string($title,1,255)){
    $errors['title'] = "Please provide a title and max length is 255 character";
}
if(!Validator::string($description,1)){
    $errors['description'] = "Please provide a description";
}
if(!Validator::number($maxCapacity)){
    $errors['max-capacity'] = "Please provide a max capacity number";
}

if(!Validator::date($startAt,new DateTime())){
    $errors['start-at'] = "Please provide a valid start date (future)";
}

if (!empty($errors)){
    return require basePath('views/events/create.view.php');
}


$sql = "INSERT INTO events (title,description,start_at,address,max_capacity,user_id) values (:title, :description, :start_at, :address, :max_capacity, :user_id)";
$db->query($sql,[
        'title' => $title,
        'description' => $description,
        'start_at' => $startAt,
        'address' =>  $address,
        'max_capacity' => $maxCapacity,
        'user_id' => $_SESSION['user']['id']
    ]);

redirect('/');


