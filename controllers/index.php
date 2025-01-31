<?php
require basePath("Database.php");
$config = require basePath("config.php");
$db = new Database($config['database']);
$heading = "Events";
$events = $db->query("SELECT 
    events.*, 
    COUNT(attendees.event_id) AS attendee_count
FROM 
    events
LEFT JOIN 
    attendees ON events.id = attendees.event_id
GROUP BY 
    events.id;
")->fetchAll();

require  basePath("views/index.view.php");