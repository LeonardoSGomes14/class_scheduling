<?php
include_once 'C:\xampp\htdocs\class_scheduling\App\Controller\UsersController.php';
include_once 'C:\xampp\htdocs\class_scheduling\Config\config.php';

echo "<h2>Usuários Cadastrados</h2>";
echo "<table class='users-table'>";
echo "<tr><th>Nome</th><th>Email</th><th>Tipo de Usuário</th><th>Ano Escolar</th><th>Matéria</th></tr>";

try {
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($user['name']) . "</td>";
        echo "<td>" . htmlspecialchars($user['email']) . "</td>";
        echo "<td>" . htmlspecialchars($user['user_type']) . "</td>";
        echo "<td>" . htmlspecialchars($user['school_year']) . "</td>";
        echo "<td>" . htmlspecialchars($user['subject']) . "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "<p>Erro ao exibir usuários: " . $e->getMessage() . "</p>";
}

echo "</table>";
?>
