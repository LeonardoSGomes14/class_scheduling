<?php
require_once '../../Config/config.php';
require_once '../../App/Controller/GroupsController.php';
if (isset($_GET['id'])) {
    $id_group = $_GET['id'];
    $groupController = new GroupController($pdo);

    try {
        $groupController->deleteGroup($id_group);
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
} else {
    echo "error";
}
?>