<?php
include '../Config/config.php'; // Supondo que já tenha a conexão com o banco configurada.

// Consulta para buscar os dados da tabela `scheduling`.
$sql = "SELECT id_scheduling, scheduling_time, end_time FROM scheduling";
$result = $pdo->query($sql);

$events = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $events[] = [
        'title' => "Sala " . $row['id_scheduling'] . " Ocupada",
        'start' => $row['scheduling_time'],
        'end' => $row['end_time'],
    ];
}

// Retornar os dados em formato JSON
echo json_encode($events);
?>
