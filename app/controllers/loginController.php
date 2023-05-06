<?php

// create class to control login for normal users and admins
class LoginController
{
    // constructor to initialize database connection
    private $db;
    public function __construct()
    {
        $this->db = new DatabaseController();
    }
    // method to handle login
    public function login($email, $password)
    {
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
                // TODO: check if user exists in database (use method from DatabaseController)
                $user = $this->db->getRowByParam('users', 'email', $email);
                if (count($user) > 0 ) {
                    // get hashed password from database
                    $hashed_password = $user['password'];
                    // verify password
                    if (password_verify($password, $hashed_password)) {
                        // password is correct
                        // create session and redirect to dashboard
                        $user_id = $user['id'];
                        $_SESSION['user']['name'] = $user['name']; // set user session variable
                        $_SESSION['is_logged'] = true;
                        $_SESSION['user']['role'] = $user['role'];
                        sleep(1);
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

}