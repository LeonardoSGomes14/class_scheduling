<?php
session_start();
include_once '../Config/config.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../Resources/Css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="../Resources/Images/sesi-logo.png" type="image/x-icon">
</head>
<body>
    <header>
        <?php
            if(isset($_SESSION['nao_autenticado'])):
                echo '<div class="alert">Usuário ou senha inválidos!</div>';
                unset($_SESSION['nao_autenticado']);
            endif;
        ?>
        <form action="../App/Providers/configCargos.php" method="post"></form>
    </header>
    <div class="main-bg">
    <img class="bg" src="../Resources/Images/login-bg.jpeg">
    <div class="register-form">
    <div id="preloader">
  <div class="loader"></div>
</div>
        
<form>
<div class="form-ico">
<img src="../Resources/Images/logosesi.jpg">    
</div>
<h1>Faça registro para verificar as salas disponíveis:</h1>
<div class="form-input" id="espaco">

<label id="direction"><i class="fa fa-id-card"></i>Nome</label>
<input type="text" name="name" placeholder="Nome">


<label id="direction"><i class="fa fa-user"></i>Usuário</label>
<input type="text" name="usuario" placeholder="Usuário">


<label id="direction"><i class="fa fa-lock"></i>Senha</label>
<input type="text" name="senha" placeholder="Senha">



<div class="r-button">
<button>Login</button>
<br>
<br>
<a href="sign-in.php">Voltar ao Login</a>
</div>
</form>
    <script>
  window.addEventListener("load", function() {
    const preloader = document.getElementById("preloader");
    preloader.style.display = "none";
  });
</script>
    </div>
</body>
</html>