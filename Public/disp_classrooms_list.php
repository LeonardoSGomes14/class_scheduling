<?php
include_once '../Config/config.php';
include_once '../App/Controller/ClassroomController.php';
$classroomController = new ClassroomController($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">
<link rel="shortcut icon" href="../Resources/Images/logo.jpeg" type="image/x-icon">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Resources/Css/disp_classrooms.css">
    <link rel="stylesheet" href="../Resources/Css/sandwich-menu.css">
    <title>Lista de salas de aula disponíveis</title>
</head>

<body>
    <?php
    $classroomController->showDispClassroomsList();
    ?>
    

</body>

</html>