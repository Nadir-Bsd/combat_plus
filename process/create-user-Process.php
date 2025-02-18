<?php
include_once '../utils/autoload.php';

session_start();

$userManager = new UserManager();

// create user
if($userManager->addUser($_POST)) {
    $_SESSION['user'] = $userManager->findUserByName($_POST['name']);
    header("location: ../public/heros.php");
    exit;
} else {
    header("location: ../public/home.php?errorDataBase=true");
    exit;
}
?>