<?php
require "Database.php";
$config = require "config.php";
$db = new Database($config['database']);

$heading = "Create Event";
require "views/events-create.view.php";
