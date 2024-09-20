<?php
session_start();
include_once '../../Config/config.php';
include_once '../../App/Controller/ClassroomController.php';

$classroomController = new ClassroomController($pdo);
if (isset($_POST['identification']) &&
    isset($_POST['contitionstatus']) &&
    isset($_POST['equipaments']) &&
    isset($_POST['description'])
) {
    $classroomController->createClassroom($_POST['identification'], $_POST['contitionstatus'], $_POST['equipaments'], $_POST['description']);

    $_SESSION['message'] = 'Classe cadastrada com sucesso';
    header('Location: registerClass.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Classes</title>
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
            <a href="index.php">Voltar</a>
            <h2>Registro de Classe</h2>
            <form method="post">
                <label>
                    <span>Identificação:</span><br>
                    <input type="text" name="identification" required>
                </label><br><br>
                <label>
                    <span>Status:</span><br>
                    <select name="contitionstatus">
                        <option value="">Selecione...</option>
                        <option value="0">Dispoível</option>
                        <option value="1">Ocupado</option>
                    </select>
                </label><br><br>
                <label>
                    <span>Equipamentos:</span><br>
                    <textarea name="equipaments" required></textarea>
                </label><br><br>
                <label>
                    <span>Observação:</span><br>
                    <textarea name="description"></textarea>
                </label><br><br>
                <button type="submit">Finalizar</button>
            </form>
        </section>
    </main>
</body>
</html>