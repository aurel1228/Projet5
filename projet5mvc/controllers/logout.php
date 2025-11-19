<?php
function logout(){
   session_unset();
   header("location: /accueil.php");
   exit();
}   
   require __DIR__."/../views/logout.php"; 
   ?>