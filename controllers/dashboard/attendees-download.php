<?php

$eventId = $_POST['event-id'];

// make sure it's a valid id and event exists with this id

// find attendees to this event

require basePath("Database.php");
$config = require basePath("config.php");
$db = new Database($config['database']);
$heading = "Event attendees";
$attendees = $db->query("SELECT * FROM attendees where event_id = :eventId",[
    'eventId' =>  $eventId
])->fetchAll();

function array_to_csv_download($array, $filename = "export.csv", $delimiter=";") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('php://memory', 'w');
    // loop over the input array
    foreach ($array as $line) {
        // generate csv lines from the inner arrays
        fputcsv($f, $line, $delimiter);
    }
    // reset the file pointer to the start of the file
    fseek($f, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: text/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="'.$filename.'";');
    // make php send the generated csv lines to the browser
    fpassthru($f);
}
array_to_csv_download($attendees);
