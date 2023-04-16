<?php
// start session
session_start();
include '../includes/database.php';
include '../includes/functions.php';
include '../includes/config.php';


$error_message = false;

// handle form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(404);
        echo '{"message" : "Format d\'e-mail invalide"}';

    } else {
        // sanitize email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // validate password
        if (strlen($password) < 8) {
            http_response_code(404);
            echo '{"message":"Le mot de passe doit contenir au moins 8 caractères"}';
        } else {
            // sanitize password
            $password = filter_var($password, FILTER_SANITIZE_STRING);
            // TODO: check if user exists in database
            $user = getRowByParam('users', 'email', $email);
            if (count($user) > 0) {
                // get hashed password from database
                $hashed_password = $user['password'];
                // verify password
                if (password_verify($password, $hashed_password)) {
                    // password is correct
                    // create session and redirect to dashboard
                    $user_id = $user['id'];
                    $_SESSION['user'] = $user['name']; // set user session variable
                    sleep(2);
                    http_response_code(200);

                    echo '{"message":"connexion réussie"}';
                    // header('Location: home.php'); // redirect to home page
                    exit();
                } else {
                    // password is incorrect
                    http_response_code(404);
                    echo '{"message" : "E-mail ou mot de passe invalide"}';
                }
            }

        }
    }

}