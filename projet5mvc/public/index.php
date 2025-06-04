<?php
session_start();
$request = $_SERVER['REQUEST_URI'];
$viewDir = '/controllers/';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . $viewDir . 'accueil.php';
        break;

    case '/views/admin':
        require __DIR__ . $viewDir . 'admin.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . 'error';
}
?>