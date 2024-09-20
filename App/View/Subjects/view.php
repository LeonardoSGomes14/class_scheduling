<?php
include_once 'C:\xampp\htdocs\class_scheduling\App\Controller\SubjectsController.php';
include_once 'C:\xampp\htdocs\class_scheduling\Config\config.php';

    echo "<h2>Matérias cadastradas</h2>";
    echo "<table>";
    echo "<tr><th>Id</th><th>Nome da matéria</th></tr>";

    try {
      foreach($subjects as $subject) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($subject['id_subject']) . "</td>";
            echo "<td>" . htmlspecialchars($subject['name']) . "</td>";

            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "<p>Erro ao exibir as matérias: " . $e->getMessage() . "</p>";
    }

    echo "</table>";
    ?>
</body>

