<?php
session_start();
include_once '../../Config/config.php';
include_once '../../App/Controller/UsersController.php';
include_once '../../App/Controller/SubjectsController.php';

$subjectsController = new subjectsController($pdo); 
$usersController = new UserController($pdo);
if (isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['user_type']) &&
    isset($_POST['school_year']) &&
    isset($_POST['subject'])) {
        $usersController->createUser($_POST['name'], $_POST['email'], $_POST['password'], $_POST['user_type'], $_POST['school_year'], $_POST['subject']);
        
        $_SESSION['message'] = 'Cadastro realizado com sucesso!';
        header('Location: sign-up.php');
        exit();
    }

$subjectss = $subjectsController->listSubjects();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        .hidden-input {
            display: none;
        }
    </style>
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
            <h2>Sign Up</h2>
            <form method="post">
                <label>
                    <span>Nome:</span><br>
                    <input type="text" name="name" required>
                </label><br><br>
                <label>
                    <span>E-mail:</span><br>
                    <input type="text" name="email" required>
                </label><br><br>
                <label>
                    <span>Senha:</span><br>
                    <input type="password" name="password" required>
                </label><br><br>
                <label>
                    <p>Tipo de Usuário</p>
                    <input type="radio" name="user_type" value="1" onclick="showInput('labelSubject')" required><span>Professor</span><br>
                </label><br><br>
                <label>
                    <input type="radio" name="user_type" value="2" onclick="showInput('labelSchoolYear')" required><span>Aluno</span>
                </label><br><br>
                <label id="labelSchoolYear" class="hidden-input">
                    <span>Ano Escolar:</span><br>
                    <select name="school_year">
                        <option value="">Selecione...</option>
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
                <label id="labelSubject" class="hidden-input">
                    <span>Matéria:</span><br>
                    <select name="subject" required>
                        <option value="">Selecione...</option>
                    <?php foreach($subjectss as $subject): ?>
                        <option value="<?php echo $subject['name'] ?>"><?php echo $subject['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </label><br><br>
                <button type="submit">Finalizar</button>
            </form>
        </section>
    </main>
    <script src="../../Resources/Js/app.js"></script>
</body>
</html>
