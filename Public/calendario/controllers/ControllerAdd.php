<?php
include ("../config/config.php");
$objEvents = new \Classes\ClassEvents();

$date = filter_input(INPUT_POST, 'date', FILTER_DEFAULT);
$time = filter_input(INPUT_POST, 'time', FILTER_DEFAULT);
$title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
$description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);
$color = filter_input(INPUT_POST, 'color', FILTER_DEFAULT);
$tempoaula = filter_input(INPUT_POST, 'tempoaula', FILTER_DEFAULT);
$freq = filter_input(INPUT_POST, 'repeat', FILTER_DEFAULT); // Frequência de repetição

$start = new \DateTime($date. ' ' . $time, new \DateTimeZone('America/Sao_Paulo'));

if ($freq == 'none') {
    // Criar evento sem recorrência
    $objEvents->createEvent(
        0,
        $title,
        $description,
        $color,
        $start->format("Y-m-d H:i:s"),
        $start->modify('+' . $tempoaula. 'minutes')->format("Y-m-d H:i:s")
    );
} else {
    // Criar evento recorrente
    $end = $start->modify('+' . $tempoaula . 'minutes')->format("Y-m-d H:i:s");
    $objEvents->createRecurringEvent(
        0,
        $title,
        $description,
        $color,
        $start->format("Y-m-d H:i:s"),
        $end,
        $freq
    );
}

header("Location: " . DIRPAGE . "/views/manager/index.php");
exit();
