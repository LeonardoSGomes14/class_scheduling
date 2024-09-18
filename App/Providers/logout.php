<?php 
session_start();
unset($_SESSION["userID"]);
unset($_SESSION['userName']);
unset($_SESSION['userEmail']);
unset($_SESSION['userType']);
unset($_SESSION['nao_autenticado']);

header('Location: ../../Public/sign-in.php');
exit();