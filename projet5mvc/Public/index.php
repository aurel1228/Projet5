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

// instance la classe du controller, vérification des droits et traitement des controllers, gestion des erreurs
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