<?php
session_start();
$request = $_SERVER['REQUEST_URI'];
$controllerDir = __DIR__.'/../controllers/';
switch ($request) {
    case '':
    case '/':
        require $controllerDir . 'accueil.php';
        break;

    case '/views/admin':
        require $controllerDir . 'admin.php';
        break;

    default:
        http_response_code(404);
        require $controllerDir . 'error.php';
}
?>