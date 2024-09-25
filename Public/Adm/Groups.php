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
    <title>Document</title>
</head>
<body>
    <main>
        <a href="index.php">Voltar</a>
        <?php
            $groupController ->showGroupsList();
        ?>
    </main>
</body>
</html>