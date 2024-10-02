<?php 
session_start();
include_once '../../Config/config.php';
include_once '../../App/Controller/GroupsController.php';
include_once '../../App/Controller/UsersController.php';

$usersController = new UserController($pdo);
$groupController = new GroupController($pdo);
if (isset($_POST['teacher']) &&
    isset($_POST['year_school'])
    ) {
        $groupController->createGroup($_POST['teacher'], $_POST['year_school']);

        $_SESSION['message'] = 'Grupo criado com Sucesso!';
        header('Location: registerGroups.php');
        exit();
    }

$types = $usersController->selectTeacher();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Grupos</title>
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
            <h2>Criar Grupos</h2>
            <form method="post">
                <label>
                    <span>Professor:</span><br>
                    <select name="teacher" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php foreach ($types as $type): ?>
                            <option value="<?php echo $type['name'] ?>"><?php echo $type['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </label><br>
                <label>
                    <span>Turma:</span><br>
                    <select name="year_school" required>
                        <option value="" disabled selected>Selecione...</option>
                        <optgroup label="Ensino Fundamental">
                            <option value="9 Ano do Ensino Fundamental">9º Ano</option>
                            <option value="8 Ano do Ensino Fundamental">8º Ano</option>
                            <option value="7 Ano do Ensino Fundamental">7º Ano</option>
                            <option value="6 Ano do Ensino Fundamental">6º Ano</option>
                        </optgroup>
                        <optgroup label="Ensino Médio">
                            <option value="1 Ano do Ensino Médio">1º Ano</option>
                            <option value="2 Ano do Ensino Médio">2º Ano</option>
                            <option value="3 Ano do Ensino Médio">3º Ano</option>
                        </optgroup>
                    </select>
                </label><br><br>
                <button type="submit">Finalizar</button>
            </form>
        </section>
    </main>
</body>
</html>