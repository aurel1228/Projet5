<?php
   session_start();
   $request = $_SERVER['REQUEST_URI'];
   require __DIR__."/../model/DB.php";  
   $controllerDir = __DIR__.'/../controllers/';
   switch ($request) {
       case '':
       case '/':
           require $controllerDir . 'accueil.php';
           break;
   
       case '/admin':
           require $controllerDir . '/admin/admin.php';
           break;
   
       default:
           http_response_code(404);
           require $controllerDir . 'error.php';
   }
   
   ?>
