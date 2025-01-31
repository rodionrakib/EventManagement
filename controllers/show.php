<?php

if (!array_key_exists('id',$_GET)) pageNotFound();
require basePath("Database.php");
$config = require basePath("config.php");
$db = new Database($config['database']);
$heading = "Events";
$event = $db->query("SELECT events.*, count(attendees.id) as attendee_count FROM events 
left join attendees on attendees.event_id = events.id 
GROUP by events.id 
having events.id = :id ",[
    'id' => $_GET['id']
])->fetch();
if (!$event) pageNotFound();
require  basePath("views/show.view.php");