<?php
if(!$_SESSION['userEmail'] or !$_SESSION['userName']) {
    header('Location: ../../Public/sign-in.php');
    exit();
}