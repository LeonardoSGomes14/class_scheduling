<?php
    echo "<h2>Matérias cadastradas</h2>";
    echo "<table>";
    echo "<tr><th>Nome</th><th>Professores</th></tr>";

    try {
        $stmt = $pdo->query("SELECT * FROM subjects");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['teacher']) . "</td>";

            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "<p>Erro ao exibir as matérias: " . $e->getMessage() . "</p>";
    }

    echo "</table>";
    ?>
</body>

