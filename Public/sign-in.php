<?php
session_start();
include_once '../Config/config.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Resources/Css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="../Resources/Images/logo.jpeg" type="image/x-icon">
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
        
<form method="post" action="../App/Providers/configCargos.php">
<div class="form-ico">
<img src="../Resources/Images/logo.jpeg">    
</div>
<h1>Faça login para verificar as salas disponíveis:</h1>
<div class="form-input">
<label id="direction"><i class="fa fa-user"></i>Email</label>
<input type="text" name="email" placeholder="Email">


<label id="direction"><i class="fa fa-lock"></i>Senha</label>
<input type="password" name="password" placeholder="Senha">



<div class="r-button">
  <br>
  <br>
<button>Login</button>
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