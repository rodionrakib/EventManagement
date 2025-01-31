<?php
redirectIfNotAuthenticated();

require basePath("Database.php");
$config = require basePath("config.php");
$db = new Database($config['database']);

$query = "SELECT events.*, 
    COUNT(attendees.event_id) AS attendee_count
    FROM 
        events
    LEFT JOIN 
        attendees ON events.id = attendees.event_id
    GROUP BY 
        events.id
    HAVING user_id  = :user_id ";

$bindings = [
    'user_id' => $_SESSION['user']['id']
];

function setOrderBY($query)
{
    if (!isset($_GET['order-by'])) return $query;

    $allowedColumns = ['title','start_at','max_capacity'];
    if(!in_array($_GET['order-by'],$allowedColumns)) return $query;

    $query .= " ORDER BY ".$_GET['order-by']." ";
    if (!isset($_GET['type'])) $query .= "ASC";
    elseif ($_GET['type'] === 'desc') $query .= "DESC";
    return  $query;

}

$query = setOrderBY($query);
$events = $db->query($query,$bindings)->fetchAll();

$heading = "Dashboard";


require basePath("views/events/index.view.php");
