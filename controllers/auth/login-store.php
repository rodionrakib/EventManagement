<?php
require basePath("Database.php");
$config = require basePath("config.php");
$db = new Database($config['database']);
require basePath("Validator.php");

// validate input
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide your email address.';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a password';
}

if (!empty($errors)){
    return require basePath('views/login.view.php');
}
//attempt find user

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->fetch();
if (!$user){
    $errors['email'] = 'We have not found any account with this email';
    return require basePath('views/login.view.php');
}

// match password check
if(password_verify($password,$user['password'])){
    login($user);
    header('location: /');
    exit();

}

$errors['email'] = "email password combination don't match ";
return require basePath('views/login.view.php');