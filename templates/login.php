<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

if (isset($_POST['password'])) {
    if (password_verify($_POST['password'], '$2y$12$qzla5.kEw/lJOqesL3ZMWOgQMfBjp7m1VfvPOLNQOkviMsnqC6yMu')) {
        $_SESSION['enter'] = 1;
        if (isset($_POST['memory'])) {
            setcookie('auth', session_id(), time() + 86400, '/');
        }
        header('Location: /?ctrl=Admin');
        exit;
    }
}
$_SESSION['message'] = 'Не правильный пароль!';
header('Location: /?ctrl=Admin');
exit;