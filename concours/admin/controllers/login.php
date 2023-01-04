<?php
require_once '../../config/crud.php';
session_start();

$_SESSION['errorLogin'] = array();

if (isset($_POST['login_button'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        $user = getUser($email, $password);

        if (!$user) {
            array_push($_SESSION['errorLogin'], 'Pseudo et/ou Mot de passe incorrect');
            header('Location: /SAE-302/concours/index.php');
            die();
        } else {
            $_SESSION['user'] = $user['email'];
            header('Location: /SAE-302/concours/index.php');
            die();
        }
    }
}
