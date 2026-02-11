<?php
require_once __DIR__."/../vendor/autoload.php";

use Projet5\Controllers\ControllerInterface;
use Projet5\Controllers\Error;

mb_internal_encoding("UTF-8");
session_start();

// construction du nom de la classe du controller
$request = str_replace("/","\\",$_GET['action']);
$class="Projet5\\Controllers\\$request";
if(!class_exists($class)){ //invoque la classe erreur s'il ne trouve pas de controller
    $class=Error::class;
}           

// instance la classe du controller, vérification des droits et traitement des controllers, gestion erreur
$controller=new $class();
if($controller instanceof ControllerInterface){
    if($controller->checkUser()){
        $controller->process();
    }else{
        http_response_code(403);
    }
}else{
    http_response_code(500);
    echo "le controller n'implémente pas ControllerInterface";
}
        
         

   /*require __DIR__."/../model/DB.php";  
   $controllerDir = __DIR__.'/../Controllers/';
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

       case 'admin/delete':
           require $controllerDir . '/admin/delete.php';
           break;  

       case 'logout':
           require $controllerDir . 'logout.php';
           break;        
        
       default:
       var_dump($request);
           http_response_code(404);
           require $controllerDir . 'error.php';
   }*/
   

