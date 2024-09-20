<?php
include_once 'C:\xampp\htdocs\class_scheduling\App\Controller\ClassroomController.php';
include_once 'C:\xampp\htdocs\class_scheduling\Config\config.php';

echo "<h2>Salas de aula cadastradas</h2>";
echo "<table>";
echo "<tr><th>Identificação</th><th>Condição da sala</th><th>Equipamentos</th><th>Descrição</th></tr>";

try {
    foreach ($classrooms as $classroom) {
        if ($classroom['conditionstatus'] == 1) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($classroom['identification']) . "</td>";
        echo "<td>" . htmlspecialchars($classroom['conditionstatus']) . "</td>";
        echo "<td>" . htmlspecialchars($classroom['equipaments']) . "</td>";
        echo "<td>" . htmlspecialchars($classroom['description']) . "</td>";

        echo "</tr>";
        }
    }
} catch (PDOException $e) {
    echo "<p>Erro ao exibir salas de aula: " . $e->getMessage() . "</p>";
}



echo "</table>";
?>
</body>