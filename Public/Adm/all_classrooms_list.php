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
    <title>Lista de todas as salas de aula</title>
</head>
<body>
    <header>

    </header>
    <main>
        <section>
        <a href="index.php">Voltar</a>
            <?php
                $classroomController->showClassroomsList();
            ?>
        </section>
    </main>
</body>
</html>