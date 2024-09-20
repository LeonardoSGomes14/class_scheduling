<?php
include ("../config/config.php");
$objEvents = new \Classes\ClassEvents();
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$objEvents->deleteEvent($id);
header("Location: " . DIRPAGE . "/views/manager/index.php");


exit();