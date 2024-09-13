<?php
include ("../config/config.php");

$objEvents = new \Classes\ClassEvents();
$idEvent = $_POST['id'];
$start = new \DateTime($_POST['start'], new \DateTimeZone('America/Sao_Paulo'));
$end = new \DateTime($_POST['end'], new \DateTimeZone('America/Sao_Paulo'));

// Perform the update
$result = $objEvents->updateDropEvent(
    $idEvent,
    $start->format("Y-m-d H:i:s"),
    $end->format("Y-m-d H:i:s")
);

// Check if the update was successful and return JSON response
if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'Event updated successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update event.']);
}

// Ensure the correct content-type header for JSON
header('Content-Type: application/json');
