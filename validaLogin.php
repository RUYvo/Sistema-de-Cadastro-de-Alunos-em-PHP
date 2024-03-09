<?php

require_once "./models/user.php";


if (isset($_SESSION)) {
    session_destroy();
}

session_start();

$usuarios = [
    new User('adm1@teste.com', '1234'),
    new User('adm2@teste.com', '1234'),
    new User('adm3@teste.com', '1234')
];

foreach ($usuarios as $currentUser) {
    if ($currentUser->validatePassword($_POST["senha"]) && $currentUser->getEmail() == $_POST["email"]) {
        $_SESSION['logged_in'] = true;
        $_SERVER['usuario'] = $_POST['email'];
        header('Location: index.php');
        exit;
    }
    $erroLogin = 'Credenciais erradas. Por favor, tente novamente.';
}
header('Location: login.php');
