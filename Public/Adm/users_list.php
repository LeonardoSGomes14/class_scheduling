<?php
include_once '../../Config/config.php';
include_once '../../App/Controller/UsersController.php';
$usersController = new UserController($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="../../Resources/Css/ADM/users_list.css">
</head>
<body>
    <header>
        <h1>Lista de Usuários</h1>
    </header>
    <main>
        <section>
            <a href="index.php" class="back-link">Voltar</a>
            <?php
                $usersController->showUsersList();
            ?>
        </section>
    </main>
</body>
</html>
