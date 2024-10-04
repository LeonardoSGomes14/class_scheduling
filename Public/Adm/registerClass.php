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
    <link rel="stylesheet" href="../../Resources/Css/ADM/sing-up.css">
    <title>Registro de Classes</title>
</head>
<body>
    <header>
        <?php 
            if (isset($_SESSION['message'])) {
                echo '<div class="message success">' . $_SESSION['message'] . '</div>';
                unset($_SESSION['message']);
            }
        ?>
    </header>
    <main>
        <section class="form-section">
            <a href="index.php" class="back-link">Voltar</a>
            <h2>Registro de Classe</h2>
            <form method="post" class="form-group">
                <label>
                    <span>Identificação:</span>
                    <input type="text" name="identification" required>
                </label>
                
                <label>
                    <span>Status:</span>
                    <select name="contitionstatus" required>
                        <option value="" disabled selected>Selecione...</option>
                        <option value="0">Disponível</option>
                        <option value="1">Ocupado</option>
                    </select>
                </label>
                
                <label>
                    <span>Equipamentos:</span>
                    <textarea name="equipaments" required></textarea>
                </label>
                
                <label>
                    <span>Observação:</span>
                    <textarea name="description"></textarea>
                </label>
                
                <button type="submit" class="btn-submit">Finalizar</button>
            </form>
        </section>
    </main>
</body>
</html>
