<?php
include_once 'C:\xampp\htdocs\class_scheduling\App\Controller\ClassroomController.php';
include_once 'C:\xampp\htdocs\class_scheduling\Config\config.php';

echo "<h2>Salas de Aula Cadastradas</h2>";
echo "<table class='styled-table'>";
echo "<thead>";
echo "<tr><th>Identificação</th><th>Status</th><th>Equipamentos</th><th>Observação</th></tr>";
echo "</thead>";
echo "<tbody>";

try {
    foreach ($classrooms as $classroom) {
        // Define uma classe para o status (disponível ou não)
        $statusClass = ($classroom['conditionstatus'] === 'Disponível') ? 'status-available' : 'status-unavailable';

        echo "<tr>";
        echo "<td>" . htmlspecialchars($classroom['identification']) . "</td>";
        echo "<td class=\"$statusClass\">" . htmlspecialchars($classroom['conditionstatus']) . "</td>";
        echo "<td>" . htmlspecialchars($classroom['equipaments']) . "</td>";
        echo "<td>" . htmlspecialchars($classroom['description']) . "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "<p>Erro ao exibir salas de aula: " . $e->getMessage() . "</p>";
}

echo "</tbody>";
echo "</table>";
?>
