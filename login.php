<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="Resources/Css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="main-bg">
    <img class="bg" src="Resources/Images/login-bg.jpeg">
    <div class="register-form">
    <div id="preloader">
  <div class="loader"></div>
</div>
        
<form>
<div class="form-ico">
<img src="Resources/Images/logosesi.jpg">    
</div>
<h1>Faça login para verificar as salas disponíveis:</h1>
<div class="form-input">
<label id="direction"><i class="fa fa-user"></i>Usuário</label>
<input type="text" name="usario" placeholder="Usuário">


<label id="direction"><i class="fa fa-lock"></i>Senha</label>
<input type="text" name="senha" placeholder="Senha">



<div class="r-button">
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