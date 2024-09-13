<?php
session_start();
include_once '../../Config/config.php';
include_once '../../App/Controller/SubjectsController.php';

$subjectsController = new SubjectsController($pdo);
if (isset($_POST['name'])) {
    $subjectsController->createSubjects($_POST['name']);

    $_SESSION['message'] = 'Matéria cadastrada com sucesso';
    header('Location: registerSubject.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Matérias</title>
</head>
<body>
    <header>
        <?php 
            if(isset($_SESSION['message'])) {
                echo '<p>' . $_SESSION['message'] . '</p>';
                unset($_SESSION['message']);
            }
        ?>
    </header>
    <main>
        <section>
            <h2>Registro de Matérias</h2>
            <form method="post">
                <label>
                    <span>Nome da matéria:</span><br>
                    <input type="text" name="name" required>
                </label><br><br>
                <button type="submit">Finalizar</button>
            </form>
        </section>
    </main>
</body>
</html>