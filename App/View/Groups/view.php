<?php
include_once '../../Config/config.php';
include_once 'C:\xampp\htdocs\class_scheduling\App\Controller\GroupsController.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <section>
            <table border="1">
                <thead>
                    <th>Professor</th>
                    <th>Ano Escolar</th>
                    <th colspan="2">Opções</th>
                </thead>
                <?php foreach ($groups as $group): ?>
                <tbody>
                    <td><?php echo $group['teacher'] ?></td>
                    <td><?php echo $group['year_school'] ?></td>
                    <td>Atualizar</td>
                    <td>Deletar</td>
                </tbody>
                <?php endforeach ?>
            </table>
        </section>
    </main>
</body>
</html>