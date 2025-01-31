<?php
require basePath("Database.php");
$config = require basePath("config.php");
$db = new Database($config['database']);
require basePath("Validator.php");
$eventId = $_POST['event_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$event = $db->query('SELECT events.*, count(attendees.id) as attendee_count FROM events 
left join attendees on attendees.event_id = events.id 
GROUP by events.id 
having events.id = :id', [
    'id' => $eventId
])->fetch();

$errors = [];
if (alreadyRegisteredToEvent($event,$email,$db)){
    $errors['email'] = 'Already registered with this email address.';
}
// check capacity
if ( $event['attendee_count'] >= $event['max_capacity']){
    $errors['email'] = 'Max capacity exceed. ';
}

if (!Validator::string($name, 2, 255)) {
    $errors['name'] = 'Please provide your name (At least 2 character).';
}
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}
function alreadyRegisteredToEvent($event, $email,$db)
{
    return $db->query("SELECT * from attendees where event_id = :event_id AND email = :email",[
       'event_id' => $event['id'],
       'email' => $email
    ])->fetch();
}



if (!empty($errors)) {
     view('show.view.php',[
        'heading' => 'Register to this event',
        'event' => $event,
        'errors' => $errors,
    ]);
     exit();
}



// store registration
$db->query("INSERT INTO attendees (name,email,phone,event_id) values (:name , :email, :phone, :event_id)",[
    'name' => $name,
    'email' => $email,
    'event_id' => $eventId,
    'phone' => $phone
]);
$message = "Registration successful !";
redirect('/','success','Registration Successful');