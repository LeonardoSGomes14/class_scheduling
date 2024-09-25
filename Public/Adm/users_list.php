<?php
include_once '../../Config/config.php';
include_once '../../App/Controller/UsersController.php';
include_once '../../App/Controller/SubjectsController.php';
$usersController = new UserController($pdo);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuários</title>
</head>
<body>
    <header>

    </header>
    <main>
        <section>
            <a href="index.php">Voltar</a>
            <?php
                $usersController->showUsersList();
            ?>
        </section>
    </main>
</body>
</html>