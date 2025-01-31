<?php
$eventId = $_GET['event-id'];

// make sure it's a valid id and event exists with this id

// find attendees to this event

require basePath("Database.php");
$config = require basePath("config.php");
$db = new Database($config['database']);
$heading = "Event attendees";
$attendees = $db->query("SELECT * FROM attendees where event_id = :eventId",[
    'eventId' =>  $eventId
])->fetchAll();

require basePath("views/dashboard/attendees.view.php");