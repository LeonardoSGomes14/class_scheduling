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



    $usersController->updateUser($id_users, $name, $email, $password,$user_type, $school_year, $subject);

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

 
    $user = reset($user);
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
<h1>Editar dados do usuário</h1>
        <form method="POST">
            <input type="hidden" name="id_users" value="<?php echo htmlspecialchars($user['id_users']); ?>">

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name"  value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"  value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password"  step="0.01" value="<?php echo htmlspecialchars($user['password']); ?>" required>
                <span class="toggle-btn" onclick="mostrarSenha()">Mostrar</span>
            </div>

            <div class="form-group">
                <label for="user_type">Tipo de usuário:</label>
                <input type="boolean" id="user_type" name="user_type"  step="0.01" value="<?php echo htmlspecialchars($user['user_type']); ?>" required>
            </div>

            <div class="form-group">
                <label for="subject">CPF:</label>
                <input type="text" id="subject" name="subject"  value="<?php echo htmlspecialchars($user['subject']); ?>" required>
            </div>


            <button type="submit" >Atualizar</button>
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

