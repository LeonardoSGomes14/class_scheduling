<?php
include_once '../../Config/config.php';
include_once 'C:\xampp\htdocs\class_scheduling\App\Controller\GroupsController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/ADM/sing-up.css">
    <title>Lista de Grupos</title>
</head>
<body>
    <main>
        <section class="form-section">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Professor</th>
                        <th>Ano Escolar</th>
                        <th colspan="2">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($groups as $group): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($group['teacher']); ?></td>
                        <td><?php echo htmlspecialchars($group['year_school']); ?></td>
                        <td><a href="#" class="btn-action">Atualizar</a></td>
                        <td><a href="#" class="btn-delete">Deletar</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
