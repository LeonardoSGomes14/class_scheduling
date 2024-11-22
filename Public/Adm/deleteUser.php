<?php
require_once '../../Config/config.php';
require_once '../../App/Controller/UsersController.php';
if (isset($_GET['id'])) {
    $id_users = $_GET['id'];
    $usersController = new userController($pdo);

    try {
        $usersController->deleteUser($id_users);
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
} else {
    echo "error";
}
?>