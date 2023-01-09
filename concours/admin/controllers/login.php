<?php
require_once '../../config/crud.php';
session_start();

// initializes a session variable named 'errorLogin' as an empty array
$_SESSION['errorLogin'] = array();

if (isset($_POST['login_button'])) {
    // We check if an email and a password have been entered
    if (isset($_POST['email']) && isset($_POST['password'])) {

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        $user = getUser($email, $password);

        // The password and/or the password does not match the information in the database
        if (!$user) {
            array_push($_SESSION['errorLogin'], 'Pseudo et/ou Mot de passe incorrect');
            header('Location: /SAE-302/concours/index.php');
            die();
        // The password and/or the password match the information in the database, the user is connected
        } else {
            $_SESSION['user'] = $user['email'];
            header('Location: /SAE-302/concours/index.php');
            die();
        }
    }
}
