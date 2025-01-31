<?php
redirectIfNotAuthenticated();
$heading = "Create Event";
require basePath("views/events/create.view.php");
