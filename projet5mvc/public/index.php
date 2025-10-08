<?php
   session_start();
   $request = $_GET['action'];
   require __DIR__."/../model/DB.php";  
   $controllerDir = __DIR__.'/../controllers/';
   switch ($request) {
       case '':
           require $controllerDir . 'accueil.php';
           break;
   
       case 'admin':
           require $controllerDir . '/admin/admin.php';
           break;

       case 'admin/modifier':
           require $controllerDir . '/admin/modifier.php';
           break; 

        case 'admin/add':
           require $controllerDir . '/admin/add.php';
           break;       
   
       default:
           http_response_code(404);
           require $controllerDir . 'error.php';
   }
   
   ?>
