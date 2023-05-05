<?php
// start session
session_start();
include '../app/config/config.php';
include '../app/controllers/dataBaseController.php';
include '../app/controllers/loginController.php';

$error_message = false;

// handle form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    // LoginController
    $login = new LoginController();
    $login->login($email, $password);

}