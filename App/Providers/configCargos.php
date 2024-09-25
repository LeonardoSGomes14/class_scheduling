<?php
require_once '../../Config/config.php';
session_start();

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE (email = :email or name = :email) AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result){
        $_SESSION['userID'] = $result['id_users'];
        $_SESSION['userName'] = $result['name'];
        $_SESSION['userEmail'] = $result['email'];
        $_SESSION['userType'] = $result['user_type'];
        $_SESSION['userYear'] = $result['school_year'];
        $_SESSION['userSubject'] = $result['subject'];
        $_SESSION['nao_autenticado'] = false;

        if ($_SESSION['userType'] == 1) { // PROFESSOR
            header('Location: ../../Public/index.php');
        } elseif ($_SESSION['userType'] == 2) { // ALUNO
            header('Location: ../../Public/index.php');
        } elseif ($_SESSION['userType'] == 3) { // ADMINISTRADOR
            header('Location: ../../Public/Adm/index.php');
        }
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: ../../Public/sign-in.php');
        exit();
    }
}