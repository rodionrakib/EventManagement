<?php
require basePath("Database.php");
$config = require basePath("config.php");
$db = new Database($config['database']);
require basePath("Validator.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::string($name, 2, 255)) {
    $errors['name'] = 'Please provide your name (At least 2 character).';
}
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (! empty($errors)) {
     require basePath('views/register.view.php');
}

// user with this email already exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->fetch();

if ($user) {
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(name,email, password) VALUES(:name, :email, :password)', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $userCreated = $db->query("SELECT * from users where email = :email",[
        'email' => $email
    ])->fetch();

    // log in
    login($userCreated);
    header('location: /');
    exit();
}