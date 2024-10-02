<?php
include_once '../../Config/config.php';
include_once '../../App/Controller/GroupsController.php';

$groupController = new GroupController($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/ADM/Groups.css">
    <title>Lista de Grupos</title>
</head>
<body>
    <main>
        <section class="form-section">
            <a href="index.php" class="back-link">Voltar</a>
            <h2>Lista de Grupos</h2>
            <?php
                $groupController->showGroupsList();
            ?>
        </section>
    </main>
</body>
</html>
