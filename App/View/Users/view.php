<?php
    echo "<h2>Usuarios cadastrados</h2>";
    echo "<table>";
    echo "<tr><th>Nome</th><th>Email</th>Tipo de usuário</th><th>Ano escolar</th><th>Matéria</th></tr>";

    try {
        $stmt = $pdo->query("SELECT * FROM users");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['user_type']) . "</td>";
            echo "<td>" . htmlspecialchars($row['school_year']) . "</td>";
            echo "<td>" . htmlspecialchars($row['subject']) . "</td>";

            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "<p>Erro ao exibir usuários: " . $e->getMessage() . "</p>";
    }

    echo "</table>";
    ?>
</body>
