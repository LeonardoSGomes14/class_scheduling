<?php
include_once '../../Config/config.php';
include_once '../../App/Controller/UsersController.php';
include_once '../../App/Controller/SubjectsController.php';


$subjectsController = new subjectsController($pdo);
$usersController = new userController($pdo);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_users = $_POST['id_users'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
    $school_year = $_POST['school_year'];
    $subject = $_POST['subject'];



    $usersController->updateUser($id_users, $name, $email, $password, $user_type, $school_year, $subject);

    header('Location: users_list.php');
    exit();
}

if (isset($_GET['id'])) {
    $id_users = $_GET['id'];


    $users = $usersController->listUsers();
    $users = array_filter($users, fn($t) => $t['id_users'] == $id_users);


    if (empty($users)) {
        echo "Usuário não encontrado.";
        exit();
    }


    $users = reset($users);
} else {
    echo "ID do usuário não foi fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/ADM/sing-up.css">
    <title>Update user</title>
    <style>
        .toggle-btn {
            cursor: pointer;
            color: blue;
        }
    </style>
</head>

<body>
    <a href="index.php" class="back-link">Voltar</a>
    <h1>Editar dados do usuário</h1>
    <form method="post" class="signup-form">
        <!-- Campo oculto para enviar o ID do usuário -->
        <input type="hidden" name="id_users" value="<?php echo htmlspecialchars($users['id_users']); ?>">

        <label>
            <span>Nome:</span><br>
            <input type="text" name="name" value="<?php echo htmlspecialchars($users['name']); ?>" required>
        </label><br><br>
        <label>
            <span>E-mail:</span><br>
            <input type="text" name="email" value="<?php echo htmlspecialchars($users['email']); ?>" required>
        </label><br><br>
        <label>
            <span>Senha:</span><br>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($users['password']); ?>" required>
            <span class="toggle-btn" onclick="mostrarSenha()">Mostrar</span>
        </label><br><br>

        <p>Selecione o tipo de usuário:</p>
        <select name="user_type" onchange="showInputSelect(this.value)" required>
            <option value="">Selecione...</option>
            <option value="3" <?php echo $users['user_type'] == 3 ? 'selected' : ''; ?>>Administrador</option>
            <option value="1" <?php echo $users['user_type'] == 1 ? 'selected' : ''; ?>>Professor</option>
            <option value="2" <?php echo $users['user_type'] == 2 ? 'selected' : ''; ?>>Aluno</option>
        </select><br><br>

        <div id="labelSubject" style="display: <?php echo $users['user_type'] == 1 ? 'block' : 'none'; ?>;">
            <label>
                <span>Matéria:</span><br>
                <select name="subject">
                    <option value="">Selecione...</option>
                    <?php foreach ($subjects as $subject): ?>
                        <option value="<?php echo $subject['name']; ?>" <?php echo $users['subject'] == $subject['name'] ? 'selected' : ''; ?>>
                            <?php echo $subject['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label><br><br>
        </div>

        <div id="labelSchoolYear" style="display: <?php echo $users['user_type'] == 2 ? 'block' : 'none'; ?>;">
            <label>
                <span>Ano Escolar:</span><br>
                <select name="school_year">
                    <option value="">Selecione...</option>
                    <optgroup label="Ensino Fundamental">
                        <option value="9 Ano do Ensino Fundamental" <?php echo $users['school_year'] == '9 Ano do Ensino Fundamental' ? 'selected' : ''; ?>>9º Ano</option>
                        <option value="8 Ano do Ensino Fundamental" <?php echo $users['school_year'] == '8 Ano do Ensino Fundamental' ? 'selected' : ''; ?>>8º Ano</option>
                        <option value="7 Ano do Ensino Fundamental" <?php echo $users['school_year'] == '7 Ano do Ensino Fundamental' ? 'selected' : ''; ?>>7º Ano</option>
                        <option value="6 Ano do Ensino Fundamental" <?php echo $users['school_year'] == '6 Ano do Ensino Fundamental' ? 'selected' : ''; ?>>6º Ano</option>
                    </optgroup>
                    <optgroup label="Ensino Médio">
                        <option value="1 Ano do Ensino Médio" <?php echo $users['school_year'] == '1 Ano do Ensino Médio' ? 'selected' : ''; ?>>1º Ano</option>
                        <option value="2 Ano do Ensino Médio" <?php echo $users['school_year'] == '2 Ano do Ensino Médio' ? 'selected' : ''; ?>>2º Ano</option>
                        <option value="3 Ano do Ensino Médio" <?php echo $users['school_year'] == '3 Ano do Ensino Médio' ? 'selected' : ''; ?>>3º Ano</option>
                    </optgroup>
                </select>
            </label><br><br>
        </div>

        <button type="submit">Atualizar</button>
    </form>

    <script>
        function mostrarSenha() {
            var senhaInput = document.getElementById("password");
            var toggleBtn = document.querySelector(".toggle-btn");

            if (senhaInput.type === "password") {
                senhaInput.type = "text";
                toggleBtn.innerText = "Esconder";
            } else {
                senhaInput.type = "password";
                toggleBtn.innerText = "Mostrar";
            }
        }
    </script>

</body>

</html>