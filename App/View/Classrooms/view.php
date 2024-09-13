<?php
    echo "<h2>Salas de aula cadastradas</h2>";
    echo "<table>";
    echo "<tr><th>Identificação</th><th>Condição da sala</th><th>Equipamentos</th><th>Descrição</th></tr>";

    try {
        $stmt = $pdo->query("SELECT * FROM classrooms");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['identification']) . "</td>";
            echo "<td>" . htmlspecialchars($row['conditionstatus']) . "</td>";
            echo "<td>" . htmlspecialchars($row['equipaments']) . "</td>";
            echo "<td>" . htmlspecialchars($row['description']) . "</td>";

            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "<p>Erro ao exibir salas de aula: " . $e->getMessage() . "</p>";
    }

    echo "</table>";
    ?>
</body>

