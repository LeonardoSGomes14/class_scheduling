<?php
session_start();
include_once '../Config/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
    <header>
        <?php
            if(isset($_SESSION['nao_autenticado'])):
                echo '<div class="alert">Usuário ou senha inválidos!</div>';
                unset($_SESSION['nao_autenticado']);
            endif;
        ?>
    </header>
    <main>
        <section>
            <h1>Sign In</h1>
            <form action="../App/Providers/configCargos.php" method="post">
                <label>
                    <span>E-mail ou Nome de usuário</span><br>
                    <input type="text" name="email" required>
                </label><br>
                <label>
                    <span>Senha</span><br>
                    <input type="password" name="password" required>
                </label><br>
                <button>Login</button>
            </form>
        </section>
    </main>
</body>
</html>