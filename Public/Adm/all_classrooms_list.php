<?php
include_once '../../Config/config.php';
include_once '../../App/Controller/ClassroomController.php';
$classroomController = new ClassroomController($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/ADM/all_classrooms_list.css">
    <title>Lista de Salas de Aula</title>
</head>
<body>
    <main>
        <section class="form-section">
            <a href="index.php" class="back-link">Voltar</a>
            <h2>Lista de Salas de Aula</h2>
            <?php
                $classroomController->showClassroomsList();
            ?>
        </section>
    </main>
</body>
</html>
