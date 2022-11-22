<?php

if (!isset($_COOKIE['lang'])) {
    setcookie('lang', 'ES', time() + 60 * 60 * 24 * 30 * 7);
    $_COOKIE['lang'] = 'ES';
}

if (!isset($_COOKIE['bgColor'])) {
    setcookie('bgColor', 'lavender', time() + 60 * 60 * 24 * 30 * 7);
    $_COOKIE['bgColor'] = 'lavender';
}

if (!isset($_COOKIE['text'])) {
    setcookie('text', json_encode(['Iniciar Sesión', 'Usuario', 'Contraseña', 'Entrar']), time() + 60 * 60 * 24 * 30 * 7);
    $_COOKIE['text'] = json_encode(['Iniciar Sesión', 'Usuario', 'Contraseña', 'Entrar']);
}

if (!isset($_COOKIE['langButton'])) {
    setcookie('langButton', 'English', time() + 60 * 60 * 24 * 30 * 7);
    $_COOKIE['langButton'] = 'English';
}

function userExists($user): bool
{
    require_once 'database/QueryBuilder.php';
    $qb = new QueryBuilder('usuario', 'Usuario', ['nombre', 'email']);
    $usuarios = $qb->getAll();

    foreach ($usuarios as $usu) {
        if (($usu->getPass() === $user->getPass()) && ($usu->getEmail() === $user->getEmail())) {
            return true;
        }
    }
    return false;
}

if (isset($_POST['enes'])) {
    if ($_POST['enes'] === 'Español') {
        setcookie('lang', 'ES', time() + 60 * 60 * 24 * 30 * 7);
        setcookie('bgColor', 'lavender', time() + 60 * 60 * 24 * 30 * 7);
        setcookie('text', json_encode(['Iniciar Sesión', 'Usuario', 'Contraseña', 'Entrar']), time() + 60 * 60 * 24 * 30 * 7);
        setcookie('langButton', 'English', time() + 60 * 60 * 24 * 30 * 7);
    } else {
        setcookie('lang', 'EN', time() + 60 * 60 * 24 * 30 * 7);
        setcookie('bgColor', 'coral', time() + 60 * 60 * 24 * 30 * 7);
        setcookie('text', json_encode(['Log in', 'User', 'Password', 'Enter']), time() + 60 * 60 * 24 * 30 * 7);
        setcookie('langButton', 'Español', time() + 60 * 60 * 24 * 30 * 7);
    }
    header('Location: index.php');
}

if (isset($_POST['login'])) {
    require_once 'entities/Usuario.php';

    $inputUser = new Usuario($_POST['mail'], $_POST['pass']);


    if (userExists($inputUser)) {
        setcookie('login',true,time()+60*60*24*30*7);
        header('Location: index.php');
    } else {
        $result = 'Los datos no son correctos';
    }
}

require 'app/views/login.view.php';
